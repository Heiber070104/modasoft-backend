<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;
use App\Models\ThirdParty;
use App\Models\PurchaseExtra;
use App\Models\Payments;
use App\Models\PendingCounts;
use App\Models\Transaction;

class Operation extends Model
{
    use HasFactory;

    public $timestamps = false;
    public $table = 'operations';
    public $primaryKey = 'id';
    public $fillable = [
        'bill_number',
        'description',
        'total_amount',
        'type',
        'type_payment',
        'status',
        'third_party_id'
    ];

    public function supplier(){
        return $this->belongsTo(ThirdParty::class, 'id', 'third_party_id');
    }

    public function purchaseExtra(){
        return $this->hasOne(purchaseExtra::class, 'operation_id', 'id');
    }

    public function pendingCounts(){
        return $this->hasOne(PendingCounts::class, "operation_id", "id");
    }

    public function transactions(){
        return $this->hasMany(Transaction::class, 'operation_id', 'id');
    }

    public function payments(){
        return $this->hasMany(Payments::class, 'operation_id', 'id');
    }

    public function products(){
        return $this->belongsToMany(Product::class, "operation_details", 'operation_id', 'product_id')
                    ->withPivot('quantity', 'operation_price');
    }

}
