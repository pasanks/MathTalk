@extends('backend.layouts.app')

@section('title', app_name() . ' | ' . __('Class Sessions Management'))

@section('content')
    <div id="ui-view">
        <div>
            <div class="fade-in">
                <div class="card">

                    <div class="card-header">
                        <div class="page_title"><i class="fas fa-user-friends page_title_icon"></i>Create New Class Session  </div>
                        <div class="float-right">
                            {{--                            <a href="{{ route('admin.agents.create') }}" type="button" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i> Create Agent</a>--}}
{{--                            <button type="button" class="btn btn-outline-primary btn-sm" data-toggle="modal" data-target="#createClassModel">--}}
{{--                                Add New Class--}}
{{--                            </button>--}}
                        </div>
                    </div>
                    <div class="card-body">
                        <form  method="POST" action="{{route('admin.class_session.store')}}" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="form-group col-md-4">
                                    <label for="exampleFormControlInput1">Class*</label>
                                    <select class="form-control" id="class_id" name="class_id" required>
                                        @foreach($classes as $classVal)
                                            <option value="{{$classVal->id}}">{{$classVal->title}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group  col-md-8">
                                    <label for="exampleFormControlTextarea1">Session Title* <span style="font-size: 10.5px"> (This will appear in the website)</span></label>
                                    <input type="text" class="form-control" id="session_title" name="session_title"
                                           placeholder="Session Title to appear in the web site" required>
                                </div>
                            </div>
{{--                            <div class="form-group">--}}
{{--                                <label for="exampleFormControlTextarea1">Description*<span style="font-size: 10.5px"> (This will appear in the course details page)</span></label>--}}
{{--                                <textarea class="form-control" id="description" name="description" rows="3" required>Description</textarea>--}}
{{--                            </div>--}}
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-2">
                                        <label for="exampleFormControlTextarea1">Use same fees defined in class*</label>
                                        <select class="form-control" name="use_class_fees" id="use_class_fees" >
                                            <option value="1" selected>Yes</option>
                                            <option value="0">No</option>
                                        </select>

                                    </div>
{{--                                    <div class="col-md-2">--}}
{{--                                        <label for="exampleFormControlTextarea1">Use same dates defined in class*</label>--}}
{{--                                        <select class="form-control" name="use_class_dates" id="use_class_dates">--}}
{{--                                            <option value="1" selected>Yes</option>--}}
{{--                                            <option value="0">No</option>--}}
{{--                                        </select>--}}

{{--                                    </div>--}}
                                </div>
                            </div>
                            <div class="form-group" id="feeSection" style="display: none">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="exampleFormControlTextarea1">Monthly Fee*</label>
                                        <input type="text" class="form-control" id="monthly_fee" name="monthly_fee" placeholder="Monthly Fee" >
                                    </div>

                                    <div class="col-md-4">
                                        <label for="exampleFormControlTextarea1">Weekly Fee</label>
                                        <input type="text" class="form-control" id="weekly_fee" name="weekly_fee" placeholder="Weekly Fee" >
                                    </div>
                                    <div class="col-md-2">
                                        <label for="exampleFormControlTextarea1">Enable weekly Fee</label>
                                        <select class="form-control" name="enable_weekly_fee" id="enable_weekly_fee">
                                            <option value="0">Disable</option>
                                            <option value="1">Enable</option>
                                        </select>

                                    </div>
                                </div>


                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-2">
                                        <label for="exampleFormControlTextarea1">Use same dates defined in class*</label>
                                        <select class="form-control" name="use_class_dates" id="use_class_dates">
                                            <option value="1" selected>Yes</option>
                                            <option value="0">No</option>
                                        </select>

                                    </div>
                                </div>
                            </div>
                            <div class="form-group" id="cDateSection" style="display: none">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label for="exampleFormControlTextarea1">Date*</label>
                                        <input type="date" class="form-control" id="date" name="date" placeholder="Date" >
                                    </div>

                                    <div class="col-md-4">
                                        <label for="exampleFormControlTextarea1">Time*</label>
                                        <input type="time" class="form-control" id="time" name="time" placeholder="Time">
                                    </div>
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





    <script>

        $("#enable_weekly_fee").change(function () {
            if($('#enable_weekly_fee').val()== '1'){
                $("#weekly_fee").prop('disabled', false);
            }else{
                $("#weekly_fee").prop('disabled', true);
            }
        });

        $("#use_class_fees").change(function () {
            if($('#use_class_fees').val()== '0'){
                $("#feeSection").show(500);
            }else{
                $("#feeSection").hide(500);
            }
        });

        $("#use_class_dates").change(function () {
            if($('#use_class_dates').val()== '0'){
                $("#cDateSection").show(500);
            }else{
                $("#cDateSection").hide(500);
            }
        });


        $(document).ready( function () {

            if($('#enable_weekly_fee').val()== '1'){
                $("#weekly_fee").prop('disabled', false);
            }else{
                $("#weekly_fee").prop('disabled', true);
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
