<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\Access;


///category routes
///route grouping 
///Route::prefix('category')->group(function(){

   // include('categoryRoutes.php');

    //});// end of category group


Route::get('login-page', function () {
    return view('login');
})->name('login');

Route::post('submit-login-form', [UserController::class,'loginUser'])->name('loginUser');


Route::prefix('admin')->middleware(Access::class)->group(function(){

    include('adminRoutes.php');

    });// end of admin group 
    Route::fallback(function(){
        return redirect()->back()->with(['success'=>false,'message'=>'route not found']);
    });

   include('frontendRoutes.php');







