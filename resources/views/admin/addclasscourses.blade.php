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
                            <h3><i class="fa-sharp fa-solid fa-calendar-week"></i> الصفوف</h3>
                            <!-- <button onclick="togglePopuo()" class="bbtn">اضافة سنة</button> -->
                        </div>
                    <div class="card-block">
                        <table class="table table-bordered table-striped table-condensed">
                        <thead style="text-align: center;">
                                <tr>
                                    <th style="text-align: center;">الدورة التدريبية  </th>
                                    <th style="text-align: center;">اسم الصف  </th>
                                    <th style="text-align: center;">رمز الصف  </th>
                                    <th style="text-align: center;">سعة الصف  </th>
                                    <th style="text-align: center;">وضع الصف  </th>
                                    <th style="text-align: center;">اضافة مدرب</th>
                                    <th style="text-align: center;"> حالة الصف</th>

                                    <th style="text-align: center;">الأحداث</th>
                                </tr>
                            </thead>
                            <tbody style="text-align: center;">
                            @foreach($data as $call)
                                <tr>
                                <td> {{$call->Bimar_Course_Enrollment->bimar_training_course->tr_course_name_ar}} </td>

                                    <td>{{$call->tr_enrol_classes_name}}</td>
                                    <td> {{$call->tr_enrol_classes_code}}</td>
                                    <td> {{$call->tr_enrol_classes_capacity}} </td>
                                    <td> {{$call->Bimar_Class_Status->tr_class_status_name_ar}} </td>


                                    <td>
                                         <a href="{{ route('addtrainerclass') }}"><i class="fa-solid fa-user-plus" style="font-size: 20px; color: #3f4046;"></i></a>

                                    </td>
                                    <td>   <a href=" class_enrol/updateSwitch/{{$call->id}}" class="btn btn-sm btn-{{$call->tr_enrol_classes_status ? 'success' : 'danger'}}">
    {{$call->tr_enrol_classes_status ? 'فعالة' : 'غير فعالة'}}
