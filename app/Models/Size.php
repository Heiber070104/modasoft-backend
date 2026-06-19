<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use App\Models\Category;
use App\Models\Product;

class Size extends Model
{
    use HasFactory, SoftDeletes;

    public $table = 'sizes';
    public $primaryKey = 'id';
    public $fillable = [
        'id', 
        'name',
        'category_id'
    ];

    public function category(){
        return $this->hasOne(Category::class, "id", "category_id");
    }

    public function products()
    {
        return $this->belongsToMany(Product::class, 'size_products', 'size_id', 'product_id')
                    ->withPivot('stock');
    }
}
