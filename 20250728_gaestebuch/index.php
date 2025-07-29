<?php

// Platz für Logik
require_once 'classes/Entry.php'; // laden der Klasse
//$filename = "entries.txt"; 

$entries = readFromFile(); // Array mit den Einträgen

//echo '<pre>';
//var_dump($entries);
//echo '</pre>';

function writeInFile($filename, $entries) {
    $str = serialize($entries); // Wandelt den komplexen Datentyp(Array mit Objekten) in einen String um.
    file_put_contents($filename, $str); // Speichert den String in der Textdatei ab.
}

function readFromFile() {
                        // liest den Inhalt aus der Textdatei
            // Macht aus dem String ein Array mit Eintrags-Objekten
    // gibt das Array zurück                    
    return unserialize(file_get_contents("entries.txt"));

}

// In diesem Fall ist das switch unser Controller
// Das Gehirn unseres Programms
// Jenachdem welchem Link die User angeklickt haben
// steht unterschiedliches in der Action(URL)
// Genau das schaut sich das switch an und entscheidet was passieren soll
$formtpl = "tpl/newForm.tpl.php";
if(isset($_GET['action'])) {
    switch ($_GET['action']) {
        case 'new': // Das Formular wurde abgeschickt - Ein neuer Eintrag soll erstellt werden
            
            // Instanziierung und Befüllung des Eintrags
            $entry = new Entry();
            $entry->setUsername($_POST['username']);
            $entry->setSubject($_POST['subject']);
            $entry->setMsg($_POST['msg']);

            $entries[] = $entry; // Eintrag wird ins Array gestopft

            writeInFile("entries.txt", $entries); // Speichert das Array in eine Text-Datei
            header("Location: index.php"); // Weiterleitung;
            exit();
            break;
        case 'delete': // Der Delete-Button wurde geklickt
            unset($entries[$_GET['index']]); // Entfernt das Element an der bestimmten Position
            $entries = array_values($entries); // Neuindexierung damit es keine Lücken gibt
            writeInFile("entries.txt", $entries); // Speichern

            header("Location: index.php"); // Weiterleitung;
            exit();

            break;
        case 'update': // Es wurde auf den Update-Button geklickt
            $formtpl = "tpl/updateForm.tpl.php";
            break;
        case 'updateSave':
            $entries[$_POST['index']]->setUsername($_POST['username']);
            $entries[$_POST['index']]->setSubject($_POST['subject']);
            $entries[$_POST['index']]->setMsg($_POST['msg']);
            writeInFile("entries.txt", $entries); // Speichern

            header("Location: index.php"); // Weiterleitung;
            exit();

            break;
        default:
            break;
    }
}
include "tpl/base.tpl.php";