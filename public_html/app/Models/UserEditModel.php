<?

namespace App\Models;

use CodeIgniter\Model;
use App\Entities\Person;

class UserEditModel extends Model
{
    protected $db;

    public function __construct()
    {
        $this->db = db_connect();
    }


    public function getUserInformation($requested_user_id)
    {

        $query = $this->db->query('SELECT * FROM Person WHERE ID = ?', [(int)$requested_user_id]);
        if (!$query) {
            return [];
        }
        $result = $query->getRowArray();

        if (!$result) {
            return "";
        }

        $person = new Person;
        $person->setId($result['ID']);
        $person->setVorname($result['Vorname']);
        $person->setNachname($result['Nachname']);
        $person->setEmail($result['E-Mail']);
        $person->setPasswort($result['Passwort']);
        $person->setGeburtstag($result['Geburtsdatum']);
        $person->setRolle($result['Rolle']);


        return $person;
    }

    public function updateUserInformation(Person $person)
    {

        $data = [
            'Vorname' => $person->getVorname(),
            'Nachname' => $person->getNachname(),
            'E-Mail' => $person->getEmail(),
            'Passwort' => $person->getPasswort(),
            'Geburtsdatum' => $person->getGeburtstag(),
            'Rolle' => $person->getRolle(),
        ];

        $userId = session()->get('to_edit_user_id');

        return $this->db->table('Person')->where('ID', $userId)->update($data);
    }

    public function isEmailUnique($email)
    {
        $query = $this->db->query('SELECT COUNT(*) as count FROM Person WHERE `E-Mail` = ?', [$email]);
        $result = $query->getRowArray();

        return $result['count'] == 0;
    }
}
