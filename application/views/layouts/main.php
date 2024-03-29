<!DOCTYPE html>
<html>
    <head>
        <?php
        $session_data = $this->session->userdata('logged_in');
        ?>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Armorweb<?php if(isset($page_title)){ echo " - ".$page_title; }?> </title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <!-- Bootstrap 3.3.6 -->
        <link rel="stylesheet" href="<?php echo site_url('resources/css/bootstrap.min.css');?>">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="<?php echo site_url('resources/css/font-awesome.min.css');?>">
        <!-- Ionicons -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
        <!-- Datetimepicker -->
        <link rel="stylesheet" href="<?php echo site_url('resources/css/bootstrap-datetimepicker.min.css');?>">
        <!-- Theme style -->
        <link rel="stylesheet" href="<?php echo site_url('resources/css/AdminLTE.min.css');?>">
        <!-- AdminLTE Skins. Choose a skin from the css/skins
             folder instead of downloading all of them to reduce the load. -->
        <link rel="stylesheet" href="<?php echo site_url('resources/css/_all-skins.min.css');?>">
        <link rel="stylesheet" href="<?php echo site_url('resources/css/main.css');?>">
    </head>
    
    <body class="hold-transition skin-blue sidebar-mini">
        <div class="wrapper">
            <header class="main-header">
                <!-- Logo -->
                <a href="" class="logo">
                    <!-- mini logo for sidebar mini 50x50 pixels -->
                    <span class="logo-mini">EAAT</span>
                    <!-- logo for regular state and mobile devices -->
                    <span class="logo-lg">EAAT</span>
                </a>
                <!-- Header Navbar: style can be found in header.less -->
                <nav class="navbar navbar-static-top">
                    <!-- Sidebar toggle button-->
                    <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </a>

                    <div class="navbar-custom-menu">
                        <ul class="nav navbar-nav">
                        <!-- User Account: style can be found in dropdown.less -->
                            <li class="dropdown user user-menu">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <img src="<?php echo site_url('resources/images/usuarios/'.$session_data['thumb']);  ?>" class="user-image" alt="User Image">
                                    <span class="hidden-xs"><?php echo strtolower($session_data['usuario_login'])?></span>
                                </a>
                                <ul class="dropdown-menu">
                                    <!-- User image -->
                                    <li class="user-header">
                                        <img src="<?php echo site_url('resources/images/usuarios/'.$session_data['usuario_imagen']);?>" class="img-circle" alt="User Image">
                                        <p>
                                            <?php echo $session_data['usuario_nombre']; /*.' - '.$session_data['tipousuario_descripcion']*/ ?>
                                            <small><?php echo $session_data['usuario_email']; ?></small>
                                        </p>
                                    </li>
                                    <!-- Menu Footer-->
                                    <li class="user-footer">
                                        <!--<div class="pull-left">
                                            <a href="<?php //echo site_url()?>admin/dashb/cuenta" class="btn btn-default btn-flat">Mi Cuenta</a>
                                        </div>-->
                                        <div class="pull-right">
                                            <a href="<?php echo site_url()?>login/logout" class="btn btn-default btn-flat">Salir</a>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </nav>
            </header>
            <!-- Left side column. contains the logo and sidebar -->
            <aside class="main-sidebar">
                <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar">
                    <!-- Sidebar user panel -->
                    <div class="user-panel">
                        <div class="pull-left image">
                            <img src="<?php echo site_url('resources/images/usuarios/'.$session_data['thumb']);?>" class="img-circle" alt="User Image">
                        </div>
                        <div class="pull-left info">
                            <p><?php echo strtolower($session_data['usuario_nombre']) ?></p>
                            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                        </div>
                    </div>
                    <!-- sidebar menu: : style can be found in sidebar.less -->
                    <ul class="sidebar-menu">
                        
                        <li class="header">MENU</li>                        
                                                
                        <li>
                            <a href="<?php echo site_url('registro');?>">
                                <i class="fa fa-dashboard"></i> <span>Inicio</span>
                            </a>
                        </li>
                        
                        
                        <li>
                            <a href="#"><i class="fa fa-connectdevelop"></i> <span>Operaciones</span></a>
                            <ul class="treeview-menu">
                                
                                <li>
                                    <a href="<?php echo site_url('salida_armamento');?>">
                                        <i class="fa fa-legal"></i> <span>Salida de Armamento</span>
                                    </a>
                                </li>
                                
                                <li>
                                    <a href="<?php echo site_url('registro/devolucion');?>">
                                        <i class="fa fa-backward"></i> <span>Ingreso de Armamento</span>
                                    </a>
                                </li>

                                
                            </ul>
                        </li>
                        
                        <li>
                            <a href="#"><i class="fa fa-book"></i> <span>Registro</span></a>
                            <ul class="treeview-menu">
                                
                                <li>
                                    <a href="<?php echo site_url('arma');?>">
                                        <i class="fa fa-legal"></i> <span>Armamento</span>
                                    </a>
                                </li>

                                <li>
                                    <a href="<?php echo site_url('persona');?>">
                                        <i class="fa fa-address-book-o"></i> <span>Personal</span>
                                    </a>
                                </li>
                                
                            </ul>
                        </li>
                                
                        
                        <li>
                            <a href="#"><i class="fa fa-list-alt"></i> <span>Parametros</span></a>
                            <ul class="treeview-menu">
                                
                                <li>
                                    <a href="<?php echo site_url('estado');?>">
                                        <i class="fa fa-chain-broken"></i> <span>Estado</span>
                                    </a>
                                </li>
                                
                                <li>
                                    <a href="<?php echo site_url('grado_persona');?>">
                                        <i class="fa fa-fire"></i> <span>Grados</span>
                                    </a>
                                </li>

                                <li>
                                    <a href="<?php echo site_url('tipo_arma');?>">
                                        <i class="fa fa-codepen"></i> <span>Tipo de Arma</span>
                                    </a>
                                </li>
                                
                                <li>
                                    <a href="<?php echo site_url('tipo_persona');?>">
                                        <i class="fa fa-group"></i> <span>Tipo Persona</span>
                                    </a>
                                </li>

                                
                            </ul>
                        </li>
                        
                        <li>
                            <a href="#"><i class="fa fa-paperclip"></i> <span>Reportes</span></a>
                            <ul class="treeview-menu">
                                
                                <li>
                                    <a href="<?php echo site_url('arma/inventario');?>">
                                        <i class="fa fa-chain-broken"></i> <span>Inventario</span>
                                    </a>
                                </li>
                                
                                <li>
                                    <a href="<?php echo site_url('arma/prestamos_activos');?>">
                                        <i class="fa fa-fire"></i> <span>Prestamos activos</span>
                                    </a>
                                </li>
                                
                                <li>
                                    <a href="<?php echo site_url('registro/reimpresion');?>">
                                        <i class="fa fa-print"></i> <span>Re-impresión</span>
                                    </a>
                                </li>

                                <li>
                                    <a href="<?php echo site_url('arma/planilla_prestamos');?>">
                                        <i class="fa fa-codepen"></i> <span>Planilla_prestamos</span>
                                    </a>
                                </li>
