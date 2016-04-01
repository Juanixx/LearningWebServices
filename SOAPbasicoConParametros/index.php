<?php 

//date_default_timezone_set("America/Mexico_City");

require_once "../lib/nusoap.php";

/*ésto define un cliente que puede leer el formato SOAP, para que el cliente pueda leer correctamente el Web Service se tiene que configurar el cliente. Se añade "?" lo cual significa que se van a enviar valores por el URL, seguido de "wsdl" para especificar que formato se va a usar, por último se coloca "debug=0" para que entre en modo depuración cero osea en su versión final. Luego se coloca una coma y se pone 'wsdl' para especificar el formato que se va a usar */
$cliente=new nusoap_client("http://localhost/WebServices/SOAPbasicoConParametros/webServiceSOAP.php?wsdl&debug=0");

$planetas=$cliente->call("muestraPlanetas");

/*Para mandar el parámetro se usa un array asociativo, primero se
pone el nombre del parámetro y enseguida se asigna el valor que va a tener*/
$imagen=$cliente->call("muestraImagen",array("categoria"=>"espacio"));



echo "<h1>Los planetas</h1>";

echo "<p>".$planetas."</p>";

echo "<br>";

echo $imagen;

echo "<br>";



 ?>