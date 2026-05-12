<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'users';

    protected $primaryKey = 'id';

    protected $allowedFields = [
        'name',
        'username',
        'password',
        'role'
    ];

    const ROLE_ADMIN = 'admin';
    const ROLE_USER = 'user';

    public static function getRoleName($role)
    {
        switch ($role) {
            case self::ROLE_ADMIN:
                return 'Admin';
            case self::ROLE_USER:
                return 'User';
            default:
                return $role;
        }
    }

    public static function getRoleList()
    {
        return [
            self::ROLE_ADMIN => self::getRoleName(self::ROLE_ADMIN),
            self::ROLE_USER => self::getRoleName(self::ROLE_USER)
        ];
    }
}
