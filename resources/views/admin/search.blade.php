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
.navbar-item:hover {
  transform: rotateY(180deg);
}
.navbar-item:hover > .navbar-container_sub {
  transform: rotateY(180deg) scaleY(1);
  opacity: 1;
  visibility: visible;
}
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



/* إخفاء جميع القوائم الفرعية (navbar-container_sub) بشكل افتراضي */
.navbar-container_sub {
  display: none;
}

/* عند التفاعل مع navbar-item، نظهر القائمة الفرعية فقط للعنصر الذي تم التفاعل معه */
.navbar-item:hover > .navbar-container_sub {
  display: block; /* إظهار القائمة الفرعية */
  transform: rotateY(180deg) scaleY(1);
  opacity: 1;
  visibility: visible;
}

/* لضمان أن القوائم الأخرى لا تتداخل مع بعضها البعض */
.navbar-item {
  position: relative;
}

.navbar-item:hover {
  z-index: 2; /* جعل العنصر الذي يتم التفاعل معه في مقدمة العناصر الأخرى */
}

/* إخفاء أي قوائم فرعية إذا كانت هناك قائمة أخرى تظهر */
.navbar-container_sub {
  display: none;
}

.navbar-item:hover > .navbar-container_sub {
  display: block;
  /* باقي الأنماط الأخرى */
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











.tabs-container {
      background: white;
      border-radius: 10px;
      overflow: hidden;
      width: 400px;
      margin-left: 200px;
    margin-top: 30px;
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
    }

    .tabs-header {
      display: flex;
      justify-content: space-around;
      background-color: #34495e;
    }

    .tab {
      flex: 1;
      text-align: center;
      padding: 10px 20px;
      color: white;
      cursor: pointer;
      font-weight: bold;
      transition: background-color 0.3s;
    }

    .tab.active {
      background-color: white;
      color: #34495e;
    }

    .tab-content {
      padding: 20px;
      display: none;
    }

    .tab-content.active {
      display: block;
    }

    .form-group {
      margin-bottom: 15px;
    }

    .form-group label {
      display: block;
      margin-bottom: 5px;
      font-weight: bold;
    }

    .form-group input {
      width: 100%;
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 5px;
      text-align: end;
    }

    .form-group .success {
      color: green;
      font-size: 12px;
    }

    .form-group .error {
      color: red;
      font-size: 12px;
    }

    .submit-btn {
      display: block;
      width: 100%;
      padding: 10px;
      background-color: #34495e;
      color: white;
      border: none;
      border-radius: 5px;
      font-size: 16px;
      cursor: pointer;
    }

    .submit-btn:hover {
      background-color: #2c3e50;
    }
    .table-container {
  display: none;

    width: 100%;
    height: 370px;
    background-color: #f3f3f3;
    border-radius: 8px;
     box-shadow: none;
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
        .navbar-container_sub {
    position: absolute;
    background: white;
    box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.2);
    z-index: 1000; /* لضمان ظهورها فوق باقي العناصر */
    display: none; /* تأكد من أن القوائم مخفية افتراضيًا */
}

.navbar-item:hover .navbar-container_sub {
    display: block;
}

</style>




        <!-- /. NAV SIDE  -->
    <div id="page-wrapper" style="height: 610px;
    overflow: auto;">
    @if(session()->has('message'))
        <div class="alert alert-info" role="alert" style="text-align:end;font-size: 20px; ">
          {{session()->get('message')}}
        </div>
@endif
    <div class="tacontainerbs-" style="    width: 400px;
    background: #ffffff;
    margin: auto;">
    <div class="tabs-header">
      <div class="tab active" data-tab="login">رقم الايصال</div>
      <div class="tab" data-tab="register">الاسم الكامل</div>
      <div class="tab" data-tab="contact">رقم الموبايل</div>
    </div>
    <div class="tab-content active" id="login">
    <form action="{{ route('search_bill') }}" method="GET">
    @csrf
        <div class="form-group">
          <!-- <label for="login-email">Email address</label> -->
          <input type="search" id="id" name="id" placeholder="رقم الايصال">
          <!-- <div class="success">✔ Valid email</div> -->
        </div>

        <button class="submit-btn">البحث</button>
      </form>
    </div>
    <div class="tab-content" id="register">
    <form action="{{ route('search_bill') }}" method="GET">
    @csrf
        <div class="form-group">
          <input type="search" id="trainee_fname_ar" name="trainee_fname_ar" placeholder="الاسم ">
          <input type="search" id="trainee_lname_ar" name="trainee_lname_ar" placeholder="الكنية ">
        </div>


        <button class="submit-btn">البحث</button>
      </form>
    </div>
    <div class="tab-content" id="contact">
    <form action="{{ route('search_bill') }}" method="GET">
    @csrf
        <div class="form-group">
          <!-- <label for="contact-name">Name</label> -->
          <input type="search" id="trainee_mobile" name="trainee_mobile" placeholder="رقم الموبايل">
        </div>


        <button class="submit-btn">البحث</button>
      </form>
    </div>
  </div>


        <div class="row" style="    margin: 80px 30px; direction: rtl;">
            <div class="col-lg-12">
            <div class="table-container">
                <div class="card" style="    border: 1px solid #23a794;
    box-shadow: 1px 1px 7px 0px #23a794;">
                        <div class="card-header" style="text-align: start;font-size: 20px;display: flex;justify-content: space-between;align-items: center; background: #bdd7d3;
    color: white;">
                            <h3><i class="fa-sharp fa-solid fa-calendar-week"></i> جميع الايصالات</h3>
                            <!-- <button onclick="togglePopuo()" class="bbtn">اضافة سنة</button> -->
                        </div>
                    <div class="card-block">
                        <table class="table table-bordered table-striped table-condensed">
                            <thead style="text-align: center;background: #23a794;
    color: white;">
                                <tr>
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
                            <tbody style="text-align: center;" id="results-table-body">

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
</div>
            <!-- /. PAGE INNER  -->
        </div>


        <!-- /. PAGE WRAPPER  -->
    </div>
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
                            <div class="input-icon"><i class="fa-solid fa-percent"></i></div>
                          <input type="text"  id="discount_value" placeholder=" قيمة الحسم بالنسبة المئوية  " value="{{ old('tr_enrol_pay_discount') }}" name="tr_enrol_pay_discount" class="@error('tr_enrol_pay_discount') is-invalid @enderror"/>
                          @error('tr_enrol_pay_discount')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                      <span class="invalid-feedback"></span>
                        </div>
                        <div class="input-groupp input-groupp-icon">
                            <div class="input-icon"><i class="fa-sharp fa-solid fa-calendar-week"></i></div>
                          <input type="text" id="discount_desc" placeholder=" سبب الحسم  " value="{{ old('tr_enrol_pay_discount_desc') }}" name="tr_enrol_pay_discount_desc" class="@error('tr_enrol_pay_discount_desc') is-invalid @enderror"/>
                          @error('tr_enrol_pay_discount_desc')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
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
                            <div class="input-icon"><i class="fa-sharp fa-solid fa-calendar-week"></i></div>
                          <input type="text" placeholder=" شرح و ملاحظات التفعيل   " value="{{ old('tr_enrol_pay_desc') }}" name="tr_enrol_pay_desc" class="@error('tr_enrol_pay_desc') is-invalid @enderror" id="tr_enrol_pay_desc"/>
                          @error('tr_enrol_pay_desc')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                      <span class="invalid-feedback"></span>

                        </div>
                        <div class="input-groupp">
                            <select name="bimar_bank_id" id="bimar_bank_id" class="@error('bimar_bank_id') is-invalid @enderror">
                         <option>اختر البنك </option>

                         @foreach ($banks as $bank)
                               <option value="{{ $bank->id }}">{{ $bank->tr_bank_name_ar }}</option>
                             @endforeach

                        </select>
                        @error('bimar_bank_id')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
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
                            <div class="input-icon"><i class="fa-sharp fa-solid fa-calendar-week"></i></div>
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
            // setTimeout(() => {
            //     location.reload();
            // }, 2000);
            updateTableRow(id, data.updatedData);
        }
    })
    .catch(error => console.error('Error:', error));
}







