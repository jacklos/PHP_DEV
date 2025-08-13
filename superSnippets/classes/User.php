<?php

class User extends EntityBase {
    private int $id = 0;
    private string $username;
    private string $email;
    private string $password;
    private DateTime $createdAt;
    private DateTime $updatedAt;
    private bool $agbOk;
/*
    public function __construct(string $username, string $email, string $password, bool $agbOk)
    {
        $this->username = $username;
        $this->email = $email;
        $this->password = $password;
        $this->agbOk = $agbOk;
    }
*/
    /**
     * $_POST = [
     *  'username' => 'BENUTZERNAME',
     *  'email' => 'a@a.de',
     *  'password' => 'Geheim',
     * ....
     * ]
     */
    // Die arrayToObject-Methode ist eine selbstdefinierte Methode
    // die ein Array als Parameter erwartet und das Objekt selbstständig
    // mithilfe des Arrays befüllt.



    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): self
    {
        $this->id = $id;
        return $this;
    }

    public function getUsername(): string
    {
        return $this->username;
    }

    public function setUsername(string $username): self
    {
        $this->username = $username;
        return $this;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;
        return $this;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;
        return $this;
    }

    public function setHashedPassword(string $password) {
        $this->password = password_hash($password, PASSWORD_DEFAULT);
    }

    public function getCreatedAt(): DateTime
    {
        return $this->createdAt;
    }

    public function setCreatedAt(string $createdAt): self
    {
        $this->createdAt = new DateTime($createdAt);
        return $this;
    }

    public function getUpdatedAt(): DateTime
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt($updatedAt): self
    {
        if($updatedAt != null ){
            $this->updatedAt = new DateTime($updatedAt);
        }
        return $this;
    }

    public function getAgbOk(): bool
    {
        return $this->agbOk;
    }

    public function setAgbOk(bool $agbOk): self
    {
        $this->agbOk = $agbOk;
        return $this;
    }
}