<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//BR" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>::. ROTAS ONLINE .:: CADD</title>
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

include ('session.php'); 
?>
</head>
<body>


<?php
include ('essence/conecta.php');
include ('base3.php');
require 'PHPExcel/IOFactory.php';


function tirarAcentos($string){
    return preg_replace(array("/(á|à|ã|â|ä)/","/(Á|À|Ã|Â|Ä)/","/(é|è|ê|ë)/","/(É|È|Ê|Ë)/","/(í|ì|î|ï)/","/(Í|Ì|Î|Ï)/","/(ó|ò|õ|ô|ö)/","/(Ó|Ò|Õ|Ô|Ö)/","/(ú|ù|û|ü)/","/(Ú|Ù|Û|Ü)/","/(ñ)/","/(Ñ)/","/(ç)/","/(Ç)/"),explode(" ","a A e E i I o O u U n N c C"),$string);
}


	
ini_set('max_execution_time',12000);

$escolha = $_GET['escolha'];

$_conta = 0;
$conta_regs_existentes =  0;
$conta_jaexiste=0;
$conta_jaexiste_cliente = 0;

$inputfiletype = "";
$objReader = "";
$objPHPExcel = "";

$sheet  = "";
$highestRow  = "";
$highestColumn = "";
$highestColumnIndex  = "";

//Transferir o arquivo
//$path = "\\\\191.168.0.1\\h\\NextAgeERP\\Roteirizador2\\";
//$path = "\\\\191.168.0.1\\NextAgeERP\\Roteirizador2\\";


$path = "..\\..\\NextAgeERP\\ECB\\";
$diretorio = dir($path);
//echo $path;

if($path !== false AND is_dir($path))
{
  
    // Return canonicalized absolute pathname
  
} else {
  echo "O diretório " . $path ." não existe! Entre em contato com o suporte CADD no whatapp.";

}


//echo $path;
$arquivos_tipo = glob("$path{*.xls}", GLOB_BRACE);


$qtd = count($arquivos_tipo);
//echo $qtd;
//echo "Lista de Arquivos do diretório '<strong>".$path."</strong>':<br />";

$conta_arquivos = 0;
$controle_campo0 = "";


if($escolha==='ESVAZIAR'){
	
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

    $controle_campo0 == "yes";
  
  
  }

  ?>
<SCRIPT LANGUAGE="JavaScript" TYPE="text/javascript">
alert("Veículos e pedidos integrados esvaziados com sucesso!");
window.location.href = "step1.php";
</script>

  <?php
  

}

