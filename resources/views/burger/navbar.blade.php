<header>
        <div class="header-area " style="background: black;">
            <div id="sticky-header" class="main-header-area">
                <div class="container-fluid p-0">
                    <div class="row align-items-center no-gutters">
                        <div class="col-xl-5 col-lg-5">
                            <div class="main-menu  d-none d-lg-block">
                                <nav>
                                    <ul id="navigation">

                                        <li> </li>

                                    </ul>
                                </nav>
                            </div>
                        </div>
                        <div class="col-xl-2 col-lg-2">
                            <div class="logo-img">
                                <a href="{{route('home')}}">
                                    <img src="{{asset('img/logo.png')}}" alt="">
                                </a>
                            </div>
                        </div>
                        <div class="col-xl-5 col-lg-5 d-none d-lg-block">
                            <div class="book_room">


                                <div class="book_btn d-none d-xl-block">
                                    @auth
                                    <a  href="{{route('user')}}"> Hola,{{auth()->user()->name}}</a>
                                    @endauth
                                    @guest
                                    <a  href="{{route('login')}}">Iniciar sesion</a>
                                    @endguest
                                </div>
                                <div class="book_btn d-none d-xl-block">

                                    <a class="" href="{{route('cart')}}"><i class="fa fa-shopping-cart" aria-hidden="true"><label class="countador" for="">{{$item}}</label> </i></a>
                                </div>
                                @if(auth::check())
                                <div class="book_btn d-none d-xl-block">
                                    <a class="#" href="{{route('logout')}}"><i class="fa fa-sign-out" aria-hidden="true"></i></a>
                                </div>
                                @endif
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mobile_menu d-block d-lg-none"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</header>
