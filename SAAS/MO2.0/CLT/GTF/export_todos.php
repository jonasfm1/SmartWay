<?php
include ('session.php');
include ('conecta.php');

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

if($user==$logado){
$user = '%%';
}

switch ($acao) {


//////////////EXPORTA ROTA excell////////////////////////////////

case 'export_xls':

//if(!empty($_POST['exp1'])) {
	$string0 = $_POST['exp1'];
//	$string0 = explode('|',$_POST['exp1']);
   // $string0 = '"' .implode("','",$campo0).'"';
	//echo $string0;

//}


//if(!empty($_POST['exp2'])) {
	$string1 = $_POST['exp2'];
	
  // $string1 = '"' .implode("','",$campo1).'"';
    //echo $string1;
//}


//if(!empty($_POST['exp3'])) {
    $string3 = $_POST['exp3'];
   // $string3 = '"' .implode("','",$campo3).'"';
  //  echo $string3;
//}

$representante = $_POST['representante'];

$table = "rotas"; // Enter Your Table Name
$status_conta = 0;
// so placa
if($string0 != "''" AND $string1 =="''" AND $string3 =="''"){
    
    $query = "select * from rotas where login in($string0) order by login, lista, rota, sequencia, ocorrencia";
   // echo "entrou so placa";

}
//so lista
if($string0 =="''" AND $string1 != "''" AND $string3 =="''"){
    
    $query = "select * from rotas where id_lista in($string1) order by login, lista, rota, sequencia, ocorrencia";
   // echo "entrou so lista";
}

// so ocorrencia
if($string0 =="''" AND $string1 =="''" AND $string3 != "''"){
    
    $query = "select * from rotas where status in($string3) order by login, lista, rota, sequencia, ocorrencia";
 //   echo "entrou so ocorrecia";
}

// placa, lista
if($string0 != "''" AND $string1 != "''" AND $string3 =="''"){
    
    $query = "select * from rotas where login in($string0) AND id_lista in($string1) order by login, lista, rota, sequencia, ocorrencia";
  //  echo "entrou placa, lista";
}

// lista, ocorrencia
if($string0 == "''" AND $string1 != "''" AND $string3 !="''"){
    
    $query = "select * from rotas where id_lista in($string1) AND status in($string3) order by login, lista, rota, sequencia, ocorrencia";
 //   echo "entrou lista, ocorrencia";
}


// placa, ocorrencia
if($string0 != "''" AND $string1 == "''" AND $string3 !="''"){
    
    $query = "select * from rotas where login in($string0) AND status in($string3)  order by login, lista, rota, sequencia, ocorrencia";
 //   echo "entrou lista, ocorrencia";
}



// placa, lista,ocorrencia
if($string0 != "''" AND $string1 != "''" AND $string3 !="''"){
    
    $query = "select * from rotas where login in($string0) AND id_lista in($string1) AND status in($string3) order by login, lista, rota, sequencia, ocorrencia";
 //   echo "entrou placa, lista, ocorrencia";
}



//so todos vazios

if($string0 =="''" AND $string1 =="''" AND $string3 =="''" ){
    
    $query = "select * from rotas where statusrota=1  order by login, lista, rota, sequencia, ocorrencia";
    //echo "entrou todos vazios";
}



//$query = "select * from rotas where login in($string0) AND lista in($string1) AND status in($string3) order by login, lista, rota, sequencia, ocorrencia";

//$query = "select * from rotas where login in($string0)";

$sql = mysql_query($query);
//$total_todos = mysql_num_rows($rs);


			//	$sql = mysql_query("select rotas.* from rotas INNER JOIN usuario ON usuario.login=rotas.login where usuario.coordenador LIKE '$user' ORDER BY rotas.login ASC, rotas.rota, rotas.sequencia");	
	
$data="MONITORAMENTO_" . date("d-m-Y_H_i_s");
//$exte = $data . '.csv';

// Definimos o nome do arquivo que será exportado
$arquivo = $data . '.xls';

// Criamos uma tabela HTML com o formato da planilha

$html = '';
$html= '<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />';
$html .= '<table border="1">';
$html .= '<tr align="center">';
$html .= '<td  colspan="29" bgcolor="#c9c9c9"><strong style="font-size:17px;">' . "MONITORAMENTO - DATA " . date("d m Y") . '</strong></td>';
$html .= '</tr>';	
$html .= '<tr >';

$html .= '<td nowrap bgcolor="#ECECEC"><b>ID CLIENTE</b></td>';
$html .= '<td nowrap bgcolor="#ECECEC"><b>CLIENTE</b></td>';
$html .= '<td nowrap bgcolor="#ECECEC"><b>CIDADE</b></td>';
$html .= '<td nowrap bgcolor="#ECECEC"><b>BAIRRO</b></td>';
$html .= '<td nowrap bgcolor="#ECECEC"><b>ENDEREÇO</b></td>';
$html .= '<td nowrap bgcolor="#ECECEC"><b>FORMAÇÃO</b></td>';
$html .= '<td nowrap bgcolor="#ECECEC"><b>NR_NF</b></td>';
$html .= '<td nowrap bgcolor="#ECECEC"><b>PEDIDO</b></td>';
$html .= '<td nowrap bgcolor="#ECECEC"><b>OBS PEDIDO</b></td>';
$html .= '<td nowrap bgcolor="#ECECEC"><b>LOGIN</b></td>';
$html .= '<td nowrap bgcolor="#ECECEC"><b>PESO BRUTO</b></td>';
$html .= '<td nowrap bgcolor="#ECECEC"><b>PESO LIQUIDO ITEM</b></td>';
$html .= '<td nowrap bgcolor="#ECECEC"><b>VALOR NF</b></td>';
$html .= '<td nowrap bgcolor="#ECECEC"><b>LISTA</b></td>';
$html .= '<td nowrap bgcolor="#ECECEC"><b>SEQUENCIA</b></td>';
$html .= '<td nowrap bgcolor="#ECECEC"><b>DTH_CHEGADA</b></td>';
$html .= '<td nowrap bgcolor="#ECECEC"><b>DTH_OCORRENCIA</b></td>';
$html .= '<td nowrap bgcolor="#ECECEC"><b>DTH_SAIDA</b></td>';
$html .= '<td nowrap bgcolor="#ECECEC"><b>OCORRENCIA</b></td>';
$html .= '<td nowrap bgcolor="#ECECEC"><b>TEMPO</b></td>';
$html .= '<td nowrap bgcolor="#ECECEC"><b>TEMPO ESTIMADO</b></td>';
$html .= '<td nowrap bgcolor="#ECECEC"><b>REPRESENTANTE</b></td>';
$html .= '<td nowrap bgcolor="#ECECEC"><b>COD. PROTHEUS</b></td>';
$html .= '<td nowrap bgcolor="#ECECEC"><b>DATA CARREG.</b></td>';
$html .= '<td nowrap bgcolor="#ECECEC"><b>SUB NATUREZA</b></td>';

$html .= '<td nowrap bgcolor="#ECECEC"><b>CNPJ</b></td>';
$html .= '<td nowrap bgcolor="#ECECEC"><b>OPERADOR</b></td>';
$html .= '<td nowrap bgcolor="#ECECEC"><b>CANHOTO</b></td>';
$html .= '<td nowrap bgcolor="#ECECEC"><b>DATA CANHOTO</b></td>';


$html .= '</tr>';


while ($datas = mysql_fetch_array($sql)) {

$login = $datas['login'];
$rota = $datas['rota'];
$sequencia = $datas['sequencia'];
$status = $datas['status'];
if($status==0){
	$status_ok = "PENDENTE";
}
if($status==1){
	$status_ok = "POSITIVADOS";
}
if($status==2){
	$status_ok = "NEGATIVADOS";
}
if($status==3){
	$status_ok = "ALERTA";
}

$id_cliente = $datas['idcliente'];
$cliente = $datas['nome'];
$endereco = $datas['endereco'];
$cidade = $datas['cidade'];

$date = new DateTime($datas["dth_ocorrencia"]);
$data_visita= date_format($date, "d-m-Y H:i:s");	

if ($data_visita=='30-11--0001 00:00:00') {
$data_visita = "Não visitado!";
}


//$data_visita = $datas['dth_ocorrencia'];

$oco = $datas["ocorrencia"];
$query_qual = "select * from ocorrencia where id=$oco";														
$query_qual = mysql_query($query_qual);	
$dados = mysql_fetch_array($query_qual);


$ocorrencia = $dados['ocorrencia'];

$tempo_est = $datas['tempo_est'];

$entra = $datas["dth_chegada"];
$sai = $datas["dth_saida"];

$data_login = strtotime($entra);
$data_logout = strtotime($sai);

$tempo_con = mktime(date('H', $data_logout) - date('H', $data_login), date('i', $data_logout) - date('i', $data_login), date('s', $data_logout) - date('s', $data_login));



$tempo_real = date('H:i:s', $tempo_con);

//$raio = $datas['ce'];

if ($datas["ce"]==true){
	$raio = "Sim";
} else {	
	$raio = "Não";
}
$nr_nf = $datas['nr_nf'];
$nr_nf = strval($nr_nf);

$motorista = $datas['ds_motorista'];
$tel_motorista = $datas['tel_motorista'];

$transp = $datas['ds_transp'];

$bairro = $datas['bairro'];
$subnatureza = $datas['subnatureza'];

$html .= '<tr  align="left">';

$html .= '<td nowrap>' . $id_cliente . '</td>';
$html .= '<td nowrap>' . $cliente . '</td>';
$html .= '<td nowrap>' . $cidade . '</td>';
$html .= '<td nowrap>' . $bairro . '</td>';
$html .= '<td nowrap>' . $endereco . '</td>';
$html .= '<td nowrap>' . $datas['formacao'] . '</td>';
$html .= '<td nowrap>' . $datas['nr_nf'] . '</td>';
$html .= '<td nowrap>' . $datas['pedido'] . '</td>';
$html .= '<td nowrap>' . $datas['obs_pedido'] . '</td>';
$html .= '<td nowrap>' . $login . '</td>';
$html .= '<td nowrap>' . $datas['peso_bruto'] . '</td>';
$html .= '<td nowrap>' . $datas['peso_liquido_item'] . '</td>';
$html .= '<td nowrap>' . $datas['valor_nf'] . '</td>';
$html .= '<td nowrap>' . $datas['lista'] . '</td>';
$html .= '<td nowrap>' . $datas['sequencia'] . '</td>';

$html .= '<td nowrap>' . $datas['dth_chegada'] . '</td>';
$html .= '<td nowrap>' .$datas['dth_ocorrencia'] . '</td>';
$html .= '<td nowrap>' . $datas['dth_saida'] . '</td>';
$html .= '<td nowrap>' . $ocorrencia . '</td>';
$html .= '<td nowrap>' . $tempo_real . '</td>';
$html .= '<td nowrap>' . $tempo_est . '</td>';
$html .= '<td nowrap>' . $datas['representante'] . '</td>';
$html .= '<td nowrap>' . $datas['cod_protheus'] . '</td>';
$html .= '<td nowrap>' . $datas['data_carregamento'] . '</td>';
$html .= '<td nowrap>' . $datas['subnatureza'] . '</td>';

$html .= '<td nowrap>' . $datas['cnpj'] . '</td>';
$html .= '<td nowrap>' . $datas['quem'] . '</td>';
$html .= '<td nowrap>' . $datas['canhoto'] . '</td>';
$html .= '<td nowrap>' . $datas['data_canhoto'] . '</td>';

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
