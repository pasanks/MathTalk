@extends('frontend.FrontWeb.master')
@section('content')


    <!-- ================ contact section start ================= -->
    <section class="contact-section section_padding">
        <div class="container">



            <div class="row">
                <div class="col-12">
                    <h2 class="contact-title" align="center">Login</h2>
                </div>
                <div class="col-lg-6">
                    @include('includes.partials.messages')
                    <form   class="form-contact contact_form" method="POST" action="{{route('frontend.auth.login.post')}}" >

                        @csrf
{{--                    <form class="form-contact contact_form" action="contact_process.php" method="post" id="contactForm" novalidate="novalidate">--}}
                        <div class="row">

                            <div class="col-sm-10">
                                <div class="form-group">
                                    <input class="form-control" name="email" id="email" type="email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email'" placeholder = 'Email'>
                                </div>
                            </div>


                        </div>
                        <div class="row">
                        <div class="col-sm-10">
                            <div class="form-group">
                                <input class="form-control" name="password" id="password" type="password" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Password'" placeholder = 'Password'>
                            </div>
                        </div>
                </div>
                        <div class="form-group mt-3">

                            <button type="submit" class="button button-contactForm btn_1">Login</button>


                                <a href="{{route('frontend.registerView')}}"  class="button button-contactForm btn_1">Regitser</a>

                        </div>


                    </form>



{{--                        <button type="submit" class="button button-contactForm btn_1">Register</button>--}}


                </div>
                <div class="col-lg-6">
                    <div class="media contact-info">
                        <img src="{{ asset('FrontWeb/img/login.jpg') }}" alt="logo">
                    </div>
{{--                    <div class="media contact-info">--}}
{{--                        <span class="contact-info__icon"><i class="ti-tablet"></i></span>--}}
{{--                        <div class="media-body">--}}
{{--                            <h3>00 (440) 9865 562</h3>--}}
{{--                            <p>Mon to Fri 9am to 6pm</p>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="media contact-info">--}}
{{--                        <span class="contact-info__icon"><i class="ti-email"></i></span>--}}
{{--                        <div class="media-body">--}}
{{--                            <h3>support@colorlib.com</h3>--}}
{{--                            <p>Send us your query anytime!</p>--}}
{{--                        </div>--}}
{{--                    </div>--}}
                </div>
            </div>
        </div>
    </section>
    <!-- ================ contact section end ================= -->

@endsection
