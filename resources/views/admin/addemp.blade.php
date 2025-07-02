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
            <h4 class="h44 gf">موظف جديد</h4>
            <form action="{{url('user/store')}}" method="post" enctype="multipart/form-data" style="padding: 20px;color: black;">
            @csrf


<fieldset>
    <legend>المعلومات الشخصية</legend>
    <div class="roww">
    <div class="input-groupp input-groupp-icon" style="    width: 450px;    float: right;
    display: inline-block;">
                            <div class="input-icon"><i class="fa-solid fa-signature"></i></div>
                          <input type="text" placeholder="الاسم المستخدم  "  name="tr_user_name" id="tr_user_name" class="@error('tr_user_name') is-invalid @enderror" value="{{ old('tr_user_name') }}"/>
                          @error('tr_user_name')
                          <span class="invalid-feedback" role="alert">
                              <strong style="color:red;">{{ $message }}</strong>
                          </span>
                      @enderror
                        </div>
                        <div class="input-groupp input-groupp-icon"style="    width: 440px;    float: left;
    display: inline-block;">
                            <div class="input-icon"><i class="fa-solid fa-signature"></i></div>
                          <input type="text" placeholder="الاسم بالعربي  "  name="tr_user_fname_ar" id="tr_user_fname_ar" class="@error('tr_user_fname_ar') is-invalid @enderror" value="{{ old('tr_user_fname_ar') }}"/>
                          @error('tr_user_fname_ar')
                          <span class="invalid-feedback" role="alert">
                              <strong style="color:red;">{{ $message }}</strong>
                          </span>
                      @enderror
                        </div>
                        <div class="input-groupp input-groupp-icon" style="    width: 450px;    float: right;
    display: inline-block;">
                            <div class="input-icon"><i class="fa-solid fa-signature"></i></div>
                          <input type="text" placeholder="الاسم بالانكليزي  "  name="tr_user_fname_en" id="tr_user_fname_en" class="@error('tr_user_fname_en') is-invalid @enderror" value="{{ old('tr_user_fname_en') }}"/>
                          @error('tr_user_fname_en')
                          <span class="invalid-feedback" role="alert">
                              <strong style="color:red;">{{ $message }}</strong>
                          </span>
                      @enderror
                        </div>
                        <div class="input-groupp input-groupp-icon" style="    width: 440px;    float: left;
    display: inline-block;">
                            <div class="input-icon"><i class="fa-solid fa-signature"></i></div>
                          <input type="text" placeholder="الكنية بالعربي  "  name="tr_user_lname_ar" id="tr_user_lname_ar" class="@error('tr_user_lname_ar') is-invalid @enderror" value="{{ old('tr_user_lname_ar') }}"/>
                          @error('tr_user_lname_ar')
                          <span class="invalid-feedback" role="alert">
                              <strong style="color:red;">{{ $message }}</strong>
                          </span>
                      @enderror
                        </div>
                        <div class="input-groupp input-groupp-icon" style="    width: 450px;    float: right;
    display: inline-block;">
                            <div class="input-icon"><i class="fa-solid fa-signature"></i></div>
                          <input type="text" placeholder="الكنية بالانكليزي  "  name="tr_user_lname_en" id="tr_user_lname_en" class="@error('tr_user_lname_en') is-invalid @enderror" value="{{ old('tr_user_lname_en') }}"/>
                          @error('tr_user_lname_en')
                          <span class="invalid-feedback" role="alert">
                              <strong style="color:red;">{{ $message }}</strong>
                          </span>
                      @enderror
                        </div>
                        <div class="input-groupp" style="width: 140px;
    display: inline-block;    margin-right: 74px;">
                        <select name="bimar_users_gender_id" class="@error('bimar_users_gender_id') is-invalid @enderror">
                         <option value="" disabled selected>اختر الجنس  </option>
                         @foreach ($genders as $gender)


                        <option value="{{ $gender->id }}">{{ $gender->tr_users_gender_name_ar }}</option>
                    @endforeach
                        </select>

                        @error('bimar_users_gender_id')
                        <span class="invalid-feedback" role="alert">
                            <strong style="color:red;">{{ $message }}</strong>
                        </span>
                    @enderror
                            </div>
                            <div class="input-groupp" style="width: 140px;
    display: inline-block;">
                        <select name="bimar_role_id" class="@error('bimar_role_id') is-invalid @enderror">
                         <option value="" disabled selected>اختر الدور   </option>
                         @foreach ($roles as $role)


                        <option value="{{ $role->id }}">{{ $role->tr_role_name_ar }}</option>
                    @endforeach
                        </select>

                        @error('bimar_role_id')
                        <span class="invalid-feedback" role="alert">
                            <strong style="color:red;">{{ $message }}</strong>
                        </span>
                    @enderror
                            </div>

                            <div class="input-groupp" style="width: 150px;
    display: inline-block;">
                        <select name="bimar_users_status_id" class="@error('bimar_users_status_id') is-invalid @enderror">
                         <option value="" disabled selected>اختر حالة المستخدم  </option>
                         @foreach ($statuses as $status)


                        <option value="{{ $status->id }}">{{ $status->tr_users_status_name_ar }}</option>
                    @endforeach
                        </select>

                        @error('bimar_users_status_id')
                        <span class="invalid-feedback" role="alert">
                            <strong style="color:red;">{{ $message }}</strong>
                        </span>
                    @enderror
                            </div>
    </div>
