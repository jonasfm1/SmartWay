<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>::. ROTAS ONLINE .:: CADD</title>
<link rel="stylesheet" type="text/css" href="css/menu.css">
<link rel="stylesheet" type="text/css" href="css/step4_1.css">
    <script src="https://maps.googleapis.com/maps/api/js"></script>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script> 

<?php 
include ('session.php'); 
include ('essence/conecta.php');
ini_set('max_execution_time',12000);
$dbname_cliente=$logado; // Indique o nome do banco de dados que será aberto
if(!($con=mysql_select_db($dbname_cliente,$id))) {
echo "</br>Não foi possível estabelecer uma conexão com o gerenciador MySQL.</br>";
echo "Favor contactar o Administrador no telefone (11) 5505 6542.</br></br>";
echo "PRODUTO REGISTRADO CADDESIGN";
exit;
}

?>

<style type="text/css" media="all">


</style>

<script type='text/javascript' src="control/timer.js"></script>


<script src="js/flutuante.js"></script>
<script src="js/logger.js"></script>
<script LANGUAGE="JavaScript">

	function alerta(){
		
		document.salvala.action = "scripts.php?acao=cadastra_rotas";
	}
	   

</SCRIPT>



    <?php
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
    // echo ($cor[$conta1]);
			$concatena_carro[$conta1] = "imgs/" . $tipo[$conta1] . "_" . $icone[$conta1] . ".png";
			//echo ($concatena_carro[$conta1]);
			$conta1++; 
		
		}
		?>
        
		<script type="text/javascript">
		id_veiculo = <?php echo json_encode($id_veiculo) ?>;	
		
		nome_veiculo = <?php echo json_encode($nome_veiculo) ?>;

		concatena_carro = <?php echo json_encode($concatena_carro) ?>;
			
		color_carro = <?php echo json_encode($cor) ?>;	
		
		</script>

	<?php


	/////////////////////////////////////////////////////////////
	$inicio = $_GET["inicio"];
	$final = $_GET["final"];
	
	
	
	$conta_fora_new = 0;
	$conta_fora1_new = 0;
	
	$deleterecords = "TRUNCATE TABLE rotas"; //Esvaziar a tabela
	mysql_query($deleterecords);
	
	$deleterecords1 = "TRUNCATE TABLE pf"; //Esvaziar a tabela
	mysql_query($deleterecords1);
	
	
	if(!empty($_GET['check_list1'])){
     foreach($_GET['check_list1'] as $report_id1){
		$arr1[$conta_fora_new] = $report_id1;		
		
		$query_fora = "select * from clientes where veiculo=$arr1[$conta_fora_new] order by veiculo";
		$rs_fora = mysql_query($query_fora);
		$agrupamento_concatena="";
		while($row_fora = mysql_fetch_array($rs_fora)){
		
			$codigo_cliente_fora[$conta_fora1_new] = $row_fora["codigo_cliente"];
			$nome_cliente_fora[$conta_fora1_new] = $row_fora["nome"];		
			$veiculo_cliente_fora[$conta_fora1_new] = $row_fora["veiculo"];
			$lat_cliente_fora[$conta_fora1_new] = $row_fora["latitude_cad"];
			$lgn_cliente_fora[$conta_fora1_new] = $row_fora["longitude_cad"];
			$endereco_cliente_fora[$conta_fora1_new] = $row_fora["endereco"];
			$codigo_pedido_fora[$conta_fora1_new] = $row_fora["codigo_pedido"];
			$obs_pedido_fora[$conta_fora1_new] = $row_fora["obs_pedido"];
			
			$peso_cliente_fora[$conta_fora1_new] = $row_fora["peso"];
			$volume_cliente_fora[$conta_fora1_new] = $row_fora["volume"];
			$valor_cliente_fora[$conta_fora1_new] = $row_fora["valor"];
			
			//veiculo qual???
			$query1 = "select * from veiculos WHERE id='$veiculo_cliente_fora[$conta_fora1_new]'";																
			$rs1 = mysql_query($query1);
			$row1 = mysql_fetch_array($rs1);	
			$nome_veiculo = $row1['nome'];
			///////////////

			$agrupamento_concatena = "AGRUPAMENTO " . $nome_veiculo;
			//echo $agrupamento_concatena;
			
			$query3_fora = "INSERT INTO rotas(codigo_cliente, nome_cliente, lat, lgn, veiculo, endereco, ordem, codigo_pedido, obs_pedido, peso, volume, valor, nome_rota) VALUES('$codigo_cliente_fora[$conta_fora1_new]', '$nome_cliente_fora[$conta_fora1_new]', '$lat_cliente_fora[$conta_fora1_new]', '$lgn_cliente_fora[$conta_fora1_new]', '$veiculo_cliente_fora[$conta_fora1_new]', '$endereco_cliente_fora[$conta_fora1_new]', '0', '$codigo_pedido_fora[$conta_fora1_new]', '$obs_pedido_fora[$conta_fora1_new]',  '$peso_cliente_fora[$conta_fora1_new]', '$volume_cliente_fora[$conta_fora1_new]', '$valor_cliente_fora[$conta_fora1_new]', '$agrupamento_concatena')";
   	    	$rs3_fora= mysql_query($query3_fora);
			
			
			$conta_fora1_new++;
		}
		
		$conta_fora_new++;
		
	
	 }
	 
	 
};
	
	
	$conta = 0;
	$conta1_new = 0;
	
	
	
