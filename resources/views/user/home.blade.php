@extends('layout_exam.master')
@section('content')
<link rel="stylesheet" href="{{asset('assets/css/form.css')}}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
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
    .naaa{
        width: 1000px;
    }
    @media screen and (max-width: 398px ){
        .naaa{
        width: 400px;
    }
}
input[type="radio"] {
    display: block;
}
input[type="checkbox"] {
    display: block;
}
.containerr{
        max-width: 100%;
    }
    .jjleft{
        width: 440px;
    }
    .jjright{
        width: 450px;
    }

@media only screen and (max-width: 575px)
{
    .jjleft{
        width: 270px;
    }
    .jjright{
        width: 270px;
    }
}
@media only screen and (max-width: 787px)
{
    .jjleft{
        width: 220px;
    }
    .jjright{
        width: 220px;
    }
}
@media screen and (min-width: 260 ){
        .jjleft{
        width: 220px !important;
    }
    .jjright{
        width: 220px !important;
    }

}
</style>
<div id="page-wrapper" style="color:black;">
@if(session()->has('message'))
        <div class="alert alert-info" role="alert" style="text-align:end;font-size: 20px; ">
          {{session()->get('message')}}
        </div>
@endif
            <div class="containerr" style=" margin-top:4em;margin-bottom: 10px;">

<form action="" method="post" enctype="multipart/form-data">
          @csrf


    <div class="roww">
        <!-- عنوان السؤال -->




        <!-- علامة السؤال -->

        <div class="input-groupp input-groupp-icon jjright" style="     float: right;
    display: inline-block;">
        <h4 style="text-align: right;    margin-bottom: 5px;"> اسم الطالب  </h4>
        <!-- <div class="input-icon"><i class="fa-solid fa-gauge-simple"></i></div> -->

            <input type="text" id="grade" name=""
                   placeholder=" " value="{{$trainee->Bimar_Trainee->trainee_fname_ar}}  {{$trainee->Bimar_Trainee->trainee_lname_ar}}" readonly>
        </div>

<div class="input-groupp input-groupp-icon jjleft"style="      float: left;
    display: inline-block;">
<!-- <div class="input-icon"><i class="fa-solid fa-gauge-simple"></i></div> -->
<h4 style="text-align: right;    margin-bottom: 5px;">اسم البرنامج التدريبي </h4>

    <input type="text" id="grade" name=""
           placeholder=" " value="{{$program->tr_program_name_ar}}" readonly>
</div>

<div class="input-groupp input-groupp-icon jjright"style="     float: right;
    display: inline-block;">
<!-- <div class="input-icon"><i class="fa-solid fa-gauge-simple"></i></div> -->
<h4 style="text-align: right;    margin-bottom: 5px;">اسم الدورة التدريبية</h4>


    <input type="text" id="grade" name=""
           placeholder=" " value="{{$course->tr_course_name_ar}}" readonly>
</div>

<div class="input-groupp input-groupp-icon jjleft"style="    float: left;
    display: inline-block;">
<!-- <div class="input-icon"><i class="fa-solid fa-gauge-simple"></i></div> -->
<h4 style="text-align: right;    margin-bottom: 5px;">اسم المدرب </h4>


    <input type="text" id="grade" name=""
           placeholder=" " value="{{$bimar_user->tr_user_fname_ar}} {{$bimar_user->tr_user_lname_ar}}" readonly>
</div>

<div class="input-groupp input-groupp-icon jjright"style="      float: right;
    display: inline-block;">
<!-- <div class="input-icon"><i class="fa-solid fa-gauge-simple"></i></div> -->
<h4 style="text-align: right;    margin-bottom: 5px;">تاريخ  الامتحان </h4>


    <input type="text" id="grade" name=""
           placeholder=" " value="{{$date}}" readonly>
</div>

<div class="input-groupp input-groupp-icon jjleft"style="     float: left;
    display: inline-block;">
<!-- <div class="input-icon"><i class="fa-solid fa-gauge-simple"></i></div> -->
<h4 style="text-align: right;    margin-bottom: 5px;">وقت بداية الامتحان </h4>


    <input type="text" id="grade" name=""
           placeholder=" " value="{{$start_time}}" readonly>
</div>

<div class="input-groupp input-groupp-icon jjright" style="    float: right;
    display: inline-block;">
<!-- <div class="input-icon"><i class="fa-solid fa-gauge-simple"></i></div> -->
<h4 style="text-align: right;    margin-bottom: 5px;">وقت نهاية الامتحان </h4>


    <input type="text" id="grade" name=""
           placeholder=" " value="{{$end_time}}" readonly>
</div>

<div class="input-groupp input-groupp-icon jjleft" style="      float: left;
    display: inline-block;">
<!-- <div class="input-icon"><i class="fa-solid fa-gauge-simple"></i></div> -->
<h4 style="text-align: right;    margin-bottom: 5px;">عدد الكلي للاسئلة</h4>


    <input type="text" id="grade" name=""
           placeholder=" " value="{{$question_count}}" readonly>
</div>










    </div>


</form>
</div>
</div>
@endsection

