<?php $__env->startSection('contenido'); ?>
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Editar movil Numero: <?php echo e($movil->id_movil); ?></h3>
			<?php if(count($errors)>0): ?>
			<div class="alert alert-danger">
				<ul>
				<?php foreach($errors->all() as $error): ?>
					<li><?php echo e($error); ?></li>
				<?php endforeach; ?>
				</ul>
			</div>
			<?php endif; ?>

			<?php echo Form::model($movil,['method'=>'PATCH','route'=>['licasoft.movil.update',$movil->id_movil]]); ?>

            <?php echo e(Form::token()); ?>


           
		   <div class="form-group">
            	<label for="">Ambulancias</label>
            	<select name="id_ambulancia" class="form-control" >
				<?php foreach($ambulancias as $ambulancia): ?>
				
				<option value="<?php echo e($ambulancia->id_ambulancia); ?>" selected> <?php echo e($ambulancia->modelo); ?></option>
				<?php endforeach; ?>
				</select>
				
            </div>

		<div class="form-group">
            	<label for="">Médico</label>
            	<select name="id_profesional_medico" class="form-control" id="inputAmbulancia_id">
				<?php foreach($profesionales as $profesional): ?>
				<?php if($profesional['cargo']  == 0): ?>
				<option value="<?php echo e($profesional->nombre); ?>" selected> <?php echo e($profesional['nombre']); ?></option>
				<?php endif; ?>
				<?php endforeach; ?>
				</select>
            </div>

		<div class="form-group">
            	<label for="">Paramédico</label>
            	<select name="id_profesional_paramedico" class="form-control" id="inputAmbulancia_id">
				<?php foreach($profesionales as $profesional): ?>
				<?php if($profesional['cargo']  == 1): ?>
				<option value="<?php echo e($profesional->nombre); ?>" selected> <?php echo e($profesional['nombre']); ?></option>
				<?php endif; ?>
				<?php endforeach; ?>
				</select>
            </div>

			<div class="form-group">
            	<label for="">Enfermero/a</label>
            	<select name="id_profesional_enfermero" class="form-control" id="inputAmbulancia_id">
				<?php foreach($profesionales as $profesional): ?>
				<?php if($profesional['cargo']  == 2): ?>
				<option value="<?php echo e($profesional->nombre); ?>" selected> <?php echo e($profesional['nombre']); ?></option>
				<?php endif; ?>
				<?php endforeach; ?>
				</select>
            </div>

			<div class="form-group">
            	<label for="">Regulador</label>
            	<select name="id_profesional_regulador" class="form-control" id="inputAmbulancia_id">
				<?php foreach($profesionales as $profesional): ?>
				<?php if($profesional['cargo']  == 3): ?>
				<option value="<?php echo e($profesional->nombre); ?>" selected> <?php echo e($profesional['nombre']); ?></option>
				<?php endif; ?>
				<?php endforeach; ?>
				</select>
            </div>

			<div class="form-group">
            	<label for="">Conductor</label>
            	<select name="id_profesional_conductor" class="form-control" id="inputAmbulancia_id">
				<?php foreach($profesionales as $profesional): ?>
				<?php if($profesional['cargo']  == 4): ?>
				<option value="<?php echo e($profesional->nombre); ?>" selected> <?php echo e($profesional['nombre']); ?></option>
				<?php endif; ?>
				<?php endforeach; ?>
				</select>
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