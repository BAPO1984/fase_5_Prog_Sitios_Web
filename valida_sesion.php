<?php 
   
  session_start();
  if (!isset($_SESSION['usuario'])) {
    echo'<script type="text/javascript">
          alert("¡Por Seguridad Hemos cerrado su sesión! <> Vuelve a Iniciarla");
          window.location.href="login.html";
          </script>';    
    exit();
  }
  $tiempo=time();
  if ($tiempo > $_SESSION['destroy']) {
    session_destroy();
    echo'<script type="text/javascript">
          alert("¡su tiempo en el sistema a Expirado! <> Ingresanuevamente");
          window.location.href="login.html";
          </script>';
  }
 ?>