</fieldset>
<fieldset style="margin-top: 30px;">
    <legend style="width: 130px;">معلومات الاتصال</legend>
    <div class="roww">
    <div class="input-groupp input-groupp-icon" style="    width: 440px;    float: left;
    display: inline-block;">
                          <div class="input-icon"><i class="fa-solid fa-phone"></i></div>
                          <input type="text" placeholder="رقم الموبايل   "  name="tr_user_mobile" id="tr_user_mobile" class="@error('tr_user_mobile') is-invalid @enderror" value="{{ old('tr_user_mobile') }}"/>
                          @error('tr_user_mobile')
                          <span class="invalid-feedback" role="alert">
                              <strong style="color:red;">{{ $message }}</strong>
                          </span>
                      @enderror
                        </div>
                        <div class="input-groupp input-groupp-icon" style="    width: 450px;    float: right;
    display: inline-block;">
                          <div class="input-icon"><i class="fa-solid fa-phone"></i></div>
                          <input type="text" placeholder="رقم الهاتف الارضي   "  name="tr_user_phone" id="tr_user_phone" class="@error('tr_user_phone') is-invalid @enderror" value="{{ old('tr_user_phone') }}"/>
                          @error('tr_user_phone')
                          <span class="invalid-feedback" role="alert">
                              <strong style="color:red;">{{ $message }}</strong>
                          </span>
                      @enderror
                        </div>
                        <div class="input-groupp input-groupp-icon" style="    width: 440px;    float: left;
    display: inline-block;">
                          <div class="input-icon"><i class="fa-solid fa-location-dot"></i></div>
                          <input type="text" placeholder="العنوان   "  name="tr_user_address" id="tr_user_address" class="@error('tr_user_address') is-invalid @enderror" value="{{ old('tr_user_address') }}"/>
                          @error('tr_user_address')
                          <span class="invalid-feedback" role="alert">
                              <strong style="color:red;">{{ $message }}</strong>
                          </span>
                      @enderror
                        </div>

                        <div class="input-groupp input-groupp-icon" style="    width: 450px;    float: right;
    display: inline-block;">
                          <input type="email" placeholder="  البريد الكتروني   "  name="tr_user_email" id="tr_user_email" class="@error('tr_user_email') is-invalid @enderror" value="{{ old('tr_user_email') }}"/>
                          <div class="input-icon">  <i class="fa-solid fa-envelope"></i></div>
                          @error('tr_user_email')
                          <span class="invalid-feedback" role="alert">
                              <strong style="color:red;">{{ $message }}</strong>
                          </span>
                      @enderror
                        </div>
                        <div class="" style="    width: 440px;    float: right;
    display: inline-block;">

                            <input type="file" placeholder="الصورة" style=" " name="tr_user_personal_img" id="tr_user_personal_img"/>
                          </div>
                          </div>

</fieldset>

