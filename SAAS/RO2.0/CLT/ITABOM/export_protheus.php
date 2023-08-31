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

function get_post_action($name)
{
    $params = func_get_args();

    foreach ($params as $name) {
        if (isset($_POST[$name])) {
            return $name;
        }
    }
}
$dataPedido = $_GET['data'];
$dataPedido = str_replace('/', '', $dataPedido);

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

window.close();

	</SCRIPT>
    <?php
break;

////////////// CARGA DIRETA ////////////////////////////////



////////////// EXPORTA TRANS ////////////////////////////////
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
	
$query_qtos = "select * from clientes WHERE veiculo = '$iddoveiculo'";
$query_qtos = mysql_query($query_qtos);
//NUMERO DE REGISTROS PARA RATIAR OS KM´S
$num_rows = mysql_num_rows($query_qtos);
	

$query_cliente_usado1 = "UPDATE veiculos SET roteirizado='sim', prioridade=Null WHERE id = '$iddoveiculo'";
$rs_cliente_usado1 = mysql_query($query_cliente_usado1);

	
	
////////////

$rs1 = mysql_query($query1);
$row1 = mysql_fetch_array($rs1);	
$nome_veiculo = $row1['nome'];
	
//Distancia vinda da tabela veiculos e sendo ratiada por entrega//////////////////////////////////
	
$distancia_geral_sem_virgula = $row1['distancia_total'];
$distancia_geral_sem_virgula = $distancia_geral_sem_virgula / $num_rows;
$distancia_geral_sem_virgula = number_format($distancia_geral_sem_virgula,1);
	
$distancia_geral_sem_virgula = str_replace(".","",$distancia_geral_sem_virgula);
$distancia_geral_sem_virgula =str_pad($distancia_geral_sem_virgula, 6, ' ', STR_PAD_LEFT);


//$distancia_sem_virgula = str_replace(".","",$datas['distancia']);
//$distancia_sem_virgula =str_pad($distancia_sem_virgula, 6, ' ', STR_PAD_LEFT);
////////////////////////////////////////////////////////////////////////////////////////////

$conta_string=strlen($datas[codigo_cliente]);
	
$somadata_rota = time("d-m-Y H:i") ;
$somadata_rota = substr($somadata_rota,0,-2). str_pad($i_rota[$y], 2, '0', STR_PAD_LEFT);
	
$nova_ordem = str_pad($datas[ordem], 3, ' ', STR_PAD_LEFT);	

$diferenca_conta_string = 8 - $conta_string;


	
$novo_codigo = str_pad($datas[codigo_cliente], 8, '0', STR_PAD_LEFT);
	
$espaco = str_pad('', 2).substr($somadata_rota, -6).$novo_codigo.str_pad($datas[codigo_pedido], 20).$nova_ordem.$nome_veiculo.str_pad('', 1).$dataPedido.str_pad('', 1).$distancia_geral_sem_virgula."\r\n";

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
////////////// EXPORTA TRANS ////////////////////////////////

////////////// EXPORTA ROTA NORMAL////////////////////////////////
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


// ROTEIRIZADO OK ////
$query_cliente_usado = "UPDATE clientes SET roteirizado='sim' WHERE veiculo = '$iddoveiculo'";
$rs_cliente_usado = mysql_query($query_cliente_usado);
	
$query_qtos = "select * from clientes WHERE veiculo = '$iddoveiculo'";
$query_qtos = mysql_query($query_qtos);
//NUMERO DE REGISTROS PARA RATIAR OS KM´S
$num_rows = mysql_num_rows($query_qtos);
	
	
	
$query_cliente_usado1 = "UPDATE veiculos SET roteirizado='sim' WHERE id = '$iddoveiculo'";
$rs_cliente_usado1 = mysql_query($query_cliente_usado1);

////////////
	
$rs1 = mysql_query($query1);
$row1 = mysql_fetch_array($rs1);
$nome_veiculo = $row1['nome'];

//Distancia vinda da tabela veiculos e sendo ratiada por entrega//////////////////////////////////
	
$distancia_geral_sem_virgula = $row1['distancia_total'];
$distancia_geral_sem_virgula = $distancia_geral_sem_virgula / $num_rows;
$distancia_geral_sem_virgula = number_format($distancia_geral_sem_virgula,1);
	
$distancia_geral_sem_virgula = str_replace(".","",$distancia_geral_sem_virgula);
$distancia_geral_sem_virgula =str_pad($distancia_geral_sem_virgula, 6, ' ', STR_PAD_LEFT);


//$distancia_sem_virgula = str_replace(".","",$datas['distancia']);
//$distancia_sem_virgula =str_pad($distancia_sem_virgula, 6, ' ', STR_PAD_LEFT);
////////////////////////////////////////////////////////////////////////////////////////////

	
$conta_string=strlen($datas[codigo_cliente]);
$nova_ordem = str_pad($datas[ordem], 3, ' ', STR_PAD_LEFT);	

$novo_codigo = str_pad($datas[codigo_cliente], 8, '0', STR_PAD_LEFT);

$espaco = str_pad('', 2).substr($datas[nome_rota], -6).$novo_codigo.str_pad($datas[codigo_pedido], 20).$nova_ordem.$nome_veiculo.str_pad('', 1).$dataPedido.str_pad('', 1).$distancia_geral_sem_virgula."\r\n";

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
////////////// EXPORTA ROTA NORMAL////////////////////////////////


