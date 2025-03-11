@extends('layout_admin.master')
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
<div id="page-wrapper" style="   color:black; height: 500px;
    overflow: auto;">
            <div class="containerr" style="color:black;">
            <h4 class="h44 gf">تعديل التسجيل على الدورة     </h4>
            <form action="{{url('course_enrollments/update',$data->id)}}" method="post" enctype="multipart/form-data" style="padding: 20px;color: black;">
            @csrf
            @method('PUT')
                      <div class="roww">



                            <div class="input-groupp">
                            <h4 style="text-align:right;">  السنة التدريبية</h4>
                            <select name="bimar_training_year_id" id="bimar_training_year_id" class="@error('bimar_training_year_id') is-invalid @enderror">
                         <option>اختر السنة التدريبية</option>
                             @foreach ($years as $year)
                             <option value="{{ $year->id}}" {{ $year->id == $data->bimar_training_year_id ? 'selected' : '' }}>
                               {{ $year->tr_year_name }}
                               </option>
                             @endforeach



                        </select>
                        @error('bimar_training_year_id')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror

                            </div>
                            <h4 style="text-align:right;">  البرنامج التدريبية</h4>
                            <div class="input-groupp input-groupp-icon">

    <select name="bimar_training_program_id" id="bimar_training_program_id" class="@error('bimar_training_program_id') is-invalid @enderror">
        <option value="">اختر البرنامج التدريبي</option>
        @foreach ($programs as $program)
            <option value="{{ $program->id }}" {{ $program->id == $data->bimar_training_program_id ? 'selected' : '' }}>
                {{ $program->tr_program_name_ar }}
            </option>
        @endforeach
    </select>
    @error('bimar_training_program_id')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
</div>
<h4 style="text-align:right;">  الكورس التدريبية</h4>
<div class="input-groupp input-groupp-icon">
    <select id="bimar_training_course_id" name="bimar_training_course_id" class="form-control @error('bimar_training_course_id') is-invalid @enderror">
        @if($my_course)
            <option value="{{ $my_course->id }}" selected>{{ $my_course->tr_course_name_ar }}</option>
        @else
            <option value="">-- اختر الكورس التدريبي --</option>
        @endif
    </select>
    @error('bimar_training_course_id')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
</div>




