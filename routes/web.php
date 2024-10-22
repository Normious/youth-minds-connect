<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CalendarController;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Auth;

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

require __DIR__.'/auth.php';

Route::get('/', function () {
    return view('home');
})->name('home');
Route::get('/home', function () {
  return view('home');
})->name('home');

// Add routes for other pages
Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/calendar', function () {
    return view('calendar');
})->name('calendar');

// Continue adding routes for other pages

Route::get('/contact', function () {
    return view('contact');
})->name('contact');    

Route::get('/feedback', function () {
    return view('feedback');
})->name('feedback');

Route::get('/resources', function () {
    return view('resources');
})->name('resources');

Route::get('/articles', function () {
    return view('articles');
})->name('articles');

Route::get('/wellness-challenges', function () {
    return view('wellness-challenges');
})->name('wellness-challenges');

Route::get('/interactive-workshops', function () {
    return view('interactive-workshops');
})->name('interactive-workshops');

Route::get('/peer-support', function () {
    return view('peer-support');
})->name('peer-support');

Route::get('/member-profiles', function () {
    return view('member-profiles');
})->name('member-profiles');

Route::get('/community-spotlight', function () {
    return view('community-spotlight');
})->name('community-spotlight');

Route::get('/psychologist', function () {
    return view('psychologist');
})->name('psychologist');

Route::get('/notifications', function () {
    return view('notifications');
})->name('notifications');

// Add routes for other pages
Route::get('/profile', function () {
    return view('profile');
})->name('profile');

//Profile
Route::get('/profile', [ProfileController::class, 'edit'])->middleware('auth')->name('profile.edit');
Route::post('/profile', [ProfileController::class, 'update'])->middleware('auth')->name('profile.update');

//User Roles
// Admin routes
Route::middleware(['admin'])->group(function () {
  Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin/dashboard');
  Route::get('/admin/users', [AdminController::class, 'manageUsers'])->name('admin.manageUsers');
  Route::post('/admin/users/{user}/update-role', [AdminController::class, 'updateUserRole'])->name('admin.updateUserRole');
});

//Spatie
Route::get('/create-role', function () {
    $role = Role::create(['name' => 'admin']);
    $permission = Permission::create(['name' => 'edit articles']);

    $role->givePermissionTo($permission);
    $user = Auth::user();
    $user->assignRole('admin');

    return 'Role and permission assigned!';
});