<?php

namespace App\Controllers;

class BoatReservation extends BaseController
{
    public function getIndex(): string
    {
        return view('boatReservation.php');
    }
}
