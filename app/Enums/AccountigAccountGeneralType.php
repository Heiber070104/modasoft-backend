<?php

namespace App\Enums;

enum AccountingAccountGeneralType: string 
{
    case REAL = 'REAL';
    case NOMINAL = 'NOMINAL';
    case VALUATION = 'VALUATION';

    public function label(): string 
    {
        return match($this) {
            self::REAL => 'Real',
            self::NOMINAL => 'Nominal',
            self::VALUATION => 'Valuación',
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