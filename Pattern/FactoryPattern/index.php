<?php 

// Factory-Pattern
// Kümmert sich um die Erzeugung(Instanziierung) von Objekten
// vorallem wenn wir viele Objekte mit gleicher Elternklasse haben, kann ich ein Factory-Pattern lohnen

// Statt immer "new Milch()", oder "new Brot()" zu schreiben, haben wir hier die Instanziierung standarisiert
// wir gehen immer über die Factory:
// $brot = ProductFactory::create("Brot");
// $milch = ProductFactory::create("Milch");
abstract class Product {
    protected string $name;
    protected float $price;
}


class Brot extends Product {}
class Kopfhörer extends Product {}
class Milch extends Product {}



class ProductFactory {
    public static function create(string $type): Product {
        switch($type) {
            case 'Brot':
                return new Brot();
            break;
            case 'Kopfhörer':
                return new Kopfhörer();
            break;
            case 'Milch':
                return new Milch();
            break;
            default:
                throw new InvalidArgumentException("Dieses Produkt(".$type.") gibt es nicht!");
            break;

        }
    }
}

// Exceptions die geworfen, aber nicht eingefangen werden, verursachen Fatal Errors
// Wir sollten diese stattdessen in einem Try-Catch abfangen. 
// Die Anweisungen im Try werden ausgeführt - sofern es geht
// sollte aber in dem Prozess eine invalidArgumentException auftauchen, gehen wir in den catch-Block
try {
    $brot = ProductFactory::create('Brot');
    $m = ProductFactory::create('qwertz');
} catch(InvalidArgumentException $e) {
    echo $e->getMessage();
}

echo '<pre>';
var_dump($brot);
echo '</pre>';
