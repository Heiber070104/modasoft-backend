<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\AccountingAccount;
use App\Models\Operation;

class Transaction extends Model
{
    use HasFactory;

    public $table = "transactions";
    public $timestamps = false;
    public $primaryKey = 'id';
    protected $fillable = [
        'accounting_account_id',
        'operation_id',
        'description',
        'transaction_date',
        'amount',
        'type'
    ];

    public function accountingAccount()
    {
        return $this->belongsTo(AccountingAccount::class, 'accounting_account_id', 'id');
    }

    public function operation()
    {
        return $this->belongsTo(Operation::class, 'operation_id', 'id');
    }
}
