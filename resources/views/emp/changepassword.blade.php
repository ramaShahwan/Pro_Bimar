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
            <form action="  {{url('changePass_emp',$user->id)}}" method="Post" enctype="multipart/form-data">
            @csrf


                      <div class="roww">

                        <h4> تغيير كلمة السر  </h4>
                        <div class="input-groupp input-groupp-icon">
                          <input type="text" placeholder=" كلمة السر و يجب ان تحتوي على احرف كبيرة وصغيرة وارقام و محارف " style="padding-bottom: 0;" name="tr_user_pass" id="tr_user_pass" class="@error('tr_user_pass') is-invalid @enderror"/>
                          <div class="input-icon"><i class="fa-solid fa-calendar-days"></i></div>
                          @error('tr_user_pass')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                        </div>
                        <div class="input-groupp input-groupp-icon">
                          <input type="text" placeholder="  تأكيد كلمة السر    " style="padding-bottom: 0;" name="tr_user_pass_confirmation" id="tr_user_pass_confirmation" class="@error('tr_user_pass_confirmation') is-invalid @enderror"/>
                          <div class="input-icon"><i class="fa-solid fa-calendar-days"></i></div>
                          @error('tr_user_pass_confirmation')
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


        </div>


@endsection
