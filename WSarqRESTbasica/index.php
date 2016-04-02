<?php 
		$url='http://localhost/WebServices/WSarqRESTbasica/API/alumno/alumno.php';

		$JSON=file_get_contents($url);

		$datos=json_decode($JSON);

		echo "Nombre: ".$datos->nombre." ".$datos->apellido."<br>";

		echo "Pais: ".$datos->pais."<br>";
		echo "Cursos activos: ".$datos->cursos."<br>";
		echo "Usuario ".$datos->usuario."<br>";
		



 ?>