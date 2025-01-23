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
            <div class="containerr">
            <form action="{{ url('ques/update', $data->id) }}" method="post" enctype="multipart/form-data">
          @csrf
           @method('PUT')

    <div class="roww">
        <h4>سؤال جديد </h4>
        <!-- عنوان السؤال -->
        <div class="input-groupp input-groupp-icon">
            <input type="text" id="question_name" name="tr_bank_assess_questions_name"
                   placeholder="عنوان السؤال" value="{{ $data->tr_bank_assess_questions_name }}">
            @error('tr_bank_assess_questions_name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <!-- نص السؤال -->
        <div class="input-groupp input-groupp-icon">
            <textarea name="tr_bank_assess_questions_body" id="editor" rows="5" required>{{ $data->tr_bank_assess_questions_body }}</textarea>
            @error('tr_bank_assess_questions_body')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <!-- علامة السؤال -->
        <div class="input-groupp input-groupp-icon">
            <input type="number" id="grade" name="tr_bank_assess_questions_grade"
                   placeholder="علامة السؤال" value="{{ $data->tr_bank_assess_questions_grade }}">
            @error('tr_bank_assess_questions_grade')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <!-- ملاحظات السؤال -->
        <div class="input-groupp input-groupp-icon">
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
        @foreach ($answers as $index => $answer)
    <div class="input-group mb-2">
        <input type="hidden" name="answers[{{ $index }}][id]" value="{{ $answer->id }}">
        <input type="radio" name="answers[{{ $index }}][response]" id="" value="{{$answer->tr_bank_assess_answers_response}}" {{ old('tr_bank_assess_answers_response',$answer->tr_bank_assess_answers_response)== 1 ? 'checked' : '' }}>

        <input type="text" name="answers[{{ $index }}][body]" value="{{ $answer->tr_bank_assess_answers_body }}" placeholder="الإجابة">
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
