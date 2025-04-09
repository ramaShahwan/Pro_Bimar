@extends('layout_trainer.mester')
@section('content')
<style>
     .body{
    color: #403e3e;
}
.input-groupp-icon input {
    text-align: end;
    padding-right: 4.4em;
}
h4{
    text-align: center;
}

    .bbtn{
        border: none;
    padding: 10px;
    background-color: #61baaf;
    color: white;
    border-radius: 20px;
    }
    .bttn:hover{
        background-color: #61baaf;
        color: white;
        font-size: 17px;
        font-weight: 600;
    }
    select{
        width: 100%;
    }
    .check{
        display: block;
    margin-top: 15px !important;
    width: 20px;
    height: 20px;
    margin-left: 15px !important;

    }
    .containerr{
        padding: 0;
        box-shadow: inset 0px 1px 19px 1px #23a794;
    }
    .gf{
            background: #23a794;
            padding: 20px 0px;
        }
        .h44{
            font-weight: 600;
            color: white;
        }
        .form-control{
            height: 3.4em;
            background-color: #f9f9f9;
            border: 2px solid #e5e5e5;
        }
        .active-row {
    background-color: #d4edda;
}
.table-bordered > thead > tr > th,.table-bordered > tbody > tr > td{
    border:none;
}
.table-bordered{
    border:none;
}
.ttr{
    border-bottom: 1px solid #bdd7d3;
}
.ttr:hover{
    background: #23a794c2 !important;
    color: #101010;
    box-shadow: 0px 0px 7px 0px #23a794;
}
.table-striped > tbody > tr:nth-child(odd) > td{
    background:none;
}
.gf{
            background: #23a794;
            padding: 10px 0px;
        }
        .h44{
            font-weight: 600;
            color: white;
        }
</style>
<div id="page-wrapper" style="color:black;height: 610px;
    overflow: auto;">
            <div class="containerr" style="max-width: 100em;">
            <form action="{{ url('question_used/store') }}" method="post" enctype="multipart/form-data" style="padding: 20px;color: black;">
    @csrf
    <div class="roww" style="     direction: rtl; color:black;">


    <div class="card-header" style="text-align: start;font-size: 20px;display: flex;justify-content: space-between;align-items: center;">
                            <h3><i class="las la-question-circle"></i>  الاسئلة الامتحانية </h3>
                            <!-- <a href="add.html" style="background: #007bff;padding: 6px;color: white;"><i class="las la-user-plus"></i> مدرب جديد</a> -->
                        </div>
    <div class="card-block">
        <table class="table table-bordered table-striped table-condensed">
                            <thead style="text-align: center;background: #23a794;
    color: white;">
                                <tr>
                                <th style="text-align: center;">#</th>

                                <th style="padding: 10px; text-align: center; width: 50px;"><input type="checkbox" id="selectAll"style="display:block;"></th> <!-- تحديد الكل -->

                                    <th style="padding: 10px; text-align: center;">نمط السؤال   </th>
                                    <th style="padding: 10px;text-align: center; ">عنوان السؤال  </th>
                                    <th style="padding: 10px;text-align: center;">نص السؤال  </th>
                                    <th style="padding: 10px;text-align: center;">علامة السؤال</th>
                                    <th style="padding: 10px;text-align: center;">وقت وتاريخ انشاء السؤال </th>
                                    <th style="padding: 10px;text-align: center;">وقت وتاريخ تعديل السؤال </th>

                                    <th style="padding: 10px;text-align: center;">الأحداث</th>
                                </tr>
                            </thead>
                            <tbody style="text-align: center;">
                            <?php $i = 1 ?>
                            @foreach($data as $call)
                            <tr class="ttr">
                            <td>{{$i++}}</td>
                                <td>
                    <input type="checkbox" name="bimar_bank_assess_question_ids[]" value="{{ $call->id }}" class="questionCheckbox" style="display:block;">
                </td><input type="hidden" name="bimar_assessment_id" value="{{ $assessment_id }}">
                                <td>{{$call->Bimar_Questions_Type->tr_questions_type_name}}  </td>
                                    <td>{{$call->tr_bank_assess_questions_name}}  </td>
                                    <td>{{$call->tr_bank_assess_questions_body}}</td>
                                    <td>{{$call->tr_bank_assess_questions_grade}}  </td>
                                    <td>{{ \Carbon\Carbon::parse($call->created_at)->timezone('Asia/Damascus')->format('Y-m-d H:i:s') }}
                                    </td>
                                    <td>{{ \Carbon\Carbon::parse($call->created_at)->timezone('Asia/Damascus')->format('Y-m-d H:i:s') }}
  </td>





                                    <td>
                                        <!-- <a href=""><span class="las la-trash-alt" style="font-size: 30px; color: #f00707;"></span></a> -->

                                        <a href="{{url('assessment_tutor/edit_question_bank',$call->id)}}" target="_blank"><span class="las la-edit" style="font-size: 30px; color: #3f4046;"></span></a>

                                        <a href="{{url('assessment_tutor/show_question_bank',$call->id)}}" target="_blank"><span class="las la-eye" style="font-size: 30px; color: #1cda55;"></span></a>


                                    </td>

                                </tr>
                                @endforeach

                            </tbody>
                        </table>
</div>


    </div>
    <div class="roww">
        <input type="submit" value="حفظ" class="bttn" style="border: 2px solid #23a794;">
    </div>
</form>

              </div>


        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
$(document).ready(function () {
    $('#bimar_training_program_id').on('change', function () {
        var programId = $(this).val();
        $("#bimar_training_course_id").html('<option value="">-- اختر الكورس التدريبي --</option>');

        if (programId) {
            $.ajax({
                url: "{{ route('getcourse') }}",
                type: "GET",
                data: { bimar_training_program_id: programId },
                success: function (result) {
                    $.each(result, function (key, value) {
                        $("#bimar_training_course_id").append('<option value="' + value.id + '">' + value.name + '</option>');
                    });
                },
                error: function(xhr, status, error) {
                    console.error("حدث خطأ: " + error);
                    alert("لم يتم جلب الكورسات. تحقق من المسار أو الكود.");
                }
            });
        }
    });
});
</script>
<script>
    document.getElementById('selectAll').addEventListener('change', function() {
        let checkboxes = document.querySelectorAll('.questionCheckbox');
        checkboxes.forEach(checkbox => checkbox.checked = this.checked);
    });
</script>
@endsection
