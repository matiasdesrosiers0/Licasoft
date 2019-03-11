@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado de Profesionales <a href="profesionales/create"><button class="btn btn-success">Nuevo</button></a></h3>
		@include('licasoft.profesionales.search')
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<th>Id</th>
					<th>Nombre</th>
					<th>Teléfono</th>
					<th>Cargo</th>
					<th>Opciones</th>
				</thead>
               @foreach ($profesionales as $cat)
				<tr>
					<td>{{ $cat->id_profesional}}</td>
					<td>{{ $cat->nombre}}</td>
					<td>{{ $cat->telefono}}</td>
					<td>{{ $cat->cargo}}</td>
					<td>
						<a href="{{URL::action('ProfesionalesController@edit',$cat->id_profesional)}}"><button class="btn btn-info">Editar</button></a>
                         <a href="" data-target="#modal-delete-{{$cat->id_profesional}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
					</td>
				</tr>
				@include('licasoft.profesionales.modal')
				@endforeach
			</table>
		</div>
		{{$profesionales->render()}}
	</div>
</div>

@endsection