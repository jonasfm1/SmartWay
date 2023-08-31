<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>::. ROTAS ONLINE .:: CADD</title>
<link rel="stylesheet" type="text/css" href="css/menu_nv.css">
<link rel="stylesheet" type="text/css" href="css/step4_1.css">
<link rel="shortcut icon" href="imgs/favicon.ico" >
 <link rel="icon" type="image/gif" href="imgs/animated_favicon1.gif" >

<script language="javascript" type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.5.0/jquery.min.js"></script>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.9/jquery-ui.min.js"></script>
	
<?php 
include ('session.php'); 
include ('essence/conecta.php');
ini_set('max_execution_time',12000);
	
	
$dbname_cliente="ro_".$logado; // Indique o nome do banco de dados que será aberto
if(!($con=mysql_select_db($dbname_cliente,$id))) {
echo "</br>Não foi possível estabelecer uma conexão com o gerenciador MySQL.</br>";
echo "Favor contactar o Administrador no telefone (11) 5505 6542.</br></br>";
echo "PRODUTO REGISTRADO CADDESIGN";
exit;
}



	
?>

<script src="https://maps.googleapis.com/maps/api/js?key=<?php echo $chave; ?>&sensor=false&language=pt-BR&libraries=drawing&v=3.22"></script>

<script type='text/javascript' src="control/timer.js"></script>


<script src="js/flutuante.js"></script>
<script src="js/logger.js"></script>
<script LANGUAGE="JavaScript">

	function alerta(){
		
		document.salvala.action = "scripts.php?acao=cadastra_rotas";
	}
	   


function acao2(rota, veiculo) {

document.getElementById("Paginax").style.display = "block";

var teste = "altera_ordem.php?rota="+ rota + "&veiculo=" + veiculo;

document.getElementById("pag2x").src = teste; 

topFunction();

}



(function($) {
$.fn.waiting = function(options) {
options = $.extend({modo: 'normal'}, options);
this.fadeOut(options.modo);
return this;
};
})(jQuery);;

	
$(document).ready(function(){
$(".jquery-waiting-base-container").waiting({modo:"slow"});
});

function goBack() {
    window.history.back()
}



