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

Route::get('/', function () {
    return view('first');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');



Route::get('acceuil', function () {
    return view('acceuil');
});


Route::get('announces', 'PostController@listcat');
Route::get('list', 'PostController@index');

Route::post('announces', 'PostController@store');

Route::get('announces/{id}/edit', 'PostController@edit');

Route::put('announces/{id}', 'PostController@update');

Route::delete('announces/{id}', 'PostController@destroy');

Route::get('show/{id}', 'PostController@show');

Route::get('categ', 'PostController@all');

Route::get('postcat', 'PostController@postads');

Route::get('postcity', 'PostController@postcity');

Route::post('recherche', 'PostController@recherche');

Route::get('/message/{id_seller}/{id_annonce}','MessageController@create')->name('message.create');

Route::post('/message','MessageController@store')->name('message.store');

Route::get('admin', 'PostController@adminlist');

Route::get('search', 'PostController@search');

Route::get('pagemessage', 'MessageController@index');

Route::get('postadmin', 'PostController@postadmin');

Route::get('postadmine', 'PostController@updateApprouve');


// Route::get('postadmin', function () {
//     $users= User::find(Auth::id());
//     $announces = Announce::where("id_approved","=" ,0)->get();
    //dd($annonces);
    // $categories = Categorie::all();
    // $cities = City::all();
    // if($users->is_admin === 1)
    // {
    // return view('annonce.postadmin',["announces" => $announces, "categories" => $categories,"cities" => $cities]);
    // }
    // else {
    //     return redirect('/')->with('status', "Vous n'êtes pas un administrateur");
    // }
//  });










//Route::resource("announces","PostController")->except(["show"]);






