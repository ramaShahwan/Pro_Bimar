@extends('layout_admin.master')
@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
<meta name="csrf-token" content="{{ csrf_token() }}">
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

.bttnP{
        border: 2px solid red;
    padding: 10px;
    /* background-color: #61baaf; */
    color: black;
    border-radius: 20px;
    }
    .bttnP:hover{
        background-color: red;
        color: white;
        font-size: 17px;
        font-weight: 600;
    }
.pp{
    color: red;
}



/* body, html, nav, ul, li, span {
  font-size: 10px;
  padding: 0;
  margin: 0;
  box-sizing: border-box;
  background-color: #64d3c3;
  font-family: Verdana, Geneva, Tahoma, sans-serif;
  border: none;
} */

.navbar {
    position: relative;

  left: 50%;
  transform: translateX(-50%);
  /* width: 70rem;
  margin-top: 10vw; */
  transition: all 0.5s ease;
  /* min-height: 50px; */
     margin-bottom: 0px;
    border: none;
}
.navbar-container {
  list-style: none;
  display: flex;
  justify-content: center;
  perspective: 50rem;
  /* background-color: #2ea392;
  box-shadow: 0 0 19px 11px rgba(0, 0, 0, 0.2); */
}
.navbar-container_sub {
  position: absolute;
  width: 100%;
  list-style: none;
  border-radius: 0 0 5px 5px;
  top: 100%;
  left: 0;
  padding: 0;
  transform: rotateY(180deg) scaleY(0);
  transform-origin: top;
  opacity: 0;
  visibility: hidden;
  transition: all 0.7s ease;
  box-shadow: 0 0 19px 11px rgba(0, 0, 0, 0.2);
}
.navbar-item {
  flex-grow: 1;
  /* padding: 1rem;
  font-size: 2rem; */
  padding: 10px;
  font-size: 16px;
  background-color: #20a291;
  font-weight: bold;
  text-align: center;
  color: whitesmoke;
  transition: all 0.7s ease;
  transform: rotateY(0deg);
  position: relative;
  z-index: 1;
  cursor: pointer;
}
/* .navbar-item:hover {
  transform: rotateY(180deg);
} */
.navbar-item:hover > .navbar-container_sub {
  transform: scaleY(1);
  opacity: 1;
  visibility: visible;
}

