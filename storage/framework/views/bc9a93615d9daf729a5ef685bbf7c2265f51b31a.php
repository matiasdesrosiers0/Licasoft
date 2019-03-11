<?php $__env->startSection('contenido'); ?>
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Peticiones recientes <a href="cotizaciones/create"><button class="btn btn-success">Nuevo</button></a></h3>
		<?php echo $__env->make('licasoft.cotizaciones.search', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<th>Id</th>
					<th>Origen</th>
					<th>Destino</th>
					<th>Estado</th>
					<th>Opciones</th>
				</thead>
               <?php foreach($cotizacion as $cat): ?>
				<tr>
					<td><?php echo e($cat->id_cotizacion); ?></td>
					<td><?php echo e($cat->origen); ?></td>
					<td><?php echo e($cat->destino); ?></td>
					<td><?php echo e($cat->estado); ?></td>
					<td>
                         <a href="" data-target="#modal-delete-<?php echo e($cat->id_cotizacion); ?>" data-toggle="modal"><button class="btn btn-danger">Cancelar Petición</button></a>
					</td>
				</tr>
				<?php echo $__env->make('licasoft.cotizaciones.modal', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
				<?php endforeach; ?>
			</table>
		</div>
		<?php echo e($cotizacion->render()); ?>

	</div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>