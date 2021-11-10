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
    <font class="color_fff" size='4' face='Arial'><b>Lista de usuario</b></font>
    <br><font class="color_fff" size='2' face='Arial'>Registros Encontrados: <?php echo sizeof($usuario); ?></font>
    <div class="box-tools">
        <a href="<?php echo site_url('usuario/add'); ?>" class="btn btn-success btn-sm color_fff"><fa class='fa fa-pencil-square-o'></fa>Registrar Usuario</a> 
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="input-group no-print"> <span class="input-group-addon">Buscar</span>
            <input id="filtrar" type="text" class="form-control" placeholder="Ingrese la descripción">
        </div>
        <div class="box">
            <div class="box-body">
                <table class="table table-striped" id="mitable">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nombre de usuario</th>
                            <th>Login</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody class="buscar">
                        <?php
                        $i = 1;
                        foreach($usuario as $u){ 
                        ?>
                        <tr>
                            <td><?= $i ?></td>
                            <td><?php echo $u['usuario_nombre']; ?></td>
                            <td><?php echo $u['usuario_login']; ?></td>
                            <td>
                                <a href="<?php echo site_url('usuario/edit/'.$u['usuario_id']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Editar</a> 
                                <a href="<?php echo site_url('usuario/remove/'.$u['usuario_id']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Borrar</a>
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
