<?php

namespace App\Enums;

enum PendingCountType: string 
{
    case TO_PAY = 'TO_PAY';
    case TO_RECEIVE = 'TO_RECEIVE';

    public function label(): string 
    {
        return match($this) {
            self::TO_PAY => 'Por Pagar',
            self::TO_RECEIVE => 'Por Recibir',
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