</SCRIPT>



    <?php
	/////////////////////////////////////////////////////////////
	$inicio = $_GET["inicio"];
	$final = $_GET["final"];



	$query_somalgn = mysql_query("select * from clientes");
	
	while($row_ok = mysql_fetch_array($query_somalgn)){
		
		$cod = $row_ok["codigo"];
		$lgn = $row_ok["longitude_cad"];
		$lat = $row_ok["latitude_cad"];
		
		$query_achou= mysql_query("select * from clientes where latitude_cad='$lat' AND longitude_cad='$lgn'");
		
		while($row_ok1 = mysql_fetch_array($query_achou)){
		
			$cod_muda = $row_ok1["codigo"];
			$lgn_muda= substr($lgn, 0, 16) . $cod . $cod_muda;

		//	$lgn_muda = $row_ok1["longitude_cad"] . $cod_muda;
			
			
			$query_where10 = mysql_query("UPDATE clientes SET longitude_cad=$lgn_muda  where codigo=$cod");
			
		}
		
		
	}
	
	
	///controle painel
	$query_where1 = "UPDATE passo SET ok='no' WHERE id='5'";
	$rs_where1 = mysql_query($query_where1);
	
	
	
	$conta1= 0;
	/////////////////////////////////////////////////////////////	
	$query_veiculos = "select * from veiculos";
   	$rs1_veiculos = mysql_query($query_veiculos);
		
		while($row_veiculos = mysql_fetch_array($rs1_veiculos)){
			$id_veiculo[$conta1] = $row_veiculos["id"];			
			$nome_veiculo[$conta1] = $row_veiculos["nome"];
			$tipo[$conta1] = $row_veiculos["tipo"];		
			$icone[$conta1] = $row_veiculos["type_icon"];
			
			if($icone[$conta1] == "red1"){
			$cor[$conta1] = "#900000";				
			}
			if($icone[$conta1] == "red2"){
			$cor[$conta1] = "#e20016";				
			}
			if($icone[$conta1] == "blue1"){
			$cor[$conta1] = "#00f0ff";				
			}							
			if($icone[$conta1] == "blue2"){
			$cor[$conta1] = "#003cff";				
			}	
			if($icone[$conta1] == "green1"){
			$cor[$conta1] = "#42ff00";				
			}	
			if($icone[$conta1] == "green2"){
			$cor[$conta1] = "#00760b";				
			}
			if($icone[$conta1] == "green3"){
			$cor[$conta1] = "#03f385";				
			}
			if($icone[$conta1] == "purple1"){
			$cor[$conta1] = "#7200ff";				
			}
			if($icone[$conta1] == "purple2"){
			$cor[$conta1] = "#340058";				
			}
			if($icone[$conta1] == "orange"){
			$cor[$conta1] = "#ff7800";				
			}
			if($icone[$conta1] == "brown"){
			$cor[$conta1] = "#9c5100";				
			} 
			if($icone[$conta1] == "yellow"){
			$cor[$conta1] = "#ffbc00";				
			} 
    
			$concatena_carro[$conta1] = "imgs/" . $tipo[$conta1] . "_" . $icone[$conta1] . ".png";

			$reordenar[$conta1] =  $row_veiculos["reordenado"];

			
			//echo ($concatena_carro[$conta1]);
			$conta1++; 
		
		}
		?>
        
		<script type="text/javascript">
		id_veiculo = <?php echo json_encode($id_veiculo) ?>;	
		
		nome_veiculo = <?php echo json_encode($nome_veiculo) ?>;

		concatena_carro = <?php echo json_encode($concatena_carro) ?>;
			
		color_carro = <?php echo json_encode($cor) ?>;	

		reordenar = <?php echo json_encode($reordenar) ?>;	


		
		</script>

	<?php



	
	$conta_fora_new = 0;
	$conta_fora1_new = 0;
	
	$deleterecords = "TRUNCATE TABLE rotas"; //Esvaziar a tabela
	mysql_query($deleterecords);
	

	$conta = 0;
	$conta1_new = 0;
	
	if(!empty($_GET['check_list1'])){
		foreach($_GET['check_list1'] as $report_id){
		   // echo $report_id;
		   $arr1[$conta] = $report_id;	
		   
		   //seleciona todos valores
		   $query1 = "select * from clientes where veiculo=$arr1[$conta] and ativo=0 order by veiculo";
		   $rs1 = mysql_query($query1);
		   
		   
	   
			   
		   //$conta_id = 0;
		   while($row = mysql_fetch_array($rs1)){
			   
			   $codigo_cliente[$conta1_new] = $row["codigo_cliente"];
			   $nome_cliente[$conta1_new] = $row["nome"];		
			   $veiculo_cliente[$conta1_new] = $row["veiculo"];		   
			   $query_tipo = "select * from veiculos where id=$veiculo_cliente[$conta1_new]";
			   $query_tipo = mysql_query($query_tipo);	  
			   // Tirando o while
			   $dados = mysql_fetch_array($query_tipo);
			   // Exibição
			   $tipo= $dados['tipo'];
			   $nome_veiculo = $dados['nome'];
			   $lat_cliente[$conta1_new] = $row["latitude_cad"];
			   $lgn_cliente[$conta1_new] = $row["longitude_cad"];
			   $endereco_cliente[$conta1_new] = $row["endereco"];
			   $bairro_cliente[$conta1_new] = $row["bairro"];	   
			   $cep_cliente[$conta1_new] = $row["cep"];		   
			   $cidade_cliente_fora[$conta1_new] = $row["cidade"];		   
			   $codigo_pedido[$conta1_new] = $row["codigo_pedido"];
			   $obs_pedido[$conta1_new] = $row["obs_pedido"];			   
			   $temposervico_cliente[$conta1_new] = $row["tempo_servico"];			   
			   $peso_cliente[$conta1_new] = $row["peso"];
			   $volume_cliente[$conta1_new] = $row["volume"];
			   $valor_cliente[$conta1_new] = $row["valor"];			   
			   $setor_cliente[$conta1_new] = $row["setor"]; 
			   $loja[$conta1_new] = $row["loja"];
			   $data_entrega[$conta1_new] = $row["data_entrega"];
			   $cod_vendedor[$conta1_new] = $row["cod_vendedor"];
			   $vendedor[$conta1_new] = $row["vendedor"];
			   $cod_produto[$conta1_new] = $row["cod_produto"];
			   $produto[$conta1_new] = $row["produto"];
			   $uf[$conta1_new] = $row["estado"];   
			   $cod_cancao[$conta1_new] = $row["cod_cancao"];
			   $tipo_rota[$conta1_new] = $row["tipo_rota"]; 
			   //echo $veiculo_cliente[$conta1];
			   $query3 = "INSERT INTO rotas(codigo_cliente, nome_cliente, lat, lgn, veiculo, nome_veiculo, tipo_veiculo, endereco, bairro, cep, cidade, codigo_pedido, obs_pedido, tempo_servico, peso, volume, valor, setor, loja, data_entrega, cod_vendedor, vendedor, cod_produto, produto, uf, cod_cancao, tipo_rota) VALUES('$codigo_cliente[$conta1_new]', '$nome_cliente[$conta1_new]', '$lat_cliente[$conta1_new]', '$lgn_cliente[$conta1_new]', '$veiculo_cliente[$conta1_new]', '$nome_veiculo', '$tipo', '$endereco_cliente[$conta1_new]', '$bairro_cliente[$conta1_new]', '$cep_cliente[$conta1_new]', '$cidade_cliente_fora[$conta1_new]', '$codigo_pedido[$conta1_new]', '$obs_pedido[$conta1_new]', '$temposervico_cliente[$conta1_new]', '$peso_cliente[$conta1_new]', '$volume_cliente[$conta1_new]', '$valor_cliente[$conta1_new]', '$setor_cliente[$conta1_new]', '$loja[$conta1_new]', '$data_entrega[$conta1_new]', '$cod_vendedor[$conta1_new]', '$vendedor[$conta1_new]', '$cod_produto[$conta1_new]', '$produto[$conta1_new]', '$uf[$conta1_new]', '$cod_cancao[$conta1_new]', '$tipo_rota[$conta1_new]')";
			   
				  $rs3 = mysql_query($query3);
			   
			   $conta1_new++; 
			   
		   }
   
			   
		   $conta++;	
		}
		
   
	  }
	
	  $conta = 0;
	  $conta1_new = 0;

