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

    .containerr{
        max-width: 100%;
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
        fieldset {
    padding: .35em .625em .75em;
    margin: 0 2px;
    border: 1px solid #c0c0c0;
    direction: rtl;
    text-align: right;
}
legend {
    width: 140px;
    border:none;
}
.input-groupp-icon input {
    text-align: right;
    padding-right: 4.4em;
}
</style>
<div id="page-wrapper" style="   color:black; height: 610px;
    overflow: auto;">
            <div class="containerr">
            <h4 style="color:black;font-size: 23px;" class="h44 gf">تفاصيل الموظف </h4>

            <form style="padding: 20px;color: black;">

            <fieldset>
    <legend>المعلومات الشخصية</legend>
                      <div class="roww">

                        <!-- <h4>اسم المستخدم    </h4> -->
                        <div class="input-groupp input-groupp-icon"style="    width: 450px;    float: right;
    display: inline-block;">
<h4>اسم المستخدم    </h4>
                            <!-- <div class="input-icon"><i class="fa-sharp fa-solid fa-calendar-week"></i></div> -->
                          <input type="text" placeholder=" " name="tr_user_name" value="{{$data-> tr_user_name}}" readonly />

                        </div>
                        <!-- <h4>الاسم بالعربي   </h4> -->
                        <div class="input-groupp input-groupp-icon" style="    width: 440px;    float: left;
    display: inline-block;">
<h4>الاسم بالعربي   </h4>
                            <!-- <div class="input-icon"><i class="fa-sharp fa-solid fa-calendar-week"></i></div> -->
                          <input type="text" placeholder=" " name="tr_user_fname_ar" value="{{$data-> tr_user_fname_ar}}" readonly />

                        </div>
                        <div class="input-groupp input-groupp-icon"style="    width: 450px;    float: right;
    display: inline-block;">
                        <h4>الاسم بالانكليزي   </h4>

                            <!-- <div class="input-icon"><i class="fa-sharp fa-solid fa-calendar-week"></i></div> -->
                          <input type="text" placeholder=" " name="tr_user_fname_en" value="{{$data-> tr_user_fname_en}}" readonly />

                        </div>
                        <div class="input-groupp input-groupp-icon" style="    width: 440px;    float: left;
    display: inline-block;">
                        <h4>الكنية بالعربي    </h4>

                            <!-- <div class="input-icon"><i class="fa-sharp fa-solid fa-calendar-week"></i></div> -->
                          <input type="text" placeholder=" " name="tr_user_lname_ar" value="{{$data-> tr_user_lname_ar}}" readonly />

                        </div>
                        <div class="input-groupp input-groupp-icon" style="    width: 450px;    float: right;
    display: inline-block;">
                        <h4>الكنية بالانكليزي    </h4>

                            <!-- <div class="input-icon"><i class="fa-sharp fa-solid fa-calendar-week"></i></div> -->
                          <input type="text" placeholder=" " name="tr_user_lname_en" value="{{$data-> tr_user_lname_en}}" readonly />

                        </div>
                        <div class="input-groupp input-groupp-icon" style="     width: 440px;    float: left;
    display: inline-block;">
                        <h4>الجنس   </h4>

                          <input type="text" placeholder=" الجنس "  name="bimar_users_gender_id" value="{{$data-> Bimar_User_Gender->tr_users_gender_name_ar ?? 'اسم غير متاح'}}" readonly />
                          <!-- <div class="input-icon"><i class="fa-solid fa-calendar-days"></i></div> -->
                        </div>
                        <div class="input-groupp input-groupp-icon" style="    width: 450px;    float: right;
    display: inline-block;">
                        <h4>الحالة      </h4>

                            <!-- <div class="input-icon"><i class="fa-sharp fa-solid fa-calendar-week"></i></div> -->
                          <input type="text" placeholder="  الحالة" name="bimar_users_status_id" value="{{$data-> Bimar_Users_Status->tr_users_status_name_ar ?? 'اسم غير متاح'}}" readonly />

                        </div>


                        <div class="input-groupp input-groupp-icon" style="       width: 440px;    float: left;
    display: inline-block;">
                        <h4>الدور       </h4>

                            <!-- <div class="input-icon"><i class="fa-sharp fa-solid fa-calendar-week"></i></div> -->
                          <input type="text" placeholder="الدور  " name="bimar_role_id" value="{{$data-> Bimar_Role->tr_role_name_ar ?? 'اسم غير متاح'}}" readonly />

                        </div>

        </div>
        </fieldset>
        <fieldset style="margin-top: 30px;">
    <legend style="width: 130px;">معلومات الاتصال</legend>
    <div class="roww">
        <div class="input-groupp input-groupp-icon" style="    width: 440px;    float: left;
    display: inline-block;">
                        <h4>رقم الموبايل    </h4>

                            <!-- <div class="input-icon"><i class="fa-sharp fa-solid fa-calendar-week"></i></div> -->
                          <input type="text" placeholder=" " name="tr_user_mobile" value="{{$data-> tr_user_mobile}}" readonly />

                        </div>
                        <div class="input-groupp input-groupp-icon" style="    width: 450px;    float: right;
    display: inline-block;">
                        <h4>رقم الهاتف الارضي    </h4>

                            <!-- <div class="input-icon"><i class="fa-sharp fa-solid fa-calendar-week"></i></div> -->
                          <input type="text" placeholder=" " name="tr_user_phone" value="{{$data-> tr_user_phone}}" readonly />

                        </div>
                        <div class="input-groupp input-groupp-icon" style="    width: 440px;    float: left;
    display: inline-block;">
                        <h4>البريد الالكتروني     </h4>

                            <!-- <div class="input-icon"><i class="fa-sharp fa-solid fa-calendar-week"></i></div> -->
                          <input type="email" placeholder="  " name="tr_user_email" value="{{$data-> tr_user_email}}" readonly />

                        </div>
                        <div class="input-groupp input-groupp-icon"style="    width: 450px;    float: right;
    display: inline-block;">
                        <h4>   الصورة   </h4>

                        <img src="{{URL::asset('img/user/'.$data->tr_user_personal_img)}}" width="200px" style="margin-right: 120px;">
                          <!-- <div class="input-icon"><i class="fa-sharp fa-solid fa-calendar-week"></i></div> -->
                        </div>
                        <div class="input-groupp input-groupp-icon"style="    width: 440px;    float: left;
    display: inline-block;">
                        <h4>العنوان   </h4>

                            <input type="text" placeholder="العنوان" name="tr_user_address" value="{{$data-> tr_user_address}}" readonly />
                            <!-- <div class="input-icon"><i class="fa-sharp fa-solid fa-calendar-week"></i></div> -->
                          </div>
                          </div>

</fieldset>
<fieldset style="margin-top: 30px;">
    <legend style="width: 250px;">معلومات وسائل التواصل الاجتماعي</legend>
    <div class="roww">

                        <div class="input-groupp input-groupp-icon" style="    width: 440px;    float: left;
    display: inline-block;">
                        <h4>رابط صفحة الفيسبوك     </h4>

                            <!-- <div class="input-icon"><i class="fa-sharp fa-solid fa-calendar-week"></i></div> -->
                          <input type="text" placeholder="  رابط صفحة الفيسبوك" name="tr_user_cv_facebook" value="{{$data-> tr_user_cv_facebook}}" readonly />

                        </div>

                        <div class="input-groupp input-groupp-icon" style="    width: 450px;    float: right;
    display: inline-block;">
                        <h4> رابط صفحة اللينكدإن      </h4>

                            <!-- <div class="input-icon"><i class="fa-sharp fa-solid fa-calendar-week"></i></div> -->
                          <input type="text" placeholder="  رابط صفحة اللينكد إن" name="tr_user_cv_linkedin" value="{{$data-> tr_user_cv_linkedin}}" readonly />

                        </div>
                        <div class="input-groupp input-groupp-icon" style="    width: 440px;    float: left;
    display: inline-block;">
                        <h4>   رابط قناة اليوتيوب   </h4>

                            <!-- <div class="input-icon"><i class="fa-sharp fa-solid fa-calendar-week"></i></div> -->
                          <input type="text" placeholder="  رابط قناة اليوتيوب" name="tr_user_cv_youtube" value="{{$data->tr_user_cv_youtube}}" readonly />

                        </div>
                        <div class="input-groupp input-groupp-icon" style="    width: 450px;    float: right;
    display: inline-block;">
                        <h4>رابط صفحة الإنستاغرام     </h4>

                            <!-- <div class="input-icon"><i class="fa-sharp fa-solid fa-calendar-week"></i></div> -->
                          <input type="text" placeholder="  رابط صفحة الإنستاغرام" name="tr_user_cv_instagram" value="{{$data-> tr_user_cv_instagram}}" readonly />

                        </div>
                        </div>

</fieldset>
<fieldset style="margin-top: 30px;">
    <legend style="width: 210px;">الخبرات والمعلومات الأكاديمية</legend>
    <div class="roww">
                        <div class="input-groupp input-groupp-icon" style="    width: 450px;    float: right;
    display: inline-block;">
                        <h4>الدرجة العلمية     </h4>

                            <!-- <div class="input-icon"><i class="fa-sharp fa-solid fa-calendar-week"></i></div> -->
                          <input type="text" placeholder="  الدرجة العلمية" name="bimar_users_academic_degree_id" value="{{$data-> Bimar_User_Academic_Degree->tr_users_degree_name_ar ?? 'اسم غير متاح'}}" readonly />

                        </div>
                        <div class="input-groupp input-groupp-icon" style="    width: 440px;    float: left;
    display: inline-block;">
                        <h4> مؤهلات المدرب (باللغة العربية)  </h4>

                            <!-- <div class="input-icon"><i class="fa-sharp fa-solid fa-calendar-week"></i></div> -->
                          <input type="text" placeholder=" مؤهلات المدرب (باللغة العربية)    " name="tr_user_cv_qualifactions_ar" value="{{$data->tr_user_cv_qualifactions_ar}}" readonly />

                        </div>
                        <div class="input-groupp input-groupp-icon" style="    width: 450px;    float: right;
    display: inline-block;">
                        <h4>مؤهلات المدرب (باللغة الإنكليزية)    </h4>

                            <!-- <div class="input-icon"><i class="fa-sharp fa-solid fa-calendar-week"></i></div> -->
                          <input type="text" placeholder="  مؤهلات المدرب (باللغة الإنكليزية)   " name="tr_user_cv_qualifactions_en" value="{{$data-> tr_user_cv_qualifactions_en}}" readonly />

                        </div>
                        <div class="input-groupp input-groupp-icon" style="    width: 440px;    float: left;
    display: inline-block;">
                        <h4>   خبرات المدرب (باللغة العربية) </h4>

                            <!-- <div class="input-icon"><i class="fa-sharp fa-solid fa-calendar-week"></i></div> -->
                          <input type="text" placeholder="  خبرات المدرب (باللغة العربية) " name="tr_user_cv_experience_ar" value="{{$data->tr_user_cv_experience_ar}}" readonly />

                        </div>
                        <div class="input-groupp input-groupp-icon" style="    width: 450px;    float: right;
    display: inline-block;">
                        <h4>خبرات المدرب (باللغة الإنكليزية) </h4>

                            <!-- <div class="input-icon"><i class="fa-sharp fa-solid fa-calendar-week"></i></div> -->
                          <input type="text" placeholder=" خبرات المدرب (باللغة الإنكليزية)  " name="tr_user_cv_experience_en" value="{{$data-> tr_user_cv_experience_en}}" readonly />

                        </div>
                        <div class="input-groupp input-groupp-icon" style="    width: 440px;    float: left;
    display: inline-block;">
                        <h4>   تخصص المدرب (باللغة العربية)  </h4>

                            <!-- <div class="input-icon"><i class="fa-sharp fa-solid fa-calendar-week"></i></div> -->
                          <input type="text" placeholder="  تخصص المدرب (باللغة العربية)  " name="tr_user_cv_specialization_ar" value="{{$data->tr_user_cv_specialization_ar}}" readonly />

                        </div>
                        <div class="input-groupp input-groupp-icon" style="    width: 450px;    float: right;
    display: inline-block;">
                        <h4>تخصص المدرب (باللغة الإنكليزية)</h4>

                            <!-- <div class="input-icon"><i class="fa-sharp fa-solid fa-calendar-week"></i></div> -->
                          <input type="text" placeholder="  تخصص المدرب (باللغة الإنكليزية) " name="tr_user_cv_specialization_en" value="{{$data-> tr_user_cv_specialization_en}}" readonly />

                        </div>
                        <div class="input-groupp input-groupp-icon" style="    width: 440px;    float: left;
    display: inline-block;">
                        <h4>   معلومات إضافية حول المدرب (باللغة العربية) </h4>

                            <!-- <div class="input-icon"><i class="fa-sharp fa-solid fa-calendar-week"></i></div> -->
                          <input type="text" placeholder="   معلومات إضافية حول المدرب (باللغة العربية) " name="tr_user_cv_other_info_ar" value="{{$data->tr_user_cv_other_info_ar}}" readonly />

                        </div>
                        <div class="input-groupp input-groupp-icon" style="    width: 450px;    float: right;
    display: inline-block;">
                        <h4>معلومات إضافية حول المدرب (باللغة الإنكليزية) </h4>

                            <!-- <div class="input-icon"><i class="fa-sharp fa-solid fa-calendar-week"></i></div> -->
                          <input type="text" placeholder="   معلومات إضافية حول المدرب (باللغة الإنكليزية) " name="tr_user_cv_other_info_en" value="{{$data-> tr_user_cv_other_info_en}}" readonly />

                        </div>












                      </div>

                      </fieldset>


                      <div class="roww">
                       <!-- <input type="submit" value="حفظ" class="bttn"> -->
<a href="{{ route('user') }}" class="bttn aa" style="    border: 1px solid #91d3c9;
    margin-top: 10px;"> العودة للخلف</a>
                      </div>
                    </form>
              </div>


        </div>



@endsection
