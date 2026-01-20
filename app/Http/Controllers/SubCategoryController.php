<?php

namespace App\Http\Controllers;
use App\Constants\FileHandle;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    
public function index ($sub_category_id=null){
        $subCategory=null;
        if ($sub_category_id) {
           $subCategory=SubCategory::find($sub_category_id);
        }
        $categories=Category::all();
        $subCategories=SubCategory::with('category')->get();
        return view('backend.sub-category',['subCategories'=>$subCategories, 'categories'=>$categories, 'subCategory'=>$subCategory]);
}
public function addUpdateSubCategory (Request $req){

     try {
            $thumbnail=FileHandle::addUpdateFile(
                [
                    'requestParameter'=>'thumbnail',
                    'table'=>'sub_categories',
                    'location'=>'uploads/sub-categories/',
                    'id'=>$req->id,
                ]
            );

            SubCategory::updateOrInsert([
            'id'=>$req->id
            
        ],[
                'category_id'=>$req->category_id,
                'name'=>$req->name,
                'thumbnail'=>$thumbnail,
            ]);
            $message=$req->id>0? 'Updated': 'Saved';
            return redirect(route('subCategory.index'))->with(['success'=>true,'message'=>$message.' Successfully']);
        } catch (\Throwable $th) {
           return redirect()->back()->with(['success'=>false,'message'=>$th->getMessage()]);
           
        }
}
public function deleteSubCategory ($sub_category_id){
try {
                $subCategory=SubCategory::findorfail($sub_category_id);
                if($subCategory->thumbnail!=null){
                    if(file_exists(public_path($subCategory->thumbnail))){
                        unlink($subCategory->thumbnail);
                    } 
                }
                SubCategory::find($sub_category_id)->delete();
                
            return redirect()->back()->with(['success'=>true,'message'=>'Successfully Deleted']);
        } catch (\Throwable $th) {
           return redirect()->back()->with(['success'=>false,'message'=>$th->getMessage()]);
        }
}
public function getSubCategoryByCategory ($category_id){

        $categories=Category::all();
        $subCategories=SubCategory::where('category_id',$category_id)->with(['category'])->get();
        return view('backend.sub-category',['subCategories'=>$subCategories, 'categories'=>$categories, 'subCategory'=>null]);


}
}
