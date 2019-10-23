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
    //SetupValue
    Route::resource('setupvalues', 'SetupValueController')
        ->except(['show', 'destroy', 'create', 'store'])
        ->names('srg.admin.setupvalues');

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
        ->except(['create', 'index'])
        ->names('srg.admin.gsobjects');
    //Gsobject create
    Route::get('/gsobjects/{gsobject}/create','GsobjectController@create')
        ->name('srg.admin.gsobjects.create');
    //Восстановление записи после софт делит
    Route::get('/gsobjects/{gsobject}/restore','GsobjectController@restore')
        ->name('srg.admin.gsobjects.restore');

    //StampAct
    Route::resource('stampacts', 'StampActController')
        ->except(['create', 'index', 'show'])
        ->names('srg.admin.stampacts');
    //StampAct create
    Route::get('/stampacts/{stampact}/create','StampActController@create')
        ->name('srg.admin.stampacts.create');
    //Восстановление записи после софт делит
    Route::get('/stampacts/{stampact}/restore','StampActController@restore')
        ->name('srg.admin.stampacts.restore');

    //Limit
    Route::resource('limits', 'LimitController')
        ->except(['create', 'index', 'show'])
        ->names('srg.admin.limits');
    //Limit create
    Route::get('/limits/{limit}/create','LimitController@create')
        ->name('srg.admin.limits.create');
    //Восстановление записи после софт делит
    Route::get('/limits/{limit}/restore','LimitController@restore')
        ->name('srg.admin.limits.restore');

    //Device
    Route::resource('devices', 'DeviceController')
        ->except(['create', 'index', 'show'])
        ->names('srg.admin.devices');
    //Device create
    Route::get('/devices/{device}/create','DeviceController@create')
        ->name('srg.admin.devices.create');
    //Восстановление записи после софт делит
    Route::get('/devices/{device}/restore','DeviceController@restore')
        ->name('srg.admin.devices.restore');

    //DeviceName
    Route::resource('devicenames', 'DeviceNameController')
        ->except(['show'])
        ->names('srg.admin.devicenames');
    //Восстановление записи после софт делит
    Route::get('/devicenames/{devicename}/restore','DeviceNameController@restore')
        ->name('srg.admin.devicenames.restore');

    //EquipmentName
    Route::resource('equipmentnames', 'EquipmentNameController')
        ->except(['show'])
        ->names('srg.admin.equipmentnames');
    //Восстановление записи после софт делит
    Route::get('/equipmentnames/{equipmentname}/restore','EquipmentNameController@restore')
        ->name('srg.admin.equipmentnames.restore');

    //Equipment
    Route::resource('equipments', 'EquipmentController')
        ->except(['create', 'index', 'show'])
        ->names('srg.admin.equipments');
    //Equipment create
    Route::get('/equipments/{equipment}/create','EquipmentController@create')
        ->name('srg.admin.equipments.create');
    //Восстановление записи после софт делит
    Route::get('/equipments/{equipment}/restore','EquipmentController@restore')
        ->name('srg.admin.equipments.restore');
});
