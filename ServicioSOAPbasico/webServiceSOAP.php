<?php 
	//El arhivo nusoap sirve para administrar todas las clases de nuestro servicio
	//Para incluirla dentro de nuestra aplicación se usa require once
	require_once "../lib/nusoap.php";

	function muestraPlanetas(){
		$planetas="Lorem ipsum dolor sit amet, consectetur adipisicing elit. Commodi similique suscipit praesentium placeat, qui incidunt est unde natus ex, quaerat quasi eius porro at voluptatum sint dicta, fuga possimus beatae.
		Veniam cupiditate dicta labore, aut magni sint laudantium repudiandae, quia aperiam non eveniet numquam optio, deleniti fuga beatae rerum illo iusto accusantium saepe at rem consequatur fugiat minima quidem. Modi?";

		return $planetas;
	}

	/*Aquí se empiezan a hacer paso de parámetros en las funciones,
	en éste caso se utilizará la función para hacer un cambio de imagenes
	de forma dinámica, dependiendo de las condiciones */
	function muestraImagen($categoria){


	}

	/*El siguiente if revisa que la variable post_data no esta disponible
	dentro del servidor*/
	if (!isset($HTTP_RAW_POST_DATA)) {
		/*Ya que la variable no exite en el servidor, pues se crea para que esté disponible*/
		$HTTP_RAW_POST_DATA = file_get_contents('php://input');
	}

	//Se empieza a crear el servidor de éste web server
	$server = new soap_server();
	//Se registra la función para que los usuarios puedan empezar a interactuar con ella
	//Se registra entre comillas
	$server->register("muestraPlanetas");

	//Para leer los datos que están llegando

	/*Dependiendo de la configuración del servidor, puede que
	ésta función no esté disponible*/ 
	$server->service($HTTP_RAW_POST_DATA);

 ?>