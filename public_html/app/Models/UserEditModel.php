<?

namespace App\Models;

use CodeIgniter\Model;
use App\Entities\Person;

class UserEditModel extends Model
{
    protected $db;

    public function getUserInformation($requested_user_id)
    {

        $db = db_connect();

        $query = $db->query('SELECT * FROM Person WHERE ID = ?', [(int)$requested_user_id]);
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
        $person->setGeburtstag($result['Geburtsdatum']);

        return $person;
    }
}
