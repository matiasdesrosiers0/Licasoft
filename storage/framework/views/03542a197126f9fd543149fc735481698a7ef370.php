
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
        float: center;
        width: 100%;
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
        height: 160%;
        float: left;
        width: 50%;
       
      }

      #myModalLabel{
        display: block;
    margin-left: auto;
    width: 70%;

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

      #direction-panel input {
        font-size: 15px;
        border-width: 2px;
        width: 100%;
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
0
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

        <b>Tipo de traslado:</b>
		<select class="form-control" id="tipo" >
                    <option value="35000">Basico</option>
                    <option value="145000">Mediana</option>
		<option value="175000">Alta</option>
                  </select>

    <div class="form-group">
            	<label for="">Convenio</label>
            	<select name="CONVENIO_id_convenio" class="form-control" id="convenio">
				<?php foreach($convenios as $convenio): ?>
        <?php if($convenio['tipo']  == 0): ?>
				<option value="<?php echo e($convenio['id']); ?>"> <?php echo e($convenio['name']); ?></option>
        <?php endif; ?>
				<?php endforeach; ?>
				</select>
    </div>

  
    
    <div class="form-group">
            	<label for="">Rut Paciente</label>
            	<select name="PACIENTE_id_convenio" class="form-control" id="rut_paciente">
				<?php foreach($pacientes as $paciente): ?>
				<option value="<?php echo e($paciente['rut_paciente']); ?>"> <?php echo e($paciente['rut_paciente']); ?> - <?php echo e($paciente['nombres']); ?> <?php echo e($paciente['apellidos']); ?> -Edad <?php echo e($paciente['edad']); ?> <?php echo e($paciente['sexo']); ?></option>
				<?php endforeach; ?>
				</select>
      </div>
                   
                    <label> Requerimientos: </label>
                    <textarea id="requerimientos" name="requerimientos" class="form-control" rows="3"></textarea>
                     
<div class="form-group">
                    <label for="">Ambulancia encargada (Móvil)</label>
                    <select name="id_movil" class="form-control" id="movil">
                    
              <?php foreach($ambulancias as $ambulancia): ?>
              
              <option value="<?php echo e($ambulancia['kmxlitro']); ?>"> -Ambulancia <?php echo e($ambulancia['id_ambulancia']); ?> -Modelo <?php echo e($ambulancia['modelo']); ?></option>
     
              
              <?php endforeach; ?>
              </select>
              
              
      
