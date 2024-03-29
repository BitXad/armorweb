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
    <font class="color_fff" size='4' face='Arial'><b>Lista de tipo persona</b></font>
    <br><font class="color_fff" size='2' face='Arial'>Registros Encontrados: <?php echo sizeof($tipo_persona); ?></font>
    <div class="box-tools">
        <a href="<?php echo site_url('tipo_persona/add'); ?>" class="btn btn-success btn-sm color_fff"><fa class='fa fa-pencil-square-o'></fa> Registrar Tipo persona</a> 
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="input-group no-print"> <span class="input-group-addon">Buscar</span>
            <input id="filtrar" type="text" class="form-control" placeholder="Ingrese la descripción">
        </div>
        <div class="box">
            <div class="box-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Tipo persona</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $i = 1;
                            foreach($tipo_persona as $t){ ?>
                        <tr>
                            <td><?= $i; ?></td>
                            <td><?php echo $t['tipo_descripcion']; ?></td>
                            <td>
                                <a href="<?php echo site_url('tipo_persona/edit/'.$t['tipo_id']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Editar</a> 
                                <a href="<?php echo site_url('tipo_persona/remove/'.$t['tipo_id']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> borrar</a>
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
