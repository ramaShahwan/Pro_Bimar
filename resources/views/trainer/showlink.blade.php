@extends('layout_admin.master')
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
</style>
<div id="page-wrapper">
            <div class="containerr">
            <form >

                      <div class="roww">

                        <h4 style="color:black;font-size: 23px;">تفاصيل الرابط الامتحاني </h4>






                            <!-- <input type="text" placeholder="الوصف" name="tr_course_enrol_desc" value="{{$data-> tr_course_enrol_desc}}" readonly />
                            <div class="input-icon"><i class="fa-sharp fa-solid fa-calendar-week"></i></div> -->


                          <h4 style="text-align:right;">  نوع التقييم   </h4>
                        <div class="input-groupp input-groupp-icon">

                          <input type="text" placeholder="  " style="" name="Bimar_Assessment_Type->tr_assessment_type_name_ar" value="{{$data-> Bimar_Assessment_Type->tr_assessment_type_name_ar}}" readonly />
                          <div class="input-icon"><i class="fa-solid fa-calendar-days"></i></div>
                        </div>
                        <h4 style="text-align:right;">حالة التقييم </h4>
                        <div class="input-groupp input-groupp-icon">

                            <input type="text" placeholder="  " style="" name="Bimar_Assessment_Status->tr_assessment_status_name_ar" value="{{$data-> Bimar_Assessment_Status->tr_assessment_status_name_ar}}" readonly />
                            <div class="input-icon"><i class="fa-solid fa-calendar-days"></i></div>
                          </div>
                          <h4 style="text-align:right;">اسم النموذج  </h4>
                        <div class="input-groupp input-groupp-icon">

                            <input type="text" placeholder="  " style="" name="tr_assessment_name" value="{{$data-> tr_assessment_name}}" readonly />
                            <div class="input-icon"><i class="fa-solid fa-calendar-days"></i></div>
                          </div>
                          <h4 style="text-align:right;">عدد الطلاب   </h4>
                        <div class="input-groupp input-groupp-icon">

                            <input type="text" placeholder="  " style="" name="student_count" value="{{ $student_count}}" readonly />
                            <div class="input-icon"><i class="fa-solid fa-calendar-days"></i></div>
                          </div>
                          <h4 style="text-align:right;">تاريخ ووقت بداية التقييم  </h4>
                        <div class="input-groupp input-groupp-icon">

                            <input type="text" placeholder="  " style="" name="tr_assessment_start_time" value="{{$data-> tr_assessment_start_time}}" readonly />
                            <div class="input-icon"><i class="fa-solid fa-calendar-days"></i></div>
                          </div>
                          <h4 style="text-align:right;">تاريخ ووقت نهاية التقييم   </h4>
                        <div class="input-groupp input-groupp-icon">

                            <input type="text" placeholder="  " style="" name="tr_assessment_end_time" value="{{$data-> tr_assessment_end_time}}" readonly />
                            <div class="input-icon"><i class="fa-solid fa-calendar-days"></i></div>
                          </div>
                          <h4 style="text-align:right;">ملاحظات  </h4>
                        <div class="input-groupp input-groupp-icon">
                            <textarea name="tr_assessment_note" id="" row="4" col="12" readonly  style="    width: 100%;    text-align: end;background-color: #f9f9f9;
    border: 1px solid #e5e5e5;
    color: black;">{{$data-> tr_assessment_note}}</textarea>
                          </div>










                      </div>




                      <div class="roww">
                       <!-- <input type="submit" value="حفظ" class="bttn"> -->
<a href="{{url('assessment_tutor/index',$class_id)}}" class="bttn aa"> العودة للخلف</a>
                      </div>

                    </form>
              </div>


        </div>



@endsection
