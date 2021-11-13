
<div class="box-header">
    <font size='4' face='Arial' class="color_fff"><b>Reimpresión</b></font>
    <br><font size='2' face='Arial' class="color_fff">De comprobantes </font>
    <div class="box-tools">
    </div>
</div>
        
<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
<!--            <div class="box-header with-border">
              	<h3 class="box-title">Agregar registro</h3>
            </div>-->
<?php echo form_open('registro/reimprimir'); ?>
            
          	<div class="box-body">
          		<div class="row clearfix"></div>
		
					
					<div class="col-md-6">
						<label for="registro_id" class="control-label">Reimpresión</label>
						<div class="form-group">
							<input type="text" name="registro_id" value="<?php echo $this->input->post('registro_observacion'); ?>" class="form-control" id="registro_id" />
						</div>
					</div>
                        
					<div class="col-md-6">
						<label for="num_opcion" class="control-label">Tipo comprobante</label>
						<div class="form-group">
                                                    
                                                    <select class="form-control" name="num_opcion">
                                                        <option value="1">SALIDA DE ARMAMENTO</option>
                                                        <option value="2">DEVOLUCION DE ARMAMENTO</option>
                                                    </select>
                                                    
                                                    
						</div>
					</div>
                        
				</div>
				<div class="box-footer">
				  <button type="submit" class="btn btn-success">
					  <i class="fa fa-print"></i> Guardar
				  </button>
				  <a href="<?php echo site_url('arma/prestamos_activos'); ?>" class="btn btn-danger"><i class="fa fa-times"></i> Cancelar</a>
				</div> 
		
        <?php echo form_close(); ?>      
			</div>
      
      	</div>
    </div>