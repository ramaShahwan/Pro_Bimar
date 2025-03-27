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
            <div class="containerr">
            <h4 class="h44 gf">تسجيل جديد على دورة  </h4>
            <form action="{{url('course_enrollments/store')}}" method="post" enctype="multipart/form-data" style="padding: 20px;color: black;">
            @csrf
                      <div class="roww">



                            <div class="input-groupp">
                            <select name="bimar_training_year_id" id="bimar_training_year_id" class="@error('bimar_training_year_id') is-invalid @enderror">
                         <option>اختر السنة التدريبية</option>
                             @foreach ($years as $year)
                               <option value="{{ $year->id }}">{{ $year->tr_year_name }}</option>
                             @endforeach
                        </select>


                            </div>
                            @error('bimar_training_year_id')
                        <span class="invalid-feedback" role="alert">
                            <strong style="color:red;">{{ $message }}</strong>
                        </span>
                    @enderror
                            <div class="input-groupp input-groupp-icon">
    <select name="bimar_training_program_id" id="bimar_training_program_id" class="@error('bimar_training_program_id') is-invalid @enderror" aria-label="Default select example">
        <option selected>اختر البرنامج التدريبي</option>
        @foreach ($programs as $program)
            <option value="{{ $program->id }}">{{ $program->tr_program_name_ar }}</option>
        @endforeach
    </select>

</div>
@error('bimar_training_program_id')
        <span class="invalid-feedback" role="alert">
            <strong style="color:red;">{{ $message }}</strong>
        </span>
    @enderror
<div class="input-groupp input-groupp-icon">
    <select id="bimar_training_course_id" name="bimar_training_course_id" class="form-control @error('bimar_training_course_id') is-invalid @enderror">
        <option value="">-- اختر الكورس التدريبي --</option>
    </select>
    @error('bimar_training_course_id')
        <span class="invalid-feedback" role="alert">
            <strong style="color:red;">{{ $message }}</strong>
        </span>
    @enderror
