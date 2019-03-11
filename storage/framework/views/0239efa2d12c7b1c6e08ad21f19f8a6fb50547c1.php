<?php $__env->startSection('contenido'); ?>
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Editar Paciente: <?php echo e($pacientes->nombres); ?></h3>
			<?php if(count($errors)>0): ?>
			<div class="alert alert-danger">
				<ul>
				<?php foreach($errors->all() as $error): ?>
					<li><?php echo e($error); ?></li>
				<?php endforeach; ?>
				</ul>
			</div>
			<?php endif; ?>

			<?php echo Form::model($pacientes,['method'=>'PATCH','route'=>['licasoft.paciente.update',$pacientes->rut_paciente]]); ?>

            <?php echo e(Form::token()); ?>


			<div class="form-group">
            	<label for="nombre">RUT</label>
            	<input type="text" disabled name="rut_paciente" value="<?php echo e($pacientes->rut_paciente); ?>" class="form-control" placeholder="Nombre...">
            </div>
            <div class="form-group">
            	<label for="nombre">Nombres</label>
            	<input type="text" name="nombres" class="form-control" placeholder="Nombre..." value="<?php echo e($pacientes->nombres); ?>">
            </div>
			<div class="form-group">
            	<label for="nombre">Apellidos</label>
            	<input type="text" name="apellidos" class="form-control" placeholder="Nombre..." value="<?php echo e($pacientes->apellidos); ?>">
            </div>
			<div class="form-group">
            	<label for="nombre">Edad</label>
            	<input type="number" name="edad" class="form-control" placeholder="Nombre..." value="<?php echo e($pacientes->edad); ?>">
            </div>
			<label for="descripcion">Edad</label>
			<select class="form-control" name="sexo" placeholder="Ingrese opción..." value="<?php echo e($pacientes->sexo); ?>">
                    <option value="0">Hombre</option>
                    <option value="1">Mujer</option>

                  </select>
  
				  <div class="form-group">
            	<label for="">Convenio</label>
            	<select name="id_convenio" class="form-control" id="inputAmbulancia_id"  value="<?php echo e($pacientes->id_convenio); ?>">
				<?php foreach($convenios as $convenio): ?>
				<option value="<?php echo e($convenio['id_convenio']); ?>"> <?php echo e($convenio['nombre']); ?></option>
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