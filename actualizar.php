<?php require('valida_sesion.php'); ?>
<!DOCTYPE html>
<html lang="es">
<head>
	<title>Fox Electronics</title>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, minimun-scale=1.0, maximun-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity=     "sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
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
                  <a class="dropdown-item" href="tablaBD.html">Crear Tabla BD</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="#">Crear Usuarios</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="#">Administrar Usuarios</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="#">Generar Backup BD</a>
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
            //información de la Base de Datos
              $BD="bdunad22";
              $tabla="tabla22";
            
              //capturamos los datos del producto
              $codigo=$_POST["codigo"];
              $nombre=$_POST["nombre"];
              $marca=$_POST["marca"];
              $precio=$_POST["precio"];
              $cantidad=$_POST["cantidad"];
   
              if (!($conectar=mysql_connect("localhost", "root", "12345678")))//se verifica conexión
                { 
                  echo " <br> Error en la conexión. Usuario y/o Contraseña incorrectos. <br>";
                            
                } else
                { 
                  if (!($bd=mysql_select_db($BD))) {//se verifica la existencia de la BD
                    echo "La base de Datos ".$BD. " No existe.";
                  }
                  else{
                    $sql="SELECT * FROM $tabla WHERE codigo='$codigo'";//se consulta si ya existe un registro para el codigo ingresado
                    $consultar=mysql_query($sql, $conectar);
                    if (mysql_num_rows($consultar)>=1) {
                      mysql_data_seek($consultar, 0);
                      $producto=mysql_fetch_array($consultar);
                      //se verifica que datos el usuario desea actualizar
                      if ($nombre=="")
                      {
                        $nombre=$producto['nombre'];
                      }
                      if ($marca=="")
                      {
                        $marca=$producto['marca'];
                      }
                      if ($precio=="")
                      {
                        $precio=$producto['precio'];
                      }
                      if ($cantidad=="")
                      {
                        $cantidad=$producto['cantidad'];
                      }

                      //se realiza la actualización del producto
                      mysql_query("UPDATE $tabla SET nombre='$nombre', marca='$marca', precio='$precio', cantidad='$cantidad' WHERE codigo='$codigo'");
                      //mensaje para el usuario                      
                      echo "El Producto Registrado con código: ".$codigo. " se actualizo correctamente."; }
                    else{
                      echo " El producto con código: ".$codigo."  no existe en la base de datos.";
                    }                    
                  }
                }                   
              mysql_close($conectar);
            ?>  
          </div>  <br>
          <form action="actualizar_prod.html">
            <center><input type="submit" class=" col-sm-2 btn btn-success btn-outline-warning text-center" name="continuar" value="Continuar"> </center> <br>
          </form>
                        
        </header>
                
      </div><br><br><br><br><br><br>
      <footer class="mt-5">
          <div class="container"><br><center><line class="text-fixed">&copy; UNAD - 2019 </line> </center><br></div>
      </footer> 
    </div>
      
    
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity=           "sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    <script type="js/bootstrap.min.js"></script>
</body>
</html>