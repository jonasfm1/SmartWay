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

//////////////  CARGA DIRETA  ////////////////////////////////
case 'export_csv_cd':
date_default_timezone_set('America/Sao_Paulo');
$arquivo_text = "";
$table = "rotas";
$sql = mysql_query("select * from $table ORDER BY nome_rota, ordem ASC");
//$arquivo_text = "";
//$arquivo_text .="CD_EMPRESA;NR_PEDIDO;PLACA;FORMACAO_CARGA_ROT;SEQ_ENTREGA;DISTANCIA;
//";

while ($datas = mysql_fetch_array($sql)) {	


$iddoveiculo = $datas['veiculo'];	

//Roteirizado
$query_cliente_usado = "UPDATE clientes SET roteirizado='sim' WHERE veiculo = '$iddoveiculo'";
$rs_cliente_usado = mysql_query($query_cliente_usado);

$query_cliente_usado1 = "UPDATE veiculos SET roteirizado='sim', prioridade=Null WHERE id = '$iddoveiculo'";
$rs_cliente_usado1 = mysql_query($query_cliente_usado1);
}
?>
	<SCRIPT LANGUAGE="JavaScript" TYPE="text/javascript"> 

	window.history.go(-1);

	</SCRIPT>
    <?php
break;

////////////// CARGA DIRETA ////////////////////////////////



////////////// EXPORTA ROTA ////////////////////////////////
case 'export_csv_trans':
date_default_timezone_set('America/Sao_Paulo');
$arquivo_text = "";
$table = "rotas";
$sql = mysql_query("select * from $table ORDER BY nome_rota, ordem ASC");
//$arquivo_text = "";
//$arquivo_text .="CD_EMPRESA;NR_PEDIDO;PLACA;FORMACAO_CARGA_ROT;SEQ_ENTREGA;DISTANCIA;
//";

while ($datas = mysql_fetch_array($sql)) {	


$iddoveiculo = $datas['veiculo'];
$query1 = "select * from veiculos WHERE id='$iddoveiculo'";		

//Roteirizado
$query_cliente_usado = "UPDATE clientes SET roteirizado='sim' WHERE veiculo = '$iddoveiculo'";
$rs_cliente_usado = mysql_query($query_cliente_usado);

$query_cliente_usado1 = "UPDATE veiculos SET roteirizado='sim', prioridade=Null WHERE id = '$iddoveiculo'";
$rs_cliente_usado1 = mysql_query($query_cliente_usado1);

////////////

$rs1 = mysql_query($query1);
$row1 = mysql_fetch_array($rs1);	
$nome_veiculo = $row1['nome'];
$distancia_sem_virgula = str_replace(".","",$datas['distancia']);
$distancia_sem_virgula =str_pad($distancia_sem_virgula, 6, ' ', STR_PAD_LEFT);

$conta_string=strlen($datas[codigo_cliente]);
	
$somadata_rota = time("d-m-Y H:i") ;
$somadata_rota = substr($somadata_rota,0,-2). str_pad($i_rota[$y], 2, '0', STR_PAD_LEFT);
	
$nova_ordem = str_pad($datas[ordem], 3, ' ', STR_PAD_LEFT);	

$diferenca_conta_string = 8 - $conta_string;


	
$novo_codigo = str_pad($datas[codigo_cliente], 8, '0', STR_PAD_LEFT);
	
$espaco = str_pad('', 2).substr($somadata_rota, -6).$novo_codigo.str_pad($datas[codigo_pedido], 20).$nova_ordem.str_pad('', 8).date("dmy").str_pad('', 2).$distancia_sem_virgula."\r\n";

//$espaco = str_pad('', 2).substr($somadata_rota, -6).$novo_codigo.str_pad($datas[codigo_pedido], 20).$nova_ordem.str_pad('', 8).date("dmy")."\r\n";


//$rota= substr($datas[nome_rota], -6);
//$arquivo_text .= "$datas[obs_pedido];$datas[codigo_pedido];$nome_veiculo;$datas[nome_rota];$datas[ordem];$distancia_com_virgula;

$arquivo_text .= "$espaco";


}


