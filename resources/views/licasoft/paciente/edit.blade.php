@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Editar Paciente: {{ $pacientes->nombres}}</h3>
			@if (count($errors)>0)
			<div class="alert alert-danger">
				<ul>
				@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
				@endforeach
				</ul>
			</div>
			@endif

			{!!Form::model($pacientes,['method'=>'PATCH','route'=>['licasoft.paciente.update',$pacientes->rut_paciente]])!!}
            {{Form::token()}}

			<div class="form-group">
            	<label for="nombre">RUT</label>
            	<input type="text" disabled name="rut_paciente" value="{{$pacientes->rut_paciente}}" class="form-control" placeholder="Nombre...">
            </div>
            <div class="form-group">
            	<label for="nombre">Nombres</label>
            	<input type="text" name="nombres" class="form-control" placeholder="Nombre..." value="{{$pacientes->nombres}}">
            </div>
			<div class="form-group">
            	<label for="nombre">Apellidos</label>
            	<input type="text" name="apellidos" class="form-control" placeholder="Nombre..." value="{{$pacientes->apellidos}}">
            </div>
			<div class="form-group">
            	<label for="nombre">Edad</label>
            	<input type="number" name="edad" class="form-control" placeholder="Nombre..." value="{{$pacientes->edad}}">
            </div>
			<label for="descripcion">Edad</label>
			<select class="form-control" name="sexo" placeholder="Ingrese opción..." value="{{$pacientes->sexo}}">
                    <option value="0">Hombre</option>
                    <option value="1">Mujer</option>

                  </select>
  
				  <div class="form-group">
            	<label for="">Convenio</label>
            	<select name="id_convenio" class="form-control" id="inputAmbulancia_id"  value="{{$pacientes->id_convenio}}">
				@foreach ($convenios as $convenio)
				<option value="{{ $convenio['id_convenio'] }}"> {{$convenio['nombre'] }}</option>
				@endforeach
				</select>
    </div>
            
            <div class="form-group">
            	<button class="btn btn-primary" type="submit">Guardar</button>
            	<button class="btn btn-danger" type="reset">Cancelar</button>
            </div>

			


        

			{!!Form::close()!!}		
            
		</div>
	</div>
@endsection