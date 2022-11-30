<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vat extends Model
{
    use HasFactory;
    protected $fillable = ['unique_id', 'name', 'created_by', 'updated_by'];

    protected $guarded = [];
    protected $table = 'vats';

}