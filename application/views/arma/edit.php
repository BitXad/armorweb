<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Modificar Arma</h3>
            </div>
            <?php echo form_open_multipart('arma/edit/'.$arma['arma_id']); ?>
                <div class="box-body">
                    <div class="row clearfix">
                        <div class="col-md-3">
                            <label for="tipoarma_id" class="control-label">Tipo de Arma</label>
                            <div class="form-group">
                                <select name="tipoarma_id" class="form-control">
                                    <option value="">select tipo_arma</option>
                                    <?php 
                                    foreach($all_tipo_arma as $tipo_arma)
                                    {
                                        $selected = ($tipo_arma['tipoarma_id'] == $arma['tipoarma_id']) ? ' selected="selected"' : "";
                                        echo '<option value="'.$tipo_arma['tipoarma_id'].'" '.$selected.'>'.$tipo_arma['tipoarma_descripcion'].'</option>';
                                    } 
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label for="persona_id" class="control-label">Persona</label>
                            <div class="form-group">
                                <select name="persona_id" class="form-control">
                                    <option value="">select persona</option>
                                    <?php 
                                    foreach($all_persona as $persona)
                                    {
                                        $selected = ($persona['persona_id'] == $arma['persona_id']) ? ' selected="selected"' : "";
                                        echo '<option value="'.$persona['persona_id'].'" '.$selected.'>'.$persona['persona_apellido'].' '.$persona['persona_nombre'].'</option>';
                                    } 
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label for="arma_codigo" class="control-label"><span class="text-danger">*</span>Código</label>
                            <div class="form-group">
                                <input type="text" name="arma_codigo" value="<?php echo ($this->input->post('arma_codigo') ? $this->input->post('arma_codigo') : $arma['arma_codigo']); ?>" class="form-control" id="arma_codigo" />
                                <span class="text-danger"><?php echo form_error('arma_codigo');?></span>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label for="arma_numorden" class="control-label">Num. Orden</label>
                            <div class="form-group">
                                <input type="text" name="arma_numorden" value="<?php echo ($this->input->post('arma_numorden') ? $this->input->post('arma_numorden') : $arma['arma_numorden']); ?>" class="form-control" id="arma_numorden" />
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label for="arma_fechaingreso" class="control-label">Fecha Ingreso</label>
                            <div class="form-group">
                                <input type="date" name="arma_fechaingreso" value="<?php echo ($this->input->post('arma_fechaingreso') ? $this->input->post('arma_fechaingreso') : $arma['arma_fechaingreso']); ?>" class="form-control" id="arma_fechaingreso" />
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label for="arma_horaingreso" class="control-label">Hora Ingreso</label>
                            <div class="form-group">
                                <input type="time" name="arma_horaingreso" value="<?php echo ($this->input->post('arma_horaingreso') ? $this->input->post('arma_horaingreso') : $arma['arma_horaingreso']); ?>" class="form-control" id="arma_horaingreso" />
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label for="arma_procedencia" class="control-label">Procedencia</label>
                            <div class="form-group">
                                <input type="text" name="arma_procedencia" value="<?php echo ($this->input->post('arma_procedencia') ? $this->input->post('arma_procedencia') : $arma['arma_procedencia']); ?>" class="form-control" id="arma_procedencia" />
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label for="arma_marca" class="control-label">Marca</label>
                            <div class="form-group">
                                <input type="text" name="arma_marca" value="<?php echo ($this->input->post('arma_marca') ? $this->input->post('arma_marca') : $arma['arma_marca']); ?>" class="form-control" id="arma_marca" />
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label for="arma_calibre" class="control-label">Calibre</label>
                            <div class="form-group">
                                <input type="text" name="arma_calibre" value="<?php echo ($this->input->post('arma_calibre') ? $this->input->post('arma_calibre') : $arma['arma_calibre']); ?>" class="form-control" id="arma_calibre" />
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label for="arma_aniodotacion" class="control-label">Año dotación</label>
                            <div class="form-group">
                                <input type="text" name="arma_aniodotacion" value="<?php echo ($this->input->post('arma_aniodotacion') ? $this->input->post('arma_aniodotacion') : $arma['arma_aniodotacion']); ?>" class="form-control" id="arma_aniodotacion" />
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label for="arma_lugardotacion" class="control-label">Lugar Dotacion</label>
                            <div class="form-group">
                                <input type="text" name="arma_lugardotacion" value="<?php echo ($this->input->post('arma_lugardotacion') ? $this->input->post('arma_lugardotacion') : $arma['arma_lugardotacion']); ?>" class="form-control" id="arma_lugardotacion" />
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label for="arma_novedades" class="control-label">Novedades</label>
                            <div class="form-group">
                                <input type="text" name="arma_novedades" value="<?php echo ($this->input->post('arma_novedades') ? $this->input->post('arma_novedades') : $arma['arma_novedades']); ?>" class="form-control" id="arma_novedades" />
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label for="arma_responsable" class="control-label">Responsable</label>
                            <div class="form-group">
                                <input type="text" name="arma_responsable" value="<?php echo ($this->input->post('arma_responsable') ? $this->input->post('arma_responsable') : $arma['arma_responsable']); ?>" class="form-control" id="arma_responsable" />
                            </div>
                            </div>
                        <div class="col-md-3">
                            <label for="arma_foto" class="control-label">Foto</label>
                            <div class="form-group">
                                <input type="file" name="arma_foto" value="<?php echo ($this->input->post('arma_foto') ? $this->input->post('arma_foto') : $arma['arma_foto']); ?>" class="form-control" id="arma_foto" accept="image/png, image/jpeg, jpg, image/gif" />
                                <input type="hidden" name="arma_foto1" value="<?php echo ($this->input->post('arma_foto') ? $this->input->post('arma_foto') : $arma['arma_foto']); ?>" class="form-control" id="arma_foto1" />
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label for="usuario_id" class="control-label">Usuario</label>
                            <div class="form-group">
                                <select name="usuario_id" class="form-control">
                                    <option value="">select usuario</option>
                                    <?php 
                                    foreach($all_usuario as $usuario)
                                    {
                                        $selected = ($usuario['usuario_id'] == $arma['usuario_id']) ? ' selected="selected"' : "";
                                        echo '<option value="'.$usuario['usuario_id'].'" '.$selected.'>'.$usuario['usuario_nombre'].'</option>';
                                    } 
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label for="estado_id" class="control-label">Estado</label>
                            <div class="form-group">
                                <select name="estado_id" class="form-control">
                                    <option value="">select estado</option>
                                    <?php 
                                    foreach($all_estado as $estado)
                                    {
                                        $selected = ($estado['estado_id'] == $arma['estado_id']) ? ' selected="selected"' : "";
                                        echo '<option value="'.$estado['estado_id'].'" '.$selected.'>'.$estado['estado_descripcion'].'</option>';
                                    } 
                                    ?>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="box-footer">
                    <button type="submit" class="btn btn-success">
                        <i class="fa fa-check"></i> Guardar
                    </button>
                    <a href="<?php echo site_url('arma'); ?>" class="btn btn-danger">
                    <i class="fa fa-times"></i> Cancelar</a> 
	        </div>				
			<?php echo form_close(); ?>
		</div>
    </div>
</div>