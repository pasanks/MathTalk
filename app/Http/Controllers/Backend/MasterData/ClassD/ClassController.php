<?php

namespace App\Http\Controllers\Backend\MasterData\ClassD;

use App\Http\Controllers\Controller;
use App\Models\MasterData\ClassD;
use App\Models\MasterData\Grade;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Redirect;

class ClassController extends Controller
{
    public function index(){
        $grades = Grade::all();
        return view('backend.MasterData.Class.index')->with(['grades'=>$grades]);
    }

    public function create(){
        $grades = Grade::all();
        return view('backend.MasterData.Class.create')->with(['grades'=>$grades]);
    }


    public function store(Request $request){
        \Log::info('Creating New Class');
        \Log::info('User ID : '.\Auth::user()->id);
        \Log::info($request->all());
        $newClass = new ClassD();
        $newClass->grade = $request->get('grade');
        $newClass->title = $request->get('title');
        $newClass->description = $request->get('description');
        $newClass->fee_monthly = $request->get('fee_monthly');
        $newClass->fee_weekly = $request->get('fee_weekly');
        $newClass->class_year = $request->get('class_year');
        $newClass->class_date = $request->get('class_date');
        $newClass->class_time = $request->get('class_time');
        $newClass->max_students = $request->get('max_students');
        $newClass->trainer_name = $request->get('trainer_name');
        $newClass->created_by = \Auth::user()->id;
        $newClass->created_at = Carbon::now();
        $newClass->save();
        return Redirect::route('admin.class.index')->withFlashSuccess('New Class has been created!');
    }

    public function updateClass(Request $request){
        \Log::info('Updating Class');
        \Log::info('User ID : '.\Auth::user()->id);
        \Log::info($request->all());
        $updateClass = ClassD::find($request->get('id'));
        $updateClass->title = $request->get('title');
        $updateClass->description = $request->get('description');
        $updateClass->fee_monthly = $request->get('fee_monthly');
        $updateClass->fee_weekly = $request->get('fee_weekly');
        $updateClass->class_year = $request->get('class_year');
        $updateClass->class_date = $request->get('class_date');
        $updateClass->class_time = $request->get('class_time');
        $updateClass->max_students = $request->get('max_students');
        $updateClass->status = $request->get('status');
        $updateClass->updated_at = Carbon::now();
        $updateClass->save();

        return Redirect::route('admin.class.index')->withFlashSuccess('Class has been updated!');
    }

    public  function getDataForClassEdit(Request $request){
        $classID = $request->get('id');
        $classData = ClassD::find($classID);
        return [
            $classData->id,
                $classData->grade,
            $classData->title,
            $classData->description,
            $classData->fee_monthly,
            $classData->fee_weekly,
            $classData->max_students,
            $classData->class_year,
            $classData->class_date,
            $classData->class_time,
            $classData->status
        ];

    }
    public function getData_classes(){
        $gradeDetails = ClassD::all();
        return datatables()->of($gradeDetails)
            ->addColumn('grade', function ($data){
                    $gradeInfo = Grade::find($data->id);
                    return '<span class="badge bg-info">'.$gradeInfo->grade.'</span>';

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
}
