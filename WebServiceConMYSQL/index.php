<?php 
	require_once "../lib/nusoap.php";

	$cliente=new nusoap_client("http://localhost/WebServices/WebServiceConMYSQL/soap_server.php");

	$libros=$cliente->call("muestraLibros");

	echo "libros ".$libros."   Se termino la consulta";


	echo"<ul>";

		foreach ($libros as $item) {
			echo "<li>";
			echo "<strong>".$item['autor']."</strong><br>";
			echo $item['titulo'];
			echo "<br><br></li>";
		}



	echo"</ul>";
 ?>