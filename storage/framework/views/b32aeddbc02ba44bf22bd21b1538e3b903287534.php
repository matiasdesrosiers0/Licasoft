<?php $__env->startSection('contenido'); ?>
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado de Profesionales <a href="profesionales/create"><button class="btn btn-success">Nuevo</button></a></h3>
		<?php echo $__env->make('licasoft.profesionales.search', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<th>Id</th>
					<th>Nombre</th>
					<th>Teléfono</th>
					<th>Cargo</th>
					<th>Opciones</th>
				</thead>
               <?php foreach($profesionales as $cat): ?>
				<tr>
					<td><?php echo e($cat->id_profesional); ?></td>
					<td><?php echo e($cat->nombre); ?></td>
					<td><?php echo e($cat->telefono); ?></td>
					<td><?php echo e($cat->cargo); ?></td>
					<td>
						<a href="<?php echo e(URL::action('ProfesionalesController@edit',$cat->id_profesional)); ?>"><button class="btn btn-info">Editar</button></a>
                         <a href="" data-target="#modal-delete-<?php echo e($cat->id_profesional); ?>" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
					</td>
				</tr>
				<?php echo $__env->make('licasoft.profesionales.modal', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
				<?php endforeach; ?>
			</table>
		</div>
		<?php echo e($profesionales->render()); ?>

	</div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>