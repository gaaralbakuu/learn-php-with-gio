<?php

namespace App\Controllers;

class AccountController
{

    public function __construct()
    {
    }

    public function register(): View
    {
        return View::make("account/register");
    }
}