</div>

                        <!-- {{-- <div class="input-groupp input-groupp-icon">
                            <div class="input-icon"><i class="fa-solid fa-arrow-up-9-1"></i></div>
                          <input type="number" placeholder="رقم(ترتيب) الدورة التدريبية" name="tr_course_enrol_arrangement" class="@error('tr_course_enrol_arrangement') is-invalid @enderror"/>
                          @error('tr_course_enrol_arrangement')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                        </div> --}} -->

                        <div class="input-groupp input-groupp-icon">
                          <input type="number" placeholder="نسبة الحسم على الدورة" name="tr_course_enrol_discount" class="@error('tr_course_enrol_discount') is-invalid @enderror" value="{{ old('tr_course_enrol_discount') }}"/>
                          <div class="input-icon"><i class="fa-solid fa-tag"></i></div>
                          @error('tr_course_enrol_discount')
                          <span class="invalid-feedback" role="alert">
                              <strong style="color:red;">{{ $message }}</strong>
                          </span>
                      @enderror
                        </div>

                        <div class="input-groupp input-groupp-icon">
                            <input type="text" placeholder="الوصف" name="tr_course_enrol_desc" class="@error('tr_course_enrol_desc') is-invalid @enderror" value="{{ old('tr_course_enrol_desc') }}"/>
                            <div class="input-icon"><i class="fa-solid fa-audio-description"></i></div>
                            @error('tr_course_enrol_desc')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                          </div>
                          <h4>تاريخ بداية التسجيل </h4>

                        <div class="input-groupp input-groupp-icon">
                          <input type="date" placeholder="تاريخ بداية التسجيل" style="padding-bottom: 0;" name="tr_course_enrol_reg_start_date" value="{{ old('tr_course_enrol_reg_start_date') }}" class="@error('tr_course_enrol_reg_start_date') is-invalid @enderror"/>
                          <div class="input-icon"><i class="fa-solid fa-calendar-days"></i></div>
                          @error('tr_course_enrol_reg_start_date')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                        </div>
                        <h4>تاريخ نهاية التسجيل </h4>

                        <div class="input-groupp input-groupp-icon">
                            <input type="date" placeholder="تاريخ نهاية التسجيل" style="padding-bottom: 0;" name="tr_course_enrol_reg_end_date" value="{{ old('tr_course_enrol_reg_end_date') }}" class="@error('tr_course_enrol_reg_end_date') is-invalid @enderror"/>
                            <div class="input-icon"><i class="fa-solid fa-calendar-days"></i></div>
                            @error('tr_course_enrol_reg_end_date')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                          </div>
                          <h4>تاريخ بداية الجلسات </h4>

                          <div class="input-groupp input-groupp-icon">
                            <input type="date" placeholder="تاريخ بداية الجلسات" style="padding-bottom: 0;" name="tr_course_enrol_session_start_date" value="{{ old('tr_course_enrol_session_start_date') }}" class="@error('tr_course_enrol_session_start_date') is-invalid @enderror"/>
                            <div class="input-icon"><i class="fa-solid fa-calendar-days"></i></div>
                            @error('tr_course_enrol_session_start_date')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                          </div>
                          <h4>تاريخ نهاية الجلسات </h4>

                          <div class="input-groupp input-groupp-icon">
                            <input type="date" placeholder="تاريخ نهاية الجلسات" style="padding-bottom: 0;" value="{{ old('tr_course_enrol_session_end_date') }}"  name="tr_course_enrol_session_end_date" class="@error('tr_course_enrol_session_end_date') is-invalid @enderror"/>
                            <div class="input-icon"><i class="fa-solid fa-calendar-days"></i></div>
                            @error('tr_course_enrol_session_end_date')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                          </div>

                          <div class="input-groupp input-groupp-icon">
                            <input type="number" placeholder="علامة المحصلة النهائية" name="tr_course_enrol_mark" value="{{ old('tr_course_enrol_mark') }}"  class="@error('tr_course_enrol_mark') is-invalid @enderror"/>
                            <div class="input-icon"><i class="fa-solid fa-gauge-simple"></i></div>
                            @error('tr_course_enrol_mark')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                          </div>

                          <div class="input-groupp input-groupp-icon">
                            <input type="text" placeholder="علامة الامتحان النهائي " name="tr_course_enrol_oralmark" value="{{ old('tr_course_enrol_oralmark') }}"  class="@error('tr_course_enrol_oralmark') is-invalid @enderror"/>
                            <div class="input-icon"><i class="fa-solid fa-gauge-simple"></i></div>
                            @error('tr_course_enrol_oralmark')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                          </div>

                          <div class="input-groupp input-groupp-icon">
                          <input type="text" placeholder="علامة الشفهي  " name="tr_course_enrol_finalmark" value="{{ old('tr_course_enrol_finalmark') }}"  class="@error('tr_course_enrol_finalmark') is-invalid @enderror"/>
                          <div class="input-icon"><i class="fa-solid fa-gauge-simple"></i></div>
                          @error('tr_course_enrol_finalmark')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                        </div>

                        <div class="input-groupp input-groupp-icon">
                            <input type="text" placeholder="رسوم التسجيل" name="tr_course_enrol_price" value="{{ old('tr_course_enrol_price') }}"  class="@error('tr_course_enrol_price') is-invalid @enderror"/>
                            <div class="input-icon"><i class="fa-solid fa-money-bill"></i></div>
                            @error('tr_course_enrol_price')
                            <span class="invalid-feedback" role="alert">
                                <strong style="color:red;">{{ $message }}</strong>
                            </span>
                        @enderror
                          </div>
                          <div class="input-groupp input-groupp-icon">
                            <input type="text" placeholder="عدد الساعات التدريبية " name="tr_course_enrol_hours" value="{{ old('tr_course_enrol_hours') }}"  class="@error('tr_course_enrol_hours') is-invalid @enderror"/>
                            <div class="input-icon"><i class="fa-sharp fa-solid fa-calendar-week" ></i></div>
                            @error('tr_course_enrol_hours')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                          </div>
                          <div class="input-groupp input-groupp-icon">
                            <input type="text" placeholder="عدد الجلسات التدريبية " name="tr_course_enrol_sessions" value="{{ old('tr_course_enrol_sessions') }}"  class="@error('tr_course_enrol_sessions') is-invalid @enderror"/>
                            <div class="input-icon"><i class="fa-sharp fa-solid fa-calendar-week" ></i></div>
                            @error('tr_course_enrol_sessions')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                          </div>
                        <div class="input-groupp input-groupp-icon">
                        <select name="bimar_training_type_id" id="bimar_training_type_id"  class="@error('bimar_training_type_id') is-invalid @enderror">
                         <option>اختر  نوع التدريب</option>
                             @foreach ($types as $type)
                               <option value="{{ $type->id }}">{{ $type->tr_type_name_ar }}</option>
                             @endforeach
                        </select>
                        @error('bimar_training_type_id')
                        <span class="invalid-feedback" role="alert">
                            <strong style="color:red;">{{ $message }}</strong>
                        </span>
                    @enderror

                        </div>
                      </div>

                      <div class="roww">
                        <h4>حالة الدورة</h4>
                        <div class="input-groupp" style="display: flex;">
                          <input id="qcard" type="radio" name="tr_course_enrol_status" value="1"   {{ old('tr_course_enrol_status') == '1' ? 'checked' : '' }} />
                          <label for="qcard"><span><i class="fa-solid fa-check"></i>مفتوحة للتسجيل</span></label>
                          <input id="qpaypal" type="radio" name="tr_course_enrol_status" value="0"   {{ old('tr_course_enrol_status') == '1' ? 'checked' : '' }} />
                          <label for="qpaypal"> <span><i class="fa-solid fa-xmark"></i>مغلقة </span></label>
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

@endsection
