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
<div id="page-wrapper" style="color:black;  height: 610px;
    overflow: auto;">
@if(session()->has('message'))
    <div class="alert alert-info" role="alert" style="font-size: 20px;
    direction: rtl;">
        {!! session()->get('message') !!}
    </div>
@endif
            <div class="containerr">
            <h4 class="h44 gf">تغيير كلمة السر     </h4>
            <form action="  {{url('changePass_emp',$user->id)}}" method="Post" enctype="multipart/form-data" style="padding: 20px;color: black;">
            @csrf


                      <div class="roww">

                        <div class="input-groupp input-groupp-icon">
                          <input type="text" placeholder=" كلمة السر و يجب ان تحتوي على احرف كبيرة وصغيرة وارقام و محارف " name="tr_user_pass" id="tr_user_pass" class="@error('tr_user_pass') is-invalid @enderror"/>
                          <div class="input-icon"><i class="fa-solid fa-lock"></i></div>
                          @error('tr_user_pass')
                          <span class="invalid-feedback" role="alert">
                              <strong style="color:red;">{{ $message }}</strong>
                          </span>
                      @enderror
                        </div>
                        <div class="input-groupp input-groupp-icon">
                          <input type="text" placeholder="  تأكيد كلمة السر    " name="tr_user_pass_confirmation" id="tr_user_pass_confirmation" class="@error('tr_user_pass_confirmation') is-invalid @enderror"/>
                          <div class="input-icon"><i class="fa-solid fa-lock"></i></div>
                          @error('tr_user_pass_confirmation')
                          <span class="invalid-feedback" role="alert">
                              <strong style="color:red;">{{ $message }}</strong>
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
