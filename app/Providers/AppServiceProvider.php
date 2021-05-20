<?php

namespace App\Providers;

use Illuminate\Http\Request;
use Session;
use Illuminate\Support\ServiceProvider;
use App\Models\HeaderLeftBannerModel;
use App\Models\HeaderRightBannerModel;
use App\Models\LogoPanelModel;
use App\Models\SlidingImagesModel;
use App\Models\FaviconPanelModel;
use App\Models\FooterWebinarModel;
use App\Models\FooterDescriptionModel;
use App\Models\FooterContactModel;
use App\Models\LeftSideBannerModel;
use App\Models\RightSideBannerModel;
use App\Models\ApiHomeModel;
use App\Models\ApiLeftModel;
use App\Models\ApiRightModel;
use App\Models\FirstNavBarModel;
use App\Models\FooterCopyRightModel;
use App\Models\BlogPostModel;
use App\Models\MainWebinarModel;
use App\Models\ClientAccountDetailModel;
use App\Models\BrokerCompanyInformationModel;
use App\Models\SignalsModel;
use App\Models\UserContactModel;
use App\Models\NotificationModel;
use App\Models\FundamentalModel;
use App\Models\SponoserAddModel;
use App\Models\MidBannerModel;
use App\Models\NonRegisterVisitorModel;
use App\Models\AllCitiesModel;
use App\Models\AllStatesModel;
use App\Models\AllCountriesModel;
use App\Models\ClientNotificationModel;
use App\Models\ClientRegistrationModel;
use App\Models\SignalApiKeyModel;
use App\Models\AnalysisModel;
use App\Models\BrokerNewsModel;
use App\Models\MetaKeywordsModel;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->share("headerLeftBanner",HeaderLeftBannerModel::orderBy('id','desc')->whereDate('start', '<=', date("Y-m-d"))->whereDate('end', '>=', date("Y-m-d"))->where('active',0)->first());
        view()->share("headerRightBanner",HeaderRightBannerModel::orderBy('id','desc')->whereDate('start', '<=', date("Y-m-d"))->whereDate('end', '>=', date("Y-m-d"))->where('active',0)->first());
        view()->share("MainLogo",LogoPanelModel::orderBy('id','desc')->where('active',1)->first());
        view()->share("MainFavicon",FaviconPanelModel::orderBy('id','desc')->where('active',1)->first());
        view()->share("SlidingImagesData",SlidingImagesModel::orderBy('id','desc')->get());
        view()->share("FooterWebinar",FooterWebinarModel::all());
        view()->share("FooterDescription",FooterDescriptionModel::all());
        view()->share("FooterContact",FooterContactModel::all());
        view()->share("MainLeftBanner",LeftSideBannerModel::where('area','Top')->whereDate('start', '<=', date("Y-m-d"))->whereDate('end', '>=', date("Y-m-d"))->first());
        view()->share("MainRightBanner",RightSideBannerModel::where('area','Top')->whereDate('start', '<=', date("Y-m-d"))->whereDate('end', '>=', date("Y-m-d"))->first());
        view()->share("AllLeftBanner",LeftSideBannerModel::orderBy('id','desc')->whereDate('start', '<=', date("Y-m-d"))->whereDate('end', '>=', date("Y-m-d"))->get());
        view()->share("AllRightBanner",RightSideBannerModel::orderBy('id','desc')->whereDate('start', '<=', date("Y-m-d"))->whereDate('end', '>=', date("Y-m-d"))->get());
        view()->share("AllHomeApi",ApiHomeModel::orderBy('id','desc')->where('trash',0)->get());
        view()->share("AllLeftApi",ApiLeftModel::orderBy('id','desc')->where('trash',0)->get());
        view()->share("AllRightApi",ApiRightModel::orderBy('id','desc')->where('trash',0)->get());
        view()->share("SocialMediaLink",FirstNavBarModel::all());
        view()->share("copyRight",FooterCopyRightModel::where('id',1)->first());
        view()->share("SponoserAddActive",SponoserAddModel::orderBy('id','desc')->where('status',0)->skip(0)->take(9)->get());
        view()->share("MidBannerHomeActive",MidBannerModel::where('status',0)->where('active',1)->first());
        view()->share("AllCities",AllCitiesModel::all());
        view()->share("AllStates",AllStatesModel::all());
        view()->share("AllCountries",AllCountriesModel::all());
        view()->share("ClientNotificationMessage",ClientNotificationModel::orderBy('id','desc')->get());
        /** Admin Panel Function  */
        view()->share("ClientAccountDetailInfo",ClientAccountDetailModel::all());
        view()->share("HeaderUnReadMessage",UserContactModel::orderBy('id','desc')->where('read',0)->where('trashMail',0)->get());
        view()->share("NotificationMessage",NotificationModel::orderBy('id','desc')->get());
        view()->share("NonRegisterUser",NonRegisterVisitorModel::orderBy('id','desc')->get());
        view()->share("AllClientMemberData",ClientRegistrationModel::where('status',1)->where('confirmationEmail',1)->get());
        view()->share("onesignalApiKey",SignalApiKeyModel::where('id',2)->first());
        view()->share("signalApiRateKey",SignalApiKeyModel::where('id',1)->first());
        view()->share("MetaKeywords",MetaKeywordsModel::all());


    }
}
