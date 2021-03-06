<?php

namespace Core\Models;

use Core\Database;
use Exception;

abstract class AbstractModel
{

    /**
     * Hier definieren wir, dass jede Class, die das AbstractModel erweitert, auch eine save()-Methode definieren muss.
     *
     * @return bool
     */
    public abstract function save(): bool;

    /**
    Requests all data from the databank
     */
    public static function all(?string $orderBy = null, ?string $direction = null, ?int $limit = null, ?string $where = null, ?int $is = null): array
    {
        /**
         * Datenbankverbindung herstellen.
         */
        $database = new Database();
        /**
         * Tabellennamen berechnen.
         */
        $tablename = self::getTablenameFromClassname();


        /**
         * Searches through parameters and adds SQL code depending on the information that is provided
         */
        switch([$orderBy, $limit, $where, $is]) {
            //all parameters are left empty
            case [null, null, null, null]:
                $result = $database->query("SELECT * FROM $tablename");
            break;
            //only $orderBy parameter used
            case [true, null, null, null]:
                $result = $database->query("SELECT * FROM $tablename ORDER BY $orderBy $direction");
            break;
            //only $limit parameter used
            case [null, true, null, null]: 
                $result = $database->query("SELECT * FROM $tablename LIMIT $limit");
            break;
            //$orderBy and $limit parameter are used
            case [true, true, null, null]:
                $result = $database->query("SELECT * FROM $tablename ORDER BY $orderBy $direction LIMIT $limit");
            break;
            //only $where parameter is used
            case [null, null, true, null]:
                $result = $database->query("SELECT * FROM $tablename WHERE $where");
            break;
            //$orderBy and $where parameter are used
            case [true, null, true, null]:
                $result = $database->query("SELECT * FROM $tablename WHERE $where ORDER BY $orderBy $direction");
            break;
            //$where parameter and $is are used
            case [null, null, true, true]:
                $result = $database->query("SELECT * FROM $tablename WHERE $where = $is");
            break;
            //$orderBy, $where and $is parameter are used
            case [true, null, true, true]:
                $result = $database->query("SELECT * FROM $tablename WHERE $where = $is ORDER BY $orderBy $direction");
            break;
            //all parameters are used
            case [true, true, true, true]:
                $result = $database->query("SELECT * FROM $tablename WHERE $where = $is LIMIT $limit ORDER BY $orderBy $direction");
            break;

        }
        
        /**
         * Returns data result
         */
        return self::handleResult($result);
    }

    /**
     * Searches for a specific object with an ID
     */
    public static function find(int $id): ?object
    {
        /**
         * Creates database
         */
        $database = new Database();
        /**
         * Calculates tablename
         */
        $tablename = self::getTablenameFromClassname();

        /**
         * Executes Query
         */
        $result = $database->query("SELECT * FROM $tablename WHERE `id` = ?", [
            'i:id' => $id
        ]);

        /**
         * Returns data result
         */
        return self::handleUniqueResult($result);
    }



    /**
     * Searches for object with an ID and gives error if it doesn't exist
     */
    public static function findOrFail(int $id): ?object
    {
        $result = self::find($id);

        if (empty($result)) {
            /**
             * Error if object isn't found
             */
            throw new Exception('Model not found', 404);
        }

        return $result;
    }

    /**
     * Fills array with data
     */
    public function fill(array $data, bool $ignoreEmpty = true): object
    {
        /**
         * Goes through all data
         */
        foreach ($data as $name => $value) {
            if (property_exists($this, $name)) {    
                $trimmedValue = trim($value);
                if ($ignoreEmpty !== true || !empty($value)) {
                    $this->$name = $trimmedValue;
                }
            }
        }
        return $this;
    }

    /**
     * Deletes Object
     */
    public function delete(): bool
    {
        $database = new Database();
        $tablename = self::getTablenameFromClassname();
        $result = $database->query("DELETE FROM $tablename WHERE id = ?", [
            'i:id' => $this->id
        ]);

        return $result;
    }

