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
<div id="page-wrapper" style="color:black; height: 500px;
    overflow: auto;">
@if(session()->has('message'))
        <div class="alert alert-info" role="alert" style="text-align:end;font-size: 20px; ">
          {{session()->get('message')}}
        </div>
@endif
            <div class="containerr">
            <h4 class="h44 gf"> تعديل الصلاحيات </h4>
            <form action="  {{url('bank_trainer/update',$data->id)}}" method="Post" enctype="multipart/form-data" style="padding: 20px;color: black;">
            @csrf
                      <div class="roww">
                        <h4>صلاحية القراءة</h4>
                        <div class="input-groupp" style="display: flex;">


                                <input  type="radio" name="tr_questions_user_read" id="gridRadioss1" value="0" {{ old('tr_questions_user_read', $data->tr_questions_user_read) == 0 ? 'checked' : '' }}>
                                    <label  for="gridRadioss1">غير فعال</label>

                                     <input  type="radio" name="tr_questions_user_read" id="gridRadioss2" value="1" {{ old('tr_questions_user_read', $data->tr_questions_user_read) == 1 ? 'checked' : '' }}>
                                     <label  for="gridRadioss2">فعال</label>
                                        </div>

                      </div>
                      <div class="roww">
                        <h4>صلاحية الاضافة</h4>
                        <div class="input-groupp" style="display: flex;">

                                <input  type="radio" name="tr_questions_user_add" id="gridRadioss3" value="0" {{ old('tr_questions_user_add', $data->tr_questions_user_add) == 0 ? 'checked' : '' }}>
                                    <label  for="gridRadioss3">غير فعال</label>

                                     <input  type="radio" name="tr_questions_user_add" id="gridRadioss4" value="1" {{ old('tr_questions_user_add', $data->tr_questions_user_add) == 1 ? 'checked' : '' }}>
                                     <label  for="gridRadioss4">فعال</label>
                                        </div>

                      </div>
                      <div class="roww">
                        <h4>صلاحية التعديل</h4>
                        <div class="input-groupp" style="display: flex;">

                                <input  type="radio" name="tr_questions_user_update" id="gridRadioss5" value="0" {{ old('tr_questions_user_update', $data->tr_questions_user_update) == 0 ? 'checked' : '' }}>
                                    <label  for="gridRadioss5">غير فعال</label>

                                     <input  type="radio" name="tr_questions_user_update" id="gridRadioss6" value="1" {{ old('tr_questions_user_update', $data->tr_questions_user_update) == 1 ? 'checked' : '' }}>
                                     <label  for="gridRadioss6">فعال</label>
                                        </div>

                      </div>
                      <div class="roww">
                       <input type="submit" value="حفظ" class="bttn">
                      </div>
                    </form>
              </div>


        </div>
@endsection
