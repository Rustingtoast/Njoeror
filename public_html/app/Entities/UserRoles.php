<?

namespace App\Entities;

enum UserRoles: int
{
    case ADMIN = 1;
    case STAFF = 2;
    case USER = 3;
}
