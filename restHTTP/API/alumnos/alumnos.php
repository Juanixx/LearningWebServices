<?php 

		header('Content-Type: application/json');

		function mostrar_cursos(){

			$cursos=array('AngularJS','MongoDB','PHP','UX','Ruby');

			return $cursos;
		}

		function mostrar_alumnos(){
			$alumnos=array('Antonio','Hernán','Carlos','María Luz','Nicolás');

			return $alumnos;
		}

		if($_GET['solicitud']=='cursos'){

			$resultados=mostrar_cursos();
		}else if ($_GET['solicitud']=='lista') {
			
			$resultados=mostrar_alumnos();
		}else{
			header('HTTP/1.1 405 Method Not Allowed');
			exit;
		}

		echo json_encode($resultados);

 ?>