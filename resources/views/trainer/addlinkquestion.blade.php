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
            <div class="containerr">
            <form action="{{ url('attendance/store') }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="roww">
        <h4>حضور الطلاب</h4>
        @foreach($data as $student)
            <div class="input-groupp input-groupp-icon">
                <input type="text" placeholder="" style="color: black;" value="{{ $student->Bimar_Trainee->trainee_fname_ar }} {{ $student->Bimar_Trainee->trainee_lname_ar }}"  name="" readonly />
                <div class="input-icon" style="pointer-events: auto;">
                    <input type="checkbox" name="bimar_trainee_ids[]" value="{{ $student->Bimar_Trainee->id }}" style="display:block;" class="check">
                </div>

                                         <a href="{{url('assessment/showTrainees',$call->id)}}"><i class="las la-eye" style="font-size: 20px; color: #1cda55;"></i></a>

                                      <a href="{{url('session/index',$call->id)}}"><span class="las la-edit" style="font-size: 30px; color: #3f4046;"></span></a>




            </div>
        @endforeach
        @error('bimar_trainee_ids')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
        <input type="hidden" name="bimar_course_session_id" value="{{ $id }}">

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

@endsection
