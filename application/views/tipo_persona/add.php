<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Tipo Persona Add</h3>
            </div>
            <?php echo form_open('tipo_persona/add'); ?>
          	<div class="box-body">
          		<div class="row clearfix">
					<div class="col-md-6">
						<label for="tipo_descripcion" class="control-label">Tipo Descripcion</label>
						<div class="form-group">
							<input type="text" name="tipo_descripcion" value="<?php echo $this->input->post('tipo_descripcion'); ?>" class="form-control" id="tipo_descripcion" />
						</div>
					</div>
				</div>
			</div>
          	<div class="box-footer">
            	<button type="submit" class="btn btn-success">
            		<i class="fa fa-check"></i> Save
            	</button>
          	</div>
            <?php echo form_close(); ?>
      	</div>
    </div>
</div>