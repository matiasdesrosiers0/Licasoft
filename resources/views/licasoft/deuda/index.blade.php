@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Precios de Traslados realizados del Convenio: {{Auth::user()->name}}  </h3>
		@include('licasoft.deuda.search')
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
			<thead>
					<th>Id</th>
					<th>Fecha</th>
					<th>Origen</th>
					<th>Destino</th>
					<th>Total Traslado</th>
			
					<th>Opciones</th>
				</thead>
		@foreach ($ficha as $cat)
		@if (Auth::user()->id== $cat->id_convenio)
		
		<tr>
					<td>{{ $cat->id_ficha}}</td>
					<td>{{ $cat->fecha}}</td>
		
					<td>{{ $cat->origen}}</td>
					
					<td>{{ $cat->destino}}</td>
					<td>{{ $cat->total}}</td>
					
					<td>
					<a href="" data-target="#modal-delete-{{$cat->id_ficha}}" data-toggle="modal"><button class="btn btn-info">Ver detalles</button></a>
					</td>
				</tr>
				@endif
			@include('licasoft.ficha.modal')
		@endforeach
				
				
			</table>
		</div>
		@foreach ($ficha2 as $fichas)
					@if (Auth::user()->id== $fichas->id_convenio)
					@foreach ($convenios as $papa)
					@if ($papa['id']  == $fichas->id_convenio )
					<h1>Deuda Acumulada este mes : ${{ $fichas->resultado}}</h1>
					@endif
					@endforeach
					@endif
					@endforeach
		
		{{$ficha->render()}}
	</div>
</div>

@endsection


   