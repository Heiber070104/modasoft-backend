<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Size;
use App\Models\Product;

class Category extends Model
{
    use HasFactory, SoftDeletes;

    public $table = 'categories';
    protected $dates = ["deleted_at"];
    public $fillable = [
        'id',
        'name',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    public function sizes(){
        return $this->hasMany(Size::class, "id", "category_id");
    }

    public function products()
    {
        return $this->hasMany(Product::class, 'id', 'id_category');
    }
}
