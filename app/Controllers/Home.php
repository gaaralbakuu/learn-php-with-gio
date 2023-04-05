<?php

namespace App\Controllers;

use App\App;
use App\Models\SignUp;
use App\Models\SignUpInterface;
use App\Models\User;
use App\Models\UserInfo;

class Home
{
    public function __construct(private SignUpInterface $signUp)
    {
        
    }

    public function index(): View
    {
        $username = "phamminhdat";
        $salt = md5(time());
        $password = md5($salt . "123456" . $salt);
        $name = "Phạm Minh Đạt";
        $gender = 0;

        $userModel = new User();
        $userInfoModel = new UserInfo();
        $this->signUp->register(
            [
                "username" => $username,
                "salt" => $salt,
                "password" => $password
            ],
            [
                "name" => $name,
                "gender" => $gender
            ]
        );

        return View::make("index");
    }
}