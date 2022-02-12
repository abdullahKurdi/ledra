@extends('layouts.app')
@section('content')
    <!-- Navbar section  -->
    <section id="navbar">
        <nav class="navbar navbar-expand-lg navbar-light">
            <a class="navbar-brand" href="#"><img src="{{asset('ledra_app/public/images/logo.png')}}"  alt="logo"></a>

                <span class="subtitle news" style="color: white;">

                        <div class="ticker container text-left">
                            <div class="ticker-animation">
                                <div class="ticker-item">
                                    We work with partners, not clients. And we take great pride on delivering great results for them, and we celebrate together always.

                                </div>

                            </div>
                        </div>
                    </span>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="#top"><i ></i>HOME</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#about">ABOUT US</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#team">OUR TEAM</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#value">OUR VALUES</a>
                    </li>
{{--                    <li class="nav-item">--}}
{{--                        <a class="nav-link" href="#purpose">OUR PURPOSE</a>--}}
{{--                    </li>--}}
                    <li class="nav-item">
                        <a class="nav-link" href="#service">OUR WORK</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#partner">OUR PARTNERS</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#footer">CONTACT US</a>
                    </li>
                </ul>
            </div>
        </nav>
    </section>

    <!-- Banner section -->
    <section id="banner">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <p class="promo-title">{{$home->title}}</p>
                    <p>{!! $home->description !!}</p>
                    <a href="#about">Read more</a>
                </div>
                <div class="col-md-6 text-center">
                    <img src="{{asset('ledra_app/public/images/logo.png')}}" alt="banner image" class="img-fluid">
                </div>
            </div>
        </div>
    </section>
    <img src="{{asset('ledra_app/public/images/headerWave.png')}}" alt="wave banner" class="img-botton">




    <!-- About section -->
    <section id="about">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h1 class="title">ABOUT US</h1>
                </div>
                <div class="col-12">
                    <h4 class="subtitle text-left mb-3">{{$about->description}}</h4>
                </div>
                @foreach($about->sections as $aboutSection)
                    <div class="col-md-6">
                        <p class="about-title">{{$aboutSection->title}}</p>
                        <ul>
                            <li>{{$aboutSection->description}}</li>
                        </ul>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- About team -->
    <section id="team">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h1 class="title">OUR TEAM</h1>
                </div>

                @foreach($services as $service)
                    <div class="col-md-4 mb-4">
                        <div class="card" style="width: 18rem;">
                            <img src="{{asset('ledra_app/public/images/'.$service->img)}}" class="card-img-top" alt="teams">
                            <div class="card-body">
                                <p class="card-text">{{$service->description}}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>


    <section id="value">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h1 class="title">OUR VALUES</h1>
                </div>
                @foreach($values as $value)
                    <div class="col-md-6">
                        <p class="about-title">{{$value->title}}</p>
                        <ul>
                            <li>{{$value->description}}</li>
                        </ul>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <section id="purpose">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h1 class="title">OUR PURPOSE</h1>
                </div>
                @foreach($purposes as $purpose)
                    <div class="col-md-12">
                        <p class="about-title">{{$purpose->title}}</p>
                        <ul>
                            <li>{{$purpose->description}}</li>
                        </ul>
                    </div>
                @endforeach

            </div>
        </div>
    </section>
    <section id="service">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h1 class="title">OUR WORK</h1>
                </div>
                <div class="col-12">
                        <h4 class="subtitle text-left mb-3">{{$work->description}}</h4>
                </div>
                @foreach($worksSections as $worksSection)
                    <div class="col-md-6">
                        <p class="about-title">{{$worksSection->title}}</p>
                        <ul>
                            @foreach($worksSection->lists as $list)
                                <li>{{$list->description}}</li>
                            @endforeach
                        </ul>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Partners section -->
    <section id="partner">

        <div class="container">
            <div class="text-center">
                <h1 class="title">OUR PARTNERS</h1>
            </div>
            <div class="brand-carousel section-padding owl-carousel">
                @foreach($partners as $partner)
                    <div class="single-logo">
                        <img src="{{asset('ledra_app/public/images/'.$partner->img)}}" alt="{{$partner->name}}">
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Social media section -->
    <!--<section id="social-media">-->
    <!--    <div class="container text-center">-->
    <!--        <p>FIND US ON SOCIAL MEDIA</p>-->
    <!--        <div class="social-icons">-->
    <!--            @if($social->facebook)-->
    <!--            <a href="{{$social->facebook}}"><img src="{{asset('ledra_app/public/images/facebook-icon.png')}}" alt="facebook"></a>-->
    <!--            @endif-->
    <!--            @if($social->instagram)-->
    <!--            <a href="{{$social->instagram}}"><img src="{{asset('ledra_app/public/images/instagram-icon.png')}}" alt="instagram"></a>-->
    <!--            @endif-->
    <!--            @if($social->twitter)-->
    <!--            <a href="{{$social->twitter}}"><img src="{{asset('ledra_app/public/images/twitter-icon.png')}}" alt="twitter"></a>-->
    <!--            @endif-->
    <!--            @if($social->whatsapp)-->
    <!--            <a href="{{$social->whatsapp}}"><img src="{{asset('ledra_app/public/images/whatsapp-icon.png')}}" alt="whatsapp"></a>-->
    <!--            @endif-->
    <!--            @if($social->linkedin)-->
    <!--            <a href="{{$social->linkedin}}"><img src="{{asset('ledra_app/public/images/linkedin-icon.png')}}" alt="linkedin"></a>-->
    <!--            @endif-->
    <!--            @if($social->snapchat)-->
    <!--            <a href="{{$social->snapchat}}"><img src="{{asset('ledra_app/public/images/snapchat-icon.png')}}" alt="snapchat"></a>-->
    <!--            @endif-->
    <!--        </div>-->
    <!--    </div>-->
    <!--</section>-->

    <!-- footer section -->
    <img src="{{asset('ledra_app/public/images/footerWave.png')}}" alt="wave" class="img-footer">
    <section id="footer">

        <div class="container">
            <div class="row">
                <div class="col-12 footer-box mb-3">
                    <img src="{{asset('ledra_app/public/images/logo.png')}}"  alt="logo"> <span><b>CONTACT US</b></span>
                </div>
                <div class="col-md-6 footer-box">
                    <p ><i class="fa fa-map-marker"></i> {{$contact->address}}</p>
                    <p><i class="fa fa-phone"></i> {{$contact->phone}}</p>
                    <p><i class="fa fa-envelope"></i> {{$contact->email}}</p>
                </div>
                <div class="col-md-6 footer-box">
                    <!--<iframe-->
                    <!--    width="100%"-->
                    <!--    height="100%"-->
                    <!--    frameborder="0" style="border:0"-->
                <!--    src="https://www.google.com/maps/embed/v1/place?key=AIzaSyCoMUMXpkoIbQxie7ctqYsyH7RkAWkpHro&q={{$contact->latitude}},{{$contact->longitude}}" allowfullscreen>-->
                    <!--</iframe>-->

                    <!-- Social media section -->
                    <section id="social-media">
                        <div class="container text-center">
                            <p>FIND US ON SOCIAL MEDIA</p>
                            <div class="social-icons">
                                @if($social->facebook)
                                    <a href="{{$social->facebook}}"><img src="{{asset('ledra_app/public/images/facebook-icon.png')}}" alt="facebook"></a>
                                @endif
                                @if($social->instagram)
                                    <a href="{{$social->instagram}}"><img src="{{asset('ledra_app/public/images/instagram-icon.png')}}" alt="instagram"></a>
                                @endif
                                @if($social->twitter)
                                    <a href="{{$social->twitter}}"><img src="{{asset('ledra_app/public/images/twitter-icon.png')}}" alt="twitter"></a>
                                @endif
                                @if($social->whatsapp)
                                    <a href="{{$social->whatsapp}}"><img src="{{asset('ledra_app/public/images/whatsapp-icon.png')}}" alt="whatsapp"></a>
                                @endif
                                @if($social->linkedin)
                                    <a href="{{$social->linkedin}}"><img src="{{asset('ledra_app/public/images/linkedin-icon.png')}}" alt="linkedin"></a>
                                @endif
                                @if($social->snapchat)
                                    <a href="{{$social->snapchat}}"><img src="{{asset('ledra_app/public/images/snapchat-icon.png')}}" alt="snapchat"></a>
                                @endif
                            </div>
                        </div>
                    </section>
                </div>
                <div class="col-md-12 footer-botton">
                    <hr>
                    <div class="copy-right">&copy;Copyright 2021 <a href="http://www.potato-media.com">Potato Media</a></div>
                </div>
            </div>
        </div>
    </section>
@endsection
