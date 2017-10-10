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
Auth::routes();

Route::get('/', 'HomeController@index');
Route::get('/home', 'HomeController@index');

Route::get('generator_builder', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@builder');

Route::get('field_template', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@fieldTemplate');

Route::post('generator_builder/generate', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@generate');


 Route::get('/contato', 'Frontend\ContatoController@index');
 Route::post('/contato-enviar', 'Frontend\ContatoController@contatoEnvia')->name('save.contato');


//PAINEL ### ROTAS ###
Route::group(['middleware' => 'auth', 'prefix' => '/sistema'], function () {
        Route::get('/', 'HomeController@index');

        Route::resource('/contatos', 'Backend\ContatoController');
       


        Route::resource('usuarios', 'Backend\UsuariosController');
        Route::resource('users', 'UserController');
        //Route::resource('/contatos', 'Backend\ContatoController');

        Route::get('/newspapers/{newspapers}/restore', 'Backend\NewspapersController@restore')->name('newspapers.restore');
        Route::get('/newspapers/status', 'Backend\NewspapersController@status');
        Route::post('/newspapers/order', 'Backend\NewspapersController@order');
        Route::get('/newspapers/trash', 'Backend\NewspapersController@trash')->name('newspapers.trash');
        Route::resource('/newspapers', 'Backend\NewspapersController', ['except' => 'show']);
        Route::get('/newspapers', 'Backend\NewspapersController@index')->name('newspapers.index');
        Route::get('/newspapers/featured', 'Backend\NewspapersController@featured');

        // noticias gallery
        Route::get('/newspapers/gallery/{newspapers?}', 'Backend\NewspapersController@gallery')->name('newspapers.gallery');
        Route::post('/newspapers/gallery/save', 'Backend\NewspapersController@save')->name('newspapers.gallaries.save');
        Route::post('/newspapers/gallery/remove', 'Backend\NewspapersController@remove')->name('newspapers.gallaries.remove');
        Route::post('/newspapers/gallery/legenda', 'Backend\NewspapersController@legenda')->name('newspapers.gallaries.legenda');

        Route::post('/newspapers/remove_files', 'Backend\NewspapersController@remove_files')->name('newspapers.remove_files');

        //Category
        Route::get('/newspapers/categories', 'Backend\CategoriesController@index')->name('newspapers.categories.index');

        Route::get('/newspapers/categories/create', 'Backend\CategoriesController@create')->name('newspapers.categories.create');

        Route::get('/newspapers/categories/{categories}/restore',
            'Backend\CategoriesController@restore')->name('newspapers.categories.restore');
        Route::post('/newspapers/categories/order', 'Backend\CategoriesController@order');
        Route::get('/newspapers/categories/trash', 'Backend\CategoriesController@trash')
            ->name('newspapers.categories.trash');

        Route::post('/newspapers/categories/create/store', 'Backend\CategoriesController@store')->name('newspapers.categories.store');

        Route::get('/newspapers/categories/edit/{id}', 'Backend\CategoriesController@edit')->name('newspapers.categories.edit');

        Route::get('/newspapers/categories/destroy', 'Backend\CategoriesController@destroy')->name('newspapers.categories.destroy');

        Route::get('/newspapers/categories/restore', 'Backend\CategoriesController@restore')->name('newspapers.restore');

        Route::patch('/newspapers/categories/update/{id}', 'Backend\CategoriesController@update')->name('newspapers.categories.update');

    });



