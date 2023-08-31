<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>::: Imprimir Relatório detalhado da Rota :::</title>
<link rel="shortcut icon" href="imgs/favicon.ico" >
<link rel="icon" type="image/gif" href="imgs/animated_favicon1.gif" >
</head>

<style>
table.bordasimples {
	border-collapse: collapse;
	}


table.bordasimples tr td {
	font-family: Arial, Helvetica, sans-serif;
	font-size:10px;
	border:1px solid #cccccc;
  padding: 1px 1px 1px 1px;
  text-align: left;
  vertical-align: text-top  ;

}


::-webkit-scrollbar-track {
    background-color: #F4F4F4;
}
::-webkit-scrollbar {
    width: 6px;
    background: #000000;
}
::-webkit-scrollbar-thumb {
    background: #d3d5d6;
}


::-webkit-scrollbar-track:horizontal {
    background-color: #F4F4F4;
 }

 ::-webkit-scrollbar:horizontal {
  
    height: 6px;
    background: #000000;
}
::-webkit-scrollbar-thumb:horizontal {
    background: #d3d5d6;
}

body {
  background-color: #fffffff6;
  font-size:9px;
}



</style>


<body>


 
<?php 
  include ('session.php'); 
  require_once ("geocode.class.php");
  include ('essence/conecta.php');
  ini_set('max_execution_time',12000);

function sum_the_time($time1, $time2) {
  $times = array($time1, $time2);
  $seconds = 0;
  
  foreach ($times as $time)
  {
    list($hour,$minute,$second) = explode(':', $time);
    $seconds += $hour*3600;
    $seconds += $minute*60;
    $seconds += $second;
  }
  $hours = floor($seconds/3600);
  $seconds -= $hours*3600;
  $minutes  = floor($seconds/60);
  $seconds -= $minutes*60;
  // return "{$hours}:{$minutes}:{$seconds}";
  return sprintf('%02d:%02d:%02d', $hours, $minutes, $seconds); // Thanks to Patrick
}


function convertToHoursMins($time, $format = '%02d:%02d') {
    if ($time < 1) {
        return;
    }
    $hours = floor($time / 60);
    $minutes = ($time % 60);
    return sprintf($format, $hours, $minutes);
}


function calcHora($hora1,$hora2){
$entrada = $hora2;
$saida =$hora1;
$hora1 = explode(":",$entrada);
$hora2 = explode(":",$saida);
$acumulador1 = ($hora1[0] * 3600) + ($hora1[1] * 60) + $hora1[2];
$acumulador2 = ($hora2[0] * 3600) + ($hora2[1] * 60) + $hora2[2];
$resultado = $acumulador2 - $acumulador1;
$hora_ponto = floor($resultado / 3600);
$resultado = $resultado - ($hora_ponto * 3600);
$min_ponto = floor($resultado / 60);
$resultado = $resultado - ($min_ponto * 60);
$secs_ponto = $resultado;
return $hora_ponto.":".$min_ponto;
}


$quem= $_GET["check_list"];

$transp = $_GET["transp"];

