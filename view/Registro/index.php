<!DOCTYPE html>
<html lang="en">
<style>
.transparent-style{ background-color: #ffffff; opacity: .80; } 
.transparent-style2{
 background-color: #006400; opacity: .80; 
 padding: 10px 15px;
  border-bottom: 1px solid transparent;
  border-top-left-radius: 3px;
  border-top-right-radius: 3px;
  border-color: #fff;
}

</style>
   <head>
      <title>Registro</title>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
      <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
      
      
	   
   </head>
   <body  body background="view/Registro/negro.jpg" background-repeat="no-repeat" opacity="0.4" width="80%">
 
		<script>
         function validarFormulario(evObject) {
            evObject.preventDefault();
            var todoCorrecto = true;
            var formulario = document.formularioContacto;
            if (isNaN(formulario.edad.value)==true || /^[1-9]\d$/.test(formulario.edad.value)==false ) {
               alert ('Edad no valida'); 
               todoCorrecto=false;
            }
            
         }

         function validarPassword() {
            var pass1 = document.getElementById('clave').value;
            var pass2 = document.getElementById('ConfirmarClave').value;
          


                 if (  pass1 != pass2 ) { 
                     alert("Claves no coinciden");    
                 }
         }

         $(function() {
            
            $('#labelAct').hide();
            $('#fontAct').hide();
         });
      </script>	
		
      <div class="container-fluid">
		<label height="90"><font color="white" size="5" >Ingreso de datos</font></label>
      <label height="90"><font color="white" size="5" ></font></label>
         <form id="formulario"  method="post" action="?c=Pyme&a=Guardar" >
            <div class="panel-group" id="accordion1">
               <div >
                  <div class="transparent-style2"  >
                     <h4 class="panel-title">
                        <a data-toggle="collapse" data-parent="#accordion2" href="#collapse1">
                           <font size="4" color="white">Datos del cliente</font>
                        </a>
                     </h4>
                  </div>
                  <div id="collapse1" class="transparent-style">
                     <div class="panel-body">
                        <div class="row">
                           <div class="col-md-4">
                              <div class="form-group">
                                 <font color="red">*</font>
                                 <label for="NombreComercio">Nombre Comercial</label>
                                 <input type="text" maxlength="100" class="form-control" name="NombreComercio" id="NombreComercio" placeholder="Digite el Nombre Comercial" 
                                 pattern="[a-zA-Z]*" required >
                              </div>
                           </div>
                           <div class="col-md-4">
                              <div class="form-group">
                                 <font  color="red">*</font>
                                       
      								 <select id="paisId" name="paisId" class="form-control" required>
      									   <?php
                                    include("conexion.php");

                                    $consultaPais="SELECT * FROM pais";
                                    $resPais=$conex->query($consultaPais);?>
                                    <?php while($pais=$resPais->fetch_assoc()){
                                    ?>
                                        <option value="<?php echo $pais['Id']; ?>"><?php echo utf8_encode($pais['Nombre']); ?></option>
                                    <?php
                                    }
                                    mysqli_close($conex);
                                    ?>
                                    
      								 </select>
                              </div>
                           </div>
                           <div class="col-md-4">
                              <div class="form-group">
                                 <font color="red">*</font>
                                 <label for="EstadoID">Provincia / Estado / Departamento:</label>
                                 <select id="EstadoID" name="EstadoID" class="form-control" required>
                                    <?php
                                    include("conexion.php");

                                    $consultaEsta="SELECT * FROM estado";
                                    $resEst=$conex->query($consultaEsta);?>


                                    <?php while($est=$resEst->fetch_assoc()){
                                    ?>
                                        <option value="<?php echo $est['Id']; ?>"><?php echo utf8_encode($est['Nombre']); ?></option>
                                    <?php
                                    }
                                    mysqli_close($conex);
                                    ?>
								          </select>
                              </div>
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-md-4">
                              <div class="form-group">
                                 <font  color="red">*</font>
                                 <label for="sectorID">Sector</label>
                                 <select id="SectorID" name="SectorID" class="form-control" required>
                                       <?php
                                       include("conexion.php");


                                       $consultaSec="SELECT * FROM sector";
                                       $resSec=$conex->query($consultaSec);?>
                                       <?php while($sec=$resSec->fetch_assoc()){
                                       ?>
                                           <option value="<?php echo $sec['Id']; ?>"><?php echo utf8_encode($sec['Nombre']); ?></option>
                                       <?php
                                       }
                                       mysqli_close($conex);
                                       ?>
								          </select>
                              </div>
                           </div>
                           <div class="col-md-4">
                              <div class="form-group">
                                 <font  color="red">*</font>
                                 <label for="cedJuridica">Id / Cédula Jurídica</label>
                                 <input type="number" maxlength="10" minlength="8" class="form-control" name="CedJuridica" id="CedJuridica" placeholder="Digite la cedula Jurídica" required>
                              </div>
                           </div>
                           <div class="col-md-4">
                              <div class="form-group">
                                 <font  color="red">*</font>
                                 <label for="AnnoInicioOperaciones">Año de inicio de operaciones</label>
                                 <input class="form-control" id="AnnoInicioOperaciones" name="AnnoInicioOperaciones"placeholder="Año de inicio de operaciones" type="number" required>
                              </div>
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-md-4">
                              <div class="form-group">
                                 <font  color="red">*</font>
                                 <label for="GeneroPropietarioID">Género del Propietario</label>
                                 <select id="GeneroPropietarioID" name="GeneroPropietarioID" class="form-control" required>
                                       <?php
                                       include("conexion.php");


                                       $consultaGen="SELECT * FROM genero";
                                       $resGen=$conex->query($consultaGen);?>
                                       <?php while($gen=$resGen->fetch_assoc()){
                                       ?>
                                           <option value="<?php echo $gen['Id']; ?>"><?php echo utf8_encode($gen['Nombre']); ?></option>
                                       <?php
                                       }
                                       mysqli_close($conex);
                                       ?>
								          </select>
                              </div>
                           </div>
                           <div class="col-md-4">
                              <div class="form-group">
                                 <font  color="red">*</font>
                                 <label for="numeroTelefono">Teléfono</label>
                                 <input type="number" class="form-control" name="NumeroTelefono" id="NumeroTelefono" placeholder="Digite el número de teléfono" required>
                              </div>
                           </div>
                           <div class="col-md-4">
                              <div class="form-group">
                                 <font  color="red">*</font>
                                 <label for="direccion">Dirección</label>
                                 <input type="text" maxlength="200" class="form-control" name="Direccion" id="Direccion" placeholder="Digite la dirección" required>
                              </div>
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-md-4">
                              <div class="form-group">
                                 <input name="esActiva" id="esActiva" type="hidden" value="0" required>
                                 <label id="labelAct" for="esActiva">Se encuentra la PYME activa?</label>
                                 <font  id="fontAct" color="red">*</font>
                                 
                              </div>
                           </div>
                           <div class="col-md-4">
                              <div class="form-group">
                                 <label><input name="esNegocioFamiliar" id="esNegocioFamiliar"  disabled type="checkbox" value="0"></label>
                                 <label for="esNegocioFamiliar">Es un Negocio familiar?</label>
                                 <font  color="red">*</font>
                              </div>
                           </div>
                           <div class="col-md-4">
                              <div class="form-group">
                                 <font  color="red">*</font>
                                 <label for="logo">Adjuntar logo</label>
                                 <input type="file" class="form-control" name="Logo" id="Logo" placeholder="Seleccionar el logo" value="" >
                              </div>
                           </div></div><font  color="red">* Representa campos obligatorios</font>
                        </div>
                     </div>
                  
               </div>

            </div>
            <div class="panel-group" id="accordion2">
               <div class="transparent-style1">
                  <div class="transparent-style2" >
                     <h4 class="panel-title">
                        <a data-toggle="collapse" data-parent="#accordion2" href="#collapse2">
                           <font color="white" size="4">Redes Sociales</font>
                        </a>
                     </h4>
                  </div>
                  <div id="collapse2" class="transparent-style">
                     <div class="panel-body">
                        <div class="row">
                           <div class="col-md-4">
                              <div class="form-group">
                                 <font  color="red">*</font>
                                 <label for="Facebook">Dirección Facebook</label>
                                 <input type="text" maxlength="300" class="form-control" name="Facebook" id="Facebook" placeholder="Digite la dirección de facebook" required>
                              </div>
                           </div>
                           <div class="col-md-4">
                              <div class="form-group">
                                 <font  color="red">*</font>
                                 <label for="Twitter">Dirección Twitter</label>
                                 <input type="text" maxlength="300" class="form-control" name="Twitter" id="Twitter" placeholder="Digite la dirección de twitter" required>
                              </div>
                           </div>
                           <div class="col-md-4">
                              <div class="form-group">
                                 <font  color="red">*</font>
                                 <label for="Linkedin">Dirección Linkedin</label>
                                 <input type="text" maxlength="300" class="form-control" name="Linkedin" id="Linkedin" placeholder="Digite la dirección de linkedin" required>
                              </div>
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-md-4">
                              <div class="form-group">
                                 <font  color="red">*</font>
                                 <label for="Youtube">Dirección Canal YouTube</label>
                                 <input type="text" maxlength="300" class="form-control" name="Youtube" id="Youtube" placeholder="Digite la dirección del canal de youtube" required>
                              </div>
                           </div>
                           <div class="col-md-4">
                              <div class="form-group">
                                 <font  color="red">*</font>
                                 <label for="PaginaWeb">Página Web</label>
                                 <input type="text" maxlength="300" class="form-control" name="PaginaWeb" id="PaginaWeb" placeholder="Digite la página web" required>
                              </div>
                           </div>
                           <div class="col-md-4">
                              <div class="form-group">
                                 <font  color="red">*</font>
                                 <label for="CorreoContacto">Correo electrónico contacto</label>
                                 <input type="email" maxlength="50" class="form-control" name="CorreoContacto" id="CorreoContacto" placeholder="Digite el correo electrónico" required>
                              </div>
                           </div>
                        </div><font  color="red">* Representa campos obligatorios</font>
                     </div>
                  </div>
               </div>
            </div>
            <div class="panel-group" id="accordion3">
               <div class="transparent-style1">
                  <div class="transparent-style2" >
                     <h4 class="panel-title">
                        <a data-toggle="collapse" data-parent="#accordion3" href="#collapse3">
                           <font color="white" size="4">Datos del Usuario</font>
                        </a>
                     </h4>
                  </div>
                  <div id="collapse3" class="transparent-style">
                     <div class="panel-body">
                        <div class="row">
                           <div class="col-md-6">
                              <div class="form-group">
                                 <font  color="red">*</font>
                                 <label for="nombreCompleto">Nombre completo</label>
                                 <input type="text" maxlength="50" class="form-control" id="nombreCompleto" name="nombreCompleto" placeholder="Digite el nombre completo" required>
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div class="form-group">
                                 <font  color="red">*</font>
                                 <label for="Usuario">Nombre de usuario</label>
                                 <input type="text" maxlength="50"class="form-control" name="usuario" id="usuario" placeholder="Digite el nombre de usuario" required>
                              </div>
                           </div>
                           
                        </div>
                        <div class="row">
						<div class="col-md-6">
                              <div class="form-group">
                                 <font  color="red">*</font>
                                 <label for="clave">Contraseña</label><font color="gray" face="italic"> ( mínimo 8 caracteres, máximo 10 caracteres)</font>
                                 <input type="password" maxlength="10" minlength="8" class="form-control" name="clave" id="Clave" placeholder="Digite contraseña" required>
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div class="form-group">
                                 <font  color="red">*</font>
                                 <label for="ConfirmarClave">Repetir contraseña</label>
                                 <input type="password" maxlength="10" minlength="8" class="form-control" id="ConfirmarClave" placeholder="Confirme contraseña" required>
                              </div>
                           </div>
                           
                        </div>
						
						<div class="row">
                           <div class="col-md-6">
                              <div class="form-group">
                                 <font  color="red">*</font>
                                 <label for="EmailContacto">Correo electrónico</label>
                                 <input type="email" class="form-control" name="emailContacto" id="emailContacto" placeholder="Digite el correo electrónico" required>
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div class="form-group">
                                 <font  color="red">*</font>
                                 <label for="confirmarEmailContacto">Repetir Correo electrónico</label>
                                 <input type="email" class="form-control" name="confirmarEmailContacto" id="confirmarEmailContacto" placeholder="Confirme el correo electrónico" required>
                              </div>
                           </div>
                        </div><font  color="red">* Representa campos obligatorios</font>
                     </div>
                  </div>
               </div>
            </div>
            <button type="submit" class="btn btn-primary" backonclick="" style="background-color:#006400">Guardar</button>
            <button type="submit" class="btn btn-default">Cancelar</button>

         </form>
      </div>
      <div></div>
      <div></div>
   </body>
  
</html>