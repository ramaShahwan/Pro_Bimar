
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
</style>
<div id="page-wrapper" style="   margin-top: 600px;" class="naaa">

            <div class="containerr">
            @if(session()->has('message'))
    <div class="alert alert-info" role="alert" style="font-size: 20px;
    direction: rtl;
    background: #c0ffc0;
    color: black;
    padding: 10px;
    margin-bottom: 10px;">
        {!! session()->get('message') !!}
    </div>
@endif
<div class="gf" style="display:flex;    justify-content: space-around;
    flex-direction: row-reverse;
        align-items: center;">
            <h4 class="h44 ">تعديل الملف الشخصي       </h4>
            <img src="{{asset('assetss/re.png')}}" alt="" style="    width: 60px;">
            </div>
            <form action="  {{url('trainee_profile/update_profile',$data->id)}}" method="Post" enctype="multipart/form-data" style="padding: 20px;color: black;">
            @csrf
            @method('PUT')
            <input type="hidden" name="id" value="{{ $data->id }}">

              <div class="roww">
                        <h4 style="text-align: right;
    margin-bottom: 12px;"> الاسم بالعربي  </h4>

                        <div class="input-groupp input-groupp-icon">
                            <div class="input-icon"><i class="fa-solid fa-signature"></i></div>
                          <input type="text" placeholder="الاسم بالعربي  " value="{{ $data->trainee_fname_ar }}" name="trainee_fname_ar" id="trainee_fname_ar" class="@error('trainee_fname_ar') is-invalid @enderror"/>
                          @error('trainee_fname_ar')
                          <span class="invalid-feedback" role="alert">
                              <strong style="color:red;">{{ $message }}</strong>
                          </span>
                      @enderror
                        </div>
                        <h4 style="text-align: right;margin-bottom: 12px;"> الاسم بالانكليزي  </h4>

                        <div class="input-groupp input-groupp-icon">
                            <div class="input-icon"><i class="fa-solid fa-signature"></i></div>
                          <input type="text" placeholder="الاسم بالانكليزي  " value="{{ $data->trainee_fname_en }}" name="trainee_fname_en" id="trainee_fname_en" class="@error('trainee_fname_en') is-invalid @enderror"/>
                          @error('trainee_fname_en')
                          <span class="invalid-feedback" role="alert">
                              <strong style="color:red;">{{ $message }}</strong>
                          </span>
                      @enderror
                        </div>
                        <h4 style="text-align: right;margin-bottom: 12px;"> الكنية بالعربي  </h4>

                        <div class="input-groupp input-groupp-icon">
                          <input type="text" placeholder="الكنية بالعربي  " value="{{ $data->trainee_lname_ar }}" name="trainee_lname_ar" id="trainee_lname_ar" class="@error('trainee_lname_ar') is-invalid @enderror"/>
                          <div class="input-icon"><i class="fa-solid fa-signature"></i></div>
                          @error('trainee_lname_ar')
                          <span class="invalid-feedback" role="alert">
                              <strong style="color:red;">{{ $message }}</strong>
                          </span>
                      @enderror
                        </div>
                        <h4 style="text-align: right;margin-bottom: 12px;"> الكنية بالانكليزي  </h4>

                        <div class="input-groupp input-groupp-icon">
                            <div class="input-icon"><i class="fa-solid fa-signature"></i></div>
                          <input type="text" placeholder="الكنية بالانكليزي  " value="{{ $data->trainee_lname_en }}" name="trainee_lname_en" id="trainee_lname_en" class="@error('trainee_lname_en') is-invalid @enderror"/>
                          @error('trainee_lname_en')
                          <span class="invalid-feedback" role="alert">
                              <strong style="color:red;">{{ $message }}</strong>
                          </span>
                      @enderror
                        </div>
                        <h4 style="text-align: right;margin-bottom: 12px;"> رقم الموبايل   </h4>

                        <div class="input-groupp input-groupp-icon">
                          <input type="text" placeholder="  رقم الموبايل  " value="{{ $data->trainee_mobile }}" name="trainee_mobile" id="trainee_mobile" class="@error('trainee_mobile') is-invalid @enderror"/>
                          <div class="input-icon"><i class="fa-solid fa-phone"></i></div>
                          @error('trainee_mobile')
                          <span class="invalid-feedback" role="alert">
                              <strong style="color:red;">{{ $message }}</strong>
                          </span>
                      @enderror
                        </div>
                        <h4 style="text-align: right;margin-bottom: 12px;"> البريد الالكتروني   </h4>

                        <div class="input-groupp input-groupp-icon">
                          <input type="email" placeholder="  البريد الالكتروني   " value="{{ $data->trainee_email }}" name="trainee_email" id="trainee_email" class="@error('trainee_email') is-invalid @enderror"/>
                          <div class="input-icon">  <i class="fa-solid fa-envelope"></i></div>
                          @error('trainee_email')
                          <span class="invalid-feedback" role="alert">
                              <strong style="color:red;">{{ $message }}</strong>
                          </span>
                      @enderror
                        </div>
                        <h4 style="text-align: right; margin-bottom: 12px;"> العنوان   </h4>

                        <div class="input-groupp input-groupp-icon">
                          <input type="text" placeholder="  العنوان    " value="{{ $data->trainee_address }}" name="trainee_address" id="trainee_address" class="@error('trainee_address') is-invalid @enderror"/>
                          <div class="input-icon"><i class="fa-solid fa-location-dot"></i></div>
                          @error('trainee_address')
                          <span class="invalid-feedback" role="alert">
                              <strong style="color:red;">{{ $message }}</strong>
                          </span>
                      @enderror
                        </div>
                        <div class="">
                        <img src="{{URL::asset('img/trainee/'.$data->trainee_personal_img)}}"  style="margin-left: 120px; width:200px">

                            <input type="file" placeholder="الصورة"  name="trainee_personal_img" id="trainee_personal_img"/>
                          </div>
                      </div>

                      <div class="roww">



                        <div class="input-groupp" style="margin-top: 20px;">
                        <select name="bimar_users_gender_id" class="@error('bimar_users_gender_id') is-invalid @enderror">
                         <option>اختر الجنس  </option>
                         @foreach ($genders as $gender)

                        <option value="{{ $gender->id}}" {{ $gender->id == $data->bimar_users_gender_id ? 'selected' : '' }}>
                            {{ $gender->tr_users_gender_name_ar }}
                        </option>
                    @endforeach
                        </select>

                        @error('bimar_users_gender_id')
                        <span class="invalid-feedback" role="alert">
                            <strong style="color:red;">{{ $message }}</strong>
                        </span>
                    @enderror
                            </div>

                            </div>
                      <div class="roww">
                       <input type="submit" value="حفظ" class="bttn" style="    border: 1px solid #21a190;">
                      </div>
                    </form>
              </div>


              @endsection
