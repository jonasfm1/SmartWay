<?php

include ('essence/conecta.php');
include ('session.php'); 
ini_set('max_execution_time',3000);
?>
<link rel="stylesheet" type="text/css" href="css/style.css">
<script type="text/javascript" src="js/jquery-1.js"></script>
<script type="text/javascript" src="js/functions.js"></script>

<?php
$acao = $_GET['acao'];

$id_yes = $_GET['id'];

switch ($acao) {


//////////////CADASTRA PONTO INICAL FINAL ////////////////////////////////

case 'adiciona_ponto':

$nome = $_POST['nome'];
$lat = $_POST['new_lat_2'];
$lgn = $_POST['new_lgn_2'];
$end = $_POST['new_end_2'];


$query = mysql_query("INSERT INTO pontos(nome, endereco, latitude, longitude) VALUES('$nome', '$end','$lat', '$lgn')");
															
$rs = mysql_query($query);

?>
<SCRIPT LANGUAGE="JavaScript" TYPE="text/javascript"> 

window.location.href="cad_if.php";

</SCRIPT>

<?php

break;
//////////////CADASTRA PONTO INICAL FINAL ////////////////////////////////

//////////////EXCLUI PONTO INICAL FINAL////////////////////////////////

case 'exclui_ponto':

$id = $_GET["id"];
//echo $id_veiculo;
$query_deleta = "DELETE FROM pontos WHERE id = '$id'";
$rs_deleta = mysql_query($query_deleta);

?>
<SCRIPT language="JavaScript">

window.location.href="cad_if.php";

</SCRIPT>

<?php

break;

//////////////EXCLUI PONTO INICAL FINAL////////////////////////////////



case 'esvazia_visita_veiculo':


//echo $id_yes;

$query = "select * from veiculos WHERE id='$id_yes'";															
$rs = mysql_query($query);
while($row = mysql_fetch_array($rs)){
  $query2 = "UPDATE veiculos SET equipe=NULL, peso_total=NULL, volume_total=NULL, valor_total=NULL WHERE id='$id_yes'";
  $rs2= mysql_query($query2);
}

$query3 = "select * from clientes WHERE veiculo='$id_yes'";															
$rs3 = mysql_query($query3);
while($row3 = mysql_fetch_array($rs3)){
	
  $query4 = "UPDATE clientes SET veiculo=NULL WHERE veiculo='$id_yes'";
  $rs4= mysql_query($query4);  
 
}



?>
<SCRIPT LANGUAGE="JavaScript" TYPE="text/javascript"> 

window.location.href="step3.php";

</SCRIPT>

<?php

break;
///////////////////

case 'esvazia_veiculos_step':

$query = "select * from veiculos";															
$rs = mysql_query($query);
while($row = mysql_fetch_array($rs)){
  $query2 = "UPDATE veiculos SET equipe=NULL, peso_total=NULL, volume_total=NULL, valor_total=NULL";
  $rs2= mysql_query($query2);
}

$query3 = "select * from clientes";															
$rs3 = mysql_query($query3);
while($row3 = mysql_fetch_array($rs3)){
	
  $query4 = "UPDATE clientes SET veiculo=NULL";
  $rs4= mysql_query($query4);  
 
}


?>
<SCRIPT LANGUAGE="JavaScript" TYPE="text/javascript"> 

window.location.href="step3.php";

</SCRIPT>

<?php
case 'esvazia_veiculos':

//CONTROLE PASSO
$query_where = "UPDATE passo SET ok='yes' WHERE id='3'";
$rs_where = mysql_query($query_where);

$query_where1 = "UPDATE passo SET ok='no' WHERE (id='4' OR id='5')";
$rs_where1 = mysql_query($query_where1);




$query = "select * from veiculos";															
$rs = mysql_query($query);
while($row = mysql_fetch_array($rs)){
  $query2 = "UPDATE veiculos SET equipe=NULL, peso_total=NULL, volume_total=NULL, valor_total=NULL";
  $rs2= mysql_query($query2);
}

$query3 = "select * from clientes";															
$rs3 = mysql_query($query3);
while($row3 = mysql_fetch_array($rs3)){
	
  $query4 = "UPDATE clientes SET veiculo=NULL";
  $rs4= mysql_query($query4);
  
  $codigo_cliente = $row3["codigo_cliente"];
  $nome = $row3["nome"];
  $endereco = $row3["endereco"];
  $cidade = $row3["cidade"];
  $estado = $row3["estado"];
  $cep = $row3["cep"];
  $endereco_cad= $row3["endereco_cad"];
  $latitude_cad= $row3["latitude_cad"];
  $longitude_cad= $row3["longitude_cad"];  
  $confianca_cad= $row3["confianca_cad"];
  



$search = mysql_query("SELECT * FROM db_geral WHERE codigo_cliente = '$codigo_cliente' AND endereco='$endereco'");
if(@mysql_num_rows($search) > 0){
$sql = mysql_query("UPDATE db_geral SET codigo_cliente='$codigo_cliente', nome='$nome', endereco='$endereco', cidade='$cidade', estado='$estado', endereco_cad='$endereco_cad', latitude_cad='$latitude_cad', longitude_cad='$longitude_cad', confianca_cad='101'  WHERE codigo_cliente = '$codigo_cliente' AND endereco='$endereco'");
}else{
// faz inserção
$sql = mysql_query("INSERT INTO db_geral(codigo_cliente, nome, endereco, cidade, estado, cep, endereco_cad, latitude_cad, longitude_cad, confianca_cad) VALUES('$codigo_cliente', '$nome', '$endereco', '$cidade', '$estado', '$cep', '$endereco_cad', '$latitude_cad', '$longitude_cad', '101')");
}

}


?>
<SCRIPT LANGUAGE="JavaScript" TYPE="text/javascript"> 

window.location.href="step3.php";

</SCRIPT>

<?php

break;
///////////////////


case 'atualiza_coordenada':

$query_where = "UPDATE passo SET ok='yes' WHERE id='2'";
$rs_where = mysql_query($query_where);

$query_where1 = "UPDATE passo SET ok='no' WHERE (id='3' OR id='4' OR id='5')";
$rs_where1 = mysql_query($query_where1);


$reg = $_POST["reg"];
$new_lat = $_POST["new_lat"];
$new_lgn = $_POST["new_lgn"];
$new_end = $_POST["new_end"];
$endereco = $_POST["endereco_x"];
//echo $reg;
//echo $new_end;

$query = "select * from clientes where codigo_cliente='$reg' AND endereco = '$endereco'";															
$rs = mysql_query($query);
while($row = mysql_fetch_array($rs)){
	//$nome = $row["nome"];
	//echo $nome;
  $query2 = "UPDATE clientes SET endereco_cad='$new_end', latitude_cad='$new_lat', longitude_cad='$new_lgn', confianca_cad='101', geo_manual='yes', veiculo=NULL WHERE codigo_cliente = '$reg' AND endereco = '$endereco'";
  $rs2= mysql_query($query2);
}
?>
<SCRIPT LANGUAGE="JavaScript" TYPE="text/javascript"> 
//alert("Endereço atualizado!");

window.parent.document.getElementById('Pagina').style.display = 'none';

window.parent.location.href = window.parent.location.href; 
</SCRIPT>

<?php

break;
///////////////////

case 'atualiza_endereco':
$reg = $_POST["reg"];
$new_lat = $_POST["new_lat_2"];
$new_lgn = $_POST["new_lgn_2"];
$new_end = $_POST["new_end_2"];
$endereco = $_POST["endereco_x"];
//echo $reg;
//echo $new_end;

$query = "select * from clientes WHERE codigo_cliente='$reg' AND endereco='$endereco'";															
$rs = mysql_query($query);
while($row = mysql_fetch_array($rs)){
	//$nome = $row["nome"];
	//echo $nome;
 $query2 = "UPDATE clientes SET endereco_cad='$new_end', latitude_cad='$new_lat', longitude_cad='$new_lgn', confianca_cad='101', geo_manual='yes', veiculo=NULL  WHERE codigo_cliente = '$reg' AND endereco = '$endereco'";



  $rs2= mysql_query($query2);


	
}
?>
<SCRIPT LANGUAGE="JavaScript" TYPE="text/javascript"> 

window.parent.document.getElementById('Pagina').style.display = 'none';

window.parent.location.href = window.parent.location.href; 


</SCRIPT>

<?php

break;


case 'cadastra_veiculo':
$veiculo = $_POST["veiculo"];
$qto = $_POST["qto"];
$peso = $_POST["peso"];
$volume = $_POST["volume"];
$valor = $_POST["valor"];
$cor = $_POST["color1"];
$tipo = $_POST["type"];

if ($cor=="#ff0000"){
	$type_icon = "red1";
	}
if ($cor=="#ff7800"){
	$type_icon = "orange";
	}
if ($cor=="#42ff00"){
	$type_icon = "green1";
	}
if ($cor=="#7200ff"){
	$type_icon = "purple1";
	}
if ($cor=="#00f0ff"){
	$type_icon = "blue1";
	}
if ($cor=="#003cff"){
	$type_icon = "blue2";
	}
if ($cor=="#9c5100"){
	$type_icon = "brown";
	}	
if ($cor=="#00760b"){
	$type_icon = "green2";
	}
if ($cor=="#ffbc00"){
	$type_icon = "yellow";
	}	
if ($cor=="#900000"){
	$type_icon = "red2";
	}	
if ($cor=="#340058"){
	$type_icon = "purple2";
	}	
if ($cor=="#03fe85"){
	$type_icon = "green3";
	}	

//echo $veiculo;
//echo $type_icon;
$conta = 0;

while($conta < $qto){
$conta = $conta + 1;
//echo $cor;
$query2 = "INSERT INTO veiculos(nome, peso, volume, valor, cor, tipo, type_icon) VALUES('$veiculo', '$peso', '$volume', '$valor', '$cor', '$tipo', '$type_icon')";
//$query2 = "UPDATE veiculos SET nome ='$veiculo', peso='$peso', valor='$valor', cor='$cor' , tipo='$tipo'";

$rs = mysql_query($query2);

}
?>
<SCRIPT language="JavaScript">
window.parent.location.href="step3.php";
parent.document.getElementById('Paginaa').style.display = 'none';

</SCRIPT>


<?php

break;

case 'escolhe_veiculo':
$veiculo = $_POST["veiculo"];
$resultado_peso = $_POST["resultado_peso"];

//echo $resultado_peso;

$query = "select * from veiculos where id='$veiculo'";															
$rs = mysql_query($query);

while($row = mysql_fetch_array($rs)){
	$nome = $row["nome"];
	$tipo = $row["tipo"];
	$peso = $row["peso"];
	$volume = $row["volume"];
	$valor = $row["valor"];
	$poligono = $row["poligono"];	
	//echo $poligono;
 	$peso_total = $row["peso_total"];
	$volume_total = $row["volume_total"];
	$valor_total = $row["valor_total"];
	$result_peso = $peso - $peso_total;
	$result_volume = $volume - $volume_total;
	$result_valor = $valor - $valor_total;
	$cor_veiculo = $row["type_icon"];
	
	$porcentagem_peso = ($peso_total/$peso) * 100;
	$porcentagem_volume = ($volume_total/$volume) * 100;
	$porcentagem_valor = ($valor_total/$valor) * 100;

	
}

$query_qtd = "select * from clientes where veiculo='$veiculo'";															
$rs_qtd = mysql_query($query_qtd);

$num_rows = mysql_num_rows($rs_qtd);
?>

<SCRIPT language="JavaScript">window.parent.location.href="step3.php?nome=<?=$nome ?>&peso=<?=$peso ?>&tipo=<?=$tipo ?>&volume=<?=$volume ?>&valor=<?=$valor ?>&id=<?=$veiculo ?>&result_peso=<?=$result_peso ?>&result_volume=<?=$result_volume ?>&result_valor=<?=$result_valor ?>&porc_peso=<?=$porcentagem_peso ?>&porc_volume=<?=$porcentagem_volume ?>&porc_valor=<?=$porcentagem_valor ?>&corveiculo=<?=$cor_veiculo?>&numero=<?=$num_rows?>";	
parent.document.getElementById('Pagina').style.display = 'none';
//document.getElementById('Pag1').style.display = 'none';
//window.parent.location.reload();
</SCRIPT>




<?php

break;

//////////////EXCLUI CLIENTE BD GERAL////////////////////////////////

case 'exclui_cliente':

$id = $_GET["id"];
//echo $id_veiculo;
$query_deleta = "DELETE FROM db_geral WHERE codigo = '$id'";
$rs_deleta = mysql_query($query_deleta);

?>
<SCRIPT language="JavaScript">

window.location.href="cad_bd.php";

</SCRIPT>

<?php

break;

//////////////EXCLUI CLIENTE BD GERAL////////////////////////////////


//////////////EXCLUI VEICULO////////////////////////////////

case 'exclui_veiculo':

$id_veiculo = $_GET["id"];
//echo $id_veiculo;

$query_deleta_rota = "DELETE FROM rotas WHERE veiculo = '$id_veiculo'";
$rs_deleta_rota = mysql_query($query_deleta_rota);

															
	$query6 = "UPDATE clientes SET veiculo=null WHERE veiculo = '$id_veiculo'";
	$rs6 = mysql_query($query6);
	
	
	$query_deleta = "DELETE FROM veiculos WHERE id = '$id_veiculo'";
	$rs_deleta = mysql_query($query_deleta);

?>
<SCRIPT language="JavaScript">

window.location.href="cad_veiculos.php";

</SCRIPT>

<?php

break;

//////////////EXCLUI VEICULO////////////////////////////////


//////////////ATIVA VEICULO////////////////////////////////

case 'ativa_veiculo':

$id_veiculo = $_GET["id"];
//echo $id_veiculo ;
	$query_ativa = "UPDATE veiculos SET ativo='yes' WHERE id = '$id_veiculo'";
	$rs_ativa = mysql_query($query_ativa);

?>
<SCRIPT language="JavaScript">

window.location.href="cad_veiculos.php";

</SCRIPT>


<?php

break;

//////////////ATIVA VEICULO////////////////////////////////

//////////////INATIVO VEICULO////////////////////////////////

case 'inativa_veiculo':

$id_veiculo = $_GET["id"];
//echo $id_veiculo ;




$query_deleta_rota = "DELETE FROM rotas WHERE veiculo = '$id_veiculo'";
$rs_deleta_rota = mysql_query($query_deleta_rota);
	

	$query6 = "UPDATE clientes SET veiculo=null WHERE veiculo = '$id_veiculo'";
	$rs6 = mysql_query($query6);
	
	
	$query_ativa = "UPDATE veiculos SET equipe=null, peso_total=null, volume_total=null, valor_total=null, ativo=null, distancia_total=0, tempo_total=null WHERE id = '$id_veiculo'";
	$rs_ativa = mysql_query($query_ativa);

?>
<SCRIPT language="JavaScript">

window.location.href="cad_veiculos.php";

</SCRIPT>


<?php

break;

//////////////ATIVA VEICULO////////////////////////////////


//////////////CADASTRA VEICULO PAGINA CADASTRO////////////////////////////////

case 'cadastra_veiculo_cad':
$veiculo = $_POST["veiculo"];
$qto = $_POST["qto"];
$peso = $_POST["peso"];
$volume = $_POST["volume"];
$valor = $_POST["valor"];
$cor = $_POST["color1"];
$tipo = $_POST["type"];
$ativo =  $_POST["ativo"];

echo $ativo;

if ($cor=="#ff0000"){
	$type_icon = "red1";
	}
if ($cor=="#ff7800"){
	$type_icon = "orange";
	}
if ($cor=="#42ff00"){
	$type_icon = "green1";
	}
if ($cor=="#7200ff"){
	$type_icon = "purple1";
	}
if ($cor=="#00f0ff"){
	$type_icon = "blue1";
	}
if ($cor=="#003cff"){
	$type_icon = "blue2";
	}
if ($cor=="#9c5100"){
	$type_icon = "brown";
	}	
if ($cor=="#00760b"){
	$type_icon = "green2";
	}
if ($cor=="#ffbc00"){
	$type_icon = "yellow";
	}	
if ($cor=="#900000"){
	$type_icon = "red2";
	}	
if ($cor=="#340058"){
	$type_icon = "purple2";
	}	
if ($cor=="#03fe85"){
	$type_icon = "green3";
	}	

//echo $veiculo;
//echo $type_icon;
$conta = 0;

while($conta < $qto){
$conta = $conta + 1;
//echo $cor;
if($ativo==on){
	$query2 = "INSERT INTO veiculos(nome, peso, volume, valor, cor, tipo, type_icon, ativo) VALUES('$veiculo', '$peso', '$volume', '$valor', '$cor', '$tipo', '$type_icon', 'yes')";

} else {
$query2 = "INSERT INTO veiculos(nome, peso, volume, valor, cor, tipo, type_icon) VALUES('$veiculo', '$peso', '$volume', '$valor', '$cor', '$tipo', '$type_icon')";	
}


$rs = mysql_query($query2);

}
?>

<SCRIPT language="JavaScript">

window.location.href="cad_veiculos.php";

</SCRIPT>

<?php

break;
//////////////CADASTRA VEICULO PAGINA CADASTRO////////////////////////////////

//////////////ALTERAR VEICULO PAGINA CADASTRO////////////////////////////////

case 'alterar_veiculo_cad':
$veiculo = $_POST["veiculo"];
$qto = $_POST["qto"];
$peso = $_POST["peso"];
$volume = $_POST["volume"];
$valor = $_POST["valor"];
$cor = $_POST["color1"];
$tipo = $_POST["type"];
$ativo =  $_POST["ativo"];

$id_quem = $_POST["id_veiculo"];


//echo $veiculo;
//echo $type_icon;
//$conta = 0;

if($ativo==on){
$query2 = "UPDATE veiculos SET nome='$veiculo', peso='$peso', volume='$volume', valor='$valor', tipo='$tipo', ativo='yes' where id='$id_quem'";
} else {
	
$query2 = "UPDATE veiculos SET nome='$veiculo', peso='$peso', volume='$volume', valor='$valor', tipo='$tipo', ativo=null where id='$id_quem'";
}


$rs = mysql_query($query2);

?>
<SCRIPT language="JavaScript">

window.location.href="cad_veiculos.php";

</SCRIPT>
<?php

break;
//////////////ALTERAR VEICULO PAGINA CADASTRO////////////////////////////////

//////////////ESCOLHE VEICULO////////////////////////////////
case 'escolhe_veiculo':
$veiculo = $_POST["veiculo"];
$resultado_peso = $_POST["resultado_peso"];

//echo $resultado_peso;

$query = "select * from veiculos where id='$veiculo'";															
$rs = mysql_query($query);

while($row = mysql_fetch_array($rs)){
	$nome = $row["nome"];
	$tipo = $row["tipo"];
	$peso = $row["peso"];
	$volume = $row["volume"];
	$valor = $row["valor"];
	$poligono = $row["poligono"];	
	//echo $poligono;
 	$peso_total = $row["peso_total"];
	$volume_total = $row["volume_total"];
	$valor_total = $row["valor_total"];
	$result_peso = $peso - $peso_total;
	$result_volume = $volume - $volume_total;
	$result_valor = $valor - $valor_total;
	$cor_veiculo = $row["type_icon"];
	
	$porcentagem_peso = ($peso_total/$peso) * 100;
	$porcentagem_volume = ($volume_total/$volume) * 100;
	$porcentagem_valor = ($valor_total/$valor) * 100;

	
}

$query_qtd = "select * from clientes where veiculo='$veiculo'";															
$rs_qtd = mysql_query($query_qtd);

$num_rows = mysql_num_rows($rs_qtd);
?>

<SCRIPT language="JavaScript">window.parent.location.href="step3.php?nome=<?=$nome ?>&peso=<?=$peso ?>&tipo=<?=$tipo ?>&volume=<?=$volume ?>&valor=<?=$valor ?>&id=<?=$veiculo ?>&result_peso=<?=$result_peso ?>&result_volume=<?=$result_volume ?>&result_valor=<?=$result_valor ?>&porc_peso=<?=$porcentagem_peso ?>&porc_volume=<?=$porcentagem_volume ?>&porc_valor=<?=$porcentagem_valor ?>&corveiculo=<?=$cor_veiculo?>&numero=<?=$num_rows?>";	
parent.document.getElementById('Pagina').style.display = 'none';
//document.getElementById('Pag1').style.display = 'none';
//window.parent.location.reload();
</SCRIPT>




<?php

break;

//////////////ESCOLHE VEICULO////////////////////////////////


//////////////CADSTRA EQUIPE DO VEICULO////////////////////////////////

case 'cadastra_equipe_veiculo':


//CONTROLE PASSO

$query_where = "UPDATE passo SET ok='yes' WHERE id='3'";
$rs_where = mysql_query($query_where);

$query_where1 = "UPDATE passo SET ok='no' WHERE (id='4' OR id='5')";
$rs_where1 = mysql_query($query_where1);



$cor_veiculo = $_POST["type_icon"];
$tipo = $_POST["tipo"];


$id = $_POST["id_veiculo"];
$peso = $_POST["peso"];
$volume = $_POST["volume"];
$valor = $_POST["valor"];

$peso2 = $_POST["peso2"];
$volume2 = $_POST["volume2"];
$valor2 = $_POST["valor2"];

//$valor_poligono = $_POST["valor_poligono"];
$equipe_poligono = $_POST["equipe_poligono"];
$veiculo_tira = $_POST["veiculo_tira"];
$veiculo_tira_peso = $_POST["peso_veiculo_tira"];
$veiculo_tira_volume = $_POST["volume_veiculo_tira"];
$veiculo_tira_valor = $_POST["valor_veiculo_tira"];

$endereco_cliente = $_POST["endereco_cliente"];
//echo $endereco_cliente;

$iparr = split ("\,", $equipe_poligono);
$tamanha_array = count($iparr);

$iparr1 = split ("\,", $veiculo_tira);
$tamanha_array1 = count($iparr1);		


$iparr2 = split ("\,", $veiculo_tira_peso);


$iparr3 = split ("\,", $veiculo_tira_volume);


$iparr4 = split ("\,", $veiculo_tira_valor);

$iparr5 = split ("\,", $endereco_cliente);


$conta_peso_paratirar = 0;
$conta_volume_paratirar = 0;
$conta_valor_paratirar = 0;

for($y=0;$y<$tamanha_array1;$y++){


$query_busca = "select * from veiculos where id='$iparr1[$y]'";															
$rs_busca = mysql_query($query_busca);

while($row_busca = mysql_fetch_array($rs_busca)){
$peso_total_busca = $row_busca["peso_total"];
$volume_total_busca = $row_busca["volume_total"];
$valor_total_busca = $row_busca["valor_total"];
}

$conta_peso_paratirar = $peso_total_busca - $iparr2[$y];
$conta_volume_paratirar = $volume_total_busca - $iparr3[$y];
$conta_valor_paratirar = $valor_total_busca - $iparr4[$y];

if ($conta_peso_paratirar == 0.00 and $conta_volume_paratirar == 0.00 and $conta_valor_paratirar == 0.00){
		$query6 = "UPDATE veiculos SET peso_total='$conta_peso_paratirar', volume_total='$conta_volume_paratirar', valor_total='$conta_valor_paratirar', equipe=null WHERE id = '$iparr1[$y]'";
	//$rs6 = mysql_query($query6);

	$rs6 = mysql_query($query6);
	}
	$query6 = "UPDATE veiculos SET peso_total='$conta_peso_paratirar', volume_total='$conta_volume_paratirar', valor_total='$conta_valor_paratirar' WHERE id = '$iparr1[$y]'";
	
$rs6 = mysql_query($query6);
}


/* update cliente */
for($a=0;$a<$tamanha_array;$a++){
	//echo $iparr[$a];
	$query3 = "UPDATE clientes SET veiculo='$id' WHERE codigo_cliente = '$iparr[$a]' AND codigo='$iparr5[$a]'";
	$rs3 = mysql_query($query3);
	
	
	
	//$row1 = mysql_fetch_array($rs3);	
	//$nome_veiculo = $row1['nome'];
}


$query = "select * from veiculos where id='$id'";															
$rs = mysql_query($query);
while($row = mysql_fetch_array($rs)){
	$nome = $row["nome"];
	//echo $nome;

	
	

  $query2 = "UPDATE veiculos SET equipe='yes', poligono='$valor_poligono', peso_total='$peso', volume_total='$volume', valor_total='$valor' WHERE id = '$id'";
	
  $rs2= mysql_query($query2);


	
}

$query_qtd = "select * from clientes where veiculo='$id'";															
$rs_qtd = mysql_query($query_qtd);

$num_rows = mysql_num_rows($rs_qtd);

//echo $num_rows;
//while($row_qtd = mysql_fetch_array($rs_qtd)){
//$numero_clientes = $row_qtd["peso_total"];
//$volume_total_busca = $row_busca["volume_total"];
//$valor_total_busca = $row_busca["valor_total"];
//}



	$result_peso = $peso2 - $peso;
	$result_volume = $volume2 - $volume;
	$result_valor = $valor2 - $valor;
	//$cor_veiculo = $row["type_icon"];
	
	$porcentagem_peso = ($peso/$peso2) * 100;
	$porcentagem_volume = ($volume/$volume2) * 100;
	$porcentagem_valor = ($valor/$valor2) * 100;

	

?>

<SCRIPT language="JavaScript">
//alert("Visitas cadastrada com sucesso!");

window.location.href="step3.php?nome=<?=$nome ?>&peso=<?=$peso2 ?>&tipo=<?=$tipo ?>&volume=<?=$volume2 ?>&valor=<?=$valor2 ?>&id=<?=$id ?>&result_peso=<?=$result_peso ?>&result_volume=<?=$result_volume ?>&result_valor=<?=$result_valor ?>&porc_peso=<?=$porcentagem_peso ?>&porc_volume=<?=$porcentagem_volume ?>&porc_valor=<?=$porcentagem_valor ?>&corveiculo=<?=$cor_veiculo?>&numero=<?=$num_rows?>";

</SCRIPT>
<?php

break;
//////////////CADSTRA EQUIPE DO VEICULO////////////////////////////////


//////////////CADASTRA ROTA ////////////////////////////////
case 'cadastra_rotas':

$query_where = "UPDATE passo SET ok='yes' WHERE id='5'";
$rs_where = mysql_query($query_where);


$id_cliente= $_POST["xxx"];
$ordem = $_POST["yyy"];
$id_veiculo= $_POST["zzz"];
$distancia= $_POST["qqq"];
$tempo= $_POST["kkk"];
$qual_rota= $_POST["www"];
$qual_pedido= $_POST["eee"];

///////////////////////////////////
$distancia_total = $_POST["ultimao"];
$veiculo_total = $_POST["ultimao_2"];
$tempo_total = $_POST["ultimao_3"];
///////////////////////////////////

$i_distancia_total = split ("\,", $distancia_total);
$i_veiculo_total = split ("\,", $veiculo_total);
$i_tempo_total = split ("\,", $tempo_total);

$tamanha_xxx = count($i_veiculo_total);

for($w=0;$w<$tamanha_xxx;$w++){

$query_veiculos = "UPDATE veiculos SET distancia_total='$i_distancia_total[$w]', tempo_total='$i_tempo_total[$w]' WHERE id = '$i_veiculo_total[$w]'";
$rs_veiculos = mysql_query($query_veiculos);
		
	
}


$i_id_cliente = split ("\,", $id_cliente);
$i_ordem = split ("\,", $ordem);
$i_id_veiculo= split ("\,", $id_veiculo);
$i_distancia= split ("\,", $distancia);
//echo $i_distancia;
$i_tempo= split ("\,", $tempo);

$i_rota= split ("\,", $qual_rota);

$i_codpedido= split ("\,", $qual_pedido);


$tamanha_array = count($i_id_cliente);

echo $tamanha_array;


for($y=0;$y<$tamanha_array;$y++){
	
	
	//$kms = $i_distancia;
	
	
	
	$query3 = "UPDATE rotas SET veiculo='$i_id_veiculo[$y]', nome_rota='$i_rota[$y]', ordem='$i_ordem[$y]', distancia='$i_distancia[$y]', tempo='$i_tempo[$y]' WHERE codigo_pedido='$i_codpedido[$y]' AND codigo_cliente = '$i_id_cliente[$y]'";
	$rs3 = mysql_query($query3);
}

?>

<SCRIPT language="JavaScript">
//alert("Visitas cadastrada com sucesso!");

window.location.href="step5.php";

</SCRIPT>
<?php


break;
////////////// CADASTRA ROTA ////////////////////////////////


////////////// EXPORTA ROTA ////////////////////////////////
case 'export_csv':


$table = "rotas"; // Enter Your Table Name 
$sql = mysql_query("select * from $table ORDER BY nome_rota, ordem ASC");
//$columns_total = mysql_num_fields($sql);

$arquivo_text = '';
while ($datas = mysql_fetch_array($sql)) {
	
$iddoveiculo = $datas[veiculo];
$query1 = "select * from veiculos WHERE id='$iddoveiculo'";		
$rs1 = mysql_query($query1);
$row1 = mysql_fetch_array($rs1);	
$nome_veiculo = $row1['nome'];

$rota_concatena = "Rota " . $datas['nome_rota'];

$arquivo_text .= "$rota_concatena;$datas[ordem];$nome_veiculo;$datas[codigo_cliente];$datas[nome_cliente];$datas[endereco];$datas[codigo_pedido];$datas[obs_pedido];$datas[tempo];$datas[distancia];$datas[peso];$datas[volume];$datas[valor];
";
}

$data="ROTAS_" . date("d-m-Y_H_i_s");

$exte = $data . '.csv';
$juntae = 'uploads/' . $exte;
$abbre = fopen($juntae, 'w+');
fwrite($abbre, utf8_decode($arquivo_text));

fclose($abbre);

//$filename = 'Test.pdf'; // of course find the exact filename....        
header('Pragma: public');
header('Expires: 0');
header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
header('Cache-Control: private', false); // required for certain browsers 
header('Content-Type: application/csv');
header("Content-Type: application/download");
header('Content-Disposition: attachment; filename="'. basename($juntae) . '";');
header('Content-Transfer-Encoding: binary');
header('Content-Length: ' . filesize($juntae));

readfile($juntae);




break;

}
//////////////EXPORTA ROTA ////////////////////////////////
?>
