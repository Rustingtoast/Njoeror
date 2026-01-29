<?php

namespace App\Controllers;

//use App\Models\UserCreationModel;

class UserCreation extends BaseController
{
    public function index()
    {
        return view('usercreation');
    }

    public function create()
    {
        echo '<pre>';
        print_r($_POST);
        echo '</pre>';
    }

    public function back()
    {
        return redirect()->to('/user/list');
    }
}
