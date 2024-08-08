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
use App\Http\Controllers\JobApplicationController;


Route::get('/', function () {
    return view('login');
});
// activate account route
Route::get('activate-account/{token}', [UserController::class, 'activateAccount'])->name('activate-account');
Route::post('activate-account/{token}', [UserController::class, 'setPassword'])->name('set-password');

// ensure profile is created
Route::middleware(['auth', 'check.alumni.profile'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->middleware(['auth', 'verified'])->name('dashboard');
    Route::get('/alumni/jobs', [JobController::class, 'alumniIndex'])->name('alumni.job.index');
});
// Alumni and super-user Job applications and routes
Route::get('/alumni/jobs/{job}', [JobController::class, 'view'])->middleware('track.job.view')->name('alumni.job.viewjob');
Route::post('/job-applications', [JobApplicationController::class, 'store'])->name('job-applications.store');
Route::get('/job-applications/index', [JobApplicationController::class, 'index'])->name('job-applications.index');
Route::get('/job-applications/{id}', [JobApplicationController::class, 'show'])->name('job-application.show');
Route::get('/job-application/list', [JobApplicationController::class, 'listApplicant'])->name('job-application.list');
Route::get('/job-application/{applicationId}', [JobApplicationController::class, 'showApplication'])->name('job-application.application');
Route::get('/job-application/{id}/applist', [JobApplicationController::class, 'showApplicationList'])->name('job-application.applist');
Route::get('/jobs/search', [JobController::class, 'search'])->name('jobs.search');

// application submission
Route::post('/applications/{id}/send-email', [JobApplicationController::class, 'sendEmail'])->name('applications.sendEmail');

// Projects
Route::resource('projects', ProjectController::class);
Route::get('/project/index', [ProjectController::class, 'index'])->name('project.index');
Route::get('alumni/{alumni}/projects', [ProjectController::class, 'viewAlumniProjects'])->name('alumni.projects.index');
Route::get('/projects/create', [ProjectController::class, 'create'])->name('projects.create');
Route::post('/projects', [ProjectController::class, 'store'])->name('projects.store');

// Profile routes
Route::get('/alumni/profile/view', [AlumniProfileController::class, 'index'])->name('alumni.profile.view');
Route::get('/alumni/profile', [AlumniProfileController::class, 'create'])->name('alumni.profile.create');
Route::post('/alumni/profile', [AlumniProfileController::class, 'store'])->name('alumni.profile.store');
Route::get('/alumni/profile/{id}/edit', [AlumniProfileController::class, 'edit'])->name('alumni.profile.edit');
Route::put('alumni/profile/{id}/update', [AlumniProfileController::class, 'update'])->name('alumni.profile.update');
Route::get('profiles/index', [AlumniProfileController::class, 'view'])->name('profiles.index');
Route::get('/alumni/profiles/search', [AlumniProfileController::class, 'search'])->name('profiles.search');

// Notifications
Route::get('notifications/{id}', function ($id) {
    $notification = User::find(auth()->id())->notifications()->findOrFail($id);
    $notification->markAsRead();
    return redirect()->route('alumni.job.viewjob', $notification->data['job_id']);
})->name('notifications.show');

Route::post('/import-users', [UserController::class, 'import'])->name('import.users');

// Admin and super-user routes
Route::middleware(['role:super-user|admin|employer'])->group(function () {
    Route::resource('permissions', PermissionController::class);
    Route::get('permissions/{permissionId}/delete', [PermissionController::class, 'destroy']);
    // roles
    Route::resource('roles', RoleController::class);
    Route::get('roles/{roleId}/delete', [RoleController::class, 'destroy']);
    Route::get('roles/{roleId}/give-permissions', [RoleController::class, 'addPermissionToRole']);
    Route::put('roles/{roleId}/give-permissions', [RoleController::class, 'givePermissionToRole']);
    // users
    Route::get('/users/index', [UserController::class, 'index'])->name('role-permission.user.index');
    Route::post('/users/{userId}/deactivate', [UserController::class, 'deactivate'])->name('role-permission.user.deactivate');
    Route::post('/users/{userId}/activate', [UserController::class, 'activate'])->name('role-permission.user.activate');
    Route::resource('users', UserController::class);
    Route::get('users/{userId}/delete', [UserController::class, 'destroy']);
    // jobs
    Route::patch('/jobs/{id}/restore', [JobController::class, 'restore'])->name('role-permissions.job.restore');
    Route::resource('jobs', JobController::class);
    Route::get('/jobs', [JobController::class, 'index'])->name('role-permission.job.index');
    Route::get('jobs/{jobId}/delete', [JobController::class, 'destroy'])->name('role-permission.job.destroy');
    Route::get('jobs/{job}', [JobController::class, 'show'])->name('role-permission.job.show');
});

// Profile management
Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';