<?php 

// Abstrakte Klassen können nicht instanziiert werden
abstract class AbstractController {

    protected array $context = [];
    protected static PDO $dbh;

    public static function setDbh(PDO $dbh):void {
        // this -> zeigt auf das Objekt welches diese Methode aufruft
        // self -> zeigt auf die Klasse
        self::$dbh = $dbh;
    }

    protected function addContext($key, $value) {
        $this->context[$key] = $value;
    }

    public function display($template = null):void {
        extract($this->context); //$meineDaten = "hey";
        include 'tpl/default.tpl.php';
    }

}