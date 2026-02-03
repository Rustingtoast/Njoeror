<?php

namespace App\Controllers;

use App\Models\UserEditModel;
use App\Entities\Person;
use App\Entities\UserRoles;

class UserEdit extends BaseController
{

    public function index()
    {
        $userId = session()->get('to_edit_user_id');
        if (!$userId) {
            return redirect()->to('/user/list');
        }

        if (!session()->get('user_email') || session()->get('user_role') != UserRoles::USER->value) {
            return redirect()->to('/login');
        }

        $model = new UserEditModel;
        $person = $model->getUserInformation($userId);

        $data = ['person' => $person];

        return view('useredit', $data);
    }

    public function save()
    {
        $status = "";
        $userId = session()->get('to_edit_user_id');
        if (!$userId) {
            return redirect()->to('/user/list');
        }

        $model = new UserEditModel();
        $person = $model->getUserInformation($userId);

        $changed_Vorname = false;
        $changed_Nachname = false;
        $changed_email = false;
        $changed_passwort = false;
        $changed_geburtsdatum = false;
        $changed_rolle = false;

        if ($person->getVorname() != ($_POST['INPUT_VORNAME'])) {
            $changed_Vorname = true;
        }

        if ($person->getNachname() != ($_POST['INPUT_NACHNAME'])) {
            $changed_Nachname = true;
        }

        if ($person->getEmail() != ($_POST['INPUT_EMAIL'])) {
            $changed_email = true;

            if (!$model->isEmailUnique($_POST['INPUT_EMAIL'])) {
                $status = "Fehler: E-Mail wird bereits verwendet.";

                $returnStatus = ['status' => $status, 'person' => $person];
                return view('useredit', $returnStatus);
            }
        }

        if (!empty($_POST['INPUT_PASSWORD'])) {
            $changed_passwort = !password_verify($_POST['INPUT_PASSWORD'], $person->getPasswortHash());
        }

        if ($person->getGeburtstag() != ($_POST['INPUTDATE_BIRTHDATE'])) {
            $changed_geburtsdatum = true;
        }

        if ($person->getRolle() != ($_POST['SELECT_Rolle'])) {
            $changed_rolle = true;
        }

        if (!$changed_Vorname && !$changed_Nachname && !$changed_email && !$changed_passwort && !$changed_geburtsdatum && !$changed_rolle) {
            $unchanged_status = "Keine Änderungen wurden festgestellt.";
            $returnStatus = ['status' => $unchanged_status, 'person' => $person];
            return view('useredit', $returnStatus);
        }

        $updated_Person = new Person();
        $updated_Person->setId($userId);
        $updated_Person->setVorname($_POST['INPUT_VORNAME']);
        $updated_Person->setNachname($_POST['INPUT_NACHNAME']);
        $updated_Person->setEmail($_POST['INPUT_EMAIL']);
        $updated_Person->setGeburtstag($_POST['INPUTDATE_BIRTHDATE']);
        $updated_Person->setRolle($_POST['SELECT_Rolle']);


        if ($changed_passwort) {
            $updated_Person->setPasswortHash(password_hash($_POST['INPUT_PASSWORD'], PASSWORD_DEFAULT));
        } else {
            $updated_Person->setPasswortHash("");
        }


        if ($model->updateUserInformation($updated_Person)) {
            $status = "Die Änderungen wurden gespeichert.";
            $returnStatus = ['status' => $status, 'person' => $updated_Person];
        } else {
            $status = "Fehler beim Speichern der Änderungen.";
            $returnStatus = ['status' => $status, 'person' => $updated_Person];
        }
        return view('useredit', $returnStatus);
    }

    public function back()
    {
        $userId = session()->remove('to_edit_user_id');
        return redirect()->to('/user/list');
    }
}