</div>
    <b>Inicio de traslado:</b>
    <input class="form-control" type="text" id="start">
    
    
    <b>Destino de traslado:</b>
    <input class="form-control" type="text" id="end">
    
    
    <B>Hora Aprox Traslado:</B>
			<select class="form-control" id="tarifa">
                    <option value="0">Habil 08:00am - 20:00pm </option>
                    <option value="10000">InHabil 20:00am - 08:00pm</option>
                  </select>
                 

       

    <b>Precio Combustible Diesel: </b>
    <a href="http://reportes.cne.cl/reportes?c" target="_blank">Ver Precios</a>
    
    <input class="form-control" type="text" id="diesel">

  
                    <label> Observacion del Paciente: </label>
                    <input id="observacion" name="observacion" class="form-control">
                    
    
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
              var destino = document.getElementById("end").value;
              
         
              summaryPanel.innerHTML += '<h5>   Origen del traslado: ' +
                  '<h5>';
                summaryPanel.innerHTML += '<h5 align="right">'+ origen;
                summaryPanel.innerHTML += '<input type="hidden" name="origen" align="center" value="'+ origen + '">';
                summaryPanel.innerHTML += '<h5>   Destino del traslado: ' +
                  '<h5>';
                summaryPanel.innerHTML += '<h5  align="right">' + destino + '<br>';
                summaryPanel.innerHTML += '<input type="hidden" name="destino" align="center" value="'+ destino + '">';


                 


                //CONVENIO
                summaryPanel.innerHTML += '<h5>   Convenio: ' +
                  '<h5>';
              var convenio = document.getElementById("convenio").value;
              summaryPanel.innerHTML += '<h5  align="right">' + convenio + '<br>';
              summaryPanel.innerHTML += '<input type="hidden" name="id_convenio" align="center" value="'+ convenio + '">';

              //FECHA
              fecha = new Date()
              dia = fecha.getDate()
              mes = fecha.getMonth()
              año = fecha.getFullYear()
              fecha = año + "/" + mes + "/" + dia;

              summaryPanel.innerHTML += '<h5>   Fecha del Traslado: ' +
                  '<h5>';
              summaryPanel.innerHTML += '<h5  align="right">' + fecha + '<br>';
              summaryPanel.innerHTML += '<input type="hidden" name="fecha" align="center" value="'+ fecha + '">';
             
              //PACIENTE

              var paciente = document.getElementById("rut_paciente").value;
              summaryPanel.innerHTML += '<h5>   Paciente: ' +
                  '<h5>';
              summaryPanel.innerHTML += '<h5  align="right">' + paciente + '<br>';
              summaryPanel.innerHTML += '<input type="hidden" name="rut_paciente" align="center" value="'+ paciente + '">';

              
                        
                

              //TIPO 
                  var tipo = document.getElementById("tipo").value;
                  summaryPanel.innerHTML += '<h5>   Tipo de traslado: ' +
                  '<h5>';
                  if (tipo == 35000)
                    summaryPanel.innerHTML += '<h5  align="right">Baja<br>';
                  summaryPanel.innerHTML += '<input type="hidden" name="tipo" align="center" value="baja">';
                  if (tipo == 145000)
                    summaryPanel.innerHTML += '<h5  align="right">Media<br>';
                  summaryPanel.innerHTML += '<input type="hidden" name="tipo" align="center" value="media">';
                  
                  if (tipo == 175000)  
                  summaryPanel.innerHTML += '<h5  align="right">Alta<br>';
                  summaryPanel.innerHTML += '<input type="hidden" name="tipo" align="center" value="alta">';
                  
                



                //REQUERIMIENTOS
                summaryPanel.innerHTML += '<h5>   Requerimientos: ' +
                  '<h5>';
                
                var requerimientos = document.getElementById("requerimientos").value;
                summaryPanel.innerHTML += '<h5  align="right">' + requerimientos + '<br>';
                summaryPanel.innerHTML += '<input type="hidden" name="requerimientos" align="center" value="'+ requerimientos + '">';

                //MOVIL
                summaryPanel.innerHTML += '<h5>   Móvil designado: ' +
                  '<h5>';
                 var movil = document.getElementById("movil").value;
              summaryPanel.innerHTML += '<h5  align="right">' + movil + '<br>';
              summaryPanel.innerHTML += '<input type="hidden" name="id_movil" align="center" value="'+ movil + '">';

              //OBSERVACION
                var observacion = document.getElementById("observacion").value;
                summaryPanel.innerHTML += '<h5>   Observacion del Paciente: ' +
                  '<h5>';
                summaryPanel.innerHTML += '<h5  align="right">' + observacion + '<br>';
                summaryPanel.innerHTML += '<input type="hidden" name="observacion" align="center" value="'+ observacion + '">';

                //PRECIO BASE
                summaryPanel.innerHTML += '<h5>   Precio Base: ' +
                  '<h5>';
                  var tipo = document.getElementById("tipo").value;
                  summaryPanel.innerHTML += '<h5  align="right">' + tipo + '<br>';
                  summaryPanel.innerHTML += '<input type="hidden" name="precio_base" align="center" value="'+ tipo + '">';
                  console.log(tipo);
                //PRECIO KM
                 
                summaryPanel.innerHTML += '<h5>   Precio Kilometros: (' + route.legs[i].distance.text + 
                  ')<h5><br>';
                  
                  
                  var km = ((parseFloat(route.legs[i].distance.text)) - 10.0);
                  console.log(km);
                  var kmprecio = 0;
                  if (tipo == 35000){
                    kmprecio = parseInt(km*1000);
                  summaryPanel.innerHTML += '<h5  align="right">' + kmprecio + '<br>';
                  summaryPanel.innerHTML += '<input type="hidden" name="precio_kilometro" align="center" value="'+ kmprecio + '">';
                  console.log(kmprecio);
                    
                    
                  }else{
                    
                  }
                    if (tipo == 145000){

                  kmprecio = parseInt(km*1500);
                  summaryPanel.innerHTML += '<h5  align="right">' + kmprecio + '<br>';
                  summaryPanel.innerHTML += '<input type="hidden" name="precio_kilometro" align="center" value="'+ kmprecio + '">';
                  console.log(kmprecio);
                  }else{
                    
                  }
                    if (tipo == 175000){

                  kmprecio = parseInt(km*2000);
                  summaryPanel.innerHTML += '<h5  align="right">' + kmprecio + '<br>';
                  summaryPanel.innerHTML += '<input type="hidden" name="precio_kilometro" align="center" value="'+ kmprecio + '">';
                  console.log(kmprecio);
                    }else{
                    
                  }
                  
                  //PRECIO HORA

                  var tarifa = document.getElementById("tarifa").value;
                  var tipo = document.getElementById("tipo").value;
                  var precio_hora= 0;
                  if (tipo == 35000 && tarifa == 0){
                  summaryPanel.innerHTML += '<input type="hidden" name="precio_hora" align="center" value="0">';
                  precio_hora = 0;
                }else{
                  
                }
                  if (tipo == 145000 && tarifa == 0){
                  summaryPanel.innerHTML += '<input type="hidden" name="precio_hora" align="center" value="0">';
                  precio_hora = 0;
                }else{
                  
                }
                  if (tipo == 175000 && tarifa == 0){
                  summaryPanel.innerHTML += '<input type="hidden" name="precio_hora" align="center" value="0">';
                  precio_hora = 0;
                  }else{
                  
                }
                if (tipo == 35000 && tarifa == 10000){
     
                  summaryPanel.innerHTML += '<input type="hidden" name="precio_hora" align="center" value="10000">';
                  precio_hora = 10000;
                }else{
                  
                }
                  if (tipo == 145000 && tarifa == 10000){
    
                  summaryPanel.innerHTML += '<input type="hidden" name="precio_hora" align="center" value="20000">';
                  precio_hora = 20000;
                }else{
                  
                }
                  if (tipo == 175000 && tarifa == 10000){
     
                  summaryPanel.innerHTML += '<input type="hidden" name="precio_hora" align="center" value="30000">';
                  precio_hora = 30000;
                  }else{
                  
                }

                 summaryPanel.innerHTML += '<h5>   Precio Hora aprox del traslado: ' + '<h5>';
                  summaryPanel.innerHTML += '<h5  align="right">' + precio_hora + '<br>';
                  summaryPanel.innerHTML += '<input type="hidden" name="precio_hora" align="center" value="'+ precio_hora + '">';
                  console.log(tarifa);

                  //bencina
                  
                  var kmxlitro = document.getElementById("movil").value;
                  var a = parseInt(route.legs[i].distance.text);
                  var precioCombustible = parseInt((a * document.getElementById("diesel").value)/kmxlitro); 
                  summaryPanel.innerHTML += '<h5>   Precio Combustible: ' + '<h5>';
                  summaryPanel.innerHTML += '<h5  align="right">' + precioCombustible + '<br>';
                  summaryPanel.innerHTML += '<input type="hidden" name="precio_combustible" align="center" value="'+ precioCombustible + '">';
                  console.log(precioCombustible);
                


                  
                  


                 

                 total = (Number(tipo) + Number(precioCombustible) + Number(precio_hora) + Number(kmprecio));
                  console.log(total);

                  summaryPanel.innerHTML += '<h4>   Total:<h5><br>';
                  summaryPanel.innerHTML += '<h4  align="right">' + total + '<br>';
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
