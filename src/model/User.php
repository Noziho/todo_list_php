<?php


namespace App\model;

class User extends AbstractEntity
{
    private string $name;
    private string $firstname;
    private string $mail;
    private string $password;

    public function __construct(string $name, string $firstname, string $mail, string $password)
    {
        $this->name = $name;
        $this->firstname = $firstname;
        $this->mail = $mail;
        $this->password = $password;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;
        return $this;
    }

    public function getFirstname(): string
    {
        return $this->firstname;
    }

    public function setFirstname(string $firstname): self
    {
        $this->firstname = $firstname;
        return $this;
    }

    public function getMail(): string
    {
        return $this->mail;
    }

    public function setMail(string $mail): self
    {
        $this->mail = $mail;
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




}