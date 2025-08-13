<?php 

class Snippet extends EntityBase {
    private int $id = 0;
    private string $title;
    private string $description;
    private string $code;
    private String $language;
    private String $tags;
    private string $createdAt;
    private string $updatedAt;
    private User $user;


    /**** GETTERS & SETTERS ****/
    public function getCreatedAtFormatted($format = 'y.m.d h:i.s') {
        $date = new DateTime($this->createdAt);
        return $date->format($format);
    }
    
    /**
     * Get the value of id
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * Set the value of id
     */
    public function setId(int $id): self
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of title
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * Set the value of title
     */
    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get the value of description
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * Set the value of description
     */
    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get the value of code
     */
    public function getCode(): string
    {
        return $this->code;
    }

    /**
     * Set the value of code
     */
    public function setCode(string $code): self
    {
        $this->code = $code;

        return $this;
    }

    /**
     * Get the value of language
     */
    public function getLanguage(): String
    {
        return $this->language;
    }

    /**
     * Set the value of language
     */
    public function setLanguage(String $language): self
    {
        $this->language = $language;

        return $this;
    }

    /**
     * Get the value of tags
     */
    public function getTags(): String
    {
        return $this->tags;
    }

    /**
     * Set the value of tags
     */
    public function setTags(String $tags): self
    {
        $this->tags = $tags;

        return $this;
    }

    /**
     * Get the value of createdAt
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Set the value of createdAt
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Get the value of updatedAt
     */
    public function getUpdatedAt(){
        return $this->updatedAt;
    }

    /**
     * Set the value of updatedAt
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt ?? '';

        return $this;
    }

    /**
     * Get the value of user
     */
    public function getUser(): User
    {
        return $this->user;
    }

    /**
     * Set the value of user
     */
    public function setUser(User $user): self
    {
        $this->user = $user;

        return $this;
    }
}


