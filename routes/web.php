<?php

use App\Livewire\Chat;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');

Route::get('dashboard', function(){

    return view('dashboard',[
        'users'=> User::where('id','!=',Auth::user()->id)->get(),
    ]);
})
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

Route::get('chat/{user}',Chat::class)->name('chat');

require __DIR__.'/auth.php';
