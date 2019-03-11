<?php $__env->startSection('contenido'); ?>
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Editar Profesional: <?php echo e($profesionales->nombre); ?></h3>
			<?php if(count($errors)>0): ?>
			<div class="alert alert-danger">
				<ul>
				<?php foreach($errors->all() as $error): ?>
					<li><?php echo e($error); ?></li>
				<?php endforeach; ?>
				</ul>
			</div>
			<?php endif; ?>

			<?php echo Form::model($profesionales,['method'=>'PATCH','route'=>['licasoft.profesionales.update',$profesionales->id_profesional]]); ?>

            <?php echo e(Form::token()); ?>


			<div class="form-group">
            	<label for="nombre">Nombre</label>
				<input id="pac-input" name="nombre" class="form-control" value="<?php echo e($profesionales->nombre); ?>" type="text" placeholder="Buscar direccion" >
            </div>

			<div class="form-group">
            	<label for="nombre">Cargo</label>
				<input id="pac-input" name="cargo" class="form-control" value="<?php echo e($profesionales->cargo); ?>" type="text" placeholder="Buscar direccion" >
            </div>

			<div class="form-group">
            	<label for="nombre">Teléfono</label>
				<input id="pac-input" name="telefono" class="form-control" value="<?php echo e($profesionales->telefono); ?>" type="text" placeholder="Buscar direccion">
            </div>


           <div class="box-footer">
                <button class="btn btn-info pull-right type="submit">Guardar</button>
            	<button class="btn btn-danger" type="reset">Cancelar</button>
              </div>

			<?php echo Form::close(); ?>		
            
		</div>
	</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>