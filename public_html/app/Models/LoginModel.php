<?

namespace App\Models;

use CodeIgniter\Model;

enum StatusLogin
{
    case SUCCESS;
    case ERROR_USER_NOT_FOUND;
    case ERROR_INVALID_PASSWORD;
    case ERROR_QUERY_FAILED;
    case ERROR_EXCEPTION;
}


class LoginModel extends Model
{
    public function verifyUserLogin($email, $password)
    {
        $db = db_connect();

        $query = null;
        $result = null;

        try {
            $query  = $db->query('SELECT * FROM Person WHERE `E-Mail` = ? LIMIT 1', [$email]);
            $result = $query->getRowArray();
        } catch (\Exception $e) {
            return StatusLogin::ERROR_EXCEPTION;
        }

        if (!$query) {
            return StatusLogin::ERROR_QUERY_FAILED;
        }
        if (!$result) {
            return StatusLogin::ERROR_USER_NOT_FOUND;
        }

        if (password_verify($password, $result['PasswortHash'])) {
            return StatusLogin::SUCCESS;
        }
        return StatusLogin::ERROR_INVALID_PASSWORD;
    }

    public function userRole($email)
    {
        $db = db_connect();

        $query = $db->query('SELECT Rolle FROM Person WHERE `E-Mail` = ? LIMIT 1', [$email]);
        if (!$query) {
            throw new \Exception('Database query failed');
        }
        $result = $query->getRowArray();

        if (!$result) {
            throw new \Exception('User not found');
        }

        return $result['Rolle'];
    }
}
