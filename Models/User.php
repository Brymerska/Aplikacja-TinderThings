<?php

class User {
    private $id;
    private $email;
    private $password;
    private $name;
    private $role;

    public function __construct(
        string $email,
        string $password,
        string $name,
        int $id
    ) {
        $this->email = $email;
        $this->password = $password;
        $this->name = $name;
        $this->id = $id;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function getEmail(): string
    {
        return $this->email;
    }


    public function getRole(): array
    {
        return $this->role;
    }

    public function getName(): string
    {
        return $this->name;
    }

}