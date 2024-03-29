<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    use HasFactory;
    protected $table = 'purchases';
    protected $guarded = [];

    public function details()
    {
        return $this->hasMany(PurchaseDetails::class, 'purchase_id');
    }
}
