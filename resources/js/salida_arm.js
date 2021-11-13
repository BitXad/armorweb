$(document).on("ready",inicio);
function inicio(){
    get_detalle_registro_aux();
}

function buscarpersona(e) {
    tecla = (document.all) ? e.keyCode : e.which;  
    if (tecla==13){ 
        tablarepersona();
    }
}

function tablarepersona(){
    var base_url = document.getElementById('base_url').value;
    var controlador = base_url+'persona/buscarpersonas';
    var parametro = document.getElementById('buscar_lapersona').value;
    document.getElementById('loader_bpersona').style.display = 'block';
    $.ajax({url: controlador,
            type:"POST",
            data:{parametro:parametro},
            success:function(respuesta){
                //$("#encontrados").val("- 0 -");
                var registros =  JSON.parse(respuesta);
                if (registros != null){
                    var n = registros.length; //tama«Ðo del arreglo de la consulta
                    //$("#encontrados").val("- "+n+" -");
                    html = "";
                    html += "<table class='table table-striped no-print' id='mitabla'>";
                    html += "<tr>";
                    html += "<th>N</th>";
                    //html += "<th>ID</th>";
                    html += "<th>Cliente</th>";
                    html += "<th></th>";
                    html += "</tr>";
                    html += "<tbody class='buscar' id='tablarepersona'>";
                    for (var i = 0; i < n ; i++){
                        html += "<tr>";
                        html += "<td class='text-center'>"+(i+1)+"</td>";
                        html += "<td>";
                        html += "<div class='col-md-12'>";
                        html += "<b>"+registros[i]["persona_apellido"]+" "+registros[i]["persona_nombre"]+"</b>";
                        html += "</div>";
                        html += "</td>";
                        html += "<td>";
                        html += "<button type='button' onclick='repopersona("+JSON.stringify(registros[i])+")' class='btn btn-primary btn-xs'><i class='fa fa-search'></i></button>";
                        html += "</td>";
                        html += "</tr>";
                   }
                       html += "</tbody>"
                   $("#tablarepersona").html(html);
                   document.getElementById('loader_bpersona').style.display = 'none';
                }else{
                    document.getElementById('loader_bpersona').style.display = 'none';
                }
            },
            error:function(respuesta){
               // alert("Algo salio mal...!!!");
               html = "";
               $("#tablarepersona").html(html);
            }
    });
}

function repopersona(persona){
    var base_url = document.getElementById('base_url').value;
    $("#lapersona_id").val(persona['persona_id']);
    $("#lafoto").html("<img src='"+base_url+"/resources/images/personas/"+persona['persona_foto']+"' width='90' height='90' >");
    $("#elnombre").html(persona['grado_descripcion']+" "+persona['persona_apellido']+" "+persona['persona_nombre']);
    $("#elci").html(persona['persona_ci']);
    $("#eltelefono").html(persona['persona_telefono']+" - "+persona['persona_celular']);
    $("#ladireccion").html(persona['persona_direccion']);
    $("#buscar_lapersona").val("");
    $("#tablarepersona").html("");
    $('#modalbuscarpersona').modal('hide');
}

function validarcodigo(e){
    tecla = (document.all) ? e.keyCode : e.which;  
    if (tecla==13){ 
        buscarcodigo_arma();
    }
}

function buscarcodigo_arma(){
    var base_url = document.getElementById('base_url').value;
    var controlador = base_url+'salida_armamento/buscar_porcodigo';
    var codigo = document.getElementById('codigo').value;
    document.getElementById('loader_arma').style.display = 'block'; //mostrar el bloque del loader
    
    $.ajax({url: controlador,
            type:"POST",
            data:{codigo:codigo},
            success:function(respuesta){
                //$("#encontrados").val("- 0 -");
                //var registros =  JSON.parse(respuesta);
                var resultado =  JSON.parse(respuesta);
                var registros = resultado.res;
                var lapersona_id = resultado.persona_id;
                if (registros != null){
                    if (registros == "no"){
                        alert("El arma con ese codigo no esta registrado en el sistema o ya fue dado de baja!.");
                        document.getElementById('loader_arma').style.display = 'none';
                    }else{
                        if(lapersona_id >0){
                            get_persona(lapersona_id);
                        }
                        document.getElementById('loader_arma').style.display = 'none';
                        get_detalle_registro_aux();
                   }
                }else{
                    document.getElementById('loader_arma').style.display = 'none';
                }
            },
            error:function(respuesta){
               // alert("Algo salio mal...!!!");
               html = "";
               $("#resultadosalidader").html(html);
            }
    });
}

