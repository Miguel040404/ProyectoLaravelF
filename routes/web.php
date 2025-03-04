<?php

use App\Livewire\Author\AuthorComponent;
use App\Livewire\Group\GroupComponent;
use App\Livewire\Group\GroupShow;
use App\Livewire\Home\Start;
use App\Models\Group;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get ('/start', Start::class, 'start')->name('start');

Route::get ('/group', GroupComponent::class)->name('group');

// Route::get ('/group/{group}', GroupShow::class)->name('group.show');

Route::get ('/authors', AuthorComponent::class)->name('authors');

// Route::get ('/authors/{author}', AuthorComponent::class)->name('authors.show');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});


