@extends('layout_trainer.mester')
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
    input[type="radio"] {
    display: block;
}
input[type="checkbox"] {
    display: block;
}
</style>
<div id="page-wrapper" style="color:black;">
@if(session()->has('message'))
        <div class="alert alert-info" role="alert" style="text-align:end;font-size: 20px; ">
          {{session()->get('message')}}
        </div>
@endif
            <div class="containerr">
            <form action="{{ url('ques/store') }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="roww">
        <h4>سؤال جديد</h4>
        <!-- نوع السؤال -->
         <input type="hidden" name="bimar_questions_bank_id" value="{{$id}}">
        <div class="input-groupp input-groupp-icon">
            <select class="form-select" id="type_id" name="bimar_questions_type_id" required>
                <option value="" selected disabled>اختر نوع السؤال</option>
                @foreach ($types as $type)
                    <option value="{{ $type->tr_questions_type_code }}">{{ $type->tr_questions_type_name }}</option>
                @endforeach
            </select>
        </div>

        <!-- عنوان السؤال -->
        <div class="input-groupp input-groupp-icon">
        <div class="input-icon"><i class="fa-solid fa-signature"></i></div>

            <input type="text" id="question_name" name="tr_bank_assess_questions_name" placeholder="عنوان السؤال">
        </div>

        <!-- نص السؤال -->
        <div class="input-groupp input-groupp-icon">
            <textarea name="tr_bank_assess_questions_body" id="editor" rows="5" required></textarea>
        </div>

        <!-- درجة السؤال -->
        <div class="input-groupp input-groupp-icon">
        <div class="input-icon"><i class="fa-solid fa-gauge-simple"></i></div>

            <input type="number" id="grade" name="tr_bank_assess_questions_grade" placeholder="علامة السؤال">
        </div>

        <!-- ملاحظات حول السؤال -->
        <div class="input-groupp input-groupp-icon">
        <div class="input-icon"><i class="fa-solid fa-audio-description"></i></div>
            <input type="text" id="question_note" name="tr_bank_assess_questions_note" placeholder="ملاحظات حول السؤال">
        </div>

        <!-- عدد الإجابات -->
        <div class="input-groupp input-groupp-icon">
        <div class="input-icon"><i class="las la-sort-numeric-up"></i></div>
            <input type="number" id="answerCount" class="form-control" min="1" max="10" placeholder="عدد الإجابات" style="height: 50px;background-color: #f9f9f9;">
            <button type="button" id="generateAnswers" class="btn btn-primary">توليد الإجابات</button>
        </div>

        <!-- توليد الحقول للإجابات -->
        <div id="answersContainer" class="mt-3"></div>

        <div class="roww">
            <input type="submit" value="حفظ" class="bttn">
        </div>
    </div>
</form>

              </div>


        </div>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdn.ckeditor.com/4.20.2/standard/ckeditor.js"></script>
    <!-- <script>

$('#type_id').on('change', function () {
    const type = $(this).val();
    const answersSection = $('#answersSection');

    $('#answersContainer').empty();
    $('#answerCount').val('');
    answersSection.addClass('d-none');

    if (type === 'TF' || type === 'MC' || type === 'MR') {
        answersSection.removeClass('d-none');
    }
});


$('#generateAnswers').on('click', function () {
    const typeCode = $('#type_id').val();
    const count = parseInt($('#answerCount').val());
    const answersContainer = $('#answersContainer');

    answersContainer.empty();

    if (isNaN(count) || count <= 0) {
        alert('يرجى إدخال عدد صحيح للإجابات.');
        return;
    }


    if (typeCode === 'TF') {

        answersContainer.append(
            `<div class="input-group mb-2">
                <div class="input-group-text">
                    <input type="radio" name="answers[response]" value="0" class="form-check-input">
                </div>
                <input type="text" class="form-control" name="answers[0][body]" value="True" disabled>
            </div>
            <div class="input-group mb-2">
                <div class="input-group-text">
                    <input type="radio" name="answers[response]" value="1" class="form-check-input">
                </div>
                <input type="text" class="form-control" name="answers[1][body]" value="False" disabled>
            </div>`
        );
    } else if (typeCode === 'MC') {

        for (let i = 0; i < count; i++) {
            answersContainer.append(
                `<div class="input-group mb-2">
                    <div class="input-group-text">
                        <input type="radio" name="answers[response]" value="${i}" class="form-check-input">
                    </div>
                    <input type="text" class="form-control" name="answers[${i}][body]" placeholder="نص الإجابة" required>
                </div>`
            );
        }
    }
});


