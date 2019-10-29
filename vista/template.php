<?php
session_start();
?>

<!doctype html>

<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Gestión de procesos administrativos;Control de reposos y asignación de vacaciones unidad sanitaria-prosalud.">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
    <title>Unidad Sanitaria</title>

    <!-- Add to homescreen for Chrome on Android -->
    <meta name="mobile-web-app-capable" content="yes">
    <link rel="icon" sizes="192x192" href="vista/images/prosalud.jpg">

    <!-- Add to homescreen for Safari on iOS -->
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="apple-mobile-web-app-title" content="Material Design Lite">
    <link rel="apple-touch-icon-precomposed" href="vista/images/prosalud.jpg">

    <!-- Tile icon for Win8 (144x144 + tile color) -->
    <meta name="msapplication-TileImage" content="images/touch/ms-touch-icon-144x144-precomposed.png">
    <meta name="msapplication-TileColor" content="#3372DF">

    <link rel="shortcut icon" type="images/x-icon" href="vista/images/prosalud.jpg" />
    

    <link rel="stylesheet" href="vista/css/roboto.css">
    <link rel="stylesheet" href="vista/iconfont/material icons.css">
    <link rel="stylesheet" href="vista/css/estilos.css">
    <link rel="stylesheet" href="vista/css/mdl/styles.css">
    <link rel="stylesheet" href="vista/css/material.css">
    <link rel="stylesheet" href="vista/css/materialize.css">
    <link rel="stylesheet" href="vista/css/sweetalert.css">

    <link href="vista/css/style.min.css" type="text/css" rel="stylesheet" media="screen,projection">

    <link rel="stylesheet" href="vista/css/mdl/dataTables.material.min.css">
    <link rel="stylesheet" href="vista/css/responsive.dataTables.css">

    <!-- jQuery 3 -->
    <script src="vista/bower_components/jquery/dist/jquery.min.js"></script>
    <!-- DataTables -->
    <script src="vista/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="vista/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="vista/bower_components/datatables.net-bs/js/dataTables.responsive.min.js"></script>
    <script src="vista/bower_components/datatables.net-bs/js/responsive.bootstrap.min.js"></script>


    <script src="vista/js/material.min.js"></script>
    <script src="vista/js/materialize.js"></script>
    <!-- SweetAlert 2 -->
    <script src="vista/plugins/sweetalert2/sweetalert2.all.js"></script>
    
    <script src="vista/js/mdl-datatable/jquery.dataTables.min.js"></script>
    <script src="vista/js/mdl-datatable/dataTables.material.min.js"></script>
    <script src="vista/js/plantilla.js"></script>
    <!-- <script src='https://www.google.com/recaptcha/api.js'></script> -->

    

  </head>

  <body>
            <!-- Start Page Loading -->
              <div id="loader-wrapper">
                <div id="loader"></div>        
                <div class="loader-section section-left"></div>
                <div class="loader-section section-right"></div>
              </div> 
            <!-- End Page Loading -->
      
        <!-- //////////////////CONTENIDO//////////////////////////// -->
   
        <?php 
          if (isset($_SESSION["iniciarSesion"]) && $_SESSION["iniciarSesion"] == "ok") {
            echo '<div class="mdl-color--grey-100 demo-layout mdl-layout mdl-js-layout mdl-layout--fixed-drawer mdl-layout--fixed-header">';
            /*=============================================
            CABEZOTE
            =============================================*/
            include "modulos/header.php";
            /*=============================================
            MENU
            =============================================*/
            include "modulos/drawer.php";
            /*=============================================
            NAVEGACIÓN
            =============================================*/
            include "modulos/navegacion.php";
            /*=============================================
            CONTENIDO
            =============================================*/
            if (isset($_GET["ruta"])) {
              if ($_GET["ruta"] == "inicio" ||
                  $_GET["ruta"] == "usuarios" ||
                  $_GET["ruta"] == "personal" ||
                  $_GET["ruta"] == "reposo" ||
                  $_GET["ruta"] == "vacaciones" ||
                  $_GET["ruta"] == "cargo" ||
                  $_GET["ruta"] == "condicion" ||
                  $_GET["ruta"] == "lugar" ||
                  $_GET["ruta"] == "medico" ||
                  $_GET["ruta"] == "patologias" ||
                  $_GET["ruta"] == "tipopersonal" ||
                  $_GET["ruta"] == "tipocondicion" ||
                  $_GET["ruta"] == "tipovacaciones" ||
                  $_GET["ruta"] == "diasferiados" ||
                  $_GET["ruta"] == "salir" ||
                  $_GET["ruta"] == "reportes") {

                  include "modulos/".$_GET["ruta"].".php";
              }else{
                include 'modulos/404.php';
              }
            }else{
              include 'modulos/inicio.php';
            }
        

            echo '</div>';

          }else{

            include "modulos/ingreso.php";

          }

        ?>
          </section>
        </div>

        <!-- //////////////////FIN DEl CONTENIDO//////////////////////////// -->
      <script>
        $(document).ready(function(){
           $(window).on("load", function() {
              $("body").addClass("loaded");      
            });
        });       
      </script>
    <script src="vista/js/validacion.js"></script>
    <script src="vista/js/personal.js"></script>
    <script src="vista/js/reposo.js"></script>
    <script src="vista/js/vacaciones.js"></script>
    <script src="vista/js/cargo.js"></script>
    <script src="vista/js/condicion.js"></script>
    <script src="vista/js/lugar.js"></script>
    <script src="vista/js/medico.js"></script>
    <script src="vista/js/patologia.js"></script>
    <script src="vista/js/tipopersonal.js"></script>
    <script src="vista/js/tipocondicion.js"></script>
    <script src="vista/js/tipovacaciones.js"></script>
    <script src="vista/js/feriados.js"></script>
    <script src="vista/js/usuarios.js"></script>
    <script>
          $(document).ready(function(){
          $("select").material_select();
          $(".dropdown-button").dropdown();
          $(".button-collapse").sideNav();
          $(".modal").modal({
            dismissible: true
          });
          $(".datepicker").pickadate({
              format: "d mmmm, yyyy",
              formatSubmit: "yyyy/mm/dd",
              closeOnSelect: true,
              closeOnClear: true,
              selectMonths: true, // Creates a dropdown to control month
              selectYears: 50, // Creates a dropdown of 15 years to control year
              hiddenName: true
          });

      }); 
          
    </script>
     
  </body>
</html>
