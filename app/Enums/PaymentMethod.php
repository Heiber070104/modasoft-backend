<?php

namespace App\Enums;

enum PaymentMethod: string 
{
    case CASH = 'CASH';
    case BANK = 'BANK';

    public function label(): string 
    {
        return match($this) {
            self::CASH => 'Efectivo',
            self::BANK => 'Bancario',
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