<!--                                
                                <li>
                                    <a href="<?php echo site_url('tipo_persona');?>">
                                        <i class="fa fa-group"></i> <span>Tipo Persona</span>
                                    </a>
                                </li>-->

                                
                            </ul>
                        </li>
                                
                        
                        
<!--                        <li>
                            <a href="<?php echo site_url('registro');?>">
                                <i class="fa fa-address-card-o"></i> <span>Registro</span>
                            </a>
                        </li>-->
                        <li>
                            <a href="<?php echo site_url('usuario');?>">
                                <i class="fa fa-user-circle-o"></i> <span>Usuarios</span>
                            </a>
                        </li>
                    </ul>
                    
                    
                </section>
                <center>
                    <img src="<?php echo base_url('resources/images/empresa/').$session_data['empresa_imagen']; ?>" width="150" height="112">
                    <font style="color: white;">
                        <br><b><?php echo $session_data["empresa_nombre"];  ?></b>
                    </font>
                    <font style="color: white; font-family: Arial Narrow">
                        <br><?php echo $session_data["empresa_eslogan"];  ?>                        
                    </font>

                </center>
                <!-- /.sidebar -->
            </aside>

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper" id="content-background-image">
                <!-- Main content -->
                <section class="content">
                    <?php                    
                    if(isset($_view) && $_view)
                        $this->load->view($_view);
                    ?>                    
                </section>
                <!-- /.content -->
            </div>
            <!-- /.content-wrapper -->
            <footer class="main-footer no-print">
                <strong> Desarrollado por <a href="https://www.passwordbolivia.com/" target="_blank">PASSWORD - Ingenieria Hardware & Software</a></strong>
            </footer>

            <!-- Control Sidebar -->
            <aside class="control-sidebar control-sidebar-dark">
                <!-- Create the tabs -->
                <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
                    
                </ul>
                <!-- Tab panes -->
                <div class="tab-content">
                    <!-- Home tab content -->
                    <div class="tab-pane" id="control-sidebar-home-tab">

                    </div>
                    <!-- /.tab-pane -->
                    <!-- Stats tab content -->
                    <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
                    <!-- /.tab-pane -->
                    
                </div>
            </aside>
            <!-- /.control-sidebar -->
            <!-- Agregar the sidebar's background. This div must be placed
            immediately after the control sidebar -->
            <div class="control-sidebar-bg"></div>
        </div>
        <!-- ./wrapper -->

        <!-- jQuery 2.2.3 -->
        <script src="<?php echo site_url('resources/js/jquery-2.2.3.min.js');?>"></script>
        <!-- Bootstrap 3.3.6 -->
        <script src="<?php echo site_url('resources/js/bootstrap.min.js');?>"></script>
        <!-- FastClick -->
        <script src="<?php echo site_url('resources/js/fastclick.js');?>"></script>
        <!-- AdminLTE App -->
        <script src="<?php echo site_url('resources/js/app.min.js');?>"></script>
        <!-- AdminLTE for demo purposes -->
        <script src="<?php echo site_url('resources/js/demo.js');?>"></script>
        <!-- DatePicker -->
        <script src="<?php echo site_url('resources/js/moment.js');?>"></script>
        <script src="<?php echo site_url('resources/js/bootstrap-datetimepicker.min.js');?>"></script>
        <script src="<?php echo site_url('resources/js/global.js');?>"></script>
    </body>
</html>
