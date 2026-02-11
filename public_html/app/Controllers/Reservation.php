<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ReservationList;

class Reservation extends BaseController
{
    public function index()
    {
        $userId = session()->get('user_id');
        $model = new ReservationList();
        $data['reservations'] = $model->getByUser((int)$userId);
        return view('user/reservation/list', $data);
    }
}
