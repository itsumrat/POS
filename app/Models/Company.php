<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $table = 'companies';
    protected $fillable = ['unique_id', 'name', 'tin_no', 'contact_no', 'trade_license_no', 'address', 'image', 'created_by', 'updated_by'];

}