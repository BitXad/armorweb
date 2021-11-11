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
    <font size='4' face='Arial' class="color_fff"><b>Registros</b></font>
    <br><font size='2' face='Arial' class="color_fff">Registros Encontrados: <?php echo sizeof($registro); ?></font>
    <div class="box-tools">
        <a href="<?php echo site_url('registro/add'); ?>" class="btn btn-success btn-sm color_fff"><fa class='fa fa-pencil-square-o'></fa> Registrar persona</a> 
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-body">
                <table class="table table-striped" id="mitabla">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Persona</th>
                            <th>Codigo arma</th>
                            <!-- <th>Fecha de salida</th> -->
                            <th>Salida</th><!-- Fecha y hora de Salida -->
                            <!-- <th>Fecha de ingreso</th> -->
                            <th>Ingreso</th><!-- Fecha y hora de ingreso -->
                            <th>Observaci&oacute;n</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody class="buscar">
                        <?php $i=1;
                            foreach($registro as $r){ 
                        ?>
                        <tr>
                            <td><?= $i ?></td>
                            <td><b><?= $r['tipo_descripcion'] ?>:</b><?= $r['persona_apellido']; ?> <?= $r['persona_nombre']; ?></td>
                            <td><?= $r['tipoarma_descripcion'] ?><br>
                                <b>Cod.:</b><?php echo $r['arma_codigo']; ?>
                            </td>
                            <td>
                                <?= $r['registro_fechasalida']; ?><br>
                                <?= $r['registro_horasalida']; ?>
                            </td>
                            <td>
                                <?php echo $r['registro_fechaingreso']; ?><br>
                                <?php echo $r['registro_horaingreso']; ?>
                            </td>
                            <td><?php echo $r['registro_observacion']; ?></td>
                            <td>
                                <a href="<?php echo site_url('registro/edit/'.$r['registro_id']); ?>" class="btn btn-info btn-xs" title="Editar"><span class="fa fa-pencil"></span></a> 
                            </td>
                        </tr>
                        <?php $i++; 
                        } ?>
                    </tbody>
                </table>
                                
            </div>
        </div>
    </div>
</div>
