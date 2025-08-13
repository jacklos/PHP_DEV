<?php

// config.php
function autoload(string $className): void {
    // $className = 'UserController'
    $c = (substr($className, -10) == "Controller") ? 'controller/' : '';
    $path = './classes/' . $c . str_replace('\\', '/', $className) . '.php'; // "classes/User.php"
    //var_dump($path);
    if (file_exists($path)) {
        require_once $path;
    }
}

spl_autoload_register('autoload');

session_start(); // im besten Fall nach dem Autoloader
require_once "helper/db.php";

$get = filter_input_array(INPUT_GET);
// ENDE CONFIG

$action = $get['action'] ?? 'home';
switch($action) {

    case 'home':
        $sc = new SnippetController($dbh);
        if(isset($_SESSION['user'])) {
            $snippets = $sc->findByUser($_SESSION['user']->getId());
        } else {
            $snippets = [];
        }
        $tpl = 'home.tpl.php';
        break;
    case 'register':
        $tpl = 'registerForm.tpl.php';
        break;
    case 'login':
        $tpl = 'loginForm.tpl.php';
        break;
    case 'loginUser':
        $post = filter_input_array(INPUT_POST);
        // in $user ist nun ein Userobjekt mit den ganzen Daten aus der DB drin
        // oder ein NULL, falls kein User mit dem Namen in der DB gefunden wurde
        $user = (new UserController($dbh))->findByUsername($post['username']);  //testuser123
        
        // short cirquit
        if($user != null && password_verify($post['password'], $user->getPassword())) {
            $_SESSION['user'] = $user;
            header('Location: index.php');
            die();
        } else { // User gefunden, aber passwort falsch
            header('Location: index.php?action=login&error=true');
            die();
        }
        break;
        case 'logout':
            session_destroy();
            header('Location: index.php');
            break;
        case 'regUser':
            // TODO: Prüfen ob beide Passwörter gleich sind
            // und AGB gesetzt ist
            $post = filter_input_array(INPUT_POST);
            $user = new User();
            $user->arrayToObject($post);
            $user->setHashedPassword($post['password']); 
            $uc = new UserController($dbh);
            $uc->save($user);
            header('Location: index.php?action=login');
            die();
            break;
        case 'newSnippet':
            $tpl = "assets/tpl/snippetForm.tpl.php";
        break;
        case 'saveSnippet':
            $post = filter_input_array(INPUT_POST); // Formulardaten abgreifen
            $snippet = new Snippet(); // neues Snippet instanziieren
            $snippet->arrayToObject($post); // Snippet mit den Daten aus dem Formular befüllen
            $sc = new SnippetController($dbh); // SnippetController Instanziieren
            $sc->save($snippet);  // Speichernmethode aufrufen
            header('Location: index.php'); // Weiterleitung
            die();
            break;
        case 'viewSnippet':
            // das gewünschte Snippet aus der Datenbank holen
            $sc = new SnippetController($dbh);
            $snippet = $sc->findSnippetById($get['id']);
            $tpl = "assets/tpl/detailSnippet.tpl.php";
            // tpl definieren
            break;
        case 'editSnippet':
            // TODO: Editfunktionalität programmieren!
            // 1 Teil: Snippetformular mit den Daten des zu editierenden Snippets anzeigen
            $sc = new SnippetController($dbh);
            $snippet = $sc->findSnippetById($get['id']);
            $tpl = "assets/tpl/snippetForm.tpl.php";


            // 2 Teil: Daten in einem anderen Case einfangen und den Datensatz in der Datenbank editieren
            break;
        case 'deleteSnippet':
            $sc = new SnippetController($dbh);
            $sc->delete($get['id']);
            header('Location: index.php');
            die();
            break;
            case "search": 
                $post = filter_input_array(INPUT_POST);
                $search = $post['search'];
                $sc = new SnippetController($dbh);
                $snippets = $sc->search($search);

                $tpl = "assets/tpl/home.tpl.php";
                
            break;
            
}



include_once "assets/tpl/base.tpl.php";
