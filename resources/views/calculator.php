@extends ('layouts.admin')
@section ('contenido')



  <head>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <meta charset="utf-8">
    <title>Cotización</title>
    <style>
        #directions-panel {
        font-family: 'Roboto','sans-serif';
        line-height: 30px;
        padding-left: 10px;
      }
         #right-panel {
        font-family: 'Roboto','sans-serif';
        line-height: 30px;
        padding-left: 10px;
      }

      #right-panel select, #right-panel input {
        font-size: 15px;
        width: 120%;
      }
      #right-panel select, #right-panel button {
        font-size: 15px;
        width: 120%;
      }
      #right-panel select, #right-panel img {    
        margin:10px auto;
	      display:block;
        width: 50%;
      }

      #right-panel select {
        width: 120%;
      }

      #right-panel i {
        font-size: 12px;
      }


      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
      #map {
        height: 100%;
        float: left;
        width: 50%;
       
      }
      #right-panel {
        margin: 10px;
        border-width: 2px;
        width: 40%;
        height: 400px;
        float: left;
        text-align: left;
        padding-top: 0;
        
      }
      #center {
    display: block;
    margin-left: auto;
    width: 70%;
    }
    </style>
  </head>
  <body>

  <div id="map"></div>
  
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Nueva Ficha</h3>
			@if (count($errors)>0)
			<div class="alert alert-danger">
				<ul>
				@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
				@endforeach
				</ul>
			</div>
			@endif

			{!!Form::open(array('url'=>'licasoft/ficha','method'=>'POST','autocomplete'=>'off'))!!}
            {{Form::token()}}

      <div class="form-group">
            	<label for="">Convenio</label>
            	<select name="CONVENIO_id_convenio" class="form-control" id="inputAmbulancia_id">
				@foreach ($convenios as $convenio)
				<option value="{{ $convenio['id'] }}"> {{$convenio['nombre'] }}</option>
				@endforeach
				</select>
            </div>
			<label for="descripcion">Tipo de traslado</label>
			<select class="form-control" name="estado" placeholder="Ingrese opción...">
                    <option value="1">Baja</option>
                    <option value="0">Media</option>
					<option value="0">Alta</option>
                  </select>
      <br>
      <div class="form-group">
            	<label for="">Rut Paciente</label>
            	<select name="PACIENTE_id_convenio" class="form-control" id="inputPaciente_id">
				@foreach ($pacientes as $paciente)
				<option value="{{ $paciente['rut_paciente'] }}"> {{$paciente['rut_paciente'] }} - {{$paciente['nombres'] }} {{$paciente['apellidos'] }} -Edad {{$paciente['edad'] }} {{$paciente['sexo'] }}</option>
				@endforeach
				</select>
      </div>

      <label for="">Requerimientos Del Paciente</label>
      <br>
      <div class="col-md-12">
                    <label>
                      <input type="checkbox">
                      INMOVILIZACIÓN
                    </label>
                    &nbsp;
                    &nbsp;
                    &nbsp;
                    <label>
                      <input type="checkbox">
                      VENTILACION MECÁNICA
                    </label>
                    &nbsp;
                    &nbsp;
                    &nbsp;
                  
                    <label>
                      <input type="checkbox">
                      OXIGENOTERAPIA
                    </label>
                    &nbsp;
                    &nbsp;
                    &nbsp;
                  
                    <label>
                      <input type="checkbox">
                      CON/V.V.P
                    </label>
                    &nbsp;
                    &nbsp;
                    &nbsp;
                    <label>
                      <input type="checkbox">
                      SIN/V.V.P
                    </label>
                    &nbsp;
                    &nbsp;
                    &nbsp;
                    <label>
                      <input type="checkbox">
                      CON BOMBA
                    </label>
                    &nbsp;
                    &nbsp;
                    &nbsp;
                    <label>
                      <input type="checkbox">
                      SIN BOMBA
                    </label>
                    &nbsp;
                    &nbsp;
                    &nbsp;
                    <label>
                      <input type="checkbox">
                      MONITORIZACIÓN
                    </label>
                    </div>
                    
      
                    <div class="col-md-12">
                    <label> Otro: </label>
                    <textarea class="form-control" rows="2"></textarea>
                       </div>
                       &nbsp;

      <div class="form-group">
                    <label for="">Movil</label>
                    <select name="MOVIL_id_movil" class="form-control" id="inputMovil_id">
              @foreach ($movil as $mov)
              <option value="{{ $mov['id_movil'] }}"> -Ambulancia {{$mov['id_ambulancia'] }} -Conductor: {{$mov['conductor']}} -Paramedico: {{$mov['paramedico'] }} -Medico: {{$mov['medico'] }} -Enfermero: {{$mov['enfermero'] }} -Regulador: {{$mov['regulador'] }} </option>
              @endforeach
              </select>
              
                  </div>
                  <b>Inicio de traslado:</b>
    <input class="form-control" type="text" id="start">
    
    
    <b>Destino de traslado:</b>
    <input class="form-control" type="text" id="end">

     
    
     <div id="directions-panel"></div>
      
      <input type="button" id="submit" class="btn btn-info pull-right" >Calcular</input>
      

    
            

			{!!Form::close()!!}		
            
		</div>
	</div>