/* .navbar-item:hover > .navbar-container_sub {
  transform: rotateY(180deg) scaleY(1);
  opacity: 1;
  visibility: visible;
} */
.navbar-item:hover > .navbar-item_label {
  transform: scaley(1) rotateY(180deg);
  opacity: 1;
  visibility: visible;
}
.navbar-item_sub {
  padding: 1rem;
  font-size: 15px;
    background-color: transparent;
    position: relative;
    overflow: hidden;
    color: whitesmoke;
    text-align: start;
}
.navbar-item_sub:hover {
  color: #6a3696;
}
.navbar-item_sub:after {
  content: "";
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  z-index: -2;
  background-color: #8cc7b6;
}
.navbar-item_sub:before {
  content: "";
  position: absolute;
  top: 0;
  left: 120%;
  width: 120%;
  height: 100%;
  z-index: -1;
  background-color: #fbf144;
  transform: skewX(-30deg);
  transform-origin: right;
  transition: all 0.3s ease-in;
}
.navbar-item_sub:hover:before {
  left: -10%;
}
.navbar-item_label {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  padding: inherit;
  font-size: inherit;
  font-weight: bold;
  text-align: right;
  transform: scaleY(0) rotateY(180deg);
  transform-origin: top;
  opacity: 0;
  visibility: hidden;
  transition: all 0.4s ease 0.1s;
  background-color: #fbf144;
  color: #6a3696;
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
        button.yu {
    border: none;
    background: none;
    text-align: start;
    /* font-size: 13px; */
    padding: 0;
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
/* .table-bordered > tbody > tr:hover{
    background: #23a794;
    color: white;
} */
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
        .yuu{
            border: 1px solid #23a794;
    padding: 3px;
    border-radius: 50px;
    color: white;
    font-weight: 700;
    background: #23a794;
    width: 83px;
    margin: 2px
        }
</style>




        <!-- /. NAV SIDE  -->
    <div id="page-wrapper" style="height: 610px;
    overflow: auto;">

        <div class="row" style="    margin: 80px 30px; direction: rtl;">
            <div class="col-lg-12">
                <div class="card" style="    border: 1px solid #23a794;
    box-shadow: 1px 1px 7px 0px #23a794;">
                        <div class="card-header" style="text-align: start;font-size: 20px;display: flex;justify-content: space-between;align-items: center;background: #bdd7d3;
    color: white;">
                            <h3><i class="fa-solid fa-file-invoice"></i> جميع الايصالات</h3>
                            <!-- <button onclick="togglePopuo()" class="bbtn">اضافة سنة</button> -->
                        </div>
                    <div class="card-block">
                        <table class="table table-bordered table-striped table-condensed">
                            <thead style="text-align: center;background: #23a794;
    color: white;">
                                <tr>
                                <th>#</th>

                                    <th>رقم الايصال </th>
                                    <th>اسم الكامل </th>
                                    <th> الدورة  </th>
                                    <th>  حالة الوصل </th>
                                    <th>السعر بعد تطبيق الحسم </th>
                                    <th>تاريخ التسجيل على الدورة</th>

                                    <th>التفاصيل</th>

                                    <th>الأحداث</th>
                                    <th>حذف</th>
                                </tr>
                            </thead>
                            <tbody style="text-align: center;">
                            <?php $i = 1 ?>
                            @foreach($data as $call)
                                <tr class="ttr">
                                <td>{{$i++}}</td>
                                <td>{{$call->id}} </td>
                                    <td>{{$call->bimar_trainee->trainee_fname_ar}}<span style="    margin-right: 5px;"> {{$call->bimar_trainee->trainee_lname_ar}}</span></td>
                                    <td>{{$call->bimar_course_enrollment->bimar_training_course->tr_course_name_ar}}</td>
                                    <td>{{$call->bimar_payment_status->tr_pay_status_name_ar}} </td>
                                    <td>{{$call->tr_enrol_pay_net_price}}  </td>
                                    <td>{{ \Carbon\Carbon::parse($call->tr_enrol_pay_reg_date)->format('Y-m-d') }}</td>


                                    <td>   <a  class="btn btn-sm " style="color: #686363; border-color: #686363;" href="{{url('user_bill/show',$call->id)}}"> التفاصيل
</a></td>
<!-- <pre>{{ var_dump($call->bimar_payment_status) }}</pre> -->
<td>
    <!-- <nav class="navbar">
	<ul class="navbar-container" style="    background:none;">
		<li class="navbar-item">Action<span class="navbar-item_label">Action</span>
			<ul class="navbar-container_sub" >

            @if($call->bimar_payment_status_id == "1")
            <li class="navbar-item_sub">

    <button onclick="showEditPopup({{ $call->id }})" class="yu">إضافة حسم</button>

</li>
@endif

@if($call->bimar_payment_status_id == "1")
		<li class="navbar-item_sub"><button onclick="showEditPopupactive({{ $call->id }})" class="yu">التفعيل </button></li>
        @endif
        @if($call->bimar_payment_status_id == "3" ||$call->bimar_payment_status_id == "2")
        <li class="navbar-item_sub"> <button onclick="showEditPopupdisactive({{ $call->id }})" class="yu">الغاء التسجيل </button></li>
        @endif
    </ul>

	</ul>
</nav> -->
@if($call->bimar_payment_status_id == "1")
    <button onclick="showEditPopup({{ $call->id }})" class="yuu">إضافة حسم</button>
@endif
@if($call->bimar_payment_status_id == "1")
		<button onclick="showEditPopupactive({{ $call->id }})" class="yuu">التفعيل </button>
        @endif
        @if($call->bimar_payment_status_id == "3" ||$call->bimar_payment_status_id == "2")
        <button onclick="showEditPopupdisactive({{ $call->id }})" class="yuu">الغاء التسجيل </button>
        @endif
  </td>
                                    <td>
                                        <!-- <a href=""><span class="las la-trash-alt" style="font-size: 30px; color: #f00707;"></span></a> -->
                                        <!-- <form action="" method="post">
                                        @csrf

                                                <input type="submit"  class="gg" style=" " value="X" onclick="return confirm('هل تريد الحذف')">
                                                </form> -->
                                                @if($call->bimar_payment_status_id == "1")
                                        <button onclick="showEditPopupcancal({{ $call->id }})" style="border: none;background: none; " class="gg">X </button>
@else
<button  style="border: none;background: none; color:green; " class="gg"><i class="fa-solid fa-check"></i></button>
@endif
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


        <!-- /. PAGE WRAPPER  -->
    </div>
<script>
   document.addEventListener("DOMContentLoaded", function () {
    let navbarItems = document.querySelectorAll(".navbar-item");

    navbarItems.forEach((item, index) => {
        item.addEventListener("mouseenter", function () {
            // إخفاء جميع القوائم المنسدلة الأخرى
            document.querySelectorAll(".navbar-container_sub").forEach(sub => {
                sub.style.opacity = "0";
                sub.style.visibility = "hidden";
                sub.style.transform = "scaleY(0)";
            });

            // إظهار القائمة المنسدلة الخاصة بهذا العنصر فقط
            let submenu = this.querySelector(".navbar-container_sub");
            if (submenu) {
                submenu.style.opacity = "1";
                submenu.style.visibility = "visible";
                submenu.style.transform = "scaleY(1)";
            }

            // إخفاء فقط العناصر التي تأتي بعد العنصر الحالي
            navbarItems.forEach((otherItem, otherIndex) => {
                if (otherIndex > index) {
                    otherItem.style.opacity = "0";
                    otherItem.style.visibility = "hidden";
                }
            });
        });

        item.addEventListener("mouseleave", function () {
            // عند مغادرة الماوس، إظهار جميع العناصر المخفية
            navbarItems.forEach(otherItem => {
                otherItem.style.opacity = "1";
                otherItem.style.visibility = "visible";
            });

            // إخفاء جميع القوائم المنسدلة
            document.querySelectorAll(".navbar-container_sub").forEach(sub => {
                sub.style.opacity = "0";
                sub.style.visibility = "hidden";
                sub.style.transform = "scaleY(0)";
            });
        });
    });
});


</script>
    <!-- /. WRAPPER  -->
    <div class="popup" id="popup-1">
            <div class="overlay"></div>
            <div class="content">
                <div class="gf">
               <div class="close-btn" onclick="togglePopup()"><i class="las la-times-circle"></i></div>
               <h4 class="h44">    اضافة حسم جديد</h4>
               </div>
                <!-- <div class="containerr"> -->
                <form id="discountForm" style="padding: 20px;color: black;">
                @csrf
                <input type="hidden" id="discount_id" name="id">
                      <div class="roww">
                        <div class="input-groupp input-groupp-icon">
                        <div class="input-icon"><i class="fa-solid fa-tag"></i></div>
                        <input type="text"  id="discount_value" placeholder=" قيمة الحسم بالنسبة المئوية  " value="{{ old('tr_enrol_pay_discount') }}" name="tr_enrol_pay_discount" class="@error('tr_enrol_pay_discount') is-invalid @enderror"/>
                          @error('tr_enrol_pay_discount')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                      <span class="invalid-feedback"></span>
                        </div>
                        <div class="input-groupp input-groupp-icon">
                        <div class="input-icon"><i class="fa-solid fa-audio-description"></i></div>
                        <input type="text" id="discount_desc" placeholder=" سبب الحسم  " name="tr_enrol_pay_discount_desc" value="{{ old('tr_enrol_pay_discount_desc') }}" class="@error('tr_enrol_pay_discount_desc') is-invalid @enderror"/>
                          <!-- @error('tr_enrol_pay_discount_desc')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror -->
                      <span class="invalid-feedback"></span>
                        </div>




                      </div>


                      <div class="roww">
        <input type="submit" value="حفظ" class="bttn" onclick="submitDiscount(); return false;">
    </div>
                    </form>
                  <!-- </div> -->

            </div>
        </div>

    <!-- /. FOOTER  -->
    <div class="popup" id="popuppo-1">
            <div class="overlay"></div>
            <div class="content">
                <div class="gf">
               <div class="close-btn" onclick="togglePopuoo()"><i class="las la-times-circle"></i></div>
               <h4 class="h44"> تفعيل الوصل </h4>
               </div>
                <!-- <div class="containerr"> -->
                <form id="activeForm" style="padding: 20px;color: black;">
                @csrf
                <input type="hidden" id="active_id" name="id">
                      <div class="roww">
                        <div class="input-groupp">
                            <select name="bimar_payment_status_id" id="bimar_payment_status_id" class="@error('bimar_payment_status_id') is-invalid @enderror">
                         <option>اختر حالة الوصل</option>

                         @foreach ($statuses as $statuse)
                               <option value="{{ $statuse->id }}">{{ $statuse->tr_pay_status_name_ar }}</option>
                             @endforeach

                        </select>
                        @error('bimar_payment_status_id')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <span class="invalid-feedback"></span>

                            </div>
                        <div class="input-groupp input-groupp-icon">
                        <div class="input-icon"><i class="fa-solid fa-audio-description"></i></div>
                        <input type="text" placeholder=" شرح و ملاحظات التفعيل   " value="{{ old('tr_enrol_pay_desc') }}" name="tr_enrol_pay_desc" class="@error('tr_enrol_pay_desc') is-invalid @enderror" id="tr_enrol_pay_desc"/>
                          <!-- @error('tr_enrol_pay_desc')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror -->
                      <span class="invalid-feedback"></span>
                        </div>
                        <div class="input-groupp">
                            <select name="bimar_bank_id" id="bimar_bank_id" class="@error('bimar_bank_id') is-invalid @enderror">
                         <option>اختر البنك </option>

                         @foreach ($banks as $bank)
                               <option value="{{ $bank->id }}">{{ $bank->tr_bank_name_ar }}</option>
                             @endforeach

                        </select>
                        <!-- @error('bimar_bank_id')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror -->
                    <span class="invalid-feedback"></span>

                            </div>



                      </div>


                      <div class="roww">
                       <input type="submit" value="حفظ" class="bttn" onclick="submitActive(); return false;">
                      </div>
                    </form>
                  <!-- </div> -->

            </div>
        </div>


        <div class="popup" id="popuppoo-1">
            <div class="overlay"></div>
            <div class="content">
                <div class="gf">
               <div class="close-btn" onclick="togglePopuooo()"><i class="las la-times-circle"></i></div>
               <h4 class="h44"> الغاء التسجيل  </h4>
               </div>
                <!-- <div class="containerr"> -->
                <form id="disactiveForm" onsubmit="submitDisactive(); return false;" style="padding: 20px;color: black;">
                @csrf
                <input type="hidden" id="disactive_id" name="id">
                      <div class="roww">

                        <div class="input-groupp input-groupp-icon">
                        <div class="input-icon"><i class="fa-solid fa-audio-description"></i></div>
                        <input type="text" placeholder=" شرح و ملاحظات الغاء التسجيل   " value="{{ old('tr_enrol_pay_deactivate_desc') }}" name="tr_enrol_pay_deactivate_desc" class="@error('tr_enrol_pay_deactivate_desc') is-invalid @enderror" id="tr_enrol_pay_deactivate_desc"/>
                          @error('tr_enrol_pay_deactivate_desc')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                      <span class="invalid-feedback"></span>
                        </div>





                      </div>


                      <div class="roww">
                       <input type="submit" value="حفظ" class="bttn" >
                      </div>
                    </form>
                  <!-- </div> -->

            </div>
        </div>






        <div class="popup" id="popuppooP-1">
            <div class="overlay"></div>
            <div class="content">
                <div class="gf">
               <div class="close-btn" onclick="togglePopuoop()"><i class="las la-times-circle"></i></div>
               <h4 class="h44">الحذف  </h4>
               </div>
                <!-- <div class="containerr"> -->
                <form id="cancalForm" onsubmit="submitcancal(); return false;" style="padding: 20px;color: black;">
                @csrf
                <!-- <form action="{{url('bank/store')}}" method="post" enctype="multipart/form-data">
                @csrf -->
                <input type="hidden" name="id" id="id">
                <!-- input type="hidden" id="active_id" name="id"> -->
                      <div class="roww">
                        <h4 class="pp"> هل تريد الحذف    </h4>
                      </div>
                      <div class="roww">
                       <input type="submit" value="حفظ" class="bttnP">
                      </div>
                    </form>
                  <!-- </div> -->

            </div>
        </div>




   <script>
        function togglePopuo(){
            document.getElementById("popup-1").classList.toggle("active");
        }
        function togglePopuoo(){
            document.getElementById("popuppo-1").classList.toggle("active");
        }
        function togglePopuooo(){
            document.getElementById("popuppoo-1").classList.toggle("active");
        }
        function togglePopuoop(){
            document.getElementById("popuppooP-1").classList.toggle("active");
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
    function showEditPopup(id) {
    // تشغيل واجهة الحسم
    togglePopup();

    // إرسال طلب AJAX للحصول على بيانات الحسم للسجل
    fetch(`/bill/details/${id}`)
        .then(response => response.json())
        .then(data => {
            // تعبئة الحقول ببيانات السجل
            document.getElementById('discount_id').value = id; // وضع المعرف
            document.getElementById('discount_value').value = data.tr_enrol_pay_discount || ''; // الحسم الحالي
            document.getElementById('discount_desc').value = data.tr_enrol_pay_discount_desc || ''; // وصف الحسم
        })
        .catch(error => console.error('خطأ في جلب البيانات:', error));
}

function togglePopup() {
    document.getElementById("popup-1").classList.toggle("active");
}
function submitDiscount() {
    const id = document.getElementById('discount_id').value;
    const discount = document.getElementById('discount_value').value;
    const description = document.getElementById('discount_desc').value;

    fetch(`/bill/discount/${id}`, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        },
        body: JSON.stringify({
            tr_enrol_pay_discount: discount,
            tr_enrol_pay_discount_desc: description
        })
    })
        // .then(response => {
        //     if (!response.ok) {
        //         throw new Error('خطأ في الطلب');
        //     }
        //     return response.json();
        // })
        // .then(data => {
        //     if (data.success) {
        //         alert(data.message || 'تم حفظ الحسم بنجاح');
        //         window.location.href = '/bill/all';
        //     } else {
        //         alert(data.message || 'حدث خطأ أثناء الحفظ');
        //     }
        // })
        // .catch(error => console.error('خطأ أثناء الحفظ:', error));
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
            togglePopup();
            setTimeout(() => {
                location.reload();
            }, 1000);
        }
    })
    .catch(error => console.error('Error:', error));
}


