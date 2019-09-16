<?php

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

Auth::routes();

Route::get('/dashboard', 'DashboardController@index')->name('dashboard');

// Админка

$groupData = [
    'namespace' => 'SAUPG\Admin',
    'prefix'    => 'admin/srg',
    'middleware'=> 'auth',
];
Route::group($groupData, function () {
    //MainContract
    Route::resource('maincontracts', 'MainContractController')
        ->names('srg.admin.maincontracts');
    //Восстановление записи после софт делит
    Route::get('/maincontracts/{maincontract}/restore','MainContractController@restore')
        ->name('srg.admin.maincontracts.restore');

    //Форма печати договоров
    Route::get('/printcontract/form', 'PrintContractController@index')
        ->name('srg.admin.printcontract.index');
    //Api печати договоров
    Route::post('/printcontract/print', 'PrintContractController@print')
        ->name('srg.admin.printcontract.print');

    //Gsobject
    Route::resource('gsobjects', 'GsobjectController')
        ->names('srg.admin.gsobjects');
    //Восстановление записи после софт делит
    Route::get('/gsobjects/{gsobject}/restore','GsobjectController@restore')
        ->name('srg.admin.gsobjects.restore');

    //StampAct
    Route::resource('stampacts', 'StampActController')
        ->except(['create'])
        ->names('srg.admin.stampacts');
    //StampAct create
    Route::get('/stampacts/{stampact}/create','StampActController@create')
        ->name('srg.admin.stampacts.create');
    //Восстановление записи после софт делит
    Route::get('/stampacts/{stampact}/restore','StampActController@restore')
        ->name('srg.admin.stampacts.restore');
});
