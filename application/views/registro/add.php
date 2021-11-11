<input type="text" value="<?php echo base_url(); ?>" id="base_url" hidden>
<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Agregar registro</h3>
            </div>
			<!-- <div class="box-body">
          		<div class="row clearfix">
					<div class="col-md-6">
						<label for="persona_nombre" class="control-label" style="margin-bottom: 0;">Nombre</label>
						<div class="form-group">
							<input type="search" name="persona_nombre" list="listapersonas" class="form-control" id="persona_nombre" value="" onchange="buscar_personas()" onKeyUp="this.value = this.value.toUpperCase();" autocomplete="off" />
							<datalist id="listapersonas">

							</datalist>
							
						</div>
					</div>

					<div class="col-md-6">
						<label for="cod_arma" class="control-label" style="margin-bottom: 0;">Codigo arma</label>
						<div class="form-group">
							<input type="text" name="cod_arma" class="form-control" id="cod_arma" value="" />
						</div>
					</div>
					<hr class="col-md-12">
					<div class="col-md-6">
						<div class="row">
						<?php foreach($all_arma as $arma){ ?>
							<div class="col-md-10">
								<span><b>Cod.:</b> <?= $arma['arma_codigo'] ?></span>
							</div>
							<div class="col-md-2">
								<button class="btn btn-sm btn-primary" onclick="llevar($arma['arma_id'])"><i class="fa fa-plus" aria-hidden="true"></i></button>
							</div>
						<?php } ?>
						</div>
					</div>
					<div class="col-md-6">
						<div id="armas_espera"></div>
					</div>
				</div>
			</div>
			
			 -->
            <?php echo form_open('registro/add'); ?>
          	<div class="box-body">
          		<div class="row clearfix"></div>
					<div class="col-md-6">
						<label for="persona_id" class="control-label">Persona</label>
						<div class="form-group">
							<select name="persona_id" class="form-control">
								<option value="">selecciona persona</option>
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
								<option value="">selecciona arma</option>
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
						<label for="registro_fechasalida" class="control-label">Fecha salida</label>
						<div class="form-group">
							<input type="date" name="registro_fechasalida" value="<?php echo $this->input->post('registro_fechasalida'); ?>" class="has-datepicker form-control" id="registro_fechasalida" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="registro_horasalida" class="control-label">Hora salida</label>
						<div class="form-group">
							<input type="time" name="registro_horasalida" value="<?php echo $this->input->post('registro_horasalida'); ?>" class="form-control" id="registro_horasalida" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="registro_fechaingreso" class="control-label">Fecha ingreso</label>
						<div class="form-group">
							<input type="text" name="registro_fechaingreso" value="<?php echo $this->input->post('registro_fechaingreso'); ?>" class="has-datepicker form-control" id="registro_fechaingreso" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="registro_horaingreso" class="control-label">Hora ingreso</label>
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
</div>
<!-- <script>
	function buscar_personas(){
		var base_url = document.getElementById('base_url').value;
		var controlador = base_url+"registro/buscar_personas";
		var parametro = document.getElementById('persona_nombre').value;
		
		$.ajax({url: controlador,
			type:"POST",
			data:{parametro:parametro},
			success:function(respuesta){
				resultado = JSON.parse(respuesta);
				html = "";					
				resultado.forEach(res => {
					html += `<option value="${res["persona_apellido"]} ${res['persona_nombre']}" label="CODIGO ARMA: ${res["arma_codigo"]}" onClick="set_codigoArma(${res["arma_codigo"]})"></option>`;
					// set_codigoArma(res['arma_codigo'])
				}); 
				$("#listapersonas").html(html);
			},
			error: function(respuesta){
				alert("algo salio mal");
			}
		});
	}

	function llevar(){

	}
	
</script> -->