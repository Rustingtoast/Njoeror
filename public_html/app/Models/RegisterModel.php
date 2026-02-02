<?

namespace App\Models;

use CodeIgniter\Model;
use App\Entities\Person;

enum StatusRegister
{
    case SUCCESS;
    case ERROR_EMAIL_ALREADY_EXISTS;
    case ERROR_QUERY_FAILED;
    case ERROR_EXCEPTION;
}


class RegisterModel extends Model
{

    protected $db;

    public function __construct()
    {
        $this->db = db_connect();
    }

    public function registerNewUser(Person $person)
    {
        if (!$this->isEmailUnique($person->getEmail())) {
            return StatusRegister::ERROR_EMAIL_ALREADY_EXISTS;
        }

        $data = [
            'Vorname'      => $person->getVorname(),
            'Nachname'     => $person->getNachname(),
            'E-Mail'       => $person->getEmail(),
            'Passwort'     => $person->getPasswort(),
            'Geburtsdatum' => $person->getGeburtstag(),
            'Rolle'        => $person->getRolle()
        ];

        try {
            $this->db->table('Person')->insert($data);
            return StatusRegister::SUCCESS;
        } catch (\Exception $e) {
            return StatusRegister::ERROR_EXCEPTION;
        }
    }

    private function isEmailUnique($email)
    {
        $query = $this->db->query('SELECT COUNT(*) as count FROM Person WHERE `E-Mail` = ?', [$email]);
        $result = $query->getRowArray();

        return $result['count'] == 0;
    }
}
