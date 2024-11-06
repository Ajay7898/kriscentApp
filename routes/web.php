<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{HomeController,UserController,ConsultantController,AdminController};
use Illuminate\Support\Facades\DB;
use App\Events\SendNotification;
use App\Jobs\WelcomeEmailsend;
use App\Mail\SendEmailTest;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () 
{
    return redirect('login');
});

Auth::routes();


Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::controller(AdminController::class)->middleware(['auth','admin'])->group(function()
{
   Route::get('/admin-dashboard','index')->name('home.admin');

});

Route::controller(ConsultantController::class)->middleware(['auth','consultant'])->group(function()
{
   Route::get('/consultant-dashboard','index')->name('home.consultant');

});

Route::controller(UserController::class)->middleware(['auth','user'])->group(function()
{
    Route::get('/user-dashboard', 'index')->name('home.user');
    Route::get('/user-consultant-create', 'create')->name('user.consultant.create');
    Route::post('/user-consultant-store', 'store')->name('user.consultant.store');
    Route::get('/user-consultant-edit/{id}', 'edit')->name('user.consultant.edit');
    Route::post('/user-consultant-update/{id}', 'update')->name('user.consultant.update');
    Route::get('/user-consultant-delete/{id}', 'destroy')->name('user.consultant.destroy');

    Route::get('/user-profile-show', 'userProfile')->name('user.profile.show');
    Route::post('/user-profile-update', 'userProfileUpdate')->name('user.profile.update');

    Route::get('/user-notification-create', 'userNotificationCreate')->name('user.notification.create');
    Route::post('/send-notification','sendNotification')->name('send-notification');

    Route::get('email-test', function()
    {
        $details['email'] = 'ajaydyadav7898@gmail.com';
        dispatch(new WelcomeEmailsend($details));
        dd('done');
    });
 
});


