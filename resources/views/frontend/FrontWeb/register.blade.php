@extends('frontend.FrontWeb.master')
@section('content')
    <!-- ================ contact section start ================= -->
    <section class="contact-section section_padding">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2 class="contact-title" align="center">Register</h2>
                </div>
                <div class="col-lg-6">
                    @include('includes.partials.messages')
                    <form   class="form-contact contact_form" method="POST" action="{{route('frontend.auth.register.post')}}" >
                        @csrf
                        <div class="row">
                            <div class="col-sm-5">
                                <div class="form-group">
                                    <input  type="text" class="form-control" name="first_name" id="first_name"
                                           onfocus="this.placeholder = ''" onblur="this.placeholder = 'First Name'"
                                            placeholder = 'First Name' required>
                                </div>
                            </div>

                            <div class="col-sm-5">
                                <div class="form-group">
                                    <input  type="text" class="form-control" name="last_name" id="last_name"
                                            onfocus="this.placeholder = ''" onblur="this.placeholder = 'Last Name'"
                                            placeholder = 'Last Name' required>
                                </div>
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-sm-10">
                                <div class="form-group">
                                    <input class="form-control" name="email" id="email" type="email"
                                           onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email'"
                                           placeholder = 'Email' required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-5">
                                <div class="form-group">
                                    <input class="form-control" name="password" id="password" type="password"
                                           onfocus="this.placeholder = ''" onblur="this.placeholder = 'Password'" placeholder = 'Password' required>
                                </div>
                            </div>
                            <div class="col-sm-5">
                                <div class="form-group">
                                    <input class="form-control" name="password_confirmation" id="password_confirmation" type="password"
                                           onfocus="this.placeholder = ''" onblur="this.placeholder = 'Password Confirmation'" placeholder = 'Password Confirmation' required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                             <div class="col-sm-10">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="contact_no" id="contact_no"
                                           onfocus="this.placeholder = ''" onblur="this.placeholder = 'Contact No'"
                                           placeholder = 'Contact No' required>
                                </div>
                            </div>
                        </div>



                        <div class="row">
                            <div class="col-sm-10">
                                <div class="form-group">
                                    <input  type="text" class="form-control" name="school" id="school"
                                            onfocus="this.placeholder = ''" onblur="this.placeholder = 'School'"
                                            placeholder = 'School' required>
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-sm-10">
                                <div class="form-group">
                                    <input  type="text" class="form-control" name="contact_address" id="contact_address"
                                            onfocus="this.placeholder = ''" onblur="this.placeholder = 'Contact Address'"
                                            placeholder = 'Contact Address' required>
                                </div>
                            </div>
                        </div>
                        @if(config('access.captcha.registration'))
                            <div class="row">
                                <div class="col">
                                    @captcha
                                    {{ html()->hidden('captcha_status', 'true') }}
                                </div><!--col-->
                            </div><!--row-->
                        @endif
                        <div class="form-group mt-3">

                            <button type="submit" class="button button-contactForm btn_1">Register</button>


{{--                            <a href="#"  class="button button-contactForm btn_1">Regitser</a>--}}

                        </div>


                    </form>



                    {{--                        <button type="submit" class="button button-contactForm btn_1">Register</button>--}}


                </div>
                <div class="col-lg-6">
                    <div class="media contact-info">
                        <img src="{{ asset('FrontWeb/img/register.png') }}" alt="logo">
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
