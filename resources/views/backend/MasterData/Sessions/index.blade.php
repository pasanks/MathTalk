@extends('backend.layouts.app')

@section('title', app_name() . ' | ' . __('Class Session Management'))

@section('content')
    <div id="ui-view"><div><div class="fade-in">
                <div class="card">

                    <div class="card-header">
                        <div class="page_title"><i class="fas fa-user-friends page_title_icon"></i> Class Sessions</div>
                        <div class="float-right">
                            <a href="{{ route('admin.class_session.create') }}" type="button" class="btn btn-primary btn-sm">
                                <i class="fas fa-plus"></i> Create New Class Session
                            </a>

                        </div>
                    </div>
                    <div class="card-body table-responsive">

                        <table class="uk-table uk-table-hover uk-table-striped" style="font-size:11.5px;width: 100%"  id="lms_class_session_datatable">
                            <thead>
                            <tr>
                                <th>Grade</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Monthly Fee</th>
                                <th>Weekly Fee</th>
                                <th>Year</th>
                                <th>Day</th>
                                <th>Time</th>
                                <th>Max Students</th>
                                <th>Status</th>
                                <th>Edit</th>
                            </tr>
                            </thead>
                        </table>

                    </div>
                </div>
            </div></div></div>



    <script>


        $(document).ready( function () {



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
