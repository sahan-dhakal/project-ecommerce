<?php

namespace App\Http\Controllers;
use App\Constants\FileHandle;
use App\Models\Category;
use App\Models\Products;
use App\Models\SubCategory;
use Illuminate\Http\Request;


class ProductController extends Controller
{
 public function index ($product_id=null){
        $product=null;
        if ($product_id) {
           $product=Products::find($product_id);
        }
        $categories=Category::all();
        $subCategories=SubCategory::all();
        $products=Products::with(['category','subCategory'])->get();
        
        return view('backend.products',[
            'products'=>$products,
            'subCategories'=>$subCategories, 
            'categories'=>$categories, 
            'product'=>$product]);
}
public function addUpdateProduct (Request $req){

     try {
            $thumbnail=FileHandle::addUpdateFile(
                [
                    'requestParameter'=>'thumbnail',
                    'table'=>'products',
                    'location'=>'uploads/products/',
                    'id'=>$req->id,
                ]
            );

            Products::updateOrInsert([
            'id'=>$req->id
            
        ],[
                'category_id'=>$req->category_id,
                'sub_category_id'=>$req->sub_category_id,
                'name'=>$req->name,
                'price'=>$req->price ?? 0.00,
                'color'=>$req->color?? 'N/A',
                'size'=>$req->size ?? 'N/A',
                'quantity'=>$req->quantity?? 1, 
                'outofstock'=>$req->outofstock,
                'thumbnail'=>$thumbnail,
            ]);
            $message=$req->id>0? 'Updated': 'Saved';
            return redirect(route('products.index'))->with(['success'=>true,'message'=>$message.' Successfully']);
        } catch (\Throwable $th) {
           return redirect()->back()->with(['success'=>false,'message'=>$th->getMessage()]);
           
        }
}
public function deleteProduct ($product_id){
try {
            $product=Products::findorfail($product_id);
                if($product->thumbnail!=null){
                    if(file_exists(public_path($product->thumbnail))){
                        unlink($product->thumbnail);
                    } 
                }
                Products::find($product_id)->delete();
                
            return redirect()->back()->with(['success'=>true,'message'=>'Successfully Deleted']);
        } catch (\Throwable $th) {
           return redirect()->back()->with(['success'=>false,'message'=>$th->getMessage()]);
        }
}
public function getProductsByCategory ($category_id){

        $categories=Category::all();
        $subCategories=SubCategory::where('category_id',$category_id)->with(['category'])->get();
        return view('backend.sub-category',['subCategories'=>$subCategories, 'categories'=>$categories, 'subCategory'=>null]);


}
public function getProductsBySubCategory ($sub_category_id){

        $categories=Category::all();
        $subCategories=SubCategory::where('category_id',$sub_category_id)->with(['category'])->get();

        return view('backend.sub-category',['subCategories'=>$subCategories, 'categories'=>$categories, 'subCategory'=>null]);


}
}
