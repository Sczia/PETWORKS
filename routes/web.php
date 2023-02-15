<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AlbumController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\BackupController;
use App\Http\Controllers\CancelController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ConfirmController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DailyController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\OwnerController;
use App\Http\Controllers\PendingController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RecordController;
use App\Http\Controllers\ReminderController;
use App\Http\Controllers\SaleController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [HomeController::class, 'index'])->name('home.index');
Route::get('/guidlines', [HomeController::class, 'guidlines'])->name('guidlines.index');
Route::get('/appointment', [HomeController::class, 'appointment'])->name('appointment.index');
Route::get('/existing', [HomeController::class, 'existing'])->name('existing.index');
Route::get('/calendar', [HomeController::class, 'calendar'])->name('calendar.index');
Route::name('gallery.')->prefix('gallery')->controller(GalleryController::class)->group(function () {
    Route::get('/',  'indexHome')->name('index');
    Route::get('/{id}',  'showHome')->name('show');
});
Route::prefix('mail')->name('mail.send.')->controller(MailController::class)->group(function () {
    Route::get('/verification',  'sendVerificationEmail')->name('verification');
    Route::get('/verify',  'verifyEmail')->name('verify');
});
Route::prefix('contact')->name('contact.')->controller(ContactController::class)->group(function () {
    Route::post('/store',  'store')->name('store');
});
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/login/form', [HomeController::class, 'form'])->name('user.login.form');
    Route::get('/settings', [LoginController::class, 'changepassform'])->name('changepass.form');
    Route::post('/login', [LoginController::class, 'authenticate'])->name('user.login');
    Route::put('/updatepass/{id}', [LoginController::class, 'updatepass'])->name('changepass.update');
<<<<<<< HEAD

=======
<<<<<<< HEAD

=======
    
>>>>>>> 9c86e61f634a9df0335d01cacf2ce0597478a84a
>>>>>>> 0f040bdc1886cac621b42cde3077632f83f9ad41
    Route::middleware(['isActive'])->group(function () {
        Route::post('/logout', [LoginController::class, 'logout'])->name('user.logout');
        /* ADMIN */
        Route::get('/dashboard', [AdminController::class, 'index'])->name('index');
        /* APPOINTMENT */
        Route::prefix('appointment')->name('appointment.')->controller(AppointmentController::class)->group(function () {
            Route::get('/',  'index')->name('index');
            Route::post('/update/{id}', 'update')->name('update');
            Route::post('/store',  'store')->name('store');
        });
        /* PENDING*/
        Route::prefix('pending')->name('pending.')->controller(PendingController::class)->group(function () {
            Route::get('/',  'index')->name('index');
            Route::post('/update/{id}', 'update')->name('update');
            Route::delete('/delete/{id}', 'destroy')->name('destroy');
        });

        /* CONFIRM */
        Route::prefix('confirm')->name('confirm.')->controller(ConfirmController::class)->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('/show/{id}',  'show')->name('show');
            Route::post('/update/{id}', 'update')->name('update');
            Route::post('/pending/{id}',  'reply')->name('reply');
            Route::get('/pdf/{id}',  'download')->name('download');
        });
        /* CANCEL*/
        Route::prefix('cancel')->name('cancel.')->controller(CancelController::class)->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('/show/{id}',  'show')->name('show');
            Route::post('/update/{id}', 'update')->name('update');
            Route::post('/pending/{id}',  'reply')->name('reply');
        });

        /* OWNER */
        Route::prefix('owner')->name('owner.')->controller(OwnerController::class)->group(function () {
            Route::get('/',  'index')->name('index');
            Route::get('/{id}',  'show')->name('show');
            Route::put('/update/{id}',  'update')->name('update');
        });
        /* CONTACTS */
        Route::prefix('contact')->name('contact.')->controller(ContactController::class)->group(function () {
            Route::get('/',  'index')->name('index');
            Route::post('/store',  'store')->name('store');
            Route::post('/reply',  'reply')->name('reply');
            Route::delete('/{id}',  'destroy')->name('destroy');
        });
        /* DOCTOR */
        Route::prefix('doctor')->name('doctor.')->controller(DoctorController::class)->group(function () {
            Route::get('/',  'index')->name('index');
            Route::post('/store',  'store')->name('store');
            Route::post('/reply',  'reply')->name('reply');
            Route::delete('/{id}',  'destroy')->name('destroy');
            Route::put('/update{id}',  'update')->name('update');
        });
        /* RECORDS */
        Route::prefix('records')->name('records.')->controller(RecordController::class)->group(function () {
            Route::get('/', [RecordController::class, 'index'])->name('index');
            Route::put('/update{id}',  'update')->name('update');
        });

        Route::prefix('contact')->name('contact.')->controller(ContactController::class)->group(function () {
        });

        /* CATEGORY*/
        Route::prefix('category')->name('category.')->controller(CategoryController::class)->group(function () {
            Route::get('/',  'index')->name('index');
            Route::post('/store',  'store')->name('store');
            Route::put('/update{id}',  'update')->name('update');
        });


        /* PRODUCT*/
        Route::prefix('product')->name('product.')->controller(ProductController::class)->group(function () {
            Route::get('/',  'index')->name('index');
            Route::get('/show/{id}',  'show')->name('show');
            Route::post('/store',  'store')->name('store');
            Route::put('/update{id}',  'update')->name('update');
        });

        /* SLAES*/
        Route::prefix('sale')->name('sale.')->controller(SaleController::class)->group(function () {
            Route::get('/',  'index')->name('index');
            Route::post('/store',  'store')->name('store');
            Route::put('/update{id}',  'update')->name('update');
            Route::get('/show/{id}',  'show')->name('show');
        });

        /* DAILY */
        Route::prefix('daily')->name('daily.')->controller(DailyController::class)->group(function () {
            Route::get('/',  'index')->name('index');
            Route::post('/store',  'store')->name('store');
            Route::put('/update{id}',  'update')->name('update');
            Route::get('/pdf',  'download')->name('download');
<<<<<<< HEAD
            Route::get('/export',  'export')->name('export');
           
=======
>>>>>>> 0f040bdc1886cac621b42cde3077632f83f9ad41
        });

        /* ALBUM */
        Route::prefix('album')->name('album.')->controller(AlbumController::class)->group(function () {
            Route::get('/',  'index')->name('index');
            Route::post('/store',  'store')->name('store');
            Route::post('/reply',  'reply')->name('reply');
            Route::delete('/{id}',  'destroy')->name('destroy');
        });

        /* ALBUM AND PHOTO */
        Route::name('gallery.')->prefix('gallery')->controller(GalleryController::class)->group(function () {
            Route::get('/', 'indexAdmin')->name('index');
            Route::get('/{id}', 'showAdmin')->name('show');
            Route::delete('/delete/{id}', 'destroy')->name('destroy');
        });

<<<<<<< HEAD
=======
        /* Backup*/
        Route::prefix('backup')->name('backup.')->controller(BackupController::class)->group(function () {
            Route::get('/',  'index')->name('index');
            Route::post('/store',  'store')->name('store');
            Route::put('/update{id}',  'update')->name('update');
        });

>>>>>>> 0f040bdc1886cac621b42cde3077632f83f9ad41
        /* reminder */
        Route::prefix('reminder')->name('reminder.')->controller(ReminderController::class)->group(function () {
            Route::get('/',  'index')->name('index');
        });
<<<<<<< HEAD

        /* EXCEL */
        Route::get('users/export/', [UsersController::class, 'export']);
=======
>>>>>>> 0f040bdc1886cac621b42cde3077632f83f9ad41
    });
});
