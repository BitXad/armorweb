<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Registro Edit</h3>
            </div>
			<?php echo form_open('registro/edit/'.$registro['registro_id']); ?>
			<div class="box-body">
				<div class="row clearfix">
					<div class="col-md-6">
						<label for="persona_id" class="control-label">Persona</label>
						<div class="form-group">
							<select name="persona_id" class="form-control">
								<option value="">select persona</option>
								<?php 
								foreach($all_persona as $persona)
								{
									$selected = ($persona['persona_id'] == $registro['persona_id']) ? ' selected="selected"' : "";

									echo '<option value="'.$persona['persona_id'].'" '.$selected.'>'.$persona['persona_nombre'].'</option>';
								} 
								?>
							</select>
						</div>
					</div>
					<div class="col-md-6">
						<label for="arma_id" class="control-label">Arma</label>
						<div class="form-group">
							<select name="arma_id" class="form-control">
								<option value="">select arma</option>
								<?php 
								foreach($all_arma as $arma)
								{
									$selected = ($arma['arma_id'] == $registro['arma_id']) ? ' selected="selected"' : "";

									echo '<option value="'.$arma['arma_id'].'" '.$selected.'>'.$arma['arma_codigo'].'</option>';
								} 
								?>
							</select>
						</div>
					</div>
					<div class="col-md-6">
						<label for="registro_fechasalida" class="control-label">Fecha salida</label>
						<div class="form-group">
							<input type="date" name="registro_fechasalida" value="<?php echo ($this->input->post('registro_fechasalida') ? $this->input->post('registro_fechasalida') : $registro['registro_fechasalida']); ?>" class="form-control" id="registro_fechasalida" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="registro_horasalida" class="control-label">Hora salida</label>
						<div class="form-group">
							<input type="time" name="registro_horasalida" value="<?php echo ($this->input->post('registro_horasalida') ? $this->input->post('registro_horasalida') : $registro['registro_horasalida']); ?>" class="form-control" id="registro_horasalida" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="registro_fechaingreso" class="control-label">Fecha ingreso</label>
						<div class="form-group">
							<input type="date" name="registro_fechaingreso" value="<?php echo ($this->input->post('registro_fechaingreso') ? $this->input->post('registro_fechaingreso') : $registro['registro_fechaingreso']); ?>" class="form-control" id="registro_fechaingreso" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="registro_horaingreso" class="control-label">Hora ingreso</label>
						<div class="form-group">
							<input type="time" name="registro_horaingreso" value="<?php echo ($this->input->post('registro_horaingreso') ? $this->input->post('registro_horaingreso') : $registro['registro_horaingreso']); ?>" class="form-control" id="registro_horaingreso" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="registro_observacion" class="control-label">Observaci&oacute;n</label>
						<div class="form-group">
							<input type="text" name="registro_observacion" value="<?php echo ($this->input->post('registro_observacion') ? $this->input->post('registro_observacion') : $registro['registro_observacion']); ?>" class="form-control" id="registro_observacion" />
						</div>
					</div>
				</div>
			</div>
			<div class="box-footer">
            	<button type="submit" class="btn btn-success">
					<i class="fa fa-check"></i> Guardar
				</button>
				<a href="<?php echo site_url('registro'); ?>" class="btn btn-danger"><i class="fa fa-times"></i> Cancelar</a>
	        </div>				
			<?php echo form_close(); ?>
		</div>
    </div>
</div>