if(!empty($_GET['check_list'])){
     foreach($_GET['check_list'] as $report_id){
		// echo $report_id;
		$arr[$conta] = $report_id;		
		
		//seleciona todos valores
		$query1 = "select * from clientes where veiculo=$arr[$conta] order by veiculo";
   	    $rs1 = mysql_query($query1);
		
		
		
		
			
		//$conta_id = 0;
		while($row = mysql_fetch_array($rs1)){
			
			$codigo_cliente[$conta1_new] = $row["codigo_cliente"];
			$nome_cliente[$conta1_new] = $row["nome"];		
			$veiculo_cliente[$conta1_new] = $row["veiculo"];
			$lat_cliente[$conta1_new] = $row["latitude_cad"];
			$lgn_cliente[$conta1_new] = $row["longitude_cad"];
			$endereco_cliente[$conta1_new] = $row["endereco"];
			$codigo_pedido[$conta1_new] = $row["codigo_pedido"];
			$obs_pedido[$conta1_new] = $row["obs_pedido"];
			
			$peso_cliente[$conta1_new] = $row["peso"];
			$volume_cliente[$conta1_new] = $row["volume"];
			$valor_cliente[$conta1_new] = $row["valor"];
			
			
			//echo $veiculo_cliente[$conta1];
			$query3 = "INSERT INTO rotas(codigo_cliente, nome_cliente, lat, lgn, veiculo, endereco, codigo_pedido, obs_pedido, peso, volume, valor) VALUES('$codigo_cliente[$conta1_new]', '$nome_cliente[$conta1_new]', '$lat_cliente[$conta1_new]', '$lgn_cliente[$conta1_new]', '$veiculo_cliente[$conta1_new]', '$endereco_cliente[$conta1_new]', '$codigo_pedido[$conta1_new]', '$obs_pedido[$conta1_new]', '$peso_cliente[$conta1_new]', '$volume_cliente[$conta1_new]', '$valor_cliente[$conta1_new]')";
   	    	$rs3 = mysql_query($query3);
			
			$conta1_new++; 
			
		
		}
		
	//	$juntoae = $report_id . '_pf';
		
	//	$query_ultimo = "INSERT INTO rotas(veiculo, nome_cliente) VALUES('$juntoae', 'PONTO FINAL')";
  // 	    $rs_ultimo = mysql_query($query_ultimo);
			
		$conta++;	
     }
	 
	 //	echo ($report_id);
		
		
	 
   }

   
  // echo  count($arr);

/* foreach($valores as $item) {
    if(!isset($count[$item]))
	$count[$item] = 0;
	//$codigo_cliente[$item] = 0;
    $count[$item]++;
	//echo $item ;
	$codigo_cliente[$item];
 //}


	
print_r($count);
print_r($codigo_cliente);  
 */
