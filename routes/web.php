<?php

//Crear enlace simbolico en el servidor
Route::get('/link', function () {
    Artisan::call('storage:link');
    echo "<h1 align='center'>Link Simbolico creado Correctamente</h1>";
});

/*
//Ver consultas a la Base de Datos
DB::listen(function ($query) {
    var_dump($query->sql);
});
*/


Route::get('email', function () {
    return new App\Mail\LoginCredentials(App\User::first(), 'qwer1234');
});


//Route::get('/', 'PagesController@home')->name('pages.home');
//Route::get('nosotros', 'PagesController@about')->name('pages.about');
//Route::get('archivo', 'PagesController@archive')->name('pages.archive');
//Route::get('contacto', 'PagesController@contact')->name('pages.contact');

Route::get('/blog/{post}', 'PostsController@show')->name('posts.show');
Route::get('/categorias/{category}', 'CategoriesController@show')->name('categories.show');
Route::get('/tags/{tag}', 'TagsController@show')->name('tags.show');

Route::group([
        'prefix' => 'admin',
        'namespace' => 'Admin',
        'middleware' => 'auth'],
    function () {
        Route::get('/', 'AdminController@index')->name('dashboard');

        // Temporal
        Route::get('posts', 'PostsController@index')->name('admin.posts.index');
        Route::get('posts/create', 'PostsController@create')->name('admin.posts.create');
        Route::post('posts', 'PostsController@store')->name('admin.posts.store');
        Route::get('posts/{post}', 'PostsController@edit')->name('admin.posts.edit');
        Route::put('posts/{post}', 'PostsController@update')->name('admin.posts.update');
        Route::delete('posts/{post}', 'PostsController@destroy')->name('admin.posts.destroy');
        // Temporal Fin

        //Route::resource('posts', 'PostsController', ['except' => 'show', 'as' => 'admin']);
        Route::resource('users', 'UsersController', ['as' => 'admin']);
        Route::resource('roles', 'RolesController', ['except' => 'show', 'as' => 'admin']);
        Route::resource('permissions', 'PermissionsController', ['only' => ['index', 'edit', 'update'], 'as' => 'admin']);

        Route::middleware('role:Admin')
            ->put('users/{user}/roles', 'UsersRolesController@update')
            ->name('admin.users.roles.update');

        Route::middleware('role:Admin')
            ->put('users/{user}/permissions', 'UsersPermissionsController@update')
            ->name('admin.users.permissions.update');

        Route::post('posts/{post}/photos', 'PhotosController@store')->name('admin.posts.photos.store');
        Route::delete('photos/{photo}', 'PhotosController@destroy')->name('admin.photos.destroy');
    }
);

// Authentication Routes...
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

// Registration Routes...
/* Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'Auth\RegisterController@register'); */

// Password Reset Routes...
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('password.update');

Route::get('email/verify', 'Auth\VerificationController@show')->name('verification.notice');
Route::get('email/verify/{id}', 'Auth\VerificationController@verify')->name('verification.verify');
Route::get('email/resend', 'Auth\VerificationController@resend')->name('verification.resend');

Route::get('/{any?}', 'PagesController@spa')->name('pages.home')->where('any', '.*');
