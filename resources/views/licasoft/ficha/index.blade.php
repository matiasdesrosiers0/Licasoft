@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Fichas Finalizadas</h3>
		@include('licasoft.ficha.search')
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
			<thead>
					<th>Id</th>
					<th>Convenio</th>
					<th>Paciente</th>
					<th>Origen</th>
					<th>Destino</th>
					<th>Opciones</th>
				</thead>
            @foreach ($ficha as $cat)
				<tr>
					<td>{{ $cat->id_ficha}}</td>
					@foreach ($convenios as $convenio)
        				@if ($convenio['id']  == $cat->id_convenio)
					<td>{{$convenio['name'] }}</td>
        				@endif
					@endforeach
					
			
						<td>{{ $cat->rut_paciente }}</td>
	
					<td>{{ $cat->origen}}</td>
					<td>{{ $cat->destino}}</td>

					<td>
					<a href="" data-target="#modal-delete-{{$cat->id_ficha}}" data-toggle="modal"><button class="btn btn-info">Ver detalles</button></a>
					</td>
				</tr>
				@include('licasoft.ficha.modal')
				@endforeach
			</table>
		</div>
		{{$ficha->render()}}
	</div>
</div>

@endsection


   