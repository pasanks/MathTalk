<?php

namespace App\Http\Controllers\Backend\MasterData\Grade;

use App\Http\Controllers\Controller;
use App\Models\MasterData\Grade;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Redirect;

class GradeController extends Controller
{
   public function index(){
       return view('backend.MasterData.Grade.index');
   }

   public function create(){
        return view('backend.MasterData.Grade.create');
   }



    public function updateGrade(Request $request){
        $updateGrade = Grade::find($request->get('id'));
        $updateGrade->grade = $request->get('grade');
        $updateGrade->description = $request->get('description');
        $updateGrade->status = $request->get('status');
        $updateGrade->updated_at = Carbon::now();
        $updateGrade->save();
        return Redirect::route('admin.grade.index')->withFlashSuccess('Grade has been updated!');
   }

    public  function getDataForEdit(Request $request){
       $gradeID = $request->get('id');
       $gradeData = Grade::find($gradeID);
       return [$gradeData->id,$gradeData->grade,$gradeData->description,$gradeData->status];

    }
   public function getData_grades(){
       $gradeDetails = Grade::all();
       return datatables()->of($gradeDetails)
           ->addColumn('status', function ($data){
               if($data->status == '1'){
                    return '<span class="badge bg-success">Active</span>';
               }else{
                   return '<span class="badge bg-danger">Inactive</span>';
               }
           })
           ->addColumn('action', function ($data){
               return view('backend.MasterData.Grade.gradeBtn',['data'=>$data])->render();

           })
           ->rawColumns(['status','action'])
           ->make(true);
   }
}
