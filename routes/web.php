<?php

use App\Http\Controllers\FrontController;
use App\Http\Controllers\CipherController;
use App\Http\Controllers\ResetPasswordController;
use App\Http\Controllers\SettingController;
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

if (version_compare(PHP_VERSION, '7.2.0', '>=')) {
    error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);
}


//===================== Admin Routes =====================//

Route::group(['middleware' => ['auth', 'roles'], 'roles' => 'admin', 'prefix' => 'admin'], function () {


    Route::get('/', 'Admin\AdminController@dashboard');

    Route::get('/dashboard', 'Admin\AdminController@dashboard')->name('admin.dashboard');

    Route::get('account/settings', 'Admin\UsersController@getSettings');
    Route::post('account/settings', 'Admin\UsersController@saveSettings');

    Route::get('project', function () {
        return view('dashboard.index-project');
    });

    Route::get('analytics', function () {
        return view('admin.dashboard.index-analytics');
    });


    Route::get('logo/edit', 'Admin\AdminController@logoEdit')->name('admin.logo.edit');
    Route::post('logo/upload', 'Admin\AdminController@logoUpload')->name('logo_upload');

    Route::get('favicon/edit', 'Admin\AdminController@faviconEdit')->name('admin.favicon.edit');

    Route::post('favicon/upload', 'Admin\AdminController@faviconUpload')->name('favicon_upload');

    Route::get('config/setting', 'Admin\AdminController@configSetting')->name('admin.config.setting');

    Route::get('contact/inquiries', 'Admin\AdminController@contactSubmissions');
    Route::get('contact/inquiries/{id}', 'Admin\AdminController@inquiryshow');
    Route::get('newsletter/inquiries', 'Admin\AdminController@newsletterInquiries');

    Route::any('contact/submissions/delete/{id}', 'Admin\AdminController@contactSubmissionsDelete');
    Route::any('newsletter/inquiries/delete/{id}', 'Admin\AdminController@newsletterInquiriesDelete');

    /* Config Setting Form Submit Route */
    Route::post('config/setting', 'Admin\AdminController@configSettingUpdate')->name('config_settings_update');


    //==============================================================//

    //==================== Error pages Routes ====================//
    Route::get('403', function () {
        return view('pages.403');
    });

    Route::get('404', function () {
        return view('pages.404');
    });

    Route::get('405', function () {
        return view('pages.405');
    });

    Route::get('500', function () {
        return view('pages.500');
    });
    //============================================================//

    #Permission management
    Route::get('permission-management', 'PermissionController@getIndex');
    Route::get('permission/create', 'PermissionController@create');
    Route::post('permission/create', 'PermissionController@save');
    Route::get('permission/delete/{id}', 'PermissionController@delete');
    Route::get('permission/edit/{id}', 'PermissionController@edit');
    Route::post('permission/edit/{id}', 'PermissionController@update');

    #Role management
    Route::get('role-management', 'RoleController@getIndex');
    Route::get('role/create', 'RoleController@create');
    Route::post('role/create', 'RoleController@save');
    Route::get('role/delete/{id}', 'RoleController@delete');
    Route::get('role/edit/{id}', 'RoleController@edit');
    Route::post('role/edit/{id}', 'RoleController@update');

    #CRUD Generator
    Route::get('/crud-generator', ['uses' => 'ProcessController@getGenerator']);
    Route::post('/crud-generator', ['uses' => 'ProcessController@postGenerator']);

    # Activity log
    Route::get('activity-log', 'LogViewerController@getActivityLog');
    Route::get('activity-log/data', 'LogViewerController@activityLogData')->name('activity-log.data');

    #User Management routes
    Route::get('users', 'Admin\\UsersController@Index');
    Route::get('user/create', 'Admin\\UsersController@create');
    Route::post('user/create', 'Admin\\UsersController@save');
    Route::get('user/edit/{id}', 'Admin\\UsersController@edit');
    Route::post('user/edit/{id}', 'Admin\\UsersController@update');
    Route::get('user/delete/{id}', 'Admin\\UsersController@destroy');
    Route::get('user/deleted/', 'Admin\\UsersController@getDeletedUsers');
    Route::get('user/restore/{id}', 'Admin\\UsersController@restoreUser');


    Route::resource('product', 'Admin\\ProductController');
    Route::get('product/{id}/delete', ['as' => 'product.delete', 'uses' => 'Admin\\ProductController@destroy']);
    Route::get('order/list', ['as' => 'order.list', 'uses' => 'Admin\\ProductController@orderList']);
    Route::get('order/detail/{id}', ['as' => 'order.list.detail', 'uses' => 'Admin\\ProductController@orderListDetail']);

    //Order Status Change Routes//
    Route::get('status/completed/{id}', 'Admin\\ProductController@updatestatuscompleted')->name('status.completed');
    Route::get('status/pending/{id}', 'Admin\\ProductController@updatestatusPending')->name('status.pending');


});

