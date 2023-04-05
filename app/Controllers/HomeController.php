<?php

namespace App\Controllers;

use App\App;
use App\Models\SignUp;
use App\Models\SignUpInterface;
use App\Models\User;
use App\Models\UserInfo;
use App\Attributes\{Get, Post, Put};

class HomeController
{
    public function __construct(private SignUpInterface $signUp)
    {

    }

    #[Get("/")]
    #[Get("/home")]
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

    #[Put('/')]
    public function put()
    {
        return View::make("index");
    }

    #[Post('/')]
    public function post()
    {
        return View::make("index");
    }
}