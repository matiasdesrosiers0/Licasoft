@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado de Convenios <a href="convenios/create"><button class="btn btn-success">Nuevo</button></a></h3>
		@include('licasoft.convenios.search')
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<th>Id</th>
					<th>Nombre</th>
					<th>Direccion</th>
					<th>Teléfono</th>
					<th>Opciones</th>
				</thead>
               @foreach ($convenios as $cat)
				<tr>
					<td>{{ $cat->id}}</td>
					<td>{{ $cat->name}}</td>
					<td>{{ $cat->direccion}}</td>
					<td>{{ $cat->telefono}}</td>
					<td>
						<a href="{{URL::action('ConveniosController@edit',$cat->id)}}"><button class="btn btn-info">Editar</button></a>
                         <a href="" data-target="#modal-delete-{{$cat->id}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
					</td>
				</tr>
				@include('licasoft.convenios.modal')
				@endforeach
			</table>
		</div>
		{{$convenios->render()}}
	</div>
</div>

@endsection