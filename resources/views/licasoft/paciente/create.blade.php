@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Nuevo Paciente</h3>
			@if (count($errors)>0)
			<div class="alert alert-danger">
				<ul>
				@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
				@endforeach
				</ul>
			</div>
			@endif

			{!!Form::open(array('url'=>'licasoft/paciente','method'=>'POST','autocomplete'=>'off'))!!}
            {{Form::token()}}
			<div class="form-group">
            	<label for="nombre">RUT</label>
            	<input type="text" name="rut_paciente" class="form-control" placeholder="Nombre...">
            </div>
            <div class="form-group">
            	<label for="nombre">Nombres</label>
            	<input type="text" name="nombres" class="form-control" placeholder="Nombre...">
            </div>
			<div class="form-group">
            	<label for="nombre">Apellidos</label>
            	<input type="text" name="apellidos" class="form-control" placeholder="Nombre...">
            </div>
			<div class="form-group">
            	<label for="nombre">Edad</label>
            	<input type="number" name="edad" class="form-control" placeholder="Nombre...">
            </div>
			<label for="descripcion">Sexo</label>
			<select class="form-control" name="edad" placeholder="Ingrese opción...">
                    <option value="0">Hombre</option>
                    <option value="1">Mujer</option>

                  </select>
			<div class="form-group">
            	
            	<input type="hidden" name="id_convenio" value="{{Auth::user()->id}}" class="form-control" placeholder="Nombre...">
            </div>
  
            
            <div class="form-group">
            	<button class="btn btn-primary" type="submit">Guardar</button>
            	<button class="btn btn-danger" type="reset">Cancelar</button>
            </div>

			{!!Form::close()!!}		
            
		</div>
	</div>
@endsection