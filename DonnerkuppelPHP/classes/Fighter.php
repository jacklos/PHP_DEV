<?php

class Fighter {
    // Intsnazattribute
    //private int $posX;
    //private int $posY;
    //private array $inventar = [];
    private string $name;
    private int $str; // Stärke
    private int $dex; // Geschicklichkeit
    private int $luck; // Glück
    private int $hp = 100; // Lebenspunkte(Gesundheit)


    // In den meisten Fällen wird der Konstruktor zum befüllen der Objekte genutzt
    // Der Konstruktor wird automatisch beim 'new' aktiv
    public function __construct(string $name) {
        $this->name = $name;
        $this->str = rand(5,10);
        $this->dex = rand(5,10);
        $this->luck = rand(5,10);
        echo 'Neuer Fighter '.$this->name.' wurde instanziiert<br/>';
    }

    
    /** Instanzmethoden
     *  Berechnet den Schaden anhand der Attribute und Pseudozufall
     */
    public function calcDmg():int {
        $dmg = $this->str * 2 + rand(2,7);
        return $dmg;
    }

    private function dodge():bool {
                //    5        *            7              +     7
        return $this->getDex() * rand(2, $this->getLuck()) + $this->getLuck() > 75;
    }

    public function punch(Fighter $opponent):void {
        if(!$opponent->dodge()) { // Treffers
            $dmg = $this->calcDmg(); // 15
            $opponent->takeDmg($dmg);
            echo '<tr><td>'.$this->getName() . ' hat zugeschlagen! '.$opponent->getName().' hat noch '.$opponent->getHp().'hp</td></tr>';
        } else { // Ausweichen
            echo '<tr><td>'.$opponent->getName().' ist ausgwichen</td></tr>';
        }   
    }   

    private function takeDmg(int $dmg) {
        $this->setHp($this->getHp()-$dmg);
    }

    public function isAlive():bool {
        return $this->getHp() > 0;
    }


    /**
     * Get the value of name
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * Set the value of name
     */
    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get the value of str
     */
    public function getStr(): int
    {
        return $this->str;
    }

    /**
     * Set the value of str
     */
    public function setStr(int $str): self
    {
        $this->str = $str;

        return $this;
    }

    /**
     * Get the value of dex
     */
    public function getDex(): int
    {
        return $this->dex;
    }

    /**
     * Set the value of dex
     */
    public function setDex(int $dex): self
    {
        $this->dex = $dex;

        return $this;
    }

    /**
     * Get the value of luck
     */
    public function getLuck(): int
    {
        return $this->luck;
    }

    /**
     * Set the value of luck
     */
    public function setLuck(int $luck): self
    {
        $this->luck = $luck;

        return $this;
    }

    /**
     * Get the value of hp
     */
    public function getHp(): int
    {
        return $this->hp;
    }

    /**
     * Set the value of hp
     */
    public function setHp(int $hp): self
    {
        if($hp >= 0) {
            $this->hp = $hp;
        } else { // wenn hp kleiner 0 ist
            $this->hp = 0;
        }

        return $this;
    }
}




/*

class Produkt {
    private int $preis;

    public function getPreis():int {
        return $this->preis;
    }

    // Virtuelles Attribut
    // Es gibt den Wert nicht wirklich als Attribut
    public function getPreisMitMwst(int $steuersatz):int {
        return $this->preis * $steuersatz;
    }
}
    */