@include('inc.header')

        <!-- Content Area -->

        <div class="content_area">
    <section class="after_banner_content_area">
        <div class="container">
            <div class="row justify-content-center">
                @php
                    if(Session::has('error')){ 
                        $error =Session::get('error');
                    }
                    @endphp
                @isset($error)
                    <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="alert alert-danger">{{$error}}</div>
                        @php Session::pull('error') @endphp
                    </div>
                @endisset
                <div class="col-lg-3 col-md-6 col-sm-12 order-2 order-lg-1">
                @include('inc.home-left-sidebar')
                </div>
                <div class="col-lg-6 col-md-12 order-1 order-lg-2">
                    <h3>
                        Terms OF Services
                    </h3>

                    <p>
                        WWW.FOREXUSTAAD.COM provide you assistance and training about Forex trading. To qualify for Training we need your to signup as a member and deliver information and documents about you and your business. We have few terms of services (TOS) to maintain a good relation between www.ForexUstaad.com and the member / referral or user of any substance of website www.ForexUstaad.com.
                    </p>
<p>Make sure and read these terms of services carefully it is automatically considered that you the user of any facility from www.ForexUstaad.com is agreed and bound to obey the TOS. We have right to change all / any term and condition at any time without intimating that change will be applicable just after that changed been made. No matter anyone had or had not knowledge about that changed. It is your duty to read terms of services time to time.</p>
<p>We arrange time to time webinars and training sessions. Members are not allowed to use or share our training martial with any other slimier website or Trainer. We have all rights reserved to take action of unlawful usage of our material which we post time to time on our website www.ForexUstaad.com.</p>
<p>· Members must provide us true information’s about him/her.</p>
<p>· Members if needed will provide the true copy of him/her documents with any changes made by any type of software. This forgery will not allow on any case.</p>
<p>· One member one name and one account bases policy is adopted by us</p>
<p>· For our training session all kind of fee charges must be payable before the session starts which is not returnable in any case.</p>
<p>· www.ForexUstaad.com has right about any session or training class to stop it or postpone it</p>
<p>· Members of training class / session have no right to claim their money if the classes stopped/ postpone or member left from training due to his own.</p>
<p>· Members of www.ForexUstaad.com must obey the rules announced by www.ForexUstaad.com time to time.</p>
<p>.Forex Trading is a high risk business so If anyone face lose in his account due to his own activity will be responsible by its own.</p>
<p>· You agree that our past performance does not guarantee you the same results in the future</p>
<p>· www.ForexUstaad.com is not responsible and / or liable for any internal or external loss of funds due to password sharing, Identity theft or Broker issues (in case of broker default or scam).</p>
<p>· Every transaction made between www.ForexUstaad.com and its members, is considered to be private.</p>
<p>. Forexustaad.com does not accept any sort of funds for Trading purpose. We Only charge Training or subscription fees from our members</p>
<p>· Make this thing very much clear that training of few days, few free training sessions are not enough to cover all kind of information’s about Forex and one can only start Forex business after learning complete informations and trading methods. We the www.ForexUstaad.com not recommend to start your business without completing all training sessions (free and paid).</p>
<p>. ForexUstaad.com give you Training with best resources available but still if you face any lose this will consider your own decision and you have to be responsible for all your losses. forexustaad does not take any responsibility for Trading losses. We strongly recommend to all our members first learn than earn so first complete your training and then work on demo account after that you may start your business in Forex Trading and we www.ForexUstaad.com . Will always be on your help and support.

                    </p>
                </div>
                               
               
                <div class="col-lg-3 col-md-6 col-sm-12 order-3 order-lg-3">
                @include('inc.home-right-sidebar')

                </div>
            </div>
        </div>
    </section>
     
<!--     <div id="particles-js" style="height: 0;"></div> -->
</div>



@include('inc.footer')