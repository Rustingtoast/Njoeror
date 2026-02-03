<?

namespace App\Models;

use CodeIgniter\Model;

class UserCreationModel extends Model
{
    protected $db;

    public function createUser($vorname, $nachname, $email, $password, $geburtsdatum, $rolle)
    {
        $db = db_connect();

        $data = [
            'Vorname'      => $vorname,
            'Nachname'     => $nachname,
            'E-Mail'       => $email,
            'PasswortHash' => password_hash($password, PASSWORD_DEFAULT),
            'Geburtsdatum' => $geburtsdatum,
            'Rolle'        => $rolle
        ];

        if (!$this->isEmailUnique($email, $db)) {
            return "Error: E-Mail already in use.";
        }

        try {
            $db->table('Person')->insert($data);
            return "OK"; // Success
        } catch (\Exception $e) {
            return "Error: " . $e->getMessage();
        }
    }

    public function isEmailUnique($email, \CodeIgniter\Database\BaseConnection $db)
    {
        $query = $db->query('SELECT COUNT(*) as count FROM Person WHERE `E-Mail` = ?', [$email]);
        $result = $query->getRowArray();

        return $result['count'] == 0;
    }
}
