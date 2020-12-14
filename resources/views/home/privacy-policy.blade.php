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
                        Privacy Policy
                    </h3>

                    <p>
                        This privacy policy sets out how www.forexustaad.com uses and protects any information that you give when you use this website. Your privacy is important to us, and it is forexustaad.com policy to respect your privacy regarding any information we may collect while operating our websites. Accordingly, we have developed this Policy in order for you to understand how we collect, use, communicate and disclose and make use of personal information. The following outlines our privacy policy.
                    </p>
<p>Before or at the time of collecting personal information, we will identify the purposes for which information is being collected.</p>
<p>We will collect and use of personal information solely with the objective of fulfilling those purposes specified by us and for other compatible purposes, unless we obtain the consent of the individual concerned or as required by law.</p>
<p>Informations on cookies based also must be safe and while not share with anyone.
We will only retain personal information as long as necessary for the fulfillment of those purposes.
We will collect personal information by lawful and fair means and, where appropriate, with the knowledge or consent of the individual concerned.</p>
<p>Personal data should be relevant to the purposes for which it is to be used, and, to the extent necessary for those purposes, should be accurate, complete, and up-to-date.</p>
    <p>We will protect personal information by reasonable security safeguards against loss or theft, as well as unauthorized access, disclosure, copying, use or modification.</p>
<p>We will make readily available to customers information about our policies and practices relating to the management of personal information.</p>
<p>Make sure that we have right to check your all kind of informations provided by you must be true and documents must be unedited ( in any software) and clearly readable otherwise we have right to bane you and take action against you.</p>
<p>We are committed to conducting our business in accordance with these principles in order to ensure that the confidentiality of personal information is protected and maintained forexustaad.com. May change its Privacy Policy from time to time, and at forexustaad.com sole discretion.

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