$('input[type="radio"]').on('change', function () {
    $('input[type="radio"]').not(this).attr('value', '0');
    $(this).attr('value', '1');
});


</script> -->
<Script>
    CKEDITOR.replace('editor', {
    language: 'ar',
    height: 200
  });
  document.getElementById('generateAnswers').addEventListener('click', function () {
    const answerCount = parseInt(document.getElementById('answerCount').value);
    const questionType = document.getElementById('type_id').value;
    const answersContainer = document.getElementById('answersContainer');

    // تنظيف الحاوية
    answersContainer.innerHTML = '';

    if (!questionType) {
        alert('يرجى اختيار نوع السؤال أولاً.');
        return;
    }

    if (isNaN(answerCount) || answerCount < 1 || answerCount > 10) {
        alert('يرجى إدخال عدد صحيح للإجابات بين 1 و 10.');
        return;
    }

    // توليد الحقول بناءً على النوع
    if (questionType === 'TF') {
        // نوع True/False
        for (let i = 1; i <= 2; i++) {
            answersContainer.innerHTML += `
                <div class="input-groupp" style="display: flex;flex-direction: row-reverse;">
                    <input type="radio" name="correct_answer" value="${i}" required style="width: 20px;">
                    <input type="text" name="answers[]" placeholder="الإجابة ${i}" style="text-align: end;border-radius: 40px;">
                </div>`;
        }
    } else if (questionType === 'MC') {
        // نوع Multiple Choice
        for (let i = 1; i <= answerCount; i++) {
            answersContainer.innerHTML += `
                <div class="input-groupp" style="display: flex;flex-direction: row-reverse;">
                    <input type="radio" name="correct_answer" value="${i}"  style="width: 20px;">
                    <input type="text" name="answers[]" placeholder="الإجابة ${i}" style="text-align: end;border-radius: 40px;">
                </div>`;
        }
    } else if (questionType === 'MR') {
        // نوع Multiple Response
        for (let i = 1; i <= answerCount; i++) {
            answersContainer.innerHTML += `
                <div class="input-groupp" style="display: flex;flex-direction: row-reverse;">
                    <input type="checkbox" name="correct_answers[]" value="${i}"  style="width: 20px;">
                    <input type="text" name="answers[]" placeholder="الإجابة ${i}" style="text-align: end;border-radius: 40px;">
                </div>`;
        }

        // تقييد اختيار المستخدم لعدد الإجابات
        const checkboxes = answersContainer.querySelectorAll('input[type="checkbox"]');
        const maxSelectable = answerCount - 1;

        checkboxes.forEach(checkbox => {
            checkbox.addEventListener('change', function () {
                let selectedCount = 0;
                checkboxes.forEach(cb => {
                    if (cb.checked) selectedCount++;
                });

                // إذا تم اختيار أكثر من الحد المسموح به، إلغاء التحديد الأخير
                if (selectedCount > maxSelectable) {
                    alert(`يمكنك اختيار فقط ${maxSelectable} إجابات.`);
                    this.checked = false;
                }
            });
        });
    } else if (questionType === 'ES') {
        // نوع Essay
        answersContainer.innerHTML = '<p>هذا النوع من الأسئلة لا يحتاج إلى إجابات.</p>';
    }
});

</SCript>
@endsection
