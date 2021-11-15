<input type="text" value="<?php echo base_url(); ?>" id="base_url" hidden>
<script>
    const base_url = document.getElementById("base_url").value;
    var det_registro,actual_registro;    
</script>
<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Registrar devoluci&oacute;n</h3>
            </div>
			<div class="box-body">
				<div class="row clearfix">
                    <div class="col-sm-12 col-md-5">
                        <div class="col-sm-6">
                            <label for="persona_ci">C.I.</label>
                            <div class="input-group">
                                <input id="persona_ci" name="persona_ci" type="text" class="form-control" placeholder="Ingrese el C.I." autocomplete="off">
                                <span class="input-group-btn">
                                    <button class="btn btn-primary" type="button" onclick="buscar_ci()"><i class="fa fa-search" aria-hidden="true"></i></button>
                                </span>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label for="persona">Descripcion/Nombre</label>
                            <div class="form-group">
                                <button class="btn btn-primary col-sm-12" data-toggle="modal" data-target="#modalbuscarpersona">Buscar</button>
                            </div>
                        </div>
                        <br>
                        <div class="col-sm-12">
                            <div class="panel">
                                <div class="row">
                                    <div class="col-sm-12 col-md-12">
                                        <div class="thumbnail">
                                            <div class="row">
                                                <div class="col-md-5">
                                                    <img id="personainfo_foto" src="<?= base_url()."resources/images/personas/default.jpg" ?>" width="100%" alt="">
                                                </div>
                                                <div class="col-md-7">
                                                    <article id="personainfo_informacion"></article>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-7">
                        <section>
                            <div class="col-sm-3"></div>
                            <div class="col-sm-6">
                                <label for="arma_codigo">Codigo arma</label>
                                <div class="input-group">
                                    <input id="arma_codigo" name="arma_codigo" type="text" class="form-control" placeholder="Ingrese el codigo del arma" autocomplete="off">
                                    <span class="input-group-btn">
                                        <button id="buscar_arma_codigo" class="btn btn-primary" type="button" onclick="buscar_arma()"><i class="fa fa-search" aria-hidden="true"></i></button>
                                    </span>
                                </div>
                            </div>
                            <div class="col-sm-3"></div>
                        </section>
                        <section>
                            <article>
                                <table class="table">
                                    <thead>
                                        <tr style="text-align: center;">
                                            <th>#</th>
                                            <th>Arma</th>
                                            <th>Prestado</th>
                                            <th>Prestamo</th>
                                            <th>Observacion</th>
                                            <th>Fotos</th>
                                            <th>Devuelto por</th>
                                        </tr>
                                    </thead>
                                    <tbody id="armas_prestadas"></tbody>
                                </table>
                            </article>
                            <footer>
                                <button type="submit" class="btn btn-success" onclick="guardar_registro()">
                                    <i class="fa fa-check"></i> Guardar
                                </button>
                                <a href="<?php echo site_url('arma'); ?>" class="btn btn-danger"><i class="fa fa-times"></i> Cancelar</a>
                            </footer>
                        </section>
                    </div>
                    <div class="col-sm-12 col-md-12"></div>
                    <div class="col-sm-12 col-md-5">
                        <section id="registros" style="display: none;">
                            <h4 class="text-center">Todos sus registros</h4>
                            <table class="table" >
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Registros</th>
                                        <th>Fecha-Hora</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody id="registros_pendientes"></tbody>
                            </table>
                        </section>
                        <section id="armas" style="display: none;">
                            <h4 class="text-center">Armas que falta devolver</h4>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Arma</th>
                                        <th>Fecha</th>
                                        <th>Hora</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody id="armas_pendientes"></tbody>
                            </table>
                        </section>
                    </div>
				</div>
			</div>
			<div class="box-footer">
				<!-- <a href="<?php echo site_url('registro'); ?>" class="btn btn-danger"><i class="fa fa-times"></i> Cancelar</a> -->
	        </div>				
		</div>
    </div>
</div>

<!----------------------------------------------------- modal para armas ------------------------------------------->
<div id="modal_entregar_arma" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="modal_entregar_arma" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Regresar arma</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="formuladio_modal" action="" method="POST" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-4">
                            <figure>
                                <img id="img_modal" src="" alt="" width="100%">
                            </figure>
                        </div>
                        <div class="col-md-8">
                            <div class="form-group">
                                <label for="arma">Arma codigo</label>
                                <input type="text" class="form-control" id="modal_arma" disabled>
                            </div>
                            <div class="form-group">
                                <label for="arma">Entregado a</label>
                                <input type="text" class="form-control" id="modal_persona" disabled>
                            </div>
                            <div class="form-group">
                                <label for="modal_fechaprestamo">Fecha de prestamo</label>
                                <input type="date" class="form-control" id="modal_fechaprestamo" disabled>
                            </div>
                            <div class="form-group">
                                <label for="modal_horaprestamo">Hora de prestamo</label>
                                <input type="time" class="form-control" id="modal_horaprestamo" disabled>
                            </div>
                            <div class="form-group">
                                <label for="modal_prestamo">Observaciones</label>
                                <input type="text" class="form-control" id="modal_observaciones" name="modal_observaciones">
                            </div>
                            <div class="form-group">
                                <label for="modal_devuelto">Devuelto por...</label>
                                <input type="text" class="form-control" id="modal_devuelto" name="modal_devuelto">
                            </div>
                            <div class="form-group">
                                <label for="modal_foto1">Foto 1</label>
                                <input type="file" class="form-control" id="modal_foto1" name="modal_foto1">
                            </div>
                            <div class="form-group">
                                <label for="modal_foto2">Foto 2</label>
                                <input type="file" class="form-control" id="modal_foto2" name="modal_foto2">
                            </div>
                            <div class="form-group">
                                <label for="modal_foto3">Foto 3</label>
                                <input type="file" class="form-control" id="modal_foto3" name="modal_foto3">
                            </div>
                            <button type="submit" class="btn btn-primary">Guardar</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            </div>    
        </div>
    </div>
</div>
<!----------------------------------------------------- modal para armas ------------------------------------------->

<!----------------------------------------------- modal para imagen -------------------------------------->
<div id="modal_foto_arma" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modal_foto_arma" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-body">
                <div class="row">
                    <form id="form-foto-arma">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="modal_foto1">Foto</label>
                                <input type="file" class="form-control" id="modal2_foto1" name="modal2_foto1">
                                <input type="hidden" id="detregistro_id" name="detregistro_id">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="modal_foto2">Foto 2</label>
                                <input type="file" class="form-control" id="modal2_foto2" name="modal2_foto2">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="modal_foto3">Foto 3</label>
                                <input type="file" class="form-control" id="modal2_foto3" name="modal2_foto3">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                <button class="btn btn-primary" onclick="guardar_fotos()">Guardar</button>
            </div>    
        </div>
    </div>
</div>
<!----------------------------------------------- modal para imagen -------------------------------------->
<!----------------------------------------------- modal buscar persona -------------------------------------->
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
<!----------------------------------------------- modal buscar persona -------------------------------------->



<script src="<?= site_url("resources/js/devolucion.js") ?>"></script>