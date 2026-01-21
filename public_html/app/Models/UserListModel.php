<?

namespace App\Models;

use CodeIgniter\Model;

class UserListModel extends Model
{
    protected $db;

    public function testConnection(): string
    {
        parent::__construct();
        $db = db_connect();
        $query = $db->query('SELECT * FROM Person');
        if ($query) {
            $rowObj = $query->getRow();               // stdClass with properties ID, Vorname, …
            return $rowObj->Vorname;
        } else {
            return "Failed Connection && No Data";
        }
    }
}
