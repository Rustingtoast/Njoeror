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
            'E-Mail'       => $email,  // Column name with hyphen, escaped by CodeIgniter
            'Passwort'     => $password,
            'Geburtsdatum' => $geburtsdatum,
            'Rolle'        => $rolle
        ];

        try {
            $db->table('Person')->insert($data);
            return "OK"; // Success
        } catch (\Exception $e) {
            return "Error: " . $e->getMessage(); // Return the error message
        }
    }
}
