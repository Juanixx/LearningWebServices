<?php
	/*La siguiente línea lee un archivo externo
	Con CUrl_init se indica la ruta de un archivo*/
	$curl=curl_init("http://localhost/WebServices/WebServiceBasico/base.txt");

	/*para definir opciones para curl, en este caso definir cuál va a ser la salida del texto,
	ayuda a leer correctamente el archivo que se esta invocando*/
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

	/*Para ejecutar curl y leer el archivo se usa lo siguiente, además se guarda 
	dentro de la variable la información*/
	$respuesta=curl_exec($curl);

	//Para leer la metadata del archivo
	$info=curl_getinfo($curl);

	/*Lo siguiente comprueba que el archivo está bien y funciona (código de php=200)
	*/
		if ($info['http_code']=200) {
			//Se indica con explode que se haga un proceso a partir de la variable respuesta
			/*en éste caso, la información que llega se rompe a partir de las comas*/
			//La información llega en forma de arreglo
			$datos=explode(",", $respuesta);
			echo "<h1>Frutas en mi tienda</h1>";

			/*Ahora, cada uno de los datos se pasa a una variable llamada fruta*/
			foreach ($datos as $fruta) {
				echo "-> ".$fruta."<br>";
			}
		}
		else{
			/*Si el archivo da un error se usa lo siguiente*/
			echo "Error ".curl_error($curl);
		}
?>