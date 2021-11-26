<?php

namespace App\Models;

use Core\Database;
use Core\Models\AbstractModel;
use Core\Models\DateTime;
use Core\Traits\SoftDelete;

class Booking extends AbstractModel
{

    use SoftDelete;

    public function __construct(
        /**
         * Wir verwenden hier Constructor Property Promotion, damit wir die ganzen Klassen Eigenschaften nicht 3 mal
         * angeben müssen.
         *
         * Im Prinzip definieren wir alle Spalten aus der Tabelle mit dem richtigen Datentyp.
         */
        public ?int $id = null,
        public ?int $user_id = null,
        public ?string $time_from = null,
        public ?string $time_to = null,
        public string $foreign_table = '',
        public ?int $foreign_id = null,
        public string $created_at = '',
        public string $updated_at = '',
        public ?string $deleted_at = null
    ) {
    }

    /**
     * Objekt speichern.
     *
     * Wenn das Objekt bereits existiert hat, so wird es aktualisiert, andernfalls neu angelegt. Dadurch können wir eine
     * einzige Funktion verwenden und müssen uns nicht darum kümmern, ob das Objekt angelegt oder aktualisiert werden
     * muss.
     *
     * @return bool
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
                "UPDATE $tablename SET user_id = ?, time_from = ?, time_to = ?, foreign_table = ?, foreign_id = ? WHERE id = ?",
                [
                    'i:user_id' => $this->user_id,
                    's:time_from' => $this->time_from,
                    's:time_to' => $this->time_to,
                    's:foreign_table' => $this->foreign_table,
                    'i:foreign_id' => $this->foreign_id,
                    'i:id' => $this->id
                ]
            );

            return $result;
        } else {
            /**
             * Hat das Objekt keine id, so müssen wir es neu anlegen.
             */
            $result = $database->query(
                "INSERT INTO $tablename SET user_id = ?, time_from = ?, time_to = ?, foreign_table = ?, foreign_id = ?",
                [
                    'i:user_id' => $this->user_id,
                    's:time_from' => $this->time_from,
                    's:time_to' => $this->time_to,
                    's:foreign_table' => $this->foreign_table,
                    'i:foreign_id' => $this->foreign_id,
                ]
            );

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
}