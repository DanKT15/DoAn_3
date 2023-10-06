<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\PhieunhanxuatController;

use Illuminate\Support\Facades\Auth;

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

Route::get('/', function () {
    return view('Home.trangchu');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

// Route::get('/handle', [HomeController::class, 'handle']) // điều hướng sau khi login
//             ->middleware(['auth']) // kiem tra co dang nhap hay chua
//             ->name('handle'); // ten route

Route::get('/user', function () {
    return view('Home.user');
})->middleware(['user'])->name('user.dashboard'); // kiểm tra có phải user

Route::get('/admin', function () {
    return view('Home.admin');
})->middleware(['admin'])->name('admin.dashboard'); // kiểm tra có phải admin

Route::get('/test', function () {
    return Auth::id();
})->middleware(['auth']);

use App\Models\Trangthai;

Route::get('/model', function () {
    $data = [];
    foreach (Trangthai::all() as $flight) {
        $data = $flight->TENNV;
    }
    return $data;
})->middleware(['auth']); // đã gọi Model thành công


Route::get('/Store', [PhieunhanxuatController::class, 'Store']);