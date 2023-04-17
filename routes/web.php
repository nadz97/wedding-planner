<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Password;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Controllers\EventController;
use App\Http\Controllers\ResetController;
use App\Http\Controllers\VendorController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\InfoUserController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\RekeningController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\PemasukanController;
use App\Http\Controllers\MasterVendorController;
use App\Http\Controllers\ChangePasswordController;


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



Route::group(['middleware' => 'auth'], function () {

    Route::get('/', [HomeController::class, 'home']);


	Route::get('dashboard', function () {
        return view('dashboard');
	})->name('dashboard');

	Route::get('billing', function () {
        return view('billing');
	})->name('billing');

	Route::get('profile', function () {
        return view('profile');
	})->name('profile');

	Route::get('rtl', function () {
        return view('rtl');
	})->name('rtl');

	Route::get('user-management', function () {
		return view('laravel-examples/user-management');
	})->name('user-management');

	Route::get('tables', function () {
        return view('tables');
	})->name('tables');

    Route::get('virtual-reality', function () {
        return view('virtual-reality');
	})->name('virtual-reality');

    Route::get('static-sign-in', function () {
        return view('static-sign-in');
	})->name('sign-in');

    Route::get('static-sign-up', function () {
        return view('static-sign-up');
	})->name('sign-up');

    Route::get('/logout', [SessionsController::class, 'destroy']);
	Route::get('/user-profile', [InfoUserController::class, 'create']);

	Route::post('/user-profile', [InfoUserController::class, 'store']);
    Route::get('/login', function () {
    })->name('sign-up');

    Route::get('/admin/master/vendor/create', [VendorController::class, 'create']);
    Route::post('/admin/master/vendor/store', [VendorController::class, 'store']);
    Route::get('/admin/master/getkategori', [VendorController::class, 'getkategori']);



    Route::get('admin/event/getKlien', [EventController::class , 'getKlien'] );
    Route::get('admin/event/create', [EventController::class , 'create'] );
    Route::get('admin/event/read', [EventController::class , 'read'] );

    Route::get('admin/event/{id}/edit', [EventController::class, 'edit']);
    Route::get('admin/event/getEvent', [EventController::class, 'getEvent']);
    Route::get('admin/event/findevent/{id}', [EventController::class, 'findevent']);

    Route::get('admin/event/getKategori', [EventController::class , 'getKategori'] );
    Route::post('admin/master/savekategori', [KategoriController::class , 'savekategori']);

    Route::get('admin/event/getRekening', [RekeningController::class , 'getRekening'] );
    Route::post('admin/master/saveRekening', [RekeningController::class , 'saveRekening'] );

    Route::post('admin/master/saveEvent', [EventController::class , 'saveEvent'] );
    Route::post('admin/master/updateEditEvent', [EventController::class , 'updateEditEvent'] );

    Route::post('admin/master/destroy', [EventController::class , 'destroy'] );

    Route::post('admin/event/getPemasukan', [PemasukanController::class , 'getPemasukan'] );
    Route::get('admin/master/pemasukan/create', [PemasukanController::class , 'create'] );
    Route::post('admin/transaksi/pemasukan', [PemasukanController::class , 'simpan'] );
    // Route::get('admin/master/autoComplete' , [PemasukanController::class , 'autoComplete']);

    // Route::get('admin/master/{id}', [PemasukanController::class , 'autoComplete'])->name('complete');
    Route::post('/admin/master/savePemasukan', [PemasukanController::class , 'savePemasukan'] );
    Route::get('admin/pemasukan/getPemasukan', [PemasukanController::class , 'getPemasukan']);
    Route::get('admin/pemasukan/getPemasukan2', [PemasukanController::class , 'getPemasukan2']);

    Route::get('/admin/master/masterVendor/vendorlist', [MasterVendorController::class , 'vendorlist'] );
    Route::get('admin/master/getVendorList', [MasterVendorController::class, 'getVendorList']);
    Route::get('admin/master/findvendorlist/{id}', [MasterVendorController::class, 'findvendorlist']);

    Route::get('admin/master/invoice/index', [InvoiceController::class, 'index']);
    Route::get('admin/master/invoice/createInvoice', [InvoiceController::class , 'create'] );
    Route::get('admin/master/invoice/invoice', [InvoiceController::class , 'invoice'] );
    Route::get('admin/master/getInvoiceList', [InvoiceController::class , 'invoicelist'] );

    Route::resource('admin/master/vendor', VendorController::class);
    Route::resource('admin/master/invoice', VendorController::class);
    Route::resource('admin/master/masterVendor', MasterVendorController::class);
    Route::resource('admin/event/event', EventController::class);
    Route::resource('admin/master/pemasukan', PemasukanController::class );
    // Route::resource('/admin/master/pemasukan', PemasukanController::class);

});



Route::group(['middleware' => 'guest'], function () {
    Route::get('/register', [RegisterController::class, 'create']);
    Route::post('/register', [RegisterController::class, 'store']);
    Route::get('/login', [SessionsController::class, 'create']);
    Route::post('/session', [SessionsController::class, 'store']);
	Route::get('/login/forgot-password', [ResetController::class, 'create']);
	Route::post('/forgot-password', [ResetController::class, 'sendEmail']);
	Route::get('/reset-password/{token}', [ResetController::class, 'resetPass'])->name('password.reset');
	Route::post('/reset-password', [ChangePasswordController::class, 'changePassword'])->name('password.update');

});

Route::get('/login', function () {
    return view('session/login-session');
})->name('login');


