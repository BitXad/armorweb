<script src="<?php echo base_url('resources/js/jquery-2.2.3.min.js'); ?>" type="text/javascript"></script>
<script type="text/javascript">
        $(document).ready(function () {
            (function ($) {
                $('#filtrar').keyup(function () {
                    var rex = new RegExp($(this).val(), 'i');
                    $('.buscar tr').hide();
                    $('.buscar tr').filter(function () {
                        return rex.test($(this).text());
                    }).show();
                })
            }(jQuery));
        });
</script>
<link href="<?php echo base_url('resources/css/mitabla.css'); ?>" rel="stylesheet">
<style type="text/css">
    #contieneimg{
        width: 100px;
        height: 100px;
        text-align: center;
    }
</style>

<div class="box-header">
    <font size='4' face='Arial' class="color_fff"><b>Personas</b></font>
    <br><font size='2' face='Arial' class="color_fff">Registros Encontrados: <?php echo sizeof($persona); ?></font>
    <div class="box-tools">
        <a href="<?php echo site_url('persona/add'); ?>" class="btn btn-success btn-sm color_fff"><fa class='fa fa-pencil-square-o'></fa> Registrar persona</a> 
    </div>
</div>

<div class="row">
    <div class="col-md-12">
		<div class="input-group"> <span class="input-group-addon">Buscar</span>
			<input id="filtrar" type="text" class="form-control" placeholder="Ingrese el nombre, grado">
		</div>
        <div class="box">
			<div class="box-body table-responsive">
				<table class="table table-striped table-condensed" id="mitabla">
					<thead>
						<tr>
							<th>#</th>
							<th>Foto</th>
							<th>Apellido(s)</th>
							<th>Nombre(s)</th>
							<th>Grado</th>
							<th>Estado</th>
							<th>Tipo</th>
							<th>Ci</th>
							<th>Telefono</th>
							<th>Celular</th>
							<th>Direccion</th>
							<th></th>
						</tr>
					</thead>
					<tbody class="buscar">
						<?php $i = 1;?>
						<?php foreach($persona as $p){ ?>
						<tr>
							<td><?= $i ?></td>
							<td><center><?php echo "<img src='".site_url()."/resources/images/personas/"."thumb_".$p['persona_foto']."' width='40' height='40' class='img-circle'"; ?></center></td>
							<td><?= $p['persona_apellido']; ?></td>
							<td><?= $p['persona_nombre']; ?></td>
							<td><?= $p['grado_descripcion']; ?></td>
							<td><?= $p['estado_descripcion']; ?></td>
							<td><?= $p['tipo_descripcion']; ?></td>
							<td><?= $p['persona_ci']; ?></td>
							<td><?= $p['persona_telefono']; ?></td>
							<td><?= $p['persona_celular']; ?></td>
							<td><?= $p['persona_direccion']; ?></td>
							<td>
								<a href="<?php echo site_url('persona/edit/'.$p['persona_id']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a> 
								<a href="<?php echo site_url('persona/remove/'.$p['persona_id']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
							</td>
						</tr>
						<?php 
						$i++;
						} ?>
					</tbody>
				</table>
								
			</div>
        </div>
    </div>
</div>
