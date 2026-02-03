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

                session()->set('to_edit_user_id', $userId);
                return redirect()->to('/user/edit');
            }
        }
    }
}
