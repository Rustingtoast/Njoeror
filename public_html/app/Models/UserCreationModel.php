<?

namespace App\Models;

use CodeIgniter\Model;
use App\Entities\Person;

enum StatusUserCreation
{
    case SUCCESS;
    case ERROR_EMAIL_ALREADY_EXISTS;
    case ERROR_QUERY_FAILED;
    case ERROR_EXCEPTION;
}

class UserCreationModel extends Model
{
    protected $db;

    public function createUser(Person $person)
    {
        $db = db_connect();

        $data = [
            'Vorname'      => $person->getVorname(),
            'Nachname'     => $person->getNachname(),
            'E-Mail'       => $person->getEmail(),
            'PasswortHash' => $person->getPasswortHash(),
            'Geburtsdatum' => $person->getGeburtstag(),
            'Land'         => $person->getLand(),
            'Adresse'      => $person->getAdresse(),
            'Hausnummer'   => $person->getHausnummer(),
            'Rolle'        => $person->getRolle()
        ];

        if (!$this->isEmailUnique($person->getEmail(), $db)) {
            return StatusUserCreation::ERROR_EMAIL_ALREADY_EXISTS;
        }

        try {
            $db->table('Person')->insert($data);
            return StatusUserCreation::SUCCESS;
        } catch (\Exception $e) {
            return StatusUserCreation::ERROR_EXCEPTION;
        }
    }

    public function isEmailUnique($email, \CodeIgniter\Database\BaseConnection $db)
    {
        $query = $db->query('SELECT COUNT(*) as count FROM Person WHERE `E-Mail` = ?', [$email]);
        $result = $query->getRowArray();

        return $result['count'] == 0;
    }
}
