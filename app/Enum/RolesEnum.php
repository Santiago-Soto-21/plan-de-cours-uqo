<?php

namespace App\Enum;

enum RolesEnum: string
{
    // Roles
    case Admin = 'admin';
    case Director = 'director';
    case Prof = 'prof';
    case Secretary = 'secretary';

    // Return array with all roles
    public static function labels(): array
    {
        return [
            self::Admin->value => 'admin',
            self::Director->value => 'director',
            self::Prof->value => 'prof',
            self::Secretary->value => 'secretary',
        ];
    }

    // Return array with specific role
    public function label(): String
    {
        return match($this){
            self::Admin => 'admin',
            self::Director => 'director',
            self::Prof => 'prof',
            self::Secretary => 'secretary',
        };
    }
}
