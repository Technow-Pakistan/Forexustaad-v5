@include('inc.header')
        <!-- Content Area -->
        <div class="content_area">
    <section class="after_banner_content_area">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-3 col-md-6 col-sm-12 order-2 order-lg-1">
                @include('inc.home-left-sidebar')
                </div>
                <div class="col-lg-6 col-md-12 order-1 order-lg-2">
                    <div class="family">
                                        <div>
                                            <h4>{{$BlogDetail->mainTitle}}</h4>
                                        </div>
                                        <div class="post_representor">
                                            <ul class="">
                                                <li><i class="fa fa-user"></i> Raheel Nawaz</li>
                                                <li><i class="fa fa-clock-o"></i> {{$BlogDetail->publishDate}}</li>
                                                <li><i class="fa fa-folder"></i> Forex Education</li>
                                                <!-- <li><i class="fa fa-comments"></i> 8 Comments </li>
                                                <li><i class="fa fa-eye"></i> 4,106 Views</li> -->
                                            </ul>
                                        </div>
                                        
                                        <div>
                                            <img src="{{URL::to('storage/app')}}/{{$BlogDetail->image}}" class="img-fluid pt-3">
                                        </div>
                                        <div class="pt-3">
                                            @php 
                                                $Description = html_entity_decode($BlogDetail->detailDescription);
                                                echo $Description;
                                            @endphp
                                        </div>
                                        <!-- <div class="pt-3">
                                            <p>
                                                Mr Raheel Nawaz “The CEO of Forexustaad.com” organized an event about opening of his dream and milestone software house name as TECHNOW the technology hub.
                                            </p>
                                            
                                           <p>
                                                This event was organized in “ The city of Eagles” Gujranwala (Pakistan).
                                            In this event Raheel Nawaz explained about TECHNOW what the TECHNOW basic is what services TECHNOW is going to offer to people. These services are
                                           </p>
                                            
                                            <div>
                                                <ul>
                                                <li>
                                                    <h4>
                                                        Website development
                                                    </h4>
                                                </li>
                                                <ol>
                                                    <li> E-commerce</li>
                                                    <li> Customer Relationship Management solutions</li>
                                                    <li> Web Design</li>
                                                    <li> Web App</li>
                                                </ol>
                                                <li>
                                                    <h4>
                                                        Software development
                                                    </h4>
                                                </li>
                                                <ol>
                                                    <li> Application development and integration</li>
                                                    <li> Data Modelling and Data Migrations</li>
                                                    <li> Mobile Application development</li>
                                                    <li> Cloud base SAAS Applications</li>
                                                </ol>
                                                <li>
                                                    <h4>
                                                        Web hosting
                                                    </h4>
                                                </li>
                                                <li>
                                                    <h4>
                                                        E-Marketing Solutions
                                                    </h4>
                                                </li>
                                                <li>
                                                    <h4>
                                                        Career & Business Consulting
                                                    </h4>
                                                </li>
                                                <li>
                                                    <h4>
                                                        Professional Trainings
                                                    </h4>
                                                </li>
                                                <ol>
                                                    <li> Earn From Internet</li>
                                                    <li> Forex Training</li>
                                                    <li> Website Development</li>
                                                    <li> Software Development</li>
                                                    <li> Andrid Application Development</li>
                                                </ol>
                                            </ul>
                                            </div>
                                            
                                            <p>
                                                He explained need of all these services like why a business Website, Software, Web hosting, E Marketing and Professional training one by one. In Professional training session he has explained “what is Forex Trading ?” “How can they do Forex Trading?” The source person Mr Raheel Nawaz told the audience about the advantages of Forex trading. The beginning procedure was told them in such a way that most of the people who were not knew “Forex” before it, learnt it and understood it very easily.
                                            </p>
                                            
                                            <p>
                                                It was a detailed sessions about Forex by comparing it with real market business. There was a light atmosphere ,where there every one was in a passion to learn. After the completion of presentation there was been given an opportunity to open a bonus account. With the opening of this account people got $30 as a gift from Raheel Nawaz. Also he had given discounts on his all services. There were a lot of gifts such as T-Shirts, notepads, pens etc. and a he also launch a 1 month free course “How to earn money through Internet” After this learning full session people take a delicious lunch, with many kinds of food. And in this way, Mr Raheel Nawaz made the day of audience. It was not only a Learning session but a get-together , a gift day and a Bonus Party.
                                            </p>
                                            
                                            <p>
                                                But He has not forget his ONLINE followers in his this pleasure he does not gave hard form bonuses to you but you can get $30 Bonus in a week after registration.
                                            </p>
                                           
                                            <div class="border">
                                                <iframe width="100%" height="315" src="https://www.youtube.com/embed/wImaWcqB1GM" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                            </div>
                                            
                                        </div> -->
                                        @if($BlogDetail->comment == 1)
                                            <div class="pt-5">
                                                <div class="totalcom">
                                                    <h6>{{count($totalComments)}} Comments</h6>
                                                </div>
                                                <div class="pt-3 border">
                                                    <ol class="commentsection p-0">
                                                        @php $ij = 1 @endphp
                                                        @foreach($totalComments as $comment)
                                                            @php
                                                                $replies = $comment->GetReplies();
                                                            @endphp
                                                            @if($ij != 1) 
                                                                <hr> 
                                                            @endif
                                                            <li>
                                                                <div class="comentmain container-fluid">
                                                                    <div class=" row">
                                                                        <div class="col-md-2">
                                                                            <div>
                                                                                <div class="comment_avatar">
                                                                                    @if($comment->image != null)
                                                                                        <img src="{{URL::to('storage/app')}}/{{$comment->image}}" class="img-fluid borderRadius80">
                                                                                    @else
                                                                                        <img src="https://icon-library.net/images/avatar-icon-png/avatar-icon-png-8.jpg" class="img-fluid ">
                                                                                    @endif
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-10">
                                                                            <div>
                                                                                <div class="comment_author clearfix">
                                                                                    <h5 class="float-left">{{$comment->name}}</h5>
                                                                                    <p class="float-right commenttime">
                                                                                        {{$comment->created_at->format("M d, Y")}} at {{$comment->created_at->format("H:i a")}}
                                                                                    </p>
                                                                                </div>
                                                                                <div class="comment_details">
                                                                                    <p>{{$comment->message}}</p>
                                                                                </div>
                                                                                <!-- <div class="d-flex justify-content-end">
                                                                                    <i class="fa fa-heart-o mr-3"></i>
                                                                                    <i class="fa fa-reply replybox"></i>
                                                                                </div> -->
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    @foreach($replies as $reply)
                                                                        <hr>
                                                                        <ul class="child-comment">
                                                                            <li class="p-3 ">
                                                                                <div class=" row">
                                                                                    <div class="col-md-2">
                                                                                        <div>
                                                                                            <div class="comment_avatar">
                                                                                                <img src="https://icon-library.net/images/avatar-icon-png/avatar-icon-png-8.jpg" class="img-fluid ">
                                                                                                
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-md-10">
                                                                                        <div>
                                                                                            <div class="comment_author clearfix">
                                                                                                <h5 class="float-left">Forexustaad </h5>
                                                                                                <p class="float-right commenttime">
                                                                                                    {{$reply->created_at->format("M d, Y")}} at {{$reply->created_at->format("H:i a")}}
                                                                                                </p>
                                                                                            </div>
                                                                                            <div class="comment_details">
                                                                                                <p>{{$reply->message}}</p>
                                                                                            </div>
                                                                                            <!-- <div class="d-flex justify-content-end">
                                                                                                <i class="fa fa-heart-o mr-3"></i>
                                                                                                <i class="fa fa-reply replybox"></i>
                                                                                            </div> -->
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </li>
                                                                        </ul>
                                                                    @endforeach
                                                                </div>
                                                            </li>
                                                            @php $ij++ @endphp
                                                        @endforeach
                                                        <!-- <hr>
                                                        <li>
                                                            <div class="comentmain container-fluid">
                                                                <div class=" row">
                                                                    <div class="col-md-2">
                                                                        <div>
                                                                            <div class="comment_avatar">
                                                                                <img src="https://icon-library.net/images/avatar-icon-png/avatar-icon-png-8.jpg" class="img-fluid ">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-10">
                                                                        <div>
                                                                            <div class="comment_author clearfix">
                                                                                <h5 class="float-left">Raheel Nawaz</h5>
                                                                                <p class="float-right commenttime">
                                                                                    September 2, 2015 at 1:04 pm
                                                                                </p>
                                                                            </div>
                                                                            <div class="comment_details">
                                                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                                                                    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                                                                    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                                                                                    conseq.</p>
                                                                            </div>
                                                                            <div class="d-flex justify-content-end">
                                                                                <i class="fa fa-heart-o mr-3"></i>
                                                                                <i class="fa fa-reply replybox"></i>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <hr>
                                                                <ul class="child-comment">
                                                                    <li class="p-3 ">
                                                                        <div class=" row">
                                                                            <div class="col-md-2">
                                                                                <div>
                                                                                    <div class="comment_avatar">
                                                                                        <img src="https://icon-library.net/images/avatar-icon-png/avatar-icon-png-8.jpg" class="img-fluid ">
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-10">
                                                                                <div>
                                                                                    <div class="comment_author clearfix">
                                                                                        <h5 class="float-left">Raheel Nawaz</h5>
                                                                                        <p class="float-right commenttime">
                                                                                            September 2, 2015 at 1:04 pm
                                                                                        </p>
                                                                                    </div>
                                                                                    <div class="comment_details">
                                                                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                                                                            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam</p>
                                                                                    </div>
                                                                                    <div class="d-flex justify-content-end">
                                                                                        <i class="fa fa-heart-o mr-3"></i>
                                                                                        <i class="fa fa-reply replybox"></i>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </li> -->
                                                    
                                                    </ol>
                                                </div>
                                            </div>
                                            <div class=" pt-5">
                                                <div class="shadow p-5">
                                                    <div class="text-center">
                                                        <h4>Leave A Reply</h4>
                                                        <p>Your email address will not be published. Required fields are marked *</p>
                                                    </div>
                                                    <div class="pt-3  container-fluid">
                                                        <form action="{{URL::to('/admin/comment')}}" method="post" enctype="multipart/form-data">
                                                            <div class="row">
                                                                <div class="col-md-6 ">
                                                                    <div class="form-group">
                                                                        <label for="exampleInputEmail1"></label>
                                                                        <input type="mail" name="name" class="form-control form-input" id="exampleInputPassword1" placeholder="Name" required>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6 ">
                                                                    <div class="form-group">
                                                                        <label for="exampleInputPassword1"></label>
                                                                        <input type="mail" name="email" class="form-control form-input" id="exampleInputPassword1" placeholder="Enter email" required>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <input type="file" name="file_photo" id="" class="form-control h-100">
                                                            <textarea class="form-control mt-2" name="message" placeholder="Messeage" rows="5" required></textarea>
                                                            <input type="hidden" name="blogPostId" value="{{$BlogDetail->id}}">
                                                            <button type="submit" class="btn btn-primary mb-4 mt-3">Submit</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-sm-12 order-3 order-lg-3">
                @include('inc.home-right-sidebar')

                </div>
            </div>
        </div>
    </section>

<!--     <div id="particles-js" style="height: 0;"></div> -->
</div>
<style>
    .borderRadius80{
        border-radius: 80px;
    }
</style>

@include('inc.footer')





