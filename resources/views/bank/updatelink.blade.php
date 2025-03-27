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
            <h4 class="h44 gf">تعديل الرابط الامتحاني  </h4>

            <form action="{{url('assessment/update',$data->id)}}" method="post" enctype="multipart/form-data" onsubmit="mergeDateTime()" style="padding: 20px;color: black;">
            @csrf

                      <div class="roww">


                            <div class="input-groupp">
                            <h4 style="text-align:right;">  السنة التدريبية</h4>
                            <select name="bimar_assessment_status_id" id="bimar_assessment_status_id" class="@error('bimar_assessment_status_id') is-invalid @enderror">
                         <option>اختر السنة التدريبية</option>
                             @foreach ($statuses as $status)
                             <option value="{{ $status->id}}" {{ $status->id == $data->bimar_assessment_status_id ? 'selected' : '' }}>
                               {{ $status->tr_assessment_status_name_ar }}
                               </option>
                             @endforeach
                        </select>
                        @error('bimar_assessment_status_id')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                            </div>

        <h4 style="text-align:right;">تاريخ ووقت بداية التقييم</h4>
        <div class="input-groupp">
            <input type="date" id="start_date" value="{{$start_date}}">
            <input type="time" id="start_time" value="{{$start_time}}">
        </div>

        <!-- تاريخ ووقت نهاية التقييم -->
        <h4 style="text-align:right;">تاريخ ووقت نهاية التقييم</h4>
        <div class="input-groupp">
            <input type="date" id="end_date" value="{{$end_date}}">
            <input type="time" id="end_time" value="{{$end_time}}">
        </div>

        <!-- حقل مخفي لحفظ البيانات المدمجة -->
        <input type="hidden" id="tr_assessment_start_time" name="tr_assessment_start_time">
        <input type="hidden" id="tr_assessment_end_time" name="tr_assessment_end_time">
        <h4 style="text-align:right;">ملاحظات  </h4>

<div class="input-groupp input-groupp-icon">
<input type="text" placeholder="ملاحظات" name="tr_assessment_note" id="tr_assessment_note" class="@error('tr_assessment_note') is-invalid @enderror" value="{{$data->tr_assessment_note}}"/>

    <div class="input-icon"><i class="fa-solid fa-audio-description"></i></div>
    @error('tr_assessment_note')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
@enderror
</div>
        <!-- <div class="input-groupp">
        <div class="input-icon"><i class="fa-solid fa-audio-description"></i></div>

            <input type="text" placeholder="ملاحظات" name="tr_assessment_note" id="tr_assessment_note" class="@error('tr_assessment_note') is-invalid @enderror" value="{{$data->tr_assessment_note}}"/>
            @error('tr_assessment_note')
                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
            @enderror
        </div> -->
        @if($data->bimar_assessment_type_id==2)
        <h4 style="text-align:right;">كلمة السر  </h4>

<div class="input-groupp input-groupp-icon">
<input type="text" placeholder="كلمة السر" name="tr_assessment_passcode" id="tr_assessment_passcode" class="@error('tr_assessment_passcode') is-invalid @enderror" value="{{$data->tr_assessment_passcode}}"/>

<div class="input-icon"><i class="fa-solid fa-lock"></i></div>
@error('tr_assessment_passcode')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
@enderror
</div>
@endif

        <!-- <div class="input-groupp">
        <div class="input-icon"><i class="fa-solid fa-lock"></i></div>

            <input type="text" placeholder="كلمة السر" name="tr_assessment_passcode" id="tr_assessment_passcode" class="@error('tr_assessment_passcode') is-invalid @enderror" value="{{$data->tr_assessment_passcode}}"/>
            @error('tr_assessment_passcode')
                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
            @enderror
        </div> -->

    </div>
                      <div class="roww">
                       <input type="submit" value="حفظ" class="bttn" style="border:1px solid #23a794;">
                      </div>
                    </form>
              </div>


        </div>
<script>
        function mergeDateTime() {
    // الحصول على القيم من الحقول المنفصلة
    let startDate = document.getElementById("start_date").value;
    let startTime = document.getElementById("start_time").value;
    let endDate = document.getElementById("end_date").value;
    let endTime = document.getElementById("end_time").value;

    // دمج التاريخ والوقت في نفس الحقل المخفي قبل الإرسال
    document.getElementById("tr_assessment_start_time").value = startDate + " " + startTime;
    document.getElementById("tr_assessment_end_time").value = endDate + " " + endTime;
}
</script>

@endsection