if(!empty($_GET['check_list'])){
     foreach($_GET['check_list'] as $report_id){
		// echo $report_id;
		$arr[$conta] = $report_id;	
		//seleciona todos valores
		$query1 = "select * from clientes where veiculo=$arr[$conta] and ativo=0 order by veiculo";
   	    $rs1 = mysql_query($query1);
		while($row = mysql_fetch_array($rs1)){			
			$codigo_cliente[$conta1_new] = $row["codigo_cliente"];
			$nome_cliente[$conta1_new] = $row["nome"];		
			$veiculo_cliente[$conta1_new] = $row["veiculo"];	
			$query_tipo = "select * from veiculos where id=$veiculo_cliente[$conta1_new]";
			$query_tipo = mysql_query($query_tipo);	
			// Tirando o while
			$dados = mysql_fetch_array($query_tipo);
			// Exibição
			$tipo= $dados['tipo'];
			$nome_veiculo = $dados['nome'];
			$lat_cliente[$conta1_new] = $row["latitude_cad"];
			$lgn_cliente[$conta1_new] = $row["longitude_cad"];
			$endereco_cliente[$conta1_new] = $row["endereco"];
			$bairro_cliente[$conta1_new] = $row["bairro"];	
			$cep_cliente[$conta1_new] = $row["cep"];		
			$cidade_cliente_fora[$conta1_new] = $row["cidade"];			
			$codigo_pedido[$conta1_new] = $row["codigo_pedido"];
			$obs_pedido[$conta1_new] = $row["obs_pedido"];			
			$temposervico_cliente[$conta1_new] = $row["tempo_servico"];			
			$peso_cliente[$conta1_new] = $row["peso"];
			$volume_cliente[$conta1_new] = $row["volume"];
			$valor_cliente[$conta1_new] = $row["valor"];			
			$setor_cliente[$conta1_new] = $row["setor"];
			$loja[$conta1_new] = $row["loja"];
			$data_entrega[$conta1_new] = $row["data_entrega"];
			$cod_vendedor[$conta1_new] = $row["cod_vendedor"];
			$vendedor[$conta1_new] = $row["vendedor"];
			$cod_produto[$conta1_new] = $row["cod_produto"];
			$produto[$conta1_new] = $row["produto"];
			$uf[$conta1_new] = $row["estado"];
			$cod_cancao[$conta1_new] = $row["cod_cancao"];
			$tipo_rota[$conta1_new] = $row["tipo_rota"];
			$query3 = "INSERT INTO rotas(codigo_cliente, nome_cliente, lat, lgn, veiculo, nome_veiculo, tipo_veiculo, endereco, bairro, cep, cidade, codigo_pedido, obs_pedido, tempo_servico, peso, volume, valor, setor, loja, data_entrega, cod_vendedor, vendedor, cod_produto, produto, uf, cod_cancao, tipo_rota) VALUES('$codigo_cliente[$conta1_new]', '$nome_cliente[$conta1_new]', '$lat_cliente[$conta1_new]', '$lgn_cliente[$conta1_new]', '$veiculo_cliente[$conta1_new]', '$nome_veiculo', '$tipo', '$endereco_cliente[$conta1_new]', '$bairro_cliente[$conta1_new]', '$cep_cliente[$conta1_new]', '$cidade_cliente_fora[$conta1_new]', '$codigo_pedido[$conta1_new]', '$obs_pedido[$conta1_new]', '$temposervico_cliente[$conta1_new]', '$peso_cliente[$conta1_new]', '$volume_cliente[$conta1_new]', '$valor_cliente[$conta1_new]', '$setor_cliente[$conta1_new]', '$loja[$conta1_new]', '$data_entrega[$conta1_new]', '$cod_vendedor[$conta1_new]', '$vendedor[$conta1_new]', '$cod_produto[$conta1_new]', '$produto[$conta1_new]', '$uf[$conta1_new]', '$cod_cancao[$conta1_new]', '$tipo_rota[$conta1_new]')";			
   	    	$rs3 = mysql_query($query3);			
			$conta1_new++; 		
		}			
		$conta++;	
     }
	 

   }


