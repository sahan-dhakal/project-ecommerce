<?php

namespace App\Http\Controllers;

use App\Constants\FileHandle;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function index($category_id=null){
        $category=null;
        if ($category_id) {
           $category=Category::find($category_id);
        }
        $categories=Category::all();
        return view('backend.category',['categories'=>$categories,'category'=>$category]);
    }

    public function addUpdateCategory( Request $req){
        try {
            $thumbnail=FileHandle::addUpdateFile(
                [
                    'requestParameter'=>'thumbnail',
                    'table'=>'categories',
                    'location'=>'uploads/categories/',
                    'id'=>$req->id,
                ]
            );

            Category::updateOrInsert([
            'id'=>$req->id
            
        ],[
                'name'=>$req->name,
                'thumbnail'=>$thumbnail,
            ]);
            $message=$req->id>0? 'Updated': 'Saved';
            return redirect(route('category.index'))->with(['success'=>true,'message'=>$message.' Successfully']);
        } catch (\Throwable $th) {
           return redirect()->back()->with(['success'=>false,'message'=>$th->getMessage()]);
           
        }
    }
        public function deleteCategory($category_id){
            try {
                $category=Category::findorfail($category_id);
                if($category->thumbnail!=null){
                    if(file_exists(public_path($category->thumbnail))){
                        unlink($category->thumbnail);
                    }
                }
                Category::find($category_id)->delete();
                // Category::where('id', $category_id->delete);
                // $category=Category::where('id',$category_id->first());
            return redirect()->back()->with(['success'=>true,'message'=>'Successfully Deleted']);
        } catch (\Throwable $th) {
           return redirect()->back()->with(['success'=>false,'message'=>$th->getMessage()]);
        }
        }
        public function getCategoryByid($category_id){
            try {
                $category=Category::find($category_id);
               
            return view('backend.edit-category',['category'=>$category]);
        } catch (\Throwable $th) {

           return redirect()->back()->with(['success'=>false,'message'=>$th->getMessage()]);
        }
        }
    }

