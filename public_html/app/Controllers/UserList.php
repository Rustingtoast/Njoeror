<?php

namespace App\Controllers;

use App\Models\UserListModel;

class UserList extends BaseController
{
    public function index()
    {
        $model = new UserListModel();
        $names = $model->getAllUsers();
        $data = [
            'names' => $names,
        ];

        return view('userlist', $data);
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
