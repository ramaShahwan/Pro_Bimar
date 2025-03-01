<meta name="csrf-token" content="{{ csrf_token() }}">

<style>
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
        .bttnr{
            width: 80px;
    padding: 5px;
    border: 2px solid #1c9b8b;


        }
        .bttnr:hover{
            background: #1c9b8b;
            color: white;
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
</style>
@if(session('user_data') && session('questions') && session('assessment_id'))
    @php
        $userData = session('user_data');
        $Questions = session('questions');
        $Assessment_id = session('assessment_id');



    @endphp
<nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="">Bimar</a>
            </div>
  <div style="color: white;
padding: 15px 50px 5px 50px;
float: right;
font-size: 16px;"> <button onclick="showEditPopup({{ $Assessment_id }})" class="bbtn">Exam info </button>
 <!-- <button class="btn btn-danger square-btn-adjust bbtn" style="    background-color: #1c9b8b;"onclick="openExamInfo()">Submit</button> -->
 <form id="examForm" action="/trainee/submit_exam/{{ session('assessment_id') }}" method="POST">
    @csrf <!-- تأكد من إضافة توكن CSRF إذا كنت تستخدم Laravel -->
    <input type="hidden" name="userData" value="{{ json_encode(session('user_data')) }}">
    <input type="hidden" name="questions" value="{{ json_encode(session('questions')) }}">
    <button type="submit">إرسال الامتحان</button>
</form>
 </div>
        </nav>
           <!-- /. NAV TOP  -->

                <nav class="navbar-default navbar-side" role="navigation" style="    height: 100%;">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
				<li class="text-center">
                    <img src="{{URL::asset('img/trainee/'.$userData->Bimar_Trainee->trainee_personal_img)}}" class="user-image img-responsive"/>
					</li>


                    <li>
                        <a class="active-menu"  href="{{url('trainee/trainee_info',$Assessment_id)}}"><i class="fa-solid fa-info"></i>Assessment Information</a>
                    </li>
                    @foreach($Questions as $index => $call)
                     <li>
                        <a  href="{{url('trainee/show',$call->bimar_bank_assess_question_id)}}" id="question-icon-{{ $call->bimar_bank_assess_question_id }}"><i class="fa-regular fa-lightbulb"></i> Question {{ $loop->iteration }}</a>
                    </li>

                    @endforeach

                    <!-- <i class="fa-solid fa-lightbulb"></i> -->


                </ul>

            </div>

        </nav>
        @endif
        <div class="popup" id="popup-1" style="color:black;">
            <div class="overlay"></div>
            <div class="content">
                <div class="close-btn" onclick="togglePopuo()">&times;</div>
                <!-- <div class="containerr"> -->

                      <div class="roww">
                      <h4> Assessment Information  </h4>
                      <h4 style="text-align:right;">عدد الاسئلة التي تم الاجابة عليها  </h4>
                        <div class="input-groupp input-groupp-icon">
                            <div class="input-icon"><i class="fa-solid fa-signature"></i></div>
                          <input type="text" placeholder=" الرمز  " id="answered_questions" name="answered_questions"value="{{ $call->answered_questions }}" class="@error('answered_questions') is-invalid @enderror" />
                          @error('answered_questions')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                        </div>
                        <h4 style="text-align:right;">عدد الاسئلة التي لم تتم الاجابة عليها  </h4>

                        <div class="input-groupp input-groupp-icon">
                            <div class="input-icon"><i class="fa-solid fa-signature"></i></div>
                          <input type="text" placeholder=" الاسم باللغة العربية" id="not_answered_questions" value="{{ $call->not_answered_questions }}" name="not_answered_questions" class="@error('not_answered_questions') is-invalid @enderror"/>
                          @error('not_answered_questions')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                        </div>
                        <h4 style="text-align:right;">الوقت المستغرق من الامتحان       </h4>

                        <div class="input-groupp input-groupp-icon">
                          <input type="text" placeholder="الاسم باللغة الانكليزية" id="Time_taken" value="{{ $call->Time_taken }}"  name="Time_taken" class="@error('Time_taken') is-invalid @enderror" style="direction: rtl;text-align: right;"/>
                          <div class="input-icon"><i class="fa-solid fa-signature"></i></div>
                          @error('Time_taken')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                        </div>
                        <h4 style="text-align:right;">الوقت المتبقي من الامتحان       </h4>

<div class="input-groupp input-groupp-icon">
  <input type="text" placeholder="الاسم باللغة الانكليزية" name="Time_remaining" id="Time_remaining" value="{{ $call->Time_remaining }}" class="@error('Time_remaining') is-invalid @enderror" style="direction: rtl;text-align: right;"/>
  <div class="input-icon"><i class="fa-solid fa-signature"></i></div>
  @error('Time_remaining')
  <span class="invalid-feedback" role="alert">
      <strong>{{ $message }}</strong>
  </span>
@enderror
</div>


                      </div>

                      <div class="roww">
                       <!-- <input type="submit" value="حفظ" class="bttn"onclick="togglePopuo()"> -->
                       <!-- <button class="bttn"onclick="togglePopuo()">Close</button> -->
                       <div class="bttnr" onclick="togglePopuo()">Close</div>
                      </div>
                    </form>
                  <!-- </div> -->

            </div>
        </div>
        <script>
             function togglePopuo(){
            document.getElementById("popup-1").classList.toggle("active");
        }
        function showEditPopup(id) {
    fetch(`/trainee/exam_info/${id}`)
        .then(response => response.json())
        .then(data => {
            console.log('Data received:', data);

            // تحديث الحقول بالقيم المسترجعة
            document.getElementById('answered_questions').value = `${data.answered_questions} / ${data.total_questions}`;
            document.getElementById('not_answered_questions').value =`${data.not_answered_questions} / ${data.total_questions}` ;
            document.getElementById('Time_remaining').value = formatTime(data.Time_remaining);
            document.getElementById('Time_taken').value = formatTime(data.Time_taken);

            // عرض المودال
            togglePopup();
        })
        .catch(error => console.error('Error:', error));
}

// دالة لعرض المودال
function togglePopup() {
    document.getElementById("popup-1").classList.toggle("active");
}

// تحويل الوقت إلى صيغة مناسبة
// function formatTime(seconds) {
//     let minutes = Math.floor(seconds / 60);
//     let remainingSeconds = seconds % 60;
//     return `${minutes} دقيقة و ${remainingSeconds} ثانية`;
// }
function formatTime(seconds) {
    let hours = Math.floor(seconds / 3600); // حساب الساعات
    let minutes = Math.floor((seconds % 3600) / 60); // حساب الدقائق المتبقية بعد الساعات
    let remainingSeconds = seconds % 60; // حساب الثواني المتبقية بعد الدقائق

    // إذا كان هناك ساعات، قم بإضافتها إلى النص
    let timeString = '';
    if (hours > 0) {
        timeString += `${hours} ساعة و `;
    }
    timeString += `${minutes} دقيقة و ${remainingSeconds} ثانية`;

    return timeString;
}


        </script>
        <!-- <script>
          function openExamInfo() {
    let userData = "{{ json_encode(session('user_data')) }}";
    let questions = "{{ json_encode(session('questions')) }}";
    let assessmentId = "{{ session('assessment_id') }}";

    // بناء الرابط بدون إضافة البيانات في URL
    let url = `/trainee/submit_exam/${assessmentId}`;

    // إرسال الطلب لجلب البيانات
    fetch(url, {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            'Content-Type': 'application/json'  // تأكد من إرسال المحتوى كـ JSON
        },
        body: JSON.stringify({
            userData: userData,
            questions: questions
        })
    })
    .then(response => {
        if (!response.ok) {
            throw new Error('فشل في الاتصال بالخادم');
        }
        return response.json();  // تحويل الاستجابة إلى JSON
    })
    .then(data => {
        console.log("بيانات الامتحان:", data);
        document.getElementById('examContainer').innerHTML = JSON.stringify(data);
    })
    .catch(error => console.error("حدث خطأ أثناء جلب البيانات:", error));
}

        </script> -->
        <script>
    function openExamInfo() {
        // يمكنك هنا تنفيذ أي منطق آخر قبل إرسال النموذج إذا لزم الأمر
        document.getElementById('examForm').submit(); // إرسال النموذج
    }
</script>
