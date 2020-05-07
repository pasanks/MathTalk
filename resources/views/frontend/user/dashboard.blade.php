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
                                            <li class="justify-content-between align-items-center d-flex">
                                                <p>Session 01 - January</p>
                                                <a class="btn_4"  href="{{route('frontend.testDP')}}">Pay</a>

                                            </li>
                                            <li class="justify-content-between align-items-center d-flex">
                                                <p>Basics of HTML</p>
                                                <a class="btn_4" href="#">Pay</a>
                                            </li>
                                            <li class="justify-content-between align-items-center d-flex">
                                                <p>Getting Know about HTML</p>
                                                <a class="btn_4" href="#">Pay</a>
                                            </li>
                                            <li class="justify-content-between align-items-center d-flex">
                                                <p>Tags and Attributes</p>
                                                <a class="btn_4" href="#">Pay</a>
                                            </li>
                                            <li class="justify-content-between align-items-center d-flex">
                                                <p>Basics of CSS</p>
                                                <a class="btn_4" href="#">Pay</a>
                                            </li>
                                            <li class="justify-content-between align-items-center d-flex">
                                                <p>Getting Familiar with CSS</p>
                                                <a class="btn_4" href="#">Pay</a>
                                            </li>
                                            <li class="justify-content-between align-items-center d-flex">
                                                <p>Introduction to Bootstrap</p>
                                                <a class="btn_4" href="#">Pay</a>
                                            </li>
                                            <li class="justify-content-between align-items-center d-flex">
                                                <p>Responsive Design</p>
                                                <a class="btn_4" href="#">Pay</a>
                                            </li>
{{--                                            <li class="justify-content-between align-items-center d-flex">--}}
{{--                                                <p>Canvas in HTML 5</p>--}}
{{--                                                <a class="btn_2 text-uppercase" href="#">View Details</a>--}}
{{--                                            </li>--}}
                                        </ul>
                                    </div>
                                </div>

                                <hr>
                                @endforeach


{{--                                <div class="row">--}}
{{--                                    <div class="col-md-4">--}}
{{--                                        <h5>13 Second CLass</h5>--}}
{{--                                    </div>--}}


{{--                                    <div class="col-md-8">--}}
{{--                                        <ul class="course_list" id="sessionList">--}}
{{--                                            <li class="justify-content-between align-items-center d-flex">--}}
{{--                                                <p>Session 01 - January</p>--}}
{{--                                                <a class="btn_4" href="#">Pay</a>--}}
{{--                                            </li>--}}
{{--                                            <li class="justify-content-between align-items-center d-flex">--}}
{{--                                                <p>Basics of HTML</p>--}}
{{--                                                <a class="btn_4" href="#">Pay</a>--}}
{{--                                            </li>--}}
{{--                                            <li class="justify-content-between align-items-center d-flex">--}}
{{--                                                <p>Getting Know about HTML</p>--}}
{{--                                                <a class="btn_4" href="#">Pay</a>--}}
{{--                                            </li>--}}
{{--                                            <li class="justify-content-between align-items-center d-flex">--}}
{{--                                                <p>Tags and Attributes</p>--}}
{{--                                                <a class="btn_4" href="#">Pay</a>--}}
{{--                                            </li>--}}
{{--                                            <li class="justify-content-between align-items-center d-flex">--}}
{{--                                                <p>Basics of CSS</p>--}}
{{--                                                <a class="btn_4" href="#">Pay</a>--}}
{{--                                            </li>--}}
{{--                                            <li class="justify-content-between align-items-center d-flex">--}}
{{--                                                <p>Getting Familiar with CSS</p>--}}
{{--                                                <a class="btn_4" href="#">Pay</a>--}}
{{--                                            </li>--}}
{{--                                            <li class="justify-content-between align-items-center d-flex">--}}
{{--                                                <p>Introduction to Bootstrap</p>--}}
{{--                                                <a class="btn_4" href="#">Pay</a>--}}
{{--                                            </li>--}}
{{--                                            <li class="justify-content-between align-items-center d-flex">--}}
{{--                                                <p>Responsive Design</p>--}}
{{--                                                <a class="btn_4" href="#">Pay</a>--}}
{{--                                            </li>--}}
{{--                                            --}}{{--                                            <li class="justify-content-between align-items-center d-flex">--}}
{{--                                            --}}{{--                                                <p>Canvas in HTML 5</p>--}}
{{--                                            --}}{{--                                                <a class="btn_2 text-uppercase" href="#">View Details</a>--}}
{{--                                            --}}{{--                                            </li>--}}
{{--                                        </ul>--}}
{{--                                    </div>--}}
{{--                                </div>--}}


                            </div>
                            </div>
                            </div>
                        </div>

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
                        <div class="tab-pane fade" id="list-messages" role="tabpanel" aria-labelledby="list-settings-list">...</div>
                    </div>
                </div>
            </div>
            <div class="row">

            </div>
        </div>
    </section>
    <!-- ================ contact section end ================= -->

@endsection
