<?php

use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\VideoController;
use Illuminate\Routing\Router;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('index');
});

/* Route::get('/welcome', function () {
    return view('welcome');
}); */

/* Route::resource([
    'videos'=>VideoController::class
        ]); */

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/admin', [App\Http\Controllers\AdminController::class, 'index'])->middleware('auth','permission:admin')->name('admin.index'); 
/* Route::get('/admin', [App\Http\Controllers\AdminController::class, 'index'])->middleware(['auth','role:admin'])->name('admin.index');  */

Route::resource('admins', AdminController::class)->middleware('auth','permission:admin');
Route::resource('videos', VideoController::class)->middleware('auth');
Route::resource('users', UserController::class)->middleware('auth','permission:admin|guest|editor');

/* Route::group(['middleware'=>['auth','editor | admin']],function(){
    Route::get('videos/edit', [VideoController::class]);
    Route::get('/videos/create', [VideoController::class]);
    
});  */



/* 
Route::group(['prefix'=>'admin',  'middleware'=>['auth','permission:admin']],function(){
    Route::view('/', 'admin.index')->name('index');
    Route::resource('videos', [VideoController::class]);
    Route::resource('users', [UserController::class]);
}); 

Route::group([ 'prefix'=>'guest',  'middleware'=>['auth','permission:guest']],function(){
    Route::get('score/{id}', [VideoController::class, 'score']);
    Route::get('comment/{id}', [VideoController::class, 'comment']);
}); 

Route::group([ 'prefix'=>'editor',  'middleware'=>['auth','permission:editor']],function(){
    Route::resource('videos', [VideoController::class]);
});
 
Route::group(['middleware'=>['auth','permission:admin']],function(){
    Route::prefix('/settings')->name('settings.')->group(function(){
        Route::get('/',[UserController::class, 'profile'])->name('profile');
        Route::post('settings',[UserController::class, 'updateProfile'])->name('updateProfile');
        Route::post('settings/password',[UserController::class, 'updatePassword'])->name('updatePassword');
    });
}); 
 */

/* Route::put('post/{id}', function ($id) {
    //
})->middleware('auth', 'role:admin'); */


/* Route::get('/index', [App\Http\Controllers\IndexController::class, 'index'])->name('index');
 */
/* 
Route::get('/', function () {
    return view('index');
})->name('index'); */



/* 
Route::middleware('auth')->group(function(){
    Route::get('/', function () {
        return view('index');
    });

}); */