<?php

namespace App\Http\Controllers\Frontend\User;

use App\Http\Controllers\Controller;
use App\Models\MasterData\ClassD;
use App\Models\MasterData\ClassSession;
use App\Models\MasterData\Transaction;
use App\Models\MasterData\UserSessions;
use App\Models\UserCourse;
use Carbon\Carbon;

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
            $enablePayment = '0';
            if(Carbon::now()->format('Y-m-d') >= $sessionVal->payment_end_date){
                $enablePayment = '0';
            }else{
                $enablePayment = '1';
            }
            if($enrolledSessionCheck == null){
                array_push($sessionDataArr,
                    [
                        $sessionVal->class_id,
                        $sessionVal->id,
                        $sessionVal->session_title,
                        $enablePayment,
                       '',
                       '',


                    ]
                );
            }else{
                array_push($sessionDataArr,
                    [
                        $sessionVal->class_id,
                        $sessionVal->id,
                        $sessionVal->session_title,
                        $enablePayment,
                        $enrolledSessionCheck->monthly_pay,
                        $enrolledSessionCheck->weekly_pay,

                    ]
                );
            }

        }


        $arrTranData = array();
            $tranData = Transaction::select(['*'])->where('user_id',\Auth::user()->id)
                ->where('tran_status','!=','PENDING')
                ->get();
        if($tranData != null){
            foreach ($tranData as $tranVal){
               $class =  ClassD::find($tranVal->class)->title;
               $session = ClassSession::find($tranVal->session)->session_title;
                $mode='';
               if($tranVal->tran_mode == 'M'){
                   $mode = 'Monthly';
               }else{
                   $mode = 'Weekly';
               }
                array_push($arrTranData,[
                    $tranVal->ref_no,
                    $class,
                    $session,
                    $tranVal->amount,
                    $tranVal->tran_status,
                    $tranVal->tran_datetime,
                    $mode
                    ]);
            }

        }



        return view('frontend.user.dashboard')->with([
            'sessionList'=>$sessionList,
            'enrolledCourseList'=>$enrolledCourseList,
            'enrolledSessionList'=>$enrolledSessionList,
            'sessionDataArr'=>$sessionDataArr,
            'arrTranData'=>$arrTranData
        ]);
    }
}
