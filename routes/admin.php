<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Certificates\CertificateController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\Users\ProfileController;
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

Route::prefix(config('app.admin_prefix'))->group(function () {
    Route::name('admin.')->group(function () {
        // Auth routes
        Route::middleware(['guest'])->group(function () {
            Route::get('/', function () {
                return redirect()->route('login');
            });
        });

        Route::middleware(['auth', 'auth.session'])->group(function () {

            // Dashboard route
            Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

            // Certificates Route
            Route::group(['prefix' => 'certificates', 'as' => 'certificates.'], function () {
                Route::get('/', [CertificateController::class, 'index'])->name('index');

                Route::get('/search', [CertificateController::class, 'searchView'])->name('search');
                Route::post('/search', [CertificateController::class, 'searchResult']);

                Route::get('/upload-auto', [CertificateController::class, 'uploadAutoView'])->name('uploadauto');
                Route::post('/upload-auto', [CertificateController::class, 'uploadAuto']);

                Route::get('/upload-manual', [CertificateController::class, 'uploadManualView'])->name('uploadmanual');
                Route::post('/upload-manual', [CertificateController::class, 'uploadManual']);
            });

            // All Users 
            Route::resource('users', UserController::class);

            // Logged-in user profile
            Route::group(['prefix' => 'user', 'as' => 'user.'], function () {
                Route::get('/profile', function () {
                    return view('admin.users.profile');
                })->name('profile');

                Route::put('/password-update', [ProfileController::class, 'updatePassword'])->name('password-update');
                Route::put('/profile-update', [ProfileController::class, 'updateProfile'])->name('profile-update');
                Route::post('/logout-everywhere', [ProfileController::class, 'logoutEverywhere'])->name('logout-everywhere');
            });
        });
    });
});
