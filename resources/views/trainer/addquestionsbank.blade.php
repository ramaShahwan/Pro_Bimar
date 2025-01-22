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

                            <input type="text"  id="question_name" name="tr_bank_assess_questions_name" placeholder="عنوان السؤال   ">
                            @error('tr_bank_assess_questions_name')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                        </div>
                        <!-- <label for="editor" class="form-label">نص السؤال</label> -->

                        <div class="input-groupp input-groupp-icon">
                <textarea name="tr_bank_assess_questions_body" id="editor" rows="5" required></textarea>
                                      <div class="input-icon"><i class="fa-solid fa-tag"></i></div>
                          @error('tr_bank_assess_questions_body')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                        </div>

                        <div class="input-groupp input-groupp-icon">
                        <input type="number"  id="grade" name="tr_bank_assess_questions_grade" placeholder="علامة السؤال   ">
                        <div class="input-icon"><i class="fa-solid fa-audio-description"></i></div>
                            @error('tr_bank_assess_questions_grade')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                          </div>
                          <div class="input-groupp input-groupp-icon">
                            <div class="input-icon"><i class="fa-solid fa-arrow-up-9-1"></i></div>

                            <input type="text"  id="question_name" name="tr_bank_assess_questions_note" placeholder="ملاحظات حول السؤال    ">
                            @error('tr_bank_assess_questions_note')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                        </div>

                        <div class="input-groupp input-groupp-icon">

                        <div id="answersSection" class="mb-3 d-none">
                <!-- <label class="form-label">عدد الإجابات</label> -->
                <input type="number" id="answerCount" class="form-control mb-3" min="1" placeholder="أدخل عدد الإجابات" required>
                <button type="button" id="generateAnswers" class="btn btn-primary" style="margin-top: 20px;">توليد الإجابات</button>
                <div id="answersContainer" class="mt-3"></div>
            </div>
                        </div>
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
        $('#type_id').on('change', function () {
            const type = $(this).val();
            const answersSection = $('#answersSection');

            $('#answersContainer').empty(); // تفريغ الإجابات السابقة
            $('#answerCount').val(''); // تفريغ عدد الإجابات
            answersSection.addClass('d-none'); // إخفاء القسم افتراضيًا

            if (type === 'true_false' || type === 'multiple_choice' || type === 'multiple_response') {
                answersSection.removeClass('d-none');
            }
        });

        // توليد الإجابات بناءً على العدد المدخل
        $('#generateAnswers').on('click', function () {
    const typeCode = $('#type_id').val(); // الحصول على كود النوع
    const count = parseInt($('#answerCount').val());
    const answersContainer = $('#answersContainer');

    answersContainer.empty(); // تفريغ الإجابات السابقة

    // التأكد من إدخال عدد صحيح للإجابات
    if (isNaN(count) || count <= 0) {
        alert('يرجى إدخال عدد صحيح للإجابات.');
        return;
    }

    // توليد الإجابات بناءً على النوع
    if (typeCode === 'TF') {
        // True/False: توليد إجابتين
        answersContainer.append(`
            <div class="input-group mb-2">
                <div class="input-group-text">
                    <input type="radio" name="correct_answer" value="true" class="form-check-input mt-0">
                </div>
                <input type="text" class="form-control" value="True" disabled>
            </div>
            <div class="input-group mb-2">
                <div class="input-group-text">
                    <input type="radio" name="correct_answer" value="false" class="form-check-input mt-0">
                </div>
                <input type="text" class="form-control" value="False" disabled>
            </div>
        `);
    } else if (typeCode === 'MC') {
        // Multiple Choice: توليد إجابات من النوع radio
        for (let i = 0; i < count; i++) {
            answersContainer.append(`
                <div class="input-group mb-2" style="display: flex;flex-direction: row-reverse">
                    <div class="input-group-text">
                        <input type="radio" name="correct_answer" value="${i}" class="form-check-input mt-0" style="display:block;">
                    </div>
                    <input type="text" class="form-control" name="answers[${i}][body]" placeholder="نص الإجابة" required style="padding-right: 10px;">
                </div>
            `);
        }
    } else if (typeCode === 'MR') {
        // Multiple Responses: توليد إجابات من النوع checkbox
        for (let i = 0; i < count; i++) {
            answersContainer.append(`
                <div class="input-group mb-2" style="display: flex;flex-direction: row-reverse">
                    <div class="input-group-text">
                        <input type="checkbox" name="correct_answer[]" value="${i}" class="form-check-input mt-0" style="display:block;">
                    </div>
                    <input type="text" class="form-control" name="answers[${i}][body]" placeholder="نص الإجابة" required style="padding-right: 10px;">
                </div>
            `);
        }

        // منع اختيار جميع الإجابات
        $('input[type="checkbox"]').on('change', function () {
            if ($('input[type="checkbox"]:checked').length > count - 1) {
                $(this).prop('checked', false);
                alert(`يمكنك اختيار ${count - 1} إجابات فقط.`);
            }
        });
    } else if (typeCode === 'ES') {
        // Essay: لا توجد إجابات
        answersContainer.append('<p class="text-muted">لا توجد إجابات مطلوبة لهذا النوع من الأسئلة.</p>');
    } else {
        alert('يرجى اختيار نوع سؤال صحيح.');
    }
});

    </script>

@endsection
