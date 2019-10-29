<?php

  if($_SESSION["perfil"] != "Administrador"){

    echo "<META HTTP-EQUIV='refresh' CONTENT='0; url=inicio'>";

  }

?>
<main class="mdl-layout__content mdl-color--grey-100">
  <div class="mdl-grid demo-content">
    <div class="demo-charts mdl-color--white mdl-shadow--2dp  mdl-grid">
      <div class="page-content" id="condicion">
        <section class="section-center">
          <div class="mdl-cell mdl-cell--12-col">
            <div class="">
              <div class="row">
                <div class="box-header with-border">
            
                  <a class="waves-effect waves-light btn modal-trigger" href="#modalAgregarUsuario">Agregar usuario</a>

                </div>

                <div class="box-body">
          
                  <table class="table table-bordered table-striped dt-responsive tablas" width="100%">
           
                    <thead>
           
                     <tr>
                       
                       <th style="width:10px">#</th>
                       <th>Nombre</th>
                       <th>Usuario</th>
                       <th>Foto</th>
                       <th>Perfil</th>
                       <th>Estado</th>
                       <th>Última vez</th>
                       <th>Acciones</th>

                     </tr> 

                    </thead>

                    <tbody>

                    <?php

                    $item = null;
                    $valor = null;

                    $usuarios = ControladorUsuarios::ctrMostrarUsuarios($item, $valor);

                   foreach ($usuarios as $key => $value){
                     
                      echo ' <tr>
                              <td>'.($key+1).'</td>
                              <td>'.$value["nombre"].'</td>
                              <td>'.$value["usuario"].'</td>';

                              if($value["foto"] != ""){

                                echo '<td><img src="'.$value["foto"].'" class="img-thumbnail" width="40px"></td>';

                              }else{

                                echo '<td><img src="vista/img/usuarios/default/anonymous.png" class="img-thumbnail" width="40px"></td>';

                              }

                              echo '<td>'.$value["perfil"].'</td>';

                              if($value["estado"] != 0){

                                echo '<td><button class="btn green btnActivar" idUsuario="'.$value["id"].'" estadoUsuario="0">Activado</button></td>';

                              }else{

                                echo '<td><button class="btn red btnActivar" idUsuario="'.$value["id"].'" estadoUsuario="1">Desactivado</button></td>';

                              }        

                              $ultimo_login = new DateTime($value["ultimo_login"]);
                              $ultimo_login=$ultimo_login->format("d/m/Y H:i:s");

                              echo '<td>'.$ultimo_login.'</td>
                              <td>

                                <div class="btn-group">
                                    
                                  <button class="btn modal-trigger btnEditarUsuario" idUsuario="'.$value["id"].'" data-toggle="modal" data-target="modalEditarUsuario"><i class="material-icons">create</i></button>

                                  <button class="btn red modal-trigger btnEliminarUsuario" idUsuario="'.$value["id"].'" fotoUsuario="'.$value["foto"].'" usuario="'.$value["usuario"].'"><i class="material-icons">delete</i></button>

                                </div>  

                              </td>

                            </tr>';
                    }


                    ?> 

                    </tbody>

                  </table>

                </div>

              </div>
            </div>
          </div>
        </section>
      </div>
    </div>
  </div>

