@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado de Categorías <a href="traslados/create"><button class="btn btn-success">Nuevo</button></a></h3>
		@include('licasoft.traslados.search')
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<th>Id</th>
					<th>Nombre</th>
				</thead>
               @foreach ($traslados as $cat)
				<tr>
					<td>{{ $cat->id_ficha}}</td>
					<td>{{ $cat->nombre}}</td>
					<td>
						<a href="{{URL::action('TrasladosController@edit',$cat->id_ficha)}}"><button class="btn btn-info">Editar</button></a>
                         <a href="" data-target="#modal-delete-{{$cat->id_ficha}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
					</td>
				</tr>
				@include('licasoft.traslados.modal')
				@endforeach
			</table>
		</div>
		{{$traslados->render()}}
	</div>
</div>

@endsection