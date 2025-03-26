<?php

use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChatController;
use Spatie\Permission\Models\Permission;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\EventsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CalendarController;
use App\Http\Controllers\DialogueController;
use App\Http\Controllers\PublicController;
use App\Models\Events;
use App\Models\Mentors;
use App\Http\Controllers\MentorsController;

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

require __DIR__ . '/auth.php';

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard/events/create', [EventsController::class, 'create'])->name('events.create');
});

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

// Route::get('/calendar', function () {
//     return view('calendar');
// })->name('calendar');


Route::get('/calendar', [EventsController::class, 'index'])->name('calendar');

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



Route::get('/psychologist', [PublicController::class, 'psychologist'])->name('psychologist');

Route::get('/start-chat/{mentor}', [PublicController::class, 'StartChat'])->name('startchat');

Route::post('/save-dialogue', [DialogueController::class, 'store'])->name('startdialogue');



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

// Chat
Route::get('/chat/{conversation}', [ChatController::class, 'showChat'])->name('chat.show');
Route::post('/chat/send', [ChatController::class, 'sendMessage'])->name('chat.send');
Route::get('/chat/fetch/{conversation}', [ChatController::class, 'fetchMessages'])->name('chat.fetch');


// Events
Route::get('/events', function () {
  return view('events');
})->name('events');

Route::get('/dashboard/events/create', [EventsController::class, 'create'])->name('events.create');
Route::post('/dashboard/events', [EventsController::class, 'store'])->name('events.store');

Route::get('/dashboard/events/{event}/edit', [EventsController::class, 'edit'])->name('events.edit');
Route::put('/dashboard/events/{event}', [EventsController::class, 'update'])->name('events.update');
Route::delete('/dashboard/events/{event}', [EventsController::class, 'destroy'])->name('events.destroy');

Route::get('/events', function () {
  $events = Events::orderBy('created_at', 'desc')->get();
  return view('events', compact('events'));
});

Route::get('/events', [EventsController::class, 'showEvents'])->name('events');

Route::get('/all-events', [EventsController::class, 'allEvents'])->name('all-events');

// Mentors
Route::resource('mentors', MentorsController::class);
Route::get('/all-mentors', [MentorsController::class, 'index'])->name('all-mentors');

