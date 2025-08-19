<?php

// Der FrontController schaut sich die URL an
// und ruft abhängig davon bestimmte Methoden von Controllern auf

// url: www.superProjekt.de/product/new
// -> ProductController
// -> newAction()

// url: www.superProjekt.de/product/delete/5
// -> ProductController
// -> deleteAction(5)

// url: www.superProjekt.de/angebot/show
// -> AngebotController
// -> showAction()

// url: www.superProjekt.de/
// -> IndexController
// -> indexAction()

class FrontController {

    const DEFAULT_CONTROLLER = 'IndexController';
    const DEFAULT_ACTION = 'indexAction';

    private string $controller = SELF::DEFAULT_CONTROLLER;
    private string $action = SELF::DEFAULT_ACTION;
    private array $params = [];
    private string $basePath;

    public function __construct($basePath = ''){
         $this->basePath = $basePath;
         $this->parseURL();
    }


    public function parseURL():void {
        $path = trim($_SERVER['REQUEST_URI'], '/');

        // 'frontcontrollerbeispiel/' entfernen
        if(strpos($path, $this->basePath) == 0) {
            $path = substr($path, strlen($this->basePath));
        }

        // c->controller, a->action, p->params
        // list stopft die elemente eines Arrays in die Variablen $c, $a, $p
        // @ -> error control operator -> Verhindert das Anzeigen von Warnungen
        @list($c, $a, $p) = explode('/', $path, 3);

        if(isset($c)) { // $c -> user
            $this->setController($c);
        }

        if(isset($a)) { // $a -> new
            $this->setAction($a);
        }

        if(isset($p)) {
            $this->setParams($p);
        }

        // product -> 'ProductController'
        // delete -> 'deleteAction'
        // 3 -> 3
    }

    // user -> UserController // snippet -> SnippetController
    private function setController($controller): void {
        $controller = ucfirst(strtolower($controller)).'Controller'; // SnippetController
        if(class_exists($controller)) {
            $this->controller = $controller;
        }
    }

    // Mithilfe einer ReflectionKlasse können wir auf die Struktur einer Klasse zugreifen
    // in diesem Fall prüfen wir ob eine bestimmte Methode in dieser Klasse existiert.
    private function setAction($action): void {
        $action = strtolower($action).'Action'; // newAction
        $rc = new ReflectionClass($this->controller);
        if($rc->hasMethod($action)) {
            $this->action = $action;
        }
    }

    private function setParams($params): void {
        $this->params = explode('/', $params); //'1/2/3/4' => [1,2,3,4]
    }

    public function run():void {
        // call_user_func_array ruft eine beliebige Methode eines Objektes auf
                                //Objekt                //Methode         //Parameter   $controller->newAction($params)
        call_user_func_array([new $this->controller(), $this->action], $this->params);
    }

}