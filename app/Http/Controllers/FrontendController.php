<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Products;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index(Request $request){


        $categories=Category::all();
        $subCategories=SubCategory::all();

        $query=Products::with(['category','subCategory']);

        if ($request->category_id) {
            $query=$query->where('category_id',$request->category_id);
        }
        if ($request->sub_category_id) {
            $query=$query->where('sub_category_id',$request->sub_category_id);
        }
        if ($request->search) {
           $query=$query->where('name','like','%'.$request->search.'%') 
           ->orWhere('color','like','%'.$request->search.'%');
        }
        
        $products=$query->get();
        
        return view('frontend.frontendIndex',[
            'products'=>$products,
            'subCategories'=>$subCategories, 
            'categories'=>$categories, 
            ]);
}
}