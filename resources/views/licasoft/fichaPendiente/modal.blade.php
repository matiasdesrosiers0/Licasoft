<div class="modal fade modal-slide-in-right" aria-hidden="true"
role="dialog" tabindex="-1" id="modal-delete-{{$cat->id_ficha}}">
	{{Form::Open(array('action'=>array('FichaPendienteController@destroy',$cat->id_ficha),'method'=>'delete'))}}
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" 
				aria-label="Close">
                     <span aria-hidden="true">×</span>
                </button>
                <h4 class="modal-title">Finalizar</h4>
			</div>
			<div class="modal-body">
				<p>Confirmar finalización de ficha</p>

	
			  <br>
			   <label for="nombre">Hora Salida QTH</label>
			<div class="form-group">
			
		
                <!-- /btn-group -->
                <input  value="{{$cat->hora_salida_qth}}" readonly name="hora_salida_qth" id="hora_salida_qth" type="text" class="form-control">
              </div>
			  <br>
			  <label for="nombre">Hora Llegada QTH</label>
			<div class="form-group">
		
                <!-- /btn-group -->
                <input  value="{{$cat->hora_llegada_qth}}" readonly name="hora_llegada_qth" id="hora_llegada_qth" type="text" class="form-control">
              </div>
			  <br>
            
            
   
			<br>
			<label for="nombre">Hora 420</label>
			<div class="form-group">
			
	
                <!-- /btn-group -->
                <input  value="{{$cat->hora_420}}" readonly id="hora_420" type="text" class="form-control">
              </div>

			  	<br>
		

			

			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
				<button type="submit" class="btn btn-primary">Confirmar</button>
			</div>
		</div>
	</div>
	{{Form::Close()}}

</div>


<div class="modal fade modal-slide-in-right" aria-hidden="true"
role="dialog" tabindex="-1" id="modal-delete1-{{$cat->id_ficha}}">
	{{Form::Open(array('action'=>array('FichaController@destroy',$cat->id_ficha),'method'=>'delete'))}}
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
							<dt><h4>ESTADO (MÓVIL)</4></dt>
				<dd><h4>{{$cat->estado_movil}}</4></dd>
							<dd>------------------------------------------------------------------------------</dd>

			  <dt><h4>ID Ficha</4></dt>
				<dd><h4>{{$cat->id_ficha}}</4></dd>
				<dt><h4>Fecha</4></dt>
				<dd><h4>{{$cat->fecha}}</4></dd>

				<dt><h4>Convenio</4></dt>
				<dd><h4>{{$cat->id_convenio}}</4></dd>
				<dt><h4>Paciente</4></dt>
				<dd><h4>{{$cat->rut_paciente}}</4></dd>
				<dt><h4>Ambulancia a cargo</4></dt>
				<dd><h4>{{$cat->id_movil}}</4></dd>

				<dt><h4>Origen</4></dt>
				<dd><h4>{{$cat->origen}}</4></dd>

				<dt><h4>Destino</4></dt>
				<dd><h4>{{$cat->destino}}</4></dd>

				<dt><h4>Tipo</4></dt>
				<dd><h4>{{$cat->tipo}}</4></dd>
				<dt><h4>Observación</4></dt>
				<dd><h4>{{$cat->observacion}}</4></dd>
				<dd>------------------------------------------------------------------------------</dd>
				<dt><h4>Hora despacho:</4></dt>
				<dd><h4>{{$cat->hora_despacho}}</4></dd>
				<dt><h4>Hora llegada:</4></dt>
				<dd><h4>{{$cat->hora_llegada}}</4></dd>
				<dt><h4>Hora salida QTH</4></dt>
				<dd><h4>{{$cat->hora_salida_qth}}</4></dd>
				<dt><h4>Hora llegada QTH</4></dt>
				<dd><h4>{{$cat->hora_llegada_qth}}</4></dd>
				<dt><h4>Hora 420</4></dt>
				<dd><h4>{{$cat->hora_420}}</4></dd>
				
				<dd>------------------------------------------------------------------------------</dd>
				<dd>------------------------------------------------------------------------------</dd>
				<dt><h4>Precio Base</4></dt>
				<dd><h4>{{$cat->precio_base}}</4></dd>
				<dt><h4>Precio Hora</4></dt>
				<dd><h4>{{$cat->precio_hora}}</4></dd>
				<dt><h4>Precio Kilometro</4></dt>
				<dd><h4>{{$cat->precio_kilometro}}</4></dd>
				<dt><h4>Precio Extra (tiempo)</4></dt>
				<dd><h4>{{$cat->precio_tiempo_extra}}</4></dd>
				<dd>------------------------------------------------------------------------------</dd>
				<dt><h4>Total</4></dt>			
				<dd><h4>{{$cat->total}}</4></dd>
				<dd>------------------------------------------------------------------------------</dd>
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
	{{Form::Close()}}

</div>