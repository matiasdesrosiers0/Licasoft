<?php $__env->startSection('contenido'); ?>
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Nuevo Profesional</h3>
			<?php if(count($errors)>0): ?>
			<div class="alert alert-danger">
				<ul>
				<?php foreach($errors->all() as $error): ?>
					<li><?php echo e($error); ?></li>
				<?php endforeach; ?>
				</ul>
			</div>
			<?php endif; ?>

			<?php echo Form::open(array('url'=>'licasoft/profesionales','method'=>'POST','autocomplete'=>'off')); ?>

            <?php echo e(Form::token()); ?>

            <div class="form-group">
            	<label for="nombre">Nombre</label>
            	<input type="text" name="nombre" class="form-control" placeholder="Nombre...">
            </div>
			<label for="descripcion">Cargo</label>
			<select class="form-control" name="cargo" placeholder="Ingrese opción...">
                    <option value="0">Médico</option>
                    <option value="1">Paramedico</option>
					<option value="2">Enfermero</option>
					<option value="3">Regulador</option>
					<option value="4">Conductor</option>
                  </select>
  
            <div class="form-group">
            	<label for="descripcion">Telefono</label>
            	<input type="text" name="telefono" class="form-control" placeholder="Teléfono...">
            </div>
            
            <div class="form-group">
            	<button class="btn btn-primary" type="submit">Guardar</button>
            	<button class="btn btn-danger" type="reset">Cancelar</button>
            </div>

			<?php echo Form::close(); ?>		
            
		</div>
	</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>