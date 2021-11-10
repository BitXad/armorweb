<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Persona Add</h3>
            </div>
            <?php echo form_open('persona/add'); ?>
          	<div class="box-body">
          		<div class="row clearfix">
					<div class="col-md-6">
						<label for="grado_id" class="control-label">Grado Persona</label>
						<div class="form-group">
							<select name="grado_id" class="form-control">
								<option value="">select grado_persona</option>
								<?php 
								foreach($all_grado_persona as $grado_persona)
								{
									$selected = ($grado_persona['grado_id'] == $this->input->post('grado_id')) ? ' selected="selected"' : "";

									echo '<option value="'.$grado_persona['grado_id'].'" '.$selected.'>'.$grado_persona['grado_descripcion'].'</option>';
								} 
								?>
							</select>
						</div>
					</div>
					<div class="col-md-6">
						<label for="estado_id" class="control-label">Estado</label>
						<div class="form-group">
							<select name="estado_id" class="form-control">
								<option value="">select estado</option>
								<?php 
								foreach($all_estado as $estado)
								{
									$selected = ($estado['estado_id'] == $this->input->post('estado_id')) ? ' selected="selected"' : "";

									echo '<option value="'.$estado['estado_id'].'" '.$selected.'>'.$estado['estado_descripcion'].'</option>';
								} 
								?>
							</select>
						</div>
					</div>
					<div class="col-md-6">
						<label for="tipo_id" class="control-label">Tipo Persona</label>
						<div class="form-group">
							<select name="tipo_id" class="form-control">
								<option value="">select tipo_persona</option>
								<?php 
								foreach($all_tipo_persona as $tipo_persona)
								{
									$selected = ($tipo_persona['tipo_id'] == $this->input->post('tipo_id')) ? ' selected="selected"' : "";

									echo '<option value="'.$tipo_persona['tipo_id'].'" '.$selected.'>'.$tipo_persona['tipo_descripcion'].'</option>';
								} 
								?>
							</select>
						</div>
					</div>
					<div class="col-md-6">
						<label for="persona_nombre" class="control-label">Persona Nombre</label>
						<div class="form-group">
							<input type="text" name="persona_nombre" value="<?php echo $this->input->post('persona_nombre'); ?>" class="form-control" id="persona_nombre" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="persona_apellido" class="control-label">Persona Apellido</label>
						<div class="form-group">
							<input type="text" name="persona_apellido" value="<?php echo $this->input->post('persona_apellido'); ?>" class="form-control" id="persona_apellido" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="persona_ci" class="control-label">Persona Ci</label>
						<div class="form-group">
							<input type="text" name="persona_ci" value="<?php echo $this->input->post('persona_ci'); ?>" class="form-control" id="persona_ci" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="persona_telefono" class="control-label">Persona Telefono</label>
						<div class="form-group">
							<input type="text" name="persona_telefono" value="<?php echo $this->input->post('persona_telefono'); ?>" class="form-control" id="persona_telefono" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="persona_celular" class="control-label">Persona Celular</label>
						<div class="form-group">
							<input type="text" name="persona_celular" value="<?php echo $this->input->post('persona_celular'); ?>" class="form-control" id="persona_celular" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="persona_direccion" class="control-label">Persona Direccion</label>
						<div class="form-group">
							<input type="text" name="persona_direccion" value="<?php echo $this->input->post('persona_direccion'); ?>" class="form-control" id="persona_direccion" />
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