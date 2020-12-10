<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\FirstNavBarController;
use App\Http\Controllers\MainMenuController;
use App\Http\Controllers\LogoPanelController;
use App\Http\Controllers\SlidingImagesController;
use App\Http\Controllers\FooterController;
use App\Http\Controllers\HeaderBannerController;
use App\Http\Controllers\LeftSideBannerController;
use App\Http\Controllers\RightSideBannerController;
use App\Http\Controllers\ApiHomeController;
use App\Http\Controllers\ApiLeftController;
use App\Http\Controllers\ApiRightController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\BlogPostController;
use App\Http\Controllers\BrokerTopInformationController;
use App\Http\Controllers\BrokerBottomInformationController;
use App\Http\Controllers\BorkerController;
use App\Http\Controllers\BorkerNewsController;
use App\Http\Controllers\BorkerReviewController;
use App\Http\Controllers\AdminMemberController;
use App\Http\Controllers\ClientMemberController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/',[HomeController::class,'Index']);
Route::post('/clientRegistration',[HomeController::class,'RegistrationProcess']);
Route::post('/clientLogin',[HomeController::class,'LoginProcess']);
Route::get('/clientLogout',[HomeController::class,'LogoutProcess']);
Route::get('/blog-post.html',[BlogController::class,'Index']);
Route::get('/Blog/{id}',[BlogController::class,'DetailBlog']);
Route::get('/privacy-policy.html',[HomeController::class,'privacyPolicy']);
Route::get('/term-of-services.html',[HomeController::class,'termServices']);

Route::get('/admin',[AdminController::class,'Login']);
    Route::post('/admin',[AdminController::class,'Index']);
