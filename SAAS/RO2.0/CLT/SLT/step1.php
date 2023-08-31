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
$abreviado =  substr_replace($str,(strlen($str) > $max ? '...txt' : ''), $max);


$extension = substr("$file_extension", 6); // remove the image/ and the gif extension remains.

/*if (is_uploaded_file($_FILES['filename']['tmp_name'])) {
//echo "Arquivo ". $_FILES['filename']['name'] ." lido com sucesso." . "<br />";
//readfile($_FILES['filename']['tmp_name']);
}
*/

$escolha = $_POST['escolha'];


if($escolha=="adicionar"){
	
$query_where1 = "UPDATE passo SET ok='no' WHERE (id='2' OR id='3' OR id='4' OR id='5')";
$rs_where1 = mysql_query($query_where1);

	
} 

if($escolha=="inserir"){
	
$deleterecords = "DELETE FROM clientes where roteirizado!='sim'"; //Esvaziar a tabela
mysql_query($deleterecords);	


$query_deleta = "UPDATE veiculos SET peso_total=null, volume_total=null, valor_total=null, equipe=null, ocupado='0' where roteirizado!='sim'";
$rs_deleta = mysql_query($query_deleta);


$query_where1 = "UPDATE passo SET ok='no' WHERE (id='2' OR id='3' OR id='4' OR id='5')";
$rs_where1 = mysql_query($query_where1);


} 



$_conta = 0;
$conta_regs_existentes =  0;



?> 

<div id="loading" style="position:absolute; width:100%; height:100%; background-color:#FFFFFF; z-index:99999; top:0;">
<div style="height:100px;background-color:#FFFFFF; width:400px; position: relative; top: 50%; margin-top:-50px; left:50%; margin-left:-200px">
<div id="progress" style="position: relative; left: 28px; top: 28px; width: 340px; height: 40px; background-color: #6f99d6; layer-background-color: #6f99d6; border: 1px none #000000; font-family:Arial, 'Helvetica Neue', Helvetica, sans-serif; font-size:12px;">


<?php



//while (($data = fgetcsv($handle, 1000, ';')) != FALSE) {
	


