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

Route::get('/home', 'HomeController@index')->name('home');

Route::post('add/items/again','foodItemController@addAgain')->name('item.addAgain');

Route::post('/remove/items/list','foodItemController@removeItems')->name('remove.items');

Route::resource('food/item','foodItemController');

Route::get('food/{category}/item','foodItemController@showAll')->name('customer.allView'); // had a mistake , it will be admin instead of customer


Route::get('customer/food/{catagory}', 'CustomerController@showItems')->name('customer.showItems');

Route::get('customer/order/catagory/{catagory}/item/{id}', 'CustomerController@orderItem')->name('customer.order');

Route::get('customer/my_order', 'CustomerController@myOrder')->name('customer.my_order');


Route::post('customer/check_out', 'CustomerController@checkOut')->name('customer.check_out');

Route::get('customer/check_out/table_numbber', 'CustomerController@tableNumber')->name('customer.table_number');

Route::post('customer/confirm_order', 'CustomerController@confirmOrder')->name('customer.confirm_order');



Route::get('receptionist/table_info', 'CustomerController@tableInfo')->name('receptionist.table_info');

Route::get('receptionist/print_bill/{id}', 'CustomerController@printBill')->name('receptionist.print_bill');

Route::get('customer/success_order', 'CustomerController@successOrder')->name('customer.success_order');


Route::post('admin/search', 'foodItemController@searchItem')->name('admin.search');

// Route::get('admin/search', 'foodItemController@searchResult')->name('admin.search_result');



Route::post('customer/search', 'CustomerController@searchItem')->name('customer.search');



