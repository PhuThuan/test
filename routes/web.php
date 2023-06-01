<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\userController;
use App\Http\Controllers\WebcamController;
use App\Models\phoneModel;
use App\Models\User;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/home', [userController::class, 'home']);

//   //  return  user::find(1)->phone;
//   users =  user::all();
//    // return  phoneModel::find(1)->user;
// });

Route::get('/user', function () {

    return  view('dangky');
});
Route::post('/user/post', [userController::class, 'userPosst']);
Route::prefix('product')->group(function () {
    Route::get('/',[ProductController::class,'index']);
    Route::get('/add',[ProductController::class,'add']);
    Route::post('/post',[ProductController::class,'post'])->name(name:'postProduct');
    Route::get('/delete/{id}',[ProductController::class,'delete'])->name(name:'deteteProduct');
});
Route::get('webcam', [WebcamController::class, 'index']);
Route::post('webcam', [WebcamController::class, 'store'])->name('webcam.capture');

Route::get('/test', function () {

     Artisan::call('make:migration  product-table-2');
     return Artisan::output();
});