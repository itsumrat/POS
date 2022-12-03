<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    use HasFactory;
    protected $fillable = ['unique_id', 'name', 'unit_no', 'created_by', 'updated_by'];

    protected $table = 'units';
    protected $guarded = [];
}