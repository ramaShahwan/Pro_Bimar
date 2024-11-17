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
}
</style>




        <!-- /. NAV SIDE  -->
    <div id="page-wrapper">
    <div class="tabs-container">
    <div class="tabs-header">
      <div class="tab active" data-tab="login">رقم الايصال</div>
      <div class="tab" data-tab="register">الاسم الكامل</div>
      <div class="tab" data-tab="contact">رقم الموبايل</div>
    </div>
    <div class="tab-content active" id="login">
      <form>
        <div class="form-group">
          <!-- <label for="login-email">Email address</label> -->
          <input type="search" id="login-email" placeholder="رقم الايصال">
          <!-- <div class="success">✔ Valid email</div> -->
        </div>

        <button class="submit-btn">البحث</button>
      </form>
    </div>
    <div class="tab-content" id="register">
      <form>
        <div class="form-group">
          <input type="search" id="register-username" placeholder="الاسم الكامل">
        </div>


        <button class="submit-btn">البحث</button>
      </form>
    </div>
    <div class="tab-content" id="contact">
      <form>
        <div class="form-group">
          <!-- <label for="contact-name">Name</label> -->
          <input type="search" id="contact-name" placeholder="رقم الموبايل">
        </div>


        <button class="submit-btn">البحث</button>
      </form>
    </div>
  </div>



        <div class="row" style="    margin: 80px 30px; direction: rtl;">
            <div class="col-lg-12">
            <div class="table-container">
                <div class="card">
                        <div class="card-header" style="text-align: start;font-size: 20px;display: flex;justify-content: space-between;align-items: center;">
                            <h3><i class="fa-sharp fa-solid fa-calendar-week"></i> جميع الايصالات</h3>
                            <!-- <button onclick="togglePopuo()" class="bbtn">اضافة سنة</button> -->
                        </div>
                    <div class="card-block">

                        <table class="table table-bordered table-striped table-condensed">
                            <thead style="text-align: center;">
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
                            <tbody style="text-align: center;">

                                <tr>
                                    <td>11</td>
                                    <td>fatima </td>
                                    <td>ffmf</td>
                                    <td>jdnvjkd </td>
                                    <td>kfvdlkv </td>
                                    <td>2024  </td>

                                    <td>   <a  class="btn btn-sm " style="color: #686363; border-color: #686363;"> التفاصيل
</a></td>
<td><nav class="navbar">
	<ul class="navbar-container">
		<li class="navbar-item">Action<span class="navbar-item_label">Action</span>
			<ul class="navbar-container_sub">
				<li class="navbar-item_sub"> <button onclick="togglePopuo()" class="yu">اضافة حسم</button></li>
				<li class="navbar-item_sub"><button onclick="togglePopuoo()" class="yu">التفعيل </button></li>
				<li class="navbar-item_sub"> <button onclick="togglePopuooo()" class="yu">الغاء التسجيل </button></li>
			</ul>

	</ul>
</nav>  </td>
                                    <td>
                                        <!-- <a href=""><span class="las la-trash-alt" style="font-size: 30px; color: #f00707;"></span></a> -->
                                        <!-- <form action="" method="post">
                                        @csrf

                                                <input type="submit"  class="gg" style=" " value="X" onclick="return confirm('هل تريد الحذف')">
                                                </form> -->
                                        <button onclick="togglePopuoop()" style="border: none;background: none; " class="gg">X </button>

                                    </td>
                                </tr>

                            </tbody>
                        </table>