    /**
     * Resultat aus der Datenbank verarbeiten.
     *
     * Wir haben das aus der self::all()-Methode ausgelagert, weil die all()-Methode nicht die einzige Methode sein
     * wird, in der wir Datenbankergebnisse verarbeiten werden m??ssen. Damit wir den Code nicht immer kopieren m??ssen,
     * was als Bad Practice gilt, haben wir eine eigene Methode gebaut.
     *
     * @param array $results
     *
     * @return array
     */
    public static function handleResult(array $results): array
    {
        /**
         * Ergebnis-Array vorbereiten.
         */
        $objects = [];

        /**
         * Ergebnisse des Datenbank-Queries durchgehen und jeweils ein neues Objekt erzeugen.
         */
        foreach ($results as $result) {
            /**
             * Auslesen, welche Klasse aufgerufen wurde und ein Objekt dieser Klasse erstellen und in den Ergebnis-Array
             * speichern. Das ist n??tig, weil wir bspw. Post Objekte haben wollen und nicht ein Array voller
             * AbstractModels.
             */
            $calledClass = get_called_class();
            $objects[] = new $calledClass(...$result);
        }

        /**
         * Ergebnisse zur??ckgeben.
         */
        return $objects;
    }

    /**
     * Hier erweitern wir die self::handleResult()-Methode f??r den Fall, dass wir von einem Query kein oder maximal ein
     * Ergebnis erwarten. Bei einem Query mit einer WHERE-Abfrage auf eine UNIQUE-Spalte, w??rden wir maximal ein
     * Ergebnis zur??ckbekommen. Diese Funktion ist also mehr eine Convenience Funktion, weil sie entweder null
     * zur??ckgibt, wenn kein Ergebnis zur??ckgekommen ist (statt eines leeren Arrays in self::handleResult()) oder ein
     * einzelnes Objekt (statt eines Arrays mit einem einzigen Objekt darin).
     *
     * @param array $results
     *
     * @return ?object
     */
    public static function handleUniqueResult(array $results): ?object
    {
        /**
         * Datenbankergebnis ganz normal verarbeiten.
         */
        $objects = self::handleResult($results);

        /**
         * ist das Ergebnis aus der Datenbank leer, geben wir null zur??ck.
         */
        if (empty($objects)) {
            return null;
        }

        /**
         * Andernfalls geben wir das Objekt an Stelle 0 zur??ck, das in diesem Fall das einzige Objekt sein sollte.
         */
        return $objects[0];
    }

    /**
     * Wird ein INSERT-Query ausgef??hrt, so wird in den allermeisten F??llen auch eine neue ID generiert. Diese ist ??ber
     * die Datenbankverbindung abrufbar. Hier holen wir diese ID und aktualisieren das aktuelle Objekt mit der neuen ID.
     *
     * @param Database $database
     */
    public function handleInsertResult(Database $database)
    {
        /**
         * Neu generierte id holen.
         */
        $newId = $database->getInsertId();

        /**
         * Handelt es sich um einen Integer und wurde somit eine neue id vergeben ...
         */
        if (is_int($newId)) {
            /**
             * ... aktualisieren wir das aktuelle Objekt mit diesem Wert.
             */
            $this->id = $newId;
        }
    }

    /**
     * Damit diese abstrakte Klasse f??r alle Models verwendet werden kann, ist es hilfreich, berechnen zu k??nnen, welche
     * Tabelle vermutlich zu dem erweiternden Model geh??rt.
     *
     * @return string
     */
    public static function getTablenameFromClassname(): string
    {
        /**
         * Name der aufgerufenen Klasse abfragen.
         */
        $calledClass = get_called_class(); // bspw. App\Models\User

        /**
         * Hat die aufgerufene Klasse eine Konstante TABLENAME?
         */
        if (defined("$calledClass::TABLENAME")) {
            /**
             * Wenn ja, dann verwenden wir den Wert dieser Konstante als Tabellenname. Das erm??glicht uns einen Namen
             * f??r eine Tabelle anzugeben, wenn der Tabellenname nicht vom Klassennamen abgeleitet werden kann.
             */
            return $calledClass::TABLENAME;
        }

        /**
         * Wenn nein, dann holen wir uns den Namen der Klasse ohne Namespace, konvertieren ihn in Kleinbuchstaben und
         * f??gen hinten ein s dran. So wird bspw. aus App\Models\Product --> products
         */
        $particles = explode('\\', $calledClass); // ['App', 'Models', 'User']
        $classname = array_pop($particles); // 'User'
        $tablename = strtolower($classname) . 's'; // 'users'

        /**
         * Berechneten Tabellennamen zur??ckgeben.
         */
        return $tablename;
    }
}