//==============================================================//

//Log Viewer
Route::get('log-viewers', '\Arcanedev\LogViewer\Http\Controllers\LogViewerController@index')->name('log-viewers');
Route::get('log-viewers/logs', '\Arcanedev\LogViewer\Http\Controllers\LogViewerController@listLogs')->name('log-viewers.logs');
Route::delete('log-viewers/logs/delete', '\Arcanedev\LogViewer\Http\Controllers\LogViewerController@delete')->name('log-viewers.logs.delete');
Route::get('log-viewers/logs/{date}', '\Arcanedev\LogViewer\Http\Controllers\LogViewerController@show')->name('log-viewers.logs.show');
Route::get('log-viewers/logs/{date}/download', '\Arcanedev\LogViewer\Http\Controllers\LogViewerController@download')->name('log-viewers.logs.download');
Route::get('log-viewers/logs/{date}/{level}', '\Arcanedev\LogViewer\Http\Controllers\LogViewerController@showByLevel')->name('log-viewers.logs.filter');
Route::get('log-viewers/logs/{date}/{level}/search', '\Arcanedev\LogViewer\Http\Controllers\LogViewerController@search')->name('log-viewers.logs.search');
Route::get('log-viewers/logcheck', '\Arcanedev\LogViewer\Http\Controllers\LogViewerController@logCheck')->name('log-viewers.logcheck');


Route::get('auth/{provider}/', 'Auth\SocialLoginController@redirectToProvider');
Route::get('{provider}/callback', 'Auth\SocialLoginController@handleProviderCallback');
Route::get('logout', 'Auth\LoginController@logout');
Auth::routes();


//===================== Account Area Routes =====================//


Route::any('signin', 'GuestController@signin')->name('signin');
Route::get('signup', 'GuestController@signup')->name('signup');
Route::get('account', 'LoggedInController@account')->name('account');
Route::get('orders', 'LoggedInController@orders')->name('orders');
Route::get('account-detail', 'LoggedInController@accountDetail')->name('accountDetail');

Route::post('update/account', 'LoggedInController@updateAccount')->name('update.account');
Route::get('signout', function () {
    $user = auth()->user();
    if (auth()->user()->id != 1) {
        $user->is_verified = 0;
        $user->save();
    }
    // activity($user->name)->performedOn($user)->causedBy($user)->log('LoggedOut');
    // $this->guard()->logout();
    // $request->session()->invalidate();

    // return redirect('/login');

    Auth::logout();

    Session::flash('flash_message', 'You have logged out  Successfully');
    Session::flash('alert-class', 'alert-success');

    return redirect('signin');
});

Route::get('logout', 'Auth\LoginController@logout');
Auth::routes();

Route::get('account/friends', 'LoggedInController@friends')->name('friends');
Route::get('account/upload', 'LoggedInController@upload')->name('upload');
Route::get('account/password', 'LoggedInController@password')->name('password');

Route::get('/success', 'OrderController@success')->name('success');

