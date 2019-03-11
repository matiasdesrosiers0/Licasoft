<?php $__env->startSection('contenido'); ?>
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado de Pacientes <a href="paciente/create"><button class="btn btn-success">Nuevo</button></a></h3>
		<?php echo $__env->make('licasoft.paciente.search', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<th>Rut</th>
					<th>Nombres</th>
					<th>Apellidos</th>
				
					<th>Opciones</th>
				</thead>
               <?php foreach($pacientes as $cat): ?>
			   <?php if(Auth::user()->id == $cat->id_convenio): ?>
				<tr>
				
					<td><?php echo e($cat->rut_paciente); ?></td>
					<td><?php echo e($cat->nombres); ?></td>
					<td><?php echo e($cat->apellidos); ?></td>
				
					<td>
						<a href="<?php echo e(URL::action('PacientesController@edit',$cat->rut_paciente)); ?>"><button class="btn btn-info">Editar</button></a>
                         <a href="" data-target="#modal-delete-<?php echo e($cat->rut_paciente); ?>" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
					</td>
				</tr>
				<?php endif; ?>
				<?php echo $__env->make('licasoft.paciente.modal', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
				<?php endforeach; ?>
			</table>
		</div>
		<?php echo e($pacientes->render()); ?>

	</div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>