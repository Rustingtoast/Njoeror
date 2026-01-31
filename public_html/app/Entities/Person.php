<?

namespace App\Entities;

use CodeIgniter\Entity\Entity;

class Person extends Entity
{
    protected $id;
    protected $vorname;
    protected $nachname;
    protected $email;
    protected $passwort;
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

    public function getPasswort()
    {
        return $this->passwort;
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

    public function setPasswort($passwort)
    {
        $this->passwort = $passwort;
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
