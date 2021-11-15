document.querySelector("#persona_ci").addEventListener("keyup", event => {
    if(event.key == "Enter") 
        buscar_ci();
});

document.querySelector("#buscar_lapersona").addEventListener("keyup", event => {
    if(event.key == "Enter") 
        tablarepersona();
});

document.querySelector("#arma_codigo").addEventListener("keyup", event => {
    if(event.key == "Enter") 
        buscar_arma();
});

function set_detregistro(det_registro){
    this.det_registro = det_registro;
}

function get_detregistro(){
    return det_registro;
}

function set_registro(actual_registro){
    this.actual_registro = actual_registro;
}

function get_registro(){
    return actual_registro;
}

function buscar_ci(persona_ci=""){
    var ci;
    if (persona_ci === "") {
        ci = document.getElementById("persona_ci").value;
    } else {
        ci = persona_ci;
        $('#modalbuscarpersona').modal('hide');
    }
    var controlador = `${base_url}persona/buscar_persona`
    $.ajax({
        url: controlador,
        type: "POST",
        data:{ci:ci},
        success: function(respuesta){
            var resp = JSON.parse(respuesta);
            //1  var persona_informacion;
            var persona_src = `${base_url}resources/images/personas/${resp['persona_foto']}`;
            // $('#personainfo_foto').attr('src',persona_src);
            document.getElementById('personainfo_foto').src = persona_src;
            var html = `
                    <table>
                        <tbody>
                            <tr><td><b>Nombre:</b> ${resp['persona_apellido']} ${resp['persona_nombre']}</td></tr>
                            <tr><td><b>Grado:</b> ${resp['grado_descripcion']}</td></tr>
                            <tr><td><b>tipo:</b> ${resp['tipo_descripcion']}</td></tr>
                            <tr><td><b>Telf./Cel.:</b> ${resp['persona_telefono']} ${resp['persona_celular']}</td></tr>
                            <tr><td><b>Dirección:</b> ${resp['persona_direccion']}</td></tr>
                            <tr><td><b>Estado:</b> ${resp['estado_descripcion']}</td></tr>
                            <input id="personainfo_id" type="hidden" value="${resp['persona_id']}">
                        </tbody>
                    </table>
            `;
            $('#personainfo_informacion').html(html);
            //2  var registros_noTerminados;
            registros_noTerminados(resp['persona_id']);
            //3  var armas_no_entregadas;
            armas_pendientes(resp['persona_id']);
        },
        error:function(){
            alert('No se encuentro el carnet de identidad ')
        }
    });

    function registros_noTerminados(persona_id){
        var controlador = `${base_url}registro/get_all_registros`
        $.ajax({
            url: controlador,
            type: "POST",
            data:{persona_id:persona_id},
            success: function(respuesta){
                var registros = JSON.parse(respuesta);
                var html = ``;
                var reg_id = 0;
                if(registros.length == 1){
                    reg_id = registros[0]['registro_id'];
                }
                var i = 1;
                registros.forEach(reg => {
                    html += `<tr style="background-color:${reg['estado_color']}">
                                <td>${i}</td>
                                <td>${reg['registro_id']}</td>
                                <td>${reg['registro_fechasalida']} <br> ${reg['registro_horasalida']}</td>
                                <td>
                                    <button class="btn btn-xs btn-primary" title="Ir al registro" onclick="abrir_registro(${reg['registro_id']})"><i class="fa fa-sign-out" aria-hidden="true"></i></button>
                                </td>
                            </tr>`
                    i++;
                });
                
                if(reg_id != 0){
                    document.getElementById("registros").style.display = "none"
                    abrir_registro(reg_id);
                }else{
                    console.log(reg_id)
                    $("#registros_pendientes").html(html);
                    document.getElementById("registros").style.display = "block"
                }
            },
            error:function(){
                alert("error al mostrar los registros")
            }
        });
    }
}
function abrir_registro(registro_id){
    var controlador = `${base_url}registro/get_detalle_registro`
    set_registro(registro_id);
    $.ajax({
        url: controlador,
        type: "POST",
        data:{registro_id:registro_id},
        success:(resultado)=>{
            let result = JSON.parse(resultado);
            let html = ``;
            let i = 1;
            result.forEach(res => {
                html += `<tr id="arma-${res['arma_codigo']}" style="font-size: 10pt; background-color:${res['estado_color']};" >
                            <td>${i}</td>
                            <td>${res['tipoarma_descripcion']} - ${res['arma_codigo']}</td>
                            <td>${res['persona_apellido']} ${res['persona_nombre']}</td>
                            <td><span style="font-size: 10pt;">${res['registro_fechasalida']}<br>${res['registro_horasalida']}</span></td>
                            <td>
                                <input id="det_reg_observacion${res['detregistro_id']}" name="det_reg_observacion${res['detregistro_id']}" type="text" class="form-control" value="Sin novedad">
                            </td>
                            <td>
                                <button class="btn btn-sm btn-warning" title="Agregar imagenes" onclick="modal_fotos(${res['detregistro_id']})"><i class="fa fa-picture-o" aria-hidden="true"></i></button>
                            </td>
                            <td>
                                <input id="det_reg_devuelto${res['detregistro_id']}" name="det_reg_devuelto${res['detregistro_id']}" type="text" class="form-control">
                            </td>
                        </tr>`
                i++;
            });
            $('#armas_prestadas').html(html);
            set_detregistro(result);
        },
        error:()=>{
            alert("algo salio mal al obtener el detalle")
        }
    });
}

