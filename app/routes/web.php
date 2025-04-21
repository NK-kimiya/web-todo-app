<?php

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// ここから追加

//TodoController に「RESTfulな7つの基本ルート」を自動で設定する
Route::resource('todo', 'App\Http\Controllers\TodoController');

//URLが /todo/done/{todo} に PUTリクエストされたら、
//TodoController::done() を実行
//{todo} はルートパラメータ（例えば /todo/done/3 なら 3 を受け取る
Route::put('todo/done/{todo}', [App\Http\Controllers\TodoController::class, 'done'])->name('todo.done');
//URLが /todo/undone/{todo} にPUTされたら、
//TodoController::undone() を実行する
//ルートの名前は todo.undone
Route::put('todo/undone/{todo}', [App\Http\Controllers\TodoController::class, 'undone'])->name('todo.undone');
//　ここまで追加
