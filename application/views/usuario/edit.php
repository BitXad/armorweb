<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Editar usuario</h3>
            </div>
			<?php echo form_open('usuario/edit/'.$usuario['usuario_id']); ?>
			<div class="box-body">
				<div class="row clearfix">
					<div class="col-md-6">
						<label for="usuario_nombre" class="control-label">Nombre</label>
						<div class="form-group">
							<input type="text" name="usuario_nombre" value="<?php echo ($this->input->post('usuario_nombre') ? $this->input->post('usuario_nombre') : $usuario['usuario_nombre']); ?>" class="form-control" id="usuario_nombre" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="usuario_login" class="control-label">Usuario Login</label>
						<div class="form-group">
							<input type="text" name="usuario_login" value="<?php echo ($this->input->post('usuario_login') ? $this->input->post('usuario_login') : $usuario['usuario_login']); ?>" class="form-control" id="usuario_login" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="usuario_clave" class="control-label">Usuario clave</label>
						<div class="form-group">
							<input type="password" name="usuario_clave" value="<?php echo ($this->input->post('usuario_clave') ? $this->input->post('usuario_clave') : $usuario['usuario_login']); ?>" class="form-control" id="usuario_login" />
						</div>
					</div>
				</div>
			</div>
			<div class="box-footer">
            	<button type="submit" class="btn btn-success">
					<i class="fa fa-check"></i> Guardar
				</button>
				<a href="<?php echo site_url('usuario'); ?>" class="btn btn-danger"><i class="fa fa-times"></i> Cancelar</a>
	        </div>				
			<?php echo form_close(); ?>
		</div>
    </div>
</div>