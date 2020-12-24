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
use App\Http\Controllers\BorkerPromotionsController;
use App\Http\Controllers\BorkerNewsController;
use App\Http\Controllers\BorkerReviewController;
use App\Http\Controllers\AdminMemberController;
use App\Http\Controllers\ClientMemberController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\HtmlPagesController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\MainWebinarController;
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
Route::post('/admin/apileftorder',[ApiLeftController::class,'Order']);

Route::get('/brokerList',[HomeController::class,'BrokerView']);
Route::get('/brokerList/brokerDetail/{id}',[HomeController::class,'brokerDetail']);
Route::get('/brokerList/brokerReview/{id}',[HomeController::class,'brokerReview']);
Route::get('/brokerList/brokerReview/ReviewDetail/{id}',[HomeController::class,'brokerReviewDetail']);
Route::get('/brokerList/brokerNews/{id}',[HomeController::class,'brokerNews']);
Route::get('/brokerList/brokerNews/NewsDetail/{id}',[HomeController::class,'brokerNewsDetail']);
Route::get('/brokerList/brokerPromotion/{id}',[HomeController::class,'brokerPromotion']);
Route::get('/brokerList/brokerPromotion/PromotionDetail/{id}',[HomeController::class,'brokerPromotionDetail']);



Route::get('/advance-forex-trading-plan.html',[HtmlPagesController::class,'Page1']);
Route::get('/advertise.html',[HtmlPagesController::class,'Page2']);
Route::get('/always-trad-with-stop-loss.html',[HtmlPagesController::class,'Page3']);
Route::get('/azadi-real-account-contest.html',[HtmlPagesController::class,'Page4']);
Route::get('/become-successful-forex-trader.html',[HtmlPagesController::class,'Page5']);
Route::get('/best-currency-pair-to-trade.html',[HtmlPagesController::class,'Page6']);
Route::get('/daily-time-frame-forex-trading.html',[HtmlPagesController::class,'Page7']);
Route::get('/deposit-money-exness-pakistan.html',[HtmlPagesController::class,'Page8']);
Route::get('/draw-perfect-trend-line.html',[HtmlPagesController::class,'Page9']);
Route::get('/exness-and-raheel-nawaz-is-organizing-seminar-in-gujranwala-pakistan.html',[HtmlPagesController::class,'Page10']);
Route::get('/flags-charts-patterns-urdu-hindi.html',[HtmlPagesController::class,'Page11']);
Route::get('/forex-trading-plan-july-2015.html',[HtmlPagesController::class,'Page12']);
Route::get('/forex-trading-stop-loss.html',[HtmlPagesController::class,'Page13']);
Route::get('/forex-trading-using-moving-average-strategy.html',[HtmlPagesController::class,'Page14']);
Route::get('/forex-trading-webinar-for-vips.html',[HtmlPagesController::class,'Page15']);
Route::get('/forexustaad-weekly-lucky-draw.html',[HtmlPagesController::class,'Page16']);
Route::get('/free-forexustaad-pro-indicator.html',[HtmlPagesController::class,'Page17']);
Route::get('/free-signals-analysis-and-news-updates.html',[HtmlPagesController::class,'Page18']);
Route::get('/fundamental-analysis-forex-trading.html',[HtmlPagesController::class,'Page19']);
Route::get('/fundamental-analysis-us-presidential-election-2016.html',[HtmlPagesController::class,'Page20']);
Route::get('/fundamental-analysis-webinar.html',[HtmlPagesController::class,'Page21']);
Route::get('/great-news-for-my-forex-lovers-friend.html',[HtmlPagesController::class,'Page22']);
Route::get('/how-to-choose-a-forex-broker-in-urdu-webinar.html',[HtmlPagesController::class,'Page23']);
Route::get('/how-to-choose-a-forex-broker-webinar-ready.html',[HtmlPagesController::class,'Page24']);
Route::get('/how-to-use-metatrader-4-full-training-in-urdu-part-1.html',[HtmlPagesController::class,'Page25']);
Route::get('/how-to-use-metatrader-4-full-training-in-urdu-part-2.html',[HtmlPagesController::class,'Page26']);
Route::get('/learn-forex-trading-in-pakistan.html',[HtmlPagesController::class,'Page27']);
Route::get('/live-radio.html',[HtmlPagesController::class,'Page28']);
Route::get('/market-reviews-euro-dollar-yen.html',[HtmlPagesController::class,'Page29']);
Route::get('/opening-event-technow.html',[HtmlPagesController::class,'Page30']);
Route::get('/pinbar-candlestick-strategies.html',[HtmlPagesController::class,'Page31']);
Route::get('/technical-analysis-trading-forex.html',[HtmlPagesController::class,'Page32']);
Route::get('/scam-fraud-internet.html',[HtmlPagesController::class,'Page33']);
Route::get('/schoolboy-made-72million-forex-trading-lunch-breaks.html',[HtmlPagesController::class,'Page34']);
Route::get('/support-and-resistance-chart.html',[HtmlPagesController::class,'Page35']);
Route::get('/timing-is-most-important-element-in-forex-trading.html',[HtmlPagesController::class,'Page36']);
Route::get('/trading-story-mr-bean-its-your.html',[HtmlPagesController::class,'Page37']);
Route::get('/what-is-candlestick-strategy-in-urduhindi-part-1.html',[HtmlPagesController::class,'Page38']);
Route::get('/what-is-forex-trading.html',[HtmlPagesController::class,'Page39']);
Route::get('/what-is-forex-trading-in-urdu-webinar.html',[HtmlPagesController::class,'Page40']);



// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/subscriberConfirmation/{id}',[HomeController::class,'ConfirmationEmail']);
Route::get('/uploader/upload.php',[HomeController::class,'ImageSrc15']);
Route::post('/uploader/upload.php',[HomeController::class,'ImageSrc15']);
Route::post('/pro-img-disk.php',[HomeController::class,'ImageSrc']);
Route::post('/comment1',[CommentController::class,'Add']);
Route::get('/',[HomeController::class,'Index']);
Route::get('/construction',[HomeController::class,'Construction']);
Route::get('/webinar',[HomeController::class,'webinar']);
Route::post('/clientRegistration',[HomeController::class,'RegistrationProcess']);
Route::post('/clientLogin',[HomeController::class,'LoginProcess']);
Route::get('/clientLogout',[HomeController::class,'LogoutProcess']);
Route::get('/blog-post.html',[BlogController::class,'Index']);
Route::get('/Blog/{id}',[BlogController::class,'DetailBlog']);
Route::get('/privacy-policy.html',[HomeController::class,'privacyPolicy']);
Route::get('/term-of-services.html',[HomeController::class,'termServices']);

// Admin views

Route::get('/ustaad',[AdminController::class,'Login']);
Route::post('/ustaad',[AdminController::class,'Index']);

Route::group(['prefix' => 'ustaad',"middleware" => "IsLogin"],function(){
    Route::get('/dashboard',[AdminController::class,'Dashboard']);
    Route::get('/logout',[AdminController::class,'Logout']);  
    
    Route::group(['prefix' => 'webinar'],function(){
        Route::get('/',[MainWebinarController::class,'Index']);
        Route::get('/add',[MainWebinarController::class,'Add']);
        Route::post('/add',[MainWebinarController::class,'AddWebinar']);
        Route::get('/delete/{id}',[MainWebinarController::class,'delete']);
        Route::get('/edit/{id}',[MainWebinarController::class,'Edit']); 
        Route::post('/edit/{id}',[MainWebinarController::class,'EditWebinar']);      
    });

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
        Route::post('/edit/{id}',[LogoPanelController::class,'EditFavicon']);
    });
    Route::group(['prefix' => 'sliding-images'],function(){
        Route::get('/',[SlidingImagesController::class,'Index']);
        Route::post('/',[SlidingImagesController::class,'Add']);
    });
    Route::get('/edit-slider-image/{id}',[SlidingImagesController::class,'Edit']);
    Route::post('/edit-slider-image/{id}',[SlidingImagesController::class,'ProcessEdit']);
    Route::get('/delete-slider-image/{id}',[SlidingImagesController::class,'ProcessRemove']);
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
            Route::post('/edit-left/{id}',[HeaderBannerController::class,'EditLeft']);
            Route::post('/right',[HeaderBannerController::class,'AddRight']);
            Route::get('/deleteright/{id}',[HeaderBannerController::class,'deleteRight']);
            Route::post('/edit-right/{id}',[HeaderBannerController::class,'EditRight']);
        });
        Route::group(['prefix' => 'left-side-banner'],function(){
            Route::get('/',[LeftSideBannerController::class,'Index']);
            Route::post('/',[LeftSideBannerController::class,'Add']);
            Route::post('/edit/{id}',[LeftSideBannerController::class,'ProcessEdit']);
            Route::get('/delete/{id}',[LeftSideBannerController::class,'delete']);
        });
        Route::group(['prefix' => 'right-side-banner'],function(){
            Route::get('/',[RightSideBannerController::class,'Index']);
            Route::post('/',[RightSideBannerController::class,'Add']);
            Route::post('/edit/{id}',[RightSideBannerController::class,'ProcessEdit']);
            Route::get('/delete/{id}',[RightSideBannerController::class,'delete']);
        });
    });
    Route::group(['prefix' => 'api'],function(){
        Route::group(['prefix' => 'api-home'],function(){
            Route::get('/',[ApiHomeController::class,'Index']);
            Route::post('/',[ApiHomeController::class,'Add']);
            Route::get('/delete/{id}',[ApiHomeController::class,'delete']);
            Route::post('/edit/{id}',[ApiHomeController::class,'EditProcess']);
        });
        Route::group(['prefix' => 'api-left'],function(){
            Route::get('/',[ApiLeftController::class,'Index']);
            Route::post('/',[ApiLeftController::class,'Add']);
            Route::get('/delete/{id}',[ApiLeftController::class,'delete']);
            Route::post('/edit/{id}',[ApiLeftController::class,'EditProcess']);
        });
        Route::group(['prefix' => 'api-right'],function(){
            Route::get('/',[ApiRightController::class,'Index']);
            Route::post('/',[ApiRightController::class,'Add']);
            Route::get('/delete/{id}',[ApiRightController::class,'delete']);
            Route::post('/edit/{id}',[ApiRightController::class,'EditProcess']);
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
    Route::post('/editBroker/{id}',[BorkerController::class,'editBrokerCompanyInformation']);
    Route::group(['prefix' => 'brokersNews'],function(){
        Route::get('/',[BorkerNewsController::class,'Index']);
        Route::get('/all/{id}',[BorkerNewsController::class,'All']);
        Route::get('/new',[BorkerNewsController::class,'Add']);
        Route::post('/new',[BorkerNewsController::class,'AddNews']);
        Route::get('/edit/{id}',[BorkerNewsController::class,'Edit']);
        Route::post('/edit/{id}',[BorkerNewsController::class,'EditNews']);
        Route::get('/delete/{id}',[BorkerNewsController::class,'Delete']);
    });
    Route::group(['prefix' => 'brokersPromotions'],function(){
        Route::get('/',[BorkerPromotionsController::class,'Index']);
        Route::get('/all/{id}',[BorkerPromotionsController::class,'All']);
        Route::get('/new',[BorkerPromotionsController::class,'Add']);
        Route::post('/new',[BorkerPromotionsController::class,'AddPromotions']);
        Route::get('/edit/{id}',[BorkerPromotionsController::class,'Edit']);
        Route::post('/edit/{id}',[BorkerPromotionsController::class,'EditPromotions']);
        Route::get('/delete/{id}',[BorkerPromotionsController::class,'Delete']);
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
    Route::group(['prefix' => 'comment'],function(){
        Route::get('/',[CommentController::class,'Index']);
        Route::post('/',[CommentController::class,'Add']);
        Route::get('/delete/{id}',[CommentController::class,'Remove']);
        Route::group(['prefix' => 'reply'],function(){
            Route::get('/{id}',[CommentController::class,'ReplyList']);
            Route::post('/{id}',[CommentController::class,'AddReply']);
            Route::get('/delete/{id}',[CommentController::class,'RemoveReply']);
        });
    });
    Route::group(['prefix' => 'gallery'],function(){
        Route::get('/{id}',[GalleryController::class,'Index']);
        Route::post('/{id}',[GalleryController::class,'Add']);
        Route::get('delete/{id}',[GalleryController::class,'Delete']);
        Route::get('edit/{id}',[GalleryController::class,'Edit']);
    });
});

// Users Panel Views

Route::group(['prefix' => 'memberArea',"middleware" => "IsMemberLogin"],function(){
    Route::get('/dashboard',[MemberController::class,'Dashboard']);
    Route::get('/logout',[MemberController::class,'Logout']);
});
