<nav class="demo-navigation mdl-navigation mdl-color--blue-grey-800">
     <?php

          if($_SESSION["perfil"] == "Administrador"){

               echo '
          <a class="mdl-navigation__link white-text" href="inicio"><i class="mdl-color-text--blue-grey-400 material-icons white-text" role="presentation">home</i>Inicio</a>';
          }  
       
     ?>

     <a class="mdl-navigation__link white-text" href="personal"><i class="mdl-color-text--blue-grey-400 material-icons white-text" role="presentation">people</i>Personal</a>
     <a class="mdl-navigation__link white-text" href="reposo"><i class="mdl-color-text--blue-grey-400 material-icons white-text" role="presentation">event_note</i>Reposos</a>
     <a class="mdl-navigation__link white-text" href="vacaciones"><i class="mdl-color-text--blue-grey-400 material-icons white-text" role="presentation">insert_invitation</i>Vacaciones</a>
     <br><br>
     <?php 

          if($_SESSION["perfil"] == "Administrador"){

               echo '
                    <span class="mdl-navigation__link white-text">Configuración</span>
                    <a class="mdl-navigation__link white-text" href="cargo"><i class="mdl-color-text--blue-grey-400 material-icons white-text" role="presentation">assignment_ind</i>Cargo</a>
                    <a class="mdl-navigation__link white-text" href="condicion"><i class="mdl-color-text--blue-grey-400 material-icons white-text" role="presentation">assignment</i>Condición</a>
                    <a class="mdl-navigation__link white-text" href="lugar"><i class="mdl-color-text--blue-grey-400 material-icons white-text" role="presentation">location_city</i>Lugar</a>
                    <a class="mdl-navigation__link white-text" href="medico"><i class="mdl-color-text--blue-grey-400 material-icons white-text" role="presentation">local_hospital</i>Médicos</a>
                    <a class="mdl-navigation__link white-text" href="patologias"><i class="mdl-color-text--blue-grey-400 material-icons white-text" role="presentation">local_pharmacy</i>Patologías</a>
                    <a class="mdl-navigation__link white-text" href="tipopersonal"><i class="mdl-color-text--blue-grey-400 material-icons white-text" role="presentation">supervisor_account</i>Tipo de personal</a>
                    <a class="mdl-navigation__link white-text" href="tipocondicion"><i class="mdl-color-text--blue-grey-400 material-icons white-text" role="presentation">assignment</i>Tipo de condición</a>
                    <a class="mdl-navigation__link white-text" href="tipovacaciones"><i class="mdl-color-text--blue-grey-400 material-icons white-text" role="presentation">insert_invitation</i>Tipo de vacaciones</a>
                    <a class="mdl-navigation__link white-text" href="diasferiados"><i class="mdl-color-text--blue-grey-400 material-icons white-text" role="presentation">insert_invitation</i>Días feriados</a>
                    <a class="mdl-navigation__link white-text" href="usuarios"><i class="mdl-color-text--blue-grey-400 material-icons white-text" role="presentation">account_circle</i>Usuarios</a>
                    <!-- <div class="mdl-layout-spacer"></div>
                    <a class="mdl-navigation__link white-text" href=""><i class="mdl-color-text--blue-grey-400 material-icons white-text" role="presentation">help_outline</i><span class="visuallyhidden">Help</span></a> -->
               </nav>';
          }
     ?>      
</div>