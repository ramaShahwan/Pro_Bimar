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
                            <h3><i class="fa-solid fa-users"></i> مدربين</h3>
                            <!-- <button onclick="togglePopuo()" class="bbtn">اضافة سنة</button> -->
                        </div>
                    <div class="card-block">
                        <table class="table table-bordered table-striped table-condensed">
                        <thead style="text-align: center;">
                                <tr>
                                    <th style="text-align: center;">اسم المدرب </th>
                                    <th style="text-align: center;">اسم الكورس </th>
                                    <th style="text-align: center;">الوصف  </th>

                                    <th style="text-align: center;">الأحداث</th>
                                </tr>
                            </thead>
                            <tbody style="text-align: center;">
                            @foreach($data as $call)
                                <tr>
                                    <td>{{$call->Bimar_User->tr_user_fname_ar}} </td>
                                    <td> {{$call->Bimar_Course_Enrollment->bimar_training_course->tr_course_name_ar}} </td>
                                    <td> {{$call->tr_course_enrol_trainers_desc}} </td>
                                    <!-- <td>{{$call->tr_course_enrol_trainers_desc}}    </td> -->



                                    <td>
                                        <!-- <a href=""><span class="las la-trash-alt" style="font-size: 30px; color: #f00707;"></span></a> -->
                                        <!-- <a href="{{url('course_enrollments/edit',$call->id)}}"><span class="las la-edit" style="font-size: 30px; color: #3f4046;"></span></a> -->
                                        <!-- <button onclick="togglePopuoo()" style="border: none;background: none;"><span class="las la-edit" style="font-size: 30px; color: #3f4046;"></span> </button> -->
                                        <!-- <a href="{{url('course_enrollments/show',$call->id)}}"><span class="las la-edit" style="font-size: 30px; color: #3f4046;"></span></a> -->
                                        <form action="{{url('set_trainer/destroy',$call->id)}}" method="post">
                                        @csrf
                                                <!-- <p class="fables-product-info my-2"><a  >

                                                <span class="fables-btn-value">التسجيل على الكورس</span></a></p> -->
                                                <input type="submit"  class="gg" style=" " value="X">
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
            <form action="{{url('set_trainer/store')}}" method="post" enctype="multipart/form-data">
                 @csrf

                      <div class="roww">

                        <h4> مدربين الكورس</h4>
                        <div class="input-groupp input-groupp-icon" style="    width: 450px;    float: right;
    display: inline-block;">
                            <div class="input-icon"><i class="fa-solid fa-audio-description"></i></div>
                          <input type="text" placeholder="الوصف   "  name="tr_course_enrol_trainers_desc" id="tr_course_enrol_trainers_desc" class="@error('tr_course_enrol_trainers_desc') is-invalid @enderror"/>
                          @error('tr_course_enrol_trainers_desc')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                        </div>

                            <div class="input-groupp" style="width: 441px;
    display: inline-block;">
                         <select name="bimar_user_id" id="bimar_user_id" class="@error('bimar_user_id') is-invalid @enderror">
                         <option>  اختر المدرب  </option>
                         @foreach ($users as $user)
                               <option value="{{ $user->id }}">{{ $user->tr_user_fname_ar }}</option>
                             @endforeach
                        </select>
                        @error('bimar_user_id')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                            </div>
                            <div class="input-groupp" style="width: 221px;
    display: inline-block;">
                         <!-- <select name="bimar_course_enrollment_id" id="bimar_course_enrollment_id" class="@error('bimar_course_enrollment_id') is-invalid @enderror">
                         <option>  اختر الكورس  </option>
                         @foreach ($courses as $course)
                               <option value="{{ $course->id }}">{{ $course->bimar_training_course->tr_course_name_ar }}</option>
                             @endforeach
                        </select> -->
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
</div>

@endsection
