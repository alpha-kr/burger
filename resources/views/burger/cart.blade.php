@extends('burger.layout')
@section('body')

<body class="best_burgers_area  " style="padding-top: 0px;">
    @include('burger.navbar')
    <div class="container" style="margin-top: 170px;">
        <div class="shopping-cart">
            <div class="row">
                <div class="col-md-9">

                    <div class="card" style="border: none;">
                        <div class="best_burgers_area" style="padding-top: 0;">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-md-9">
                                        <div class="section_title text-center">
                                            <span>Detalle</span>
                                            <h3>Compra</h3>

                                        </div>
                                    </div>
                                    @Auth
                                    @include('burger.adress')
                                    @endAuth
                                </div>


                            </div>
                            <div class="card-body">
                                @foreach($cart as $item)

                                <div class="single_delicious d-flex align-items-center">
                                    <div class="thumb">

                                        <img style="width: 166px;height: 166px;" src="{{$item->options['img']}}" alt="">
                                    </div>
                                    <div class="info">
                                        <h3>{{$item->name}} </h3>
                                        <p> </p>


                                    </div>
                                    <div class="info mt-5"><span>${{$item->price}} </span></div>
                                    <div class="qty mt-5">
                                        <form action="{{route('cart.plus')}}" method="post">
                                            @csrf

                                            <input type="hidden" name="rowId" value="{{$item->rowId}}">
                                            <input type="hidden" name="action">
                                            <input type="hidden" value="{{$item->id}}" name="action">
                                            <button id="susbtn" class="minus black-bg" style="text-align: center; border: none;">-</button>
                                            <input readonly name="cantidad" type="number" class="count" id=" " value="{{$item->qty}}">
                                            <button type="submit" style="text-align: center; border: none;" id="plusbtn" class="plus black-bg">+</button>
                                        </form>
                                    </div>
                                    <div class="mt-5">
                                        <form action="{{route('cart.remove')}}" method="post">
                                            @csrf
                                            <input type="hidden" name="rowId" value="{{$item->rowId}}">

                                            <input type="hidden" value="{{$item->id}}" name="action">
                                            <button type="submit" class="genric-btn danger circle">eliminar</button>
                                        </form>
                                    </div>

                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>

                </div>

                <div class="col-md-3">

                    <div class="card" style="border: none;">
                        <div class="best_burgers_area" style="padding-top: 0;">
                            <div class="card-header">
                                total
                            </div>
                            <div class="card-body">
                                <div class="totals">
                                    <div class="totals-item" style="border-bottom: solid 0.5px #f7f7f7;">
                                        <label style="text-align: start;">Subtotal</label>
                                        <div class="totals-value" id="cart-subtotal">{{$subtotal}}</div>
                                    </div>

                                    <div class="totals-item" style="border-bottom: solid 0.5px #f7f7f7;">
                                        <label style="text-align: start;">
                                            iva
                                        </label>
                                        <div class="totals-value" id="cart-tax">{{$tax}}</div>
                                    </div>

                                    <div class="totals-item" style="border-bottom: solid 0.5px #f7f7f7;">
                                        <label style="text-align: start;">
                                            envio</label>
                                        <div class="totals-value" id="cart-shipping">0.00</div>
                                    </div>
                                    <div class="totals-item totals-item-total" style="border-bottom: solid 0.5px #f7f7f7;">
                                        <label style="text-align: start;">
                                            Total</label>
                                        <div class="totals-value" id="cart-total">{{$total}}</div>
                                        <input type="hidden" value="{{$total}}" id="totalinput">
                                    </div>

                                </div>
                                @auth
                                <form  id="compra" action="{{route('cart.end')}}" method="post">
                                    @csrf
                                    @auth
                                    <select name="address" style="margin: 10px;" class="form-control" id="exampleFormControlSelect1">
                                        @foreach($address as $dir)
                                        <option value="{{$dir->id}}">{{$dir->barrio.','.$dir->direccion  }}</option>
                                        @endforeach
                                    </select>
                                    @endauth
                                    <button type="submit" class="genric-btn primary e-large">Comprar</button>
                                </form>

                                @endauth
                                @guest
                                <a href="{{route('login')}}" class="genric-btn primary e-large">Login</a>
                                @endguest
                            </div>
                        </div>

                    </div>
                </div>


            </div>
        </div>


    </div>
    @include('burger.footer')

    <script>
        $("#susbtn,#plusbtn").hover((e) => {
            console.log(e.target.textContent)
            $("input[name='action']").val(e.target.textContent)
        })
        $('form#compra').on('submit', function(e) {
     if ($('select').val()==null) {
        e.preventDefault();
        alert("Agregue direccion")
     }
     if (Number($('#totalinput').val())==0) {
        e.preventDefault();
        alert("Agregue Productos")
     }

});



    </script>
    @if (Session::has('exito'))
    <script defer >


        Toast.fire({
            icon: 'success',
            title: 'Su pedido llegara pronto'
        })
    </script>
    @endif
    @if (Session::has('exito2'))
    <script defer>

        Toast.fire({
            icon: 'success',
            title: 'direccion agregada'
        })
    </script>
    @endif
</body>
