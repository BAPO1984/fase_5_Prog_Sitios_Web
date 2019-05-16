<?php require('valida_sesion.php'); ?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <title>Fox Electronics</title>
	   <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, minimun-scale=1.0, maximun-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity=			"sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="css/bootstrap.min.css"> 
    <link rel="stylesheet" href="css/style.css"><!--Estilos-->
  </head>
        
  <body>
    <div class="container"> 
    		<img src="images/Fox_Electronics_Logo.png">
    </div>
    
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
          
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
    
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto mr-auto text-center">
            <li class="nav-item dropdown active">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Administrador
              </a>
                <div class="dropdown-menu active" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="basededatos.html">Crear Base de Datos</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="tablaBD.html">Crear Tabla Productos</a>
                  <div class="dropdown-divider"></div>  
                  <div class="dropdown-divider"></div>                 
                  <a class="dropdown-item" href="tablauser.php">Crear Tabla Usuarios</a>
                  <div class="dropdown-divider"></div> 
                  <a class="dropdown-item" href="usuarios.php">Administrar Usuarios</a>
                  <div class="dropdown-divider"></div> 
                  <div class="dropdown-divider"></div> 
                  <a class="dropdown-item" href="backupBD.php">Generar Backup BD</a>                  
                </div>  
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Inventario
              </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="nuevo_prod.html">Nuevo (+) </a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="actualizar_prod.html">Actualizar (Update) </a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="eliminar_prod.html">Eliminar (Delete)</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="consultar_prod.html">Consultar (Consult)</a>
                </div>
    
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Ventas
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="ventas.html">Vender (Sales)</a>                       
              </div>
             </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Utilidades
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="precios.html">Calcular valores </a>                      
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="resistencias.html">Tabla Resistencias</a>
                <div class="dropdown-divider"></div><div class="dropdown-divider"></div>
                <a class="dropdown-item" href="crearpdf.php">Reporte PDF</a>
              </div>
             </li>       
          </ul>      
        </div>
      </nav>    
    </div>
    
    <!-- Mensaje para el usuario manteniendo el mismo html -->
	  <div class="container"> 
	  	<div>
	  		<header>
	  			<div class="text-center mt-2"><br>
            <?php 
              $BD="bdunad22";
              $tabla="usuarios";
              $n_user=$_POST["user"];
              $pass_u=md5($_POST["pass"]); //se encripta
              $estado_u=$_POST["estado"];

              if ($n_user !="") {
                if (!($conectar=mysql_connect("localhost", "root", "12345678")))//se realiza conexión con la BD
              { 
              echo " <br> Error en la conexión. Usuario y/o Contraseña incorrectos. <br>";                  
              } 
              else
              {
                if (!($bd=mysql_select_db($BD))) {
                  echo "La base de Datos ".$BD. " No existe.";
                }
                else
                {  $sql="SELECT * FROM $tabla WHERE nombre_usuario='$n_user'";//se consulta si ya existe un registro 
                    $insert=mysql_query($sql, $conectar);
                    if (mysql_num_rows($insert)>=1) {
                        echo "<strong> Ya existe un Usuario Registrado como: ".$n_user."<strong>"; }
                        else{
                        //se inserta el nuevo usuario
                        mysql_query("INSERT INTO $tabla (nombre_usuario, contraseña_usuario, estado_usuario) VALUES('$n_user', '$pass_u', '$estado_u')");

                        echo "<strong>El Usuario se ha creado en la Base de Datos ".$BD." exitosamente.<strong>";
                      }
                    }
                 }
                mysql_close($conectar); 
              }                 
              
	    			?>	
	    		</div>	<br>
          <center><h2>Crear Usuario para el sistema</h1></center><br>              					    		
	    	</header>
        <form class="form-inline bg-info mt-3" action="usuarios.php" method="post"> 
            <div class="form-group col-lg-12 mt-5 mb-5"> <br> <br>           
            <input type="text" name="user" class="form-control col-sm-3 mr-2" placeholder="Nombre de Usuario" required>
            <input type="text" name="pass" class="form-control col-sm-3" placeholder="Contraseña"required>
            <input type="number" name="estado" class="form-control col-sm-3  mr-2 ml-2" placeholder="Estado (1) o (0)."required>
            <input type="submit" class="btn btn-success btn-outline-warning text-center col-md-2 ml-3" value="Crear">
            <br>
            </div>                 
            
            <br>
        </form>          	  			    	
	    </div><br><br>
			<footer class="mt-5">
      		<div class="container"><br><center><line class="text-fixed">&copy; UNAD - 2019 </line> </center><br></div>
      </footer> 
	  </div>
  	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity=						"sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    <script type="js/bootstrap.min.js"></script>
  </body>
</html>
