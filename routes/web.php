<?php

use Illuminate\Support\Facades\Route;

Route::livewire('/','index')->layout( 'layouts.master')->name('index');
Route::livewire('/daftar', 'daftar')->layout('layouts.app')->name('daftar');
Route:: livewire('/login', 'login')->layout('layouts.app')->name('login');
Route::livewire('/search', 'search')->layout('layouts.app')->name('search');


// ---------------- DASHBOARD -------------------------
Route::livewire('/dashboard', 'admin.index')->layout('layouts.admin')->name('dashboard');
Route::livewire('/category', 'admin.category')->layout('layouts.admin')->name('category');
Route::livewire('/user', 'admin.user')->layout('layouts.admin')->name('user');
Route::livewire('/book-create', 'admin.book-create')->layout('layouts.admin')->name('book-create');
Route::livewire('/book-index', 'admin.book-index')->layout('layouts.admin')->name('book-index');
// Route::get('dashboard', 'HomeController@admin');