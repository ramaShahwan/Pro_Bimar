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
</style>
<div id="page-wrapper" style="color:black;">
@if(session()->has('message'))
    <div class="alert alert-info" role="alert" style="font-size: 20px;
    direction: rtl;">
        {!! session()->get('message') !!}
    </div>
@endif
            <div class="containerr">
            <form action="  {{url('user/update',$data->id)}}" method="Post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <input type="hidden" name="id" value="{{ $data->id }}">

                      <div class="roww">

                        <h4>تعديل الموظف </h4>
                        <div class="input-groupp input-groupp-icon">
                            <div class="input-icon"><i class="fa-sharp fa-solid fa-calendar-week"></i></div>
                          <input type="text" placeholder="الاسم المستخدم  "  name="tr_user_name" id="tr_user_name" value="{{ $data->tr_user_name }}" class="@error('tr_user_name') is-invalid @enderror"/>
                          @error('tr_user_name')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                        </div>
                        <div class="input-groupp input-groupp-icon">
                            <div class="input-icon"><i class="fa-sharp fa-solid fa-calendar-week"></i></div>
                          <input type="text" placeholder="الاسم بالعربي  "  name="tr_user_fname_ar" id="tr_user_fname_ar" value="{{ $data->tr_user_fname_ar }}" class="@error('tr_user_fname_ar') is-invalid @enderror"/>
                          @error('tr_user_fname_ar')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                        </div>
                        <div class="input-groupp input-groupp-icon">
                            <div class="input-icon"><i class="fa-sharp fa-solid fa-calendar-week"></i></div>
                          <input type="text" placeholder="الاسم بالانكليزي  "  name="tr_user_fname_en" id="tr_user_fname_en" value="{{ $data->tr_user_fname_en }}" class="@error('tr_user_fname_en') is-invalid @enderror"/>
                          @error('tr_user_fname_en')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                        </div>
                        <div class="input-groupp input-groupp-icon">
                            <div class="input-icon"><i class="fa-sharp fa-solid fa-calendar-week"></i></div>
                          <input type="text" placeholder="الكنية بالعربي  "  name="tr_user_lname_ar" id="tr_user_lname_ar" value="{{ $data->tr_user_lname_ar }}" class="@error('tr_user_lname_ar') is-invalid @enderror"/>
                          @error('tr_user_lname_ar')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                        </div>
                        <div class="input-groupp input-groupp-icon">
                            <div class="input-icon"><i class="fa-sharp fa-solid fa-calendar-week"></i></div>
                          <input type="text" placeholder="الكنية بالانكليزي  "  name="tr_user_lname_en" id="tr_user_lname_en" value="{{ $data->tr_user_lname_en }}" class="@error('tr_user_lname_en') is-invalid @enderror"/>
                          @error('tr_user_lname_en')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                        </div>
                        <div class="input-groupp input-groupp-icon">
                            <div class="input-icon"><i class="fa-sharp fa-solid fa-calendar-week"></i></div>
                          <input type="text" placeholder="رقم الموبايل   "  name="tr_user_mobile" id="tr_user_mobile" value="{{ $data->tr_user_mobile }}" class="@error('tr_user_mobile') is-invalid @enderror"/>
                          @error('tr_user_mobile')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                        </div>
                        <div class="input-groupp input-groupp-icon">
                            <div class="input-icon"><i class="fa-sharp fa-solid fa-calendar-week"></i></div>
                          <input type="text" placeholder="رقم الهاتف الارضي   "  name="tr_user_phone" id="tr_user_phone" value="{{ $data->tr_user_phone }}" class="@error('tr_user_phone') is-invalid @enderror"/>
                          @error('tr_user_phone')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                        </div>
                        <div class="input-groupp input-groupp-icon">
                            <div class="input-icon"><i class="fa-sharp fa-solid fa-calendar-week"></i></div>
                          <input type="text" placeholder="العنوان   "  name="tr_user_address" id="tr_user_address" value="{{ $data->tr_user_address }}" class="@error('tr_user_address') is-invalid @enderror"/>
                          @error('tr_user_address')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                        </div>

                        <div class="input-groupp input-groupp-icon">
                          <input type="email" placeholder="  البريد الكتروني   " style="padding-bottom: 0;" name="tr_user_email" value="{{ $data->tr_user_email }}" id="tr_user_email" class="@error('tr_user_email') is-invalid @enderror"/>
                          <div class="input-icon"><i class="fa-solid fa-calendar-days"></i></div>
                          @error('tr_user_email')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                        </div>
                        <div class="">
                        <img src="{{URL::asset('img/user/'.$data->tr_user_personal_img)}}" width="200px" style="margin-left: 120px;">

<input type="file" placeholder="الصورة" style="padding-bottom: 0;" name="tr_user_personal_img" id="tr_user_personal_img"/>

                          </div>
                      </div>
                      <div class="input-groupp">
                        <select name="bimar_users_gender_id" class="@error('bimar_users_gender_id') is-invalid @enderror">
                         <option>اختر الجنس  </option>
                         @foreach ($genders as $gender)


                         <option value="{{ $gender->id}}" {{ $gender->id == $data->bimar_users_gender_id ? 'selected' : '' }}>
                            {{ $gender->tr_users_gender_name_ar }}
                        </option>                    @endforeach
                        </select>

                        @error('bimar_users_gender_id')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                            </div>
                            <div class="input-groupp">
                        <select name="bimar_users_status_id" class="@error('bimar_users_status_id') is-invalid @enderror">
                         <option>اختر حالة المستخدم  </option>
                         @foreach ($statuses as $status)


                         <option value="{{ $status->id}}" {{ $status->id == $data->bimar_users_status_id ? 'selected' : '' }}>
                            {{ $status->tr_users_status_name_ar }}
                        </option>                    @endforeach
                        </select>

                        @error('bimar_users_status_id')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                            </div>
                            <div class="input-groupp">
                        <select name="bimar_role_id" class="@error('bimar_role_id') is-invalid @enderror">
                         <option>اختر الدور   </option>
                         @foreach ($roles as $role)

                         <option value="{{ $role->id}}" {{ $role->id == $data->bimar_role_id ? 'selected' : '' }}>
                            {{ $role->tr_role_name_ar }}
                        </option>
                    @endforeach
                        </select>

                        @error('bimar_role_id')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                            </div>
                            <div class="input-groupp">
                        <select name="bimar_users_academic_degree_id" class="@error('bimar_users_academic_degree_id') is-invalid @enderror">
                         <option>اختر الدرجة العلمية   </option>
                         @foreach ($degrees as $degree)
                         <option value="{{ $degree->id}}" {{ $degree->id == $data->bimar_users_academic_degree_id ? 'selected' : '' }}>
                            {{ $degree->tr_users_degree_name_ar }}
                        </option>

                    @endforeach
                        </select>

                        @error('bimar_users_academic_degree_id')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                            </div>


                      <div class="roww">
                       <input type="submit" value="حفظ" class="bttn">
                      </div>
                    </form>
                    <form action=" {{url('user/changePassword',$data->id)}}" method="post" enctype="multipart/form-data">
                @csrf
                <!-- <input type="hidden" name="id" value="{{ $data->id }}"> -->




                      <div class="roww">
                       <input type="submit" value="تغيير كلمة السر" class="bttn">
                      </div>
                    </form>
              </div>


        </div>


@endsection
