<?php

namespace App\Enums;

enum PaymentStatus: string 
{
    case CREDIT = 'CREDIT';
    case DEBIT = 'DEBIT';

    public function label(): string 
    {
        return match($this) {
            self::CREDIT => 'Crédito',
            self::DEBIT => 'Débito',
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