function buscar_arma(){
    var cod_arma = document.getElementById("arma_codigo").value;
    var controlador = `${base_url}registro/arma_registrada`
    var detreg_arma = get_detalle_arma(cod_arma); 
    if(detreg_arma != 0){
        $.ajax({
            url: controlador,
            type: "POST",
            data:{detalle_registro:detreg_arma['detregistro_id']},
            success:(resultado)=>{
                document.getElementById(`arma-${cod_arma}`).style.backgroundColor = "#80ff00"
                $('#arma_codigo').val("");
                $('#arma_codigo').focus();
            },
            error:()=>{
                alert("codigo no encontrado en este registro")
            }
        });
    }else{
        alert("El codigo de arma no se encontro en este registro");
    }
}

function get_detalle_arma(cod_arma){
    let detalle_registro = get_detregistro();
    let result = detalle_registro.find(detalle_registro => detalle_registro.arma_codigo === cod_arma);
    if(result === undefined){
        return 0;
    }else{
        console.log(result);
        return result;
    }
}

function guardar_registro(){
    var persona = document.getElementById('personainfo_id').value;
    var registro = get_registro();
    var controlador = `${base_url}registro/guardar_registro`
    var detregistros = get_detregistro();
    detregistros.forEach(reg => {
        reg['detregistro_observacion'] = document.getElementById(`det_reg_observacion${reg['detregistro_id']}`).value;
        reg['detregistro_devuelto'] = document.getElementById(`det_reg_devuelto${reg['detregistro_id']}`).value;
    });
    $.ajax({
        url: controlador,
        type: "POST",
        data:{persona:persona,registro:registro,detregistros:detregistros},
        success:()=>{

            // buscar_ci();
            window.location.href = `${base_url}registro/comprobantedev/${registro}`;
            // limpiar_tabla('armas_prestadas');
        },
        error:()=>{
            alert("algo salio mal al guardar el registro")
        }
    });
}

function armas_pendientes(persona_id){
    var controlador = `${base_url}registro/get_armas_pendientes_entrega`
    $.ajax({
        url: controlador,
        type: "POST",
        data:{persona_id:persona_id},
        success:(result)=>{
            let pendientes = JSON.parse(result)
            let html=``;
            let i = 1;
            pendientes.forEach(pendiente => {
                html += `<tr>
                            <td>${i}</td>
                            <td>${pendiente['tipoarma_descripcion']} <br> <span style="font-size: 8pt;"><b>Codigo:</b>${pendiente['arma_codigo']}</span></td>
                            <td>${pendiente['registro_fechasalida']}</td>
                            <td>${pendiente['registro_horasalida']}</td>
                            <td>
                                <button class="btn btn-xs btn-primary" onclick="modal_entrega(${pendiente['detregistro_id']})" title="Abrir formulario"><i class="fa fa-cube" aria-hidden="true"></i></button>
                            </td>
                        </tr>`
                i++;
            });
            $('#armas_pendientes').html(html);
            document.getElementById("armas").style.display = "block";        
            
        },
        error:()=>{
            alert("algo salio mal al obtener la lista de armas pendienes de entrega")
        }
    });
}

