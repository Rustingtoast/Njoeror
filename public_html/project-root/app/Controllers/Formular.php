<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use APP\Models\Formulara;

class Formular extends BaseController
{
    public function text(){
        // $formModel = new Formulara();

        // $status = $formModel->testConnection();

        // return view('formular_text', ['dbStatus' => $status,]);
        return view('formular_text', []);
    }

}