<?php

include("conn.php");
session_start();

$id = utf8_decode($_POST['id']);
$nombre = utf8_decode($_POST['nombre']);
$precio = utf8_decode($_POST['precio']);
$categoria =utf8_decode($_POST['categoria']);





$sql = 'INSERT INTO juego(id_juego,id_cat,nombre_juego,precio_juego)'.'VALUES ( '.$id.', '.$categoria.', "'.$nombre.'", '.$precio.' )';
$retval = mysql_query($sql) or die('Consulta fallida: '. mysql_error());


      //die('Could not enter data: ' . mysql_error());


   
	echo "<script language=’JavaScript’>alert(‘JavaScript dentro de PHP’); </script>";
	 header('Location: admin.php');

?>