<?php 
class Entry {
    private $username;
    private $subject;
    private $msg;

    

    /**
     * Get the value of username
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Set the value of username
     */
    public function setUsername($username): self
    {   // htmlspecialchars() - wandelt nur die wichtigsten HTML-Zeichen um
        // htmlentities() - wandelt ALLE HTML-Zeichen um
        // strip_tags() - entfernt HTML-Zeichen
        $this->username = htmlentities($username);

        return $this;
    }

    /**
     * Get the value of subject
     */
    public function getSubject()
    {
        return $this->subject;
    }

    /**
     * Set the value of subject
     */
    public function setSubject($subject): self
    {
        $this->subject = htmlentities($subject);

        return $this;
    }

    /**
     * Get the value of msg
     */
    public function getMsg()
    {
        return $this->msg;
    }

    /**
     * Set the value of msg
     */
    public function setMsg($msg): self
    {
        $this->msg = htmlentities($msg);

        return $this;
    }
}