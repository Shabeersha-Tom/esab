<?php

use App\Http\Controllers\Frontend\FrontendController;
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
include('admin.php');
include('user.php');

Route::get('/', [FrontendController::class, 'index']);
Route::get('/certificate/{slug}', [FrontendController::class, 'certificate'])->name('certificate.view');
Route::post('/certificate/download', [FrontendController::class, 'download'])->name('certificate.download');


