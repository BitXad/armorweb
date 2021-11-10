<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Arma Add</h3>
            </div>
            <?php echo form_open('arma/add'); ?>
          	<div class="box-body">
          		<div class="row clearfix">
					<div class="col-md-6">
						<label for="tipoarma_id" class="control-label">Tipo Arma</label>
						<div class="form-group">
							<select name="tipoarma_id" class="form-control">
								<option value="">select tipo_arma</option>
								<?php 
								foreach($all_tipo_arma as $tipo_arma)
								{
									$selected = ($tipo_arma['tipoarma_id'] == $this->input->post('tipoarma_id')) ? ' selected="selected"' : "";

									echo '<option value="'.$tipo_arma['tipoarma_id'].'" '.$selected.'>'.$tipo_arma['tipoarma_descripcion'].'</option>';
								} 
								?>
							</select>
						</div>
					</div>
					<div class="col-md-6">
						<label for="persona_id" class="control-label">Persona</label>
						<div class="form-group">
							<select name="persona_id" class="form-control">
								<option value="">select persona</option>
								<?php 
								foreach($all_persona as $persona)
								{
									$selected = ($persona['persona_id'] == $this->input->post('persona_id')) ? ' selected="selected"' : "";

									echo '<option value="'.$persona['persona_id'].'" '.$selected.'>'.$persona['persona_nombre'].'</option>';
								} 
								?>
							</select>
						</div>
					</div>
					<div class="col-md-6">
						<label for="usuario_id" class="control-label">Usuario</label>
						<div class="form-group">
							<select name="usuario_id" class="form-control">
								<option value="">select usuario</option>
								<?php 
								foreach($all_usuario as $usuario)
								{
									$selected = ($usuario['usuario_id'] == $this->input->post('usuario_id')) ? ' selected="selected"' : "";

									echo '<option value="'.$usuario['usuario_id'].'" '.$selected.'>'.$usuario['usuario_nombre'].'</option>';
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
						<label for="arma_numorden" class="control-label">Arma Numorden</label>
						<div class="form-group">
							<input type="text" name="arma_numorden" value="<?php echo $this->input->post('arma_numorden'); ?>" class="form-control" id="arma_numorden" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="arma_codigo" class="control-label"><span class="text-danger">*</span>Arma Codigo</label>
						<div class="form-group">
							<input type="text" name="arma_codigo" value="<?php echo $this->input->post('arma_codigo'); ?>" class="form-control" id="arma_codigo" />
							<span class="text-danger"><?php echo form_error('arma_codigo');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="arma_fechaingreso" class="control-label">Arma Fechaingreso</label>
						<div class="form-group">
							<input type="text" name="arma_fechaingreso" value="<?php echo $this->input->post('arma_fechaingreso'); ?>" class="has-datepicker form-control" id="arma_fechaingreso" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="arma_horaingreso" class="control-label">Arma Horaingreso</label>
						<div class="form-group">
							<input type="text" name="arma_horaingreso" value="<?php echo $this->input->post('arma_horaingreso'); ?>" class="form-control" id="arma_horaingreso" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="arma_procedencia" class="control-label">Arma Procedencia</label>
						<div class="form-group">
							<input type="text" name="arma_procedencia" value="<?php echo $this->input->post('arma_procedencia'); ?>" class="form-control" id="arma_procedencia" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="arma_marca" class="control-label">Arma Marca</label>
						<div class="form-group">
							<input type="text" name="arma_marca" value="<?php echo $this->input->post('arma_marca'); ?>" class="form-control" id="arma_marca" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="arma_calibre" class="control-label">Arma Calibre</label>
						<div class="form-group">
							<input type="text" name="arma_calibre" value="<?php echo $this->input->post('arma_calibre'); ?>" class="form-control" id="arma_calibre" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="arma_aniodotacion" class="control-label">Arma Aniodotacion</label>
						<div class="form-group">
							<input type="text" name="arma_aniodotacion" value="<?php echo $this->input->post('arma_aniodotacion'); ?>" class="form-control" id="arma_aniodotacion" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="arma_lugardotacion" class="control-label">Arma Lugardotacion</label>
						<div class="form-group">
							<input type="text" name="arma_lugardotacion" value="<?php echo $this->input->post('arma_lugardotacion'); ?>" class="form-control" id="arma_lugardotacion" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="arma_novedades" class="control-label">Arma Novedades</label>
						<div class="form-group">
							<input type="text" name="arma_novedades" value="<?php echo $this->input->post('arma_novedades'); ?>" class="form-control" id="arma_novedades" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="arma_responsable" class="control-label">Arma Responsable</label>
						<div class="form-group">
							<input type="text" name="arma_responsable" value="<?php echo $this->input->post('arma_responsable'); ?>" class="form-control" id="arma_responsable" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="arma_foto" class="control-label">Arma Foto</label>
						<div class="form-group">
							<input type="text" name="arma_foto" value="<?php echo $this->input->post('arma_foto'); ?>" class="form-control" id="arma_foto" />
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