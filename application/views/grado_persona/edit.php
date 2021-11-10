<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Editar grado</h3>
            </div>
			<?php echo form_open('grado_persona/edit/'.$grado_persona['grado_id']); ?>
			<div class="box-body">
				<div class="row clearfix">
					<div class="col-md-6">
						<label for="grado_descripcion" class="control-label">Grado</label>
						<div class="form-group">
							<input type="text" name="grado_descripcion" value="<?php echo ($this->input->post('grado_descripcion') ? $this->input->post('grado_descripcion') : $grado_persona['grado_descripcion']); ?>" class="form-control" id="grado_descripcion" onkeyup="var start = this.selectionStart; var end = this.selectionEnd; this.value = this.value.toUpperCase(); this.setSelectionRange(start, end);"
							/>
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