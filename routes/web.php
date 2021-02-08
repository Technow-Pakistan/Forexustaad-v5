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
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HtmlPagesController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\MainWebinarController;
use App\Http\Controllers\SignalController;
use App\Http\Controllers\ComposeEmailController;
use App\Http\Controllers\StrategiesController;
use App\Http\Controllers\AnalysisController;
use App\Http\Controllers\AdvanceTrainingController;
use App\Http\Controllers\AdvanceCommentsController;
use App\Http\Controllers\BrokerCategoryController;
use App\Http\Controllers\BrokerTrainingController;
use App\Http\Controllers\OtherPagesContentController;
use App\Http\Controllers\FundamentalController;
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

Route::get('/unRegisterUser/Save',[HomeController::class,'unRegisterUserSave']);

Route::get('/training/{id1}/{id}',[AdvanceTrainingController::class,'ViewAll']);
Route::get('/analysis',[AnalysisController::class,'ViewAll']);
Route::get('/analysis/{id}',[AnalysisController::class,'ViewDetail']);
Route::get('/fundamental',[FundamentalController::class,'ViewAll']);
Route::get('/fundamental/{id}',[FundamentalController::class,'ViewDetail']);

Route::get('/brokerList/training/{id}',[BrokerTrainingController::class,'BrokerTraining']);
Route::get('/broker/training/{id}',[BrokerTrainingController::class,'ChangeTraining']);
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
Route::get('/forgetPassword/{id}',[HomeController::class,'ForgetPasswordChange']);
Route::post('/forgetPassword/{id}',[HomeController::class,'ForgetPasswordChangeProcess']);
Route::post('/uploader/upload.php',[HomeController::class,'ImageSrc15']);
Route::post('/pro-img-disk.php',[HomeController::class,'ImageSrc']);
Route::post('/comment1',[CommentController::class,'Add']);
Route::get('/',[HomeController::class,'Index']);
Route::get('/construction',[HomeController::class,'Construction']);
Route::get('/webinar',[HomeController::class,'webinar']);
Route::post('/clientRegistration',[HomeController::class,'RegistrationProcess']);
Route::post('/clientLogin',[HomeController::class,'LoginProcess']);
Route::post('/clientForget',[HomeController::class,'ForgetProcess']);
Route::get('/clientLogout',[HomeController::class,'LogoutProcess']);
Route::get('/blog-post.html',[BlogController::class,'Index']);
Route::get('/Posts/{id}/{id2}',[BlogController::class,'DetailBlog']);
Route::get('/privacy-policy.html',[HomeController::class,'privacyPolicy']);
Route::get('/about-page',[HomeController::class,'AboutPage']);
Route::get('/term-of-services.html',[HomeController::class,'termServices']);
Route::get('/contact-us',[ContactController::class,'contact']);
Route::get('/signal',[SignalController::class,'signal']);
Route::get('/signal/{id}',[SignalController::class,'signalView']);
Route::post('/contact/add',[ContactController::class,'Add']);


// Admin views

Route::get('/ustaad',[AdminController::class,'Login']);
Route::post('/ustaad',[AdminController::class,'Index']);

