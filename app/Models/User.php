<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Permission\Traits\HasRoles;

class User extends Model
{
    use HasFactory, SoftDeletes, HasRoles;

    public $table = 'users';
    public $primaryKey = 'id';
    public $fillable = [
        'username',
        'personal_name',
        'email',
        'password',
    ];

}
