@extends('burger.layout')
@section('body')

<body class="best_burgers_area" style="padding-top: 0px;" >


      <div class="container ">

         <div class="centrar mx-auto">
            <form method="POST" action="{{ route('login') }}" accept-charset="UTF-8" id="registroForm"><input name="_token" type="hidden" value="2qOm1TcZCOWZPVeR8HCsa0M7aetSwViIYHAjLUJJ">
            @csrf
            <div class="row">
               <div class="section_title col-md-12 text-center ">

                  <span>Burger</span>
                  <div class="logo-img">
                    <a href="{{route('inicio')}}">
                          <img style="border-radius: 50%;" src="img/logo.png" alt="">
                    </a>
                 </div>
                  <h3>login</h3>
              </div>

            </div>

            <div class="form-group row">
                <div class="col-md-12 ">
                    <input type="email"   placeholder="correo" onfocus="this.placeholder = ''" onblur="this.placeholder = 'First Name'" required="" class="single-input @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>


            </div>
            <br>
            <div class="form-group row">
                <div class="col-md-12">
                    <input type="password" name="password" placeholder="Contraseña" onfocus="this.placeholder = ''" onblur="this.placeholder = 'First Name'" required="" class="single-input  @error('password') is-invalid @enderror"  required autocomplete="current-password">
                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                </div>
            </div>
            <br>
            <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row offset-md-3">
                            <div class="col-md-12 ">
                                <button type="submit" class="genric-btn primary circle arrow"><span class="lnr lnr-arrow-right"></span>
                                    {{ __('Login') }}
                                </button>
                                    <br>

                            </div>

                        </div>
                        <div class="mx-auto">
                        <a class="btn btn-link" href="{{ route('register') }}">
                                        ¿No  te has registrado?
                                    </a>
                            @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                        </div>


            </form>
        </div>

      </div>

   <script src="js/vendor/modernizr-3.5.0.min.js"></script>
   <script src="js/vendor/jquery-1.12.4.min.js"></script>
   <script src="js/popper.min.js"></script>
   <script src="js/bootstrap.min.js"></script>
   <script src="js/owl.carousel.min.js"></script>
   <script src="js/isotope.pkgd.min.js"></script>
   <script src="js/ajax-form.js"></script>
   <script src="js/waypoints.min.js"></script>
   <script src="js/jquery.counterup.min.js"></script>
   <script src="js/imagesloaded.pkgd.min.js"></script>
   <script src="js/scrollIt.js"></script>
   <script src="js/jquery.scrollUp.min.js"></script>
   <script src="js/wow.min.js"></script>
   <script src="js/nice-select.min.js"></script>
   <script src="js/jquery.slicknav.min.js"></script>
   <script src="js/jquery.magnific-popup.min.js"></script>
   <script src="js/plugins.js"></script>

   <!--contact js-->
   <script src="js/contact.js"></script>
   <script src="js/jquery.ajaxchimp.min.js"></script>
   <script src="js/jquery.form.js"></script>
   <script src="js/jquery.validate.min.js"></script>
   <script src="js/mail-script.js"></script>

   <script src="js/main.js"></script>

</body>

@endsection
