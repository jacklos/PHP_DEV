<?php
require_once 'autoloading.php';
require_once 'db.php';

AbstractController::setDbh($dbh);
$fc = new FrontController('frontcontrollerbeispiel/');
$fc->run();  // ProductController->showAllAction()