<?php

namespace App\Controllers;

use App\Models\UserCreationModel;

class UserCreation extends BaseController
{
    public function index()
    {
        return view('usercreation');
    }

    public function create()
    {
        $vorname = $_POST["INPUT_VORNAME"];
        $nachname = $_POST["INPUT_NACHNAME"];
        $email = $_POST["INPUT_EMAIL"];
        $psw = $_POST["INPUT_PASSWORD"];
        $birthdate = $_POST["INPUTDATE_BIRTHDATE"];
        $rolle = $_POST["SELECT_Rolle"];

        $model = new UserCreationModel;
        $data = $model->createUser($vorname, $nachname, $email, $psw, $birthdate, $rolle);

        $toUI = ['output' => $data];

        return view('usercreation', $toUI);
    }

    public function back()
    {
        return redirect()->to('/user/list');
    }
}