function updateTableRow(id, updatedData) {
    // البحث عن الصف الذي يحتوي على نفس الـ ID
    const row = document.querySelector(`#results-table-body tr[data-id="${id}"]`);

    if (row) {
        // تحديث البيانات داخل الصف
        row.querySelector(".discount-column").textContent = updatedData.discount; // تغيير العمود الخاص بالحسم
        row.querySelector(".status-column").textContent = updatedData.status; // تغيير حالة الدفع أو أي بيانات أخرى

        // تحديث أي بيانات أخرى حسب الحاجة
    }
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
            }, 2000);
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
            }, 2000);
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
            }, 2000);
        }
    })
    .catch(error => console.error('Error:', error));
}


    </script>
     <script>






// document.addEventListener("DOMContentLoaded", function () {


//   document.querySelectorAll(".submit-btn").forEach(function (button) {
//     button.addEventListener("click", function (event) {
//       event.preventDefault();

//       // تحديد التبويب النشط وقيمة البحث
//       const activeTab = document.querySelector(".tab.active").getAttribute("data-tab");
//       const searchInput = document.querySelector(`#${activeTab} input[type="search"]`);
//       const searchValue = searchInput ? searchInput.value.trim() : "";

//       // تحقق من وجود قيمة الإدخال
//       if (searchValue === "") {
//         alert("يرجى إدخال قيمة للبحث");
//         return;
//       }