$data="ROTAS_" . date("d-m-Y_H_i_s");
$exte = $data . '.txt';
$juntae = 'uploads/' . $exte;
$abbre = fopen($juntae, 'w+');
fwrite($abbre, utf8_decode($arquivo_text));
    
header('Pragma: public');
header('Expires: 0');
header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
header('Cache-Control: private', false);
header('Content-Type: application/csv');
header("Content-Type: application/download");
header('Content-Disposition: attachment; filename="'. basename($juntae) . '";');
header('Content-Transfer-Encoding: binary');
header('Content-Length: ' . filesize($juntae));
readfile($juntae);
//fclose($abbre);
break;
////////////// EXPORTA ROTA ////////////////////////////////

////////////// EXPORTA ROTA TRANSBORDO////////////////////////////////
case 'export_csv':
date_default_timezone_set('America/Sao_Paulo');
$arquivo_text = "";
$table = "rotas";
$sql = mysql_query("select * from $table ORDER BY nome_rota, ordem ASC");
//$arquivo_text = "";
//$arquivo_text .="CD_EMPRESA;NR_PEDIDO;PLACA;FORMACAO_CARGA_ROT;SEQ_ENTREGA;DISTANCIA;
//";

while ($datas = mysql_fetch_array($sql)) {	

$iddoveiculo = $datas['veiculo'];
$query1 = "select * from veiculos WHERE id='$iddoveiculo'";	


//Roteirizado
$query_cliente_usado = "UPDATE clientes SET roteirizado='sim' WHERE veiculo = '$iddoveiculo'";
$rs_cliente_usado = mysql_query($query_cliente_usado);

$query_cliente_usado1 = "UPDATE veiculos SET roteirizado='sim' WHERE id = '$iddoveiculo'";
$rs_cliente_usado1 = mysql_query($query_cliente_usado1);

////////////
	
$rs1 = mysql_query($query1);
$row1 = mysql_fetch_array($rs1);	
$nome_veiculo = $row1['nome'];
$distancia_sem_virgula = str_replace(".","",$datas['distancia']);
$distancia_sem_virgula =str_pad($distancia_sem_virgula, 6, ' ', STR_PAD_LEFT);	


	
$conta_string=strlen($datas[codigo_cliente]);
$nova_ordem = str_pad($datas[ordem], 3, ' ', STR_PAD_LEFT);	

$novo_codigo = str_pad($datas[codigo_cliente], 8, '0', STR_PAD_LEFT);
	
$espaco = str_pad('', 2).substr($datas[nome_rota], -6).$novo_codigo.str_pad($datas[codigo_pedido], 20).$nova_ordem.str_pad('', 8).date("dmy").str_pad('', 2).$distancia_sem_virgula."\r\n";

//$espaco = str_pad('', 2).substr($datas[nome_rota], -6).$novo_codigo.str_pad($datas[codigo_pedido], 20).$nova_ordem.str_pad('', 8).date("dmy")."\r\n";


//$rota= substr($datas[nome_rota], -6);
//$arquivo_text .= "$datas[obs_pedido];$datas[codigo_pedido];$nome_veiculo;$datas[nome_rota];$datas[ordem];$distancia_com_virgula;

$arquivo_text .= "$espaco";


}


$data="ROTAS_" . date("d-m-Y_H_i_s");
$exte = $data . '.txt';
$juntae = 'uploads/' . $exte;
$abbre = fopen($juntae, 'w+');
fwrite($abbre, utf8_decode($arquivo_text));
    
header('Pragma: public');
header('Expires: 0');
header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
header('Cache-Control: private', false);
header('Content-Type: application/csv');
header("Content-Type: application/download");
header('Content-Disposition: attachment; filename="'. basename($juntae) . '";');
header('Content-Transfer-Encoding: binary');
header('Content-Length: ' . filesize($juntae));
readfile($juntae);
//fclose($abbre);
break;
////////////// EXPORTA ROTA TRANSBORDO////////////////////////////////


