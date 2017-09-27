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

Route::get('/', 'NewsController@getNewsItems');

Route::get('/distros', 'DistroController@getDistros');
Route::post('/distros','DistroController@addDeleteDistro');
Route::get('/distros/{distro_id}', [
  'as' => 'distros', 'uses' => 'DistroController@getDistro']);

Route::get('/vendors', 'VendorController@getVendors');
Route::post('vendors', 'VendorController@addDeleteVendor');
Route::get('/vendors/{vendor_id}', [
  'as' => 'vendors', 'uses' => 'VendorController@getVendor']);


Route::get('/components', 'ComponentController@getComponents');
Route::get('/components/filtered/','ComponentController@getFilteredComponents');
Route::post('/components', 'ComponentController@addDeleteComponent');
//Route::get('/components/{components_id}', [
//  'as' => 'components', 'uses' => 'VendorController@getComponent']);

Route::get('/known_configs', 'KnownConfigurationController@getConfigs');
Route::get('/known_configs/filtered/','KnownConfigurationController@getFilteredConfigs');
Route::post('/known_configs', 'KnownConfigurationController@addEditDeleteConfig');
//Route::get('known_configs/{config_id}', 'KnownConfigurationController@getConfig');

Route::get('/known_configs/{config_id}', [
  'as' => 'known_configs', 'uses' => 'KnownConfigurationController@getConfig']);
