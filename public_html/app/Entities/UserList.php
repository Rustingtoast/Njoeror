<?

namespace App\Entities;

use CodeIgniter\Entity\Entity;

class UserList extends Entity
{
    private $id;
    private $full_name;
    private $email;

    public function __construct($input_id, $input_name, $input_email)
    {
        $this->id = $input_id;
        $this->full_name = $input_name;
        $this->email = $input_email;
    }

    public function getID()
    {
        return $this->id;
    }

    public function getFullName()
    {
        return $this->full_name;
    }

    public function getEmail()
    {
        return $this->email;
    }
}
