<?php 
// Polymorphie
// Verschiedene Klassen können verschiedene Methodendefinitionen besitzen
// Mithilfe einer Elternklasse, können methoden auf einen bestimmten Typen gemünzt werden(Tier)
// Jenachdem was für ein Objekt wir später mitschicken, wird die Methode des Objektes aufgerufen.



// Ein Interface ist sehr seeeehr ähnlich zu einer abstrakten Klasse, beide sind abstrakt.
// abstrakte Klassen können Methoden mit einem Körer besitzen, das können Interfaces nicht.



class Flugzeug {}

// abstrakte Klassen können nicht instanziiert(new Tier()) werden.
abstract class Tier {
    // Abstrakte Methoden haben keinen Methodenkörper
    function macheGeraeusche() {
        return 'irgendein Geraeusch';
    } 
}

class Maus extends Tier {} // Maus is-a Tier

class Elefant extends Tier { // Elefant is-a Tier
    function macheGeraeusche() { // Überschreibt die macheGeraeusche-Methode der Elternklasse
        return "Toorrööööööö!";
    }
}

class Loewe extends Tier { // Loewe is-a Tier
    function macheGeraeusche() {
        return "Raaawwwrr!";
    }
}

class Zebra extends Tier { // Zebra is-a Tier
    function macheGeraeusche() {
        return "Wuff Wuff";
    }
}

function lassDieTiereReden(Tier $tier) {
   echo $tier->macheGeraeusche();
}

$loewe = new Loewe();
lassDieTiereReden($loewe); // Raawwrr
lassDieTiereReden(new Maus()); // irgendein Geraeusch
lassDieTiereReden(new Elefant()); // Toorrööööööö

// a) Ausgabe: "Irgendein Geraeusch"
// b) Ausgabe: "Raaawwrr"
// c) Fatal Error