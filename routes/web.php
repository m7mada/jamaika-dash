<?php

use App\Http\Livewire\RTL;
use GuzzleHttp\Middleware;
use App\Http\Livewire\Order;
use App\Http\Livewire\Twins;
use App\Http\Livewire\Tables;
use App\Http\Livewire\Billing;
use App\Http\Livewire\Profile;
use function PHPSTORM_META\map;
use App\Http\Livewire\Dashboard;
use App\Http\Livewire\Auth\Login;
use App\Http\Livewire\StaticSignIn;
use App\Http\Livewire\StaticSignUp;
use App\Http\Livewire\Auth\Register;
use App\Http\Livewire\Notifications;
use App\Http\Livewire\OrderDatatable;
use App\Http\Livewire\VirtualReality;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrderController;

use App\Http\Livewire\Auth\ResetPassword;

use App\Http\Livewire\Auth\ForgotPassword;
use App\Http\Livewire\Pakedge\PakedgeForm;
use App\Http\Livewire\Pakedge\PakedgeFormEdit;
use App\Http\Livewire\Pakedge\PakedgeFormShow;
use App\Http\Livewire\Pakedge\PakedgeDateTable;
use App\Http\Livewire\ExampleLaravel\UserProfile;
use App\Http\Livewire\ExampleLaravel\UserManagement;
use App\Http\Controllers\Admin\Pakedeg\pakedegController;
use App\Http\Livewire\ExampleLaravel\UserForm;
use App\Http\Livewire\ExampleLaravel\UserFormEdit;

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
    return redirect('sign-in');
});

Route::get('forgot-password', ForgotPassword::class)->middleware('guest')->name('password.forgot');
Route::get('reset-password/{id}', ResetPassword::class)->middleware('signed')->name('reset-password');



Route::get('sign-up', Register::class)->middleware('guest')->name('register');
Route::get('sign-in', Login::class)->middleware('guest')->name('login');


Route::group(['middleware' => 'auth'], function () {
    Route::get('user-profile', UserProfile::class)->name('user-profile');
    Route::get('user-management', UserManagement::class)->name('user-management');
    Route::get('add-users', UserForm::class)->name('add-users');
    Route::get('edit-user/{id}', UserFormEdit::class)->name('edit-user');
    Route::get('dashboard', Dashboard::class)->name('dashboard');
    Route::get('billing', Billing::class)->name('billing');
    Route::get('profile', Profile::class)->name('profile');
    Route::get('tables', Tables::class)->name('tables');
    Route::get('twins', Twins::class)->name('twins');

    Route::get('notifications', Notifications::class)->name("notifications");
    Route::get('virtual-reality', VirtualReality::class)->name('virtual-reality');
    Route::get('static-sign-in', StaticSignIn::class)->name('static-sign-in');



    Route::get('static-sign-up', StaticSignUp::class)->name('static-sign-up');
    Route::get('rtl', RTL::class)->name('rtl');
    Route::get('pakedges', PakedgeDateTable::class)->name('pakedge');
    Route::get('pakedges/create', PakedgeForm::class)->name('addPakedge');
    Route::get('pakedges/edit/{id}', PakedgeFormEdit::class)->name('editPakedge');
    Route::get('pakedges/show/{id}', PakedgeFormShow::class)->name('showPakedge');
    Route::post('pakedeg/billing', [OrderController::class, 'store'])->name('store.order');
    Route::get('orders', OrderDatatable::class)->name('order');
});
