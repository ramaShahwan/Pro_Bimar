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
    .gf{
            background: #23a794;
            padding: 10px 0px;
        }
        .h44{
            font-weight: 600;
            color: white;
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
/* .table-bordered > tbody > tr:hover{
    background: #23a794;
    color: white;
} */
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
</style>
<div id="page-wrapper" style="height: 610px;
    overflow: auto;">
            <div class="containerr">
            <h4 class="h44 gf"> حضور الطلاب  </h4>

            <form action="{{ url('attendance/store') }}" method="post" enctype="multipart/form-data" style="padding: 20px;color: black;">
    @csrf
    <div class="roww">
        @foreach($data as $student)
            <div class="input-groupp input-groupp-icon">
                <input type="text" placeholder="" style="color: black;" value="{{ $student->Bimar_Trainee->trainee_fname_ar }} {{ $student->Bimar_Trainee->trainee_lname_ar }}"  name="" readonly />
                <div class="input-icon" style="pointer-events: auto;">
                    <input type="checkbox" name="bimar_trainee_ids[]" value="{{ $student->Bimar_Trainee->id }}" style="display:block;" class="check">
                </div>
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
