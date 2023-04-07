<?php

namespace App\Entity;

use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\Table;

#[Entity]
#[Table('users')]
class User
{
    #[Id]
    #[Column, GeneratedValue]
    private int $id;

    #[Column]
    private string $username;

    #[Column]
    private string $password;

    #[Column]
    private string $salt;

    public function setUsername(string $username): User
    {
        $this->username = $username;
        return $this;
    }

    public function setPassword(string $password): User
    {
        $this->password = $password;
        return $this;
    }

    public function setSalt(string $salt): User
    {
        $this->salt = $salt;
        return $this;
    }

    public function getUsername(): string{
        return $this->username;
    }

    public function getPassword(): string{
        return $this->password;
    }

    public function getSalt(): string{
        return $this->salt;
    }
}
