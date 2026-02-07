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
        'description',
        'thumbnail',
    ];
//mutator example
    public function setNameAttribute(){
        return 'newly-added-product'.$this->name;
    }
    /////has many child relation , belongsto parent
   public function category(){
    
    return $this->belongsTo(Category::class, 'category_id', 'id');
}

   public function subCategory(){
    
    return $this->belongsTo(SubCategory::class, 'sub_category_id', 'id'); 
}

protected $appends = ['HasCategory','HasSubCategory'];

//accessor example
public function getHasCategoryAttribute(){
    if($this->category){
        return true;
    }
    else{
        return false;
    }
}
public function getHasSubCategoryAttribute(){
    if($this->subCategory){
        return true;
    }
    else{
        return false;
    }
}

}