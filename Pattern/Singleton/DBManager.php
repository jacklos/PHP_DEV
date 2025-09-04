<?php


// Ein Design-Pattern(Entwurfsmuster) ist ein Bauplan nach der wir eine Klasse basteln sollten, 
// damit sie bestimmte Aufgaben erledigt

// Das Singelton ist ein Design-Pattern, aus welchem später nur 1 Objekt instanziiert werden kann.


class DBManager {

    // Ein Attribut für die Instanz der Klasse
    private static ?DBManager $instance = null;

    // Ein privater Konstruktor verhindert, dass wir außerhalb der Klasse Instanzen erzeugen können
    private function __construct() {}

    // Statt "new DBManager()" rufen wir nun die statische Methode getInstance auf
    // Die prüft, ob wir bereits ein Objekt von DBManager in $instance haben
    // Wenn ja: wir das Objekt zurückgegeben
    // Wenn nein: wird ein neues Objekt erzeugt und zurückgegeben
    public static function getInstance():DBManager {
        if(self::$instance === null) {
            self::$instance = new DBManager();  // Erst wenn eine Instanz benötigt wird, wird ggf. eine erstellt(ähnlich zu LazyLoading)
        }
        return self::$instance;
    }
}


// $db1 = new DBManager();  // Funktioniert nicht, da der Konstruktor private ist
// $db und $db2 zeigen auf das selbe Objekt im Speicher
$db = DBManager::getInstance();
$db2 = DBManager::getInstance();
echo '<pre>';
var_dump($db);
var_dump($db2);
echo '</pre>';



