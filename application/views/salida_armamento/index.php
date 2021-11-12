<script src="<?php echo base_url('resources/js/jquery-2.2.3.min.js'); ?>" type="text/javascript"></script>
<script src="<?php echo base_url('resources/js/salida_arm.js'); ?>" type="text/javascript"></script>
<link href="<?php echo base_url('resources/css/mitabla.css'); ?>" rel="stylesheet">

<input type="hidden" name="base_url" id="base_url" value="<?php echo base_url(); ?>">
<input type="hidden" name="lapersona_id" id="lapersona_id" value="0">

<style type="text/css">
    #contieneimg{
        width: 100px;
        height: 100px;
        text-align: center;
    }
</style>
<div class="box-header text-center">
    <font size='4' face='Arial' class="color_fff"><b>SALIDA DE ARMAMENTO</b></font>
</div>

<div class="col-md-4">
    <div class="box-tools" style="display: flex">
        <a style="width: 75px; margin-right: 1px; margin-top: 1px" href="<?php echo site_url('persona/add'); ?>" target="_blank" class="btn btn-success btn-foursquarexs" title="Registrar nueva Persona"><font size="5"><span class="fa fa-user-plus"></span></font><br><small>Nuevo</small></a>
        <a style="width: 75px; margin-right: 1px; margin-top: 1px" onclick="modalcatalogo()" class="btn btn-info btn-foursquarexs" title="Catalogo de Productos" ><font size="5"><span class="fa fa-search"></span></font><br><small>Catálogo</small></a>
        <a style="width: 75px; margin-right: 1px; margin-top: 1px" href="<?php echo site_url('producto/existenciaminima'); ?>" target="_blank" class="btn btn-soundcloud btn-foursquarexs" title="Productos con existencia mínima" ><font size="5"><span class="fa fa-eye"></span></font><br><small>Exist. Min.</small></a>
        <!--<a style="width: 75px; margin-right: 1px; margin-top: 1px" data-toggle="modal" data-target="#modalprecio" class="btn btn-soundcloud btn-foursquarexs" title="Codigo de Barras" ><font size="5"><span class="fa fa-barcode"></span></font><br><small>Cod. Barras</small></a>-->
    </div>
</div>
<div class="col-md-8">
    <table>
        <tr>
            <td class="text-center text-bold color_fff">ASIGNADO A:</td>
            <td>&nbsp;&nbsp;&nbsp;</td>
            <td class="text-right">
                <a style="width: 100px;" data-toggle="modal" data-target="#modalbuscarpersona" class="btn btn-success" title="Buscar Personas">
                    <i class="fa fa-search"></i> Buscar
                </a>
            </td>
        </tr>
        <tr>
            <td>
                <span id="lafoto">
                    <?php echo "<img src='".site_url()."/resources/images/personas/default.jpg' width='90' height='90'"; ?>
                </span>
            </td>
            <td>&nbsp;&nbsp;&nbsp;</td>
            <td>
                <table>
                    <tr>
                        <td><span id=""></span></td>
                        <td><span id=""></span></td>
                    </tr>
                    <tr>
                        <td><span id=""></span></td>
                        <td><span id=""></span></td>
                    </tr>
                    <tr>
                        <td><span id=""></span></td>
                        <td><span id=""></span></td>
                    </tr>
                    <tr>
                        <td><span id=""></span></td>
                        <td><span id=""></span></td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</div>




<!------------------------ INICIO modal para Seleccionar a un cliente ------------------->
<div class="modal fade" id="modalbuscarpersona" tabindex="-1" role="dialog" aria-labelledby="modalbuscarpersonalabel">
    <div class="modal-dialog" role="document">
        <br><br>
        <div class="modal-content">
            <div class="modal-header text-center">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">x</span></button>
                <span class="text-bold">Buscar Persona</span>
                <div class="col-md-12" style="padding-left: 0px">
                    <div class="input-group">
                        <span class="input-group-addon"> Buscar </span>
                        <input id="buscar_lapersona" name="buscar_lapersona" type="text" class="form-control" placeholder="Ingrese el nombre, apellidos o c.i. de la persona"  onkeypress="buscarpersona(event)" autofocus>
                        <div style="border-color: #008d4c; background: #008D4C !important; color: white" class="btn btn-success input-group-addon" onclick="tablarepersona()"><span class="fa fa-search"></span></div>
                    </div>
                </div>
            </div>
            <div class="modal-body" style="padding-bottom: 0px !important">
                <div class="row no-print" id='loader_bpersona'  style='display:none;'>
                <center>
                    <img src="<?php echo base_url("resources/images/loader.gif"); ?>"  >        
                </center>
            </div>
                <!------------------------------------------------------------------->
                <div class="col-md-12 no-print" id="tablarepersona"></div>
                <!------------------------------------------------------------------->
            </div>
            <div class="modal-footer aligncenter">
                <a href="#" class="btn btn-danger" data-dismiss="modal"><span class="fa fa-times"></span> Cancelar</a>
            </div>
        </div>
    </div>
</div>
<!------------------------ FIN modal para Seleccionar a un cliente ------------------->
    














































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
