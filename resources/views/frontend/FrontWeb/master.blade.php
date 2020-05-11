<!doctype html>
<html lang="en">

@include('frontend.FrontWeb.Includes.header')

<body>
<!--::header part start::-->
<header class="main_menu home_menu">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-12">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <a class="navbar-brand" href="index.html"> <img src="{{ asset('FrontWeb/img/logo.png') }}" alt="logo"> </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse"
                            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse main-menu-item justify-content-end"
                         id="navbarSupportedContent">
                        <ul class="navbar-nav align-items-center">
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('frontend.index')}}">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link"  href="{{route('frontend.about')}}">About</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('frontend.courses')}}">Classes</a>

                            </li>
{{--                            <li class="nav-item">--}}
{{--                                <a class="nav-link" href="blog.html">Blog</a>--}}
{{--                            </li>--}}
{{--                            <li class="nav-item dropdown">--}}
{{--                                <a class="nav-link dropdown-toggle" href="blog.html" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">--}}
{{--                                    Pages--}}
{{--                                </a>--}}
{{--                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">--}}
{{--                                    <a class="dropdown-item" href="single-blog.html">Single blog</a>--}}
{{--                                    <a class="dropdown-item" href="elements.html">Elements</a>--}}
{{--                                </div>--}}
{{--                            </li>--}}
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('frontend.contactus')}}">Contact</a>
                            </li>
                            @guest
                            <li class="nav-item d-lg-block">
                                <a class="nav-link btn_1" href="{{route('frontend.loginView')}}">Login</a>
                            </li>
                            @else

                                <li class="nav-item dropdown">
{{--                                    <a class="nav-link dropdown-toggle" href="blog.html" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">--}}
                                    <a class="nav-link btn_1" href="#">{{$logged_in_user->name}}</a>
{{--                                    </a>--}}
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{route('frontend.user.dashboard')}}">dashboard</a>
                                        <a class="dropdown-item" href="{{route('frontend.auth.logout')}}">Logout</a>

                                    </div>
                                </li>
{{--                                <li class="nav-item d-lg-block">--}}
{{--                                    <a class="nav-link btn_1" href="{{route('frontend.auth.logout')}}">Logout</a>--}}
{{--                                </li>--}}


                            @endguest
{{--                            <li class="d-none d-lg-block">--}}
{{--                                <a class="btn_1" href="{{route('frontend.loginView')}}">Login</a>--}}
{{--                            </li>--}}
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
    </div>
</header>
<!-- Header part end-->
{{ script("FrontWeb/js/jquery-1.12.1.min.js") }}
@yield('content')


<!-- footer part start-->
<footer class="footer-area">
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-sm-6 col-md-4 col-xl-3">
                <div class="single-footer-widget footer_1">
                    <a href="index.html"> <img  src="{{ asset('FrontWeb/img/logo.png') }}" alt=""> </a>

                    <p>We’re an organization with the incentive to teach Mathematics to students from grade 6 to upwards
                        till Advanced Level Examination, covering both London and Local syllabi. </p>
{{--                    <p>But when shot real her hamber her </p>--}}
                </div>
            </div>
            <div class="col-sm-6 col-md-4 col-xl-4">
                <div class="single-footer-widget footer_2">
                    <h4>Newsletter</h4>
                    <p>Stay updated with our latest trends Seed heaven so said place winged over given forth fruit.
                    </p>
                    <form action="#">
                        <div class="form-group">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder='Enter email address'
                                       onfocus="this.placeholder = ''"
                                       onblur="this.placeholder = 'Enter email address'">
                                <div class="input-group-append">
                                    <button class="btn btn_1" type="button"><i class="ti-angle-right"></i></button>
                                </div>
                            </div>
                        </div>
                    </form>
                    <div class="social_icon">
                        <a href="https://www.facebook.com/Themathtalk-105877341122511/" target="_blank"> <i class="ti-facebook"></i> </a>
{{--                        <a href="#"> <i class="ti-twitter-alt"></i> </a>--}}
{{--                        <a href="#"> <i class="ti-instagram"></i> </a>--}}
{{--                        <a href="#"> <i class="ti-skype"></i> </a>--}}
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 col-md-4">
                <div class="single-footer-widget footer_2">
                    <h4>Contact us</h4>
                    <div class="contact_info">
{{--                        <p><span> Address :</span> Hath of it fly signs bear be one blessed after </p>--}}
                        <p><span> Phone :</span> +94 71 977 2151</p>
                        <p><span> Email : </span>hello@themathtalk.com </p>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="copyright_part_text text-center">
                    <div class="row">
                        <div class="col-lg-12">
                            <p class="footer-text m-0"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                                Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | Made with <i class="ti-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
                                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- footer part end-->

<!-- jquery plugins here-->
<!-- jquery -->
{{--    <script src="js/jquery-1.12.1.min.js"></script>--}}

<!-- popper js -->
{{--    <script src="js/popper.min.js"></script>--}}
{{ script("FrontWeb/js/popper.min.js") }}
<!-- bootstrap js -->
{{--    <script src="js/bootstrap.min.js"></script>--}}
{{ script("FrontWeb/js/bootstrap.min.js") }}
<!-- easing js -->
{{--    <script src="js/jquery.magnific-popup.js"></script>--}}
{{ script("FrontWeb/js/jquery.magnific-popup.js") }}
<!-- swiper js -->
{{--    <script src="js/swiper.min.js"></script>--}}
{{ script("FrontWeb/js/swiper.min.js") }}
<!-- swiper js -->
{{--    <script src="js/masonry.pkgd.js"></script>--}}
{{ script("FrontWeb/js/masonry.pkgd.js") }}
<!-- particles js -->
{{--    <script src="js/owl.carousel.min.js"></script>--}}
{{ script("FrontWeb/js/owl.carousel.min.js") }}
{{--    <script src="js/jquery.nice-select.min.js"></script>--}}
{{ script("FrontWeb/js/jquery.nice-select.min.js") }}
<!-- swiper js -->
{{--    <script src="js/slick.min.js"></script>--}}
{{ script("FrontWeb/js/slick.min.js") }}
{{--    <script src="js/jquery.counterup.min.js"></script>--}}
{{ script("FrontWeb/js/jquery.counterup.min.js") }}
{{--    <script src="js/waypoints.min.js"></script>--}}
{{ script("FrontWeb/js/waypoints.min.js") }}
<!-- custom js -->
{{--    <script src="js/custom.js"></script>--}}
{{ script("FrontWeb/js/custom.js") }}
</body>

</html>
