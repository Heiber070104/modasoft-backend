<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Operation;

class PurchaseExtra extends Model
{
    use HasFactory;

    public $timestamps = false;
    public $table = 'purchase_extras';
    public $primaryKey = 'operation_id';
    public $fillable = [
        'operation_id',
        'due_date',
        'dispatch_status',
    ];

    public function operation(){
        return $this->hasOne(Operation::class, "id", "operation_id");
    }

}
