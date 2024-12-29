@extends('layout_admin.app')
@section('content')
<div class="containerd">

        <div class="login-boxx">

            <div class="login-contentt">
                <h2>Login to your account</h2>
                <form action="{{route('user_login_post')}}" method="post" enctype="multipart/form-data">
                @csrf
                    <div class="input-groupd">
                        <label for="tr_user_name"> user name</label>
                        <input type="text" id="tr_user_name" placeholder="user name" name="tr_user_name" class="@error('tr_user_name') is-invalid @enderror">
                        @error('tr_user_name')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                    </div>
                    <div class="input-groupd">
                        <label for="password">Password</label>
                        <input type="password" id="tr_user_pass" placeholder="password" name="tr_user_pass" class="@error('tr_user_pass') is-invalid @enderror">
                        @error('tr_user_pass')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                    </div>
                    <button type="submit" class="btn">Login </button>
                    @if(session()->has('message'))
        <div class="alert alert-info" role="alert" style="font-size: 20px;
    padding: 5px;
    margin-top: 5px;
    color: #1a1313;
    text-align: center;
    background: #e57e7e;">
          {{session()->get('message')}}
        </div>
@endif
                </form>
                <!-- <p class="sign-up-text">Don’t have an account? <a href="{{route('trainee_register_get')}}">Sign Up!</a></p> -->
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
