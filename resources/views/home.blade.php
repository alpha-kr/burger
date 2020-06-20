@extends('burger.layout')
@section('body')

<body class="best_burgers_area" style="padding-top: 0px;">
    @include('burger.navbar');
    <div class="container">

        <div class="row">
            <div class="col-md-3">
                <div class="row">
                    <div style="margin-top: 200px; cursor: pointer; " class="col-lg-12  ">
                        <div class="section_title text-center mb-40">
                            <span>categorias Menu</span>

                        </div>
                        <!-- Button trigger modal -->


                        <!-- Modal -->


                        <ul class="single_delicious d-flex flex-column align-items-center">
                            <li class="info categoryItem<?= isset($id) ? '' : 'On' ?>">
                                <a href="{{route('home')}}">
                                    <h3>Todas</h3>
                                </a>


                            </li>

                            @foreach ($categorias as $categoria)


                            <li class="info categoryItem<?= (isset($id) && strval($categoria->id) == $id) ? 'On' : '' ?>">
                                <a href="{{route('home.detalle',['id'=>$categoria->id])}}">
                                    <h3>{{$categoria->nombre}}</h3>
                                </a>


                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <div class="best_burgers_area col-md-9">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="section_title text-center mb-80">
                                <span>Burger Menu</span>
                                <h3>Best Ever Burgers</h3>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <?php $i = 1; ?>
                        @foreach($products as $producto)
                        <div class="col-lg-6 col-md-6">
                            <div class="single_delicious d-flex align-items-center">
                                <div class="thumb">
                                    <img style="width: 166px;height: 166px;" src="{{asset($producto->img)}}" alt="">
                                </div>
                                <div class="info">
                                    <h3>{{$producto->nombre}}</h3>
                                    <p>{{$producto->des}}.</p>
                                    <span>${{$producto->precio}}</span>
                                    <button data-toggle="modal" data-target="#exampleModal<?= $i ?>" class="genric-btn primary circle arrow"><i class="fa fa-cart-plus" aria-hidden="true"></i>Agregar<span class="lnr lnr-arrow-right"></span></a>
                                </div>

                            </div>
                        </div>
                        <div class="modal fade" id="exampleModal<?= $i ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog   best_burgers_area" style=" padding-top: 0px;" role="document">
                                <div class="modal-content">
                                    <div class="modal-header p-0">
                                        <img style=" width: 100%;height: 250px;" src="{{asset($producto->img)}}" alt="">
                                        <div style="position: absolute; margin-top: 30px; ">

                                        </div>
                                        <div style="position: absolute; right: 0;">
                                            <button style="right: 0;" type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>

                                    </div>
                                    <form action="{{route('home')}}" method="post">
                                        @csrf
                                        <div class="modal-body">
                                            <h3 style="color: #F2C64D; font-size: 30px; font-weight: 400; margin-bottom: 18px; display: block; font-family: 'Pacifico', 'cursive';">{{$producto->nombre}}</h3>

                                            {{$producto->des}}
                                            <div class="qty mt-5">
                                                <span id="susbtn<?= $i ?>" class="minus bg-dark">-</span>
                                                <input readonly name="cantidad" type="number" class="count" id="<?= $i ?>" value="1">
                                                <span id="plusbtn<?= $i ?>" class="plus bg-dark">+</span>
                                            </div>

                                        </div>

                                        <div class="modal-footer ">
                                            <input type="hidden" name="nombre" value="{{$producto->nombre}}">
                                            <input type="hidden" name="img" value="{{$producto->img}}">
                                            <input type="hidden" name="id" value="{{$producto->id}}">
                                            <input type="hidden" name="valor" id="valuefor<?= $i ?>" value="{{$producto->precio}}">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Seguir comprando</button>
                                            <button data-toggle="modal" data-target="#exampleModalCenter<?= $i ?>" class="genric-btn primary-border radius"><i style="font-size: 20px;" class="fa fa-cart-plus" aria-hidden="true" id="btn<?= $i ?>"> ${{$producto->precio}}</i><span class="lnr lnr-arrow-right"></span>
                                                Agregar al Carrito
                                            </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php $i++; ?>
                    @endforeach


                </div>
            </div>
        </div>
        <!-- best_burgers_area_end  -->

        <!-- features_room_startt -->

    </div>

    </div>
    @include('burger.footer')


    <script>

        $(document).ready(function() {

            $(document).on('click', 'span.plus', function(e) {

                let id = e.target.id.match(/\d+/);
                console.log(id);
                $('#' + Number(id)).val(parseInt($('#' + Number(id)).val()) + 1);

                let valor = Number($("#valuefor" + id).val().match(/\d+/)) * parseInt($('#' + Number(id)).val());
                console.log(valor)
                document.getElementById('btn' + id).textContent = '$' + valor;

            });
            $(document).on('click', 'span.minus', function(e) {
                let id = e.target.id.match(/\d+/);
                console.log(id);
                $('#' + Number(id)).val(parseInt($('#' + Number(id)).val()) - 1);


                if ($('#' + Number(id)).val() == 0) {
                    $('#' + Number(id)).val(1);
                }
                let valor = Number($("#valuefor" + id).val().match(/\d+/)) * parseInt($('#' + Number(id)).val());
                console.log(valor)
                document.getElementById('btn' + id).textContent = '$' + valor;
            });
        });
    </script>
 @if (Session::has('exito'))
 <script>

Toast.fire({
  icon: 'success',
  title: 'El producto fue agregado al carrito'
})
</script>
@endif
</body>


@endsection
