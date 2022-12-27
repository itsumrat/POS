<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemMaster extends Model
{
    use HasFactory;
    protected $table = 'item_masters';
    protected $guarded = [];

    public function department(){
        return $this->belongsTo(Department::class, 'department_id', 'id');
    }

    public function category(){
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function brand(){
        return $this->belongsTo(Brand::class, 'brand_id', 'id');
    }

    public function unit(){
        return $this->belongsTo(Unit::class, 'unit_id', 'id');
    }

    public function size(){
        return $this->belongsTo(Size::class, 'size_id', 'id');
    }

    public function color(){
        return $this->belongsTo(Color::class, 'color_id', 'id');
    }
    // public function stock(){
    //     return $this->hasOne(Stock::class,'item_id','id');
    // }

    public function stock()
    {
        return $this->hasOne(Stock::class,'item_id','id');
    }
}
