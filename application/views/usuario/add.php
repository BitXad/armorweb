<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Usuario Add</h3>
            </div>
            <?php echo form_open('usuario/add'); ?>
          	<div class="box-body">
          		<div class="row clearfix">
					<div class="col-md-6">
						<label for="usuario_nombre" class="control-label">Nombre</label>
						<div class="form-group">
							<input type="text" name="usuario_nombre" value="<?php echo $this->input->post('usuario_nombre'); ?>" class="form-control" id="usuario_nombre" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="usuario_login" class="control-label">Usuario Login</label>
						<div class="form-group">
							<input type="text" name="usuario_login" value="<?php echo $this->input->post('usuario_login'); ?>" class="form-control" id="usuario_login" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="usuario_clave" class="control-label">Clave</label>
						<div class="form-group">
							<input type="password" name="usuario_clave" value="<?php echo $this->input->post('usuario_clave'); ?>" class="form-control" id="usuario_clave" required/>
						</div>
					</div>
				</div>
			</div>
          	<div class="box-footer">
            	<button type="submit" class="btn btn-success">
            		<i class="fa fa-check"></i> Guardar
            	</button>
				<a href="<?php echo site_url('usuario'); ?>" class="btn btn-danger"><i class="fa fa-times"></i> Cancelar</a>
          	</div>
            <?php echo form_close(); ?>
      	</div>
    </div>
</div>


<script>
    $(document).ready(function() {

        $('#usuarioForm').formValidation({
            message: 'This value is not valid',
            icon: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                usuario_nombre: {
                    validators: {
                        notEmpty: {
                            message: 'Nombre es un campo requerido'
                        },
                        stringLength: {
                            min: 3,
                            max: 150,
                            message: 'Nombre debe tener al menos 3 caracteres y maximo 150'
                        },
                        regexp: {
                            regexp: /^[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]+$/u,
                            message: 'Solo es posible usar letras y espacios en blanco'
                        }
                    }
                },
                usuario_clave:{
                    validators:{
                        notEmpty: {
                            message: 'Password es obligatorio'
                        }
                    }
                },
                rusuario_clave: {
                    validators: {
                        notEmpty: {
                            message: 'Repetir Password es obligatorio'
                        },
                        identical: {
                            field: 'usuario_clave',
                            message: 'Los campos no son iguales, vuelva a intentar'
                        }
                    }
                }
            }
        });


        $(function() {
            $("#usuario_imagen").change(function() {

                $("#message").empty(); // To remove the previous error message
                var file = this.files[0];
                var imagefile = file.type;
                var match= ["image/jpeg","image/png","image/jpg"];
                if(!((imagefile==match[0]) || (imagefile==match[1]) || (imagefile==match[2])))
                {
                    $('#previewing').attr('src','default.png');
                    $("#message").html("<p id='error'>Seleccione archivo valido</p>"+"<h4>Note</h4>"+"<span id='error_message'>Only jpeg, jpg and png Images type allowed</span>");
                    return false;
                }
                else
                {
                    var reader = new FileReader();
                    reader.onload = imageIsLoaded;
                    reader.readAsDataURL(this.files[0]);
                }
            });
        });

        var x_timer;
        $("#usuario_login").keyup(function (e){
            clearTimeout(x_timer);
            var user_login = $(this).val();
            //if(  isNaN(user_numero) ){
            x_timer = setTimeout(function(){
                check_login_ajax(user_login);
            }, 1000);
            //}
        });

//         function check_login_ajax(userlogin){

//             var parametros = {
//                 'login':userlogin
//             };
//             //alert('num:'+usernumero+',iddes:'+useriddes);
//             $.ajax({
//                 data:  parametros,
//                 url:   '<?php echo base_url('admin/dashb/haylogin1')?>',
//                 type:  'post',
// //                    dataType: "json",
//                 beforeSend: function () {
//                     /// $("#registrando").html("<h5>Procesando, espere por favor...</h5>");
//                     $("#user-result").html('<img src="<?php echo base_url('resources/images/loader.gif')?>" />');
//                 },
//                 success:  function (response) {
//                     console.log(response);
//                     if(response=='1'){
//                         $("#user-result").html('<small style="color: #f0120a;" class="help-block"><i class="fa fa-close"></i> El login: '+userlogin+' Ya esta en uso, elija otro</small>');
//                         $("#usuarioForm").attr('class', 'form-group has-feedback has-error');
//                         $("#boton").attr( "disabled","disabled" );
//                     }
//                     if(response=='0'){
//                         $("#user-result").html('<i class="fa fa-check" style="color: #00CC00;"></i>');
//                         $("#usuarioForm").attr('class', 'form-group');
//                         $("#boton").removeAttr("disabled");
//                     }
//                 }
//             });
//         }


    });
</script>

<script src="<?php echo base_url('resources/js/formValidation.js');?>"></script>
<script src="<?php echo base_url('resources/js/formValidationBootstrap.js');?>"></script>