//active
function showEditPopupactive(id) {
    togglePopuoo();

    fetch(`/bill/details_active/${id}`)
        .then(response => response.json())
        .then(data => {
            if (data.data) {
                // تعبئة بيانات الوصل
                document.getElementById('active_id').value = id;
                document.getElementById('bimar_payment_status_id').value = data.data.bimar_payment_status_id || '';
                document.getElementById('tr_enrol_pay_desc').value = data.data.tr_enrol_pay_desc || '';
                document.getElementById('bimar_bank_id').value = data.data.bimar_bank_id || '';
            }

            // تحقق إذا كانت البيانات موجودة قبل استخدام forEach
            const bankSelect = document.getElementById('bimar_bank_id');tr_enrol_pay_deactivate_desc
            if (data.banks && data.banks.length > 0) {
                bankSelect.innerHTML = '<option>اختر البنك</option>';
                data.banks.forEach(bank => {
                    bankSelect.innerHTML += `<option value="${bank.id}">${bank.tr_bank_name_ar}</option>`;
                });
            } else {
                bankSelect.innerHTML = '<option>لا توجد بنوك متاحة</option>';
            }

            // تحقق إذا كانت البيانات موجودة قبل استخدام forEach
            const statusSelect = document.getElementById('bimar_payment_status_id');
            if (data.statuses && data.statuses.length > 0) {
                statusSelect.innerHTML = '<option>اختر حالة الوصل</option>';
                data.statuses.forEach(status => {
                    statusSelect.innerHTML += `<option value="${status.id}">${status.tr_pay_status_name_ar}</option>`;
                });
            } else {
                statusSelect.innerHTML = '<option>لا توجد حالات متاحة</option>';
            }
        })
        .catch(error => console.error('خطأ في جلب البيانات:', error));
}




