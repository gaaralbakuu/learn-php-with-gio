<?php

namespace App\Models;

use App\Model;

class User extends Model
{
    public function create(string $username, string $password, string $salt): int{
        // $this->db->createQueryBuilder()->select;
        $stmt = $this->db->createQueryBuilder();
        return (int) 1;
    }
}