
<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontendController;




Route::get('/', [FrontendController::class,'index'])->name('frontend.home');
// Route::get('/test', function() {
//     return view('frontend.frontendTest');
// });
