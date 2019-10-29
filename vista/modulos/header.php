<div class="demo-layout mdl-layout mdl-js-layout mdl-layout--fixed-drawer mdl-layout--fixed-header">
    <header class="demo-header mdl-layout__header mdl-color--grey-100 mdl-color-text--grey-600">
        <div class="mdl-layout__header-row">
            <span class="mdl-layout-title"><a class="mdl-color-text--blue-grey-400 indigo-text" href="inicio">Inicio</a></span>
            <div class="mdl-layout-spacer"></div>
            <div class="text-center">

                <?php
                date_default_timezone_set('America/Caracas');
                  switch(date("l")){
                      case "Monday":
                    $dia = "Lunes";   
                    break;
                    case "Tuesday":
                    $dia = "Martes";    
                    break;
                    case "Wednesday":
                    $dia = "Miércoles";
                    break;
                    case "Thursday":
                    $dia = "Jueves";
                    break;
                    case "Friday":
                    $dia = "Viernes";
                    break;
                    case "Saturday":
                    $dia = "Sábado";
                    break;
                    case "Sunday":
                    $dia = "Domingo";
                    break;
                  }

                  switch(date("F")){
                    case "January":
                    $mes = "Enero";
                    break;
                    case "February":
                    $mes = "Febrero";
                    break;
                    case "March":
                    $mes = "Marzo";
                    break;
                    case "April":
                    $mes = "Abril";
                    break;
                    case "May":
                    $mes = "Mayo";
                    break;
                    case "June":
                    $mes = "Junio";
                    break;
                    case "July":
                    $mes = "Julio";
                    break;
                    case "August":
                    $mes = "Agosto";
                    break;
                    case "September":
                    $mes = "Septiembre";
                    break;
                    case "October":
                    $mes = "Octubre";
                    break;
                    case "November":
                    $mes = "Noviembre";
                    break;
                    case "December":
                    $mes = "Diciembre";
                    break;  
                  }

                  echo $dia.", ".date("d")." de ".$mes." de ".date("Y");
                    
                ?>

            </div>

  
         <div class="mdl-layout-spacer"></div>
        </div>
    </header>