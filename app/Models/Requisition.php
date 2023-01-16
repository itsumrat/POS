<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Requisition extends Model
{
    use HasFactory;
    protected $table = 'requisitions';
    protected $guarded = [];
    public function reqs()
    {
        return $this->hasMany(RequisitionDetails::class, 'requisition_id');
    }
}
