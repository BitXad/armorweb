<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Usuario Add</h3>
            </div>
            <?php echo form_open('usuario/add'); ?>
          	<div class="box-body">
          		<div class="row clearfix">
					<div class="col-md-6">
						<label for="usuario_nombre" class="control-label">Usuario Nombre</label>
						<div class="form-group">
							<input type="text" name="usuario_nombre" value="<?php echo $this->input->post('usuario_nombre'); ?>" class="form-control" id="usuario_nombre" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="usuario_login" class="control-label">Usuario Login</label>
						<div class="form-group">
							<input type="text" name="usuario_login" value="<?php echo $this->input->post('usuario_login'); ?>" class="form-control" id="usuario_login" />
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