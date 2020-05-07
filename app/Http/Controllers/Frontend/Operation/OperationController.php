<?php

namespace App\Http\Controllers\Frontend\Operation;

use App\Http\Controllers\Controller;
use App\Models\MasterData\ClassD;
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
 } //
}
