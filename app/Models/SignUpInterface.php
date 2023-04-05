<?php
namespace App\Models;

interface SignUpInterface {
    public function register(array $user, array $userInfo): int;
    
}