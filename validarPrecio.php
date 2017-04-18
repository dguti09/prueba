<?php
include("conn.php");
session_start();

$precioSugerido = utf8_decode($_POST['precioSugerido']);
$nombre = utf8_decode($_POST['nombre']);
$id = utf8_decode($_POST['id']);
$precioInicial = utf8_decode($_POST['precioInicial']);

$cedula = $_SESSION['login_user'];

	$Consulta = 'select * from precio_sugerido where id_juego= '.$id.' AND cedula ='.$cedula.';';
	$retval = mysql_query($Consulta) or die('Consulta fallida: '. mysql_error());

	$row = mysql_fetch_row($retval);

	//echo var_dump($row);

	if ($row==false){

			$sql = 'INSERT INTO precio_sugerido(id_juego,cedula,precio_sugerido)'.'VALUES('.$id.','.$cedula.','.$precioSugerido.');';
	$retval = mysql_query($sql) or die('Consulta fallida: '. mysql_error());

	$sql2='select COUNT(*) contador FROM precio_sugerido where id_juego='.$id.' AND PRECIO_SUGERIDO='.$precioSugerido.' GROUP BY ID_JUEGO;';
	$result = mysql_query($sql2) or die('Consulta fallida: '. mysql_error());


	while ($row = mysql_fetch_row($result)){ 
		$cant=$row[0];

	if ($cant>=2) {
		$sql2='UPDATE juego set precio_juego='.$precioSugerido.' where id_juego='.$id;
		$result = mysql_query($sql2) or die('Consulta fallida: '. mysql_error());
	}
	}

	header('Location: jugador.php');

	}else{

		echo "Ya ha modificado el precio para este videojuego<HR>";
		echo "<a href='jugador.php'>Continuar</a>";
	}
?> 
