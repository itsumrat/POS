<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payables extends Model
{
    use HasFactory;
    protected $table = 'payables';

    protected $fillable = ['unique_id', 'ref_no', 'created_by', 'updated_by','payment_date','vendor_id','pay_amount','payment_type','cheque_no','account_id','description'];

    
    public function vendor(){
        return $this->belongsTo(Vendor::class, 'vendor_id', 'id');
    }

}
