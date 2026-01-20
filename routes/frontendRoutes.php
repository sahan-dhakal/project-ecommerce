
<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontendController;




Route::get('/', [FrontendController::class,'index']);
Route::get('/test', function() {
    return view('frontend.frontendTest');
});
