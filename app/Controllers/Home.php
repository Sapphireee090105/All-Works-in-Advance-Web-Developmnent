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

    public function checkLogin()
    {
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        // BASTOS LOG-IN: Imbento muna tayong account para ma-test mo agad!
        if ($username === 'admin' && $password === 'password123') {
            return redirect()->to('/users'); 
        }

        return redirect()->to('/login');
    }
}