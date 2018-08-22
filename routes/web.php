<?php


use App\Events\OrderStatusChanged;
use App\user;
Auth::routes();
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


Route::get('/', function () { return view('welcome'); });
Route::get('/index', function () {    return view('index');});
Route::get('/services', function () { return view('services'); });
Route::get('/faq', function () { return view('faq'); });
Route::get('/aboutus', function () { return view('aboutus'); });
Route::get('/chat', 'ChatsController@index');
Route::get('messages', 'ChatsController@fetchMessages');
Route::post('messages', 'ChatsController@sendMessage');
Route::get('/contactus', function () {
      $config['center'] = 'California State University, Fullerton';
      $config['zoom']='15';
      $config['map_height'] = "300px";
      $config['map_width'] = "300px";
      $config['scrollwheel']= false;
      GMaps::initialize($config);
      $marker['position'] = 'California State University, Fullerton';
      $marker['infowindow_content'] = 'Easywash Centre';
      GMaps::add_marker($marker);
      $map = GMaps::create_map();
return view('contactus')->with('map', $map); });
Route::post('/contactus', ['uses'=>'ContactController@postContact', 'as' => 'contactus.postContact']);
Route::get('/fire', function () { event(new OrderStatusChanged);    return 'Fired'; });



Route::get('/home', 'HomeController@index')->name('home');
Route::get('/user/logout', 'Auth\LoginController@userLogout')->name('user.logout');
Route::get('/user/home', ['uses' => 'HomeController@index','as' =>'user.home']);
Route::get('/user/verify/{token}', 'Auth\RegisterController@verifyUser');
Route::get('/user/home/profile/{user_id}', ['uses' => 'HomeController@profile','as' =>'user.home.profile']);
Route::post('/user/home/profile/{user_id}', ['uses' => 'HomeController@profileupdate','as' =>'user.home.profileupdate']);
Route::get('/user/home/preferences/{user_id}', ['uses' => 'PreferencesController@index','as' =>'user.home.preferences']);
Route::post('/user/home/preferences/{user_id}', ['uses' => 'PreferencesController@store','as' =>'user.home.preferencesstore']);
Route::post('/user/home/preferences/update/{user_id}', ['uses' => 'PreferencesController@update','as' =>'user.home.preferencesupdate']);
Route::get('/user/home/{cid}', ['uses' => 'HomeController@categoryindex','as' =>'user.home.categoryindex']);
Route::get('/user/home/{zipcode}', ['uses' => 'HomeController@zipcodeindex','as' =>'user.home.zipcodeindex']);
Route::get('/user/home/details/{id}/{service_id}', ['uses' => 'HomeController@details','as' =>'user.home.details']);
Route::post('/user/home/details/{id}/{service_id}', ['uses' => 'HomeController@comment','as' =>'user.home.details.comment']);
Route::post('/user/home/details/contact/{id}/{service_id}', ['uses' => 'HomeController@contact','as' =>'user.home.details.contact']);
Route::get('/user/home/cart/{id}/{service_id}', ['uses' => 'CartController@index','as' =>'user.cart']);
Route::post('/user/home/cart/{id}/{service_id}', ['uses' => 'CartController@store','as' =>'user.cart.store']);
Route::get('/user/home/cart/success/{id}/{service_id}', ['uses' => 'CartController@index1','as' =>'user.cart1']);
Route::get('/user/home/cart/cartreview/{id}/{service_id}/{cart_id}', ['uses' => 'CartController@cartreview','as' =>'user.cartreview']);
Route::post('/user/home/cart/cartreview/{id}/{service_id}/{cart_id}', ['uses' => 'CartController@pay','as' =>'user.cartreview']);
Route::get('/user/home/cart/checkout', ['uses' => 'CartController@checkout','as' =>'user.checkout']);
Route::post('/user/home/cart/checkout', ['uses' => 'CartController@pay','as' =>'user.checkout']);
Route::get('/user/home/cart/orders/{id}/{service_id}', ['uses' => 'CartController@orders','as' =>'user.orders']);
Route::get('/user/home/cart/orderdetails/{id}/{service_id}/{cart_id}', ['uses' => 'CartController@orderdetails','as' =>'user.orderdetails']);


