<?php

namespace App\Controllers;

use App\Models\UserCreationModel;
use App\Models\StatusUserCreation;
use App\Entities\UserRoles;
use App\Entities\Person;

class UserCreation extends BaseController
{
    public function index()
    {
        if (!session()->get('user_email') || (session()->get('user_role') == UserRoles::USER->value &&
            session()->get('user_role') != UserRoles::STAFF->value)) {
            return redirect()->to('/login');
        }
        return view('usercreation');
    }

    public function create()
    {

        $person = new Person();
        $person->setVorname($_POST["INPUT_VORNAME"]);
        $person->setNachname($_POST["INPUT_NACHNAME"]);
        $person->setEmail($_POST["INPUT_EMAIL"]);
        $person->setPasswortHash(password_hash($_POST["INPUT_PASSWORD"], PASSWORD_DEFAULT));
        $person->setGeburtstag($_POST["INPUTDATE_BIRTHDATE"]);
        $person->setLand($_POST["INPUT_COUNTRY"]);
        $person->setAdresse($_POST["INPUT_ADDRESS"]);
        $person->setHausnummer($_POST["INPUT_HOUSENUMBER"]);
        $person->setRolle($_POST["SELECT_Rolle"]);

        $model = new UserCreationModel;

        switch ($model->createUser($person)) {
            case StatusUserCreation::SUCCESS:
                $toUI = ['output' => "Benutzer erfolgreich erstellt."];
                break;
            case StatusUserCreation::ERROR_EMAIL_ALREADY_EXISTS:
                $toUI = ['error' => "Fehler: E-Mail ist bereits vergeben."];
                break;
            case StatusUserCreation::ERROR_QUERY_FAILED:
                $toUI = ['error' => "Fehler: Datenbankabfrage fehlgeschlagen."];
                break;
            case StatusUserCreation::ERROR_EXCEPTION:
                $toUI = ['error' => "Fehler: Ausnahme aufgetreten."];
                break;
        }

        return view('usercreation', $toUI);
    }

    public function back()
    {
        return redirect()->to('/user/list');
    }
}
