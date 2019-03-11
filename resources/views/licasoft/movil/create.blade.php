@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Nuevo Movil</h3>
			@if (count($errors)>0)
			<div class="alert alert-danger">
				<ul>
				@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
				@endforeach
				</ul>
			</div>
			@endif

			{!!Form::open(array('url'=>'licasoft/movil','method'=>'POST','autocomplete'=>'off'))!!}
            {{Form::token()}}

			<div class="form-group">
            	<label for="">Ambulancias</label>
            	<select name="id_ambulancia" class="form-control" id="inputAmbulancia_id">
				@foreach ($ambulancias as $ambulancia)
				<option value="{{ $ambulancia['id_ambulancia'] }}"> {{$ambulancia->modelo }}</option>
				@endforeach
				</select>
				
            </div>

		<div class="form-group">
            	<label for="">Médico</label>
            	<select name="id_profesional_medico" class="form-control" id="inputAmbulancia_id">
				@foreach ($profesionales as $profesional)
				@if ($profesional['cargo']  == 0)
				<option value="{{$profesional['nombre'] }}"> {{$profesional['nombre'] }}</option>
				@endif
				@endforeach
				</select>
            </div>

		<div class="form-group">
            	<label for="">Paramédico</label>
            	<select name="id_profesional_paramedico" class="form-control" id="inputAmbulancia_id">
				@foreach ($profesionales as $profesional)
				@if ($profesional['cargo']  == 1)
				<option value="{{$profesional['nombre'] }}"> {{$profesional['nombre'] }}</option>
				@endif
				@endforeach
				</select>
            </div>

			<div class="form-group">
            	<label for="">Enfermero/a</label>
            	<select name="id_profesional_enfermero" class="form-control" id="inputAmbulancia_id">
				@foreach ($profesionales as $profesional)
				@if ($profesional['cargo']  == 2)
				<option value="{{$profesional['nombre'] }}"> {{$profesional['nombre'] }}</option>
				@endif
				@endforeach
				</select>
            </div>

			<div class="form-group">
            	<label for="">Regulador</label>
            	<select name="id_profesional_regulador" class="form-control" id="inputAmbulancia_id">
				@foreach ($profesionales as $profesional)
				@if ($profesional['cargo']  == 3)
				<option value="{{$profesional['nombre'] }}"> {{$profesional['nombre'] }}</option>
				@endif
				@endforeach
				</select>
            </div>

			<div class="form-group">
            	<label for="">Conductor</label>
            	<select name="id_profesional_conductor" class="form-control" id="inputAmbulancia_id">
				@foreach ($profesionales as $profesional)
				@if ($profesional['cargo']  == 4)
				<option value="{{$profesional['nombre'] }}"> {{$profesional['nombre'] }}</option>
				@endif
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