if(!empty($_GET['check_list'])){

	foreach($_GET['check_list1'] as $report_id1){
		$arr1[$i] = $report_id1;
		$guarda_linha_check1.= "&check_list1[]=".  $arr1[$i];
		$i++;
	}

} else {
	foreach($_GET['check_list1'] as $report_id){
		$arr[$i] = $report_id;
		$guarda_linha_check.= "&check_list1[]=".  $arr[$i];
		$i++;
	}
		

//echo $guarda_linha_check;

	$transp_query = "select * from rotas where tipo_rota='g'";  
	$rs_transp = mysql_query($transp_query);
	$num_rows1 = mysql_num_rows($rs_transp);
	//echo $num_rows1;



	if($num_rows1==0){
		?>
		<meta http-equiv="refresh" content="0; URL='step4_1_c.php?imgsel=<?php echo $qual_rota ?>&inicio=<?php echo $inicio ?>&final=<?php echo $final ?><?php echo $guarda_linha_check . $guarda_linha_check1; ?>'"/>
	<?php
	}
}


?>

 

</head>
<div class="jquery-waiting-base-container"></div>
<body >


<form name="roteiriza" action="step4_1.php" method="post">
  <div id="apDiv13b">
   <?php

  	$contala = count($arr);

 for($i=0;$i<count($arr);$i++){
	
	$query_new = "select * from rotas where veiculo=$arr[$i]";
	$rs_new = mysql_query($query_new);
	$rs_new1 = mysql_query($query_new);
	$rs_new2 = mysql_query($query_new);
	$rs_new3 = mysql_query($query_new);	
	$rs_new6 = mysql_query($query_new);	
	$rs_new7 = mysql_query($query_new);
	$rs_new8 = mysql_query($query_new);		
	$rs_new9 = mysql_query($query_new);		

	$codigo_cliente1 ="";
	$nome_cliente1 ="";
	$lat_cliente1 ="";
	$lgn_cliente1 ="";
	$contatena_valores ="";
	$veiculo_cliente1="";
	$codigo_pedido1="";
	$obs_pedido1="";
	$id_visita1="";

	$conta2 = 0;
	$conta3 = 0;	
	$conta4 = 0;
	$conta6 = 0;	
	$conta7 = 0;	
	$conta8 = 0;
	$conta9 = 0;
 ?>
 
<div id="waypoints<?php echo $i; ?>" class="div_transparente">
   <?php
	while($row2 = mysql_fetch_array($rs_new)){
		    
			$lat_cliente1[$conta2] = $row2["lat"];
			$lgn_cliente1[$conta2] = $row2["lgn"];
			$contatena_valores[$conta2] =  '"' . $row2["lat"] . ", " . $row2["lgn"] . '"';	 
			$contatena_valores[$conta2] = $contatena_valores[$conta2] . ", ";
			//echo '"' . $inicio . '", ';
			echo ($contatena_valores[$conta2]);
			$conta2++;	 	
	}
			
	?>
</div>  
<div id="veiculo<?php echo $i; ?>" class="div_result">
<?php
while($row3 = mysql_fetch_array($rs_new1)){ 	
			$codigo_cliente1[$conta3] = $row3["id"];
		//	$nome_cliente1[$conta3] = $row3["nome_cliente"];	
		//	$veiculo_cliente1[$conta3] = $row3["veiculo"];
			echo '"' . $codigo_cliente1[$conta3] . '", ';  		
			$conta3++;
	
}
?>
 </div>
 
 <div id="carro<?php echo $i; ?>" class="div_result">
<?php
while($row4 = mysql_fetch_array($rs_new2)){ 		
			$veiculo_cliente1[$conta4] = $row4["veiculo"];
			echo '"' . $veiculo_cliente1[$conta4] . '", ';  		
			$conta4++;
	
}
//$novo = var_dump($veiculo_cliente1[$conta4]);
//echo $novo;  	
?>
 </div>
<div id="nome_cliente<?php echo $i; ?>" class="div_result">
<?php
while($row5 = mysql_fetch_array($rs_new3)){ 	
			$nome_cliente1[$conta5] = $row5["nome_cliente"];
			echo '"' . $nome_cliente1[$conta5] . '", ';  		
			$conta5++;
	
}
?>
 </div>
 <div id="endereco_cliente<?php echo $i; ?>" class="div_result">
<?php
while($row6 = mysql_fetch_array($rs_new6)){ 	
			$endereco_cliente[$conta6] = $row6["endereco"];
			echo '"' . $endereco_cliente[$conta6] . '", ';  		
			$conta6++;
	
}
?>
 </div>
 <div id="codigo_pedido<?php echo $i; ?>" class="div_result">
<?php
while($row7 = mysql_fetch_array($rs_new7)){ 	
			$codigo_pedido1[$conta7] = $row7["codigo_pedido"];
			echo '"' . $codigo_pedido1[$conta7] . '", ';  		
			$conta7++;
}
?>
 </div>
 <div id="obs_pedido<?php echo $i; ?>" class="div_result">
<?php
while($row8 = mysql_fetch_array($rs_new8)){ 	
			$obs_pedido1[$conta8] = $row8["obs_pedido"];
			echo '"' . $obs_pedido1[$conta8] . '", ';  		
			$conta8++;
}
?>
 </div>
 <div id="id_visita<?php echo $i; ?>" class="div_result">
<?php
while($row9 = mysql_fetch_array($rs_new9)){ 	
			$id_visita1[$conta9] = $row9["id"];
			echo '"' . $id_visita1[$conta9] . '", ';  		
			$conta9++;
}
?>
 </div>
<?php

}


