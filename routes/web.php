<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('users',UsersController::class,['only' => ['index','show','edit','update']]);
    // 下記が含まれる
    // ユーザー一覧ページ（GET /users）
    // Route::get('/users', [UsersController::class, 'index'])->name('users.index');
    // ユーザー詳細ページ（GET /users/{user}）
    // Route::get('/users/{user}', [UsersController::class, 'show'])->name('users.show');
    // ユーザー編集ページ（GET /users/{user}/edit）
    // Route::get('/users/{user}/edit', [UsersController::class, 'edit'])->name('users.edit');
    // ユーザー更新処理（PUT /users/{user}）
    // Route::put('/users/{user}', [UsersController::class, 'update'])->name('users.update');

    #フォロー、フォロー解除
    Route::post('users/{user}/follow',[UsersController::class,'follow'])->name('follow');
    Route::delete('users/{user}/unfollow',[UsersController::class,'unfollow'])->name('unfollow');
});

require __DIR__.'/auth.php';
