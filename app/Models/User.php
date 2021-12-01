<?php

namespace App\Models;

use Core\Database;
use Core\Models\AbstractUser;
use Core\Traits\SoftDelete;

/**
 * Class User
 *
 * @package app\Models
 */
class User extends AbstractUser
{

    /**
     * Hier laden wir den SoftDelete Trait, der die delete()- und find()-Methoden überschreibt, damit Objekte nicht
     * komplett gelöscht werden, sondern nur auf deleted gesetzt werden und damit die find()-Methode auch nur Objekte
     * findet, die nicht gelöscht sind.
     */
    use SoftDelete;

    public function __construct(
        /**
         * Wir verwenden hier Constructor Property Promotion, damit wir die ganzen Klassen Eigenschaften nicht 3 mal
         * angeben müssen.
         *
         * Im Prinzip definieren wir alle Spalten aus der Tabelle mit dem richtigen Datentyp.
         */
        public ?int $id = null,
        public string $username = '',
        public string $email = '',
        protected string $password = '',
        public string $firstname = '',
        public string $lastname = '',
        public string $adress_1  = '',
        public string $adress_2 = '',
        public int $postal_code = 0,
        public string $city = '',
        public string $country = '',
        public string $created_at = '',
        public string $updated_at = '',
        public ?string $deleted_at = '',
        public bool $is_admin = false


    ) {
    }

    /**
     * @return bool
     * @todo: implement
     */
    public function save(): bool
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
         * Hat das Objekt bereits eine id, so existiert in der Datenbank auch schon ein Eintrag dazu und wir können es
         * aktualisieren.
         */
        if (!empty($this->id)) {
            /**
             * Query ausführen und Ergebnis direkt zurückgeben. Das kann entweder true oder false sein, je nachdem ob
             * der Query funktioniert hat oder nicht.
             */
            $result = $database->query(
                "UPDATE $tablename SET email = ?, username = ?, password = ?, is_admin = ?, firstname = ?, lastname = ?, adress_1 = ?, adress_2 = ?, postal_code = ?, city = ?, country = ? WHERE id = ?",
                [
                    's:email' => $this->email,
                    's:username' => $this->username,
                    's:password' => $this->password,
                    'i:is_admin' => $this->is_admin,
                    's:firstname' => $this->firstname, 
                    's:lastname' => $this->lastname,
                    's:adress_1' => $this->adress_1,
                    's:adress_2' => $this->adress_2, 
                    'i:postal_code' => $this->postal_code,
                    's:city' => $this->city,
                    's:country' => $this->country,
                    'i:id' => $this->id
                ]
            );

            return $result;
        } else {
            /**
             * Hat das Objekt keine id, so müssen wir es neu anlegen.
             */
            $result = $database->query("INSERT INTO $tablename SET email = ?, username = ?, password = ?, is_admin = ?, firstname = ?, lastname = ?, adress_1 = ?, adress_2 = ?, postal_code = ?, city = ?, country = ?", [
                's:email' => $this->email,
                's:username' => $this->username,
                's:password' => $this->password,
                'i:is_admin' => $this->is_admin,
                's:firstname' => $this->firstname, 
                's:lastname' => $this->lastname,
                's:adress_1' => $this->adress_1,
                's:adress_2' => $this->adress_2, 
                'i:postal_code' => $this->postal_code,
                's:city' => $this->city,
                's:country' => $this->country
            ]);

            /**
             * Ein INSERT Query generiert eine neue id, diese müssen wir daher extra abfragen und verwenden daher die
             * von uns geschrieben handleInsertResult()-Methode, die über das AbstractModel verfügbar ist.
             */
            $this->handleInsertResult($database);

            /**
             * Ergebnis zurückgeben. Das kann entweder true oder false sein, je nachdem ob der Query funktioniert hat
             * oder nicht.
             */
            return $result;
        }
    }
    /**
     * Hilfsfunktion zur Ausgabe aller Equipmentbuchungen für diese*n User*in.
     *
     * @param bool $groupByEquipment
     *
     * @return array<Booking>
     */
    public function orders(): array
    {
        /**
         * Alle Equipment Buchungen holen.
         */
        $orders = Order::findOrdersByUser($this->id);
        /**
         * Wenn diese nicht gruppiert, sondern als einzelne Einträge zurückgegeben werden sollen, so returnen wir hier
         * direkt.
         */
        return $orders;
    }
}



















