<button type="button" class="btn btn-outline-primary btn-sm classEditBtn" data-toggle="modal"
        data-target="#editClassModel" value="{{$data->id}}" >
    Edit Class
</button>

<script>
    $('.classEditBtn').unbind().click(function() {
        // $("#editGradeModel").empty();
        $('#idClassEdit').val('');
        $('#titleClassEdit').val('');
        $('#descriptionClassEdit').val('');
        $('#class_dateClassEdit').val('');
        $('#class_yearClassEdit').val('');
        $('#class_timeClassEdit').val('');
        $('#fee_monthlyClassEdit').val('');
        $('#fee_weeklyClassEdit').val('');
        $('#max_studentsClassEdit').val('');
        $('#editClassStatus').val('');
        classID = "";
        classID = $(this).attr("value");
        week = ['Sun','Mon','Tue','Wed','Thu','Fri','Sat'];

        $("#editClassModel").ready(function() {
            $.ajax({
                url: "{{ route('admin.class.getDataForClassEdit') }}",
                type: "get",
                data: {id:classID },
                success: function(a) {

                    $('#idClassEdit').val(a[0]);
                    $('#titleClassEdit').val(a[2]);
                    $('#descriptionClassEdit').val(a[3]);
                    $('#fee_monthlyClassEdit').val(a[4]);
                    $('#fee_weeklyClassEdit').val(a[5]);
                    $('#max_studentsClassEdit').val(a[6]);
                    $('#class_yearClassEdit').val(a[7]);

                    $('#class_timeClassEdit').val(a[9]);
                    $("#class_dateClassEdit").empty();
                    for(i=0;i<week.length;i++){
                        if(a[8] == week[i]){
                            $("#class_dateClassEdit").append('<option value="'+week[i]+'" selected>'+week[i]+'</option>');
                        }
                        $("#class_dateClassEdit").append('<option value="'+week[i]+'" >'+week[i]+'</option>');
                    }

                    $("#editClassStatus").empty();
                    if(a[10]=='0'){
                        $("#editClassStatus").append('<option value="0" selected>Inactive</option>');
                        $("#editClassStatus").append('<option value="1" >Active</option>');
                    }else{
                        $("#editClassStatus").append('<option value="1" selected>Active</option>');
                        $("#editClassStatus").append('<option value="0">Inactive</option>');
                    }


                },
                error: function(a) {
                    console.log("Data Load Error", a.responseJSON);
                }
            });

        });
    });
</script>
