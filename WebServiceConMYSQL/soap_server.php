<?php 
require_once "../lib/nusoap.php";
//Se va a empezar a conectar con la BD
$username="root";
$password="theonly1";
$hostname="localhost";
$bd="phpws";
	$mysqli=new mysqli($hostname,$username,$password,$bd);
if (mysqli_connect_errno()) {
	echo "Error en la conexión: ".mysqli_connect_error();
	exit();
	}
else {
	echo "<br>";
	echo "Conectado a la base de datos";
	}

function muestraLibros(){
	
	$result=$mysqli->query("select*from libros");

	while ($row=$result->fetch_assoc()) {
	
	$all[]=$row;
	}
	return $all;
	}
//Agregado para compatibilidad
if(!isset($HTTP_RAW_POST_DATA)){
	$HTTP_RAW_POST_DATA=file_get_contents('php://input');
	}

$server=new soap_server();
$server->register('muestraLibros');
$server->service($HTTP_RAW_POST_DATA);
exit;
 ?>