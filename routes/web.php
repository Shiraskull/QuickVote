<?php

use App\Livewire\CreateVoting;
use App\Livewire\DetailVoting;
use App\Livewire\Home;
use App\Livewire\Login;
use App\Livewire\ManageVoting;
use App\Livewire\Profile;
use Illuminate\Support\Facades\Route;


Route::get('/',Home::class);
Route::get('/manage-voting',ManageVoting::class)->name('manage-voting');
Route::get('/detail-voting/{slug}',DetailVoting::class)->name('detail-voting');
Route::get('/voting/create',CreateVoting::class)->name('voting-create');


Route::get('/login',Login::class)->name('login');
Route::get('/profile',Profile::class)->name('profile');
