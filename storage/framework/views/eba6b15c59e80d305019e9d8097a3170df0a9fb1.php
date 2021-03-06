<?php $__env->startSection('contenido'); ?>
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado de Móvil <a href="movil/create"><button class="btn btn-success">Nuevo</button></a></h3>
		<?php echo $__env->make('licasoft.movil.search', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<th>Id</th>
					<th>Modelo de Ambulancia</th>
					<th>Conductor</th>
					<th>Estado</th>
					<th>Opciones</th>
				</thead>
               <?php foreach($movil as $cat): ?>
				<tr>
				
					<td><?php echo e($cat->id_movil); ?></td>
					<?php foreach($ambulancias as $ambulancia): ?>
					<?php if($ambulancia['id_ambulancia']  == $cat->id_ambulancia ): ?>
					<td><?php echo e($ambulancia->modelo); ?></td>
					<?php endif; ?>
					<?php endforeach; ?>
					
					<td><?php echo e($cat->id_profesional_conductor); ?></td>
					<td>En transito</td>
					<td>
						<a href="<?php echo e(URL::action('MovilController@edit',$cat->id_movil)); ?>"><button class="btn btn-info">Editar</button></a>
                         <a href="" data-target="#modal-delete-<?php echo e($cat->id_movil); ?>" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
					</td>
				</tr>
				<?php echo $__env->make('licasoft.movil.modal', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
				<?php endforeach; ?>
			</table>
		</div>
		<?php echo e($movil->render()); ?>

	</div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>