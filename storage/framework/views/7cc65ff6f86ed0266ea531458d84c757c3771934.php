<?php $__env->startSection('contenido'); ?>
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Precios de Traslados realizados del Convenio: <?php echo e(Auth::user()->name); ?>  </h3>
		<?php echo $__env->make('licasoft.deuda.search', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
			<thead>
					<th>Id</th>
					<th>Fecha</th>
					<th>Origen</th>
					<th>Destino</th>
					<th>Total Traslado</th>
			
					<th>Opciones</th>
				</thead>
		<?php foreach($ficha as $cat): ?>
		<?php if(Auth::user()->id== $cat->id_convenio): ?>
		
		<tr>
					<td><?php echo e($cat->id_ficha); ?></td>
					<td><?php echo e($cat->fecha); ?></td>
		
					<td><?php echo e($cat->origen); ?></td>
					
					<td><?php echo e($cat->destino); ?></td>
					<td><?php echo e($cat->total); ?></td>
					
					<td>
					<a href="" data-target="#modal-delete-<?php echo e($cat->id_ficha); ?>" data-toggle="modal"><button class="btn btn-info">Ver detalles</button></a>
					</td>
				</tr>
				<?php endif; ?>
			<?php echo $__env->make('licasoft.ficha.modal', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
		<?php endforeach; ?>
				
				
			</table>
		</div>
		<?php foreach($ficha2 as $fichas): ?>
					<?php if(Auth::user()->id== $fichas->id_convenio): ?>
					<?php foreach($convenios as $papa): ?>
					<?php if($papa['id']  == $fichas->id_convenio ): ?>
					<h1>Deuda Acumulada este mes : $<?php echo e($fichas->resultado); ?></h1>
					<?php endif; ?>
					<?php endforeach; ?>
					<?php endif; ?>
					<?php endforeach; ?>
		
		<?php echo e($ficha->render()); ?>

	</div>
</div>

<?php $__env->stopSection(); ?>


   
<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>