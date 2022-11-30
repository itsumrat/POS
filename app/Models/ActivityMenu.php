<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActivityMenu extends Model
{
    use HasFactory;

    protected $table = 'actions_menu';

    public function actinonName(){
        return $this->hasOne(Action::class, 'id', 'action_id');
    }


}
