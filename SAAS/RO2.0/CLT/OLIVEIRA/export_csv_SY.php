<?php

include ('essence/conecta.php');
include ('session.php'); 
ini_set('max_execution_time',12000);

$acao = $_GET['acao'];
$id_yes = $_GET['id'];

switch ($acao) {


////////////// EXPORTA ROTA ////////////////////////////////
case 'export_csv':
$arquivo_text = "";
$table = "rotas";
$sql = mysql_query("select * from $table ORDER BY nome_rota, ordem ASC");
//$arquivo_text = "";

while ($datas = mysql_fetch_array($sql)) {	


$iddoveiculo = $datas['veiculo'];
$query1 = "select * from veiculos WHERE id='$iddoveiculo'";		
$rs1 = mysql_query($query1);
$row1 = mysql_fetch_array($rs1);	
$nome_veiculo = $row1['nome'];
$peso_veiculo = $row1['peso'];

$distancia_com_virgula = str_replace(".",",",$datas['distancia']);
$letra = "M";

$nome_editado = str_pad($datas['nome_rota'], 8);
$codigo_editado = str_pad($datas['codigo_pedido'], 10);
$cidade_editado = str_pad("", 29);
$peso_editado = str_pad($peso_veiculo, 8, " ", STR_PAD_LEFT);

$arquivo_text .= "$nome_editado$codigo_editado$cidade_editado$peso_editado$letra
";
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
header('Content-Type: application/txt');
header("Content-Type: application/download");
header('Content-Disposition: attachment; filename="'. basename($juntae) . '";');
header('Content-Transfer-Encoding: binary');
header('Content-Length: ' . filesize($juntae));
readfile($juntae);
//fclose($abbre);
break;
//////////////EXPORTA ROTA ////////////////////////////////
}

?>
