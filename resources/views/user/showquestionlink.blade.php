@extends('layout_exam.master')
@section('content')
<link rel="stylesheet" href="{{asset('assets/css/form.css')}}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

<style>
    .ff{
        width: 50em; margin-top:4em;margin-bottom: 10px;
    }
     .body{
    color: #403e3e;
}
.lk{
    width: 526px;
}
.input-groupp-icon input {
    text-align: end;
    padding-right: 4.4em;
}
h4{
    text-align: center;
}

    .bttn{
        border: 1px solid #61baaf;
    padding: 10px;
    background-color: white;
    color: #61baaf;
    border-radius: 20px;
    width: 480px;
    margin-bottom: 20px;
    margin-left:30px;

    }
    /* .bttnn{
        border: none;
    padding: 10px;
    background-color: #61baaf;
    color: white;
    border-radius: 20px;
    } */
    .bttnn:hover{
        background-color: #61baaf;
        color: white;
        font-size: 17px;
        font-weight: 600;
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
    .naaa{
        width: 1000px;
    }
    @media screen and (max-width: 398px ){
        .naaa{
        width: 400px;
    }
}
input[type="radio"] {
    display: block;
}
input[type="checkbox"] {
    display: block;
}
.alert-info {
    color: #ffffff;
    background-color: #2f465c;
    border-color: #2f465c;
    text-align: end;
    font-size: 20px;
}
@media screen and (max-width: 398px ){
      .ff{
        width: 50em;
      }

}
@media only screen and (max-width: 575px)
{
    .ff{
        width: 50em;
      }
}
@media only screen and (max-width: 787px)
{
    .ff{
        width: 20em;
      }
      .bttn{
        width: 200px;
      }
      .lk{
    width: 200px;
}
}
.containerr{
        padding: 0;
        box-shadow: inset 0px 1px 19px 1px #23a794;
    }
    .gf{
            background: #23a794;
            padding: 20px 0px;
        }
        .h44{
            font-weight: 600;
            color: white;
        }
        .form-control{
            height: 3.4em;
            background-color: #f9f9f9;
            border: 2px solid #e5e5e5;
        }
</style>
@php
        $userData = session('user_data');
        $Questions = session('questions');
        $Assessment_id = session('assessment_id');

    @endphp
<div id="page-wrapper" style="color:black;height: 610px;min-height: 600px;
    overflow: auto;">


            <div class="containerr ff" style="">
            <h4 class="h44 gf">السؤال     </h4>

            <form action="{{ route('trainee.update_validate', $ques->id) }}" method="post" enctype="multipart/form-data" style="padding: 20px;color: black;">
            @csrf



    <div class="roww">
        <!-- <h4 style="font-size:30px;    margin-bottom: 5px;">السؤال  </h4> -->
        <!-- عنوان السؤال -->
        <h4 style="text-align: right;    margin-bottom: 5px;">عنوان السؤال  </h4>

        <div class="input-groupp input-groupp-icon">
        <div class="input-icon"><i class="fa-solid fa-signature"></i></div>

            <input type="text" id="question_name" name="tr_bank_assess_questions_name"
                   placeholder="عنوان السؤال" value="{{ $ques->tr_bank_assess_questions_name }}" readonly>
            @error('tr_bank_assess_questions_name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <!-- نص السؤال -->
        <h4 style="text-align: right;    margin-bottom: 5px;">نص السؤال  </h4>

        <div class="input-groupp input-groupp-icon">
            <textarea name="tr_bank_assess_questions_body" class="lk" style="
    height: 60px;
    direction: rtl;
    padding: 10px;background: #f9f9f9;
    border: 1px solid #e5e5e5;
    border-radius: 5px;" cols="10" rows="2" required readonly>{{ $ques->tr_bank_assess_questions_body }}</textarea>
            @error('tr_bank_assess_questions_body')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <!-- علامة السؤال -->
        <h4 style="text-align: right;    margin-bottom: 5px;">علامة السؤال  </h4>

        <div class="input-groupp input-groupp-icon">
        <div class="input-icon"><i class="fa-solid fa-gauge-simple"></i></div>

            <input type="number" id="grade" name="tr_bank_assess_questions_grade"
                   placeholder="علامة السؤال" value="{{ $ques->tr_bank_assess_questions_grade }}" readonly>
            @error('tr_bank_assess_questions_grade')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <!-- ملاحظات السؤال -->
        <h4 style="text-align: right;    margin-bottom: 5px;">ملاحظات حول السؤال  </h4>

        <div class="input-groupp input-groupp-icon">
        <div class="input-icon"><i class="fa-solid fa-audio-description"></i></div>

            <input type="text" id="question_note" name="tr_bank_assess_questions_note"
                   placeholder="ملاحظات حول السؤال" value="{{ $ques->tr_bank_assess_questions_note }}" readonly>
            @error('tr_bank_assess_questions_note')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <input type="hidden" name="bimar_assessment_id" value="{{$Assessment_id}}">
        <!-- الأجوبة -->
        <h4 style="    margin-bottom: 5px;">الأجوبة</h4>

    @foreach ($answers as $index => $answer)
    <div class="input-group mb-2" style="display: flex;flex-direction: row-reverse; margin-bottom: 15px;">
        <input type="hidden" name="answers[{{ $index }}][id]" value="{{ $answer->id }}">

        @if ($ques->Bimar_Questions_Type->tr_questions_type_code === 'TF' || $ques->Bimar_Questions_Type->tr_questions_type_code === 'MC')
            <!-- Radio Button -->
            <input type="radio"
       class="form-check-input"
       name="correct_answer"
       id="answer_{{ $index }}"
       value="{{ $answer->id }}"
       {{ in_array($answer->id, $correctAnswers) ? 'checked' : '' }} required
       style="width: 20px;">

        @elseif ($ques->Bimar_Questions_Type->tr_questions_type_code === 'MR')
            <!-- Checkbox -->
            <input type="checkbox"
           class="form-check-input checkbox-limit"
           name="correct_answers[]"
           id="answer_{{ $index }}"
           value="{{ $answer->id }}"

           {{ in_array($answer->id, $correctAnswers) ? 'checked' : '' }}  style="width: 20px;">


        @endif

        <!-- Input for answer text -->
        <input type="text"
       name="answers[{{ $index }}][body]"
       data-id="{{ $answer->id }}"
       value="{{ $ques->Bimar_Questions_Type->tr_questions_type_code === 'ES' ? $body : $answer->tr_bank_assess_answers_body }}"
       placeholder="الإجابة"
       style="text-align: end; border-radius: 40px;"
       @if($ques->Bimar_Questions_Type->tr_questions_type_code !== 'ES') readonly @endif>
    </div>
@endforeach


<!-- <input type="submit" value="Validate" class="bttn"  style="margin-bottom: 20px;"> -->

<!-- <button type="submit" >Validate</button> -->
<button type="button" id="validate-btn" class="bttn">Validate</button>

    </div>


</form>
<form action="{{url('trainee/delete_validate',$ques->id)}}" method="post" enctype="multipart/form-data">
@csrf
<input type="hidden" name="bimar_assessment_id" value="{{$Assessment_id}}">
<button type="button" id="validate-btnn" class="bttn" style="margin-left: 50px;">delete answers</button>

<!-- <input type="submit" value="delete answers" > -->
</form>
@if(session()->has('message'))
        <div class="alert alert-info" role="alert" style="text-align:right;font-size: 20px; ">
          {{session()->get('message')}}
        </div>
@endif
<div id="message" style="display: none;" class="alert alert-info" style="    text-align: right;
    font-size: 20px;
    background:rgb(73, 28, 155);
    color: white"></div>

              </div>


        </div>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdn.ckeditor.com/4.20.2/standard/ckeditor.js"></script>
        <script>
        // تهيئة CKEditor
        CKEDITOR.replace('editor', {
            language: 'ar',
            height: 200
        });

        // التحكم في نوع السؤال


    </script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
//     $(document).ready(function () {
//     // تحقق من حالة الأيقونة عند تحميل الصفحة
//     const questionId = '{{ $ques->id }}'; // رقم السؤال
//     const iconElement = $(`#question-icon-${questionId} i`); // الحصول على الأيقونة

//     // إذا كانت الإجابة محفوظة، قم بتغيير الأيقونة
//     if (localStorage.getItem(`question-${questionId}`) === 'answered') {
//         iconElement.removeClass('fa-regular fa-lightbulb').addClass('fa-solid fa-lightbulb');
//     }

//     $('#validate-btn').on('click', function () {
//         var formData = {
//             _token: '{{ csrf_token() }}', // توكن الحماية
//             ques_id: '{{ $ques->id }}', // رقم السؤال
//             bimar_assessment_id: '{{ $Assessment_id }}', // رقم التقييم
//             correct_answer: $('input[name="correct_answer"]:checked').val(), // الإجابة الصحيحة
//             correct_answers: $('input[name="correct_answers[]"]:checked').map(function() {
//                 return $(this).val();
//             }).get(), // الإجابات الصحيحة المتعددة
//         };

//         $.ajax({
//             url: "{{ route('trainee.update_validate', $ques->id) }}",
//             type: "POST",
//             data: formData,
//             success: function (response) {
//                 // تغيير أيقونة السؤال إلى لمبة ممتلئة
//                 iconElement.removeClass('fa-regular fa-lightbulb').addClass('fa-solid fa-lightbulb');

//                 // تخزين الحالة في localStorage
//                 localStorage.setItem(`question-${questionId}`, 'answered');

//                 console.log("تم حفظ الإجابة بنجاح!");
//             },
//             error: function (xhr) {
//                 console.log("حدث خطأ أثناء الحفظ:", xhr.responseText);
//             }
//         });
//     });
// });
$(document).ready(function () {
    // تعريف معرف السؤال
    const questionId = '{{ $ques->id }}';
    const iconElement = $('#question-icon-' + questionId + ' i'); // الحصول على أيقونة السؤال

    // التحقق من حالة الأيقونة عند تحميل الصفحة
    if (localStorage.getItem('question-' + questionId) === 'answered') {
        iconElement.removeClass('fa-regular fa-lightbulb').addClass('fa-solid fa-lightbulb');
    }

    // عند النقر على زر "Validate" لحفظ الإجابة
    $('#validate-btn').on('click', function () {
        var formData = {
            _token: '{{ csrf_token() }}', // توكن الحماية
            ques_id: questionId, // رقم السؤال
            bimar_assessment_id: '{{ $Assessment_id }}', // رقم التقييم
            correct_answer: $('input[name="correct_answer"]:checked').val(), // الإجابة الصحيحة
            correct_answers: $('input[name="correct_answers[]"]:checked').map(function () {
                return $(this).val();
            }).get(), // الإجابات الصحيحة المتعددة
            answers: $('input[name^="answers"]').map(function () {
                return {
                    id: $(this).data('id'), // جلب معرف الإجابة
                    body: $(this).val() // جلب النص المدخل
                };
            }).get() // جمع الإجابات النصية
        };

        $.ajax({
            url: "{{ route('trainee.update_validate', $ques->id) }}",
            type: "POST",
            data: formData,
            success: function (response) {
                // تغيير الأيقونة إلى لمبة ممتلئة
                iconElement.removeClass('fa-regular fa-lightbulb').addClass('fa-solid fa-lightbulb');

                // تخزين الحالة في localStorage
                localStorage.setItem('question-' + questionId, 'answered');

                // عرض رسالة النجاح
                $('#message').text('تمت الإجابة على السؤال بنجاح').fadeIn();
                $('html, body').animate({ scrollTop: 0 }, 'slow');
                setTimeout(() => {
                    $('#message').fadeOut();
                }, 3000);
            },
            error: function (xhr) {
                console.log("حدث خطأ أثناء الحفظ:", xhr.responseText);
            }
        });
    });

    // عند النقر على زر "delete answers" لحذف الإجابات
//     $('#validate-btnn').on('click', function () {
//         var formData = {
//             _token: '{{ csrf_token() }}', // توكن الحماية
//             bimar_assessment_id: '{{ $Assessment_id }}', // رقم التقييم
//         };

//         $.ajax({
//             url: "{{ url('trainee/delete_validate', $ques->id) }}",
//             type: "POST",
//             data: formData,
//             success: function (response) {
//                 // تغيير الأيقونة إلى لمبة فارغة
//                 iconElement.removeClass('fa-solid fa-lightbulb').addClass('fa-regular fa-lightbulb');

//                 // إزالة حالة السؤال من localStorage
//                 localStorage.removeItem('question-' + questionId);

//                 // عرض رسالة النجاح
//                 $('#message').text('تم حذف الإجابات بنجاح').fadeIn();
//                 setTimeout(() => {
//                     location.reload();
//                 }, 1500);
//             },
//             error: function (xhr) {
//                 console.log("حدث خطأ أثناء الحذف:", xhr.responseText);
//             }
//         });
//     });
// });
$('#validate-btnn').on('click', function () {
    var formData = {
        _token: '{{ csrf_token() }}', // توكن الحماية
        bimar_assessment_id: '{{ $Assessment_id }}', // رقم التقييم
    };

    $.ajax({
        url: "{{ url('trainee/delete_validate', $ques->id) }}",
        type: "POST",
        data: formData,
        success: function (response) {
            // تغيير الأيقونة إلى لمبة فارغة
            iconElement.removeClass('fa-solid fa-lightbulb').addClass('fa-regular fa-lightbulb');

            // إزالة حالة السؤال من localStorage
            localStorage.removeItem('question-' + questionId);

            // **إلغاء تحديد جميع مربعات الاختيار**
            $('input[name="correct_answers[]"]').prop('checked', false);

            // عرض رسالة النجاح
            $('#message').text('تم حذف الإجابات بنجاح').fadeIn();
            setTimeout(() => {
                location.reload(); // تحديث الصفحة بعد الحذف
            }, 1000);
        },
        error: function (xhr) {
            console.log("حدث خطأ أثناء الحذف:", xhr.responseText);
        }
    });
});
});
</script>
</script>
<!-- <script>

    // document.querySelector("form").addEventListener("submit", function(event) {
    //     console.log("Form submitted");
    // });


</script> -->
<!-- <script>
    $(document).ready(function () {
    // تحقق من حالة الأيقونة عند تحميل الصفحة
    const questionId = '{{ $ques->id }}'; // رقم السؤال
    const iconElement = $(`#question-icon-${questionId} i`); // الحصول على الأيقونة

    // إذا كانت الإجابة محفوظة، قم بتغيير الأيقونة
    if (localStorage.getItem(`question-${questionId}`) === 'answered') {
        iconElement.removeClass('fa-regular fa-lightbulb').addClass('fa-solid fa-lightbulb');
    }

    $('#validate-btnn').on('click', function () {
        var formData = {
            _token: '{{ csrf_token() }}', // توكن الحماية
            ques_id: '{{ $ques->id }}', // رقم السؤال
            bimar_assessment_id: '{{ $Assessment_id }}', // رقم التقييم

        };

        $.ajax({
            url: "{{ url('trainee/delete_validate', $ques->id) }}",
            type: "POST",
            data: formData,
            success: function (response) {
                // تغيير أيقونة السؤال إلى لمبة ممتلئة
                iconElement.removeClass('fa-solid fa-lightbulb').addClass('fa-regular fa-lightbulb');

                // تخزين الحالة في localStorage
                localStorage.setItem(`question-${questionId}`, 'answered');

                // عرض الرسالة في العنصر
                $('#message').text('تمت حذف الاجابات على السؤال بنجاح').show();
                setTimeout(() => {
                    $('#message').fadeOut(); // إخفاء الرسالة بعد فترة
                }, 3000);
            },
            error: function (xhr) {
                console.log("حدث خطأ أثناء الحفظ:", xhr.responseText);
            }
        });
    });
});

</script> -->
    <script>
    let answerIndex = {{ count($answers) }};
    function addAnswer() {
        const newAnswer = `
            <div class="input-group mb-2">
                <input type="text" name="answers[${answerIndex}][body]" placeholder="الإجابة الجديدة">
            </div>
        `;
        document.getElementById('new-answers').insertAdjacentHTML('beforeend', newAnswer);
        answerIndex++;
    }
</script>
<script>
    window.onload = function () {
        if (window.history && window.history.pushState) {
            window.history.pushState("no-back", null, null);
            window.onpopstate = function () {
                window.history.pushState("no-back", null, null);
            };
        }
    };
//     history.pushState(null, null, window.location.href);
// window.onpopstate = function () {
//     history.go(1);
// };
document.addEventListener("keydown", function (event) {
    if (event.key === "F5" || (event.ctrlKey && event.key === "r")) {
        event.preventDefault();
        alert("تحديث الصفحة غير مسموح!");
    }
});
document.addEventListener("contextmenu", function (event) {
    event.preventDefault();
    alert("تم تعطيل زر الفأرة الأيمن!");
});
// window.addEventListener("beforeunload", function (event) {
//     event.preventDefault();
//     event.returnValue = "هل أنت متأكد أنك تريد مغادرة الصفحة؟";
// });
history.pushState(null, null, document.URL);
history.pushState(null, null, document.URL);
window.onpopstate = function () {
    history.go(1);
};
history.pushState(null, null, location.href);
window.onpopstate = function () {
    history.pushState(null, null, location.href);
};

</script>
@endsection
