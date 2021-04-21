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
Route::get('/', 'FrontPortfolioController@newTheme');
Route::get('/home', 'FrontPortfolioController@index');
Route::get('/portfolio', 'FrontPortfolioController@index');
Route::post('/getcatdata', 'FrontPortfolioController@getcatdata');


//Route::get('/portfolio/{token}', 'PortfolioSingleController@show');
Route::get('/portfolio/{token}', 'FrontPortfolioController@newTheme');
Route::get('/portfolio1/{token}', 'FrontPortfolioController@newTheme1');
Route::get('/portfolio/showmoredata/{token}', 'PortfolioSingleController@showmoredata');
Route::get('/portfoliodetail/{token}', 'PortfolioSingleController@singledetails');
Route::get('/cronforaccesstoken/', 'PortfolioSingleController@cronforaccesstoken');
//Route::get('/loadmore/{token}/{offset}', 'PortfolioSingleController@ajaxloadmore');
Route::post('/loadmore', 'FrontPortfolioController@ajaxloadmore');
Route::post('/loadmore', 'FrontPortfolioController@ajaxloadmore');
Route::post('/filterData', 'FrontPortfolioController@filterData');
//Route::get('/loadmore/{token}/{offset}', 'PortfolioSingleController@ajaxloadmorewithids');

Route::get('/search', 'SearchController@index');
Route::get('/searchresult', 'SearchController@result');
Route::post('/searchresult', 'SearchController@result');

Auth::routes();

