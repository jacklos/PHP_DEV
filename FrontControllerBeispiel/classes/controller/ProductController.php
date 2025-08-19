<?php 

class ProductController extends AbstractController {

    public function indexAction():void {
        //$pm = new ProductMapper(self::$dbh);
        //$products = $pm->findAll();
        //$this->addContext("products", $products); // damit die Daten im tpl anzusprechen sind($meineDaten)
        //$this->display("tpl/productlist.tpl.php"); // neben dem Default-tpl auch die start.tpl.php anzeigen
    }

    public function newAction():void {
        echo 'Hier werden Produkte gespeichert';
    }

    public function deleteAction($id) {
        echo 'Hier wird ein Produkt mit der id:'.$id.' gelöscht!';
        // ALT: $tpl = "tpl/danke.tpl.php";
        // NEU: $this->display("tpl/danke.tpl.php");
    }

    public function showAllAction($filter) {
        // daten holen
        echo $filter;
    }

}