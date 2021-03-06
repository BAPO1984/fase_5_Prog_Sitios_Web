<?php require('valida_sesion.php'); ?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, minimun-scale=1.0, maximun-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity=			"sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="css/bootstrap.min.css"> 
    <link rel="stylesheet" href="css/style.css"><!--Estilos-->
</head>
        <title>Fox Electronics</title>
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
    
    <!-- Crear Tabla en base de datos -->
	  <div class="container"> 
      <header><div class="col-sm-12 mt-2"><br><p> <strong> ¡Atención!</strong> :Para Crear una tabla, primero debe haber creado la Base de Datos. Esta tabla se usará para almacenar el registro de USUARIOS del sistema.</p><br></div></header>
      <form class="form-group-row text-center mt-3" method="post" action="creatablauser.php">      
        <h1 class="mb-5 font-weight-normal bg-warning"><strong>Crear Tabla Para Usuarios</strong></h1>
        <div class="col-sm-8">
          <input type="text" class="form-control col-sm-7 ml-auto" id="validationDefault01" name="nombreBD" placeholder="Nombre de la Base de Datos" required>
        </div><br>
        <div class="form-group row">          
          <label for="inputName" class="col-sm-3 col-form-label">Nombre  Tabla para Base de Datos:</label>       
          <div class="col-sm-5">
            <input type="text" class="form-control" id="validationDefault02" name="nombreT" placeholder="IngreseNombreSinEspacios" required><br>
            <input class="btn btn-lg btn-primary btn-primary btn-outline-warning col-sm-6" type="submit" value="Crear"><br><br>
            
          </div>  
        </div>
      </form>  

      <footer>
        <br><center><line class="text-fixed">&copy; UNAD - 2019 </line> </center><br>
      </footer>                     
	  </div>


    
    
</body>

	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity=						"sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
</body>
</html>