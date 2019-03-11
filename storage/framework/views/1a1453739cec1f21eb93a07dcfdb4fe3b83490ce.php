
<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <link rel="stylesheet" href="<?php echo e(asset('css/bootstrap.min.css')); ?>">
    <meta charset="utf-8">
    <title>Ficha</title>
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
        height: 200%;
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
  <body>
  
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
</script>

</head>



<!-- Modal -->

  

  <a href="http://localhost:8000/licasoft/"><button class="btn btn-block btn-danger">Volver</button></a> 

    <div id="map"></div>
    <div id="right-panel">

    <?php echo Form::open(array('url'=>'licasoft/ficha','method'=>'POST','autocomplete'=>'off')); ?>

  <?php echo e(Form::token()); ?>

    <div class="modal fade" id="myModal" tabindex="1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel">Detalle de la Ficha</h4>
      </div>
      <div class="modal-body" id="directions-panel">
      
        
      </div>
      <div class="form-group">
            	<button class="btn btn-primary" type="submit">Guardar</button>
            	<button class="btn btn-danger" type="reset">Cancelar</button>
            </div>
    </div>
  </div>
</div>
<?php echo Form::close(); ?>	

    <div>
    <body onload="relojillo()">
<h3 id="horeja"></h3>
</body>
    <img src="<?php echo e(asset('img/LOGOLICA.png')); ?>" id="center">

    <div class="form-group">
            	<label for="">Convenio</label>
            	<select name="CONVENIO_id_convenio" class="form-control" id="convenio">
				<?php foreach($convenios as $convenio): ?>
				<option value="<?php echo e($convenio['id_convenio']); ?>"> <?php echo e($convenio['nombre']); ?></option>
				<?php endforeach; ?>
				</select>
    </div>

    <label for="">Tipo de traslado</label>
		<select class="form-control" id="tipo" >
                    <option value="1500">Baja</option>
                    <option value="1900">Media</option>
		<option value="2500">Alta</option>
    </select>
    
    <div class="form-group">
            	<label for="">Rut Paciente</label>
            	<select name="PACIENTE_id_convenio" class="form-control" id="rut_paciente">
				<?php foreach($pacientes as $paciente): ?>
				<option value="<?php echo e($paciente['rut_paciente']); ?>"> <?php echo e($paciente['rut_paciente']); ?> - <?php echo e($paciente['nombres']); ?> <?php echo e($paciente['apellidos']); ?> -Edad <?php echo e($paciente['edad']); ?> <?php echo e($paciente['sexo']); ?></option>
				<?php endforeach; ?>
				</select>
      </div>
<div class="form-group">
      <label for="">Requerimientos Del Paciente</label>
      <select class="form-control" multiple="multiple" id="requerimientos">
    
        <option value="1">INMOVILIZACIÓN</option>
        <option value="2">VENTILACION MECÁNICA</option>
        <option value="3">OXIGENOTERAPIA</option>
        <option value="4">CON/V.V.P</option>
        <option value="5">SIN/V.V.P</option>
        <option value="6">CON BOMBA</option>
        <option value="7">SIN BOMBA</option>
        <option value="8">MONITORIZACIÓN</option>
        <option value="9">OXIGENOTERAPIA</option>
   
</select>
      
                    
<label> Observación: </label>
<textarea class="form-control" rows="2" id="observacion"></textarea>
</div>
<div class="form-group">
                    <label for="">Movil</label>
                    <select name="MOVIL_id_movil" class="form-control" id="movil">
              <?php foreach($movil as $mov): ?>
              <option value="<?php echo e($mov['id_movil']); ?>"> -Ambulancia <?php echo e($mov['id_ambulancia']); ?> -Conductor: <?php echo e($mov['conductor']); ?> -Paramedico: <?php echo e($mov['paramedico']); ?> -Medico: <?php echo e($mov['medico']); ?> -Enfermero: <?php echo e($mov['enfermero']); ?> -Regulador: <?php echo e($mov['regulador']); ?> </option>
              <?php endforeach; ?>
              </select>
              
      

    <b>Inicio de traslado:</b>
    <input class="form-control" type="text" id="start">
    
    
    <b>Destino de traslado:</b>
    <input class="form-control" type="text" id="end">
    
    
    <B>Tarifa Traslado:</B>
			<select class="form-control" id="tarifa">
                    <option value="10000">TARIFA BAJA -- 6:00 a 6:29 -- 20:45 a 23:00</option>
                    <option value="20000">TARIFA NORMAL -- 6:30 a 6:59 -- 09:00 a 17:59 -- 20:00 a 20:44</option>
                    <option value="30000">TARIFA ALTA -- 07:00 a 08:59 -- 18:00 a 19:59</option>
                  </select>
          

       

    <b>Precio Combustible Diesel: </b>
    <a href="http://reportes.cne.cl/reportes?c" target="_blank">Ver Precios</a>
    
    <input class="form-control" type="text" id="diesel">
    
    <br>
    
    
      <button type="button" id="submit" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
      Ver Precios 
    </button>
      
    


    
    
  
     
      
      
              
    
  

