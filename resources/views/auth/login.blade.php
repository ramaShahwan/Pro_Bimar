@extends('layout_admin.app')
@section('content')
@if(session()->has('message'))
        <div class="alert alert-info" role="alert" style="text-align:end;font-size: 20px; background: #ffffff;
    padding: 10px;
    width: 550px;
        margin-left: 70px;
    box-shadow: inset -1px 1px 13px 0px rgb(97 184 174);
    border-radius: 10px;">
          {{session()->get('message')}}
        </div>
@endif
<div class="containerd">

        <div class="login-boxx">
            <div class="login-contentt" style="border: 1px solid #61b8ad;
    padding: 30px;
    border-radius: 20px;
    width: 370px;    box-shadow: 1px 1px 2px 0px #61b8ae;">
                <h2>Login to your account</h2>
                <form action="{{route('trainee.login.post')}}" method="post" enctype="multipart/form-data">
                @csrf
                    <div class="input-groupd">
                        <label for="phone_number">phone number</label>
                        <input type="text" id="phone_number" placeholder="phone number" name="trainee_mobile" class="@error('trainee_mobile') is-invalid @enderror">
                        @error('trainee_mobile')
                          <span class="invalid-feedback" role="alert">
                              <strongn style="color:red;">{{ $message }}</strong>
                          </span>
                      @enderror
                    </div>
                    <div class="input-groupd">
                        <label for="password">Password</label>
                        <input type="password" id="password" placeholder="Password" name="trainee_pass" class="@error('trainee_pass') is-invalid @enderror">
                        @error('trainee_pass')
                          <span class="invalid-feedback" role="alert">
                              <strong style="color:red;">{{ $message }}</strong>
                          </span>
                      @enderror
                    </div>
                    <button type="submit" class="btn">Login </button>
                </form>
                <p class="sign-up-text">Don’t have an account? <a href="{{route('trainee_register_get')}}">Sign Up!</a></p>
                <!-- <div class="faq-section">
                    <p><span class="faq-icon">?</span> Can you change your plan?</p>
                    <p class="small-text">Whenever you want. Fluid will also change with you according to your needs.</p>
                    <a href="#" class="contact-link">Contact Us</a>
                </div> -->
            </div>
        </div>
        <div class="video-box">
            <!-- <video autoplay muted loop>
                <source src="{{asset('assets/img/04.mp4')}}" type="video/mp4">
                Your browser does not support the video tag.
            </video> -->
            <img src="{{asset('assetss/re.png')}}" alt="Fables Template">

        </div>
    </div>

@endsection
