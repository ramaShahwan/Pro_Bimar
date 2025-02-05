@extends('layout_admin.master')
@section('content')
<style>
    .popup .overlay{
            position: fixed;
            top: 0px;
            left: 0px;
            width: 100vw;
            height: 100vw;
            background: rgba(0, 0, 0, 0.7);
            z-index: 1;
            display: none;
        }
        .popup .content{
            /* position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%,-50%) scale(0);

            width: 450px;
            height: 220px;
            z-index: 2;
            text-align: center;
            padding: 20px;
            box-sizing: border-box; */
            max-width: 38em;
    padding: 1em 3em 2em 3em;
    /* margin: 0em auto; */
    background-color: #fff;
    /* border-radius: 4.2px; */
    /* box-shadow: 0px 3px 10px -2px rgba(0, 0, 0, 0.2); */
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%) scale(0);
    background: #fff;
    width: 450px;
    /* height: 220px; */
    z-index: 2;
    text-align: center;
    padding: 20px;
    box-sizing: border-box;

        }
        .popup .close-btn{
            cursor: pointer;
            position: absolute;
            right: 20px;
            top: 20px;
            width: 30px;
            height: 30px;
            background: #222;
            color: #fff;
            font-size: 25px;
            font-weight: 600;
            line-height: 30px;
            text-align: center;
            border-radius: 50%;
        }
        .popup.active .overlay{
            display: block;
        }
        .popup.active .content{
            transition: all 300ms ease-in-out;
            transform: translate(-50%,-50%) scale(1);

        }
          /* شكل المفتاح */
          .switch {
            position: relative;
            display: inline-block;
            width: 60px;
            height: 34px;
        }

        /* شريط الخلفية */
        .switch input {
            opacity: 0;
            width: 0;
            height: 0;
        }

        .slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #ccc;
            transition: .4s;
            border-radius: 34px;
        }

        .slider:before {
            position: absolute;
            content: "";
            height: 26px;
            width: 26px;
            left: 4px;
            bottom: 4px;
            background-color: white;
            transition: .4s;
            border-radius: 50%;
        }

        /* اللون الأخضر عند التفعيل */
        input:checked + .slider {
            background-color: green;
        }

        /* تحريك الزر عند التفعيل */
        input:checked + .slider:before {
            transform: translateX(26px);
        }

input[type="radio"]:checked + label,
input:checked + label:active {
  /* background-color: #f0a500; */
  background-color: #61baaf;
  color: #fff;
  /* border-color: #bd8200; */
  border-color: #61baaf;
}
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
    /* .containerr{
        max-width: 100%;
    } */
    .gg{
    font-size: 20px;
    border: none;
    background: none;
    border-radius: none;
    color: #ff0404;
    padding: 0;
}
.gg:hover{
    font-size: 20px;
    border: none;
    background: none;
    border-radius: none;
    color: #ff0404;
}

</style>
<div id="page-wrapper" style="color:black;">
@if(session()->has('message'))
        <div class="alert alert-info" role="alert" style="text-align:end;font-size: 20px; ">
          {{session()->get('message')}}
        </div>
