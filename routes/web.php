<?php

use App\Models\User;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JobController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\AlumniProfileController;

Route::get('/', function () {
    return view('login');
});

Route::patch('/jobs/{id}/restore', [JobController::class, 'restore'])->name('role-permissions.job.restore');

Route::get('activate-account/{token}', [UserController::class, 'activateAccount'])->name('activate-account');
Route::post('activate-account/{token}', [UserController::class, 'setPassword'])->name('set-password');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


// alumni routes

Route::get('/alumni/jobs', [JobController::class, 'alumniIndex'])->name('alumni.job.index');
Route::get('/alumni/jobs/{job}', [JobController::class, 'view'])->name('alumni.job.viewjob');

// matching jobs
Route::resource('projects', ProjectController::class);
Route::get('/projects', [ProjectController::class, 'index'])->name('projects.index');
Route::get('/projects/create', [ProjectController::class, 'create'])->name('projects.create');
Route::post('/projects', [ProjectController::class, 'store'])->name('projects.store');
Route::delete('projects/{projectId}', [ProjectController::class, 'destroy'])->name('projects.destroy');
Route::get('/projects/{id}/edit', [ProjectController::class, 'edit'])->name('projects.edit');
Route::put('projects/{id}/update', [ProjectController::class, 'update'])->name('projects.update');

// employer projects diplaying
Route::get('/alumni', [ProjectController::class, 'listAlumni'])->name('alumni.index');
Route::get('/alumni/{alumni}/index', [ProjectController::class, 'viewAlumniProjects'])->name('alumni.projects.index');
Route::get('/projects/{project}', [ProjectController::class, 'showProject'])->name('alumni.projects.show');


// profile routes
Route::get('/alumni/profile/index', [AlumniProfileController::class, 'index'])->name('alumni.profile.index');
Route::get('/alumni/profile', [AlumniProfileController::class, 'create'])->name('alumni.profile.create');
Route::post('/alumni/profile', [AlumniProfileController::class, 'store'])->name('alumni.profile.store');
Route::get('/alumni/profile/{id}/edit', [AlumniProfileController::class, 'edit'])->name('alumni.profile.edit');
Route::put('alumni/profile/{id}/update', [AlumniProfileController::class, 'update'])->name('alumni.profile.update');

Route::get('profiles/index', [AlumniProfileController::class, 'view'])->name('profiles.index');
Route::get('/alumni/profiles/search', [AlumniProfileController::class, 'search'])->name('profiles.search');
// Route::get('notifications/{id}', [NotificationController::class, 'show'])->name('notifications.show');
Route::get('notifications/{id}', function ($id) {
    $notification = User::find(auth()->id())->notifications()->findOrFail($id);
    $notification->markAsRead();
    return redirect()->route('alumni.job.viewjob', $notification->data['job_id']);
})->name('notifications.show');


Route::post('/import-users', [UserController::class, 'import'])->name('import.users');


// Route::middleware(['isAdmin'])->group(function () {

Route::group(['middleware' => ['role:super-user|admin|employer']], function () {
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
    Route::get('jobs/{jobId}/delete', [JobController::class, 'destroy'])->name('role-permission.job.destroy');

    Route::get('jobs/{job}', [JobController::class, 'show'])->name('role-permission.job.show');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
