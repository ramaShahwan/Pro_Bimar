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
            max-width: 38em;
    /* padding: 1em 3em 2em 3em; */
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
    height: 500px;
    overflow: auto;
    /* height: 220px; */
    z-index: 2;
    text-align: center;
    /* padding: 20px; */
    box-sizing: border-box;
    box-shadow: inset 0px 1px 19px 1px #23a794;

        }
        .popup .close-btn{
            cursor: pointer;
            position: absolute;
            right: 20px;
            top: 10px;
            width: 30px;
            height: 30px;
            color: white;
            font-size: 35px;
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
.gf{
            background: #23a794;
            padding: 10px 0px;
        }
        .h44{
            font-weight: 600;
            color: white;
        }
        .active-row {
    background-color: #d4edda;
}
.table-bordered > thead > tr > th,.table-bordered > tbody > tr > td{
    border:none;
}
.table-bordered{
    border:none;
}
.ttr{
    border-bottom: 1px solid #bdd7d3;
}
.ttr:hover{
    background: #23a794c2 !important;
    color: #101010;
    box-shadow: 0px 0px 7px 0px #23a794;
}
.table-striped > tbody > tr:nth-child(odd) > td{
    background:none;
}
.containerr{
padding: 0;
box-shadow: inset 0px 1px 19px 1px #23a794;
}
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

            max-width: 38em;
    /* padding: 1em 3em 2em 3em; */
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
    height: 500px;
    overflow: auto;
    /* height: 220px; */
    z-index: 2;
    text-align: center;
    /* padding: 20px; */
    box-sizing: border-box;
    box-shadow: inset 0px 1px 19px 1px #23a794;

        }
        .popup .close-btn{
            cursor: pointer;
            position: absolute;
            right: 20px;
            top: 10px;
            width: 30px;
            height: 30px;
            color: white;
            font-size: 35px;
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
</style>
<div id="page-wrapper" style="color:black;height: 610px;
    overflow: auto;">
@if(session()->has('message'))
        <div class="alert alert-info" role="alert" style="text-align:end;font-size: 20px; ">
          {{session()->get('message')}}
        </div>
@endif
<div class="row" style="    margin: 80px 30px; direction: rtl;background: white; ">
            <div class="col-lg-12">
                <div class="card" style="    border: 1px solid #23a794;
    box-shadow: 1px 1px 7px 0px #23a794;">
                        <div class="card-header" style="text-align: start;font-size: 20px;display: flex;justify-content: space-between;align-items: center; background: #bdd7d3;
    color: white;">
                            <h3><i class="fa-solid fa-school"></i> الصفوف</h3>
                            <button onclick="togglePopuo()" class="bbtn"> اضافة صف جديد  </button>
                        </div>
                    <div class="card-block">
                        <table class="table table-bordered table-striped table-condensed">
                        <thead style="text-align: center;background: #23a794;
    color: white;">
                                <tr>
                                <th style="text-align: center;">#</th>
                                    <th style="text-align: center;">الدورة التدريبية  </th>
                                    <th style="text-align: center;">اسم الصف  </th>
                                    <th style="text-align: center;">رمز الصف  </th>
                                    <th style="text-align: center;">سعة الصف  </th>
                                    <th style="text-align: center;">وضع الصف  </th>
                                    <th style="text-align: center;"> مدرب</th>
                                    <th style="text-align: center;"> متدربين</th>
                                    <th style="text-align: center;"> نموذج امتحاني</th>

                                    <th style="text-align: center;"> حالة الصف</th>

                                    <th style="text-align: center;">الأحداث</th>
                                </tr>
                            </thead>
                            <tbody style="text-align: center;">
                            <?php $i = 1 ?>
                            @foreach($data as $call)
                            <tr class="ttr">
                            <td>{{$i++}}</td>
                                <td> {{$call->Bimar_Course_Enrollment->bimar_training_course->tr_course_name_ar}} </td>

                                    <td>{{$call->tr_enrol_classes_name}}</td>
                                    <td> {{$call->tr_enrol_classes_code}}</td>
                                    <td> {{$call->tr_enrol_classes_capacity}} </td>
                                    <td> {{$call->Bimar_Class_Status->tr_class_status_name_ar}} </td>


                                    <td>
                                         <a href="{{url('enrol_trainer/get_trainers_for_class',$call->id)}}" target="_blank"><i class="fa-solid fa-user-plus" style="font-size: 20px; color: #3f4046;"></i></a>

                                    </td>

                                    <td>
                                         <a href="{{url('enrol_trainee/get_trainees_for_class',$call->id)}}" target="_blank"><i class="fa-solid fa-users" style="font-size: 20px; color: #3f4046;"></i></a>

                                    </td>
                                    <td>
                                         <a href="{{url('assessment/index',$call->id)}}" target="_blank"><i class="las la-link" style="font-size: 30px; color: #3f4046;"></i></a>

                                    </td>
                                    <td>
    <form action="{{ url('class_enrol/updateSwitch/'.$call->id) }}" method="POST">
        @csrf
        @method('POST')
        <button type="submit" class="btn btn-sm btn-{{ $call->tr_enrol_classes_status ? 'success' : 'danger' }}">
            {{ $call->tr_enrol_classes_status ? 'فعالة' : 'غير فعالة' }}
        </button>
    </form>
</td>

                                    <td>
                                        <!-- <button onclick="showEditPopup({{ $call->id }})" style="border: none;background: none;"><span class="las la-edit" style="font-size: 30px; color: #3f4046;"></span></button> -->
                                        <a href="{{url('class_enrol/edit',$call->id)}}" target="_blank"><span class="las la-edit" style="font-size: 30px; color: #3f4046;"></span></a>
                                        <!-- <button onclick="showEditPopup({{ $call->id }})" style="border: none;background: none;">
    <span class="las la-edit" style="font-size: 30px; color: #3f4046;"></span>
</button> -->


                                    </td>

                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <!-- <nav>
                            <ul class="pagination">
                                <li class="page-item"><a class="page-link" href="#">Prev</a>
                                </li>
                                <li class="page-item active">
                                    <a class="page-link" href="#">1</a>
                                </li>
                                <li class="page-item"><a class="page-link" href="#">2</a>
                                </li>
                                <li class="page-item"><a class="page-link" href="#">3</a>
                                </li>
                                <li class="page-item"><a class="page-link" href="#">4</a>
                                </li>
                                <li class="page-item"><a class="page-link" href="#">Next</a>
                                </li>
                            </ul>
                        </nav> -->
                    </div>
                </div>
            </div>
            <!-- /. PAGE INNER  -->
        </div>








            <!-- <div class="containerr">
            <h4 class="h44 gf">صف جديد  </h4>
            <form  action="{{ url('class_enrol/store') }}" method="post" enctype="multipart/form-data" style="padding: 20px;color: black;">
    @csrf

                      <div class="roww">

                        <h4 style="text-align: start;direction: rtl;">  عدد الطلاب المسجلين على هذا الكورس:  </h4>

                        <div class="input-groupp input-groupp-icon" style="">

<div class="input-icon"><i class="fa-solid fa-arrow-up-9-1"></i></div>
<input type="text" placeholder=" سعة الصف   "  name="tr_enrol_classes_capacity" id="tr_enrol_classes_capacity" class="@error('tr_enrol_classes_capacity') is-invalid @enderror" value="{{ $capacity}}" readonly/>
                          @error('tr_enrol_classes_capacity
')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                        </div>
                        <h4 style="text-align: start;direction: rtl;">  عدد الطلاب الذي ترغب باضافتهم على هذا الكورس:  </h4>
                        <div class="input-groupp input-groupp-icon" style="">
                            <div class="input-icon"><i class="fa-solid fa-arrow-up-9-1"></i></div>
                            <input type="text" placeholder="سعة الصف    "  name="tr_enrol_classes_capacity" id="tr_enrol_classes_capacity" class="@error('tr_enrol_classes_capacity') is-invalid @enderror"/>
                          @error('tr_enrol_classes_capacity')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                        </div>

                        <h4>حالة الصف </h4>
                        <div class="input-groupp" style="    display: flex
;">

                          <input id="payment-method-paypal" type="radio" name="tr_enrol_classes_status" value="0"/>
                          <label for="payment-method-paypal"> <span><i class="fa-solid fa-xmark"></i>غير فعالة</span></label>
                          <input id="payment-method-card" type="radio" name="tr_enrol_classes_status" value="1" />
                          <label for="payment-method-card"><span><i class="fa-solid fa-check"></i>فعالة</span></label>
                        </div>
                        <h4>حالة الصف الدراسي </h4>
                        <div class="input-groupp" style="">
                        <select id="bimar_class_status_id" name="bimar_class_status_id">

            @foreach ($statuses as $status)
                <option value="{{ $status->id }}"
                        {{ $status->id == $status->bimar_class_status_id ? 'selected' : '' }}>
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


                            <div class="input-groupp" style="
    ">

<input type="hidden" name="bimar_course_enrollment_id" value="{{ $course_id }}">


                        @error('bimar_course_enrollment_id')
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
              </div> -->


        </div>


        <div class="popup" id="popup-1">
            <div class="overlay"></div>
            <div class="content">
                <div class="gf">
                <div class="close-btn" onclick="togglePopuo()"><i class="las la-times-circle"></i></div>
                <h4 class="h44">   اضافة صف جديد</h4>

                </div>
                <!-- <div class="containerr"> -->
                <form id="myForm" action="{{url('class_enrol/store')}}" method="post" enctype="multipart/form-data"style="padding: 20px;color: black;">
                @csrf
                      <div class="roww">
                      <h4 style="text-align: start;direction: rtl;">  عدد الطلاب المسجلين على هذا الكورس:  </h4>

                        <div class="input-groupp input-groupp-icon" style="">

<div class="input-icon"><i class="fa-solid fa-arrow-up-9-1"></i></div>
<input type="text" placeholder=" سعة الصف   "  name="tr_enrol_classes_capacity" id="tr_enrol_classes_capacity" class="@error('tr_enrol_classes_capacity') is-invalid @enderror" value="{{ $capacity}}" readonly/>
                          @error('tr_enrol_classes_capacity
')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                      <span class="invalid-feedback"></span>

                        </div>
                        <!-- <h4 style="text-align: start;direction: rtl;">  عدد الطلاب الذي ترغب باضافتهم على هذا الكورس:  </h4>
                        <div class="input-groupp input-groupp-icon" style="">
                            <div class="input-icon"><i class="fa-solid fa-arrow-up-9-1"></i></div>
                            <input type="text" placeholder="سعة الصف    "  name="tr_enrol_classes_capacity" value="{{ old('tr_enrol_classes_capacity') }}" id="tr_enrol_classes_capacity" class="@error('tr_enrol_classes_capacity') is-invalid @enderror"/>
                          @error('tr_enrol_classes_capacity')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                      <span class="invalid-feedback"></span>

                        </div> -->

                        <!-- <h4>حالة الصف </h4>
                        <div class="input-groupp" style="    display: flex
;">

                          <input id="payment-method-paypal" type="radio" name="tr_enrol_classes_status" value="0" {{ old('tr_enrol_classes_status') == '0' ? 'checked' : '' }}/>
                          <label for="payment-method-paypal"> <span><i class="fa-solid fa-xmark"></i>غير فعالة</span></label>
                          <input id="payment-method-card" type="radio" name="tr_enrol_classes_status" value="1" {{ old('tr_enrol_classes_status') == '0' ? 'checked' : '' }}/>
                          <label for="payment-method-card"><span><i class="fa-solid fa-check"></i>فعالة</span></label>
                          <span class="invalid-feedback"></span>

                        </div> -->
                        <h4>حالة الصف الدراسي </h4>
                        <div class="input-groupp" style="">
                        <select id="bimar_class_status_id" name="bimar_class_status_id">

            @foreach ($statuses as $status)
                <option value="{{ $status->id }}"
                        {{ $status->id == $status->bimar_class_status_id ? 'selected' : '' }}>
                    {{ $status->tr_class_status_name_ar }}
                </option>
            @endforeach
                        </select>
                        @error('bimar_class_status_id')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <span class="invalid-feedback"></span>

                            </div>


                            <div class="input-groupp" style="
    ">

<input type="hidden" name="bimar_course_enrollment_id" value="{{ $course_id }}">


                        @error('bimar_course_enrollment_id')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <span class="invalid-feedback"></span>

                            </div>
                      </div>


                      <div class="roww">
                       <input type="submit" value="حفظ" class="bttn">
                      </div>
                    </form>
                  <!-- </div> -->

            </div>
        </div>
        <div class="popup" id="popuppo-1">
    <div class="overlay"></div>
    <div class="content" style="height: 380px;">
        <div class="gf">
                <div class="close-btn" onclick="togglePopuoo()"><i class="las la-times-circle"></i></div>
                <h4 class="h44">    تعديل الصف </h4>
    </div>
        @if(isset($call))
        <form id="editForm" onsubmit="updateProgram(event)" style="    padding: 20px;color: black;">
    @csrf
    @method('PUT')
    <input type="hidden" name="id" id="class_id" value="{{ $call->id }}">

    <!-- <input type="hidden" name="id" id="id" value="{{ $call->id }}"> -->

                <div class="roww">
                    <h4 style="text-align: end;">سعة الصف</h4>
                    <div class="input-groupp input-groupp-icon">
                        <div class="input-icon"><i class="fa-sharp fa-solid fa-calendar-week"></i></div>
                        <input type="text" id="tr_enrol_classes_capacity" name="tr_enrol_classes_capacity"
                               value="{{ $call->tr_enrol_classes_capacity}}" class="@error('tr_enrol_classes_capacity') is-invalid @enderror"/>
                        @error('tr_enrol_classes_capacity
')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>


                </div>

                <div class="roww">
                    <h4>وضع الصف</h4>
                    <div class="input-groupp">
                        <select name="bimar_class_status_id" id="bimar_class_status_id" class="@error('bimar_class_status_id') is-invalid @enderror">
                            @foreach ($statuses as $status)
                                <option value="{{ $status->id }}" {{ $status->id == $call->bimar_class_status_id ? 'selected' : '' }}>
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
        @else
            <p>لم يتم العثور على بيانات للتعديل</p>
        @endif
    </div>
</div>

</div>
<script>
      function togglePopuo(){
    let popup = document.getElementById("popup-1");

    if (popup.classList.contains("active")) {
        // إذا كان المودل مفتوحًا وأغلقناه، نقوم بمسح البيانات ورسائل الخطأ
        document.getElementById("myForm").reset(); // إعادة تعيين النموذج
        document.querySelectorAll('.invalid-feedback').forEach(error => {
            error.innerHTML = ''; // إخفاء رسائل الخطأ
        });
    }

    popup.classList.toggle("active"); // تبديل حالة المودل (فتح/إغلاق)
}
function togglePopuoo(){
            document.getElementById("popuppo-1").classList.toggle("active");
        }
        document.getElementById("myForm").addEventListener("submit", function (e) {
    e.preventDefault(); // منع إعادة تحميل الصفحة

    var formData = new FormData(this); // جمع البيانات من النموذج
    let url = "{{ url('class_enrol/store') }}"; // URL الخاص بالـ POST

    fetch(url, {
        method: 'POST',
        body: formData,
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            'Accept': 'application/json' // هذا مهم لتجنب HTML response
        }
    })
    .then(response => response.json())
    .then(data => {
        // إزالة الأخطاء السابقة من الحقول
        document.querySelectorAll('.invalid-feedback').forEach(error => {
            error.innerHTML = ''; // تفريغ الأخطاء السابقة
        });

        if (data.errors) {
            // عرض الأخطاء الجديدة تحت الحقول
            Object.keys(data.errors).forEach(key => {
                let input = document.querySelector(`[name="${key}"]`);
                if (input) {
                    // نبحث عن العنصر الذي يحتوي على class invalid-feedback
                    let errorSpan = input.parentElement.querySelector('.invalid-feedback');
                    if (errorSpan) {
                        errorSpan.innerHTML = `<strong style="color:red;">${data.errors[key][0]}</strong>`; // عرض الخطأ
                    }
                }
            });
        } else {
            // عرض الرسالة بنجاح داخل الـ #page-wrapper
            let messageDiv = document.createElement('div');
            messageDiv.classList.add('alert', 'alert-info');
            messageDiv.setAttribute('role', 'alert');
            messageDiv.style.textAlign = 'end';
            messageDiv.style.fontSize = '20px';
            messageDiv.innerHTML = data.message; // عرض رسالة النجاح

            // إضافة الرسالة إلى #page-wrapper
            let pageWrapper = document.getElementById('page-wrapper');
            if (pageWrapper) {
                pageWrapper.prepend(messageDiv); // إضافة الرسالة في بداية #page-wrapper
            }

            // إعادة تعيين النموذج
            document.getElementById("myForm").reset();
            togglePopuo();
            // تأخير بسيط لإغلاق المودل بعد إرسال البيانات بنجاح
            setTimeout(() => {
    location.reload(); // تحديث الصفحة
}, 1000); // تأخير بسيط لإغلاق المودل بعد إرسال البيانات بنجاح
        }
    })
    .catch(error => console.error('Error:', error));
});

</script>
<script>
    // الجافا سكربت للتعامل مع عملية الإرسال عبر AJAX
    document.getElementById('enrolForm').addEventListener('submit', function (event) {
        event.preventDefault(); // منع الإرسال التقليدي للنموذج

        let formData = new FormData(this); // إنشاء كائن FormData من النموذج

        fetch('{{ url('class_enrol/store') }}', {
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                // عند النجاح، يمكننا تحديث الصفحة أو القيام بأي إجراء آخر
                window.location.reload(); // إعادة تحميل الصفحة
            } else {
                // التعامل مع الأخطاء إن وجدت
                alert('حدث خطأ، حاول مجددًا.');
            }
        })
        .catch(error => {
            console.error('حدث خطأ في الاتصال:', error);
            alert('حدث خطأ في الاتصال. الرجاء المحاولة مرة أخرى.');
        });
    });
</script>
<script>
//    function togglePopuoo() {
//     document.getElementById("popuppo-1").classList.toggle("active");
// }
document.addEventListener('DOMContentLoaded', function () {

// كودك هنا

});
function showEditPopup(id) {
    fetch(`/class_enrol/edit/${id}`)
        .then(response => response.json())
        .then(data => {
            console.log("Response Data:", data); // تحقق من البيانات في الكونسول

            // تحديث القيم في الحقول
            document.getElementById('class_id').value = data.data.id;
            document.getElementById('tr_enrol_classes_capacity').value = data.data.tr_enrol_classes_capacity;

            // تحديث القائمة المنسدلة (حالة الصف)
            let statusSelect = document.getElementById('bimar_class_status_id');
            statusSelect.value = data.data.bimar_class_status_id;

            // تأكيد تحديث القيم (إضافة تأخير بسيط لحل أي تأخير في التحديث)
            setTimeout(() => {
                console.log("Updated Values:",
                    document.getElementById('class_id').value,
                    document.getElementById('tr_enrol_classes_capacity').value,
                    document.getElementById('bimar_class_status_id').value
                );

                togglePopuoo(); // فتح النافذة بعد التأكد من تحديث البيانات
            }, 50);
        })
        .catch(error => console.error('Error:', error));
}



function updateProgram(event) {
event.preventDefault();

const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

const data = {
        id: document.getElementById('class_id').value,
        tr_enrol_classes_capacity: document.getElementById('tr_enrol_classes_capacity').value,
        bimar_class_status_id: document.getElementById('bimar_class_status_id').value
    };

// التأكد من أخذ القيمة المختارة في حالة الدبلومة

// جلب معرف الكورس من الحقل المخفي
const programId = document.getElementById('class_id').value;



let url = `/class_enrol/update/${programId}`;
console.log("URL:", url);

fetch(url, {
method: 'PUT',
headers: {
    'X-CSRF-TOKEN': csrfToken,
    'Accept': 'application/json'
},
body: formData
})
.then(response => response.json())
.then(data => {
console.log("Response Data:", data);

if (data.errors) {
    Object.keys(data.errors).forEach(key => {
        let input = document.getElementById(key);
        if (input) {
            let errorSpan = input.nextElementSibling;
            if (!errorSpan || !errorSpan.classList.contains('invalid-feedback')) {
                errorSpan = document.createElement('span');
                errorSpan.classList.add('invalid-feedback');
                input.parentNode.appendChild(errorSpan);
            }
            errorSpan.innerHTML = `<strong style="color:red;">${data.errors[key][0]}</strong>`;
        }
    });
} else {
    let messageDiv = document.createElement('div');
    messageDiv.classList.add('alert', 'alert-info');
    messageDiv.setAttribute('role', 'alert');
    messageDiv.style.textAlign = 'end';
    messageDiv.style.fontSize = '20px';
    messageDiv.innerHTML = data.message; // عرض رسالة النجاح

    let pageWrapper = document.getElementById('page-wrapper');
    if (pageWrapper) {
        pageWrapper.prepend(messageDiv);
    }

    // إغلاق النافذة وتحديث الصفحة بعد 1 ثانية
    togglePopuoo();
    setTimeout(() => {
        location.reload();
    }, 1000);
}
})
.catch(error => console.error('Error:', error));
}


    </script>
@endsection
