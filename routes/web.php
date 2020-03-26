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

// Route::get('/', function () {
// 	return view('welcome');
// });
Route::get('/hello', function () {
	return 'chinese';
	//return view('welcome');
});
Route::get('/good', 'IndexController@index');
// Route::get('/add', function () {
// 	echo "<form action='/adddo' method='post'>".csrf_field()."<input name='name'><button>提交</button></form>";
// });
// Route::post('/adddo', function () {
// 	echo request()->name;
// });
 Route::get('/add', 'IndexController@add');
 Route::post('/adddo', 'IndexController@adddo');
//Route::match(['get','post'],'/add', 'IndexController@add');
//Route::any('/add', 'ndexController@add');I
//路由视图
// Route::view('/add','add');
// Route::get('/good', 'IndexController@index');
 //必填路由参数传参
  // Route::get('/show/{id}/{name}', function ($id,$name) {
  // 	 echo $id."==".$name;
 
  // });
 Route::get('/show/{id}/{name}','IndexController@show');

//可选参数路由
 // Route::get('/new/{id?}/{name?}','IndexController@new');
 // Route::get('/news/{id?}/{name?}', function ($id=null,$name=null) {
  // 	echo $id;
 
  // });

 //正则约束
// Route::get('/cate/{id?}/{name?}','IndexController@cate')->where(['id'=>'\d+','name'=>'[a-zA-Z]']);




//品牌
// Route::view('/brand/create','brand.create');
// Route::view('/brand/store','BrandController@store');
Route::prefix('brand')->middleware('islogin')->group(function(){
	Route::get('create', 'BrandController@create');
	Route::post('store', 'BrandController@store');
	Route::get('index', 'BrandController@index');
	Route::get('edit/{id}', 'BrandController@edit');
	Route::post('update/{id}', 'BrandController@update');
	Route::get('destroy/{id}', 'BrandController@destroy');
    Route::get('checkOnly', 'BrandController@checkOnly');

});



Route::get('/student/create', 'StudentController@create');
Route::post('/student/store', 'StudentController@store');
Route::get('/student/index', 'StudentController@index');
Route::get('/student/destroy/{id}', 'StudentController@destroy');
Route::post('/student/update/{id}', 'StudentController@update');
Route::get('/student/edit/{id}', 'StudentController@edit');



Route::get('/type/create', 'TypeController@create');
Route::post('/type/store', 'TypeController@store');
Route::get('/type/index', 'TypeController@index');
Route::get('/type/destroy/{id}', 'TypeController@destroy');
Route::get('/type/edit/{id}', 'TypeController@edit');
Route::post('/type/update/{id}', 'TypeController@update');
Route::get('/type/checkOnly', 'TypeController@checkOnly');


Route::get('/staff/create', 'StaffController@create');
Route::post('/staff/store', 'StaffController@store');
Route::get('/staff/index', 'StaffController@index');



Route::get('/shoop/create', 'ShoopController@create');
Route::post('/shoop/store', 'ShoopController@store');
Route::get('/shoop/index', 'ShoopController@index');
Route::get('/shoop/destroy/{id}', 'ShoopController@destroy');
Route::get('/shoop/edit/{id}', 'ShoopController@edit');
Route::post('/shoop/update/{id}', 'ShoopController@update');
Route::get('/shoop/checkOnly', 'ShoopController@checkOnly');


Route::get('/book/create', 'BookController@create');
Route::post('/book/store', 'BookController@store');
Route::get('/book/index', 'BookController@index');




Route::get('/admin/create', 'AdminController@create');
Route::post('/admin/store', 'AdminController@store');
Route::get('/admin/index', 'AdminController@index');
Route::get('/admin/edit/{id}', 'AdminController@edit');
Route::post('/admin/update/{id}', 'AdminController@update');
Route::get('/admin/destroy/{id}', 'AdminController@destroy');
Route::get('/admin/checkOnly', 'AdminController@checkOnly');


Route::get('/new/create', 'NewController@create');
Route::post('/new/store', 'NewController@store');
Route::get('/new/index', 'NewController@index');


Route::get('login', 'LoginController@login');
Route::post('logindo', 'LoginController@logindo');




Route::get('/article/create', 'ArticleController@create');
Route::post('/article/store', 'ArticleController@store');
Route::get('/article/index', 'ArticleController@index');
Route::get('/article/edit/{id}', 'ArticleController@edit');
Route::post('/article/update/{id}', 'ArticleController@update');

Route::prefix('article')->group(function(){
	Route::get('create', 'ArticleController@create');
	Route::post('store', 'ArticleController@store');
	Route::get('index', 'ArticleController@index');
	Route::get('edit/{id}', 'ArticleController@edit');
	Route::post('update/{id}', 'ArticleController@update');
	// Route::get('destroy/{id}', 'ArticleController@destroy');
	Route::post('destroy/{id}', 'ArticleController@destroy');
    Route::get('checkOnly', 'ArticleController@checkOnly');
});

Route::get('/', 'Index\IndexController@index')->name('index');
Route::get('/log', 'Index\LoginController@log');
Route::get('/reg', 'Index\LoginController@reg');
Route::get('/reg/sendSMS', 'Index\LoginController@sendSMS');
Route::get('/log/zc', 'Index\LoginController@zc');
Route::post('/log/dl', 'Index\LoginController@dl');
Route::get('/dh', 'Index\IndexController@dh');
Route::get('/reg/sendEmail', 'Index\LoginController@sendEmail');
Route::get('/list/lb', 'Index\ListController@lb');
Route::get('/list/proinfo/{id}', 'Index\ProinfoController@proinfo')->name('proinfo');
Route::post('/addcart', 'Index\CartController@addcart');
Route::get('/cartindex', 'Index\CartController@cartindex')->name('cart');
Route::get('/pay', 'Index\PayController@pay');
Route::get('/success', 'Index\SuccessController@success');
Route::get('/address', 'Index\AddressController@address');
Route::get('/cart/jiesuan', 'Index\CartController@jiesuan');
Route::post('/addressadd', 'Index\AddressController@addressadd');
Route::post('/order', 'Index\OrderController@order');
Route::get('/payy/{orderId}', 'Index\PayyController@payy');
Route::get('/return_url', 'Index\PayyController@return_url');
Route::get('/notify_url', 'Index\PayyController@notify_url');








Route::get('/news/index', 'NewsController@index');


Route::get('/cookie/add', 'Index\LoginController@addcookie');
Route::get('/cookie/get', 'Index\LoginController@getcookie');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
