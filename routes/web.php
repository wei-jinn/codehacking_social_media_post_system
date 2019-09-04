<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::auth();

Route::get('/try', function(){

    return "This route works";

});

Route::get('/logout', 'Auth\LoginController@logout');

//Route::resource('admin/users', 'AdminUsersController'); for 5.2.45
Route::resource('admin/users', 'AdminUsersController',['names'=>[

    'index'=>'admin.users.index',
    'create'=>'admin.users.create',
    'store'=>'admin.users.store',
    'edit'=>'admin.users.edit'
]]);

Route::get('/home', 'HomeController@index');
Route::get('/post/{id}',['as' => 'home.post', 'uses' => 'AdminPostsController@post']);


Route::get('/admin', function(){

    return view('admin.index');
});

Route::group(['middleware'=>'admin'], function(){

    Route::resource('/admin/users', 'AdminUsersController', ['names'=>[

        'index' => 'admin.users.index',
        'create' => 'admin.users.create',
        'store' => 'admin.users.store',
        'edit' => 'admin.users.edit'

    ]]);

//Route::resource('/admin/posts', 'AdminPostsController');
Route::resource('/admin/posts', 'AdminPostsController',['names'=>[

    'index'=>'admin.posts.index',
    'create'=>'admin.posts.create',
    'store'=>'admin.posts.store',
    'edit'=>'admin.posts.edit',
    'show' => 'admin.posts.show',
    'update' => 'admin.posts.update'
]]);


//Route::resource('/admin/categories', 'AdminCategoriesController');
Route::resource('admin/categories', 'AdminCategoriesController',['names'=>[

    'index'=>'admin.categories.index',
    'create'=>'admin.categories.create',
    'store'=>'admin.categories.store',
    'edit'=>'admin.categories.edit'

]]);

//Route::resource('/admin/comments', 'PostCommentsController');
Route::resource('admin/comments', 'PostCommentsController',['names'=>[

    'index'=>'admin.comments.index',
    'create'=>'admin.comments.create',
    'store'=>'admin.comments.store',
    'edit'=>'admin.comments.edit',
    'show'=>'admin.comments.show'

]]);

//Route::resource('/admin/comment/replies', 'CommentRepliesController');
Route::resource('admin/comment/replies', 'CommentRepliesController',['names'=>[

    'index'=>'admin.replies.index',
    'create'=>'admin.replies.create',
    'store'=>'admin.replies.store',
    'edit'=>'admin.replies.edit'

]]);


});
Route::group(['middleware' => 'auth'], function(){

    Route::post('comment/reply', 'CommentRepliesController@createReply');

});

//Route::delete('/delete/posts' ,'DeleteMultiplePostsController@deleteMultiple');

