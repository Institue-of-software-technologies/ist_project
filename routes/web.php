<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JobController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AlumniController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\AlumniProfileController;

Route::get('/', function () {
    return view('welcome');
});

Route::patch('/jobs/{id}/restore', [JobController::class, 'restore'])->name('role-permissions.job.restore');

Route::get('activate-account/{token}', [UserController::class, 'activateAccount'])->name('activate-account');
Route::post('activate-account/{token}', [UserController::class, 'setPassword'])->name('set-password');

Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/alumni_dashboard', [AlumniController::class, 'index'])->middleware(['auth',
    'verified'])->name('alumni_dashboard');
    Route::get('/alumni/jobs', [JobController::class, 'alumniIndex'])->name('alumni.job.index');
    Route::get('/alumni/profile/index', [AlumniProfileController::class, 'index'])->name('alumni.profile.index');
    Route::get('/alumni/profile',[AlumniProfileController::class, 'create'])->name('alumni.profile.create');
    Route::post('/alumni/profile', [AlumniProfileController::class,'store'])->name('alumni.profile.store');
    Route::get('/alumni/profile/{id}/edit', [AlumniProfileController::class, 'edit'])->name('alumni.profile.edit');
    Route::put('alumni/profile/{id}/update', [AlumniProfileController::class, 'update'])->name('alumni.profile.update');
});

Route::middleware(['isAdmin'])->group(function () {
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
});

Route::post('/import-users', [UserController::class, 'import'])->name('import.users');


Route::middleware(['isAdmin'])->group( function() {

    Route::resource('permissions', PermissionController::class);
    Route::get('permissions/{permissionId}/delete', [App\Http\Controllers\PermissionController::class, 'destroy']);

    Route::resource('roles', RoleController::class);
    Route::get('roles/{roleId}/delete', [App\Http\Controllers\RoleController::class, 'destroy']);
    Route::get('roles/{roleId}/give-permissions', [App\Http\Controllers\RoleController::class, 'addPermissionToRole']);
    Route::put('roles/{roleId}/give-permissions', [App\Http\Controllers\RoleController::class, 'givePermissionToRole']);

    Route::resource('users', UserController::class);
    Route::get('users/{userId}/delete', [App\Http\Controllers\UserController::class, 'destroy']);
    // Route::post('logout', [AuthController::class, 'logout'])->name('logout');
    Route::resource('jobs', JobController::class);
    Route::get('/jobs', [JobController::class, 'index'])->name('role-permission.job.index');
    Route::delete('jobs/{jobId}', [JobController::class, 'destroy'])->name('role-permission.job.destroy');

    Route::get('jobs/{job}', [JobController::class, 'show'])->name('role-permission.job.show');

});


require __DIR__.'/auth.php';
