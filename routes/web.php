<?php


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TestController;



use App\Http\Controllers\Admin\PhieunhanxuatController;




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
})->middleware(['auth'])->name('trangchu');

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

// Multi input 
// Route::get('/student-form', [StudentController::class, 'index']);
// Route::post('/store-input-fields', [StudentController::class, 'store']);

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















