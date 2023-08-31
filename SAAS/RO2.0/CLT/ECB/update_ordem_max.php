<?php
include_once "essence/conecta.php";
$rota = $_POST['rota'];
$saida = $_POST['start'];
$entrada = $_POST['end'];
$clientes = $_POST['cliente'];
$veiculo = $_POST['id_veiculo'];
$nome_veiculo = $_POST['nome_veiculo'];

$cli =  split("\|", $clientes);
$saida_split =  split("\,", $saida);
$entrada_split =  split("\,", $entrada);
$tamanha_array = count($cli);


$array_lat = array();
$array_lgn = array();

// ADD INICIO
array_push($array_lat, $saida_split[0]);
array_push($array_lgn, $saida_split[1]);


/// ADD PEDIDOS

for($x=0;$x<$tamanha_array;){

$query = "select lat, lgn from rotas where id='$cli[$x]'";
$rs = mysql_query($query);


$dados = mysql_fetch_array($rs);


$lat = $dados['lat'];
$lgn = $dados['lgn'];

array_push($array_lat, $lat);
array_push($array_lgn, $lgn);


$x++;
	
}

//ADD FINAL
array_push($array_lat, $entrada_split[0]);
array_push($array_lgn, $entrada_split[1]);

$tamanha_array = count($array_lat);;


for($contaae=0;$contaae<$tamanha_array;){



if($contaae+1 == $tamanha_array){
echo "ACABOU ROTA";

} else {
	$distance = haversineGreatCircleDistance($array_lat[$contaae], $array_lgn[$contaae], $array_lat[$contaae+1], $array_lgn[$contaae+1], 6371);

	

	$dist = round($distance, 1);

	// CONSIDERA  
	if ($dist>40){
		$soma_estradas = $dist * 0.5;
	} else {

		$soma_estradas = $dist * 0.25;
	}
	
	$dist = $dist + $soma_estradas;

	$tempo = $dist*60;

	$horas = floor($tempo / 3600);
	$minutos = floor(($tempo - ($horas * 3600)) / 60);
	$segundos = floor($tempo % 60);
	$tempo_gasto=  $horas . ":" . $minutos . ":" . $segundos;

	//echo round($distance, 1) . " - " . $cli[$contaae] . " - " . $tempo_gasto .  "<br>";

	// GRAVA DISTANCIA/TEMPO NOVO
	if($cli[$contaae]!=''){
		$query= "UPDATE rotas SET distancia = '$dist', tempo='$tempo_gasto' WHERE id=$cli[$contaae]";
		$rs= mysql_query($query);
		

		
	} else{
		$retorno = $dist;
		$tempo_retorno = $tempo_gasto;

	}
	$dist_total = $dist_total + $dist;
	//$tempo_total = $tempo_total + $tempo_gasto;

	$tempo_total = gmdate('H:i:s', strtotime($tempo_total) + strtotime($tempo_gasto) );

	
}

$contaae++;
	



}

$query_veiculo= "UPDATE veiculos SET distancia_total = '$dist_total', tempo_total='$tempo_total', integrado=0 WHERE id=$veiculo";
$rs_veiculo= mysql_query($query_veiculo);


		
function haversineGreatCircleDistance(
	$latitudeFrom, $longitudeFrom, $latitudeTo, $longitudeTo, $earthRadius = 6371000)
  {
	// convert from degrees to radians
	$latFrom = deg2rad($latitudeFrom);
	$lonFrom = deg2rad($longitudeFrom);
	$latTo = deg2rad($latitudeTo);
	$lonTo = deg2rad($longitudeTo);
  
	$latDelta = $latTo - $latFrom;
	$lonDelta = $lonTo - $lonFrom;
  
	$angle = 2 * asin(sqrt(pow(sin($latDelta / 2), 2) +
	  cos($latFrom) * cos($latTo) * pow(sin($lonDelta / 2), 2)));
	return $angle * $earthRadius;
  }


?>
<script>

window.location.href="altera_ordem.php?rota=<?php echo $rota?>&veiculo=<?php echo $nome_veiculo?>&return=<?php echo $retorno?>&time_return=<?php echo $tempo_retorno?>";
	


</script>
