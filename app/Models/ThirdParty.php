<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes; 
use Illuminate\Database\Eloquent\Model;
use App\Enums\ThirdPartyType;
use App\Models\compraModel;
use App\Models\Product;

class ThirdParty extends Model
{
    use HasFactory, SoftDeletes;

    public $table = 'third_parties';    
    public $primaryKey = 'id';
    public $fillable = [
        'identification',
        'name',
        'mobile',
        'address',
        'email',
        'type'
    ];

    public function scopeSuppliers($query)
    {
        return $query->where('type', ThirdPartyType::SUPPLIER->value);
    }

    public function scopeCustomers($query)
    {
        return $query->where('type', ThirdPartyType::CUSTOMER->value);
    }

    public function products()
    {
        return $this->hasMany(Product::class, "id_supplier", "id");
    }
    
    public function operations()
    {
        return $this->hasMany(Operation::class, 'third_party_id', 'id');
    }
}
