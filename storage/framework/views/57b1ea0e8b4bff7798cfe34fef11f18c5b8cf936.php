<?php $__env->startSection('contenido'); ?>
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
			<h3>Editar Ficha Numero: <?php echo e($ficha->id_ficha); ?></h3>
			
			<?php if(count($errors)>0): ?>
			<div class="alert alert-danger">
				<ul>
				<?php foreach($errors->all() as $error): ?>
					<li><?php echo e($error); ?></li>
				<?php endforeach; ?>
				</ul>
			</div>
			<?php endif; ?>

			<?php echo Form::model($ficha,['method'=>'PATCH','route'=>['licasoft.fichaPendiente.update',$ficha->id_ficha]]); ?>

            <?php echo e(Form::token()); ?>

			
        <br>
<label for="nombre">Hora Despacho</label>
			<div class="input-group">
			<?php if($ficha->hora_despacho  == 000000): ?>
                <div class="input-group-btn">
                  <button type="button"  onclick="getElementById('hora_despacho').value = getElementById('horeja').innerHTML" class="btn btn-info btn-flat">Marcar Hora</button>
                </div>
			<?php endif; ?>
                <!-- /btn-group -->
                <input  id="hora_despacho" readonly name="hora_despacho" value="<?php echo e($ficha->hora_despacho); ?>" type="text" class="form-control">
              </div>

<br>
			  <label for="nombre">Hora llegada</label>
			<div class="input-group">
			<?php if($ficha->hora_llegada  == 000000): ?>
			  <div class="input-group-btn">
                  <button type="button" onclick="getElementById('hora_llegada').value = getElementById('horeja').innerHTML" class="btn btn-info btn-flat">Marcar Hora</button>
                </div>
								<?php endif; ?>
                <!-- /btn-group -->
                <input  id="hora_llegada" readonly name="hora_llegada" value="<?php echo e($ficha->hora_llegada); ?>" type="text" class="form-control">
              </div>
			  <br>
			   <label for="nombre">Hora Salida QTH</label>
			<div class="input-group">
			<?php if($ficha->hora_salida_qth  == 000000): ?>
			  <div class="input-group-btn">
                  <button type="button" onclick="getElementById('hora_salida_qth').value = getElementById('horeja').innerHTML" class="btn btn-info btn-flat">Marcar Hora</button>
                </div>
								<?php endif; ?>
                <!-- /btn-group -->
                <input  value="<?php echo e($ficha->hora_salida_qth); ?>" readonly name="hora_salida_qth" id="hora_salida_qth" type="text" class="form-control">
              </div>
			  <br>
			  <label for="nombre">Hora Llegada QTH</label>
			<div class="input-group">
			<?php if($ficha->hora_llegada_qth  == 000000): ?>
			  <div class="input-group-btn">
                  <button type="button" onclick="getElementById('hora_llegada_qth').value = getElementById('horeja').innerHTML" class="btn btn-info btn-flat">Marcar Hora</button>
                </div>
								<?php endif; ?>
                <!-- /btn-group -->
                <input  value="<?php echo e($ficha->hora_llegada_qth); ?>" readonly name="hora_llegada_qth" id="hora_llegada_qth" type="text" class="form-control">
              </div>
			  <br>
            
            
            <div class="form-group">
            	<label for="descripcion">Estado Móvil</label>
            	<input class="form-control" name="estado_movil"  value="<?php echo e($ficha->estado_movil); ?>" type="text" >
            </div>
			<br>
			<label for="nombre">Hora 420</label>
			<div class="input-group">
			<?php if($ficha->hora_420  == 000000): ?>
			
			  <div class="input-group-btn">
                  <button type="button"  onclick="miFuncion()"  class="btn btn-info btn-flat">Marcar Hora</button>
                </div>
								<?php endif; ?>
                <!-- /btn-group -->
                <input  value="<?php echo e($ficha->hora_420); ?>" name="hora_420" readonly id="hora_420" type="text" class="form-control">
              </div>

						<br>
			<label for="nombre">Precio tiempo extra</label>
			<div class="input-group">
			
                <input  name="precio_tiempo_extra" readonly value="<?php echo e($ficha->precio_tiempo_extra); ?>" id="precio_tiempo_extra" type="text" class="form-control">
              </div>

						

		
           <div class="box-footer">
                <button class="btn btn-info pull-right" type="submit">Guardar</button>
            	<button class="btn btn-danger" type="reset">Cancelar</button>
              </div>

			<?php echo Form::close(); ?>		
            
		</div>
	</div>
	<script type="text/javascript">
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

	function miFuncion()
	{
		document.getElementById('hora_420').value = document.getElementById('horeja').innerHTML;
		extra1 = document.getElementById('hora_420').value;
		extra1 = extra1.split(":");
		extra2 = document.getElementById('hora_llegada_qth').value;
		extra2 = extra2.split(":");
		var diferenciaHoras = parseInt(extra1[0]) - parseInt(extra2[0]);
		document.getElementById('precio_tiempo_extra').value = diferenciaHoras*20000;

	}
	</script>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>