?>

<script type="text/javascript">
	veiculo_numero_js = <?php echo json_encode($contala) ?>;
</script>
<input type="hidden" id="txtEnderecoPartida" name="txtEnderecoPartida" value="<?php echo $inicio ?>" />                   
<input type="hidden" id="txtEnderecoChegada" name="txtEnderecoChegada" value="<?php echo $final ?>"  /> 
</div>
</form>


<div id="apDiv11">

<div id="load" >
<div id="box" class="box"></div>
</div>



  <div id="apDiv14c_hidden">
 
    <div id="map-canvas"></div>
   
    </div>
    
</div>




</div>




	<div id="div16"></div>
 
<!-- Arquivo de inicialização do mapa -->

<script src="js/mapa_g.js"></script>


</div>


  <table border="0" style="width: 100%; height:100%" cellpadding="0" cellspacing="0">
<tr>
  
<td style="font-size: 11px;text-align: right;">

<form action="scripts.php?acao=cadastra_rotas" name="salvala" id="salvala" method="POST">
<textarea name="xxx" rows="3" id="xxx" hidden="hidden"></textarea>
<textarea name="yyy" rows="3" id="yyy"  hidden="hidden"></textarea>
<textarea name="zzz" rows="3" id="zzz"  hidden="hidden"></textarea>
<textarea name="qqq" rows="3" id="qqq" hidden="hidden" ></textarea>
<textarea name="kkk" rows="3" id="kkk" hidden="hidden" ></textarea>
<textarea name="www" rows="3" id="www" hidden="hidden"></textarea>
<textarea name="eee" rows="3" id="eee"  hidden="hidden"></textarea>
<textarea name="ultimao" rows="3" id="ultimao" hidden="hidden"></textarea>
<textarea name="ultimao_2" rows="3" id="ultimao_2" hidden="hidden"></textarea>
<textarea name="ultimao_3" rows="3" id="ultimao_3" hidden="hidden"></textarea>
<textarea name="id_visita" rows="3" id="ultimao_3" hidden="hidden"></textarea>
<textarea name="inicio" rows="3" id="inicio"  hidden></textarea>
<textarea name="final" rows="3" id="final" hidden></textarea>


<textarea name="qual_tipo_rota" rows="3" id="qual_tipo_rota"  hidden="hidden"><?php echo $qual_rota ?></textarea>
<?php

?>
<textarea name="check_list" rows="3" id="check_list"  hidden="hidden"><?php echo $guarda_linha_check1;?></textarea>


</form>


</td>
</tr>

</table>


</body>
</html>