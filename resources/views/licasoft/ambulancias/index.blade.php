@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Lista de ambulancias <a href="ambulancias/create"><button class="btn btn-success">Nuevo</button></a></h3>
		@include('licasoft.ambulancias.search')
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<th>Id</th>
					<th>Modelo</th>
					<th>Marca</th>
					<th>Opciones</th>
				</thead>
               @foreach ($ambulancias as $cat)
				<tr>
					<td>{{ $cat->id_ambulancia}}</td>
					<td>{{ $cat->modelo}}</td>
					<td>{{ $cat->marca}}</td>
					<td>
						<a href="{{URL::action('AmbulanciasController@edit',$cat->id_ambulancia)}}"><button class="btn btn-info">Editar</button></a>
                         <a href="" data-target="#modal-delete-{{$cat->id_ambulancia}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
					</td>
				</tr>
				@include('licasoft.ambulancias.modal')
				@endforeach
			</table>
		</div>
		{{$ambulancias->render()}}
	</div>
</div>

@endsection