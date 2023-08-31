
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


<?php
include ('essence/conecta.php');
include ('session.php'); 
ini_set('max_execution_time',12000);
?>
<link rel="stylesheet" type="text/css" href="css/style.css">




<?php


 
$acao = $_GET['acao'];

$id_yes = $_GET['id'];

switch ($acao) {


/////////////// PRIORIDADE VEICULO PASSO 4 ///////////////////////

case 'prioridade_veiculo':


	$veiculo = $_GET['veiculo'];
	$prioridade =$_GET['pri'];


	$query = "UPDATE veiculos SET prioridade='$prioridade' where id='$veiculo'";
	$rs = mysql_query($query);
?>
	<SCRIPT LANGUAGE="JavaScript" TYPE="text/javascript">
	
	window.location.href = "step4.php";

</SCRIPT>

<?php
	break;

/////////////// PRIORIDADE VEICULO PASSO 4 ///////////////////////


/////////////// ENABLE CLIENTES ///////////////////////

case 'altera_enable':

	
	//$numero_oco = $_POST['RadioGroup1'];
	$campo = $_POST['check_list'];
	$conta_lista = count($campo);


	for ($i = 0; $i <= $conta_lista; $i++) {
		$query2 = "UPDATE clientes SET ativo=0 where codigo_cliente='$campo[$i]'";
		$rs2 = mysql_query($query2);

	}


	?>
<table width="100%" height="100%" style="background-color:#FFF; vertical-align: middle; text-align: center">
	<tr height="80px"  style="font-family:Arial; font-size: 11px;">
	<td><img src="imgs/ok.PNG"/>
		<br>
	<strong>STATUS ALTERADO COM SUCESSO!</strong>	
		</td>
	</tr>

</table>
<SCRIPT LANGUAGE="JavaScript" TYPE="text/javascript">
	//  window.location.href = "step2_sm_l.php";
//alert("MENSAGEM: EQUIPE CADDESIGN\nLogin alterado com sucesso!");
	
	setTimeout(parent.location.reload(), 100000);
	
	</SCRIPT>

	<?php

	break;


/////////////// ENABLE CLIENTES ///////////////////////

	
/////////////// DISABLE CLIENTES ///////////////////////

case 'altera_disable':

	
	//$numero_oco = $_POST['RadioGroup1'];
	$campo = $_POST['check_list'];
	$conta_lista = count($campo);
//echo $conta_lista;

	for ($i = 0; $i <= $conta_lista; $i++) {


		$query = "SELECT * from clientes where codigo_cliente='$campo[$i]'";
		$rs = mysql_query($query);

// Tirando o while
$dados = mysql_fetch_array($rs);

// Exibição
$veiculo= $dados['veiculo'];

//echo $veiculo;
		if( $veiculo!=''){
			//echo $num_rows;
		
?>

<SCRIPT LANGUAGE="JavaScript" TYPE="text/javascript">
alert("Esse cliente <?php echo $campo[$i] ?> não pode ser desativado. Já contêm veículo vinculado a ele!");
</script>
<table width="100%" height="100%" style="background-color:#FFF; vertical-align: middle; text-align: center">
	<tr height="80px"  style="font-family:Arial; font-size: 11px;">
	<td><img src="imgs/ok.PNG"/>
		<br>
	<strong>STATUS ALTERADO COM SUCESSO!</strong>	
		</td>
	</tr>

</table>
<?php
		} else {


			$query2 = "UPDATE clientes SET ativo=1 where codigo_cliente='$campo[$i]'";
			$rs2 = mysql_query($query2);
		}


	}


	?>
<table width="100%" height="100%" style="background-color:#FFF; vertical-align: middle; text-align: center">
	<tr height="80px"  style="font-family:Arial; font-size: 11px;">
	<td><img src="imgs/ok.PNG"/>
		<br>
	<strong>STATUS ALTERADO COM SUCESSO!</strong>	
		</td>
	</tr>

</table>
<SCRIPT LANGUAGE="JavaScript" TYPE="text/javascript">
	//  window.location.href = "step2_sm_l.php";
//alert("MENSAGEM: EQUIPE CADDESIGN\nLogin alterado com sucesso!");
	
	setTimeout(parent.location.reload(), 100000);
	
	</SCRIPT>

	<?php

	break;


/////////////// DISABLE CLIENTES ///////////////////////


case 'esvaziar_veiculos_integrados':

	$esvazia_integracao = mysql_query("TRUNCATE table integracao");	
	//Esvaziar a tabela cliente com pedidos já integrados
	
	$select_compara_integrado = mysql_query("SELECT id FROM veiculos where integrado=1"); 
	while($row = mysql_fetch_array($select_compara_integrado)){
	  $id_integrado = $row["id"];
	
	  $delete_integrados = "DELETE FROM clientes WHERE veiculo='$id_integrado'"; 
	  mysql_query($delete_integrados);
	
	  $query_deleta = "UPDATE veiculos SET peso_total=null, volume_total=null, valor_total=null, equipe=null, ocupado='0', roteirizado='', integrado=0 where id='$id_integrado'";
	  $rs_deleta = mysql_query($query_deleta);
	

	  
	  $query_where1 = "UPDATE passo SET ok='no' WHERE (id='4' OR id='5')";
	  $rs_where1 = mysql_query($query_where1);
 
	}
	  ?>
	<script>
	
window.location.href="step3_block.php";
	</script>
	  
<?php
break;
 


case 'esvaziar_veiculos_nao_integrados':

$select_compara_integrado = mysql_query("SELECT id FROM veiculos where integrado=0"); 
while($row = mysql_fetch_array($select_compara_integrado)){
  $id_integrado = $row["id"];

  $delete_integrados = "DELETE FROM clientes WHERE veiculo='$id_integrado'"; 
  mysql_query($delete_integrados);

  $query_deleta = "UPDATE veiculos SET peso_total=null, volume_total=null, valor_total=null, equipe=null, ocupado='0', roteirizado='', integrado=0 where id='$id_integrado'";
  $rs_deleta = mysql_query($query_deleta);

  $query_where1 = "UPDATE passo SET ok='no' WHERE (id='4' OR id='5')";
  $rs_where1 = mysql_query($query_where1);
	
}
  ?>
<script>
	
window.location.href="step3_block.php";
	</script>
	  
<?php
break;


 



//////////////INTEGRACAO ERP////////////////////////////////
case 'limpa_romaneios':

$esvazia_integracao = mysql_query("TRUNCATE table integracao");	


$deleterecords = "DELETE from clientes where ocupado=1"; //Esvaziar a tabela
mysql_query($deleterecords);	


$query_deleta = "UPDATE veiculos SET peso_total=null, volume_total=null, valor_total=null, equipe=null, ocupado='0', roteirizado='', integrado=0 where equipe='yes'";
$rs_deleta = mysql_query($query_deleta);


$query_where1 = "UPDATE passo SET ok='no' WHERE (id='2' OR id='3' OR id='4' OR id='5')";
$rs_where1 = mysql_query($query_where1);

?>

<script type="text/javascript">
    $(window).on('load',function(){
    $('#exampleModalCenter').modal('show'); });

	$("#btn_ok_1").click(function (e) {
  alert("vai");
})



</script>

<style>
.modal-backdrop {
   background-color: #CCCCCC;
}

</style>
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
		  <table>
			  <tr>
				  <td>
				  <span class="material-icons" style="font-size: 48px;color:#2867b2">highlight_off</span>
				  </td>
				  <td>
				  <strong><p class="modal-title" id="exampleModalLongTitle" style="text-align: left;">&nbsp;&nbsp;EXCLUIR ROMANEIOS ANTERIORES</p></strong> 
				  </td>
			  </tr>
		  </table>
	 

      </div>
      <div class="modal-body" style="font-size: 13px;">
	  &nbsp;&nbsp;Exclusão feita com sucesso!
      </div>
      <div class="modal-footer">
	  

	  <a href="step1.php" class="btn btn-info btn" style="background-color:#2867b2;border-radius: 0;">
         Ok 
        </a>
		
      </div>
    </div>
  </div>
</div>



<?php


break;


//////////////INTEGRACAO ERP////////////////////////////////
case 'integracao_erp':



	$verifica_carro = mysql_query("SELECT nome_veiculo, veiculo FROM rotas group by nome_veiculo");

	while ($row_ok = mysql_fetch_array($verifica_carro)) {

		$verifica_veiculo = $row_ok['nome_veiculo'];
		$id_veiculo = $row_ok['veiculo'];

		$query6 = mysql_query("UPDATE clientes SET roteirizado='sim' WHERE veiculo = '$id_veiculo'");
		$query_ativa = mysql_query("UPDATE veiculos SET roteirizado='sim', integrado=1 WHERE id = '$id_veiculo'");


		$verifica_veiculo1 = mysql_query("SELECT nome_veiculo FROM integracao where nome_veiculo='$verifica_veiculo'");
		$total_veiculo = mysql_num_rows($verifica_veiculo1);

		if($total_veiculo>0){
			$query_deleta = mysql_query("DELETE FROM integracao WHERE nome_veiculo = '$verifica_veiculo'");

		}


	}

$seleciona = mysql_query("SELECT * FROM rotas");

$usuario = $_SESSION['senha'];
$array_naoentrou = [];
$i=0;


while ($row = mysql_fetch_array($seleciona)) {

		$codigo_pedido = $row['codigo_pedido'];
		$nome_veiculo = $row['nome_veiculo'];
        $nome_rota = $row['nome_rota'];
        $ordem = $row['ordem'];		
		$codigo_cliente = $row['codigo_cliente'];
		$nome_cliente = $row['nome_cliente'];
		$veiculo = $row['veiculo'];
		$data_entrega = $row['data_entrega'];
		$tempo =  $row['tempo'];
		$distancia =  $row['distancia'];
		$ordem = $row['ordem'];

		//NAO FICAR VAZIO ESSE CAMPO, ERRO NO ERP WMS
		if($data_entrega==''){
			$data_entrega = date('d-m-Y');
		} 

		//PEGA TEMPO TOTAL E DISTANCIA TOTAL ROTA
		$query_tempo_total = "SELECT tempo_total, distancia_total, id from veiculos where id=$veiculo";
		$query_tempo = mysql_query($query_tempo_total);

		// Tirando o while
		$dados = mysql_fetch_array($query_tempo);
		
		$tempo_total = $dados['tempo_total'];
		$distancia_total = $dados['distancia_total'];


		$seleciona_cod_pedido = mysql_query("SELECT codigo_pedido FROM integracao where codigo_pedido='$codigo_pedido'");
		$total = mysql_num_rows($seleciona_cod_pedido);

		$seleciona_cod_pedido_integrado = mysql_query("SELECT pedido FROM pedidos_input where pedido='$codigo_pedido'");
		$total_integrado = mysql_num_rows($seleciona_cod_pedido_integrado);

		// VERIFICA CODIGO PEDIDO
		if($total_integrado>0){

			$import2="UPDATE pedidos_input SET codigo_cliente='$codigo_cliente', nome_cliente='$nome_cliente', nome_veiculo='$nome_veiculo', nome_rota='$nome_rota', data_entrega='$data_entrega', tempo='$tempo', distancia='$distancia', tempo_total='$tempo_total', distancia_total='$distancia_total', ordem='$ordem' where pedido='$codigo_pedido'";
			mysql_query($import2) or die(mysql_error());

		} else {
			$import2="INSERT into pedidos_input(pedido, codigo_cliente, nome_cliente, nome_veiculo, nome_rota, data_entrega, tempo, distancia, tempo_total, distancia_total, ordem)values('$codigo_pedido', '$codigo_cliente', '$nome_cliente', '$nome_veiculo', '$nome_rota', '$data_entrega', '$tempo', '$distancia', '$tempo_total', 'distancia_total', '$ordem')";
			mysql_query($import2) or die(mysql_error());

		}
		



		/////////////////////////

		if ($total>0){
			$query = mysql_query("UPDATE integracao SET veiculo='$veiculo', codigo_pedido='$codigo_pedido', nome_rota='$nome_rota', nome_veiculo='$nome_veiculo', ordem='$ordem', codigo_cliente='$codigo_cliente', nomeusuario='$usuario', dataentrega='$data_entrega' WHERE codigo_pedido='$codigo_pedido'");
		} else {

	
			$query = mysql_query("INSERT INTO integracao(veiculo, codigo_pedido, nome_veiculo, nome_rota, ordem, codigo_cliente, nomeusuario, dataentrega) VALUES('$veiculo', '$codigo_pedido', '$nome_veiculo','$nome_rota', '$ordem', '$codigo_cliente', '$usuario', '$data_entrega')");

		}

}


	$pega_slt = $_POST["usuario"];
	$dataPedido = $_REQUEST['data'];
	$bd = "mo_" . $pega_slt;
	

	date_default_timezone_set('Etc/GMT+3');
    $today = date("d-m-Y");
    $today1 = time("d-m-Y H:i:s");	
	$today_troca_dia = date("H:i:s");


	$dia_seguinte =  date("d-m-Y",strtotime("+1 day"));
	$lista = $dataPedido;

	$query20 = "SELECT * FROM rotas";
    $rs20 = mysql_query($query20);

	$num_rows_pedidos = mysql_num_rows($rs20);
	$conta_iguais=0;
	$conta_diferente=0;
	

	
    while ($row20 = mysql_fetch_array($rs20)) {

        $login = $row20['nome_veiculo'];
        $rota = $row20['nome_rota'];
        $ordem = $row20['ordem'];
        $x = $row20['lgn'];
        $y = $row20['lat'];
        $codigo_cliente = $row20['codigo_cliente'];
        $nome_cliente = $row20['nome_cliente'];
        $nome_cliente = str_replace("-", "•", $nome_cliente);
        $endereco = $row20['endereco'];
        $endereco = str_replace("-", "•", $endereco);
        $cidade = $row20['cidade'];
        $codigo_pedido = $row20['codigo_pedido'];
        $tempo_servico = $row20['tempo_servico'];
        $obs_pedido = $row20['obs_pedido'];
        $peso = $row20['peso'];
        $volume = $row20['volume'];
        $valor = $row20['valor'];
        $uf = $row20['uf'];
		$cep = $row20['cep'];
        $raio = 300;
        $status = 0;
		$tipo_veiculo = $row20['tipo_veiculo'];
		$transportadora = $row20['transportadora'];
		$redespacho = $row20['redespacho'];
		$rota = $dataPedido . "-" . $transportadora ." (". $rota . ")";
		

		// CONEXAO MONITORAMENTO
        $con2 = mysql_connect("127.0.0.1", "root", "HtMQZhAwCNzeaAfT") or die ("Sem conexão com o servidor");
        $select2 = mysql_select_db($bd) or die("Sem acesso ao DB, Entre em contato com o Administrador!");

		$query_lista_ok = mysql_query("SELECT * from rotas where lista='$lista' and statusrota=1");
		$total_lista_ok = mysql_num_rows($query_lista_ok);

		if($total_lista_ok>0){
			$statusrota_ok = 1;
		} else {
			$statusrota_ok = 0;

		}

		if($redespacho==''){
			$confere_jaimportado = mysql_query("SELECT codigo_pedido from rotas where codigo_pedido='$codigo_pedido' and login='$login' and lista='$lista'");
		} else {

			$confere_jaimportado = mysql_query("SELECT codigo_pedido from rotas where codigo_pedido='$codigo_pedido' and login='$redespacho' and lista='$lista'");
		}
		
		$total = mysql_num_rows($confere_jaimportado);



		if ($total>0){
			$conta_iguais++;
			array_push($array_naoentrou, $codigo_pedido);
?>
		<script type="text/javascript">
		//alert("Pedido não importado! \nPedido <?php echo $codigo_pedido ?> duplicado na mesma lista, com o mesmo motorista!\nExclua esse pedido no Monitoramento.");
		</script>
<?php
		} else {
			$conta_diferente++;

			if($redespacho==''){
				$query2 = "INSERT INTO rotas(login, rota, sequencia, x, y, idcliente, nome, endereco, cidade, classificacao, tempo, raio, status, statusrota, lista, codigo_pedido, site, peso, volume, valor, obs, uf, cep) VALUES('$login', '$rota', '$ordem', '$x', '$y', '$codigo_cliente', '$nome_cliente', '$endereco', '$cidade', '$tipo_veiculo ', '$tempo_servico', '$raio', '$status', $statusrota_ok, '$lista', '$codigo_pedido', 1, '$peso', '$volume', '$valor', '$obs_pedido', '$uf', '$cep')";
				
			} else {
				$query2 = "INSERT INTO rotas(login, rota, sequencia, x, y, idcliente, nome, endereco, cidade, classificacao, tempo, raio, status, statusrota, lista, codigo_pedido, site, peso, volume, valor, obs, uf, cep) VALUES('$redespacho', '$rota', '$ordem', '$x', '$y', '$codigo_cliente', '$nome_cliente', '$endereco', '$cidade', '$tipo_veiculo ', '$tempo_servico', '$raio', '$status', $statusrota_ok, '$lista', '$codigo_pedido', 1, '$peso', '$volume', '$valor', '$obs_pedido', '$uf', '$cep')";
				

			}
			
			$rs2 = mysql_query($query2);
		}


    }

	// VERIFICA SE JÁ TEM LISTA NO MO
	$query_jatem = mysql_query("SELECT id from listas where nome='$lista'");
	$num_rows = mysql_num_rows($query_jatem);

	if($num_rows>0){


	} else {

		$querylista = "INSERT INTO listas(nome) VALUE('$lista')";
		$rs_lista = mysql_query($querylista);
	}




	$seleciona = mysql_query("SELECT id FROM listas where nome='$lista'");	

	$dados = mysql_fetch_array($seleciona);
	$id_grava= $dados['id'];


	$grava_lista_nova = mysql_query("UPDATE rotas SET id_lista='$id_grava' where lista='$lista'");
	?>

<script type="text/javascript">
    $(window).on('load',function(){
    $('#exampleModalCenter').modal('show'); });

	$("#btn_ok_1").click(function (e) {
  //alert("vai");
})



</script>

<style>
.modal-backdrop {
   background-color: #CCCCCC;
}


</style>
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
	<div class="modal-header"  style="padding-top:30px ;">
		  <table >
		

			  <tr>
			
				  <td>
				  <span class="material-icons" style="font-size: 38px;color:green">unarchive</span>
				  </td>
				  <td>
				 <strong><p class="modal-title" id="exampleModalLongTitle" style="text-align: left;">&nbsp;&nbsp;BAIXA DOS ROMANEIOS</p></strong> 
				  </td>
	

			  </tr>
		  </table>
	 

      </div>
	  
	  <div class="modal-body" style="font-size: 13px; padding-left:66px"">

 	  Integração feita com sucesso!
	  <strong>Lembre-se de sincronizar o ERP!</strong>

      </div>

      <div class="modal-header">
		  <table>
		
			  <tr>
			  <?php
	  if($num_rows_pedidos==$conta_iguais){
?>
				  <td>
				  <span class="material-icons" style="font-size: 38px;color:#FF0000">app_settings_alt</span>
				  </td>
				  <td>
				 <strong><p class="modal-title" id="exampleModalLongTitle" style="text-align: left;">&nbsp;&nbsp;ESSES PEDIDOS JÁ FORAM IMPORTADOS NO APP</p></strong> 
				  </td>
				  <?php
	  } else {
?>
  				  <td>
				  <span class="material-icons" style="font-size: 38px;color:green">app_settings_alt</span>
				  </td>
				  <td>
				  <strong><p class="modal-title" id="exampleModalLongTitle" style="text-align: left;">&nbsp;&nbsp;PEDIDOS IMPORTADOS PARA O APP</p></strong> 
				  </td>
<?php
	  }
?>

			  </tr>
		  </table>
	 

      </div>
      <div class="modal-body" style="font-size: 13px; padding-left:66px">
	  <?php
	  if($num_rows_pedidos==$conta_iguais){
		//echo $array_naoentrou[1];
		$result = count($array_naoentrou);

?>
	  <br>
      As Rotas não foram importadas na Lista <b>'<?php echo $lista ?>'</b>!<br>
	  <strong>Total de pedidos:</strong> <?php  echo $num_rows_pedidos; ?> <br>
	  <strong>Pedidos duplicados:</strong> <?php  echo $conta_iguais; ?> <br>
	  <strong>Pedidos duplicado na mesma lista, com o mesmo motorista: </strong> <br>
<?php
	  while ($i < $result) {
    	echo $array_naoentrou[$i] . ", ";
		$i++;
		}
	 
	  ?>
	 
	  <br> <br>
<?php


	  } else {
?>
      Rotas importadas com sucesso na Lista <b>'<?php echo $lista ?>'</b>!<br>
	  <strong>Total de pedidos:</strong> <?php  echo $num_rows_pedidos; ?><br>
	  <strong>Pedidos duplicados:</strong> <?php  echo $conta_iguais; ?><br>
	  <strong>Pedidos importados:</strong> <?php  echo $conta_diferente;?>
<?php
	  }
?>
	  

      </div>
      <div class="modal-footer">
	  

	  <a href="step5.php" class="btn btn-info btn" style="background-color:#2867b2;border-radius: 0;">
         Ok 
        </a>
		
      </div>
    </div>
  </div>
</div>

    <?php

break;
//////////////INTEGRACAO ERP////////////////////////////////

//////////////CALCULA KMS E TEMPO ALTERANDO A ORDEM DE VISITAS////////////////////////////////
case 'rerote':
$id = array();

//$id =$_POST['$array_id'];
//echo($id[0]);
print_r( $_POST['$array_id'] );

break;
//////////////CALCULA KMS E TEMPO ALTERANDO A ORDEM DE VISITAS////////////////////////////////


//////////////ALTERAR ORDEM VISITA STEP 5 UP////////////////////////////////

case 'altera_rota_up':
$id = $_GET["id"];
$rota = $_GET["rota"];
$ordem = $_GET["ordem"];

//echo $ordem;

$soma_ordem= $ordem - 1;
//echo $soma_ordem;
//$rota_anteior = $ordem - 1;

//$anterior_rota = $ordem + 1;

 
$query1 = "UPDATE rotas SET ordem='$ordem', distancia='', tempo='' WHERE nome_rota='$rota' and ordem='$soma_ordem'";
$rs1= mysql_query($query1);

$query = "UPDATE rotas SET ordem='$soma_ordem', distancia='', tempo='' WHERE id='$id'";
$rs= mysql_query($query);

?>
<SCRIPT LANGUAGE="JavaScript" TYPE="text/javascript"> 
window.location.href="altera_ordem.php?rota=<?php echo $rota; ?>";
//window.history.go(-1)

</SCRIPT>

<?php
break;

//////////////ALTERAR ORDEM VISITA STEP 5 UP////////////////////////////////


//////////////ALTERAR ORDEM VISITA STEP 5 DOWN////////////////////////////////

case 'altera_rota_down':
$id = $_GET["id"];
$rota = $_GET["rota"];
$ordem = $_GET["ordem"];

//echo $ordem;

$soma_ordem= $ordem + 1;
//echo $soma_ordem;
	
//echo "teste";
$query1 = "UPDATE rotas SET ordem='$ordem', distancia='', tempo='' WHERE nome_rota='$rota' and ordem='$soma_ordem'";
$rs1= mysql_query($query1);	

$query = "UPDATE rotas SET ordem='$soma_ordem', distancia='', tempo='' WHERE id='$id'";
$rs= mysql_query($query);

?>
<SCRIPT LANGUAGE="JavaScript" TYPE="text/javascript"> 

window.location.href="altera_ordem.php?rota=<?php echo $rota; ?>";
</SCRIPT>

<?php

break;

//////////////ALTERAR ORDEM VISITA STEP 5 DOWN////////////////////////////////

//////////////CADASTRA PONTO INICIAL FINAL ////////////////////////////////

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


//////////////BLOQUEIA VEICULO TODOS////////////////////////////////

case 'bloqueia_veiculos_todos_g':

	$integra_veiculo = mysql_query("TRUNCATE table integracao");
	$deleta1 = mysql_query("TRUNCATE table rotas");
	
	
	$query6 = "UPDATE clientes SET roteirizado='' WHERE ocupado=1";
	$rs6 = mysql_query($query6);
	
	
	$query_ativa = "UPDATE veiculos SET roteirizado='', integrado=0 WHERE ocupado=1";
	$rs_ativa = mysql_query($query_ativa);

?>
<SCRIPT language="JavaScript">

//window.history.go(-1);

window.location.href="rotas_control.php";

</SCRIPT>


<?php

break;

/////FIM///////BLOQUEIA VEICULO TODOS////////////////////////////////

//////////////LIBERA VEICULO TODOS////////////////////////////////

case 'libera_veiculos_todos_g':

		
	$query6 = "UPDATE clientes SET roteirizado='sim' WHERE ocupado=1";
	$rs6 = mysql_query($query6);
	
	
	$query_ativa = "UPDATE veiculos SET roteirizado='sim' WHERE ocupado=1";
	$rs_ativa = mysql_query($query_ativa);

?>
<SCRIPT language="JavaScript">

//window.history.go(-1);

window.location.href="rotas_control.php";

</SCRIPT>


<?php

break;

/////FIM///////LIBERA VEICULO TODOS////////////////////////////////




//////////////BLOQUEIA VEICULO TODOS////////////////////////////////

case 'bloqueia_veiculos_todos':

	$integra_veiculo = mysql_query("TRUNCATE table integracao");

	$deleta1 = mysql_query("TRUNCATE table rotas");

		
	$query6 = "UPDATE clientes SET roteirizado='' WHERE ocupado=1";
	$rs6 = mysql_query($query6);
	
	
	$query_ativa = "UPDATE veiculos SET roteirizado='', integrado=0 WHERE ocupado=1";
	$rs_ativa = mysql_query($query_ativa);

?>
<SCRIPT language="JavaScript">

//window.history.go(-1);

window.location.href="step3_block.php";

</SCRIPT>


<?php

break;

/////FIM///////BLOQUEIA VEICULO TODOS////////////////////////////////

//////////////LIBERA VEICULO TODOS////////////////////////////////

case 'libera_veiculos_todos':

		
	$query6 = "UPDATE clientes SET roteirizado='sim' WHERE ocupado=1";
	$rs6 = mysql_query($query6);
	
	
	$query_ativa = "UPDATE veiculos SET roteirizado='sim' WHERE ocupado=1";
	$rs_ativa = mysql_query($query_ativa);



?>
<SCRIPT language="JavaScript">

//window.history.go(-1);

window.location.href="step3_block.php";

</SCRIPT>


<?php

break;

/////FIM///////LIBERA VEICULO TODOS////////////////////////////////


case 'esvazia_visita_veiculo':


//echo $id_yes;

$query = "select * from veiculos WHERE id='$id_yes'";															
$rs = mysql_query($query);
while($row = mysql_fetch_array($rs)){
  $query2 = "UPDATE veiculos SET equipe=NULL, peso_total=NULL, volume_total=NULL, valor_total=NULL, ocupado='0', prioridade=Null WHERE id='$id_yes'";
  $rs2= mysql_query($query2);
}


?>

<body bgcolor="#FFFFFF">


<div style="height:100px; background-color:#FFFFFF; width:400px; position: relative; left: 50%; top: 50%; margin-left:-200px; margin-top:-50px">
  <div id="progress" style="position: absolute; left: 28px; top: 28px; width: 342px; height: 40px; background-color: #6f99d6; layer-background-color: #6f99d6; border: 1px none #000000; font-family:Arial, 'Helvetica Neue', Helvetica, sans-serif; font-size:12px">


<?php

$query3 = "select * from clientes WHERE veiculo='$id_yes'";															
$rs3 = mysql_query($query3);
$total = mysql_num_rows($rs3);

$conta = 0;
while($row3 = mysql_fetch_array($rs3)){
  $conta++;	
  
  $query4 = "UPDATE clientes SET veiculo=NULL, ocupado='0' WHERE veiculo='$id_yes'";
  $rs4= mysql_query($query4);  
 
//// LOADING 0 A 100% ////////////////////////////////////////////////////
	$pega_loading = intval(($conta/$total)* 100) . "%";

    echo "<div style='position:absolute;margin:0px 0px 0px 0px;width:$pega_loading;height:40px;background:#2867b2;color:#2867b2;color: #FFFFFF;text-align:center;line-height:40px;'>$pega_loading</div>";
    flush();
    ob_flush();
	
//// LOADING 0 A 100% ////////////////////////////////////////////////////

}



?>
<SCRIPT LANGUAGE="JavaScript" TYPE="text/javascript"> 

window.location.href="step3.php";

</SCRIPT>

<?php

break;
///////////////////

case 'esvazia_veiculos_step':


$query_where = "UPDATE passo SET ok='yes' WHERE id='3'";
$rs_where = mysql_query($query_where);

$query_where1 = "UPDATE passo SET ok='no' WHERE (id='4' OR id='5')";
$rs_where1 = mysql_query($query_where1);


$query = mysql_query("select * from veiculos");															

while($row = mysql_fetch_array($query)){
  $query2 = "UPDATE veiculos SET equipe=NULL, peso_total=NULL, volume_total=NULL, valor_total=NULL, ocupado='0', prioridade=Null where roteirizado!='sim'";
  $rs2= mysql_query($query2);
}

?>

<body bgcolor="#FFFFFF">


<div style="height:100px; background-color:#FFFFFF; width:400px; position: relative; left: 50%; top: 50%; margin-left:-200px; margin-top:-50px">
  <div id="progress" style="position: absolute; left: 28px; top: 28px; width: 342px; height: 40px; background-color: #6f99d6; layer-background-color: #6f99d6; border: 1px none #000000; font-family:Arial, 'Helvetica Neue', Helvetica, sans-serif; font-size:12px">


<?php


$query3 = mysql_query("select * from clientes");															

$conta = 0;
$total = mysql_num_rows($query3);


while($row3 = mysql_fetch_array($query3)){
	
  $conta++;	
  
  $query4 = "UPDATE clientes SET veiculo=NULL, ocupado='0' where roteirizado!='sim'";
  $rs4= mysql_query($query4);
  
//// LOADING 0 A 100% ////////////////////////////////////////////////////
	$pega_loading = intval(($conta/$total)* 100) . "%";

    echo "<div style='position:absolute;margin:0px 0px 0px 0px;width:$pega_loading;height:40px;background:#2867b2;color:#2867b2;color: #FFFFFF;text-align:center;line-height:40px;'>$pega_loading</div>";
    flush();
    ob_flush();
	
//// LOADING 0 A 100% ////////////////////////////////////////////////////


}

?>
</div>
</div>
<SCRIPT LANGUAGE="JavaScript" TYPE="text/javascript"> 

window.location.href="step3.php";
//window.history.go(-1);
</SCRIPT>

<?php

break;

case 'esvazia_veiculos':



$query3 = "select * from clientes where roteirizado!='sim' and ativo=0";															
$rs3 = mysql_query($query3);

$conta_vazios=0;
$conta_x=0;
?>

<body bgcolor="#FFFFFF">


<div style="height:100px; background-color:#FFFFFF; width:400px; position: relative; left: 50%; top: 50%; margin-left:-200px; margin-top:-50px">
  <div id="progress" style="position: absolute; left: 28px; top: 28px; width: 342px; height: 40px; background-color: #FFFFFF; layer-background-color: #6f99d6; border: 1px none #000000; font-family:Arial, 'Helvetica Neue', Helvetica, sans-serif; font-size:12px">


<?php



/// MANIPULA A LONGITUDE DOS CLIENTES IGUAIS////////////////////////////////////////////////


	$query_agrupar = "select codigo from clientes group by codigo_cliente";
	$query_agrupar = mysql_query($query_agrupar);
	
while($row_agrupar = mysql_fetch_array($query_agrupar)){
	
	$conta_conta = 0;

	$pega_codigo = $row_agrupar['codigo_cliente'];
	$pega_lgn = $row_agrupar['longitude_cad'];
	
	$query_agrupar1 = "select codigo from clientes where codigo_cliente='$pega_codigo'";
	$query_agrupar1 = mysql_query($query_agrupar1);
	
	while($row_agrupar1 = mysql_fetch_array($query_agrupar1)){
		
		$lgn_muda = number_format($row_agrupar1['longitude_cad'], 3, '.', '');	
		$conta_conta++;
		if($conta_conta>=1 AND $conta_conta<=9){	
		$conta_conta_novo= str_pad($conta_conta, 2, '0', STR_PAD_LEFT);		
		$pega_lgn_altera = $lgn_muda . $conta_conta_novo;		
		} else {
		$pega_lgn_altera = $lgn_muda . $conta_conta;		
		}		
		$pega_codigo_geral = $row_agrupar1['codigo'];
		//echo $row_agrupar1['codigo_cliente']. '<br>' . $conta_conta. '<br>';	
		$query_adiciona_lgn = "UPDATE clientes SET longitude_cad='$pega_lgn_altera' WHERE codigo='$pega_codigo_geral'";															
		$rs_adiciona_lgn = mysql_query($query_adiciona_lgn);
		
	}
		
	
}
//////////////////////////////////////////////////////////////////////////////




$total = mysql_num_rows($rs3);


while($row3 = mysql_fetch_array($rs3)){
	
  $conta_x++;
  
  $codigo_cliente = $row3["codigo_cliente"];
  $nome = $row3["nome"];
  $endereco = $row3["endereco"];
  $cidade = $row3["cidade"];
  $estado = $row3["estado"];
  $bairro = $row3["bairro"];
  $cep = $row3["cep"];
  $endereco_cad= $row3["endereco_cad"];
  $latitude_cad= $row3["latitude_cad"];
  $longitude_cad= $row3["longitude_cad"];  
  $confianca_cad= $row3["confianca_cad"]; 
  $setor_cad= $row3["setor"];
  $peso = $row3["peso"];
  $volume = $row3["volume"];
  $valor = $row3["valor"];
  
  $premium = $row3["premium"];
  
 // echo $ativo_cad;

 // VERIFICA SE LAT OU LONG ESTAO VAZIAS /////
if($latitude_cad=="" OR $longitude_cad=="" OR $latitude_cad==NULL OR $longitude_cad==NULL){
	$conta_vazios++;
}

/////////////////////////////////////////////////////////////////
/*
if($endereco==""){
	?>
		<SCRIPT LANGUAGE="JavaScript" TYPE="text/javascript"> 
		alert("Cliente <?php echo $codigo_cliente; ?> sem endereço. Por favor, complete o cadastro de endereço e localize o ponto na Geocodificação Manual.");
		window.history.go(-1);

		</SCRIPT>
	<?php
	} else {
*/


		$search = mysql_query("SELECT * FROM db_geral WHERE codigo_cliente = '$codigo_cliente'");


		if(@mysql_num_rows($search) > 0){
			
		$sql = mysql_query("UPDATE db_geral SET codigo_cliente='$codigo_cliente', nome='$nome', endereco='$endereco', cidade='$cidade', estado='$estado', endereco_cad='$endereco_cad', latitude_cad='$latitude_cad', longitude_cad='$longitude_cad', confianca_cad='101', bairro='$bairro' WHERE codigo_cliente = '$codigo_cliente'");
		
		} else {
			
		// faz inserção
		$sql = mysql_query("INSERT INTO db_geral(codigo_cliente, nome, endereco, cidade, estado, cep, endereco_cad, latitude_cad, longitude_cad, confianca_cad, bairro) VALUES('$codigo_cliente', '$nome', '$endereco', '$cidade', '$estado', '$cep', '$endereco_cad', '$latitude_cad', '$longitude_cad', '101', '$bairro')");
		}
		
		
//	}

//// LOADING 0 A 100% ////////////////////////////////////////////////////
	$pega_loading = intval(($conta_x/$total)* 100) . "%";

    echo "<div style='position:absolute;margin:0px 0px 0px 0px;width:$pega_loading;height:40px;background:#2867b2;color:#2867b2;color: #FFFFFF;text-align:center;line-height:40px;'>$pega_loading</div>";
    flush();
    ob_flush();
	
//// LOADING 0 A 100% ////////////////////////////////////////////////////





}



///////////////////////////////////////
if($conta_vazios>0){
?>
	<SCRIPT LANGUAGE="JavaScript" TYPE="text/javascript"> 
	alert("Existem Geocodificações sem Latitude ou Longitude ou clientes sem endereço. Por favor, Geocodificar Manualmente esses pontos ou completo o cadastro de endereço.");
	window.history.go(-1);

	</SCRIPT>
<?php
} else {
	
?>
<SCRIPT LANGUAGE="JavaScript" TYPE="text/javascript"> 

window.location.href="step3.php";

</SCRIPT>

<?php	
}



break;
///////////////////


//////////SETOR AUTOMATICO POR CUSTO /////////////////////////////////////////////
case 'setor_auto_custo':


//ESVAZIA TODOS OS BANCOS//////////////////////////////
		
$query_where = "UPDATE passo SET ok='yes' WHERE id='3'";
$rs_where = mysql_query($query_where);

$query_where1 = "UPDATE passo SET ok='no' WHERE (id='4' OR id='5')";
$rs_where1 = mysql_query($query_where1);


$query = mysql_query("select * from veiculos");															

while($row = mysql_fetch_array($query)){
  $query2 = "UPDATE veiculos SET equipe=NULL, peso_total=NULL, volume_total=NULL, valor_total=NULL, ocupado='0', prioridade=Null where roteirizado!='sim'";
  $rs2= mysql_query($query2);
}
		

$query3 = mysql_query("select * from clientes");															

$conta = 0;
$total = mysql_num_rows($query3);
while($row3 = mysql_fetch_array($query3)){
	
  $conta++;	
  
  $query4 = "UPDATE clientes SET veiculo=NULL where roteirizado!='sim'";
  $rs4= mysql_query($query4);		
}
		
		
$lista_veiculos = array();
//$query3 = mysql_query("select * from clientes");															

$conta = 0;
$total = mysql_num_rows($query3);
		

///////////ESVAZIOU///////////////////////////////
		

/// QUAIS SETORES TEM CLIENTE ()LISTA////
$lista_setor=array();
		
$query_qualsetorativo = "select * from clientes where setor!='' GROUP BY setor";
$query_qualsetorativo= mysql_query($query_qualsetorativo);
		
while($row_ativo = mysql_fetch_array($query_qualsetorativo)){
	$setor_ativo = $row_ativo["setor"];
	//echo $setor_ativo;
	array_push($lista_setor, $setor_ativo);
	
	
	
}
/// QUAIS SETORES TEM CLIENTE ()LISTA////	

		
foreach ($lista_setor as $v) {
	
   // echo "SETOR:". $v . "<br>";
	
	///////////////////////////////////////////////////////////////////////////////////
	///VEICULOS SEPARADOS POR SETOR////////////////////////////////////////////////////
	$veiculos_setores = "select * from veiculos where setor='$v' AND roteirizado!='sim' order by custo ASC";
	$veiculos_setores= mysql_query($veiculos_setores);
	$allplayerdata = array();
	
	
	while($row_veiculos_setores = mysql_fetch_array($veiculos_setores)){
		
		 $nome = $row_veiculos_setores["nome"];
		 $setor = $row_veiculos_setores["setor"];
		 $peso = $row_veiculos_setores["peso"];
		 $volume = $row_veiculos_setores["volume"];
		 $valor = $row_veiculos_setores["valor"];
		 $custo = $row_veiculos_setores["custo"];
		 $codigo_veiculo = $row_veiculos_setores["id"];
		
		 $lista_veiculos = array($nome,$setor,$peso,$volume,$valor,$custo,$codigo_veiculo);
		 $allplayerdata[] = $lista_veiculos;
		
		
	}
	
//	print_r($allplayerdata);
//echo "<br><br>";
	
	///VEICULOS SEPARADOS POR SETOR////////////////////////////////////////////////////
	
	//PEGA CLIENTES DO SETOR E COLOCA NO ARRAY
	$clientes_setor = "select * from clientes where setor='$v' AND roteirizado!='sim' order by latitude_cad, longitude_cad, codigo_cliente, cep ASC";
	$clientes_setor= mysql_query($clientes_setor);
	$allplayerdata2 = array();
	
	
	while($row_clientes_setor = mysql_fetch_array($clientes_setor)){
		
		 $nome2 = $row_clientes_setor["nome"];
		 $codigo_cliente2 = $row_clientes_setor["codigo_cliente"];
		 $peso2 = $row_clientes_setor["peso"];
		 $volume2 = $row_clientes_setor["volume"];
		 $valor2 = $row_clientes_setor["valor"];
		
		
		 $lista_clientes = array($codigo_cliente2,$nome2,$peso2,$volume2,$valor2);
		 $allplayerdata2[] = $lista_clientes;
		
	}
//	print_r($allplayerdata2);
//	echo "<br>";

	$max2 = sizeof($allplayerdata2);
	
	$i2=0;
	
	$peso_veiculo = $allplayerdata[0][2];
	$peso_veiculo_sobra=0;
	
	$volume_veiculo = $allplayerdata[0][3];
	$volume_veiculo_sobra=0;
	
	$valor_veiculo = $allplayerdata[0][4];
	$valor_veiculo_sobra=0;
	
	while($i2 < $max2){
			
			$cod_escolhido = $allplayerdata2[$i2][0];
			$v_escolhido = $allplayerdata[0][6];
			
		
		if($peso_veiculo<=0 or $volume_veiculo<=0 or $valor_veiculo<=0){
			
			//echo "<font color='#ff0000'><font size='12'>"."VEICULO LOTOU!!!" . "</font></font><br>";
			//Removendo o primeiro elemento do vetor veiculo
			unset($allplayerdata[0]);
			//ORDENA O ARRAY NOVAMENTE
			$allplayerdata = array_values($allplayerdata);
			
			// ESVAZIOU A LISTA DE VEICULOS DO SETOR ////////////////////////////////////////////////////////////
			if(count($allplayerdata)==0){
			//echo  "<font color='#ff0000'><font size='12'>"."ACABARAM OS VEICULOS DO SETOR". "</font></font><br>";
			break;			
			} else {
			}
			////////////////////////////////////////////////////////////////////////////////////////////////////
			
			$peso_veiculo = $allplayerdata[0][2];
			$peso_veiculo_sobra=0;
			
			$volume_veiculo = $allplayerdata[0][3];
			$volume_veiculo_sobra=0;
			
			$valor_veiculo = $allplayerdata[0][4];
			$valor_veiculo_sobra=0;
			// NÃO PULA PARA O PROXIMO CLIENTE ////
			$i2;
			
		} else {
			
			$peso_veiculo = $peso_veiculo - $allplayerdata2[$i2][2];
			$peso_veiculo_sobra += $allplayerdata2[$i2][2];
			
			$volume_veiculo = $volume_veiculo - $allplayerdata2[$i2][3];
			$volume_veiculo_sobra += $allplayerdata2[$i2][3];
			
			$valor_veiculo = $valor_veiculo - $allplayerdata2[$i2][4];
			$valor_veiculo_sobra += $allplayerdata2[$i2][4];
			
			if($peso_veiculo<=0 or $volume_veiculo<=0 or $valor_veiculo<=0){
				$i2--;
			} else{
			// UPDATE NAS BASES CLIENTES E VEICULOS
			$update_cliente = mysql_query("UPDATE clientes SET veiculo='$v_escolhido', ocupado='1' WHERE codigo_cliente='$cod_escolhido'");
			$update_veiculo = mysql_query("UPDATE veiculos SET peso_total='$peso_veiculo_sobra',volume_total='$volume_veiculo_sobra',valor_total='$valor_veiculo_sobra', ocupado='1', equipe='yes' WHERE id='$v_escolhido'");
				
		
			}
		
		//	echo "<font color='#ff0000'>"."CLIENTE: " . $allplayerdata2[$i2][0] . "</font><br>";
		//	echo "VEICULO ESCOLHIDO: " . $allplayerdata[0][0] . "<br>";
		//	echo "PESO RESTANTE NO VEICULO: " . $peso_veiculo. "<br>";
		//	echo "VOLUME RESTANTE NO VEICULO: " . $volume_veiculo. "<br>";
		//	echo "VALOR RESTANTE NO VEICULO: " . $valor_veiculo. "<br>";
			$i2++;

		}
		
		
	}
		// ACABOU A LISTA DE CLIENTES
	
		if($max2==count($allplayerdata2)){
		
	//	echo  "<font color='#ff0000'><font size='12'>"."ACABARAM OS CLIENTES DO SETOR". "</font></font><br>";
			
		
			} else {
		
		}
		///////////////////////////////////////////
	
}

?>
<SCRIPT LANGUAGE="JavaScript" TYPE="text/javascript"> 

window.location.href="step3.php";

</SCRIPT>

<?php
break;
//////////SETOR AUTOMATICO POR CUSTO/////////////////////////////////////////////
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
//////////SETOR AUTOMATICO /////////////////////////////////////////////
case 'setor_auto':


?>

<body bgcolor="#000000">


<div style="height:100px; background-color:#000000; width:400px; position: relative; left: 50%; top: 50%; margin-left:-200px; margin-top:-50px">
  <div id="progress" style="position: absolute; left: 28px; top: 28px; width: 342px; height: 40px; background-color: #6f99d6; layer-background-color: #6f99d6; border: 1px none #000000; font-family:Arial, 'Helvetica Neue', Helvetica, sans-serif; font-size:12px">


<?php

$query = mysql_query("select * from veiculos");															

while($row = mysql_fetch_array($query)){
  $query2 = "UPDATE veiculos SET equipe=NULL, peso_total=NULL, volume_total=NULL, valor_total=NULL, ocupado='0'";
  $rs2= mysql_query($query2);
}

$query3 = mysql_query("select * from clientes");															

$conta = 0;
$total = mysql_num_rows($query3);
while($row3 = mysql_fetch_array($query3)){
	
  $conta++;	
  
  $query4 = "UPDATE clientes SET veiculo=NULL";
  $rs4= mysql_query($query4);

}





$query3 = "select * from clientes";															
$rs3 = mysql_query($query3);
$total = mysql_num_rows($rs3);
$conta_ae=0;
$conta_vazios=0;

///ABRE ////
while($row3 = mysql_fetch_array($rs3)){
	
  $conta_ae++;
	
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
  $setor_cad= $row3["setor"];

  $peso = $row3["peso"];
  $volume = $row3["volume"];
  $valor = $row3["valor"];
 // echo $ativo_cad;
 
 
  
if($latitude_cad=="" or $longitude_cad==""){
	$conta_vazios++;
}

	if($setor_cad==""){
	
	//echo "vazio";

	} else {
	
	$search_veiculo1 = "SELECT * FROM veiculos WHERE setor = '$setor_cad'";
	$dados1 = mysql_query($search_veiculo1);
	$quantos1 = mysql_num_rows($dados1);
//echo $quantos1;

if ($quantos1>1){

$search_veiculo = "SELECT * FROM veiculos WHERE setor = '$setor_cad' AND ativo='yes' order by peso ASC LIMIT 1";
$dados = mysql_query($search_veiculo);

////
	while($row_dados = mysql_fetch_array($dados)){

	$setor_do=$row_dados['setor'];
	$id_do_veiculo = $row_dados['id'];
	$ativo_cad= $row_dados["ativo"];
	$conta_peso_veiculo = $row_dados["peso_total"];
	$conta_volume_veiculo = $row_dados["volume_total"];
	$conta_valor_veiculo = $row_dados["valor_total"];
	
		if($ativo_cad=="yes"){
	
		$conta_peso_veiculo = $conta_peso_veiculo + $peso;
		$conta_volume_veiculo = $conta_volume_veiculo + $volume;
		$conta_valor_veiculo = $conta_valor_veiculo + $valor;

		$update_cliente = mysql_query("UPDATE clientes SET veiculo='$id_do_veiculo' WHERE setor='$setor_do'");

		$update_veiculo = mysql_query("UPDATE veiculos SET peso_total='$conta_peso_veiculo', volume_total='$conta_volume_veiculo', valor_total='$conta_valor_veiculo', equipe='yes', ocupado='1', setor='$setor_do' WHERE id='$id_do_veiculo'");
	
		}



	}	
	

} else {

	$search_veiculo = "SELECT * FROM veiculos WHERE setor = '$setor_cad'";
	$dados = mysql_query($search_veiculo);
	//$quantos = mysql_num_rows($dados);

$conta_peso_veiculo = 0;
$conta_volume_veiculo = 0;
$conta_valor_veiculo = 0;

////
	while($row_dados = mysql_fetch_array($dados)){

	$setor_do=$row_dados['setor'];
	$id_do_veiculo = $row_dados['id'];
	$ativo_cad= $row_dados["ativo"];
	$conta_peso_veiculo = $row_dados["peso_total"];
	$conta_volume_veiculo = $row_dados["volume_total"];
	$conta_valor_veiculo = $row_dados["valor_total"];
	////
		if($ativo_cad=="yes"){
	
		$conta_peso_veiculo = $conta_peso_veiculo + $peso;
		$conta_volume_veiculo = $conta_volume_veiculo + $volume;
		$conta_valor_veiculo = $conta_valor_veiculo + $valor;
		
 		//echo $conta_peso_veiculo . "<br>";
		$update_cliente = mysql_query("UPDATE clientes SET veiculo='$id_do_veiculo' WHERE setor='$setor_do'");

		$update_veiculo = mysql_query("UPDATE veiculos SET peso_total='$conta_peso_veiculo', volume_total='$conta_volume_veiculo', valor_total='$conta_valor_veiculo', equipe='yes', ocupado='1', setor='$setor_do' WHERE id='$id_do_veiculo'");
	
	

		}	
	/////
	}
/////	
}
//////

}



//// LOADING 0 A 100% ////////////////////////////////////////////////////
	$pega_loading = intval(($conta_ae/$total)* 100) . "%";

    echo "<div style='position:absolute;margin:0px 0px 0px 0px;width:$pega_loading;height:40px;background:#2867b2;color:#2867b2;color: #FFFFFF;text-align:center;line-height:40px;'>$pega_loading</div>";
    flush();
    ob_flush();
	
//// LOADING 0 A 100% ////////////////////////////////////////////////////



}
?>
<SCRIPT LANGUAGE="JavaScript" TYPE="text/javascript"> 

window.location.href="step3.php";

</SCRIPT>

<?php
break;
//////////SETOR AUTOMATICO /////////////////////////////////////////////


//////////CARGA AUTOMATICO /////////////////////////////////////////////
case 'carga_auto_veiculos':


//$server = mysql_connect($host, $usr, $pwd) or die ();
//$log = mysql_select_db($ddbb,$server) or die ();

//echo "<div id='progress' style='position:relative;padding:0px;width:450px;height:60px;left:25px;'>";
//for ($i = 1; $i <= 100; $i++) {
/*    sleep(1); //no bbdd... ;)
    //$ins = "INSERT ...";
    //$doins = mysql_query($ins) or die(mysql_error()); 
    echo "<div style='float:left;margin:5px 0px 0px 1px;width:2px;height:12px;background:red;color:red;'> </div>";
    flush();
    ob_flush();*/
//}
//echo "</div>";


/// MANIPULA A LONGITUDE DOS CLIENTES IGUAIS///
	$query_agrupar = "select * from clientes group by codigo_cliente";
	$query_agrupar = mysql_query($query_agrupar);
	
	
while($row_agrupar = mysql_fetch_array($query_agrupar)){
	
	$conta_conta = 0;

	$pega_codigo = $row_agrupar['codigo_cliente'];
	$pega_lgn = $row_agrupar['longitude_cad'];
	
	$query_agrupar1 = "select * from clientes where codigo_cliente='$pega_codigo'";
	$query_agrupar1 = mysql_query($query_agrupar1);
	
	while($row_agrupar1 = mysql_fetch_array($query_agrupar1)){
		
		$lgn_muda = number_format($row_agrupar1['longitude_cad'], 3, '.', '');	
		$conta_conta++;
		if($conta_conta>=1 AND $conta_conta<=9){			
		//$conta_conta_novo = strval($conta_conta);	
		$conta_conta_novo= str_pad($conta_conta, 2, '0', STR_PAD_LEFT);		
		$pega_lgn_altera = $lgn_muda . $conta_conta_novo;
		//echo $conta_conta_novo . "<br>";			
		} else {
		$pega_lgn_altera = $lgn_muda . $conta_conta;		
		}		
		$pega_codigo_geral = $row_agrupar1['codigo'];
		//echo $row_agrupar1['codigo_cliente']. '<br>' . $conta_conta. '<br>';	
		$query_adiciona_lgn = "UPDATE clientes SET longitude_cad='$pega_lgn_altera' WHERE codigo='$pega_codigo_geral'";															
		$rs_adiciona_lgn = mysql_query($query_adiciona_lgn);
		
	}
		
	
}
/// MANIPULA A LONGITUDE DOS CLIENTES IGUAIS///	
		
		
		
//  CONTROLE PASSO  //////////////////////////////////////////////////////////
$query_where = "UPDATE passo SET ok='yes' WHERE id='3' OR id='2'";
$rs_where = mysql_query($query_where);

$query_where1 = "UPDATE passo SET ok='no' WHERE (id='4' OR id='5')";
$rs_where1 = mysql_query($query_where1);
//  CONTROLE PASSO  //////////////////////////////////////////////////////////



//// ESVAZIA TUDO///////////////////////////////////////////////////////////
$query = "select * from veiculos";															
$rs = mysql_query($query);

	while($row = mysql_fetch_array($rs)){
  		$query2 = "UPDATE veiculos SET equipe=NULL, peso_total=NULL, volume_total=NULL, valor_total=NULL, ocupado=0, prioridade=NULL";
  		$rs2= mysql_query($query2);
	}

		$query_apaga = "select * from clientes where setor!='' order by setor";															
		$rs_apaga = mysql_query($query_apaga);

		$pega_setor= array();
		$result= array();
		$contando = 0;

	while($row_apaga = mysql_fetch_array($rs_apaga)){  
		$query4 = "UPDATE clientes SET veiculo=NULL, ocupado=0";
		$rs4= mysql_query($query4);
		$pega_setor[$contando] = $row_apaga["setor"];
		$result= array_keys(array_count_values($pega_setor));
		$contando++;  
	}
//// ESVAZIA TUDO///////////////////////////////////////////////////////////

$conta_qtos_setores = 0;
?>

<?php
///CADA SETOR WHILE ///////////////////////////////////////////////////////
while($conta_qtos_setores<count($result)){ 

//// LOADING 0 A 100% ////////////////////////////////////////////////////
$pega_loading = intval(($conta_qtos_setores/count($result))* 100) . "%";

    echo "<div style='position:absolute;margin:0px 0px 0px 0px;width:$pega_loading;height:40px;background:#2867b2;color:#2867b2;color: #FFFFFF;text-align:center;line-height:40px;'>$pega_loading</div>";
    flush();
    ob_flush();
	
//// LOADING 0 A 100% ////////////////////////////////////////////////////

//soma valores por setor/////////
$peso_por_setor = 0;
$volume_por_setor = 0;
$valor_por_setor = 0;

$conta_por_setor = 0;
$conta_por_setor1 = 0;

$pesocli_por_setor = array();
$idcli_por_setor = array();

$pesocli_por_setor1 =  array();
$idcli_por_setor1 =  array();

$peso_geral_por_setor=0;
$peso_geral_por_setor1=0;

//$peso_veiculo_atual=0;
echo "<strong>SETOR:</strong>" . $result[$conta_qtos_setores] . "<br>";

$soma_array_todos = 0;

$query_pega_valores_setor = "select * from clientes where setor='$result[$conta_qtos_setores]'";															
$rs_pega_valores_setor = mysql_query($query_pega_valores_setor);

while($row_setor = mysql_fetch_array($rs_pega_valores_setor)){
	$peso_por_setor += $row_setor["peso"];
	$volume_por_setor += $row_setor["volume"];
	$valor_por_setor += $row_setor["valor"];
	$conta_por_setor++;	
}





///APAGA PRIORIDADE VEICULOS JA OCUPADOS
//$query2 = mysql_query("UPDATE veiculos SET prioridade=null where ocupado='1' AND ativo='yes'");	
/////////////////////////////////////////

$query_veiculoz = "select * from veiculos where ocupado!='1' AND ativo='yes'";														
$rs_veiculoz = mysql_query($query_veiculoz);

//$total = mysql_num_rows($rs_veiculoz);
///ABRE ////

//////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////
//// PRIORIDADE DOS VEICULOS /////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////
$controle_porcentagem_array = array();
$controle_porcentagem_array_menor = array();
$conta_array = 0;

//echo $peso_sobrando_setor . " EITA " . "<br>";	


while($row_veiculoz = mysql_fetch_array($rs_veiculoz)){
			$id_veiculoz = $row_veiculoz["id"];	
			$peso_veiculoz = $row_veiculoz["peso"];
			$nome_veiculoz = $row_veiculoz["nome"];
			
			$ocupado_veiculoz = $row_veiculoz["ocupado"];
	
			$controle_do_pesoz = ($peso_por_setor/$peso_veiculoz)* 100;
			
			if($controle_do_pesoz<90){
				
					$controle_porcentagem_array_menor[$conta_array]['peso'] = $peso_veiculoz;
			
					$controle_porcentagem_array_menor[$conta_array]['valor'] = $controle_do_pesoz;
					$controle_porcentagem_array_menor[$conta_array]['id'] = $id_veiculoz;
					$controle_porcentagem_array_menor[$conta_array]['nome'] = $nome_veiculoz;
					$controle_porcentagem_array_menor[$conta_array]['ocupado'] = $ocupado_veiculoz;
			}
			else {
					$controle_porcentagem_array[$conta_array]['peso'] = $peso_veiculoz;					
					$controle_porcentagem_array[$conta_array]['valor'] = $controle_do_pesoz;
					$controle_porcentagem_array[$conta_array]['id'] = $id_veiculoz;	
					$controle_porcentagem_array[$conta_array]['nome'] = $nome_veiculoz;	
					$controle_porcentagem_array[$conta_array]['ocupado'] = $ocupado_veiculoz;
							
			}
			$conta_array ++;
}


// > 90
		usort($controle_porcentagem_array, function ($a, $b) {
    		return $a['valor'] > $b['valor'];
		});

// < 90
		usort($controle_porcentagem_array_menor, function ($c, $d) {
    		return $c['valor'] < $d['valor'];
		});
		


$junta_arrays = array_merge($controle_porcentagem_array, $controle_porcentagem_array_menor);

////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////
//// PRIORIDADE DOS VEICULOS /////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////
///FECHA ////




echo "<strong>PESO TOTAL DO SETOR:</strong>" . $peso_por_setor . "<br>";	


//$total = mysql_num_rows($rs_veiculo);
echo $total;


///LOOPING VEICULOS
for ($i = 0; $i < count($junta_arrays); $i++) {
 
 ///////////////////////////////////////////////////////////////////////////////////////////////
 ///////////////////////////////////////////////////////////////////////////////////////////////
 ///////////////////////////////////////////////////////////////////////////////////////////////
 	if($peso_sobrando_setor!= 0){
				
					for ($y = 0; $y < count($junta_arrays); $y++) {
			
					$peso_veiculoz = $junta_arrays[$y]['peso'];
					$id_veiculoz = $junta_arrays[$y]['id'];
					$nome_veiculoz =$junta_arrays[$y]['nome'];
					$valor_veiculoz = $junta_arrays[$y]['valor'];
	
					$ocupado_veiculoz = $junta_arrays[$y]["ocupado"];
	
					$controle_do_pesoz = ($peso_sobrando_setor/$peso_veiculoz)* 100;
					
					
							if($ocupado_veiculoz==0){
				
										if($controle_do_pesoz<90){
				
										$controle_porcentagem_array_menor[$y]['peso'] = $peso_veiculoz;
			
										$controle_porcentagem_array_menor[$y]['valor'] = $controle_do_pesoz;
										$controle_porcentagem_array_menor[$y]['id'] = $id_veiculoz;
										$controle_porcentagem_array_menor[$y]['nome'] = $nome_veiculoz;	
										$controle_porcentagem_array_menor[$y]['ocupado'] = $ocupado_veiculoz;	
							}
							else {
										$controle_porcentagem_array[$y]['peso'] = $peso_veiculoz;
					
										$controle_porcentagem_array[$y]['valor'] = $controle_do_pesoz;
										$controle_porcentagem_array[$y]['id'] = $id_veiculoz;	
										$controle_porcentagem_array[$y]['nome'] = $nome_veiculoz;	
										$controle_porcentagem_array[$y]['ocupado'] = $ocupado_veiculoz;	
									
							}
					
				
							}
							
							
					
				
					}
				
				
					// > 90
					usort($controle_porcentagem_array, function ($a, $b) {
    					return $a['valor'] > $b['valor'];
					});

					// < 90
					usort($controle_porcentagem_array_menor, function ($c, $d) {
    					return $c['valor'] < $d['valor'];
					});
		
		$junta_arrays = array_merge($controle_porcentagem_array, $controle_porcentagem_array_menor);
		if($i == 1){
			$i = 0;
		}
	//	print_r($junta_arrays);
		} 
	///////////////////////////////////////////////////////////////////////////////////////////////
	///////////////////////////////////////////////////////////////////////////////////////////////
	///////////////////////////////////////////////////////////////////////////////////////////////
	///////////////////////////////////////////////////////////////////////////////////////////////	
	$id_veiculo1 = $junta_arrays[$i]['id'];
	$nome_veiculo1 =$junta_arrays[$i]['nome'];
	$valor_veiculo1 = $junta_arrays[$i]['valor'];
	
	$peso_veiculo1 = $junta_arrays[$i]['peso'];
	
	$ocupado_veiculo1 = $junta_arrays[$i]["ocupado"];
	//echo $peso_veiculo1 . "<br>";
	
	
	$controle_do_peso1 = ($peso_por_setor/$peso_veiculo1)* 100;

	echo "<strong><font color='#F1080C'>" . $nome_veiculo1 . "</font></strong>- Peso:" . $peso_veiculo1;
	echo "<br>";
	echo $controle_do_peso1 . "%";	
	echo "<br>";

/// ABRE ////
//////////////////////////////////////////////////////////////
// UM VEICULO SÓ NO SETOR  ENTRE 90 E 100 PORCENTO////////////
//////////////////////////////////////////////////////////////

if($controle_do_peso1>= 90 AND $controle_do_peso1<= 100){
	//	echo "<strong>MELHOR VEICULO - ACABOU A CARGA DO SETOR COM 1 VEÍCULO</strong>";
//	echo "<br>";
		$junta_arrays[$i]['ocupado'] = '1';
		$update_veiculo = mysql_query("UPDATE veiculos SET equipe='yes', peso_total='$peso_por_setor', ocupado='1', setor='$result[$conta_qtos_setores]' WHERE id='$id_veiculo1'");
		$update_cliente = mysql_query("UPDATE clientes SET veiculo='$id_veiculo1', ocupado='1' WHERE setor='$result[$conta_qtos_setores]'");
		//echo "<br>";
		break;

}

//////////////////////////////////////////////////////////////
// UM VEICULO SÓ NO SETOR  ENTRE 90 E 100 PORCENTO////////////
//////////////////////////////////////////////////////////////
///FECHA ////






$soma_array = 0;
$soma_array_veiculo = 0;


///////////////////////////////////////////////////////////////
//////   MENOR QUE 90 PORCENTO  ///////////////////////////////
/////////////////////////////////////////////////////////////// 
///ABRE ////
if ($controle_do_peso1 < 90){
		
		//$query_pega_valores_setor = "select * from clientes where setor='$result[$conta_qtos_setores]' AND ocupado!='1' order by peso DESC;";
		
		$query_pega_valores_setor = "SELECT codigo_cliente as codigo ,Sum(peso) AS peso FROM clientes where setor='$result[$conta_qtos_setores]' AND ocupado!='1' GROUP BY codigo_cliente ORDER BY Sum(peso) DESC";														
		$rs_pega_valores_setor = mysql_query($query_pega_valores_setor);

		$peso_veiculo_atual = 0;
		///ABRE ////
		while($row_setor = mysql_fetch_array($rs_pega_valores_setor)){
		
		
		$idcli_por_setor[$conta_por_setor] = $row_setor["codigo"];
		//$peso_geral_por_setor = $row_setor["peso_total"];
			
		$soma_array_veiculo += $pesocli_por_setor[$conta_por_setor];
			
		$peso_veiculo_atual = $peso_veiculo1 - $soma_array;
	//	echo "PESO ATUAL DO VEICULO: " . $peso_veiculo_atual. "<br>";
			
		$pesocli_por_setor[$conta_por_setor] = $row_setor["peso"];
		//echo "PESO DO CLIENTE: " . $pesocli_por_setor[$conta_por_setor] . "<br>";
		
	
				///////////////////////////////////////////////////////////////
				/// NAO CABE NO VEICULO ///////////////////////////////////
				///////////////////////////////////////////////////////////////
				///ABRE ////
				if($peso_veiculo_atual<$pesocli_por_setor[$conta_por_setor]){
					//echo "<strong>NAO CABE NO VEICULO</strong>" . "<br>";
				///////////////////////////////////////////////////////////////	
				//PROXIMO CLIENTE///////////////////////////////////////////
				///////////////////////////////////////////////////////////////
				} else {
				/// CABE NO VEICULO //////////////////////////////////////////	
				///////////////////////////////////////////////////////////////
					$soma_array += $pesocli_por_setor[$conta_por_setor];					
					$soma_array_todos += $pesocli_por_setor[$conta_por_setor];
			

				//	echo "SOMA DOS CLIENTES: " . $soma_array;		
					$peso_sobrando = $peso_veiculo1 - $soma_array;
				///////////////////////////////////////////////////////////////
				/// RECUPERA VALOR SETOR ///////////////////////////////////
				///////////////////////////////////////////////////////////////
						///ABRE ////
						if($guarda_carga_setor!= 0){	
				//			echo "<br>";	
				//			echo "RECUPERA: " . $guarda_carga_setor;
					
							$peso_sobrando_setor = $guarda_carga_setor - $soma_array_todos;	
						} else {				
							$peso_sobrando_setor = $peso_por_setor - $soma_array_todos;
						}
						///FECHA ////
				//////////////////////////////////////////////////////////////
				///////////////////////////////////////////////////////////////
				///////////////////////////////////////////////////////////////
					echo "<br>";	
					echo "Sobra no veiculo:" . $peso_sobrando;
					echo "<br>";
			
			
					echo "Sobra no setor:" . $peso_sobrando_setor;
					echo "<br>";
						///////////////////////////////////////////////////////////////
						/////////VEICULO CHEIO ////////////////////////////////////////
						///////////////////////////////////////////////////////////////
						///ABRE ////
						if($peso_sobrando==0){
						/*	echo "<strong>ACABOU A CARGA DO VEICULO!</strong>";
							echo "<br>";
							echo "<br>";*/
							
							$junta_arrays[$i]['ocupado'] = '1';
							$update_veiculo = mysql_query("UPDATE veiculos SET equipe='yes', peso_total='$soma_array', ocupado='1', setor='$result[$conta_qtos_setores]' WHERE id='$id_veiculo1'");
							$update_cliente = mysql_query("UPDATE clientes SET veiculo='$id_veiculo1', ocupado='1' WHERE codigo_cliente='$idcli_por_setor[$conta_por_setor]'");
							$peso_veiculo_atual = 0;
						/////////////////////////////////// ////////////////////////////
						//////////////PROXIMO VEICULO, ESSE TA CHEIO ////////////////////
						/////////////////////////////////////////////////////////////////
							break;
				
						} else {
						//$guarda_carga_setor = $peso_sobrando_setor;
			  				
						$junta_arrays[$i]['ocupado'] = '1';
						$update_veiculo = mysql_query("UPDATE veiculos SET equipe='yes', peso_total='$soma_array', ocupado='1', setor='$result[$conta_qtos_setores]' WHERE id='$id_veiculo1'");
						$update_cliente = mysql_query("UPDATE clientes SET veiculo='$id_veiculo1', ocupado='1' WHERE codigo_cliente='$idcli_por_setor[$conta_por_setor]'");
						}
						///FECHA ////
						///////////////////////////////////////////////////////////////
						///////////////////////////////////////////////////////////////
						///////////////////////////////////////////////////////////////
								
		  }
		  
						  
	
		
			
	
	  } 


								///ABRE ////
 								if($peso_sobrando_setor!= 0){
				
										echo $guarda_sobra_setor;
										echo "<strong>NAO ACABOU A CARGA DO SETOR</strong>";
				
										echo "<br>";
										echo "<br>";		
								} else {
										$guarda_carga_setor = 0;
										echo "<strong>ACABOU A CARGA DO SETOR (MENOR QUE 90%)</strong>";
										echo "<br>";
										echo "<br>";
										echo "<strong>ULTIMO VEICULO DO SETOR - ACABOU A CARGA DO SETOR COM ESSE VEÍCULO</strong>";
										echo "<br>";
										break;	
								}	
								///FECHA ////
	
	
	
	
}


	
///////////////////////////////////////////////////////////////
//////   FINAL MENOR QUE 90 PORCENTO  /////////////////////////
///////////////////////////////////////////////////////////////



///ABRE ////			
///////////////////////////////////////////////////////////////
//////   MAIOR QUE 100 PORCENTO  //////////////////////////////
///////////////////////////////////////////////////////////////

if($controle_do_peso1 > 100){
		//$query_pega_valores_setor = "select * from clientes where setor='$result[$conta_qtos_setores]' AND ocupado!='1' order by peso DESC";		
		$query_pega_valores_setor = "SELECT codigo_cliente as codigo, Sum(peso) AS peso FROM clientes where setor='$result[$conta_qtos_setores]' AND ocupado!='1' GROUP BY codigo_cliente ORDER BY Sum(peso) DESC";
															
		$rs_pega_valores_setor = mysql_query($query_pega_valores_setor);

		$peso_veiculo_atual = 0;
		

		///ABRE ////
		while($row_setor = mysql_fetch_array($rs_pega_valores_setor)){
	
			$idcli_por_setor[$conta_por_setor] = $row_setor["codigo"];
			//$peso_geral_por_setor = $row_setor["peso_total"];
			
			$soma_array_veiculo += $pesocli_por_setor[$conta_por_setor];
			
			$peso_veiculo_atual = $peso_veiculo1 - $soma_array;
			echo "PESO ATUAL DO VEICULO: " . $peso_veiculo_atual. "<br>";
			
			$pesocli_por_setor[$conta_por_setor] = $row_setor["peso"];
			echo "PESO DO CLIENTE: " . $pesocli_por_setor[$conta_por_setor] . "<br>";
			
			
			
				/// NAO CABE NO VEICULO ///////////////////////////////////
				///////////////////////////////////////////////////////////////
				///ABRE ////
				if($peso_veiculo_atual<$pesocli_por_setor[$conta_por_setor]){
					echo "<strong>NAO CABE NO VEICULO</strong>" . "<br>";

				//PROXIMO CLIENTE///////////////////////////////////////////
				///////////////////////////////////////////////////////////////
				} else {
				/// CABE NO VEICULO //////////////////////////////////////////
				///////////////////////////////////////////////////////////////
					$soma_array += $pesocli_por_setor[$conta_por_setor];					
					$soma_array_todos += $pesocli_por_setor[$conta_por_setor];
			

					echo "SOMA DOS CLIENTES: " . $soma_array;		
					$peso_sobrando = $peso_veiculo1 - $soma_array;
			
				/// RECUPERA VALOR SETOR ///////////////////////////////////
				///////////////////////////////////////////////////////////////
						///ABRE ////
						if($guarda_carga_setor!= 0){	
							echo "<br>";	
							echo "RECUPERA: " . $guarda_carga_setor;
					
							$peso_sobrando_setor = $guarda_carga_setor - $soma_array_todos;	
						} else {				
							$peso_sobrando_setor = $peso_por_setor - $soma_array_todos;
						}
						///FECHA ////
				//////////////////////////////////////////////////////////////
				///////////////////////////////////////////////////////////////
				
					echo "<br>";	
					echo "Sobra no veiculo:" . $peso_sobrando;
					echo "<br>";
			
			
					echo "Sobra no setor:" . $peso_sobrando_setor;
					echo "<br>";
						///////////////////////////////////////////////////////////////
						/////////VEICULO CHEIO ////////////////////////////////////////
						///////////////////////////////////////////////////////////////
						///ABRE ////
						if($peso_sobrando==0){
							echo "<strong>ACABOU A CARGA DO VEICULO!</strong>";
							echo "<br>";
							echo "<br>";
							
							$junta_arrays[$i]['ocupado'] = '1';
							$update_veiculo = mysql_query("UPDATE veiculos SET equipe='yes', peso_total='$soma_array', ocupado='1', setor='$result[$conta_qtos_setores]' WHERE id='$id_veiculo1'");
							$update_cliente = mysql_query("UPDATE clientes SET veiculo='$id_veiculo1', ocupado='1' WHERE codigo_cliente='$idcli_por_setor[$conta_por_setor]'");
							
							$peso_veiculo_atual = 0;
							
							
							
						///////////////////////////////////////////////////////////////
						//////////////PROXIMO VEICULO, ESSE TA CHEIO ////////////////////
						/////////////////////////////////////////////////////////////////
							break;
				
						} else {
							//$guarda_carga_setor = $peso_sobrando_setor;
			  				echo "<strong>NÃO ACABOU A CARGA DO VEICULO!</strong>";
							echo "<br>";
							$junta_arrays[$i]['ocupado'] = '1';
							$update_veiculo = mysql_query("UPDATE veiculos SET equipe='yes', peso_total='$soma_array', ocupado='1', setor='$result[$conta_qtos_setores]' WHERE id='$id_veiculo1'");
							$update_cliente = mysql_query("UPDATE clientes SET veiculo='$id_veiculo1', ocupado='1' WHERE codigo_cliente='$idcli_por_setor[$conta_por_setor]'");
						}
							
							
						///FECHA ////
						///////////////////////////////////////////////////////////////
						///////////////////////////////////////////////////////////////
						///////////////////////////////////////////////////////////////
						
	
		  }
		  ///FECHA ////
		  						
								///ABRE ////
		  						if($peso_sobrando_setor!= 0 ){
				
										//echo $guarda_sobra_setor;
										echo "<strong>NAO ACABOU A CARGA DO SETOR</strong>";			
										echo "<br>";
										
		
												
								} else {
										//$guarda_carga_setor = 0;
										echo "<strong>ACABOU A CARGA DO SETOR (MAIOR QUE 100%)</strong>";
										echo "<br>";
										echo "<br>";
							
						
										break;
										
								}	
								///FECHA ////	
								
					
 } 
///FECHA ////	

		
			if($peso_sobrando_setor== 0){
				//break;	
			}
			

///////////////////////////////////////////////////////////////
//////  FINAL MAIOR QUE 100 PORCENTO  /////////////////////////
///////////////////////////////////////////////////////////////
///FECHA ////
}



///////////////////////////////////////////

$conta_array=0;
$controle_porcentagem_array = array();
$controle_porcentagem_array_menor = array();

	
		
			
//////FINAL LOOPING ARRAY VEICULOS
}


$conta_qtos_setores++;
}
///FECHA FINAL LOOPING SETOR////


?>

<?php
/*

$query_veiculo = "SELECT * from veiculos where ocupado!='1' AND ativo='yes' order by prioridade ASC";
$rs_veiculo = mysql_query($query_veiculo);

///ABRE ////
while($row_veiculo = mysql_fetch_array($rs_veiculo)){
	
$id_veiculo = $row_veiculo["id"];
$nome_veiculo = $row_veiculo["nome"];
$peso_veiculo = $row_veiculo["peso"];



echo "<strong>PESO TOTAL DO SETOR:</strong>" . $peso_por_setor;	
$controle_do_peso = intval(($peso_por_setor/$peso_veiculo)* 100);

echo "<br>";

echo "<strong><font color='#F1080C'>" . $nome_veiculo . "</font></strong>- Peso:" . $peso_veiculo;
echo "<br>";
echo $controle_do_peso . "%";	
echo "<br>";


//////////////////////////////////////////////////////////////
// UM VEICULO SÓ NO SETOR  ENTRE 90 E 100 PORCENTO////////////
//////////////////////////////////////////////////////////////
///ABRE ////
if($controle_do_peso>= 90 AND $controle_do_peso<= 100){
		echo "<strong>MELHOR VEICULO - ACABOU A CARGA DO SETOR COM 1 VEÍCULO</strong>";
		echo "<br>";

//		$update_veiculo = mysql_query("UPDATE veiculos SET equipe='yes', peso_total='$peso_por_setor', ocupado='1', setor='$result[$conta_qtos_setores]' WHERE id='$id_veiculo'");
//		$update_cliente = mysql_query("UPDATE clientes SET veiculo='$id_veiculo', ocupado='1' WHERE setor='$result[$conta_qtos_setores]'");
		//echo "<br>";
		break;

}
///FECHA ////

$soma_array = 0;
$soma_array_veiculo = 0;

///////////////////////////////////////////////////////////////
//////   MENOR QUE 90 PORCENTO  ///////////////////////////////
/////////////////////////////////////////////////////////////// 
///ABRE ////
if ($controle_do_peso < 90){
		
		//$query_pega_valores_setor = "select * from clientes where setor='$result[$conta_qtos_setores]' AND ocupado!='1' order by peso DESC;";
		
		$query_pega_valores_setor = "SELECT codigo_cliente as codigo ,Sum(peso) AS peso FROM clientes where setor='$result[$conta_qtos_setores]' AND ocupado!='1' GROUP BY codigo_cliente ORDER BY Sum(peso) DESC";														
		$rs_pega_valores_setor = mysql_query($query_pega_valores_setor);

		$peso_veiculo_atual = 0;
		///ABRE ////
		while($row_setor = mysql_fetch_array($rs_pega_valores_setor)){
		
		
		$idcli_por_setor[$conta_por_setor] = $row_setor["codigo"];
		//$peso_geral_por_setor = $row_setor["peso_total"];
			
		$soma_array_veiculo += $pesocli_por_setor[$conta_por_setor];
			
		$peso_veiculo_atual = $peso_veiculo - $soma_array;
		echo "PESO ATUAL DO VEICULO: " . $peso_veiculo_atual. "<br>";
			
		$pesocli_por_setor[$conta_por_setor] = $row_setor["peso"];
		echo "PESO DO CLIENTE: " . $pesocli_por_setor[$conta_por_setor] . "<br>";
		
		
		//$update_veiculo_listado1 = mysql_query("UPDATE veiculos SET prioridade='$controle_do_pesox' WHERE id='$id_veiculoz'");
				///////////////////////////////////////////////////////////////
				/// NAO CABE NO VEICULO ///////////////////////////////////
				///////////////////////////////////////////////////////////////
				///ABRE ////
				if($peso_veiculo_atual<$pesocli_por_setor[$conta_por_setor]){
					echo "<strong>NAO CABE NO VEICULO</strong>" . "<br>";
				///////////////////////////////////////////////////////////////	
				//PROXIMO CLIENTE///////////////////////////////////////////
				///////////////////////////////////////////////////////////////
				} else {
				/// CABE NO VEICULO //////////////////////////////////////////
				///////////////////////////////////////////////////////////////
					$soma_array += $pesocli_por_setor[$conta_por_setor];					
					$soma_array_todos += $pesocli_por_setor[$conta_por_setor];
			

				//	echo "SOMA DOS CLIENTES: " . $soma_array;		
					$peso_sobrando = $peso_veiculo - $soma_array;
				///////////////////////////////////////////////////////////////
				/// RECUPERA VALOR SETOR ///////////////////////////////////
				///////////////////////////////////////////////////////////////
						///ABRE ////
						if($guarda_carga_setor!= 0){	
				//			echo "<br>";	
				//			echo "RECUPERA: " . $guarda_carga_setor;
					
							$peso_sobrando_setor = $guarda_carga_setor - $soma_array_todos;	
						} else {				
							$peso_sobrando_setor = $peso_por_setor - $soma_array_todos;
						}
						///FECHA ////
				//////////////////////////////////////////////////////////////
				///////////////////////////////////////////////////////////////
				///////////////////////////////////////////////////////////////
					echo "<br>";	
					echo "Sobra no veiculo:" . $peso_sobrando;
					echo "<br>";
			
			
					echo "Sobra no setor:" . $peso_sobrando_setor;
					echo "<br>";
						///////////////////////////////////////////////////////////////
						/////////VEICULO CHEIO ////////////////////////////////////////
						///////////////////////////////////////////////////////////////
						///ABRE ////
						if($peso_sobrando==0){
							echo "<strong>ACABOU A CARGA DO VEICULO!</strong>";
							echo "<br>";
							echo "<br>";
							
				
					//		$update_veiculo = mysql_query("UPDATE veiculos SET equipe='yes', peso_total='$soma_array', ocupado='1', setor='$result[$conta_qtos_setores]' WHERE id='$id_veiculo'");
					//		$update_cliente = mysql_query("UPDATE clientes SET veiculo='$id_veiculo', ocupado='1' WHERE codigo_cliente='$idcli_por_setor[$conta_por_setor]'");
							$peso_veiculo_atual = 0;
						///////////////////////////////////////////////////////////////
						//////////////PROXIMO VEICULO, ESSE TA CHEIO ////////////////////
						/////////////////////////////////////////////////////////////////
							break;
				
						} else {
						//$guarda_carga_setor = $peso_sobrando_setor;
			  				
	
				//		$update_veiculo = mysql_query("UPDATE veiculos SET equipe='yes', peso_total='$soma_array', ocupado='1', setor='$result[$conta_qtos_setores]' WHERE id='$id_veiculo'");
				//		$update_cliente = mysql_query("UPDATE clientes SET veiculo='$id_veiculo', ocupado='1' WHERE codigo_cliente='$idcli_por_setor[$conta_por_setor]'");
						}
						///FECHA ////
						///////////////////////////////////////////////////////////////
						///////////////////////////////////////////////////////////////
						///////////////////////////////////////////////////////////////
								
		  }
		  
						  
	
		
			
	
	  } 


								///ABRE ////
 								if($peso_sobrando_setor!= 0){
				
										//echo $guarda_sobra_setor;
										echo "<strong>NAO ACABOU A CARGA DO SETOR</strong>";
				
										echo "<br>";
										//echo "<br>";		
								} else {
										$guarda_carga_setor = 0;
										echo "<strong>ACABOU A CARGA DO SETOR (MENOR QUE 90%)</strong>";
										echo "<br>";
									//	echo "<br>";
										echo "<strong>ULTIMO VEICULO DO SETOR - ACABOU A CARGA DO SETOR COM ESSE VEÍCULO</strong>";
										echo "<br>";
										break;	
								}	
								///FECHA ////
	
	
	
	
}


	
///////////////////////////////////////////////////////////////
//////   FINAL MENOR QUE 90 PORCENTO  /////////////////////////
///////////////////////////////////////////////////////////////


			
///////////////////////////////////////////////////////////////
//////   MAIOR QUE 100 PORCENTO  //////////////////////////////
///////////////////////////////////////////////////////////////
///ABRE ////
if($controle_do_peso > 100){
		//$query_pega_valores_setor = "select * from clientes where setor='$result[$conta_qtos_setores]' AND ocupado!='1' order by peso DESC";		
		$query_pega_valores_setor = "SELECT codigo_cliente as codigo, Sum(peso) AS peso FROM clientes where setor='$result[$conta_qtos_setores]' AND ocupado!='1' GROUP BY codigo_cliente ORDER BY Sum(peso) DESC";
															
		$rs_pega_valores_setor = mysql_query($query_pega_valores_setor);

		$peso_veiculo_atual = 0;
		

		///ABRE ////
		while($row_setor = mysql_fetch_array($rs_pega_valores_setor)){
	
			$idcli_por_setor[$conta_por_setor] = $row_setor["codigo"];
			//$peso_geral_por_setor = $row_setor["peso_total"];
			
			$soma_array_veiculo += $pesocli_por_setor[$conta_por_setor];
			
			$peso_veiculo_atual = $peso_veiculo - $soma_array;
			echo "PESO ATUAL DO VEICULO: " . $peso_veiculo_atual. "<br>";
			
			$pesocli_por_setor[$conta_por_setor] = $row_setor["peso"];
			echo "PESO DO CLIENTE: " . $pesocli_por_setor[$conta_por_setor] . "<br>";
			
			
			
				/// NAO CABE NO VEICULO ///////////////////////////////////
				///////////////////////////////////////////////////////////////
				///ABRE ////
				if($peso_veiculo_atual<$pesocli_por_setor[$conta_por_setor]){
					echo "<strong>NAO CABE NO VEICULO</strong>" . "<br>";
					
				//PROXIMO CLIENTE///////////////////////////////////////////
				///////////////////////////////////////////////////////////////
				} else {
				/// CABE NO VEICULO //////////////////////////////////////////
				///////////////////////////////////////////////////////////////
					$soma_array += $pesocli_por_setor[$conta_por_setor];					
					$soma_array_todos += $pesocli_por_setor[$conta_por_setor];
			

				///	echo "SOMA DOS CLIENTES: " . $soma_array;		
					$peso_sobrando = $peso_veiculo - $soma_array;
			
				/// RECUPERA VALOR SETOR ///////////////////////////////////
				///////////////////////////////////////////////////////////////
						///ABRE ////
						if($guarda_carga_setor!= 0){	
					//		echo "<br>";	
					//		echo "RECUPERA: " . $guarda_carga_setor;
					
							$peso_sobrando_setor = $guarda_carga_setor - $soma_array_todos;	
						} else {				
							$peso_sobrando_setor = $peso_por_setor - $soma_array_todos;
						}
						///FECHA ////
				//////////////////////////////////////////////////////////////
				///////////////////////////////////////////////////////////////
				
				//	echo "<br>";	
					echo "Sobra no veiculo:" . $peso_sobrando;
					echo "<br>";
			
			
					echo "Sobra no setor:" . $peso_sobrando_setor;
					echo "<br>";
						///////////////////////////////////////////////////////////////
						/////////VEICULO CHEIO ////////////////////////////////////////
						///////////////////////////////////////////////////////////////
						///ABRE ////
						if($peso_sobrando==0){
							echo "<strong>ACABOU A CARGA DO VEICULO!</strong>";
							echo "<br>";
						//	echo "<br>";
							
				
						//	$update_veiculo = mysql_query("UPDATE veiculos SET equipe='yes', peso_total='$soma_array', ocupado='1', setor='$result[$conta_qtos_setores]' WHERE id='$id_veiculo'");
					//		$update_cliente = mysql_query("UPDATE clientes SET veiculo='$id_veiculo', ocupado='1' WHERE codigo_cliente='$idcli_por_setor[$conta_por_setor]'");
							
							$peso_veiculo_atual = 0;
							
							
							
						///////////////////////////////////////////////////////////////
						//////////////PROXIMO VEICULO, ESSE TA CHEIO ////////////////////
						/////////////////////////////////////////////////////////////////
							break;
				
						} else {
							//$guarda_carga_setor = $peso_sobrando_setor;
			  				
	
						//	$update_veiculo = mysql_query("UPDATE veiculos SET equipe='yes', peso_total='$soma_array', ocupado='1', setor='$result[$conta_qtos_setores]' WHERE id='$id_veiculo'");
					//		$update_cliente = mysql_query("UPDATE clientes SET veiculo='$id_veiculo', ocupado='1' WHERE codigo_cliente='$idcli_por_setor[$conta_por_setor]'");
						}
						///FECHA ////
						///////////////////////////////////////////////////////////////
						///////////////////////////////////////////////////////////////
						///////////////////////////////////////////////////////////////
						
	
		  }
		  ///FECHA ////
		  						
										///ABRE ////
		  						if($peso_sobrando_setor!= 0){
				
										//echo $guarda_sobra_setor;
										echo "<strong>NAO ACABOU A CARGA DO SETOR</strong>";			
										echo "<br>";
										
		
												
								} else {
										//$guarda_carga_setor = 0;
										echo "<strong>ACABOU A CARGA DO SETOR (MAIOR QUE 100%)</strong>";
										echo "<br>";
						
										break;
										
								}	
								///FECHA ////	
								
								
	 } 
	///FECHA ////				
	
	


			

	
	
///////////////////////////////////////////////////////////////
//////  FINAL MAIOR QUE 100 PORCENTO  /////////////////////////
///////////////////////////////////////////////////////////////

} 

	

///FECHA ////
	

} 



echo "<font color='#F1080C'>OS VEICULOS ACABARAM</font>";
echo "<br>";
///////////////////////////////////////////
$conta_qtos_setores++;

*/



$query3 = "select * from clientes";															
$rs3 = mysql_query($query3);

$conta_vazios=0;

///ABRE ////
while($row3 = mysql_fetch_array($rs3)){
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
  $setor_cad= $row3["setor"];

  $peso = $row3["peso"];
  $volume = $row3["volume"];
  $valor = $row3["valor"];
 // echo $ativo_cad;
 
 
  
if($latitude_cad=="" or $longitude_cad==""){
	$conta_vazios++;
}

	if($setor_cad==""){
	
	//echo "vazio";

	} else {
	
	$search_veiculo1 = "SELECT * FROM veiculos WHERE setor = '$setor_cad'";
	$dados1 = mysql_query($search_veiculo1);
	$quantos1 = mysql_num_rows($dados1);
//echo $quantos1;

if ($quantos1>1){

$search_veiculo = "SELECT * FROM veiculos WHERE setor = '$setor_cad' AND ativo='yes' LIMIT 1";
$dados = mysql_query($search_veiculo);


	while($row_dados = mysql_fetch_array($dados)){

	$setor_do=$row_dados['setor'];
	$id_do_veiculo = $row_dados['id'];
	$ativo_cad= $row_dados["ativo"];
	$conta_peso_veiculo = $row_dados["peso_total"];
	$conta_volume_veiculo = $row_dados["volume_total"];
	$conta_valor_veiculo = $row_dados["valor_total"];
	
		if($ativo_cad=="yes"){
	
		$conta_peso_veiculo = $conta_peso_veiculo + $peso;
		$conta_volume_veiculo = $conta_volume_veiculo + $volume;
		$conta_valor_veiculo = $conta_valor_veiculo + $valor;

		$update_cliente = mysql_query("UPDATE clientes SET veiculo='$id_do_veiculo' WHERE setor='$setor_do'");

		$update_veiculo = mysql_query("UPDATE veiculos SET peso_total='$conta_peso_veiculo', volume_total='$conta_volume_veiculo', valor_total='$conta_valor_veiculo', equipe='yes' WHERE id='$id_do_veiculo'");
	
		}



	}	
	

} else {

	$search_veiculo = "SELECT * FROM veiculos WHERE setor = '$setor_cad'";
	$dados = mysql_query($search_veiculo);
	//$quantos = mysql_num_rows($dados);

$conta_peso_veiculo = 0;
$conta_volume_veiculo = 0;
$conta_valor_veiculo = 0;


	while($row_dados = mysql_fetch_array($dados)){

	$setor_do=$row_dados['setor'];
	$id_do_veiculo = $row_dados['id'];
	$ativo_cad= $row_dados["ativo"];
	$conta_peso_veiculo = $row_dados["peso_total"];
	$conta_volume_veiculo = $row_dados["volume_total"];
	$conta_valor_veiculo = $row_dados["valor_total"];
	
		if($ativo_cad=="yes"){
	
		$conta_peso_veiculo = $conta_peso_veiculo + $peso;
		$conta_volume_veiculo = $conta_volume_veiculo + $volume;
		$conta_valor_veiculo = $conta_valor_veiculo + $valor;
		
 		//echo $conta_peso_veiculo . "<br>";
		$update_cliente = mysql_query("UPDATE clientes SET veiculo='$id_do_veiculo' WHERE setor='$setor_do'");

		$update_veiculo = mysql_query("UPDATE veiculos SET peso_total='$conta_peso_veiculo', volume_total='$conta_volume_veiculo', valor_total='$conta_valor_veiculo', equipe='yes' WHERE id='$id_do_veiculo'");
	
	

		}	
	
	}
	
}




}

/////////////////////////////////////////////////////////////////


/*$search = mysql_query("SELECT * FROM db_geral WHERE codigo_cliente = '$codigo_cliente'");


if(@mysql_num_rows($search) > 0){
	
$sql = mysql_query("UPDATE db_geral SET codigo_cliente='$codigo_cliente', nome='$nome', endereco='$endereco', cidade='$cidade', estado='$estado', endereco_cad='$endereco_cad', latitude_cad='$latitude_cad', longitude_cad='$longitude_cad', confianca_cad='101'  WHERE codigo_cliente = '$codigo_cliente' AND endereco='$endereco'");

} else {
	
// faz inserção
$sql = mysql_query("INSERT INTO db_geral(codigo_cliente, nome, endereco, cidade, estado, cep, endereco_cad, latitude_cad, longitude_cad, confianca_cad) VALUES('$codigo_cliente', '$nome', '$endereco', '$cidade', '$estado', '$cep', '$endereco_cad', '$latitude_cad', '$longitude_cad', '101')");
}
*/


}
///FECHA ////
if($conta_vazios>0){
?>
	<SCRIPT LANGUAGE="JavaScript" TYPE="text/javascript"> 
	alert("Existem Geocodificações sem Latitude ou Longitude. Por favor, Geocodificar Manualmente esses pontos.");
	window.history.go(-1);

	</SCRIPT>
<?php
} else {
	
?>
<SCRIPT LANGUAGE="JavaScript" TYPE="text/javascript"> 

//window.location.href="step3.php";

</SCRIPT>

<?php	
}



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
$new_end = addslashes($_POST["new_end"]);
$endereco = addslashes($_POST["endereco_x"]);
$codigo = $_POST["codigo"];
//echo $reg;
//echo $new_end;

$new_end = str_replace("'"," ",$new_end);
$endereco =str_replace("'"," ",$endereco);

$new_end = str_replace("/"," ",$new_end);
$endereco =str_replace("/"," ",$endereco);

$new_end = str_replace(";"," ",$new_end);
$endereco =str_replace(";"," ",$endereco);

$query = "select * from clientes where codigo_cliente='$reg'";															
$rs = mysql_query($query);
$new_lgn_mais = "";
while($row = mysql_fetch_array($rs)){
	$confianca = $row["confianca_cad"];
	//echo $nome;
	$new_lgn_mais = $new_lgn . $codigo;
	//echo $new_lgn_mais;
  $query2 = "UPDATE clientes SET endereco_cad='$new_end', latitude_cad='$new_lat', longitude_cad='$new_lgn_mais', confianca_cad='101', geo_manual='yes' WHERE codigo_cliente = '$reg'";
  $rs2= mysql_query($query2);

  
  $query3 = "UPDATE db_geral SET endereco_cad='$new_end', latitude_cad='$new_lat', longitude_cad='$new_lgn_mais', confianca_cad='101' WHERE codigo_cliente = '$reg'";
  $rs3= mysql_query($query3);
  

  
}
if($confianca<= 50){
	$faixa = "red";
}
if($confianca> 50 AND $confianca< 90){
	$faixa = "orange";
}
if($confianca>= 90 AND $confianca< 101){
	$faixa = "green";
}
if($confianca== 101){
$faixa = "blue";
	
}
?>
<SCRIPT LANGUAGE="JavaScript" TYPE="text/javascript"> 
//alert("DADOS ATUALIZADOS COM SUCESSO!");
window.location.href="step2.php?lista=<?php echo $faixa; ?>"
//window.history.go(-1);
//window.parent.document.getElementById('Pagina').style.display = 'none';

//window.parent.location.href = window.parent.location.href; 
</SCRIPT>

<?php

break;


////////////// ALTERAR LOCALIZACAO DE ENTREGA ////////////////////////////////

case 'altera_localizacao_entrega':

    //$id= $_POST['quais'];
    $lat_lgn = $_POST['RadioGroup1'];
    $campo = $_POST['check_list'];
    $conta_lista = count($campo);

	$pieces = explode(",", $lat_lgn);


//	echo $pieces[0];
//	echo $pieces[1];
    //echo $conta_lista;

    for ($i = 0; $i <= $conta_lista; $i++) {
        $query2 = "UPDATE clientes SET latitude_cad='$pieces[0]', longitude_cad='$pieces[1]' where codigo_pedido='$campo[$i]'";
        $rs2 = mysql_query($query2);
    
    }
    
   
    
    
        ?>
    <table width="100%" height="100%" style="background-color:#FFF; vertical-align: middle; text-align: center">
        <tr height="80px"  style="font-family:Arial; font-size: 11px;">
        <td><img src="imgs/ok.PNG"/>
            <br>  <br>
        <strong>LOCALIZAÇÃO ALTERADA COM SUCESSO!</strong>
            </td>
        </tr>
    
    </table>
    <SCRIPT LANGUAGE="JavaScript" TYPE="text/javascript">
        //  window.location.href = "step2_sm_l.php";
		
    //alert("MENSAGEM: EQUIPE CADDESIGN\nLogin alterado com sucesso!");
	 
        setTimeout(parent.location.reload(), 100000);
        
        </SCRIPT>
    
        <?php
    
        break;
    
////////////// ALTERAR LOCALIZACAO DE ENTREGA ////////////////////////////////
            

///////////////////
case 'editar_cliente_bd':

$cod_cliente = $_POST["cod_cliente"];
$nome_cliente= $_POST["nome_cliente"];
$endereco_cliente= $_POST["endereco"];		
$cidade_cliente= $_POST["cidade"];
$uf_cliente= $_POST["uf"];
$cep_cliente= $_POST["cep1"];
//$setor_cliente= $_POST["setor"];
$bairro=  $_POST["bairro"];

$rede=  $_POST["rede"];


//echo $rede;


$cod_cliente = str_replace("'"," ",$cod_cliente);
$nome_cliente = str_replace("'"," ",$nome_cliente);
$endereco_cliente =str_replace("'"," ",$endereco_cliente);
$cidade_cliente =str_replace("'"," ",$cidade_cliente);
$uf_cliente =str_replace("'"," ",$uf_cliente);

$bairro_cliente =str_replace("'"," ",$bairro);

//$setor_cliente =str_replace("'"," ",$setor_cliente);


//
//$query = "select * from bd_geral WHERE codigo_cliente='$cod_cliente'";															
//$rs = mysql_query($query);


///ABRE
//while($row = mysql_fetch_row($rs)){	

	if($rede=='1'){
		$premium= 'FFA500';	
		$query2 = "UPDATE db_geral SET nome='$nome_cliente', endereco='$endereco_cliente', cidade='$cidade_cliente', estado='$uf_cliente', cep='$cep_cliente', bairro='$bairro_cliente', premium='$premium' WHERE codigo_cliente='$cod_cliente'";
		$rs2= mysql_query($query2);
		}else{
			$query2 = "UPDATE db_geral SET nome='$nome_cliente', endereco='$endereco_cliente', cidade='$cidade_cliente', estado='$uf_cliente', cep='$cep_cliente', bairro='$bairro_cliente' WHERE codigo_cliente='$cod_cliente'";
			$rs2= mysql_query($query2);
		}


  
//}

?>
<table width="100%" height="100%" style="background-color:#FFF; vertical-align: middle; text-align: center">
	<tr height="80px"  style="font-family:Arial; font-size: 11px;">
	<td><img src="imgs/ok.PNG"/>
		<br>
	<strong>CLIENTE ALTERADO COM SUCESSO!</strong>	
		</td>
	</tr>

</table>
<SCRIPT LANGUAGE="JavaScript" TYPE="text/javascript">
	//  window.location.href = "step2_sm_l.php";
//alert("MENSAGEM: EQUIPE CADDESIGN\nLogin alterado com sucesso!");
	
	setTimeout(parent.location.reload(), 100000);
	
	</SCRIPT>

<?php

break;

///////////////////
case 'editar_cliente':

$cod_cliente = $_POST["cod_cliente"];

$cod_pedido = $_POST["codigo_pedido"];

$nome_cliente= $_POST["nome_cliente"];
$endereco_cliente= $_POST["endereco"];
$bairro_cliente= $_POST["bairro"];	
$cidade_cliente= $_POST["cidade"];
$uf_cliente= $_POST["uf"];
$cep_cliente= $_POST["cep1"];
//$setor_cliente= $_POST["setor"];
$agendado = $_POST["agendado"];
//echo $agendado;
$premium = $_POST["premium"];

$data_agendada = $_POST["data"];

$data_mysql = explode('-', $data_agendada);


$day   = $data_mysql[0];
$month = $data_mysql[1];
$year  = $data_mysql[2];

$data_formatada = $data_mysql[2] . '-' . $data_mysql[1] . '-' . $data_mysql[0];

//echo $data_formatada;


//$data_agendada = date_format($data_agendada, 'y-m-d');
$obs_agendada = $_POST["obs_agendada"];


//$cod_cliente = str_replace("'"," ",$cod_cliente);
$nome_cliente = str_replace("'","",$nome_cliente);
$endereco_cliente =str_replace("'","",$endereco_cliente);
$cidade_cliente =str_replace("'","",$cidade_cliente);
$uf_cliente =str_replace("'","",$uf_cliente);
//$setor_cliente =str_replace("'"," ",$setor_cliente);
$bairro_cliente =str_replace("'","",$bairro_cliente);


$obs_agendada =str_replace("'","",$obs_agendada);



$query = "select * from clientes WHERE codigo_pedido='$cod_pedido'";															
$rs = mysql_query($query);


	//echo $data_agendada;

///ABRE
while($row = mysql_fetch_array($rs)){	

	if($agendado==on){
		$premium_novo = 'FF00FF';

	} else {
	
		if($premium=='FF00FF'){

			if($row['obs_pedido']!=''){
				$premium_novo = '39FF14';
			} else {
				$premium_novo = 'FF0084';
			}
			
		} else {
			$premium_novo = $premium;
		}
		
	} 
	
	$query2 = "UPDATE clientes SET nome='$nome_cliente', endereco='$endereco_cliente', bairro='$bairro_cliente', cidade='$cidade_cliente', estado='$uf_cliente', cep='$cep_cliente', premium='$premium_novo', data_agendado='$data_formatada', obs_agendado='$obs_agendada' WHERE codigo_pedido='$cod_pedido'";
	$rs2= mysql_query($query2);
  
}

?>

<table width="100%" height="100%" style="background-color:#FFF; vertical-align: middle; text-align: center">
	<tr height="80px"  style="font-family:Arial; font-size: 11px;">
	<td><img src="imgs/ok.PNG"/>
		<br><br><br>
	<strong>STATUS ALTERADO COM SUCESSO!</strong>	
		</td>
	</tr>

</table>
<SCRIPT LANGUAGE="JavaScript" TYPE="text/javascript">
	//  window.location.href = "step2_sm_l.php";
//alert("MENSAGEM: EQUIPE CADDESIGN\nLogin alterado com sucesso!");
	
	setTimeout(parent.location.reload(), 100000);
	
	</SCRIPT>

<?php

break;
///////////////////////////////////////////////////////////
case 'atualiza_endereco_bdgeral':

$reg = $_POST["reg"];
$new_lat = $_POST["new_lat_2"];
$new_lgn = $_POST["new_lgn_2"];
$new_end = addslashes($_POST["new_end_2"]);
$endereco = addslashes($_POST["endereco_x"]);

$new_end = str_replace("'"," ",$new_end);
$endereco =str_replace("'"," ",$endereco);

$new_end = str_replace("/"," ",$new_end);
$endereco =str_replace("/"," ",$endereco);

$new_end = str_replace(";"," ",$new_end);
$endereco =str_replace(";"," ",$endereco);


$codigo = $_POST["codigo_2"];

//echo $reg;
//echo $new_end;

//$query = "select * from db_geral WHERE codigo_cliente='$reg'";															
//$rs = mysql_query($query);
//$new_lgn_mais = "";

//while($row = mysql_fetch_array($rs)){
	//$nome = $row["nome"];
	//echo $nome;
//$new_lgn_mais = $new_lgn . $codigo;
//$confianca = $row["confianca_cad"];	
//$query2 = "UPDATE clientes SET endereco_cad='$new_end', latitude_cad='$new_lat', longitude_cad='$new_lgn_mais', confianca_cad='101', geo_manual='yes' WHERE codigo_cliente = '$reg'";
//$rs2= mysql_query($query2);

 $query3 = "UPDATE db_geral SET endereco_cad='$new_end', latitude_cad='$new_lat', longitude_cad='$new_lgn', confianca_cad='101' WHERE codigo_cliente = '$reg'";
 $rs3= mysql_query($query3); 

//}


?>
<table width="100%" height="100%" style="background-color:#FFF; vertical-align: middle; text-align: center">
	<tr height="80px"  style="font-family:Arial; font-size: 11px;">
	<td><img src="imgs/ok.PNG"/>
		<br>
	<strong>STATUS ALTERADO COM SUCESSO!</strong>	
		</td>
	</tr>

</table>
<SCRIPT LANGUAGE="JavaScript" TYPE="text/javascript">
	//  window.location.href = "step2_sm_l.php";
//alert("MENSAGEM: EQUIPE CADDESIGN\nLogin alterado com sucesso!");
	
	setTimeout(parent.location.reload(), 100000);
	
	</SCRIPT>

<?php

break;

///////////////////

case 'atualiza_coordenada_dbgeral':

//$query_where = "UPDATE passo SET ok='yes' WHERE id='2'";
//$rs_where = mysql_query($query_where);

//$query_where1 = "UPDATE passo SET ok='no' WHERE (id='3' OR id='4' OR id='5')";
//$rs_where1 = mysql_query($query_where1);


$reg = $_POST["reg"];
$new_lat = $_POST["new_lat"];
$new_lgn = $_POST["new_lgn"];
$new_end = addslashes($_POST["new_end"]);
$endereco = addslashes($_POST["endereco_x"]);
$codigo = $_POST["codigo"];
//echo $reg;
//echo $new_end;

$new_end = str_replace("'"," ",$new_end);
$endereco =str_replace("'"," ",$endereco);

$new_end = str_replace("/"," ",$new_end);
$endereco =str_replace("/"," ",$endereco);

$new_end = str_replace(";"," ",$new_end);
$endereco =str_replace(";"," ",$endereco);

//$query = "select * from clientes where codigo_cliente='$reg'";															
//$rs = mysql_query($query);
//$new_lgn_mais = "";
//while($row = mysql_fetch_array($rs)){
//	$confianca = $row["confianca_cad"];
	//echo $nome;
//	$new_lgn_mais = $new_lgn . $codigo;
	//echo $new_lgn_mais;
 // $query2 = "UPDATE clientes SET endereco_cad='$new_end', latitude_cad='$new_lat', longitude_cad='$new_lgn', confianca_cad='101', geo_manual='yes' WHERE codigo_cliente = '$reg'";
 // $rs2= mysql_query($query2);

  
  $query3 = "UPDATE db_geral SET endereco_cad='$new_end', latitude_cad='$new_lat', longitude_cad='$new_lgn', confianca_cad='101' WHERE codigo_cliente = '$reg'";
  $rs3= mysql_query($query3);
  

  
//}

?>
<SCRIPT LANGUAGE="JavaScript" TYPE="text/javascript"> 
//alert("DADOS ATUALIZADOS COM SUCESSO!");
window.history.go(-2);
//window.history.go(-1);
//window.parent.document.getElementById('Pagina').style.display = 'none';

//window.parent.location.href = window.parent.location.href; 
</SCRIPT>

<?php

break;

///////////////////////////////////////////////////////////
case 'atualiza_endereco':

$reg = $_POST["reg"];
$new_lat = $_POST["new_lat_2"];
$new_lgn = $_POST["new_lgn_2"];
$new_end = addslashes($_POST["new_end_2"]);
$endereco = addslashes($_POST["endereco_x"]);

$new_end = str_replace("'"," ",$new_end);
$endereco =str_replace("'"," ",$endereco);

$new_end = str_replace("/"," ",$new_end);
$endereco =str_replace("/"," ",$endereco);

$new_end = str_replace(";"," ",$new_end);
$endereco =str_replace(";"," ",$endereco);


$codigo = $_POST["codigo_2"];

//echo $reg;
//echo $new_end;

$query = "select * from clientes WHERE codigo_cliente='$reg'";															
$rs = mysql_query($query);
$new_lgn_mais = "";



while($row = mysql_fetch_array($rs)){


	$codigo_new = $row["codigo"];
	//echo $nome;
$new_lgn_mais = $new_lgn . $codigo_new;
$confianca = $row["confianca_cad"];	

 $query2 = "UPDATE clientes SET endereco_cad='$new_end', latitude_cad='$new_lat', longitude_cad='$new_lgn_mais', confianca_cad='101', geo_manual='yes' WHERE codigo = '$codigo_new'";
 $rs2= mysql_query($query2);

 $query3 = "UPDATE db_geral SET endereco_cad='$new_end', latitude_cad='$new_lat', longitude_cad='$new_lgn_mais', confianca_cad='101' WHERE codigo_cliente = '$reg'";
 $rs3= mysql_query($query3); 

}

if($confianca<= 50){
	$faixa = "red";
}
if($confianca> 50 AND $confianca< 90){
	$faixa = "orange";
}
if($confianca>= 90 AND $confianca< 101){
	$faixa = "green";
}
if($confianca== 101){
$faixa = "blue";
	
}

?>

<table width="100%" height="100%" style="background-color:#FFF; vertical-align: middle; text-align: center">
	<tr height="80px"  style="font-family:Arial; font-size: 11px;">
	<td><img src="imgs/ok.PNG"/>
		<br>
	<strong>LOCALIZAÇÃO ALTERADO COM SUCESSO!</strong>
		</td>
	</tr>

</table>
<SCRIPT LANGUAGE="JavaScript" TYPE="text/javascript">
	//  window.location.href = "step2_sm_l.php";
//alert("MENSAGEM: EQUIPE CADDESIGN\nLogin alterado com sucesso!");
	
	setTimeout(parent.location.reload(), 100000);
	
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


///////////////ESCOLHER VEICULO//////////////////////////
case 'escolhe_veiculo':

//PRIORIDADE

$array_maior = array();

$query_prioridade = "SELECT * from veiculos where ocupado=1";
$rs_prioridade = mysql_query($query_prioridade);

while($row_prio = mysql_fetch_array($rs_prioridade)){
	array_push($array_maior, $row_prio["prioridade"]);
	//echo $row_prio["prioridade"];
}
// Exibição
$guarda_maior= max($array_maior);
$guarda_maior=$guarda_maior + 1;

$veiculo = $_POST["id_veiculox"];

$zoom= $_POST["zoom"];
$z= $_POST["zoom_x"];


$pos_x= $_POST["tool01_x"];
$pos_y= $_POST["tool01_y"];

$pos_x_tools= $_POST["tool02_x"];
$pos_y_tools= $_POST["tool02_y"];

$pos_x_layers= $_POST["tool03_x"];
$pos_y_layers= $_POST["tool03_y"];

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
//PRIORIDADE
$query_prio = "UPDATE veiculos SET prioridade=$guarda_maior WHERE id='$veiculo'";												
$rs_prio = mysql_query($query_prio);

$query_qtd = "select * from clientes where veiculo='$veiculo'";															
$rs_qtd = mysql_query($query_qtd);
$num_rows = mysql_num_rows($rs_qtd);

$query_qtd1 = "select * from clientes where veiculo='$veiculo' group by codigo_cliente";															
$rs_qtd1 = mysql_query($query_qtd1);
$num_rows1 = mysql_num_rows($rs_qtd1);
	
?>

<SCRIPT language="JavaScript">

window.parent.location.href="step3.php?nome=<?=$nome ?>&peso=<?=$peso ?>&tipo=<?=$tipo ?>&volume=<?=$volume ?>&valor=<?=$valor ?>&id=<?=$veiculo ?>&result_peso=<?=$result_peso ?>&result_volume=<?=$result_volume ?>&result_valor=<?=$result_valor ?>&porc_peso=<?=$porcentagem_peso ?>&porc_volume=<?=$porcentagem_volume ?>&porc_valor=<?=$porcentagem_valor ?>&corveiculo=<?=$cor_veiculo?>&numero=<?=$num_rows?>&numero_visitas=<?=$num_rows1?>&zoom=<?=$zoom ?>&z=<?=$z ?>&posx=<?=$pos_x ?>&posy=<?=$pos_y ?>&posx_tools=<?=$pos_x_tools ?>&posy_tools=<?=$pos_y_tools ?>&posx_layers=<?=$pos_x_layers ?>&posy_layers=<?=$pos_y_layers ?>";	
parent.document.getElementById('Pagina').style.display = 'none';

//window.parent.location.href="step3.php?zoom=<?=$zoom ?>&z=<?=$z ?>&posx=<?=$pos_x ?>&posy=<?=$pos_y ?>&posx_tools=<?=$pos_x_tools ?>&posy_tools=<?=$pos_y_tools ?>&posx_layers=<?=$pos_x_layers ?>&posy_layers=<?=$pos_y_layers ?>";



//document.getElementById('Pag1').style.display = 'none';
//window.parent.location.reload();
</SCRIPT>
<?php
break;

/////FIM//////ESCOLHER VEICULO////////////////////////////////////////////


//////////////INATIVA ICONE CLIENTE BD GERAL////////////////////////////////

case 'inativa_cliente_especial':

$id = $_GET["id"];
$codigo_cli = $_GET["codigo_cli"];
$end = $_GET["end"];


$query_especial = "UPDATE db_geral SET premium='0' WHERE codigo = '$id'";
$rs_especial = mysql_query($query_especial);


$query1 = "UPDATE clientes SET premium='0' where codigo_cliente='$codigo_cli' AND endereco='$end'";														
$rs1 = mysql_query($query1);


?>
<SCRIPT language="JavaScript">

//window.location.href="cad_bd.php";
window.history.go(-1);
</SCRIPT>

<?php
break;
//////////////INATIVA ICONE CLIENTE BD GERAL////////////////////////////////

//////////////ATIVA ICONE CLIENTE BD GERAL////////////////////////////////

case 'ativa_cliente_especial':

$id = $_GET["id"];
$codigo_cli = $_GET["codigo_cli"];
$end = $_GET["end"];


$query_especial = "UPDATE db_geral SET premium='1' WHERE codigo = '$id'";
$rs_especial = mysql_query($query_especial);


$query1 = "UPDATE clientes SET premium='1' where codigo_cliente='$codigo_cli' AND endereco='$end'";														
$rs1 = mysql_query($query1);


?>
<SCRIPT language="JavaScript">

//window.location.href="cad_bd.php";
window.history.go(-1);
</SCRIPT>

<?php

break;

//////////////ATIVA ICONE CLIENTE BD GERAL////////////////////////////////


//////////////EXCLUI CLIENTE DA PASSO 3////////////////////////////////

case 'exclui_pedido':

	$id = $_GET["id"];

	
	$cod_pedido = $_GET["cod_pedido"];

	//echo $senha;
	$hoje = date('d/m/Y');
	$dt_inclusao = $_GET["dt_inclusao"];


	$import="INSERT into excluidos(codigo_pedido, usuario, data, data_inclusao)values('$cod_pedido', '$senha', '$hoje', '$dt_inclusao')";
	mysql_query($import) or die(mysql_error());
	

$query_deleta = "DELETE FROM clientes WHERE codigo = '$id'";
$rs_deleta = mysql_query($query_deleta);


	?>


	<SCRIPT language="JavaScript">

	//window.location.href="cad_bd.php";
	window.location.href="step3.php"
	</SCRIPT>
	
	<?php
	
	break;
	

//////////////EXCLUI CLIENTE DA PASSO 3////////////////////////////////

case 'exclui_cliente_base_cliente':

$id = $_GET["id"];




// Query
$query = "SELECT veiculo, SUM(peso) AS peso, SUM(volume) AS volume, SUM(valor) AS valor, confianca_cad FROM clientes WHERE codigo_cliente = '$id'";
$query = mysql_query($query);

// Tirando o while
$dados = mysql_fetch_array($query);

// Exibição
$veiculo= $dados['veiculo'];
$peso= $dados['peso'];
$volume= $dados['volume'];
$valor= $dados['valor'];
$confianca= $dados['confianca_cad'];
$ativo= $dados['ativo'];

$query1 = "SELECT * FROM veiculos WHERE id = '$veiculo'";
$query1 = mysql_query($query1);
$dados1 = mysql_fetch_array($query1);
$peso1= $dados1['peso_total'];
$volume1= $dados1['volume_total'];
$valor1= $dados1['valor_total'];

$conta_peso = $peso1 - $peso;
$conta_volume = $volume1 - $volume;
$conta_valor = $valor1 - $valor;

if($conta_peso==0 and $conta_valor==0 and $conta_valor==0){
	
$query_deleta = "UPDATE veiculos SET peso_total='$conta_peso', volume_total='$conta_volume', valor_total='$conta_valor', roteirizado='', ocupado=0, equipe='' WHERE id = '$veiculo'";
	
}else{
	
$query_deleta = "UPDATE veiculos SET peso_total='$conta_peso', volume_total='$conta_volume', valor_total='$conta_valor', roteirizado='' WHERE id = '$veiculo'";
	
}

$rs_deleta = mysql_query($query_deleta);



$query_deleta = "DELETE FROM clientes WHERE codigo_cliente = '$id'";
$rs_deleta = mysql_query($query_deleta);


if($confianca<= 50){
	$faixa = "red";
}
if($confianca> 50 AND $confianca< 90){
	$faixa = "orange";
}
if($confianca>= 90 AND $confianca< 101){
	$faixa = "green";
}
if($confianca== 101){
$faixa = "blue";
	

}


?>
<SCRIPT language="JavaScript">

//window.location.href="cad_bd.php";
window.location.href="step2.php?lista=<?php echo $faixa; ?>"
</SCRIPT>

<?php

break;
//////////////EXCLUI CLIENTE DA BASE CLIENTES////////////////////////////////

//////////////EXCLUI CLIENTE BD GERAL////////////////////////////////

case 'exclui_cliente':

$id = $_GET["id"];
$what = $_GET["what"];
$like = $_GET["like"];
//echo $id_veiculo;
$query_deleta = "DELETE FROM db_geral WHERE codigo = '$id'";
$rs_deleta = mysql_query($query_deleta);

?>
<SCRIPT language="JavaScript">

window.location.href="cad_bd.php?what=<?=$what ?>&like=<?=$like ?>";

</SCRIPT>

<?php

break;
//////////////EXCLUI CLIENTE BD GERAL////////////////////////////////



//////////////EXCLUI CLIENTE BD ATUAL INDIVIDUAL SISTEMA////////////////////////////////

case 'exclui_pedido_veiculo_individual':

	$id = $_GET["id"];
	$veiculo = $_GET["veiculo"];
	$p = $_GET["p"];
	$v = $_GET["v"];
	$va = $_GET["va"];
	

	$cod_pedido = $_GET["cod_pedido"];

	//echo $senha;
	$hoje = date('d/m/Y');
	$dt_inclusao = $_GET["dt_inclusao"];


	$import="INSERT into excluidos(codigo_pedido, usuario, data, data_inclusao)values('$cod_pedido', '$senha', '$hoje', '$dt_inclusao')";
	mysql_query($import) or die(mysql_error());

	
	
	?>
	
	<body bgcolor="#000000">
	
	
	<div style="height:100px; background-color:#FFFFFF; width:400px; position: relative; left: 50%; top: 50%; margin-left:-200px; margin-top:-50px">
	  <div id="progress" style="position: absolute; left: 28px; top: 28px; width: 342px; height: 40px; background-color: #6f99d6; layer-background-color: #FFFFFF; border: 1px none #FFFFFF; font-family:Arial, 'Helvetica Neue', Helvetica, sans-serif; font-size:12px">
	
	
	<?php
	

	
	
	
	$query = "select * from veiculos where id='$veiculo'";															
	$query = mysql_query($query);
	$dados = mysql_fetch_array($query);
	
	
	$peso = $dados['peso_total'];
	$volume = $dados['volume_total'];
	$valor = $dados['valor_total'];
	
	$peso_padrao = $dados['peso'];
	$volume_padrao = $dados['volume'];
	$valor_padrao = $dados['valor'];
	
	
	$cor_veiculo = $dados["type_icon"];
	
	$nome = $dados["nome"];
	$tipo = $dados["tipo"];
	
	$peso_conta = $peso - $p;
	$volume_conta = $volume - $v;
	$valor_conta = $valor - $va;
	
	if ($peso_conta==0.00 AND $volume_conta ==0.00 AND $valor_conta==0.00){
		
		$query_conta = "UPDATE veiculos SET peso_total='$peso_conta', volume_total='$volume_conta', valor_total='$valor_conta', equipe=null, setor=null, ocupado='0', prioridade=Null WHERE id = '$veiculo'";
	$rs_conta = mysql_query($query_conta);
	} else {
	$query_conta = "UPDATE veiculos SET peso_total='$peso_conta', volume_total='$volume_conta', valor_total='$valor_conta' WHERE id = '$veiculo'";
	$rs_conta = mysql_query($query_conta);	
		
	}
	
	
	
	$query1 = "select * from veiculos where id='$veiculo'";															
	$query1 = mysql_query($query1);
	$dados1 = mysql_fetch_array($query1);
	
	
	$peso1 = $dados1['peso'];
	$volume1 = $dados1['volume'];
	$valor1 = $dados1['valor'];
	
	$peso2 = $dados1['peso_total'];
	$volume2 = $dados1['volume_total'];
	$valor2 = $dados1['valor_total'];
	
	$result_peso1 =  $peso1 - $peso2;
	$result_volume1 =  $volume1 - $volume2;
	$result_valor1 =  $valor1 - $valor2;
	
	
	$porcentagem_peso = ($peso2/$peso1) * 100;
	$porcentagem_volume = ($volume2/$volume1) * 100;
	$porcentagem_valor = ($valor2/$valor1) * 100;
		
	
	
	$query_qtd = "select * from clientes where veiculo='$veiculo'";															
	$rs_qtd = mysql_query($query_qtd);
	$num_rows = mysql_num_rows($rs_qtd);
	
	$query_qtd1 = "select * from clientes where veiculo='$veiculo' group by codigo_cliente";															
	$rs_qtd1 = mysql_query($query_qtd1);
	$num_rows1 = mysql_num_rows($rs_qtd1);
	
	
		//echo $id_veiculo;
		$query_deleta = "DELETE FROM clientes WHERE codigo = '$id'";
		$rs_deleta = mysql_query($query_deleta);
	
	//// LOADING 0 A 100% ////////////////////////////////////////////////////
		$pega_loading = intval(($num_rows1/$num_rows)* 100) . "%";
	
		echo "<div style='position:absolute;margin:0px 0px 0px 0px;width:$pega_loading;height:40px;background:#2867b2;color:#2867b2;color: #FFFFFF;text-align:center;line-height:40px;'>$pega_loading</div>";
		flush();
		ob_flush();
		
	//// LOADING 0 A 100% ////////////////////////////////////////////////////
	
	?>
	<SCRIPT language="JavaScript">
	
	//window.location.href="step3.php";
	
	window.location.href="step3.php?nome=<?=$nome ?>&peso=<?=$peso_padrao ?>&tipo=<?=$tipo ?>&volume=<?=$volume_padrao ?>&valor=<?=$valor_padrao ?>&id=<?=$veiculo ?>&result_peso=<?=$result_peso1 ?>&result_volume=<?=$result_volume1 ?>&result_valor=<?=$result_valor1 ?>&porc_peso=<?=$porcentagem_peso ?>&porc_volume=<?=$porcentagem_volume ?>&porc_valor=<?=$porcentagem_valor ?>&corveiculo=<?=$cor_veiculo?>&numero=<?=$num_rows?>&numero_visitas=<?=$num_rows1?>";
	
	
	</SCRIPT>
	
	<?php
	
	break;
	
/////FIM///////EXCLUI CLIENTE DP VEICULO ATUAL INDIVIDUAL SISTEMA////////////////////////////////







//////////////EXCLUI CLIENTE BD ATUAL GERAL SISTEMA////////////////////////////////

case 'exclui_pedido_veiculo_geral':

	$id = $_GET["id"];
	$veiculo = $_GET["veiculo"];
	$p = $_GET["p"];
	$v = $_GET["v"];
	$va = $_GET["va"];
	

	$cod_pedido = $_GET["cod_pedido"];

	//echo $senha;
	$hoje = date('d/m/Y');
	$dt_inclusao = $_GET["dt_inclusao"];


	$import="INSERT into excluidos(codigo_pedido, usuario, data, data_inclusao)values('$cod_pedido', '$senha', '$hoje', '$dt_inclusao')";
	mysql_query($import) or die(mysql_error());
	
	?>
	
	<body bgcolor="#000000">
	
	
	<div style="height:100px; background-color:#FFFFFF; width:400px; position: relative; left: 50%; top: 50%; margin-left:-200px; margin-top:-50px">
	  <div id="progress" style="position: absolute; left: 28px; top: 28px; width: 342px; height: 40px; background-color: #6f99d6; layer-background-color: #FFFFFF; border: 1px none #FFFFFF; font-family:Arial, 'Helvetica Neue', Helvetica, sans-serif; font-size:12px">
	
	
	<?php
	

	
	
	
	$query = "select * from veiculos where id='$veiculo'";															
	$query = mysql_query($query);
	$dados = mysql_fetch_array($query);
	
	
	$peso = $dados['peso_total'];
	$volume = $dados['volume_total'];
	$valor = $dados['valor_total'];
	
	$peso_padrao = $dados['peso'];
	$volume_padrao = $dados['volume'];
	$valor_padrao = $dados['valor'];
	
	
	$cor_veiculo = $dados["type_icon"];
	
	$nome = $dados["nome"];
	$tipo = $dados["tipo"];
	
	$peso_conta = $peso - $p;
	$volume_conta = $volume - $v;
	$valor_conta = $valor - $va;
	
	if ($peso_conta==0.00 AND $volume_conta ==0.00 AND $valor_conta==0.00){
		
		$query_conta = "UPDATE veiculos SET peso_total='$peso_conta', volume_total='$volume_conta', valor_total='$valor_conta', equipe=null, setor=null, ocupado='0', prioridade=Null WHERE id = '$veiculo'";
	$rs_conta = mysql_query($query_conta);
	} else {
	$query_conta = "UPDATE veiculos SET peso_total='$peso_conta', volume_total='$volume_conta', valor_total='$valor_conta' WHERE id = '$veiculo'";
	$rs_conta = mysql_query($query_conta);	
		
	}
	
	
	
	$query1 = "select * from veiculos where id='$veiculo'";															
	$query1 = mysql_query($query1);
	$dados1 = mysql_fetch_array($query1);
	
	
	$peso1 = $dados1['peso'];
	$volume1 = $dados1['volume'];
	$valor1 = $dados1['valor'];
	
	$peso2 = $dados1['peso_total'];
	$volume2 = $dados1['volume_total'];
	$valor2 = $dados1['valor_total'];
	
	$result_peso1 =  $peso1 - $peso2;
	$result_volume1 =  $volume1 - $volume2;
	$result_valor1 =  $valor1 - $valor2;
	
	
	$porcentagem_peso = ($peso2/$peso1) * 100;
	$porcentagem_volume = ($volume2/$volume1) * 100;
	$porcentagem_valor = ($valor2/$valor1) * 100;
		
	
	
	$query_qtd = "select * from clientes where veiculo='$veiculo'";															
	$rs_qtd = mysql_query($query_qtd);
	$num_rows = mysql_num_rows($rs_qtd);
	
	$query_qtd1 = "select * from clientes where veiculo='$veiculo' group by codigo_cliente";															
	$rs_qtd1 = mysql_query($query_qtd1);
	$num_rows1 = mysql_num_rows($rs_qtd1);
	
	
		//echo $id_veiculo;
		$query_deleta = "DELETE FROM clientes WHERE codigo = '$id'";
		$rs_deleta = mysql_query($query_deleta);
	
	//// LOADING 0 A 100% ////////////////////////////////////////////////////
		$pega_loading = intval(($num_rows1/$num_rows)* 100) . "%";
	
		echo "<div style='position:absolute;margin:0px 0px 0px 0px;width:$pega_loading;height:40px;background:#2867b2;color:#2867b2;color: #FFFFFF;text-align:center;line-height:40px;'>$pega_loading</div>";
		flush();
		ob_flush();
		
	//// LOADING 0 A 100% ////////////////////////////////////////////////////
	
	?>
	<SCRIPT language="JavaScript">
	
	window.location.href="step3.php";
	
	//window.location.href="step3.php?nome=<?=$nome ?>&peso=<?=$peso_padrao ?>&tipo=<?=$tipo ?>&volume=<?=$volume_padrao ?>&valor=<?=$valor_padrao ?>&id=<?=$veiculo ?>&result_peso=<?=$result_peso1 ?>&result_volume=<?=$result_volume1 ?>&result_valor=<?=$result_valor1 ?>&porc_peso=<?=$porcentagem_peso ?>&porc_volume=<?=$porcentagem_volume ?>&porc_valor=<?=$porcentagem_valor ?>&corveiculo=<?=$cor_veiculo?>&numero=<?=$num_rows?>&numero_visitas=<?=$num_rows1?>";
	
	
	</SCRIPT>
	
	<?php
	
	break;
	
/////FIM///////EXCLUI CLIENTE DP VEICULO ATUAL GERAL SISTEMA////////////////////////////////



//////////////EXCLUI CLIENTE BD ATUAL GERAL////////////////////////////////

case 'exclui_cliente_veiculo_geral':

	$id = $_GET["id"];
	$veiculo = $_GET["veiculo"];
	$p = $_GET["p"];
	$v = $_GET["v"];
	$va = $_GET["va"];
	
	
	
	?>
	
	<body bgcolor="#000000">
	
	
	<div style="height:100px; background-color:#FFFFFF; width:400px; position: relative; left: 50%; top: 50%; margin-left:-200px; margin-top:-50px">
	  <div id="progress" style="position: absolute; left: 28px; top: 28px; width: 342px; height: 40px; background-color: #6f99d6; layer-background-color: #FFFFFF; border: 1px none #FFFFFF; font-family:Arial, 'Helvetica Neue', Helvetica, sans-serif; font-size:12px">
	
	
	<?php
	
	//echo $id_veiculo;
	$query_deleta = "UPDATE clientes SET veiculo=null WHERE codigo = '$id'";
	$rs_deleta = mysql_query($query_deleta);
	
	
	
	$query = "select * from veiculos where id='$veiculo'";															
	$query = mysql_query($query);
	$dados = mysql_fetch_array($query);
	
	
	$peso = $dados['peso_total'];
	$volume = $dados['volume_total'];
	$valor = $dados['valor_total'];
	
	$peso_padrao = $dados['peso'];
	$volume_padrao = $dados['volume'];
	$valor_padrao = $dados['valor'];
	
	
	$cor_veiculo = $dados["type_icon"];
	
	$nome = $dados["nome"];
	$tipo = $dados["tipo"];
	
	$peso_conta = $peso - $p;
	$volume_conta = $volume - $v;
	$valor_conta = $valor - $va;
	
	if ($peso_conta==0.00 AND $volume_conta ==0.00 AND $valor_conta==0.00){
		
		$query_conta = "UPDATE veiculos SET peso_total='$peso_conta', volume_total='$volume_conta', valor_total='$valor_conta', equipe=null, setor=null, ocupado='0', prioridade=Null WHERE id = '$veiculo'";
	$rs_conta = mysql_query($query_conta);
	} else {
	$query_conta = "UPDATE veiculos SET peso_total='$peso_conta', volume_total='$volume_conta', valor_total='$valor_conta' WHERE id = '$veiculo'";
	$rs_conta = mysql_query($query_conta);	
		
	}
	
	
	
	$query1 = "select * from veiculos where id='$veiculo'";															
	$query1 = mysql_query($query1);
	$dados1 = mysql_fetch_array($query1);
	
	
	$peso1 = $dados1['peso'];
	$volume1 = $dados1['volume'];
	$valor1 = $dados1['valor'];
	
	$peso2 = $dados1['peso_total'];
	$volume2 = $dados1['volume_total'];
	$valor2 = $dados1['valor_total'];
	
	$result_peso1 =  $peso1 - $peso2;
	$result_volume1 =  $volume1 - $volume2;
	$result_valor1 =  $valor1 - $valor2;
	
	
	$porcentagem_peso = ($peso2/$peso1) * 100;
	$porcentagem_volume = ($volume2/$volume1) * 100;
	$porcentagem_valor = ($valor2/$valor1) * 100;
		
	
	
	$query_qtd = "select * from clientes where veiculo='$veiculo'";															
	$rs_qtd = mysql_query($query_qtd);
	$num_rows = mysql_num_rows($rs_qtd);
	
	$query_qtd1 = "select * from clientes where veiculo='$veiculo' group by codigo_cliente";															
	$rs_qtd1 = mysql_query($query_qtd1);
	$num_rows1 = mysql_num_rows($rs_qtd1);
	
	
	//// LOADING 0 A 100% ////////////////////////////////////////////////////
		$pega_loading = intval(($num_rows1/$num_rows)* 100) . "%";
	
		echo "<div style='position:absolute;margin:0px 0px 0px 0px;width:$pega_loading;height:40px;background:#2867b2;color:#2867b2;color: #FFFFFF;text-align:center;line-height:40px;'>$pega_loading</div>";
		flush();
		ob_flush();
		
	//// LOADING 0 A 100% ////////////////////////////////////////////////////
	
	?>
	<SCRIPT language="JavaScript">
	
	window.location.href="step3.php";
	
	//window.location.href="step3.php?nome=<?=$nome ?>&peso=<?=$peso_padrao ?>&tipo=<?=$tipo ?>&volume=<?=$volume_padrao ?>&valor=<?=$valor_padrao ?>&id=<?=$veiculo ?>&result_peso=<?=$result_peso1 ?>&result_volume=<?=$result_volume1 ?>&result_valor=<?=$result_valor1 ?>&porc_peso=<?=$porcentagem_peso ?>&porc_volume=<?=$porcentagem_volume ?>&porc_valor=<?=$porcentagem_valor ?>&corveiculo=<?=$cor_veiculo?>&numero=<?=$num_rows?>&numero_visitas=<?=$num_rows1?>";
	
	
	</SCRIPT>
	
	<?php
	
	break;
	
	
	/////FIM///////EXCLUI CLIENTE DP VEICULO ATUAL GERAL////////////////////////////////

//////////////EXCLUI CLIENTE BD ATUAL////////////////////////////////

case 'exclui_cliente_veiculo':

$id = $_GET["id"];
$veiculo = $_GET["veiculo"];
$p = $_GET["p"];
$v = $_GET["v"];
$va = $_GET["va"];

$zoom= $_GET["zoom"];
$z= $_GET["z"];


?>

<body bgcolor="#000000">


<div style="height:100px; background-color:#FFFFFF; width:400px; position: relative; left: 50%; top: 50%; margin-left:-200px; margin-top:-50px">
  <div id="progress" style="position: absolute; left: 28px; top: 28px; width: 342px; height: 40px; background-color: #6f99d6; layer-background-color: #FFFFFF; border: 1px none #FFFFFF; font-family:Arial, 'Helvetica Neue', Helvetica, sans-serif; font-size:12px">


<?php

//echo $id_veiculo;
$query_deleta = "UPDATE clientes SET veiculo=null WHERE codigo = '$id'";
$rs_deleta = mysql_query($query_deleta);



$query = "select * from veiculos where id='$veiculo'";															
$query = mysql_query($query);
$dados = mysql_fetch_array($query);


$peso = $dados['peso_total'];
$volume = $dados['volume_total'];
$valor = $dados['valor_total'];

$peso_padrao = $dados['peso'];
$volume_padrao = $dados['volume'];
$valor_padrao = $dados['valor'];


$cor_veiculo = $dados["type_icon"];

$nome = $dados["nome"];
$tipo = $dados["tipo"];

$peso_conta = $peso - $p;
$volume_conta = $volume - $v;
$valor_conta = $valor - $va;

if ($peso_conta==0.00 AND $volume_conta ==0.00 AND $valor_conta==0.00){
	
	$query_conta = "UPDATE veiculos SET peso_total='$peso_conta', volume_total='$volume_conta', valor_total='$valor_conta', equipe=null, setor=null, ocupado='0', prioridade=Null WHERE id = '$veiculo'";
$rs_conta = mysql_query($query_conta);
} else {
$query_conta = "UPDATE veiculos SET peso_total='$peso_conta', volume_total='$volume_conta', valor_total='$valor_conta' WHERE id = '$veiculo'";
$rs_conta = mysql_query($query_conta);	
	
}



$query1 = "select * from veiculos where id='$veiculo'";															
$query1 = mysql_query($query1);
$dados1 = mysql_fetch_array($query1);


$peso1 = $dados1['peso'];
$volume1 = $dados1['volume'];
$valor1 = $dados1['valor'];

$peso2 = $dados1['peso_total'];
$volume2 = $dados1['volume_total'];
$valor2 = $dados1['valor_total'];

$result_peso1 =  $peso1 - $peso2;
$result_volume1 =  $volume1 - $volume2;
$result_valor1 =  $valor1 - $valor2;


$porcentagem_peso = ($peso2/$peso1) * 100;
$porcentagem_volume = ($volume2/$volume1) * 100;
$porcentagem_valor = ($valor2/$valor1) * 100;
	


$query_qtd = "select * from clientes where veiculo='$veiculo'";															
$rs_qtd = mysql_query($query_qtd);
$num_rows = mysql_num_rows($rs_qtd);

$query_qtd1 = "select * from clientes where veiculo='$veiculo' group by codigo_cliente";															
$rs_qtd1 = mysql_query($query_qtd1);
$num_rows1 = mysql_num_rows($rs_qtd1);


//// LOADING 0 A 100% ////////////////////////////////////////////////////
	$pega_loading = intval(($num_rows1/$num_rows)* 100) . "%";

    echo "<div style='position:absolute;margin:0px 0px 0px 0px;width:$pega_loading;height:40px;background:#2867b2;color:#2867b2;color: #FFFFFF;text-align:center;line-height:40px;'>$pega_loading</div>";
    flush();
    ob_flush();
	
//// LOADING 0 A 100% ////////////////////////////////////////////////////

?>
<SCRIPT language="JavaScript">

//window.location.href="step3.php";

window.location.href="step3.php?nome=<?=$nome ?>&peso=<?=$peso_padrao ?>&tipo=<?=$tipo ?>&volume=<?=$volume_padrao ?>&valor=<?=$valor_padrao ?>&id=<?=$veiculo ?>&result_peso=<?=$result_peso1 ?>&result_volume=<?=$result_volume1 ?>&result_valor=<?=$result_valor1 ?>&porc_peso=<?=$porcentagem_peso ?>&porc_volume=<?=$porcentagem_volume ?>&porc_valor=<?=$porcentagem_valor ?>&corveiculo=<?=$cor_veiculo?>&numero=<?=$num_rows?>&numero_visitas=<?=$num_rows1?>&zoom=<?=$zoom?>&z=<?=$z?>&control=1";


</SCRIPT>

<?php

break;


/////FIM///////EXCLUI CLIENTE DP VEICULO ATUAL////////////////////////////////

//////////////ALTERA CLIENTE D0 VEICULO ATUAL////////////////////////////////

case 'alterar_cliente_veiculo':

$query_where = "UPDATE passo SET ok='yes' WHERE id='3'";
$rs_where = mysql_query($query_where);

$query_where1 = "UPDATE passo SET ok='no' WHERE (id='4' OR id='5')";
$rs_where1 = mysql_query($query_where1);


?>

<body bgcolor="#000000">


<div style="height:100px; background-color:#000000; width:400px; position: relative; left: 50%; top: 50%; margin-left:-200px; margin-top:-50px">
  <div id="progress" style="position: absolute; left: 28px; top: 28px; width: 342px; height: 40px; background-color: #6f99d6; layer-background-color: #6f99d6; border: 1px none #000000; font-family:Arial, 'Helvetica Neue', Helvetica, sans-serif; font-size:12px">


<?php

$id_veiculo_novo = $_POST["id_veiculo_novo"];
$id_veiculo_velho = $_POST["id_veiculo_velho"];
$id_cliente_velho = $_POST["id_cliente_velho"];

$p = $_POST["peso_velho"];
$v = $_POST["volume_velho"];
$va = $_POST["valor_velho"];


$query_yes = "UPDATE clientes SET veiculo='$id_veiculo_novo' WHERE codigo = '$id_cliente_velho'";
$rs_yes = mysql_query($query_yes);



/////////////////NO VEICULO VELHO/////////////////////////////


$query = "select * from veiculos where id='$id_veiculo_velho'";															
$query = mysql_query($query);
$dados = mysql_fetch_array($query);


$nome_consulta_velho = $dados['nome'];
$tipo = $dados['tipo'];
$cor_veiculo = $dados["type_icon"];


$peso_consulta_velho = $dados['peso_total'];
$volume_consulta_velho = $dados['volume_total'];
$valor_consulta_velho = $dados['valor_total'];

$pesototal_consulta_velho = $dados['peso'];
$volumetotal_consulta_velho = $dados['volume'];
$valortotal_consulta_velho = $dados['valor'];


$peso_calcula_velho = $peso_consulta_velho - $p;
$volume_calcula_velho = $volume_consulta_velho - $v;
$valor_calcula_velho = $valor_consulta_velho - $va;

if($peso_calcula_velho==0.00 AND $volume_calcula_velho==0.00 AND $valor_calcula_velho==0.00){
	

$query_veiculos = "UPDATE veiculos SET equipe=null, peso_total='$peso_calcula_velho', volume_total='$volume_calcula_velho', valor_total='$valor_calcula_velho', ocupado='0', setor=null, prioridade=Null WHERE id = '$id_veiculo_velho'";

} else {

$query_veiculos = "UPDATE veiculos SET equipe='yes', peso_total='$peso_calcula_velho', volume_total='$volume_calcula_velho', valor_total='$valor_calcula_velho' WHERE id = '$id_veiculo_velho'";

	
	
}

$rs_veiculos = mysql_query($query_veiculos);

/////////////////NO VEICULO NOVO/////////////////////////////


$query1 = "select * from veiculos where id='$id_veiculo_novo'";															
$query1 = mysql_query($query1);
$dados1 = mysql_fetch_array($query1);



$peso_consulta_novo = $dados1['peso_total'];
$volume_consulta_novo = $dados1['volume_total'];
$valor_consulta_novo = $dados1['valor_total'];

$peso_calcula_novo = $peso_consulta_novo + $p;
$volume_calcula_novo = $volume_consulta_novo + $v;
$valor_calcula_novo = $valor_consulta_novo + $va;

$query_veiculos1 = "UPDATE veiculos SET equipe='yes', peso_total='$peso_calcula_novo', volume_total='$volume_calcula_novo', valor_total='$valor_calcula_novo', ocupado='1' WHERE id = '$id_veiculo_novo'";
$rs_veiculos1 = mysql_query($query_veiculos1);

//////////////////////////////////////////////////////////////

$peso_result_velho = $pesototal_consulta_velho - $peso_calcula_velho;
$volume_result_velho = $volumetotal_consulta_velho - $volume_calcula_velho;
$valor_result_velho = $valortotal_consulta_velho - $valor_calcula_velho;

$porcentagem_peso = ($peso_calcula_velho/$pesototal_consulta_velho) * 100;
$porcentagem_volume = ($volume_calcula_velho/$volumetotal_consulta_velho) * 100;
$porcentagem_valor = ($valor_calcula_velho/$valortotal_consulta_velho) * 100;


///////////////////////NUMERO DE CLIENTES/////////////////////////////////////

$query_qtd = "select * from clientes where veiculo='$id_veiculo_velho'";															
$rs_qtd = mysql_query($query_qtd);
$num_rows = mysql_num_rows($rs_qtd);

$query_qtd1 = "select * from clientes where veiculo='$id_veiculo_velho' group by codigo_cliente";															
$rs_qtd1 = mysql_query($query_qtd1);
$num_rows1 = mysql_num_rows($rs_qtd1);

//// LOADING 0 A 100% ////////////////////////////////////////////////////
	$pega_loading = intval(($num_rows1/$num_rows)* 100) . "%";

    echo "<div style='position:absolute;margin:0px 0px 0px 0px;width:$pega_loading;height:40px;background:#2867b2;color:#2867b2;color: #FFFFFF;text-align:center;line-height:40px;'>$pega_loading</div>";
    flush();
    ob_flush();
	
//// LOADING 0 A 100% ////////////////////////////////////////////////////


?>
<SCRIPT language="JavaScript">



window.location.href="step3.php?nome=<?=$nome_consulta_velho ?>&peso=<?=$pesototal_consulta_velho ?>&tipo=<?=$tipo ?>&volume=<?=$volumetotal_consulta_velho ?>&valor=<?=$valortotal_consulta_velho ?>&id=<?=$id_veiculo_velho ?>&result_peso=<?=$peso_result_velho ?>&result_volume=<?=$volume_result_velho ?>&result_valor=<?=$valor_result_velho ?>&porc_peso=<?=$porcentagem_peso ?>&porc_volume=<?=$porcentagem_volume ?>&porc_valor=<?=$porcentagem_valor ?>&corveiculo=<?=$cor_veiculo?>&numero=<?=$num_rows?>&numero_visitas=<?=$num_rows1?>";


</SCRIPT>

<?php

break;


/////FIM///////ALTERA CLIENTE D0 VEICULO ATUAL////////////////////////////////

//////////////DATA ENTREGA BASE ROTAS////////////////////////////////

case 'data_entrega':

	$rota = $_GET["rota"];
	$dt_entrega = $_GET["dt_entrega"];
	$v = $_GET["v"];

//echo $rota . "<br>";
//echo $dt_entrega;
																
	$query = "UPDATE rotas SET data_entrega='$dt_entrega' WHERE nome_rota = '$rota'";
	$rs = mysql_query($query);
		
	
	?>


	<script type="text/javascript">
		$(window).on('load',function(){
		$('#exampleModalCenter').modal('show'); });
	
		$("#btn_ok_1").click(function (e) {
	  alert("vai");
	})
	
	
	
	</script>
	
	<style>
	.modal-backdrop {
	   background-color: #CCCCCC;
	}
	
	</style>
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" data-backdrop="static" data-keyboard="false">
	  <div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
		  <div class="modal-header">
			  <table>
				  <tr>
					  <td>
					  <span class="material-icons" style="font-size: 48px;color:#2867b2">calendar_month</span>
					  </td>
					  <td>
					  <strong><p class="modal-title" id="exampleModalLongTitle" style="text-align: left;">&nbsp;&nbsp;DATA DE ENTREGA - <?php echo $v; ?></p></strong> 
					  </td>
				  </tr>
			  </table>
		 
	
		  </div>
		  <div class="modal-body" style="font-size: 13px;">
		  &nbsp;&nbsp;Data de entrega <strong><?php echo $dt_entrega ?></strong> inserida com sucesso!
		  </div>
		  <div class="modal-footer">
		  
	
		  <a href="step5.php" class="btn btn-info btn" style="background-color:#2867b2;border-radius: 0;">
			 Ok 
			</a>
			
		  </div>
		</div>
	  </div>
	</div>
	
	
	
	<?php
	

	break;
//////////////DATA ENTREGA BASE ROTAS////////////////////////////////


//////////////LIBERA PEDIDOS CHECK INPUT////////////////////////////////

case 'libera_pedidos_input_check':

	
	$campo = $_POST['check_list1'];
	$conta_lista = count($campo);

	//echo $campo[0];
	

	$what = $_GET["what"];
	$like = $_GET["like"];
	//$veiculo = $_GET["veiculo"];


	//echo $id_veiculo;

	for ($i = 0; $i <= $conta_lista; $i++) {

		$selecionar = mysql_query("SELECT codigo_pedido from clientes where codigo_pedido = '$campo[$i]'");
		$num_rows = mysql_num_rows($selecionar);

		if($num_rows>0){
			?>
			<SCRIPT language="JavaScript">
		
			alert("O pedido <?php echo $campo[$i] ?> esta na carga do veículo e não pode ser excluido. Vá ao Passo 3, libere o veículo e retire esse pedido da carga dele.");
			
			</SCRIPT>
	<?php
		} else {

		//echo $campo[$i];
		$query2 = "DELETE FROM pedidos_input where pedido='$campo[$i]'";
		$rs2 = mysql_query($query2);

			//$query_deleta_1 = mysql_query("DELETE FROM pedidos_input WHERE id = '$id'");
	
		}


		

	}

	
	?>
	   <table width="100%" height="100%" style="background-color:#FFF; vertical-align: middle; text-align: center">
        <tr height="80px"  style="font-family:Arial; font-size: 11px;">
        <td><img src="imgs/ok.PNG"/>
            <br><br>
        <strong>PEDIDOS LIBERADOS COM SUCESSO!</strong>
            </td>
        </tr>
    
    </table>
	<SCRIPT language="JavaScript">
	setTimeout(parent.location.reload(), 100000);
	//window.location.href="cad_pedidos.php?what=<?php echo $what . '&like=' . $like ?>";
	//window.history.back();
	</SCRIPT>
	
	<?php
	
	break;
	
	/////FIM///////LIBERA PEDIDOS CHECK INPUT////////////////////////////////


//////////////LIBERA PEDIDO INPUT////////////////////////////////

case 'libera_pedido_input':

	$id = $_GET["id"];
	$what = $_GET["what"];
	$like = $_GET["like"];
	$veiculo = $_GET["veiculo"];
	//echo $id_veiculo;
	$selecionar = mysql_query("SELECT codigo_pedido from clientes where codigo_pedido = '$like'");
	$num_rows = mysql_num_rows($selecionar);

	if($num_rows>0){
		?>
		<SCRIPT language="JavaScript">
	
		alert("Esse pedido ainda esta na carga do veículo <?php echo $veiculo ?> e não pode ser excluido. Vá ao Passo 3, libere o veículo e exclua esse pedido da carga do veículo.");
		
		</SCRIPT>
<?php
	} else {
		$query_deleta_1 = mysql_query("DELETE FROM pedidos_input WHERE id = '$id'");

	}

	

	
	?>
	<SCRIPT language="JavaScript">
	
	window.location.href="cad_pedidos.php?what=<?php echo $what . '&like=' . $like ?>";
	
	</SCRIPT>
	
	<?php
	
	break;
	
	/////FIM///////LIBERA PEDIDO INPUT////////////////////////////////


//////////////EXCLUI VEICULO DELETAR////////////////////////////////

case 'deleta_veiculo':

	$id_veiculo = $_GET["veiculo"];
	//echo $id_veiculo;
	
	$query_deleta_1 = mysql_query("DELETE FROM rotas WHERE veiculo = '$id_veiculo'");
	$query_deleta_2 = mysql_query("DELETE FROM clientes WHERE veiculo = '$id_veiculo'");
	$query_deleta_3 = mysql_query("DELETE FROM integracao WHERE veiculo = '$id_veiculo'");


	
																

	$query_deleta = "UPDATE veiculos SET peso_total=null, volume_total=null, valor_total=null, equipe=null, ocupado='0', roteirizado='', integrado=0 where id='$id_veiculo'";
	$rs_deleta = mysql_query($query_deleta);

	?>
	<SCRIPT language="JavaScript">
	
	window.location.href="step3_block.php";
	
	</SCRIPT>
	
	<?php
	
	break;
	
	/////FIM///////EXCLUI VEICULO DELETAR////////////////////////////////


//////////////EXCLUI VEICULO DELETAR////////////////////////////////

case 'deleta_veiculo_g':

	$id_veiculo = $_GET["veiculo"];
	//echo $id_veiculo;
	
	$query_deleta_1 = mysql_query("DELETE FROM rotas WHERE veiculo = '$id_veiculo'");
	$query_deleta_2 = mysql_query("DELETE FROM clientes WHERE veiculo = '$id_veiculo'");
	$query_deleta_3 = mysql_query("DELETE FROM integracao WHERE veiculo = '$id_veiculo'");


	
																

	$query_deleta = "UPDATE veiculos SET peso_total=null, volume_total=null, valor_total=null, equipe=null, ocupado='0', roteirizado='', integrado=0 where id='$id_veiculo'";
	$rs_deleta = mysql_query($query_deleta);

	?>
	<SCRIPT language="JavaScript">
	
	window.location.href="rotas_control.php";
	
	</SCRIPT>
	
	<?php
	
	break;
	
	/////FIM///////EXCLUI VEICULO DELETAR////////////////////////////////



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

/////FIM///////EXCLUI VEICULO////////////////////////////////



//////////////LIBERA VEICULO ROTERIZADO////////////////////////////////

case 'libera_veiculo_g':

	$id_veiculo = $_GET["id"];
	//echo $id_veiculo ;

// Query
$query = "SELECT * FROM veiculos WHERE id='$id_veiculo'";
$query = mysql_query($query);

// Tirando o while
$dados = mysql_fetch_array($query);

// Exibição
$nome_do_carro = $dados['nome'];

//echo $nome_do_carro;
	
$deleta = mysql_query("DELETE FROM integracao where nome_veiculo='$nome_do_carro'");
$deleta1 = mysql_query("DELETE FROM rotas where nome_veiculo='$nome_do_carro'");


// VERIFICA INTEGRADO COD PEDIDO//////
$query_integra = "SELECT codigo_pedido FROM clientes WHERE veiculo='$id_veiculo'";
$query_integra = mysql_query($query_integra);

while ($row = mysql_fetch_array($query_integra)) {

$cod_pedido_verifica = $row["codigo_pedido"];

$deleta2 = mysql_query("DELETE FROM pedidos_input where pedido='$cod_pedido_verifica'");
}



////////////////////////////


	
		$query6 = "UPDATE clientes SET roteirizado=null WHERE veiculo = '$id_veiculo'";
		$rs6 = mysql_query($query6);
		
		
		$query_ativa = "UPDATE veiculos SET roteirizado=null, integrado=0 WHERE id = '$id_veiculo'";
		$rs_ativa = mysql_query($query_ativa);


	
	?>
	<SCRIPT language="JavaScript">
	window.location.href="rotas_control.php";
	
	</SCRIPT>
	
	
	<?php
	
	break;
	
	/////FIM///////LIBERA VEICULO ROTERIZADO////////////////////////////////
	
	//////////////RESTRIGE VEICULO ROTERIZADO////////////////////////////////
	
	case 'bloqueia_veiculo_g':
	
	$id_veiculo = $_GET["id"];
	//echo $id_veiculo ;
	

		$query6 = "UPDATE clientes SET roteirizado='sim' WHERE veiculo = '$id_veiculo'";
		$rs6 = mysql_query($query6);
		
		
		$query_ativa = "UPDATE veiculos SET roteirizado='sim' WHERE id = '$id_veiculo'";
		$rs_ativa = mysql_query($query_ativa);
	
	?>
	<SCRIPT language="JavaScript">
	window.location.href="rotas_control.php";
	
	</SCRIPT>
	
	
	<?php
	
	break;
	
	/////FIM///////RESTRIGE VEICULO ROTERIZADO////////////////////////////////



//////////////LIBERA VEICULO ROTERIZADO////////////////////////////////

case 'libera_veiculo':

$id_veiculo = $_GET["id"];
//echo $id_veiculo ;
// Query
$query = "SELECT * FROM veiculos WHERE id='$id_veiculo'";
$query = mysql_query($query);

// Tirando o while
$dados = mysql_fetch_array($query);

// Exibição
$nome_do_carro = $dados['nome'];

//echo $nome_do_carro;

$deleta = mysql_query("DELETE FROM integracao where nome_veiculo='$nome_do_carro'");
$deleta1 = mysql_query("DELETE FROM rotas where nome_veiculo='$nome_do_carro'");

// VERIFICA INTEGRADO COD PEDIDO//////
$query_integra = "SELECT codigo_pedido FROM clientes WHERE veiculo='$id_veiculo'";
$query_integra = mysql_query($query_integra);

while ($row = mysql_fetch_array($query_integra)) {

$cod_pedido_verifica = $row["codigo_pedido"];

$deleta2 = mysql_query("DELETE FROM pedidos_input where pedido='$cod_pedido_verifica'");
}



////////////////////////////


	$query6 = "UPDATE clientes SET roteirizado=null WHERE veiculo = '$id_veiculo'";
	$rs6 = mysql_query($query6);
	
	
	$query_ativa = "UPDATE veiculos SET roteirizado=null, integrado=0 WHERE id = '$id_veiculo'";
	$rs_ativa = mysql_query($query_ativa);

?>
<SCRIPT language="JavaScript">
window.location.href="step3_block.php";

</SCRIPT>


<?php

break;

/////FIM///////LIBERA VEICULO ROTERIZADO////////////////////////////////

//////////////RESTRIGE VEICULO ROTERIZADO////////////////////////////////

case 'bloqueia_veiculo':

$id_veiculo = $_GET["id"];
//echo $id_veiculo ;

	$query6 = "UPDATE clientes SET roteirizado='sim' WHERE veiculo = '$id_veiculo'";
	$rs6 = mysql_query($query6);
	
	
	$query_ativa = "UPDATE veiculos SET roteirizado='sim' WHERE id = '$id_veiculo'";
	$rs_ativa = mysql_query($query_ativa);

?>
<SCRIPT language="JavaScript">
window.location.href="step3_block.php";

</SCRIPT>


<?php

break;

/////FIM///////RESTRIGE VEICULO ROTERIZADO////////////////////////////////


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

/////FIM///////ATIVA VEICULO////////////////////////////////


//////////////INATIVO VEICULO////////////////////////////////

case 'inativa_veiculo':

$id_veiculo = $_GET["id"];
//echo $id_veiculo ;


$query_deleta_rota = "DELETE FROM rotas WHERE veiculo = '$id_veiculo'";
$rs_deleta_rota = mysql_query($query_deleta_rota);
	

	$query6 = "UPDATE clientes SET veiculo=null WHERE veiculo = '$id_veiculo'";
	$rs6 = mysql_query($query6);
	
	
	$query_ativa = "UPDATE veiculos SET equipe=null, peso_total=null, volume_total=null, valor_total=null, ativo=null, distancia_total=0, tempo_total=null, ocupado=0, prioridade=Null WHERE id = '$id_veiculo'";
	$rs_ativa = mysql_query($query_ativa);

?>
<SCRIPT language="JavaScript">

window.location.href="cad_veiculos.php";

</SCRIPT>


<?php

break;

/////FIM///////INATIVO VEICULO////////////////////////////////


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
$setor =  $_POST["custo"];
$custo =  $_POST["custo1"];
$transportadora = $_POST["transp1"];






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

$veiculo = $_POST["veiculo"];
$qto = $_POST["qto"];
$peso = $_POST["peso"];
$volume = $_POST["volume"];
$valor = $_POST["valor"];
$cor = $_POST["color1"];
$tipo = $_POST["type"];
$ativo =  $_POST["ativo"];
$setor =  $_POST["custo"];
$custo =  $_POST["custo1"];
$transportadora = $_POST["transp1"];
/*
echo $veiculo . "<br>";
echo $qto . "<br>";
echo $peso . "<br>";
echo $volume . "<br>";
echo $valor . "<br>";
echo $cor . "<br>";
echo $tipo . "<br>";
echo $ativo . "<br>";
echo $setor . "<br>";
echo $custo . "<br>";
echo $transportadora . "<br>";

echo $type_icon . "<br>";
*/
//$conta = 0;


//while($conta < $qto){
//$conta = $conta + 1;

if($ativo==on){
	$query2 = "INSERT INTO veiculos(nome, peso, volume, valor, cor, tipo, type_icon, ativo, custo, setor, transportadora) VALUES('$veiculo', '$peso', '$volume', '$valor', '$cor', '$tipo', '$type_icon', 'yes', '$custo', '$setor', '$transportadora')";

} else {
$query2 = "INSERT INTO veiculos(nome, peso, volume, valor, cor, tipo, type_icon, setor, custo, transportadora) VALUES('$veiculo', '$peso', '$volume', '$valor', '$cor', '$tipo', '$type_icon', '$setor', '$custo', '$transportadora')";	
}



$rs = mysql_query($query2);

//}
?>

<SCRIPT language="JavaScript">

window.location.href="cad_veiculos.php";

</SCRIPT>

<?php

break;
/////FIM///////CADASTRA VEICULO PAGINA CADASTRO////////////////////////////////

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

$custo =  $_POST["custo"];
$transportadora = $_POST["transp1"];
$custo1 =  $_POST["custo1"];


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
//if($ativo==on){
$query2 = "UPDATE veiculos SET nome='$veiculo', peso='$peso', volume='$volume', valor='$valor', cor='$cor', type_icon='$type_icon', tipo='$tipo', setor='$custo', custo='$custo1', transportadora='$transportadora' where id='$id_quem'";
//} else {
	
//$query2 = "UPDATE veiculos SET nome='$veiculo', peso='$peso', volume='$volume', valor='$valor', cor='$cor', type_icon='$type_icon', tipo='$tipo', ativo='', setor='$custo', custo='$custo1', transportadora='$transportadora where id='$id_quem'";
//}


$rs = mysql_query($query2);

?>
<SCRIPT language="JavaScript">

window.location.href="cad_veiculos.php";

</SCRIPT>
<?php

break;
/////FIM///////ALTERAR VEICULO PAGINA CADASTRO////////////////////////////////




//////////////CADASTRA EQUIPE DO VEICULO////////////////////////////////

case 'cadastra_equipe_veiculo':

//PRIORIDADE

$array_maior = array();

$query_prioridade = "SELECT * from veiculos where ocupado=1";
$rs_prioridade = mysql_query($query_prioridade);

while($row_prio = mysql_fetch_array($rs_prioridade)){
	array_push($array_maior, $row_prio["prioridade"]);
	//echo $row_prio["prioridade"];
}
// Exibição
$guarda_maior= max($array_maior);
$guarda_maior=$guarda_maior + 1;
//CONTROLE PASSO

$query_where = "UPDATE passo SET ok='yes' WHERE id='3'";
$rs_where = mysql_query($query_where);

$query_where1 = "UPDATE passo SET ok='no' WHERE (id='4' OR id='5')";
$rs_where1 = mysql_query($query_where1);

$zoom= $_POST["zoom1"];
$z= $_POST["zoom_x1"];

$pos_x= $_POST["posX2"];
$pos_y= $_POST["posY2"];

$pos_x_tools= $_POST["posX_tools2"];
$pos_y_tools= $_POST["posY_tools2"];

$pos_x_layers= $_POST["posX_layers2"];
$pos_y_layers= $_POST["posY_layers2"];


$cor_veiculo = $_POST["type_icon"];
$tipo = $_POST["tipo"];

$id = $_POST["id_veiculo"];
$peso = $_POST["peso"];
$volume = $_POST["volume"];
$valor = $_POST["valor"];

$peso2 = $_POST["peso2"];
$volume2 = $_POST["volume2"];
$valor2 = $_POST["valor2"];


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


?>

<body bgcolor="#FFFFFF">


<div style="height:100px; background-color:#FFFFFF; width:400px; position: relative; left: 50%; top: 50%; margin-left:-200px; margin-top:-50px">
  <div id="progress" style="position: absolute; left: 28px; top: 28px; width: 342px; height: 40px; background-color: #6f99d6; layer-background-color: #6f99d6; border: 1px none #000000; font-family:Arial, 'Helvetica Neue', Helvetica, sans-serif; font-size:12px">


<?php


for($y=0;$y<$tamanha_array1;$y++){

//// LOADING 0 A 100% ////////////////////////////////////////////////////
	$pega_loading = intval(($y/$tamanha_array1)* 100) . "%";

    echo "<div style='position:absolute;margin:0px 0px 0px 0px;width:$pega_loading;height:40px;background:#2867b2;color:#2867b2;color: #FFFFFF;text-align:center;line-height:40px;'>$pega_loading</div>";
    flush();
    ob_flush();
	
//// LOADING 0 A 100% ////////////////////////////////////////////////////


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

if (round($conta_peso_paratirar) ==0 and $conta_volume_paratirar == 0.00 and $conta_valor_paratirar == 0.00){
	$query6 = "UPDATE veiculos SET peso_total=0, volume_total=0, valor_total=0, equipe=null, ocupado='0', prioridade=Null WHERE id = '$iparr1[$y]'";

$rs6 = mysql_query($query6);
} else {
	$query6 = "UPDATE veiculos SET peso_total='$conta_peso_paratirar', volume_total='$conta_volume_paratirar', valor_total='$conta_valor_paratirar' WHERE id = '$iparr1[$y]'";

	$rs6 = mysql_query($query6);

}

}
/* update cliente */
for($a=0;$a<$tamanha_array;$a++){
	
	$query3 = "UPDATE clientes SET veiculo='$id', ocupado='1' WHERE codigo_cliente = '$iparr[$a]' AND codigo='$iparr5[$a]'";
	$rs3 = mysql_query($query3);
	
}


$query = "select * from veiculos where id='$id'";															
$rs = mysql_query($query);
while($row = mysql_fetch_array($rs)){
  $nome = $row["nome"];
  $query2 = "UPDATE veiculos SET equipe='yes', poligono='$valor_poligono', peso_total='$peso', volume_total='$volume', valor_total='$valor', ocupado='1', prioridade=$guarda_maior WHERE id = '$id'";	
  $rs2= mysql_query($query2);	
}
//numero de pedidos
	$query_qtd = "select * from clientes where veiculo='$id'";															
	$rs_qtd = mysql_query($query_qtd);
	$num_rows = mysql_num_rows($rs_qtd);
// numero de visitas
	
	$query_qtd1 = "select * from clientes where veiculo='$id' group by codigo_cliente";															
	$rs_qtd1 = mysql_query($query_qtd1);
	$num_rows1 = mysql_num_rows($rs_qtd1);

	$result_peso = $peso2 - $peso;
	$result_volume = $volume2 - $volume;
	$result_valor = $valor2 - $valor;
	//$cor_veiculo = $row["type_icon"];
	
	$porcentagem_peso = ($peso/$peso2) * 100;
	$porcentagem_volume = ($volume/$volume2) * 100;
	$porcentagem_valor = ($valor/$valor2) * 100;

	

?>
</div>
</div>
<SCRIPT language="JavaScript">
//alert("Visitas cadastrada com sucesso!");

window.location.href="step3.php?nome=<?=$nome ?>&peso=<?=$peso2 ?>&tipo=<?=$tipo ?>&volume=<?=$volume2 ?>&valor=<?=$valor2 ?>&id=<?=$id ?>&result_peso=<?=$result_peso ?>&result_volume=<?=$result_volume ?>&result_valor=<?=$result_valor ?>&porc_peso=<?=$porcentagem_peso ?>&porc_volume=<?=$porcentagem_volume ?>&porc_valor=<?=$porcentagem_valor ?>&corveiculo=<?=$cor_veiculo?>&numero=<?=$num_rows?>&numero_visitas=<?=$num_rows1?>&zoom=<?=$zoom ?>&z=<?=$z?>&posx=<?=$pos_x ?>&posy=<?=$pos_y ?>&posx_tools=<?=$pos_x_tools ?>&posy_tools=<?=$pos_y_tools ?>&posx_layers=<?=$pos_x_layers ?>&posy_layers=<?=$pos_y_layers ?>";

</SCRIPT>
<?php

break;
////////////// CADASTRA EQUIPE DO VEICULO////////////////////////////////


//////////////CADASTRA EQUIPE DO VEICULO LIVRE ????? ////////////////////////////////

case 'cadastra_equipe_veiculo_novo':


	//PRIORIDADE
	
	$array_maior = array();
	
	$query_prioridade = "SELECT * from veiculos where ocupado=1";
	$rs_prioridade = mysql_query($query_prioridade);
	
	while($row_prio = mysql_fetch_array($rs_prioridade)){
		array_push($array_maior, $row_prio["prioridade"]);
		//echo $row_prio["prioridade"];
	}
	// Exibição
	$guarda_maior= max($array_maior);
	$guarda_maior=$guarda_maior + 1;
	
	//CONTROLE PASSO /////////////////
	
	$query_where = "UPDATE passo SET ok='yes' WHERE id='3'";
	$rs_where = mysql_query($query_where);
	
	$query_where1 = "UPDATE passo SET ok='no' WHERE (id='4' OR id='5')";
	$rs_where1 = mysql_query($query_where1);
	
	//////////////////////////////////
	
	$zoom= $_POST["zoom"];
	$z= $_POST["zoom_x"];
	
	$peso = $_POST["pesox"];
	$volume = $_POST["volumex"];
	$valor = $_POST["valorx"];
	$equipe_poligono = $_POST["equipe_poligonox"];
	$veiculo_tira = $_POST["veiculo_tirax"];
	$veiculo_tira_peso = $_POST["peso_veiculo_tirax"];
	$veiculo_tira_volume = $_POST["volume_veiculo_tirax"];
	$veiculo_tira_valor = $_POST["valor_veiculo_tirax"];
	$endereco_cliente = $_POST["endereco_clientex"];
	
	
	
	//$cor_veiculo = $_POST["type_iconx"];
	//$tipo = $_POST["tipox"];
	$id = $_POST["id_veiculox_ok"];
	
	
	$query_vai = "select * from veiculos where id='$id'";
	$rs_vai = mysql_query($query_vai);
	while($row_vai = mysql_fetch_array($rs_vai)){
	
	$peso2 = $row_vai["peso"];
	$volume2 = $row_vai["volume"];
	$valor2 = $row_vai["valor"];
	$peso_existente= $row_vai["peso_total"];
	$volume_existente = $row_vai["volume_total"];
	$valor_existente = $row_vai["valor_total"];
	}
	
	/*
	
	$peso2 = $_POST["peso2x"];
	$volume2 = $_POST["volume2x"];
	$valor2 = $_POST["valor2x"];
	$peso_existente= $_POST["peso_existente"];
	$volume_existente = $_POST["volume_existente"];
	$valor_existente = $_POST["valor_existente"];
	
	*/
	
	
	
	
	
	
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
	
	?>
	
	<body bgcolor="#FFFFFF">
	
	
	<div style="height:100px; background-color:#FFFFFF; width:400px; position: relative; left: 50%; top: 50%; margin-left:-200px; margin-top:-50px">
	  <div id="progress" style="position: absolute; left: 28px; top: 28px; width: 342px; height: 40px; background-color: #6f99d6; layer-background-color: #6f99d6; border: 1px none #000000; font-family:Arial, 'Helvetica Neue', Helvetica, sans-serif; font-size:12px">
	
	
	<?php
	
	
	
	//echo $query_prioridade['prioridade'];
	
	for($y=0;$y<$tamanha_array1;$y++){
	
	//// LOADING 0 A 100% ////////////////////////////////////////////////////
		$pega_loading = intval(($y/$tamanha_array1)* 100) . "%";
	
		echo "<div style='position:absolute;margin:0px 0px 0px 0px;width:$pega_loading;height:40px;background:#2867b2;color:#2867b2;color: #FFFFFF;text-align:center;line-height:40px;'>$pega_loading</div>";
		flush();
		ob_flush();
		
	//// LOADING 0 A 100% ////////////////////////////////////////////////////
	
	/*
	
	*/
	
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
	
	//echo $conta_peso_paratirar . "<br>";
	//echo $conta_volume_paratirar . "<br>";
	//echo $conta_valor_paratirar . "<br>";
	
	if($id==$iparr1[$y]){
	$peso_existente = $peso_existente - $iparr2[$y];	
	$volume_existente= $volume_existente -$iparr3[$y];
	$valor_existente= $valor_existente -	$iparr4[$y];
	}
	
	
	if (round($conta_peso_paratirar) ==0 and $conta_volume_paratirar == 0.00 and $conta_valor_paratirar == 0.00){
		$query6 = "UPDATE veiculos SET peso_total=0, volume_total=0, valor_total=0, equipe=null, ocupado='0', prioridade=Null WHERE id = '$iparr1[$y]'";
	
	$rs6 = mysql_query($query6);
	} else {
		$query6 = "UPDATE veiculos SET peso_total='$conta_peso_paratirar', volume_total='$conta_volume_paratirar', valor_total='$conta_valor_paratirar' WHERE id = '$iparr1[$y]'";
	
		$rs6 = mysql_query($query6);
	
	}
	
	}
	/* update cliente */
	
	for($a=0;$a<$tamanha_array;$a++){
		
		$query3 = "UPDATE clientes SET veiculo='$id', ocupado='1' WHERE codigo_cliente = '$iparr[$a]' AND codigo='$iparr5[$a]'";
		$rs3 = mysql_query($query3);
		
	}
	
	//$peso1 = 0;
	//$volume1 = 0;
	//$valor1 = 0;
	
	
	$peso1 = $peso + $peso_existente;
	$volume1 = $volume + $volume_existente;
	$valor1 = $valor + $valor_existente;
	
	//echo "<br><br><br><br><br>";
	//echo $peso_existente . "<br>";
	//echo $volume_existente . "<br>";
	//echo $valor_existente . "<br>";
	
	$query = "select * from veiculos where id='$id'";
	$rs = mysql_query($query);
	
	while($row = mysql_fetch_array($rs)){
	  $nome = $row["nome"];
	  $query2 = "UPDATE veiculos SET equipe='yes', poligono='$valor_poligono', peso_total='$peso1', volume_total='$volume1', valor_total='$valor1', ocupado='1', prioridade='$guarda_maior' WHERE id = '$id'";	
	  $rs2= mysql_query($query2);	
	}
	
		$query_qtd = "select * from clientes where veiculo='$id'";															
		$rs_qtd = mysql_query($query_qtd);
	
		$num_rows = mysql_num_rows($rs_qtd);
	
		$result_peso = $peso2 - $peso;
		$result_volume = $volume2 - $volume;
		$result_valor = $valor2 - $valor;
		//$cor_veiculo = $row["type_icon"];
		
		$porcentagem_peso = ($peso/$peso2) * 100;
		$porcentagem_volume = ($volume/$volume2) * 100;
		$porcentagem_valor = ($valor/$valor2) * 100;
	
	//echo $zoom;
	
	?>
	</div>
	</div>
	<SCRIPT language="JavaScript">
	//alert("Visitas cadastrada com sucesso!");
	//window.parent.location.reload();
	window.parent.location.href="step3.php?zoom=<?=$zoom ?>&z=<?=$z ?>&posx=<?=$pos_x ?>&posy=<?=$pos_y ?>&posx_tools=<?=$pos_x_tools ?>&posy_tools=<?=$pos_y_tools ?>&posx_layers=<?=$pos_x_layers ?>&posy_layers=<?=$pos_y_layers ?>";
	
	
	
	
	</SCRIPT>
	<?php
	
	break;
	//////////////CADASTRA EQUIPE DO VEICULO ????? ////////////////////////////////

////////////// CADASTRA ROTA REORDENAR ////////////////////////////////
case 'reordenar_rotas':

	$query_where = "UPDATE passo SET ok='yes' WHERE id='5'";
	$rs_where = mysql_query($query_where);
	
	$id_cliente= $_POST["xxx"];
	$ordem = $_POST["yyy"];
	$id_veiculo= $_POST["zzz"];
	$distancia= $_POST["qqq"];
	$tempo= $_POST["kkk"];
	$qual_rota= $_POST["www"];
	$qual_pedido= $_POST["eee"];
	$inicio= $_POST["inicio"];
	$final= $_POST["final"];
	$qual_tipo_rota = $_POST["qual_tipo_rota"];
	/////////////////////////////////////////
	$distancia_total = $_POST["ultimao"];
	$veiculo_total = $_POST["ultimao_2"];
	$tempo_total = $_POST["ultimao_3"];
	/////////////////////////////////////////
	
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
	//print_r($i_distancia);
	$i_tempo= split ("\,", $tempo);
	//print_r($i_tempo);
	$i_rota= split ("\,", $qual_rota);
	
	$i_codpedido= split ("\,", $qual_pedido);
	$tamanha_array = count($i_codpedido);
	
	//echo $tamanha_array;
	
	
	?>
	
	<body bgcolor="#FFFFFF">
	
	
	<div style="height:100px; background-color:#FFFFFF; width:400px; position: relative; left: 50%; top: 50%; margin-left:-200px; margin-top:-50px">
	  <div id="progress" style="position: absolute; left: 28px; top: 28px; width: 342px; height: 40px; background-color: #FFFFFF; layer-background-color: #6f99d6; border: 1px none #000000; font-family:Arial, 'Helvetica Neue', Helvetica, sans-serif; font-size:12px">
	
	
	<?php
	
	
	for($y=0;$y<$tamanha_array;$y++){
		
	//// LOADING 0 A 100% ////////////////////////////////////////////////////
		$pega_loading = intval(($y/$tamanha_array)* 100) . "%";
	
		echo "<div style='position:absolute;margin:0px 0px 0px 0px;width:$pega_loading;height:40px;background:#2867b2;color:#2867b2;color: #FFFFFF;text-align:center;line-height:40px;'>$pega_loading</div>";
		flush();
		ob_flush();
		
	//// LOADING 0 A 100% ////////////////////////////////////////////////////
	
	
	
		//NOME DA ROTA////////////////////
		
		//$somadata_rota = time("d-m-Y H") ;
	//	$somadata_rota = 'R' . str_pad($i_rota[$y], 2, '0', STR_PAD_LEFT) . substr($somadata_rota,0,-3);
		
	$data_hoje = date("d-m-Y");
	
		$somadata_rota = time("d-m-Y H:i") ;
		$somadata_rota = substr($somadata_rota,0,-2). str_pad($i_rota[$y], 2, '0', STR_PAD_LEFT);
		$somadata_rota = $somadata_rota;
	
	$transp_query = "select transportadora from veiculos where id='$i_id_veiculo[$y]'";
	$rs_transp = mysql_query($transp_query);
	
	$dados = mysql_fetch_array($rs_transp);
	
	$transp = $dados['transportadora'];
	
	if($transp==''){
		$transp = 'S/ TRANSPORTADORA';
	
	}
		 
		$query3 = "UPDATE rotas SET veiculo='$i_id_veiculo[$y]', transportadora='$transp', nome_rota='$somadata_rota', ordem='$i_ordem[$y]', distancia='$i_distancia[$y]', tempo='$i_tempo[$y]', tempo_servico='$data_hoje', reordenar=0 WHERE id = '$i_id_cliente[$y]'";
		
		//$query3 = "INSERT INTO rotas(veiculo, nome_rota, ordem, distancia, tempo) VALUES ('$i_id_veiculo[$y]', '$somadata_rota', '$i_ordem[$y]', '$i_distancia[$y]', '$i_tempo[$y]')WHERE codigo_cliente = '$i_id_cliente[$y]' AND codigo_pedido='$i_codpedido[$y]'";
		
		
		$rs3 = mysql_query($query3);
		
	//	$query_cliente_usado = "UPDATE clientes SET roteirizado='sim' WHERE codigo_cliente = '$i_id_cliente[$y]'";
	//	$rs_cliente_usado = mysql_query($query_cliente_usado);
	
	}
	
	
	
	?>
	</div>
	</div>
	<SCRIPT language="JavaScript">
	//alert("Visitas cadastrada com sucesso!");
	window.history.back();
	//window.location.href="step4_1r.php?imgsel=<?php echo $qual_tipo_rota ?>&inicio=<?php echo $inicio ?>&final=<?php echo $final ?><?php echo $guarda_linha_check; ?>";
	
	</SCRIPT>
	<?php
	
	
	break;
	////////////// CADASTRA ROTA REORDENAR ////////////////////////////////
	
//////////////CADASTRA ROTA ////////////////////////////////
case 'cadastra_rotas_cadd':

	$query_where = "UPDATE passo SET ok='yes' WHERE id='5'";
	$rs_where = mysql_query($query_where);
	
	
	$id_cliente= $_POST["xxx"];
	$ordem = $_POST["yyy"];
	$id_veiculo= $_POST["zzz"];
	$distancia= $_POST["qqq"];
	$tempo= $_POST["kkk"];
	$qual_rota= $_POST["www"];
	$qual_pedido= $_POST["eee"];
	
	$check_list =  $_POST["check_list"];
	
	$qual_tipo_rota = $_POST["qual_tipo_rota"];

	//echo $id_cliente;
	//echo $id_veiculo;
	
	
	/////////////////////////////////////////
	$distancia_total = $_POST["ultimao"];
	$veiculo_total = $_POST["ultimao_2"];
	$tempo_total = $_POST["ultimao_3"];
	/////////////////////////////////////////
	
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
	//print_r($i_distancia);
	$i_tempo= split ("\,", $tempo);
	//print_r($i_tempo);
	$i_rota= split ("\,", $qual_rota);
	
	$i_codpedido= split ("\,", $qual_pedido);
	$tamanha_array = count($i_codpedido);
	
	//echo $tamanha_array;
	
	
	?>
	
	<body bgcolor="#FFFFFF">
	
	
	<div style="height:100px; background-color:#FFFFFF; width:400px; position: relative; left: 50%; top: 50%; margin-left:-200px; margin-top:-50px">
	  <div id="progress" style="position: absolute; left: 28px; top: 28px; width: 342px; height: 40px; background-color: #FFFFFF; layer-background-color: #6f99d6; border: 1px none #000000; font-family:Arial, 'Helvetica Neue', Helvetica, sans-serif; font-size:12px">
	
	
	<?php
	$randomico = rand(1, 1000);
	
	for($y=0;$y<$tamanha_array;$y++){
		
	//// LOADING 0 A 100% ////////////////////////////////////////////////////
		$pega_loading = intval(($y/$tamanha_array)* 100) . "%";
	
		echo "<div style='position:absolute;margin:0px 0px 0px 0px;width:$pega_loading;height:40px;background:#2867b2;color:#2867b2;color: #FFFFFF;text-align:center;line-height:40px;'>$pega_loading</div>";
		flush();
		ob_flush();
		
	//// LOADING 0 A 100% ////////////////////////////////////////////////////
	
	
	
		//NOME DA ROTA////////////////////
		
		//$somadata_rota = time("d-m-Y H") ;
	//	$somadata_rota = 'R' . str_pad($i_rota[$y], 2, '0', STR_PAD_LEFT) . substr($somadata_rota,0,-3);
		
	$data_hoje = date("d-m-Y");
	
		$somadata_rota = date("dmy") . $randomico;
		$somadata_rota = $somadata_rota . $i_id_veiculo[$y] . str_pad($i_rota[$y], 2, '0', STR_PAD_LEFT);
		$somadata_rota = $somadata_rota;
	
	$transp_query = "select transportadora, setor from veiculos where id='$i_id_veiculo[$y]'";
	$rs_transp = mysql_query($transp_query);
	
	$dados = mysql_fetch_array($rs_transp);
	
	$transp = $dados['transportadora'];
	$redespacho = $dados['setor'];

	if($transp==''){
		$transp = 'S/ TRANSPORTADORA';
	
	}
		 
		$query3 = "UPDATE rotas SET veiculo='$i_id_veiculo[$y]', transportadora='$transp', nome_rota='$somadata_rota', ordem='$i_ordem[$y]', distancia='$i_distancia[$y]', tempo='$i_tempo[$y]', tempo_servico='$data_hoje', data_entrega='$data_hoje', redespacho='$redespacho' WHERE id = '$i_id_cliente[$y]'";
		
		//$query3 = "INSERT INTO rotas(veiculo, nome_rota, ordem, distancia, tempo) VALUES ('$i_id_veiculo[$y]', '$somadata_rota', '$i_ordem[$y]', '$i_distancia[$y]', '$i_tempo[$y]')WHERE codigo_cliente = '$i_id_cliente[$y]' AND codigo_pedido='$i_codpedido[$y]'";
		
		
		$rs3 = mysql_query($query3);
		
	//	$query_cliente_usado = "UPDATE clientes SET roteirizado='sim' WHERE codigo_cliente = '$i_id_cliente[$y]'";
	//	$rs_cliente_usado = mysql_query($query_cliente_usado);
	
	}
	
	
	$rotas_final = "select veiculo from rotas group by veiculo";
	$rotas_final = mysql_query($rotas_final);

	while($row = mysql_fetch_array($rotas_final)){

		$caminhao = $row["veiculo"];

		$rotas .= "&rotas[]=".  $caminhao;

	}
	
	?>
	</div>
	</div>
	<SCRIPT language="JavaScript">
	//alert("Visitas cadastrada com sucesso!");
	
	window.location.href="step4_1r.php?<?php echo $rotas; ?>";
	
	</SCRIPT>
	<?php
	
	
	break;


	

//////////////grava_lat_lgn_veiculo ////////////////////////////////
case 'grava_lat_lgn_veiculo':

	$loc_inicio= $_POST["inicio_todos"];
	$loc_final= $_POST["final_todos"];
	$check= $_POST["qual_veiculo"];

	$check_list = $_POST["check_list"];
	$check_list1 = $_POST["check_list1"];

	$monta_array ="";
	$monta_array2 ="";
	$monta_array3 ="";


foreach($check as $indice => $valor)
{
   //var_dump($indice, $valor);

   $query = "UPDATE veiculos SET local_inicio='$loc_inicio[$indice]', local_final='$loc_final[$indice]' where id='$valor'";
   $rs = mysql_query($query);

  // $monta_array .= "&inicio_todos[]=" . $loc_inicio[$indice] .  "&final_todos[]=" . $loc_final[$indice];



}
foreach($check_list1 as $indice2 => $valor) {

	$monta_array3 .= "&check_list1[]=" . $check_list1[$indice2];
	
	}


foreach($check_list as $indice1 => $valor) {

$monta_array2 .= "&check_list[]=" . $check_list[$indice1];

}



?>
<SCRIPT language="JavaScript">
//alert("Visitas cadastrada com sucesso!");

window.location.href="step4_1.php?<?php echo $monta_array2 ?><?php echo $monta_array3 ?>";

</SCRIPT>

<?php
break;



	////////////// CADASTRA ROTA ////////////////////////////////
	
	


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

$inicio= $_POST["inicio"];
$final= $_POST["final"];

$qual_tipo_rota = $_POST["qual_tipo_rota"];

$check_list1 =  $_POST["check_list1"];

//print_r($check_list1) ;


/////////////////////////////////////////
$distancia_total = $_POST["ultimao"];
$veiculo_total = $_POST["ultimao_2"];
$tempo_total = $_POST["ultimao_3"];
/////////////////////////////////////////

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
//print_r($i_distancia);
$i_tempo= split ("\,", $tempo);
//print_r($i_tempo);
$i_rota= split ("\,", $qual_rota);

$i_codpedido= split ("\,", $qual_pedido);
$tamanha_array = count($i_codpedido);

//echo $tamanha_array;


?>

<body bgcolor="#FFFFFF">


<div style="height:100px; background-color:#FFFFFF; width:400px; position: relative; left: 50%; top: 50%; margin-left:-200px; margin-top:-50px">
  <div id="progress" style="position: absolute; left: 28px; top: 28px; width: 342px; height: 40px; background-color: #FFFFFF; layer-background-color: #6f99d6; border: 1px none #000000; font-family:Arial, 'Helvetica Neue', Helvetica, sans-serif; font-size:12px">


<?php

$randomico = rand(1, 1000);

for($y=0;$y<$tamanha_array;$y++){
	
//// LOADING 0 A 100% ////////////////////////////////////////////////////
	$pega_loading = intval(($y/$tamanha_array)* 100) . "%";

    echo "<div style='position:absolute;margin:0px 0px 0px 0px;width:$pega_loading;height:40px;background:#2867b2;color:#2867b2;color: #FFFFFF;text-align:center;line-height:40px;'>$pega_loading</div>";
    flush();
    ob_flush();
	
//// LOADING 0 A 100% ////////////////////////////////////////////////////



	//NOME DA ROTA////////////////////
	
	//$somadata_rota = time("d-m-Y H") ;
//	$somadata_rota = 'R' . str_pad($i_rota[$y], 2, '0', STR_PAD_LEFT) . substr($somadata_rota,0,-3);
	
$data_hoje = date("d-m-Y", strtotime('+1 days'));

	$somadata_rota = date("dmy") . $randomico ;
	$somadata_rota = $somadata_rota. $i_id_veiculo[$y] . str_pad($i_rota[$y], 2, '0', STR_PAD_LEFT);
	$somadata_rota = $somadata_rota;

$transp_query = "select transportadora, setor from veiculos where id='$i_id_veiculo[$y]'";
$rs_transp = mysql_query($transp_query);

$dados = mysql_fetch_array($rs_transp);
$transp = $dados['transportadora'];
$redespacho = $dados['setor'];

if($transp==''){
	$transp = 'S/ TRANSPORTADORA';
}
	 
	$query3 = "UPDATE rotas SET veiculo='$i_id_veiculo[$y]', transportadora='$transp', nome_rota='$somadata_rota', ordem='$i_ordem[$y]', distancia='$i_distancia[$y]', tempo='$i_tempo[$y]', tempo_servico='$data_hoje', data_entrega='$data_hoje', redespacho='$redespacho' WHERE id = '$i_id_cliente[$y]'";
	
	//$query3 = "INSERT INTO rotas(veiculo, nome_rota, ordem, distancia, tempo) VALUES ('$i_id_veiculo[$y]', '$somadata_rota', '$i_ordem[$y]', '$i_distancia[$y]', '$i_tempo[$y]')WHERE codigo_cliente = '$i_id_cliente[$y]' AND codigo_pedido='$i_codpedido[$y]'";
	
	
	$rs3 = mysql_query($query3);
	
//	$query_cliente_usado = "UPDATE clientes SET roteirizado='sim' WHERE codigo_cliente = '$i_id_cliente[$y]'";
//	$rs_cliente_usado = mysql_query($query_cliente_usado);

}
/*
foreach($_POST['check_list'] as $report_id){
	// echo $report_id;
	$arr[$i] = $report_id;
	//print_r ($arr[$i]);

	
	$guarda_linha_check.= "&check_list1[]=".  $arr[$i];

	//echo implode("\n", $arr[$i]);
	//var_dump($arr);
	$i++;
}

/*

$cli_divide =  split ("\,", $id_veiculo);
$cli_divide = array_unique($cli_divide);

$conta_quantas_rotas = count($cli_divide);
//echo $cli_divide[0];

for ($i = 0; $i <  count($cli_divide); $i++) {
    $key=key($cli_divide);
    $val=$cli_divide[$key];
    if ($val<> '') {
       //echo "&check_list[]=".  $val;
	   $guarda_linha_check.= "&check_list1[]=".  $val;
       }
     next($cli_divide);
    }
	*/


?>
</div>
</div>
<SCRIPT language="JavaScript">
//alert("Visitas cadastrada com sucesso!");
//window.location.href="step4_1.php?imgsel=<?php echo $qual_tipo_rota ?>&inicio=<?php echo $inicio ?>&final=<?php echo $final ?><?php echo $check_list; ?>";
window.location.href="step4_1_c.php?<?php echo $check_list1[0]; ?>";

</SCRIPT>
<?php


break;
////////////// CADASTRA ROTA ////////////////////////////////



case 'limpa_filtro_step3':

	include ('session.php'); 
	unset($_SESSION['setor']);
	unset($_SESSION['vendedor']);
	unset($_SESSION["classificacao"]);

	$url = $_SESSION["urlred"];
	//echo $url;
    header('Location: ' .$url);
//window.location.href="step3.php";

break;




case 'limpa_filtro_step3_vendedor':

	include ('session.php'); 
	unset($_SESSION['setor']);
	unset($_SESSION['vendedor']);
	unset($_SESSION["classificacao"]);

	$url = $_SESSION["urlred"];
	//echo $url;
    header('Location: ' .$url);
//window.location.href="step3.php";

break;



case 'limpa_filtro_step3_setor':

	include ('session.php'); 
	unset($_SESSION['setor']);
	unset($_SESSION['vendedor']);
	unset($_SESSION["classificacao"]);

	$url = $_SESSION["urlred"];
	//echo $url;
    header('Location: ' .$url);
//window.location.href="step3.php";

break;

///////////////////////////////////////////////////////
///////////////////////////////////////////////////////
///////////////////////////////////////////////////////
///////////////////////////////////////////////////////
//////////CARGA AUTOMATICA/////////////////////////////
///////////////////////////////////////////////////////
///////////////////////////////////////////////////////
///////////////////////////////////////////////////////
///////////////////////////////////////////////////////
///////////////////////////////////////////////////////
///////////////////////////////////////////////////////


case 'carga_auto':



/// CLASSE HAVERSINE///////////////////////////////////////
class HaverSign {

     public static function getDistance($latitude1, $longitude1, $latitude2, $longitude2) {
        $earth_radius = 6371;

        $dLat = deg2rad($latitude2 - $latitude1);
        $dLon = deg2rad($longitude2 - $longitude1);

        $a = sin($dLat/2) * sin($dLat/2) + cos(deg2rad($latitude1)) * cos(deg2rad($latitude2)) * sin($dLon/2) * sin($dLon/2);
        $c = 2 * asin(sqrt($a));
        $d = $earth_radius * $c;

        return $d;
	}
}
/// CLASSE HAVERSINE///////////////////////////////////////

?>

<body bgcolor="#000000">


<div style="height:100px; background-color:#000000; width:400px; position: relative; left: 50%; top: 50%; margin-left:-200px; margin-top:-50px">
  <div id="progress" style="position: absolute; left: 28px; top: 28px; width: 342px; height: 40px; background-color: #6f99d6; layer-background-color: #6f99d6; border: 1px none #000000; font-family:Arial, 'Helvetica Neue', Helvetica, sans-serif; font-size:12px">


<?php
///ZERA TUDO //////////////////////////////////////////////
$query = mysql_query("select * from veiculos", $id);															

while($row = mysql_fetch_array($query)){
  $query2 = "UPDATE veiculos SET equipe=NULL, peso_total=NULL, volume_total=NULL, valor_total=NULL, ocupado='0'";
  $rs2= mysql_query($query2, $id);
}

$query3 = mysql_query("select * from clientes", $id);															

$conta = 0;
$total = mysql_num_rows($query3);
while($row3 = mysql_fetch_array($query3)){
	
//// LOADING 0 A 100% ////////////////////////////////////////////////////
	$pega_loading = intval(($conta/$total)* 100) . "%";

    echo "<div style='position:absolute;margin:0px 0px 0px 0px;width:$pega_loading;height:40px;background:#2867b2;color:#2867b2;color: #FFFFFF;text-align:center;line-height:40px;'>$pega_loading</div>";
    flush();
    ob_flush();
	
//// LOADING 0 A 100% ////////////////////////////////////////////////////


  $conta++;	
  
  $query4 = "UPDATE clientes SET veiculo=NULL, ocupado='0'";
  $rs4= mysql_query($query4, $id);

}
///ZERA TUDO //////////////////////////////////////////////

///TEMPORARIO

//$update_veiculo_VAI = mysql_query("UPDATE clientes SET veiculo='31'", $id);

//// PONTO INICIAL (distribuidora)////////////////////////////////////////
$query_pontos = mysql_query("select * from pontos", $id);	

while($row_pontos= mysql_fetch_array($query_pontos)){	
 $lat_ponto = $row_pontos["latitude"];
 $lon_ponto = $row_pontos["longitude"]; 
}
//// PONTO INICIAL (distribuidora)////////////////////////////////////////

$array_selecao_clientes=array();

//// SEPARA POR SETOR ////////////////////////////////////
$query_setor = mysql_query("select * from clientes group by setor", $id);	

//// LOOPING DO SETOR ////////////////////////////////////
while($row_setor= mysql_fetch_array($query_setor)){	
$setores = $row_setor["setor"];
 
//// PEGAR MAIOR VEICULO DO SETOR OU CORINGA ////////////////////////////////////

$query_veiculo = mysql_query("select * from veiculos where ocupado=0 AND ativo='yes' AND (setor='' OR setor='$setores') order by peso DESC, volume DESC, valor DESC limit 1", $id);
//$compara_veiculo=array();


while($row_veiculo= mysql_fetch_array($query_veiculo)){	
 
 


  $peso_veiculo = $row_veiculo["peso"];
  $volume_veiculo = $row_veiculo["volume"];
  $valor_veiculo = $row_veiculo["valor"];
  
//////VEICULO PADRAO DO SETOR ESCOLHIDO //////
$maxPeso = $peso_veiculo;
$maxVolume = $volume_veiculo;
$maxValor = $valor_veiculo;
$maxTempo = 28800;
//$maxTempo = 2600;
//////VEICULO PADRAO DO SETOR ESCOLHIDO //////

//echo "p: " . $peso_veiculo . " v: " . $volume_veiculo . " va: " . $valor_veiculo;

}
//// PEGAR MAIOR VEICULO DO SETOR OU CORINGA ////////////////////////////////////


 
//// PONTO MAIS DISTANTE DA DISTRIBUIDORA////////////////////////////////////////
$query_cli = mysql_query("select * from clientes where setor='$setores' AND ocupado='0'", $id);	

$haversign=new HaverSign();
$distancia=array();

 $soma_tempo_percurso = 0;

while($row_cli= mysql_fetch_array($query_cli)){
 $codigo_cli = $row_cli["codigo"];
 $lat_cli = $row_cli["latitude_cad"];
 $lon_cli = $row_cli["longitude_cad"];
 
 	$peso_cli = $row_cli["peso"];
    $volume_cli = $row_cli["volume"];
    $valor_cli = $row_cli["valor"];
	$temposervico_cli = $row_cli["tempo_servico"];
	
 
$dist = $haversign->getDistance($lat_ponto,$lon_ponto,$lat_cli,$lon_cli);
array_push($distancia, array(distancia => $dist, id => $codigo_cli, lat => $lat_cli, lon => $lon_cli, peso=> $peso_cli, volume => $volume_cli, valor => $valor_cli, tempo_servico => $temposervico_cli));


}

usort($distancia, function($a, $b) {   
	 return $a['distancia'] - $b['distancia'];	 
});

//$clength=count($distancia);
$distancia = array_reverse($distancia);

//print_r($distancia[0]['id']);
//print_r($distancia);
//echo "<br>";
$guarda_point_maisdistante = $distancia[0]['id'];
$guarda_lat_maisdistante = $distancia[0]['lat'];
$guarda_lon_maisdistante = $distancia[0]['lon'];
$guarda_peso_maisdistante = $distancia[0]['peso'];
$guarda_volume_maisdistante = $distancia[0]['volume'];
$guarda_valor_maisdistante = $distancia[0]['valor'];
$guarda_temposervico_maisdistante = $distancia[0]['tempo_servico'];
$guarda_temposervico_maisdistante = $guarda_temposervico_maisdistante * 60;
 
 
$time_travel = ($distancia[0]['distancia'] / 50) * 3600; 


// echo "<br><h2><b><font color='#FF5500'> SETOR: " . $setores . "</font></b></h2>";
// echo "<br>";
 
/*$total = $time_travel;
$horas = floor($total / 3600);
$minutos = floor(($total - ($horas * 3600)) / 60);
$segundos = floor($total % 60);*/
//echo $horas . ":" . $minutos . ":" . $segundos;

 //echo ($time_travel * 2) +  $guarda_temposervico_maisdistante;
 
// echo "<b>PRIMEIRO CLIENTE ID :</b>". "" . $guarda_point_maisdistante . "<br>";;
   
 //echo "Tempo total: " . (($time_travel * 2) + $guarda_temposervico_maisdistante) . "<br>";
 $tempo_primeira_perna = $time_travel + $guarda_temposervico_maisdistante;
//echo "TEMPO PRIMEIRA PERNA: " . $tempo_primeira_perna . "<br>";
  
 if (($time_travel * 2) +  $guarda_temposervico_maisdistante > $maxTempo){
	
	/// echo "<font color='#FF0004'>ESTOUROU O TEMPO NO PRIMEIRO CLIENTE!". "</font><br>";
	
 } else {

	// echo "<font color='#128E03'>NAO ESTOUROU O TEMPO NO PRIMEIRO CLIENTE!" . "</font><br>";
 }


// echo "Peso cliente: " . $guarda_peso_maisdistante . "<br>";
// echo "Peso Maximo: " . $maxPeso . "<br>";
 
 
if ($guarda_peso_maisdistante > $maxPeso){
	//echo "<font color='#FF0004'>ESTOUROU O PESO NO PRIMEIRO CLIENTE!". "</font><br>";
} else {
	//echo "<font color='#128E03'>NAO ESTOUROU O PESO NO PRIMEIRO CLIENTE!" . "</font><br>";
 }
 
 
 //echo "Volume cliente: " . $guarda_volume_maisdistante . "<br></font>";
 //echo "Volume Maximo: " . $maxVolume . "<br>";
 
 if ($guarda_volume_maisdistante > $maxVolume){
///	echo "<font color='#FF0004'>ESTOUROU O VOLUME NO PRIMEIRO CLIENTE!". "<br>";
} else {
//	echo "<font color='#128E03'>NAO ESTOUROU O VOLUME NO PRIMEIRO CLIENTE!" . "</font><br>";
 }
 
 
// echo "Valor cliente: " . $guarda_valor_maisdistante . "<br></font>";
// echo "Valor Maximo: " . $maxValor . "<br>";
 
 if ($guarda_valor_maisdistante > $maxValor){
	//echo "<font color='#FF0004'>ESTOUROU O VALOR NO PRIMEIRO CLIENTE!". "<br>";
} else {
	//echo "<font color='#128E03'>NAO ESTOUROU O VALOR NO PRIMEIRO CLIENTE!" . "</font><br>";
 }
 
 
//$update_veiculo_maislonge = mysql_query("UPDATE clientes SET veiculo='33' WHERE codigo='$guarda_point_maisdistante'", $id);




array_push($array_selecao_clientes, $guarda_point_maisdistante);
//print_r($array_selecao_clientes);

//// PONTO MAIS DISTANTE DA DISTRIBUIDORA////////////////////////////////////////




//// PONTO MAIS PROXIMO ////////////////////////////////////////
$query_continua = mysql_query("select * from clientes where codigo!=$guarda_point_maisdistante AND setor='$setores'", $id);
//$query_continua = mysql_query("select * from clientes where veiculo=NULL");

$haversign_continua=new HaverSign();	
$haversign_todos_voltando=new HaverSign();


$distancia_continua=array();

while($row_continua= mysql_fetch_array($query_continua)){

 	$codigo_continua = $row_continua["codigo"];
	$lat_continua = $row_continua["latitude_cad"];
 	$lon_continua = $row_continua["longitude_cad"];
	$peso_continua = $row_continua["peso"];
	$volume_continua = $row_continua["volume"];
	$valor_continua = $row_continua["valor"];
	$temposervico_continua = $row_continua["tempo_servico"];
	
	//$dist_continua = $haversign_continua->getDistance($guarda_lat_maisdistante,$guarda_lon_maisdistante,$lat_continua,$lon_continua);

	array_push($distancia_continua, array(id => $codigo_continua, lat => $lat_continua, lon => $lon_continua, peso=> $peso_continua, volume => $volume_continua, valor => $valor_continua, tempo_servico => $temposervico_continua, distancia => ""));

	
}
/// PRIMEIRO RESULTADO //////////////////////////
$segura_lat = $guarda_lat_maisdistante;
$segura_lon = $guarda_lon_maisdistante;
/// PRIMEIRO RESULTADO //////////////////////////

$contaconta = 0;

$MaxSoma_internos = $guarda_peso_maisdistante;
$MaxVolume_internos = $guarda_volume_maisdistante;
$MaxValor_internos = $guarda_valor_maisdistante;

//echo "<br>";

$array_compara_veiculos = array();
$array_excluidos_veiculos = array();
$array_excluidos = array();


$conta_array = count($distancia_continua) - 1;
$conta_problema = 0;


while($contaconta <= $conta_array){
	
//echo "<br><br><b>CLIENTE NUMERO: </b>". $contaconta . "<br>";

$distancia_todos = $haversign_continua->getDistance($segura_lat, $segura_lon, $distancia_continua[$contaconta]['lat'], $distancia_continua[$contaconta]['lon']);


$distancia_todos_voltando = $haversign_todos_voltando->getDistance($lat_ponto,$lon_ponto, $distancia_continua[$contaconta]['lat'], $distancia_continua[$contaconta]['lon']);

$datempodevoltar = $distancia_todos_voltando + $tempo_primeira_perna;
//echo $datempodevoltar . "<br>";


//print_r($distancia_continua);

if($datempodevoltar > $maxTempo) {
		//array_splice($distancia_continua, $contaconta);
		echo "ESTOUROU O TEMPO PARA VOLTAR AO DISTRIBUIDOR";
		//print_r($distancia_continua);
}


$distancia_continua[$contaconta]['distancia'] = $distancia_todos;


if($contaconta == $conta_array AND $conta_array >= 0) {


$min_x = min( array_column($distancia_continua, 'distancia') );
//echo $min_x. "<br><br>";

$key = array_search($min_x, array_column($distancia_continua, 'distancia'));
//echo $key . "<br><br>";
//print_r($distancia_continua);

$segura_lat=$distancia_continua[$key]['lat'];
$segura_lon=$distancia_continua[$key]['lon'];
$segura_peso=$distancia_continua[$key]['peso'];
$segura_volume=$distancia_continua[$key]['volume'];
$segura_valor=$distancia_continua[$key]['valor'];
$segura_tv=$distancia_continua[$key]['tempo_servico'];
$segura_id=$distancia_continua[$key]['id'];

//echo "<br>";	
//echo "<b>PEGOU O CLIENTE MAIS PERTO ID: </b>" . $segura_id;	
//echo "<br>";	

//$time_travel_soma = $time_travel_soma + ($distancia_continua[0]['distancia'] / 50) * 3600;

/// VERIFICA TEMPO ///////////////////////////////////////////////////////////////////
//echo "<b>TEMPO VISITA: </b>" . $segura_tv * 60;	
//echo "<br>";	
//echo "<b>TEMPO DE DESLOCAMENTO: </b>" . $time_travel;
//echo "<br>";	
$soma_tempo_percurso = $time_travel + $guarda_temposervico_maisdistante + $time_travel_soma + ($distancia_vonta/ 50 * 3600) + ($segura_tv * 60);
//echo "<b>TEMPO TOTAL: </b>" . $soma_tempo_percurso;	
//echo "<br>";	 
if ($soma_tempo_percurso > $maxTempo){
	// echo "<font color='#FF0004'>ESTOUROU O TEMPO DO VEICULO!". "</font><br>";	
	 $conta_problema = 1;
 } else {
	// echo "<font color='#128E03'>NAO ESTOUROU O TEMPO DO VEICULO!" . "</font><br>";
/// VERIFICA TEMPO /////////////////////////////////////////////////////////////////// 

 

/// VERIFICA PESO ////////////////////////////////////////////////////////////////////
//echo "<b>PESO: </b>" . $segura_peso;
$MaxSoma_internos_testando = $MaxSoma_internos + $segura_peso;
//echo "<br>";	
//echo "<b>PESO SOMADO: </b>" . $MaxSoma_internos_testando;
//echo "<br>";	
//echo "<b>PESO MAXIMO: </b>" . $maxPeso;
//echo "<br>";	
				
				
if ($MaxSoma_internos_testando > $maxPeso){
//echo "<font color='#FF0004'>***************************". "</font><br>";
//echo "<font color='#FF0004'>ESTOUROU O PESO!". "</font><br>";
//echo "<font color='#FF0004'>***************************". "</font><br>";
					
$conta_problema = 1;									
	
} else {
//echo "<font color='#128E03'>NAO ESTOUROU O PESO!" . "</font><br>";
					
$MaxSoma_internos_testando = $MaxSoma_internos + $segura_peso;
					

/// VERIFICA PESO ////////////////////////////////////////////////////////////////////////

				
/// VERIFICA VOLUME ////////////////////////////////////////////////////////////////////	
//echo "<b>VOLUME: </b>" . $segura_volume;	
$MaxVolume_internos_testando = $MaxVolume_internos + $segura_volume;
//echo "<br>";	
//echo "<b>VOLUME SOMADO: </b>" . $MaxVolume_internos_testando;
//echo "<br>";	
//echo "<b>VOLUME MAXIMO: </b>" . $maxVolume;
//echo "<br>";	
												
if ($MaxVolume_internos_testando > $maxVolume){
//echo "<font color='#FF0004'>***************************". "</font><br>";
///echo "<font color='#FF0004'>ESTOUROU O VOLUME!". "</font><br>";
//echo "<font color='#FF0004'>***************************". "</font><br>";
$conta_problema = 1;	
} else {
//echo "<font color='#128E03'>NAO ESTOUROU O VOLUME!" . "</font><br>";
$MaxVolume_internos_testando = $MaxVolume_internos + $segura_volume;


/// VERIFICA VOLUME ////////////////////////////////////////////////////////////////////	
					
						
/// VERIFICA VALOR ////////////////////////////////////////////////////////////////////
//echo "<b>VALOR: </b>" . $segura_valor;
//echo "<br>";	
$MaxValor_internos_testando = $MaxValor_internos + $segura_valor;
//echo "<b>VALOR SOMADO: </b>" . $MaxValor_internos_testando;
//echo "<br>";	
//echo "<b>VALOR MAXIMO: </b>" . $maxValor;
//echo "<br>";	
if ($MaxValor_internos_testando > $maxValor){
//echo "<font color='#FF0004'>***************************". "</font><br>";
//echo "<font color='#FF0004'>ESTOUROU O VALOR!". "</font><br>";
//echo "<font color='#FF0004'>***************************". "</font><br>";
$conta_problema = 1;	
next;
} else {
//echo "<font color='#128E03'>NAO ESTOUROU O VALOR!" . "</font><br>";
$MaxValor_internos_testando = $MaxValor_internos + $segura_valor;
				}
/// VERIFICA VALOR ////////////////////////////////////////////////////////////////////


		}
	}
}



//echo "<br>";
//echo $conta_problema;


// ALGUM ITEM DO CLIENTE ESTOUROU NO MAXIMO DO VEICULO ? //////////////
if($conta_problema == 1){	


array_push($array_excluidos, array(id => $segura_id, lat => $segura_lat, lon => $segura_lon, peso=> $segura_peso, volume => $segura_volume, valor => $segura_valor, tempo_servico => $segura_tv, distancia => ""));

	
	print_r($array_excluidos);
	//echo "<br>";	
} else {	
	array_push($array_selecao_clientes, $segura_id);
	
	//// SOMA DOS CONTEUDOS SE NAO ESTOURAR /////////////////////////////
	$MaxSoma_internos = $MaxSoma_internos_testando;
	$MaxVolume_internos = $MaxVolume_internos_testando;
	$MaxValor_internos = $MaxValor_internos_testando;
	//// SOMA DOS CONTEUDOS SE NAO ESTOURAR /////////////////////////////
	//print_r($array_selecao_clientes);
	//echo "<br>";
}
//print_r($array_selecao_clientes);


// ALGUM ITEM DO CLIENTE ESTOUROU NO MAXIMO DO VEICULO ? //////////////



//print_r($array_selecao_clientes);
//echo "<br>";
//echo "<b>PESO TOTAL(TODOS): </b>" . $MaxSoma_internos;
//echo "<br>";
//echo "<b>VOLUME TOTAL(TODOS): </b>" . $MaxVolume_internos;
//echo "<br>";
//echo "<b>VALOR TOTAL(TODOS) </b>" . $MaxValor_internos;
//echo "<br>";
//echo "<br>";


//DELETA O PRIMEIRO DA LISTA////////////////////////////////
array_splice($distancia_continua, $key, 1);
//DELETA O PRIMEIRO DA LISTA////////////////////////////////

$contaconta =-1;

$conta_array = count($distancia_continua) -1;



}

/*if($conta_array==0){
	
	$distancia_continua=$array_excluidos;
	
}

*/

$contaconta++;

}




////////////////////////////////////////////////





/*while($conta_array <> 0){
///
	
///


}*/

//////PEGA PRIORIDADE DE DEMANDA BANCO DE DADOS CADD ///////////////////////////////////////////////////////////////////

$conxxx = mysql_connect("127.0.0.1", "root", "HtMQZhAwCNzeaAfT", TRUE) or die ("Sem conexão com o servidor");
$xxx = mysql_select_db("cadd", $conxxx) or die("Sem acesso ao DB, Entre em contato com o Administrador!");

$query20 = "select * from usuario where id_user='$id_user'";															
$rs20 = mysql_query($query20, $conxxx);

$dados = mysql_fetch_array($rs20);
$dados['qualquer_campo'];
 
$pega_peso = $dados['peso'];
$pega_volume = $dados['volume'];
$pega_valor = $dados['valor'];

    //echo "<b>PESO DA DEMANDA</b><br>";
	//echo "PESO: " . $pega_peso . "<br>";
	//echo "VOL.: " . $pega_volume . "<br>";
	//echo "VALOR: " . $pega_valor . "<br>";
	
//////PEGA PRIORIDADE DE DEMANDA BANCO DE DADOS CADD ///////////////////////////////////////////////////////////////////



//// ESCOLHE O MELHOR VEICULO ////////////////////////////////////////////////////////////////////////////////////////
$query_veiculo_escolha = mysql_query("select * from veiculos where ocupado=0 AND ativo='yes' AND (setor='' OR setor='$setores')", $id);
	
$array_compara_veiculos = array();
$array_excluidos_veiculos = array();

while($row_veiculos= mysql_fetch_array($query_veiculo_escolha)){
		
		$peso_veiculo = $row_veiculos["peso"];
		$volume_veiculo = $row_veiculos["volume"];
		$valor_veiculo = $row_veiculos["valor"];
		
		$id_veiculo = $row_veiculos["id"];
		 
			if($peso_veiculo>= $MaxSoma_internos AND $volume_veiculo>=$MaxVolume_internos AND $valor_veiculo>= $MaxValor_internos){
			 
			 $compara_peso = $MaxSoma_internos*100/$peso_veiculo;
			 $compara_volume = $MaxVolume_internos*100/$volume_veiculo;
			 $compara_valor = $MaxValor_internos*100/$valor_veiculo;
			 
			// echo "Porcentagem: " . ($MaxSoma_internos*100/$peso_veiculo) . "<br>";
			// echo "ID: " . $id_veiculo . "- PESO: " . $peso_veiculo . "- VOLUME: " . $volume_veiculo . "- VALOR: " . $valor_veiculo . "<br>";
			 
			array_push($array_compara_veiculos ,array(id => $id_veiculo, porcentagem_peso => $compara_peso, porcentagem_volume => $compara_volume, porcentagem_valor=> $compara_valor, pontosganhos=> 0));
			 	 
			} else {
			
			array_push($array_excluidos_veiculos ,array(id => $id_veiculo, peso => $peso_veiculo, volume => $volume_veiculo, valor=> $valor_veiculo));
			}
		
}

/*print_r($array_compara_veiculos);
echo "<br>";
print_r($array_excluidos_veiculos);
echo "<br>";*/
////POR PESO/////////////////////////////////////////////////////////////////////////////////////////////////
usort($array_compara_veiculos, function($a, $b) {   
return $a['porcentagem_peso'] < $b['porcentagem_peso'];});

$array_compara_veiculos[0]['pontosganhos'] = $array_compara_veiculos[0]['pontosganhos'] + $pega_peso;
/*echo "POR PESO<br>";
print_r($array_compara_veiculos);
echo "<br>";*/
////POR VOLUME///////////////////////////////////////////////////////////////////////////////////////////////////

usort($array_compara_veiculos, function($a, $b) {   
return $a['porcentagem_volume'] < $b['porcentagem_volume'];});

$array_compara_veiculos[0]['pontosganhos'] = $array_compara_veiculos[0]['pontosganhos'] + $pega_volume;
/*echo "POR VOLUME<br>";
print_r($array_compara_veiculos);
echo "<br>";*/
////POR VALOR/////////////////////////////////////////////////////////////////////////////////////////////////
usort($array_compara_veiculos, function($a, $b) {   
return $a['porcentagem_valor'] < $b['porcentagem_valor'];});

$array_compara_veiculos[0]['pontosganhos'] = $array_compara_veiculos[0]['pontosganhos'] + $pega_valor;
/*echo "POR VALOR<br>";
print_r($array_compara_veiculos);
echo "<br>";*/
///POR PONTUACAO GANHA///////////////////////////////////////////////////////////////////////////////////////////////////
usort($array_compara_veiculos, function($a, $b) {   
return $a['pontosganhos'] < $b['pontosganhos'];});

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/*echo "POR PONTUACAO<br>";
print_r($array_compara_veiculos);
echo "<br>";*/


///VEICULO ENCAIXE PERFEITO ///////////////////////////////////////////////////////////////////////////////////////
$veiculo_certo = $array_compara_veiculos[0]['id'];
///VEICULO ENCAIXE PERFEITO ///////////////////////////////////////////////////////////////////////////////////////

$conta_array_listado = count($array_selecao_clientes);

$conta_posicao = 0;

/// GRAVA CLIENTES E VEICULO UTILIZADO NA SELECAO//////////////
while ($conta_posicao <= $conta_array_listado){

	$codigo_array_selecao_clientes = $array_selecao_clientes[$conta_posicao];
	$update_veiculo_enche= mysql_query("UPDATE clientes SET veiculo='$veiculo_certo' WHERE codigo='$codigo_array_selecao_clientes'", $id);	
	
	$update_veiculo = mysql_query("UPDATE veiculos SET peso_total='$MaxSoma_internos', volume_total='$MaxVolume_internos', valor_total='$MaxValor_internos', equipe='yes', ocupado='1' WHERE id='$veiculo_certo'", $id);
		
	$conta_posicao++;
}
/// GRAVA CLIENTES E VEICULO UTILIZADO NA SELECAO//////////////



$array_selecao_clientes= array();

//echo "VEICULO ESCOLHIDO: " . $veiculo_certo . "<br>";

/*$conta_array_excluidos = count($array_excluidos);
$conta_posicao_excluidos = 0;


if($array_excluidos <> NULL){
	echo "NAO ACABARAM OS CLIENTES DO SETOR";
	
	
	while ($conta_posicao_excluidos < $conta_array_excluidos){
		
		
		
		
		
		
		
		
		
		//echo "ainda tem";
		$conta_posicao_excluidos++;
	}



	
}


*/
//$update_veiculo_thebest = mysql_query("UPDATE clientes SET veiculo='$array_compara_veiculos[0]['id']' WHERE codigo='$guarda_point_maisdistante'", $id);

//print_r($array_compara_veiculos);
//// ESCOLHE O MELHOR VEICULO ////////////////////////////////////////////////////////////////////////////////////////




//print_r($distancia_continua[1]['id']);


/*$segura_codigo = $distancia_continua[0]['id'];
//print_r($distancia_continua);


$guarda_point = $distancia_continua[0]['id'];
$guarda_lat = $distancia_continua[0]['lat'];
$guarda_lon = $distancia_continua[0]['lon'];
$guarda_peso = $distancia_continua[0]['peso'];
$guarda_volume = $distancia_continua[0]['volume'];
$guarda_valor = $distancia_continua[0]['valor'];
$guarda_temposervico = $distancia_continua[0]['tempo_servico'];
$guarda_temposervico = $guarda_temposervico * 60;
 
 
$time_travel_perna = ($distancia_continua[0]['distancia'] / 50) * 3600; 


  
  
 echo "<br>" . "<b>PROXIMOS CLIENTES!</b>". "<br><br>";
 echo "Tempo total: " . ($time_travel + $time_travel_perna + $guarda_temposervico + $guarda_temposervico_maisdistante) . "<br>";
 if ($time_travel + $time_travel_perna + $guarda_temposervico_maisdistante + $guarda_temposervico > $maxTempo){
	 echo "ESTOUROU O TEMPO PROXIMOS CLIENTES!". "<br>";
	
 } else {
	 
	 echo "NAO ESTOUROU O TEMPO PROXIMOS CLIENTES!" . "<br>";
 }
 */
 

/*$update_veiculo_maisperto = mysql_query("UPDATE clientes SET veiculo='31' WHERE codigo='$segura_codigo'");*/


//// PONTO MAIS PROXIMO ////////////////////////////////////////



//// LOOPING DO SETOR //////////////////////////////////////////
 
 //echo "<br><h2><b><font color='#FF5500'> FINAL DO SETOR: " . $setores . "</font></b></h2>";
// echo "<br><br>";

}
//// SEPARA POR SETOR ////////////////////////////////////





//rsort($distancia_continua);
//print_r($distancia_continua);

//print_r($distancia_continua[0]['id']);

/*

$query3 = "select * from clientes";															
$rs3 = mysql_query($query3);
$total = mysql_num_rows($rs3);
$conta_ae=0;
$conta_vazios=0;

///ABRE ////
while($row3 = mysql_fetch_array($rs3)){
	
  $conta_ae++;
	
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
  $setor_cad= $row3["setor"];

  $peso = $row3["peso"];
  $volume = $row3["volume"];
  $valor = $row3["valor"];
 // echo $ativo_cad;
 
 
  
if($latitude_cad=="" or $longitude_cad==""){
	$conta_vazios++;
}

	if($setor_cad==""){
	
	//echo "vazio";

	} else {
	
	$search_veiculo1 = "SELECT * FROM veiculos WHERE setor = '$setor_cad'";
	$dados1 = mysql_query($search_veiculo1);
	$quantos1 = mysql_num_rows($dados1);
//echo $quantos1;

if ($quantos1>1){

$search_veiculo = "SELECT * FROM veiculos WHERE setor = '$setor_cad' AND ativo='yes' order by peso ASC LIMIT 1";
$dados = mysql_query($search_veiculo);

////
	while($row_dados = mysql_fetch_array($dados)){

	$setor_do=$row_dados['setor'];
	$id_do_veiculo = $row_dados['id'];
	$ativo_cad= $row_dados["ativo"];
	$conta_peso_veiculo = $row_dados["peso_total"];
	$conta_volume_veiculo = $row_dados["volume_total"];
	$conta_valor_veiculo = $row_dados["valor_total"];
	
		if($ativo_cad=="yes"){
	
		$conta_peso_veiculo = $conta_peso_veiculo + $peso;
		$conta_volume_veiculo = $conta_volume_veiculo + $volume;
		$conta_valor_veiculo = $conta_valor_veiculo + $valor;

		$update_cliente = mysql_query("UPDATE clientes SET veiculo='$id_do_veiculo' WHERE setor='$setor_do'");

		$update_veiculo = mysql_query("UPDATE veiculos SET peso_total='$conta_peso_veiculo', volume_total='$conta_volume_veiculo', valor_total='$conta_valor_veiculo', equipe='yes', ocupado='1', setor='$setor_do' WHERE id='$id_do_veiculo'");
	
		}



	}	
	

} else {

	$search_veiculo = "SELECT * FROM veiculos WHERE setor = '$setor_cad'";
	$dados = mysql_query($search_veiculo);
	//$quantos = mysql_num_rows($dados);

$conta_peso_veiculo = 0;
$conta_volume_veiculo = 0;
$conta_valor_veiculo = 0;

////
	while($row_dados = mysql_fetch_array($dados)){

	$setor_do=$row_dados['setor'];
	$id_do_veiculo = $row_dados['id'];
	$ativo_cad= $row_dados["ativo"];
	$conta_peso_veiculo = $row_dados["peso_total"];
	$conta_volume_veiculo = $row_dados["volume_total"];
	$conta_valor_veiculo = $row_dados["valor_total"];
	////
		if($ativo_cad=="yes"){
	
		$conta_peso_veiculo = $conta_peso_veiculo + $peso;
		$conta_volume_veiculo = $conta_volume_veiculo + $volume;
		$conta_valor_veiculo = $conta_valor_veiculo + $valor;
		
 		//echo $conta_peso_veiculo . "<br>";
		$update_cliente = mysql_query("UPDATE clientes SET veiculo='$id_do_veiculo' WHERE setor='$setor_do'");

		$update_veiculo = mysql_query("UPDATE veiculos SET peso_total='$conta_peso_veiculo', volume_total='$conta_volume_veiculo', valor_total='$conta_valor_veiculo', equipe='yes', ocupado='1', setor='$setor_do' WHERE id='$id_do_veiculo'");
	
	

		}	
	/////
	}
/////	
}
//////

}

*/

/*//// LOADING 0 A 100% ////////////////////////////////////////////////////
	$pega_loading = intval(($conta_ae/$total)* 100) . "%";

    echo "<div style='position:absolute;margin:0px 0px 0px 0px;width:$pega_loading;height:40px;background:#2867b2;color:#2867b2;color: #FFFFFF;text-align:center;line-height:40px;'>$pega_loading</div>";
    flush();
    ob_flush();
	
//// LOADING 0 A 100% ////////////////////////////////////////////////////

*/

//}
?>
</div>
</div>
<SCRIPT LANGUAGE="JavaScript" TYPE="text/javascript"> 

window.location.href="step3.php";

</SCRIPT>

<?php

break;
//////////CARGA AUTOMATICA /////////////////////////////////////////////


}
?>