////////////// EXPORTA ROTA  GTFOODS////////////////////////////////
case 'export_csv_gt':
$arquivo_text = "";
$table = "rotas";
$sql = mysql_query("select * from $table ORDER BY nome_rota, ordem ASC");
//$arquivo_text = "";
$arquivo_text .="CD_EMPRESA;NR_PEDIDO;PLACA;FORMACAO_CARGA_ROT;SEQ_ENTREGA;DISTANCIA;
";

while ($datas = mysql_fetch_array($sql)) {	


$iddoveiculo = $datas['veiculo'];
$query1 = "select * from veiculos WHERE id='$iddoveiculo'";		
$rs1 = mysql_query($query1);
$row1 = mysql_fetch_array($rs1);	
$nome_veiculo = $row1['nome'];
$distancia_com_virgula = str_replace(".",",",$datas['distancia']);
$arquivo_text .= "$datas[obs_pedido];$datas[codigo_pedido];$nome_veiculo;$datas[nome_rota];$datas[ordem];$distancia_com_virgula;
";
}
$data="ROTAS_" . date("d-m-Y_H_i_s");
$exte = $data . '.csv';
$juntae = 'uploads/' . $exte;
$abbre = fopen($juntae, 'w+');
fwrite($abbre, utf8_decode($arquivo_text));
    
header('Pragma: public');
header('Expires: 0');
header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
header('Cache-Control: private', false);
header('Content-Type: application/csv');
header("Content-Type: application/download");
header('Content-Disposition: attachment; filename="'. basename($juntae) . '";');
header('Content-Transfer-Encoding: binary');
header('Content-Length: ' . filesize($juntae));
readfile($juntae);
//fclose($abbre);
break;
////////////// EXPORTA ROTA  GTFOODS////////////////////////////////



////////////// EXPORTA ROTA  POLI////////////////////////////////
case 'export_csv	_poli':
$arquivo_text = "";
$table = "rotas";
$sql = mysql_query("select * from $table ORDER BY nome_rota, ordem ASC");
//$arquivo_text = "";
$arquivo_text .="CD_EMPRESA;NR_PEDIDO;PLACA;FORMACAO_CARGA_ROT;SEQ_ENTREGA;DISTANCIA;
";

while ($datas = mysql_fetch_array($sql)) {	


$iddoveiculo = $datas['veiculo'];
$query1 = "select * from veiculos WHERE id='$iddoveiculo'";		
$rs1 = mysql_query($query1);
$row1 = mysql_fetch_array($rs1);	
$nome_veiculo = $row1['nome'];
$distancia_com_virgula = str_replace(".",",",$datas['distancia']);
$arquivo_text .= "$datas[obs_pedido];$datas[codigo_pedido];$nome_veiculo;$datas[nome_rota];$datas[ordem];$distancia_com_virgula;
";
}
$data="ROTAS_" . date("d-m-Y_H_i_s");
$exte = $data . '.csv';
$juntae = 'uploads/' . $exte;
$abbre = fopen($juntae, 'w+');
fwrite($abbre, utf8_decode($arquivo_text));
    
header('Pragma: public');
header('Expires: 0');
header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
header('Cache-Control: private', false);
header('Content-Type: application/csv');
header("Content-Type: application/download");
header('Content-Disposition: attachment; filename="'. basename($juntae) . '";');
header('Content-Transfer-Encoding: binary');
header('Content-Length: ' . filesize($juntae));
readfile($juntae);
//fclose($abbre);
break;
////////////// EXPORTA ROTA  POLI////////////////////////////////


////////////// EXPORTA ROTA COMPLETA////////////////////////////////
case 'export_csv_full':


$table = "rotas"; // Enter Your Table Name 
$sql = mysql_query("select * from $table ORDER BY nome_rota, ordem ASC");
//$columns_total = mysql_num_fields($sql);