<h4 style="text-align:right;">رقم(ترتيب) الدورة التدريبية</h4>

                        {{-- <div class="input-groupp input-groupp-icon">
                            <div class="input-icon"><i class="fa-solid fa-arrow-up-9-1"></i></div>
                          <input type="number" placeholder="رقم(ترتيب) الدورة التدريبية" name="tr_course_enrol_arrangement" value="{{$data-> tr_course_enrol_arrangement}}" class="@error('tr_course_enrol_arrangement') is-invalid @enderror"/>
                          @error('tr_course_enrol_arrangement')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                        </div> --}}
                        <h4 style="text-align:right;">نسبة الحسم على الدورة</h4>

                        <div class="input-groupp input-groupp-icon">
                        <div class="input-icon"><i class="fa-solid fa-tag"></i></div>

                          <input type="number" placeholder="نسبة الحسم على الدورة" name="tr_course_enrol_discount" value="{{$data-> tr_course_enrol_discount}}"/>
                        </div>
                        <h4 style="text-align:right;">الوصف   </h4>

                        <div class="input-groupp input-groupp-icon">

                        <textarea name="tr_course_enrol_desc" id="tr_course_enrol_desc" row="4" col="12"   style="    width: 100%;    text-align: end;background-color: #f9f9f9;
    border: 1px solid #e5e5e5;
    color: black;">{{$data-> tr_course_enrol_desc}}</textarea></div>

                          <h4 style="text-align:right;">تاريخ بداية التسجيل </h4>

                        <div class="input-groupp input-groupp-icon">
                          <input type="date" placeholder="تاريخ بداية التسجيل" style="padding-bottom: 0;" name="tr_course_enrol_reg_start_date" value="{{$data-> tr_course_enrol_reg_start_date}}"/>
                          <div class="input-icon"><i class="fa-solid fa-calendar-days"></i></div>
                        </div>
                        <h4 style="text-align:right;">تاريخ نهاية التسجيل </h4>

                        <div class="input-groupp input-groupp-icon">
                            <input type="date" placeholder="تاريخ نهاية التسجيل" style="padding-bottom: 0;" name="tr_course_enrol_reg_end_date" value="{{$data-> tr_course_enrol_reg_end_date}}"/>
                            <div class="input-icon"><i class="fa-solid fa-calendar-days"></i></div>
                          </div>
                          <h4 style="text-align:right;">تاريخ بداية الجلسات </h4>

                          <div class="input-groupp input-groupp-icon">
                            <input type="date" placeholder="تاريخ بداية الجلسات" style="padding-bottom: 0;" name="tr_course_enrol_session_start_date" value="{{$data-> tr_course_enrol_session_start_date}}"/>
                            <div class="input-icon"><i class="fa-solid fa-calendar-days"></i></div>
                          </div>
                          <h4 style="text-align:right;">تاريخ نهاية الجلسات </h4>

                          <div class="input-groupp input-groupp-icon">
                            <input type="date" placeholder="تاريخ نهاية الجلسات" style="padding-bottom: 0;" name="tr_course_enrol_session_end_date" value="{{$data-> tr_course_enrol_session_end_date}}"/>
                            <div class="input-icon"><i class="fa-solid fa-calendar-days"></i></div>
                          </div>
                          <h4 style="text-align:right;">علامة المحصلة النهائية</h4>

                          <div class="input-groupp input-groupp-icon">
                            <input type="number" placeholder="علامة المحصلة النهائية" name="tr_course_enrol_mark" value="{{$data-> tr_course_enrol_mark}}"/>
                            <div class="input-icon"><i class="fa-solid fa-gauge-simple"></i></div>

                        </div>
                        <h4 style="text-align:right;">علامة الامتحان النهائي </h4>

                          <div class="input-groupp input-groupp-icon">
                            <input type="text" placeholder="علامة الامتحان النهائي " name="tr_course_enrol_oralmark" value="{{$data-> tr_course_enrol_oralmark}}"/>
                            <div class="input-icon"><i class="fa-solid fa-gauge-simple"></i></div>

                        </div>
                        <h4 style="text-align:right;">علامة الشفهي </h4>

                          <div class="input-groupp input-groupp-icon">
                          <input type="text" placeholder="علامة الشفهي  " name="tr_course_enrol_finalmark" value="{{$data-> tr_course_enrol_finalmark}}"/>
                          <div class="input-icon"><i class="fa-solid fa-gauge-simple"></i></div>

                        </div>
                        <h4 style="text-align:right;">رسوم التسجيل</h4>

                        <div class="input-groupp input-groupp-icon">
                            <input type="text" placeholder="رسوم التسجيل" name="tr_course_enrol_price" value="{{$data-> tr_course_enrol_price}}"/>
                            <div class="input-icon"><i class="fa-solid fa-money-bill"></i></div>

                        </div>
                        <h4 style="text-align:right;">عدد الساعات التدريبية </h4>

                          <div class="input-groupp input-groupp-icon">
                            <input type="text" placeholder="عدد الساعات التدريبية " name="tr_course_enrol_hours" value="{{$data-> tr_course_enrol_hours}}"/>
                            <div class="input-icon"><i class="fa-sharp fa-solid fa-calendar-week" ></i></div>

                        </div>
                          <h4 style="text-align:right;">عدد الجلسات التدريبية </h4>

                          <div class="input-groupp input-groupp-icon">
                            <input type="text" placeholder="عدد الجلسات التدريبية " name="tr_course_enrol_sessions" value="{{$data-> tr_course_enrol_sessions}}"/>
                            <div class="input-icon"><i class="fa-sharp fa-solid fa-calendar-week" ></i></div>

                        </div>
                        <div class="input-groupp input-groupp-icon">
                        <h4 style="text-align:right;">  نوع التدريب </h4>
                        <select name="bimar_training_type_id" id="bimar_training_type_id" class="@error('bimar_training_type_id') is-invalid @enderror">
                         <option>اختر  نوع التدريب</option>
                             @foreach ($types as $type)
                               <option value="{{ $type->id}}" {{ $type->id == $data->bimar_training_type_id ? 'selected' : '' }}>
                               {{ $type->tr_type_name_ar }}
                               </option>

                             @endforeach

                        </select>
                        @error('bimar_training_type_id')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror


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
    console.log("JavaScript is loaded and ready");
    // باقي الكود هنا...
});

$(document).ready(function () {
    function loadCourses(programId, selectedCourseId = null) {
    console.log("Loading courses for program ID:", programId);
    $.ajax({
        url: "{{ route('getcourse') }}",
        type: "get",
        data: { bimar_training_program_id: programId },
        success: function (result) {
            console.log("Courses received:", result);
            $('#bimar_training_course_id').html('<option value="">-- اختر الكورس التدريبي --</option>');
            $.each(result, function (key, value) {
                // استخدم خاصية 'name' بدلاً من 'tr_course_name_ar' لعرض اسم الكورس
                let selected = (value.id == selectedCourseId) ? 'selected' : '';
                $('#bimar_training_course_id').append('<option value="' + value.id + '" ' + selected + '>' + value.name + '</option>');
            });
        },
        error: function (xhr, status, error) {
            console.error("AJAX error:", status, error);
        }
    });
}


    // تحميل الكورسات عند فتح الصفحة بناءً على البرنامج المخزن
    let programId = "{{ $data->bimar_training_program_id }}";
    let courseId = "{{ $data->bimar_training_course_id }}";
    if (programId) {
        loadCourses(programId, courseId);
    }

    // تحميل الكورسات عند تغيير البرنامج
    $('#bimar_training_program_id').on('change', function () {
        let programId = this.value;
        loadCourses(programId);
    });
});
</script>


@endsection
