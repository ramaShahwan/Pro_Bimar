@extends('layout_trainer.mester')
@section('content')
<style>
     .body{
    color: #403e3e;
}
.input-groupp-icon input {
    text-align: end;
    color: black;
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
    .aa{
        width: 100%;
    padding: 1em;
    line-height: 1.4;
    background-color: #f9f9f9;
    border: 1px solid #e5e5e5;
    border-radius: 3px;
    -webkit-transition: 0.35s ease-in-out;
    -moz-transition: 0.35s ease-in-out;
    -o-transition: 0.35s ease-in-out;
    transition: 0.35s ease-in-out;
    transition: all 0.35s ease-in-out;
    text-align: center;
    display: inline-block;
    color: black;
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
<div id="page-wrapper" style="   color:black; height: 610px;
    overflow: auto;">
            <div class="containerr">
            <h4 class="h44 gf" style="color:black;font-size: 23px;">   تفاصيل التسجيل على الدورة  </h4>

            <form style="padding: 20px;color: black;">

                      <div class="roww">

                        <h4 style="text-align: end;">السنة   </h4>
                        <div class="input-groupp input-groupp-icon">

                            <div class="input-icon"><i class="fa-sharp fa-solid fa-calendar-week"></i></div>
                          <input type="text" placeholder=" " name="bimar_training_year_id" value="{{$data-> bimar_training_year->tr_year_name ?? 'اسم غير متاح'}}" readonly />

                        </div>
                        <h4 style="text-align: end;">البرنامج تدريبي   </h4>
                        <div class="input-groupp input-groupp-icon">

                            <div class="input-icon"><i class="fa-sharp fa-solid fa-calendar-week"></i></div>
                          <input type="text" placeholder=" " name="bimar_training_program_id" value="{{$data-> bimar_training_program->tr_program_name_ar ?? 'اسم غير متاح'}}" readonly />

                        </div>
                        <h4 style="text-align: end;">الكورس التدريبي   </h4>
                        <div class="input-groupp input-groupp-icon">

                            <div class="input-icon"><i class="fa-sharp fa-solid fa-calendar-week"></i></div>
                          <input type="text" placeholder=" " name="bimar_training_course_id" value="{{$data-> bimar_training_course->tr_course_name_ar ?? 'اسم غير متاح'}}" readonly />

                        </div>
                        <h4 style="text-align: end;">رقم(ترتيب) الدورة التدريبية   </h4>
                        <div class="input-groupp input-groupp-icon">

                            <div class="input-icon"><i class="fa-sharp fa-solid fa-calendar-week"></i></div>
                          <input type="number" placeholder="رقم(ترتيب) الدورة التدريبية" name="tr_course_enrol_arrangement" value="{{$data-> tr_course_enrol_arrangement}}" readonly />

                        </div>
                        <h4 style="text-align: end;">   نسبة الحسم على الدورة</h4>
                        <div class="input-groupp input-groupp-icon">

                          <input type="number" placeholder="نسبة الحسم على الدورة" name="tr_course_enrol_discount" value="{{$data-> tr_course_enrol_discount}}" readonly />
                          <div class="input-icon"><i class="fa-sharp fa-solid fa-calendar-week"></i></div>
                        </div>
                        <h4 style="text-align: end;">الوصف   </h4>
                        <div class="input-groupp input-groupp-icon">
<textarea name="" id="" row="4" col="12" readonly  style="    width: 100%;    text-align: end;background-color: #f9f9f9;
    border: 1px solid #e5e5e5;
    color: black;">{{$data-> tr_course_enrol_desc}}</textarea>
                            <!-- <input type="text" placeholder="الوصف" name="tr_course_enrol_desc" value="{{$data-> tr_course_enrol_desc}}" readonly />
                            <div class="input-icon"><i class="fa-sharp fa-solid fa-calendar-week"></i></div> -->

                        </div>
                          <h4 style="text-align: end;">تاريخ بداية التسجيل </h4>
                        <div class="input-groupp input-groupp-icon">

                          <input type="date" placeholder="تاريخ بداية التسجيل" style="padding-bottom: 0;" name="tr_course_enrol_reg_start_date" value="{{$data-> tr_course_enrol_reg_start_date}}" readonly />
                          <div class="input-icon"><i class="fa-solid fa-calendar-days"></i></div>
                        </div>
                        <h4 style="text-align: end;">تاريخ نهاية التسجيل </h4>
                        <div class="input-groupp input-groupp-icon">

                            <input type="date" placeholder="تاريخ نهاية التسجيل" style="padding-bottom: 0;" name="tr_course_enrol_reg_end_date" value="{{$data-> tr_course_enrol_reg_end_date}}" readonly />
                            <div class="input-icon"><i class="fa-solid fa-calendar-days"></i></div>
                          </div>
                          <h4 style="text-align: end;">تاريخ بداية الجلسات </h4>
                          <div class="input-groupp input-groupp-icon">

                            <input type="date" placeholder="تاريخ بداية الجلسات" style="padding-bottom: 0;" name="tr_course_enrol_session_start_date" value="{{$data-> tr_course_enrol_session_start_date}}" readonly />
                            <div class="input-icon"><i class="fa-solid fa-calendar-days"></i></div>
                          </div>
                          <h4 style="text-align: end;">تاريخ نهاية الجلسات </h4>
                          <div class="input-groupp input-groupp-icon">

                            <input type="date" placeholder="تاريخ نهاية الجلسات" style="padding-bottom: 0;" name="tr_course_enrol_session_end_date" value="{{$data-> tr_course_enrol_session_end_date}}" readonly />
                            <div class="input-icon"><i class="fa-solid fa-calendar-days"></i></div>
                          </div>
                          <h4 style="text-align: end;"> علامة المحصلة النهائية </h4>
                          <div class="input-groupp input-groupp-icon">

                            <input type="number" placeholder="علامة المحصلة النهائية" name="tr_course_enrol_mark" value="{{$data-> tr_course_enrol_mark}}" readonly />
                            <div class="input-icon"><i class="fa-sharp fa-solid fa-calendar-week"></i></div>
                          </div>
                          <h4 style="text-align: end;">علامة الامتحان النهائي    </h4>
                          <div class="input-groupp input-groupp-icon">

                            <input type="text" placeholder="علامة الامتحان النهائي " name="tr_course_enrol_oralmark" value="{{$data-> tr_course_enrol_oralmark}}" readonly />
                            <div class="input-icon"><i class="fa-sharp fa-solid fa-calendar-week"></i></div>
                          </div>
                          <h4 style="text-align: end;">علامة الشفهي     </h4>
                          <div class="input-groupp input-groupp-icon">

                          <input type="text" placeholder="علامة الشفهي  " name="tr_course_enrol_finalmark" value="{{$data-> tr_course_enrol_finalmark}}" readonly />
                          <div class="input-icon"><i class="fa-sharp fa-solid fa-calendar-week"></i></div>
                        </div>
                        <h4 style="text-align: end;">رسوم التسجيل   </h4>
                        <div class="input-groupp input-groupp-icon">

                            <input type="text" placeholder="رسوم التسجيل" name="tr_course_enrol_price" value="{{$data-> tr_course_enrol_price}}" readonly />
                            <div class="input-icon"><i class="fa-sharp fa-solid fa-calendar-week"></i></div>
                          </div>
                          <h4 style="text-align: end;">عدد الساعات التدريبية    </h4>
                        <div class="input-groupp input-groupp-icon">

                            <input type="text" placeholder="عدد الساعات التدريبية " name="tr_course_enrol_hours" value="{{$data-> tr_course_enrol_hours}}" readonly />
                            <div class="input-icon"><i class="fa-sharp fa-solid fa-calendar-week"></i></div>
                          </div>
                          <h4 style="text-align: end;">عدد الجلسات التدريبية    </h4>
                        <div class="input-groupp input-groupp-icon">

                            <input type="text" placeholder="عدد الجلسات التدريبية " name="tr_course_enrol_sessions" value="{{$data-> tr_course_enrol_sessions}}" readonly />
                            <div class="input-icon"><i class="fa-sharp fa-solid fa-calendar-week"></i></div>
                          </div>
                          <h4 style="text-align: end;">نوع التدريب   </h4>
                          <div class="input-groupp input-groupp-icon">

                            <input type="text"  name="bimar_training_type_id" value="{{$data-> bimar_training_type->tr_type_name_ar?? 'اسم غير متاح'}}" readonly />
                            <div class="input-icon"><i class="fa-sharp fa-solid fa-calendar-week"></i></div>
                          </div>

                      </div>


                      <div class="roww">
                        <h4 style="text-align: end;">حالة الدورة</h4>
                        <div class="input-groupp input-groupp-icon">
                            <input type="text"  name="tr_course_enrol_status" value="{{$data-> tr_course_enrol_status ? 'مفتوحة' : 'مغلقة '}}" readonly />
                            <div class="input-icon"><i class="fa-sharp fa-solid fa-calendar-week"></i></div>
                          </div>

                      </div>

                      <div class="roww">
                       <!-- <input type="submit" value="حفظ" class="bttn"> -->
<a href="{{ route('getmycourse') }}" class="bttn aa"> العودة للخلف</a>
                      </div>
                    </form>
              </div>


        </div>



@endsection
