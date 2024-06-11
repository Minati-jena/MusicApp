<?php

use Illuminate\Support\Facades\Route;

 use App\Http\Controllers\MusicController;

Route::get('/', function () {
    return view('welcome');
});
Route::any('/login',[MusicController::class,'login']);
Route::any('/layout',[MusicController::class,'layout']);
Route::any('/register',[MusicController::class,'register']);
Route::any('/forgotpassword',[MusicController::class,'forgotpassword']);
Route::any('/index2',[MusicController::class,'index2']);


Route::any('/addalbum',[MusicController::class,'addalbum']);
Route::any('/albumlist',[MusicController::class,'albumlist']);
Route::any('/edit_album/{id}',[MusicController::class,'edit_album']);
Route::any('/delete_album/{id}',[MusicController::class,'delete_album']);
Route::any('/listofsong/{id}',[MusicController::class,'listofsong']);




Route::any('/addmusic',[MusicController::class,'addmusic']);
Route::any('/musiclist',[MusicController::class,'musiclist']);
Route::any('/edit_music/{id}',[MusicController::class,'edit_music']);
Route::any('/delete_music/{id}',[MusicController::class,'delete_music']);