<?php 

//date_default_timezone_set("America/Mexico_City");

require_once "../lib/nusoap.php";

//ésto define un cliente que puede leer el formato SOAP
$cliente=new nusoap_client("http://localhost/WebServices/SOAPbasicoConParametros/webServiceSOAP.php");

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