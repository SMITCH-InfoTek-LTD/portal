<?php

namespace App\Controllers;

class Aboutus extends BaseController
{
    public function index(): string
    {
        return view('aboutus');
    }
}