Route::group(['prefix' => 'admin',"middleware" => "IsLogin"],function(){
    Route::get('/dashboard',[AdminController::class,'Dashboard']);
    Route::get('/logout',[AdminController::class,'Logout']);  
    
    Route::group(['prefix' => 'firstNav'],function(){
        Route::get('/',[FirstNavBarController::class,'Index']);
        Route::post('/',[FirstNavBarController::class,'create']);
        Route::get('/delete/{id}',[FirstNavBarController::class,'delete']);
        Route::post('/edit/{id}',[FirstNavBarController::class,'edit']);      
    });
    Route::group(['prefix' => 'navMenu'],function(){
        Route::get('/',[MainMenuController::class,'Index']);
        Route::post('/',[MainMenuController::class,'create']);
        Route::get('/delete/{id}',[MainMenuController::class,'delete']);
        Route::post('/edit/{id}',[MainMenuController::class,'edit']);
    });
    Route::group(['prefix' => 'logo-panel'],function(){
        Route::get('/',[LogoPanelController::class,'Index']);
        Route::post('/',[LogoPanelController::class,'Add']);
        Route::get('/delete/{id}',[LogoPanelController::class,'delete']);
        Route::post('/edit/{id}',[LogoPanelController::class,'edit']);
    });
    Route::group(['prefix' => 'logo-favicon'],function(){
        Route::post('/',[LogoPanelController::class,'AddFavicon']);
        Route::get('/delete/{id}',[LogoPanelController::class,'deleteFavicon']);
    });
    Route::group(['prefix' => 'sliding-images'],function(){
        Route::get('/',[SlidingImagesController::class,'Index']);
        Route::post('/',[SlidingImagesController::class,'Add']);
    });
    Route::get('/edit-slider-image/{id}',[SlidingImagesController::class,'Edit']);
    Route::post('/edit-slider-image/{id}',[SlidingImagesController::class,'ProcessEdit']);
    Route::group(['prefix' => 'edit-footer'],function(){
        Route::get('/',[FooterController::class,'Index']);
        Route::post('/webinar',[FooterController::class,'Webinar']);
        Route::post('/contact',[FooterController::class,'Contact']);
        Route::post('/description',[FooterController::class,'Description']);
        Route::post('/copyRight',[FooterController::class,'CopyRight']);
    });
    Route::group(['prefix' => 'banner'],function(){
        Route::group(['prefix' => 'header-banner'],function(){
            Route::get('/',[HeaderBannerController::class,'Index']);
            Route::post('/',[HeaderBannerController::class,'Add']);
            Route::get('/delete/{id}',[HeaderBannerController::class,'deleteLeft']);
            Route::post('/right',[HeaderBannerController::class,'AddRight']);
            Route::get('/deleteright/{id}',[HeaderBannerController::class,'deleteRight']);
        });
        Route::group(['prefix' => 'left-side-banner'],function(){
            Route::get('/',[LeftSideBannerController::class,'Index']);
            Route::post('/',[LeftSideBannerController::class,'Add']);
            Route::get('/delete/{id}',[LeftSideBannerController::class,'delete']);
        });
        Route::group(['prefix' => 'right-side-banner'],function(){
            Route::get('/',[RightSideBannerController::class,'Index']);
            Route::post('/',[RightSideBannerController::class,'Add']);
            Route::get('/delete/{id}',[RightSideBannerController::class,'delete']);
        });
    });
    Route::group(['prefix' => 'api'],function(){
        Route::group(['prefix' => 'api-home'],function(){
            Route::get('/',[ApiHomeController::class,'Index']);
            Route::post('/',[ApiHomeController::class,'Add']);
            Route::get('/delete/{id}',[ApiHomeController::class,'delete']);
        });
        Route::group(['prefix' => 'api-left'],function(){
            Route::get('/',[ApiLeftController::class,'Index']);
            Route::post('/',[ApiLeftController::class,'Add']);
            Route::get('/delete/{id}',[ApiLeftController::class,'delete']);
        });
        Route::group(['prefix' => 'api-right'],function(){
            Route::get('/',[ApiRightController::class,'Index']);
            Route::post('/',[ApiRightController::class,'Add']);
            Route::get('/delete/{id}',[ApiRightController::class,'delete']);
        });
    });
    Route::group(['prefix' => 'category'],function(){
        Route::get('/',[CategoryController::class,'Index']);
        Route::post('/',[CategoryController::class,'Add']);
        Route::get('/delete/{id}',[CategoryController::class,'delete']);
    });
    Route::group(['prefix' => 'tag'],function(){
        Route::get('/',[TagController::class,'Index']);
        Route::post('/',[TagController::class,'Add']);
        Route::get('/delete/{id}',[TagController::class,'delete']);
    });
    Route::get('/allCategories',[CategoryController::class,'All']);
    Route::group(['prefix' => 'post'],function(){
        Route::get('/viewAll',[PostController::class,'Index']);
        Route::get('/delete/{id}',[PostController::class,'draft']);
        Route::get('/active/{id}',[PostController::class,'Active']);
        Route::get('/edit/{id}',[BlogPostController::class,'Edit']);
        Route::post('/edit/{id}',[BlogPostController::class,'EditProcess']);
        Route::get('/new/{id}',[BlogPostController::class,'New']);
        Route::post('/all',[BlogPostController::class,'Add']);
    });
    Route::group(['prefix' => 'broker'],function(){
        Route::get('/add',[BrokerTopInformationController::class,'Index']);
        Route::post('/addBroker',[BrokerTopInformationController::class,'Add']);
        Route::post('/addDeposit',[BrokerTopInformationController::class,'AddDeposit']);
        Route::post('/addCommission',[BrokerTopInformationController::class,'AddCommission']);
        Route::post('/addAccountInfo',[BrokerTopInformationController::class,'AddAccountInfo']);
        Route::post('/addTradableAssets',[BrokerTopInformationController::class,'AddTradableAssets']);
        Route::post('/addPlatform',[BrokerBottomInformationController::class,'AddPlatform']);
        Route::post('/addFeature',[BrokerBottomInformationController::class,'AddFeature']);
        Route::post('/addCustomerServices',[BrokerBottomInformationController::class,'AddCustomerServices']);
        Route::post('/addResearchEducation',[BrokerBottomInformationController::class,'AddReserchEducation']);
        Route::post('/addPromotion',[BrokerBottomInformationController::class,'AddPromotion']);
    });
    Route::get('/allbrokers',[BorkerController::class,'Index']);
    Route::get('/deleteBroker/{id}',[BorkerController::class,'delete']);
    Route::get('/editBroker/{id}',[BorkerController::class,'edit']);
    Route::group(['prefix' => 'brokersNews'],function(){
        Route::get('/',[BorkerNewsController::class,'Index']);
        Route::get('/new',[BorkerNewsController::class,'Add']);
        Route::post('/new',[BorkerNewsController::class,'AddNews']);
        Route::get('/edit/{id}',[BorkerNewsController::class,'Edit']);
        Route::post('/edit/{id}',[BorkerNewsController::class,'EditNews']);
        Route::get('/delete/{id}',[BorkerNewsController::class,'Delete']);
    });
    Route::group(['prefix' => 'brokersReview'],function(){
        Route::get('/{id}',[BorkerReviewController::class,'Index']);
        Route::get('/edit/{id}',[BorkerReviewController::class,'Edit']);
        Route::post('/edit/{id}',[BorkerReviewController::class,'EditReview']);
        Route::get('/delete/{id}',[BorkerReviewController::class,'Delete']);
    });
    Route::get('/brokerReview/new',[BorkerReviewController::class,'Add']);
    Route::post('/brokersReview/new',[BorkerReviewController::class,'AddReview']);
    Route::get('/brokersDetail/{id}',[BorkerController::class,'Detail']);
    Route::group(['prefix' => 'member'],function(){
        Route::get('/profile/{id}',[AdminMemberController::class,'Index']);
        Route::get('/add',[AdminMemberController::class,'Add']);
        Route::post('/add',[AdminMemberController::class,'AddMember']);
        Route::get('/userList',[AdminMemberController::class,'UserList']);
        Route::get('/edit/{id}',[AdminMemberController::class,'Edit']);
        Route::post('/edit/{id}',[AdminMemberController::class,'EditMember']);
        Route::get('/delete/{id}',[AdminMemberController::class,'Delete']);
        Route::post('/addBackImg/{id}',[AdminMemberController::class,'AddBackImg']);
        Route::post('/addUserImg/{id}',[AdminMemberController::class,'AddUserImg']);
        Route::get('/clientList',[ClientMemberController::class,'ClientList']);
    });
    Route::group(['prefix' => 'client'],function(){
        Route::get('/delete/{id}',[ClientMemberController::class,'Delete']);
        Route::get('/active/{id}',[ClientMemberController::class,'Active']);
    });
});
