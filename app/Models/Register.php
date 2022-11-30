<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Register extends Model
{
    use HasFactory;
    protected $fillable = ['unique_id', 'name', 'created_by', 'updated_by'];
    protected $table = 'register';
    protected $guarded = [];
}