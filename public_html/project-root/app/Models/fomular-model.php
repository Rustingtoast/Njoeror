<?

namespace App\Models;

use CodeIgniter\Model;

class Formulara extends Model{
    protected $db;

    public function __construct(){
        $this->db = db_connect();
    }

    public function testConnection(): string{
        if ($this->db->initialize()) {
            return 'Yay Database connected';
        }

        return 'Database connection failed';
    }
}