<link rel="stylesheet" href="estilos.css">

<?php 
require_once "../lib/nusoap.php";

$client=new nusoap_client("http://wsf.cdyne.com/WeatherWS/Weather.asmx?WSDL",'wsdl');

$resultado=$client->call("GetCityForecastByZIP", array("ZIP"=>"90210"));

/*Para imprimir los valores que se obtienen del Web Service, y para obtener valores 
más concretos se observa el código fuente en el navegador*/
print_r($resultado);

$ciudad=$resultado['GetCityForecastByZIPResult']['City'];
$estado=$resultado['GetCityForecastByZIPResult']['State'];

echo "<h1>Pronóstico del Tiempo (".$ciudad.", ".$estado.")</h1>";

 ?>