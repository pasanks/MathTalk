@extends('backend.layouts.app')

@section('title', app_name() . ' | ' . __('Class Management'))

@section('content')
    <div id="ui-view">
        <div>
            <div class="fade-in">
                <div class="card">

                    <div class="card-header">
                        <div class="page_title"><i class="fas fa-user-friends page_title_icon"></i> Create Class</div>
                        <div class="float-right">
                            {{--                            <a href="{{ route('admin.agents.create') }}" type="button" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i> Create Agent</a>--}}
{{--                            <button type="button" class="btn btn-outline-primary btn-sm" data-toggle="modal" data-target="#createClassModel">--}}
{{--                                Add New Class--}}
{{--                            </button>--}}
                        </div>
                    </div>
                    <div class="card-body">
                        <form  method="POST" action="{{route('admin.class.store')}}" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="form-group col-md-4">
                                    <label for="exampleFormControlInput1">Grade*</label>
                                    <select class="form-control" id="classGrade" name="grade" required>
                                        @foreach($grades as $gradeVal)
                                            <option value="{{$gradeVal->id}}">{{$gradeVal->grade}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group  col-md-8">
                                    <label for="exampleFormControlTextarea1">Class Title*</label>
                                    <input type="text" class="form-control" id="title" name="title"
                                           placeholder="Title to appear in the web site" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">Description*<span style="font-size: 10.5px"> (This will appear in the course details page)</span></label>
                                <textarea class="form-control" id="description" name="description" rows="3" required>Description</textarea>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label for="exampleFormControlTextarea1">Year*</label>
                                        <input type="text" class="form-control" id="class_year" name="class_year" placeholder="Year" required>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="exampleFormControlTextarea1">Day*</label>
                                        <select class="form-control" id="day" name="class_date" required>
                                            <option value="Sun">Sun</option>
                                            <option value="Mon">Mon</option>
                                            <option value="Tue">Tue</option>
                                            <option value="Wed">Wed</option>
                                            <option value="Thu">Thu</option>
                                            <option value="Fri">Fri</option>
                                            <option value="Sat">Sat</option>
                                        </select>

                                    </div>
                                    <div class="col-md-4">
                                        <label for="exampleFormControlTextarea1">Time*</label>
                                        <input type="time" class="form-control" id="class_time" name="class_time" placeholder="Time" required>
                                    </div>
                                </div>


                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="exampleFormControlTextarea1">Monthly Fee*</label>
                                        <input type="text" class="form-control" id="fee_monthly" name="fee_monthly" placeholder="Monthly Fee" required>
                                    </div>

                                    <div class="col-md-4">
                                        <label for="exampleFormControlTextarea1">Weekly Fee</label>
                                        <input type="text" class="form-control" id="fee_weekly" name="fee_weekly" placeholder="Weekly Fee" required>
                                    </div>
                                    <div class="col-md-2">
                                        <label for="exampleFormControlTextarea1">Enable weekly Fee</label>
                                        <select class="form-control" name="enable_week_fee" id="enable_week_fee">
                                            <option value="0">Disable</option>
                                            <option value="1">Enable</option>
                                        </select>

                                    </div>
                                </div>


                            </div>
                            <div class="row">
                                <div class="form-group col-md-4">
                                    <label for="exampleFormControlTextarea1">Max Students*</label>
                                    <input type="text" class="form-control" id="max_students" name="max_students" placeholder="Max Students" required>
                                </div>
                                <div class="form-group col-md-8">
                                    <label for="exampleFormControlTextarea1">Trainer Name*</label>
                                    <input type="text" class="form-control" id="trainer_name" name="trainer_name" placeholder="Trainer Name" required>
                                </div>

                            </div>

                            <button type="submit" class="btn btn-primary"><span class="cil-contrast btn-icon mr-2"></span>
                                Submit
                            </button>
                        </form>


                    </div>
                </div>
            </div>
        </div>
    </div>


    <!--Edit Grade Modal -->
    <div class="modal fade" id="editClassModel" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Edit Class</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form  method="POST" action="{{route('admin.class.updateClass')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Title</label>
                            <input type="text" class="form-control" id="titleClassEdit" name="title" placeholder="Title" required>
                            <input type="hidden" class="form-control" id="idClassEdit" name="id" placeholder="Title" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Description</label>
                            <textarea class="form-control" id="descriptionClassEdit" name="description" rows="3" required>Description</textarea>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="exampleFormControlTextarea1">Year</label>
                                    <input type="text" class="form-control" id="class_yearClassEdit" name="class_year" placeholder="Year" required>
                                </div>
                                <div class="col-md-4">
                                    <label for="exampleFormControlTextarea1">Day</label>
                                    <select class="form-control" id="class_dateClassEdit" name="class_date" required>

                                    </select>

                                </div>
                                <div class="col-md-4">
                                    <label for="exampleFormControlTextarea1">Time</label>
                                    <input type="time" class="form-control" id="class_timeClassEdit" name="class_time" placeholder="Time" required>
                                </div>
                            </div>


                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="exampleFormControlTextarea1">Monthly Fee</label>
                                    <input type="text" class="form-control" id="fee_monthlyClassEdit" name="fee_monthly" placeholder="Monthly Fee" required>
                                </div>

                                <div class="col-md-6">
                                    <label for="exampleFormControlTextarea1">Weekly Fee</label>
                                    <input type="text" class="form-control" id="fee_weeklyClassEdit" name="fee_weekly" placeholder="Weekly Fee" required>
                                </div>
                            </div>


                        </div>

                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Max Students</label>
                            <input type="text" class="form-control" id="max_studentsClassEdit" name="max_students" placeholder="Max Students" required>
                        </div>

                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Status</label>
                            <select id="editClassStatus"  class="form-control"  name="status">

                            </select>
                        </div>


                        <button type="submit" class="btn btn-primary"><span class="cil-contrast btn-icon mr-2"></span>
                            Submit
                        </button>
                    </form>


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    {{--                    <button type="button" class="btn btn-primary">Save changes</button>--}}
                </div>
            </div>
        </div>
    </div>



    <script>

        $("#enable_week_fee").change(function () {
            if($('#enable_week_fee').val()== '1'){
                $("#fee_weekly").prop('disabled', false);
            }else{
                $("#fee_weekly").prop('disabled', true);
            }
        });
        $(document).ready( function () {
            if($('#enable_week_fee').val()== '1'){
                $("#fee_weekly").prop('disabled', false);
            }else{
                $("#fee_weekly").prop('disabled', true);
            }




            var table = $('#lms_class_datatable').DataTable({
                responsive: true,
                processing: true,
                serverSide: true,
                scrollX: true,
                ajax: "{!! route('admin.class.getData_classes') !!}",
                columns: [
                    { data: 'grade' },
                    { data: 'title' },
                    { data: 'description' },
                    { data: 'fee_monthly' },
                    { data: 'fee_weekly' },
                    { data: 'class_year' },
                    { data: 'class_date' },
                    { data: 'class_time' },
                    { data: 'max_students' },
                    { data: 'status' },
                    { data: 'action' }
                ],


                pageLength:50,
                lengthMenu:[[10,25,50,100,500,-1],[10,25,50,100,500,"All"]],
            });
        });
    </script>

@endsection
