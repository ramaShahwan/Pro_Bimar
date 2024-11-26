@extends('layout_admin.master')
@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

<style>
    select{
        width: 100%;
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
    top: 90%;
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
body{
    color: #403e3e;
}
.input-groupp-icon input {
    text-align: end;
    padding-right: 4.4em;
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
</style>




        <!-- /. NAV SIDE  -->
    <div id="page-wrapper">

        <div class="row" style="    margin: 80px 30px; direction: rtl;">
            <div class="col-lg-12">
                <div class="card">
                        <div class="card-header" style="text-align: start;font-size: 20px;display: flex;justify-content: space-between;align-items: center;">
                            <h3><i class="fa-sharp fa-solid fa-calendar-week"></i> سنوات</h3>
                            <a href="{{url('course_enrollments/create')}}" class="bbtn">  تسجيل جديد</a>
                            <!-- <button onclick="togglePopuo()" class="bbtn">اضافة سنة</button> -->
                        </div>
                    <div class="card-block">
                        <table class="table table-bordered table-striped table-condensed">
                            <thead style="text-align: center;">
                                <tr>
                                    <th>السنة التدريبية</th>
                                    <th>البرنامج التدريبي</th>
                                    <th>   الدورة التدريبية </th>
                                    <th>  رقم الدورة</th>
                                    <th>نسبة الحسم</th>
                                    <!-- <th>الوصف</th> -->

                                    <th>الحالة</th>
                                    <th>اضافة مدرب</th>
                                    <th>اضافة وقت</th>
                                    <th>اضافة صف</th>
                                    <th>الأحداث</th>
                                </tr>
                            </thead>
                            <tbody style="text-align: center;">
                            @foreach($data as $call)
                                <tr>
                                    <td>{{ $call->bimar_training_year->tr_year_name ?? 'اسم غير متاح' }} </td>
                                    <td>{{ $call->bimar_training_program->tr_program_name_ar ?? 'اسم غير متاح' }} </td>
                                    <td>{{ $call->bimar_training_course->tr_course_name_ar ?? 'اسم غير متاح' }} </td>
                                    <td>{{$call->tr_course_enrol_arrangement}}   </td>
                                    <td>{{$call->tr_course_enrol_discount}}   </td>
                                    <!-- <td>{{$call->tr_course_enrol_trainers_desc}}    </td> -->

                                    <td>   <a href=" course_enrollments/{{$call->id}}" class="btn btn-sm btn-{{$call->tr_course_enrol_status ? 'success' : 'danger'}}">
    {{$call->tr_course_enrol_status ? 'مفتوحة' : 'مغلقة '}}
</a></td>
<td>
                                         <a href="{{url('set_trainer/get_trainers_for_course',$call->id)}}"><i class="fa-solid fa-user-plus" style="font-size: 20px; color: #3f4046;"></i></a>

                                    </td>
                                    <td>
                                         <a href="{{url('set_time/get_times_for_course',$call->id)}}"><i class="fa-solid fa-calendar-plus" style="font-size: 20px; color: #3f4046;"></i></a>

                                    </td>
                                    <td>
                                         <a href="{{ route('addclasscourses') }}"><i class="fa-solid fa-school" style="font-size: 20px; color: #3f4046;"></i></a>

                                    </td>
                                    <td>
                                        <!-- <a href=""><span class="las la-trash-alt" style="font-size: 30px; color: #f00707;"></span></a> -->
                                        <a href="{{url('course_enrollments/edit',$call->id)}}"><span class="las la-edit" style="font-size: 30px; color: #3f4046;"></span></a>
                                        <!-- <button onclick="togglePopuoo()" style="border: none;background: none;"><span class="las la-edit" style="font-size: 30px; color: #3f4046;"></span> </button> -->
                                        <!-- <a href="{{url('course_enrollments/show',$call->id)}}"><span class="las la-edit" style="font-size: 30px; color: #3f4046;"></span></a> -->

                                        <a href="{{url('course_enrollments/show',$call->id)}}"><span class="las la-eye" style="font-size: 30px; color: #1cda55;"></span></a>
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

        <div class="popup" id="popuppo-1">
          <div class="overlay"></div>
         <div class="content" style="margin-top: -150px;">
         <div class="close-btn" onclick="togglePopuoo()">&times;</div>
         <h4>  المدربين لهذا الكورس  </h4>

         <table class="table table-bordered table-striped table-condensed" style="margin-top: 50px;direction: rtl;">
                            <thead style="text-align: center;">
                                <tr>
                                    <th>اسم المدرب </th>
                                    <th>اسم الكورس </th>
                                    <th>الوصف  </th>

                                    <th>الأحداث</th>
                                </tr>
                            </thead>
                            <tbody style="text-align: center;">

                            </tbody>
                        </table>

         <form >
         @csrf
         <input type="hidden" name="id" value="">
            <div class="roww">
                <h4> اضافة مدرب  </h4>
                <div class="input-groupp">
                        <select name="bimar_user_id" id="bimar_user_id" class="@error('bimar_user_id') is-invalid @enderror">
                         <option>  اختر المدرب  </option>

                        </select>
                        @error('bimar_user_id')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                            </div>

                            <div class="input-groupp input-groupp-icon">
                            <input type="text" placeholder="الوصف" name="tr_course_enrol_trainers_desc" class="@error('tr_course_enrol_trainers_desc') is-invalid @enderror"/>
                            <div class="input-icon"><i class="fa-sharp fa-solid fa-calendar-week"></i></div>
                            @error('tr_course_enrol_trainers_desc')
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
        <!-- /. PAGE WRAPPER  -->
    </div>
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
     <script>
      function showEditPopup(id) {
    fetch(`/currency/edit/${id}`)
        .then(response => response.json())
        .then(data => {
            console.log('Data received:', data);

            // Assign the values to the correct fields
            document.getElementById('tr_currency_code').value = data.tr_currency_code; // Arabic name

            document.getElementById('tr_currency_name_ar').value = data.tr_currency_name_ar; // Arabic name
            document.getElementById('tr_currency_name_en').value = data.tr_currency_name_en; // English name
            document.getElementById('tr_currency_desc').value = data.tr_currency_desc; // Arabic name

            // Update the radio button for type status
            document.querySelector(`input[name="tr_currency_status"][value="${data.tr_currency_status}"]`).checked = true;

            // Assign the ID in a hidden field
            document.querySelector('input[name="id"]').value = id;

            // Show the popup
            togglePopuoo();
        })
        .catch(error => console.error('Error:', error));
}

function updateCurrency(event) {
    event.preventDefault(); // منع إعادة تحميل الصفحة

    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

    const data = {
        tr_currency_code: document.getElementById('tr_currency_code').value,

        tr_currency_name_ar: document.getElementById('tr_currency_name_ar').value,
        tr_currency_name_en: document.getElementById('tr_currency_name_en').value,
        tr_currency_desc: document.getElementById('tr_currency_desc').value,

        tr_currency_status: document.querySelector('input[name="tr_currency_status"]:checked').value,
        id: document.querySelector('input[name="id"]').value
    };

    let url = `/currency/update/${data.id}`;

    fetch(url, {
        method: 'PUT',
        headers: {
            'X-CSRF-TOKEN': csrfToken,
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(data)
    })
    .then(response => {
        if (response.ok) {
            return response.json();
        } else {
            throw new Error('حدث خطأ في التعديل');
        }
    })
    .then(data => {
        alert("تم التعديل بنجاح");
        location.reload(); // إعادة تحميل الصفحة لتحديث البيانات
    })
    .catch(error => console.log(error));
}

    </script>
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
@endsection