////////////// EXPORTA ROTA  GTFOODS////////////////////////////////
case 'export_csv_moderna':
    date_default_timezone_set('America/Sao_Paulo');
    
$arquivo_text = "";
$table = "rotas";
$sql = mysql_query("select * from $table ORDER BY nome_rota, ordem ASC");
//$arquivo_text = "";


while ($datas = mysql_fetch_array($sql)) {	



$codigo_pedido = mb_strimwidth("$datas[codigo_pedido]", 0, 15, "");
//$dia = date("dmY");


$nome_cliente = mb_strimwidth("$datas[nome_cliente]", 0, 30, "");

$cep = str_replace("-","","$datas[cep]");
$cep = mb_strimwidth("$cep", 0, 8, "");

//$volume = str_replace("-","","$datas[volume]");

$volume = str_replace('.', '', "$datas[volume]"); // remove o ponto
$volume = substr($volume,0,-2);
$volume = mb_strimwidth("$volume", 0, 5, "");


$peso = "$datas[peso]" . '0';
$peso = str_replace('.', '', "$peso"); // remove o ponto

$peso = mb_strimwidth("$peso", 0, 8, "");


$rota = "$datas[nome_rota]";
$rota = mb_strimwidth("$rota", 0, 10, "");

$cod_cliente = "$datas[codigo_cliente]";
$cod_cliente = mb_strimwidth("$cod_cliente", 0, 40, "");


$arquivo_text .= "$codigo_pedido;$dataPedido;$nome_cliente;00000000000000;$cep;000000000000000;$volume;$peso;$rota;$cod_cliente
";
}
$data="SINAPD" . date("dmHi");
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

case 'export_xls':



$table = "rotas"; // Enter Your Table Name 


$sql = mysql_query("select * from $table ORDER BY nome_rota, ordem ASC");


$data="ROTAS_" . date("d-m-Y_H_i_s");
//$exte = $data . '.csv';

// Definimos o nome do arquivo que será exportado
$arquivo = $data . '.xls';

// Criamos uma tabela HTML com o formato da planilha

$html = '';
$html= '<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />';
$html .= '<table>';
$html .= '<tr>';
$html .= '<td><b>Rota</b></td>';
$html .= '<td><b>Ordem de visita</b></td>';
$html .= '<td><b>Cod. Pedido</b></td>';
$html .= '<td><b>Nome do Veículo</b></td>';
$html .= '<td><b>Transp.</b></td>';
$html .= '<td><b>Cod. Cliente</b></td>';
$html .= '<td><b>Nome do cliente</b></td>';
$html .= '<td><b>Endereço</b></td>';
$html .= '<td><b>Bairro</b></td>';
$html .= '<td><b>Cidade</b></td>';
$html .= '<td><b>CEP</b></td>';
$html .= '<td><b>Obs Pedido</b></td>';
$html .= '<td><b>Tempo Percurso</b></td>';
$html .= '<td><b>Tempo Visita</b></td>';
$html .= '<td><b>Distância</b></td>';
$html .= '<td><b>Peso</b></td>';
$html .= '<td><b>Volume</b></td>';
$html .= '<td><b>Valor</b></td>';
$html .= '<td><b>Setor</b></td>';
$html .= '</tr>';


while ($datas = mysql_fetch_array($sql)) {

$id_cliente = $datas['codigo_cliente'];
$nome_cliente = $datas['nome_cliente'];
$veiculo = $datas['veiculo'];

$query_todos = "select * from veiculos where id='$veiculo'";														
$rs_todos = mysql_query($query_todos);

while($row_todos = mysql_fetch_array($rs_todos)){
	
	$queme = $row_todos["nome"];
	$queme_transp = $row_todos["transportadora"];
}

$trans = $datas['transportadora'];
$endereco = $datas['endereco'];
$bairro = $datas['bairro'];
$cidade = $datas['cidade'];
$ordem = $datas['ordem'];
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


$tempo_servico = convertToHoursMins($tempo_serv, '%02d:%02d:00');

$html .= '<tr>';
$html .= '<td>' . $nome_rota . '</td>';
$html .= '<td>' . $ordem . '</td>';
$html .= '<td>' . $codigo_pedido . '</td>';
$html .= '<td>' . $queme . '</td>';
$html .= '<td>' . $queme_transp . '</td>';
$html .= '<td>' . $id_cliente . '</td>';
$html .= '<td>' . $nome_cliente . '</td>';
$html .= '<td>' . $endereco . '</td>';
$html .= '<td>' . $bairro . '</td>';
$html .= '<td>' . $cidade . '</td>';
$html .= '<td>' . $cep . '</td>';
$html .= '<td>' . $obs_pedido . '</td>';
$html .= '<td>' . $tempo . '</td>';
$html .= '<td>' . $tempo_servico . '</td>';
$html .= '<td>' . $distancia . '</td>';
$html .= '<td>' . $peso . '</td>';
$html .= '<td>' . $volume . '</td>';
$html .= '<td>' . $valor . '</td>';
$html .= '<td>' . $setor . '</td>';
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
