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
        // 1. Tawagin ang UserModel mo
        $userModel = new \App\Models\UserModel();

        // 2. Kunin ang input mula sa login view form natin
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        // 3. DITO MO SYA ILALAGAY GAGI! Hahanapin niya sa Database table
        $user = $userModel->where('username', $username)->first();

        // 4. I-verify kung may nahanap na user at kung tama ang password
        if ($user) {
            // TANDAAN: Kung ang password mo sa database ay plain text (hindi naka-hash):
            if ($password === $user['password']) {
                
                // Kapag TAMA ang login, itatapon natin siya sa Profile List view!
                return redirect()->to('/users'); 
            }
        }

        // Kapag MALI ang login, babalik lang siya sa login layout
        return redirect()->to('/login');
    }
}