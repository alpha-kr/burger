@extends('burger.layout')
@section('body')

<body class="best_burgers_area  " style="padding-top: 0px;">
    @include('burger.navbar')
    <div class="container" style="margin-top: 170px;">
        <div class="shopping-cart">
            <div class="row">

                <div class="col-md-3">

                    <div class="card" style="border: none;">
                        <div class="best_burgers_area" style="padding-top: 0;">
                            <div class="card-header">
                                Mi Informacion
                            </div>
                            <div class="card-body">
                                <div class="totals">
                                    <div class="totals-item" style="border-bottom: solid 0.5px #f7f7f7;">
                                        <label id="opt1" style="    text-align: start;
    padding: 10px;
    width: 100%;"><i class="fa fa-cutlery" aria-hidden="true"></i> Mis Pedidos</label>

                                    </div>

                                    <div class="totals-item" style="border-bottom: solid 0.5px #f7f7f7;">

                                        <label id="opt2" style="    text-align: start;
    padding: 10px;
    width: 100%;">
                                            <i class="fa fa-user" aria-hidden="true"></i>
                                            Datos personales
                                        </label>

                                    </div>

                                    <div class="totals-item" style="border-bottom: solid 0.5px #f7f7f7;">

                                        <label id="opt3" style="    text-align: start;
    padding: 10px;
    width: 100%;"><i class="fa fa-home" aria-hidden="true"></i>
                                            Mi Direcciones</label>

                                    </div>

                                </div>

                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-md-9">

                    <div class="card" style="border: none;">
                        <div class="best_burgers_area" style="padding-top: 0;">
                            <div class="card-header">
                                <div class="section_title text-center">
                                    <span>Panel </span>
                                    <h3>Operaciones</h3>
                                </div>
                            </div>
                            <div class="card-body">
                                <div style="display: none;" id="panel1">

                                    <table class="table">

                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Destino</th>
                                                <th scope="col">Fecha</th>
                                                <th scope="col">sub total</th>
                                                <th scope="col">total</th>
                                                <th scope="col">opcion</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($pedidos as $pedido)
                                            <tr>
                                                <th scope="row">1</th>


                                                <td> {{ $pedido->address->barrio.",".$pedido->address->direccion}}</td>
                                                <td>{{$pedido->fecha}}</td>
                                                <td>${{$pedido->subtotal}}</td>
                                                <td>${{$pedido->total}}</td>
                                                <td> <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal{{$pedido->id}}">
                                                        ver
                                                    </button>
                                                </td>
                                            </tr>
                                            <div class="modal fade" id="exampleModal{{$pedido->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Pedido dia :{{$pedido->fecha}}</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <ul>
                                                                @foreach($pedido->products as $pro)
                                                                <li>Producto: {{$pro->nombre}}</li>
                                                                <li>precio: ${{$pro->precio}}</li>
                                                                <li>cantidad: {{$pro->pivot->cantidad}}</li>
                                                                @endforeach
                                                            </ul>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                                            @endforeach

                                        </tbody>
                                    </table>

                                </div>
                                <div style="display: none;" id="panel2">

                                    <form method="post" action="{{route('user.update')}}">
                                        @csrf
                                        <div class="form-row">
                                            <div class="form-group col-md-6  @error('name') is-invalid @enderror">
                                                <label for="inputEmail4">Nombre</label>
                                                <input type="text" class="form-control" value="{{Auth::user()->name}}" id="inputEmail4" name="name" placeholder="Email">
                                                @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-6  @error('email') is-invalid @enderror">
                                                <label for="inputPassword4">Correo</label>
                                                <input type="email" class="form-control" value="{{Auth::user()->email}}" id="inputPassword4" name="email" placeholder="Password">
                                                @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group  @error('password') is-invalid @enderror">
                                            <label for="inputAddress">Contraseña</label>
                                            <input type="password" class="form-control" id="inputAddress" require name="password" placeholder="contraseña">
                                            @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>



                                        <button type="submit" class="btn btn-primary">Actualizar</button>
                                    </form>
                                </div>
                                <div style="display: none;" id="panel3">

                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">direccion</th>
                                                <th scope="col">barrio</th>
                                                <th scope="col">telefono</th>
                                                <th scope="col">ciudad</th>
                                                <th scope="col">accion</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($address as $add)
                                            <tr>
                                                <th scope="row">1</th>
                                                <td>{{$add->direccion}}</td>
                                                <td>{{$add->barrio}}</td>
                                                <td>{{$add->telefono}}</td>
                                                <td>{{$add->ciudad}}</td>
                                                <td> <a  href="{{route('removeAddres',['id'=>$add->id])}}" class=" btn btn-danger">Borrar</button></a>

                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
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
    </script>

    <script>
        function show(id) {
            switch (id) {
                case 1:
                    $('#panel1').css('display', 'block');
                    $('#panel2').css('display', 'none');
                    $('#panel3').css('display', 'none');
                    break;
                case 2:
                    $('#panel2').css('display', 'block');
                    $('#panel1').css('display', 'none');
                    $('#panel3').css('display', 'none');

                    break

                default:
                    $('#panel3').css('display', 'block');
                    $('#panel1').css('display', 'none');
                    $('#panel2').css('display', 'none');
                    break;
            }

        }
        $(document).on('click', '.totals-item', function(e) {
            console.log(e.target);
            let id = Number(e.target.id.match(/\d+/));
            show(id);
        })
    </script>
    @if (Session::has('exito'))
    <script>
        Toast.fire({
            icon: 'success',
            title: 'usuario actualizado'
        })
    </script>
    @endif
    @if ($errors->has('email') ||$errors->has('password') ||$errors->has('name') )
    <script>
        Toast.fire({
            icon: 'danger',
            title: 'Error al actualizar'
        })
        $('invalid-feedback').css('display', 'block');
    </script>
    @endif
</body>
