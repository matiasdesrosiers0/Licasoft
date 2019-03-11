@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Editar Ambulancia Numero: {{ $ambulancias->id_ambulancia}}</h3>
			@if (count($errors)>0)
			<div class="alert alert-danger">
				<ul>
				@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
				@endforeach
				</ul>
			</div>
			@endif

			{!!Form::model($ambulancias,['method'=>'PATCH','route'=>['licasoft.ambulancias.update',$ambulancias->id_ambulancia]])!!}
            {{Form::token()}}

            <div class="form-group">
            	<label for="nombre">Modelo</label>
            	<input type="text" name="modelo" class="form-control" value="{{$ambulancias->modelo}}" placeholder="Modelo...">
            </div>
            <div class="form-group">
            	<label for="descripcion">Marca/a</label>
            	<input type="text" name="marca" class="form-control" value="{{$ambulancias->marca}}" placeholder="Marca/a...">
            </div>
    
			<div class="form-group">
            	<label for="">Combustible</label>
            	<select name="combustible" class="form-control" value="{{$ambulancias->combustible}}">
			
				<option value="1"> Diesel</option>
				<option value="2"> Gasolina 93</option>
				<option value="3"> Gasolina 95</option>
				<option value="4"> Gasolina 97</option>
				</select>
				</div>

			<div class="form-group">
            	<label for="descripcion">Kilometros por litro de Combustible</label>
            	<input type="text" name="kmxlitro" class="form-control" value="{{$ambulancias->kmxlitro}}" placeholder="km...">
            </div>
            <div class="form-group">
            	<label for="descripcion">Año</label>
            	<input type="text" name="año" class="form-control" value="{{$ambulancias->año}}" placeholder="Año...">
            </div>
            <label for="descripcion">Estado</label>
			      <select class="form-control" name="estado" value="{{$ambulancias->estado}}" placeholder="Ingrese opción...">
                    <option value="true">Disponible</option>
                    <option value="false">No Disponible</option>
                  </select>
            <div class="form-group">
            	<label for="descripcion">Otros</label>
            	<input type="text" name="otros" class="form-control" value="{{$ambulancias->otros}}" placeholder="otros...">
            </div>

		
           <div class="box-footer">
                <button class="btn btn-info pull-right type="submit">Guardar</button>
            	<button class="btn btn-danger" type="reset">Cancelar</button>
              </div>

			{!!Form::close()!!}		
            
		</div>
	</div>
@endsection