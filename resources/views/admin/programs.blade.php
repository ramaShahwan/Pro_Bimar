@extends('layout_admin.master')
@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

<style>
    body{
    color: #403e3e;
}
.input-groupp-icon input {
    text-align: end;
    padding-right: 4.4em;
}

    .bbtn{
        border: none;
    padding: 10px;
    background-color:#61baaf;
    color: white;
    border-radius: 20px;
    }
    .bttn:hover{
        background-color:#61baaf;
        color: white;
        font-size: 17px;
        font-weight: 600;
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
    .card {
    position: relative;
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-orient: vertical;
    -webkit-box-direction: normal;
    -ms-flex-direction: column;
    flex-direction: column;
    min-width: 0;
    word-wrap: break-word;
    background-color: #fff;
    background-clip: border-box;
    border: 1px solid rgba(0, 0, 0, .125);
    border-radius: .25rem;
}
.row {
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -ms-flex-wrap: wrap;
    flex-wrap: wrap;
    margin-right: -15px;
    margin-left: -15px;
}
.card-header {
    padding: .75rem 1.25rem;
    margin-bottom: 0;
    background-color: rgba(0, 0, 0, .03);
    border-bottom: 1px solid rgba(0, 0, 0, .125);
}
.table td, .table th {
    text-align: center;
    font-size: 17px;
    padding: .75rem !important;
    vertical-align: top;
    border-top: 1px solid #dee2e6;
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
  background-color:#61baaf;
  color: #fff;
  /* border-color: #bd8200; */
  border-color:#61baaf;
}



input[type="radio"] {
  opacity: 0; /* اجعل الزر غير مرئي ولكن لا تخفيه */
  position: absolute; /* استخدم position لتخزينه بشكل غير مرئي */
}

input[type="radio"] + label {
  display: inline-block;
  width: 50%;
  text-align: center;
  float: left;
  border-radius: 0;
  padding: 1em;
  border: 1px solid #e5e5e5;
  cursor: pointer;
  transition: background-color 0.3s, color 0.3s;
}

input[type="radio"]:checked + label {
  background-color:#61baaf;
  color: #fff;
  border-color:#61baaf;
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
.ttr:hover{
    background: #23a794c2 !important;
    color: #101010;
    box-shadow: 0px 0px 7px 0px #23a794;
}
.table-striped > tbody > tr:nth-child(odd) > td{
    background:none;
}
.gf{
            background: #23a794;
            padding: 10px 0px;
        }
        .h44{
            font-weight: 600;
            color: white;
        }
</style>
        <!-- /. NAV SIDE  -->
<div id="page-wrapper" style="    height: 500px;
    overflow: auto;">
@if(session()->has('message'))
        <div class="alert alert-info" role="alert" style="text-align:end;font-size: 20px; ">
          {{session()->get('message')}}
        </div>
@endif
<div class="row" style="    margin: 80px 30px; direction: rtl;">
            <div class="col-lg-12">
                <div class="card" style="border: 1px solid #23a794;
    box-shadow: 1px 1px 7px 0px #23a794;">
                        <div class="card-header" style="text-align: start;font-size: 20px;display: flex;justify-content: space-between;align-items: center;    background: #bdd7d3;
    color: white;">
                            <h3> البرامج التدريبية</h3>
                            <!-- <a href="add.html" style="background: #007bff;padding: 6px;color: white;"><i class="las la-user-plus"></i> مدرب جديد</a> -->
                            <button onclick="togglePopuo()" class="bbtn"> اضافة برنامج تدريبي</button>
                        </div>
                    <div class="card-block">
                        <table class="table table-bordered table-striped table-condensed">
                            <thead style="text-align: center;
    background: #23a794;
    color: white;">

                                <tr>
                                <th>#</th>
                                    <th>رمز البرنامج</th>
                                    <th>الاسم باللغة العربية</th>
                                    <th>الاسم باللغة الانكليزية</th>
                                    <th>صورة</th>
                                    <th>الحالة</th>
                                    <th>الوصف</th>
                                    <th>الأحداث</th>
                                </tr>
                            </thead>
                            <tbody style="text-align: center;">
                            <?php $i = 1 ?>
                            @foreach($data as $call)
                                <tr class="ttr">
                                <td>{{$i++}}</td>
                                    <td>{{$call->tr_program_code}} </td>
                                    <td>{{$call->tr_program_name_ar}}</td>
                                    <td>{{$call->tr_program_name_en}}</td>
                                    <td><img src="{{URL::asset('/img/program/'.$call->tr_program_img)}}" alt="" class="bg-img" height="40px" width="40px"></td>
                                    <!-- <td><label class="switch">

    <input type="checkbox" class="switch-button" data-id="{{ $call->tr_program_id }}" {{ $call->tr_program_status == 1 ? 'checked' : '' }}>
    <span class="slider"></span>
</label></td> -->
<td>   <a href=" program/{{$call->id}}" class="btn btn-sm btn-{{$call->tr_program_status ? 'success' : 'danger'}}">
    {{$call->tr_program_status ? 'فعالة' : 'غير فعالة'}}
</a></td>
                                      <td>{{$call->tr_program_desc}} </td>
                                    <td>
                                        <!-- <a href=""><span class="las la-trash-alt" style="font-size: 30px; color: #f00707;"></span></a> -->
                                        <!-- <a href="update.html"><span class="las la-edit" style="font-size: 30px; color: #3f4046;"></span></a> -->
                                        <!-- <button onclick="togglePopuoo()" style="border: none;background: none;"><span class="las la-edit" style="font-size: 30px; color: #3f4046;"></span> </button> -->
                                        <!-- <a href="show.html"><span class="las la-eye" style="font-size: 30px; color: #1cda55;"></span></a> -->
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
        <div class="popup" id="popup-1">
            <div class="overlay"></div>
            <div class="content">
                <div class="gf">
                <div class="close-btn" onclick="togglePopuo()"><i class="las la-times-circle"></i></div>
                <h4 class="h44"> اضافة برنامج تدريبي جديد</h4>
                </div>

                <!-- <div class="containerr"> -->
                <form id="myForm" action="{{url('program/store')}}" method="post" enctype="multipart/form-data" style="padding: 20px;color: black;">
                @csrf
                <div class="roww">

                        <div class="input-groupp input-groupp-icon">
                            <div class="input-icon"><i class="fa-solid fa-signature"></i></div>
                          <input type="text" placeholder="رمز البرنامج" name="tr_program_code" value="{{ old('tr_program_code') }}" class="@error('tr_program_code') is-invalid @enderror"/>
                          <!-- @error('tr_program_code')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror -->
                      <span class="invalid-feedback"></span>
                        </div>
                        <div class="input-groupp input-groupp-icon">
                          <input type="text" placeholder="الاسم باللغة العربية" name="tr_program_name_ar" value="{{ old('tr_program_name_ar') }}" class="@error('tr_program_name_ar') is-invalid @enderror"/>
                          <div class="input-icon"><i class="fa-solid fa-signature"></i></div>
                          <!-- @error('tr_program_name_ar')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror -->
                      <span class="invalid-feedback"></span>
                        </div>
                        <div class="input-groupp input-groupp-icon">
                          <input type="text" placeholder=" الاسم باللغة الانكليزية" style="padding-bottom: 0;" value="{{ old('tr_program_name_en') }}" name="tr_program_name_en" class="@error('tr_program_name_en') is-invalid @enderror"/>
                          <div class="input-icon"><i class="fa-solid fa-signature"></i></div>
                          <!-- @error('tr_program_name_en')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror -->
                      <span class="invalid-feedback"></span>
                        </div>
                        <div class="input-groupp input-groupp-icon">
                            <input type="file"  placeholder="الصورة  " style="padding-bottom: 0;" name="tr_program_img"/>
                            <div class="input-icon"><i class="fa-solid fa-image"></i></div>
                          </div>
                      </div>

                      <div class="roww">
                        <h4>حالة البرنامج</h4>
                        <div class="input-groupp" style="display: flex;">
                          <input id="payment-method-card" type="radio" name="tr_program_status" value="1" {{ old('tr_program_status') == '1' ? 'checked' : '' }} />
                          <label for="payment-method-card"><span><i class="fa-solid fa-check"></i>فعالة</span></label>
                          <input id="payment-method-paypal" type="radio" name="tr_program_status" value="0"{{ old('tr_program_status') == '0' ? 'checked' : '' }} />
                          <label for="payment-method-paypal"> <span><i class="fa-solid fa-xmark"></i>غير فعالة</span></label>
                        </div>
                        <div class="input-groupp input-groupp-icon">
                          <input type="text" placeholder="الوصف" name="tr_program_desc" value="{{ old('tr_program_desc') }}"/>
                          <div class="input-icon"><i class="fa-solid fa-audio-description"></i></div>
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
    <div class="content">
        <div class="gf">
            <div class="close-btn" onclick="togglePopuoo()">
                <i class="las la-times-circle"></i>
            </div>
            <h4 class="h44">تعديل البرنامج التدريبي</h4>
        </div>

        @if(isset($call))
        <form id="editForm" onsubmit="updateProgram(event)" style="padding: 20px; color: black;">
            @csrf
            <input type="hidden" name="id" id="program_id" value="{{ $call->id }}">

            <div class="roww">
                <h4 style="text-align:right;">رمز البرنامج</h4>
                <div class="input-groupp input-groupp-icon">
                    <div class="input-icon"><i class="fa-solid fa-signature"></i></div>
                    <input type="text" placeholder="رمز البرنامج" value="{{ $call->tr_program_code }}" name="tr_program_code" id="tr_program_code" class="@error('tr_program_code') is-invalid @enderror"/>
                    @error('tr_program_code')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <h4 style="text-align:right;">الاسم باللغة العربية</h4>
                <div class="input-groupp input-groupp-icon">
                    <input type="text" placeholder="الاسم باللغة العربية" value="{{ $call->tr_program_name_ar }}" name="tr_program_name_ar" id="tr_program_name_ar" class="@error('tr_program_name_ar') is-invalid @enderror"/>
                    <div class="input-icon"><i class="fa-solid fa-signature"></i></div>
                    @error('tr_program_name_ar')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <h4 style="text-align:right;">الاسم باللغة الإنجليزية</h4>
                <div class="input-groupp input-groupp-icon">
                    <input type="text" placeholder="الاسم باللغة الإنجليزية" name="tr_program_name_en" id="tr_program_name_en" value="{{ $call->tr_program_name_en }}" class="@error('tr_program_name_en') is-invalid @enderror"/>
                    <div class="input-icon"><i class="fa-solid fa-signature"></i></div>
                    @error('tr_program_name_en')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <h4 style="text-align:right;">الصورة</h4>
                <div>
                    <img id="current_program_img" src="{{ URL::asset('/img/program/' . $call->tr_program_img) }}" class="bg-img" height="170px" width="170px">
                    <input type="file" name="tr_program_img" id="tr_program_img"/>
                </div>
            </div>

            <div class="roww">
                <h4 style="text-align:right;">الوصف</h4>
                <div class="input-groupp input-groupp-icon">
                    <textarea name="tr_program_desc" id="tr_program_desc" style="width: 100%; text-align: end; background-color: #f9f9f9; border: 1px solid #e5e5e5; color: black;">{{ $call->tr_program_desc }}</textarea>
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


        <!-- /. PAGE WRAPPER  -->

    <!-- /. WRAPPER  -->

    <!-- /. FOOTER  -->
    <script>
        function togglePopuo(){
            document.getElementById("popup-1").classList.toggle("active");
        }
        function togglePopuoo(){
            document.getElementById("popuppo-1").classList.toggle("active");
        }
    </script>
    <script>
        document.getElementById("myForm").addEventListener("submit", function (e) {
    e.preventDefault(); // منع إعادة تحميل الصفحة

    var formData = new FormData(this); // جمع البيانات من النموذج
    let url = "{{ url('program/store') }}"; // URL الخاص بالـ POST

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

            // تأخير بسيط لإغلاق المودل بعد إرسال البيانات بنجاح
            setTimeout(() => {
                togglePopuo(); // إغلاق المودل
            }, 500); // تأخير بسيط لإغلاق المودل بعد إرسال البيانات بنجاح
        }
    })
    .catch(error => console.error('Error:', error));
});

    </script>
    <script>
           document.addEventListener('DOMContentLoaded', function () {

        // كودك هنا
        showEditPopup(id);
    });
      function showEditPopup(id) {
    fetch(`/program/edit/${id}`)
        .then(response => response.json())
        .then(data => {
            console.log('Data received:', data);
            document.getElementById('program_id').value = data.id;

            // تعيين قيم الحقول بالبيانات المستلمة
            document.getElementById('tr_program_code').value = data.tr_program_code;
            document.getElementById('tr_program_name_en').value = data.tr_program_name_en;
            document.getElementById('tr_program_name_ar').value = data.tr_program_name_ar;
            document.getElementById('tr_program_desc').value = data.tr_program_desc;

            // إعداد الصورة إذا كانت موجودة
            if (data.tr_program_img) {
                document.getElementById('current_program_img').src = `/img/program/${data.tr_program_img}`;
                document.getElementById('current_program_img').style.display = 'block';
            } else {
                document.getElementById('current_program_img').style.display = 'none';
            }

            // تعيين زر الاختيار للحالة بشكل صحيح
            // document.getElementById('tr_program_status').value = data.tr_program_status;
            // console.log(data.tr_program_status);
            const statusRadio = document.querySelector(`input[name="tr_program_status"][value="${data.tr_program_status}"]`);
            console.log(statusRadio);
            if (statusRadio) {
                statusRadio.checked = true;
                console.log(`تم تحديد الحالة: ${statusRadio.value}`, statusRadio.checked); // إضافة التأكيد على حالة checked
            }

            // عرض النافذة
            togglePopuoo();
        })
        .catch(error => console.error('Error:', error));
}

