<?php

namespace App\Models;

use CodeIgniter\Model;

class ReservationList extends Model
{
    protected $DBGroup = 'default';
    public function getByUser(int $userId): array
    {
        $sql = "
        SELECT reservierung.Start_Datum,
               reservierung.End_Datum,
               liegeplatz.Position
        FROM `Liegeplatzverwalter`.`Liegeplatz_Reservierung` AS reservierung
        INNER JOIN `Liegeplatzverwalter`.`Liegeplatz` AS liegeplatz
          ON reservierung.`Liegeplatz_FID` = liegeplatz.`ID`
        WHERE reservierung.`User_FID` = ?
    ";
        $query = $this->db->query($sql, [$userId]);
        return $query->getResultArray();
    }
}
