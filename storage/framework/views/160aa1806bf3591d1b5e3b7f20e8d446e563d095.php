<?php $__env->startSection('contenido'); ?>
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Fichas Finalizadas</h3>
		<?php echo $__env->make('licasoft.ficha.search', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
			<thead>
					<th>Id</th>
					<th>Convenio</th>
					<th>Paciente</th>
					<th>Origen</th>
					<th>Destino</th>
					<th>Opciones</th>
				</thead>
            <?php foreach($ficha as $cat): ?>
				<tr>
					<td><?php echo e($cat->id_ficha); ?></td>
					<?php foreach($convenios as $convenio): ?>
        				<?php if($convenio['id']  == $cat->id_convenio): ?>
					<td><?php echo e($convenio['name']); ?></td>
        				<?php endif; ?>
					<?php endforeach; ?>
					
			
						<td><?php echo e($cat->rut_paciente); ?></td>
	
					<td><?php echo e($cat->origen); ?></td>
					<td><?php echo e($cat->destino); ?></td>

					<td>
					<a href="" data-target="#modal-delete-<?php echo e($cat->id_ficha); ?>" data-toggle="modal"><button class="btn btn-info">Ver detalles</button></a>
					</td>
				</tr>
				<?php echo $__env->make('licasoft.ficha.modal', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
				<?php endforeach; ?>
			</table>
		</div>
		<?php echo e($ficha->render()); ?>

	</div>
</div>

<?php $__env->stopSection(); ?>


   
<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>