function updateProgram(event) {
    event.preventDefault();

    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

    const formData = new FormData();
    formData.append('tr_program_code', document.getElementById('tr_program_code').value);
    formData.append('tr_program_name_en', document.getElementById('tr_program_name_en').value);
    formData.append('tr_program_name_ar', document.getElementById('tr_program_name_ar').value);
    formData.append('tr_program_desc', document.getElementById('tr_program_desc').value);
    let programIdInput = document.querySelector('input[name="id"]');
let programId = programIdInput ? programIdInput.value : null;
console.log("Program ID:", programId);

    console.log("Program ID:", programId);

    const newImage = document.getElementById('tr_program_img').files[0];
    if (newImage) {
        formData.append('tr_program_img', newImage);
    }

    let url = `/program/update/${programId}`;
    console.log("URL:", url);
    fetch(url, {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': csrfToken,
            'Accept': 'application/json' // هذا مهم لتجنب HTML response

        },
        body: formData
    })
    .then(response => response.json())
    .then(data => {
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

            // إضافة الرسالة إلى #page-wrapper
            let pageWrapper = document.getElementById('page-wrapper');
            if (pageWrapper) {
                pageWrapper.prepend(messageDiv); // إضافة الرسالة في بداية #page-wrapper
            }
            togglePopuoo(); 
            setTimeout(() => {
    location.reload(); // تحديث الصفحة
}, 1000);

        }
    })
    .catch(error => console.error('Error:', error));
}

    </script>
    <script>
        // JavaScript to handle toggle switch behavior
    document.querySelectorAll('.toggle-switch input').forEach((toggle) => {
        toggle.addEventListener('change', function() {
            if (this.checked) {
                this.parentElement.parentElement.classList.add('highlight');
            } else {
                this.parentElement.parentElement.classList.remove('highlight');
            }
        });
    });
    //switch
    document.querySelector('input[type="checkbox"]').addEventListener('change', function() {
      if(this.checked) {
        console.log("مفعل");
      } else {
        console.log("غير مفعل");
      }
    });

    </script>
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    @endsection
