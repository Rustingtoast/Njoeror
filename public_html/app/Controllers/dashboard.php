<?php

namespace App\Controllers;

class Dashboard extends BaseController
{
    public function getIndex()
    {
        return view('dashboard');
    }

    public function saveLayout()
    {
        $data = $this->request->getJSON(true);

        // Beispiel: später in DB speichern
        log_message('info', 'Layout gespeichert: ' . json_encode($data));

        return $this->response->setJSON([
            'status' => 'ok'
        ]);
    }
}
