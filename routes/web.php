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

Route::get('logout','Auth\LoginController@logout')->name('logout');
Route::get('login','Auth\LoginController@login')->name('login');
Route::post('authenticate','Auth\LoginController@authenticate')->name('authenticate');

Route::get('/','FrontPagesController@index')->name('home');

Route::get('products','FrontPagesController@products')->name('products');
Route::get('product/{product}','FrontPagesController@productDetails')->name('product_details');
Route::post('product/{product}/comments/','FrontPagesController@comments')->name('comments');

Route::get('about','FrontPagesController@about')->name('about');
Route::get('contact','FrontPagesController@contact')->name('contact');


Route::namespace('Admin')->middleware('auth')->prefix('admin')->name('admin.')->group(function(){

    Route::get('/', function () {
        return view('admin.dashboard');
    })->name('dashboard');

    Route::resource('products','ProductController');
    Route::resource('categories','CategoryController');
    Route::resource('users','UserController');
});




/*
 *
Route::get('test', function () {

    $mark = 70;

    $languages = ['arabic', 'english'];

    $student_marks = [
        'arabic' => 80,
        'english' => 90,
        'sience' => 75,
        'math' => 68
    ];

    $students_marks = [
        ['arabic' => 80, 'english' => 90, 'sience' => 75, 'math' => 68],
        ['arabic' => 90, 'english' => 75, 'sience' => 75, 'math' => 68],
        ['arabic' => 70, 'english' => 85, 'sience' => 75, 'math' => 68],
        ['arabic' => 60, 'english' => 79, 'sience' => 75, 'math' => 68]
    ];
    return view('test', ['mark' => $mark, 'languages' => $languages, 'student_marks' => $student_marks, 'students_marks' => $students_marks]);
    //return view('test', compact('mark', 'languages','student_mark','students_marks'));
    //return view('test')->with(compact('mark', 'languages','student_mark','students_marks'));
});

Route::get('/laravel', function () {
    return view('welcome');
});

Route::get('profile',function(){
   return 'profile';
});

Route::redirect('profile','profile_new',301);

Route::get('profile_new',function(){
   return 'profile_new';
});

Route::view('welcome','home',['name'=>'ahmed']);

Route::get('post/{id}',function($id){
    return 'Post id : '.$id;
});

Route::get('post/{id}/comment/{comment}'
    ,function($post_id,$comment_id){
    return 'Post id : '.$post_id.
        ' , comment id : '.$comment_id;
});

Route::get('product/{id}',function($id){
    return 'product id : '.$id;
})->name('product');

Route::get('product/{id?}',function(){
    return '111111';
})->name('product');

Route::get('product-info',function(){
   return redirect()->route('product');
});

Route::middleware(['checkIp'])->group(function(){
   Route::get('dashboard',function(){
      return 'dashboard';
   });
});

//Route::get('reset','UsersController@reset');
Route::middleware(['checkIp','throttle:3|rate_limit,1'])->group(function(){
    Route::get('reset',function(){
        return 'reset';
    });
});

Route::prefix('admin')->group(function(){
   Route::get('home',function(){
      return 'admin/home';
   });

    Route::get('profile',function(){
        return 'admin/profile';
    });

    Route::get('reset',function(){
        return 'admin/reset';
    });
});
*/
/*Route::get('admin/home','UsersController@reset');
Route::get('admin/profile','UsersController@reset');
Route::get('admin/reset','UsersController@reset');*/


