
<div class="modal fade modal-slide-in-right" aria-hidden="true"
role="dialog" tabindex="-1" id="modal-delete-<?php echo e($cat->id_ficha); ?>">
	<?php echo e(Form::Open(array('action'=>array('FichaController@destroy',$cat->id_ficha),'method'=>'delete'))); ?>

	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" 
				aria-label="Close">
                     <span aria-hidden="true">×</span>
                </button>
                <h4 class="modal-title">Detalle</h4>
			</div>
			<div class="modal-body">
	
         
            <!-- /.box-header -->
           
              
			<div class="col-md-12">
          <div class="box box-solid">
            
            <!-- /.box-header -->
            <div class="box-body">
              <dl class="dl-horizontal">
			  <dt><h4>ID Ficha</4></dt>
				<dd><h4><?php echo e($cat->id_ficha); ?></4></dd>
				<dt><h4>Fecha</4></dt>
				<dd><h4><?php echo e($cat->fecha); ?></4></dd>

				<dt><h4>Convenio</4></dt>
				<dd><h4><?php echo e($cat->id_convenio); ?></4></dd>
				<dt><h4>Paciente</4></dt>
				<dd><h4><?php echo e($cat->rut_paciente); ?></4></dd>
				<dt><h4>Ambulancia a cargo</4></dt>
				<dd><h4><?php echo e($cat->id_movil); ?></4></dd>

				<dt><h4>Origen</4></dt>
				<dd><h4><?php echo e($cat->origen); ?></4></dd>

				<dt><h4>Destino</4></dt>
				<dd><h4><?php echo e($cat->destino); ?></4></dd>

				<dt><h4>Tipo</4></dt>
				<dd><h4><?php echo e($cat->tipo); ?></4></dd>
				<dt><h4>Observación</4></dt>
				<dd><h4><?php echo e($cat->observacion); ?></4></dd>
				<dt><h4>Precio Base</4></dt>
				<dd><h4><?php echo e($cat->precio_base); ?></4></dd>
				<dt><h4>Precio Hora</4></dt>
				<dd><h4><?php echo e($cat->precio_hora); ?></4></dd>
				<dt><h4>Precio Kilometro</4></dt>
				<dd><h4><?php echo e($cat->precio_kilometro); ?></4></dd>
				<dt><h4>Precio Extra (tiempo)</4></dt>
				<dd><h4><?php echo e($cat->precio_tiempo_extra); ?></4></dd>
				<dt><h4>Total</4></dt>
				<dd><h4><?php echo e($cat->total); ?></4></dd>
              </dl>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
			
              
            
            <!-- /.box-body -->
   
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
			</div>
		</div>
	</div>
	<?php echo e(Form::Close()); ?>


</div>