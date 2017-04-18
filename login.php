<?php

include("conn.php");
session_start();

$cedula = utf8_decode($_POST['cedula']);
$pass = utf8_decode($_POST['pass']);


$consulta = 'SELECT * FROM usuario WHERE CEDULA ='.$cedula.' AND PASSWORD ='.$pass.';';
$result = mysql_query($consulta) or die('Consulta fallida: '. mysql_error());


$line = mysql_fetch_assoc($result);
$tipo = $line["TIPO_USR"];
$count = mysql_num_rows($result);
      
		
     if($count == 1 and $tipo == 'A') {
     
         $_SESSION['login_user'] = $cedula;        
         header("location: admin.php");

      }else if ($count == 1 and $tipo=='J') {
      	 $_SESSION['login_user'] = $cedula;        
         header("location: jugador.php");
      }

      else {
         echo "Usuario o contraseña incorrectos";
         echo  "<a href='login.html'>  Intentar de nuevo</a>";
    }

//Imprimir los resultados en HTML
//echo "<table>\n";
//while ($line = mysql_fetch_assoc($result)) {
    //echo "\t<tr>\n";
    //foreach ($line as $col_value) {
//        echo $line["CEDULA"];
//    }
    //echo "\t</tr>\n";
//}
//echo "</table>\n";


// Liberar resultados
mysql_free_result($result);

// Cerrar la conexión
mysql_close($link);
?> 