<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    use HasFactory;

    protected $fillable = ['unique_id', 'name', 'created_by', 'updated_by','account_type','account_group','account_subgroup','opening_balance','current_balance'];

    protected $table = 'accounts';

    public function type(){
        return $this->belongsTo(AccountType::class, 'account_type', 'id');
    }
    public function group(){
        return $this->belongsTo(AccountGroup::class, 'account_group', 'id');
    }
    public function subgroup(){
        return $this->belongsTo(AccountSubGroup::class, 'account_subgroup', 'id');
    }
}
