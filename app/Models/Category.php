<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Size;
use App\Models\Products;

class Category extends Model
{
    use HasFactory, SoftDeletes;

    public $table = 'categories';
    protected $dates = ["deleted_at"];
    public $fillable = [
        'id',
        'name',
    ];

    public function size(){
        return $this->hasMany(Size::class, "id", "category_id");
    }

    public function product()
    {
        return $this->hasMany(Products::class, 'id', 'id_category');
    }
}
