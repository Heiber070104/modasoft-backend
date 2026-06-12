<?php

namespace App\Enums;

enum ThirdPartyType: string 
{
    case SUPPLIER = 'supplier';
    case CUSTOMER = 'customer';

    public function label(): string 
    {
        return match($this) {
            self::SUPPLIER => 'Proveedor',
            self::CUSTOMER => 'Cliente',
        };
    }

    public static function toSelectArray(): array 
    {
        return array_map(fn($status) => [
            'title' => $status->label(),
            'value' => $status->value,
        ], self::cases());
    }
}