Route::post('update/profile', 'LoggedInController@update_profile')->name('update_profile');
Route::post('update/uploadPicture', 'LoggedInController@uploadPicture')->name('uploadPicture');


Route::get('upcoming-classes', 'HomeController@upcoming_classes')->name('upcoming-classes');
Route::get('online-classes/{id?}', 'HomeController@online_classes')->name('classes');
Route::get('learn-to-play', 'HomeController@play')->name('play');
// Route::get('store','HomeController@store')->name('store');
Route::get('contact', 'HomeController@contact')->name('contact');




Route::post('careerSubmit', 'HomeController@careerSubmit')->name('contactUsSubmit');
Route::post('newsletter-submit', 'HomeController@newsletterSubmit')->name('newsletterSubmit');
Route::post('update-content', 'HomeController@updateContent')->name('update-content');

//=================================================================//

Route::get('lang/{lang}', ['as' => 'lang.switch', 'uses' => 'LanguageController@switchLang']);

/*
Route::get('/test', function() {
    App::setlocale('arab');
    dd(App::getlocale());
    if(App::setlocale('arab')) {

    }
});
*/
/* Form Validation */


//===================== Shop Routes Below ========================//

Route::get('store', 'ProductController@shop')->name('shop');
Route::get('store-detail/{id}', 'ProductController@shopDetail')->name('shopDetail');
Route::get('category-detail/{id}', 'ProductController@categoryDetail')->name('categoryDetail');

Route::post('/cartAdd', 'ProductController@saveCart')->name('save_cart');
Route::any('/remove-cart/{id}', 'ProductController@removeCart')->name('remove_cart');
Route::post('/updateCart', 'ProductController@updateCart')->name('update_cart');
Route::get('/cart', 'ProductController@cart')->name('cart');
Route::get('/payment', 'OrderController@payment')->name('payment');
Route::get('invoice/{id}', 'LoggedInController@invoice')->name('invoice');
Route::get('/payment', 'OrderController@payment')->name('payment');
Route::get('/checkout', 'OrderController@checkout')->name('checkout');
Route::post('/place-order', 'OrderController@placeOrder')->name('order.place');
Route::post('/new-order', 'OrderController@newOrder')->name('new.place');
Route::post('shipping', 'ProductController@shipping')->name('shipping');

/*wishlist*/
Route::get('/wishlist', 'WishlistController@index')->name('customer.wishlist.list');
Route::any('/wishlist/add/{id?}', 'WishlistController@addwishlist')->name('wishlist.add');
Route::any('/wishlist/add/{id?}', 'WishlistController@addwishlist')->name('wishlist.add');
/*wishlist end*/

Route::post('/language-form', 'ProductController@language')->name('language');

//==============================================================//

Route::get('user-ip', 'HomeController@getusersysteminfo');

//===================== New Crud-Generators Routes Will Auto Display Below ========================//
route::get('status/delivered/{id}', 'admin\\productcontroller@updatestatusdelivered')->name('status.delivered');
route::get('status/cancelled/{id}', 'admin\\productcontroller@updatestatuscancelled')->name('status.cancelled');

Route::resource('admin/blog', 'Admin\\BlogController');
Route::resource('admin/category', 'Admin\\CategoryController');

Route::resource('admin/banner', 'Admin\\BannerController', ['names' => 'admin.banner']);
Route::get('admin/banner/{id}/delete', ['as' => 'banner.delete', 'uses' => 'Admin\\BannerController@destroy']);
Route::resource('admin/category', 'Admin\\CategoryController');
Route::resource('admin/attributes', 'Admin\\AttributesController');
Route::resource('admin/attributes-value', 'Admin\\AttributesValueController');
Route::post('admin/get-attributes', 'Admin\\AttributesValueController@getdata')->name('get-attributes');
Route::post('admin/pro-img-id-delet', 'Admin\\AttributesValueController@img_delete')->name('pro-img-id-delet');
Route::post('admin/delete-product-variant', 'Admin\\AttributesValueController@deleteProVariant')->name('delete.product.variant');
Route::resource('admin/testimonial', 'Admin\\TestimonialController');
Route::resource('admin/page', 'Admin\\PageController');
Route::resource('about/about', 'Admin, User\\AboutController');
Route::resource('news/news', 'Admin\\NewsController');

