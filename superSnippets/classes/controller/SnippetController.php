<?php 

class SnippetController {
    private PDO $dbh;


        public function __construct(PDO $dbh) {
        $this->dbh = $dbh;
    }


    // CRUD: Create - Read - Update - Delete

    public function save(Snippet $snippet) {
        if($snippet->getId() > 0) {
            $this->update($snippet);
        } else {
            $this->insert($snippet);
        }
    }

    public function insert($snippet) {
        // 1. SQL definieren
        $sql = "INSERT INTO snippets (title, description, code, language, tags, uid) VALUES (?,?,?,?,?,?)";
        // 2. SQL vorbereiten
        $stmt = $this->dbh->prepare($sql);
        // 3. SQL an die Datenbank schicken
        $stmt->execute([
            $snippet->getTitle(),
            $snippet->getDescription(),
            $snippet->getCode(),
            $snippet->getLanguage(),
            $snippet->getTags(),
            $_SESSION['user']->getId()
        ]);
    }
    public function findAll() {
        //$sql = "SELECT s.*, u.username, u.email FROM snippets s JOIN users u ON u.id = s.uid";
        $sql = 'SELECT * from snippets';
        $stmt = $this->dbh->query($sql);
        $results = $stmt->fetchAll();
        $snippets = $this->mapSnippetUser($results); // wandelt die Results(multidimenionales Array) in ein Array mit Snippet-Objekten um
        return $snippets;
    }

    /**
     * Holt alle Snippts von einem user aus der Datenbank
     * und zwar vom gerade eingeloggten Benutzer.. wenn wir nur die ID kennen würden
     * und die Daten evtl. nett in der home.tpl.php anzeigen.
     */
    public function findByUser(int $id){
 //$sql = "SELECT s.*, u.username, u.email FROM snippets s JOIN users u ON u.id = s.uid";
        $sql = 'SELECT * from snippets WHERE uid = ?';
        $stmt = $this->dbh->prepare($sql);
        $stmt->execute([$id]);
        $results = $stmt->fetchAll();
        
        $snippets = $this->mapSnippetUser($results); // wandelt die Results(multidimenionales Array) in ein Array mit Snippet-Objekten um
        return $snippets;

    }

    public function findSnippetById(int $id) {
        $sql = 'SELECT * from snippets WHERE id = ? AND uid = ? LIMIT 1';
        $stmt = $this->dbh->prepare($sql);
        $stmt->execute([
            $id,
            $_SESSION['user']->getId()
        ]);
        $results = $stmt->fetchAll(); // fetch() gibt uns einen Datensatz zurück, fetchAll() gibt uns ein Array mit allen gefunden Datensätzen zurück
        
        $snippets = $this->mapSnippetUser($results); // wandelt die Results(multidimenionales Array) in ein Array mit Snippet-Objekten um
        return $snippets[0];
    }
    public function update(Snippet $snippet) {
        $sql = "UPDATE snippets SET title = :title, description = :description, language = :language, code = :code, tags = :tags WHERE id = :id";
        $stmt = $this->dbh->prepare($sql);
        $stmt->execute([
            "title" => $snippet->getTitle(),
            "language" => $snippet->getLanguage(),
            "description" => $snippet->getDescription(),
            "code" => $snippet->getCode(),
            "tags" => $snippet->getTags(),
            "id" => $snippet->getId()
        ]);
    }

    public function delete(int $id) {
        $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT); // prüft ob die ID ein int ist
        if($id !== false && $id !== null ) {
            $sql = "DELETE FROM snippets WHERE id = ? AND uid = ? LIMIT 1";
            $stmt = $this->dbh->prepare($sql);
            $stmt->execute(
                [$id,
                $_SESSION['user']->getId()
            ]);
        } 
    }

    public function search(string $search) {
        $sql = "SELECT * FROM snippets WHERE title LIKE :search OR description LIKE :search OR tags LIKE :search OR language LIKE :search";
        $stmt = $this->dbh->prepare($sql);
        $stmt->execute([
            "search" => '%'.$search.'%'   // % ist eine Wildcard, vor und nach dem Suchwert darf weiteres stehen
        ]); 
        $results = $stmt->fetchAll(); // holt alle zutreffenden Snippets aus der DB

        $snippets = $this->mapSnippetUser($results); // wandelt die Results(multidimenionales Array) in ein Array mit Snippet-Objekten um
        return $snippets;
    }

    private function mapSnippetUser($results) {
        $uc = new UserController($this->dbh);

        $snippets = [];
        foreach($results as $result) {
            $snippet = new Snippet(); // Instanziiert ein SnippetObjekt
            $snippet->arrayToObject($result); // befüllt es
            $snippets[] = $snippet; // fügt das Snippet zum Array hinzu
            $user = $uc->findById($result['uid']); // sucht zu den Snippets die jeweiligen User aus der DB
            $snippet->setUser($user);
        }
        return $snippets;

    }
    
}