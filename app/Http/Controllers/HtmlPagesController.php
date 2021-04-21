<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MetaTagsModel;

class HtmlPagesController extends Controller
{
    public function Page1(Request $request){
        return view('htmlPages.advance-forex-trading-plan');
    }
    public function Page2(Request $request){
        return view('htmlPages.advertise');
    }
    public function Page3(Request $request){
        return view('htmlPages.always-trad-with-stop-loss');
    }
    public function Page4(Request $request){
        return view('htmlPages.azadi-real-account-contest');
    }
    public function Page5(Request $request){
        return view('htmlPages.become-successful-forex-trader');
    }
    public function Page6(Request $request){
        return view('htmlPages.best-currency-pair-to-trade');
    }
    public function Page7(Request $request){
        return view('htmlPages.daily-time-frame-forex-trading');
    }
    public function Page8(Request $request){
        return view('htmlPages.deposit-money-exness-pakistan');
    }
    public function Page9(Request $request){
        return view('htmlPages.draw-perfect-trend-line');
    }
    public function Page10(Request $request){
        return view('htmlPages.exness-and-raheel-nawaz-is-organizing-seminar-in-gujranwala-pakistan');
    }
    public function Page11(Request $request){
        return view('htmlPages.flags-charts-patterns-urdu-hindi');
    }
    public function Page12(Request $request){
        return view('htmlPages.forex-trading-plan-july-2015');
    }
    public function Page13(Request $request){
        return view('htmlPages.forex-trading-stop-loss');
    }
    public function Page14(Request $request){
        return view('htmlPages.forex-trading-using-moving-average-strategy');
    }
    public function Page15(Request $request){
        return view('htmlPages.forex-trading-webinar-for-vips');
    }
    public function Page16(Request $request){
        return view('htmlPages.forexustaad-weekly-lucky-draw');
    }
    public function Page17(Request $request){
        return view('htmlPages.free-forexustaad-pro-indicator');
    }
    public function Page18(Request $request){
        return view('htmlPages.free-signals-analysis-and-news-updates');
    }
    public function Page19(Request $request){
        return view('htmlPages.fundamental-analysis-forex-trading');
    }
    public function Page20(Request $request){
        return view('htmlPages.fundamental-analysis-us-presidential-election-2016');
    }
    public function Page21(Request $request){
        return view('htmlPages.fundamental-analysis-webinar');
    }
    public function Page22(Request $request){
        return view('htmlPages.great-news-for-my-forex-lovers-friend');
    }
    public function Page23(Request $request){
        return view('htmlPages.how-to-choose-a-forex-broker-in-urdu-webinar');
    }
    public function Page24(Request $request){
        return view('htmlPages.how-to-choose-a-forex-broker-webinar-ready');
    }
    public function Page25(Request $request){
        return view('htmlPages.how-to-use-metatrader-4-full-training-in-urdu-part-1');
    }
    public function Page26(Request $request){
        return view('htmlPages.how-to-use-metatrader-4-full-training-in-urdu-part-2');
    }
    public function Page27(Request $request){
        return view('htmlPages.learn-forex-trading-in-pakistan');
    }
    public function Page28(Request $request){
        return view('htmlPages.live-radio');
    }
    public function Page29(Request $request){
        return view('htmlPages.market-reviews-euro-dollar-yen');
    }
    public function Page30(Request $request){
        return view('htmlPages.opening-event-technow');
    }
    public function Page31(Request $request){
        return view('htmlPages.pinbar-candlestick-strategies');
    }
    public function Page32(Request $request){
        return view('htmlPages.technical-analysis-trading-forex');
    }
    public function Page33(Request $request){
        return view('htmlPages.scam-fraud-internet');
    }
    public function Page34(Request $request){
        return view('htmlPages.schoolboy-made-72million-forex-trading-lunch-breaks');
    }
    public function Page35(Request $request){
        return view('htmlPages.support-and-resistance-chart');
    }
    public function Page36(Request $request){
        return view('htmlPages.timing-is-most-important-element-in-forex-trading');
    }
    public function Page37(Request $request){
        return view('htmlPages.trading-story-mr-bean-its-your');
    }
    public function Page38(Request $request){
        return view('htmlPages.what-is-candlestick-strategy-in-urduhindi-part-1');
    }
    public function Page39(Request $request){
        $meta = MetaTagsModel::where('name_page','What-is-forex-trading')->first();
        return view('htmlPages.what-is-forex-trading',compact('meta'));
    }
    public function Page40(Request $request){
        return view('htmlPages.what-is-forex-trading-in-urdu-webinar');
    }
}
