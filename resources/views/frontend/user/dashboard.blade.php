@extends('frontend.FrontWeb.master')
@section('content')

<style>
    @media screen and (min-width: 768px) {

        .custom-collapse .collapse{
            display:block;
        }
    }

    #sessionList li{
        margin: 0 0 5px 0;
    }


</style>
    <!-- ================ contact section start ================= -->
    <section class="contact-section section_padding">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="list-group list-group-horizontal" id="list-tab" role="tablist">
                        <a class="list-group-item list-group-item-action active" id="list-home-list" data-toggle="list" href="#list-courses" role="tab" aria-controls="home">Courses</a>
                        <a class="list-group-item list-group-item-action" id="list-profile-list" data-toggle="list" href="#list-profile" role="tab" aria-controls="profile">Profile</a>
                        <a class="list-group-item list-group-item-action" id="list-messages-list" data-toggle="list" href="#list-messages" role="tab" aria-controls="messages">Payment History</a>
                        {{--                        <a class="list-group-item list-group-item-action" id="list-settings-list" data-toggle="list" href="#list-settings" role="tab" aria-controls="settings">Settings</a>--}}

                    </div>
                </div>
            </div>

            <br>

            <div class="row">


                <div class="col-12">
                    @include('includes.partials.messages')
                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="list-courses" role="tabpanel" aria-labelledby="list-home-list">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <h4>Enrolled Courses</h4>
                                            <hr>
                                        </div>
                                    </div>
                            <div class="content">
                                @foreach($enrolledCourseList as $enrolledCourses)
                                <div class="row">
                                    <div class="col-md-4">
                                        <h5>{{$enrolledCourses->course_name}}</h5>
                                    </div>


                                    <div class="col-md-8">
                                        <ul class="course_list" id="sessionList">

                                            @for($i=0;$i<count($sessionDataArr);$i++)
                                                @if($enrolledCourses->course_id == $sessionDataArr[$i][0] )
                                            <li class="justify-content-between align-items-center d-flex">
                                                <p>{{$sessionDataArr[$i][2]}}</p>
                                                @if($sessionDataArr[$i][3] == '1')
                                                    @if($sessionDataArr[$i][4] == '1')
                                                    <a class="disable btn_4"  href="#">Monthly Payment Paid</a>
                                                    @elseif($sessionDataArr[$i][5] == '1')
                                                        <button type="button" id="paymentTrigBtn" class="btn_4 paymentTrigBtn" data-toggle="modal"
                                                                value="{{$sessionDataArr[$i][1]}}" data-target="#paymentTrigger">
                                                            Weekly Payment Available
                                                        </button>
                                                        @else
                                                        <button type="button" id="paymentTrigBtn" class="btn_4 paymentTrigBtn" data-toggle="modal"
                                                                value="{{$sessionDataArr[$i][1]}}" data-target="#paymentTrigger">
                                                            Pay
                                                        </button>
                                                    @endif


                                                    @else
                                                    <a class="disable btn_4"  href="#">Payment Deadline Expired</a>
                                                    @endif

                                            </li>
                                                @endif
                                                @endfor
                                        </ul>

                                    </div>

                                </div>

                                <hr>
                                @endforeach




                            </div>
                            </div>
                            </div>
                        </div>

{{--                        PROFILE--}}
                        <div class="tab-pane fade" id="list-profile" role="tabpanel" aria-labelledby="list-messages-list">
{{--                            <div class="col-md-12">--}}
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <h4>Your Profile</h4>
                                                <hr>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <form>
                                                    <div class="form-group row">
                                                        <label for="username" class="col-4 col-form-label">First Name*</label>
                                                        <div class="col-8">
                                                            <input type="text" id="first_name" name="first_name" placeholder="First Name" class="form-control here"
                                                                   value="{{$logged_in_user->first_name}}" required="required" >
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="username" class="col-4 col-form-label">Last Name*</label>
                                                        <div class="col-8">
                                                            <input type="text" id="last_name" name="last_name" placeholder="Last Name" class="form-control here"
                                                                   value="{{$logged_in_user->last_name}}" required="required" >
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="email" class="col-4 col-form-label">Email*</label>
                                                        <div class="col-8">
                                                            <input id="email" name="email" placeholder="Email" class="form-control here" required="required" type="email"
                                                                   value="{{$logged_in_user->email}}"  readonly required>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="name" class="col-4 col-form-label">School*</label>
                                                        <div class="col-8">
                                                            <input id="school" name="school" placeholder="School" class="form-control here" type="text"
                                                                   value="{{$logged_in_user->school}}" required>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="lastname" class="col-4 col-form-label">Contact No*</label>
                                                        <div class="col-8">
                                                            <input id="contact_no" name="contact_no" placeholder="Contact No" class="form-control here" type="text"
                                                                   value="{{$logged_in_user->contact_no}}" required>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="text" class="col-4 col-form-label">Contact Address*</label>
                                                        <div class="col-8">
                                                            <input type="text" id="contact_address" name="contact_address" placeholder="Contact Address" class="form-control here"
                                                                   required="required"  value="{{$logged_in_user->contact_address}}">
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <div class="offset-4 col-8">
                                                            <button name="submit" type="submit" class="btn btn-primary">Update My Profile</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>

                                    </div>
                                </div>

