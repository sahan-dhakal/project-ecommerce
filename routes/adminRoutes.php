<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\ProductController;

 //Category
    Route::get('/dashboard',[CategoryController::class,'index'])->name('admin.dashboard');
    Route::get('/category/{category_id?}',[CategoryController::class,'index'])->name('category.index');
    Route::post('/add-update-category',[CategoryController::class,'addUpdateCategory'])->name('category.addUpdate');
    Route::get('/delete-category/{category_id}', [CategoryController::class,'deleteCategory'])->name('category.delete');
    Route::get('/get-category-by-id/{category_id}', [CategoryController::class,'getCategoryByid'])->name('category.getCategoryByid');
    
    //Sub Category
    Route::get('sub-category/{sub_category_id?}',[SubCategoryController::class,'index'])->name('subCategory.index');
    Route::post('add-update-sub-category',[SubCategoryController::class,'addUpdateSubCategory'])->name('subCategory.addUpdate');
    Route::get('delete-sub-category/{sub_category_id}', [SubCategoryController::class,'deleteSubCategory'])->name('subCategory.delete');
    Route::get('get-sub-category-by-category/{category_id}', [SubCategoryController::class,'getSubCategoryByCategory'])->name('subCategory.getSubCategoryByCategory');

    ///products
    Route::get('products/{product_id?}',[ProductController::class,'index'])->name('products.index');
    Route::post('add-update-product',[ProductController::class,'addUpdateProduct'])->name('product.addUpdate');
    Route::get('delete-product/{product_id}', [ProductController::class,'deleteProduct'])->name('product.delete');
    Route::get('get-products-by-category/{category_id}', [ProductController::class,'getProductsByCategory'])->name('product.getProductsByCategory');
    Route::get('get-products-by-sub-category/{sub_category_id}', [ProductController::class,'getProductsBySubCategory'])->name('product.getProductsBySubCategory');
    