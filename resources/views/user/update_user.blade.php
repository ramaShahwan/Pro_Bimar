
@extends('layout_admin.app')
@section('content')
<link rel="stylesheet" href="{{asset('assets/css/form.css')}}">

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
</style>
<div id="page-wrapper" style="   margin-top: 280px; width: 1000px;">

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
            <form action="  {{url('trainee_profile/update_profile',$data->id)}}" method="Post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <input type="hidden" name="id" value="{{ $data->id }}">

              <div class="roww">
                        <h4 style="    margin-bottom: 20px;"> تعديل الملف الشخصي</h4>
                        <div class="input-groupp input-groupp-icon">
                            <div class="input-icon"><i class="fa-sharp fa-solid fa-calendar-week"></i></div>
                          <input type="text" placeholder="الاسم بالعربي  " value="{{ $data->trainee_fname_ar }}" name="trainee_fname_ar" id="trainee_fname_ar" class="@error('trainee_fname_ar') is-invalid @enderror"/>
                          @error('trainee_fname_ar')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                        </div>
                        <div class="input-groupp input-groupp-icon">
                            <div class="input-icon"><i class="fa-sharp fa-solid fa-calendar-week"></i></div>
                          <input type="text" placeholder="الاسم بالانكليزي  " value="{{ $data->trainee_fname_en }}" name="trainee_fname_en" id="trainee_fname_en" class="@error('trainee_fname_en') is-invalid @enderror"/>
                          @error('trainee_fname_en')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                        </div>
                        <div class="input-groupp input-groupp-icon">
                          <input type="text" placeholder="الكنية بالعربي  " value="{{ $data->trainee_lname_ar }}" name="trainee_lname_ar" id="trainee_lname_ar" class="@error('trainee_lname_ar') is-invalid @enderror"/>
                          <div class="input-icon"><i class="fa-sharp fa-solid fa-calendar-week"></i></div>
                          @error('trainee_lname_ar')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                        </div>
                        <div class="input-groupp input-groupp-icon">
                            <div class="input-icon"><i class="fa-sharp fa-solid fa-calendar-week"></i></div>
                          <input type="text" placeholder="الكنية بالانكليزي  " value="{{ $data->trainee_lname_en }}" name="trainee_lname_en" id="trainee_lname_en" class="@error('trainee_lname_en') is-invalid @enderror"/>
                          @error('trainee_lname_en')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                        </div>
                        <div class="input-groupp input-groupp-icon">
                          <input type="text" placeholder="  رقم الموبايل  " style="padding-bottom: 0;"value="{{ $data->trainee_mobile }}" name="trainee_mobile" id="trainee_mobile" class="@error('trainee_mobile') is-invalid @enderror"/>
                          <div class="input-icon"><i class="fa-solid fa-calendar-days"></i></div>
                          @error('trainee_mobile')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                        </div>
                        <div class="input-groupp input-groupp-icon">
                          <input type="email" placeholder="  البريد الكتروني   " style="padding-bottom: 0;"value="{{ $data->trainee_email }}" name="trainee_email" id="trainee_email" class="@error('trainee_email') is-invalid @enderror"/>
                          <div class="input-icon"><i class="fa-solid fa-calendar-days"></i></div>
                          @error('trainee_email')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                        </div>
                        <div class="input-groupp input-groupp-icon">
                          <input type="text" placeholder="  العنوان    " style="padding-bottom: 0;"value="{{ $data->trainee_address }}" name="trainee_address" id="trainee_address" class="@error('trainee_address') is-invalid @enderror"/>
                          <div class="input-icon"><i class="fa-solid fa-calendar-days"></i></div>
                          @error('trainee_address')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                        </div>
                        <div class="">
                        <img src="{{URL::asset('img/trainee/'.$data->trainee_personal_img)}}"  style="margin-left: 120px; width:200px">

                            <input type="file" placeholder="الصورة" style="padding-bottom: 0;" name="trainee_personal_img" id="trainee_personal_img"/>
                          </div>
                      </div>

                      <div class="roww">



                        <div class="input-groupp">
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


              @endsection
