<?php
// use Symfony\Component\Routing\Annotation\Route;
use Illuminate\Support\Facades\Route;


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

Route::get('/', function() {
    return view('welcome');
});

Auth::routes();

// Route::get('/', 'HomeController@index');


//MIDDLEWARE IS USED TO AUTHENTICATE WHETHER THE USER IS LOGGED IN OR NOT

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {
    
    Route::get('/home', [
        'uses' => 'HomeController@index',
        'as'   => 'home'
    ]);


    Route::get('/post/create', [
        'uses' => 'PostsController@create',
        'as'   => 'post.create'
    ]);

    Route::get('/posts', [
        'uses' => 'PostsController@index',
        'as' => 'posts'
    ]);


    Route::post('/post/store', [
        'uses' => 'PostsController@store',
        'as'   => 'post.store'
    ]);

    Route::get('/post/delete/{id}', [
        'uses' => 'PostsController@destroy',
        'as' => 'post.delete'
    ]);

    Route::get('/posts/trashed', [
        'uses' => 'PostsController@trashed',
        'as' => 'post.trashed'
    ]); 


    Route::get('/categories', [
        'uses' => 'CategoriesController@index',
        'as' => 'categories'
    ]);

    Route::get('/category/create', [
        'uses' => 'CategoriesController@create',
        'as' => 'category.create'
    ]);

    Route::post('/category/store', [
        'uses' => 'CategoriesController@store',
        'as' => 'category.store'
    ]);

    Route::get('/category/edit/{id}', [
        'uses' => 'CategoriesController@edit',
        'as' => 'category.edit'
    ]);

    // Route::get('category/edit/{id}', 'CategoriesController@edit')->name('category.edit');

    // Route::get('/category.edit/{id}', 'CategoriesController@activateUser');

    Route::get('/category/delete/{id}', [
        'uses' => 'CategoriesController@destroy',
        'as' => 'category.delete'
    ]);

    // Route::get('categories/update/{$id}', 'CategoriesController@update')->name('category.update');

    // Route::put('/category/update/{$id}', [
    //     'uses' => 'CategoriesController@update',
    //     'as' => 'category.update'
    // ]);

    Route::post('/category/update/{id}', [
        'as' => 'category.update',
        'uses' => 'CategoriesController@update'
    ]);


});


// Route::get('/post/create', [
//     'uses' => 'PostsController@create',
//     'as'   => 'post.create'
// ]);


// Route::post('/post/store', [
//     'uses' => 'PostsController@store',
//     'as'   => 'post.store'
// ]);

