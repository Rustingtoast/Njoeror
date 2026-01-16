<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use APP\Models\Formulara;

class Login extends BaseController
{
    public function text(){
        return view('login', []);
    }

}