function modal_entrega(detregistro_id){
    let controlador = `${base_url}registro/get_detalle_registro2`;
    $.ajax({
        url: controlador,
        type: "POST",
        data:{detregistro_id:detregistro_id},
        success:(result)=>{
            res = JSON.parse(result);
            res = res[0];
            document.getElementById('img_modal').src = `${base_url}resources/images/arma/${res['arma_foto']}`;
            $('#modal_arma').val(`${res['tipoarma_descripcion']} - ${res['arma_codigo']}`);
            $('#modal_persona').val(`${res['persona_apellido']} ${res['persona_nombre']}`);
            $('#modal_fechaprestamo').val(res['registro_fechasalida']);
            $('#modal_horaprestamo').val(res['registro_horasalida']);

            val = `${base_url}registro/guardar_arma/${detregistro_id}`
            $("#formuladio_modal").attr("action",val);//cambia el action del form
        },
        error:()=>{
            alert("algo salio mal")
        }
    });
    $('#modal_entregar_arma').modal('show');
}

function modal_fotos(detregistro_id){
    $('#detregistro_id').val(detregistro_id);
    $('#modal_foto_arma').modal('show');
}

function guardar_fotos(detregistro_id){
    let controlador = `${base_url}registro/guardar_fotos`;
    let formData = new FormData($("#form-foto-arma")[0]);
    $.ajax({
        url: controlador,
        type: "POST",
        data:formData,
        cache: false,
        contentType: false,
        processData: false,
        success:()=>{
            console.log("las imagenes se guardaron correctament")
        },
        error:()=>{
            alert("algo salio mal")
        }
    });
    $('#modal_foto_arma').modal('hide');
}

function limpiar_tabla(tabla){
    $(`#${tabla}`).html = "";
}

function tablarepersona(){
    var controlador = `${base_url}persona/buscarpersonas`;
    var parametro = document.getElementById('buscar_lapersona').value;
    document.getElementById('loader_bpersona').style.display = 'block';
    $.ajax({url: controlador,
            type:"POST",
            data:{parametro:parametro},
            success:function(respuesta){
                //$("#encontrados").val("- 0 -");
                var registros =  JSON.parse(respuesta);
                if (registros != null){
                    // var n = registros.length; //tama«Ðo del arreglo de la consult            
                    html = `<table class='table table-striped no-print' id='mitabla'>
                                <tr>
                                    <th>N</th>
                                    <th>Cliente</th>
                                    <th></th>
                                </tr>
                                <tbody class='buscar' id='tablarepersona'>`;
                    let i = 1;
                    registros.forEach(registro => {
                        html += `<tr>
                                    <td class='text-center'>${i}</td>
                                    <td>
                                        <div class='col-md-12'>
                                        <b>${registro["persona_apellido"]} ${registro["persona_nombre"]}</b>
                                        </div>
                                    </td>
                                    <td>
                                        <button type='button' onclick='buscar_ci(${registro['persona_ci']})' class='btn btn-primary btn-xs'><i class='fa fa-search'></i></button>
                                    </td>
                                </tr>`;
                        i++;
                    });
                        html += `</tbody>`
                   $("#tablarepersona").html(html);
                   document.getElementById('loader_bpersona').style.display = 'none';
                }else{
                    document.getElementById('loader_bpersona').style.display = 'none';
                }
            },
            error:function(respuesta){
               html = "";
               $("#tablarepersona").html(html);
            }
    });
}