<?php

namespace App\Controllers;

class Account
{
    public function register(): View
    {

        return View::make("account/register");
    }
}