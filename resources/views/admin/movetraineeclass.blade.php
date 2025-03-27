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
            <div class="containerr" style="color:black;">
            <h4 class="h44 gf"> نقل المتدرب الى صف اخر   </h4>
            <form action="  {{url('enrol_trainee/update',$data->id)}}" method="Post" enctype="multipart/form-data" style="padding: 20px;color: black;">
            @csrf
            @method('PUT')

              <div class="roww">
                        <h4 style="text-align:right;"> اختر الصف الذي تريد ان تنقل له المتدرب  </h4>

                        <div class="input-groupp input-groupp-icon">
                        <select name="bimar_enrol_class_id" class="@error('bimar_enrol_class_id') is-invalid @enderror">
                         <!-- <option>اختر السنة التدريبية</option> -->
                         @foreach ($classes as $class)

                         <option value="{{ $class->id }}" {{ $class->id == $data->bimar_enrol_class_id ? 'selected' : '' }}>
    {{ $class->tr_enrol_classes_name  }}
</option>

                    @endforeach
                        </select>
                           @error('bimar_enrol_class_id')
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
