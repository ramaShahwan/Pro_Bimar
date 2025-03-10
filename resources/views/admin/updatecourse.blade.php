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
            <div class="containerr">
            <form action="  {{url('course/update',$data->id)}}" method="Post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <input type="hidden" name="id" value="{{ $data->id }}">

              <div class="roww">
                        <h4> تعديل الدورة</h4>
<h4 style="text-align: right;">رمز الدورة</h4>
                        <div class="input-groupp input-groupp-icon">
                            <div class="input-icon"><i class="fa-solid fa-signature"></i></div>
                          <input type="text" placeholder="رمز الدورة " value="{{ $data->tr_course_code }}" name="tr_course_code" id="tr_course_code" class="@error('tr_course_code') is-invalid @enderror"/>
                          @error('tr_course_code')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                        </div>
                        <h4 style="text-align: right;">اسم الدورة بالعربي</h4>

                        <div class="input-groupp input-groupp-icon">
                          <input type="text" placeholder="الاسم باللغة العربية" value="{{ $data->tr_course_name_ar }}" name="tr_course_name_ar" id="tr_course_name_ar" class="@error('tr_course_name_ar') is-invalid @enderror"/>
                          <div class="input-icon"><i class="fa-solid fa-signature"></i></div>
                          @error('tr_course_name_ar')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                        </div>
                        <h4 style="text-align: right;">اسم الدورة بالانكليزي</h4>

                        <div class="input-groupp input-groupp-icon">
                          <input type="text" placeholder="  الاسم باللغة الانكليزية" value="{{ $data->tr_course_name_en }}" name="tr_course_name_en" id="tr_course_name_en" class="@error('tr_course_name_en') is-invalid @enderror"/>
                          <div class="input-icon"><i class="fa-solid fa-signature"></i></div>
                          @error('tr_course_name_en')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                        </div>
                        <div class="">
                        <img src="{{URL::asset('/img/course/'.$data->tr_course_img)}}" width="200px" style="margin-left: 120px;">

                            <input type="file" placeholder="الصورة"  name="tr_course_img" id="tr_course_img"/>
                          </div>
                      </div>

                      <div class="roww">


                        <h4>هل الدورة التدريبية هي دوبلوم تدريبي؟ </h4>
                        <div class="input-groupp">
                        <fieldset class="row mb-3" style="margin-left: 30px;">
                            <div class="col-sm-10">
                               <div >
                                <input  type="radio" name="tr_is_diploma" id="gridRadios1" value="0" {{ old('tr_is_diploma', $data->tr_is_diploma) == 0 ? 'checked' : '' }}>
                                    <label  for="gridRadios1">غير فعال</label>
                                    </div>
                                       <div >
                                     <input  type="radio" name="tr_is_diploma" id="gridRadios2" value="1" {{ old('tr_is_diploma', $data->tr_is_diploma) == 1 ? 'checked' : '' }}>
                                     <label  for="gridRadios2">فعال</label>
                                        </div>
                                        </div>
                            </fieldset> </div>
                            <h4 style="text-align: right;">توصيف الدورة </h4>

                        <div class="input-groupp input-groupp-icon">
                          <!-- <input type="text" placeholder="الوصف" value="{{ $data->tr_course_desc }}" name="tr_course_desc" id="tr_course_desc"/> -->
                          <textarea name="tr_course_desc" id="tr_course_desc" row="4" col="12"   style="    width: 100%;    text-align: end;background-color: #f9f9f9;
    border: 1px solid #e5e5e5;
    color: black;">{{$data-> tr_course_desc}}</textarea>
                          <!-- <div class="input-icon"><i class="fa-solid fa-audio-description"></i></div> -->
                        </div>
                        <h4 style="text-align: right;"> اسم البرنامج </h4>

                        <div class="input-groupp">
                        <select name="bimar_training_program_id" class="@error('bimar_training_program_id') is-invalid @enderror">
                         <!-- <option>اختر السنة التدريبية</option> -->
                         @foreach ($programs as $program)

                        <option value="{{ $program->id}}" {{ $program->id == $data->bimar_training_program_id ? 'selected' : '' }}>
                            {{ $program->tr_program_name_ar }}
                        </option>
                    @endforeach
                        </select>

                        @error('bimar_training_program_id')
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
