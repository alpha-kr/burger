@extends('burger.layout')
@section('body')
<body>

    <header>
        <div class="header-area ">
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
                                <a href="index.html">
                                    <img src="img/logo.png" alt="">
                                </a>
                            </div>
                        </div>
                        <div class="col-xl-5 col-lg-5 d-none d-lg-block">
                        <div class="book_room">


<div class="book_btn d-none d-xl-block">
    @auth
    <a  href="{{route('user')}}">Hola,{{auth()->user()->name}}</a>
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

    <div class="slider_area">
        <div class="slider_active owl-carousel">
            <div class="single_slider  d-flex align-items-center slider_bg_1 overlay">
                <div class="container">
                    <div class="row align-items-center justify-content-center">
                        <div class="col-xl-9 col-md-9 col-md-12">
                            <div class="slider_text text-center">
                                <div class="deal_text">
                                    <span>Prueba</span>
                                </div>
                                <h3>Burger <br>
                                    Restaurante</h3>
                                <h4>Delevop App</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="single_slider  d-flex align-items-center slider_bg_2 overlay">
                <div class="container">
                    <div class="row align-items-center justify-content-center">
                        <div class="col-xl-9 col-md-9 col-md-12">
                            <div class="slider_text text-center">
                                <div class="deal_text">
                                    <span>Prueba</span>
                                </div>
                                <h3>Burger <br>
                                    Restaurante</h3>
                                <h4>Delevop App</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="best_burgers_area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section_title text-center mb-80">
                        <span>Burger Menu</span>
                        <h3>Categorias</h3>
                    </div>
                </div>
            </div>
            <?php $i=1?>
            @foreach($categorias as $categoria)
            <?php echo ($i%2!=0)? '
            <div class="row">
            <div class="Burger_President_area">
            <div class="Burger_President_here">':""?>


                        <div class="single_Burger_President">
                            <div class="room_thumb">
                                <img src="{{$categoria->img}}" style="height: 400px;" alt="">
                                <div class="room_heading d-flex justify-content-between align-items-center">
                                    <div class="room_heading_inner">
                                    <span> desde $20</span>
                                        <h3>{{$categoria->nombre}}</h3>
                                        <p>Great way to make your business appear trust <br> and relevant.</p>
                                        <a href="{{route('home.detalle',['id'=>$categoria->id])}}" class="boxed-btn3">Ver <i class="fa fa-cutlery" aria-hidden="true"></i> </a>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <?php echo ($i%2==0)? ' </div></div></div>':"" ;
                        $i++?>






            @endforeach

        </div>
    </div>
   @include('burger.footer')
</body>
@endsection
