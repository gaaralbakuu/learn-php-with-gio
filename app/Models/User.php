<?php

namespace App\Models;

use App\Model;

class User extends Model
{
    public function create(string $username, string $password, string $salt): int{
        $stmt = $this->db->prepare("INSERT INTO users(username, password, salt) VALUES (?, ?, ?)");

        $stmt->execute([$username, $password, $salt]);

        return (int) $this->db->lastInsertId();
    }
}