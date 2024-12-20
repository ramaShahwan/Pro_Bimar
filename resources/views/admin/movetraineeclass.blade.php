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
            <form action="  {{url('enrol_trainee/update',$data->id)}}" method="Post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <input type="hidden" name="id" value="{{ $data->id }}">

              <div class="roww">
                        <h4> نقل المتدرب الى صف اخر     </h4>

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
