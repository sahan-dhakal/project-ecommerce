<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
  
  protected $table='sub_categories';
    protected $fillable=[
            
            'category_id',
            'name',
            'thumbnail',
        
    ];

    ///// has many is a child relation and belongs to it's parent 
    public function category(){
        return $this->belongsTo(Category::class,'category_id');
    }
    public function products(){
        return $this->hasMany(Products::class,'sub_category_id'); 
}
}
