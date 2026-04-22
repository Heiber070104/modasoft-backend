<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Operation;

class PendingCount extends Model
{
    use HasFactory;

    public $timestamps = false;
    public $table = "pending_counts";
    public $primaryKey = "id";
    public $fillable = [
        "total_amount",
        "paid_amount",
        "type",
        "status",
        'operation_id'
    ];

    public function operation(){
        return $this->belongsTo(Operation::class, 'id', 'operation_id');
    }

}
