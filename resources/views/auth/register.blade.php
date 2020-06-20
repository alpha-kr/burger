@extends('burger.layout')
@section('title','Registro')
@section('body')

<body class="best_burgers_area" style="padding-top: 0px;" >


      <div class="container ">
    <div class="centrar mx-auto">

    <div class="row">
               <div class="section_title col-md-12 text-center ">

                  <span>Burger</span>
                  <div class="logo-img">
                    <a href="{{route('inicio')}}">
                          <img style="border-radius: 50%;" src="img/logo.png" alt="">
                    </a>
                 </div>
                  <h3>{{ __('Register') }}</h3>
              </div>

    </div>



                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">


                            <div class="col-md-6">
                                <input id="name" type="text" placeholder="{{ __('Name') }}" class="form-control single-input @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <input id="email" type="email"  placeholder="{{ __('E-Mail Address') }}" class="form-control single-input @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">



                        </div>

                        <div class="form-group row">

                            <div class="col-md-12">
                                <input id="password" type="password" placeholder="{{ __('Password') }}" class="form-control single-input @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">

                            <div class="col-md-12">
                                <input id="password-confirm" type="password" placeholder="{{ __('Confirm Password') }}" class="form-control single-input" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="genric-btn primary circle arrow">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                        <div class="mx-auto">
                        <small style="font-size: 11px;"><br><a style=" text-align: center; display: block;" href="http://pollo.net.co/login">¿Ya tienes una cuenta?</a></small>

                        </div>

                    </form>
</div>




@endsection
