<?php
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\FrontEnd\cart\CartController;
use App\Http\Controllers\FrontEnd\OrderController;
use App\Http\Controllers\FrontEnd\profile\ProfileController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;

Route::get('/clear', function () {
    $exitCode = Artisan::call('cache:clear');
    return 'Cache cleared';
})->name('clear');
;


Route::group(
    ['prefix' => LaravelLocalization::setLocale(), 'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']],
    function () {

        Route::get('/account-blocked', [HomeController::class, 'account_blocked'])->name('account_blocked');
        Route::get('/logout', [HomeController::class, 'logout'])->name('logout');
        Auth::routes();
        Route::get('/login', [LoginController::class, 'loginPage'])->name('login');
        Route::get('/admin', [LoginController::class, 'showAdminLoginForm'])->name('admin.login-view');
        Route::post('/admin', [LoginController::class, 'adminLogin'])->name('admin.login');
        Route::get('/admin/register', [RegisterController::class, 'showAdminRegisterForm'])->name('admin.register-view');
        Route::post('/admin/register', [RegisterController::class, 'createAdmin'])->name('admin.register');


        // Auth::routes([
        //     'login' => false,
        //     'register' => false, // Disable registration routes
        //     'reset' => false, // Disable password reset routes
        //     'verify' => false, // Disable email verification routes
        // ]);
        Route::get('/register/partners', [RegisterController::class, 'partner'])->name('user.partner');





        Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('index')->middleware('auth:admin');





        Route::get('/', [HomeController::class, 'index'])->name('home');
        //    Route::get('/home', [HomeController::class, 'index'])->name('home');
        Route::get('/about', [HomeController::class, 'about'])->name('about');
        Route::get('/how-we-works', [HomeController::class, 'howWeWork'])->name('how-we-works');

        Route::get('/contact-us', [HomeController::class, 'contactUs'])->name('contactUs');
        Route::get('/prodcut/category/{id}/{slug?}', [HomeController::class, 'categoryProducts'])->name('categoryProducts');
        Route::get('/prodcut/{id}/{slug?}', [HomeController::class, 'productDetails'])->name('productDetails');


        //############# Cart Start ##############
           //    Route::get('/cart/add/{product}', [CartController::class, 'addToCart'])->name('addToCart');

        Route::get('/cart', [CartController::class, 'showCart'])->name('cart.show');
         Route::post('addToCart', [CartController::class, 'addToCart'])->name('addToCart');
         Route::post('updateCart', [CartController::class, 'updateCart'])->name('updateCart');
         Route::get('distroyCart/{id}', [CartController::class, 'distroyCart'])->name('cart.distroy');

        Route::patch('/cart/update/{id}', 'CartController@updateItem')->name('cart.update');
     //   Route::get('/cart', 'CartController@show')->name('cart.show');



        //############# Cart End ##############



        //############# Auth Start ##############
        Route::group(['prefix' => '/user/', 'as' => 'user.', 'middleware' => ['auth', 'active']], function () {


            Route::get('profile', [ProfileController::class, 'profile'])->name('profile');

             Route::get('portfolio', [ProfileController::class, 'portfolio'])->name('portfolio');
            Route::get('portfolio/create', [ProfileController::class, 'portfolio_create'])->name('portfolio.create');
            Route::get('portfolio/store', [ProfileController::class, 'portfolio_store'])->name('portfolio.store');
            Route::get('portfolio/delete/{id?}', [ProfileController::class, 'portfolio_delete'])->name('portfolio.delete');
            Route::get('rates', [ProfileController::class, 'rates'])->name('rates');
            Route::get('verification', [ProfileController::class, 'verification'])->name('verification');
            Route::get('faq', [ProfileController::class, 'faq'])->name('faq');
            Route::get('payments', [ProfileController::class, 'payments'])->name('payments');

            Route::get('contact', [ProfileController::class, 'contact'])->name('contact');


            #Orders

            Route::get('makeOffer/{name}/{id}', [OrderController::class, 'makeOffer'])->name('makeOffer');
            Route::get('my-orders', [OrderController::class, 'myorders'])->name('myorders');
            Route::get('my-orders/detials/{id?}', [OrderController::class, 'orderDetials'])->name('orderDetials');
            Route::get('timeLine/{order_id}', [OrderController::class, 'timeLine'])->name('timeLine');
            Route::post('order/store', [OrderController::class, 'store'])->name('createOrder');
            Route::get('done', [OrderController::class, 'done'])->name('done');

            //user.done





            Route::get('/', function () {
                return view('welcome');
            });
        }); //end of FrontEnd/profile routes
        //############# Auth END ##############
    }

);
