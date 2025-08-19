<?php 

class ProductMapper{

    private PDO $dbh;

    public function __construct(PDO $dbh) {
        $this->dbh = $dbh;
    }


    public function insert() {}
    public function delete() {}
    public function find(int $id) {}
    
    public function findAll():array {
        $sql = 'SELECT * FROM products';
        $stmt = $this->dbh->query($sql);
        $results = $stmt->fetchAll();
        return $results;
    }
}