@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado de Pacientes <a href="paciente/create"><button class="btn btn-success">Nuevo</button></a></h3>
		@include('licasoft.paciente.search')
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<th>Rut</th>
					<th>Nombres</th>
					<th>Apellidos</th>
				
					<th>Opciones</th>
				</thead>
               @foreach ($pacientes as $cat)
			   @if (Auth::user()->id == $cat->id_convenio)
				<tr>
				
					<td>{{ $cat->rut_paciente}}</td>
					<td>{{ $cat->nombres}}</td>
					<td>{{ $cat->apellidos}}</td>
				
					<td>
						<a href="{{URL::action('PacientesController@edit',$cat->rut_paciente)}}"><button class="btn btn-info">Editar</button></a>
                         <a href="" data-target="#modal-delete-{{$cat->rut_paciente}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
					</td>
				</tr>
				@endif
				@include('licasoft.paciente.modal')
				@endforeach
			</table>
		</div>
		{{$pacientes->render()}}
	</div>
</div>

@endsection