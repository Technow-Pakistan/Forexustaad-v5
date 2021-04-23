<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MetaTagsModel;

class HtmlPagesController extends Controller
{
    public function Page1(Request $request){
        $meta = MetaTagsModel::where('name_page','advance-forex-trading-plan')->first();
        return view('htmlPages.advance-forex-trading-plan',compact('meta'));
    }
    public function Page2(Request $request){
        $meta = MetaTagsModel::where('name_page','advertise')->first();
        return view('htmlPages.advertise',compact('meta'));
    }
    public function Page3(Request $request){
        $meta = MetaTagsModel::where('name_page','always-trad-with-stop-loss')->first();
        return view('htmlPages.always-trad-with-stop-loss',compact('meta'));
    }
    public function Page4(Request $request){
        $meta = MetaTagsModel::where('name_page','azadi-real-account-contest')->first();
        return view('htmlPages.azadi-real-account-contest',compact('meta'));
    }
    public function Page5(Request $request){
        $meta = MetaTagsModel::where('name_page','become-successful-forex-trader')->first();
        return view('htmlPages.become-successful-forex-trader',compact('meta'));
    }
    public function Page6(Request $request){
        $meta = MetaTagsModel::where('name_page','best-currency-pair-to-trade')->first();
        return view('htmlPages.best-currency-pair-to-trade',compact('meta'));
    }
    public function Page7(Request $request){
        $meta = MetaTagsModel::where('name_page','daily-time-frame-forex-trading')->first();
        return view('htmlPages.daily-time-frame-forex-trading',compact('meta'));
    }
    public function Page8(Request $request){
        $meta = MetaTagsModel::where('name_page','deposit-money-exness-pakistan')->first();
        return view('htmlPages.deposit-money-exness-pakistan',compact('meta'));
    }
    public function Page9(Request $request){
        $meta = MetaTagsModel::where('name_page','draw-perfect-trend-line')->first();
        return view('htmlPages.draw-perfect-trend-line',compact('meta'));
    }
    public function Page10(Request $request){
        $meta = MetaTagsModel::where('name_page','exness-and-raheel-nawaz-is-organizing-seminar-in-gujranwala-pakistan')->first();
        return view('htmlPages.exness-and-raheel-nawaz-is-organizing-seminar-in-gujranwala-pakistan',compact('meta'));
    }
    public function Page11(Request $request){
        $meta = MetaTagsModel::where('name_page','flags-charts-patterns-urdu-hindi')->first();
        return view('htmlPages.flags-charts-patterns-urdu-hindi',compact('meta'));
    }
    public function Page12(Request $request){
        $meta = MetaTagsModel::where('name_page','forex-trading-plan-july-2015')->first();
        return view('htmlPages.forex-trading-plan-july-2015',compact('meta'));
    }
    public function Page13(Request $request){
        $meta = MetaTagsModel::where('name_page','forex-trading-stop-loss')->first();
        return view('htmlPages.forex-trading-stop-loss',compact('meta'));
    }
    public function Page14(Request $request){
        $meta = MetaTagsModel::where('name_page','forex-trading-using-moving-average-strategy')->first();
        return view('htmlPages.forex-trading-using-moving-average-strategy',compact('meta'));
    }
    public function Page15(Request $request){
        $meta = MetaTagsModel::where('name_page','forex-trading-webinar-for-vips')->first();
        return view('htmlPages.forex-trading-webinar-for-vips',compact('meta'));
    }
    public function Page16(Request $request){
        $meta = MetaTagsModel::where('name_page','forexustaad-weekly-lucky-draw')->first();
        return view('htmlPages.forexustaad-weekly-lucky-draw',compact('meta'));
    }
    public function Page17(Request $request){
        $meta = MetaTagsModel::where('name_page','free-forexustaad-pro-indicator')->first();
        return view('htmlPages.free-forexustaad-pro-indicator',compact('meta'));
    }
    public function Page18(Request $request){
        $meta = MetaTagsModel::where('name_page','free-signals-analysis-and-news-updates')->first();
        return view('htmlPages.free-signals-analysis-and-news-updates',compact('meta'));
    }
    public function Page19(Request $request){
        $meta = MetaTagsModel::where('name_page','fundamental-analysis-forex-trading')->first();
        return view('htmlPages.fundamental-analysis-forex-trading',compact('meta'));
    }
    public function Page20(Request $request){
        $meta = MetaTagsModel::where('name_page','fundamental-analysis-us-presidential-election-2016')->first();
        return view('htmlPages.fundamental-analysis-us-presidential-election-2016',compact('meta'));
    }
    public function Page21(Request $request){
        $meta = MetaTagsModel::where('name_page','fundamental-analysis-webinar')->first();
        return view('htmlPages.fundamental-analysis-webinar',compact('meta'));
    }
    public function Page22(Request $request){
        $meta = MetaTagsModel::where('name_page','great-news-for-my-forex-lovers-friend')->first();
        return view('htmlPages.great-news-for-my-forex-lovers-friend',compact('meta'));
    }
    public function Page23(Request $request){
        $meta = MetaTagsModel::where('name_page','how-to-choose-a-forex-broker-in-urdu-webinar')->first();
        return view('htmlPages.how-to-choose-a-forex-broker-in-urdu-webinar',compact('meta'));
    }
    public function Page24(Request $request){
        $meta = MetaTagsModel::where('name_page','how-to-choose-a-forex-broker-webinar-ready')->first();
        return view('htmlPages.how-to-choose-a-forex-broker-webinar-ready',compact('meta'));
    }
    public function Page25(Request $request){
        $meta = MetaTagsModel::where('name_page','how-to-use-metatrader-4-full-training-in-urdu-part-1')->first();
        return view('htmlPages.how-to-use-metatrader-4-full-training-in-urdu-part-1',compact('meta'));
    }
    public function Page26(Request $request){
        $meta = MetaTagsModel::where('name_page','how-to-use-metatrader-4-full-training-in-urdu-part-2')->first();
        return view('htmlPages.how-to-use-metatrader-4-full-training-in-urdu-part-2',compact('meta'));
    }
    public function Page27(Request $request){
        $meta = MetaTagsModel::where('name_page','learn-forex-trading-in-pakistan')->first();
        return view('htmlPages.learn-forex-trading-in-pakistan',compact('meta'));
    }
    public function Page28(Request $request){
        $meta = MetaTagsModel::where('name_page','live-radio')->first();
        return view('htmlPages.live-radio',compact('meta'));
    }
    public function Page29(Request $request){
        $meta = MetaTagsModel::where('name_page','market-reviews-euro-dollar-yen')->first();
        return view('htmlPages.market-reviews-euro-dollar-yen',compact('meta'));
    }
    public function Page30(Request $request){
        $meta = MetaTagsModel::where('name_page','opening-event-technow')->first();
        return view('htmlPages.opening-event-technow',compact('meta'));
    }
    public function Page31(Request $request){
        $meta = MetaTagsModel::where('name_page','pinbar-candlestick-strategies')->first();
        return view('htmlPages.pinbar-candlestick-strategies',compact('meta'));
    }
    public function Page32(Request $request){
        $meta = MetaTagsModel::where('name_page','technical-analysis-trading-forex')->first();
        return view('htmlPages.technical-analysis-trading-forex',compact('meta'));
    }
    public function Page33(Request $request){
        $meta = MetaTagsModel::where('name_page','scam-fraud-internet')->first();
        return view('htmlPages.scam-fraud-internet',compact('meta'));
    }
    public function Page34(Request $request){
        $meta = MetaTagsModel::where('name_page','schoolboy-made-72million-forex-trading-lunch-breaks')->first();
        return view('htmlPages.schoolboy-made-72million-forex-trading-lunch-breaks',compact('meta'));
    }
    public function Page35(Request $request){
        $meta = MetaTagsModel::where('name_page','support-and-resistance-chart')->first();
        return view('htmlPages.support-and-resistance-chart',compact('meta'));
    }
    public function Page36(Request $request){
        $meta = MetaTagsModel::where('name_page','timing-is-most-important-element-in-forex-trading')->first();
        return view('htmlPages.timing-is-most-important-element-in-forex-trading',compact('meta'));
    }
    public function Page37(Request $request){
        $meta = MetaTagsModel::where('name_page','trading-story-mr-bean-its-your')->first();
        return view('htmlPages.trading-story-mr-bean-its-your',compact('meta'));
    }
    public function Page38(Request $request){
        $meta = MetaTagsModel::where('name_page','what-is-candlestick-strategy-in-urduhindi-part-1')->first();
        return view('htmlPages.what-is-candlestick-strategy-in-urduhindi-part-1',compact('meta'));
    }
    public function Page39(Request $request){
        $meta = MetaTagsModel::where('name_page','what-is-forex-trading')->first();
        return view('htmlPages.what-is-forex-trading',compact('meta'));
    }
    public function Page40(Request $request){
        $meta = MetaTagsModel::where('name_page','what-is-forex-trading-in-urdu-webinar')->first();
        return view('htmlPages.what-is-forex-trading-in-urdu-webinar',compact('meta'));
    }
}
