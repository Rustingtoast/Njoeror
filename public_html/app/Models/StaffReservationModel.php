<?php

namespace App\Models;

use CodeIgniter\Model;

class StaffReservationModel extends Model
{
    protected $db;

    public function __construct()
    {
        $this->db = db_connect();
    }

    public function ReservationData()
    {
        $query = "
        SELECT reservierung.ID,
               reservierung.Start_Datum,
               reservierung.End_Datum,
               reservierung.Accepted,
               liegeplatz.Position,
               person.Vorname,
               person.Nachname,
               person.`E-Mail`,
               person.Adresse,
               person.Hausnummer,
               person.Land
            FROM `Liegeplatzverwalter`.`Liegeplatz_Reservierung` AS reservierung
            INNER JOIN `Liegeplatzverwalter`.`Liegeplatz` AS liegeplatz
            ON reservierung.`Liegeplatz_FID` = liegeplatz.`ID` 
            INNER JOIN `Liegeplatzverwalter`.`Person` AS person
            ON reservierung.`User_FID` = person.`ID`
            ORDER BY reservierung.Created_At DESC
        ";

        $result = [];
        try {
            $query = $this->db->query($query);
            $result = $query->getResultArray();
        } catch (\Exception $e) {
            throw new \Exception("Fehler beim Abruf: " . $e->getMessage());
        }
        if (empty($result)) {
            throw new \Exception("Keine Reservierungen gefunden.");
        }
        return $result;
    }

    public function updateReservationStatus(int $reservationId, bool $accepted)
    {
        $sql = "UPDATE `Liegeplatzverwalter`.`Liegeplatz_Reservierung` SET `Accepted` = ? WHERE `ID` = ?";
        try {
            $this->db->query($sql, [$accepted, $reservationId]);
        } catch (\Exception $e) {
            throw new \Exception("Fehler beim Aktualisieren: " . $e->getMessage());
        }
    }
}
