<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- <link rel="shortcut icon" href="images/star.png" type="favicon/ico" /> -->

    <title>Ganesh Khadka - Web developer from Nepal</title>

    <link rel="stylesheet" href="{{asset('frontend/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/owl.carousel.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/owl.theme.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/animate.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/flexslider.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/pricing.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/main.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/bootstrap-datetimepicker.min.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

    <style>
        @foreach($sliders as $key=>$slider)
        .owl-carousel .owl-wrapper, .owl-carousel .owl-item:nth-child({{$key + 1}}) .item
        {
            background: url({{asset('uploads/slider/'.$slider->image)}});
            background-size: cover;
        }
        @endforeach
    </style>


    <script src="{{asset('frontend/js/jquery-1.11.2.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('frontend/js/jquery.flexslider.min.js')}}"></script>
    <script type="text/javascript">
        $(window).load(function() {
            $('.flexslider').flexslider({
                animation: "slide",
                controlsContainer: ".flexslider-container"
            });
        });
    </script>

    {{--<script src="https://maps.googleapis.com/maps/api/js"></script>--}}
    {{--<script>--}}
        {{--function initialize() {--}}
            {{--var mapCanvas = document.getElementById('map-canvas');--}}
            {{--var mapOptions = {--}}
                {{--center: new google.maps.LatLng(24.909439, 91.833800),--}}
                {{--zoom: 16,--}}
                {{--scrollwheel: false,--}}
                {{--mapTypeId: google.maps.MapTypeId.ROADMAP--}}
            {{--}--}}
            {{--var map = new google.maps.Map(mapCanvas, mapOptions)--}}

            {{--var marker = new google.maps.Marker({--}}
                {{--position: new google.maps.LatLng(24.909439, 91.833800),--}}
                {{--title:"Mamma's Kitchen Restaurant"--}}
            {{--});--}}

            {{--// To add the marker to the map, call setMap();--}}
            {{--marker.setMap(map);--}}
        {{--}--}}
        {{--google.maps.event.addDomListener(window, 'load', initialize);--}}
    {{--</script>--}}


</head>
<body data-spy="scroll" data-target="#template-navbar">

<!--== 4. Navigation ==-->
<nav id="template-navbar" class="navbar navbar-default custom-navbar-default navbar-fixed-top">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#Food-fair-toggle">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">
                <img id="logo" src="{{asset('frontend/images/Logo_main.png')}}" class="logo img-responsive">
            </a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="Food-fair-toggle">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="#about">about</a></li>
                <li><a href="#portfolio">portfolio</a></li>
                <li><a href="#request-project">Request Project</a></li>
                <li><a href="#contact">contact</a></li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.row -->
</nav>


<!--== 5. Header ==-->
<section id="header-slider" class="owl-carousel">
    @foreach($sliders as $key=>$slider)
        <div class="item">
            <div class="container">
                <div class="header-content">
                    <h1 class="header-title">{{$slider->title}}</h1>
                    <p class="header-sub-title">{{$slider->sub_title}}</p>
                </div> <!-- /.header-content -->
            </div>
        </div>
    @endforeach
</section>



<!--== 6. About us ==-->
<section id="about" class="about">
    <img src="{{asset('frontend/images/icons/about_color.png')}}" class="img-responsive section-icon hidden-sm hidden-xs">
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row dis-table">
                <div class="hidden-xs col-sm-6 section-bg about-bg dis-table-cell">

                </div>
                <div class="col-xs-12 col-sm-6 dis-table-cell">
                    <div class="section-content">
                        <h2 class="section-content-title">About us</h2>
                        <p class="section-content-para">
                            Astronomy compels the soul to look upward, and leads us from this world to another.  Curious that we spend more time congratulating people who have succeeded than encouraging people who have not. As we got further and further away, it [the Earth] diminished in size.
                        </p>
                        <p class="section-content-para">
                            beautiful, warm, living object looked so fragile, so delicate, that if you touched it with a finger it would crumble and fall apart. Seeing this has to change a man.  Where ignorance lurks, so too do the frontiers of discovery and imagination.
                        </p>
                    </div> <!-- /.section-content -->
                </div>
            </div> <!-- /.row -->
        </div> <!-- /.container-fluid -->
    </div> <!-- /.wrapper -->
</section> <!-- /#about -->


<!--==  7. Portfolio  ==-->
<section id="portfolio" class="portfolio">
    <div id="w">
        <div class="pricing-filter">
            <div class="pricing-filter-wrapper">
                <div class="container">
                    <div class="row">
                        <div class="col-md-10 col-md-offset-1">
                            <div class="section-header">
                                <h2 class="pricing-title">My Portfolio</h2>
                                <ul id="filter-list" class="clearfix">
                                    <li class="filter" data-filter="all">All</li>
                                    @foreach($categories as $category)
                                        <li class="filter" data-filter="#{{ $category->slug }}">{{ $category->name }} <span class="badge">{{ $category->projects->count() }}</span></li>
                                    @endforeach
                                </ul><!-- @end #filter-list -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <ul id="menu-pricing" class="menu-price">


                        @foreach($projects as $project)

                            <li class="item" id="{{ $project->category->slug }}">
                                <a href="#">
                                    <img src="{{asset('uploads/project/'.$project->image)}}" class="img-responsive" alt="Project" style="height: 280px; width: 300px;" >
                                    <div class="menu-desc text-center">
                                            <span>
                                                <h3>{{ $project->name }}</h3>
                                                {{ $project -> description }}
                                            </span>
                                    </div>
                                </a>
                                <h2 class="white" style="height: 150px;width: 60px;">{{$project->name}}</h2>
                            </li>

                        @endforeach

                    </ul>

                    <!-- <div class="text-center">
                            <a id="loadPricingContent" class="btn btn-middle hidden-sm hidden-xs">Load More <span class="caret"></span></a>
                    </div> -->

                </div>
            </div>
        </div>

    </div>
</section>


<!--== 15. Request A Project! ==-->
<section id="request-project" class="request-project">
    <img class="img-responsive section-icon hidden-sm hidden-xs" src="{{asset('frontend/images/icons/reserve_black.png')}}">
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row dis-table">
                <div class="col-xs-6 col-sm-6 dis-table-cell color-bg">
                    <h2 class="section-title">Request A Project !</h2>
                </div>
                <div class="col-xs-6 col-sm-6 dis-table-cell section-bg">

                </div>
            </div> <!-- /.dis-table -->
        </div> <!-- /.row -->
    </div> <!-- /.wrapper -->
</section> <!-- /#reserve -->



<section class="reservation">
    <img class="img-responsive section-icon hidden-sm hidden-xs" src="{{asset('frontend/images/icons/reserve_color.png')}}">
    <div class="wrapper">
        <div class="container-fluid">
            <div class=" section-content">
                <div class="row">
                    <div class="col-md-5 col-sm-6">
                        <form class="reservation-form" method="post" action="{{ route('request.project') }}">
                            @csrf
                            <div class="row">
                                <div class="col-md-6 col-sm-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control reserve-form empty iconified" name="name" required="required" id="name" placeholder="  &#xf007;  Name">
                                    </div>
                                    <div class="form-group">
                                        <input type="email" name="email" class="form-control reserve-form empty iconified" required="required" id="email" placeholder="  &#xf1d8;  e-mail">
                                    </div>
                                </div>

                                <div class="col-md-6 col-sm-6">
                                    <div class="form-group">
                                        <input type="tel" class="form-control reserve-form empty iconified" name="phone" required="required" id="phone" placeholder="  &#xf095;  Phone">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control reserve-form empty iconified" name="dateandtime" required="required" id="datepicker" placeholder="&#xf017;  Time">
                                    </div>
                                </div>

                                <div class="col-md-12 col-sm-12">
                                    <input type="price" class="form-control reserve-form empty iconified" name="budget" required="required" id="budget" placeholder="  &#xf156; Expected Budget">
                                </div>

                                <div class="col-md-12 col-sm-12">
                                    <textarea type="text" name="requirement" class="form-control reserve-form empty iconified" id="requirement" required="required" rows="3" placeholder="  &#xf086;  Project Requirements"></textarea>
                                </div>

                                <div class="col-md-12 col-sm-12">
                                    <button type="submit" id="submit" name="submit" class="btn btn-reservation">
                                        <span><i class="fa fa-check-circle-o"></i></span>
                                        Request a Project
                                    </button>
                                </div>

                            </div>
                        </form>
                    </div>

                    <div class="col-md-2 hidden-sm hidden-xs"></div>

                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <div class="opening-time">
                            <h3 class="opening-time-title">Hire me</h3>
                            <li>Available for part-time job</li>
                            <li>Available for team work</li>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>




<section id="contact" class="contact">
    <div class="container-fluid color-bg">
        <div class="row dis-table">
            <div class="hidden-xs col-sm-6 dis-table-cell">
                <h2 class="section-title">Contact With us</h2>
            </div>
            <div class="col-xs-6 col-sm-6 dis-table-cell">
                <div class="section-content">
                    <p>Suddhodhan Gaupalika,Namuna Tole,Ward no:2,</p>
                    <strong>Rupandehi,Nepal</strong><br>
                    <strong>+977 9866567794</strong>
                    <p>ganeshkhadka46@mail.com </p>
                </div>
            </div>
        </div>
        <div class="social-media">
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <ul class="center-block">
                        <li><a href="https://www.facebook.com/ganeshkhadka46" target="_blank" class="fb"></a></li>
                        <li><a href="https://twitter.com/ganeshkhadka46" target="_blank" class="twit"></a></li>
                        <li><a href="https://aboutme.google.com/u/0/?referer=gplus" target="_blank" class="g-plus"></a></li>
                        <li><a href="https://www.linkedin.com/in/ganeshkhadka/" target="_blank" class="link"></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

{{--<div class="container-fluid">--}}
    {{--<div class="row">--}}
        {{--<div id="map-canvas"></div>--}}
    {{--</div>--}}
{{--</div>--}}
{{--<div class="google-map-area">--}}
    {{--<!--  Map Section -->--}}
    {{--<div id="contacts" class="map-area">--}}
        {{--<div  style="width:100%;height:485px;filter: grayscale(100%);-webkit-filter: grayscale(100%);">--}}
            {{--<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d5943.694205412088!2d83.53441297982995!3d27.651086723378974!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x399683ba6d7cdc79%3A0xb0796df18000210e!2sDevdaha+Medical+College+%26+Research+Institute+Pvt.+Ltd!5e0!3m2!1sen!2snp!4v1552828033998" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>--}}
        {{--</div>--}}
    {{--</div>--}}
{{--</div>--}}

<div style="width: 100%"><iframe width="100%" height="600" src="https://maps.google.com/maps?width=100%&amp;height=600&amp;hl=en&amp;coord=27.64618115,83.36609180272863&amp;q=Khadwa%20bandai%2CHirapur+(My%20Business%20Name)&amp;ie=UTF8&amp;t=&amp;z=12&amp;iwloc=B&amp;output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0">
        <a href="https://www.maps.ie/coordinates.html">find my coordinates</a>
    </iframe>
</div>
<br />



<section class="contact-form">
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1 col-sm-10 col-sm-offset-1">
                <div class="row">
                    <form class="contact-form" method="post" action="{{route('contact.send')}}">
                           @csrf
                        <div class="col-md-6 col-sm-6">
                            <div class="form-group">
                                <input  name="name" type="text" class="form-control" id="name" required="required" placeholder="  Name">
                            </div>
                            <div class="form-group">
                                <input name="email" type="email" class="form-control" id="email" required="required" placeholder="  Email">
                            </div>
                            <div class="form-group">
                                <input name="subject" type="text" class="form-control" id="subject" required="required" placeholder="  Subject">
                            </div>
                        </div>

                        <div class="col-md-6 col-sm-6">
                            <textarea name="message" type="text" class="form-control" id="message" rows="7" required="required" placeholder="  Message"></textarea>
                        </div>

                        <div class="col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3">
                            <div class="text-center">
                                <button type="submit" id="submit" name="submit" class="btn btn-send">Send </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>


<footer>
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="copyright text-center">
                    <p>
                        &copy; Copyright, 2019 <a href="http://ganesh-khadka.com.np/" target="_blank">Ganesh Khadka.</a> All right reserved.
                    </p>
                </div>
            </div>
        </div>
    </div>
</footer>


<script src="{{asset('frontend/js/bootstrap.min.js')}}"></script>
<script src="{{asset('frontend/js/owl.carousel.min.js')}}"></script>
<script type="text/javascript" src="{{asset('frontend/js/jquery.mixitup.min.js')}}" ></script>
<script src="{{asset('frontend/js/wow.min.js')}}"></script>
<script src="{{asset('frontend/js/jquery.validate.js')}}"></script>
<script type="text/javascript" src="{{asset('frontend/js/jquery.hoverdir.js')}}"></script>
<script type="text/javascript" src="{{asset('frontend/js/jQuery.scrollSpeed.js')}}"></script>
<script src="{{asset('frontend/js/script.js')}}"></script>
<script src="{{asset('frontend/js/bootstrap-datetimepicker.min.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

{{--@if ($errors->any())--}}
    {{--@foreach ($errors->all() as $error)--}}
        {{--<script>--}}
            {{--toastr.error('{{ $error }}');--}}
        {{--</script>--}}
    {{--@endforeach--}}
{{--@endif--}}

<script>
    $('#datepicker').datetimepicker({
       format: "dd MM yyyy - HH:ii P",
        showMeridian:true,
        autoclose:true,
        todayBtn:true,
    });
</script>

{!! Toastr::message() !!}
</body>
</html>