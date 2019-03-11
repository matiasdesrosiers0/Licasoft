@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado de Móvil <a href="movil/create"><button class="btn btn-success">Nuevo</button></a></h3>
		@include('licasoft.movil.search')
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<th>Id</th>
					<th>Modelo de Ambulancia</th>
					<th>Conductor</th>
					<th>Estado</th>
					<th>Opciones</th>
				</thead>
               @foreach ($movil as $cat)
				<tr>
				
					<td>{{ $cat->id_movil}}</td>
					@foreach ($ambulancias as $ambulancia)
					@if ($ambulancia['id_ambulancia']  == $cat->id_ambulancia )
					<td>{{ $ambulancia->modelo}}</td>
					@endif
					@endforeach
					
					<td>{{ $cat->id_profesional_conductor}}</td>
					<td>En transito</td>
					<td>
						<a href="{{URL::action('MovilController@edit',$cat->id_movil)}}"><button class="btn btn-info">Editar</button></a>
                         <a href="" data-target="#modal-delete-{{$cat->id_movil}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
					</td>
				</tr>
				@include('licasoft.movil.modal')
				@endforeach
			</table>
		</div>
		{{$movil->render()}}
	</div>
</div>

@endsection