//       // إرسال طلب البحث
//       fetch(`/bill/search_bill?search=${searchValue}&type=${activeTab}`)
//         .then((response) => {
//           if (!response.ok) {
//             throw new Error(`Error: ${response.status}`);
//           }
//           return response.json();
//         })
//         .then((data) => {
//           const tableBody = document.getElementById("results-table-body");
//           const tableContainer = document.querySelector(".table-container");
//           const noDataMessage = document.getElementById("no-data-message");

//           // تفريغ الجدول دائمًا
//           tableBody.innerHTML = "";

//           // إخفاء الجدول
//           tableContainer.style.display = "none";

//           // إظهار رسالة "لا يوجد بيانات متاحة"
//           if (noDataMessage) {
//             noDataMessage.style.display = "none"; // إخفاء الرسالة في حالة وجود بيانات سابقة
//           }

//           if (data.status === "success" && data.data.length > 0) {
//             // إذا وجدت بيانات
//             data.data.forEach((item) => {
//               const row = document.createElement("tr");
//               row.classList.add("ttr");

//               let actionButtons = "";

//               if (item.bimar_payment_status_id === 1) {
//                 actionButtons = `
//                   <li class="navbar-item_sub">
//                     <button onclick="showEditPopup(${item.id})" class="yu">إضافة حسم</button>
//                   </li>
//                   <li class="navbar-item_sub">
//                     <button onclick="showEditPopupactive(${item.id})" class="yu">التفعيل</button>
//                   </li>
//                 `;
//               } else if (item.bimar_payment_status_id === 2 || item.bimar_payment_status_id === 3) {
//                 actionButtons = `
//                   <li class="navbar-item_sub">
//                     <button onclick="showEditPopupdisactive(${item.id})" class="yu">إلغاء التسجيل</button>
//                   </li>
//                 `;
//               }

//               let cancelButton = "";
//               if (item.bimar_payment_status_id === 1) {
//                 cancelButton = `
//                   <button onclick="showEditPopupcancal(${item.id})" style="border: none; background: none;" class="gg">X</button>
//                 `;
//               } else {
//                 cancelButton = `
//                   <button style="border: none;background: none; color:green;" class="gg"><i class="fa-solid fa-check"></i></button>
//                 `;
//               }