@endsection
   <script>
      function initMap() {
        var directionsService = new google.maps.DirectionsService;
        var directionsDisplay = new google.maps.DirectionsRenderer;
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 12,
          center: {lat: -36.4294484, lng: -72.0028139}
        });
        directionsDisplay.setMap(map);
        console.log("hola")
        document.getElementById('submit').addEventListener('click', function() {
          calculateAndDisplayRoute(directionsService, directionsDisplay);
        });
      }

      function calculateAndDisplayRoute(directionsService, directionsDisplay) {
        directionsService.route({
          origin: document.getElementById('start').value,
          destination: document.getElementById('end').value,
          travelMode: 'DRIVING'
          
        }, function(response, status) {
          if (status === 'OK') {
            directionsDisplay.setDirections(response);
            var route = response.routes[0];
            var summaryPanel = document.getElementById('directions-panel');
            summaryPanel.innerHTML = '';
            // For each route, display summary information.
            for (var i = 0; i < route.legs.length; i++) {
              var routeSegment = i + 1;
            

                  summaryPanel.innerHTML += '<h4>PRECIOS COTIZACIÓN ' +
                  '<h4><br>';


                  summaryPanel.innerHTML += '<h5>Precio Base: ' +
                  '<h5>';
                  var tipo = document.getElementById("tipo").value;
                  summaryPanel.innerHTML += '<h5 align="right">' + tipo + '<br>';
                  console.log(tipo);


                  var kmxlitro = document.getElementById("inputAmbulancia_id").value;
                  var a = parseInt(route.legs[i].distance.text);
                  var precioCombustible = parseInt((a * document.getElementById("diesel").value)/kmxlitro); 
                  summaryPanel.innerHTML += '<h5>Precio Combustible: ' + '<h5>';
                  summaryPanel.innerHTML += '<h5 align="right">' + precioCombustible + '<br>';
                  console.log(precioCombustible);

                  var tarifa = document.getElementById("tarifa").value;
                  summaryPanel.innerHTML += '<h5>Precio Hora aprox del traslado: ' + '<h5>';
                  summaryPanel.innerHTML += '<h5 align="right">' + tarifa + '<br>';
                  console.log(tarifa);


                  summaryPanel.innerHTML += '<h5>Precio Duración: (' + route.legs[i].duration.text +
                  ')<h5><br>';
                  var u = parseInt(route.legs[i].duration.value);
                      if (u < 3587) {
                        var precioduracion = 1*10000;
                        summaryPanel.innerHTML += '<h5 align="right">' + precioduracion + '<br>';
                        console.log(precioduracion);
                  } else {
                    var precioduracion = parseInt((u/3587)*10000);
                    summaryPanel.innerHTML += '<h5 align="right">' + precioduracion + '<br>';
                    console.log(precioduracion);
                  }
                  


                  summaryPanel.innerHTML += '<h5>Precio Kilometros: (' + route.legs[i].distance.text + 
                  ')<h5><br>';
                  var km = parseInt(route.legs[i].distance.text);
                  var kmprecio = parseInt(km*1500);
                  summaryPanel.innerHTML += '<h5 align="right">' + kmprecio + '<br>';
                  console.log(kmprecio);
                  total = (Number(tipo) + Number(precioCombustible) + Number(tarifa) + Number(precioduracion) + Number(kmprecio));
                  console.log(total);
                  summaryPanel.innerHTML += '<h5>Total: (' + route.legs[i].distance.text + 
                  ')<h5><br>';
                  summaryPanel.innerHTML += '<h5 align="right">' + total + '<br>';
                  




            }
          } else {
            window.alert('Directions request failed due to ' + status);
          }
        });
      }
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD_W7zh62TaP-ibgdEoYQaGqfPnflzprCg&callback=initMap">
    </script>
  </body>
</html>
