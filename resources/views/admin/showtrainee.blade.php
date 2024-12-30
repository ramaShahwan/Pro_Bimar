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

                        <h4 style="color:black;font-size: 23px;">تفاصيل المتدرب </h4>
                        <h4 style="text-align: right;margin-bottom: 12px;"> الاسم بالعربي  </h4>
                         <div class="input-groupp input-groupp-icon">

                            <div class="input-icon"><i class="fa-solid fa-signature"></i></div>
                          <input type="text" placeholder=" " name="trainee_fname_ar" value="{{$data-> trainee_fname_ar}}" readonly />

                        </div>
                        <h4 style="text-align: right;margin-bottom: 12px;"> الاسم بالانكليزي  </h4>
                        <div class="input-groupp input-groupp-icon">

                            <div class="input-icon"><i class="fa-solid fa-signature"></i></div>
                          <input type="text" placeholder=" " name="trainee_fname_en" value="{{$data-> trainee_fname_en}}" readonly />

                        </div>
                        <h4 style="text-align: right;margin-bottom: 12px;"> الكنية بالعربي  </h4>
                        <div class="input-groupp input-groupp-icon">

                            <div class="input-icon"><i class="fa-solid fa-signature"></i></div>
                          <input type="text" placeholder=" " name="trainee_lname_ar" value="{{$data-> trainee_lname_ar}}" readonly />

                        </div>
                        <h4 style="text-align: right;margin-bottom: 12px;"> الكنية بالانكليزي  </h4>
                        <div class="input-groupp input-groupp-icon">

                            <div class="input-icon"><i class="fa-solid fa-signature"></i></div>
                          <input type="text" placeholder=" " name="trainee_lname_en" value="{{$data-> trainee_lname_en}}" readonly />

                        </div>
                        <h4 style="text-align: right;margin-bottom: 12px;"> رقم الموبايل   </h4>
                        <div class="input-groupp input-groupp-icon">

                        <div class="input-icon"><i class="fa-solid fa-phone"></i></div>
                        <input type="text" placeholder=" " name="trainee_mobile" value="{{$data-> trainee_mobile}}" readonly />

                        </div>
                        <h4 style="text-align: right;margin-bottom: 12px;"> البريد الالكتروني   </h4>
                        <div class="input-groupp input-groupp-icon">

                        <div class="input-icon">  <i class="fa-solid fa-envelope"></i></div>
                        <input type="email" placeholder="  " name="trainee_email" value="{{$data-> trainee_email}}" readonly />

                        </div>
                        <h4>   الصورة   </h4>
                        <div class="input-groupp input-groupp-icon">

                        <img src="{{URL::asset('img/trainee/'.$data->trainee_personal_img)}}" width="200px" style="margin-left: 120px;">
                          <!-- <div class="input-icon"><i class="fa-sharp fa-solid fa-calendar-week"></i></div> -->
                        </div>
                        <h4 style="text-align: right; margin-bottom: 12px;"> العنوان   </h4>
                        <div class="input-groupp input-groupp-icon">

                            <input type="text" placeholder="العنوان" name="trainee_address" value="{{$data-> trainee_address}}" readonly />
                            <div class="input-icon"><i class="fa-solid fa-location-dot"></i></div>
                            </div>
                            <h4 style="text-align: right; margin-bottom: 12px;"> الجنس   </h4>
                            <div class="input-groupp input-groupp-icon">

                          <input type="text" placeholder="  " name="bimar_users_gender_id" value="{{$data-> Bimar_User_Gender->tr_users_gender_name_ar ?? 'اسم غير متاح'}}" readonly />
                          <div class="input-icon"><i class="fa-solid fa-user"></i></div>
                        </div>
                        <h4 style="text-align: right; margin-bottom: 12px;"> الحالة   </h4>
                        <div class="input-groupp input-groupp-icon">

                          <input type="text" placeholder="  " name="bimar_users_status_id" value="{{$data-> Bimar_Users_Status->tr_users_status_name_ar ?? 'اسم غير متاح'}}" readonly />
                          <div class="input-icon"><i class="fa-solid fa-signal"></i></div>
                        </div>










                      </div>




                      <div class="roww">
                       <!-- <input type="submit" value="حفظ" class="bttn"> -->
<a href="{{ route('trainee') }}" class="bttn aa"> العودة للخلف</a>
                      </div>
                    </form>
              </div>


        </div>



@endsection
