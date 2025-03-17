
@extends('layout_admin.app')
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
.containerr{
        padding: 0;
        box-shadow: inset 0px 1px 19px 1px #23a794;
        border: 1px solid #23a794;
    }
    .gf{
            background: #98c9c2;
            /* padding: 20px 0px; */
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


        .input-groupp {
    position: relative;
    display: flex;
    align-items: center;
}
.input-groupp input {
    padding-right: 40px; /* لإفساح مجال للأيقونة */
}
.toggle-password {
    position: absolute;
    left: 10px;
    cursor: pointer;
    color: #666;
}

.toggle-password:hover {
    color: #000;
}
.input-groupp-icon .input-icon:before{
    display: none;
}
.input-groupp-icon .input-icon{
    top: 16px;
}
</style>
<div id="page-wrapper" style="    margin-top: 340px; color:black;
    overflow: auto;" class="naaa">
            <div class="containerr">
            <div class="gf" style="display:flex;    justify-content: space-around;
    flex-direction: row-reverse;
        align-items: center;">
            <h4 class="h44 ">إنشاء حساب جدبد     </h4>
            <img src="{{asset('assetss/re.png')}}" alt="" style="    width: 60px;">
            </div>
            <form method="POST" action="{{ route('trainee_register_post') }}"enctype="multipart/form-data" style="padding: 20px;color: black;">
            @csrf



              <div class="roww">
                        <div class="input-groupp input-groupp-icon">
                            <div class="input-icon"><i class="fa-solid fa-signature"></i></div>
                          <input type="text" placeholder="الاسم بالعربي  "  name="trainee_fname_ar" id="trainee_fname_ar" class="@error('trainee_fname_ar') is-invalid @enderror" value="{{ old('trainee_fname_ar') }}"/>
                          @error('trainee_fname_ar')
                          <span class="invalid-feedback" role="alert">
                              <strong style="color:red;">{{ $message }}</strong>
                          </span>
                      @enderror
                        </div>
                        <div class="input-groupp input-groupp-icon">
                          <input type="text" placeholder="الكنية بالعربي  "  name="trainee_lname_ar" id="trainee_lname_ar" class="@error('trainee_lname_ar') is-invalid @enderror" value="{{ old('trainee_lname_ar') }}"/>
                          <div class="input-icon"><i class="fa-solid fa-signature"></i></div>
                          @error('trainee_lname_ar')
                          <span class="invalid-feedback" role="alert">
                              <strong style="color:red;">{{ $message }}</strong>
                          </span>
                      @enderror
                        </div>
                        <div class="input-groupp input-groupp-icon">
                          <input type="text" placeholder="الاسم بالانكليزي  "  name="trainee_fname_en" id="trainee_fname_en" class="@error('trainee_fname_en') is-invalid @enderror" value="{{ old('trainee_fname_en') }}"/>
                          <div class="input-icon"><i class="fa-solid fa-signature"></i></div>
                          @error('trainee_fname_en')
                          <span class="invalid-feedback" role="alert">
                              <strong style="color:red;">{{ $message }}</strong>
                          </span>
                      @enderror
                        </div>
                        <div class="input-groupp input-groupp-icon">
                          <input type="text" placeholder="الكنية بالانكليزي  "  name="trainee_lname_en" id="trainee_lname_en" class="@error('trainee_lname_en') is-invalid @enderror" value="{{ old('trainee_lname_en') }}"/>
                          <div class="input-icon"><i class="fa-solid fa-signature"></i></div>
                          @error('trainee_lname_en')
                          <span class="invalid-feedback" role="alert">
                              <strong style="color:red;">{{ $message }}</strong>
                          </span>
                      @enderror
                        </div>
                        <div class="input-groupp input-groupp-icon">
                          <input type="text" placeholder="  رقم الموبايل و الذي سيتم استخدامه لدخول للمنصة  "  name="trainee_mobile" id="trainee_mobile" class="@error('trainee_mobile') is-invalid @enderror" value="{{ old('trainee_mobile') }}"/>
                          <div class="input-icon"><i class="fa-solid fa-phone"></i></div>
                          @error('trainee_mobile')
                          <span class="invalid-feedback" role="alert">
                              <strong style="color:red;">{{ $message }}</strong>
                          </span>
                      @enderror
                        </div>
                        <div class="input-groupp input-groupp-icon">
    <input type="password" placeholder=" كلمة السر و يجب ان تحتوي على احرف كبيرة وصغيرة وارقام و محارف " name="trainee_pass" id="trainee_pass" class="@error('trainee_pass') is-invalid @enderror" />
    <div class="input-icon"><i class="fa-solid fa-lock"></i></div>
    <div class="toggle-password" onclick="togglePassword('trainee_pass', this)">
        <i class="fa-solid fa-eye"></i>
    </div>
    @error('trainee_pass')
    <span class="invalid-feedback" role="alert">
        <strong style="color:red;">{{ $message }}</strong>
    </span>
    @enderror
</div>

<div class="input-groupp input-groupp-icon">
    <input type="password" placeholder=" تأكيد كلمة السر " name="trainee_pass_confirmation" id="trainee_pass_confirmation" class="@error('trainee_pass_confirmation') is-invalid @enderror" />
    <div class="input-icon"><i class="fa-solid fa-lock"></i></div>
    <div class="toggle-password" onclick="togglePassword('trainee_pass_confirmation', this)">
        <i class="fa-solid fa-eye"></i>
    </div>
    @error('trainee_pass_confirmation')
    <span class="invalid-feedback" role="alert">
        <strong style="color:red;">{{ $message }}</strong>
    </span>
    @enderror
</div>
                        <div class="input-groupp input-groupp-icon">
                          <input type="email" placeholder="  البريد الكتروني   "  name="trainee_email" id="trainee_email" class="@error('trainee_email') is-invalid @enderror" value="{{ old('trainee_email') }}"/>
                          <div class="input-icon">  <i class="fa-solid fa-envelope"></i></div>
                          @error('trainee_email')
                          <span class="invalid-feedback" role="alert">
                              <strong style="color:red;">{{ $message }}</strong>
                          </span>
                      @enderror
                        </div>
                        <div class="input-groupp input-groupp-icon">
                          <input type="text" placeholder="  العنوان    "  name="trainee_address" id="trainee_address" class="@error('trainee_address') is-invalid @enderror" value="{{ old('trainee_address') }}"/>
                          <div class="input-icon"><i class="fa-solid fa-location-dot"></i></div>
                          @error('trainee_address')
                          <span class="invalid-feedback" role="alert">
                              <strong style="color:red;">{{ $message }}</strong>
                          </span>
                      @enderror
                        </div>
                        <div class="">

                            <input type="file" placeholder="الصورة"  name="trainee_personal_img" id="trainee_personal_img"/>
                          </div>
                      </div>

                      <div class="roww">



                        <div class="input-groupp" style="margin-top: 20px;">
                        <select name="bimar_users_gender_id" class="@error('bimar_users_gender_id') is-invalid @enderror">
                         <option>اختر الجنس  </option>
                         @foreach ($genders as $gender)


                        <option value="{{ $gender->id }}">{{ $gender->tr_users_gender_name_ar }}</option>
                    @endforeach
                        </select>

                        @error('bimar_users_gender_id')
                        <span class="invalid-feedback" role="alert">
                            <strong style="color:red;"> {{ $message }}</strong>
                        </span>
                    @enderror
                            </div>
                            <!-- <div class="input-groupp" style="display:none;">
                        <select name="bimar_users_status_id" class="@error('bimar_users_status_id') is-invalid @enderror">
                         <option>اختر حالة المستخدم  </option>
                         @foreach ($statuses as $status)


                        <option value="1"></option>
                    @endforeach
                        </select>


                            </div> -->


                      </div>
                      <div class="roww">
                       <input type="submit" value="حفظ" class="bttn">
                      </div>
                    </form>
              </div>


              @endsection
<script>
function togglePassword(inputId, iconElement) {
    var inputField = document.getElementById(inputId);
    var icon = iconElement.querySelector("i");

    if (inputField.type === "password") {
        inputField.type = "text";
        icon.classList.remove("fa-eye");
        icon.classList.add("fa-eye-slash");
    } else {
        inputField.type = "password";
        icon.classList.remove("fa-eye-slash");
        icon.classList.add("fa-eye");
    }
}
</script>
