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
Route::get('/qrna', function () {
    return view('Backoffice.qrs.index');
});


Route::get('/', function () {
    return redirect('/home');
});

Auth::routes();

// Navigation routes
Route::get('/home', 'HomeController@index');
Route::get('/web', 'HomeController@web')->name('showMain');
Route::get('/liste', 'HomeController@liste');
Route::get('/folders', 'HomeController@folders');
Route::get('/text', 'HomeController@text');
Route::get('/vcard', 'HomeController@vcard');
Route::get('/location', 'HomeController@location');
Route::get('/email', 'HomeController@email');
Route::get('/wifi', 'HomeController@wifi');
Route::get('/about', 'HomeController@about');
Route::get('/file', 'HomeController@file');
Route::post('/upfile','HomeController@upfile');
Route::post('/showfile','HomeController@showfile');
Route::post('/addfolder','HomeController@handleAddFolder');
Route::get('/folder/{id}', 'HomeController@showfolder');
Route::post('/affecter', 'HomeController@affecter');

// Route::get('/thoradmin', 'HomeController@showfolder');
  Route::get('/pricing',  function(){
      return view('pricing');
  })->name('pricing');;


 Route::get('/thoradmin/users', 'ProfileController@showListeUsers')->name('showListeUsers');


 Route::get('/thoradmin/user/change/{id}', 'ProfileController@showChangePassword')->name('changePassUser');
 Route::post('/thoradmin/user/change', 'ProfileController@handleChangePassword')->name('handleChangeUser');

 Route::get('/thoradmin/user/add', 'ProfileController@showAddUser')->name('showAddUser');
 Route::post('/thoradmin/user/add', 'ProfileController@handleAddUser')->name('handleAddUser');


//  Route::get('/thoradmin/users', 'ProfileController@showListeUsers');

//  'HomeController@showfolder');
Route::get('/thoradmin/chart', 'QrController@chart')->name('showChart');



Route::get('/thoradmin/qrs', 'ProfileController@showListeQRs')->name('showListeQrs');

// // Profile routes
Route::get('/profile', 'ProfileController@show');
Route::patch('/profile', 'ProfileController@update');
Route::patch('/profile/password', 'ProfileController@password');

// // Generation routes
Route::post('/dynamic', 'QrController@generate');
Route::get('/{QrCodeLink}', 'QrController@redirect');
Route::post('/download', 'QrController@download');
Route::post('/{QrCodeLink}/update', 'QrController@update');
Route::delete('/{QrCodeLink}', 'QrController@drop');

//upload routes
// Route::get('/dropbox', 'dropboxController@Dropbox' );
// Route::post('/updropbox', 'dropboxController@Updropbox' );
    
Route::get('login/google', 'Auth\LoginController@redirectToProvider') ->name('googleauth');
Route::get('login/google/callback', 'Auth\LoginController@handleProviderCallback');


Route::get('login/facebook', 'Auth\LoginController@facebookredirectToProvider') ->name('facebookauth');
Route::get('login/facebook/callback', 'Auth\LoginController@facebookhandleProviderCallback');

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});



Route::get('/thoradmin/qr/add', 'QrController@showAddQr')->name('showAddQr');
Route::post('/thoradmin/qr/add', 'QrController@handleAddQr')->name('handleAddQr');
