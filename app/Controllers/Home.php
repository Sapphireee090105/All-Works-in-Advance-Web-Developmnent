<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        return view('welcome_message');
    }

    // Dapat nasa LOOB siya ng huling bracket na ito! 👇
    public function login()
    {
        return view('login_view');
    }
}