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

Route::get('/', ['uses' => 'ProductController@getIndex', 'as' => 'product.index']);

/* Checkout */
Route::get('/checkout',[
  'uses'=> 'ProductController@getCheckout',
  'as'=> 'checkout',
  'middleware' => 'auth'
]);

Route::post('/checkout',[
  'uses' => 'ProductController@postCheckout',
  'as' => 'checkout',
  'middleware' => 'auth'
]);
/* Checkout */

/* Reduce routes */
Route::get('/remove/{id}',[
  'uses' => 'ProductController@getRemoveItem',
  'as' => 'product.remove'
]);

Route::get('/reduce/{id}',[
  'uses' => 'ProductController@getReduceByOne',
  'as' => 'product.reduceByOne'
]);

/* Reduce routes */

/* Shopping cart */
Route::get('/add-to-cart/{id}',[
  'uses' => 'ProductController@getAddToCart',
  'as' => 'product.addToCart'
]);

Route::get('/shopping-cart',[
  'uses' => 'ProductController@getCart',
  'as' => 'product.shoppingCart'
]);
/* Shopping cart */

Route::group(['prefix' => 'user'], function(){
  Route::group(['middleware' => 'guest'], function(){
    /* Sign Up */
    Route::get('/signup',[
      'uses'=>'UserController@getSignup',
      'as' => 'user.signup'
    ]);
    Route::post('/signup',[
      'uses' => 'UserController@postSignup',
      'as' => 'user.signup'

    ]);
    /* Sign Up */
    /* Sign In*/
    Route::get('/signin',[
      'uses'=>'UserController@getSignin',
      'as' => 'user.signin'

    ]);
    Route::post('/signin',[
      'uses' => 'UserController@postSignin',
      'as' => 'user.signin'
    ]);
  });
  Route::group(['middleware' => 'auth'], function(){
    /* Profile */
    Route::get('/profile', [
      'uses' => 'UserController@getProfile',
      'as' => 'user.profile'
    ]);
    /* Profile */
    /* Log out*/
    Route::get('/logout', [
      'uses' => 'UserController@getLogout',
       'as' => 'user.logout'
       /* Log out*/
     ]);
  });
});
