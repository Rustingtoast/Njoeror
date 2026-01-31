<?

namespace App\Models;

use CodeIgniter\Model;
use App\Entities\UserList;

class UserListModel extends Model
{
    protected $db;

    public function getAllUsers(): array
    {

        $db = db_connect();

        $query = $db->query('SELECT ID, Vorname, Nachname, `E-Mail` FROM Person');
        if (!$query) {
            return [];
        }
        $result = $query->getResultArray();

        $data = [];
        foreach ($result as $row) {
            $fullName = trim($row['Vorname'] . ' ' . $row['Nachname']);
            $data[] = new UserList($row['ID'], $fullName, $row['E-Mail']);
        }
        return $data;
    }
}
