<?php

namespace App\Http\Controllers\Backend\MasterData\Session;

use App\Http\Controllers\Controller;
use App\Models\MasterData\ClassD;
use App\Models\MasterData\ClassSession;
use App\Models\MasterData\Grade;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Redirect;

class SessionController extends Controller
{
    public function index(){

        return view('backend.MasterData.Sessions.index');
    }

    public function create(){
        $classes = ClassD::all();
        return view('backend.MasterData.Sessions.create')->with(['classes'=>$classes]);
    }
    public function store(Request $request){
        \Log::info('Creating New Class Session');
        \Log::info('User ID : '.\Auth::user()->id);
        \Log::info($request->all());
        $newClassSession = new ClassSession();
        $newClassSession->class_id = $request->get('class_id');
        $classsData =ClassD::find($request->get('class_id'));
        $newClassSession->session_title = $request->get('session_title');
        $useClassDates = $request->get('use_class_dates');
        $useClassFees = $request->get('use_class_fees');
        if($useClassFees == '1'){
            $newClassSession->monthly_fee =$classsData->fee_monthly;
            $newClassSession->weekly_fee = $classsData->fee_weekly;
            $newClassSession->enable_weekly_fee =$classsData->enable_weekly_fee;
        }else{
            $newClassSession->monthly_fee =$request->get('monthly_fee');
            $newClassSession->weekly_fee = $request->get('weekly_fee');
            $newClassSession->enable_weekly_fee =$request->get('enable_weekly_fee');
        }

        if($useClassDates == '1'){
            $newClassSession->year =$classsData->class_year;
            $newClassSession->date = $classsData->class_date;
            $newClassSession->time =$classsData->class_time;
        }else{
            $newClassSession->session_date =$request->get('date')." ".$request->get('time');
        }

        $newClassSession->use_class_dates = $useClassDates;
        $newClassSession->use_class_fees = $useClassFees;
        $newClassSession->payment_end_date = $request->get('payment_end_date');;
        $newClassSession->created_by = \Auth::user()->id;
        $newClassSession->created_at = Carbon::now();
        $newClassSession->save();
        return Redirect::route('admin.class_session.index')->withFlashSuccess('New Class Session has been created!');
    }

    public function getData_classSessions(){
        $sessionDetails = ClassSession::all();
        return datatables()->of($sessionDetails)
            ->addColumn('class', function ($sessionDetails){
                return ClassD::find($sessionDetails->class_id)->title;
            })
            ->addColumn('status', function ($data){
                if($data->status == '1'){
                    return '<span class="badge bg-success">Active</span>';
                }else{
                    return '<span class="badge bg-danger">Inactive</span>';
                }
            })
            ->addColumn('action', function ($data){
                return view('backend.MasterData.Class.classBtn',['data'=>$data])->render();

            })
            ->rawColumns(['grade','status','action'])
            ->make(true);
    }


    public function editClassSession(){

    }
}
