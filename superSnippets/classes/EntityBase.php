<?php

// abstrakte Klassen können nicht instanziiert werden
// sie dienen damit im Grunde "nur" der Vererbung
abstract class EntityBase { 

    public function arrayToObject(array $datas) {
        foreach($datas as $key => $data) {
            $setter = 'set'.ucfirst($key); // setUsername
            if(method_exists($this, $setter)) { // ruft nur Methoden auf, die es auch gibt!
                $this->$setter($data); // $this->setUsername('BENUTZERNAME')
            }
        }
    }
}