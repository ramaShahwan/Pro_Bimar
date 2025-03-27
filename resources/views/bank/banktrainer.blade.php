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
    height: 600px;
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
.gf{
            background: #23a794;
            padding: 10px 0px;
        }
        .h44{
            font-weight: 600;
            color: white;
        }
</style>
<div id="page-wrapper" style="color:black; height: 500px;
    overflow: auto;" >
@if(session()->has('message'))
        <div class="alert alert-info" role="alert" style="text-align:end;font-size: 20px; ">
          {{session()->get('message')}}
        </div>
@endif
<div class="row" style="    margin: 80px 30px; direction: rtl;background: white; ">
            <div class="col-lg-12">
                <div class="card" style="border: 1px solid #23a794;
    box-shadow: 1px 1px 7px 0px #23a794;">
                        <div class="card-header" style="text-align: start;font-size: 20px;display: flex;justify-content: space-between;align-items: center;background: #bdd7d3;
    color: white;">
                            <h3><i class="fa-solid fa-users"></i> مدربين </h3>
                            <button onclick="togglePopuo()" class="bbtn">اضافة مدرب </button>
                        </div>
                    <div class="card-block">
                        <table class="table table-bordered table-striped table-condensed">
                        <thead style="text-align: center;background: #23a794;
    color: white;">
                                <tr>
                                <th style="text-align: center;">#</th>
                                    <th style="text-align: center;">اسم المدرب  </th>
                                    <th style="text-align: center;">صلاحية التعديل    </th>
                                    <th style="text-align: center;"> صلاحية الاضافة   </th>
                                    <th style="text-align: center;">صلاحية القراءة   </th>
                                    <!-- <th style="text-align: center;">اضافة مدرب</th> -->
                                    <th style="text-align: center;">الأحداث</th>
                                </tr>
                            </thead>
                            <tbody style="text-align: center;">
                            <?php $i = 1 ?>
                            @foreach($trainers as $call)
                            <tr class="ttr">
                            <td>{{$i++}}</td>

                                    <td>{{$call->Bimar_User->tr_user_fname_ar}} {{$call->Bimar_User->tr_user_lname_ar}} </td>
                                    <td> @if ($call->tr_questions_user_update == 1)
                <i class="fa-solid fa-check" style="color: green;"></i>
            @endif</td>
                                    <td> @if ($call->tr_questions_user_add == 1)
                <i class="fa-solid fa-check" style="color: green;"></i>
            @endif </td>
                                    <td> @if ($call->tr_questions_user_read == 1)
                <i class="fa-solid fa-check" style="color: green;"></i>
            @endif</td>


                                    <!-- <td>
                                         <a href=""><i class="fa-solid fa-user-plus" style="font-size: 20px; color: #3f4046;"></i></a>

                                    </td> -->

                                    <td>
                                    <a href="{{url('bank_trainer/edit',$call->id)}}" target="_blank"><span class="las la-edit" style="font-size: 30px; color: #3f4046;"></span></a>
                                    <form action="{{url('bank_trainer/destroy',$call->id)}}" method="post" style="display: inline-block;">
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







        <div class="popup" id="popup-1">
            <div class="overlay"></div>
            <div class="content">
                <div class="gf">
                <div class="close-btn" onclick="togglePopuo()"><i class="las la-times-circle"></i></div>
                <h4 class="h44">اضافة   مدرب   جديد لبنك الاسئلة </h4>

                </div>
                <!-- <div class="containerr"> -->
                <form id="myForm" action="{{url('bank_trainer/store')}}" method="post" enctype="multipart/form-data" style="padding: 20px;color: black;">
                @csrf
                      <div class="roww">
                      <div class="input-groupp" >
                         <select name="bimar_role_id" id="bimar_role_id" class="@error('bimar_role_id') is-invalid @enderror">
                         <option>  اختر الدور  </option>
                         @foreach ($roles as $role)
                               <option value="{{ $role->id }}">{{ $role->tr_role_name_en }}</option>
                             @endforeach
                        </select>
                        @error('bimar_role_id')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <span class="invalid-feedback"></span>
                            </div>
                        <div class="input-groupp" >
                         <select name="bimar_user_id" id="bimar_user_id" class="@error('bimar_user_id') is-invalid @enderror">
                         <option value="">اختر المستخدم</option>
                        </select>
                        @error('bimar_user_id')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <span class="invalid-feedback"></span>
                            </div>
                            <div class="input-groupp" style="
    ">


                        <input type="hidden" name="bimar_questions_bank_id" value="{{ $id_prog }}">

                        @error('bimar_questions_bank_id')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                            </div>
