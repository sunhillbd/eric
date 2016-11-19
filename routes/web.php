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
Route::get('payment',['as'=>'payment','uses'=>'PaymentController@getPaymentForm'])->middleware('login');
Route::post('payment',['as'=>'payment','uses'=>'PaymentController@pay'])->middleware('login');
Route::get('login',['as'=>'auth.login','uses'=>'Auth\LoginController@loginPage']);
Route::post('login',['as'=>'auth.login','uses'=>'Auth\LoginController@login']);

Route::get('logout',['as'=>'auth.logout','uses'=>'Auth\LoginController@lgout']);
Route::get('dashboard',['as'=>'dashboard','middleware'=>['login','dashboard'], function () {

    return view('frontend.dashboard.index');
}]);

Route::resource('press','PressController');

Route::post('questionnare/submit',['as'=>'questionnare.submit','uses'=>'QuestionnareController@store']);

//Auth::routes();

//Route::get('/home', 'HomeController@index');
