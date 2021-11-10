<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Añadir Tipo Arma</h3>
            </div>
            <?php echo form_open('tipo_arma/add'); ?>
          	<div class="box-body">
                    <div class="row clearfix">
                        <div class="col-md-6">
                            <label for="tipoarma_descripcion" class="control-label"><span class="text-danger">*</span>Descripción</label>
                            <div class="form-group">
                                <input type="text" name="tipoarma_descripcion" value="<?php echo $this->input->post('tipoarma_descripcion'); ?>" class="form-control" id="tipoarma_descripcion" required autofocus onkeyup="var start = this.selectionStart; var end = this.selectionEnd; this.value = this.value.toUpperCase(); this.setSelectionRange(start, end);" />
                            </div>
                        </div>
                    </div>
                </div>
          	<div class="box-footer">
                    <button type="submit" class="btn btn-success">
                        <i class="fa fa-check"></i> Guardar
                    </button>
                    <a href="<?php echo site_url('tipo_arma'); ?>" class="btn btn-danger">
                        <i class="fa fa-times"></i> Cancelar</a>
          	</div>
            <?php echo form_close(); ?>
      	</div>
    </div>
</div>