</div>
<div class="roww">
                        <h4>صلاحية القراءة  </h4>
                        <div class="input-groupp" style="display: flex;">
                          <input id="icard" type="radio" name="tr_questions_user_read" value="1"  {{ old('tr_questions_user_read') == '1' ? 'checked' : '' }}/>
                          <label for="icard"><span><i class="fa-solid fa-check"></i>نعم</span></label>
                          <input id="ipaypal" type="radio" name="tr_questions_user_read" value="0"  {{ old('tr_questions_user_read') == '0' ? 'checked' : '' }}/>
                          <label for="ipaypal"> <span><i class="fa-solid fa-xmark"></i>لا </span></label>

                        </div>



                      </div>
                      <div class="roww">
                        <h4>صلاحية التعديل  </h4>
                        <div class="input-groupp" style="display: flex;">
                          <input id="iicard" type="radio" name="tr_questions_user_update" value="1"  {{ old('tr_questions_user_update') == '1' ? 'checked' : '' }}/>
                          <label for="iicard"><span><i class="fa-solid fa-check"></i>نعم</span></label>
                          <input id="iipaypal" type="radio" name="tr_questions_user_update" value="0"  {{ old('tr_questions_user_update') == '0' ? 'checked' : '' }}/>
                          <label for="iipaypal"> <span><i class="fa-solid fa-xmark"></i>لا </span></label>

                        </div>



                      </div>
                      <div class="roww">
                        <h4>صلاحية الاضافة  </h4>
                        <div class="input-groupp" style="display: flex;">
                          <input id="iiicard" type="radio" name="tr_questions_user_add" value="1"  {{ old('tr_questions_user_add') == '1' ? 'checked' : '' }}/>
                          <label for="iiicard"><span><i class="fa-solid fa-check"></i>نعم</span></label>
                          <input id="iiipaypal" type="radio" name="tr_questions_user_add" value="0"  {{ old('tr_questions_user_add') == '0' ? 'checked' : '' }}/>
                          <label for="iiipaypal"> <span><i class="fa-solid fa-xmark"></i>لا </span></label>

                        </div>



                      </div>
                      <div class="roww">
                       <input type="submit" value="حفظ" class="bttn">
                      </div>
                    </form>
                  <!-- </div> -->

            </div>
        </div>
            <!-- <div class="containerr">
            <form action="{{url('bank_trainer/store')}}" method="post" enctype="multipart/form-data">
               @csrf

                      <div class="roww">

                        <h4>  مدرب جديد</h4>
                        <div class="input-groupp" >
                         <select name="bimar_role_id" id="bimar_role_id" class="@error('bimar_role_id') is-invalid @enderror">
                         <option>  اختر الدور  </option>
                         @foreach ($roles as $role)
                               <option value="{{ $role->id }}">{{ $role->tr_role_name_en }}</option>
                             @endforeach
                        </select>
                        @error('bimar_role_id')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                            </div>
                        <div class="input-groupp" >
                         <select name="bimar_user_id" id="bimar_user_id" class="@error('bimar_user_id') is-invalid @enderror">
                         <option value="">اختر المستخدم</option>
                        </select>
                        @error('bimar_user_id')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                            </div>
                            <div class="input-groupp" style="
    ">


                        <input type="hidden" name="bimar_questions_bank_id" value="{{ $id_prog }}">

                        @error('bimar_questions_bank_id')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                            </div>
</div>
<div class="roww">
                        <h4>صلاحية القراءة  </h4>
                        <div class="input-groupp" style="display: flex;">
                          <input id="icard" type="radio" name="tr_questions_user_read" value="1" />
                          <label for="icard"><span><i class="fa-solid fa-check"></i>نعم</span></label>
                          <input id="ipaypal" type="radio" name="tr_questions_user_read" value="0"/>
                          <label for="ipaypal"> <span><i class="fa-solid fa-xmark"></i>لا </span></label>

                        </div>



                      </div>
                      <div class="roww">
                        <h4>صلاحية التعديل  </h4>
                        <div class="input-groupp" style="display: flex;">
                          <input id="iicard" type="radio" name="tr_questions_user_update" value="1" />
                          <label for="iicard"><span><i class="fa-solid fa-check"></i>نعم</span></label>
                          <input id="iipaypal" type="radio" name="tr_questions_user_update" value="0"/>
                          <label for="iipaypal"> <span><i class="fa-solid fa-xmark"></i>لا </span></label>

                        </div>



                      </div>
                      <div class="roww">
                        <h4>صلاحية الاضافة  </h4>
                        <div class="input-groupp" style="display: flex;">
                          <input id="iiicard" type="radio" name="tr_questions_user_add" value="1" />
                          <label for="iiicard"><span><i class="fa-solid fa-check"></i>نعم</span></label>
                          <input id="iiipaypal" type="radio" name="tr_questions_user_add" value="0"/>
                          <label for="iiipaypal"> <span><i class="fa-solid fa-xmark"></i>لا </span></label>

                        </div>



                      </div>
                      <div class="roww">
                       <input type="submit" value="حفظ" class="bttn">
                      </div>
                    </form>
              </div> -->


        </div>

</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
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
    let url = "{{ url('bank_trainer/store') }}"; // URL الخاص بالـ POST

    fetch(url, {
        method: 'POST',
        body: formData,
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
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
                location.reload(); // إغلاق المودل
            }, 500); // تأخير بسيط لإغلاق المودل بعد إرسال البيانات بنجاح
        }
    })
    .catch(error => console.error('Error:', error));
});
</script>
<script>
$(document).ready(function () {
    $('#bimar_role_id').on('change', function () {
        var roleId = $(this).val();
        $("#bimar_user_id").html('<option value="">-- اختر المستخدم --</option>');

        if (roleId) {
            $.ajax({
                url: "{{ url('bank_trainer/get_users') }}", // رابط API
                type: "GET",
                data: { bimar_role_id: roleId },
                success: function (result) {
                    if (result.length > 0) {
                        $.each(result, function (key, value) {
                            $("#bimar_user_id").append(
                                '<option value="' + value.id + '">' +
                                value.tr_user_fname_ar + ' ' + value.tr_user_lname_ar +
                                '</option>'
                            );
                        });
                    } else {
                        alert('لا يوجد مستخدمين مرتبطين بهذا الدور.');
                    }
                },
                error: function (xhr, status, error) {
                    console.error("حدث خطأ: " + error);
                    alert("لم يتم جلب المستخدمين. تحقق من الاتصال بالسيرفر.");
                }
            });
        }
    });
});
</script>

@endsection