function togglePopuoo(){
            document.getElementById("popuppo-1").classList.toggle("active");
        }
        function submitActive() {
    const id = document.getElementById('active_id').value;
    const bimar_payment_status_id = document.getElementById('bimar_payment_status_id').value;
    const tr_enrol_pay_desc = document.getElementById('tr_enrol_pay_desc').value;
    const bimar_bank_id = document.getElementById('bimar_bank_id').value;

    fetch(`/bill/active/${id}`, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        },
        body: JSON.stringify({
            bimar_payment_status_id: bimar_payment_status_id,
            tr_enrol_pay_desc: tr_enrol_pay_desc,
            bimar_bank_id: bimar_bank_id
        })
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


//deactive
function showEditPopupdisactive(id) {
    // فتح نافذة التعديل
    togglePopuooo();

    // إرسال طلب AJAX لجلب البيانات
    fetch(`/bill/deactivate_show/${id}`)
        .then(response => response.json())
        .then(data => {
            // تعبئة الحقول بالبيانات
            document.getElementById('disactive_id').value = id; // وضع المعرف
            document.getElementById('tr_enrol_pay_deactivate_desc').value = data.tr_enrol_pay_deactivate_desc || ''; // وضع شرح الإلغاء
        })
        .catch(error => console.error('خطأ في جلب البيانات:', error));
}

function togglePopuooo() {
    // التبديل بين إظهار وإخفاء النافذة المنبثقة
    document.getElementById("popuppoo-1").classList.toggle("active");
}
function submitDisactive() {
    const form = document.getElementById('disactiveForm');
    const formData = new FormData(form);

    fetch(`/bill/deactivate/${formData.get('id')}`, {
    method: 'POST',
    headers: {
        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
    },
    body: formData
})
// .then(response => response.json())
// .then(data => {
//     if (data.success) {
//         alert('تم الغاء التسجيل بنجاح');
//         window.location.href = '/bill/all';
//     } else {
//         alert(data.message || 'حدث خطأ');
//     }
// })
// .catch(error => {
//     console.error('خطأ في الطلب:', error);
//     alert('حدث خطأ غير متوقع');
// });
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
            togglePopuooo();
            setTimeout(() => {
                location.reload();
            }, 1000);
        }
    })
    .catch(error => console.error('Error:', error));

}
//canacal
function showEditPopupcancal(id) {
    // فتح نافذة التعديل
    togglePopuoop();

    // إرسال طلب AJAX لجلب البيانات
    fetch(`/bill/deactivate_show/${id}`)
        .then(response => response.json())
        .then(data => {
            // تعبئة الحقول بالبيانات
            // تأكد من أن الاستجابة تحتوي على البيانات المطلوبة
            document.getElementById('cancalForm').querySelector('input[name="id"]').value = data.id;
        })
        .catch(error => console.error('خطأ في جلب البيانات:', error));
}

function togglePopuoop(){
            document.getElementById("popuppooP-1").classList.toggle("active");
        }
        function submitcancal() {
    const form = document.getElementById('cancalForm');
    const formData = new FormData(form);

    fetch(`/bill/destroy/${formData.get('id')}`, {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        },
        body: formData
    })
    // .then(response => response.json())
    // .then(data => {
    //     if (data.success) {
    //         alert('تم الغاء التفعيل بنجاح');
    //         window.location.href = '/bill/all'; // تحديث الصفحة بعد إتمام العملية
    //     } else {
    //         alert(data.message || 'حدث خطأ');
    //     }
    // })
    // .catch(error => {
    //     console.error('خطأ في الطلب:', error);
    //     alert('حدث خطأ غير متوقع');
    // });
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
            togglePopuoop();
            setTimeout(() => {
                location.reload();
            }, 1000);
        }
    })
    .catch(error => console.error('Error:', error));
}



    </script>
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
@endsection
