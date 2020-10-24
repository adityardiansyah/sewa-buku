<?php

use Illuminate\Support\Facades\Route;

Route::livewire('/','index')->layout( 'layouts.master')->name('index');
Route::livewire('/daftar', 'daftar')->layout('layouts.app')->name('daftar');
Route::livewire('/login', 'login')->layout('layouts.app')->name('login');