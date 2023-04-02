<?php

namespace App\Controllers;

class Invoice
{
    public function index(): View
    {
        return View::make("invoices/index");
    }

    public function create(): View
    {
        return View::make("invoices/create");
    }
}