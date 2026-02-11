<?php

namespace App\Controllers;

class Logout extends BaseController
{
    public function index()
    {
        session()->remove('user_email');
        session()->remove('user_role');

        return redirect()->to('/login');
    }
}
