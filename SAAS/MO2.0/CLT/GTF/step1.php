<?php
include ('session.php'); 
include ('conecta.php');

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//BR" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>::. MONITORAMENTO CADD .:: CADD</title>
<link rel="stylesheet" type="text/css" href="css/menu.css">
<link rel="stylesheet" type="text/css" href="css/step1.css">
<link rel="shortcut icon" href="imgs/favicon.ico" >
 <link rel="icon" type="image/gif" href="imgs/animated_favicon1.gif" >
 
<script type="text/javascript" src="js/min.js"></script>
<script type="text/javascript" src="js/file-upload.js"></script>
<link href="css/file-upload.css" rel="stylesheet" media="screen" type="text/css">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<style type="text/css"></style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>

<script type='text/javascript' src="control/timer.js"></script>
<script LANGUAGE="JavaScript">
this.fullScreenMode = document.fullScreen || document.mozFullScreen || document.webkitIsFullScreen; // This will return true or false depending on if it's full screen or not.

$(document).on ('mozfullscreenchange webkitfullscreenchange fullscreenchange',function(){
       this.fullScreenMode = !this.fullScreenMode;

      //-Check for full screen mode and do something..
      simulateFullScreen();
 });





var simulateFullScreen = function() {
     if(this.fullScreenMode) {
            docElm = document.documentElement
            if (docElm.requestFullscreen) 
                docElm.requestFullscreen()
            else{
                if (docElm.mozRequestFullScreen) 
                   docElm.mozRequestFullScreen()
                else{
                   if (docElm.webkitRequestFullScreen)
                     docElm.webkitRequestFullScreen(Element.ALLOW_KEYBOARD_INPUT)
                }
            }
     }else{
             if (document.exitFullscreen) 
                  document.exitFullscreen()
             else{ 
                  if (document.mozCancelFullScreen) 
                     document.mozCancelFullScreen()
                  else{
                     if (document.webkitCancelFullScreen) 
                         document.webkitCancelFullScreen();
                  }
             }
     }

     this.fullScreenMode= !this.fullScreenMode

}
	
$(document).ready(function(){
$(".jquery-waiting-base-container").waiting({modo:"slow"});
});

function goBack() {
	window.location.href="step1.php";
}

function enviardados(){

if(document.form.filename.value=="")

{
alert( "Clique em 'PROCURAR' e escolha um arquivo .XLS!" );

document.form.filename.focus();

return false;

}



}

</SCRIPT>
<?php 
	//cria sessão
//	$_Session['pagina'] = "PASSO 1";
include ('base_cad_n.php');
require 'PHPExcel/IOFactory.php';
?>
</head>
<body>



<?php
function tirarAcentos($string){
    return preg_replace(array("/(á|à|ã|â|ä)/","/(Á|À|Ã|Â|Ä)/","/(é|è|ê|ë)/","/(É|È|Ê|Ë)/","/(í|ì|î|ï)/","/(Í|Ì|Î|Ï)/","/(ó|ò|õ|ô|ö)/","/(Ó|Ò|Õ|Ô|Ö)/","/(ú|ù|û|ü)/","/(Ú|Ù|Û|Ü)/","/(ñ)/","/(Ñ)/","/(ç|Ç)/" ),explode(" ","a A e E i I o O u U n N c"),$string);
}

	
	
ini_set('max_execution_time',12000);


//Transferir o arquivo


