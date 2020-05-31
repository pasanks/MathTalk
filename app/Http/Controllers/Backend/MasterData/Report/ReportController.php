<?php

namespace App\Http\Controllers\Backend\MasterData\Report;

use App\Http\Controllers\Controller;
use App\Models\Auth\User;
use App\Models\MasterData\ClassD;
use App\Models\MasterData\ClassSession;
use App\Models\MasterData\Grade;
use App\Models\MasterData\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;

class ReportController extends Controller
{
    public function tranReportIndex(){
        $classList = ClassD::all();
        return view('backend.MasterData.Report.TranIndex')->with([
            'classList'=>$classList
        ]);
    }
    public function sessionList(Request $request){
        $class_id = $request->get('class_id');
        $sessionData = DB::select("SELECT id ,session_title FROM class_sessions where class_id='$class_id'");
        return Response::json($sessionData);
    }
    public function getData_mainTranReport(Request $request){

        $fromDateTime = $request->get('fromDate');
        $toDateTime = $request->get('toDate');
//        $tranDetails = Transaction::all();

        $query1 = 'SELECT * FROM transaction WHERE 
                     created_at BETWEEN "'.$fromDateTime.' 00:00:00" AND "'.$toDateTime.' 23:59:59"';

        if ($request->get('ref_no') != null)
        {
            $query1.= " and ref_no='".$request->get('ref_no')."'";

        }
        if ($request->get('tran_status') != null)
        {
            $query1.= " and tran_status='".$request->get('tran_status')."'";

        }
        if ($request->get('payment_type') != null)
        {
            $query1.= "and tran_mode='".$request->get('payment_type')."'";

        }
        if ($request->get('class')!= null)
        {
            $query1.= "and class='".$request->get('class')."'";

        }
        if ($request->get('session') != null)
        {
            $query1.= "and session='".$request->get('session')."'";

        }
        $tranDetails = collect(DB::select($query1));
        \Log::info( $query1);
        return datatables()->of($tranDetails)

            ->addColumn('user_name', function ($tranDetails){
            return User::find($tranDetails->user_id)->name;
            })
            ->addColumn('user_phone', function ($tranDetails){
                return User::find($tranDetails->user_id)->contact_no;
            })
            ->addColumn('user_email', function ($tranDetails){
                return User::find($tranDetails->user_id)->email;
            })
            ->addColumn('class', function ($tranDetails){
                return ClassD::find($tranDetails->class)->title;
            })
            ->addColumn('session', function ($tranDetails){
                return ClassSession::find($tranDetails->session)->session_title;
            })


            ->rawColumns(['status'])
            ->make(true);
    }
}
