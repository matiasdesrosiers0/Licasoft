@extends ('layouts.admin')
@section ('contenido')
    <style>
       
    #horeja {
      margin: 2px;
    
    margin-left: auto;
    text-align: left;
    border-width: 90%;
    text-align: left;
    width: 20%;
    }
    </style>
  </head>
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<body onload="relojillo()">
<h3 id="horeja"></h3>
</body>
			<h3>Editar Ficha Numero: {{ $ficha->id_ficha}}</h3>
			
			@if (count($errors)>0)
			<div class="alert alert-danger">
				<ul>
				@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
				@endforeach
				</ul>
			</div>
			@endif

			{!!Form::model($ficha,['method'=>'PATCH','route'=>['licasoft.ficha.update',$ficha->id_ficha]])!!}
            {{Form::token()}}
			
        <br>
<label for="nombre">Hora Despacho</label>
			<div class="input-group">
			
                <div class="input-group-btn">
                  <button type="button" onclick="getElementById('hora_despacho').value = getElementById('horeja').innerHTML" class="btn btn-info btn-flat">Marcar Hora</button>
                </div>
                <!-- /btn-group -->
                <input  id="hora_despacho" name="hora_despacho" value="{{$ficha->hora_despacho}}" type="text" class="form-control">
              </div>

<br>
			  <label for="nombre">Hora llegada</label>
			<div class="input-group">
			
			  <div class="input-group-btn">
                  <button type="button" onclick="getElementById('hora_llegada').value = getElementById('horeja').innerHTML" class="btn btn-info btn-flat">Marcar Hora</button>
                </div>
                <!-- /btn-group -->
                <input  id="hora_llegada" name="hora_llegada" value="{{$ficha->hora_llegada}}" type="text" class="form-control">
              </div>
			  <br>
			   <label for="nombre">Hora Salida QTH</label>
			<div class="input-group">
			
			  <div class="input-group-btn">
                  <button type="button" onclick="getElementById('hora_salida_qth').value = getElementById('horeja').innerHTML" class="btn btn-info btn-flat">Marcar Hora</button>
                </div>
                <!-- /btn-group -->
                <input  value="{{$ficha->hora_salida_qth}}" name="hora_salida_qth" id="hora_salida_qth" type="text" class="form-control">
              </div>
			  <br>
			  <label for="nombre">Hora Llegada QTH</label>
			<div class="input-group">
			
			  <div class="input-group-btn">
                  <button type="button" onclick="getElementById('hora_llegada_qth').value = getElementById('horeja').innerHTML" class="btn btn-info btn-flat">Marcar Hora</button>
                </div>
                <!-- /btn-group -->
                <input  value="{{$ficha->hora_llegada_qth}}" name="hora_llegada_qth" id="hora_llegada_qth" type="text" class="form-control">
              </div>
			  <br>
            
            
            <div class="form-group">
            	<label for="descripcion">Estado Móvil</label>
            	<input class="form-control" type="text" >
            </div>
			<br>
			<label for="nombre">Hora 420</label>
			<div class="input-group">
			
			  <div class="input-group-btn">
                  <button type="button" name="hora_420" onclick="getElementById('hora_420').value = getElementById('horeja').innerHTML" class="btn btn-info btn-flat">Marcar Hora</button>
                </div>
                <!-- /btn-group -->
                <input  value="{{$ficha->hora_420}}" id="hora_420" type="text" class="form-control">
              </div>

			

  

		
           <div class="box-footer">
                <button class="btn btn-info pull-right" type="submit">Guardar</button>
            	<button class="btn btn-danger" type="reset">Cancelar</button>
              </div>

			{!!Form::close()!!}		
            
		</div>
	</div>
	<script language="JavaScript">
	function relojillo()
	{
	fecha = new Date()
	hora = fecha.getHours()
	minuto = fecha.getMinutes()
	segundo = fecha.getSeconds()
	horita = hora + ":" + minuto + ":" + segundo
	document.getElementById('horeja').innerHTML = horita
	setTimeout('relojillo()',1000)

	}

	function hora()
	{
	fecha = new Date()
	hora = fecha.getHours()
	minuto = fecha.getMinutes()
	segundo = fecha.getSeconds()
	horita = hora + ":" + minuto;
	document.getElementById("hora_despacho").innerHTML = horita;
	

	}
	</script>


@endsection