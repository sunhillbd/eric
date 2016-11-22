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

Route::get('/', ['as'=>'index',function () {
        return view('frontend.index');
    }]
);

Route::get('register',['as'=>'register', function(){

    return view('frontend.register')->with('register',true);
}]);

Route::post('register',['as'=>'auth.register','uses'=>'Auth\RegisterController@register']);
Route::get('register/{activationcode}',['as'=>'auth.activate','uses'=>'Auth\RegisterController@activeUser']);
Route::get('password/{activationcode}',['as'=>'auth.reset.password','uses'=>'Auth\RegisterController@getPasswordResetForm']);
Route::post('password/reset',['as'=>'auth.password.reset','uses'=>'Auth\RegisterController@resetPassword']);
Route::post('password/update',['as'=>'auth.password.update','uses'=>'Auth\RegisterController@updatePassword']);
Route::post('password/edit',['as'=>'password.update','uses'=>'Auth\RegisterController@upPassword']);
Route::get('payment',['as'=>'payment','uses'=>'PaymentController@getPaymentForm'])->middleware('login');
Route::get('payment/edit',['as'=>'payment.edit','uses'=>'PaymentController@getUpdatePaymentForm'])->middleware('login');
Route::post('payment/submit',['as'=>'payment.submit','uses'=>'PaymentController@pay'])->middleware('login');
Route::get('login',['as'=>'auth.login','uses'=>'Auth\LoginController@loginPage']);
Route::post('login',['as'=>'auth.login','uses'=>'Auth\LoginController@login']);

Route::get('logout',['as'=>'auth.logout','uses'=>'Auth\LoginController@lgout']);
Route::get('dashboard',['as'=>'dashboard','middleware'=>['login','dashboard'],'uses'=>'DashboardController@getDashboard']);
Route::get('dashboard/{formcategory}/view',['as'=>'dashboard.view','uses'=>'DashboardController@viewCategoryDetails']);
Route::get('dashboard/{id}/edit',['as'=>'dashboard.edit','uses'=>'DashboardController@viewCategoryDetails']);
Route::get('dashboard/settings',['as'=>'dashboard.settings','uses'=>'DashboardController@goToSettings']);

Route::resource('press','PressController');

//Route::post('questionnare/submit',['as'=>'questionnare.submit','uses'=>'QuestionnareController@store']);

//Auth::routes();

//Route::get('/home', 'HomeController@index');
