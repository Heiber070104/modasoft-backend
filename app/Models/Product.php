<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; //para borrado logico

use App\Models\ThirdParty;
use App\Models\Operation;
use App\Models\Category;
use App\Models\Size;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    public $table = 'products';
    public $primaryKey = 'id';
    public $fillable = [
        'name',
        'description',
        'unit_price',
        'profit_percentage',
        'is_active',
        'id_category',
        "id_size",
        "id_supplier"
    ];

    public function thirdParty(){
        return $this->hasOne(ThirdParty::class, "id", "id_supplier");
    }

    public function category()
    {
        return $this->hasOne(Category::class, 'id', 'category_id');
    }

    public function sizes()
    {
        return $this->belongsToMany(Size::class, 'size_products', 'product_id', 'size_id')
                    ->withPivot('stock');
    }

    public function operations(){
        return $this->belongsToMany(Operation::class, 'operation_details', 'product_id', 'operation_id')
                    ->withPivot('quantity', 'operation_price');
    }

}
