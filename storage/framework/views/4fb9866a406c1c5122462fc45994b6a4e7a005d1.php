<?php $__env->startSection('contenido'); ?>
<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Editar Convenio: <?php echo e($convenios->nombre); ?></h3>
			<?php if(count($errors)>0): ?>
			<div class="alert alert-danger">
				<ul>
				<?php foreach($errors->all() as $error): ?>
					<li><?php echo e($error); ?></li>
				<?php endforeach; ?>
				</ul>
			</div>
			<?php endif; ?>

			<?php echo Form::model($convenios,['method'=>'PATCH','route'=>['licasoft.convenios.updateMap',$convenios->id_convenio]]); ?>

            <?php echo e(Form::token()); ?>


            <?php

$find              = null;
$latitude          = null;
$longitude         = null;
$formatted_address = null;

if (isset($_GET['find'])) {

    // Parametros de Configuracion
    $api_key = "AIzaSyD_W7zh62TaP-ibgdEoYQaGqfPnflzprCg"; // API Key Google Maps

    $find = urlencode(trim($_GET['find']));

    // Webservices
    $google_maps_url   = "https://maps.googleapis.com/maps/api/geocode/json?address=" . $find . "&key=" . "AIzaSyD_W7zh62TaP-ibgdEoYQaGqfPnflzprCg";
    $google_maps_json  = file_get_contents($google_maps_url);
    $google_maps_array = json_decode($google_maps_json, true);

    // Get Location
    $latitude          = ($google_maps_array["results"][0]["geometry"]['location']['lat']);
    $longitude         = ($google_maps_array["results"][0]["geometry"]['location']['lng']);
    $formatted_address = ($google_maps_array["results"][0]["formatted_address"]);
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jose's Map</title>
    <link rel="stylesheet" href="<?php echo e(asset('css/flatly.min.css')); ?>">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=<?="AIzaSyD_W7zh62TaP-ibgdEoYQaGqfPnflzprCg"?>" ></script>
    <style>
        #map{
            width: 100%;
            height: 400px;
            border: #2c3e50 solid;
            border-width: 4px 4px 4px 4px;
        }
    </style>
    <script src="<?php echo e(asset('js/gmaps.min.js')); ?>"></script>
    <script type="text/javascript">
        var map;
        $(document).ready(function(){
            map = new GMaps({
                div: '#map',
                lat: <?=$latitude?>,
                lng: <?=$longitude?>,
                zoom: 16,
                mapTypeId: google.maps.MapTypeId.HYBRID
            });

            map.addMarker({
                lat: <?=$latitude?>,
                lng: <?=$longitude?>,
                title: '<?=$formatted_address?>',
                infoWindow: {
                    content: '<?=$formatted_address?>'
                }
            });
        });
    </script>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 style="text-align: center;">Google Maps Geocoding API - PHP</h1>
                <form class="form-inline" method="get" style="text-align: center;">
                    <div class="form-group">
                        <input class="form-control" type="text" name="find" id="find" value="<?=urldecode($find)?>">
                    </div>
                    <input class="btn btn-primary" type="submit" value="Find">
                </form>
                <br>
                <div style="text-align: center;">
                    <kbd><kbd>Latitude:</kbd><?=$latitude?>, <kbd>Longitude:</kbd><?=$longitude?></kbd>
                </div>
            </div>
        </div>
        <hr>
        <div class="row">
            <div id="map"></div>
        </div>
    </div>
    <script src="<?php echo e(asset('js/bootstrap.min.js')); ?>"></script>
</body>
</html>




            <div class="form-group">
            	<button class="btn btn-primary" type="submit">Guardar</button>
            	<button class="btn btn-danger" type="reset">Cancelar</button>
            </div>

			<?php echo Form::close(); ?>		
            
		</div>
	</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>