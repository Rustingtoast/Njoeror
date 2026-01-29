<?

namespace App\Models;

use CodeIgniter\Model;

class UserListModel extends Model
{
    protected $db;

    public function getAllUsers(): array
    {

        $db = db_connect();

        $query = $db->query('SELECT Vorname, Nachname FROM Person');
        if (!$query) {
            return [];
        }
        $result = $query->getResultArray();

        $data = [];
        foreach ($result as $row) {

            $fullName = trim($row['Vorname'] . ' ' . $row['Nachname']);
            $data[] = $fullName;
        }
        return $data;
    }
}
