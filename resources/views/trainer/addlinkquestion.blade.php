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
</style>
<div id="page-wrapper">
            <div class="containerr" style="max-width: 100em;">
            <form action="{{ url('question_used/store') }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="roww" style="     direction: rtl; color:black;">


    <div class="card-header" style="text-align: start;font-size: 20px;display: flex;justify-content: space-between;align-items: center;">
                            <h3><i class="las la-question-circle"></i>  الاسئلة الامتحانية </h3>
                            <!-- <a href="add.html" style="background: #007bff;padding: 6px;color: white;"><i class="las la-user-plus"></i> مدرب جديد</a> -->
                        </div>
    <div class="card-block">
        <table class="table table-bordered table-striped table-condensed">
                            <thead style="text-align: center;">
                                <tr>
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

                            @foreach($data as $call)
                                <tr>
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

                                        <a href="{{url('assessment_tutor/edit_question_bank',$call->id)}}"><span class="las la-edit" style="font-size: 30px; color: #3f4046;"></span></a>

                                        <a href="{{url('assessment_tutor/show_question_bank',$call->id)}}"><span class="las la-eye" style="font-size: 30px; color: #1cda55;"></span></a>


                                    </td>

                                </tr>
                                @endforeach

                            </tbody>
                        </table>
</div>


    </div>
    <div class="roww">
        <input type="submit" value="حفظ" class="bttn">
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
