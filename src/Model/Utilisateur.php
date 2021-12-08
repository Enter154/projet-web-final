<?php

namespace App\model;

class Utilisateur
{
    private int $id;
    private string $username;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): self
    {
        $this->id = $id;

        return $this;
    }

    public function getUsername(): int
    {
        return $this->username;
    }

    public function setUsername(int $username): self
    {
        $this->username = $username;

        return $this;
    }

}