<fieldset style="margin-top: 30px;">
    <legend style="width: 250px;">معلومات وسائل التواصل الاجتماعي</legend>
    <div class="roww">
    <div class="input-groupp input-groupp-icon" style="    width: 450px;    float: right;
    display: inline-block;">
                            <div class="input-icon"><i class="fa-brands fa-facebook"></i></div>
                          <input type="text" placeholder="رابط صفحة الفيسبوك     "  name="tr_user_cv_facebook" id="tr_user_cv_facebook" class="@error('tr_user_cv_facebook') is-invalid @enderror" value="{{ old('tr_user_cv_facebook') }}"/>
                          @error('tr_user_cv_facebook')
                          <span class="invalid-feedback" role="alert">
                              <strong style="color:red;">{{ $message }}</strong>
                          </span>
                      @enderror
                        </div>
                        <div class="input-groupp input-groupp-icon" style="    width: 440px;    float: left;
    display: inline-block;">
                            <div class="input-icon"><i class="fa-brands fa-linkedin"></i></div>
                          <input type="text" placeholder="رابط صفحة اللينكدإن   "  name="tr_user_cv_linkedin" id="tr_user_cv_linkedin" class="@error('tr_user_cv_linkedin') is-invalid @enderror" value="{{ old('tr_user_cv_linkedin') }}"/>
                          @error('tr_user_cv_linkedin')
                          <span class="invalid-feedback" role="alert">
                              <strong style="color:red;">{{ $message }}</strong>
                          </span>
                      @enderror
                        </div>
                        <div class="input-groupp input-groupp-icon" style="    width: 450px;    float: right;
    display: inline-block;">
                            <div class="input-icon"><i class="fa-brands fa-youtube"></i></div>
                          <input type="text" placeholder="رابط قناة اليوتيوب     "  name="tr_user_cv_youtube" id="tr_user_cv_youtube" class="@error('tr_user_cv_youtube') is-invalid @enderror" value="{{ old('tr_user_cv_youtube') }}"/>
                          @error('tr_user_cv_youtube')
                          <span class="invalid-feedback" role="alert">
                              <strong style="color:red;">{{ $message }}</strong>
                          </span>
                      @enderror
                        </div>
                        <div class="input-groupp input-groupp-icon" style="    width: 440px;    float: left;
    display: inline-block;">
                            <div class="input-icon"><i class="fa-brands fa-instagram"></i></div>
                          <input type="text" placeholder="رابط صفحة الإنستاغرام   "  name="tr_user_cv_instagram" id="tr_user_cv_instagram" class="@error('tr_user_cv_instagram') is-invalid @enderror" value="{{ old('tr_user_cv_instagram') }}"/>
                          @error('tr_user_cv_instagram')
                          <span class="invalid-feedback" role="alert">
                              <strong style="color:red;">{{ $message }}</strong>
                          </span>
                      @enderror
                        </div>
                        </div>

