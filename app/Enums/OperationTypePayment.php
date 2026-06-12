<?php

namespace App\Enums;

enum OperationTypePayment: string 
{
    case COUNTED = 'COUNTED';
    case CREDIT = 'CREDIT';

    public function label(): string 
    {
        return match($this) {
            self::COUNTED => 'Contado',
            self::CREDIT => 'Crédito',
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