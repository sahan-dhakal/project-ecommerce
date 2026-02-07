<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Products;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index($catId=null,$subCatId=null,$searchText=null){

        if (!$catId) {
        $catId = request('category_id');
    }
    
    // If $subCatId is empty, try looking for 'sub_category_id'
    if (!$subCatId) {
        $subCatId = request('sub_category_id');
    }
    
    // If $searchText is empty, try looking for 'search'
    if (!$searchText) {
        $searchText = request('search');
    }
        $categories=Category::all();
        $subCategories=SubCategory::all();

        $productQuery=Products::with(['category','subCategory']);

        if ($catId) {
            $productQuery->whereHas('category', function($query) use ($catId) {
                $query->where('id', $catId);
            });
        }
        if ($subCatId) {
            $productQuery->whereHas('subCategory', function($query) use ($subCatId) {
                $query->where('id', $subCatId);
            });
        }
        if ($searchText) {
           $productQuery->where(function ($query) use ($searchText) {   
                $query->where('name','like','%'.$searchText.'%') 
                ->orWhere('price','like','%'.$searchText.'%')
                ->orWhere('size','like','%'.$searchText.'%')
                ->orWhere('color','like','%'.$searchText.'%');
               
            });
        }
            
            $products=$productQuery->get();
        return view('frontend.frontendIndex',[
            'products'=>$products,
            'subCategories'=>$subCategories, 
            'categories'=>$categories, 
            ]);
    }
}