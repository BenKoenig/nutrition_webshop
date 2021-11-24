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
        public ?int $merchant_id = null,
        public string $name = '',
        public string $description = '',
        public int $price = 0,
        public ?int $serving = null,
        public string $ingredients = '',
        public ?int $weight = null,
        public bool $is_featured = false,
        public bool $is_bestseller = false,
        public bool $is_sale = false,
        public string $imgs = '[]',
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
            return $database->query("UPDATE $tablename SET category_id = ?, goal_id = ?, merchant_id = ?, name = ?, description = ?, serving = ?,
            ingredients = ?, weight = ?, is_featured = ?, is_bestseller = ?, is_sale = ?, imgs = ?, price = ? WHERE id = ?", [
                'i:category_id' => $this->category_id,
                'i:goal_id' => $this->goal_id,
                'i:merchant_it' => $this->merchant_id,
                's:name' => $this->name,
                's:description' => $this->description,
                'i:price' => $this->price,
                'i:serving' => $this->serving,
                's:ingredients' => $this->ingredients,
                's:weight' => $this->weight,
                's:is_featured' => $this->is_featured,
                's:is_bestseller' => $this->is_bestseller,
                's:is_sale' => $this->is_sale,
                's:imgs' => $this->imgs,
                'i:id' => $this->id
            ]);
        } else {
            /**
             * Hat das Objekt keine id, so müssen wir es neu anlegen.
             */


            switch ([$_POST['is_featured'], $_POST['is_bestseller'], $_POST['is_sale']]) {
                case [true, true, true]:
                    $result = $database->query("INSERT INTO $tablename SET category_id = ?, goal_id = ?, merchant_id = ?, name = ?, description = ?, price = ?, serving = ?,
                    ingredients = ?, weight = ?, is_featured = ?, is_bestseller = ?, is_sale = ?, imgs = ?", [
                        'i:category_id' => $this->category_id,
                        'i:goal_id' => $this->goal_id,
                        'i:merchant_it' => $this->merchant_id,
                        's:name' => $this->name,
                        's:description' => $this->description,
                        'i:price' => $this->price,
                        'i:serving' => $this->serving,
                        's:ingredients' => $this->ingredients,
                        's:weight' => $this->weight,
                        's:is_featured' => $this->is_featured,
                        's:is_bestseller' => $this->is_bestseller,
                        's:is_sale' => $this->is_sale,
                        's:imgs' => $this->imgs,
                    ]);
                    break;
                case [true, true, false]:
                    $result = $database->query("INSERT INTO $tablename SET category_id = ?, goal_id = ?, merchant_id = ?, name = ?, description = ?, price = ?, serving = ?,
                    ingredients = ?, weight = ?, is_featured = ?, is_bestseller = ?, imgs = ?", [
                        'i:category_id' => $this->category_id,
                        'i:goal_id' => $this->goal_id,
                        'i:merchant_it' => $this->merchant_id,
                        's:name' => $this->name,
                        's:description' => $this->description,
                        'i:price' => $this->price,
                        'i:serving' => $this->serving,
                        's:ingredients' => $this->ingredients,
                        's:weight' => $this->weight,
                        's:is_featured' => $this->is_featured,
                        's:is_bestseller' => $this->is_bestseller,
                        's:imgs' => $this->imgs,
                    ]);
                    break;
                case [true, false, false]:
                    $result = $database->query("INSERT INTO $tablename SET category_id = ?, goal_id = ?, merchant_id = ?, name = ?, description = ?, price = ?, serving = ?,
                        ingredients = ?, weight = ?, is_featured = ?, imgs = ?", [
                        'i:category_id' => $this->category_id,
                        'i:goal_id' => $this->goal_id,
                        'i:merchant_it' => $this->merchant_id,
                        's:name' => $this->name,
                        's:description' => $this->description,
                        'i:price' => $this->price,
                        'i:serving' => $this->serving,
                        's:ingredients' => $this->ingredients,
                        's:weight' => $this->weight,
                        's:is_featured' => $this->is_featured,
                        's:imgs' => $this->imgs,
                    ]);
                    break;
                case [false, false, false]:
                    $result = $database->query("INSERT INTO $tablename SET category_id = ?, goal_id = ?, merchant_id = ?, name = ?, description = ?, price = ?, serving = ?,
                            ingredients = ?, weight = ?, imgs = ?", [
                        'i:category_id' => $this->category_id,
                        'i:goal_id' => $this->goal_id,
                        'i:merchant_it' => $this->merchant_id,
                        's:name' => $this->name,
                        's:description' => $this->description,
                        'i:price' => $this->price,
                        'i:serving' => $this->serving,
                        's:ingredients' => $this->ingredients,
                        's:weight' => $this->weight,
                        's:imgs' => $this->imgs,
                    ]);
                    break;
                case [false, false, true]:
                    $result = $database->query("INSERT INTO $tablename SET category_id = ?, goal_id = ?, merchant_id = ?, name = ?, description = ?, price = ?, serving = ?,
                                ingredients = ?, weight = ?, is_sale = ?, imgs = ?", [
                        'i:category_id' => $this->category_id,
                        'i:goal_id' => $this->goal_id,
                        'i:merchant_it' => $this->merchant_id,
                        's:name' => $this->name,
                        's:description' => $this->description,
                        'i:price' => $this->price,
                        'i:serving' => $this->serving,
                        's:ingredients' => $this->ingredients,
                        's:weight' => $this->weight,
                        's:is_sale' => $this->is_sale,
                        's:imgs' => $this->imgs,
                    ]);
                    break;
                case [true, false, true]:
                    $result = $database->query("INSERT INTO $tablename SET category_id = ?, goal_id = ?, merchant_id = ?, name = ?, description = ?, price = ?, serving = ?,
                                    ingredients = ?, weight = ?, is_sale = ?, is_featured = ?, imgs = ?", [
                        'i:category_id' => $this->category_id,
                        'i:goal_id' => $this->goal_id,
                        'i:merchant_it' => $this->merchant_id,
                        's:name' => $this->name,
                        's:description' => $this->description,
                        'i:price' => $this->price,
                        'i:serving' => $this->serving,
                        's:ingredients' => $this->ingredients,
                        's:weight' => $this->weight,
                        's:is_sale' => $this->is_sale,
                        's:is_featured' => $this->is_featured,
                        's:imgs' => $this->imgs
                    ]);
                    break;
                case [false, true, false]:
                    $result = $database->query("INSERT INTO $tablename SET category_id = ?, goal_id = ?, merchant_id = ?, name = ?, description = ?, price = ?, serving = ?,
                                        ingredients = ?, weight = ?, is_besteller = ?, imgs = ?", [
                        'i:category_id' => $this->category_id,
                        'i:goal_id' => $this->goal_id,
                        'i:merchant_it' => $this->merchant_id,
                        's:name' => $this->name,
                        's:description' => $this->description,
                        'i:price' => $this->price,
                        'i:serving' => $this->serving,
                        's:ingredients' => $this->ingredients,
                        's:weight' => $this->weight,
                        's:is_besteller' => $this->is_besteller,
                        's:imgs' => $this->imgs
                    ]);
                    break;
            }





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

    public function getImages(): array
    {
        /**
         * Nachdem $this->images ein JSON-Array ist, wandeln wir ihn hier in ein natives PHP Array um.
         */
        return json_decode($this->imgs);
    }

    /**
     * Prüfen, ob Bilder vorhanden sind in dem Raum.
     *
     * @return bool
     */
    public function hasImages(): bool
    {
        return !empty($this->getImages());
    }

    /**
     * Ein oder mehrere Bilder in $this->images hinzufügen.
     *
     * @param array $images
     *
     * @return array
     */
    public function addImages(array $imgs): array
    {
        /**
         * Zunächst holen wir uns die aktuelle Liste verknüpfter Bilder des Raumes als Array, ...
         */
        $currentImages = $this->getImages();
        /**
         * ... führen sie dann mit der Liste der hinzuzufügenden Bilder zusammen ...
         */
        $currentImages = array_merge($currentImages, $imgs);
        /**
         * ... und überschreiben die aktuelle Liste.
         */
        $this->setImages($currentImages);

        /**
         * Zum Abschluss geben wir die neue Liste der Bilder zurück.
         */
        return $currentImages;
    }

    /**
     * Ein oder mehrere Bilder aus den verknüpften Bildern des Raumes entfernen.
     *
     * @param array $images
     *
     * @return array
     */
    public function removeImages(array $imgs): array
    {
        /**
         * Zunächst holen wir uns die aktuelle Liste verknüpfter Bilder des Raumes als Array.
         */
        $currentImages = $this->getImages();
        /**
         * Nun filtern wir alle Bilder mit einer Callback-Funktion.
         */
        $filteredImages = array_filter($currentImages, function ($img) use ($imgs) {
            /**
             * Ein Element wird in das Ergebnis-Array übernommen, wenn die Callback Funktion true zurück gibt. Soll ein
             * Bild also entfernt werden, geben wir false zurück.
             */
            if (in_array($img, $imgs)) {
                return false;
            }
            return true;
        });
        /**
         * Nun überschreiben wir die aktuelle Liste verknüpfter Bilder des Raumes.
         */
        $this->setImages($filteredImages);

        return $filteredImages;
    }

    /**
     * Setter für Images.
     *
     * @param array $images
     *
     * @return array
     */
    public function setImages(array $imgs): array
    {
        /**
         * Hier indizieren wir das $images Array neu und konvertieren es in ein JSON. Das ist nötig, weil die JSON-
         * Konvertierung sonst ein Objekt und kein Array erzeugen würde - daher stellen wir sicher, dass die Arrray-
         * Indizes fortlaufend sind.
         */
        $this->imgs = json_encode(array_values($imgs));

        /**
         * Zum Abschluss geben wir die neue Liste der verknüpften Bilder zurück.
         */
        return $this->getImages();
    }
}