//               row.innerHTML = `
//                 <td>${item.id}</td>
//                 <td>${item.bimar_trainee.trainee_fname_ar} ${item.bimar_trainee.trainee_lname_ar}</td>
//                 <td>${item.bimar_course_enrollment.bimar_training_course.tr_course_name_ar}</td>
//                 <td>${item.bimar_payment_status.tr_pay_status_name_ar}</td>
//                 <td>${item.tr_enrol_pay_net_price}</td>
//                 <td>${item.tr_enrol_pay_reg_date}</td>
//                 <td><a href="/user_bill/show/${item.id}" class="btn btn-sm" style="color: #686363; border-color: #686363;">التفاصيل</a></td>
//                 <td>
//                   <nav class="navbar">
//                     <ul class="navbar-container">
//                       <li class="navbar-item">Action
//                         <ul class="navbar-container_sub">
//                           ${actionButtons}
//                         </ul>
//                       </li>
//                     </ul>
//                   </nav>
//                 </td>
//                 <td>${cancelButton}</td>
//               `;

//               tableBody.appendChild(row);
//             });

//             // عرض الجدول
//             tableContainer.style.display = "block";
//           } else {
//             // إذا لم تكن هناك بيانات، عرض رسالة "لا يوجد بيانات متاحة" بدلاً من الجدول
//             const messageDiv = document.createElement("div");
//             messageDiv.id = "no-data-message";
//             messageDiv.style.textAlign = "center";
//             messageDiv.textContent = "لا يوجد بيانات متاحة";
//             tableContainer.parentNode.appendChild(messageDiv); // عرض الرسالة أسفل الجدول أو في مكان مخصص

//             // إخفاء الجدول
//             tableContainer.style.display = "none";
//           }
//         })
//         .catch((error) => {
//           console.error("حدث خطأ أثناء البحث:", error);
//           alert("تعذر تنفيذ عملية البحث. يرجى المحاولة لاحقاً.");
//         });
//     });
//   });
// });
// document.addEventListener("DOMContentLoaded", function () {
//     // تبديل التبويبات
//     document.querySelectorAll(".tab").forEach(tab => {
//         tab.addEventListener("click", function () {
//             document.querySelectorAll(".tab").forEach(t => t.classList.remove("active"));
//             document.querySelectorAll(".tab-content").forEach(content => content.classList.remove("active"));
//             this.classList.add("active");
//             document.getElementById(this.getAttribute("data-tab")).classList.add("active");
//         });
//     });

//     // البحث عند النقر على زر البحث
//     document.querySelectorAll(".submit-btn").forEach(button => {
//         button.addEventListener("click", function (event) {
//             event.preventDefault();

//             const activeTab = document.querySelector(".tab.active").getAttribute("data-tab");
//             const searchInput = document.querySelector(`#${activeTab} input[type='search']`);
//             const searchValue = searchInput ? searchInput.value.trim() : "";

//             if (searchValue === "") {
//                 alert("يرجى إدخال قيمة للبحث");
//                 return;
//             }

//             fetch(`/bill/search_bill?search=${searchValue}&type=${activeTab}`)
//                 .then(response => response.json())
//                 .then(data => {
//                     const tableBody = document.getElementById("results-table-body");
//                     const tableContainer = document.querySelector(".table-container");
//                     tableBody.innerHTML = "";
//                     tableContainer.style.display = "none";

