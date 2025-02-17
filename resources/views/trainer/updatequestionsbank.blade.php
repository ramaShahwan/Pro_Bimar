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
            <form action="{{ url('ques/update', $data->id) }}" method="post" enctype="multipart/form-data">
          @csrf
           @method('PUT')

    <div class="roww">
        <h4>تعديل السؤال  </h4>
        <!-- عنوان السؤال -->
        <h4 style="text-align: right;">عنوان السؤال  </h4>

        <div class="input-groupp input-groupp-icon">
        <div class="input-icon"><i class="fa-solid fa-signature"></i></div>

            <input type="text" id="question_name" name="tr_bank_assess_questions_name"
                   placeholder="عنوان السؤال" value="{{ $data->tr_bank_assess_questions_name }}">
            @error('tr_bank_assess_questions_name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <!-- نص السؤال -->
        <h4 style="text-align: right;">نص السؤال  </h4>

        <div class="input-groupp input-groupp-icon">
            <textarea name="tr_bank_assess_questions_body" id="editor" rows="5" required>{{ $data->tr_bank_assess_questions_body }}</textarea>
            @error('tr_bank_assess_questions_body')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <!-- علامة السؤال -->
        <h4 style="text-align: right;">علامة السؤال  </h4>

        <div class="input-groupp input-groupp-icon">
        <div class="input-icon"><i class="fa-solid fa-gauge-simple"></i></div>

            <input type="number" id="grade" name="tr_bank_assess_questions_grade"
                   placeholder="علامة السؤال" value="{{ $data->tr_bank_assess_questions_grade }}">
            @error('tr_bank_assess_questions_grade')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <!-- ملاحظات السؤال -->
        <h4 style="text-align: right;">ملاحظات حول السؤال  </h4>

        <div class="input-groupp input-groupp-icon">
        <div class="input-icon"><i class="fa-solid fa-audio-description"></i></div>

            <input type="text" id="question_note" name="tr_bank_assess_questions_note"
                   placeholder="ملاحظات حول السؤال" value="{{ $data->tr_bank_assess_questions_note }}">
            @error('tr_bank_assess_questions_note')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <!-- الأجوبة -->
        <h4>الأجوبة</h4>
        <!-- @foreach ($answers as $index => $answer)
    <div class="input-group mb-2">
        <input type="hidden" name="answers[{{ $index }}][id]" value="{{ $answer->id }}">
        <input type="radio"
                   class="form-check-input"
                   name="correct_answer"
                   id="answer_{{ $index }}"
                   value="{{ $answer->id }}"
                   {{ old('correct_answer', $answer->tr_bank_assess_answers_response) == 1 ? 'checked' : '' }}>

        <input type="text" name="answers[{{ $index }}][body]" value="{{ $answer->tr_bank_assess_answers_body }}" placeholder="الإجابة">
    </div>
    @endforeach -->
    @foreach ($answers as $index => $answer)
    <div class="input-group mb-2" style="display: flex;flex-direction: row-reverse;margin-bottom: 15px;">
        <input type="hidden" name="answers[{{ $index }}][id]" value="{{ $answer->id }}">

        @if ($data->Bimar_Questions_Type->tr_questions_type_code === 'TF' || $data->Bimar_Questions_Type->tr_questions_type_code === 'MC')
    <!-- Radio Button -->
    <input type="radio"
           class="form-check-input"
           name="correct_answer"
           id="answer_{{ $index }}"
           value="{{ $answer->id }}"
           {{ old('correct_answer', $answer->tr_bank_assess_answers_response) == 1 ? 'checked' : '' }} required style="width: 20px;">


@elseif ($data->Bimar_Questions_Type->tr_questions_type_code === 'MR')
    <!-- Checkbox -->
    <input type="checkbox"
           class="form-check-input checkbox-limit"
           name="correct_answers[]"
           id="answer_{{ $index }}"
           value="{{ $answer->id }}"
           data-max-selectable="{{ $maxSelectable }}"
           {{ in_array($answer->id, $correctAnswers) ? 'checked' : '' }}  style="width: 20px;">


           @endif
           <input type="text"
               name="answers[{{ $index }}][body]"
               value="{{ $answer->tr_bank_assess_answers_body }}"
               placeholder="الإجابة" style="text-align: end;border-radius: 40px;">
              
    </div>
@endforeach


    </div>

    <div class="roww">
        <input type="submit" value="حفظ" class="bttn">
    </div>
</form>

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
 <script>
document.addEventListener('DOMContentLoaded', function () {
    const checkboxes = document.querySelectorAll('.checkbox-limit');

    checkboxes.forEach(checkbox => {
        checkbox.addEventListener('change', function () {
            const group = document.querySelectorAll('.checkbox-limit');
            const maxSelectable = parseInt(this.getAttribute('data-max-selectable'), 10);

            // حساب عدد الخيارات المحددة حاليًا
            const selectedCount = Array.from(group).filter(cb => cb.checked).length;

            // منع تحديد جميع الإجابات عند الحد الأقصى
            if (selectedCount > maxSelectable) {
                this.checked = false; // إلغاء التحديد
                alert(`يمكنك اختيار ${maxSelectable} إجابات فقط.`);
                return;
            }

            // تعطيل الخيارات الأخرى عند الوصول للحد الأقصى
            group.forEach(cb => {
                if (!cb.checked) {
                    cb.disabled = selectedCount >= maxSelectable;
                }
            });
        });
    });

    // تحديث حالة التعطيل عند تحميل الصفحة
    function updateCheckboxStates() {
        const group = document.querySelectorAll('.checkbox-limit');
        const maxSelectable = parseInt(group[0].getAttribute('data-max-selectable'), 10);
        const selectedCount = Array.from(group).filter(cb => cb.checked).length;

        group.forEach(cb => {
            if (!cb.checked) {
                cb.disabled = selectedCount >= maxSelectable;
            }
        });
    }

    updateCheckboxStates();
});
</script>




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

@endsection