Route::group(['prefix' => 'ustaad',"middleware" => "IsLogin"],function(){
    Route::get('/DeleteClientAccount/{id}',[AdminController::class,'DeleteClientAccount']);
    Route::post('/apileftorder',[ApiLeftController::class,'Order']);
    Route::get('/notification/{id}',[AdminController::class,'NotificationView']);
    Route::post('/notification/checked/delete',[AdminController::class,'NotificationDelete']);
    Route::get('/viewClientProfile/{id}',[AdminController::class,'ViewClientProfile']);
    Route::post('/viewClientProfile/accountVerified/{id}',[AdminController::class,'ClientProfileAccountVerified']);
    Route::post('/changeMemberType/{id}',[AdminController::class,'ChangeMemberType']);

    Route::get('/dashboard',[AdminController::class,'Dashboard']);
    Route::get('/trash',[AdminController::class,'Trash']);
    Route::get('/trashGallery',[AdminController::class,'TrashGallery']);
    Route::get('trashGallery/delete/{id}',[AdminController::class,'TrashGalleryImageDelete']);
    Route::get('trashGallery/restore/{id}',[AdminController::class,'TrashGalleryImageRestore']);
    Route::get('/logout',[AdminController::class,'Logout']);
    Route::group(['prefix' => 'lecture'],function(){
        Route::post('/order',[AdvanceTrainingController::class,'Order']);
        Route::get('/',[AdvanceTrainingController::class,'Index']);
        Route::get('/new',[AdvanceTrainingController::class,'Add']);
        Route::post('/new',[AdvanceTrainingController::class,'AddLecture']);
        Route::get('/{id1}/edit/{id}',[AdvanceTrainingController::class,'Edit']);
        Route::post('/{id1}/edit/{id}',[AdvanceTrainingController::class,'EditLecture']);
        Route::get('/{id1}/delete/{id}',[AdvanceTrainingController::class,'Delete']);
        Route::get('/{id1}/active/{id}',[AdvanceTrainingController::class,'Active']);
        Route::get('/BasicCategory/{id}',[AdvanceTrainingController::class,'ViewComment1']);
        Route::get('/AdvanceCategory/{id}',[AdvanceTrainingController::class,'ViewComment2']);
        Route::get('/HabbitCategory/{id}',[AdvanceTrainingController::class,'ViewComment3']);
        Route::post('/CommentViewReply/add/',[AdvanceTrainingController::class,'SaveViewCommentReply']);
    });

    Route::group(['prefix' => 'staticpages'],function(){
        Route::get('/',[OtherPagesContentController::class,'Index']);
        Route::post('/',[OtherPagesContentController::class,'SaveChanges']);
    });

    Route::group(['prefix' => 'strategies'],function(){
        Route::get('/',[StrategiesController::class,'Index']);
        Route::get('/new',[StrategiesController::class,'Add']);
        Route::post('/new',[StrategiesController::class,'AddStrategy']);
        Route::get('/edit/{id}',[StrategiesController::class,'Edit']);
        Route::post('/edit/{id}',[StrategiesController::class,'EditStrategy']);
        Route::get('/delete/{id}',[StrategiesController::class,'Delete']);
        Route::get('/active/{id}',[StrategiesController::class,'Active']);
    });
    Route::group(['prefix' => 'analysis'],function(){
        Route::get('/',[AnalysisController::class,'Index']);
        Route::get('/add',[AnalysisController::class,'Add']);
        Route::post('/add',[AnalysisController::class,'AddProcess']);
        Route::get('/edit/{id}',[AnalysisController::class,'Edit']);
        Route::post('/edit/{id}',[AnalysisController::class,'EditProcess']);
        Route::get('/deactive/{id}',[AnalysisController::class,'Deactive']);
        Route::get('/active/{id}',[AnalysisController::class,'Active']);
    });
    Route::group(['prefix' => 'fundamental'],function(){
        Route::get('/',[FundamentalController::class,'Index']);
        Route::get('/add',[FundamentalController::class,'Add']);
        Route::post('/add',[FundamentalController::class,'AddProcess']);
        Route::get('/edit/{id}',[FundamentalController::class,'Edit']);
        Route::post('/edit/{id}',[FundamentalController::class,'EditProcess']);
        Route::get('/deactive/{id}',[FundamentalController::class,'Deactive']);
        Route::get('/active/{id}',[FundamentalController::class,'Active']);
    });
    Route::group(['prefix' => 'contact'],function(){
        Route::get('/',[ContactController::class,'Index']);
        Route::post('/',[ContactController::class,'SelectedTrash']);
        Route::post('/unTrash',[ContactController::class,'UnTrash']);
        Route::get('/starMessage/{id}',[ContactController::class,'StarMessage']);
        Route::get('/emailRead/{id}',[ContactController::class,'EmailRead']);
        Route::get('/emailCompose',[ComposeEmailController::class,'Index']);
        Route::post('/DraftMail',[ComposeEmailController::class,'DraftMail']);
        Route::post('/SendMail',[ComposeEmailController::class,'SendMail']);
        Route::post('/SendMailDirect',[ComposeEmailController::class,'SendMailDirect']);
        Route::get('/sendEmailRead/{id}',[ComposeEmailController::class,'SendEmailRead']);
        Route::get('/draftEmailRead/{id}',[ComposeEmailController::class,'draftEmailRead']);
        Route::post('/draftEmailRead/{id}',[ComposeEmailController::class,'draftEmailSave']);
        Route::post('/SendDraftMail/{id}',[ComposeEmailController::class,'draftEmailSend']);
        Route::get('/reply/{id}',[ComposeEmailController::class,'EmailReply']);
    });
    Route::group(['prefix' => 'signals'],function(){
        Route::get('/comment/{id}',[SignalController::class,'Comment']);
        Route::post('/CommentViewReply/add',[SignalController::class,'CommentAdd']);
        Route::get('/',[SignalController::class,'Index']);
        Route::get('/add',[SignalController::class,'Add']);
        Route::post('/add',[SignalController::class,'AddProcess']);
        Route::get('/edit/{id}',[SignalController::class,'Edit']);
        Route::post('/edit/{id}',[SignalController::class,'EditProcess']);
        Route::get('/delete/{id}',[SignalController::class,'Delete']);
        Route::get('/active/{id}',[SignalController::class,'Active']);
        Route::post('/star/{id}',[SignalController::class,'StarProcess']);
        Route::post('/unstar/{id}',[SignalController::class,'UnStarProcess']);
        Route::get('/addPair',[SignalController::class,'AddPair']);
        Route::post('/addPair',[SignalController::class,'AddPairProcess']);
        Route::post('pair/edit/{id}',[SignalController::class,'EditPairProcess']);
        Route::get('/pair/delete/{id}',[SignalController::class,'DeletePairProcess']);
        Route::get('/pair/active/{id}',[SignalController::class,'ActivePairProcess']);
        Route::post('/pairCategory',[SignalController::class,'AddPairCategoryProcess']);
        Route::post('/pairCategory/edit/{id}',[SignalController::class,'EditPairCategoryProcess']);
        Route::get('/pairCategory/delete/{id}',[SignalController::class,'DeletePairCategoryProcess']);
        Route::get('/pairCategory/active/{id}',[SignalController::class,'ActivePairCategoryProcess']);
    });
    Route::group(['prefix' => 'webinar'],function(){
        Route::get('/',[MainWebinarController::class,'Index']);
        Route::get('/add',[MainWebinarController::class,'Add']);
        Route::post('/add',[MainWebinarController::class,'AddWebinar']);
        Route::get('/deactive/{id}',[MainWebinarController::class,'Deactive']);
        Route::get('/active/{id}',[MainWebinarController::class,'Active']);
        Route::get('/edit/{id}',[MainWebinarController::class,'Edit']);
        Route::post('/edit/{id}',[MainWebinarController::class,'EditWebinar']);
    });

    Route::group(['prefix' => 'firstNav'],function(){
        Route::get('/',[FirstNavBarController::class,'Index']);
        Route::post('/',[FirstNavBarController::class,'create']);
        Route::get('/trash/{id}',[FirstNavBarController::class,'Trash']);
        Route::get('/trashRestore/{id}',[FirstNavBarController::class,'TrashRestore']);
        Route::get('/delete/{id}',[FirstNavBarController::class,'delete']);
        Route::post('/edit/{id}',[FirstNavBarController::class,'edit']);
    });
    Route::group(['prefix' => 'navMenu'],function(){
        Route::get('/',[MainMenuController::class,'Index']);
        Route::post('/',[MainMenuController::class,'create']);
        Route::get('/trash/{id}',[MainMenuController::class,'Trash']);
        Route::get('/trashRestore/{id}',[MainMenuController::class,'TrashRestore']);
        Route::get('/delete/{id}',[MainMenuController::class,'delete']);
        Route::post('/edit/{id}',[MainMenuController::class,'edit']);
    });
    Route::group(['prefix' => 'logo-panel'],function(){
        Route::get('/',[LogoPanelController::class,'Index']);
        Route::post('/',[LogoPanelController::class,'Add']);
        Route::get('/trash/{id}',[LogoPanelController::class,'TrashLeft']);
        Route::get('/trashRestore/{id}',[LogoPanelController::class,'TrashLeftRestore']);
        Route::get('/delete/{id}',[LogoPanelController::class,'delete']);
        Route::post('/edit/{id}',[LogoPanelController::class,'edit']);
    });
    Route::group(['prefix' => 'logo-favicon'],function(){
        Route::post('/',[LogoPanelController::class,'AddFavicon']);
        Route::get('/trash/{id}',[LogoPanelController::class,'TrashRight']);
        Route::get('/trashRestore/{id}',[LogoPanelController::class,'TrashRightRestore']);
        Route::get('/delete/{id}',[LogoPanelController::class,'deleteFavicon']);
        Route::post('/edit/{id}',[LogoPanelController::class,'EditFavicon']);
    });
    Route::group(['prefix' => 'sliding-images'],function(){
        Route::get('/',[SlidingImagesController::class,'Index']);
        Route::post('/',[SlidingImagesController::class,'Add']);
        Route::get('/trash/{id}',[SlidingImagesController::class,'Trash']);
        Route::get('/trashRestore/{id}',[SlidingImagesController::class,'TrashRestore']);
        Route::get('/delete/{id}',[SlidingImagesController::class,'ProcessRemove']);
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
            Route::get('/left/delete/{id}',[HeaderBannerController::class,'deleteLeft']);
            Route::get('/left/trash/{id}',[HeaderBannerController::class,'TrashLeft']);
            Route::get('/left/trashRestore/{id}',[HeaderBannerController::class,'TrashLeftRestore']);
            Route::post('/edit-left/{id}',[HeaderBannerController::class,'EditLeft']);
            Route::post('/right',[HeaderBannerController::class,'AddRight']);
            Route::get('/right/trash/{id}',[HeaderBannerController::class,'TrashRight']);
            Route::get('/right/trashRestore/{id}',[HeaderBannerController::class,'TrashRightRestore']);
            Route::get('/right/deleteright/{id}',[HeaderBannerController::class,'deleteRight']);
            Route::post('/edit-right/{id}',[HeaderBannerController::class,'EditRight']);
        });
        Route::group(['prefix' => 'left-side-banner'],function(){
            Route::get('/',[LeftSideBannerController::class,'Index']);
            Route::post('/',[LeftSideBannerController::class,'Add']);
            Route::get('/trash/{id}',[LeftSideBannerController::class,'Trash']);
            Route::get('/trashRestore/{id}',[LeftSideBannerController::class,'TrashRestore']);
            Route::post('/edit/{id}',[LeftSideBannerController::class,'ProcessEdit']);
            Route::get('/delete/{id}',[LeftSideBannerController::class,'delete']);
        });
        Route::group(['prefix' => 'right-side-banner'],function(){
            Route::get('/',[RightSideBannerController::class,'Index']);
            Route::post('/',[RightSideBannerController::class,'Add']);
            Route::get('/trash/{id}',[RightSideBannerController::class,'Trash']);
            Route::get('/trashRestore/{id}',[RightSideBannerController::class,'TrashRestore']);
            Route::post('/edit/{id}',[RightSideBannerController::class,'ProcessEdit']);
            Route::get('/delete/{id}',[RightSideBannerController::class,'delete']);
        });
    });
    Route::group(['prefix' => 'api'],function(){
        Route::group(['prefix' => 'api-home'],function(){
            Route::get('/',[ApiHomeController::class,'Index']);
            Route::post('/',[ApiHomeController::class,'Add']);
            Route::get('/trash/{id}',[ApiHomeController::class,'Trash']);
            Route::get('/trashRestore/{id}',[ApiHomeController::class,'TrashRestore']);
            Route::get('/delete/{id}',[ApiHomeController::class,'delete']);
            Route::post('/edit/{id}',[ApiHomeController::class,'EditProcess']);
        });
        Route::group(['prefix' => 'api-left'],function(){
            Route::get('/',[ApiLeftController::class,'Index']);
            Route::post('/',[ApiLeftController::class,'Add']);
            Route::get('/trash/{id}',[ApiLeftController::class,'Trash']);
            Route::get('/trashRestore/{id}',[ApiLeftController::class,'TrashRestore']);
            Route::get('/delete/{id}',[ApiLeftController::class,'delete']);
            Route::post('/edit/{id}',[ApiLeftController::class,'EditProcess']);
        });
        Route::group(['prefix' => 'api-right'],function(){
            Route::get('/',[ApiRightController::class,'Index']);
            Route::post('/',[ApiRightController::class,'Add']);
            Route::get('/trash/{id}',[ApiRightController::class,'Trash']);
            Route::get('/trashRestore/{id}',[ApiRightController::class,'TrashRestore']);
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
        Route::get('/allow/{id}',[BrokerTopInformationController::class,'AllowBrokerProcess']);
        Route::post('/allow/{id}',[BrokerTopInformationController::class,'AllowBrokerProcess']);
        Route::post('/star/{id}',[BrokerTopInformationController::class,'StarBrokerProcess']);
        Route::post('/unstar/{id}',[BrokerTopInformationController::class,'UnStarBrokerProcess']);
        Route::get('/category',[BrokerCategoryController::class,'Category']);
        Route::get('/addCategory',[BrokerCategoryController::class,'Index']);
        Route::post('/addCategory',[BrokerCategoryController::class,'AddCategoryProcess']);
        Route::post('/editCategory/{id}',[BrokerCategoryController::class,'EditCategoryProcess']);
        Route::get('/deleteCategory/{id}',[BrokerCategoryController::class,'DeleteCategoryProcess']);
        Route::get('/activeCategory/{id}',[BrokerCategoryController::class,'ActiveCategoryProcess']);
        Route::get('/add/{id}',[BrokerTopInformationController::class,'Index']);
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
        Route::get('/delete/{id}',[BorkerController::class,'delete']);
        Route::get('/trash/{id}',[BorkerController::class,'Trash']);
        Route::get('/trashRestore/{id}',[BorkerController::class,'TrashRestore']);
    });
    Route::get('/allbrokers/{id}',[BorkerController::class,'Index']);
    Route::get('/editBroker/{id}',[BorkerController::class,'edit']);
    Route::post('/editBroker/{id}',[BorkerController::class,'editBrokerCompanyInformation']);

    Route::get('brokersNew/{id}',[BorkerNewsController::class,'Index']);

    Route::group(['prefix' => 'brokersNews'],function(){
        Route::get('/all/{id}',[BorkerNewsController::class,'All']);
        Route::get('/new',[BorkerNewsController::class,'Add']);
        Route::post('/new',[BorkerNewsController::class,'AddNews']);
        Route::get('/edit/{id}',[BorkerNewsController::class,'Edit']);
        Route::post('/edit/{id}',[BorkerNewsController::class,'EditNews']);
        Route::get('/delete/{id}',[BorkerNewsController::class,'Delete']);
        Route::get('/trash/{id}',[BorkerNewsController::class,'Trash']);
        Route::get('/trashRestore/{id}',[BorkerNewsController::class,'TrashRestore']);
        Route::post('/allow/{id}',[BorkerNewsController::class,'AllowBrokerNewsProcess']);
    });

    Route::get('brokersTraining/{id}',[BrokerTrainingController::class,'Index']);

    Route::group(['prefix' => 'brokersTrainings'],function(){
        Route::get('/all/{id}',[BrokerTrainingController::class,'All']);
        Route::get('/new',[BrokerTrainingController::class,'Add']);
        Route::post('/new',[BrokerTrainingController::class,'AddNews']);
        Route::get('/edit/{id}',[BrokerTrainingController::class,'Edit']);
        Route::post('/edit/{id}',[BrokerTrainingController::class,'EditNews']);
        Route::get('/delete/{id}',[BrokerTrainingController::class,'Delete']);
        Route::get('/trash/{id}',[BrokerTrainingController::class,'Trash']);
        Route::get('/trashRestore/{id}',[BrokerTrainingController::class,'TrashRestore']);
        Route::post('/allow/{id}',[BrokerTrainingController::class,'AllowBrokerNewsProcess']);
    });
    Route::get('brokersPromotion/{id}',[BorkerPromotionsController::class,'Index']);

    Route::group(['prefix' => 'brokersPromotions'],function(){
        Route::get('/all/{id}',[BorkerPromotionsController::class,'All']);
        Route::get('/new',[BorkerPromotionsController::class,'Add']);
        Route::post('/new',[BorkerPromotionsController::class,'AddPromotions']);
        Route::get('/edit/{id}',[BorkerPromotionsController::class,'Edit']);
        Route::post('/edit/{id}',[BorkerPromotionsController::class,'EditPromotions']);
        Route::get('/delete/{id}',[BorkerPromotionsController::class,'Delete']);
        Route::post('/allow/{id}',[BorkerPromotionsController::class,'AllowBrokerPromotionProcess']);
    });
    Route::group(['prefix' => 'brokersReview'],function(){
        Route::get('/{id}',[BorkerReviewController::class,'Index']);
        Route::get('/edit/{id}',[BorkerReviewController::class,'Edit']);
        Route::post('/edit/{id}',[BorkerReviewController::class,'EditReview']);
        Route::get('/delete/{id}',[BorkerReviewController::class,'Delete']);
        Route::post('/allow/{id}',[BorkerReviewController::class,'AllowBrokerReviewProcess']);
    });
    Route::get('/brokerReview/new',[BorkerReviewController::class,'Add']);
    Route::post('/brokersReview/new',[BorkerReviewController::class,'AddReview']);
    Route::get('/brokersDetail/{id}',[BorkerController::class,'Detail']);
    
    Route::get('/clientMember/{id}',[ClientMemberController::class,'clientMemberView']);
    Route::group(['prefix' => 'member'],function(){
        Route::get('/profile/{id}',[AdminMemberController::class,'Index']);
        Route::get('/add',[AdminMemberController::class,'Add']);
        Route::post('/add',[AdminMemberController::class,'AddMember']);
        Route::get('/changePassword',[AdminMemberController::class,'ChangePassword']);
        Route::post('/changePassword',[AdminMemberController::class,'ChangePasswordProcess']);
        Route::get('/userList',[AdminMemberController::class,'UserList']);
        Route::get('/edit/{id}',[AdminMemberController::class,'Edit']);
        Route::post('/edit/{id}',[AdminMemberController::class,'EditMember']);
        Route::get('/deactive/{id}',[AdminMemberController::class,'Deactive']);
        Route::get('/active/{id}',[AdminMemberController::class,'Active']);
        Route::post('/addBackImg/{id}',[AdminMemberController::class,'AddBackImg']);
        Route::post('/addUserImg/{id}',[AdminMemberController::class,'AddUserImg']);
        Route::get('/clientList',[ClientMemberController::class,'ClientList']);
    });
    Route::group(['prefix' => 'client'],function(){
        Route::post('/confirmEmail/{id}',[ClientMemberController::class,'ConfirmEmail']);
        Route::get('/delete/{id}',[ClientMemberController::class,'Delete']);
        Route::get('/active/{id}',[ClientMemberController::class,'Active']);
    });
    Route::group(['prefix' => 'comment'],function(){
        Route::get('/latest',[CommentController::class,'viewLatestComments']);
        Route::post('/latest/add/{id}',[CommentController::class,'addLatestComments']);
        Route::get('/latest/delete/{id}',[CommentController::class,'DeleteLatestComment']);
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
        Route::get('trash/{id}',[GalleryController::class,'Trash']);
        Route::get('edit/{id}',[GalleryController::class,'Edit']);
        Route::post('edit/{id}',[GalleryController::class,'EditProcess']);
    });
});

