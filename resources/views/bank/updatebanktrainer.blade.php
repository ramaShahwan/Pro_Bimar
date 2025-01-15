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
<div id="page-wrapper">
@if(session()->has('message'))
        <div class="alert alert-info" role="alert" style="text-align:end;font-size: 20px; ">
          {{session()->get('message')}}
        </div>
@endif
            <div class="containerr">
            <form action="  {{url('bank_trainer/update',$data->id)}}" method="Post" enctype="multipart/form-data">
            @csrf




                        <h4> تعديل الصلاحيات</h4>









                      <div class="roww">
                        <h4>صلاحية القراءة</h4>
                        <div class="input-groupp">
                        <fieldset class="row mb-3" style="margin-left: 150px;">
                            <div >
                               <div >
                                <input  type="radio" name="tr_questions_user_read" id="gridRadioss1" value="0" {{ old('tr_questions_user_read', $data->tr_questions_user_read) == 0 ? 'checked' : '' }}>
                                    <label  for="gridRadioss1">غير فعال</label>
                                    </div>
                                       <div >
                                     <input  type="radio" name="tr_questions_user_read" id="gridRadioss2" value="1" {{ old('tr_questions_user_read', $data->tr_questions_user_read) == 1 ? 'checked' : '' }}>
                                     <label  for="gridRadioss2">فعال</label>
                                        </div>
                                        </div>
                            </fieldset> </div>
                      </div>
                      <div class="roww">
                        <h4>صلاحية الاضافة</h4>
                        <div class="input-groupp">
                        <fieldset class="row mb-3" style="margin-left: 150px;">
                            <div>
                               <div >
                                <input  type="radio" name="tr_questions_user_add" id="gridRadioss3" value="0" {{ old('tr_questions_user_add', $data->tr_questions_user_add) == 0 ? 'checked' : '' }}>
                                    <label  for="gridRadioss3">غير فعال</label>
                                    </div>
                                       <div >
                                     <input  type="radio" name="tr_questions_user_add" id="gridRadioss4" value="1" {{ old('tr_questions_user_add', $data->tr_questions_user_add) == 1 ? 'checked' : '' }}>
                                     <label  for="gridRadioss4">فعال</label>
                                        </div>
                                        </div>
                            </fieldset> </div>
                      </div>
                      <div class="roww">
                        <h4>صلاحية التعديل</h4>
                        <div class="input-groupp">
                        <fieldset class="row mb-3" style="margin-left: 150px;">
                            <div >
                               <div >
                                <input  type="radio" name="tr_questions_user_update" id="gridRadioss5" value="0" {{ old('tr_questions_user_update', $data->tr_questions_user_update) == 0 ? 'checked' : '' }}>
                                    <label  for="gridRadioss5">غير فعال</label>
                                    </div>
                                       <div >
                                     <input  type="radio" name="tr_questions_user_update" id="gridRadioss6" value="1" {{ old('tr_questions_user_update', $data->tr_questions_user_update) == 1 ? 'checked' : '' }}>
                                     <label  for="gridRadioss6">فعال</label>
                                        </div>
                                        </div>
                            </fieldset> </div>
                      </div>
                      <div class="roww">
                       <input type="submit" value="حفظ" class="bttn">
                      </div>
                    </form>
              </div>


        </div>
@endsection