function get_detalle_registro_aux(){
    var base_url = document.getElementById('base_url').value;
    var controlador = base_url+'salida_armamento/get_detalle_aux';
    //var codigo = document.getElementById('codigo').value;
    document.getElementById('loader_arma').style.display = 'block'; //mostrar el bloque del loader
    
    $.ajax({url: controlador,
            type:"POST",
            data:{},
            success:function(respuesta){
                //$("#encontrados").val("- 0 -");
                var registros =  JSON.parse(respuesta);
                if (registros != null){
                    var n = registros.length; //tama«Ðo del arreglo de la consulta
                    //$("#encontrados").val("- "+n+" -");
                    html = "";
                    for (var i = 0; i < n ; i++){
                        html += "<tr>";
                        html += "<td class='text-center'>"+1+"</td>";
                        html += "<td>";
                        html += registros[i]['tipoarma_descripcion']+"<br>";
                        html += "<small>"+registros[i]['arma_codigo']+"</small>";
                        html += "</td>";
                        html += "<td>";
                        if(registros[i]['persona_id']>0){
                            html += registros[i]["grado_descripcion"]+" "+registros[i]["persona_apellido"]+" "+registros[i]["persona_nombre"];
                        }
                        html += "</td>";
                        html += "<td>";
                        html += registros[i]["arma_novedades"];
                        html += "</td>";
                        html += "<td>";
                        html += "<button type='button' onclick='eliminardetalle_aux("+JSON.stringify(registros[i]["detregistro_id"])+")' class='btn btn-danger btn-xs'><i class='fa fa-times'></i></button>";
                        html += "</td>";
                        html += "</tr>";
                    }
                    $("#resultadosalidader").html(html);
                    document.getElementById('loader_arma').style.display = 'none';
                }else{
                    document.getElementById('loader_arma').style.display = 'none';
                }
            },
            error:function(respuesta){
               // alert("Algo salio mal...!!!");
               html = "";
               $("#resultadosalidader").html(html);
            }
    });
}

function quitartodo(){
    var base_url = document.getElementById('base_url').value;
    var controlador = base_url+'salida_armamento/quitartodo_deaux';
    //var codigo = document.getElementById('codigo').value;
    document.getElementById('loader_arma').style.display = 'block'; //mostrar el bloque del loader
    
    $.ajax({url: controlador,
            type:"POST",
            data:{},
            success:function(respuesta){
                //$("#encontrados").val("- 0 -");
                var registros =  JSON.parse(respuesta);
                if (registros != null){
                    document.getElementById('loader_arma').style.display = 'none';
                    get_detalle_registro_aux();
                }else{
                    document.getElementById('loader_arma').style.display = 'none';
                }
            },
            error:function(respuesta){
               // alert("Algo salio mal...!!!");
               html = "";
               $("#resultadosalidader").html(html);
            }
    });
}

/* elimia un detalle de la tabla auxiliar!...*/
function eliminardetalle_aux(detregistro_id){
    var base_url = document.getElementById('base_url').value;
    var controlador = base_url+'salida_armamento/quitardetalle_deaux';
    //var codigo = document.getElementById('codigo').value;
    document.getElementById('loader_arma').style.display = 'block'; //mostrar el bloque del loader
    
    $.ajax({url: controlador,
            type:"POST",
            data:{detregistro_id:detregistro_id},
            success:function(respuesta){
                //$("#encontrados").val("- 0 -");
                var registros =  JSON.parse(respuesta);
                if (registros != null){
                    document.getElementById('loader_arma').style.display = 'none';
                    get_detalle_registro_aux();
                }else{
                    document.getElementById('loader_arma').style.display = 'none';
                }
            },
            error:function(respuesta){
               // alert("Algo salio mal...!!!");
               html = "";
               $("#resultadosalidader").html(html);
            }
    });
}

/* registra la salida de armamento */
function registrar_salida(){
    var base_url = document.getElementById('base_url').value;
    var controlador = base_url+'salida_armamento/registrar_salida';
    document.getElementById('loader_arma').style.display = 'block'; //mostrar el bloque del loader
    var persona_id = document.getElementById('lapersona_id').value;
    if(persona_id > 0){
        $.ajax({url: controlador,
            type:"POST",
            data:{persona_id:persona_id},
            success:function(respuesta){
                //$("#encontrados").val("- 0 -");
                var registros =  JSON.parse(respuesta);
                if (registros != null){
                    document.getElementById('loader_arma').style.display = 'none';
                    get_detalle_registro_aux();
                    limpiar_infpersona();
                }else{
                    document.getElementById('loader_arma').style.display = 'none';
                }
            },
            error:function(respuesta){
               // alert("Algo salio mal...!!!");
               html = "";
               $("#resultadosalidader").html(html);
            }
        });
    }else{
        document.getElementById('loader_arma').style.display = 'none';
        $('#modalbuscarpersona').modal('show');
    }
}

function get_persona(persona_id){
    var base_url = document.getElementById('base_url').value;
    var controlador = base_url+'salida_armamento/obtener_persona';
    document.getElementById('loader_arma').style.display = 'block'; //mostrar el bloque del loader
    
    $.ajax({url: controlador,
            type:"POST",
            data:{persona_id:persona_id},
            success:function(respuesta){
                //$("#encontrados").val("- 0 -");
                var registros =  JSON.parse(respuesta);
                
                if (registros != null){
                    repopersona(registros[0]);
                }else{
                    document.getElementById('loader_arma').style.display = 'none';
                }
            },
            error:function(respuesta){
               // alert("Algo salio mal...!!!");
               html = "";
               $("#resultadosalidader").html(html);
            }
    });
}
/* limpiar inf persona */
function limpiar_infpersona(){
    var base_url = document.getElementById('base_url').value;
    $("#lapersona_id").val(0);
    $("#lafoto").html("<img src='"+base_url+"/resources/images/personas/"+"default.jpg"+"' width='90' height='90' >");
    $("#elnombre").html("");
    $("#elci").html("");
    $("#eltelefono").html("");
    $("#ladireccion").html("");
    $("#codigo").val("");
    $("#codigo").focus();
    //$("#buscar_lapersona").val("");
    //$("#tablarepersona").html("");
    //$('#modalbuscarpersona').modal('hide');
}