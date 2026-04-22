<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Operation;

class Payment extends Model
{
    use HasFactory;

    public $timestamps = false;
    public $table = 'payments';
    public $primaryKey = "id";
    public $fillable = [
        'amount',
        'payment_date',
        'payment_method',
        'reference',
        'operation_id',
    ];

    public function operation()
    {
        return $this->belongsTo(Operation::class, 'id', 'operation_id');
    }
}