//print_r(array_values ($novo_array));
?>

 

</head>

<body>

<?php include ('base4.php'); ?>

<form name="roteiriza" action="step4_1.php" method="post">
  <div id="apDiv13b">
   <?php
 
    for($i=0;$i<count($arr1);$i++){
		
		
	$sql_fora = "select * from rotas where veiculo=$arr1[$i]";
	$rs_sql = mysql_query($sql_fora);
	$rs_sql1 = mysql_query($sql_fora);
	$rs_sql2 = mysql_query($sql_fora);
	$rs_sql3 = mysql_query($sql_fora);
	$rs_sql4 = mysql_query($sql_fora);
	$rs_sql5 = mysql_query($sql_fora);
	//echo $arr1[$i];
	$lat_cliente_fora="";
	$lgn_cliente_fora="";
	$nome_cliente_fora="";
	$codigo_cliente_fora ="";
	$veiculo_cliente_fora = "";
	$codigo_pedido_fora="";
	$obs_pedido_fora="";
	//////////////////////////////////
	//////////////////////////////////
	$conta_fora = 0;
	$conta_fora1 = 0;
	$conta_fora2 = 0;
	$conta_fora3 = 0;
	$conta_fora4 = 0;
	$conta_fora5 = 0;
	?>
	<div id="waypoints_fora<?php echo $i; ?>" class="div_transparente">
    <?php
	while($row_fora = mysql_fetch_array($rs_sql)){
		    
			$lat_cliente_fora[$conta_fora] = $row_fora["lat"];
			$lgn_cliente_fora[$conta_fora] = $row_fora["lgn"];
			$contatena_valores_fora[$conta_fora] =  '"' . $row_fora["lat"] . ", " . $row_fora["lgn"] . '"';	 
			$contatena_valores_fora[$conta_fora] = $contatena_valores_fora[$conta_fora] . ", ";
			echo ($contatena_valores_fora[$conta_fora]);
			$conta_fora++;	 	
			} ?>
	</div> 
    
    <div id="veiculo_fora<?php echo $i; ?>" class="div_result">
	<?php
	while($row_fora2 = mysql_fetch_array($rs_sql2)){ 		
			$codigo_cliente_fora[$conta_fora2] = $row_fora2["codigo_cliente"];
			echo '"' . $codigo_cliente_fora[$conta_fora2] . '", ';  		
			$conta_fora2++;
			} ?>
 	</div>
            
     <div id="carro_fora<?php echo $i; ?>" class="div_result">
	<?php
	while($row_fora3 = mysql_fetch_array($rs_sql3)){ 	
			$veiculo_cliente_fora[$conta_fora3] = $row_fora3["veiculo"];
			echo '"' . $veiculo_cliente_fora[$conta_fora3] . '", ';  		
			$conta_fora3++;
	
	} ?>
 	</div>
	<div id="nome_cliente_fora<?php echo $i; ?>" class="div_result">
	<?php
	while($row_fora1 = mysql_fetch_array($rs_sql1)){ 
			$nome_cliente_fora[$conta_fora1] = $row_fora1["nome_cliente"];
			echo '"' . $nome_cliente_fora[$conta_fora1] . '", ';  		
			$conta_fora1++;
	} ?></div>
    
    <div id="codigo_pedido_fora<?php echo $i; ?>" class="div_result">
	<?php
	while($row_fora4 = mysql_fetch_array($rs_sql4)){ 	
			$codigo_pedido_fora[$conta_fora4] = $row_fora4["codigo_pedido"];
			echo '"' . $codigo_pedido_fora[$conta_fora4] . '", ';  		
			$conta_fora4++;
	}
	?>
	 </div>
	 <div id="obs_pedido_fora<?php echo $i; ?>" class="div_result">
	<?php
	while($row_fora5 = mysql_fetch_array($rs_sql5)){ 		
			$obs_pedido_fora[$conta_fora5] = $row_fora5["obs_pedido"];
			echo '"' . $obs_pedido_fora[$conta_fora5] . '", ';  		
			$conta_fora5++;
	}
			?>
 	</div>
   
   
	<?php 
	////////////////////////////////////////////////
	////////////////////////////////////////////////
}
 

  	$contala = count($arr);
	
	//$veiculo_cliente = array_unique($veiculo_cliente);
	//var_dump($veiculo_cliente);
	//print implode(',', array_unique(array_filter(explode(',', $result))));
	
 for($i=0;$i<count($arr);$i++){
	
	$query_new = "select * from rotas where veiculo=$arr[$i]";
	$rs_new = mysql_query($query_new);
	$rs_new1 = mysql_query($query_new);
	$rs_new2 = mysql_query($query_new);
	$rs_new3 = mysql_query($query_new);	
	$rs_new6 = mysql_query($query_new);	
	$rs_new7 = mysql_query($query_new);
	$rs_new8 = mysql_query($query_new);		
	//$num_rows = mysql_num_rows($rs_new1);
//echo $num_rows;
	$codigo_cliente1 ="";
	$nome_cliente1 ="";
	$lat_cliente1 ="";
	$lgn_cliente1 ="";
	$contatena_valores ="";
	$veiculo_cliente1="";
	$codigo_pedido1="";
	$obs_pedido1="";
	$conta2 = 0;
	$conta3 = 0;	
	$conta4 = 0;
	$conta6 = 0;	
	$conta7 = 0;	
	$conta8 = 0;
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
			$codigo_cliente1[$conta3] = $row3["codigo_cliente"];
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
<div id="apDiv11"><img src="imgs/bg_box_step4_1.png" width="580" height="82" />

  <div id="apDiv13"><input type='submit' value='AVANÇAR' onClick="alerta();"/>
</div>

<div id="apDiv13_volta"><form name="go_step4a" action="step4_1.php">
<input type='submit' value='VOLTAR'/>
</form></div>


  <div id="apDiv14c">
 
    <div id="map-canvas"></div>


    <div id="apDiv16">
   
<div id="div16"></div>

    </div>




</div>
</div>
        <script src="js/jquery.min.js"></script>
		
        <!-- Maps API Javascript -->
<script src="http://maps.googleapis.com/maps/api/js?language=pt-BR&sensor=false"></script>
 
<!-- Arquivo de inicialização do mapa -->
<script src="js/mapa_g.js"></script>

<div id="Pagina" name="Pagina" style="display: none;">
   <div id="botao"><a href="javascript:void(0);" onclick="document.getElementById('Pagina').style.display = 'none';window.parent.location.reload()" ><img src="imgs/botao_fechar.png" width="46" height="45" border="0" alt="FECHAR" /></a></div>
   <iframe src="escolher_veiculo.php" name="pag1" frameborder="0" id="pag1"></iframe>
</div>
<div id="Paginaa" style="display: none;">
   <div id="botao2"><a href="javascript:void(0);" onclick="document.getElementById('Paginaa').style.display = 'none';window.parent.location.reload()" ><img src="imgs/botao_fechar.png" width="46" height="45" border="0" alt="FECHAR" /></a></div>
   <iframe src="adicionar_veiculo.php" name="pag1a" frameborder="0" id="pag1a"></iframe>
</div>
<div id="recebe_dados"><form action="#" name="salvala" id="salvala" method="POST">
<textarea name="xxx" rows="3" id="xxx" hidden="hidden" ></textarea>
<textarea name="yyy" rows="2" id="yyy" hidden="hidden"></textarea>
<textarea name="zzz" rows="2" id="zzz" hidden="hidden"></textarea>

<textarea name="qqq" rows="3" id="qqq" hidden="hidden"></textarea>
<textarea name="kkk" rows="3" id="kkk" hidden="hidden"></textarea>
<textarea name="www" rows="3" id="www"hidden="hidden" ></textarea>

<textarea name="eee" rows="3" id="eee" hidden="hidden"></textarea>

<textarea name="ultimao" rows="3" id="ultimao" hidden="hidden" ></textarea>
<textarea name="ultimao_2" rows="3" id="ultimao_2" hidden="hidden"></textarea>
<textarea name="ultimao_3" rows="3" id="ultimao_3" hidden="hidden"></textarea>
 
</form></div>

</body>
</html>