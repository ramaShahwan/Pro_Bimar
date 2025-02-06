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
            <div class="containerr" style="color:black;">
            <form action="{{url('assessment/update',$data->id)}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
                      <div class="roww">

                        <h4>تعديل الرابط الامتحاني </h4>

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
                            <!-- <h4 style="text-align:right;">تاريخ ووقت بداية التقييم</h4>
                        <div class="input-groupp input-groupp-icon">
                        <div class="input-icon"><i class="fa-solid fa-calendar-days"></i></div>
                        <input type="datetime-local" name="tr_assessment_start_time"
       value="{{ old('tr_assessment_start_time', isset($data) ? $data->tr_assessment_start_time->format('Y-m-d\TH:i') : '') }}">
                          @error('tr_assessment_start_time')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                        </div>
                        <h4 style="text-align:right;">تاريخ ووقت نهاية التقييم</h4>

                        <div class="input-groupp input-groupp-icon">
                        <div class="input-icon"><i class="fa-solid fa-calendar-days"></i></div>

                        <input type="datetime-local" name="tr_assessment_end_time"
                        value="{{ old('tr_assessment_end_time', isset($data) ? $data->tr_assessment_end_time->format('Y-m-d\TH:i') : '') }}">                        </div>
                      </div> -->
                       <!-- تاريخ ووقت بداية التقييم -->
        <h4 style="text-align:right;">تاريخ ووقت بداية التقييم</h4>
        <div class="input-groupp">
            <input type="date" id="start_date" value="">
            <input type="time" id="start_time" value="">
        </div>

        <!-- تاريخ ووقت نهاية التقييم -->
        <h4 style="text-align:right;">تاريخ ووقت نهاية التقييم</h4>
        <div class="input-groupp">
            <input type="date" id="end_date" value="">
            <input type="time" id="end_time" value="">
        </div>

        <!-- حقل مخفي لحفظ البيانات المدمجة -->
        <input type="hidden" id="tr_assessment_start_time" name="tr_assessment_start_time">
        <input type="hidden" id="tr_assessment_end_time" name="tr_assessment_end_time">

                      <div class="roww">
                       <input type="submit" value="حفظ" class="bttn">
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
