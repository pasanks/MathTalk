@extends('backend.layouts.app')

@section('title', app_name() . ' | ' . __('Transaction Report'))

@section('content')
    <div id="ui-view"><div><div class="fade-in">
                <div class="card">

                    <div class="card-header">
                        <div class="page_title"><i class="fas fa-user-friends page_title_icon"></i> Transaction Report</div>
                        <div class="float-right">

                        </div>
                    </div>
                    <div class="card-body">

                        <form method="POST" id="tranReport-form" role="form">

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">From Date</label>
                                                <div class='input-group date' id='startDate'>
                                                    <input type='date' class="form-control" id="fromDate"  name="fromDate" placeholder="From Date" required="true">
{{--                                                    <input type='text' class="form-control" id="fromDate"  name="fromDate" placeholder="From Date" required="true">--}}

                                                </div>
                                            </div>

                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">To Date</label>
                                                <div class='input-group date' id='endDate'>
                                                    <input type='date' class="form-control" id="toDate"  name="toDate" placeholder="To Date"/>
{{--                                                    <input type='text' class="form-control" id="toDate"  name="toDate" placeholder="To Date"/>--}}

                                                </div>
                                            </div>
                                        </div>

                                    </div>



                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Reference</label>
                                                <input type="text" class="form-control" id="ref_no" placeholder="Reference Number" name="ref_no">
                                            </div>
                                        </div>

                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Transaction Status</label>
                                                <select class="form-control" id="tran_status" name="tran_status">
                                                    <option value="">All Status</option>
                                                    <option value="PENDING">Pending</option>
                                                    <option value="SUCCESS">Success</option>
                                                    <option value="FAILED">Failed</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Payment Type</label>
                                                <select class="form-control" id="payment_type" name="payment_type">
                                                    <option value="">All Types</option>
                                                    <option value="M">Monthly</option>
                                                    <option value="W">Weekly</option>

                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Class</label>
                                                <select class="form-control" id="class" name="class">
                                                    <option value="">All Classes</option>
                                                    @foreach($classList as $value)
                                                        <option value="{{$value->id}}">{{$value->title}}</option>
                                                        @endforeach

                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Session</label>
                                                <select class="form-control" id="session" name="session">
                                                    <option value="">Select Session</option>


                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <button type="button" class="btn btn-primary" id="btn_rpt">Search</button>
                            <button class="btn btn-danger" type="reset">Reset</button>
                        </form>

                    </div>
                    <div class="card-body table-responsive">

                        <table class="uk-table uk-table-hover uk-table-striped" style="font-size:11.5px;width: 100%"  id="tran_report_datatable">
                            <thead>
                            <tr>
                                <th>Ref</th>
                                <th>Name</th>
                                <th>Phone</th>
                                <th>Email</th>
                                <th>Class</th>
                                <th>Session</th>
                                <th>Amount</th>
                                <th>Status</th>
                                <th>Payment Date</th>
                                <th>DP Ref</th>
                                <th>Tran Mode</th>
                            </tr>
                            </thead>
                        </table>

                    </div>
                </div>
            </div></div></div>


    <script>


        $(document).ready( function () {

            $("#class").change(function() {
                $.ajax({
                    url:  "{!! route('admin.report.sessionList') !!}",
                    type: "get",
                    data: {class_id:$("#class").find(":SELECTED").val() },
                    success: function(a) {
                        $("#session").empty();
                        $("#session").append("<option value=''>All Sessions</option>");
                        $.each(a, function(a, c) {
                            $("#session").append('<option value="' + c.id + '">' + c.session_title + "</option>");
                        });
                    },
                    error: function(a) {
                        console.log("Data Load Error!", a.responseJSON);
                    }
                });
            });
            $("#btn_rpt").click(function(a) {

                table.draw();
            });

            var table = $('#tran_report_datatable').DataTable({
                responsive: true,
                processing: true,
                serverSide: true,
                scrollX: true,
                {{--ajax: "{!! route('admin.report.getData_mainTranReport') !!}",--}}
                ajax: {
                    url:  "{!! route('admin.report.getData_mainTranReport') !!}",
                    data: function(a) {
                        a.fromDate = $("input[name=fromDate]").val();
                        a.toDate = $("input[name=toDate]").val();
                        a.ref_no =  $("input[name=ref_no]").val();
                        a.tran_status = $("#tran_status").find(":SELECTED").val();
                        a.payment_type = $("#payment_type").find(":SELECTED").val();
                        a.class = $("#class").find(":SELECTED").val();
                        a.session = $("#session").find(":SELECTED").val();

                    }
                },
                columns: [
                    { data: 'ref_no' },
                    { data: 'user_name' },
                    { data: 'user_phone' },
                    { data: 'user_email' },
                    { data: 'class' },
                    { data: 'session' },
                    { data: 'amount' },
                    { data: 'tran_status' },
                    { data: 'tran_datetime' },
                    { data: 'transactionid' },
                    { data: 'tran_mode' }
                ],


                pageLength:50,
                lengthMenu:[[10,25,50,100,500,-1],[10,25,50,100,500,"All"]],
            });
        });
    </script>

@endsection
