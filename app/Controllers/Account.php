<?php

namespace App\Controllers;

class Account
{

    public function __construct()
    {
    }

    public function register(): View
    {
        return View::make("account/register");
    }
}