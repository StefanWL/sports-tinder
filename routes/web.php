<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\DecisionController;
use App\Http\Controllers\ConversationController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;


Route::get('/', function () { return redirect('dashboard'); });

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware('auth');

Route::post('/logout', [LogoutController::class, 'store'])->name('logout')->middleware('auth');

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'store'])->middleware('guest');

Route::get('/register', [RegisterController::class, 'index'])->name('register')->middleware('guest');
Route::post('/register', [RegisterController::class, 'store'])->middleware('guest');

Route::get('/profile/{profile}', [UserProfileController::class, 'profile'])->name('profile')->middleware('auth');

Route::get('/user', [UserProfileController::class, 'index'])->name('user')->middleware('auth');
Route::get('/user/edit', [UserProfileController::class, 'detail'])->name('user.edit')->middleware('auth');
Route::post('/user/edit', [UserProfileController::class, 'edit'])->middleware('auth');

Route::get('/settings', [SettingsController::class, 'index'])->name('settings')->middleware('auth');
Route::post('/settings', [SettingsController::class, 'edit'])->middleware('auth');

Route::post('/decision/{profile}/{choice}', [DecisionController::class, 'create'])->name('decision')->middleware('auth');

Route::get('/conversations', [ConversationController::class, 'index'])->name('conversations')->middleware('auth');

Route::get('/conversations/{conversation}', [ConversationController::class, 'detail'])->name('conversation')->middleware('auth');
Route::post('/conversations/{conversation}', [ConversationController::class, 'create'])->middleware('auth');
Route::get('/conversations/refresh/{conversation}/{user}', [ConversationController::class, 'refresh']);


Route::get('/teams', [TeamController::class, 'index'])->name('teams')->middleware('auth');
Route::post('/teams/{user?}', [TeamController::class, 'create'])->middleware('auth');
Route::get('/team/{team}', [TeamController::class, 'detail'])->name('team')->middleware('auth');
Route::post('/team/{team}', [TeamController::class, 'edit'])->middleware('auth');