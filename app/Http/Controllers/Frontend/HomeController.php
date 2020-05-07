<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\MasterData\ClassD;
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
        return view('frontend.FrontWeb.index')->with([
        'courses'=>$courses
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
        $UserCourse = UserCourse::all();
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
