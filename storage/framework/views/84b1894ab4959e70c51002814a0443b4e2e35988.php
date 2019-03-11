<?php $__env->startSection('contenido'); ?>



	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Nuevo Convenio</h3>
			<?php if(count($errors)>0): ?>
			<div class="alert alert-danger">
				<ul>
				<?php foreach($errors->all() as $error): ?>
					<li><?php echo e($error); ?></li>
				<?php endforeach; ?>
				</ul>
			</div>
			<?php endif; ?>

			<?php echo Form::open(array('url'=>'register','method'=>'POST','autocomplete'=>'off')); ?>

            <?php echo e(Form::token()); ?>



            <div class="form-group">
            	<label for="nombre">Nombre</label>
            	<input type="text" name="name" class="form-control" placeholder="Nombre...">
            </div>
						<input type="hidden" name="tipo" class="form-control" value="0" placeholder="Nombre...">


			<div class="form-group">
            	<label for="nombre">Dirección</label>
				<input id="pac-input" name="direccion" class="form-control" type="text" placeholder="Buscar direccion">
            </div>
						<div class="form-group">
            	<label for="telefono">Teléfono</label>
            	<input type="text" name="telefono" class="form-control" placeholder="Telefono...">
            </div>
						<div class="form-group">

            	<label for="email">Email</label>
							<input id="email" type="email" class="form-control" name="email" value="<?php echo e(old('email')); ?>">
            </div>

						  <div class="form-group<?php echo e($errors->has('password') ? ' has-error' : ''); ?>">
                            <label for="password">Contraseña</label>

                                <input id="password" type="password" class="form-control" name="password">

                        </div>
								<div class="form-group<?php echo e($errors->has('password_confirmation') ? ' has-error' : ''); ?>">
                            <label for="password-confirm">Confirmar Contraseña</label>
         
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation">

                             
                        </div>






    <script>
     
      function initAutocomplete() {
        // Create the search box and link it to the UI element.
        var input = document.getElementById('pac-input');
        var searchBox = new google.maps.places.SearchBox(input);
        map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

      }

    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD_W7zh62TaP-ibgdEoYQaGqfPnflzprCg&libraries=places&callback=initAutocomplete"
         async defer></script>

				<div class="box-footer">
                <button class="btn btn-info pull-right" type="submit">Guardar</button>
            	<button class="btn btn-danger" type="reset">Cancelar</button>
              </div>

			  
            

			<?php echo Form::close(); ?>		

			
            
		</div>
	</div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>