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
    return preg_replace(array("/(á|à|ã|â|ä)/","/(Á|À|Ã|Â|Ä)/","/(é|è|ê|ë)/","/(É|È|Ê|Ë)/","/(í|ì|î|ï)/","/(Í|Ì|Î|Ï)/","/(ó|ò|õ|ô|ö)/","/(Ó|Ò|Õ|Ô|Ö)/","/(ú|ù|û|ü)/","/(Ú|Ù|Û|Ü)/","/(ñ)/","/(Ñ)/","/(ç|Ç)/" ),explode(" ","a A e E i I o O u U n N c"),$string);
}

	
	
ini_set('max_execution_time',12000);


//Transferir o arquivo


if (isset($_POST['submit'])) {
$escolha = $_POST['escolha'];


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

if($escolha=="adicionar"){
	
$query_where1 = "UPDATE passo SET ok='no' WHERE (id='2' OR id='3' OR id='4' OR id='5')";
$rs_where1 = mysql_query($query_where1);

	
} 

if($escolha=="inserir"){
	
$deleterecords = "TRUNCATE TABLE clientes"; //Esvaziar a tabela
mysql_query($deleterecords);	


$query_deleta = "UPDATE veiculos SET peso_total=0, volume_total=0, valor_total=0, equipe=null, ocupado='0', roteirizado='', prioridade=Null, local_inicio='', local_final='' ";
$rs_deleta = mysql_query($query_deleta);


$query_where1 = "UPDATE passo SET ok='no' WHERE (id='2' OR id='3' OR id='4' OR id='5')";
$rs_where1 = mysql_query($query_where1);


} 

//Importar o arquivo transferido para o banco de dados
$handle = fopen($_FILES['filename']['tmp_name'], "r") or die("O SISTEMA NÃO CONSEGUIU ABRIR O ARQUIVO $handle");


$_conta = 0;
$conta_regs_existentes =  0;
$arquivo = $handle;

//$arquivo = fopen ('arq.txt', 'r');
  //  $result = array();
  //  while(!feof($arquivo)){
   //     $result = explode("|",fgets($arquivo));
  //  }
    //fclose($arquivo);
//	print_r($result);

?> 

<div id="loading" style="position:absolute; width:100%; height:100%;background-color:#FFFFFF; z-index:99999; top:0;">
<div style="height:100px; background-color:#FFFFFF;width:400px; position: relative; top: 50%; margin-top:-50px; left:50%; margin-left:-200px">
  <div id="progress" style="position: relative; left: 28px; top: 28px; width: 340px; height: 40px; background-color: #6f99d6; layer-background-color: #6f99d6; border: 1px none #000000; font-family:Arial, 'Helvetica Neue', Helvetica, sans-serif; font-size:12px;">


<?php
$data_0 = array();
$data_9 = array();
$data_6 = array();
$data_7 = array();
$data_8 = array();
$data_5 = array();
$_conta = 0;



/// INSERIR /////////////////////////////////////////////

if($escolha=="inserir"){
	
	
while(!feof($arquivo)) {
	
    $linha = fgets($arquivo);
			
	//codigo cliente
	$data_0[$_conta] = substr($linha,1,8);
	//codigo pedido
	$data_9[$_conta] = substr($linha,9,20);
	//tira espaco vaziu do final
	$data_9[$_conta] =trim($data_9[$_conta]);		
	//volume
	$data_6[$_conta] = substr($linha,30,10);
	//peso
	$data_7[$_conta] = substr($linha,40,10);
	$peso_conta = $data_7[$_conta];	
	$data_0[$_conta] = rtrim($data_0[$_conta]);
	$data_0[$_conta] =utf8_encode($data_0[$_conta]);
	$data_0[$_conta] =intval($data_0[$_conta]);
	
	
$query1 = "SELECT premium FROM db_geral WHERE codigo_cliente='$data_0[$_conta]'";
$query1 = mysql_query($query1);
// Tirando o while
$dados = mysql_fetch_array($query1);


// Exibição
$confere_rede =  $dados['premium'];

//SE FOR REDE
if($confere_rede=='R'){
	$premium_itabom = 'R';
} else {
//SE NAO	VERIFICA TAMANHO DA CARGA DO CLIENTE
		if ($peso_conta>=2000){
		$premium_itabom = 'A';		
		} 		
		if ($peso_conta>=1000 AND $peso_conta<2000){
		$premium_itabom = 'V';			
		}
		if ($peso_conta<1000 AND $peso_conta>=501){
		$premium_itabom = 'S';			
		}
		if ($peso_conta<501){
		$premium_itabom = 'I';			
		}		
}			

$classif_x="S/CLASSIFICACAO";

$import="INSERT into clientes(codigo_cliente, codigo_pedido, volume, peso, valor, premium, classificacao)values('$data_0[$_conta]','$data_9[$_conta]','$data_6[$_conta]','$data_7[$_conta]', 0, '$premium_itabom', '$classif_x')";
			
if ($linha==null) 
break;



mysql_query($import);


/// VERIFICA DB_GERAL ////////////////////

$rs = mysql_query("select codigo_cliente,endereco_cad,latitude_cad,longitude_cad,premium,nome,endereco,cidade,estado,cep,setor,bairro,classificacao from db_geral where codigo_cliente=$data_0[$_conta]");														
//$rs = mysql_query($query);
//acha arquivo com id do cliente repetido
while($row = mysql_fetch_array($rs)){
			$id_cliente = $row["codigo_cliente"];

//	if($id_cliente == $data_0[$_conta]){	
			$conta_regs_existentes = $conta_regs_existentes + 1;			
			$end_cad = $row["endereco_cad"];
			$lat_cad = $row["latitude_cad"];
			$lgn_cad = $row["longitude_cad"];
			$confianca_cad = $row["confianca_cad"];
			$premium = $row["premium"];				
			$nome_geral= $row["nome"];
			$endereco_geral= $row["endereco"];
			$cidade_geral = $row["cidade"];
			$uf_geral = $row["estado"];
			$cep_geral = $row["cep"];		
			$setor = $row["setor"];				
			$bairro = $row["bairro"];

			$classif= $row["classificacao"];
			if ($classif==""){

				$classif="S/CLASSIFICACAO";
			}

			if($lat_cad==NULL OR $lgn_cad==NULL) 
			{
			  $query2 = "UPDATE clientes SET nome='$nome_geral', endereco='$endereco_geral', cidade='$cidade_geral', bairro='$bairro', estado='$uf_geral', cep='$cep_geral', confianca_cad='0', setor='$setor', classificacao='$classif' WHERE codigo_cliente = '$id_cliente'";

	
			} else {
			  $query2 = "UPDATE clientes SET nome='$nome_geral', endereco='$endereco_geral', cidade='$cidade_geral', bairro='$bairro', estado='$uf_geral', cep='$cep_geral', endereco_cad='$end_cad', latitude_cad='$lat_cad', longitude_cad='$lgn_cad', confianca_cad='101', setor='$setor', classificacao='$classif' WHERE codigo_cliente = '$id_cliente'";	
				
			}

  
  $rs2= mysql_query($query2);
	} 
	

	$_conta = $_conta +1 ;
	
//}

	//// LOADING 0 A 100% ////////////////////////////////////////////////////
	$pega_loading = intval($_conta + 1) . " Registros inseridos";
	//print_r($linha);
    echo "<div style='position:absolute;margin:0px 0px 0px 0px;width:100%;height:40px;background:#2867b2;color:#2867b2;color: #FFFFFF;text-align:center;line-height:40px;'>$pega_loading</div>";
    flush();
    ob_flush();
	
//// LOADING 0 A 100% ////////////////////////////////////////////////////
	
}
fclose($arquivo);

}


/// ADICIONAR /////////////////////////////////////////////

if($escolha=="adicionar"){


while(!feof($arquivo)) {
  $linha = fgets($arquivo);

	//codigo cliente
	$data_0[$_conta] = substr($linha,1,8);
	//codigo pedido
	$data_9[$_conta] = substr($linha,9,20);
	//tira espaco vaziu do final
	$data_9[$_conta] =trim($data_9[$_conta]);	
	//volume
	$data_6[$_conta] = substr($linha,30,10);
	//peso
	$data_7[$_conta] = substr($linha,40,10);
	$peso_conta = $data_7[$_conta];	
	$data_0[$_conta] = rtrim($data_0[$_conta]);
	$data_0[$_conta] =utf8_encode($data_0[$_conta]);
	$data_0[$_conta] =intval($data_0[$_conta]);

	
$query1 = "SELECT premium FROM db_geral WHERE codigo_cliente='$data_0[$_conta]'";
$query1 = mysql_query($query1);
// Tirando o while
$dados = mysql_fetch_array($query1);

// Exibição
$confere_rede =  $dados['premium'];

//SE FOR REDE
if($confere_rede=='R'){
	$premium_itabom = 'R';

} else {
//SE NAO	VERIFICA TAMANHO DA CARGA DO CLIENTE
		if ($peso_conta>=2000){
		$premium_itabom = 'A';		
		} 		
		if ($peso_conta>=1001 AND $peso_conta<2000){
		$premium_itabom = 'V';			
		}
		if ($peso_conta<=1000 AND $peso_conta>=501){
		$premium_itabom = 'S';			
		}
		if ($peso_conta<=500){
		$premium_itabom = 'I';			
		}		
}
	
// Query///////////////////////////////////////////////////////////////
$query2 = "SELECT codigo_pedido FROM clientes WHERE codigo_pedido='$data_9[$_conta]'";
$rs2 = mysql_query($query2);
$NumeroLinhas2 = mysql_num_rows($rs2);

$classif_x="S/CLASSIFICACAO";

if($NumeroLinhas2==0){

if($data_0[$_conta]!=""){

$import="INSERT into clientes(codigo_cliente, codigo_pedido, volume, peso, valor, premium, classificacao)values('$data_0[$_conta]','$data_9[$_conta]','$data_6[$_conta]','$data_7[$_conta]', 0, '$premium_itabom', '$classif_x')";
			
	mysql_query($import);
}


} else {
$linha++;	
}


if ($linha==null) 
break;



///////////////////////////////////////////////////////////////	


/// VERIFICA DB_GERAL ////////////////////

$rs = mysql_query("select codigo_cliente,endereco_cad,latitude_cad,longitude_cad,premium,nome,endereco,cidade,estado,cep,setor,bairro,classificacao from db_geral where codigo_cliente=$data_0[$_conta]");		

//acha arquivo com id do cliente repetido
while($row = mysql_fetch_array($rs)){
	$id_cliente = $row["codigo_cliente"];

//	if($id_cliente == $data_0[$_conta]){	
			$conta_regs_existentes = $conta_regs_existentes + 1;			
			$end_cad = $row["endereco_cad"];
			$lat_cad = $row["latitude_cad"];
			$lgn_cad = $row["longitude_cad"];
			$confianca_cad = $row["confianca_cad"];
			$premium = $row["premium"];				
			$nome_geral= $row["nome"];
			$endereco_geral= $row["endereco"];
			$cidade_geral = $row["cidade"];
			$uf_geral = $row["estado"];
			$cep_geral = $row["cep"];		
			$setor = $row["setor"];				
			$bairro = $row["bairro"];
		
			$classif = $row["classificacao"];
			
			if($lat_cad==NULL OR $lgn_cad==NULL) 
			{
				  $query2 = "UPDATE clientes SET nome='$nome_geral', endereco='$endereco_geral', cidade='$cidade_geral', bairro='$bairro', estado='$uf_geral', cep='$cep_geral', confianca_cad='0', setor='$setor', classificacao='$classif' WHERE codigo_cliente = '$id_cliente'";
	
			} else {
			  $query2 = "UPDATE clientes SET nome='$nome_geral', endereco='$endereco_geral', cidade='$cidade_geral', bairro='$bairro', estado='$uf_geral', cep='$cep_geral', endereco_cad='$end_cad', latitude_cad='$lat_cad', longitude_cad='$lgn_cad', confianca_cad='101', setor='$setor', classificacao='$classif' WHERE codigo_cliente = '$id_cliente'";	
				
			}

  
  $rs2= mysql_query($query2);
	} 
	

	$_conta = $_conta +1 ;
	
//}
	//// LOADING 0 A 100% ////////////////////////////////////////////////////
	$pega_loading = intval($_conta + 1) . " Registros inseridos";
	
    echo "<div style='position:absolute;margin:0px 0px 0px 0px;width:100%;height:40px;background:#2867b2;color:#2867b2;color: #FFFFFF;text-align:center;line-height:40px;'>$pega_loading</div>";
    flush();
    ob_flush();
	
//// LOADING 0 A 100% ////////////////////////////////////////////////////

}
		
fclose($arquivo);
//mysql_close($id);

}
	
  


?>
</div>
</div>
</div>

<?php
echo "<script>document.getElementById('loading').style.display = 'none'</script>";
$sql = mysql_query("SELECT * FROM clientes");

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