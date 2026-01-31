<?php

namespace App\Controllers;

use App\Models\UserListModel;

class UserList extends BaseController
{
    public function index()
    {
        $model = new UserListModel();
        $userlist = $model->getAllUsers();
        $data = [
            'userlist' => $userlist,
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

    public function new()
    {
        if (isset($_POST["BUTTON_CreateUser"])) {
            return redirect()->to('/user/creation');
        }
    }

    public function user_operation()
    {
        foreach ($_POST as $key => $value) {
            if (strpos($key, 'BUTTON_edit_') == 0) {
                $userId = str_replace('BUTTON_edit_', '', $key);

                session()->setFlashdata('to_edit_user_id', $userId);
                return redirect()->to('/user/edit');
            }
        }
    }
}