</fieldset>
<fieldset style="margin-top: 30px;">
    <legend style="width: 210px;">الخبرات والمعلومات الأكاديمية</legend>
    <div class="roww">



                        <div class="input-groupp input-groupp-icon" style="    width: 450px;    float: right;
    display: inline-block;">
                            <div class="input-icon"><i class="fa-solid fa-circle-info"></i></div>
                          <input type="text" placeholder="مؤهلات المدرب (باللغة العربية)     "  name="tr_user_cv_qualifactions_ar" id="tr_user_cv_qualifactions_ar" class="@error('tr_user_cv_qualifactions_ar') is-invalid @enderror" value="{{ old('tr_user_cv_qualifactions_ar') }}"/>
                          @error('tr_user_cv_qualifactions_ar')
                          <span class="invalid-feedback" role="alert">
                              <strong style="color:red;">{{ $message }}</strong>
                          </span>
                      @enderror
                        </div>
                        <div class="input-groupp input-groupp-icon" style="    width: 440px;    float: left;
    display: inline-block;">
                            <div class="input-icon"><i class="fa-solid fa-circle-info"></i></div>
                          <input type="text" placeholder="مؤهلات المدرب (باللغة الإنكليزية)   "  name="tr_user_cv_qualifactions_en" id="tr_user_cv_qualifactions_en" class="@error('tr_user_cv_qualifactions_en') is-invalid @enderror" value="{{ old('tr_user_cv_qualifactions_en') }}"/>
                          @error('tr_user_cv_qualifactions_en')
                          <span class="invalid-feedback" role="alert">
                              <strong style="color:red;">{{ $message }}</strong>
                          </span>
                      @enderror
                        </div>
                        <div class="input-groupp input-groupp-icon" style="    width: 450px;    float: right;
    display: inline-block;">
                            <div class="input-icon"><i class="fa-solid fa-circle-info"></i></div>
                          <input type="text" placeholder="خبرات المدرب (باللغة العربية)     "  name="tr_user_cv_experience_ar" id="tr_user_cv_experience_ar" class="@error('tr_user_cv_experience_ar') is-invalid @enderror" value="{{ old('tr_user_cv_experience_ar') }}"/>
                          @error('tr_user_cv_experience_ar')
                          <span class="invalid-feedback" role="alert">
                              <strong style="color:red;">{{ $message }}</strong>
                          </span>
                      @enderror
                        </div>
                        <div class="input-groupp input-groupp-icon" style="    width: 440px;    float: left;
    display: inline-block;">
                            <div class="input-icon"><i class="fa-solid fa-circle-info"></i></div>
                          <input type="text" placeholder="خبرات المدرب (باللغة الإنكليزية)   "  name="tr_user_cv_experience_en" id="tr_user_cv_experience_en" class="@error('tr_user_cv_experience_en') is-invalid @enderror" value="{{ old('tr_user_cv_experience_en') }}"/>
                          @error('tr_user_cv_experience_en')
                          <span class="invalid-feedback" role="alert">
                              <strong style="color:red;">{{ $message }}</strong>
                          </span>
                      @enderror
                        </div>
                        <div class="input-groupp input-groupp-icon" style="    width: 450px;    float: right;
    display: inline-block;">
                            <div class="input-icon"><i class="fa-solid fa-circle-info"></i></div>
                          <input type="text" placeholder="تخصص المدرب (باللغة العربية)     "  name="tr_user_cv_specialization_ar" id="tr_user_cv_specialization_ar" class="@error('tr_user_cv_specialization_ar') is-invalid @enderror" value="{{ old('tr_user_cv_specialization_ar') }}"/>
                          @error('tr_user_cv_specialization_ar')
                          <span class="invalid-feedback" role="alert">
                              <strong style="color:red;">{{ $message }}</strong>
                          </span>
                      @enderror
                        </div>
                        <div class="input-groupp input-groupp-icon" style="    width: 440px;    float: left;
    display: inline-block;">
                            <div class="input-icon"><i class="fa-solid fa-circle-info"></i></div>
                          <input type="text" placeholder="تخصص المدرب (باللغة الإنكليزية)   "  name="tr_user_cv_specialization_en" id="tr_user_cv_specialization_en" class="@error('tr_user_cv_specialization_en') is-invalid @enderror" value="{{ old('tr_user_cv_specialization_en') }}"/>
                          @error('tr_user_cv_specialization_en')
                          <span class="invalid-feedback" role="alert">
                              <strong style="color:red;">{{ $message }}</strong>
                          </span>
                      @enderror
                        </div>
                        <div class="input-groupp input-groupp-icon" style="    width: 450px;    float: right;
    display: inline-block;">
                            <div class="input-icon"><i class="fa-solid fa-circle-info"></i></div>
                          <input type="text" placeholder="معلومات إضافية حول المدرب (باللغة العربية)     "  name="tr_user_cv_other_info_ar" id="tr_user_cv_other_info_ar" class="@error('tr_user_cv_other_info_ar') is-invalid @enderror" value="{{ old('tr_user_cv_other_info_ar') }}"/>
                          @error('tr_user_cv_other_info_ar')
                          <span class="invalid-feedback" role="alert">
                              <strong style="color:red;">{{ $message }}</strong>
                          </span>
                      @enderror
                        </div>
                        <div class="input-groupp input-groupp-icon" style="    width: 440px;    float: left;
    display: inline-block;">
                            <div class="input-icon"><i class="fa-solid fa-circle-info"></i></div>
                          <input type="text" placeholder="معلومات إضافية حول المدرب (باللغة الإنكليزية)   "  name="tr_user_cv_other_info_en" id="tr_user_cv_other_info_en" class="@error('tr_user_cv_other_info_en') is-invalid @enderror" value="{{ old('tr_user_cv_other_info_en') }}"/>
                          @error('tr_user_cv_other_info_en')
                          <span class="invalid-feedback" role="alert">
                              <strong style="color:red;">{{ $message }}</strong>
                          </span>
                      @enderror
                        </div>
                        <div class="input-groupp" style="width: 221px;
    display: inline-block;">
                        <select name="bimar_users_academic_degree_id" class="@error('bimar_users_academic_degree_id') is-invalid @enderror">
                         <option value="" disabled selected>اختر الدرجة العلمية   </option>
                         @foreach ($degrees as $degree)


                        <option value="{{ $degree->id }}">{{ $degree->tr_users_degree_name_ar }}</option>
                    @endforeach
                        </select>

                        @error('bimar_users_academic_degree_id')
                        <span class="invalid-feedback" role="alert">
                            <strong style="color:red;">{{ $message }}</strong>
                        </span>
                    @enderror
                            </div>
</div>

</fieldset>






                      <div class="roww">
                       <input type="submit" value="حفظ" class="bttn" style="    border: 1px solid #91d3c9;
    margin-top: 10px;">
                      </div>
                    </form>
              </div>


        </div>


@endsection