//                     if (data.status === "success" && data.data.length > 0) {
//                         data.data.forEach(item => {
//                             const row = document.createElement("tr");
//                             row.classList.add("ttr");
//                             row.innerHTML = `
//                                 <td>${item.id}</td>
//                                 <td>${item.bimar_trainee.trainee_fname_ar} ${item.bimar_trainee.trainee_lname_ar}</td>
//                                 <td>${item.bimar_course_enrollment.bimar_training_course.tr_course_name_ar}</td>
//                                 <td>${item.bimar_payment_status.tr_pay_status_name_ar}</td>
//                                 <td>${item.tr_enrol_pay_net_price}</td>
//                                 <td>${item.tr_enrol_pay_reg_date}</td>
//                                 <td><a href="/user_bill/show/${item.id}" class="btn btn-sm">التفاصيل</a></td>
//                                 <td>${generateActionButtons(item)}</td>
//                                 <td>${generateCancelButton(item)}</td>
//                             `;
//                             tableBody.appendChild(row);
//                         });
//                         tableContainer.style.display = "block";
//                     } else {

//                          tableBody = document.getElementById("results-table-body");
//                      tableContainer = document.querySelector(".table-container");
//                     tableBody.innerHTML = "";
//                     tableContainer.style.display = "none";
//                     data.data.forEach(item => {
//                              row = document.createElement("tr");
//                             row.classList.add("ttr");
//                             row.innerHTML = `
//                                 <td>لا يوجد بيانات</td>
//                             `;
//                             tableBody.appendChild(row);
//                         });
//                         tableContainer.style.display = "block";
//                     }
//                 })
//                 .catch(error => {
//                     console.error("حدث خطأ أثناء البحث:", error);
//                     alert("تعذر تنفيذ عملية البحث. يرجى المحاولة لاحقاً.");
//                 });
//         });
//     });
// });
// function generateActionButtons(item) {
//     if (item.bimar_payment_status_id === 1) {
//         return `
//             <button onclick="showEditPopup(${item.id})">إضافة حسم</button>
//             <button onclick="showEditPopupactive(${item.id})">التفعيل</button>
//         `;
//     } else if (item.bimar_payment_status_id === 2 || item.bimar_payment_status_id === 3) {
//         return `<button onclick="showEditPopupdisactive(${item.id})">إلغاء التسجيل</button>`;
//     }
//     return "";
// }

// function generateCancelButton(item) {
//     return item.bimar_payment_status_id === 1
//         ? `<button onclick="showEditPopupcancal(${item.id})">X</button>`
//         : `<button style="color:green;"><i class="fa-solid fa-check"></i></button>`;
// }
document.addEventListener("DOMContentLoaded", function () {
    // تبديل التبويبات
    document.querySelectorAll(".tab").forEach(tab => {
        tab.addEventListener("click", function () {
            document.querySelectorAll(".tab").forEach(t => t.classList.remove("active"));
            document.querySelectorAll(".tab-content").forEach(content => content.classList.remove("active"));
            this.classList.add("active");
            document.getElementById(this.getAttribute("data-tab")).classList.add("active");
        });
    });

    // البحث عند النقر على زر البحث
    document.querySelectorAll(".submit-btn").forEach(button => {
        button.addEventListener("click", function (event) {
            event.preventDefault();

            const activeTab = document.querySelector(".tab.active").getAttribute("data-tab");
            const searchInput = document.querySelector(`#${activeTab} input[type='search']`);
            const searchValue = searchInput ? searchInput.value.trim() : "";

            if (searchValue === "") {
                alert("يرجى إدخال قيمة للبحث");
                return;
            }

            fetch(`/bill/search_bill?search=${searchValue}&type=${activeTab}`)
                .then(response => response.json())
                .then(data => {
                    const tableBody = document.getElementById("results-table-body");
                    const tableContainer = document.querySelector(".table-container");
                    tableBody.innerHTML = "";
                    tableContainer.style.display = "none";

                    if (data.status === "success" && data.data.length > 0) {
                        data.data.forEach(item => {
                            const row = document.createElement("tr");
                            row.classList.add("ttr");
                            row.innerHTML = `
                                <td>${item.id}</td>
                                <td>${item.bimar_trainee.trainee_fname_ar} ${item.bimar_trainee.trainee_lname_ar}</td>
                                <td>${item.bimar_course_enrollment.bimar_training_course.tr_course_name_ar}</td>
                                <td>${item.bimar_payment_status.tr_pay_status_name_ar}</td>
                                <td>${item.tr_enrol_pay_net_price}</td>
                                <td>${item.tr_enrol_pay_reg_date}</td>
                                <td><a href="/user_bill/show/${item.id}" class="btn btn-sm">التفاصيل</a></td>
                                <td>${generateActionButtons(item)}</td>
                                <td>${generateCancelButton(item)}</td>
                            `;
                            tableBody.appendChild(row);
                        });
                        tableContainer.style.display = "block";
                    } else {
                        // في حالة عدم وجود بيانات، إخفاء الجدول وعرض رسالة واحدة
                        let row = document.createElement("tr");
                        row.classList.add("ttr");
                        row.innerHTML = `<td colspan="9" style="text-align:center;">لا يوجد بيانات</td>`;
                        tableBody.appendChild(row);
                        tableContainer.style.display = "block";
                    }
                })
                .catch(error => {
                    console.error("حدث خطأ أثناء البحث:", error);
                    alert("تعذر تنفيذ عملية البحث. يرجى المحاولة لاحقاً.");
                });
        });
    });
});

