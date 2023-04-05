<?php

namespace App\Controllers;

class InvoiceController
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