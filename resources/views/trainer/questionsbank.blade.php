@extends('layout_trainer.mester')
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

<div id="page-wrapper" style="    height: 610px;
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
                        <div class="card-header" style="text-align: start;font-size: 20px;display: flex;justify-content: space-between;align-items: center;background: #bdd7d3;
    color: white;">
                            <h3> الاسئلة </h3>
                            <!-- <a href="add.html" style="background: #007bff;padding: 6px;color: white;"><i class="las la-user-plus"></i> مدرب جديد</a> -->
                            @if ($validity->tr_questions_user_add==1)
                            <a href="{{url('ques/create',$id)}}" class="bbtn"  target="_blank">  اضافة سؤال </a>
                            @endif
                        </div>
                    <div class="card-block">
                        <table class="table table-bordered table-striped table-condensed">
                            <thead style="text-align: center; background: #23a794;
    color: white;">
                                <tr>
                                <th style="text-align: center;">#</th>
                                <th style="text-align: center;">نمط السؤال   </th>
                                    <th style="text-align: center;">عنوان السؤال  </th>
                                    <th style="text-align: center;">نص السؤال  </th>
                                    <th style="text-align: center;">علامة السؤال</th>
                                    <th style="text-align: center;">وقت وتاريخ انشاء السؤال </th>
                                    <th style="text-align: center;">وقت وتاريخ تعديل السؤال </th>
                                    @if ($validity->tr_questions_user_update==1)
                                    <th style="text-align: center;">حذف</th>
                                    @endif
                                    <th style="text-align: center;">الأحداث</th>
                                </tr>
                            </thead>
                            <tbody style="text-align: center;">
                            @if ($validity->tr_questions_user_read==1)
                            <?php $i = 1 ?>

                            @foreach($data as $call)
                            <tr class="ttr">
                            <td>{{$i++}}</td>
                                <td>{{$call->Bimar_Questions_Type->tr_questions_type_name}}  </td>
                                    <td>{{$call->tr_bank_assess_questions_name}}  </td>
                                    <td>{{$call->tr_bank_assess_questions_body}}</td>
                                    <td>{{$call->tr_bank_assess_questions_grade}}  </td>
                                    <td>{{ \Carbon\Carbon::parse($call->created_at)->timezone('Asia/Damascus')->format('Y-m-d H:i:s') }}
                                    </td>
                                    <td>{{ \Carbon\Carbon::parse($call->created_at)->timezone('Asia/Damascus')->format('Y-m-d H:i:s') }}
  </td>


                                    <!-- <td><label class="switch">

    <input type="checkbox" class="switch-button" data-id="{{ $call->tr_bank_status }}" {{ $call->tr_bank_status == 1 ? 'checked' : '' }}>
    <span class="slider"></span>
</label></td> -->
<!-- <td>   <a href=" updateSwitch/{{$call->id}}" class="btn btn-sm btn-{{$call->tr_bank_status ? 'success' : 'danger'}}">
    {{$call->tr_bank_status ? 'فعالة' : 'غير فعالة'}}
