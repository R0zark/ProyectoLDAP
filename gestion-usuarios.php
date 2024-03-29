<?php
session_start();
if(empty($_SESSION['admin'])){
  echo "Por favor vuelve a conectar, reenviando al login en 5 segundos";
  header("refresh:5;url=login.html");
  exit();
}
else{
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="Dashboard">
  <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
  <title>Dashio - Bootstrap Admin Template</title>

  <!-- Favicons -->
  <link href="img/favicon.png" rel="icon">
  <link href="img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Bootstrap core CSS -->
  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!--external css-->
  <link href="lib/font-awesome/css/font-awesome.css" rel="stylesheet" />
  <link href="lib/advanced-datatable/css/demo_page.css" rel="stylesheet" />
  <link href="lib/advanced-datatable/css/demo_table.css" rel="stylesheet" />
  <link rel="stylesheet" href="lib/advanced-datatable/css/DT_bootstrap.css" />
  <!-- Custom styles for this template -->
  <link href="css/style.css" rel="stylesheet">
  <link href="css/style-responsive.css" rel="stylesheet">

  <!-- =======================================================
    Template Name: Dashio
    Template URL: https://templatemag.com/dashio-bootstrap-admin-template/
    Author: TemplateMag.com
    License: https://templatemag.com/license/
  ======================================================= -->
</head>

<body>
  <section id="container">
    <!-- **********************************************************************************************************************************************************
        TOP BAR CONTENT & NOTIFICATIONS
        *********************************************************************************************************************************************************** -->
    <!--header start-->
    <header class="header black-bg">
      <div class="sidebar-toggle-box">
        <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
      </div>
      <!--logo start-->
      <a href="index.html" class="logo"><b>DASH<span>IO</span></b></a>
      <!--logo end-->
      <div class="nav notify-row" id="top_menu">
        <!--  notification start -->
        <ul class="nav top-menu">
          <!-- settings start -->
          <li class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="index.html#">
              <i class="fa fa-tasks"></i>
              <span class="badge bg-theme">4</span>
              </a>
            <ul class="dropdown-menu extended tasks-bar">
              <div class="notify-arrow notify-arrow-green"></div>
              <li>
                <p class="green">You have 4 pending tasks</p>
              </li>
              <li>
                <a href="index.html#">
                  <div class="task-info">
                    <div class="desc">Dashio Admin Panel</div>
                    <div class="percent">40%</div>
                  </div>
                  <div class="progress progress-striped">
                    <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                      <span class="sr-only">40% Complete (success)</span>
                    </div>
                  </div>
                </a>
              </li>
              <li>
                <a href="index.html#">
                  <div class="task-info">
                    <div class="desc">Database Update</div>
                    <div class="percent">60%</div>
                  </div>
                  <div class="progress progress-striped">
                    <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%">
                      <span class="sr-only">60% Complete (warning)</span>
                    </div>
                  </div>
                </a>
              </li>
              <li>
                <a href="index.html#">
                  <div class="task-info">
                    <div class="desc">Product Development</div>
                    <div class="percent">80%</div>
                  </div>
                  <div class="progress progress-striped">
                    <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%">
                      <span class="sr-only">80% Complete</span>
                    </div>
                  </div>
                </a>
              </li>
              <li>
                <a href="index.html#">
                  <div class="task-info">
                    <div class="desc">Payments Sent</div>
                    <div class="percent">70%</div>
                  </div>
                  <div class="progress progress-striped">
                    <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width: 70%">
                      <span class="sr-only">70% Complete (Important)</span>
                    </div>
                  </div>
                </a>
              </li>
              <li class="external">
                <a href="#">See All Tasks</a>
              </li>
            </ul>
          </li>
          <!-- settings end -->
          <!-- inbox dropdown start-->
          <li id="header_inbox_bar" class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="index.html#">
              <i class="fa fa-envelope-o"></i>
              <span class="badge bg-theme">5</span>
              </a>
            <ul class="dropdown-menu extended inbox">
              <div class="notify-arrow notify-arrow-green"></div>
              <li>
                <p class="green">You have 5 new messages</p>
              </li>
              <li>
                <a href="index.html#">
                  <span class="photo"><img alt="avatar" src="img/ui-zac.jpg"></span>
                  <span class="subject">
                  <span class="from">Zac Snider</span>
                  <span class="time">Just now</span>
                  </span>
                  <span class="message">
                  Hi mate, how is everything?
                  </span>
                  </a>
              </li>
              <li>
                <a href="index.html#">
                  <span class="photo"><img alt="avatar" src="img/ui-divya.jpg"></span>
                  <span class="subject">
                  <span class="from">Divya Manian</span>
                  <span class="time">40 mins.</span>
                  </span>
                  <span class="message">
                  Hi, I need your help with this.
                  </span>
                  </a>
              </li>
              <li>
                <a href="index.html#">
                  <span class="photo"><img alt="avatar" src="img/ui-danro.jpg"></span>
                  <span class="subject">
                  <span class="from">Dan Rogers</span>
                  <span class="time">2 hrs.</span>
                  </span>
                  <span class="message">
                  Love your new Dashboard.
                  </span>
                  </a>
              </li>
              <li>
                <a href="index.html#">
                  <span class="photo"><img alt="avatar" src="img/ui-sherman.jpg"></span>
                  <span class="subject">
                  <span class="from">Dj Sherman</span>
                  <span class="time">4 hrs.</span>
                  </span>
                  <span class="message">
                  Please, answer asap.
                  </span>
                  </a>
              </li>
              <li>
                <a href="index.html#">See all messages</a>
              </li>
            </ul>
          </li>
          <!-- inbox dropdown end -->
          <!-- notification dropdown start-->
          <li id="header_notification_bar" class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="index.html#">
              <i class="fa fa-bell-o"></i>
              <span class="badge bg-warning">7</span>
              </a>
            <ul class="dropdown-menu extended notification">
              <div class="notify-arrow notify-arrow-yellow"></div>
              <li>
                <p class="yellow">You have 7 new notifications</p>
              </li>
              <li>
                <a href="index.html#">
                  <span class="label label-danger"><i class="fa fa-bolt"></i></span>
                  Server Overloaded.
                  <span class="small italic">4 mins.</span>
                  </a>
              </li>
              <li>
                <a href="index.html#">
                  <span class="label label-warning"><i class="fa fa-bell"></i></span>
                  Memory #2 Not Responding.
                  <span class="small italic">30 mins.</span>
                  </a>
              </li>
              <li>
                <a href="index.html#">
                  <span class="label label-danger"><i class="fa fa-bolt"></i></span>
                  Disk Space Reached 85%.
                  <span class="small italic">2 hrs.</span>
                  </a>
              </li>
              <li>
                <a href="index.html#">
                  <span class="label label-success"><i class="fa fa-plus"></i></span>
                  New User Registered.
                  <span class="small italic">3 hrs.</span>
                  </a>
              </li>
              <li>
                <a href="index.html#">See all notifications</a>
              </li>
            </ul>
          </li>
          <!-- notification dropdown end -->
        </ul>
        <!--  notification end -->
      </div>
      <div class="top-menu">
        <ul class="nav pull-right top-menu">
          <li><a class="logout" href="del_session.php">Logout</a></li>
        </ul>
      </div>
    </header>
    <!--header end-->
    <!-- **********************************************************************************************************************************************************
        MAIN SIDEBAR MENU
        *********************************************************************************************************************************************************** -->
    <!--sidebar start-->
    <aside>
      <div id="sidebar" class="nav-collapse ">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu" id="nav-accordion">
          <p class="centered"><a href="profile.html"><img src="img/ui-sam.jpg" class="img-circle" width="80"></a></p>
          <h5 class="centered">Administrador</h5>
          <li class="sub-menu">
            <a href="gestion-usuarios.php">
              <i class="fa fa-desktop"></i>
              <span>Usuarios</span>
              </a>
          </li>
          <li class="sub-menu">
            <a href="gestion-grupos.php">
              <i class="fa fa-cogs"></i>
              <span>Grupos</span>
              </a>
          </li>
          <li class="sub-menu">
            <a href="gestion-ou.php">
              <i class="fa fa-book"></i>
              <span>Unidades Organizativas</span>
              </a>
          </li>
        </ul>
        <!-- sidebar menu end-->
      </div>
    </aside>
    <section id="main-content">
      <section class="wrapper">
        <h3><i class="fa fa-angle-right"></i> Administración de Usuarios</h3>
        <div class="row mb">
          <!-- page start-->
          <div class="content-usuario-panel">
            <input class="input-buscar" type="input">
            <button class="boton-buscar"><i class="fa fa-search"></i></button>
            <div class="adv-table">
              <table cellpadding="0" cellspacing="0" border="0" class="display table table-bordered" id="hidden-table-info">
                <thead>
                  <tr>
                    <th>Usuario</th>
                    <th>Nombre</th>
                  </tr>
                </thead>
                <tbody class="filas">
                </tbody>
              </table>
            </div>
          </div>
          <div class="form-usuario-panel">
            <h4 class="mb"><i class="fa fa-angle-right"></i> Información del Usuario</h4> <button class="btn btn-success-usuario btn-anyadir" value=""><i class="glyphicon glyphicon-plus"></i> Añadir Usuario</button>
            <div class="contenido">
              <div class="input">
                  <p>ID</p>
                  <input class="input-id" type="input" value="" readonly required="required">
              </div>
              <div class="input">
                <p>Usuario</p>
                <input  class="input-usuario" type="input" value="" readonly required="required">
              </div>
              <div class="input-contrasenya">
                <p>Contraseña</p>
                <input  class="input-contrasenya" type="password" readonly required="required">
              </div>
              <div class="input">
                  <p>Nombre</p>
                  <input class="input-nombre" type="input" value="" readonly required="required">
              </div>
              <div class="input">
                    <p>Apellidos</p>
                    <input  class="input-apellidos"type="input" value="" readonly required="required">
              </div>
              <div class="input">
                <p>Grupo</p>
                <select class="grupos-disponibles">
                  <option value="">NADA</option>
                </select>
              </div>
            </div>
            <br>
  
            <button  id="modificar" class="btn btn-info" value=""><i class="fa fa-cog"></i> Modificar</button>
            <button class="btn btn-danger-usuario" value=""> <i class="glyphicon glyphicon-trash"></i> Eliminar</button>
            <button class="btn btn-cancelar" value="">Cancelar</button>
            <button class="btn btn-success-usuario btn-aceptar-modificar" value=""> <i class="fa fa-check"></i>Aceptar</button>
            <button class="btn btn-success-usuario btn-aceptar-anyadir" value=""> <i class="fa fa-check"></i>Aceptar</button>
        </div>
        <!-- /row -->
      </section>
    </section>
    <footer class="site-footer">
      <div class="text-center">
        <p>
          &copy; Copyrights <strong>Dashio</strong>. All Rights Reserved
        </p>
        <div class="credits">
          <!--
            You are NOT allowed to delete the credit link to TemplateMag with free version.
            You can delete the credit link only if you bought the pro version.
            Buy the pro version with working PHP/AJAX contact form: https://templatemag.com/dashio-bootstrap-admin-template/
            Licensing information: https://templatemag.com/license/
          -->
          Created with Dashio template by <a href="https://templatemag.com/">TemplateMag</a>
        </div>
        <a href="advanced_table.html#" class="go-top">
          <i class="fa fa-angle-up"></i>
          </a>
      </div>
    </footer>
    <!--footer end-->
  </section>
  <!-- js placed at the end of the document so the pages load faster -->
  <script src="lib/jquery/jquery.min.js"></script>
  <script type="text/javascript" language="javascript" src="lib/advanced-datatable/js/jquery.js"></script>
  <script src="lib/bootstrap/js/bootstrap.min.js"></script>
  <script class="include" type="text/javascript" src="lib/jquery.dcjqaccordion.2.7.js"></script>
  <script src="lib/jquery.scrollTo.min.js"></script>
  <script src="lib/jquery.nicescroll.js" type="text/javascript"></script>
  <script type="text/javascript" src="lib/advanced-datatable/js/DT_bootstrap.js"></script>
  <!--common script for all pages-->
  <script src="lib/common-scripts.js"></script>
  <!--script for this page-->
  <script type="text/javascript">
    /* Formating function for row details */
  </script>

<script>
    $(document).ready(function(){
      
      $(".btn-aceptar-modificar").hide();
      $(".btn-aceptar-anyadir").hide();
      $(".btn-cancelar").hide();
      $(".input-contrasenya").hide();

      var parametros = {
          "objetivo": "grupo",
          "accion": "buscar_disponibles",
          "busqueda": "*"
        };
        $.ajax({
          data: parametros,
          url: 'resp.php',
          type: 'post',
          success: function (response) {
            $(".grupos-disponibles").html(response);
          }
        })

      var resguardo =[];
      $("#modificar").click(function(){
          $(this).hide();
          $(".content-usuario-panel").hide();
          $(".form-usuario-panel").css("width","100%");
          $(".mb h4").text("Modificar usuario");
          $(".btn-success-usuario").hide();
          $(".form-usuario-panel input").removeAttr("readonly");
          $(".btn-aceptar-modificar").fadeIn();
          $(".btn-danger-usuario").hide();
          $(".btn-cancelar").fadeIn();
          $(".input-contrasenya").fadeIn();
  
        var parametros = {
                "accion" : "sesion",
                "objetivo": "usuario",
                "nombre" : $(".input-nombre").val(),
                "id" : $(".input-id").val(),
                "usuario" : $(".input-usuario").val(),
                "apellidos" : $(".input-apellidos").val(),
                "contrasenya" : $(".input-contrasenya").val(),
                "idgrupo"  : $(".grupos-disponibles").val(),
          };
          $.ajax({
                data:  parametros,
                url:   'resp.php',
                type:  'post',
                success:function (response){
                }
          });


      });
      $(".btn-aceptar").click(function(){
          $("#modificar").fadeIn();
          $(".btn-success-usuario").fadeIn();
          $(".form-usuario-panel input").attr("readonly",true);
          $(this).hide();
          $(".btn-aceptar-anyadir").hide();
          $(".content-usuario-panel").fadeIn();
          $(".btn-danger-usuario").fadeIn();
          $(".btn-cancelar").hide();
          $(".input-contrasenya").fadeIn();
          $(".mb h4").text("Información del Usuario");
          $(".form-usuario-panel").removeAttr("style");
      });

      $(".btn-cancelar").click(function(){
          $(".btn-success-usuario").fadeIn();
          $(".form-usuario-panel input").attr("readonly",true);
          $(this).hide();
          $(".btn-aceptar-modificar").hide();
          $(".btn-danger-usuario").fadeIn();
          $("#modificar").fadeIn();
          $(".btn-aceptar-anyadir").hide();
          $(".form-usuario-panel").removeAttr("style");
          $(".content-usuario-panel").fadeIn();
          $(".input-contrasenya").fadeOut();
          $(".mb h4").text("Información del Usuario");
      });


      $(".btn-aceptar-anyadir").click(function(){
          $(".btn-success-usuario").fadeIn();
          $(".form-usuario-panel input,textarea").attr("readonly",true);
          $(this).hide();
          $(".btn-aceptar").hide();
          $(".btn-aceptar-modificar").hide();
          $(".btn-danger-usuario").fadeIn();
          $("#modificar").fadeIn();
          $(".btn-cancelar").hide();
          $(".content-usuario-panel").fadeIn();
          $(".form-usuario-panel").removeAttr("style");
          if(confirm("Desea añadir al usuario: " + $(".input-usuario").val() + "?")){
          var parametros = {
                "accion" : "agregar",
                "objetivo": "usuario",
                "usuario" : $(".input-usuario").val(),
                "nombre" : $(".input-nombre").val(),
                "contrasenya" : $(".input-contrasenya").val(),
                "apellidos" : $(".input-apellidos").val(),
                "idgrupo" : $(".grupos-disponibles").val(),
                "id" : $(".input-id").val()
          };
          $.ajax({
                data:  parametros,
                url:   'resp.php',
                type:  'post',
                success:  function (response) {
                        alert(response);
                        var parametros = {
                            "objetivo":"usuario",
                            "accion" : "buscar",
                            "busqueda" :"*" 
                        };
                        $.ajax({
                              data:  parametros,
                              url:   'resp.php',
                              type:  'post',
                              success:  function (response) {
                                      $(".filas").html(response);
                                      $.getScript("ver-info-usuario.js", function(){
                                      })
                              }
                        })
                }
          });
        }
      });

      $(".btn-anyadir").click(function(){
          $(this).hide();
          $(".btn-cancelar").fadeIn();
          $(".form-usuario-panel input").removeAttr("readonly");
          $(".btn-aceptar-anyadir").fadeIn();
          $(".btn-danger-usuario").hide();
          $("#modificar").hide();
          $(".form-usuario-panel input").val("");
          $(".mb h4").text("Añadir Usuario");
          $(".content-usuario-panel").hide();
          $(".form-usuario-panel").css("width","100%");
          $(".input-contrasenya").fadeIn();
      });

      $(".btn-aceptar-modificar").click(function(){
          $(".btn-success-usuario").fadeIn();
          $(".form-usuario-panel input").attr("readonly",true);
          $(this).hide();
          $(".btn-aceptar-modificar").hide();
          $(".btn-aceptar-").hide();
          $(".btn-aceptar-anyadir").hide();
          $(".btn-danger-usuario").fadeIn();
          $("#modificar").fadeIn();
          $(".btn-cancelar").hide();
          $(".content-usuario-panel").fadeIn();
          $(".form-usuario-panel").removeAttr("style");
          if(confirm("¿Desea modificar el Usuario : " + $(".input-nombre").val() + "?")){
            
          var parametros = {
                "accion" : "modificar",
                "objetivo": "usuario",
                "nombre" : $(".input-nombre").val(),
                "id" : $(".input-id").val(),
                "usuario" : $(".input-usuario").val(),
                "apellidos" : $(".input-apellidos").val(),
                "contrasenya" : $(".input-contrasenya").val(),
                "idgrupo"  : $(".grupos-disponibles").val(),
          };
          $.ajax({
                data:  parametros,
                url:   'resp.php',
                type:  'post',
                success:  function (response) { 
                        alert(response);
                        var parametros = {
                            "objetivo":"usuario",
                            "accion" : "buscar",
                            "busqueda" :"*" 
                        };
                        $.ajax({
                              data:  parametros,
                              url:   'resp.php',
                              type:  'post',
                              success:  function (response) {
                                      $(".filas").html(response);
                                      $.getScript("ver-info-usuario.js", function(){
                                      })
                              }
                        }) 
                }
          });
        }
      });

      $(".btn-danger-usuario").click(function(){
        if(confirm("Desea eliminar al usuario: " + $(".input-usuario").val() + "?")){
          var parametros = {
                "accion" : "eliminar",
                "objetivo": "usuario",
                "usuario" : $(".input-usuario").val(),
                "contrasenya" : $(".input-contrasenya").val(),
                "nombre" : $(".input-nombre").val(),
                "apellidos" : $(".input-apellidos").val(),
                "idgrupo" : $(".grupos-disponibles").val(),
                "id" : $(".input-id").val()
          };
          $.ajax({
                data:  parametros,
                url:   'resp.php',
                type:  'post',
                success:  function (response) {
                        $(".input input").val("");
                        alert(response);
                        var parametros = {
                            "objetivo":"usuario",
                            "accion" : "buscar",
                            "busqueda" :"*" 
                        };
                        $.ajax({
                              data:  parametros,
                              url:   'resp.php',
                              type:  'post',
                              success:  function (response) {
                                      $(".filas").html(response);
                                      $.getScript("ver-info-usuario.js", function(){
                                      })
                              }
                        }) 
                }
          });
        }
      });
      $(".boton-buscar").click(function(){
        var parametros = {
            "objetivo":"usuario",
            "accion" : "buscar",
            "busqueda" :$(".input-buscar").val() + "*" 
          };
        $.ajax({
              data:  parametros,
              url:   'resp.php',
              type:  'post',
              success:  function (response) {
                      $(".filas").html(response);
                      $.getScript("ver-info-usuario.js", function(){
                      });
              }
        })
      });  

    });
    </script>
</body>

</html>
