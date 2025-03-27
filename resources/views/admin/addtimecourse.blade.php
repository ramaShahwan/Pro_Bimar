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
        max-width: 100%;
    }
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
    /* height: 220px; */
    z-index: 2;
    text-align: center;
    /* padding: 20px; */
    box-sizing: border-box;
        /* border-right: 3px solid #23a794; */
    /* border-left: 2px solid #23a794; */
    /* border-bottom: 1px solid #23a794; */
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
<div id="page-wrapper" style="color:black;height: 500px;
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
                        <div class="card-header" style="text-align: start;font-size: 20px;display: flex;justify-content: space-between;align-items: center;background: #bdd7d3;
    color: white;">
                            <h3><i class="fa-sharp fa-solid fa-calendar-week"></i> الاوقات</h3>
                            <button onclick="togglePopuo()" class="bbtn"> اضافة وقت جديد </button>
                        </div>
                    <div class="card-block">
                        <table class="table table-bordered table-striped table-condensed">
                        <thead style="text-align: center;background: #23a794;
    color: white;">
                                <tr>
                                <th style="text-align: center;">#</th>
                                    <th style="text-align: center;">اسم الكورس </th>
                                    <th style="text-align: center;">اليوم  </th>
                                    <th style="text-align: center;">من  </th>
                                    <th style="text-align: center;">الى  </th>
                                    <th style="text-align: center;">الوصف  </th>
                                    <th style="text-align: center;">الأحداث</th>
                                </tr>
                            </thead>
                            <tbody style="text-align: center;">
                            <?php $i = 1 ?>
                            @foreach($data as $call)
                            <tr class="ttr">
                            <td>{{$i++}}</td>
                                <td> {{$call->Bimar_Course_Enrollment->bimar_training_course->tr_course_name_ar}} </td>

                                    <td>{{$call->tr_course_enrol_times_day}} </td>
                                    <td> {{$call->tr_course_enrol_times_from}} </td>
                                    <td> {{$call->tr_course_enrol_times_to}} </td>
                                    <td> {{$call->tr_course_enrol_times_desc}} </td>

                                    <!-- <td>{{$call->tr_course_enrol_trainers_desc}}    </td> -->



                                    <td>
                                        <!-- <a href=""><span class="las la-trash-alt" style="font-size: 30px; color: #f00707;"></span></a> -->
                                        <!-- <a href="{{url('course_enrollments/edit',$call->id)}}"><span class="las la-edit" style="font-size: 30px; color: #3f4046;"></span></a> -->
                                        <!-- <button onclick="togglePopuoo()" style="border: none;background: none;"><span class="las la-edit" style="font-size: 30px; color: #3f4046;"></span> </button> -->
                                        <!-- <a href="{{url('course_enrollments/show',$call->id)}}"><span class="las la-edit" style="font-size: 30px; color: #3f4046;"></span></a> -->
                                        <form action="{{url('set_time/destroy',$call->id)}}" method="post">
                                        @csrf
                                                <!-- <p class="fables-product-info my-2"><a  >

                                                <span class="fables-btn-value">التسجيل على الكورس</span></a></p> -->
                                                <input type="submit"  class="gg" style=" " value="X" onclick="return confirm('هل تريد الحذف')">
                                                </form>
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
            <h4 class="h44 gf">اوقات الدورة </h4>
            <form action="{{url('set_time/store')}}" method="post" enctype="multipart/form-data" style="padding: 20px;color: black;">
               @csrf

                      <div class="roww">

                        <div class="input-groupp input-groupp-icon" style="    width: 440px;    float: right;
    display: inline-block;">
 <select name="tr_course_enrol_times_day" id="tr_course_enrol_times_day" class="@error('tr_course_enrol_times_day') is-invalid @enderror">
 <option value="">اختر اليوم</option>
                               <option value="الجمعة">الجمعة</option>
                               <option value="السبت">السبت</option>
                               <option value="الأحد">الأحد</option>
                               <option value="الأثنين">الأثنين</option>
                               <option value="الثلاثاء">الثلاثاء</option>
                               <option value="الأربعاء">الأربعاء</option>
                               <option value="الخميس">الخميس</option>







                        </select>
                          @error('tr_course_enrol_times_day')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                        </div>
                        <div class="input-groupp input-groupp-icon" style="    width: 450px;    float: left;
    display: inline-block;">
                            <div class="input-icon"><i class="fa-sharp fa-solid fa-calendar-week"></i></div>
                          <input type="text" placeholder="الساعة من   "  name="tr_course_enrol_times_from" id="tr_course_enrol_times_from" class="@error('tr_course_enrol_times_from') is-invalid @enderror"/>
                          @error('tr_course_enrol_times_from')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                        </div>
                        <div class="input-groupp input-groupp-icon" style="    width: 440px;    float: right;
    display: inline-block;">
                            <div class="input-icon"><i class="fa-sharp fa-solid fa-calendar-week"></i></div>
                          <input type="text" placeholder="الى    "  name="tr_course_enrol_times_to" id="tr_course_enrol_times_to" class="@error('tr_course_enrol_times_to') is-invalid @enderror"/>
                          @error('tr_course_enrol_times_to')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                        </div>
                        <div class="input-groupp input-groupp-icon" style="    width: 450px;    float: left;
    display: inline-block;">
                            <div class="input-icon"><i class="fa-solid fa-audio-description"></i></div>
                          <input type="text" placeholder="الوصف    "  name="tr_course_enrol_times_desc" id="tr_course_enrol_times_desc" class="@error('tr_course_enrol_times_desc') is-invalid @enderror"/>
                          @error('tr_course_enrol_times_desc')
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
                       <input type="submit" value="حفظ" class="bttn" style="border:1px solid #23a794;">
                      </div>
                    </form>
              </div> -->


        </div>
