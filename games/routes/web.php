<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\RolePermissionController;
use App\Http\Controllers\UserRoleController;
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
});

// Game Collection
Route::get('/games', [GameController::class, 'index'])
    ->middleware(['auth', 'role:admin|klant']);

Route::get('/games/create', [GameController::class, 'create'])
    ->middleware(['auth', 'role:admin']);

Route::get('/games/show/{id}', [GameController::class, 'show'])
    ->middleware(['auth', 'role:admin|klant']);

Route::get('/games/edit/{id}', [GameController::class, 'edit'])
    ->middleware(['auth', 'role:admin']);

Route::post('/games/store', [GameController::class, 'store'])
    ->middleware(['auth', 'role:admin']);

Route::post('/games/update/{id}', [GameController::class, 'update'])
    ->middleware(['auth', 'role:admin']);

Route::post('/games/destroy/{id}', [GameController::class, 'destroy'])
    ->middleware(['auth', 'role:admin']);

// Beheeromgeving
Route::middleware(['auth', 'role:admin'])
    ->prefix('beheer')
    ->group(function () {

        // Permissies beheren
        Route::get('/permissies', [PermissionController::class, 'index'])
            ->name('permissions.index');

        Route::get('/permissies/create', [PermissionController::class, 'create'])
            ->name('permissions.create');

        Route::post('/permissies', [PermissionController::class, 'store'])
            ->name('permissions.store');

        Route::get('/permissies/{id}/edit', [PermissionController::class, 'edit'])
            ->name('permissions.edit');

        Route::put('/permissies/{id}', [PermissionController::class, 'update'])
            ->name('permissions.update');

        Route::delete('/permissies/{id}', [PermissionController::class, 'destroy'])
            ->name('permissions.destroy');


        // Rollen beheren
        Route::get('/rollen', [RoleController::class, 'index'])
            ->name('roles.index');

        Route::get('/rollen/create', [RoleController::class, 'create'])
            ->name('roles.create');

        Route::post('/rollen', [RoleController::class, 'store'])
            ->name('roles.store');

        Route::get('/rollen/{id}/edit', [RoleController::class, 'edit'])
            ->name('roles.edit');

        Route::put('/rollen/{id}', [RoleController::class, 'update'])
            ->name('roles.update');

        Route::delete('/rollen/{id}', [RoleController::class, 'destroy'])
            ->name('roles.destroy');


        // Permissies aan rollen koppelen
        Route::get('/rol-permissies', [RolePermissionController::class, 'index'])
            ->name('role-permissions.index');

        Route::put('/rol-permissies/{roleId}', [RolePermissionController::class, 'update'])
            ->name('role-permissions.update');


        // Rollen aan gebruikers koppelen
        Route::get('/gebruiker-rollen', [UserRoleController::class, 'index'])
            ->name('user-roles.index');

        Route::put('/gebruiker-rollen/{userId}', [UserRoleController::class, 'update'])
            ->name('user-roles.update');
    });

require __DIR__.'/auth.php';

Route::get('/geheim', function () {
    return view('geheim');
})->middleware('auth');