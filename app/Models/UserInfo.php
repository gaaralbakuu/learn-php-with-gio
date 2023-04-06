<?php

namespace App\Models;

use App\Model;

class UserInfo extends Model
{
    public function create(int $user_id, string $name, int $gender): int{

        // $stmt = $this->db->prepare("INSERT INTO user_info(user_id, name, gender) VALUES (?, ?, ?)");

        // $stmt->execute([$user_id, $name, $gender]);
        return 1;
        // return (int) $this->db->lastInsertId();
    }
}