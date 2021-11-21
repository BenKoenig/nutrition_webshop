<?php

namespace Core\Traits;

use Core\Database;

/**
 * Trait SoftDelete
 *
 * Dieser Trait überschreibt einige Methoden des BaseModel, wenn Softdeletes verwendet werden sollen.
 *
 * @package Core\Traits
 */
trait SoftDelete
{

    /**
     * Den zum aktuellen Objekt gehörigen Datensatz in der Datenbank als gelöscht markieren.
     *
     * @return bool
     */
    public function delete(): bool
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
         * Query ausführen.
         *
         * CURRENT_TIMESTAMP() ist eine Funktion von MySQL, die den aktuellen Zeitstempel zurückgibt.
         */
        $result = $database->query("UPDATE $tablename SET deleted_at = CURRENT_TIME() WHERE id = ?", [
            'i:id' => $this->id
        ]);

        /**
         * Datenbankergebnis verarbeiten und zurückgeben.
         */
        return $result;
    }

    /**
     * Alle Datensätze aus der Datenbank abfragen.
     *
     * Die beiden Funktionsparameter bieten die Möglichkeit die Daten, die abgerufen werden, nach einer einzelnen Spalte
     * aufsteigend oder absteigend direkt über MySQL zu sortieren. Sortierungen sollten, sofern möglich, über die
     * Datenbank durchgeführt werden, weil das wesentlich performanter ist als über PHP.
     *
     * @param string|null $orderBy
     * @param string|null $direction
     *
     * @return array
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
         * Query ausführen.
         *
         * Wurde in den Funktionsparametern eine Sortierung definiert, so wenden wir sie hier an, andernfalls rufen wir
         * alles ohne Sortierung ab.
         *
         * Hier nehmen wir auch Rücksicht auf die deleted_at Spalte und geben nur Einträge zurück, die nicht als
         * gelöscht markiert sind.
         */



        switch([$orderBy, $limit, $where, $is]) {
            case [null, null, null, null]:
                $result = $database->query("SELECT * FROM $tablename WHERE deleted_at IS NULL");
            break;
            case [true, null, null, null]:
                $result = $database->query("SELECT * FROM $tablename WHERE deleted_at IS NULL ORDER BY $orderBy $direction");
            break;
            case [null, true, null, null]: 
                $result = $database->query("SELECT * FROM $tablename LIMIT $limit");
            break;
            case [true, true, null, null]:
                $result = $database->query("SELECT * FROM $tablename WHERE deleted_at IS NULL ORDER BY $orderBy $direction LIMIT $limit");
            break;
            case [null, null, true, null]:
                $result = $database->query("SELECT * FROM $tablename WHERE $where AND deleted_at IS NULL");
            break;
            case [true, null, true, null]:
                $result = $database->query("SELECT * FROM $tablename WHERE $where AND IS deleted_at NULL ORDER BY $orderBy $direction");
            break;
            case [null, null, true, true]:
                $result = $database->query("SELECT * FROM $tablename WHERE $where = $is AND deleted_at IS NULL");
            break;
            case [true, null, true, true]:
                $result = $database->query("SELECT * FROM $tablename WHERE $where = $is AND deleted_at IS NULL ORDER BY $orderBy $direction");
            break;
            case [true, true, true, true]:
                $result = $database->query("SELECT * FROM $tablename WHERE $where = $is AND deleted_at IS NULL LIMIT $limit ORDER BY $orderBy $direction");
            break;

        }


        // switch([$orderBy, $limit]) {
        //     case [null, null]:
        //         $result = $database->query("SELECT * FROM $tablename WHERE deleted_at IS NULL");
        //     break;
        //     case [true, null]:
        //         $result = $database->query("SELECT * FROM $tablename ORDER BY $orderBy $direction");
        //     break;
        //     case [null, true]: 
        //         $result = $database->query("SELECT * FROM $tablename LIMIT $limit");
        //     break;
        //     case [true, true]:
        //         $result = $database->query("SELECT * FROM $tablename ORDER BY $orderBy $direction LIMIT $limit");
        //     break;
        // }


        // if ($orderBy === null) {
        //     $result = $database->query("SELECT * FROM $tablename WHERE deleted_at IS NULL");
        // } else {
        //     $result = $database->query(
        //         "SELECT * FROM $tablename WHERE deleted_at IS NULL ORDER BY $orderBy $direction"
        //     );
        // }

        /**
         * Datenbankergebnis verarbeiten und zurückgeben.
         */
        return self::handleResult($result);
    }

}