$arquivo_text = '';
while ($datas = mysql_fetch_array($sql)) {
	
$iddoveiculo = $datas['veiculo'];
$query1 = "select * from veiculos WHERE id='$iddoveiculo'";		
$rs1 = mysql_query($query1);
$row1 = mysql_fetch_array($rs1);	
$nome_veiculo = $row1['nome'];

$rota_concatena = "Rota " . $datas['nome_rota'];
$distancia_com_virgula = str_replace(".",",",$datas['distancia']);

//$tempo_servico = $datas['tempo_servico'];

$tempo_servico = convertToHoursMins($datas['tempo_servico'], '%02d:%02d:00');


$arquivo_text .= "$rota_concatena;$datas[ordem];$nome_veiculo;$datas[codigo_cliente];$datas[nome_cliente];$datas[endereco];$datas[codigo_pedido];$datas[obs_pedido];$datas[tempo];$tempo_servico;$distancia_com_virgula;$datas[peso];$datas[volume];$datas[valor];
";
}
$data="ROTAS_" . date("d-m-Y_H_i_s");
$exte = $data . '.csv';
$juntae = 'uploads/' . $exte;
$abbre = fopen($juntae, 'w+');
fwrite($abbre, utf8_decode($arquivo_text));
//fclose($abbre);
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
//////////////EXPORTA ROTA COMPLETA////////////////////////////////



//////////////EXPORTA ROTA excell////////////////////////////////

case 'export_xls1':



$table = "rotas"; // Enter Your Table Name 

		


$data="ROTAS_" . date("d-m-Y_H_i_s");
//$exte = $data . '.csv';

// Definimos o nome do arquivo que será exportado
$arquivo = $data . '.xls';

$html = '';
$html= '<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />';
$html .= '<table border="1">';
	
		

$query_veiculos = "select * from rotas group by veiculo";														
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
	
	
$html .= '<tr align="center">';
$html .= '<td  colspan="8" bgcolor="#c9c9c9"><strong style="font-size:17px;">' . "DATA " . date("d m Y") . " " . "PLACA <b>" . $queme . "</b> - " . $queme_transp . '</strong></td>';
$html .= '</tr>';	
	

$html .= '<tr>';
$html .= '<td nowrap align="right"><b>N</b></td>';
$html .= '<td nowrap><b>NOTAS</b></td>';
$html .= '<td nowrap><b>CLIENTE</b></td>';
$html .= '<td nowrap><b>ENDR</b></td>';
$html .= '<td nowrap><b>BAIRRO</b></td>';
$html .= '<td nowrap><b>CIDADE</b></td>';
$html .= '<td nowrap align="right"><b>PESO</b></td>';
$html .= '<td nowrap align="right"><b>VALOR</b></td>';
$html .= '</tr>';

	
	
$sql = mysql_query("select * from $table where veiculo='$veiculo_ok' ORDER BY ordem DESC");

$soma_peso=0;
$soma_valor=0;


$conta_ordem = 0;	
	