</a></td>

                                    <td>
                                        <!-- <button onclick="togglePopuoo()" style="border: none;background: none;"><span class="las la-edit" style="font-size: 30px; color: #3f4046;"></span></button> -->
                                        <button onclick="showEditPopup({{ $call->id }})" style="border: none;background: none;"><span class="las la-edit" style="font-size: 30px; color: #3f4046;"></span></button>

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








            <div class="containerr">
            <form action="{{url('class_enrol/store')}}" method="post" enctype="multipart/form-data">
               @csrf

                      <div class="roww">

                        <h4>  صف جديد</h4>
                        <div class="input-groupp input-groupp-icon" style="
 ">
                            <h4 style="    text-align: start;
    direction: rtl;">  عدد الطلاب المسجلين على هذا الكورس:  </h4>

                            <!-- <div class="input-icon"><i class="fa-sharp fa-solid fa-calendar-week"></i></div> -->
                          <input type="text" placeholder=" سعة الصف   "  name="tr_enrol_classes_capacity" id="tr_enrol_classes_capacity" class="@error('tr_enrol_classes_capacity') is-invalid @enderror" value="{{ $capacity}}" readonly/>
                          @error('tr_enrol_classes_capacity')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                        </div>
                        <div class="input-groupp input-groupp-icon" style="
    "><h4 style="    text-align: start;
    direction: rtl;">  عدد الطلاب الذي ترغب باضافتهم على هذا الكورس:  </h4>
                            <!-- <div class="input-icon"><i class="fa-sharp fa-solid fa-calendar-week"></i></div> -->
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
                        <div class="input-groupp" style="">
                         <select name="bimar_class_status_id" id="bimar_class_status_id" class="@error('bimar_class_status_id') is-invalid @enderror">
                         <option>  اختر وضع الصف  </option>
                         @foreach ($statuses as $status)
                               <option value="{{ $status->id }}">{{ $status->tr_class_status_name_ar }}</option>
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
              </div>


        </div>
        <div class="popup" id="popuppo-1">
    <div class="overlay"></div>
    <div class="content">
        <div class="close-btn" onclick="togglePopuoo()">&times;</div>
        @if(isset($call))
            <form onsubmit="updateClass(event, {{ $call->id }})">
                @csrf
                @method('PUT')
                <input type="hidden" name="id" id="id" value="{{ $call->id }}">

                <div class="roww">
                    <h4>تعديل الصف</h4>
                    <h4 style="text-align: end;">سعة الصف</h4>
                    <div class="input-groupp input-groupp-icon">
                        <div class="input-icon"><i class="fa-sharp fa-solid fa-calendar-week"></i></div>
                        <input type="text" id="tr_enrol_classes_capacity" name="tr_enrol_classes_capacity" placeholder="الوصف"
                               value="{{ $call->tr_enrol_classes_capacity }}" class="@error('tr_enrol_classes_capacity') is-invalid @enderror"/>
                        @error('tr_enrol_classes_capacity')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <h4>حالة الصف</h4>
                    <div class="input-groupp">
                        <input id="active" type="radio" name="tr_enrol_classes_status" value="1" {{ $call->tr_enrol_classes_status == 1 ? 'checked' : '' }} />
                        <label for="active"><span><i class="fa-solid fa-check"></i>فعالة</span></label>
                        <input id="inactive" type="radio" name="tr_enrol_classes_status" value="0" {{ $call->tr_enrol_classes_status == 0 ? 'checked' : '' }} />
                        <label for="inactive"><span><i class="fa-solid fa-xmark"></i>غير فعالة</span></label>
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
    function togglePopuoo(){
            document.getElementById("popuppo-1").classList.toggle("active");
        }
        function showEditPopup(id) {
    fetch(`/class_enrol/edit/${id}`)
        .then(response => {
            if (!response.ok) {
                throw new Error('HTTP error! status: ' + response.status);
            }
            return response.json();
        })
        .then(data => {
            console.log('Data received:', data);

            // ملء البيانات في الحقول
            document.getElementById('id').value = data.id;
            document.getElementById('tr_enrol_classes_capacity').value = data.tr_enrol_classes_capacity;

            // تحديد حالة الصف
            const statusRadio = document.querySelector(`input[name="tr_enrol_classes_status"][value="${data.tr_enrol_classes_status}"]`);
            if (statusRadio) {
                statusRadio.checked = true;
            }

            // ملء قائمة الخيارات
            const select = document.getElementById('bimar_class_status_id');
            if (select) {
                select.innerHTML = '';
                data.statuses.forEach(status => {
                    const option = document.createElement('option');
                    option.value = status.id;
                    option.textContent = status.tr_class_status_name_ar;
                    if (status.id == data.bimar_class_status_id) {
                        option.selected = true;
                    }
                    select.appendChild(option);
                });
            }

            // إظهار النافذة
            togglePopuoo();
        })
        .catch(error => {
            console.error('Error:', error);
            alert('حدث خطأ أثناء جلب البيانات. الرجاء المحاولة مرة أخرى.');
        });
}
function updateClass(event, id) {
    event.preventDefault();

    // الحصول على بيانات النموذج
    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

    const data = {
        id: document.getElementById('id').value,
        tr_enrol_classes_capacity: document.getElementById('tr_enrol_classes_capacity').value,
        tr_enrol_classes_status: document.querySelector('input[name="tr_enrol_classes_status"]:checked').value,
        bimar_class_status_id: document.getElementById('bimar_class_status_id').value
    };

    console.log(data); // إضافة سجل للتحقق من البيانات

    // إرسال الطلب باستخدام Fetch API
    fetch(`/class_enrol/update/${data.id}`, {
        method: 'POST', // استخدام POST مع إضافة _method: 'PUT'
        headers: {
            'X-CSRF-TOKEN': csrfToken,
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({ ...data, _method: 'PUT' }) // إرسال البيانات مع تحديد طريقة PUT
    })
    .then(response => {
        if (response.ok) {
            alert("تم التعديل بنجاح");
            location.reload(); // إعادة تحميل الصفحة لتحديث البيانات
        } else {
            return response.json().then(data => {
                alert(data.error || "حدث خطأ أثناء التعديل");
            });
        }
    })
    .catch(error => console.error('Error:', error)); // سجل الأخطاء في الكونسول
}


    </script>
@endsection
