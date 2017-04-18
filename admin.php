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
  <form action="agregar.php" method="POST">
  <h2><em>AGREGAR VIDEO JUEGO</em></h2>  

      <label for="id">id<span><em>(requerido)</em></span></label>
      <input type="text" name="id"required/>   
      
      <label for="nombre">nombre<span><em>(requerido)</em></span></label>
      <input type="text" name="nombre" required/>   

      <label for="precio">precio<span><em>(requerido)</em></span></label>
      <input type="text" name="precio" required/>    

      <label for="precio">Categoria<span><em>(requerido)</em></span></label>
      	

     <select name="categoria"> 

      <?php
      	 $consulta = 'SELECT id_cat, categoria FROM Categoria';
		 $result = mysql_query($consulta) or die('Consulta fallida: '.mysql_error());
         while($row = mysql_fetch_assoc($result))
         {

        

         echo'<OPTION VALUE="'.$row['id_cat'].'">'.$row['categoria'].'</OPTION>';
         }
      ?> 
      </select>
      <input  name="submit" type="submit" value="AGREGAR" />
    </p>
  </form>
  	<a href="login.html">Cerrar sesion(Logout)</a>
</div>
</body>
   
</html>