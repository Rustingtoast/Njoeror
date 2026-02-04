<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function getIndex(): string
    {
        if (!session()->get('user_email')) {
            return redirect()->to('/login');
        }
        return view('landing_page');
    }
}
