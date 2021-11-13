

<script type="text/javascript">
    $(document).ready(function()
    {
        window.onload = window.print();
      
    });
</script>
<!----------------------------- script buscador --------------------------------------->
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

<style type="text/css">
    @media print {
      .bg-danger {
        background-color: #f2dede !important;
      }
    }
</style>


<style type="text/css">


p {
    font-family: Arial;
    font-size: 7pt;
    line-height: 120%;   /*esta es la propiedad para el interlineado*/
    color: #000;
    padding: 10px;
}

div {
margin-top: 0px;
margin-right: 0px;
margin-bottom: 0px;
margin-left: 10px;
margin: 0px;
}


table{
width : 7cm;
margin : 0 0 0px 0;
padding : 0 0 0 0;
border-spacing : 0 0;
border-collapse : collapse;
font-family: Arial;
font-size: 7pt;  

td {
border:hidden;
}
}

td#comentario {
vertical-align : bottom;
border-spacing : 0;
}
div#content {
background : #ddd;
font-size : 7px;
margin : 0 0 0 0;
padding : 0 5px 0 5px;
border-left : 1px solid #aaa;
border-right : 1px solid #aaa;
border-bottom : 1px solid #aaa;
}
</style>
<!----------------------------- fin script buscador --------------------------------------->
<!------------------ ESTILO DE LAS TABLAS ----------------->
<!--<link href="<?php echo base_url('resources/css/mitabla.css'); ?>" rel="stylesheet">-->

<!---------------------- Modal ---------------------------->
<?php $tipo_factura = 4;//$parametro[0]["parametro_altofactura"]; //15 tamaño carta 
      $ancho = 17; //$parametro[0]["parametro_anchofactura"];
      //$margen_izquierdo = "col-xs-".$parametro[0]["parametro_margenfactura"];;
      $margen_izquierdo = "2cm"; //$parametro[0]["parametro_margenfactura"]."cm";
?>

<!--        <div id="myModalAnular" class="modal fade no-print" role="dialog">
          <div class="modal-dialog">

             Modal content
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Anular Factura</h4>
              </div>
              <div class="modal-body">
                  <h3>              
                  <p>
                    ADVERTENCIA: La factura Nº: <?php //echo $factura[0]['factura_numero']; ?>, esta a punto de ser ANULADA. ¿Desea continuar?
                  </p>
                  </h3>
              </div>
              <div class="modal-footer">
                  <a href="<?php //echo base_url('factura/anular_factura/'.$factura[0]['factura_id']."/".$factura[0]['factura_numero']); ?>" type="button" class="btn btn-warning" ><i class="fa fa-times-rectangle"></i> Anular</a>
                  <button type="button" class="btn btn-danger" data-dismiss="modal">Salir</button>
              </div>
            </div>

          </div>
        </div>-->
<!-------------------------------------------------------->


<table class="table" >
<tr>
<td style="padding: 0; width: <?php echo $margen_izquierdo; ?>" >
    
