<?php 

//date_default_timezone_set("America/Mexico_City");

require_once "../lib/nusoap.php";

//ésto define un cliente que puede leer el formato SOAP
$cliente=new nusoap_client("http://localhost/WebServices/ServicioSOAPbasico/webServiceSOAP.php");

$planetas=$cliente->call("muestraPlanetas");

echo "<h1>Los planetas</h1>";

echo "<p>".$planetas."</p>";

 ?>