// دوال توليد الأزرار
function generateActionButtons(item) {
    if (item.bimar_payment_status_id === 1) {
        return `
            <button onclick="showEditPopup(${item.id})">إضافة حسم</button>
            <button onclick="showEditPopupactive(${item.id})">التفعيل</button>
        `;
    } else if (item.bimar_payment_status_id === 2 || item.bimar_payment_status_id === 3) {
        return `<button onclick="showEditPopupdisactive(${item.id})">إلغاء التسجيل</button>`;
    }
    return "";
}

function generateCancelButton(item) {
    return item.bimar_payment_status_id === 1
        ? `<button onclick="showEditPopupcancal(${item.id})">X</button>`
        : `<button style="color:green;"><i class="fa-solid fa-check"></i></button>`;
}







document.addEventListener("DOMContentLoaded", function () {
    let navbarItems = document.querySelectorAll(".navbar-item");

navbarItems.forEach((item, index) => {
    item.addEventListener("mouseenter", function () {
        // إخفاء جميع العناصر التي تأتي بعد العنصر الحالي
        navbarItems.forEach((otherItem, otherIndex) => {
            if (otherIndex > index) {
                otherItem.style.visibility = "hidden"; // إخفاء العنصر
                otherItem.style.position = "absolute"; // وضع العنصر خارج التدفق
            }
        });

        // إظهار القائمة المنسدلة الخاصة بهذا العنصر فقط
        let submenu = this.querySelector(".navbar-container_sub");
        if (submenu) {
            submenu.style.visibility = "visible"; // تأكد من أن القائمة المنسدلة تظهر
            submenu.style.position = "relative"; // تأكد من أن القائمة تكون في التدفق
        }
    });

    item.addEventListener("mouseleave", function () {
        // عند مغادرة الماوس، إظهار جميع العناصر المخفية
        navbarItems.forEach(otherItem => {
            otherItem.style.visibility = "visible"; // إظهار العنصر
            otherItem.style.position = "relative"; // إعادة العنصر إلى مكانه في التدفق
        });

        // إخفاء جميع القوائم المنسدلة
        document.querySelectorAll(".navbar-container_sub").forEach(sub => {
            sub.style.visibility = "hidden"; // إخفاء القوائم المنسدلة
            sub.style.position = "absolute"; // وضع القوائم خارج التدفق
        });
    });
});
});



  </script>
  <script>




</script>
  <script>
    const tabs = document.querySelectorAll('.tab');
    const contents = document.querySelectorAll('.tab-content');

    tabs.forEach(tab => {
      tab.addEventListener('click', () => {
        tabs.forEach(t => t.classList.remove('active'));
        contents.forEach(c => c.classList.remove('active'));

        tab.classList.add('active');
        document.getElementById(tab.dataset.tab).classList.add('active');
      });
    });
  </script>
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
@endsection
