@extends('frontend.FrontWeb.master')



@section('content')

    <!-- breadcrumb start-->
    <section class="breadcrumb breadcrumb_bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb_iner text-center">
                        <div class="breadcrumb_iner_item">
                            <h2>About Us</h2>
                            <p>Home<span>/</span>About Us</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb start-->


    <!-- learning part start-->
    <section class="learning_part">
        <div class="container">
            <div class="row align-items-sm-center align-items-lg-stretch">
                <div class="col-md-7 col-lg-7">
                    <div class="learning_img">
                        <img src="{{ asset('FrontWeb/img/learning_img.png') }}" alt="">
                    </div>
                </div>
                <div class="col-md-5 col-lg-5">
                    <div class="learning_member_text">
                        <h5>About us</h5>
                        <h2>Learning with Love
                            and Laughter</h2>
                        <p>Mathematics is the driving force of the modern world and it is a must for everyone to have a
                            sufficient knowledge about it, to conquer the world. This is important as it molds the human
                            brain to be creative, fruitful and think effectively.</p>

                        <p>With the goal of educating all the students in Sri Lanka using the modern age technology,
                            we are providing each student with the ability to reach their maximum capability in Mathematics. </p>
                        <p>
                            The chief of this organization and the head master of all the classes is Mr. Dinusha Gamage.
                        </p>
{{--                        <ul>--}}
{{--                            <li><span class="ti-pencil-alt"></span>Him lights given i heaven second yielding seas--}}
{{--                                gathered wear</li>--}}
{{--                            <li><span class="ti-ruler-pencil"></span>Fly female them whales fly them day deep given--}}
{{--                                night.</li>--}}
{{--                        </ul>--}}
{{--                        <a href="#" class="btn_1">Read More</a>--}}
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- learning part end-->


@endsection
