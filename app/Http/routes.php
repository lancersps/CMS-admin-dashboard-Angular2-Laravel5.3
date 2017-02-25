<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::auth();

Route::get('/admin/project', 'HomeController@index');
Route::get('/admin/project/new', 'ProjectController@index_new');
Route::get('/admin/project/update/project/{id}', 'ProjectController@update_project');
Route::post('/admin/project/onoff', 'ProjectController@onoff_project');
Route::post('/admin/project/update/onoff', 'ProjectController@update_onoff_project');
Route::post('/admin/project/delete', 'ProjectController@delete_project');
Route::post('/admin/project/update/delete', 'ProjectController@update_delete_project');
Route::post('/admin/project', 'ProjectController@save_project');
Route::get('/admin/project/delete-update/{id}', 'ProjectController@delete_update_project');
Route::post('/admin/project/save_image', 'ProjectController@save_image_project');
Route::post('/admin/project/update/save', 'ProjectController@update_save_project');

Route::get('/admin/page', 'PageController@index');
Route::post('/admin/page', 'PageController@save_page');
Route::post('/admin/page/onoff', 'PageController@onoff_page');
Route::post('/admin/page/delete', 'PageController@delete_page');
Route::get('/admin/page/new', 'PageController@new_index');
Route::get('/admin/page/update/page/{id}', 'PageController@update_page');
Route::get('/admin/page/delete-update/{id}', 'PageController@delete_update_page');
Route::post('/admin/page/update/save', 'PageController@update_save_page');

Route::get('/admin/template', 'TemplateController@index');
Route::post('/admin/template/activate', 'TemplateController@activate_template');

Route::get('/admin/account', 'Auth\PasswordController@getResetAuthenticatedView');
Route::post('/admin/account/update', 'Auth\PasswordController@resetAuthenticated');
Route::get('/admin/account/setting', 'AccountController@account_setting');
Route::post('/admin/account/setting_save', 'AccountController@setting_save');
Route::post('/admin/account/logodelete', 'AccountController@deletelogo');
Route::post('/admin/account/favicondelete', 'AccountController@deletefavicon');
Route::post('/admin/account/accountdelete', 'AccountController@deleteaccount');

Route::get('/admin/customize', function(){
    return view('customize.customize');
});

Route::get('/{username?}-site', 'SiteController@index');
