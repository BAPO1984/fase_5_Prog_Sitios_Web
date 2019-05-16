<?php 
 $BD="bdunad22";
 $tabla="usuarios";
 $usuario=$_POST['user'];
 $clave=$_POST['clave'];
 $activo= "1";

 if ($_POST['user']=="admin" and $_POST['clave']=="admin") {//se crea una sesión solo para administrador
    session_start();//se inicia sesión
    //se crean las variables de sesión
    $_SESSION['usuario']  = 'admin';
    $_SESSION['start']  = time();
    $_SESSION['destroy']  = $_SESSION['start'] + (300);// 5 minutos para que el administrador cree usuarios
    header("location: index.html");
 }else{

  if (!($conectar=mysql_connect("localhost", "root", "12345678")))//se verifica conexión
  { 
    echo " <br> Error en la conexión. Usuario y/o Contraseña incorrectos. <br>";    
  } 
  else  
  { 
    if (!($bd=mysql_select_db($BD))) {//se verifica la existencia de la BD
    echo "La base de Datos ".$BD. " No existe.";
    }
    else
    {
      $sql="SELECT * FROM $tabla WHERE nombre_usuario='$usuario' and contraseña_usuario=md5('$clave') and estado_usuario='$activo'";
      //se consulta si existe el usuario
      $consulta=mysql_query($sql, $conectar);
      if (mysql_num_rows($consulta)>=1) {
         mysql_data_seek($consulta, 0);
        $usuario=mysql_fetch_array($consulta);
        session_start();//se inicia sesión
        //se crean las variables de sesión
         $_SESSION['usuario']  = $usuario['nombre_usuario'];
         $_SESSION['start']  = time();
         $_SESSION['destroy']  = $_SESSION['start'] + (420); 
         header("location: index.html"); 
                      
      }
      else
      {
      //Mensaje de datos de acceso incorrectos o usuario inactivo       
          echo'<script type="text/javascript">
               alert("¡Acceso denegado! Datos Incorrectos. Consulte con el Administrador");
               window.location.href="login.html";
             </script>';         
      }
    }
  }

  mysql_free_result($consulta);                  
  mysql_close($conectar);
 } 
   
?>