</div>
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
    <!-- /. WRAPPER  -->
    <div class="popup" id="popup-1">
            <div class="overlay"></div>
            <div class="content">
                <div class="close-btn" onclick="togglePopuo()">&times;</div>
                <!-- <div class="containerr"> -->
                <form action="{{url('bank/store')}}" method="post" enctype="multipart/form-data">
                @csrf
                      <div class="roww">
                        <h4> اضافة حسم </h4>
                        <div class="input-groupp input-groupp-icon">
                            <div class="input-icon"><i class="fa-solid fa-percent"></i></div>
                          <input type="text" placeholder=" قيمة الحسم بالنسبة المئوية  " name="tr_bank_code" class="@error('tr_bank_code') is-invalid @enderror"/>
                          @error('tr_bank_code')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                        </div>
                        <div class="input-groupp input-groupp-icon">
                            <div class="input-icon"><i class="fa-sharp fa-solid fa-calendar-week"></i></div>
                          <input type="text" placeholder=" سبب الحسم  " name="tr_bank_name_ar" class="@error('tr_bank_name_ar') is-invalid @enderror"/>
                          @error('tr_bank_name_ar')
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

    <!-- /. FOOTER  -->
    <div class="popup" id="popuppo-1">
            <div class="overlay"></div>
            <div class="content">
                <div class="close-btn" onclick="togglePopuoo()">&times;</div>
                <!-- <div class="containerr"> -->
                <form action="{{url('bank/store')}}" method="post" enctype="multipart/form-data">
                @csrf
                      <div class="roww">
                        <h4> تفعيل الوصل  </h4>
                        <div class="input-groupp">
                            <select name="bimar_training_year_id" id="bimar_training_year_id" class="@error('bimar_training_year_id') is-invalid @enderror">
                         <option>اختر حالة الوصل</option>

                               <option value="1">غير فعالة</option>

                        </select>
                        @error('bimar_training_year_id')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                            </div>
                        <div class="input-groupp input-groupp-icon">
                            <div class="input-icon"><i class="fa-sharp fa-solid fa-calendar-week"></i></div>
                          <input type="text" placeholder=" شرح و ملاحظات التفعيل   " name="tr_bank_name_ar" class="@error('tr_bank_name_ar') is-invalid @enderror"/>
                          @error('tr_bank_name_ar')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                        </div>
                        <div class="input-groupp">
                            <select name="bimar_training_year_id" id="bimar_training_year_id" class="@error('bimar_training_year_id') is-invalid @enderror">
                         <option>اختر البنك </option>

                               <option value="1">البركة </option>

                        </select>
                        @error('bimar_training_year_id')
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


        <div class="popup" id="popuppoo-1">
            <div class="overlay"></div>
            <div class="content">
                <div class="close-btn" onclick="togglePopuooo()">&times;</div>
                <!-- <div class="containerr"> -->
                <form action="{{url('bank/store')}}" method="post" enctype="multipart/form-data">
                @csrf
                      <div class="roww">
                        <h4> الغاء التسجيل   </h4>

                        <div class="input-groupp input-groupp-icon">
                            <div class="input-icon"><i class="fa-sharp fa-solid fa-calendar-week"></i></div>
                          <input type="text" placeholder=" شرح و ملاحظات الغاء التسجيل   " name="tr_bank_name_ar" class="@error('tr_bank_name_ar') is-invalid @enderror"/>
                          @error('tr_bank_name_ar')
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



        <div class="popup" id="popuppo-1">
            <div class="overlay"></div>
            <div class="content">
                <div class="close-btn" onclick="togglePopuoo()">&times;</div>
                <!-- <div class="containerr"> -->
                <form action="{{url('bank/store')}}" method="post" enctype="multipart/form-data">
                @csrf
                      <div class="roww">
                        <h4> تفعيل الوصل  </h4>
                        <div class="input-groupp">
                            <select name="bimar_training_year_id" id="bimar_training_year_id" class="@error('bimar_training_year_id') is-invalid @enderror">
                         <option>اختر حالة الوصل</option>

                               <option value="1">غير فعالة</option>

                        </select>
                        @error('bimar_training_year_id')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                            </div>
                        <div class="input-groupp input-groupp-icon">
                            <div class="input-icon"><i class="fa-sharp fa-solid fa-calendar-week"></i></div>
                          <input type="text" placeholder=" شرح و ملاحظات التفعيل   " name="tr_bank_name_ar" class="@error('tr_bank_name_ar') is-invalid @enderror"/>
                          @error('tr_bank_name_ar')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                        </div>
                        <div class="input-groupp">
                            <select name="bimar_training_year_id" id="bimar_training_year_id" class="@error('bimar_training_year_id') is-invalid @enderror">
                         <option>اختر البنك </option>

                               <option value="1">البركة </option>

                        </select>
                        @error('bimar_training_year_id')
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


        <div class="popup" id="popuppooP-1">
            <div class="overlay"></div>
            <div class="content">
                <div class="close-btn" onclick="togglePopuoop()">&times;</div>
                <!-- <div class="containerr"> -->
                <form action="{{url('bank/store')}}" method="post" enctype="multipart/form-data">
                @csrf
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

    </script>
    <script>

document.addEventListener("DOMContentLoaded", function() {
  // استمع لحدث الضغط على زر البحث
  document.querySelectorAll(".submit-btn").forEach(function(button) {
    button.addEventListener("click", function(event) {
      event.preventDefault();  // منع إعادة تحميل الصفحة

      // احصل على قيمة البحث بناءً على التبويب المفتوح
      const tabId = document.querySelector(".tab.active").getAttribute("data-tab");
      const searchValue = document.querySelector(`#${tabId} input[type="search"]`).value;

      // تحقق إذا كانت القيمة فارغة أو لا
      if (searchValue.trim() === "") {
        return;
      }

      // استخدم AJAX لجلب البيانات بناءً على قيمة البحث
      fetch(`/search?query=${searchValue}`)
        .then(response => response.json())
        .then(data => {
          // افترض أن data هو JSON يحتوي على البيانات
          if (data && data.length > 0) {
            // هنا يمكنك تعديل الجدول ليظهر البيانات
            let tableBody = document.querySelector(".table tbody");
            tableBody.innerHTML = ""; // مسح البيانات السابقة

            data.forEach(item => {
              // إضافة البيانات في الجدول
              const row = document.createElement("tr");
              row.innerHTML = `
                <td>${item.receipt_number}</td>
                <td>${item.full_name}</td>
                <td>${item.course}</td>
                <td>${item.receipt_status}</td>
                <td>${item.discounted_price}</td>
                <td>${item.registration_date}</td>
                <td><a href="#" class="btn btn-sm">التفاصيل</a></td>
                <td>
                  <button class="yu">اضافة حسم</button>
                  <button class="yu">التفعيل</button>
                  <button class="yu">الغاء التسجيل</button>
                </td>
                <td><button class="gg">X</button></td>
              `;
              tableBody.appendChild(row);
            });

            // إظهار الجدول بعد جلب البيانات
            document.querySelector(".table-container").style.display = "block";
          } else {
            alert("لا توجد نتائج مطابقة");
          }
        })
        .catch(error => {
          console.error("حدث خطأ أثناء البحث:", error);
        });
    });
  });
});

    </script>
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
@endsection
