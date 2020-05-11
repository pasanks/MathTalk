<?php

namespace App\Http\Controllers\Frontend\User;

use App\Http\Controllers\Controller;
use App\Models\MasterData\ClassSession;
use App\Models\MasterData\UserSessions;
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

        $enrolledCourseList = UserCourse::select(['*'])
                                ->where('user_id',\Auth::user()->id)->get();
        $sessionList = ClassSession::all();
        $enrolledSessionList = UserSessions::select(['*'])
            ->where('user_id',\Auth::user()->id)->get();

        $sessionDataArr = array();

        foreach ($sessionList as $sessionVal){
            $enrolledSessionCheck = UserSessions::select(['*'])
                ->where('user_id',\Auth::user()->id)
                ->where('session_id',$sessionVal->id)
                ->first();
            if($enrolledSessionCheck == null){
                array_push($sessionDataArr,
                    [
                        $sessionVal->id,
                        $sessionVal->session_title,
                        '0'

                    ]
                );
            }else{
                array_push($sessionDataArr,
                    [
                        $sessionVal->id,
                        $sessionVal->session_title,
                        '1'
                    ]
                );
            }

        }

        return view('frontend.user.dashboard')->with([
            'sessionList'=>$sessionList,
            'enrolledCourseList'=>$enrolledCourseList,
            'enrolledSessionList'=>$enrolledSessionList,
            'sessionDataArr'=>$sessionDataArr
        ]);
    }
}
