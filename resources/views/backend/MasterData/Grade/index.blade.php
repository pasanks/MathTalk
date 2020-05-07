@extends('backend.layouts.app')

@section('title', app_name() . ' | ' . __('Grade Management'))

@section('content')
    <div id="ui-view"><div><div class="fade-in">
                <div class="card">

                    <div class="card-header">
                        <div class="page_title"><i class="fas fa-user-friends page_title_icon"></i> Grades</div>
                        <div class="float-right">
{{--                            <a href="{{ route('admin.agents.create') }}" type="button" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i> Create Agent</a>--}}
                            <button type="button" class="btn btn-outline-primary btn-sm" data-toggle="modal" data-target="#createGradeModel">
                               Add New Grade
                            </button>
                        </div>
                    </div>
                    <div class="card-body table-responsive">

                        <table class="uk-table uk-table-hover uk-table-striped" style="font-size:11.5px;width: 100%"  id="lms_grade_datatable">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Grade</th>
                                <th>Description</th>
                                <th>Status</th>
                                <th>Created At</th>
                                <th>Edit</th>
                            </tr>
                            </thead>
                        </table>

                    </div>
                </div>
            </div></div></div>

    <!--Create Grade Modal -->
    <div class="modal fade" id="createGradeModel" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Add New Grade</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form  method="POST" action="{{route('admin.grade.store')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Grade Title</label>
                            <input type="text" class="form-control" id="grade" name="grade" placeholder="Grade Title" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Description</label>
                            <textarea class="form-control" id="description" name="description" rows="3" required>Description</textarea>
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

    <!--Edit Grade Modal -->
    <div class="modal fade" id="editGradeModel" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Edit Grade</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form  method="POST" action="{{route('admin.grade.updateGrade')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Grade Title</label>
                            <input type="text" class="form-control" id="editGrade" name="grade" placeholder="Grade Title" required>
                            <input type="hidden" class="form-control" id="editGradeID" name="id" placeholder="id" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Description</label>
                            <textarea class="form-control" id="editDescription" name="description" rows="3" required>Description</textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Status</label>
                          <select id="editGradeStatus"  class="form-control"  name="status">

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


        $(document).ready( function () {



            var table = $('#lms_grade_datatable').DataTable({
                responsive: true,
                processing: true,
                serverSide: true,
                scrollX: true,
                ajax: "{!! route('admin.grade.getData_grades') !!}",
                columns: [
                    { data: 'id' },
                    { data: 'grade' },
                    { data: 'description' },
                    { data: 'status' },
                    { data: 'created_at' },
                    { data: 'action' }
                ],
                pageLength:50,
                lengthMenu:[[10,25,50,100,500,-1],[10,25,50,100,500,"All"]],
            });
        });
    </script>

@endsection
