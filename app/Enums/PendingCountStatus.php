<?php

namespace App\Enums;

enum PendingCountStatus: string 
{
    case PENDING = 'pending';
    case PARTIAL = 'partial';
    case PAID = 'paid';

    public function label(): string 
    {
        return match($this) {
            self::PENDING => 'Pendiente por Pagar',
            self::PARTIAL => 'Abono Parcial',
            self::PAID => 'Pagado Completo',
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