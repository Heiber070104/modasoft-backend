<?php

namespace App\Enums;

enum OperationType: string 
{
    case SALE = 'sale';
    case PURCHASE = 'purchase';

    public function label(): string 
    {
        return match($this) {
            self::SALE => 'Venta',
            self::PURCHASE => 'Compra',
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