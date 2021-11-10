<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Editar Persona</h3>
            </div>
			<?php echo form_open_multipart('persona/edit/'.$persona['persona_id']); ?>
			<div class="box-body">
				<div class="row clearfix">
					<div class="col-md-6">
					<label for="grado_id" class="control-label"><span style="color: red">*</span>Grado</label>
						<div class="form-group">
							<select name="grado_id" class="form-control" required>
								<option value="">Seleccione grado</option>
								<?php 
								foreach($all_grado_persona as $grado_persona)
								{
									$selected = ($grado_persona['grado_id'] == $persona['grado_id']) ? ' selected="selected"' : "";

									echo '<option value="'.$grado_persona['grado_id'].'" '.$selected.'>'.$grado_persona['grado_descripcion'].'</option>';
								} 
								?>
							</select>
						</div>
					</div>
					<div class="col-md-6">
						<label for="estado_id" class="control-label"><span style="color: red">*</span>Estado</label>
						<div class="form-group">
							<select name="estado_id" class="form-control" required>
								<option value="">Seleccione estado</option>
								<?php 
								foreach($all_estado as $estado)
								{
									$selected = ($estado['estado_id'] == $persona['estado_id']) ? ' selected="selected"' : "";

									echo '<option value="'.$estado['estado_id'].'" '.$selected.'>'.$estado['estado_descripcion'].'</option>';
								} 
								?>
							</select>
						</div>
					</div>
					<div class="col-md-6">
						<label for="tipo_id" class="control-label"><span style="color: red">*</span>Tipo Persona</label>
						<div class="form-group">
							<select name="tipo_id" class="form-control" required>
								<option value="">select tipo_persona</option>
								<?php 
								foreach($all_tipo_persona as $tipo_persona)
								{
									$selected = ($tipo_persona['tipo_id'] == $persona['tipo_id']) ? ' selected="selected"' : "";

									echo '<option value="'.$tipo_persona['tipo_id'].'" '.$selected.'>'.$tipo_persona['tipo_descripcion'].'</option>';
								} 
								?>
							</select>
						</div>
					</div>
					<div class="col-md-6">
						<label for="persona_nombre" class="control-label"><span style="color: red">*</span>Nombre(s)</label>
						<div class="form-group">
							<input type="text" name="persona_nombre" value="<?php echo ($this->input->post('persona_nombre') ? $this->input->post('persona_nombre') : $persona['persona_nombre']); ?>" class="form-control" id="persona_nombre" onkeyup="var start = this.selectionStart; var end = this.selectionEnd; this.value = this.value.toUpperCase(); this.setSelectionRange(start, end);"/>
						</div>
					</div>
					<div class="col-md-6">
						<label for="persona_apellido" class="control-label"><span style="color: red">*</span>Apellido(s)</label>
						<div class="form-group">
							<input type="text" name="persona_apellido" value="<?php echo ($this->input->post('persona_apellido') ? $this->input->post('persona_apellido') : $persona['persona_apellido']); ?>" class="form-control" id="persona_apellido" onkeyup="var start = this.selectionStart; var end = this.selectionEnd; this.value = this.value.toUpperCase(); this.setSelectionRange(start, end);"/>
						</div>
					</div>
					<div class="col-md-6">
						<label for="persona_ci" class="control-label"><span style="color: red">*</span>Carnet de indentidad</label>
						<div class="form-group">
							<input type="text" name="persona_ci" value="<?php echo ($this->input->post('persona_ci') ? $this->input->post('persona_ci') : $persona['persona_ci']); ?>" class="form-control" id="persona_ci" onkeyup="var start = this.selectionStart; var end = this.selectionEnd; this.value = this.value.toUpperCase(); this.setSelectionRange(start, end);"/>
						</div>
					</div>
					<div class="col-md-6">
						<label for="persona_telefono" class="control-label">Telefono</label>
						<div class="form-group">
							<input type="text" name="persona_telefono" value="<?php echo ($this->input->post('persona_telefono') ? $this->input->post('persona_telefono') : $persona['persona_telefono']); ?>" class="form-control" id="persona_telefono" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="persona_celular" class="control-label">Celular</label>
						<div class="form-group">
							<input type="text" name="persona_celular" value="<?php echo ($this->input->post('persona_celular') ? $this->input->post('persona_celular') : $persona['persona_celular']); ?>" class="form-control" id="persona_celular" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="persona_direccion" class="control-label">Direccion</label>
						<div class="form-group">
							<input type="text" name="persona_direccion" value="<?php echo ($this->input->post('persona_direccion') ? $this->input->post('persona_direccion') : $persona['persona_direccion']); ?>" class="form-control" id="persona_direccion" onkeyup="var start = this.selectionStart; var end = this.selectionEnd; this.value = this.value.toUpperCase(); this.setSelectionRange(start, end);"/>
						</div>
					</div>
					<div class="col-md-6">
						<label for="persona_foto" class="control-label"><span style="color: red">*</span>Foto</label>
						<div class="form-group">
						<input type="file" name="persona_foto" id="persona_foto" kl_virtual_keyboard_secure_input="on" class="form-control.input" value="<?php echo ($this->input->post('persona_foto') ? $this->input->post('persona_foto') : $persona['persona_foto']);?>" >
						<input type="hidden" name="persona_foto1" value="<?php echo ($this->input->post('persona_foto') ? $this->input->post('persona_foto') : $persona['persona_foto']); ?>" class="form-control" id="persona_foto1" />
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