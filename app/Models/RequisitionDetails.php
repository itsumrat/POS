<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RequisitionDetails extends Model
{
    use HasFactory;
    protected $table = 'requisition_details';
    protected $guarded = [];

    public function reqs()
    {
        return $this->belongsTo(Requisition::class, 'requisition_id');
    }
}
