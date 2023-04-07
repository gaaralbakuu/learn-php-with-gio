<?php

namespace App\Entity;

use App\Enum\GenderStatus;
use App\Enums\GenderStatus as EnumsGenderStatus;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\OneToOne;
use Doctrine\ORM\Mapping\Table;

#[Entity]
#[Table('user_info')]
class UserInfo
{
    #[Id]
    #[Column, GeneratedValue]
    private int $id;

    #[Column]
    private string $name;

    #[Column]
    private GenderStatus $gender;

    #[OneToOne(inversedBy: 'id', cascade: ['persist', 'remove'])]
    private User $user;

    public function setName(string $name): UserInfo {
        $this->name = $name;
        return $this;
    }

    public function setGender(EnumsGenderStatus $gender): UserInfo {
        $this->gender = $gender;
        return $this;
    }

    public function setUser(User $user): UserInfo {
        $this->user = $user;
        return $this;
    }
}