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
<div id="page-wrapper" style="color:black;height: 500px;
    overflow: auto;">
            <div class="containerr" >
                <h4 class="h44 gf">   تعديل معلومات المدرب الخاص بالصف  </h4>

            <form action="  {{url('enrol_trainer/update',$data->id)}}" method="Post" enctype="multipart/form-data" style="padding: 20px;color: black;">
            @csrf
            @method('PUT')
            <input type="hidden" name="id" value="{{ $data->id }}">

              <div class="roww">
                        <h4 style="text-align:right;">نسبة المدرب</h4>
                        <div class="input-groupp input-groupp-icon">
                            <div class="input-icon"><i class="fa-solid fa-percent"></i></div>
                          <input type="text" placeholder="  " value="{{ $data->tr_enrol_classes_trainer_percent }}" name="tr_enrol_classes_trainer_percent" id="tr_enrol_classes_trainer_percent" class="@error('tr_enrol_classes_trainer_percent') is-invalid @enderror"/>
                          @error('tr_enrol_classes_trainer_percent')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                        </div>
                        <h4 style="text-align:right;">وصف المدرب </h4>
                        <div class="input-groupp input-groupp-icon">
                            <div class="input-icon"><i class="fa-solid fa-audio-description"></i></div>
                          <input type="text" placeholder="  " value="{{ $data->tr_enrol_classes_trainer_desc }}" name="tr_enrol_classes_trainer_desc" id="tr_enrol_classes_trainer_desc" class="@error('tr_enrol_classes_trainer_desc') is-invalid @enderror"/>
                          @error('tr_enrol_classes_trainer_desc')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                        </div>


</div>

                      <div class="roww">
                       <input type="submit" value="حفظ" class="bttn" style="border:1px solid #23a794;">
                      </div>
                    </form>
              </div>


        </div>
@endsection
