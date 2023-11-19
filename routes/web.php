<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TestController;

use App\Http\Controllers\DCnhapxuatController;
use App\Http\Controllers\PhieunhapxuatController;
use App\Http\Controllers\KhoController;
use App\Http\Controllers\LoaispController;
use App\Http\Controllers\NhacungcapController;
use App\Http\Controllers\SanphamController;
use App\Http\Controllers\TrangthaiController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\dashboard;

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
    return redirect()->route('phieunhapxuat.index');
})->middleware(['auth'])->name('trangchu');

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

// Multi input 
// Route::get('/student-form', [TestController::class, 'index']);
// Route::post('/store-input-fields', [TestController::class, 'store']);

// Route::get('/test', function () {
//     return Auth::id();
// })->middleware(['auth']);

// use App\Models\User;
// Route::get('/model', function () {
//     foreach (User::all() as $flight) {
//         dd($flight);
//     }
// })->middleware(['auth', 'admin']); // đã gọi Model thành công và check phân quyền thành công


require __DIR__.'/auth.php';



Route::prefix('phieunhapxuat')->as('phieunhapxuat.')->middleware(['auth'])->group(function () {

    Route::get('/index', [PhieunhapxuatController::class, 'index'])->name('index');
    Route::get('/create', [PhieunhapxuatController::class, 'create'])->name('create');
    Route::post('/store', [PhieunhapxuatController::class, 'store'])->name('store');
    Route::get('/show/{id}', [PhieunhapxuatController::class, 'show'])->name('show');
    Route::get('/edit/{id}', [PhieunhapxuatController::class, 'edit'])->name('edit');
    Route::post('/update', [PhieunhapxuatController::class, 'update'])->name('update');
    Route::post('/destroy', [PhieunhapxuatController::class, 'destroy'])->name('destroy');
    Route::post('/index', [PhieunhapxuatController::class, 'select'])->name('select');
}); // kiet








































































































Route::prefix('diachinhapxuat')->as('diachinhapxuat.')->middleware(['auth'])->group(function () {

    Route::get('/index', [DCnhapxuatController::class, 'index'])->name('index');
    Route::get('/create', [DCnhapxuatController::class, 'create'])->name('create');
    Route::post('/store', [DCnhapxuatController::class, 'store'])->name('store');
    Route::get('/edit/{id}', [DCnhapxuatController::class, 'edit'])->name('edit');
    Route::post('/update', [DCnhapxuatController::class, 'update'])->name('update');
    Route::post('/destroy', [DCnhapxuatController::class, 'destroy'])->name('destroy');

}); // kiet

Route::prefix('sanpham')->as('sanpham.')->middleware(['auth'])->group(function () {

    Route::get('/index', [SanphamController::class, 'index'])->name('index');
    Route::get('/create', [SanphamController::class, 'create'])->name('create');
    Route::post('/store', [SanphamController::class, 'store'])->name('store');
    Route::get('/edit/{id}', [SanphamController::class, 'edit'])->name('edit');
    Route::post('/update', [SanphamController::class, 'update'])->name('update');
    Route::post('/destroy', [SanphamController::class, 'destroy'])->name('destroy');

}); // kiet

Route::prefix('taikhoan')->as('taikhoan.')->middleware(['auth'])->group(function () {

    Route::get('/index', [UserController::class, 'index'])->name('index');
    Route::get('/create', [UserController::class, 'create'])->name('create');
    Route::post('/store', [UserController::class, 'store'])->name('store');
    Route::get('/show/{id}', [UserController::class, 'show'])->name('show');
    Route::get('/edit/{id}', [UserController::class, 'edit'])->name('edit');
    Route::post('/update', [UserController::class, 'update'])->name('update');
    Route::post('/destroy', [UserController::class, 'destroy'])->name('destroy');

}); // kiet

Route::get('dashboard/index', [dashboard::class, 'index'])->name('dashboard');
Route::get('dashboard/sanpham/{id}', [dashboard::class, 'Detail_SP'])->name('dashboard-sanpham');