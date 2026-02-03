<?

namespace App\Entities;

use CodeIgniter\Entity\Entity;

class Person extends Entity
{
    protected $id;
    protected $vorname;
    protected $nachname;
    protected $email;
    protected $passwortHash;
    protected $geburtsdatum;
    protected $rolle;

    public function __construct() {}

    public function getId()
    {
        return $this->id;
    }

    public function getVorname()
    {
        return $this->vorname;
    }

    public function getNachname()
    {
        return $this->nachname;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getPasswortHash()
    {
        return $this->passwortHash;
    }

    public function getGeburtstag()
    {
        return $this->geburtsdatum;
    }

    public function getRolle()
    {
        return $this->rolle;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function setVorname($vorname)
    {
        $this->vorname = $vorname;
    }

    public function setNachname($nachname)
    {
        $this->nachname = $nachname;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function setPasswortHash($passwortHash)
    {
        $this->passwortHash = $passwortHash;
    }

    public function setGeburtstag($geburtsdatum)
    {
        $this->geburtsdatum = $geburtsdatum;
    }

    public function setRolle($rolle)
    {
        $this->rolle = $rolle;
    }
}