</td>
<td style="padding: 0;">
    


            <table class="table" style="width: <?php echo $ancho;?>cm; padding: 0;" >
                <tr>
                    
                    <td style="width: <?php echo $ancho / 3;?>cm;  padding: 0; line-height: 9px;" colspan="3">

                <center>
                               
                    <img src="<?php echo base_url('resources/images/empresas/').$empresa[0]['empresa_imagen']; ?>" width="80px" height="60px"><br>
                    <font size="3" face="Arial"><b><?php echo $empresa[0]['empresa_nombre']; ?></b></font><br>
                    <font size="1" face="Arial"><?php echo $empresa[0]['empresa_direccion']; ?></font><br>
                    <font size="1" face="Arial"><?php echo $empresa[0]['empresa_telefono']; ?></font><br>
                    <font size="1" face="Arial"><?php echo $empresa[0]['empresa_ubicacion']; ?></font>
                

                </center>                          
                    </td>
                    <td style="width: <?php echo 6;?>cm;  padding: 0; line-height: 12px;">
                        <center>            
                            <br>
                            <br>
                            <br>
                            
                                <font size="3" face="arial"><b>DEVOLUCION DE ARMAMENTO</b></font> <br>
                                <font size="3" face="arial"><b>Nº:  D-00<?php echo $registro[0]['registro_id']; ?> </b></font>                       

                        </center>
                    </td>
                    
                    <td style="width: <?php echo $ancho / 5;?>cm;  padding: 0; line-height: 10px;">
                        

                    </td>
                </tr>
                <tr>
                    <td>
                        
                    </td>
                </tr>
                
                             
                <?php $fecha = new DateTime($registro[0]['registro_fechasalida']); 
                        $fecha_d_m_a = $fecha->format('d/m/Y');
                  ?>
                
                <tr style="padding: 0;">
                    <td colspan="5" style="padding: 0;">
                        
                        <table style="font-family: Arial; font-size: 10px; width: <?php echo $ancho;?>cm;" id="mitabla" > 
                            
                                
                            <tr>
                                <td style="width: 2cm;"></td> 
                                <td style="width: 4cm; text-align: right; background-color: #aaa !important; -webkit-print-color-adjust: exact;" nowrap ><b>EN FECHA: </b></td><td></td> <td style="width: 10cm; background-color: #ddd !important; -webkit-print-color-adjust: exact;"><?php echo $fecha_d_m_a." ".$registro[0]['registro_horasalida']; ?></td>
                                <td style="width: 2cm;"></td> 
                            </tr>

                            <tr>
                                <td style="width: 2cm;"></td>
                                <td style="width: 5cm; text-align: right; background-color: #aaa !important; -webkit-print-color-adjust: exact;" nowrap><b>SE RECIBIO DE: </b></td><td ></td><td style="width: 10cm; background-color: #ddd !important; -webkit-print-color-adjust: exact;"><?php echo $registro[0]['persona_apellido']." ".$registro[0]['persona_nombre']; ?></td>
                                <td style="width: 2cm;"></td>
                            </tr>
                           
                        
                        </table>     
                        
                    </td>  

                </tr>

                            <tr>
                            <td class="vacio"> </td>
                            </tr>

                <tr style=" border-style: solid;   border-width: medium; border-color: black; border-width: 2px; padding:0; border-left: white; border-right: white;">
                    <td colspan="5">
                
                <table class="table table-condensed"  style="width: <?php echo $ancho;?>cm; margin: 0;" >
                      
                    <tr>
                        <th style="background-color: #aaa !important; -webkit-print-color-adjust: exact;" nowrap >CODIGO</th>
                        <th style="background-color: #aaa !important; -webkit-print-color-adjust: exact;" nowrap >DESCRIPCION</th>
                        <th style="background-color: #aaa !important; -webkit-print-color-adjust: exact;" nowrap >CANT</th>
                        <th style="background-color: #aaa !important; -webkit-print-color-adjust: exact;" nowrap >FECHA<br>DEVOLUCIÓN</th>
                        <th style="background-color: #aaa !important; -webkit-print-color-adjust: exact;" nowrap >ESTADO</th>
                        <th style="background-color: #aaa !important; -webkit-print-color-adjust: exact;" nowrap >PRESTAMO</th>
                        <th style="background-color: #aaa !important; -webkit-print-color-adjust: exact;" nowrap >OBSERV</th>
                    </tr>

                    <?php $num = 0; 
                        foreach($registro as $r){ ?>
             
                        <tr>
                         <td><?php echo $r["arma_codigo"]; ?></td> 
                         <td><?php echo $r["tipoarma_descripcion"]; ?></td> 
                         <td><?php echo 1; ?></td> 
                         <td><?php echo $r["detregistro_fechadevolucion"]." ".$r["detregistro_horadevolucion"]; ?></td> 
                         <td><?php echo $r["estado_arma"]; ?></td> 
                         <td><?php echo $r["estado_prestamo"]; ?></td> 
                         <td><?php echo $r["detregistro_observacion"]; ?></td> 
                        </tr>
                         
                    <?php } ?>


            
            </table>
               
            </td>
            </tr>

            <tr>
            <td style="line-height: 8px;" colspan="2"> 
                    <br><br>
                    <br><br>
                    <center>

                        <?php echo "-----------------------------------------------------"; ?><br>
                        <?php echo "RECIBI CONFORME"; ?><br><?php //echo $registro[0]['usuario_nombre'];?>
                        <?php echo $registro[0]["usuario_nombre"]; ?><br>   

                    </center>
                     <?php echo date("d/m/Y H:i:s");?>
                </td>
                <td>
                </td>
               

                <td style="line-height: 8px;" colspan="2"> 
                    <br><br>
                    <br><br>
                    <center>

                        <?php echo "-----------------------------------------------------"; ?><br>
                        <?php echo "ENTREGUE CONFORME"; ?><br>   
                        
                    </center>
                </td>
        </tr>   

    </table>


        
</td>
</tr>
</table>