for ($row =2; $row <= $highestRow; $row++)
{
	$_conta = $_conta + 1;
	$rowData = $sheet->rangeToArray('A' . $row . ':' . $highestColumn . $row, NULL, TRUE, FALSE);




  /*  if (mysqli_query($conn, $sql)) {
		$exceldata[] = $rowData[0];
	} else {
		echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}
  */
// }



$data_0 = str_replace("'", " ", $rowData[0][14]);	//COD CLIENTE

$data_1 = str_replace("'", " ", $rowData[0][4]); 	//NOME CLIENTE
$data_1 = html_entity_decode(preg_replace('/_x([0-9a-fA-F]{4})_/', '&#x$1;', $data_1));
$data_1 = preg_replace( "/\r|\n/", "", $data_1 );

$data_1 = tirarAcentos($data_1);

//$data_1 = str_replace('´', " ", $rowData[0][4]); 	//NOME CLIENTE

$data_2 = str_replace("'", " ", $rowData[0][5]);	//ENDERECO
$data_2 = str_replace("Nº -", ",", $data_2);	//ENDERECO
$data_2 = tirarAcentos($data_2);
//$data_2 = str_replace('´', " ", $rowData[0][5]);	//ENDERECO

//$data_3 = substr_replace("´", " ", $rowData[0][8]);//CIDADE
$data_3 = str_replace("'", " ", $rowData[0][8]);	//CIDADE
$data_3 = tirarAcentos($data_3);

$data_4 = str_replace("'", " ", $rowData[0][6]);	//BAIRRO
$data_4 = tirarAcentos($data_4);

$data_5 = str_replace("'", " ", $rowData[0][7]);	//CEP

$data_6 = str_replace(",", ".", $rowData[0][9]);	//PESO

//$data_7 = str_replace(",", ".", "100");	//VOLUME

$data_8 = str_replace(",", ".", $rowData[0][10]);	//VALOR

$data_9 = str_replace(",", ".", $rowData[0][0]);	//CODIGO DO PEDIDO

$data_10 = str_replace("'", " ", $rowData[0][13]);	//OBS DO PEDIDO

$data_11 = str_replace(",", ".", $rowData[0][3]);	//SETOR

$data_12 = str_replace(",", ".", $rowData[0][1]);	// LOTE
	
$data_13 = str_replace("'", " ", $rowData[0][2]);	// VENDEDOR

$data_14 = str_replace("'", " ", $rowData[0][11]);	// FILIAL

$data_15 = str_replace("'", " ", $rowData[0][12]);	// DESC_PRACA	 	

$data_16 = str_replace("'", " ", $rowData[0][15]);	// ESPECIAL



////////ACERTA PONTUACAO BR/////////////////////////////
$data_0 = utf8_encode($data_0);
$data_1 = utf8_encode($data_1);
$data_2 = utf8_encode($data_2);
$data_3 = utf8_encode($data_3);
$data_4 = utf8_encode($data_4);
$data_5 = utf8_encode($data_5);

$data_9 = utf8_encode($data_9);
$data_10 = utf8_encode($data_10);
$data_11 = utf8_encode($data_11);

$data_12 = utf8_encode($data_12);
$data_13 = utf8_encode($data_13);
$data_14 = utf8_encode($data_14);
$data_15 = utf8_encode($data_15);
$data_16 = utf8_encode($data_16);
////////ACERTA PONTUACAO/////////////////////////////

if($data_11=='60' or $data_11=='61' or $data_11=='62' or $data_11=='63' or $data_11=='64' or $data_11=='65' or $data_11=='66' or $data_11=='67' or $data_11=='92' or $data_11=='94' or $data_11=='96' or $data_11=='108' or $data_11=='112' or $data_11=='133')
{
	$novo_setor = 'GSP';	
}

if($data_11=='68' or $data_11=='70' or $data_11=='71' or $data_11=='72' or $data_11=='73' or $data_11=='74' or $data_11=='75' or $data_11=='76' or $data_11=='77' or $data_11=='78' or $data_11=='79' or $data_11=='80' or $data_11=='81' or $data_11=='83' or $data_11=='88' or $data_11=='89' or $data_11=='90' or $data_11=='91' or $data_11=='98' or $data_11=='99' or $data_11=='100' or $data_11=='101' or $data_11=='102' or $data_11=='103' or $data_11=='106' or $data_11=='107' or $data_11=='110' or $data_11=='111' or $data_11=='113' or $data_11=='117' or $data_11=='119' or $data_11=='121' or $data_11=='123' or $data_11=='125' or $data_11=='128' or $data_11=='129')
{
	$novo_setor = 'I2';	
}

if($data_11=='69' or $data_11=='76' or $data_11=='82' or $data_11=='84' or $data_11=='85' or $data_11=='86' or $data_11=='87' or $data_11=='93' or $data_11=='95' or $data_11=='97' or $data_11=='104' or $data_11=='105' or $data_11=='109' or $data_11=='114' or $data_11=='115' or $data_11=='116' or $data_11=='118' or $data_11=='120' or $data_11=='122' or $data_11=='124' or $data_11=='126' or $data_11=='127' or $data_11=='130' or $data_11=='131' or $data_11=='132' or $data_11=='134' or $data_11=='135')
{

	$novo_setor = 'I1';	
	
}

if($data_11=='0')
{
	$novo_setor = '0';	
}

$premium = '';


if ($novo_setor=='GSP') {
	$premium = 'A';
	
	} 
if ($novo_setor=='I1') {
	
	
	if ($data_10=='VAR_SPI_01') {  // data_10 especial luciano
	
	$premium = 'S';
	
	} else {
		
	$premium = 'I';
	}
	
	
	}

if ($novo_setor=='I2') {
	$premium = 'V';
	
	}
if ($novo_setor=='0') {
	$premium = '0';
	
	}

	if ($data_10=='SM_SP') {
	$premium = 'X';
	
	}
///////////////////////////////////////////////////////////////////////	

///PASSOS MENU

$query_where1 = "UPDATE passo SET ok='yes' WHERE id='1'";
$rs_where1 = mysql_query($query_where1);

$query_where = "UPDATE passo SET ok='no' WHERE (id='2' OR id='3' OR id='4' OR id='5')";
$rs_where = mysql_query($query_where);

///////////////////////////////////////////////////////////////////////


$controle_campo0 = "";


$query_vai = "select * from clientes where codigo_pedido='$data_9'";														
$rs_vai = mysql_query($query_vai);
// Tirando o while
//$dados = mysql_fetch_array($rs_vai);
$total_igual = mysql_num_rows($rs_vai);
//echo $total_igual;

if($total_igual>0){
	
	
	
}else{
	
if ($data_2=="" and $data_3=="" and $data_4=="" and $data_5==""){

$controle_campo0= "yes";

$import="INSERT into clientes(codigo_cliente, nome, endereco, cidade, bairro, estado, cep, peso, valor, codigo_pedido, obs_pedido)values($data_0,'ERRO','ERRO','ERRO','ERRO','ERRO','ERRO','ERRO','ERRO','ERRO','ERRO')";
} 

if ($data_0==""){

$controle_campo0= "yes";

$import="INSERT into clientes(codigo_cliente, nome, endereco, cidade, bairro, estado, cep, peso, valor, codigo_pedido, obs_pedido)values('ERRO','ERRO','ERRO','ERRO','ERRO','ERRO','ERRO','ERRO','ERRO','ERRO','ERRO')";
} 


if ($data_6==0 and $data_8==0){
//VALORES ZERADOS NO PESO VOLUME VALOR//////
$import="INSERT into clientes(codigo_cliente, nome, endereco, cidade, bairro, cep, peso, valor, codigo_pedido, obs_pedido, setor, premium, lote, vendedor, filial, desc_praca, especial, praca)values('$data_0','$data_1','$data_2','$data_3','$data_4','$data_5','0.01','0.00','$data_9','$data_10','$novo_setor','$premium','$data_12','$data_13','$data_14','$data_15','$data_16','$data_11')";

} else {
$controle_campo0= "no";
	
//TUDO OK PARA IMPORTAR////////
	
$import="INSERT into clientes(codigo_cliente, nome, endereco, cidade, bairro, cep, peso, valor, codigo_pedido, obs_pedido, setor, premium, lote, vendedor, filial, desc_praca, especial, praca)values('$data_0','$data_1','$data_2','$data_3','$data_4','$data_5','$data_6','$data_8','$data_9','$data_10','$novo_setor','$premium','$data_12','$data_13','$data_14','$data_15','$data_16','$data_11')";

}



mysql_query($import) or die(mysql_error());



}



$query = "select * from db_geral where codigo_cliente='$data_0'";														
$rs = mysql_query($query);
// Tirando o while
$dados = mysql_fetch_array($rs);


//acha arquivo com id do cliente repetido
// while($row = mysql_fetch_array($rs)){
$id_cliente = $dados["codigo_cliente"];
//	$end_cliente = $row["endereco"];
//	$codigo = $row["codigo"];

		$nome = $dados["nome"];
		$end_cad = $dados["endereco_cad"];
		$lat_cad = $dados["latitude_cad"];
		$lgn_cad = $dados["longitude_cad"];
		$confianca_cad = $dados["confianca_cad"];
		$codigo = $dados["codigo"];
///COLOCAR SO ID-CLIENTE / SAYERLACK NAO CRUZA
//if($id_cliente == $data_0 and $end_cliente == $data_2){
if($id_cliente == $data_0){	
		$conta_regs_existentes++;
		
		//$geomanual_cad = $row["geo_manual"];	
		//$veiculo_cad = $row["veiculo"];
		//$premium = $row["premium"];	
		//echo $premium;
		
$query2 = "UPDATE clientes SET latitude_cad='$lat_cad', longitude_cad='$lgn_cad', confianca_cad='$confianca_cad', codigo_db_geral='$codigo' WHERE codigo_cliente = '$id_cliente'";
  $rs2= mysql_query($query2);
} 

//}


$query_rtrim = "UPDATE clientes SET nome = RTRIM($nome), endereco = RTRIM($endereco)"; 
$rs_rtrim= mysql_query($query_rtrim);

	

//// LOADING 0 A 100% ////////////////////////////////////////////////////
$pega_loading = intval($_conta + 1) . " Registros inseridos";

echo "<div style='position:absolute;margin:0px 0px 0px 0px;width:100%;height:40px;background:#2867b2;color:#2867b2;color: #FFFFFF;text-align:center;line-height:40px;'>$pega_loading</div>";
flush();
ob_flush();

//// LOADING 0 A 100% ////////////////////////////////////////////////////

//echo $_conta. "\n";
}




