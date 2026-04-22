<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;   
use App\Models\Transaccion;

class AccountingAccount extends Model
{
    use HasFactory, SoftDeletes;
    
    public $table = "accounting_accounts";    

    protected $fillable = ['code', 'name', 'general_type', 'detail_type'];

    public function transaction()
    {
        return $this->hasMany(Transaccion::class, 'id');
    }
}
