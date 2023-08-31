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
    
    $query = "select * from rotas where login in($string0) AND status in($string3) order by login, lista, rota, sequencia, ocorrencia";
 //   echo "entrou lista, ocorrencia";
}



// placa, lista,ocorrencia
if($string0 != "''" AND $string1 != "''" AND $string3 !="''"){
    
    $query = "select * from rotas where login in($string0) AND id_lista in($string1) AND status in($string3) order by login, lista, rota, sequencia, ocorrencia";
 //   echo "entrou placa, lista, ocorrencia";
}



//so todos vazios

if($string0 =="''" AND $string1 =="''" AND $string3 =="''" ){
    
    $query = "select * from rotas where statusrota=1 order by login, lista, rota, sequencia, ocorrencia";
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
$html .= '<table>';
$html .= '<tr>';
$html .= '<td><b>LOGIN</b></td>';
$html .= '<td><b>ROTA</b></td>';
$html .= '<td><b>SEQUENCIA</b></td>';
$html .= '<td><b>STATUS</b></td>';
$html .= '<td><b>ID CLIENTE</b></td>';
$html .= '<td><b>CLIENTE</b></td>';
$html .= '<td><b>ENDEREÇO</b></td>';
$html .= '<td><b>CIDADE</b></td>';
$html .= '<td><b>DATA DA VISITA</b></td>';
$html .= '<td><b>OCORRENCIA</b></td>';
$html .= '<td><b>TEMPO ESTIMADO</b></td>';
$html .= '<td><b>TEMPO REAL</b></td>';
$html .= '<td><b>RAIO</b></td>';
$html .= '<td><b>CLASSE</b></td>';
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

$tempo_est = $datas['tempo'];

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
$classe = $datas['classificacao'];


$html .= '<tr>';
$html .= '<td>' . $login . '</td>';
$html .= '<td>' . $rota . '</td>';
$html .= '<td>' . $sequencia . '</td>';
$html .= '<td>' . $status_ok . '</td>';
$html .= '<td>' . $id_cliente . '</td>';
$html .= '<td>' . $cliente . '</td>';
$html .= '<td>' . $endereco . '</td>';
$html .= '<td>' . $cidade . '</td>';
$html .= '<td>' . $data_visita . '</td>';
$html .= '<td>' . $ocorrencia . '</td>';
$html .= '<td>' . $tempo_est . '</td>';
$html .= '<td>' . $tempo_real . '</td>';
$html .= '<td>' . $raio . '</td>';
$html .= '<td>' . $classe . '</td>';
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
