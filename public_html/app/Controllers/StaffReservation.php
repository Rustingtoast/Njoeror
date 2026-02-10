<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\StaffReservationModel;
use App\Entities\UserRoles;

class StaffReservation extends BaseController
{
    public function index()
    {
        $userid = session()->get('user_id');
        $userRole = session()->get('user_role');
        if (
            !$userid || $userRole != UserRoles::STAFF->value &&
            $userRole != UserRoles::ADMIN->value
        ) {
            return redirect()->to('/login');
        }

        $model = new StaffReservationModel();
        try {
            $data = ['reservations' => $model->ReservationData()];
        } catch (\Exception $e) {
            $error = $e->getMessage();
            $data = ['error' => "Fehler ist beim Laden: $error"];
        }

        return view('staff_reservation', $data);
    }

    public function reservation_accept()
    {
        foreach ($_POST as $key => $value) {
            if (strpos($key, 'BUTTON_accept_') === 0) {
                $reservationId = str_replace('BUTTON_accept_', '', $key);
            }

            if (isset($reservationId)) {
                $model = new StaffReservationModel();
                try {
                    $model->updateReservationStatus($reservationId, true);
                } catch (\Exception $e) {
                    $error = $e->getMessage();
                    return redirect()->to('/staff/reservation/list')->with('error', "Fehler beim Akzeptieren: $error");
                }
            }
        }
        return redirect()->to('/staff/reservation/list');
    }

    public function reservation_reject()
    {
        foreach ($_POST as $key => $value) {
            if (strpos($key, 'BUTTON_reject_') === 0) {
                $reservationId = str_replace('BUTTON_reject_', '', $key);
            }

            if (isset($reservationId)) {
                $model = new StaffReservationModel();
                try {
                    $model->updateReservationStatus($reservationId, false);
                } catch (\Exception $e) {
                    $error = $e->getMessage();
                    return redirect()->to('/staff/reservation/list')->with('error', "Fehler beim Ablehnen: $error");
                }
            }
        }
        return redirect()->to('/staff/reservation/list');
    }
}
