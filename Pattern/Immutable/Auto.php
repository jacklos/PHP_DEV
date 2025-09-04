<?php

// Das Immutable-Pattern ist für Objekte gedacht, deren
// Werte sich nicht verändern sollen.
// Sondern von der Instanziierung an gleich bleiben

// Attribute müssen private sein - damit die Werte von Außerhalb nicht verändert werden können
// Ein Constructor macht fast immer sinn - für Initialwerte
// Getter, aber KEINE SETTER! - Damit wir die Werte lesen, aber nicht verändern können
// final -> damit von der Klasse nicht abgeleitet werden kann und die Subklasse unter Umständen doch die Attribute verändert.

final class Auto{
    private string $marke;
    private string $farbe;

    // Constructor
    public function __construct(string $marke, string $farbe) {
        $this->marke = $marke;
        $this->farbe = $farbe;
    }

    // Getter
    public function getMarke() {
        return $this->marke;
    }
    public function getFarbe() {
        return $this->farbe;
    }
}