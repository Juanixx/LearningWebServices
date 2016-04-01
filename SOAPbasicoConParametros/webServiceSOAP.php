<?php 
	//El arhivo nusoap sirve para administrar todas las clases de nuestro servicio
	//Para incluirla dentro de nuestra aplicación se usa require once
	require_once "../lib/nusoap.php";

	function muestraPlanetas(){
		$planetas="Lorem ipsum dolor sit amet, consectetur adipisicing elit. Explicabo maxime veniam nihil deleniti, fugiat doloremque asperiores tempore impedit quidem delectus officiis dolore molestiae accusantium expedita sequi aperiam, facilis odio laboriosam!";

		return $planetas;
	}

	/*Aquí se empiezan a hacer paso de parámetros en las funciones,
	en éste caso se utilizará la función para hacer un cambio de imagenes
	de forma dinámica, dependiendo de las condiciones */
	function muestraImagen($categoria){

		if($categoria=='espacio'){
			$imagen='img1.jpg';
		}else{
			$imagen='img2.jpg';
		}

		$resultado='<img src="../../ImagenesAWU/'.$imagen.'" height=300px, width=300px';
		return $resultado;
	}

	/*El siguiente if revisa que la variable post_data no esta disponible
	dentro del servidor*/
	if (!isset($HTTP_RAW_POST_DATA)) {
		/*Ya que la variable no exite en el servidor, pues se crea para que esté disponible*/
		$HTTP_RAW_POST_DATA = file_get_contents('php://input');
	}

	//Se empieza a crear el servidor de éste web server
	$server = new soap_server();

	/*Ahora se configura el WSDL dentro del servidor con la finalidad de dar una descripción sobre el web service.
	Primero se define el nombre del Web Service, seguido de un Name Space*/

	$server->configureWSDL("Aprendiendo Web Services","urn:AprendiendoWS");

	//Se registra la función para que los usuarios puedan empezar a interactuar con ella
	//Se registra entre comillas
	$server->register("muestraPlanetas",
		array(),/*Primero se describe que parámetros recibe esta funcion, en este caso no se recibe ninguno, por lo tanto 
		se tiene un arreglo vacío */
		array('return'=>'xsd:string'),/*También se describe la respuesta cada vez que se mande llamar la funnción muestra planetas*/
		'urn:AprendiendoWS',/*También se describe el name space, es el mismo que se configuró en el WSDL*/
		'urn:AprendiendoWS#muestraPlanetas',/*Se describe la manera de invocar la función dentro del web service*/
		'rpc',/*Estilo, con esto se define lo que va a tener el Web Service, con tan solo tenerlo está correcto*/
		'encoded',/*Uso, con esto se define lo que va a tener el Web Service, con tan solo tenerlo está correcto*/
		'Muestra el contenido para aprender WS'/*Finalmente se describe que es lo que está haciendo este Web Service*/
		);
	$server->register("muestraImagen",
		array('categoria'=>'xsd:string'),/*Primero se describe que parámetros recibe esta funcion, en este caso es una categoría relacionado con un tipo de dato */
		array('return'=>'xsd:string'),/*También se describe la respuesta cada vez que se mande llamar la funnción muestra planetas*/
		'urn:AprendiendoWS',/*También se describe el name space, es el mismo que se configuró en el WSDL*/
		'urn:AprendiendoWS#muestraPlanetas',/*Se describe la manera de invocar la función dentro del web service*/
		'rpc',/*Estilo, con esto se define lo que va a tener el Web Service, con tan solo tenerlo está correcto*/
		'encoded',/*Uso, con esto se define lo que va a tener el Web Service, con tan solo tenerlo está correcto*/
		'Muestra una imagen variable'/*Finalmente se describe que es lo que está haciendo este Web Service*/
		);

	//Para leer los datos que están llegando

	/*Dependiendo de la configuración del servidor, puede que
	ésta función no esté disponible*/ 
	$server->service($HTTP_RAW_POST_DATA);

 ?>