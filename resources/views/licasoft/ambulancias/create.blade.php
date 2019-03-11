@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Nueva Ambulancia</h3>
			@if (count($errors)>0)
			<div class="alert alert-danger">
				<ul>
				@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
				@endforeach
				</ul>
			</div>
			@endif

			{!!Form::open(array('url'=>'licasoft/ambulancias','method'=>'POST','autocomplete'=>'off'))!!}
            {{Form::token()}}
            <div class="form-group">
            	<label for="nombre">Modelo</label>
            	<input type="text" name="modelo" class="form-control" placeholder="Modelo...">
            </div>
            <div class="form-group">
            	<label for="descripcion">Marca/a</label>
            	<input type="text" name="marca" class="form-control" placeholder="Marca/a...">
            </div>
        
        
			<div class="form-group">
            	<label for="">Combustible</label>
            	<select name="combustible" class="form-control" id="combustible">
			
				<option value="1"> Diesel</option>
				<option value="2"> Gasolina 93</option>
				<option value="3"> Gasolina 95</option>
				<option value="4"> Gasolina 97</option>
				
				</select>
				</div>
				<div class="form-group">
            	<label for="descripcion">Kilometro por Litro</label>
            	<input type="text" name="kmxlitro" class="form-control" placeholder="km...">
            
				
            </div>
            <div class="form-group">
            	<label for="descripcion">Año</label>
            	<input type="text" name="año" class="form-control" placeholder="Año...">
            </div>

			<label for="descripcion">Estado</label>
			<select class="form-control" name="estado" placeholder="Ingrese opción...">
                    <option value="1">Disponible</option>
                    <option value="0">No Disponible</option>
                  </select>
            <div class="form-group">
            	<label for="descripcion">Otros</label>
            	<input type="text" name="otros" class="form-control" placeholder="otros...">
            </div>
            <div class="form-group">
            	<button class="btn btn-primary" type="submit">Guardar</button>
            	<button class="btn btn-danger" type="reset">Cancelar</button>
            </div>

			{!!Form::close()!!}		
            
		</div>
	</div>
@endsection