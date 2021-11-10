<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Registro Add</h3>
            </div>
            <?php echo form_open('registro/add'); ?>
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
									$selected = ($persona['persona_id'] == $this->input->post('persona_id')) ? ' selected="selected"' : "";

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
									$selected = ($arma['arma_id'] == $this->input->post('arma_id')) ? ' selected="selected"' : "";

									echo '<option value="'.$arma['arma_id'].'" '.$selected.'>'.$arma['arma_codigo'].'</option>';
								} 
								?>
							</select>
						</div>
					</div>
					<div class="col-md-6">
						<label for="registro_fechasalida" class="control-label">Registro Fechasalida</label>
						<div class="form-group">
							<input type="text" name="registro_fechasalida" value="<?php echo $this->input->post('registro_fechasalida'); ?>" class="has-datepicker form-control" id="registro_fechasalida" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="registro_horasalida" class="control-label">Registro Horasalida</label>
						<div class="form-group">
							<input type="text" name="registro_horasalida" value="<?php echo $this->input->post('registro_horasalida'); ?>" class="form-control" id="registro_horasalida" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="registro_fechaingreso" class="control-label">Registro Fechaingreso</label>
						<div class="form-group">
							<input type="text" name="registro_fechaingreso" value="<?php echo $this->input->post('registro_fechaingreso'); ?>" class="has-datepicker form-control" id="registro_fechaingreso" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="registro_horaingreso" class="control-label">Registro Horaingreso</label>
						<div class="form-group">
							<input type="text" name="registro_horaingreso" value="<?php echo $this->input->post('registro_horaingreso'); ?>" class="form-control" id="registro_horaingreso" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="registro_observacion" class="control-label">Registro Observacion</label>
						<div class="form-group">
							<input type="text" name="registro_observacion" value="<?php echo $this->input->post('registro_observacion'); ?>" class="form-control" id="registro_observacion" />
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