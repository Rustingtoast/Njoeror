<?php

namespace App\Controllers;

use App\Models\UserEditModel;

class UserEdit extends BaseController
{
    public function index()
    {
        $userId = session()->getFlashdata('to_edit_user_id');
        if (!$userId) {
            return redirect()->to('/user/list');
        }

        $model = new UserEditModel;
        $person = $model->getUserInformation($userId);

        $data = ['person' => $person];

        return view('useredit', $data);
    }

    public function back()
    {
        return redirect()->to('/user/list');
    }
}
