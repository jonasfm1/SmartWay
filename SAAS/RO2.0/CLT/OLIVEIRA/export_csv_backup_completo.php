<?php

include ('essence/conecta.php');
include ('session.php'); 
ini_set('max_execution_time',12000);
?>

<?php
$acao = $_GET['acao'];

$id_yes = $_GET['id'];

switch ($acao) {




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
$distancia_com_virgula = str_replace(".",",",$datas[distancia]);
$arquivo_text .= "$rota_concatena;$datas[ordem];$nome_veiculo;$datas[codigo_cliente];$datas[nome_cliente];$datas[endereco];$datas[codigo_pedido];$datas[obs_pedido];$datas[tempo];$distancia_com_virgula;$datas[peso];$datas[volume];$datas[valor];
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
//////////////EXPORTA ROTA ////////////////////////////////
}

?>
