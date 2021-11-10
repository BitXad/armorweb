<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Tipo Arma Edit</h3>
            </div>
			<?php echo form_open('tipo_arma/edit/'.$tipo_arma['tipoarma_id']); ?>
			<div class="box-body">
				<div class="row clearfix">
					<div class="col-md-6">
						<label for="tipoarma_descripcion" class="control-label">Tipoarma Descripcion</label>
						<div class="form-group">
							<input type="text" name="tipoarma_descripcion" value="<?php echo ($this->input->post('tipoarma_descripcion') ? $this->input->post('tipoarma_descripcion') : $tipo_arma['tipoarma_descripcion']); ?>" class="form-control" id="tipoarma_descripcion" />
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