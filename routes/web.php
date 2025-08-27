<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/users' , function () {
//     return "hi ";
// });

//group

//

Route::get('/users',[UserController::class,'index']);
Route::get('/users/{id}',[UserController::class,'show']);


//group
Route::controller(PostController::class)->group(function(){

    Route::get('/posts','index')->name('posts.index');
    Route::get('/posts/create','create')->name('posts.create');
    Route::get('/posts/{id}','show')->name('posts.show');
    Route::post('/posts','store')->name('posts.store');

    // update
    Route::get('/posts/edit/{id}','edit')->name('posts.edit'); // select one
    Route::put('/posts/update/{id}','update')->name('posts.update');

    // delete
    Route::delete('/posts/{id}','destroy')->name('posts.delete');

});



// group

// alias  name

