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
</style>

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
font-size: 16px;"> <button onclick="togglePopuo()" class="bbtn">Exam info </button> <a href="#" class="btn btn-danger square-btn-adjust" style="    background-color: #1c9b8b;">Submit</a> </div>
        </nav>
           <!-- /. NAV TOP  -->
           @if(session('user_data') && session('questions') && session('assessment_id'))
    @php
        $userData = session('user_data');
        $Questions = session('questions');
        $Assessment_id = session('assessment_id');



    @endphp
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
        <div class="popup" id="popup-1">
            <div class="overlay"></div>
            <div class="content">
                <div class="close-btn" onclick="togglePopuo()">&times;</div>
                <!-- <div class="containerr"> -->

                      <div class="roww">
                      <h4> Assessment Information  </h4>
                      <h4 style="text-align:right;">عدد الاسئلة التي تم الاجابة عليها  </h4>
                        <div class="input-groupp input-groupp-icon">
                            <div class="input-icon"><i class="fa-solid fa-signature"></i></div>
                          <input type="text" placeholder=" الرمز  " name="tr_role_code" class="@error('tr_role_code') is-invalid @enderror" />
                          @error('tr_role_code')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                        </div>
                        <h4 style="text-align:right;">عدد الاسئلة التي لم تتم الاجابة عليها  </h4>

                        <div class="input-groupp input-groupp-icon">
                            <div class="input-icon"><i class="fa-solid fa-signature"></i></div>
                          <input type="text" placeholder=" الاسم باللغة العربية" name="tr_role_name_ar" class="@error('tr_role_name_ar') is-invalid @enderror"/>
                          @error('tr_role_name_ar')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                        </div>
                        <h4 style="text-align:right;">الوقت المستغرق من الامتحان       </h4>

                        <div class="input-groupp input-groupp-icon">
                          <input type="text" placeholder="الاسم باللغة الانكليزية" name="tr_role_name_en" class="@error('tr_role_name_en') is-invalid @enderror"/>
                          <div class="input-icon"><i class="fa-solid fa-signature"></i></div>
                          @error('tr_role_name_en')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                        </div>
                        <h4 style="text-align:right;">الوقت المتبقي من الامتحان       </h4>

<div class="input-groupp input-groupp-icon">
  <input type="text" placeholder="الاسم باللغة الانكليزية" name="tr_role_name_en" class="@error('tr_role_name_en') is-invalid @enderror"/>
  <div class="input-icon"><i class="fa-solid fa-signature"></i></div>
  @error('tr_role_name_en')
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
//         function showEditPopup() {
//     fetch(`/role/edit/`)
//         .then(response => response.json())
//         .then(data => {
//             console.log('Data received:', data);

//             // Assign the values to the correct fields
//             document.getElementById('tr_role_code').value = data.tr_role_code;
//             document.getElementById('tr_role_name_ar').value = data.tr_role_name_ar; // Arabic name
//             document.getElementById('tr_role_name_en').value = data.tr_role_name_en; // English name
//             document.getElementById('tr_role_desc').value = data.tr_role_desc;
//             // Update the radio button for type status
//             document.querySelector(`input[name="tr_role_status"][value="${data.tr_role_status}"]`).checked = true;

//             // Assign the ID in a hidden field
//             document.querySelector('input[name="id"]').value = id;

//             // Show the popup
//             togglePopuo();
//         })
//         .catch(error => console.error('Error:', error));
// }
        </script>
