<div class="col-md-3">

<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">

<ul>
    <li>Calle:</li>
    <li>Barrio, Ciudad</li>
    <li>Telefono</li>
</ul>
<i class="fa fa-plus" aria-hidden="true"></i>

</button>





<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{route('addAddress')}}" method="post">
      @csrf
      <div class="modal-body">


					<div class="form-group">
						<label for="direccion" class="control-label">Direccion:</label>
						<input class="form-control" autocomplete="on"   name="direccion" type="text" id="direccion">
					</div>
					<div class="form-group">
						<label for="ciudad" class="control-label">Ciudad:</label>
						<input class="form-control" autocomplete="on"   name="ciudad" type="text" id="ciudad">
					</div>

					<div class="form-group">
						<label for="barrio" class="control-label">Barrio:</label>
						<input class="form-control" autocomplete="on"   name="barrio" type="text" id="barrio">
					</div>
					<div class="form-group">
						<label for="telefono" class="control-label">Telefono:</label>
						<input class="form-control" autocomplete="on"   name="telefono" type="text" id="telefono">
					</div>
					<div class="form-group">
						<label for="celular" class="control-label">Celular:</label>
						<input class="form-control" autocomplete="on"   name="celular" type="text" id="celular">
                    </div>

        </div>

      <div class="modal-footer">

        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
      </form>
    </div>
  </div>
</div>
 </div>