for ($i=0;$i<count($quem);$i++)
{
   

    $query = "select * from rotas where nome_rota='$quem[$i]'";																
    $rs = mysql_query($query);
	$conta = 0;
	$veiculo=array();
	//$distancia=[];
	
	//$tempo=[];
	

	//$resultado = 0;

	while($row = mysql_fetch_array($rs)){
		
		$veiculo = $row["veiculo"];		
		$conta ++;
	
	}
  
  
  $query_i = "select * from rotas where nome_rota='$quem[$i]' group by codigo_cliente";																
  $rs_i = mysql_query($query_i);
  $conta_i = 0;
  while($row_i = mysql_fetch_array($rs_i)){
  $conta_i ++;
  }


?> 
     <table width="100%" border="1" class="bordasimples" cellpadding="2" cellspacing="2">
  	  <tbody>
      <tr bgcolor="#cccccc" style="text-transform:uppercase;font-weight: bold;">
    
      <td height="20" colspan="7" style="text-align: center; color: #000000; font-size:14px;padding-top: 15px;height: 30px" >RELATÓRIO DETALHADO DA ROTA (ROMANEIO) - ROTA - <?php echo $quem[$i]; ?></td>
      </tr>
    
      
<tr style="height: 30px;">
	 
      <?php
	  $query_todos = "select * from veiculos where id='$veiculo'";															
	  $rs_todos = mysql_query($query_todos);  
	  $dados = mysql_fetch_array($rs_todos);
	  
	  
	  $query_soma = "SELECT SUM(tempo_servico) AS total_servico FROM rotas where veiculo='$veiculo'";
	  $rs_soma = mysql_query($query_soma);  
	  $dados_soma = mysql_fetch_array($rs_soma);
	  //echo $dados_soma['total_servico'];
	  
	 
	  $tempo_servico = convertToHoursMins($dados_soma['total_servico'], '%02d:%02d:00');
	  $tempo_percurso = $dados['tempo_total'];

	  $resultado = sum_the_time($tempo_percurso, $tempo_servico);
	 // echo $resultado;
	
	  ?>

      <td style="font-weight: bold;font-size:11px;padding-top: 10px;padding-left:5px" >Veiculo: <?php echo $dados['nome']; ?></td>
            
      <td style="font-weight: bold;font-size:11px;padding-top: 10px;padding-left:5px;"><?php echo $conta_i . " VISITAS"; ?></td>

      <td style="font-weight: bold;font-size:11px;padding-top: 10px;padding-left:5px;">Distância Total: <?php echo $dados['distancia_total']; ?></td>

      <td style="font-weight: bold;font-size:11px;padding-top: 10px;padding-left:5px;">Tempo   Total: <?php echo $dados['tempo_total']; ?></td>

      <td style="font-weight: bold;font-size:11px;padding-top: 10px;padding-left:5px;">Peso Total: <?php echo $dados['peso_total']; ?></td>

      <td style="font-weight: bold;font-size:11px;padding-top: 10px;padding-left:5px;">Volume Total: <?php echo $dados['volume_total']; ?></td>

      <td style="font-weight: bold;font-size:11px;padding-top: 10px;padding-left:5px;">Valor Total: <?php echo $dados['valor_total']; ?></td>

      


  </tr>
    </tbody>
</table>

<br>
 <table width="100%" border="1" class="bordasimples" cellpadding="2" cellspacing="2">
  	  <tbody>
        
 
    <tr style="text-transform:uppercase;font-weight: bold;color: #000000;" bgcolor="#ECECEC">
      <td  height="20" nowrap style="padding-top: 15px; padding-left:5px">Destino</td>

      <td  nowrap  style="padding-top: 15px; padding-left:5px">Endereço</td>
      
      <td  nowrap  style="padding-top: 15px; padding-left:5px">Bairro</td>
      <td   nowrap style="padding-top: 15px; padding-left:5px">Cidade</td>
      <td  nowrap  style="padding-top: 15px; padding-left:5px">UF</td>
      <td   nowrap style="padding-top: 15px; padding-left:5px">CEP</td>

      <td  nowrap style="padding-top: 15px; padding-left:5px">C. Pedido</td>

      <td   nowrap style="padding-top: 15px; padding-left:5px">OBS.</td>
      <td  nowrap style="padding-top: 15px; padding-left:5px">Peso</td>

		
		 <td   nowrap style="padding-top: 15px; padding-left:5px">Tempo</td>
		 <td  nowrap style="padding-top: 15px; padding-left:5px">Distância</td>
    </tr>
<?php
   $query1= "select * from rotas where nome_rota='$quem[$i]' order by ordem";																
    $rs1 = mysql_query($query1);
	$conta1 = 0;
//	$veiculo1=[];
	$distancia=array();
	$tempo=array();
	$cod_cliente =array();
	$nome_cliente =array();
	$endereco =array();
	
	$peso =array();
	$volume =array();
	$valor =array();
	$distancia_somatudo=0;
	$tempo_somatudo=array();
	

	$codigo_pedido =array();
	$obs_pedido =array();


	while($row1 = mysql_fetch_array($rs1)){
		
	//	$veiculo1 = $row1["veiculo"];	
		$distancia = $row1["distancia"];		
		$tempo = $row1["tempo"];	
		$tempo_serv = $row1["tempo_servico"];
		
		$cod_cliente = $row1["codigo_cliente"];	
		$nome_cliente = $row1["nome_cliente"];	
		$endereco = $row1["endereco"];
    $bairro = $row1["bairro"];
		$cep = $row1["cep"];
		$cidade = $row1["cidade"];	
    $peso = $row1["peso"];	
   
		$volume = $row1["volume"];	
		$valor = $row1["valor"];	
		$codigo_pedido =  $row1["codigo_pedido"];
		$obs_pedido =  $row1["obs_pedido"];	
    
    $uf =  $row1["uf"];	

    $marca =  $row1["marca"];	
    
			
		$conta1 ++;
		
//echo $nome_cliente . " - " . $endereco . " - " . $tempo . " - " . $distancia .  " Km" . " - " . $peso . " - " . $volume . " - " . $valor . "<br>";
$tempo_serv = convertToHoursMins($tempo_serv, '%02d:%02d:00');



$distancia_somatudo += $distancia;
//$tempo_somatudo.
array_push($tempo_somatudo, $tempo);

//echo date('H:i:s', strtotime($tempo, strtotime($tempo_somatudo)));
//echo date('H:i:s', strtotime($tempo, strtotime($tempo_somatudo)));
//echo date('H:i:s', $tempo_somatudo);
//echo $tempo_somatudo;
?>
       <tr>

      <td  style="padding-left: 5px;"><?php echo $cod_cliente . ' - ' . $nome_cliente ?></td>

      <td   style="padding-left: 5px;" ><?php echo $endereco ?></td>
      
      <td   style="padding-left: 5px;" ><?php echo $bairro ?></td>
      <td   style="padding-left: 5px;" ><?php echo $cidade ?></td>
      <td   style="padding-left: 5px;" ><?php echo $uf ?></td>
       <td  style="padding-left: 5px;" ><?php echo $cep ?></td>
  

      <td  style="padding-left: 5px;"><?php echo $codigo_pedido ?></td>

      <td  style="padding-left: 5px;" ><?php echo $obs_pedido ?></td>
      <td  style="padding-left: 5px;"><?php echo $peso ?></td>

		  
		    <td  style="padding-left: 5px;"><?php echo $tempo ?></td>
		    <td   style="padding-left: 5px;" ><?php echo $distancia ?></td>
     
    </tr>

   
<?php
	}


//inicializa a variavel segundos com 0
$segundos = 0;

foreach ( $tempo_somatudo as $tempo_somatudo ){ //percorre o array $tempo
list( $h, $m, $s ) = explode( ':', $tempo_somatudo ); //explode a variavel tempo e coloca as horas em $h, minutos em $m, e os segundos em $s

//transforma todas os valores em segundos e add na variavel segundos 

$segundos += $h * 3600;
$segundos += $m * 60;
$segundos += $s;

}

$horas = floor( $segundos / 3600 ); //converte os segundos em horas e arredonda caso nescessario
$segundos %= 3600; // pega o restante dos segundos subtraidos das horas
$minutos = floor( $segundos / 60 );//converte os segundos em minutos e arredonda caso nescessario
$segundos %= 60;// pega o restante dos segundos subtraidos dos minutos

$samoae_tempinho = $horas . ":" . $minutos . ":" . $segundos;
//echo "{$horas}:{$minutos}:{$segundos}";

//echo $tempo_somatudo[1];
//echo date('H:i:s',strtotime($tempo_somatudo));
	
//DISTANCIA RETORNO	
$diferenca_distancia = $dados['distancia_total'] - $distancia_somatudo;

$HoraEntrada = $dados['tempo_total'];
$HoraSaida = $samoae_tempinho;

//echo $HoraEntrada ."<br>";
//echo $HoraSaida;




$diffHoras = calcHora($HoraEntrada, $HoraSaida);
 


?>

 </tbody>
</table>


<br>
<br>
<br>

      <?php
	

 }
 
	  ?>

      <script language="javascript">


window.print();


</script>


</body>
</html>