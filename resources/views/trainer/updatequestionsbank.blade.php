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
</style>
<div id="page-wrapper" style="color:black;">
            <div class="containerr">
            <form action="{{url('course_enrollments/store')}}" method="post" enctype="multipart/form-data">
            @csrf
                      <div class="roww">

                        <h4>سؤال جديد </h4>

                            <div class="input-groupp">
                            <!-- <label for="bank_id" class="form-label">بنك الأسئلة</label> -->
                <!-- <select class="form-select" id="bank_id" name="tr_bank_assess_questions_bank_id" required>

                    <option value="" selected disabled>اختر بنك الأسئلة</option>
                    <option value="1">بنك الأسئلة 1</option>
                    <option value="2">بنك الأسئلة 2</option>
                </select> -->
                        @error('bimar_training_year_id')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                            </div>

                            <div class="input-groupp input-groupp-icon">
                            <!-- <label for="type_id" class="form-label">نوع السؤال</label> -->
                <select class="form-select" id="type_id" name="bimar_questions_type_id" required>
                    <!-- <option value="" selected disabled>اختر نوع السؤال</option>
                    <option value="true_false">صح / خطأ</option>
                    <option value="multiple_choice">اختيار من متعدد</option>
                    <option value="multiple_response">إجابة متعددة</option>
                    <option value="essay">مقال</option> -->

                @foreach ($questionTypes as $type)
                <option value="" selected disabled>اختر نوع السؤال</option>
            <option value="{{ $type->tr_questions_type_code }}">{{ $type->tr_questions_type_name }}</option>
        @endforeach
        </select>
    @error('bimar_questions_type_id')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>
                        <div class="input-groupp input-groupp-icon">
                            <div class="input-icon"><i class="fa-solid fa-arrow-up-9-1"></i></div>

                            <input type="text"  id="question_name" name="tr_bank_assess_questions_name" placeholder="عنوان السؤال   " value="{{ $data->tr_bank_assess_questions_name }}">
                            @error('tr_bank_assess_questions_name')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                        </div>
                        <!-- <label for="editor" class="form-label">نص السؤال</label> -->

                        <div class="input-groupp input-groupp-icon">
                <textarea name="tr_bank_assess_questions_body" id="editor" rows="5" required>{{ $data->tr_bank_assess_questions_body }}"</textarea>
                                      <div class="input-icon"><i class="fa-solid fa-tag"></i></div>
                          @error('tr_bank_assess_questions_body')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                        </div>

                        <div class="input-groupp input-groupp-icon">
                        <input type="number"  id="grade" name="tr_bank_assess_questions_grade" placeholder="علامة السؤال   " value="{{ $data->tr_bank_assess_questions_grade }}">
                        <div class="input-icon"><i class="fa-solid fa-audio-description"></i></div>
                            @error('tr_bank_assess_questions_grade')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                          </div>
                          <div class="input-groupp input-groupp-icon">
                            <div class="input-icon"><i class="fa-solid fa-arrow-up-9-1"></i></div>

                            <input type="text"  id="question_name" name="tr_bank_assess_questions_note" placeholder="ملاحظات حول السؤال    " value="{{ $data->tr_bank_assess_questions_note }}">
                            @error('tr_bank_assess_questions_note')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                        </div>
<h4>الاجوبة</h4>
@foreach ($answers as $index => $answer)
            <div class="input-group mb-2">
                <input type="hidden" name="answers[{{ $index }}][id]" value="{{ $answer->id }}">
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
