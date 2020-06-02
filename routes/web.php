<?php

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/base', function () {
    return view('layout');
});

Route::prefix('account')->group(function () {
    Route::get('administrator', 'AdministratorController@index')->name('acc.admin');
    Route::post('administrator/new', 'AdministratorController@new')->name('acc.admin.new');
    Route::post('administrator/update', 'AdministratorController@update')->name('acc.admin.update');
    Route::post('administrator/delete', 'AdministratorController@delete')->name('acc.admin.delete');

    Route::get('farmer', 'FarmerController@index')->name('acc.farmer');
    Route::post('farmer/new', 'FarmerController@new')->name('acc.farmer.new');
    Route::post('farmer/update', 'FarmerController@update')->name('acc.farmer.update');
    Route::post('farmer/delete', 'FarmerController@delete')->name('acc.farmer.delete');

    Route::get('user', 'UserController@index')->name('acc.user');
    Route::get('user/json', 'UserController@json')->name('acc.user.json');
    Route::get('user/1', 'UserController@detail')->name('acc.user.detail');
});

Route::prefix('livestock')->group(function () {
    Route::get('product', 'LivestockProductController@index')->name('live.product');
    Route::post('product/new', 'LivestockProductController@new')->name('live.product.new');
    Route::post('product/delete', 'LivestockProductController@delete')->name('live.product.delete');

    Route::post('product/animal/add', 'LivestockProductController@animal_add')->name('live.product.animal.add');
    Route::post('product/animal/update', 'LivestockProductController@animal_update')->name('live.product.animal.update');
    Route::post('product/animal/delete', 'LivestockProductController@animal_delete')->name('live.product.animal.delete');

    Route::post('product/variety/add', 'LivestockProductController@variety_add')->name('live.product.variety.add');
    Route::post('product/variety/update', 'LivestockProductController@variety_update')->name('live.product.variety.update');
    Route::post('product/variety/delete', 'LivestockProductController@variety_delete')->name('live.product.variety.delete');

    Route::get('user', 'LivestockUserController@index')->name('live.user');
    Route::get('user/{id}', 'LivestockUserController@detail')->name('live.user.detail');
    Route::post('user/add', 'LivestockUserController@add')->name('live.user.add');

    Route::get('test','LivestockUserController@test');
});


Route::prefix('transaction')->group(function () {
    Route::get('view', 'TransactionController@index')->name('trc.view');
    Route::get('view/json', 'TransactionController@json')->name('trc.view.json');
    Route::post('view/delete', 'TransactionController@delete')->name('trc.view.delete');
    Route::post('view/update', 'TransactionController@update')->name('trc.view.update');

    Route::get('confirmation', 'ConfirmationController@index')->name('trc.confirmation');
    Route::get('confirmation/json', 'ConfirmationController@json')->name('trc.confirmation.json');
    Route::post('confirmation/update', 'ConfirmationController@update')->name('trc.confirmation.update');
    Route::post('confirmation/delete', 'ConfirmationController@delete')->name('trc.confirmation.delete');

    Route::get('withdrawal', 'WithdrawalController@index')->name('trc.withdrawal');
    Route::post('withdrawal/new', 'WithdrawalController@new')->name('trc.withdrawal.new');
    Route::post('withdrawal/delete', 'WithdrawalController@delete')->name('trc.withdrawal.delete');
});

Route::prefix('crm')->group(function () {
    Route::get('notification', 'CRMController@index')->name('crm.notif');
    Route::post('notification/post', 'CRMController@post')->name('crm.notif.post');
});
