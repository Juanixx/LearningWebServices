<?php 

		header('Content-Type: application/json');

		function mostrarAlumno(){
			$alumno=array (
			"nombre"=>"Ignacio",
			"apellido"=>"Diaz",
			"pais"=>"Chile",
			"cursos"=>"5",
			"usuario"=>"Juanix9999"
				);
				return $alumno;

		}
		echo json_encode(mostrarAlumno());


 ?>