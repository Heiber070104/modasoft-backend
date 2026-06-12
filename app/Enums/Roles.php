<?php

namespace App\Enums;

enum Roles: string
{
    case ADMIN = 'admin';
    case MANAGER = 'manager';
    case SELLER = 'seller';
    case BUYER = 'buyer';
    case ACCOUNTANT = 'accountant';

    public function label(): string
    {
        return match($this) {
            self::ADMIN => 'Administrador',
            self::MANAGER => 'Gerente',
            self::SELLER => 'Vendedor',
            self::BUYER => 'Comprador',
            self::ACCOUNTANT => 'Contador',
        };
    }

    public static function toSelectArray(): array 
    {
        return array_map(fn($role) => [
            'title' => $role->label(),
            'value' => $role->value,
        ], self::cases());
    }
}