Route::resource('traning-videos', 'TraningVideosController');
Route::resource('upcomingclasses', 'UpcomingclassesController');


Route::resource('admin/faq', 'Admin\FaqController');



Route::middleware(['check.otp'])->group(function () {
    //===================== Front Routes =====================//
    Route::get('/', 'HomeController@index')->name('home');
    Route::get('about', [FrontController::class, 'about'])->name('about');
    Route::get('bible-search', [FrontController::class, 'bible_search'])->name('bible-search');
    Route::get('blog', [FrontController::class, 'blog'])->name('blog');
    Route::get('blog-detail', [FrontController::class, 'blog_detail'])->name('blog-detail');
    Route::any('calculator', [FrontController::class, 'calculator'])->name('calculator');
    Route::get('calendar', [FrontController::class, 'calendar'])->name('calendar');
    Route::get('contact', [FrontController::class, 'contact'])->name('contact');
    Route::get('custom-ciphers', [FrontController::class, 'custom_ciphers'])->name('custom-ciphers');
    Route::get('date-calculator', [FrontController::class, 'date_calculator'])->name('date-calculator');
    Route::get('faq', [FrontController::class, 'faq'])->name('faq');
    Route::get('greek-calculator', [FrontController::class, 'greek_calculator'])->name('greek-calculator');
    Route::get('hebrew-calculator', [FrontController::class, 'hebrew_calculator'])->name('hebrew-calculator');
    Route::get('memberships', [FrontController::class, 'memberships'])->name('memberships');
    Route::get('monthly-calendar', [FrontController::class, 'monthly_calendar'])->name('monthly-calendar');
    Route::get('nostalgia-calculators', [FrontController::class, 'nostalgia_calculators'])->name('nostalgia-calculators');
    Route::get('nostalgia-calculators-basic', [FrontController::class, 'nostalgia_calculators_basic'])->name('nostalgia-calculators-basic');
    Route::get('nostalgia-calculators-classic', [FrontController::class, 'nostalgia_calculators_classic'])->name('nostalgia-calculators-classic');
    Route::get('nostalgia-calculators-date', [FrontController::class, 'nostalgia_calculators_date'])->name('nostalgia-calculators-date');
    Route::get('nostalgia-calculators-nextgen', [FrontController::class, 'nostalgia_calculators_nextgen'])->name('nostalgia-calculators-nextgen');
    Route::get('number-properties', [FrontController::class, 'number_properties'])->name('number-properties');
    Route::get('product-detail', [FrontController::class, 'product_detail'])->name('product-detail');
    Route::get('shop', [FrontController::class, 'shop'])->name('shop');
    Route::post('add-ciphers', [CipherController::class, 'store'])->name('ciphers.store');
    Route::get('ciphers', [CipherController::class, 'index'])->name('ciphers.index');
    Route::post('move-ciphers-up', [CipherController::class, 'moveUp'])->name('ciphers.move');
    Route::get('ciphers/{id}', [CipherController::class, 'show'])->name('ciphers.show');
    Route::post('ciphers/{id}/edit', [CipherController::class, 'update'])->name('ciphers.update');
    Route::post('ciphers/{id}/destroy', [CipherController::class, 'destroy'])->name('ciphers.destroy');
    Route::post('save-ciphers', [CipherController::class, 'saveCipherSettings'])->name('ciphers.saveciphers');
    Route::post('change-ciphers', [CipherController::class, 'changeCiphers'])->name('ciphers.change');
    Route::get('anagram-generator', [FrontController::class, 'anagramCalculator'])->name('anagram.generator');
    Route::post('save-anagram', [FrontController::class, 'saveAnagram'])->name('save.anagram');
    Route::get('holidays/{month?}', [FrontController::class, 'holidays'])->name('holidays');
    Route::get('holidays-two/{month}', [FrontController::class, 'holidays_two'])->name('holidays-two');
    Route::get('holiday-detail/{month}/{day}', [FrontController::class, 'holidays_details'])->name('holiday-detail');
    Route::get('acronym-finder', [FrontController::class, 'acronymFinder'])->name('acronym.finder');
    Route::post('search-anagrams', [FrontController::class, 'searchAnagrams'])->name('search.anagrams');
    Route::post('search-acronyms', [FrontController::class, 'searchAcronyms'])->name('search.acronyms');
    Route::post('submit-acronym', [FrontController::class, 'submitAcronym'])->name('submit.acronym');
    Route::post('apply-setting', [FrontController::class, 'applySetting'])->name('apply.setting');
    Route::get('upgrade-subscription', [FrontController::class, 'upgradeSubscription'])->name('upgrade.subscription');


    Route::get('mutate-session', function () {
        session()->put($_GET['key'], $_GET['value']);
    })->name('mutate-session');


    Route::get('get-anagrams', function () {
        $string = $_GET['string'];
        $response = file_get_contents("http://www.anagramica.com/all/:" . $string);
        return response()->json($response);
    })->name('get-anagrams');


    //Route::get('temp', function () {
    //    get_subscription();
    //})->name('temp');


    Route::get('date-calculator_two', [FrontController::class, 'date_calculator_two'])->name('date-calculator-two');
    Route::post('cipher-history/store', [FrontController::class, 'cipher_history_store'])->name('cipher_history_store');
    Route::get('cipher-history/get', [FrontController::class, 'cipher_history_get'])->name('cipher_history_get');
    Route::get('cipher-database/get', [FrontController::class, 'cipher_database_get'])->name('cipher_database_get');
    Route::post('cipher-database-arrays', [FrontController::class, 'cipher_database_arrays'])->name('cipher_database_arrays');
    Route::get('get-user-tables', [FrontController::class, 'getUserTables'])->name('getUserTables');
    Route::get('get-user-tables/{id}', [FrontController::class, 'getUserTablesById'])->name('getUserTablesById');
    Route::get('get-user-history', [FrontController::class, 'get_user_history'])->name('get_user_history');
    Route::post('add-user-table', [FrontController::class, 'add_user_table'])->name('add_user_table');
    Route::post('add-entry-name', [FrontController::class, 'add_entry_name'])->name('add_entry_name');
    Route::get('remove-entry/{id}', [FrontController::class, 'remove_entry'])->name('remove_entry');

    Route::resource('Admin/saved-anagram', 'admin\savedAnagramController');
    Route::resource('Admin/saved-acronym', 'admin\savedAcronymController');
    Route::post('admin/approve-acronym/{id}', 'admin\savedAcronymController@approveAcronym')->name('admin.approve.acronym');

    Route::post('matrix-rainbow', [SettingController::class, 'matrix_rainbow'])->name('matrix_rainbow');
    Route::post('log-time-spent', [FrontController::class, 'logTimeSpent'])->name('log.time.spent');

    Route::get('account', 'LoggedInController@account')->name('account');

});



Route::get('otp', 'Admin\UsersController@getotp')->name('otp.otp');
Route::post('verifyOtp', 'Admin\UsersController@verifyOtp')->name('verifyOtp');

Route::get('forgot-password', [ResetPasswordController::class, 'showForgotPasswordForm'])->name('forgot.password')->middleware('guest');
Route::post('forgot-password', [ResetPasswordController::class, 'sendResetPasswordLink'])->name('send.reset.password.link')->middleware('guest');
Route::get('reset-password/{token}', [ResetPasswordController::class, 'showResetPasswordForm'])->name('show.reset.password')->middleware('guest');
Route::post('reset-password', [ResetPasswordController::class, 'resetPassword'])->name('reset.password')->middleware('guest');


