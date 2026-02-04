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

        if (!session()->get('user_email') || (session()->get('user_role') == UserRoles::USER->value)) {
            return redirect()->to('/login');
        }

        $model = new UserEditModel;
        try {
            $person = $model->getUserInformation($userId);
        } catch (\Exception $e) {
            $returnStatus = ['error' => "Fehler ist beim Bearbeiten aufgetreten.", 'person' => $person];
            return view('useredit', $returnStatus);
        }
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
        try {
            $original_person = $model->getUserInformation($userId);
        } catch (\Exception $e) {
            $returnStatus = ['error' => "Fehler ist beim Bearbeiten aufgetreten.", 'person' => $original_person];
            return view('useredit', $returnStatus);
        }

        $changed_Person = new Person();
        $changed_Person->setVorname($_POST['INPUT_VORNAME']);
        $changed_Person->setNachname($_POST['INPUT_NACHNAME']);
        $changed_Person->setEmail($_POST['INPUT_EMAIL']);
        $changed_Person->setPasswortHash($_POST['INPUT_PASSWORD']);
        $changed_Person->setGeburtstag($_POST['INPUT_BIRTHDATE']);
        $changed_Person->setRolle($_POST['INPUT_ROLLE']);

        if (!$this->checkForChanges($original_person, $changed_Person)) {
            $returnStatus = ['info' => "Keine Änderungen wurden festgestellt.", 'person' => $changed_Person];
            return view('useredit', $returnStatus);
        }

        if ((!$model->isEmailUnique($changed_Person->getEmail()) && ($original_person->getEmail() != $changed_Person->getEmail()))) {
            $status = "Fehler: E-Mail wird bereits verwendet.";
            $original_person->setPasswortHash("");

            $returnStatus = ['error' => $status, 'person' => $original_person];
            return view('useredit', $returnStatus);
        }

        if ($changed_Person->getPasswortHash() != "") {
            $changed_Person->setPasswortHash(password_hash($changed_Person->getPasswortHash(), PASSWORD_DEFAULT));
        } else {
            $changed_Person->setPasswortHash($original_person->getPasswortHash());
        }


        if ($model->updateUserInformation($changed_Person)) {
            $success = "Die Änderungen wurden gespeichert.";
            $returnStatus = ['success' => $success, 'person' => $changed_Person];
        } else {
            $status = "Fehler beim Speichern der Änderungen.";
            $returnStatus = ['error' => $status, 'person' => $changed_Person];
        }
        return view('useredit', $returnStatus);
    }

    public function back()
    {
        $userId = session()->remove('to_edit_user_id');
        return redirect()->to('/user/list');
    }

    private function checkForChanges(Person $original, Person $updated): bool
    {
        $changed_Vorname = false;
        $changed_Nachname = false;
        $changed_email = false;
        $changed_passwort = false;
        $changed_geburtsdatum = false;
        $changed_rolle = false;

        if ($original->getVorname() != ($updated->getVorname())) {
            $changed_Vorname = true;
        }

        if ($original->getNachname() != ($updated->getNachname())) {
            $changed_Nachname = true;
        }

        if ($original->getEmail() != ($updated->getEmail())) {
            $changed_email = true;
        }

        if ($updated->getPasswortHash() != "") {
            $changed_passwort = !password_verify($updated->getPasswortHash(), $original->getPasswortHash());
        }

        if ($original->getGeburtstag() != ($updated->getGeburtstag())) {
            $changed_geburtsdatum = true;
        }

        if ($original->getRolle() != ($updated->getRolle())) {
            $changed_rolle = true;
        }

        if ($changed_Vorname || $changed_Nachname || $changed_email || $changed_passwort || $changed_geburtsdatum || $changed_rolle) {
            return true;
        }
        return false;
    }
}
