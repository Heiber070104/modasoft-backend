<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Operation;
use App\Models\Product;

class Devolution extends Model
{
    use HasFactory;

    public $timestamps = false;
    public $table = 'returns';
    public $primaryKey = 'id';

    protected $fillable = [
        'reason',
        'return_date',
        'refund_amount',
        'operation_id',
    ];

    public function operation(){
        return $this->belongsTo(Operation::class, 'operation_id', 'id');
    }

    public function operationDetails(){
        return $this->belongsToMany(Product::class, 'return_details', 'return_id', 'operation_detail_id')
                    ->withPivot('quantity', 'return_price', 'commodity_condition');
    }
}
