<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\RegisterModel;
use App\Models\StatusRegister;
use App\Entities\Person;

class Register extends BaseController
{
    public function index()
    {
        return view('register', []);
    }

    public function register()
    {
        $person = new Person();
        $person->setId(null);
        $person->setVorname($_POST['INPUT_vorname']);
        $person->setNachname($_POST['INPUT_nachname']);
        $person->setEmail($_POST['INPUT_email']);
        $person->setGeburtstag($_POST['INPUT_birthdate']);
        $person->setRolle($_POST['INPUT_rolle']);

        if ($_POST['INPUT_password'] !== $_POST['INPUT_password2']) {
            return view('register', ['status' => 'Passwörter stimmen nicht überein.']);
        }

        $person->setPasswortHash(password_hash($_POST['INPUT_password'], PASSWORD_DEFAULT));

        $model = new RegisterModel();
        switch ($model->registerNewUser($person)) {
            case StatusRegister::SUCCESS:
                return redirect()->to('/login');
            case StatusRegister::ERROR_EMAIL_ALREADY_EXISTS:
                return view('register', ['status' => 'E-Mail existiert bereits.']);
            case StatusRegister::ERROR_QUERY_FAILED:
                return view('register', ['status' => 'Datenbankabfrage fehlgeschlagen.']);
            case StatusRegister::ERROR_EXCEPTION:
                return view('register', ['status' => 'Ein Fehler ist aufgetreten.']);
            default:
                return view('register', ['status' => 'Unbekannter Fehler bei der Registrierung.']);
        }
    }
}
