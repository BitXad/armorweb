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
    <font size='4' face='Arial'><b>Grado de persona</b></font>
    <br><font size='2' face='Arial'>Registros Encontrados: <?php echo sizeof($grado_persona); ?></font>
    <div class="box-tools">
        <a href="<?php echo site_url('grado_persona/add'); ?>" class="btn btn-success btn-sm"><fa class='fa fa-pencil-square-o'></fa> Registrar grado</a> 
    </div>
</div>

<div class="row">
    <div class="col-md-12">
    <div class="input-group"> <span class="input-group-addon">Buscar</span>
			<input id="filtrar" type="text" class="form-control" placeholder="Descripcion">
		</div>
        <div class="box">
            <div class="box-body">
                <table class="table table-striped" id="mitabla">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Descripci&oacute;n</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody class="buscar">
                        <?php
                        $i = 1; 
                        foreach($grado_persona as $g){ 
                        ?>
                        <tr>
                            <td><?= $i ?></td>
                            <td><?php echo $g['grado_descripcion']; ?></td>
                            <td>
                                <a href="<?php echo site_url('grado_persona/edit/'.$g['grado_id']); ?>" class="btn btn-info btn-xs" title="Editar"><span class="fa fa-pencil"></span> Editar</a> 
                                <a href="<?php echo site_url('grado_persona/remove/'.$g['grado_id']); ?>" class="btn btn-danger btn-xs" title="Borrar"><span class="fa fa-trash"></span> Borrar</a>
                            </td>
                        </tr>
                        <?php
                        $i++; 
                        } 
                        ?>
                    </tbody>
                </table>
                                
            </div>
        </div>
    </div>
</div>
