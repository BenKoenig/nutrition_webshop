<?php

namespace App\Models;

use Core\Database;
use Core\Models\AbstractModel;
use Core\Traits\SoftDelete;

/**
 * Class Post
 *
 * @package App\Models
 */
class Product extends AbstractModel
{

    const TABLENAME_ROOMFEATURES_MM = 'categories_products_mm';

    /**
     * Wir innerhalb einer Klasse das use-Keyword verwendet, so wird damit ein Trait importiert. Das kann man sich
     * vorstellen wie einen Import mittels require, weil die Methoden, die im Trait definiert sind, einfach in die
     * Klasse, die den Trait verwendet, eingefügt werden, als ob sie in der Klasse selbst definiert worden wären.
     * Das hat den Vorteil, dass Methoden, die in mehreren Klassen vorkommen, zentral definiert und verwaltet werden
     * können in einem Trait, und dennoch überall dort eingebunden werden, wo sie gebraucht werden, ohne Probleme mit
     * komplexen und sehr verschachtelten Vererbungen zu kommen.
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
        public ?int $category_id = null,
        public ?int $goal_id = null,
        public ?int $rating_id = null,
        public ?int $merchant_id = null,
        public ?int $flavor_id = null,
        public string $name = '',
        public ?float $price = null,
        public string $description = '',
        public ?string $img_path = null,
        public string $imgs = '[]',
        public ?float $serving = null,
        public string $ingredients = '',
        public ?float $weight = null,
        public bool $is_featured = false,
        public bool $is_bestseller = false,
        public bool $is_sale = false,
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
            return $database->query("UPDATE $tablename SET category_id = ?, goal_id = ?, rating_id = ?, merchant_id = ?, flavor_id = ?, name = ?, price = ?,
            description = ?, img_path = ?, imgs = ?,  serving = ?, ingredients = ?, weight = ?, is_featured = ?, is_bestseller = ?, is_sale = ? WHERE id = ?", [
                's:category_id' => $this->category_id,
                's:goal_id' => $this->goal_id,
                'i:rating_id' => $this->rating_id,
                'i:merchant_id' => $this->merchant_id,
                'i:flavor_id' => $this->flavor_id,
                's:name' => $this->name,
                'f:price' => $this->price,
                's:description' => $this->description,
                's:img_path' => $this->img_path,
                's:imgs' => $this->imgs,
                'f:serving' => $this->serving,
                'f:ingredients' => $this->ingredients,
                'f:weight' => $this->weight,
                'i:is_featured' => $this->is_featured,
                'i:is_bestseller' => $this->is_bestseller,
                'i:is_sale' => $this->is_sale,
            ]);

            // $this->saveCategories();

        } else {
            /**
             * Hat das Objekt keine id, so müssen wir es neu anlegen.
             */
            $result = $database->query("INSERT INTO $tablename SET category_id = ?, goal_id = ?, rating_id = ?, merchant_id = ?, flavor_id = ?, name = ?, price = ?,
            description = ?, img_path = ?, imgs = ?, serving = ?, ingredients = ?, weight = ?, is_featured = ?, is_bestseller = ?, is_sale = ?", [
                's:category_id' => $this->category_id,
                's:goal_id' => $this->goal_id,
                'i:rating_id' => $this->rating_id,
                'i:merchant_id' => $this->merchant_id,
                'i:flavor_id' => $this->flavor_id,
                's:name' => $this->name,
                'f:price' => $this->price,
                's:description' => $this->description,
                's:img_path' => $this->img_path,
                's:imgs' => $this->imgs,
                'f:serving' => $this->serving,
                'f:ingredients' => $this->ingredients,
                'f:weight' => $this->weight,
                'i:is_featured' => $this->is_featured,
                'i:is_bestseller' => $this->is_bestseller,
                'i:is_sale' => $this->is_sale,
            ]);

            // $this->saveCategories();

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


      
    // public function setCategory(array $categories): array
    // {
    //     $this->_categories = $categories;

    //     return $this->_categories;
    // }

    // /**
    //  * Neue Liste an verknüpften Raum Features zuweisen.
    //  */
    // private function saveCategories()
    // {
    //     /**
    //      * Zunächst holen wir uns die aktuell zugewiesenen Raum Features aus der Datenbank.
    //      */
    //     $oldCategories = $this->categories();

    //     /**
    //      * Dann bereiten wir uns zwei Arrays vor, damit wir die zu löschenden Zuweisungen und jene, die unverändert
    //      * bleiben sollen, speichern können. Daraus ergibt sich, dass alle weiteren, die in $this->_roomFeatures
    //      * vorhanden sind, neu angelegt werden müssen.
    //      */
    //     $categoriesToDelete = [];
    //     $categoriesToNotBeTouched = [];

    //     /**
    //      * Nun gehen wir alle alten Zuweisungen durch ...
    //      */
    //     foreach ($oldCategories as $oldCategory) {
    //         /**
    //          * ... und prüfen, ob sie auch in den neuen Raum Features vorkommen sollen.
    //          */
    //         if (!in_array($oldCategory->id, $this->_categories)) {
    //             /**
    //              * Wenn nein, soll die Zuweisung gelöscht werden.
    //              */
    //             $categoriesToDelete[] = $oldCategory->id;
    //         } else {
    //             /**
    //              * Wenn ja, soll sie weiterhin bestehen bleiben.
    //              */
    //             $categoriesToNotBeTouched[] = $oldCategory->id;
    //         }
    //     }

    //     /**
    //      * Nun berechnen wir uns die Differenz der drei Arrays, wobei alle Werte aus dem ersten Array das Ergebnis
    //      * bilden, die in keinem der weiteren Arrays vorhanden sind. Diese RoomFeatures müssen neu zugewiesen werden.
    //      */
    //     $categoriesToAdd = array_diff($this->_roomFeatures, $categoriesToDelete, $categoriesToNotBeTouched);

    //     /**
    //      * Nun gehen wir alle zu löschenden und neu anzulegenden RoomFeature Verbindungen durch und führen die
    //      * entsprechende Aktion aus.
    //      */
    //     foreach ($categoriesToDelete as $categoryToDelete) {
    //         $this->detachCategory($categoryToDelete);
    //     }
    //     foreach ($categoriesToAdd as $categoryToAdd) {
    //         $this->attachCategory($categoryToAdd);
    //     }
    // }

    // /**
    //  * Relation zu RoomFeatures
    //  *
    //  * @return array
    //  */
    // public function categories(): array
    // {
    //     /**
    //      * Über das RoomFeature Model alle zugehörigen RoomFeatures abrufen.
    //      */
    //     return Category::findByCategory($this->id);
    // }

    // /**
    //  * Verknüpfung zu einem RoomFeature aufheben.
    //  *
    //  * @param int $roomFeatureId
    //  *
    //  * @return bool
    //  */
    // public function detachCategory(int $categoryId): bool
    // {
    //     /**
    //      * Datenbankverbindung herstellen.
    //      */
    //     $database = new Database();
    //     /**
    //      * Tabellennamen berechnen.
    //      */
    //     $tablename = self::TABLENAME_ROOMFEATURES_MM;

    //     /**
    //      * Query ausführen.
    //      */
    //     $result = $database->query("DELETE FROM $tablename WHERE product_id = ? AND category_id = ?", [
    //         'i:product_id' => $this->id,
    //         'i:category_id' => $categoryId
    //     ]);

    //     /**
    //      * Datenbankergebnis verarbeiten und zurückgeben.
    //      */
    //     return $result;
    // }

    // /**
    //  * Verknüpfung zu einem RoomFeature herstellen.
    //  *
    //  * @param int $roomFeatureId
    //  *
    //  * @return bool
    //  */
    // public function attachCategory(int $categoryId): bool
    // {
    //     /**
    //      * Datenbankverbindung herstellen.
    //      */
    //     $database = new Database();
    //     /**
    //      * Tabellennamen berechnen.
    //      */
    //     $tablename = self::TABLENAME_ROOMFEATURES_MM;

    //     /**
    //      * Query ausführen.
    //      */
    //     $result = $database->query("INSERT INTO $tablename SET product_id = ?, category_id = ?", [
    //         'i:product_id' => $this->id,
    //         'i:category_id' => $categoryId
    //     ]);

    //     /**
    //      * Datenbankergebnis verarbeiten und zurückgeben.
    //      */
    //     return $result;
    // }
}
