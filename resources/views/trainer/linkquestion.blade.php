@extends('layout_trainer.mester')
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
                            <h3><i class="fa-solid fa-users"></i>  اسئلة الرابط</h3>
                            <!-- <button onclick="togglePopuo()" class="bbtn">اضافة سنة</button> -->
                        </div>
                    <div class="card-block">
                        <table class="table table-bordered table-striped table-condensed">
                        <thead style="text-align: center;">
                                <tr>
                                <th>النموذج    </th>
                                <th>السؤال   </th>
                                <th>المدرب  </th>

                                <th>تاريخ ووقت ادخال السؤال </th>

                                    <!-- <th style="text-align: center;">اضافة مدرب</th> -->
                                    <th style="text-align: center;">الأحداث</th>
                                </tr>
                            </thead>
                            <tbody style="text-align: center;">
                            @foreach($questions as $call)
                                <tr>
                                <td>  {{$call->Bimar_Assessment->tr_assessment_name}}  </td>

                                    <td>{{$call->Bimar_Bank_Assess_Question->tr_bank_assess_questions_name}}  </td>
                                    <td>{{$call->Bimar_User->tr_user_fname_ar}} {{$call->Bimar_User->tr_user_lname_ar}}  </td>

                                    <td> {{$call->tr_bank_assess_questions_used_insertdate}}</td>



                                    <!-- <td>
                                         <a href=""><i class="fa-solid fa-user-plus" style="font-size: 20px; color: #3f4046;"></i></a>

                                    </td> -->

                                    <td>
                                    <form action="{{url('question_used/destroy',$call->id)}}" method="post" style="display: inline-block;">
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








            <div class="containerr">
            <form action="{{url('assessment_tutor/show_question_banks')}}" method="GET" enctype="multipart/form-data">
               @csrf

                      <div class="roww">

                        <h4> سؤال جديد</h4>
                        <div class="input-groupp" >
                         <select name="bimar_questions_bank_id" id="bimar_questions_bank_id" class="@error('bimar_questions_bank_id') is-invalid @enderror">
                         <option>  اختر البنك  </option>
                         @foreach ($data as $bank)
                               <option value="{{ $bank->id }}">{{ $bank->tr_bank_name }}</option>
                             @endforeach
                        </select>
                        @error('bimar_questions_bank_id')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                            </div>
                            <div class="input-groupp" >
                         <select name="bimar_questions_type_id" id="bimar_questions_type_id" class="@error('bimar_questions_type_id') is-invalid @enderror">
                         <option>  اختر نوع السؤال  </option>
                         <option value="0">كل الانواع</option>
                         @foreach ($types as $type)

                               <option value="{{ $type->id }}">{{ $type->tr_questions_type_name }}</option>
                             @endforeach
                        </select>
                        @error('bimar_questions_type_id')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                            </div>
<input type="hidden" name="bimar_assessment_id" value="{{ $assessment_id }}">
</div>
                      <div class="roww">
                       <input type="submit" value="بحث" class="bttn">
                      </div>
                    </form>
              </div>


        </div>
        <div class="popup" id="popuppo-1">
          <div class="overlay"></div>
         <div class="content">
         <div class="close-btn" onclick="togglePopuoo()">&times;</div>

            <form action="">
         @csrf
         <input type="hidden" name="id" value="2">
            <div class="roww">
                <h4> تعديل نسبة المدرب </h4>
                <h4 style="text-align: end;">  نسبة المدرب </h4>
                <div class="input-groupp input-groupp-icon">
                    <div class="input-icon"><i class="fa-sharp fa-solid fa-calendar-week"></i></div>
                    <input type="text" id="tr_enrol_classes_trainer_percent" name="tr_enrol_classes_trainer_percent" placeholder="الاسم باللغة العربية" value="tt" class="@error('tr_enrol_classes_trainer_percent') is-invalid @enderror"/>
                    @error('tr_enrol_classes_trainer_percent')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                </div>
                <h4 style="text-align: end;">  التوصيف </h4>
                <div class="input-groupp input-groupp-icon">
                    <div class="input-icon"><i class="fa-sharp fa-solid fa-calendar-week"></i></div>
                    <input type="text" id="tr_enrol_classes_trainer_desc" name="tr_enrol_classes_trainer_desc" placeholder="الاسم باللغة العربية" value="tt" class="@error('tr_enrol_classes_trainer_desc') is-invalid @enderror"/>
                    @error('tr_enrol_classes_trainer_desc')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                </div>

            </div>

            <div class="roww">


                            <div class="input-groupp" style="
    ">


                        <input type="hidden" name="bimar_course_enrollment_id" value="1">

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
</div>
<script>
    function togglePopuoo(){
            document.getElementById("popuppo-1").classList.toggle("active");
        }
      function showEditPopup(id) {
    fetch(`/bank/edit/${id}`)
        .then(response => response.json())
        .then(data => {
            console.log('Data received:', data);

            // Assign the values to the correct fields
            document.getElementById('tr_bank_code').value = data.tr_bank_code; // Arabic name

            document.getElementById('tr_bank_name_ar').value = data.tr_bank_name_ar; // Arabic name
            document.getElementById('tr_bank_name_en').value = data.tr_bank_name_en; // English name
            document.getElementById('tr_bank_desc').value = data.tr_bank_desc; // Arabic name

            // Update the radio button for type status
            document.querySelector(`input[name="tr_bank_status"][value="${data.tr_bank_status}"]`).checked = true;

            // Assign the ID in a hidden field
            document.querySelector('input[name="id"]').value = id;

            // Show the popup
            togglePopuoo();
        })
        .catch(error => console.error('Error:', error));
}

function updateBank(event) {
    event.preventDefault(); // منع إعادة تحميل الصفحة

    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

    const data = {
        tr_bank_code: document.getElementById('tr_bank_code').value,

        tr_bank_name_ar: document.getElementById('tr_bank_name_ar').value,
        tr_bank_name_en: document.getElementById('tr_bank_name_en').value,
        tr_bank_desc: document.getElementById('tr_bank_desc').value,

        tr_bank_status: document.querySelector('input[name="tr_bank_status"]:checked').value,
        id: document.querySelector('input[name="id"]').value
    };

    let url = `/bank/update/${data.id}`;

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
@endsection
