<?php

namespace App\Providers;

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
        view()->share("headerLeftBanner",HeaderLeftBannerModel::orderBy('id','desc')->whereDate('start', '<=', date("Y-m-d"))->whereDate('end', '>=', date("Y-m-d"))->first());
        view()->share("headerRightBanner",HeaderRightBannerModel::orderBy('id','desc')->whereDate('start', '<=', date("Y-m-d"))->whereDate('end', '>=', date("Y-m-d"))->first());
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
        view()->share("MainHomeApi",ApiHomeModel::where('area','Top')->first());
        view()->share("AllHomeApi",ApiHomeModel::orderBy('id','desc')->get());
        view()->share("AllLeftApi",ApiLeftModel::orderBy('id','desc')->get());
        view()->share("AllRightApi",ApiRightModel::orderBy('id','desc')->get());
        view()->share("SocialMediaLink",FirstNavBarModel::all());
        view()->share("copyRight",FooterCopyRightModel::where('id',1)->first());
        view()->share("latestWebinars", MainWebinarModel::orderBy('id','desc')->take(5)->get());
        view()->share("LatestBlogsData",BlogPostModel::orderBy('id','desc')->where('status',1)->where('pending',1)->where('stickToTop',1)->whereDate('publishDate', '<=', date("Y-m-d"))->take(5)->get());
    }
}