Route::get('/admin', 'AdminController@index')->name('admin.dashboard');
Route::get('/admin/logout', 'Auth\AdminLoginController@adminlogout')->name('admin.logout');
Route::get('/admin/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
Route::post('/admin/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
Route::get('/admin/register', 'Auth\AdminRegisterController@showRegisterForm')->name('admin.register');
Route::post('/admin/register', 'Auth\AdminRegisterController@store')->name('admin.register.submit');
Route::get('/admin/categories/create', ['uses' => 'CategoriesController@create','as' =>'admin.categories.create']);
Route::post('/admin/categories/store', ['uses' => 'CategoriesController@store','as' =>'admin.categories.store']);
Route::get('/admin/categories', ['uses' => 'CategoriesController@index','as' =>'admin.categories.index']);
Route::get('/admin/categories/edit/{id}', ['uses' => 'CategoriesController@edit','as' =>'admin.categories.edit']);
Route::get('/admin/categories/delete/{id}', ['uses' => 'CategoriesController@destroy','as' =>'admin.categories.delete']);
Route::post('/admin/categories/update/{id}', ['uses' => 'CategoriesController@update','as' =>'admin.categories.update']);
Route::get('/admin/workingday/create', ['uses' => 'WorkingdaysController@create','as' =>'admin.workingdays.create']);
Route::post('/admin/workingday/store', ['uses' => 'WorkingdaysController@store','as' =>'admin.workingdays.store']);
Route::get('/admin/workingday', ['uses' => 'WorkingdaysController@index','as' =>'admin.workingdays.index']);
Route::get('/admin/workingday/edit/{id}', ['uses' => 'WorkingdaysController@edit','as' =>'admin.workingdays.edit']);
Route::get('/admin/workingday/delete/{id}', ['uses' => 'WorkingdaysController@destroy','as' =>'admin.workingdays.delete']);
Route::post('/admin/workingday/update/{id}', ['uses' => 'WorkingdaysController@update','as' =>'admin.workingdays.update']);
Route::get('/admin/items/dryclean/create', ['uses' => 'DrycleanController@create','as' =>'admin.items.dryclean.create']);
Route::post('/admin/items/dryclean/store', ['uses' => 'DrycleanController@store','as' =>'admin.items.dryclean.store']);
Route::get('/admin/items/dryclean', ['uses' => 'DrycleanController@index','as' =>'admin.items.dryclean.index']);
Route::get('/admin/items/dryclean/edit/{id}', ['uses' => 'DrycleanController@edit','as' =>'admin.items.dryclean.edit']);
Route::get('/admin/items/dryclean/delete/{id}', ['uses' => 'DrycleanController@destroy','as' =>'admin.items.dryclean.delete']);
Route::post('/admin/items/dryclean/update/{id}', ['uses' => 'DrycleanController@update','as' =>'admin.items.dryclean.update']);
Route::get('/admin/items/tailoring/create', ['uses' => 'TailoringController@create','as' =>'admin.items.tailoring.create']);
Route::post('/admin/items/tailoring/store', ['uses' => 'TailoringController@store','as' =>'admin.items.tailoring.store']);
Route::get('/admin/items/tailoring', ['uses' => 'TailoringController@index','as' =>'admin.items.tailoring.index']);
Route::get('/admin/items/tailoring/edit/{id}', ['uses' => 'TailoringController@edit','as' =>'admin.items.tailoring.edit']);
Route::get('/admin/items/tailoring/delete/{id}', ['uses' => 'TailoringController@destroy','as' =>'admin.items.tailoring.delete']);
Route::post('/admin/items/tailoring/update/{id}', ['uses' => 'TailoringController@update','as' =>'admin.items.tailoring.update']);
Route::get('/admin/items/washandfold/create', ['uses' => 'washandfoldController@create','as' =>'admin.items.washandfold.create']);
Route::post('/admin/items/washandfold/store', ['uses' => 'washandfoldController@store','as' =>'admin.items.washandfold.store']);
Route::get('/admin/items/washandfold', ['uses' => 'washandfoldController@index','as' =>'admin.items.washandfold.index']);
Route::get('/admin/items/washandfold/edit/{id}', ['uses' => 'washandfoldController@edit','as' =>'admin.items.washandfold.edit']);
Route::get('/admin/items/washandfold/delete/{id}', ['uses' => 'washandfoldController@destroy','as' =>'admin.items.washandfold.delete']);
Route::post('/admin/items/washandfold/update/{id}', ['uses' => 'washandfoldController@update','as' =>'admin.items.washandfold.update']);
Route::get('/admin/services/',[ 'uses' => 'AdminServiceController@index','as' =>'admin.services']);
Route::get('/admin/services/trashed',[ 'uses' => 'AdminServiceController@trashed','as' =>'admin.services.trashed']);
Route::get('/admin/services/kill/{id}',[ 'uses' => 'AdminServiceController@kill','as' =>'admin.service.kill']);
Route::get('/admin/services/restore/{id}',[ 'uses' => 'AdminServiceController@restore','as' =>'admin.service.restore']);
Route::get('/admin/users/',[ 'uses' => 'AdminController@users','as' =>'admin.users']);
Route::get('/admin/users/delete/{id}',[ 'uses' => 'AdminController@usersdelete','as' =>'admin.users.delete']);
Route::get('/admin/sps/',[ 'uses' => 'AdminController@sps','as' =>'admin.sps']);
Route::get('/admin/sps/delete/{id}',[ 'uses' => 'AdminController@spsdelete','as' =>'admin.sps.delete']);
Route::get('/admin/orders/',[ 'uses' => 'AdminController@orders','as' =>'admin.orders']);
Route::get('/admin/orders/view/{cart_id}/{service_id}/{sp_id}', ['uses' => 'AdminController@ordersview','as' =>'admin.orders.view']);
Route::get('/admin/comments/',[ 'uses' => 'AdminController@comments','as' =>'admin.comments']);
Route::get('/admin/comments/view/{id}', ['uses' => 'AdminController@commentsview','as' =>'admin.comments.view']);
Route::get('/admin/settings',[ 'uses' => 'SettingsController@index', 'as' => 'admin.settings.settings'  ]);
Route::post('/adin/settings/update', [ 'uses' => 'SettingsController@update', 'as'=>'admin.settings.update']);
Route::get('/admin/payments',[ 'uses' => 'AdminController@payments', 'as' => 'admin.payments'  ]);

Route::get('/sp/login', 'Auth\SpLoginController@showLoginForm')->name('sp.login');
Route::post('/sp/login', 'Auth\SpLoginController@login')->name('sp.login.submit');
Route::get('/sp', 'SpController@index')->name('sp.dashboard');
Route::get('/sp/index', function () {return view('sp.spdash'); });
Route::get('/sp/logout', 'Auth\SpLoginController@splogout')->name('sp.logout');
Route::get('/sp/register', 'Auth\SpRegisterController@showRegisterForm')->name('sp.register');
Route::post('/sp/register', 'Auth\SpRegisterController@store')->name('sp.register.submit');
Route::get('/sp/service/create', ['uses' => 'ServiceController@create','as' =>'sp.service.create']);
Route::post('/sp/service/store', ['uses' => 'ServiceController@store','as' =>'sp.service.store' ]);
Route::get('/sp/service', ['uses' => 'ServiceController@index','as' =>'sp.services.index']);
Route::get('/sp/service/delete/{id}', ['uses' => 'ServiceController@destroy','as' =>'sp.service.delete']);
Route::get('/sp/service/info/{id}', ['uses' => 'ServiceController@show','as' =>'sp.service.info']);
Route::get('/sp/service/edit/{id}', ['uses' => 'ServiceController@edit','as' =>'sp.services.edit']);
Route::post('/sp/service/update/{id}', ['uses' => 'ServiceController@update','as' =>'sp.services.update']);
Route::get('/sp/profile/', ['uses' => 'SpController@profile','as' =>'sp.profile']);
Route::post('/sp/profile/', ['uses' => 'SpController@profileupdate','as' =>'sp.profile.update']);
Route::get('/sp/prices', ['uses' => 'PricingController@index','as' =>'sp.prices.index']);
Route::get('/sp/prices/create', ['uses' => 'PricingController@create','as' =>'sp.prices.create']);
Route::post('/sp/prices/store', ['uses' => 'PricingController@store','as' =>'sp.prices.store' ]);
Route::get('/sp/prices/edit/{id}', ['uses' => 'PricingController@edit','as' =>'sp.prices.edit']);
Route::post('/sp/prices/update/{id}', ['uses' => 'PricingController@update','as' =>'sp.prices.update']);
Route::get('/sp/orders', ['uses' => 'OrderController@index','as' =>'sp.orders.index']);
Route::get('/sp/orders/view/{cart_id}/{service_id}/{sp_id}', ['uses' => 'OrderController@view','as' =>'sp.orders.view']);
Route::get('/sp/orders/status/{cart_id}/{service_id}/{sp_id}', ['uses' => 'OrderController@status','as' =>'sp.orders.status']);
Route::post('/sp/orders/status/{cart_id}/{service_id}/{sp_id}', ['uses' => 'StatusController@store','as' =>'sp.status.store']);
Route::get('/sp/comments', ['uses' => 'OrderController@comment','as' =>'sp.comments.index']);
Route::get('/sp/comments/info/{id}', ['uses' => 'OrderController@commentinfo','as' =>'sp.comments.info']);
Route::get('/sp/messages', ['uses' => 'SpController@message','as' =>'sp.messages.index']);
Route::get('/sp/payments', ['uses' => 'SpController@payments','as' =>'sp.payments.index']);
