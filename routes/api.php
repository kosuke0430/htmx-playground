<?php

use App\Http\Controllers\TodoItemController;
use App\Models\TodoItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group([
    'prefix' => '/v1',
    'as'     => 'api.',
], function () {
    Route::controller(TodoItemController::class)->group(function () {
        Route::get('/list', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::patch('/update/{todo_item}', 'update')->name('update');
        Route::delete('/delete/{todo_item}', 'delete')->name('delete');
        Route::get('/getStatus/{todo_item}', 'getStatus')->name('getStatus');
    });
});