Route::get('/admin', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
Route::prefix('admin')->group(function(){
	
	Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
	Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
	Route::get('/home', 'AdminController@index')->name('admin.home');
	Route::get('/dashboard', 'AdminController@index')->name('admin.home');
	Route::get('/portfolio', 'PortfolioController@index')->name('admin.portfolio');
	Route::get('/logout', 'Auth\AdminLoginController@logout')->name('admin.logout');
	Route::get('/portfolio/add', 'PortfolioController@show')->name('admin.show');
	Route::post('/portfolio/add', 'PortfolioController@store')->name('admin.store');
	Route::get('/portfolio/destroy/{id}', 'PortfolioController@destroy')->name('admin.destroy');
	Route::get('/portfolio/edit/{id}', 'PortfolioController@edit')->name('admin.portfolio.edit');
	Route::post('/portfolio/update', 'PortfolioController@update')->name('admin.portfolio.update');
	Route::get('/portfolio/sortindex', 'PortfolioController@sortindex')->name('admin.portfolio.sortindex');
	Route::post('/portfolio/sortupdate', 'PortfolioController@sortupdate')->name('admin.portfolio.sortupdate');
	Route::get('/accesstoken', 'AccesstokenController@index')->name('admin.accesstoken');
	Route::get('/accesstoken/add', 'AccesstokenController@show')->name('admin.accesstoken.add');
	Route::post('/accesstoken/add', 'AccesstokenController@store')->name('admin.accesstoken.store');
	Route::get('/accesstoken/edit/{id}', 'AccesstokenController@edit')->name('admin.accesstoken.edit');
	Route::post('/accesstoken/update', 'AccesstokenController@update')->name('admin.accesstoken.update');
	Route::get('/accesstoken/delete/{id}', 'AccesstokenController@delete')->name('admin.accesstoken.delete');
	Route::get('/category', 'CategoryController@index')->name('admin.category');
	Route::get('/category/add', 'CategoryController@show')->name('admin.category.add');
	Route::post('/category/add', 'CategoryController@store')->name('admin.category.store');
	Route::get('/category/edit/{id}', 'CategoryController@edit')->name('admin.category.edit');
	Route::post('/category/update', 'CategoryController@update')->name('admin.category.update');
	Route::get('/category/delete/{id}', 'CategoryController@delete')->name('admin.category.delete');
	Route::get('/technology', 'TechnologyController@index')->name('admin.technology');
	Route::get('/technology/add', 'TechnologyController@show')->name('admin.technology.add');
	Route::post('/technology/add', 'TechnologyController@store')->name('admin.technology.store');
	Route::get('/technology/edit/{id}', 'TechnologyController@edit')->name('admin.technology.edit');
	Route::post('/technology/update', 'TechnologyController@update')->name('admin.technology.update');
	Route::get('/technology/delete/{id}', 'TechnologyController@delete')->name('admin.technology.delete');
	Route::get('/tags', 'TagController@index')->name('admin.tags');
	Route::get('/tags/add', 'TagController@show')->name('admin.tags.add');
	Route::post('/tags/add', 'TagController@store')->name('admin.tags.store');
	Route::get('/tags/edit/{id}', 'TagController@edit')->name('admin.tags.edit');
	Route::post('/tags/update', 'TagController@update')->name('admin.tags.update');
	Route::get('/tags/delete/{id}', 'TagController@delete')->name('admin.tags.delete');
	Route::get('/server', 'ServerController@index')->name('admin.server');
	Route::get('/server/add', 'ServerController@show')->name('admin.server.add');
	Route::post('/server/add', 'ServerController@store')->name('admin.server.store');
	Route::get('/server/edit/{id}', 'ServerController@edit')->name('admin.server.edit');
	Route::post('/server/update', 'ServerController@update')->name('admin.server.update');
	Route::get('/server/delete/{id}', 'ServerController@delete')->name('admin.server.delete');
	Route::get('/themes', 'ThemeController@index')->name('admin.themes');
	Route::get('/themes/add', 'ThemeController@show')->name('admin.themes.add');
	Route::post('/themes/add', 'ThemeController@store')->name('admin.themes.store');
	Route::get('/themes/edit/{id}', 'ThemeController@edit')->name('admin.themes.edit');
	Route::post('/themes/update', 'ThemeController@update')->name('admin.themes.update');
	Route::get('/themes/delete/{id}', 'ThemeController@delete')->name('admin.themes.delete');
	Route::get('/packages', 'PackageController@index')->name('admin.packages');
	Route::get('/packages/add', 'PackageController@show')->name('admin.packages.add');
	Route::post('/packages/add', 'PackageController@store')->name('admin.packages.store');
	Route::get('/packages/edit/{id}', 'PackageController@edit')->name('admin.packages.edit');
	Route::post('/packages/update', 'PackageController@update')->name('admin.packages.update');
	Route::get('/packages/delete/{id}', 'PackageController@delete')->name('admin.packages.delete');
	Route::get('/payment-methods', 'PaymentController@index')->name('admin.payment-methods');
	Route::get('/payment-methods/add', 'PaymentController@show')->name('admin.payment-methods.add');
	Route::post('/payment-methods/add', 'PaymentController@store')->name('admin.payment-methods.store');
	Route::get('/payment-methods/edit/{id}', 'PaymentController@edit')->name('admin.payment-methods.edit');
	Route::post('/payment-methods/update', 'PaymentController@update')->name('admin.payment-methods.update');
	Route::get('/payment-methods/delete/{id}', 'PaymentController@delete')->name('admin.payment-methods.delete');
	Route::get('/client', 'ClientController@index')->name('admin.client');
	Route::get('/client/add', 'ClientController@show')->name('admin.client.add');
	Route::post('/client/add', 'ClientController@store')->name('admin.client.store');
	Route::get('/client/edit/{id}', 'ClientController@edit')->name('admin.client.edit');
	Route::post('/client/update', 'ClientController@update')->name('admin.client.update');
	Route::get('/client/delete/{id}', 'ClientController@delete')->name('admin.client.delete');
	Route::get('/portfolio/export/{type}', 'PortfolioController@downloadExcel');
	Route::post('/portfolio/import', 'PortfolioController@importfile')->name('admin.portfolio.import');
	

});
