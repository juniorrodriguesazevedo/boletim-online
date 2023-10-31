<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BulletinController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\NoteController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\StudentController;
use App\Http\Controllers\Admin\ActivityController;
use App\Http\Controllers\Admin\ClassRoomController;
use App\Http\Controllers\Admin\PermissionController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes([
    'register' => false,
    'reset' => false,
    'confirm' => false
]);

/* Route::middleware(['throttle:12,1'])->group(function () {
    Route::get('/boletim', [BulletinController::class, 'index'])->name('bulletins.index');
    Route::get('/boletim/{student}', [BulletinController::class, 'show'])->name('bulletins.show');
});

Route::middleware(['throttle:5,1'])->group(function () {
    Route::post('/boletim', [BulletinController::class, 'store'])->name('bulletins.store');
}); */

Route::get('/boletim', [BulletinController::class, 'index'])->name('bulletins.index');
Route::post('/boletim', [BulletinController::class, 'store'])->name('bulletins.store');
Route::get('/boletim/{student}', [BulletinController::class, 'show'])->name('bulletins.show');

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {

    Route::get('/home', function () {
        return redirect()->route('class-rooms.index');
    });

    // PDFs
    Route::get('/students/pdf/{class_room}/{student}', [StudentController::class, 'pdf'])->name('students.pdf');
    Route::get('/class-rooms/pdf/{class_room}', [ClassRoomController::class, 'pdf'])->name('class-rooms.pdf');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profiles.edit');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profiles.update');

    Route::get('/activities', [ActivityController::class, 'index'])->name('activities.index');
    Route::get('/activities/{activity}', [ActivityController::class, 'show'])->name('activities.show');

    Route::get('/notes', [NoteController::class, 'index'])->name('notes.index');
    Route::get('/notes/{class_room}/{discipline}', [NoteController::class, 'show'])->name('notes.show');
    Route::put('/notes/{class_room}/{discipline}', [NoteController::class, 'update'])->name('notes.update');

    Route::resources([
        'roles' => RoleController::class,
        'users' => UserController::class,
        'students' => StudentController::class,
        'class-rooms' => ClassRoomController::class,
        'permissions' => PermissionController::class,
    ]);
});
