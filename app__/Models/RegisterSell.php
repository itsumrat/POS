<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegisterSell extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table = 'sell_registers';
}
