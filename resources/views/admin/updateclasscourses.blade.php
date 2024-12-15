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
            <form action="  {{url('class_enrol/update',$data->id)}}" method="Post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <input type="hidden" name="id" value="{{ $data->id }}">

              <div class="roww">
                        <h4> تعديل صف الدورة</h4>
                        <div class="input-groupp input-groupp-icon">
                            <div class="input-icon"><i class="fa-sharp fa-solid fa-calendar-week"></i></div>
                          <input type="text" placeholder="  " value="{{ $data->tr_enrol_classes_capacity }}" name="tr_enrol_classes_capacity" id="tr_enrol_classes_capacity" class="@error('tr_enrol_classes_capacity') is-invalid @enderror"/>
                          @error('tr_enrol_classes_capacity')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                        </div>


</div>
                      <div class="roww">
                        <h4>حالة الصف</h4>
                        <div class="input-groupp">
                        <fieldset class="row mb-3" style="margin-left: 30px;">
                            <div class="col-sm-10">
                               <div >
                                <input  type="radio" name="tr_enrol_classes_status" id="gridRadioss1" value="0" {{ old('tr_enrol_classes_status', $data->tr_enrol_classes_status) == 0 ? 'checked' : '' }}>
                                    <label  for="gridRadioss1">غير فعال</label>
                                    </div>
                                       <div >
                                     <input  type="radio" name="tr_enrol_classes_status" id="gridRadioss2" value="1" {{ old('tr_enrol_classes_status', $data->tr_enrol_classes_status) == 1 ? 'checked' : '' }}>
                                     <label  for="gridRadioss2">فعال</label>
                                        </div>
                                        </div>
                            </fieldset> </div>
                            <h4>وضع الصف</h4>
                        <div class="input-groupp">

                        <select name="bimar_class_status_id" id="bimar_class_status_id" class="@error('bimar_class_status_id') is-invalid @enderror">
                            @foreach ($statuses as $status)

                                <option value="{{ $status->id }}" {{ $status->id == $data->bimar_class_status_id ? 'selected' : '' }}>
                {{ $status->tr_class_status_name_ar }}
            </option>
                            @endforeach
                        </select>


                        @error('bimar_class_status_id')
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
