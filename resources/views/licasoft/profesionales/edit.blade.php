@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Editar Profesional: {{ $profesionales->nombre}}</h3>
			@if (count($errors)>0)
			<div class="alert alert-danger">
				<ul>
				@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
				@endforeach
				</ul>
			</div>
			@endif

			{!!Form::model($profesionales,['method'=>'PATCH','route'=>['licasoft.profesionales.update',$profesionales->id_profesional]])!!}
            {{Form::token()}}

			<div class="form-group">
            	<label for="nombre">Nombre</label>
				<input id="pac-input" name="nombre" class="form-control" value="{{$profesionales->nombre}}" type="text" placeholder="Buscar direccion" >
            </div>

			<div class="form-group">
            	<label for="nombre">Cargo</label>
				<input id="pac-input" name="cargo" class="form-control" value="{{$profesionales->cargo}}" type="text" placeholder="Buscar direccion" >
            </div>

			<div class="form-group">
            	<label for="nombre">Teléfono</label>
				<input id="pac-input" name="telefono" class="form-control" value="{{$profesionales->telefono}}" type="text" placeholder="Buscar direccion">
            </div>


           <div class="box-footer">
                <button class="btn btn-info pull-right type="submit">Guardar</button>
            	<button class="btn btn-danger" type="reset">Cancelar</button>
              </div>

			{!!Form::close()!!}		
            
		</div>
	</div>
@endsection