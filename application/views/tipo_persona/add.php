<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Registrar Tipo Persona</h3>
            </div>
            <?php echo form_open('tipo_persona/add'); ?>
          	<div class="box-body">
          		<div class="row clearfix">
					<div class="col-md-6">
						<label for="tipo_descripcion" class="control-label">Descripcion</label>
						<div class="form-group">
							<input type="text" name="tipo_descripcion" value="<?php echo $this->input->post('tipo_descripcion'); ?>" class="form-control" id="tipo_descripcion" />
						</div>
					</div>
				</div>
			</div>
          	<div class="box-footer">
            	<button type="submit" class="btn btn-success">
            		<i class="fa fa-check"></i> Guardar
            	</button>
				<a href="<?php echo site_url('grado_persona'); ?>" class="btn btn-danger"><i class="fa fa-times"></i> Cancelar</a>
          	</div>
            <?php echo form_close(); ?>
      	</div>
    </div>
</div>