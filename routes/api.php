<?php

use \App\Http\Controllers\UserController;
use \App\Http\Controllers\PostController;
use \App\Http\Controllers\Api\SclassController;
use \App\Http\Controllers\Api\SubjectController;
use \App\Http\Controllers\Api\SectionController;
use \App\Http\Controllers\Api\StudentController;
use App\Http\Controllers\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//Route::prefix('v1')
   // ->group(function (){
        //\App\Helpers\Routes\RouteHelper::includeRouteFiles(__DIR__ . '/api/v1');
       // require __DIR__ . '/api/v1/users.php';
//        require __DIR__ . '/api/v1/posts.php';
//        require __DIR__ . '/api/v1/comments.php';
  //  });

//  Products
Route::get('products', [ProductController::class, 'index']);
Route::get('products/{id}', [ProductController::class, 'show']);
Route::post('products', [ProductController::class, 'store']);
Route::put('products/{id}', [ProductController::class, 'update']);
Route::delete('products/{id}', [ProductController::class, 'destroy']);

Route::controller(UserController::class)->group(function () {
    Route::get('/users/{user}', 'show');
    Route::post('/users', 'store')->name('store');
    Route::patch('/users/{user}', 'update')->name('update');
});
//  Posts Users
Route::controller(PostController::class)->group(function () {
    Route::get('/posts', 'index');
    Route::get('/posts/{post}', 'show');
    Route::post('/posts', 'store')->name('store');
    Route::patch('/posts{post}', 'update')->name('update');
    Route::delete('/posts{post}', 'destroy')->name('destroy');
    //Route::post('/users', 'store')->name('store');
    //Route::patch('/users/{user}', 'update')->name('update');
});

Route::ApiResource('/class', SclassController::class);
Route::ApiResource('/subject', SubjectController::class);
Route::ApiResource('/section', SectionController::class);
Route::ApiResource('/student', StudentController::class);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
