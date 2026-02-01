<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use APP\Models\Formulara;

class Formular extends \CodeIgniter\Controller
{

    public function index()
    {
        echo '<h2> Hello there </h2>';
    }
    public function move()
    {
        return redirect()->to('/home');
    }

    public function createView()
    {
        //$formModel = new Formulara();

        //$status = $formModel->testConnection();

        //return view('formular_text', ['dbStatus' => $status]);
        return view('formular_text', []);
    }

    public function request()
    {
        $db = \Config\Database::connect();

        // Try a trivial query
        $query = $db->query('SELECT * FROM Person');

        if ($query) {
            $rowObj = $query->getRow();               // stdClass with properties ID, Vorname, …
            echo $rowObj->Vorname;
        } else {
            $err = $db->error();   // ['code'=>..., 'message'=>...]
            echo "<p>❌ Connection failed.</p>";
            echo "<pre>";
            echo "Error code: {$err['code']}\n";
            echo "Message   : {$err['message']}\n";
            echo "</pre>";
        }
    }
}
