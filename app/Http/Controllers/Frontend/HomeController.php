<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Auth\User;
use App\Models\MasterData\ClassD;
use App\Models\MasterData\ClassSession;
use App\Models\UserCourse;

/**
 * Class HomeController.
 */
class HomeController extends Controller
{
    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $courses = ClassD::all();
        $userCount = User::select(['*'])->get()->count();
        $CourseCount = ClassD::select(['*'])->get()->count();
        $SessionCount = ClassSession::select(['*'])->get()->count();
        return view('frontend.FrontWeb.index')->with([
        'courses'=>$courses,
        'userCount'=>$userCount,
        'CourseCount'=>$CourseCount,
        'SessionCount'=>$SessionCount
    ]);
    }
    public function about()
    {
        return view('frontend.FrontWeb.about');
    }

    public function courses()
    {
        $courses = ClassD::all();
        return view('frontend.FrontWeb.course')->with([
            'courses'=>$courses
        ]);
    }

    public function contactus()
    {
        return view('frontend.FrontWeb.contact');
    }

    public function loginView()
    {
        return view('frontend.FrontWeb.login');
    }

    public function registerView()
    {
        return view('frontend.FrontWeb.register');
    }
    public function courseDetails($id)
    {
        $courseDetails = ClassD::find($id);
        $UserCourse = UserCourse::select(['*'])->where('user_id',\Auth::user()->id)->get();
        return view('frontend.FrontWeb.course_details')->with([
            'courseDetails'=>$courseDetails,
            'UserCourse'=>$UserCourse
        ]);
    }

    public function testDP()
    {
        return view('frontend.FrontWeb.testDP');
    }
}
