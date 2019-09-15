    <?php


    Auth::routes();

    Route::get('/home', 'HomeController@index')->name('home');
    Route::post('/user/login','Auth\LoginController@UserLogin')->name('user.login');

    //    Auth::routes(['register' => false]);
    Route::get('/','App\RegistrationController@LandingPage')->name('user.landingPage');
//    Route::get('/user/register','App\RegistrationController@UserRegisterForm')->name('user.registerForm');
//    Route::post('/user/register','App\RegistrationController@UserRegisterData')->name('user.registerData');
//    Route::get('/user/login','App\LogInController@UserLoginForm')->name('user.loginForm');
//    Route::post('/user/login','App\LogInController@UserLoginData')->name('user.loginData');
 Route::middleware('auth')->group(function (){

     Route::post('/user/profile','App\RegistrationController@UserProfilePicture')->name('user.profilePicture');
     Route::get('/user/update','App\RegistrationController@UserUpdateForm')->name('user.updateForm');
     Route::post('/user/update','App\RegistrationController@UserUpdateData')->name('user.updateData');
     Route::resource('chef','Chef\ChefController');
     Route::resource('user','User\UserController');
     Route::resource('post','Chef\PostController');
     Route::resource('post/{p}/order','User\PlaceOrderController');
     Route::get('placeOrder/{id}','User\UserController@PlaceOrderForm')->name('user.placeOrderForm');
     Route::get('orderList/{id}','User\PlaceOrderController@index')->name('order.orderList');
     Route::get('orderStatus/{id}/{flag}/{order}','User\PlaceOrderController@update')->name('order.status');
     Route::get('specialItem','Chef\ChefController@SpecialItemForm')->name('chef.specialItemForm');
     Route::post('specialItem','Chef\ChefController@SpecialItemData')->name('chef.specialItemData');
     Route::get('displaySpecialItem/{id}','Chef\ChefController@DisplaySpecialItem')->name('chef.displaySpecialItem');
     Route::post('comment','User\UserController@StoreComment')->name('user.storeComment');
     Route::get('userProfile/{id}','User\UserController@UserProfile')->name('user.userProfile');
     Route::get('users/notifications',[\App\Http\Controllers\User\UserController::class,'notifications'])->name('user.notification');


});

 Route::middleware(['auth','Chef'])->group(function () {
     Route::get('post','Chef\PostController@create')->name('post.create');

 });

 Route::middleware(['auth','User'])->group(function () {
    //    Route::get('post','Chef\PostController@create')->name('post.create');

 });



