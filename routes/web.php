<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\Index;
use Illuminate\Support\Facades\Route;


Route::get('', [Index::class, 'index'])->name('index');

Route::get('logout', [AuthController::class, 'logout']);
Route::post('login', [AuthController::class, 'login']);

Route::post('submit_feedback', [FeedbackController::class, 'newMessage']);

Route::group(['prefix' => 'messages', 'middleware' => 'auth'], function (){
    Route::get('', [FeedbackController::class, 'messages'])->name('message_list');
    Route::get('{message_id}', [FeedbackController::class, 'singleMessage'])->name('single_message');
});
