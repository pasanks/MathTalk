@extends('frontend.FrontWeb.master')



@section('content')

    {{--    <!-- breadcrumb start-->--}}
    {{--    <section class="breadcrumb breadcrumb_bg">--}}
    {{--        <div class="container">--}}
    {{--            <div class="row">--}}
    {{--                <div class="col-lg-12">--}}
    {{--                    <div class="breadcrumb_iner text-center">--}}
    {{--                        <div class="breadcrumb_iner_item">--}}
    {{--                            <h2>Course Details</h2>--}}
    {{--                            <p>Home<span>/</span>Course Details</p>--}}
    {{--                        </div>--}}
    {{--                    </div>--}}
    {{--                </div>--}}
    {{--            </div>--}}
    {{--        </div>--}}
    {{--    </section>--}}
    <!-- breadcrumb start-->

    <!--================ Start Course Details Area =================-->
    <section class="course_details_area section_padding">

        <div class="container">
            <h4>You are going to pay : {{$amount}} LKR</h4>
            <h5>For class : {{$classDetails->title}} - Session : {{$sessionDetails->session_title}}</h5>
            <script src="https://cdn.directpay.lk/dev/v1/directpayCardPayment.js?v=1"></script>
            <div id="card_container"></div>

            <script>

                DirectPayCardPayment.init({
                    container: 'card_container', //<div id="card_container"></div>
                    merchantId: 'TD01927', //your merchant_id
                    amount: '{{$amount}}',
                    refCode: '{{$ref}}', //unique referance code form merchant
                    currency: 'LKR',
                    type: 'ONE_TIME_PAYMENT',
                    customerEmail: '{{$user->email}}',
                    customerMobile: '{{$user->contact_no}}',
                    description: 'test products',  //product or service description
                    debug: true,
                    responseCallback: responseCallback,
                    errorCallback: errorCallback,
                    logo: 'https://s3.us-east-2.amazonaws.com/directpay-ipg/directpay_logo.png',
                    apiKey: 'C1lcuNYAKo4jdvNoYwp3v3EK4OzBcy4U8rxNp68W'
                });

                //response callback.
                function responseCallback(result) {
                    console.log("successCallback-Client", result);

                    if (result.status === 200) {
                        $.ajax({
                            url: "{{route('frontend.operation.handlePaymentResponse')}}",
                            type: "POST",
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            data: {
                                data: result.data,
                            },
                            success: function (e) {
                                console.log(e);

                            },
                            error: function (e) {

                                console.log("payment_update_load!", e.responseJSON)
                            }
                        });
                    }

                }

                //error callback
                function errorCallback(result) {
                    console.log("successCallback-Client", result);
                    alert(JSON.stringify(result));
                }

            </script>
        </div>
    </section>
    <!--================ End Course Details Area =================-->

@endsection


