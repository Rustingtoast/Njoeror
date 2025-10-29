<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class Formular extends BaseController
{
    public function text()
    {
        // Pass data to the view if needed
        $data = [];

        return view('formular_text', $data);
    }
}