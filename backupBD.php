<?php require('valida_sesion.php'); ?>
<?php

	//Base de datos
	$BD="bdunad22";
	
	if (!($conectar=mysql_connect("localhost", "root", "12345678")))//se verifica conexión
    { 
        echo " <br> Error en la conexión. Usuario y/o Contraseña incorrectos. <br>";
                           
    } else
    {
      	if (!($bd=mysql_select_db($BD))) {//se verifica la existencia de la BD
            echo "La base de Datos ".$BD. " No existe.";
        }
        else
        {
        	// Backup BD
          	$BD = 'bdunad22'; //Nombre de la Base de datos						
			$fecha = date("Ymd"); //Obtenemos la fecha para identificar el respaldo
			// Construimos el nombre de archivo SQL Ejemplo: bdunad22_20190425.sql
			$salida_sql = $BD.'_'.$fecha.'.sql'; 
				
			//Comando para genera respaldo de MySQL, enviamos la conexion y el destino
			$dump = "mysqldump --$conectar --opt $BD > $salida_sql";
			system($dump, $output); //Ejecutamos el comando para respaldo
				
			$zip = new ZipArchive(); //Objeto de Libreria ZipArchive
					
			//Construimos el nombre del archivo ZIP Ejemplo: bdunad22_20190425.zip
			$salida_zip = $BD.'_'.$fecha.'.zip';
					
			if($zip->open($salida_zip,ZIPARCHIVE::CREATE)===true) { //Creamos y abrimos el archivo ZIP
			$zip->addFile($salida_sql); //Agregamos el archivo SQL a ZIP
			$zip->close(); //Cerramos el ZIP
			unlink($salida_sql); //Eliminamos el archivo temporal SQL
			header ("Location: $salida_zip"); // Redireccionamos para descargar el Arcivo ZIP
			} else 
			{
				echo 'Error al crear Backup o Respaldo'; //Enviamos el mensaje de error
			}
        }			
    }
    mysql_close($conectar);
?>