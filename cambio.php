<?php
		include("conn.php");
		session_start();

		$nombre = utf8_decode($_POST['submit']);

		$query = 'SELECT * FROM juego WHERE nombre_juego = "'.$nombre.'"';
		$result = mysql_query($query) or die('Consulta fallida: '. mysql_error());

		$line = mysql_fetch_row($result);
		$id = $line[0];
		$nombre = $line[2];
		$precio = $line[3];
?> 
<html> 
<head>
<meta charset="utf-8">
<title>Tunja Games</title>
</head>
<body>
<div class="group">
  <form action="validarPrecio.php" method="POST">
  <h2><em>Cambiar Precio</em></h2>  

  	<?php
      echo "<label >nombre = $nombre </label><HR>";
      echo "<label >Precio actual = $precio </label><HR>";

      echo "<input type='hidden' name='id' value=$id>";
      echo "<input type='hidden' name='nombre' value=$nombre>";
      echo "<input type='hidden' name='precioInicial' value=$precio>";
      ?> 
      <label for="precio">Precio Sugerido<span><em>(requerido)</em></span></label>
      <input type="text" name="precioSugerido" required/>
      <input  name="submit" type="submit" value="Aceptar"/>
    </p>
  </form>
  	<a href="login.html">Cerrar sesion(Logout)</a>
</div>
</body>
   
</html>