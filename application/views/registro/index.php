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
<input type="text" value="<?php echo base_url(); ?>" id="base_url" hidden>
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
                                <a href="<?php echo site_url('registro/imprimir/'.$r['registro_id']); ?>" class="btn btn-warning btn-xs" title="Imprimir Conprobante"><i class="fa fa-print" aria-hidden="true"></i></a> 
                                <button class="btn btn-success btn-xs" title="Entregar" onclick="entrega(<?= $r['registro_id'] ?>)"><i class="fa fa-inbox" aria-hidden="true"></i></button> 
                            </td>
                        </tr>
                        <?php $i++; 
                        } ?>
                    </tbody>
                </table>
                <!-- Modal -->
                <div class="modal fade" id="modal_observacion" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Observaciones</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <textarea class="form-control" name="registro_observacion" id="registro_observacion" rows="3" placeholder="Agregue una observacion"></textarea>
                                <input type="number" id="registro_modal" name="registro_modal" value="" hidden>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                            <button type="button" class="btn btn-primary" onclick="cargar()">Guardar cambios</button>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function entrega(id){
        if(confirm('Desea agregar una observacion')){
            $("#registro_modal").val(id);
            $('#modal_observacion').modal('show');
        }else{
            cargar(id);
        }
    }
    function cargar(id=0){
        var url = document.getElementById("base_url").value
        var controlador = `${url}registro/entrega_equipo`
        var observacion = "";
        if(id == 0){
            id = document.getElementById("registro_modal").value;
            observacion = document.getElementById('registro_observacion').value;
        }
        $.ajax({
                url: controlador,
                type: "POST",
                data:{id:id,observacion:observacion},
                success:function(){
                    // $('#modal_observacion').modal('hidden');
                    location.reload();
                },
                error:function(){
                    alert("algo salio mal")
                }
            });
    }
</script>