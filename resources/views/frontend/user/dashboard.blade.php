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
                        <a class="list-group-item list-group-item-action" id="list-messages-list" data-toggle="list" href="#list-messages" role="tab" aria-controls="messages">Messages</a>
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
                                            <li class="justify-content-between align-items-center d-flex">
                                                <p>{{$sessionDataArr[$i][1]}}</p>
                                                @if($sessionDataArr[$i][2] == '0')

                                                    <button type="button" id="paymentTrigBtn" class="btn_4 paymentTrigBtn" data-toggle="modal"
                                                            value="{{$sessionDataArr[$i][0]}}" data-target="#paymentTrigger">
                                                        Pay
                                                    </button>
                                                @else
                                                    <a class="disable btn_4"  href="#">Paid</a>
                                                @endif
                                            </li>
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
                        <div class="tab-pane fade" id="list-messages" role="tabpanel" aria-labelledby="list-settings-list">...</div>
                    </div>
                </div>
            </div>
            <div class="row">

            </div>
        </div>
    </section>



<!-- Payment Trigger -->
<div class="modal fade" id="paymentTrigger" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Confirm Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form>
            <div class="modal-body">
                <div class="form-group">
                    <label for="username" class="col-4 col-form-label">Class Name : </label>
                    <label id="class_name" class="col-12 col-form-label">Class Name d</label>
                </div>
                <div class="form-group">
                    <label for="username" class="col-4 col-form-label">Session Name : </label>
                    <label id="session_name" class="col-12 col-form-label">Session Name d</label>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="radio" >
                                <label><input type="radio" name="optradio" checked>Monthly Payment</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="radio">
                                <label><input type="radio" name="optradio" >Weekly Payment</label>
                            </div>
                        </div>
                    </div>


                </div>

                <div class="form-group">

                </div>


{{--             <input type="text" id="sesID" name="id">--}}

            </div>
            <div class="modal-footer">
{{--                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>--}}
                <button type="button" class="btn btn-primary">Proceed to payment</button>
            </div>
            </form>
        </div>
    </div>
</div>
    <!-- ================ contact section end ================= -->

<script>
    $('.paymentTrigBtn').unbind().click(function() {
        // $("#editGradeModel").empty();
        $('#sesID').val('');

        sessionID = "";
        sessionID = $(this).attr("value");
        console.log(sessionID);
        $("#paymentTrigger").ready(function() {
                    $("#sesID").val(sessionID);
            // frontend.operation.

            // $("#LabelID").empty();
            // $("#LabelID").append("some Text");
            {{--$.ajax({--}}
            {{--    url: "{{ route('admin.grade.getDataForEdit') }}",--}}
            {{--    type: "get",--}}
            {{--    data: {id:gradeID },--}}
            {{--    success: function(a) {--}}
            {{--        $("#editGradeID").val(a[0]);--}}
            {{--        $("#editGrade").val(a[1]);--}}
            {{--        $("#editDescription").val(a[2]);--}}
            {{--        $("#editGradeStatus").empty();--}}
            {{--        if(a[3]=='0'){--}}
            {{--            $("#editGradeStatus").append('<option value="0" selected>Inactive</option>');--}}
            {{--            $("#editGradeStatus").append('<option value="1" >Active</option>');--}}
            {{--        }else{--}}
            {{--            $("#editGradeStatus").append('<option value="1" selected>Active</option>');--}}
            {{--            $("#editGradeStatus").append('<option value="0">Inactive</option>');--}}
            {{--        }--}}


            {{--    },--}}
            {{--    error: function(a) {--}}
            {{--        console.log("Data Load Error", a.responseJSON);--}}
            {{--    }--}}
            {{--});--}}

        });
    });
</script>
@endsection
