<?php
	include("conn.php");
	session_start();
   
   $user_check = $_SESSION['login_user'];

?>
<html> 
<head>
<meta charset="utf-8">
<title>Tunja Games</title>
</head>
<body>
<div class="group">
  <form action="cambio.php" method="POST">


  <?php
      $consulta = 'SELECT * FROM juego j, categoria c where j.id_cat=c.id_cat';
      $result = mysql_query($consulta) or die('Consulta fallida: '. mysql_error());
    /*  echo "<table>\n";
      while ($line = mysql_fetch_assoc($result)) {

      echo "<tr>\n";
      echo "<td>$line['nombre_juego']</td>\n";
      echo "</tr>\n";
      }
      echo "</table>\n"; */


      echo "SI cree que el precio mostrado es inadecuado, de click sobre el nombre del juego para enviar una sugerencua sobre el precio";
      echo "<table>";  
      echo "<tr>"; 
      echo "<th>id</th>";  
      echo "<th>Nombre</th>";  
      echo "<th>Precio</th>";
      echo "<th>Categoria</th>";
      echo "</tr>";  
      while ($row = mysql_fetch_row($result)){   
          echo "<tr>";  
          echo "<td name='row0'>$row[0]</td>"; 
          echo "<td> <input name='submit' type='submit' value='$row[2]'/></td>"; 
          echo "<td>$row[3]</td>"; 
          echo "<td>$row[5]</td>"; 
           
          echo "</tr>";  
      }  
     
      echo "</table>";  
  ?>
  </form>
  	<a href="login.html">Cerrar sesion(Logout)</a>
</div>
</body> 
</html>