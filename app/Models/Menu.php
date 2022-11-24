<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    public function actions(){
        return $this->hasMany(ActivityMenu::class, 'menu_id', 'id');
    }

    public function roleActions(){
        return $this->hasMany(ActivityMenu::class);
    }
}
