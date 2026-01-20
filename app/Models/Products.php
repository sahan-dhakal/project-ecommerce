<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Products extends Model
{
    protected $table='products';
    protected $fillable = [

        'category_id',
        'sub_category_id',
        'price',
        'color',
        'size',
        'quantity',
        'out_of_stock',
        'thumbnail',
    ];
    /////has many child relation , belongsto parent
   public function category(){
    
    return $this->belongsTo(Category::class, 'category_id', 'id');
}

   public function subCategory(){
    
    return $this->belongsTo(SubCategory::class, 'sub_category_id', 'id'); 
}
}
