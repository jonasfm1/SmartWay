<?php

include ('essence/conecta.php');
include ('session.php'); 
ini_set('max_execution_time',12000);

function convertToHoursMins($time, $format = '%02d:%02d') {
    if ($time < 1) {
        return;
    }
    $hours = floor($time / 60);
    $minutes = ($time % 60);
    return sprintf($format, $hours, $minutes);
}

$acao = $_GET['acao'];
$id_yes = $_GET['id'];

switch ($acao) {

	case 'export_xls1':



		$table = "rotas"; // Enter Your Table Name 
		
				
		$rota = $_GET['rota'];

		$quem= $_GET["check_list"];




		
		$data="ROTAS_" . date("d-m-Y_H_i_s");
		//$exte = $data . '.csv';
		
		// Definimos o nome do arquivo que será exportado
		$arquivo = $data . '.xls';
		


	

		$html = '';
		$html= '<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />';
		$html .= '<table border="1">';
			
		for ($i=0;$i<count($quem);$i++)
		{
			
		
		$query_veiculos = "select * from rotas where nome_rota='$quem[$i]' group by nome_rota ASC order by nome_rota ASC";														
		$query_ok = mysql_query($query_veiculos);
		
		while($row5 = mysql_fetch_array($query_ok)){
				
		$veiculo_ok = $row5["veiculo"];	
		// Query
		$query = "SELECT * FROM veiculos WHERE id='$veiculo_ok'";
		$query = mysql_query($query);
		
		// Tirando o while
		$dados = mysql_fetch_array($query);
		
		// Exibição
		$queme = $dados['nome'];
		$queme_transp = $dados["transportadora"];
		$quem_tipo = $dados["tipo"];
		

	
	while ($row = mysql_fetch_array($sql_group)) {
		$pedido_guarda = $row['codigo_pedido'];
		//echo $pedido_guarda;
		array_push($array_group, $pedido_guarda);
		
	}

		$html .= '<tr align="center">';
		$html .= '<td  colspan="15" bgcolor="#c9c9c9"><strong style="font-size:17px;">' . "DATA " . date("d m Y") . " - " . "PLACA <b>" . $queme . "</b> - " . $queme_transp . '</strong></td>';
		$html .= '</tr>';	
	
		
		$html .= '<tr>';
		$html .= '<td nowrap><b>PEDIDO</b></td>';
		$html .= '<td nowrap><b>PLACA</b></td>';
		$html .= '<td nowrap><b>TIPO</b></td>';
		$html .= '<td nowrap><b>COD.CLIENTE</b></td>';
		$html .= '<td nowrap><b>NOME</b></td>';
		$html .= '<td nowrap><b>CEP</b></td>';
		$html .= '<td nowrap><b>CIDADE</b></td>';
		$html .= '<td nowrap><b>UF</b></td>';
		$html .= '<td nowrap><b>C.PRODUTO</b></td>';
		$html .= '<td nowrap><b>PRODUTO</b></td>';
		$html .= '<td nowrap><b>PESO</b></td>';
		$html .= '<td nowrap><b>VOLUME</b></td>';
		$html .= '<td nowrap><b>VALOR</b></td>';
		$html .= '<td nowrap><b>DISTANCIA</b></td>';
		$html .= '<td nowrap><b>TEMPO</b></td>';
		$html .= '</tr>';
		
			
			
		$sql = mysql_query("select * from $table where veiculo='$veiculo_ok' and nome_rota='$quem[$i]'ORDER BY ordem ASC");
		
		$soma_peso=0;
		$soma_volume=0;
		$soma_valor=0;

		$query_todos = "select * from veiculos where id='$veiculo_ok'";									
		$rs_todos = mysql_query($query_todos);  
		$dados = mysql_fetch_array($rs_todos);


		$soma_distancia = $dados['distancia_total'];
		$soma_tempo = $dados['tempo_total'];


		
		while ($datas = mysql_fetch_array($sql)) {

		$nome_cliente = $datas['nome_cliente'];
		$veiculo = $datas['veiculo'];

		$pedido = $datas["codigo_pedido"];
		//$pedido = ltrim($pedido, '0');

		$codigo_cliente = $datas['codigo_cliente'];
		$razao_social = $datas['nome_cliente'];
		$cep = $datas['cep'];
		$cidade = $datas['cidade'];
		$uf = $datas['uf'];

		$cod_produto = $datas['cod_produto'];
		$produto = $datas['produto'];
		
		$ordem = $datas['ordem'];
		$trans = $datas['transportadora'];
	
		
		$nome_rota = $datas['nome_rota'];
	
		$peso = $datas['peso'];
		$volume = $datas['volume'];
		$valor = $datas['valor'];

		$distancia = $datas['distancia'];
		$tempo = $datas['tempo'];


	
		$html .= '<tr>';
		$html .= '<td align="left" nowrap>' . $pedido . '</td>';
		$html .= '<td align="left" nowrap>' . $queme . '</td>';
		$html .= '<td align="left" nowrap>' . $quem_tipo . '</td>';
		$html .= '<td align="left" nowrap>' . $codigo_cliente .  '</td>';
		$html .= '<td align="left" nowrap>' . $nome_cliente .  '</td>';
		$html .= '<td align="left" nowrap>' . $cep . '</td>';
		$html .= '<td align="left" nowrap>' . $cidade . '</td>';
		$html .= '<td align="left" nowrap>' . $uf . '</td>';
		$html .= '<td align="left" nowrap>' . $cod_produto . '</td>';
		$html .= '<td align="left" nowrap>' . $produto . '</td>';
		$html .= '<td align="left" nowrap>' . $peso . '</td>';
		$html .= '<td align="left" nowrap>' . $volume . '</td>';
		$html .= '<td align="left" nowrap>' . $valor . '</td>';
		$html .= '<td align="left" nowrap>' . $distancia . '</td>';
		$html .= '<td align="left" nowrap>' . $tempo . '</td>';
		$html .= '</tr>';	
			
			$soma_peso+= $peso;
			$soma_volume+= $volume;
			$soma_valor+= $valor;


		}
		
		$html .= '<tr align="left">';
		$html .= '<td  colspan="10"></td>';
		$html .= '<td align="left">' . $soma_peso . '</td>';
		$html .= '<td align="left">' . $soma_volume . '</td>';
		$html .= '<td align="left">' . $soma_valor . '</td>';
		$html .= '<td align="left">' . $soma_distancia . '</td>';
		$html .= '<td align="left">' . $soma_tempo . '</td>';
		$html .= '</tr>';
			
		$html .= '<tr align="left">';
		$html .= '<td  colspan="15" align="left"></td>';
	
		$html .= '</tr>';
	
		}
		
	}
		$html .= '</table>';
		
		
		// Configurações header para forçar o download
		header ("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
		header ("Last-Modified: " . gmdate("D,d M YH:i:s") . " GMT");
		header ("Cache-Control: no-cache, must-revalidate");
		header ("Pragma: no-cache");
		header ("Content-type: application/x-msexcel");
		header ("Content-Disposition: attachment; filename=\"{$arquivo}\"" );
		header ("Content-Description: PHP Generated Data" );
		
		// Envia o conteúdo do arquivo
		echo $html;
		exit;
		
		
		break;
	

case 'export_xls2':



	$table = "rotas"; // Enter Your Table Name 
	
			
	
	
	$data="ROTAS_" . date("d-m-Y_H_i_s");
	//$exte = $data . '.csv';
	
	// Definimos o nome do arquivo que será exportado
	$arquivo = $data . '.xls';
	
	$html = '';
	$html= '<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />';
	$html .= '<table border="1">';
		
			
	
	$query_veiculos = "select * from rotas group by nome_rota ASC order by nome_rota ASC";														
	$query_ok = mysql_query($query_veiculos);
	

	while($row5 = mysql_fetch_array($query_ok)){
			
	$veiculo_ok = $row5["veiculo"];	
	// Query
	$query = "SELECT * FROM veiculos WHERE id='$veiculo_ok'";
	$query = mysql_query($query);
	
	// Tirando o while
	$dados = mysql_fetch_array($query);
	
	// Exibição
	$queme = $dados['nome'];
	$queme_transp = $dados["transportadora"];
	$quem_tipo = $dados["tipo"];


	$sql_group = mysql_query("select * from rotas where veiculo='$veiculo_ok' group by codigo_pedido order by ordem ASC");
	$array_group=[];
	
	while ($row = mysql_fetch_array($sql_group)) {
		$pedido_guarda = $row['codigo_pedido'];
		//echo $pedido_guarda;
		array_push($array_group, $pedido_guarda);
		
	}
	$comma_separated = implode(";", $array_group);
		
	$html .= '<tr align="center">';
	$html .= '<td  colspan="18" bgcolor="#c9c9c9"><strong style="font-size:17px;">' . "DATA " . date("d m Y") . " - " . "PLACA <b>" . $queme . "</b> - " . $queme_transp . '</strong></td>';
	$html .= '</tr>';	
	$html .= '<tr align="center">';

	$html .= '<td  colspan="18" bgcolor="#c9c9c9"><strong style="font-size:12px;">' . $comma_separated .'</strong></td>';
	
	$html .= '</tr>';	
	
	$html .= '<tr>';
	$html .= '<td nowrap align="right"><b>LJ EMBARQUE</b></td>';
	$html .= '<td nowrap><b>PEDIDO</b></td>';
	$html .= '<td nowrap><b>PLACA</b></td>';
	$html .= '<td nowrap><b>TIPO</b></td>';
	$html .= '<td nowrap><b>DT.ENTREGA</b></td>';
	$html .= '<td nowrap><b>COD.VENDEDOR</b></td>';
	$html .= '<td nowrap><b>VENDEDOR</b></td>';
	$html .= '<td nowrap><b>CLIENTE/LOJA</b></td>';
	$html .= '<td nowrap><b>RAZÃO SOCIAL</b></td>';
	$html .= '<td nowrap><b>BAIRRO</b></td>';
	$html .= '<td nowrap><b>CEP</b></td>';
	$html .= '<td nowrap><b>CIDADE</b></td>';
	$html .= '<td nowrap><b>UF</b></td>';
	$html .= '<td nowrap><b>C.CANÇÃO</b></td>';
	$html .= '<td nowrap><b>C.PRODUTO</b></td>';
	$html .= '<td nowrap><b>PRODUTO</b></td>';
	$html .= '<td nowrap><b>PESO</b></td>';
	$html .= '<td nowrap><b>VOLUME</b></td>';
	$html .= '</tr>';
	
		
		
	$sql = mysql_query("select * from $table where veiculo='$veiculo_ok' ORDER BY ordem ASC");
	
	$soma_peso=0;
	$soma_valor=0;
	
	while ($datas = mysql_fetch_array($sql)) {




	$nome_cliente = $datas['nome_cliente'];
	$veiculo = $datas['veiculo'];

	

	$loja= $datas['loja'];
	$pedido = $datas["codigo_pedido"];
	//$pedido = ltrim($pedido, '0');



	$data_entrega =  $datas['data_entrega'];
	$cod_vendedor =  $datas['cod_vendedor'];
	$vendedor =  $datas['vendedor'];
	$codigo_cliente = $datas['codigo_cliente'];
	$razao_social = $datas['nome_cliente'];
	$bairro = $datas['bairro'];
	$cep = $datas['cep'];
	$cidade = $datas['cidade'];
	$uf = $datas['uf'];
	$cod_cancao = $datas['cod_cancao'];
	$cod_produto = $datas['cod_produto'];
	$produto = $datas['produto'];
	
	$ordem = $datas['ordem'];
	$trans = $datas['transportadora'];

	
	$nome_rota = $datas['nome_rota'];

	$peso = $datas['peso'];
	$volume = $datas['volume'];

	$html .= '<tr>';
	$html .= '<td align="left" nowrap>' . $loja . '</td>';
	$html .= '<td align="left" nowrap>' . $pedido . '</td>';
	$html .= '<td align="left" nowrap>' . $queme . '</td>';
	$html .= '<td align="left" nowrap>' . $quem_tipo . '</td>';
	$html .= '<td align="left" nowrap>' . $data_entrega . '</td>';
	$html .= '<td align="left" nowrap>' . $cod_vendedor . '</td>';
	$html .= '<td align="left" nowrap>' . $vendedor . '</td>';
	$html .= '<td align="left" nowrap>' . $codigo_cliente .  '</td>';
	$html .= '<td align="left" nowrap>' . $nome_cliente .  '</td>';
	$html .= '<td align="left" nowrap>' . $bairro . '</td>';
	$html .= '<td align="left" nowrap>' . $cep . '</td>';
	$html .= '<td align="left" nowrap>' . $cidade . '</td>';
	$html .= '<td align="left" nowrap>' . $uf . '</td>';
	$html .= '<td align="left" nowrap>' . $cod_cancao . '</td>';
	$html .= '<td align="left" nowrap>' . $cod_produto . '</td>';
	$html .= '<td align="left" nowrap>' . $produto . '</td>';
	$html .= '<td align="left" nowrap>' . $peso . '</td>';
	$html .= '<td align="left" nowrap>' . $volume . '</td>';

	$html .= '</tr>';	
		
		$soma_peso+= $peso;
		$soma_volume+= $volume;
	}
	
	$html .= '<tr align="left">';
	$html .= '<td  colspan="16"></td>';
	$html .= '<td align="left">' . $soma_peso . '</td>';
	$html .= '<td align="left">' . $soma_volume . '</td>';
	$html .= '</tr>';
		
	$html .= '<tr align="left">';
	$html .= '<td  colspan="18" align="left"></td>';

	$html .= '</tr>';

	}
	
	$html .= '</table>';
	
	
	// Configurações header para forçar o download
	header ("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
	header ("Last-Modified: " . gmdate("D,d M YH:i:s") . " GMT");
	header ("Cache-Control: no-cache, must-revalidate");
	header ("Pragma: no-cache");
	header ("Content-type: application/x-msexcel");
	header ("Content-Disposition: attachment; filename=\"{$arquivo}\"" );
	header ("Content-Description: PHP Generated Data" );
	
	// Envia o conteúdo do arquivo
	echo $html;
	exit;
	
	
	break;


}


?>
