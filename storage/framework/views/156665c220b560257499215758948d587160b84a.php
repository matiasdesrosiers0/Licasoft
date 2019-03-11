<?php $__env->startSection('contenido'); ?>
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Editar Ambulancia Numero: <?php echo e($ambulancias->id_ambulancia); ?></h3>
			<?php if(count($errors)>0): ?>
			<div class="alert alert-danger">
				<ul>
				<?php foreach($errors->all() as $error): ?>
					<li><?php echo e($error); ?></li>
				<?php endforeach; ?>
				</ul>
			</div>
			<?php endif; ?>

			<?php echo Form::model($ambulancias,['method'=>'PATCH','route'=>['licasoft.ambulancias.update',$ambulancias->id_ambulancia]]); ?>

            <?php echo e(Form::token()); ?>


            <div class="form-group">
            	<label for="nombre">Modelo</label>
            	<input type="text" name="modelo" class="form-control" value="<?php echo e($ambulancias->modelo); ?>" placeholder="Modelo...">
            </div>
            <div class="form-group">
            	<label for="descripcion">Marca/a</label>
            	<input type="text" name="marca" class="form-control" value="<?php echo e($ambulancias->marca); ?>" placeholder="Marca/a...">
            </div>
    
			<div class="form-group">
            	<label for="">Combustible</label>
            	<select name="combustible" class="form-control" value="<?php echo e($ambulancias->combustible); ?>">
			
				<option value="1"> Diesel</option>
				<option value="2"> Gasolina 93</option>
				<option value="3"> Gasolina 95</option>
				<option value="4"> Gasolina 97</option>
				</select>
				</div>

			<div class="form-group">
            	<label for="descripcion">Kilometros por litro de Combustible</label>
            	<input type="text" name="kmxlitro" class="form-control" value="<?php echo e($ambulancias->kmxlitro); ?>" placeholder="km...">
            </div>
            <div class="form-group">
            	<label for="descripcion">Año</label>
            	<input type="text" name="año" class="form-control" value="<?php echo e($ambulancias->año); ?>" placeholder="Año...">
            </div>
            <label for="descripcion">Estado</label>
			      <select class="form-control" name="estado" value="<?php echo e($ambulancias->estado); ?>" placeholder="Ingrese opción...">
                    <option value="true">Disponible</option>
                    <option value="false">No Disponible</option>
                  </select>
            <div class="form-group">
            	<label for="descripcion">Otros</label>
            	<input type="text" name="otros" class="form-control" value="<?php echo e($ambulancias->otros); ?>" placeholder="otros...">
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