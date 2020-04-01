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

use App\Http\Controllers\UserController;
use App\Image;
/*Route::get('/', function () {
    $images=Image::all();
    foreach($images as $image){
       echo ($image->user_id . ' --- '. $image->image_path) . '<br>';
       echo ($image->user->name . ' ' . $image->user->lastname) . '<br>';

      
        if(count($image->coments)>=1){
            echo '<h4>Comments</h4>';
            foreach($image->coments as $coment){
                echo ($coment->user->name . ' ' . $coment->user->lastname ).'<br>';
                echo ( $coment->content).'<br>';
            }
        }
        echo '<h4>Likes</h4>';
        echo (count($image->likes));
       echo ('<hr>');


    }
    die;
    return view('welcome');
});
*/


Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

Route::get('/configuration','UserController@configuration')->name('configuration')->middleware('auth');
Route::post('/user/update','UserController@update')->name('user.update');
Route::get('/user/image/{fileName}','UserController@getImage')->name('user.image')->middleware('auth');
Route::get('/getimage/{fileName}','ImageController@getImage')->name('image.get')->middleware('auth');
Route::get('/image/upload','ImageController@upload')->name('image.upload')->middleware('auth');
Route::post('/image/upload','ImageController@save')->name('image.upload')->middleware('auth');

Route::get('/image/detail/{id}','ImageController@imageDetail')->name('image.detail')->middleware('auth');
Route::post('/coment/store','ComentController@store')->name('coment.store')->middleware('auth');
Route::delete('/coment/delete','ComentController@delete')->name('coment.delete')->middleware('auth')->middleware('deleteComent');

//like
Route::get('/like/{image_id}','LikeController@like')->name('like')->middleware('auth');

Route::get('/dislike/{image_id}','LikeController@dislike')->name('dislike')->middleware('auth');
Route::get('likes','LikeController@allLikes')->name('likes')->middleware('auth');

//profile
Route::get('user/profile/{id}','UserController@profile')->name('profile')->middleware('auth');