<?php

use Illuminate\Support\Facades\Route;

Route::get('storage/{folder}/{filename}', function ($folder, $filename) {
    $path = storage_path('app/public/' . $folder . '/' . $filename);
    if (!File::exists($path)) {
        abort(404);
    }
    $file = File::get($path);
    $type = File::mimeType($path);
    $response = Response::make($file, 200);
    $response->header("Content-Type", $type);
    return $response;
});

Auth::routes();

Route::livewire('/','index')->layout( 'layouts.master')->name('index');
Route::livewire('/daftar', 'daftar')->layout('layouts.app')->name('daftar');
Route::livewire('/login', 'login')->layout('layouts.app')->name('login');
Route::get('/search', 'HomeController@search')->layout('layouts.master')->name('search');
Route::livewire('/detail/{id}', 'detail-book')->layout('layouts.master')->name('detail-book');


// ---------------- DASHBOARD -------------------------
Route::group(['middleware' => 'auth'], function () {
    Route::livewire('/booking', 'booking')->layout('layouts.master')->name('booking');
    Route::livewire('/dashboard', 'admin.index')->layout('layouts.admin')->name('dashboard');
    Route::livewire('/category', 'admin.category')->layout('layouts.admin')->name('category');
    Route::livewire('/user', 'admin.user')->layout('layouts.admin')->name('user');
    Route::livewire('/book-create', 'admin.book-create')->layout('layouts.admin')->name('admin.book-create');
    Route::livewire('/book-index', 'admin.book-index')->layout('layouts.admin')->name('admin.book-index');
    Route::livewire('/book-update/{id}', 'admin.book-update')->layout('layouts.admin')->name('admin.book-update');
    Route::livewire('/book-barter-create', 'admin.book-barter-create')->layout('layouts.admin')->name('admin.book-barter-create');
    Route::livewire('/book-barter-index', 'admin.book-barter-index')->layout('layouts.admin')->name('admin.book-barter-index');
    Route::livewire('/book-barter-update/{id}', 'admin.book-barter-update')->layout('layouts.admin')->name('admin.book-barter-update');
});