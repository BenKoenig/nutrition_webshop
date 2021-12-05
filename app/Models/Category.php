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
class Category extends AbstractModel
{

    const TABLENAME = 'categories';

    use SoftDelete;

    public function __construct(
        public ?int $id = null,
        public string $name = '',
        public string $imgs = '[]',
        public int $is_popular = -1,
        public string $created_at = '',
        public string $updated_at = '',
        public ?string $deleted_at = null
    ) {
    }

    public function save(): bool
    {
        //creates connection to database
        $database = new Database();

        //calculates tablname
        $tablename = self::getTablenameFromClassname();

        //checks if table already exists
        if (!empty($this->id)) {

            return $database->query("UPDATE $tablename SET name = ?, imgs = ?, is_popular = ? WHERE id = ?", [
                's:name' => $this->name,
                's:imgs' => $this->imgs,
                'i:is_popular' => $this->is_popular,
                'i:id' => $this->id
            ]);
        } else {
            //creates new id

            $result = $database->query("INSERT INTO $tablename SET name = ?, imgs = ?, is_popular = ?", [
                's:name' => $this->name,
                's:imgs' => $this->imgs,
                'i:is_popular' => $this->is_popular,
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