</a></td> -->
@if ($validity->tr_questions_user_update==1)
<td><form action="{{url('ques/updateSwitch',$call->id)}}" method="post">
                                        @csrf
                                                <!-- <p class="fables-product-info my-2"><a  >

                                                <span class="fables-btn-value">التسجيل على الكورس</span></a></p> -->
                                                <input type="submit"  class="gg" style=" " value="X" onclick="return confirm('هل تريد الحذف')">
                                                </form></td> @endif

                                    <td>
                                        <!-- <a href=""><span class="las la-trash-alt" style="font-size: 30px; color: #f00707;"></span></a> -->
                                        @if ($validity->tr_questions_user_update==1)
                                        <a href="{{url('ques/edit',$call->id)}}" target="_blank"><span class="las la-edit" style="font-size: 30px; color: #3f4046;"></span></a>
                                        @endif
                                        <!-- <button onclick="togglePopuoo()" style="border: none;background: none;"><span class="las la-edit" style="font-size: 30px; color: #3f4046;"></span> </button> -->
                                        <!-- <a href="show.html"><span class="las la-eye" style="font-size: 30px; color: #1cda55;"></span></a> -->
                                        <!-- <button onclick="showEditPopup({{ $call->id }})" style="border: none;background: none;"><span class="las la-edit" style="font-size: 30px; color: #3f4046;"></span></button> -->
                                        @if ($validity->tr_questions_user_read==1)
                                        <a href="{{url('ques/show',$call->id)}}" target="_blank"><span class="las la-eye" style="font-size: 30px; color: #1cda55;"></span></a>
                                        @endif

                                    </td>

                                </tr>
                                @endforeach
                                @endif
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
                <div class="close-btn" onclick="togglePopuo()">&times;</div>
                <!-- <div class="containerr"> -->
                <form action="{{url('bank/store')}}" method="post" enctype="multipart/form-data">
                @csrf
                      <div class="roww">
                        <h4>بنك جديد </h4>
                        <div class="input-groupp input-groupp-icon">
                            <div class="input-icon"><i class="fa-solid fa-signature"></i></div>
                          <input type="text" placeholder=" الرمز  " name="tr_bank_code" class="@error('tr_bank_code') is-invalid @enderror"/>
                          @error('tr_bank_code')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                        </div>
                        <div class="input-groupp input-groupp-icon">
                            <div class="input-icon"><i class="fa-solid fa-signature"></i></div>
                          <input type="text" placeholder=" الاسم باللغة العربية" name="tr_bank_name_ar" class="@error('tr_bank_name_ar') is-invalid @enderror"/>
                          @error('tr_bank_name_ar')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                        </div>
                        <div class="input-groupp input-groupp-icon">
                          <input type="text" placeholder="الاسم باللغة الانكليزية" name="tr_bank_name_en" class="@error('tr_bank_name_en') is-invalid @enderror"/>
                          <div class="input-icon"><i class="fa-solid fa-signature"></i></div>
                          @error('tr_bank_name_en')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                        </div>
                        <div class="input-groupp input-groupp-icon">
                          <input type="text" placeholder="الوصف  " name="tr_bank_desc" class="@error('tr_bank_desc') is-invalid @enderror"/>
                          <div class="input-icon"><i class="fa-solid fa-audio-description"></i></div>
                          @error('tr_bank_desc')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                        </div>


                      </div>

                      <div class="roww">
                        <h4>حالة النبك </h4>
                        <div class="input-groupp" style="display: flex;">
                          <input id="icard" type="radio" name="tr_bank_status" value="1" />
                          <label for="icard"><span><i class="fa-solid fa-check"></i>فعالة</span></label>
                          <input id="ipaypal" type="radio" name="tr_bank_status" value="0"/>
                          <label for="ipaypal"> <span><i class="fa-solid fa-xmark"></i>غير فعالة</span></label>

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
         <div class="close-btn" onclick="togglePopuoo()">&times;</div>
         @if(isset($call))
         <form onsubmit="updateBank(event, {{ $call->id }})">
         @csrf
         <input type="hidden" name="id" value="{{ $call->id }}">
            <div class="roww">
                <h4> تعديل البنك </h4>
                <h4 style="text-align:right;">الرمز</h4>
                <div class="input-groupp input-groupp-icon">
                            <div class="input-icon"><i class="fa-solid fa-signature"></i></div>
                    <input type="text" id="tr_bank_code" name="tr_bank_code" placeholder="الرمز  " value="{{ $call->tr_bank_code }}" class="@error('tr_bank_code') is-invalid @enderror"/>
                    @error('tr_bank_code')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                </div>
                <h4 style="text-align:right;">الاسم باللغة العربية</h4>

                <div class="input-groupp input-groupp-icon">
                            <div class="input-icon"><i class="fa-solid fa-signature"></i></div>
                    <input type="text" id="tr_bank_name_ar" name="tr_bank_name_ar" placeholder="الاسم باللغة العربية" value="{{ $call->tr_bank_name_ar }}" class="@error('tr_bank_name_ar') is-invalid @enderror"/>
                    @error('tr_bank_name_ar')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                </div>
                <h4 style="text-align:right;">الاسم باللغة الانكليزية</h4>

                <div class="input-groupp input-groupp-icon">
                    <input type="text" id="tr_bank_name_en" name="tr_bank_name_en" placeholder="الاسم باللغة الانكليزية" value="{{ $call->tr_bank_name_en }}" class="@error('tr_bank_name_en') is-invalid @enderror"/>

                    <div class="input-icon"><i class="fa-solid fa-signature"></i></div>
                    @error('tr_bank_name_en')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                </div>
                <h4 style="text-align:right;">الوصف  </h4>

                <div class="input-groupp input-groupp-icon">
                <div class="input-icon"><i class="fa-solid fa-audio-description"></i></div>
                <input type="text" id="tr_bank_desc" name="tr_bank_desc" placeholder="الوصف  " value="{{ $call->tr_bank_desc }}" class="@error('tr_bank_desc') is-invalid @enderror"/>
                    @error('tr_bank_desc')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                </div>
            </div>

            <div class="roww">
                <h4>حالة البنك </h4>
                <div class="input-groupp" style="display: flex;">
                    <input id="active" type="radio" name="tr_bank_status" value="1" {{ $call->tr_bank_status == 1 ? 'checked' : '' }}/>
                    <label for="active"><span><i class="fa-solid fa-check"></i>فعالة</span></label>
                    <input id="inactive" type="radio" name="tr_bank_status" value="0" {{ $call->tr_bank_status == 0 ? 'checked' : '' }}/>
                    <label for="inactive"><span><i class="fa-solid fa-xmark"></i>غير فعالة</span></label>
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
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    @endsection