while ($datas = mysql_fetch_array($sql)) {

	$conta_ordem++;
	
$id_cliente = $datas['codigo_cliente'];
$nome_cliente = $datas['nome_cliente'];
$veiculo = $datas['veiculo'];



$ordem = $datas['ordem'];
$trans = $datas['transportadora'];
$endereco = $datas['endereco'];
$cidade = $datas['cidade'];

$codigo_pedido = $datas['codigo_pedido'];
$obs_pedido = $datas['obs_pedido'];
$nome_rota = $datas['nome_rota'];
$distancia = $datas['distancia'];
$tempo = $datas['tempo'];
$tempo_serv = $datas['tempo_servico'];
	
	
$peso = $datas['peso'];
$volume = $datas['volume'];
$valor = $datas['valor'];

/// ponto por virgula

	$peso1 = str_replace(".", ",", $peso);
	$volume1 = str_replace(".", ",", $volume);
	$valor1 = str_replace(".", ",", $valor);
	
	
	
$setor = $datas['setor'];
$cep = $datas['cep'];

$vendedor = $datas['vendedor'];
$lote =$datas['lote'];
$bairro = $datas['bairro'];

$especial =  $datas['especial'];

$praca = $datas['praca'];

	
	
$tempo_servico = convertToHoursMins($tempo_serv, '%02d:%02d:00');
if($especial=='CUPOM'){
	
$html .= '<tr>';
$html .= '<td align="left" nowrap align="right"><b>' . $conta_ordem . '</b></td>';
$html .= '<td align="left" nowrap><b>' . $codigo_pedido . '</b></td>';
$html .= '<td align="left" nowrap><b>' . $nome_cliente . '</b></td>';
$html .= '<td align="left" nowrap><b>' . $endereco . '</b></td>';
$html .= '<td align="left" nowrap><b>' . $bairro . '</b></td>';
$html .= '<td align="left" nowrap><b>' . $cidade . '</b></td>';
$html .= '<td align="left" nowrap  align="right"><b>' . $peso1 . '</b></td>';
$html .= '<td align="left" nowrap  align="right"><b>' . $valor1 . '</b></td>';
$html .= '</tr>';	
}	else {
	
$html .= '<tr>';
$html .= '<td align="left" nowrap align="right">' . $conta_ordem . '</td>';
$html .= '<td align="left" nowrap>' . $codigo_pedido . '</td>';
$html .= '<td align="left" nowrap>' . $nome_cliente . '</td>';
$html .= '<td align="left" nowrap>' . $endereco . '</td>';
$html .= '<td align="left" nowrap>' . $bairro . '</td>';
$html .= '<td align="left" nowrap>' . $cidade . '</td>';
$html .= '<td align="left" nowrap  align="right">' . $peso1 . '</td>';
$html .= '<td align="left" nowrap  align="right">' . $valor1 . '</td>';
$html .= '</tr>';

	
}
	


	$soma_peso+= $peso;
	$soma_valor+= $valor;
	
	$soma_peso = str_replace(".", ",", $soma_peso);
	$soma_valor = str_replace(".", ",", $soma_valor);
}

$html .= '<tr>';
$html .= '<td align="left"></td>';

$html .= '<td align="left"></td>';
$html .= '<td align="left"></td>';
$html .= '<td align="left"></td>';
$html .= '<td align="right"></td>';
$html .= '<td align="right"></td>';
$html .= '<td align="right">' . $soma_peso . '</td>';
$html .= '<td align="right">' . $soma_valor . '</td>';

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


case 'export_xls2':



$table = "rotas"; // Enter Your Table Name 

		


$data="ROTAS_" . date("d-m-Y_H_i_s");
//$exte = $data . '.csv';

// Definimos o nome do arquivo que será exportado
$arquivo = $data . '.xls';

$html = '';
$html= '<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />';
$html .= '<table border="1">';
	
		

$query_veiculos = "select * from rotas group by veiculo";														
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
	
	
$html .= '<tr align="center">';
$html .= '<td  colspan="12" bgcolor="#c9c9c9"><strong style="font-size:17px;">' . "DATA " . date("d m Y") . " " . "PLACA <b>" . $queme . "</b> - " . $queme_transp . '</strong></td>';
$html .= '</tr>';	
	

$html .= '<tr>';
$html .= '<td nowrap align="right"><b>N</b></td>';
$html .= '<td nowrap><b>PEDIDO</b></td>';
$html .= '<td nowrap><b>LOTE</b></td>';
$html .= '<td nowrap><b>VENDEDOR</b></td>';
$html .= '<td nowrap><b>PRAÇA</b></td>';
$html .= '<td nowrap><b></b></td>';
$html .= '<td nowrap><b></b></td>';
$html .= '<td nowrap><b></b></td>';
$html .= '<td nowrap><b></b></td>';
$html .= '<td nowrap><b></b></td>';
$html .= '<td nowrap><b></b></td>';
$html .= '<td nowrap><b>CANAL</b></td>';
$html .= '</tr>';

	
	
$sql = mysql_query("select * from $table where veiculo='$veiculo_ok' ORDER BY codigo_pedido ASC");