//$guarda_nome_arquivos =[];
$guarda_arquivos = "";
if ($escolha==='UPLOAD') {

  ?> 

  <div id="loading" style="position:absolute; width:100%; height:100%; background-color:#FFFFFF; z-index:99999; top:0;">
  <div style="height:100px;background-color:#FFFFFF; width:400px; position: relative; top: 50%; margin-top:-50px; left:50%; margin-left:-200px">
  <div id="progress" style="position: relative; left: 28px; top: 28px; width: 340px; height: 40px; background-color: #6f99d6; layer-background-color: #6f99d6; border: 1px none #000000; font-family:Arial, 'Helvetica Neue', Helvetica, sans-serif; font-size:12px;">
  
  
  <?php

while($arquivo = $diretorio -> read()){
  //echo "<a href='".$path.$arquivo."'>".$path.$arquivo."</a><br />";
  //echo filetype($arquivo);

  // SOMENTE ARQUIVOS EXCELL



  if(filetype($arquivo)!='dir' AND $arquivo!='backup'){
    //echo realpath($path.$arquivo). "<br>";
   
    $inputfilename = realpath($path.$arquivo);

    //array_push($guarda_nome_arquivos, $arquivo);
    $guarda_arquivos .= $arquivo . ";";

    
   // echo $inputfilename . "<br>";
    $str = ($arquivo);

    $controle_campo0= "no";

  // CRIA ARQUIVO DE BACKUP NA PASTA BACKUP
    $destino = $path. 'backup/' . $arquivo;
    copy($path.$arquivo, $destino);
    
/// TESTA
try {
  $inputfiletype = PHPExcel_IOFactory::identify($inputfilename);
  $objReader = PHPExcel_IOFactory::createReader($inputfiletype);
  $objPHPExcel = $objReader->load($inputfilename);  
}
//EXECUTA ERRO
catch(Exception $e) {
  echo "Não foi possível ler o arquivo!";
} 

$sheet = $objPHPExcel->getSheet(0);
$highestRow = $sheet->getHighestRow();
$highestColumn = $sheet->getHighestColumn();
$highestColumnIndex = \PHPExcel_Cell::columnIndexFromString($highestColumn);


// ESVAZIAR OU INSERIR FORM////////////
//if($escolha=="UPLOAD"){

  
$deleterecords1 = "DELETE FROM classificacao"; //Esvaziar a tabela classificacao
mysql_query($deleterecords1);
$deleterecords2 = "DELETE FROM setor"; //Esvaziar a tabela classificacao
mysql_query($deleterecords2);


$query_where1 = "UPDATE passo SET ok='no' WHERE (id='2' OR id='3' OR id='4' OR id='5')";
$rs_where1 = mysql_query($query_where1);

	
//} 


//$deleterecords = "TRUNCATE table clientes"; //Esvaziar a tabela
//mysql_query($deleterecords);



/////////////////////////////////////////

/// TITULOS ////////////////
  $array_titulo =array();

  for ($row_x =1; $row_x <= 1; $row_x++)
  {
   $rowData1 = $sheet->rangeToArray('A' . $row_x . ':' . $highestColumn . $row_x, NULL, TRUE, FALSE);
      for ($col =0; $col < $highestColumnIndex; $col++){
        array_push($array_titulo, $rowData1[0][$col]);
      } 
  }
  $codigo_cliente_t = array_search("Id Entidade", $array_titulo); // $key = 9;
  $nome_cliente_t = array_search("Ds Entidade", $array_titulo); // $key = 10;
  $endereco_cliente_t = array_search("Endereco", $array_titulo); // $key = 50;
  $cidade_cliente_t = array_search("Cidade", $array_titulo); // $key = 12;
  $uf_cliente_t = array_search("Uf", $array_titulo); // $key = 13;
  $cep_cliente_t = array_search("Id Cep", $array_titulo); // $key = 20;
  $peso_cliente_t = array_search("PESO", $array_titulo); // $key = 39;
  $volume_cliente_t = array_search("CUBAGEM", $array_titulo); // $key = 41;
  $valor_cliente_t = array_search("TOTALPEDIDO", $array_titulo); // $key = 40;
  $codigo_pedido_t = array_search("Id Pedido", $array_titulo); // $key = 1;
  $obs_pedido_t = array_search("Hora Funcionamento", $array_titulo); // $key = 43;
  $bairro_pedido_t = array_search("Bairros", $array_titulo); // $key = 5;
  $classificacao_pedido_t = array_search("Incluido Em", $array_titulo); // $key = 30;
  $motivo_reentrega = array_search("Coluna X", $array_titulo); // $key = 36;
  $setor = array_search("Ds Setor Entrega", $array_titulo); // $key = 9;
  $agenda_icon = array_search("Destacar Cor Na Formacao De Cargas", $array_titulo); // $key = 4;
  
  $volume_l = array_search("VOLUME", $array_titulo); // $key = 4;
//////////////////////////////

for ($row =2; $row <= $highestRow; $row++){

$rowData = $sheet->rangeToArray('A' . $row . ':' . $highestColumn . $row, NULL, TRUE, FALSE);

$data_reentrega = $rowData[0][$motivo_reentrega];
$data_setor = $rowData[0][$setor];

//echo $data_reentrega;

$data_0 =$rowData[0][$codigo_cliente_t];
$data_0 = str_replace("'", " ", $data_0);	//COD CLIENTE
$data_1 = str_replace("'", " ", $rowData[0][$nome_cliente_t]); 	//NOME CLIENTE
$data_1 = preg_replace( "/\r|\n/", "", $data_1);
$data_1=str_replace("/", "-", $data_1);	//
$data_1=str_replace('\\', '/',  $data_1); 
$data_1 = tirarAcentos($data_1);
$data_2 = str_replace("'", " ", $rowData[0][$endereco_cliente_t]);	//ENDERECO
$data_2 = preg_replace( "/\r|\n/", "", $data_2);
$data_2=str_replace('"', " ", $data_2);	//
$data_2=str_replace("/", "-", $data_2);	//
$data_2=str_replace('\\', '/',  $data_2);
$data_2 = tirarAcentos($data_2);
$data_3 = str_replace("'", " ", $rowData[0][$cidade_cliente_t]);	//CIDADE
$data_3 = preg_replace( "/\r|\n/", "", $data_3);
$data_3=str_replace('"', " ", $data_3);	//
$data_3=str_replace("/", "-", $data_3);	//
$data_3=str_replace('\\', '/',  $data_3); 
$data_3 = tirarAcentos($data_3);
$data_4 = str_replace("'", " ", $rowData[0][$uf_cliente_t]);	//UF
$data_4 = preg_replace( "/\r|\n/", "", $data_4);
$data_4 = tirarAcentos($data_4);
$data_5 = str_replace("'", " ", $rowData[0][$cep_cliente_t]);	//CEP
$data_5 = preg_replace( "/\r|\n/", "", $data_5);
$data_6 = str_replace(",", ".", $rowData[0][$peso_cliente_t]);	//PESO
$volume = str_replace(",", ".", $rowData[0][$volume_cliente_t]);	//VOLUME
$data_7 = str_replace(",", ".", $rowData[0][$valor_cliente_t]);	//VALOR
$data_7 = ltrim($data_7, 'R$ ');
$data_8 = str_replace(",", ".", $rowData[0][$codigo_pedido_t]);	//CODIGO DO PEDIDO
$data_8 = preg_replace( "/\r|\n/", "", $data_8);
$data_9 = str_replace("'", " ", $rowData[0][$obs_pedido_t]);	//OBS DO PEDIDO
$data_9 = preg_replace( "/\r|\n/", "", $data_9);
$data_9=str_replace('"', " ", $data_9);	//
$data_9=str_replace("/", "-", $data_9);	//
$data_9=str_replace('\\', '/',  $data_9); 
$data_9 = tirarAcentos($data_9);
$data_12 = str_replace(",", ".", $rowData[0][$bairro_pedido_t]);	//BAIRRO
$data_12 = preg_replace( "/\r|\n/", "", $data_12);
$data_12=str_replace("'", " ", $data_12);	//
$data_12=str_replace('"', " ", $data_12);	//
$data_12=str_replace("/", "-", $data_12);	//
$data_12=str_replace('\\', '/',  $data_12); 
$data_12 = tirarAcentos($data_12);
$data_13 = str_replace(",", ".", $rowData[0][$classificacao_pedido_t]);	//CLASSIFICAO
$data_13 = str_replace(' ', '', $data_13);
$data_13 = preg_replace( "/\r|\n/", "", $data_13);
$data_13 = tirarAcentos($data_13);

$data_volume_l = str_replace(",", ".", $rowData[0][$volume_l]);	//CLASSIFICAO

$dt_emissao = str_replace("'", " ", $rowData[0][31]);	// data de emissao
//echo $data_14;

if($dt_emissao==''){
  $data_14="";
} else {

  $dt_emissao = date("d-m-Y", ($dt_emissao-25569)*86400);
  $data_14 = str_replace("-", "/", $dt_emissao);	//data de emissao
 // echo $dt_emissao;

}

$data_agenda = str_replace(",", ".", $rowData[0][$agenda_icon]);	//AGENDA ICON

if ($data_14==''){$data_14= 'SEM DATA';}

if ($data_9!=''){
  $premium = 'FFA500';
} else {
  $premium = '39FF14';}

if($data_agenda=='' OR $data_agenda==null){

} else {
  $premium = 'FF00FF';
}

////////ACERTA PONTUACAO BR/////////////////////////////
$data_0 = utf8_encode($data_0);
$data_1 = utf8_encode($data_1);
$data_2 = utf8_encode($data_2);
$data_3 = utf8_encode($data_3);
$data_4 = utf8_encode($data_4);
$data_5 = utf8_encode($data_5);
$data_9 = utf8_encode($data_9);
$data_12 = utf8_encode($data_12);
$data_13 = utf8_encode($data_13);


// VERIFICA PEDIDO NA BASE CLIENTES
$selecionar_pedidos_cli = "SELECT codigo_pedido from clientes where codigo_pedido='$data_8'";
$rs_seleciona_cli = mysql_query($selecionar_pedidos_cli);
$total_pedidos_cli = mysql_num_rows($rs_seleciona_cli);

// VERIFICA PEDIDO NA BASE PEDIDOS_INPUT
$selecionar_pedidos = "SELECT pedido from pedidos_input where pedido='$data_8'";
$rs_seleciona = mysql_query($selecionar_pedidos);
$total_pedidos = mysql_num_rows($rs_seleciona);

// JA TEM NO PEDIDO INPUT
if($total_pedidos>0){
	$conta_jaexiste++;

// JA TEM NO CLIENTES
  if($total_pedidos_cli>0){

    $conta_jaexiste_cliente++;

  }  else {

// NAO TEM NO CLIENTES
      // SE É UMA REENTREGA
      if($data_reentrega=='Reentrega'){
        $import="INSERT into clientes(codigo_cliente, nome, endereco, cidade, estado, cep, peso, volume, valor, codigo_pedido, obs_pedido, premium, classificacao, bairro, data_pedido, setor, volume_l)values('$data_0','$data_1','$data_2','$data_3','$data_4','$data_5','$data_6', '$volume', '$data_7', '$data_8', '$data_9', '000000', '$data_13', '$data_12', '$data_13', '$data_setor', '$data_volume_l')";
        mysql_query($import) or die(mysql_error());
        $_conta++;
      } 
      /////////////////////

  }

} else {

//NAO TEM NO PEDIDO INPUT

// JA TEM NO CLIENTES

if($total_pedidos_cli>0){
  $conta_jaexiste_cliente++;
} else {

  // NAO TEM NO CLIENTES
$controle_campo0= "no";
$_conta++;

//TUDO OK PARA IMPORTAR////////
$import="INSERT into clientes(codigo_cliente, nome, endereco, cidade, estado, cep, peso, volume, valor, codigo_pedido, obs_pedido, premium, classificacao, bairro, data_pedido, setor, volume_l)values('$data_0','$data_1','$data_2','$data_3','$data_4','$data_5','$data_6', '$volume', '$data_7', '$data_8', '$data_9', '$premium', '$data_13', '$data_12', '$data_13', '$data_setor', '$data_volume_l')";
mysql_query($import) or die(mysql_error());


}

}


// VERIFICA DB_GERAL EXISTE?

$query = "select * from db_geral where codigo_cliente='$data_0'";														
$rs = mysql_query($query);
// Tirando o while
$dados = mysql_fetch_array($rs);
    $id_cliente = $dados["codigo_cliente"];
		$nome = $dados["nome"];
		$end_cad = $dados["endereco_cad"];
		$lat_cad = $dados["latitude_cad"];
		$lgn_cad = $dados["longitude_cad"];
		$confianca_cad = $dados["confianca_cad"];
		$codigo = $dados["codigo"];

if($id_cliente == $data_0){	
		$conta_regs_existentes++;
		
$query2 = "UPDATE clientes SET latitude_cad='$lat_cad', longitude_cad='$lgn_cad', confianca_cad='$confianca_cad', codigo_db_geral='$codigo' WHERE codigo_cliente = '$data_0'";
  $rs2= mysql_query($query2);
} 

////////////////////////////

$query_rtrim = "UPDATE clientes SET nome = RTRIM($nome), endereco = RTRIM($endereco)"; 
$rs_rtrim= mysql_query($query_rtrim);


//// LOADING 0 A 100% ////////////////////////////////////////////////////
$pega_loading = "Lendo arquivo " . ($conta_arquivos+1) . " - " . intval($_conta) . " Registros inseridos";

echo "<div style='position:absolute;margin:0px 0px 0px 0px;width:100%;height:40px;background:#2867b2;color:#2867b2;color: #FFFFFF;text-align:center;line-height:40px;'>$pega_loading</div>";
flush();
ob_flush();

//// LOADING 0 A 100% ////////////////////////////////////////////////////
//echo $_conta. "\n";
}
//DATA INSERCAO ////////////////
$query_classifica = "select classificacao from clientes group by classificacao";														
$rs_classifica = mysql_query($query_classifica);

while ($row_classifica = mysql_fetch_array($rs_classifica)) {
   $cla =  $row_classifica['classificacao'];


//echo $row_classifica['classificacao'];
$query_cla = "INSERT into classificacao(classificacao) values ('$cla')";
$query_cla= mysql_query($query_cla);

}
//////////////////////
// SETOR /////////////
$query_setor = "select setor from clientes group by setor";														
$rs_setor = mysql_query($query_setor);

while ($row_setor = mysql_fetch_array($rs_setor)) {
$ve =  $row_setor['setor'];

$query_ve = "INSERT into setor(setor) values ('$ve')";
$query_ve= mysql_query($query_ve);

}

////////////////////

$conta_arquivos++;
//apaga arquivo da pasta
//unlink($path.$arquivo);

//echo $conta_arquivos;
    
//}


}

}


$diretorio -> close();






//$file_extension =$_FILES['filename']['tmp_name'];
//$texto = substr($_FILES['filename']['name'],11);
//$max = 30;

//$abreviado =  substr_replace($str,(strlen($str) > $max ? '...txt' : ''), $max);
//$extension = substr("$file_extension", 6); // 
/*
if (is_uploaded_file($_FILES['filename']['tmp_name'])) {
echo "Arquivo ". $_FILES['filename']['name'] ." lido com sucesso." . "<br />";
//readfile($_FILES['filename']['tmp_name']);
}
*/


//fclose($handle);
?>


</div>
</div>
</div>

<?php
echo "<script>document.getElementById('loading').style.display = 'none'</script>";
$sql = mysql_query("SELECT codigo FROM clientes");
$total = mysql_num_rows($sql);

//echo $controle_campo0;

if($controle_campo0 == "yes")
{ 
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
<td><p style="font-size:12px"><strong>ARQUIVOS LIDOS!</p></td>
<td><strong style="color:green">&nbsp;<?php echo $conta_arquivos; ?></strong></td>
</tr>
<tr style="height: 30px;">
<td><p style="font-size:12px">IMPORTAÇÃO COM PROBLEMA!</p></td>
<td><span class="material-icons" style="color:red">
clear
</span></td>
</tr>
<tr style="height: 30px;">
<td><p style="font-size:12px">PEDIDOS INSERIDOS:</p></td>
<td><strong style="color:red">&nbsp;<?php echo $_conta; ?></strong></td>
</tr>
<tr style="height: 30px;">
<td><p style="font-size:12px">PEDIDOS INTEGRADOS ANTERIORMENTE:</p></td>
<td><strong style="color:red">&nbsp;<?php echo $conta_jaexiste; ?></strong></td>
</tr>
<tr style="height: 30px;">
<td><p style="font-size:12px">GEOLOCALIZAÇÕES DE CLIENTES ENCONTRADAS:</p></td>
<td><strong style="color:red">&nbsp;<?php echo $conta_regs_existentes; ?></strong></td>
</tr>
</table>
<br>
<input action="action" onclick="window.history.go(-1); return false;" type="submit" value="VOLTAR"/>
<?php
} else {
?>
<form enctype='multipart/form-data' action='step1_1.php' method='GET' name="form" id="form">
<div id="apDiv11">
<table border="0">
<tr style="height: 45px; vertical-align: button">
<td>
<strong><font size="5">
<?php 
echo  "IMPORTAÇÃO BEM SUCEDIDA!"; 
// deletar arquivo apos importação
//unlink($filename);


//print_r($guarda_nome_arquivos);

//unlink($path.$arquivo);

?>
</font></strong></td>
</tr>
<tr style="height: 25px; vertical-align: top" >
<td>AVANCE PARA AJUSTAR AS GEOLOCALIZAÇÕES!</td>
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
<td><p style="font-size:12px"><strong>ARQUIVOS LIDOS!</p></td>
<td><strong style="color:green">&nbsp;<?php echo $conta_arquivos . $abreviado; ?></strong></td>
</tr>
<tr style="height: 30px;">
<td><p style="font-size:12px">PEDIDOS INSERIDOS:</p></td>
<td><strong style="color:green">&nbsp;<?php echo $_conta; ?></strong></td>
</tr>
<tr style="height: 30px;">
<td><p style="font-size:12px">PEDIDOS ENCONTRADOS NA BASE DE PEDIDOS:</p></td>
<td><strong style="color:green">&nbsp;<?php echo $conta_jaexiste_cliente; ?></strong></td>
</tr>
<tr style="height: 30px;">
<td><p style="font-size:12px">PEDIDOS INTEGRADOS ANTERIORMENTE:</p></td>
<td><strong style="color:green">&nbsp;<?php echo $conta_jaexiste; ?></strong></td>
</tr>
<tr style="height: 30px;">
<td><p style="font-size:12px">GEOLOCALIZAÇÕES DE CLIENTES ENCONTRADAS:</p></td>
<td><strong style="color:green">&nbsp;<?php echo $conta_regs_existentes; ?></strong></td>
</tr>
</table>
<input type="text" value="<?php echo $guarda_arquivos ?>" name="arquivos" id="arquivos" hidden>
<br>
<input action="action" onclick="window.history.go(-1); return false;" type="submit" value="VOLTAR"/>
<input type='submit' name='submit' value='AVANÇAR'/>
</form>
<?php	
}
//Visualizar formulário de transferência
} else {
?>
<div id="apDiv11">
<table border="0">
<tr style="height: 45px; vertical-align: button">
<td>
<strong><font size="5">
<?php 
echo  "VAMOS LÁ, "  . $logado . "!"; 
?>
</font></strong></td>
</tr>
<tr style="height: 25px; vertical-align: top" >
<td>VAMOS FAZER A IMPORTAÇÃO DOS ARQUIVOS DE TRABALHO!</td>
</tr>
<tr style="height:30px;vertical-align: top">
<td><hr style="border: none; width:100%;" ></td>
</tr>
</table>
<table border="0">
<tr style="height: 35px;vertical-align: button">
<td><br><strong><font size="4">UPLOAD DE PEDIDOS</font></strong></td>
</tr>
<tr style="height: 25px;vertical-align: top">
<td><hr style="border: none; width:180px;" ></td>
</tr>
<form action='step1.php' method='GET'>
<tr style="height: 25px;vertical-align: top">
<td>
<?php
if($qtd==0){
?>
<font size='1' style="color:#FF0000"><strong>  * Não existem arquivos para importar!</strong></font>
<?php
} else {
?>
<font size='1' style="color:#FF0000"><strong>  * <?php echo $qtd ?> arquivos para importar!</strong></font>
<?php
}
?>
</td>
</tr>
<tr>
<td>
  <?php
if($qtd==0){
?>

<?php
} else {
?>
<input type='submit' name="escolha" value='UPLOAD'/>
<?php
}
?>
</td>
</tr>
</form>
<form action='step1.php' method='GET'>
<tr style="height: 35px;vertical-align: button">
<td><br><strong><font size="4">ESVAZIAR VEÍCULOS/PEDIDOS INTEGRADOS</font></strong></td>
</tr>
<tr style="height: 25px;vertical-align: top">
<td><hr style="border: none; width:380px;" ></td>
</tr>
<tr>
<td>
<input type='submit' name="escolha" value='ESVAZIAR'/>
</td>
</tr>
</form>
</table>

</div>


  <?php 
  }
  ?>

<br>
</body>
</html>