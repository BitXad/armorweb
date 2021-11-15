<script src="<?php echo base_url('resources/js/jquery-2.2.3.min.js'); ?>" type="text/javascript"></script>
<script src="<?php echo base_url('resources/js/salida_arm.js'); ?>" type="text/javascript"></script>
<link href="<?php echo base_url('resources/css/mitabla.css'); ?>" rel="stylesheet">
<script type="text/javascript">
    $(document).ready(function () {
        (function ($) {
            $('#filtrar').keyup(function () {
                var rex = new RegExp($(this).val(), 'i');
                $('.buscari tr').hide();
                $('.buscari tr').filter(function () {
                    return rex.test($(this).text());
                }).show();
            })
        }(jQuery));
        
        (function ($) {
            $('#filtrarderecha').keyup(function () {
                var rex = new RegExp($(this).val(), 'i');
                $('.buscard tr').hide();
                $('.buscard tr').filter(function () {
                    return rex.test($(this).text());
                }).show();
            })
        }(jQuery));
        
        (function ($) {
            $('#buscar_lapersona').keyup(function () {
                var rex = new RegExp($(this).val(), 'i');
                $('.buscar tr').hide();
                $('.buscar tr').filter(function () {
                    return rex.test($(this).text());
                }).show();
            })
        }(jQuery));
    });
</script>
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

<div class="col-md-4" style="padding: 0px">
    <div class="box-tools" style="display: flex">
        <a style="width: 75px; margin-right: 1px; margin-top: 1px" href="<?php echo site_url('persona/add'); ?>" target="_blank" class="btn btn-success btn-foursquarexs" title="Registrar nueva Persona"><font size="5"><span class="fa fa-user-plus"></span></font><br><small>Nueva P.</small></a>
        <a style="width: 75px; margin-right: 1px; margin-top: 1px"href="<?php echo site_url('arma/add'); ?>" target="_blank" class="btn btn-info btn-foursquarexs" title="Registrar nueva Arma" ><font size="5"><span class="fa fa-space-shuttle"></span></font><br><small>Nueva A.</small></a>
        <!--<a style="width: 75px; margin-right: 1px; margin-top: 1px" href="<?php //echo site_url('#'); ?>" target="_blank" class="btn btn-soundcloud btn-foursquarexs" title="Reportes" ><font size="5"><span class="fa fa-file-text-o"></span></font><br><small>Reportes</small></a>-->
        <!--<a style="width: 75px; margin-right: 1px; margin-top: 1px" data-toggle="modal" data-target="#modalprecio" class="btn btn-soundcloud btn-foursquarexs" title="Codigo de Barras" ><font size="5"><span class="fa fa-barcode"></span></font><br><small>Cod. Barras</small></a>-->
    </div>
</div>
<div class="col-md-8" style="padding: 0px">
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
                    <?php echo "<img src='".site_url()."/resources/images/personas/default.jpg' width='90' height='90' >"; ?>
                </span>
            </td>
            <td>&nbsp;&nbsp;&nbsp;</td>
            <td>
                <table class="color_fff">
                    <tr>
                        <td class="text-right"><span class="text-bold">Nombre:</span></td>
                        <td>&nbsp;&nbsp;</td>
                        <td><span id="elnombre"></span></td>
                    </tr>
                    <tr>
                        <td class="text-right"><span class="text-bold">C.I.:</span></td>
                        <td>&nbsp;&nbsp;</td>
                        <td><span id="elci"></span></td>
                    </tr>
                    <tr>
                        <td class="text-right"><span class="text-bold">Teléfono:</span></td>
                        <td>&nbsp;&nbsp;</td>
                        <td><span id="eltelefono"></span></td>
                    </tr>
                    <tr>
                        <td class="text-right"><span class="text-bold">Dirección:</span></td>
                        <td>&nbsp;&nbsp;</td>
                        <td><span id="ladireccion"></span></td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</div>
<div class="row no-print" id='loader_arma'  style='display:none;'>
    <center>
        <img src="<?php echo base_url("resources/images/loader.gif"); ?>"  >        
    </center>
</div>
<div class="col-md-5" style="padding: 0px">
    <div class="col-md-4" style="padding: 0px">
        <label for="codigo_arma" class="control-label color_fff">Código Arma</label>
        <div class="input-group">
            <span class="input-group-addon"> 
                <i class="fa fa-barcode"></i>
            </span>           
            <input type="text" name="codigo" id="codigo" class="form-control" placeholder="código" onkeyup="validarcodigo(event)" autofocus>
        </div>
    </div>
    <div class="col-md-8" style="padding-left: 2px; padding-right: 0px">
        <label for="nombre_persona" class="control-label color_fff">Nombre/Apellidos/C.I.</label>
        <div class="input-group">
            <span class="input-group-addon"> 
                Buscar 
            </span>           
            <input id="filtrar" name="filtrar" type="text" class="form-control" placeholder="Ingrese el nombre, apellido, c.i..." onkeypress="validarpersona(event)">
        </div>
    </div>
    <div class="col-md-12" style="padding: 0px;">
        <table id="mitabla2">
            <tr>
                <th>#</th>
                <th>Descripción</th>
                <th>Asignado a</th>
                <th><!--<button class="btn btn-success btn-xs" onclick="registrartodo()" title="Pasar todo el detalle"><i class="text-bold" >>></i></button>--></th>
            </tr>
            <tbody class="buscari" id="resultadosalidaizq"></tbody>
        </table>
    </div>
</div>
<div class="col-md-7" style="padding: 0px">
    <div class="col-md-12" style="padding-left: 3px; padding-right: 0px">
        <label for="nombre_persona" class="control-label color_fff">&nbsp;</label>
        <div class="input-group">
            <span class="input-group-addon" onclick="ocultar_busqueda();"> 
                Buscar 
            </span>           
                <input id="filtrarderecha" type="text" class="form-control" placeholder="Ingrese el código"">
        </div>
    </div>
    <div class="col-md-12" style="padding-left: 3px; padding-right: 0px">
        <table id="mitabla2">
            <tr>
                <th>#</th>
                <th>Descripción</th>
                <th>Asignado a</th>
                <th>Observación</th>
                <th><button class="btn btn-danger btn-xs" onclick="quitartodo()"><i class="fa fa-trash" title="Quitar todo el detalle"></i></button></th>
            </tr>
            <tbody class="buscard" id="resultadosalidader"></tbody>
        </table>
    </div>
    <div class=" text-center col-md-12" style="padding-left: 3px; padding-right: 0px">
        <br>
        <a href="#" onclick="registrar_salida()" class="btn btn-sq-lg btn-success" style="width: 110px !important; height:120px !important;">
            <i class="fa fa-check fa-4x"></i><br><br>Registrar<br>
        </a>
        <a href="<?php echo site_url('registro'); ?>" class="btn btn-sq-lg btn-danger" style="width: 110px !important; height:120px !important;">
            <i class="fa fa-times fa-4x"></i><br><br>Salir<br>
        </a>
    </div>
</div>





<!------------------------ INICIO modal para Seleccionar a una persona ------------------->
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
<!------------------------ FIN modal para Seleccionar a una persona ------------------->