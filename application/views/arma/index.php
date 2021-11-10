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
<div class="box-header">
    <font class="color_fff" size='4' face='Arial'><b>Gestión de Armas</b></font>
    <br><font class="color_fff" size='2' face='Arial'>Registros Encontrados: <?php echo sizeof($arma); ?></font>
    <div class="box-tools">
        <a href="<?php echo site_url('arma/add'); ?>" class="btn btn-success btn-sm"><fa class='fa fa-pencil-square-o'></fa>Registrar Armas</a> 
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-body table-responsive">
                <table class="table table-striped" id="mitabla">
                    <tr>
                        <th>#</th>
                        <th>Tipoarma Id</th>
                        <th>Persona Id</th>
                        <th>Usuario Id</th>
                        <th>Estado Id</th>
                        <th>Arma Numorden</th>
                        <th>Arma Codigo</th>
                        <th>Arma Fechaingreso</th>
                        <th>Arma Horaingreso</th>
                        <th>Arma Procedencia</th>
                        <th>Arma Marca</th>
                        <th>Arma Calibre</th>
                        <th>Arma Aniodotacion</th>
                        <th>Arma Lugardotacion</th>
                        <th>Arma Novedades</th>
                        <th>Arma Responsable</th>
                        <th>Arma Foto</th>
                        <th>Actions</th>
                    </tr>
                    <?php foreach($arma as $a){ ?>
                    <tr>
                        <td><?php echo $a['arma_id']; ?></td>
                        <td><?php echo $a['tipoarma_id']; ?></td>
                        <td><?php echo $a['persona_id']; ?></td>
                        <td><?php echo $a['usuario_id']; ?></td>
                        <td><?php echo $a['estado_id']; ?></td>
                        <td><?php echo $a['arma_numorden']; ?></td>
                        <td><?php echo $a['arma_codigo']; ?></td>
                        <td><?php echo $a['arma_fechaingreso']; ?></td>
                        <td><?php echo $a['arma_horaingreso']; ?></td>
                        <td><?php echo $a['arma_procedencia']; ?></td>
                        <td><?php echo $a['arma_marca']; ?></td>
                        <td><?php echo $a['arma_calibre']; ?></td>
                        <td><?php echo $a['arma_aniodotacion']; ?></td>
                        <td><?php echo $a['arma_lugardotacion']; ?></td>
                        <td><?php echo $a['arma_novedades']; ?></td>
                        <td><?php echo $a['arma_responsable']; ?></td>
                        <td><?php echo $a['arma_foto']; ?></td>
                        <td>
                            <a href="<?php echo site_url('arma/edit/'.$a['arma_id']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a> 
                            <a href="<?php echo site_url('arma/remove/'.$a['arma_id']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
                        </td>
                    </tr>
                    <?php } ?>
                </table>
                                
            </div>
        </div>
    </div>
</div>
