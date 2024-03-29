<script src="<?php echo base_url('resources/js/jquery-2.2.3.min.js'); ?>" type="text/javascript"></script>
<link href="<?php echo site_url('resources/css/formValidation.css')?>" rel="stylesheet">
<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Añadir Usuario</h3>
            </div>
            <?php $attributes = array("name" => "usuarioForm", "id"=>"usuarioForm");
            echo form_open_multipart("usuario/add", $attributes);?>
            <div class="box-body">
                <div class="row clearfix">
                    <div class="col-md-6">
                    <label for="usuario_nombre" class="control-label">Nombre</label>
                    <div class="form-group">
                            <input type="text" name="usuario_nombre" value="<?php echo $this->input->post('usuario_nombre'); ?>" class="form-control" id="usuario_nombre" required onkeyup="var start = this.selectionStart; var end = this.selectionEnd; this.value = this.value.toUpperCase(); this.setSelectionRange(start, end);" />
                            <span class="text-danger"><?php echo form_error('usuario_nombre');?></span>
                    </div>
                    </div>
                    <!--<div class="col-md-6">
                        <label for="tipousuario_id" class="control-label">Tipo</label>
                        <div class="form-group">
                            <select name="tipousuario_id" class="form-control" required>
                                <option value="">Tipo de usuario</option>
                                <?php 
                                /*foreach($all_tipo_usuario as $tipo_usuario)
                                {
                                    $selected = ($tipo_usuario['tipousuario_id'] == $this->input->post('tipousuario_id')) ? ' selected="selected"' : "";
                                    echo '<option value="'.$tipo_usuario['tipousuario_id'].'" '.$selected.'>'.$tipo_usuario['tipousuario_descripcion'].'</option>';
                                }*/
                                ?>
                            </select>
                        </div>
                    </div>-->
                    <div class="col-md-6">
                        <label for="usuario_email" class="control-label">Email</label>
                        <div class="form-group">
                            <input type="email" name="usuario_email" value="<?php echo $this->input->post('usuario_email'); ?>" class="form-control" id="usuario_email" />
                            <span class="text-danger"><?php echo form_error('usuario_email');?></span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="user_login" class="control-label">Login</label>
                        <div class="form-group">
                            <input type="text" name="usuario_login" value="<?php echo $this->input->post('usuario_login'); ?>" class="form-control" id="usuario_login"  autocomplete="off" />
                            <span class="text-danger"><?php echo form_error('usuario_login');?></span>
                            <div id="user-result"></div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label for="usuario_clave" class="control-label">Clave</label>
                        <div class="form-group">
                            <input type="password" name="usuario_clave"  class="form-control" id="usuario_clave" required/>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label for="usuario_clave" class="control-label">Repetir Clave</label>
                        <div class="form-group">
                            <input type="password" name="rusuario_clave"  class="form-control" id="rusuario_clave" required/>
                        </div>
                    </div>
                    <!--<div class="col-md-4">
                        <label for="parametro_id" class="control-label">Perfil</label>
                        <div class="form-group">
                            <select name="parametro_id" id="parametro_id" class="form-control">
                                <?php 
                                /*foreach($all_parametros as $parametro)
                                {
                                    echo '<option value="'.$parametro['parametro_id'].'">'.$parametro['parametro_id'].'</option>';
                                }*/
                                ?>
                            </select>
                        </div>
                    </div>-->
                    <div class="col-md-6">
                        <label for="user_imagen" class="control-label">Imagen</label>
                        <div class="form-group">
                            <input type="file" name="usuario_imagen"  id="usuario_imagen" kl_virtual_keyboard_secure_input="on" class="form-control.input"  value="<?php echo $this->input->post('usuario_imagen'); ?>">
                            <small class="help-block" data-fv-result="INVALID" data-fv-for="chivo" data-fv-validator="notEmpty" style=""></small>
                            <h4 id='loading' ></h4>
                            <div id="message"></div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <img src="<?php echo site_url('uploads/profile/default.jpg')?>" id="previewing" class="img-responsive center-block">
                    </div>
                </div>
            </div>
            <div class="box-footer">
                <button type="submit" id="boton" class="btn btn-success">
                    <i class="fa fa-check"></i> Guardar
                </button>
                <a href="index"><button type="button" class="btn btn-danger">
                    <i class="fa fa-times"></i> Cancelar
                    </button>
                </a>
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
                tipousuario_id:{
                    validators:{
                        notEmpty: {
                            message: 'Elegir un tipo de usuario'
                        }
                    }
                },

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
                usuario_email: {
                    validators: {
                        /*notEmpty: {
                            message: 'Email es un campo requerido'
                        },*/
                        emailAddress: {
                            message: 'Entrada no es un email valido'
                        }
                    }
                },
                usuario_imagen: {
                    validators: {
                        file: {
                            extension: 'jpeg,jpg,png',
                            type: 'image/jpeg,image/png',
                            maxSize: 360800,   // 2048 * 1024
                            message: 'El archivo seleccionado no es valido, Tamaño Maximo 350 Kb'
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

        function imageIsLoaded(e) {
            $("#usuario_imagen").css("color","green");
            $('#image_preview').css("display", "block");
            $('#previewing').attr('src', e.target.result);
            $('#previewing').attr('width', '50%');
            $('#previewing').attr('height', '59%');
        };

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

        function check_login_ajax(userlogin){

            var parametros = {
                'login':userlogin
            };
            //alert('num:'+usernumero+',iddes:'+useriddes);
            $.ajax({
                data:  parametros,
                url:   '<?php echo base_url('admin/dashb/haylogin1')?>',
                type:  'post',
//                    dataType: "json",
                beforeSend: function () {
                    /// $("#registrando").html("<h5>Procesando, espere por favor...</h5>");
                    $("#user-result").html('<img src="<?php echo base_url('resources/images/loader.gif')?>" />');
                },
                success:  function (response) {
                    console.log(response);
                    if(response=='1'){
                        $("#user-result").html('<small style="color: #f0120a;" class="help-block"><i class="fa fa-close"></i> El login: '+userlogin+' Ya esta en uso, elija otro</small>');
                        $("#usuarioForm").attr('class', 'form-group has-feedback has-error');
                        $("#boton").attr( "disabled","disabled" );
                    }
                    if(response=='0'){
                        $("#user-result").html('<i class="fa fa-check" style="color: #00CC00;"></i>');
                        $("#usuarioForm").attr('class', 'form-group');
                        $("#boton").removeAttr("disabled");
                    }
                }
            });
        }


    });
</script>

<script src="<?php echo base_url('resources/js/formValidation.js');?>"></script>
<script src="<?php echo base_url('resources/js/formValidationBootstrap.js');?>"></script>