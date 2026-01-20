<?php

use Illuminate\Support\Facades\Route;



///route grouping 

Route::prefix('admin')->group(function(){

    include('adminRoutes.php');

    }); // end of admin group 

   include('frontendRoutes.php');







