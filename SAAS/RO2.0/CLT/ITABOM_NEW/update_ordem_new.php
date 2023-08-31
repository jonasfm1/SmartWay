<?php
include_once "essence/conecta.php";
$distancia = $_POST['distancia'];
$tempo = $_POST['tempo'];
$rota = $_POST['rota'];
$saida = $_POST['vai'];
$entrada = $_POST['volta'];
$clientes = $_POST['cliente'];
$tempo_t = $_POST['tempo_total'];
$distancia_t = $_POST['distancia_total'];
$veiculo = $_POST['id_veiculo'];
$nome_veiculo = $_POST['nome_veiculo'];

$cli =  split("\|", $clientes);
$distancia_split = split("\,", $distancia);
$tempo_split = split("\,", $tempo);
$tamanha_array = count($distancia_split);


for($y=0;$y<$tamanha_array;){
	//echo $iparr[$y];
	
	 $query= "UPDATE rotas SET distancia = '$distancia_split[$y]', tempo= '$tempo_split[$y]' WHERE id='$cli[$y]'";
     $rs= mysql_query($query);
	$y++;
}


$query_veiculos = "UPDATE veiculos SET distancia_total='$distancia_t', tempo_total='$tempo_t', integrado=0 WHERE id = '$veiculo'";
$rs_veiculos = mysql_query($query_veiculos);
		

?>
<SCRIPT language="JavaScript">
	
window.location.href="altera_ordem_g.php?rota=<?php echo $rota?>&veiculo=<?php echo $nome_veiculo?>";
	
//window.history.go(-1);
//	window.location = document.referrer;
//self.location.reload();
				 //  opener.location.reload(altera_ordem_novo2.php?rota=1557347101); 
	//window.opener.location.reload();
</SCRIPT>