// Users Panel Views

Route::group(['prefix' => '',"middleware" => "IsMemberLogin"],function(){
    Route::get('/strategies',[StrategiesController::class,'ViewAll']);
    Route::get('/strategies/{id}',[StrategiesController::class,'StrategyDetail']);
    Route::get('/vipWebinar',[HomeController::class,'VipWebinar']);
    Route::get('/vipTraining/advance/{id}',[AdvanceTrainingController::class,'ViewVipAll']);
    Route::get('/changePassword',[HomeController::class,'ChangePassword']);
    Route::post('/changePassword',[HomeController::class,'ChangePasswordAdd']);
    Route::post('/advance/comment/add',[AdvanceCommentsController::class,'Add']);
    Route::post('/signal/comment/add',[SignalController::class,'AddComment']);
    Route::get('/user-registration',[HomeController::class,'userregistration']);
    Route::post('/user-registration',[HomeController::class,'userregistrationUpdate']);
    Route::post('user-registration/stateData/{id}',[HomeController::class,'userregistrationStateCode']);
    Route::post('user-registration/cityData/{id}',[HomeController::class,'userregistrationCityCode']);
    Route::post('/user-registration/Account',[HomeController::class,'userregistrationAccountAdd']);
    Route::get('/user-profile',[HomeController::class,'userProfile']);
    // Route::get('/dashboard',[MemberController::class,'Dashboard']);
    // Route::get('/logout',[MemberController::class,'Logout']);
});