</div>
<div class="popup" id="popup-1">
            <div class="overlay"></div>
            <div class="content">
                <div class="gf">
                <div class="close-btn" onclick="togglePopuo()"><i class="las la-times-circle"></i></div>
                <h4 class="h44">اضافة دورة تدريبية جديدة</h4>

                </div>
                <!-- <div class="containerr"> -->
                <form id="myForm" action="{{url('set_time/store')}}" method="post" enctype="multipart/form-data"style="padding: 20px;color: black;">
                @csrf
                      <div class="roww">
                      <div class="input-groupp input-groupp-icon" >
 <select name="tr_course_enrol_times_day" id="tr_course_enrol_times_day" class="@error('tr_course_enrol_times_day') is-invalid @enderror">
 <option value="">اختر اليوم</option>
                               <option value="الجمعة">الجمعة</option>
                               <option value="السبت">السبت</option>
                               <option value="الأحد">الأحد</option>
                               <option value="الأثنين">الأثنين</option>
                               <option value="الثلاثاء">الثلاثاء</option>
                               <option value="الأربعاء">الأربعاء</option>
                               <option value="الخميس">الخميس</option>







                        </select>
                          <!-- <input type="text" placeholder="اليوم   "  name="tr_course_enrol_times_day" id="tr_course_enrol_times_day" class="@error('tr_course_enrol_times_day') is-invalid @enderror"/> -->
                          @error('tr_course_enrol_times_day')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                      <span class="invalid-feedback"></span>
                        </div>
                        <div class="input-groupp input-groupp-icon" >
                            <div class="input-icon"><i class="fa-sharp fa-solid fa-calendar-week"></i></div>
                          <input type="text" placeholder="الساعة من   "  name="tr_course_enrol_times_from" id="tr_course_enrol_times_from" class="@error('tr_course_enrol_times_from') is-invalid @enderror"/>
                          @error('tr_course_enrol_times_from')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                      <span class="invalid-feedback"></span>
                        </div>
                        <div class="input-groupp input-groupp-icon" >
                            <div class="input-icon"><i class="fa-sharp fa-solid fa-calendar-week"></i></div>
                          <input type="text" placeholder="الى    "  name="tr_course_enrol_times_to" id="tr_course_enrol_times_to" class="@error('tr_course_enrol_times_to') is-invalid @enderror"/>
                          @error('tr_course_enrol_times_to')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                      <span class="invalid-feedback"></span>
                        </div>
                        <div class="input-groupp input-groupp-icon" >
                            <div class="input-icon"><i class="fa-solid fa-audio-description"></i></div>
                          <input type="text" placeholder="الوصف    "  name="tr_course_enrol_times_desc" id="tr_course_enrol_times_desc" class="@error('tr_course_enrol_times_desc') is-invalid @enderror"/>
                          @error('tr_course_enrol_times_desc')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                      <span class="invalid-feedback"></span>
                        </div>


                            <div class="input-groupp" >


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
                  <!-- </div> -->

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
        document.getElementById("myForm").addEventListener("submit", function (e) {
    e.preventDefault(); // منع إعادة تحميل الصفحة

    var formData = new FormData(this); // جمع البيانات من النموذج
    let url = "{{ url('set_time/store') }}"; // URL الخاص بالـ POST

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

@endsection
