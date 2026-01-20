<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table='categories';
    protected $fillable=[
        'name',
        'thumbnail',
    ];

    public function subCategories(){
        return $this->hasMany(SubCategory::class,'category_id');
    }
    public function products(){
        return $this->hasMany(Products::class,'category_id'); 
}
}
