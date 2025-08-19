<?php

const HOST = 'mysql';
const DB_NAME = 'supersnippets';
const DB_USER = 'root';
const DB_PASSWORD = '';

// DSN Data-Source-Name: mysql:host=localhost;dbname=erstesDBProjekt
$dsn = 'mysql:host='.HOST.';dbname='.DB_NAME;

$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, // Für die Entwicklung 
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
];

try {  // PDP - PDO DATA OBJECT
    $dbh = new PDO($dsn, DB_USER, DB_PASSWORD, $options); // Versucht eien DB-Verbindung aufzubauen
    //echo 'DB Verbindung aufgebaut!';
} catch(\PDOException $e) {
    echo 'Irgendetwas ist schief gelaufen!<br />';
    echo $e->getMessage(); // Zeigt die Fehlermeldung an
}