@endif
<div class="row" style="    margin: 80px 30px; direction: rtl;background: white; ">
            <div class="col-lg-12">
                <div class="card">
                        <div class="card-header" style="text-align: start;font-size: 20px;display: flex;justify-content: space-between;align-items: center;">
                            <h3><i class="fa-solid fa-users"></i> مدربين الصف</h3>
                            <!-- <button onclick="togglePopuo()" class="bbtn">اضافة سنة</button> -->
                        </div>
                    <div class="card-block">
                        <table class="table table-bordered table-striped table-condensed">
                        <thead style="text-align: center;">
                                <tr>
                                    <th style="text-align: center;"> نوع التقييم   </th>
                                    <th style="text-align: center;">حالة التقييم    </th>
                                    <th style="text-align: center;">اسم النموذج     </th>
                                    <th style="text-align: center;">تاريخ ووقت بداية التقييم    </th>
                                    <th style="text-align: center;">تاريخ ووقت نهاية التقييم   </th>
                                    <th style="text-align: center;">ملاحظات </th>
                                    <th style="text-align: center;">المدربين </th>
                                    <th style="text-align: center;">المتدربين </th>
                                    <th style="text-align: center;">الأحداث</th>
                                </tr>
                            </thead>
                            <tbody style="text-align: center;">

                                <tr>
                                <td>  kkkk </td>
                                    <td>fdfd </td>
                                    <td> fdffd</td>
                                    <td> dfdffd </td>
                                    <td> ffff </td>
                                    <td> fffff</td>

                                    <td>
                                         <a href="{{url('enrol_trainer/get_trainers_for_class',$call->id)}}"><i class="fa-solid fa-user-plus" style="font-size: 20px; color: #3f4046;"></i></a>

                                    </td>
                                    <td>
                                         <a href="{{url('enrol_trainee/get_trainees_for_class',$call->id)}}"><i class="fa-solid fa-users" style="font-size: 20px; color: #3f4046;"></i></a>

                                    </td>
                                    <!-- <td>
                                         <a href=""><i class="fa-solid fa-user-plus" style="font-size: 20px; color: #3f4046;"></i></a>

                                    </td> -->

                                    <td>
                                    <a href=""><span class="las la-edit" style="font-size: 30px; color: #3f4046;"></span></a>
                                    <form action="" method="post" style="display: inline-block;">
                                        @csrf
                                             <span class="fables-btn-value">التسجيل على الكورس</span></a></p> -->
                                                <input type="submit"  class="gg" style=" " value="X" onclick="return confirm('هل تريد الحذف')">
                                                </form>
                                    </td>

                                </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
            <!-- /. PAGE INNER  -->
        </div>








            <div class="containerr">
            <form action="{{ url('enrol_trainer/store') }}" method="post" enctype="multipart/form-data" onsubmit="mergeDateTime()">
    @csrf

    <div class="roww">
        <h4>مدرب جديد</h4>

        <!-- اختيار نوع التقييم -->
        <div class="input-groupp">
            <select name="bimar_assessment_type_id" id="bimar_assessment_type_id" class="@error('bimar_assessment_type_id') is-invalid @enderror">
                <option>اختر نوع تقييم</option>
                @foreach ($types as $type)
                    <option value="{{ $type->id }}">{{ $type->tr_assessment_type_name_ar }}</option>
                @endforeach
            </select>
            @error('bimar_assessment_type_id')
                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
            @enderror
        </div>

        <!-- اختيار حالة التقييم -->
        <div class="input-groupp">
            <select name="bimar_assessment_status_id" id="bimar_assessment_status_id" class="@error('bimar_assessment_status_id') is-invalid @enderror">
                <option>اختر حالة التقييم</option>
                @foreach ($statuses as $status)
                    <option value="{{ $status->id }}">{{ $status->tr_assessment_status_name_ar }}</option>
                @endforeach
            </select>
            @error('bimar_assessment_status_id')
                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
            @enderror
        </div>

        <!-- تاريخ ووقت بداية التقييم -->
        <h4 style="text-align:right;">تاريخ ووقت بداية التقييم</h4>
        <div class="input-groupp">
            <input type="date" id="start_date">
            <input type="time" id="start_time">
        </div>

        <!-- تاريخ ووقت نهاية التقييم -->
        <h4 style="text-align:right;">تاريخ ووقت نهاية التقييم</h4>
        <div class="input-groupp">
            <input type="date" id="end_date">
            <input type="time" id="end_time">
        </div>

        <!-- حقل مخفي لحفظ البيانات المدمجة -->
        <input type="hidden" id="tr_assessment_start_time" name="tr_assessment_start_time">
        <input type="hidden" id="tr_assessment_end_time" name="tr_assessment_end_time">

        <!-- ملاحظات -->
        <div class="input-groupp">
            <input type="text" placeholder="ملاحظات" name="tr_assessment_note" id="tr_assessment_note" class="@error('tr_assessment_note') is-invalid @enderror"/>
            @error('tr_assessment_note')
                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
            @enderror
        </div>

        <input type="hidden" name="bimar_enrol_class_id" value="{{ $class_id }}">

        <div class="roww">
            <input type="submit" value="حفظ" class="bttn">
        </div>
    </div>
</form>

              </div>


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
