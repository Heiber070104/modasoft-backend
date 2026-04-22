<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;
use App\Models\Operation;
use App\Models\Return;

class OperationDetail extends Model
{
    use HasFactory;

    public $timestamps = false;
    public $table = 'operation_details';
    public $primaryKey = 'id';
    public $fillable = [
        'quantity',
        'operation_price',
        'operation_id',
        'product_id',
    ];

    public function product(){
        return $this->belongsTo(Product::class, 'id', 'product_id');
    }

    public function operation(){
        return $this->belongsTo(Operation::class, 'id', 'operation_id');
    }

    public function returns(){
        return $this->belongsToMany(Return::class, "return_details", "operation_detail_id", "return_id")
                    ->withPivot('quantity', 'return_price', 'commodity_condition');
    }

}