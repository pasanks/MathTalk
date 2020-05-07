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
            <script src="https://cdn.directpay.lk/dev/v1/directpayCardPayment.js?v=1"></script>
            <div id="card_container"></div>

            <script>

                DirectPayCardPayment.init({
                    container: 'card_container', //<div id="card_container"></div>
                    merchantId: 'xxxxxxx', //your merchant_id
                    amount: 100.00,
                    refCode: "DP12345", //unique referance code form merchant
                    currency: 'LKR',
                    type: 'ONE_TIME_PAYMENT',
                    customerEmail: 'abc@mail.com',
                    customerMobile: '+94712584756',
                    description: 'test products',  //product or service description
                    debug: true,
                    responseCallback: responseCallback,
                    errorCallback: errorCallback,
                    logo: 'https://s3.us-east-2.amazonaws.com/directpay-ipg/directpay_logo.png',
                    apiKey: 'xxxxxxxxxxx'
                });

                //response callback.
                function responseCallback(result) {
                    console.log("successCallback-Client", result);
                    alert(JSON.stringify(result));
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


