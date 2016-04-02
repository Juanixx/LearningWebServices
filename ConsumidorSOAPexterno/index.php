<link rel="stylesheet" href="estilos.css">

<?php 
require_once "../lib/nusoap.php";

$client=new nusoap_client("http://wsf.cdyne.com/WeatherWS/Weather.asmx?WSDL",'wsdl');

$resultado=$client->call("GetCityForecastByZIP", array("ZIP"=>"90210"));

/*Para imprimir los valores que se obtienen del Web Service, y para obtener valores 
más concretos se observa el código fuente en el navegador*/
//print_r($resultado);

$ciudad=$resultado['GetCityForecastByZIPResult']['City'];
$estado=$resultado['GetCityForecastByZIPResult']['State'];

echo "<h1>Pronóstico del Tiempo (".$ciudad.", ".$estado.")</h1>";

//Se va a empezar a procesar datos complejos de Web Services externos
$pronosticos= $resultado['GetCityForecastByZIPResult']['ForecastResult']['Forecast'];

foreach($pronosticos as $diaPronostico){
	$fecha = $diaPronostico['Date'];
	$descripcion= $diaPronostico['Desciption'];

	$minima=$diaPronostico['Temperatures']['MorningLow'];
	$maxima=$diaPronostico['Temperatures']['MorningLHigh'];

	$fechaAjuste=strtotime($fecha);

	echo '<div class="caja">';
		echo '<div class="fecha">	'.date('d/m/Y',$fechaAjuste).'</div>';
		echo '<div class="descripcion">'.$descripcion.'</div>';
		echo '<div class="maxima">Maxima: '.$maxima.'	°F</div>';

		if(!empty($minima)){
			echo '<div class="minima">Minima: '.$minima.'	°F</div>';
		}

	echo "</div>";

}

 ?>