</div>
<script language="JavaScript" type="text/JavaScript" class="fecha">
function mueveReloj(){ 

var LaFecha=new Date();
var Mes=new Array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
var diasem=new Array('domingo','lunes','martes','miercoles','jueves','viernes','sabado');
var diasemana=LaFecha.getDay();
var FechaCompleta="";
var NumeroDeMes="";
var hora = LaFecha.getHours() 
var minuto = LaFecha.getMinutes() 
var segundo = LaFecha.getSeconds() 

NumeroDeMes=LaFecha.getMonth();
FechaCompleta=diasem[diasemana]+" "+LaFecha.getDate()+" de "+Mes[NumeroDeMes]+" de "+LaFecha.getFullYear()+" "+hora+":"+minuto+":"+segundo;
document.write (FechaCompleta);

setTimeout("mueveReloj()",1000)

} 
</script> 

    <script>
      function initMap() {
        var directionsService = new google.maps.DirectionsService;
        var directionsDisplay = new google.maps.DirectionsRenderer;
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 12,
          center: {lat: -36.4294484, lng: -72.0028139}
        });
        directionsDisplay.setMap(map);

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
            
              var origen = document.getElementById("start").value;
              summaryPanel.innerHTML += '<h4 align="center">origen' + origen;
              summaryPanel.innerHTML += '<input type="hidden" name="origen" align="center" value="'+ origen + '">';
        
              var destino = document.getElementById("end").value;
              summaryPanel.innerHTML += '<h4  align="center">destino' + destino + '<br>';
              summaryPanel.innerHTML += '<input type="hidden" name="destino" align="center" value="'+ destino + '">';
              
              var convenio = document.getElementById("convenio").value;
              summaryPanel.innerHTML += '<h4  align="center">convenio' + convenio + '<br>';
              summaryPanel.innerHTML += '<input type="hidden" name="id_convenio" align="center" value="'+ convenio + '">';

              fecha = new Date()
              dia = fecha.getDate()
              mes = fecha.getMonth()
              año = fecha.getFullYear()
              fecha = año + "/" + mes + "/" + dia;
              
              summaryPanel.innerHTML += '<h4  align="center">fecha' + fecha + '<br>';
              summaryPanel.innerHTML += '<input type="hidden" name="fecha" align="center" value="'+ fecha + '">';

              var paciente = document.getElementById("rut_paciente").value;
              summaryPanel.innerHTML += '<h4  align="center">pacient' + paciente + '<br>';
              summaryPanel.innerHTML += '<input type="hidden" name="rut_paciente" align="center" value="'+ paciente + '">';

              
                        
                

                  
                  var tipo = document.getElementById("tipo").value;
                  if (tipo == 1500)
                    summaryPanel.innerHTML += '<h5  align="right">Baja<br>';
                  summaryPanel.innerHTML += '<input type="hidden" name="tipo" align="center" value="baja">';
                  if (tipo == 1900)
                    summaryPanel.innerHTML += '<h5  align="right">Media<br>';
                  summaryPanel.innerHTML += '<input type="hidden" name="tipo" align="center" value="media">';
                  
                  if (tipo == 2500)  
                  summaryPanel.innerHTML += '<h5  align="right">Alta<br>';
                  summaryPanel.innerHTML += '<input type="hidden" name="tipo" align="center" value="alta">';
                  
                 




                var requerimientos = document.getElementById("requerimientos").value;
                summaryPanel.innerHTML += '<h5  align="right">requerimiento' + requerimientos + '<br>';
                summaryPanel.innerHTML += '<input type="hidden" name="requerimientos" align="center" value="'+ requerimientos + '">';

                var movil = document.getElementById("movil").value;
                summaryPanel.innerHTML += '<h5  align="right">movil' + movil + '<br>';
                summaryPanel.innerHTML += '<input type="hidden" name="id_movil" align="center" value="'+ movil + '">';

                var observacion = document.getElementById("observacion").value;
                summaryPanel.innerHTML += '<h5  align="right">observa' + observacion + '<br>';
                summaryPanel.innerHTML += '<input type="hidden" name="observacion" align="center" value="'+ observacion + '">';

                
                  summaryPanel.innerHTML += '<h5>Precio Base: ' +
                  '<h5>';
                  
                  summaryPanel.innerHTML += '<h5  align="right">tipoprecio' + tipo + '<br>';
                  summaryPanel.innerHTML += '<input type="hidden" name="precio_base" align="center" value="'+ tipo + '">';
                  console.log(tipo);


                  var kmxlitro = 400;
                  var a = parseInt(route.legs[i].distance.text);
                  var precioCombustible = parseInt((a * document.getElementById("diesel").value)/kmxlitro); 
                  summaryPanel.innerHTML += '<h5>Precio Combustible: ' + '<h5>';
                  summaryPanel.innerHTML += '<h5  align="right">' + precioCombustible + '<br>';
                  summaryPanel.innerHTML += '<input type="hidden" name="precio_combustible" align="center" value="'+ precioCombustible + '">';
                  console.log(precioCombustible);

                  var tarifa = document.getElementById("tarifa").value;
                  summaryPanel.innerHTML += '<h5>Precio Hora aprox del traslado: ' + '<h5>';
                  summaryPanel.innerHTML += '<h5  align="right">' + tarifa + '<br>';
                  summaryPanel.innerHTML += '<input type="hidden" name="precio_hora" align="center" value="'+ tarifa + '">';
                  console.log(tarifa);


                  summaryPanel.innerHTML += '<h5>Precio Duración: (' + route.legs[i].duration.text +
                  ')<h5><br>';
                  var u = parseInt(route.legs[i].duration.value);
                      if (u < 3587) {
                        var precioduracion = 1*10000;
                        summaryPanel.innerHTML += '<h5  align="right">' + precioduracion + '<br>';
                        summaryPanel.innerHTML += '<input type="hidden" name="precio_duracion" align="center" value="'+ precioduracion + '">';
                        console.log(precioduracion);
                  } else {
                    var precioduracion = parseInt((u/3587)*10000);
                    summaryPanel.innerHTML += '<h5  align="right">' + precioduracion + '<br>';
                    summaryPanel.innerHTML += '<input type="hidden" name="precio_duracion" align="center" value="'+ precioduracion + '">';
                    console.log(precioduracion);
                  }
                  


                  summaryPanel.innerHTML += '<h5>Precio Kilometros: (' + route.legs[i].distance.text + 
                  ')<h5><br>';
                  var km = parseInt(route.legs[i].distance.text);
                  var kmprecio = parseInt(km*1500);
                  summaryPanel.innerHTML += '<h5  align="right">' + kmprecio + '<br>';
                  summaryPanel.innerHTML += '<input type="hidden" name="precio_kilometro" align="center" value="'+ kmprecio + '">';
                  console.log(kmprecio);

                  total = (Number(tipo) + Number(precioCombustible) + Number(tarifa) + Number(precioduracion) + Number(kmprecio));
                  console.log(total);

                  summaryPanel.innerHTML += '<h5>Total: (' + route.legs[i].distance.text + 
                  ')<h5><br>';
                  summaryPanel.innerHTML += '<h5  align="right">' + total + '<br>';
                  summaryPanel.innerHTML += '<input type="hidden" name="total" align="center" value="'+ total + '">';
                  




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
    <script src="<?php echo e(asset('js/jQuery-2.1.4.min.js')); ?>"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="<?php echo e(asset('js/bootstrap.min.js')); ?>"></script>
    <!-- AdminLTE App -->
    <script src="<?php echo e(asset('js/app.min.js')); ?>"></script>
  </body>
</html>
