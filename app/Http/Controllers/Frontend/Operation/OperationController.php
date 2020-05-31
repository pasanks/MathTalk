<?php

namespace App\Http\Controllers\Frontend\Operation;

use App\Http\Controllers\Controller;
use App\Models\MasterData\ClassD;
use App\Models\MasterData\ClassSession;
use App\Models\MasterData\Transaction;
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

 public function processPaymentDetails(Request $request){
     $session_id = $request->get('session_id');
        $sessionDetails = ClassSession::find($session_id);
        $classDetails = ClassD::find($sessionDetails->class_id);

     $confirmData = array();
     $enrolledSessionList = UserSessions::select(['*'])
         ->where('user_id',\Auth::user()->id)->where('session_id',$session_id)->first();
     $monthPaid='';
        if($enrolledSessionList != null){
                $monthPaid = $enrolledSessionList->monthly_pay;
        }else{
            $monthPaid = '0';
        }
     array_push($confirmData,
            $classDetails->title,
            $sessionDetails->id,
            $sessionDetails->session_title,
            $sessionDetails->enable_weekly_fee,
            $sessionDetails->weekly_fee,
            $sessionDetails->monthly_fee,
            $monthPaid

        );
return $confirmData;

 }


    public function PaymentPage(Request $request){
     $sessionID = $request->get('sessionID');
     $spaymentMode = $request->get('paymentTypeSelect');
     $user = \Auth::user();
        $sessionDetails = ClassSession::find($sessionID);
        $classDetails = ClassD::find($sessionDetails->class_id);
        $amount = '';
        if($spaymentMode == 'M'){
            $amount = $sessionDetails->monthly_fee;
        }else{
            $amount = $sessionDetails->weekly_fee;
        }
        $ref = rand();
        $this-> transactionPendingSave($ref,$classDetails->id,$sessionDetails->id,$amount,$spaymentMode);
        return view('frontend.FrontWeb.paymentPage')->with([
            'sessionDetails'=>$sessionDetails,
            'classDetails'=>$classDetails,
            'amount'=>$amount,
            'ref'=>$ref,
            'user'=>$user
        ]);

    }

    public function transactionPendingSave($ref_id,$class,$session,$amount,$tran_mode){
            $tranSave = new Transaction();
        $tranSave->ref_no = $ref_id;
        $tranSave->user_id = \Auth::user()->id;
        $tranSave->class = $class;
        $tranSave->session = $session;
        $tranSave->tran_datetime = Carbon::now();
        $tranSave->amount = $amount;
        $tranSave->tran_mode = $tran_mode;
        $tranSave->save();
    }

    public function handlePaymentResponse(Request $request){

     $data = $request->get('data');
     $TranData =  Transaction::select(['*'])->where('ref_no',$data['reference'])->first();
        Transaction::where('ref_no',$data['reference'])->update(array(
            'tran_status'=>$data['status'],
            'transactionid'=>$data['transactionId'],
            'description'=>$data['description'],
            'res_datetime'=>$data['dateTime'],
            'reference'=>$data['reference'],
            'card_no'=>$data['card']['number'],

        ));

        if($data['status'] == 'SUCCESS'){
            if($TranData->tran_mode == 'M'){
                $userSession = new UserSessions();
                $userSession->user_id = \Auth::user()->id;
                $userSession->session_id =$TranData->session;
                $userSession->session_name =ClassSession::find($TranData->session)->session_title;
                $userSession->monthly_pay ='1';
                $userSession->created_at =Carbon::now();
                $userSession->save();
            }else{
                $exsistKey = UserSessions::select(['id'])->where('user_id',\Auth::user()->id)
                    ->where('session_id',$TranData->session)->first();
                if($exsistKey == null){
                    $userSession = new UserSessions();
                    $userSession->user_id = \Auth::user()->id;
                    $userSession->session_id =$TranData->session;
                    $userSession->session_name =ClassSession::find($TranData->session)->session_title;
                    $userSession->weekly_pay ='1';
                    $userSession->created_at =Carbon::now();
                    $userSession->save();
                }
            }
        }


        return true;

    }





}
