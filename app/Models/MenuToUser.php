<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MenuToUser extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table = 'menu_to_users';
}