if (isset($_POST['submit'])) {



$inputfilename = $_FILES['filename']['tmp_name'];

$exceldata = array();



try {
    $inputfiletype = PHPExcel_IOFactory::identify($inputfilename);
    $objReader = PHPExcel_IOFactory::createReader($inputfiletype);
    $objPHPExcel = $objReader->load($inputfilename);
}


catch(Exception $e) {
    die('Error loading file"' . pathinfo($inputfilename, PATHINFO_BASENAME) . '": ' . $e->getMessage());
}


$sheet = $objPHPExcel->getSheet(0);
$highestRow = $sheet->getHighestRow();
$highestColumn = $sheet->getHighestColumn();






$file_extension =$_FILES['filename']['tmp_name'];

//$texto = substr($_FILES['filename']['name'],11);
//echo $texto;

$max = 30;
$str = $_FILES['filename']['name'];
$abreviado =  substr_replace($str,(strlen($str) > $max ? '...' : ''), $max);


$extension = substr("$file_extension", 6); // remove the image/ and the gif extension remains.

/*if (is_uploaded_file($_FILES['filename']['tmp_name'])) {
//echo "Arquivo ". $_FILES['filename']['name'] ." lido com sucesso." . "<br />";
//readfile($_FILES['filename']['tmp_name']);
}
*/

$escolha = $_POST['escolha'];


//Importar o arquivo transferido para o banco de dados
//$handle = fopen($_FILES['filename']['tmp_name'], "r") or die("O SISTEMA NÃO CONSEGUIU ABRIR O ARQUIVO $handle");


//echo $handle;
$_conta = 0;
$conta_regs_existentes =  0;



?> 

<div id="loading" style="position:absolute; width:100%; height:100%; background-color:#FFFFFF; z-index:99999; top:0;">
<div style="height:100px;background-color:#FFFFFF; width:400px; position: relative; top: 50%; margin-top:-50px; left:50%; margin-left:-200px">
  <div id="progress" style="position: relative; left: 28px; top: 28px; width: 340px; height: 40px; background-color: #6f99d6; layer-background-color: #6f99d6; border: 1px none #000000; font-family:Arial, 'Helvetica Neue', Helvetica, sans-serif; font-size:12px;">


<?php

 

  function fromExcelToLinux($excel_time) {
    return ($excel_time-25569)*86400;
}


// ESVAZIA TUDO
//$query_esvazia = mysql_query("UPDATE importa SET nr_nf='', codigo_pedido='', pedido='', cod_cancao='', cod_protheus=''");
$query_esvazia = mysql_query("DELETE FROM importa"); 


for ($row=3; $row<= $highestRow; $row++){
      
  $rowData = $sheet->rangeToArray('A' . $row . ':' . $highestColumn . $row, NULL, TRUE, FALSE);



$filial = str_replace("'", " ", $rowData[0][0]);	//
$filial=str_replace('"', " ", $filial);	//
$filial=str_replace('\\', '/',  $filial); 
$filial = tirarAcentos($filial);
////////ACERTA PONTUACAO BR/////////////////////////////
$filial = utf8_encode($filial);
////////ACERTA PONTUACAO////////////////////////////////

$cod_pedido = str_replace("'", " ", $rowData[0][1]);	//
$cod_pedido=str_replace('"', " ", $cod_pedido);	//
$cod_pedido=str_replace('\\', '/',  $cod_pedido); 
$cod_pedido = tirarAcentos($cod_pedido);
////////ACERTA PONTUACAO BR/////////////////////////////
$cod_pedido = utf8_encode($cod_pedido);
////////ACERTA PONTUACAO////////////////////////////////


$formacao = str_replace("'", " ", $rowData[0][2]);	//
$formacao=str_replace('"', " ", $formacao);	//
$formacao=str_replace('\\', '/',  $formacao); 
$formacao = tirarAcentos($formacao);
////////ACERTA PONTUACAO BR/////////////////////////////
$formacao = utf8_encode($formacao);
////////ACERTA PONTUACAO////////////////////////////////  


$nr_romaneio = str_replace("'", " ", $rowData[0][31]);	//
$nr_romaneio=str_replace('"', " ", $nr_romaneio);	//
$nr_romaneio=str_replace('\\', '/',  $nr_romaneio); 
$nr_romaneio = tirarAcentos($nr_romaneio);
////////ACERTA PONTUACAO BR/////////////////////////////
$nr_romaneio = utf8_encode($nr_romaneio);
////////ACERTA PONTUACAO////////////////////////////////  


$nr_nf = str_replace("'", " ", $rowData[0][30]);	//
$nr_nf=str_replace('"', " ", $nr_nf);	//
$nr_nf=str_replace('\\', '/',  $nr_nf); 
$nr_nf = tirarAcentos($nr_nf);
////////ACERTA PONTUACAO BR/////////////////////////////
$nr_nf = utf8_encode($nr_nf);
////////ACERTA PONTUACAO////////////////////////////////  


$codigo_cliente = str_replace("'", " ", $rowData[0][6]);	//
$codigo_cliente=str_replace('"', " ", $codigo_cliente);	//
$codigo_cliente=str_replace("/", "-", $codigo_cliente);	//cod cliente
$codigo_cliente=str_replace('\\', '/',  $codigo_cliente); 
$codigo_cliente = tirarAcentos($codigo_cliente);
////////ACERTA PONTUACAO BR/////////////////////////////
$codigo_cliente = utf8_encode($codigo_cliente);
////////ACERTA PONTUACAO////////////////////////////////

$nome_cliente = str_replace("'", " ", $rowData[0][7]);	//
$nome_cliente=str_replace('"', " ", $nome_cliente);	//
$nome_cliente=str_replace('\\', '/',  $nome_cliente); 
$nome_cliente = tirarAcentos($nome_cliente);
////////ACERTA PONTUACAO BR/////////////////////////////
$nome_cliente = utf8_encode($nome_cliente);
////////ACERTA PONTUACAO////////////////////////////////  

$endereco = str_replace("'", " ", $rowData[0][10]);	//
$endereco=str_replace('"', " ", $endereco);	//
$endereco=str_replace('\\', '/',  $endereco); 
$endereco = tirarAcentos($endereco);
////////ACERTA PONTUACAO BR/////////////////////////////
$endereco = utf8_encode($endereco);
////////ACERTA PONTUACAO////////////////////////////////  

$bairro = str_replace("'", " ", $rowData[0][13]);	//
$bairro=str_replace('"', " ", $bairro);	//
$bairro=str_replace('\\', '/',  $bairro); 
$bairro = tirarAcentos($bairro);
////////ACERTA PONTUACAO BR/////////////////////////////
$bairro = utf8_encode($bairro);
////////ACERTA PONTUACAO//////////////////////////////// 
                          
$numero = str_replace("'", " ", $rowData[0][11]);	//
$numero=str_replace('"', " ", $numero);	//
$numero=str_replace('\\', '/',  $numero); 
$numero = tirarAcentos($numero);
////////ACERTA PONTUACAO BR/////////////////////////////
$numero = utf8_encode($numero);
////////ACERTA PONTUACAO////////////////////////////////  
   
$cep = str_replace("'", " ", $rowData[0][12]);	//
$cep=str_replace('"', " ", $cep);	//
$cep=str_replace('\\', '/',  $cep); 
$cep = tirarAcentos($cep);
////////ACERTA PONTUACAO BR/////////////////////////////
$cep = utf8_encode($cep);
////////ACERTA PONTUACAO////////////////////////////////  


$cnpj = str_replace("'", " ", $rowData[0][9]);	//
$cnpj=str_replace('"', " ", $cnpj);	//
$cnpj=str_replace('\\', '/',  $cnpj); 
$cnpj = tirarAcentos($cnpj);
////////ACERTA PONTUACAO BR/////////////////////////////
$cnpj = utf8_encode($cnpj);
////////ACERTA PONTUACAO////////////////////////////////  

$ie_cliente = str_replace("'", " ", $rowData[0][55]);	//
$ie_cliente=str_replace('"', " ", $ie_cliente);	//
$ie_cliente=str_replace('\\', '/',  $ie_cliente); 
$ie_cliente = tirarAcentos($ie_cliente);
////////ACERTA PONTUACAO BR/////////////////////////////
$ie_cliente = utf8_encode($ie_cliente);
////////ACERTA PONTUACAO////////////////////////////////  
                                      
$tel_cliente = str_replace("'", " ", $rowData[0][56]);	//
$tel_cliente=str_replace('"', " ", $tel_cliente);	//
$tel_cliente=str_replace('\\', '/',  $tel_cliente); 
$tel_cliente = tirarAcentos($tel_cliente);
////////ACERTA PONTUACAO BR/////////////////////////////
$tel_cliente = utf8_encode($tel_cliente);
////////ACERTA PONTUACAO////////////////////////////////  
                                                 
$obs_pedido = str_replace("'", " ", $rowData[0][53]);	//
$obs_pedido=str_replace('"', " ", $obs_pedido);	//
$obs_pedido=str_replace('\\', '/',  $obs_pedido); 
$obs_pedido = tirarAcentos($obs_pedido);
////////ACERTA PONTUACAO BR/////////////////////////////
$obs_pedido = utf8_encode($obs_pedido);
////////ACERTA PONTUACAO////////////////////////////////                                                                       
                                      
$cidade = str_replace("'", " ", $rowData[0][4]);	//
$cidade=str_replace('"', " ", $cidade);	//
$cidade=str_replace('\\', '/',  $cidade); 
$cidade = tirarAcentos($cidade);
////////ACERTA PONTUACAO BR/////////////////////////////
$cidade = utf8_encode($cidade);
////////ACERTA PONTUACAO//////////////////////////////// 
                                                                            
$uf = str_replace("'", " ", $rowData[0][5]);	//
$uf=str_replace('"', " ", $uf);	//
$uf=str_replace('\\', '/',  $uf); 
$uf = tirarAcentos($uf);
////////ACERTA PONTUACAO BR/////////////////////////////
$uf = utf8_encode($uf);
////////ACERTA PONTUACAO//////////////////////////////// 

$valor_nf = str_replace("'", " ", $rowData[0][37]);	//
$valor_nf=str_replace('"', " ", $valor_nf);	//
$valor_nf=str_replace('\\', '/',  $valor_nf); 
$valor_nf = tirarAcentos($valor_nf);
////////ACERTA PONTUACAO BR/////////////////////////////
$valor_nf = utf8_encode($valor_nf);
////////ACERTA PONTUACAO//////////////////////////////// 
                                         
$cd_transp = str_replace("'", " ", $rowData[0][16]);	//
$cd_transp=str_replace('"', " ", $cd_transp);	//
$cd_transp=str_replace('\\', '/',  $cd_transp); 
$cd_transp = tirarAcentos($cd_transp);
////////ACERTA PONTUACAO BR/////////////////////////////
$cd_transp = utf8_encode($cd_transp);
////////ACERTA PONTUACAO//////////////////////////////// 

$ds_transp = str_replace("'", " ", $rowData[0][17]);	//
$ds_transp=str_replace('"', " ", $ds_transp);	//
$ds_transp=str_replace('\\', '/',  $ds_transp); 
$ds_transp = tirarAcentos($ds_transp);
////////ACERTA PONTUACAO BR/////////////////////////////
$ds_transp = utf8_encode($ds_transp);
////////ACERTA PONTUACAO//////////////////////////////// 

$cd_motorista = str_replace("'", " ", $rowData[0][18]);	//
$cd_motorista=str_replace('"', " ", $cd_motorista);	//
$cd_motorista=str_replace('\\', '/',  $cd_motorista); 
$cd_motorista = tirarAcentos($cd_motorista);
////////ACERTA PONTUACAO BR/////////////////////////////
$cd_motorista = utf8_encode($cd_motorista);
////////ACERTA PONTUACAO//////////////////////////////// 
                                               
$ds_motorista = str_replace("'", " ", $rowData[0][19]);	//
$ds_motorista=str_replace('"', " ", $ds_motorista);	//
$ds_motorista=str_replace('\\', '/',  $ds_motorista); 
$ds_motorista = tirarAcentos($ds_motorista);
////////ACERTA PONTUACAO BR/////////////////////////////
$ds_motorista = utf8_encode($ds_motorista);
////////ACERTA PONTUACAO//////////////////////////////// 

                                                                                                 
$tel_motorista = str_replace("'", " ", $rowData[0][20]);	//
$tel_motorista=str_replace('"', " ", $tel_motorista);	//
$tel_motorista=str_replace('\\', '/',  $tel_motorista); 
$tel_motorista = tirarAcentos($tel_motorista);
////////ACERTA PONTUACAO BR/////////////////////////////
$tel_motorista = utf8_encode($tel_motorista);
////////ACERTA PONTUACAO//////////////////////////////// 

                                                                                                                                                   
$perfil = str_replace("'", " ", $rowData[0][21]);	//
$perfil=str_replace('"', " ", $perfil);	//
$perfil=str_replace('\\', '/',  $perfil); 
$perfil = tirarAcentos($perfil);
////////ACERTA PONTUACAO BR/////////////////////////////
$perfil = utf8_encode($perfil);
////////ACERTA PONTUACAO//////////////////////////////// 

                                                                                                                                                                                                   
$login = str_replace("'", " ", $rowData[0][22]);	//
$login=str_replace('"', " ", $login);	//
$login=str_replace('\\', '/',  $login); 
$login = tirarAcentos($login);
////////ACERTA PONTUACAO BR/////////////////////////////
$login = utf8_encode($login);
////////ACERTA PONTUACAO//////////////////////////////// 

$peso_bruto = str_replace("'", " ", $rowData[0][23]);	//
$peso_bruto=str_replace('"', " ", $peso_bruto);	//
$peso_bruto=str_replace('\\', '/',  $peso_bruto); 
$peso_bruto = tirarAcentos($peso_bruto);
////////ACERTA PONTUACAO BR/////////////////////////////
$peso_bruto = utf8_encode($peso_bruto);
////////ACERTA PONTUACAO//////////////////////////////// 

$peso_liquido = str_replace("'", " ", $rowData[0][24]);	//
$peso_liquido=str_replace('"', " ", $peso_liquido);	//
$peso_liquido=str_replace('\\', '/',  $peso_liquido); 
$peso_liquido = tirarAcentos($peso_liquido);
////////ACERTA PONTUACAO BR/////////////////////////////
$peso_liquido = utf8_encode($peso_liquido);
////////ACERTA PONTUACAO//////////////////////////////// 

$data_carrega = str_replace("'", " ", $rowData[0][36]);	//
$data_carrega=str_replace('"', " ", $data_carrega);	//
$data_carrega=str_replace('\\', '/',  $data_carrega); 
$data_carrega = tirarAcentos($data_carrega);
////////ACERTA PONTUACAO BR/////////////////////////////
$data_carrega = utf8_encode($data_carrega);
////////ACERTA PONTUACAO//////////////////////////////// 

$data_nf = str_replace("'", " ", $rowData[0][29]);	//
$data_nf=str_replace('"', " ", $data_nf);	//
$data_nf=str_replace('\\', '/',  $data_nf); 
$data_nf = tirarAcentos($data_nf);
////////ACERTA PONTUACAO BR/////////////////////////////
$data_nf = utf8_encode($data_nf);
////////ACERTA PONTUACAO//////////////////////////////// 

$cod_vendedor = str_replace("'", " ", $rowData[0][41]);	//
$cod_vendedor=str_replace('"', " ", $cod_vendedor);	//
$cod_vendedor=str_replace('\\', '/',  $cod_vendedor); 
$cod_vendedor = tirarAcentos($cod_vendedor);
////////ACERTA PONTUACAO BR/////////////////////////////
$cod_vendedor = utf8_encode($cod_vendedor);
////////ACERTA PONTUACAO//////////////////////////////// 

$vendedor = str_replace("'", " ", $rowData[0][42]);	//
$vendedor=str_replace('"', " ", $vendedor);	//
$vendedor=str_replace('\\', '/',  $vendedor); 

$vendedor=str_replace('/', '',  $vendedor); 
$vendedor=str_replace('&', "", $vendedor);	//

$vendedor = tirarAcentos($vendedor);
////////ACERTA PONTUACAO BR/////////////////////////////
$vendedor = utf8_encode($vendedor);
////////ACERTA PONTUACAO//////////////////////////////// 

$cod_cancao = str_replace("'", " ", $rowData[0][49]);	//
$cod_cancao=str_replace('"', " ", $cod_cancao);	//
$cod_cancao=str_replace('\\', '/',  $cod_cancao); 
$cod_cancao = tirarAcentos($cod_cancao);
////////ACERTA PONTUACAO BR/////////////////////////////
$cod_cancao = utf8_encode($cod_cancao);
////////ACERTA PONTUACAO//////////////////////////////// 

$cod_protheus = str_replace("'", " ", $rowData[0][50]);	//
$cod_protheus=str_replace('"', " ", $cod_protheus);	//
$cod_protheus=str_replace('\\', '/',  $cod_protheus); 
$cod_protheus = tirarAcentos($cod_protheus);
////////ACERTA PONTUACAO BR/////////////////////////////
$cod_protheus = utf8_encode($cod_protheus);
////////ACERTA PONTUACAO//////////////////////////////// 

$produto = str_replace("'", " ", $rowData[0][51]);	//
$produto=str_replace('"', " ", $produto);	//
$produto=str_replace('\\', '/',  $produto); 
$produto = tirarAcentos($produto);
////////ACERTA PONTUACAO BR/////////////////////////////
$produto = utf8_encode($produto);
////////ACERTA PONTUACAO//////////////////////////////// 

$peso_liquido_item = str_replace("'", " ", $rowData[0][43]);	//
$peso_liquido_item=str_replace('"', " ", $peso_liquido_item);	//
$peso_liquido_item=str_replace('\\', '/',  $peso_liquido_item); 
$peso_liquido_item = tirarAcentos($peso_liquido_item);
////////ACERTA PONTUACAO BR/////////////////////////////
$peso_liquido_item = utf8_encode($peso_liquido_item);
////////ACERTA PONTUACAO//////////////////////////////// 

$peso_bruto_item = str_replace("'", " ", $rowData[0][44]);	//
$peso_bruto_item=str_replace('"', " ", $peso_bruto_item);	//
$peso_bruto_item=str_replace('\\', '/',  $peso_bruto_item); 
$peso_bruto_item = tirarAcentos($peso_bruto_item);
////////ACERTA PONTUACAO BR/////////////////////////////
$peso_bruto_item = utf8_encode($peso_bruto_item);
////////ACERTA PONTUACAO////////////////////////////////
                                                                                   
$valor_carga = str_replace("'", " ", $rowData[0][58]);	//
$valor_carga=str_replace('"', " ", $valor_carga);	//
$valor_carga=str_replace('\\', '/',  $valor_carga); 
$valor_carga = tirarAcentos($valor_carga);
////////ACERTA PONTUACAO BR/////////////////////////////
$valor_carga = utf8_encode($valor_carga);
////////ACERTA PONTUACAO////////////////////////////////
         

$_conta++;

date_default_timezone_set('America/Sao_Paulo');
$today1 = date("d-m-Y-H");
$today = date("d-m-Y-H:i:s");

$lista = "LISTA-" . $today1;
$rota = $today1 . "-CARGA-" . $formacao;
$controle_campo0 = "";


//ATUALIZA DADOS CLIENTES

if($registros!=0){

   if($nr_nf==''){
      $nr_nf = "SEM NF"; 
   }

   $lista_atualizada = "LISTA-" . $today . " (ATUALIZADA)";
   $query_update = "UPDATE rotas SET ocorrencia='', dth_ocorrencia='', x_ocorrencia='',y_ocorrencia='', dth_chegada='',x_chegada='', y_chegada='', dth_saida='', x_saida='', y_saida='', ce=0, status='0', lista='$lista_atualizada', peso_bruto = '$peso_bruto',  nr_nf = CONCAT(nr_nf, '/', '$nr_nf') , codigo_pedido = CONCAT(codigo_pedido, '/', '$nr_nf'), valor_nf='$valor_nf', nr_romaneio='$nr_romaneio', site=1 where formacao='$formacao' and cnpj='$cnpj'";
   $query_update = mysql_query($query_update);

   $conta_regs_existentes++;


/// INSERE PEDIDOS NOVOS
} else {

   $new = "ro_" . $logado;
   //$lista = $dia_seguinte . " (" . $today1 . ")";


// PEGA LAT LONG DO DB_GERAL

$con1 = mysql_connect("127.0.0.1", "root", "HtMQZhAwCNzeaAfT") or die ("Sem conexão com o servidor");
$select1 = mysql_select_db($new) or die("Sem acesso ao DB, Entre em contato com o Administrador!");

$query20 = "SELECT latitude_cad, longitude_cad FROM db_geral where codigo_cliente='$codigo_cliente'";
$rs20 = mysql_query($query20);
$dados = mysql_fetch_array($rs20);
$achou_db_geral=  mysql_num_rows($rs20);

if($achou_db_geral==0){
   ?>
   <script>
alert("O cliente <?php echo $codigo_cliente ?> não foi encontrado no Banco de dados do Roteirizador! Esse cliente ficará localizado em Brasília como padrão. Verifique se realmente esse cliente já foi roteirizado.")
   </script>
   
<?php
$lat = '-15.793841';
$lgn = '-47.875806';
} else {

$conta_regs_existentes++;

$lat = $dados['latitude_cad'];
$lgn = $dados['longitude_cad'];

}

/////////////////////////////////////////////////////////////////////////////////////////////////////

$bd = "mo_" . $logado;

$conx = mysql_connect("127.0.0.1", "root", "HtMQZhAwCNzeaAfT") or die ("Sem conexão com o servidor");

$selectx = mysql_select_db($bd) or die("Sem acesso ao DB, Entre em contato com o Administrador!");


$query_verifica = "SELECT cnpj FROM importa where cnpj='$cnpj' and  formacao='$formacao'";
$rs_verifica = mysql_query($query_verifica);

$NumeroLinhas = mysql_num_rows($rs_verifica);

if($nr_nf==''){
   $nr_nf = "SEM NF"; 


}


if($NumeroLinhas==1){

   $concatena = "UPDATE importa SET peso = ( peso + $peso_liquido_item ), pedido = CONCAT(pedido, '/', '$cod_pedido'), codigo_pedido = CONCAT(codigo_pedido, '/', '$nr_nf'), cod_protheus = CONCAT(cod_protheus, '/', '$cod_protheus'), cod_cancao = CONCAT(cod_cancao, '/', '$cod_cancao'), nr_nf = CONCAT(nr_nf, '/', '$nr_nf'), peso_liquido_item = CONCAT(peso_liquido_item, '/', '$peso_liquido_item'), site=1 where cnpj='$cnpj' and  formacao='$formacao'";
   $rs_concatena = mysql_query($concatena);

} else {
  

   $import="INSERT into importa(site, peso, statusrota, status, y, x, lista, login, filial, pedido, codigo_pedido, formacao, nr_romaneio, nr_nf, idcliente, nome, endereco, bairro, numero, cep, cnpj, ie_cliente, tel_cliente, obs_pedido, cidade, uf, valor_nf, cd_transp, ds_transp, cd_motorista, ds_motorista, tel_motorista, perfil, peso_bruto, peso_liquido, data_carregamento, data_nf, cod_rep, representante, cod_cancao, cod_protheus, produto, peso_liquido_item, peso_bruto_item, valor_carga, rota, raio) VALUES (1, '$peso_liquido_item', 1, '0', '$lat','$lgn','$lista', '$login', '$filial', '$cod_pedido', '$nr_nf', '$formacao', '$nr_romaneio', '$nr_nf', '$codigo_cliente', '$nome_cliente', '$endereco', '$bairro', '$numero', '$cep', '$cnpj', '$ie_cliente', '$tel_cliente', '$obs_pedido', '$cidade', '$uf', '$valor_nf', '$cd_transp', '$ds_transp', '$cd_motorista', '$ds_motorista', '$tel_motorista', '$perfil', '$peso_bruto', '$peso_liquido', '$data_carrega', '$data_nf', '$cod_vendedor', '$vendedor', '$cod_cancao', '$cod_protheus', '$produto', '$peso_liquido_item', '$peso_bruto_item', '$valor_carga', '$rota', '300')";	
   mysql_query($import) or die(mysql_error());
   

}

$query_seq = "SELECT formacao FROM importa where formacao='$formacao' group by formacao";
$rs_seq = mysql_query($query_seq);


while ($row_seq = mysql_fetch_assoc($rs_seq)){
   $formacoes = $row_seq["formacao"];

   $query_faz = "SELECT id FROM importa where formacao='$formacoes' order by cep, cidade, bairro ASC";
   $rs_faz = mysql_query($query_faz);

   $conta_sequencia=0;

   while ($row_faz = mysql_fetch_assoc($rs_faz)){

      $conta_sequencia++;
      $id_seq = $row_faz['id'];
      $update_sequencia ="UPDATE importa SET sequencia='$conta_sequencia' where id='$id_seq'";
      $rs_vai = mysql_query($update_sequencia);
   }


}

 
//// LOADING 0 A 100% ////////////////////////////////////////////////////
  $pega_loading = intval($_conta + 1) . " Registros inseridos";
  
   echo "<div id='load' style='position:absolute;margin:0px 0px 0px 0px;width:100%;height:40px;background:#2867b2;color:#2867b2;color: #FFFFFF;text-align:center;line-height:40px;'>$pega_loading</div>";
   flush();
   ob_flush();
  
//// LOADING 0 A 100% ////////////////////////////////////////////////////


   }




}




// RESULTADO NUMERO DE CNPJS IGUAIS
$conta_cnpj =  mysql_query("SELECT DISTINCT cnpj from importa");
$qto_cnpj=  mysql_num_rows($conta_cnpj);
//////////////////////////////////


$lista_final = $today;
$lista_final_update = $today . " (ATUALIZADA)";

// VERIFICA SE É IMPORT OU UPLOAD
$verifica_query = "SELECT * FROM importa INNER JOIN rotas ON importa.cnpj = rotas.cnpj and importa.formacao= rotas.formacao";
$rs_verifica = mysql_query($verifica_query);
$verifica_qto=  mysql_num_rows($rs_verifica);



if ($verifica_qto!=0){

   $update_rotas = "UPDATE rotas INNER JOIN importa ON rotas.formacao = importa.formacao and rotas.cnpj = importa.cnpj SET rotas.pedido = importa.pedido, rotas.codigo_pedido = importa.codigo_pedido, rotas.cod_protheus = importa.cod_protheus, rotas.cod_cancao = importa.cod_cancao, rotas.nr_nf = importa.nr_nf, rotas.sequencia= importa.sequencia, rotas.lista='$lista_final_update', rotas.peso=importa.peso, rotas.site=1";
   mysql_query($update_rotas) or die(mysql_error());

   $selecionar_lista =  mysql_query("SELECT lista, id_lista from rotas where lista='$lista_final_update'");
  // Tirando o while
   $dados = mysql_fetch_array($selecionar_lista);

   // Exibição
   $xxx= $dados['lista'];  
   $yyy= $dados['id_lista'];  


   $querylista = mysql_query("UPDATE listas SET nome='$xxx' where id='$yyy'");
   

    
} else {

///////////////////////////

$querylista = "INSERT INTO listas(nome) VALUE('$lista_final')";
$rs_lista = mysql_query($querylista);


$seleciona = mysql_query("SELECT id FROM listas where nome='$lista_final'");	

$dados = mysql_fetch_array($seleciona);
$id_grava= $dados['id'];


//$grava_lista_nova = mysql_query("UPDATE importa SET id_lista='$id_grava' where lista='$lista_final'");

//////////////////////////


   $update_nome_lista = "UPDATE importa set lista='$lista_final', id_lista='$id_grava'";
   mysql_query($update_nome_lista) or die(mysql_error());


   $import_rotas="INSERT into rotas(site, statusrota, status, y, x, lista, login, filial, pedido, codigo_pedido, formacao, nr_romaneio, nr_nf, idcliente, nome, endereco, bairro, numero, cep, cnpj, ie_cliente, tel_cliente, obs_pedido, cidade, uf, valor_nf, cd_transp, ds_transp, cd_motorista, ds_motorista, tel_motorista, perfil, peso_bruto, peso_liquido, data_carregamento, data_nf, cod_rep, representante, cod_cancao, cod_protheus, produto, peso_liquido_item, peso_bruto_item, valor_carga, rota, raio, sequencia, peso, id_lista)  select site, statusrota, status, y, x, lista, login, filial, pedido, codigo_pedido, formacao, nr_romaneio, nr_nf, idcliente, nome, endereco, bairro, numero, cep, cnpj, ie_cliente, tel_cliente, obs_pedido, cidade, uf, valor_nf, cd_transp, ds_transp, cd_motorista, ds_motorista, tel_motorista, perfil, peso_bruto, peso_liquido, data_carregamento, data_nf, cod_rep, representante, cod_cancao, cod_protheus, produto, peso_liquido_item, peso_bruto_item, valor_carga, rota, raio, sequencia, peso, id_lista from importa";	
   mysql_query($import_rotas) or die(mysql_error());



}






//fclose($handle);

?>

</div>
</div>
</div>

<?php
echo "<script>document.getElementById('loading').style.display = 'none'</script>";


if($controle_campo0 == "yes")
{ 

//echo $nome_veiculo;
?> 


<div id="apDiv11">


<table border="0">
<tr style="height: 45px; vertical-align: button">
<td>

<strong><font size="5">


 <?php 

echo  "IMPORTAÇÃO MAL SUCEDIDA!"; 

?>

</font></strong></td>
</tr>

<tr style="height: 25px; vertical-align: top" >
<td>VOLTE E INSIRA UM ARQUIVO VALIDO!</td>
</tr>
<tr style="height:30px;vertical-align: top">
<td><hr style="border: none; width:280px;" ></td>
</tr>
<tr style="height: 35px;vertical-align: button">
<td><strong><font size="4">CHECK-LIST!</font></strong></td>
</tr>
<tr style="height: 25px;vertical-align: top">
<td><hr style="border: none; width:110px;" ></td>
</tr>

</table>



<table>

<tr style="height: 30px;">

<td ><p style="font-size:12px"><strong>ARQUIVO "<?php echo $abreviado; ?>" LIDO!</p></td>
<td><span class="material-icons" style="color:red">
clear
</span></td>
</tr>


<tr style="height: 30px;">

<td><p style="font-size:12px">IMPORTAÇÃO COM PROBLEMA!</p></td>
<td><span class="material-icons" style="color:red">
clear
</span></td>
</tr>


<tr style="height: 30px;">

<td><p style="font-size:12px">NÚMEROS DE REGISTROS INSERIDOS:</p></td>
<td><strong style="color:red">&nbsp;<?php echo $_conta; ?></strong></td>
</tr>


<tr style="height: 30px;">

<td><p style="font-size:12px">NÚMEROS DE REGISTROS ENCONTRADOS NAS BASES ANTIGAS:</p></td>
<td><strong style="color:red">&nbsp;<?php echo $conta_regs_existentes; ?></strong></td>
</tr>

</table>
 


<br><br><br>
<input
    action="action"
    onclick="window.history.go(-1); return false;"
    type="submit"
    value="VOLTAR"
/>

<?php
} else {
	?>
   
<form enctype='multipart/form-data' action='home.php' method='POST' name="form" id="form">

<div id="apDiv11">

<table border="0">
<tr style="height: 45px; vertical-align: button">
<td>

<strong><font size="5">


 <?php 

echo  "IMPORTAÇÃO BEM SUCEDIDA!"; 

?>

</font></strong></td>
</tr>

<tr style="height: 25px; vertical-align: top" >
<td>AVANCE PARA LIBERAR OS PEDIDOS PARA O APP!</td>
</tr>
<tr style="height:30px;vertical-align: top">
<td><hr style="border: none; width:100%;" ></td>
</tr>
<tr style="height: 35px;vertical-align: button">
<td><strong><font size="4">CHECK-LIST!</font></strong></td>
</tr>
<tr style="height: 25px;vertical-align: top">
<td><hr style="border: none; width:110px;" ></td>
</tr>

</table>





<table>

<tr style="height: 30px;">

<td><p style="font-size:12px"><strong>ARQUIVO "<?php echo $abreviado; ?>" LIDO!</p></td>
<td><span class="material-icons" style="color:green">
done
</span></td>
</tr>


<tr style="height: 30px;">

<td><p style="font-size:12px">IMPORTAÇÃO FEITA COM SUCESSO!</p></td>
<td><span class="material-icons" style="color:green">
done
</span></td>
</tr>

<tr style="height: 30px;">

<td><p style="font-size:12px">NÚMEROS DE ENTREGAS:</p></td>
<td><strong style="color:green">&nbsp;<?php echo $qto_cnpj; ?></strong></td>
</tr>
<tr style="height: 30px;">

<td><p style="font-size:12px">NÚMEROS DE PEDIDOS INSERIDOS:</p></td>
<td><strong style="color:green">&nbsp;<?php echo $_conta; ?></strong></td>
</tr>



<tr style="height: 30px;">

<td><p style="font-size:12px">NÚMEROS DE REGISTROS ENCONTRADOS NAS BASE CADD:</p></td>
<td><strong style="color:green">&nbsp;<?php echo $conta_regs_existentes; ?></strong></td>
</tr>

</table>

<br><br><br>

<input
    action="action"
    onclick="window.history.go(-1); return false;"
    type="submit"
    value="VOLTAR"
/>

<input type='submit' name='submit' value='AVANÇAR'/>


</form>
<?php	
}


//Visualizar formulário de transferência
} else {
?>

<form enctype='multipart/form-data' action='step1.php' method='POST' name="form" id="form">
<div id="apDiv11">


<table border="0">
<tr style="height: 25px; vertical-align: button">
<td>
<strong><font size="5">
<?php 
echo  "VAMOS LÁ, "  . $logado . "!"; 

?>

</font></strong></td>
</tr>

<tr style="height: 25px; vertical-align: top" >
<td>VAMOS FAZER A IMPORTAÇÃO DAS LISTAS!</td>
</tr>
<tr style="height:50px;vertical-align: top">
<td><hr style="border: none; width:100%;" ></td>
</tr>


</table>





<table border="0">
<tr style="height: 35px;vertical-align: button;">
<td><strong><font size="4">IMPORTAR/ATUALIZAR LISTA</font></strong></td>

</tr>
<tr style="height: 15px;vertical-align: top;">
<td style="width: 180px;"><hr style="border: none; width:260px;" ></td>
</tr>
<tr hidden >
<td style="height: 2px;font-size: 12px;"><input type="radio" value="inserir" name="escolha" checked />&nbsp;<strong>IMPORTAR LISTA</strong></td>

</tr>

</table>
 <br />
 <label class="file-upload">
		  <span>PROCURAR</span>
		  <input name="filename" id="filename" type="file">

	  </label>
  <br /> <br />
  <table>
  <br /><br />

</table>
<input formaction="home.php" type="submit" value="VOLTAR"/>
 <input type='submit' name='submit' value='AVANÇAR' onclick="return enviardados();" />


  
</div>

</form>
  <?php 
  }
  ?>

<br>


</body>
</html>