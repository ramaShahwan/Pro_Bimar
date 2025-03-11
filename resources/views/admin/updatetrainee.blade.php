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
   body{
    color: #403e3e;
}
.input-groupp-icon input {
    text-align: end;
    padding-right: 4.4em;
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
    .popup .overlay{
            position: fixed;
            top: 0px;
            left: 0px;
            width: 100vw;
            height: 100vw;
            background: rgba(0, 0, 0, 0.7);
            z-index: 1;
            display: none;
        }
        .popup .content{
            position: absolute;
            /* top: 100%; */
            left: 50%;
            transform: translate(-50%,-50%) scale(0);
            background: #fff;
            width: 450px;
            height: 250px;
            z-index: 500;
            text-align: center;
            padding: 20px;
            box-sizing: border-box;
        }
        .popup .close-btn{
            cursor: pointer;
            position: absolute;
            right: 20px;
            top: 20px;
            width: 30px;
            height: 30px;
            background: #222;
            color: #fff;
            font-size: 25px;
            font-weight: 600;
            line-height: 30px;
            text-align: center;
            border-radius: 50%;
        }
        .popup.active .overlay{
            display: block;
        }
        .popup.active .content{
            transition: all 300ms ease-in-out;
            transform: translate(-50%,-50%) scale(1);

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
<div id="page-wrapper" style="   color:black; height: 500px;
    overflow: auto;">
@if(session()->has('message'))
    <div class="alert alert-info" role="alert" style="font-size: 20px;
    direction: rtl;">
        {!! session()->get('message') !!}
    </div>
@endif
            <div class="containerr">
            <h4 class="h44 gf"> تعديل بيانات المتدرب</h4>

            <form action="  {{url('trainee/update',$data->id)}}" method="Post" enctype="multipart/form-data" style="padding: 20px;color: black;">
            @csrf
            @method('PUT')
            <input type="hidden" name="id" value="{{ $data->id }}">

              <div class="roww">
                        <h4 style="text-align: right;margin-bottom: 12px;"> الاسم بالعربي  </h4>
                        <div class="input-groupp input-groupp-icon">
                            <div class="input-icon"><i class="fa-solid fa-signature"></i></div>
                          <input type="text" placeholder="الاسم بالعربي  " value="{{ $data->trainee_fname_ar }}" name="trainee_fname_ar" id="trainee_fname_ar" class="@error('trainee_fname_ar') is-invalid @enderror"/>
                          @error('trainee_fname_ar')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                        </div>
                        <h4 style="text-align: right;margin-bottom: 12px;"> الاسم بالانكليزي  </h4>

                        <div class="input-groupp input-groupp-icon">
                            <div class="input-icon"><i class="fa-solid fa-signature"></i></div>
                          <input type="text" placeholder="الاسم بالانكليزي  " value="{{ $data->trainee_fname_en }}" name="trainee_fname_en" id="trainee_fname_en" class="@error('trainee_fname_en') is-invalid @enderror"/>
                          @error('trainee_fname_en')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                        </div>
                        <h4 style="text-align: right;margin-bottom: 12px;"> الكنية بالعربي  </h4>

                        <div class="input-groupp input-groupp-icon">
                          <input type="text" placeholder="الكنية بالعربي  " value="{{ $data->trainee_lname_ar }}" name="trainee_lname_ar" id="trainee_lname_ar" class="@error('trainee_lname_ar') is-invalid @enderror"/>
                          <div class="input-icon"><i class="fa-solid fa-signature"></i></div>
                          @error('trainee_lname_ar')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                        </div>
                        <h4 style="text-align: right;margin-bottom: 12px;"> الكنية بالانكليزي  </h4>

                        <div class="input-groupp input-groupp-icon">
                            <div class="input-icon"><i class="fa-solid fa-signature"></i></div>
                          <input type="text" placeholder="الكنية بالانكليزي  " value="{{ $data->trainee_lname_en }}" name="trainee_lname_en" id="trainee_lname_en" class="@error('trainee_lname_en') is-invalid @enderror"/>
                          @error('trainee_lname_en')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                        </div>
                        <h4 style="text-align: right;margin-bottom: 12px;"> رقم الموبايل   </h4>

                        <div class="input-groupp input-groupp-icon">
                          <input type="text" placeholder="  رقم الموبايل  " value="{{ $data->trainee_mobile }}" name="trainee_mobile" id="trainee_mobile" class="@error('trainee_mobile') is-invalid @enderror"/>
                          <div class="input-icon"><i class="fa-solid fa-phone"></i></div>
                          @error('trainee_mobile')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                        </div>
                        <h4 style="text-align: right;margin-bottom: 12px;"> البريد الالكتروني   </h4>

                        <div class="input-groupp input-groupp-icon">
                          <input type="email" placeholder="  البريد الكتروني   " value="{{ $data->trainee_email }}" name="trainee_email" id="trainee_email" class="@error('trainee_email') is-invalid @enderror"/>
                          <div class="input-icon">  <i class="fa-solid fa-envelope"></i></div>
                          @error('trainee_email')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                        </div>
                        <h4 style="text-align: right; margin-bottom: 12px;"> العنوان   </h4>

                        <div class="input-groupp input-groupp-icon">
                          <input type="text" placeholder="  العنوان    " value="{{ $data->trainee_address }}" name="trainee_address" id="trainee_address" class="@error('trainee_address') is-invalid @enderror"/>
                          <div class="input-icon"><i class="fa-solid fa-location-dot"></i></div>
                          @error('trainee_address')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                        </div>
                        <div class="">
                        <img src="{{URL::asset('img/trainee/'.$data->trainee_personal_img)}}" width="200px" style="margin-left: 120px;">

                            <input type="file" placeholder="الصورة" style="padding-bottom: 0;" name="trainee_personal_img" id="trainee_personal_img"/>
                          </div>
                      </div>

                      <div class="roww">


                      <h4 style="text-align: right; margin-bottom: 12px;"> الجنس   </h4>

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
                            <h4 style="text-align: right; margin-bottom: 12px;"> حالات المستخدم   </h4>

                            <div class="input-groupp">
                        <select name="bimar_users_status_id" class="@error('bimar_users_status_id') is-invalid @enderror">
                         <option>اختر حالة المستخدم  </option>
                         @foreach ($statuses as $status)

                        <option value="{{ $status->id}}" {{ $status->id == $data->bimar_users_status_id ? 'selected' : '' }}>
                            {{ $status->tr_users_status_name_ar }}
                        </option>
                    @endforeach
                        </select>

                        @error('bimar_users_status_id')
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
                    <!-- <button onclick="togglePopuo()" class="bbtn">اضافة دور</button>
                            <div class="popup" id="popup-1">
            <div class="overlay"></div>
            <div class="content">
                <div class="close-btn" onclick="togglePopuo()">&times;</div> -->
                <!-- <div class="containerr"> -->
                <form action=" {{url('trainee/changePassword',$data->id)}}" method="post" enctype="multipart/form-data">
                @csrf
                <!-- <input type="hidden" name="id" value="{{ $data->id }}"> -->




                      <div class="roww">
                       <input type="submit" value="تغيير كلمة السر" class="bttn">
                      </div>
                    </form>
                  <!-- </div> -->
<!--
            </div>
        </div> -->


                      </div>
              </div>


        </div>
        <script>
           function togglePopuo() {
    const popup = document.getElementById("popup-1");
    popup.classList.toggle("active");
}
        </script>
@endsection
