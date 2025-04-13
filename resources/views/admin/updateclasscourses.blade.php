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
<div id="page-wrapper" style="   color:black; height: 610px;
    overflow: auto;">
            <div class="containerr" style="color:black;">
            <h4 class="h44 gf">   تعديل معلومات الصف  </h4>
            <form action="  {{url('class_enrol/update',$data->id)}}" method="Post" enctype="multipart/form-data" style="padding: 20px;color: black;">
            @csrf
            @method('PUT')
            <input type="hidden" name="id" value="{{ $data->id }}">

              <div class="roww">
                        <!-- <h4 style="text-align:right;">سعة الصف</h4>
                        <div class="input-groupp input-groupp-icon">
                        <div class="input-icon"><i class="fa-solid fa-arrow-up-9-1"></i></div>
                        <input type="text" placeholder="  " value="{{ $data->tr_enrol_classes_capacity }}" name="tr_enrol_classes_capacity" id="tr_enrol_classes_capacity" class="@error('tr_enrol_classes_capacity') is-invalid @enderror"/>
                          @error('tr_enrol_classes_capacity')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                        </div> -->


</div>
                      <div class="roww">

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
