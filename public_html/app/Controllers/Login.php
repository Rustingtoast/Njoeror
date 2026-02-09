<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\LoginModel;
use App\Models\StatusLogin;

class Login extends BaseController
{
    public function index()
    {
        return view('login', []);
    }

    public function login()
    {
        $email = $_POST['INPUT_email'];
        $password = $_POST['INPUT_password'];

        $model = new LoginModel();
        switch ($model->verifyUserLogin($email, $password)) {
            case StatusLogin::SUCCESS:

                try {
                    $role = $model->userRole($email);
                    session()->set('user_role', $role);
                    $db = \Config\Database::connect();
                    $sql = "SELECT `ID` FROM `Liegeplatzverwalter`.`Person` WHERE `E-Mail` = ? LIMIT 1";
                    $row = $db->query($sql, [$email])->getRowArray();

                    $userId = isset($row['ID']) ? (int)$row['ID'] : null;

                    $session = session();
                    $session->regenerate();
                    $session->set('user_id', $userId);

                    if ($userId === null) {
                        log_message('warning', 'Login: Keine ID in Person-Tabelle gefunden für Email: ' . $email);
                    }
                } catch (\Exception $e) {
                    return view('login', ['status' => $e->getMessage()]);
                }
                session()->set('user_email', $email);
                return redirect()->to('/');
            case StatusLogin::ERROR_USER_NOT_FOUND:
                return view('login', ['status' => 'Benutzer nicht gefunden.']);
            case StatusLogin::ERROR_INVALID_PASSWORD:
                return view('login', ['status' => 'Ungültiges Passwort.']);
            case StatusLogin::ERROR_QUERY_FAILED:
                return view('login', ['status' => 'Datenbankabfrage fehlgeschlagen.']);
            case StatusLogin::ERROR_EXCEPTION:
                return view('login', ['status' => 'Ein Fehler ist aufgetreten.']);
            default:
                return view('login', ['status' => 'Unbekannter Fehler beim Login.']);
        }
    }
}
