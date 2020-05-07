@extends('frontend.FrontWeb.master')



@section('content')
    <style>
        .fifty-chars {
            width: 35ch;
            overflow: hidden;
            white-space: nowrap;
            text-overflow: ellipsis;
        }
    </style>

    <!-- breadcrumb start-->
    <section class="breadcrumb breadcrumb_bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb_iner text-center">
                        <div class="breadcrumb_iner_item">
                            <h2>Our Classes</h2>
                            <p>Home<span>/</span>Classes</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb start-->

    <!--::review_part start::-->
    <section class="special_cource padding_top">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-5">
                    <div class="section_tittle text-center">
{{--                        <p>popular courses</p>--}}
                        <h2>All Classes</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach($courses as $value)

                    <div class="col-sm-6 col-lg-4 topbar" >
                        <div class="single_special_cource" >
{{--                            <img src="{{ asset('FrontWeb/img/special_cource_1.png') }}" class="special_img" alt="">--}}
                            <div class="special_cource_text" style="height: 300px;">
                                <a href="{{route('frontend.courseDetails',$value->id)}}" class="btn_4">{{$value->title}}</a>
                                <a href="{{route('frontend.courseDetails',$value->id)}}"><h3>{{$value->title}}</h3></a>
                                <p class="fifty-chars"  >{{$value->description}}</p>
                                <div class="author_info">
                                    <div class="author_img">

                                        <div class="author_info_text">
                                            <p>Conduct by:</p>
                                            <h5>{{$value->trainer_name}}</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                @endforeach

            </div>
        </div>
    </section>
    <!--::blog_part end::-->



@endsection