<!--=====================================
MODAL AGREGAR USUARIO
======================================-->

  <div id="modalAgregarUsuario" class="modal modal-fixed-footer">
    <div class="modal-content">

      <h3 class="indigo-text center">Usuario</h3>
        <form name="formu" class="formulario" method="post">
          <div class="input-field">
          <!-- descripcion -->
            <label for="nuevoNombre">Nombre:</label>
            <input type="text" class="form-control input-lg" name="nuevoNombre" placeholder="Ingresar nombre" required>
          </div>
          <div class="input-field">
          <!-- descripcion -->
            <label for="nuevoUsuario">Usuario:</label>
            <input type="text" class="form-control input-lg" name="nuevoUsuario" placeholder="Ingresar usuario" id="nuevoUsuario" required>

          </div>
          <div class="input-field">
          <!-- descripcion -->
            <label for="nuevoPassword">Contraseña:</label>
            <input type="password" class="form-control input-lg" name="nuevoPassword" placeholder="Ingresar contraseña" required>

          </div>
          <div class="">
          <!-- descripcion -->
             <label for="nuevoPerfil">Tipo de personal:</label>
              <select name="nuevoPerfil">
                        
              <option value="">Selecionar perfil</option>

              <option value="Administrador">Administrador</option>

              <option value="Secretario">Secretario/a</option>

            </select>
          </div>
          <br>

          <div class="input-field">
            <div class="panel">SUBIR FOTO</div><br>

              <input type="file" class="nuevaFoto" name="nuevaFoto">

              <p class="help-block">Peso máximo de la foto 2MB</p>

              <img src="vista/img/usuarios/default/anonymous.png" class="img-thumbnail previsualizar" width="100px">
          </div>




            <!-- botones -->
            <div class="center">
              <button class="btn waves-effect waves-light indigo" type="submit" name="registrar">Guardar
              </button>
            </div>

            <?php 
              $crearUsuario = new ControladorUsuarios();
              $crearUsuario -> ctrCrearUsuario();
            ?>
        </form>


      </div>


    <div class="modal-footer">
      <a class="modal-action modal-close waves-effect waves-green btn-flat ">Salir</a>
    </div>
  </div>


<!--=====================================
MODAL EDITAR USUARIO
======================================-->

  <div id="modalEditarUsuario" class="modal modal-fixed-footer">
    <div class="modal-content">

      <h3 class="indigo-text center">Editar Usuario</h3>
        <form name="formu" class="formulario" method="post">
          <div class="input-field">
            <!-- descripcion -->
            <label for="nombre_condicion">Nombre:</label>
            <input type="text" class="form-control input-lg" id="editarNombre" name="editarNombre" value="" required>
          </div>
          <div class="input-field">
            <!-- descripcion -->
            <label for="nombre_condicion">Nombre:</label>
            <input type="text" class="form-control input-lg" id="editarUsuario" name="editarUsuario" value="" readonly>

          </div>
          <div class="input-field">
            <!-- descripcion -->
            <label for="nombre_condicion">Nombre:</label>
            <input type="password" class="form-control input-lg" name="editarPassword" placeholder="Escriba la nueva contraseña">

            <input type="hidden" id="passwordActual" name="passwordActual">

          </div>
          <div class="">
            <!-- descripcion -->
            <label for="editarPerfil">Tipo de personal:</label>
            <select name="editarPerfil">
              
              <option value="" id="editarPerfil"></option>

              <option value="Administrador">Administrador</option>

              <option value="Secretario">Secretario/a</option>

            </select>
          </div>
          <br>

          <div class="input-field">
            <div class="panel">SUBIR FOTO</div>

              <input type="file" class="nuevaFoto" name="editarFoto">

              <p class="help-block">Peso máximo de la foto 2MB</p>

              <img src="vista/img/usuarios/default/anonymous.png" class="img-thumbnail previsualizar" width="100px">

              <input type="hidden" name="fotoActual" id="fotoActual">
          </div>




          <!-- botones -->
          <div class="center">
            <button class="btn waves-effect waves-light indigo" type="submit" name="registrar">Guardar cambios
            </button>
          </div>

          <?php 
            
            $editarUsuario = new ControladorUsuarios();
            $editarUsuario -> ctrEditarUsuario();
          ?>
        </form>


    </div>


    <div class="modal-footer">
      <a class="modal-action modal-close waves-effect waves-green btn-flat ">Salir</a>
    </div>
  </div>


<?php

  $borrarUsuario = new ControladorUsuarios();
  $borrarUsuario -> ctrBorrarUsuario();

?> 


