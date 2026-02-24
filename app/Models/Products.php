<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Products extends Model
{

    use HasFactory;

    protected $table = 'products';  // Specify the table name if it doesn't follow Laravel's naming convention
    protected $fillable = [
        'category_id',
        'sub_category_id',
        'supplier_id', 
        'price',
        'color',
        'size',
        'quantity',
        'out_of_stock',
        'description',
        'thumbnail',

    ]; // Specify the fillable attributes for mass assignment

    protected $appends = [
        'HasCategory', 'HasSubCategory'
    ]; ///it shows the category and sub category name in the product list page instead of id

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
    public function subCategory()
    {
        return $this->belongsTo(SubCategory::class, 'sub_category_id');
    }
    public function supplier()
    {
        return $this->belongsTo(Supplier::class, 'supplier_id');
    }
    ///mutators & accessors
    //Mutators
    public function getNameAttribute($value){
        $this->attributes['name'] = 'newly-added-product' . $value; 
        
    }
    //accessor 
    public function getHasCategoryAttribute(){
        return $this->category ? true : false;
    }
    public function getHasSubCategoryAttribute(){
        return $this->subCategory ? true : false;
    }
}