$soma_peso=0;
$soma_valor=0;

while ($datas = mysql_fetch_array($sql)) {

$id_cliente = $datas['codigo_cliente'];
$nome_cliente = $datas['nome_cliente'];
$veiculo = $datas['veiculo'];



$ordem = $datas['ordem'];
$trans = $datas['transportadora'];
$endereco = $datas['endereco'];
$cidade = $datas['cidade'];

$codigo_pedido = $datas['codigo_pedido'];
$obs_pedido = $datas['obs_pedido'];
$nome_rota = $datas['nome_rota'];
$distancia = $datas['distancia'];
$tempo = $datas['tempo'];
$tempo_serv = $datas['tempo_servico'];
$peso = $datas['peso'];
$volume = $datas['volume'];
$valor = $datas['valor'];
$setor = $datas['setor'];
$cep = $datas['cep'];

$vendedor = $datas['vendedor'];
$lote =$datas['lote'];
$bairro = $datas['bairro'];

$especial =  $datas['especial'];
$praca = $datas['praca'];
	
	
$tempo_servico = convertToHoursMins($tempo_serv, '%02d:%02d:00');
if($especial=='CUPOM'){
	
$html .= '<tr>';
$html .= '<td align="right" nowrap><b>' . $ordem . '</b></td>';
$html .= '<td align="left" nowrap><b>' . $codigo_pedido . '</b></td>';
$html .= '<td align="left" nowrap><b>' . $lote . '</b></td>';
$html .= '<td align="left" nowrap><b>' . $vendedor . '</b></td>';
$html .= '<td align="left" nowrap><b>' . $praca . '</b></td>';
$html .= '<td align="left" nowrap><b>' . '</b></td>';
$html .= '<td align="left" nowrap><b>' . '</b></td>';
$html .= '<td align="left" nowrap><b>' . '</b></td>';
$html .= '<td align="left" nowrap><b>' . '</b></td>';
$html .= '<td align="left" nowrap><b>' . '</b></td>';
$html .= '<td align="left" nowrap><b>' . '</b></td>';
$html .= '<td align="left" nowrap><b>' . $obs_pedido . '</b></td>';
$html .= '</tr>';	
}	else {
	
$html .= '<tr>';
$html .= '<td align="right" nowrap>' . $ordem . '</td>';
$html .= '<td align="left" nowrap>' . $codigo_pedido . '</td>';
$html .= '<td align="left" nowrap>' . $lote . '</td>';
$html .= '<td align="left" nowrap>' . $vendedor . '</td>';
$html .= '<td align="left" nowrap>' . $praca . '</td>';
$html .= '<td align="left" nowrap>' . '</td>';
$html .= '<td align="left" nowrap>' . '</td>';
$html .= '<td align="left" nowrap>' . '</td>';
$html .= '<td align="left" nowrap>' . '</td>';
$html .= '<td align="left" nowrap>' . '</td>';
$html .= '<td align="left" nowrap>' . '</td>';
$html .= '<td align="left" nowrap>' . $obs_pedido . '</td>';
$html .= '</tr>';
	
}
	


	$soma_peso+= $peso;
	$soma_valor+= $valor;
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
		
		
case 'export_xls3':



$table = "rotas"; // Enter Your Table Name 

		


$data="ROTAS_" . date("d-m-Y_H_i_s");
//$exte = $data . '.csv';

// Definimos o nome do arquivo que será exportado
$arquivo = $data . '.xls';

$html = '';
$html= '<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />';
$html .= '<table border="1">';
	
		

$query_veiculos = "select * from rotas group by veiculo";														
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
	
	
$html .= '<tr align="center">';
$html .= '<td  colspan="12" bgcolor="#c9c9c9"><strong style="font-size:17px;">' . "DATA " . date("d m Y") . " " . "PLACA <b>" . $queme . "</b> - " . $queme_transp . '</strong></td>';
$html .= '</tr>';	
	

$html .= '<tr>';
$html .= '<td nowrap align="right"><b>N</b></td>';
$html .= '<td nowrap><b>PEDIDO</b></td>';
$html .= '<td nowrap><b>LOTE</b></td>';
$html .= '<td nowrap><b>VENDEDOR</b></td>';
$html .= '<td nowrap><b>PRAÇA</b></td>';
$html .= '<td nowrap><b></b></td>';
$html .= '<td nowrap><b></b></td>';
$html .= '<td nowrap><b></b></td>';
$html .= '<td nowrap><b></b></td>';
$html .= '<td nowrap><b></b></td>';
$html .= '<td nowrap><b></b></td>';
$html .= '<td nowrap><b>CANAL</b></td>';
$html .= '</tr>';

	
	
$sql = mysql_query("select * from $table where veiculo='$veiculo_ok' ORDER BY lote ASC");

$soma_peso=0;
$soma_valor=0;


while ($datas = mysql_fetch_array($sql)) {

$id_cliente = $datas['codigo_cliente'];
$nome_cliente = $datas['nome_cliente'];
$veiculo = $datas['veiculo'];



$ordem = $datas['ordem'];
$trans = $datas['transportadora'];
$endereco = $datas['endereco'];
$cidade = $datas['cidade'];

$codigo_pedido = $datas['codigo_pedido'];
$obs_pedido = $datas['obs_pedido'];
$nome_rota = $datas['nome_rota'];
$distancia = $datas['distancia'];
$tempo = $datas['tempo'];
$tempo_serv = $datas['tempo_servico'];
$peso = $datas['peso'];
$volume = $datas['volume'];
$valor = $datas['valor'];
$setor = $datas['setor'];
$cep = $datas['cep'];

$vendedor = $datas['vendedor'];
$lote =$datas['lote'];
$bairro = $datas['bairro'];
	
$praca = $datas['praca'];

$especial =  $datas['especial'];
	
	
$tempo_servico = convertToHoursMins($tempo_serv, '%02d:%02d:00');
if($especial=='CUPOM'){
	
$html .= '<tr>';
$html .= '<td align="right" nowrap><b>' . $ordem . '</b></td>';
$html .= '<td align="left" nowrap><b>' . $codigo_pedido . '</b></td>';
$html .= '<td align="left" nowrap><b>' . $lote . '</b></td>';
$html .= '<td align="left" nowrap><b>' . $vendedor . '</b></td>';
$html .= '<td align="left" nowrap><b>' . $praca . '</b></td>';
$html .= '<td align="left" nowrap><b>' . '</b></td>';
$html .= '<td align="left" nowrap><b>' . '</b></td>';
$html .= '<td align="left" nowrap><b>' . '</b></td>';
$html .= '<td align="left" nowrap><b>' . '</b></td>';
$html .= '<td align="left" nowrap><b>' . '</b></td>';
$html .= '<td align="left" nowrap><b>' . '</b></td>';
$html .= '<td align="left" nowrap><b>' . $obs_pedido . '</b></td>';
$html .= '</tr>';	
}	else {
	
$html .= '<tr>';
$html .= '<td align="right" nowrap>' . $ordem . '</td>';
$html .= '<td align="left" nowrap>' . $codigo_pedido . '</td>';
$html .= '<td align="left" nowrap>' . $lote . '</td>';
$html .= '<td align="left" nowrap>' . $vendedor . '</td>';
$html .= '<td align="left" nowrap>' . $praca . '</td>';
$html .= '<td align="left" nowrap>' . '</td>';
$html .= '<td align="left" nowrap>' . '</td>';
$html .= '<td align="left" nowrap>' . '</td>';
$html .= '<td align="left" nowrap>' . '</td>';
$html .= '<td align="left" nowrap>' . '</td>';
$html .= '<td align="left" nowrap>' . '</td>';
$html .= '<td align="left" nowrap>' . $obs_pedido . '</td>';
$html .= '</tr>';

	
}
	


	$soma_peso+= $peso;
	$soma_valor+= $valor;
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

}


?>
