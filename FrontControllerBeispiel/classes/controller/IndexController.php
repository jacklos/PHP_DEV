<?php 


class IndexController extends AbstractController {

    public function indexAction():void {
        $data = "MEINE DATEN";
        $this->display("tpl/start.tpl.php");
    }

    public function contactAction(): void {
        echo 'Kontaktseite!';
    }


}