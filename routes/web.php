<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CompanyController;
use App\Http\Controllers\Admin\UserController;
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

Route::redirect('/', 'admin/login-page');

Auth::routes();

Route::get('/home', function () {
    return view('dashboard.index');
})->name('dashboard.index');

// //login
// Route::get('/login', function () {
//     return view('dashboard.login');
// });
// //users << index


Route::resource('users', UserController::class);
Route::resource('companies', CompanyController::class);
Route::resource('categories', CategoryController::class);

// // users << create
// Route::get('/users/create', function () {
//     return view('dashboard.users.create');
// });

// // users << edit

// Route::get('/users/edit', function () {
//     return view('dashboard.users.edit');
// });

// // users << show

// Route::get('/users/show', function () {
//     return view('dashboard.users.show');
// });


Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function () {
    Route::get('login-page', 'AuthController@loginPage')->name('admin.login.page');
    Route::post('login', 'AuthController@login')->name('admin.login');
    Route::get('logout', 'AuthController@logout')->name('admin.logout');

    Route::group(['middleware' => ['auth:admins']], function () {
        Route::get('home', 'HomeController@index')->name('admin.home');

        //route-for-services
        Route::resource('roles', RoleController::class);


        //route-for-services
        Route::resource('admins', AdminController::class);

        Route::resource('posts', PostController::class);
        Route::resource('banners', BannerController::class);
        Route::resource('sports-woman', SportPostController::class);

        Route::post('posts-image', [PostController::class, 'uploadPostImage'])->name('posts.images.store');

        Route::resource('news', NewController::class);
        Route::resource('tournament-news', TournamentNewController::class);
        Route::post('tournament-image', [NewController::class, 'uploadNewImage'])->name('tournament-news.images.store');
        Route::post('news-image', [NewController::class, 'uploadNewImage'])->name('news.images.store');

        Route::resource('categories', CategoryController::class);
    });
});
