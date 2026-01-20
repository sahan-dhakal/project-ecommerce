<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Products;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index(){


        $categories=Category::all();
        $subCategories=SubCategory::all();
        $products=Products::with(['category','subCategory'])->get();
        return view('frontend.frontendIndex',[
            'products'=>$products,
            'subCategories'=>$subCategories, 
            'categories'=>$categories, 
            ]);
}
}