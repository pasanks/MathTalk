<?php

namespace App\Http\Controllers\Frontend\Operation;

use App\Http\Controllers\Controller;
use App\Models\MasterData\ClassD;
use App\Models\MasterData\ClassSession;
use App\Models\MasterData\UserSessions;
use App\Models\UserCourse;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Redirect;

class OperationController extends Controller
{
 public function enroll_course($classID){

     $userCourseEnroll =new UserCourse();
     $userCourseEnroll->user_id = \Auth::user()->id;
     $userCourseEnroll->course_id = $classID;
     $userCourseEnroll->course_name = ClassD::find($classID)->title;
     $userCourseEnroll->created_at = Carbon::now();
     $userCourseEnroll->save();

     return Redirect::route('frontend.user.dashboard')->withFlashSuccess('You Have Enrolled Successfully!');
 }
 public function PaySession($SessionID){
     $userCourseEnroll =new UserSessions();
     $userCourseEnroll->user_id = \Auth::user()->id;
     $userCourseEnroll->sesssion_id = $SessionID;
     $userCourseEnroll->sesssion_name = ClassSession::find($SessionID)->session_title;
     $userCourseEnroll->created_at = Carbon::now();
     $userCourseEnroll->save();


 }

 public function confirmPaymentDetails(Request $request){
        $sessionDetails = ClassSession::find($request->get('session_id'));
        $classDetails = ClassD::find($sessionDetails->class_id);

        array_push($confirmData,
            $classDetails->title,
            $sessionDetails->session_title,
            $sessionDetails->enable_weekly_fee,
            $sessionDetails->weekly_fee,
            $sessionDetails->monthly_fee,
            $sessionDetails->enable_weekly_fee,
        );


 }
}
