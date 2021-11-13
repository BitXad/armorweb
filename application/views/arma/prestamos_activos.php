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
                        <th>Foto</th>
                        <th>Oficial</th>
                        <th>Salida</th>
                        <th>Fecha<br>Salida</th>
                        <th>Hora<br>Salida</th>
                        <th>Estado</th>
                        <th></th>
                    </tr>
                    <tbody class="buscar">
                    <?php
                    $i = 0;
                    foreach($arma as $a){ ?>
                    <tr>
                        <td><?php echo ($i+1); ?></td>
                        <td><center> <?php echo "<img src='".site_url()."resources/images/personas/"."thumb_".$a['persona_foto']."' width='40' height='40' class='img-circle'"; ?></center></td>
                        <td><?php echo $a['persona_apellido']." ".$a['persona_nombre']; ?></td>
                        <td><?php echo "00".$a['registro_id']; ?></td>
                        <td><?php echo date("d/m/Y", strtotime($a['registro_fechasalida'])); ?></td>
                        <td><?php echo "<br>".$a['registro_horasalida']; ?></td>
<!--                        <td><?php echo $a['arma_procedencia']; ?></td>
                        <td><?php echo $a['arma_marca']; ?></td>
                        <td><?php echo $a['arma_calibre']; ?></td>
                        <td><?php echo $a['arma_aniodotacion']; ?></td>
                        <td><?php echo $a['arma_lugardotacion']; ?></td>
                        <td><?php echo $a['arma_novedades']; ?></td>
                        <td><?php echo $a['arma_responsable']; ?></td>
                        <td><?php echo $a['usuario_nombre']; ?></td>-->
                        <td><?php echo $a['estado_descripcion']; ?></td>
                        <td>
                            <a href="<?php echo site_url('registro/comprobantedev/'.$a['registro_id']); ?>" class="btn btn-warning btn-xs" title="Prestamos pendientes" target="_BLANK"><span class="fa fa-print"></span></a> 
                            <!-- <a href="<?php //echo site_url('arma/remove/'.$a['arma_id']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span></a>-->
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
