<?php

namespace App\Http\Controllers\Frontend\User;

use App\Http\Controllers\Controller;
use App\Models\MasterData\ClassSession;
use App\Models\UserCourse;

/**
 * Class DashboardController.
 */
class DashboardController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $sessionList = ClassSession::all();
        $enrolledCourseList = UserCourse::select(['*'])
                                ->where('user_id',\Auth::user()->id)->get();

        $enrolledSessionList = UserCourse::select(['*'])
            ->where('user_id',\Auth::user()->id)->get();

        return view('frontend.user.dashboard')->with([
            'sessionList'=>$sessionList,
            'enrolledCourseList'=>$enrolledCourseList
        ]);
    }
}