//fclose($handle);
?>
</div>
</div>
</div>

<?php
echo "<script>document.getElementById('loading').style.display = 'none'</script>";
$sql = mysql_query("SELECT codigo FROM clientes");

$total = mysql_num_rows($sql);


if($total==0 OR $controle_campo0 == "yes")
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
<form enctype='multipart/form-data' action='step1_1.php' method='POST' name="form" id="form">

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

<td><p style="font-size:12px">NÚMEROS DE REGISTROS INSERIDOS:</p></td>
<td><strong style="color:green">&nbsp;<?php echo $_conta; ?></strong></td>
</tr>


<tr style="height: 30px;">

<td><p style="font-size:12px">NÚMEROS DE REGISTROS ENCONTRADOS NAS BASES ANTIGAS:</p></td>
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
<tr style="height: 45px; vertical-align: button">
<td>

<strong><font size="5">


 <?php 

echo  "VAMOS LÁ, "  . $logado . "!"; 

?>

</font></strong></td>
</tr>

<tr style="height: 25px; vertical-align: top" >
<td>VAMOS FAZER A IMPORTAÇÃO DO ARQUIVO DE TRABALHO!</td>
</tr>
<tr style="height:30px;vertical-align: top">
<td><hr style="border: none; width:100%;" ></td>
</tr>
<tr style="height: 35px;vertical-align: button">
<td><strong><font size="4">IMPORTAR!</font></strong></td>
</tr>
<tr style="height: 25px;vertical-align: top">
<td><hr style="border: none; width:105px;" ></td>
</tr>

</table>





<table>

<tr>
<td><input type="radio" value="inserir" name="escolha" checked/></td>
<td><p style="font-size:12px">&nbsp;&nbsp;INSERIR NOVA LISTA DE CLIENTES!</p></td>
</tr>


<tr>
<td ><input type="radio" value="adicionar" name="escolha"/></td>
<td ><p style="font-size:12px">&nbsp;&nbsp;ADICIONAR A LISTA EXISTENTE.</p></td>
</tr>

</table>
 <br /> <br />
 <label class="file-upload">
		  <span>PROCURAR</span>
		  <input name="filename" id="filename" type="file">

	  </label>
  <br /> <br />
  <table>


</table>
 <input type='submit' name='submit' value='AVANÇAR' onclick="return enviardados();" />


  
</div>

</form>
  <?php 
  }
  ?>

<br>


</body>
</html>