{{--                            </div>--}}
                            <br>

                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <h4>Update Password</h4>
                                                <hr>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <form>
                                                    <div class="form-group row">
                                                        <label for="username" class="col-4 col-form-label">Old Password*</label>
                                                        <div class="col-8">
                                                            <input type="password" id="old_pw" name="old_pw" placeholder="Old Password" class="form-control here" required="required" >
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="username" class="col-4 col-form-label">New Password*</label>
                                                        <div class="col-8">
                                                            <input type="password" id="new_pw" name="new_pw" placeholder="New Password" class="form-control here" required="required" >
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="username" class="col-4 col-form-label">Confirm Password*</label>
                                                        <div class="col-8">
                                                            <input type="password" id="confirm_pw" name="confirm_pw" placeholder="Confirm Password" class="form-control here" required="required" >
                                                        </div>
                                                    </div>


                                                    <div class="form-group row">
                                                        <div class="offset-4 col-8">
                                                            <button name="submit" type="submit" class="btn btn-primary">Update Password</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                            </div>



                        </div>
{{--                        Messages--}}
                        <div class="tab-pane fade" id="list-messages" role="tabpanel" aria-labelledby="list-settings-list">
                            <div class="table-responsive">
                                <table class="uk-table uk-table-hover uk-table-striped" style="font-size:11.5px;width: 100%"  >
                                    <thead>
                                    <tr>
                                        <th>Ref</th>
                                        <th>Class</th>
                                        <th>Session</th>
                                        <th>Amount</th>
                                        <th>Status</th>
                                        <th>Payment Date</th>
                                        <th>Tran Mode</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                        @for($t = 0;$t<count($arrTranData); $t++)
                                            <tr>
                                            <td>{{$arrTranData[$t][0]}}</td>
                                            <td>{{$arrTranData[$t][1]}}</td>
                                            <td>{{$arrTranData[$t][2]}}</td>
                                            <td>{{$arrTranData[$t][3]}}</td>
                                            <td>{{$arrTranData[$t][4]}}</td>
                                            <td>{{$arrTranData[$t][5]}}</td>
                                            <td>{{$arrTranData[$t][6]}}</td>
                                            </tr>
                                        @endfor

                                    </tbody>
                                </table>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
            <div class="row">

            </div>
        </div>
    </section>




<!-- Modal -->
<div class="modal fade" id="paymentTrigger" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="top:100px">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Confirm Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form  method="POST" action="{{route('frontend.operation.PaymentPage')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Class</label>
                        <input type="text" class="form-control" id="courseTitle" name="courseTitle" placeholder="" readonly>

                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Session</label>
                        <input type="text" class="form-control" id="sessionTitle" name="sessionTitle" placeholder="" readonly>
                        <input type="hidden" class="form-control" id="sessionID" name="sessionID" placeholder="sessionID" required>
                    </div>



                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Select Payment Mode</label>
                        <select id="paymentTypeSelect"  class="form-control"  name="paymentTypeSelect" required>

                        </select>
                    </div>
                    <div class="form-group" id="WeekFeeDiv" style="display: none">
                        <label for="exampleFormControlInput1">Weekly Fee</label>
                        <input type="text" class="form-control" id="weekFee" name="weekFee" placeholder="" readonly>
                    </div>

                    <div class="form-group"  id="MonthFeeDiv" style="display: none">
                        <label for="exampleFormControlInput1">Monthly Fee</label>
                        <input type="text" class="form-control" id="monthFee" name="monthFee" placeholder="" readonly>
                    </div>


                    <button type="submit" class="btn btn-primary"><span class="cil-contrast btn-icon mr-2"></span>
                        Proceed to Payment
                    </button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
{{--                <button type="button" class="btn btn-primary">Save changes</button>--}}
            </div>
        </div>
    </div>
</div>
    <!-- ================ contact section end ================= -->

<script>
    $("#paymentTypeSelect").change(function () {
        if($('#paymentTypeSelect').val()== 'M'){
              $("#MonthFeeDiv").show(500);
              $("#WeekFeeDiv").hide(500);
        }else if($('#paymentTypeSelect').val()== 'W'){
            $("#MonthFeeDiv").hide(500);
            $("#WeekFeeDiv").show(500);
        }
    });

    $('.paymentTrigBtn').unbind().click(function() {
        $("#courseTitle").val('');
        $("#sessionID").val('');
        $("#sessionTitle").val('');
        $("#weekFee").val('');
        $("#monthFee").val('');
        $("#paymentTypeSelect").empty();
        sessionID = $(this).attr("value");
        console.log(sessionID);
        $("#paymentTrigger").ready(function() {

            $.ajax({
                url: "{{ route('frontend.operation.processPaymentDetails') }}",
                type: "get",
                data: {session_id:sessionID },
                success: function(a) {
                    $("#courseTitle").val(a[0]);
                    $("#sessionID").val(a[1]);
                    $("#sessionTitle").val(a[2]);
                    $("#weekFee").val(a[4]);
                    $("#monthFee").val(a[5]);

                    $("#paymentTypeSelect").empty();
                    $("#paymentTypeSelect").append('<option value="" >Select Payment Type</option>');
                    if(a[3]=='1'){
                        $("#paymentTypeSelect").append('<option value="M" >Monthly</option>');
                        $("#paymentTypeSelect").append('<option value="W" >Weekly</option>');
                    }else{
                        $("#paymentTypeSelect").append('<option value="M" >Monthly</option>');
                    }


                },
                error: function(a) {
                    console.log("Data Load Error", a.responseJSON);
                }
            });

        });
    });
</script>
@endsection
