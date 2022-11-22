<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class SellTransaction extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table = 'sell_transactions';

    public function sales(){
        return $this->hasMany(PosTransactions::class, 'transaction_id', 'transaction_id');
    }
}
