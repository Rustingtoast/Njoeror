<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        if (!session()->get('user_email')) {
            return redirect()->to('/login');
        }
        return view('welcome_message');
    }

    public function move()
    {
        print_r($_POST);

        if (isset($_POST["BUTTON_Reservation"])) {
            echo "<p>Buchung wurde ausgewählt</p>";
        }
        if (isset($_POST["BUTTON_Admin"])) {
            echo "<p>Admin Panel wurde ausgesucht</p>";
        }
    }
}
