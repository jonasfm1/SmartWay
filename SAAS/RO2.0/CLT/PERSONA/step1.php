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
    return preg_replace(array("/(á|à|ã|â|ä)/","/(Á|À|Ã|Â|Ä)/","/(é|è|ê|ë)/","/(É|È|Ê|Ë)/","/(í|ì|î|ï)/","/(Í|Ì|Î|Ï)/","/(ó|ò|õ|ô|ö)/","/(Ó|Ò|Õ|Ô|Ö)/","/(ú|ù|û|ü)/","/(Ú|Ù|Û|Ü)/","/(ñ)/","/(Ñ)/","/(ç)/","/(Ç)/","/(:)/"),explode(" ","a A e E i I o O u U n N c C ."),$string);
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
$abreviado =  substr_replace($str,(strlen($str) > $max ? '...xlsx' : ''), $max);


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
	
$deleterecords = "TRUNCATE TABLE clientes"; //Esvaziar a tabela
mysql_query($deleterecords);	


$query_deleta = "UPDATE veiculos SET peso_total=null, volume_total=null, valor_total=null, equipe=null, ocupado='0', roteirizado=''";
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


	
	$data_0 = str_replace("'", " ", $rowData[0][0]);	//COD CLIENTE
	
	$data_1 = str_replace("'", " ", $rowData[0][1]); 	//NOME CLIENTE
	$data_1 = str_replace("´", " ", $data_1);
	$data_1 = str_replace("`", " ", $data_1);
	$data_1 = str_replace("ç", "c", $data_1);
	$data_1 = str_replace("Ç", "C", $data_1);
	$data_1 = tirarAcentos($data_1);
	
	$data_2 = str_replace("'", " ", $rowData[0][2]);	//Cod Endereco	
	$concatena_codcli = $data_0 . " " . $data_2;
	$concatena_codcli = tirarAcentos($concatena_codcli);
	
	$data_3a = str_replace("'", " ", $rowData[0][3]);	//ENDERECO
	$data_3a = tirarAcentos($data_3a);
	$data_3a =  str_replace(";", " ", $data_3a);
	$data_3 = str_replace("'", " ", $rowData[0][4]);	//CIDADE
	$data_3 = tirarAcentos($data_3);
	$data_4 = str_replace("'", " ", $rowData[0][5]);	//UF
	$data_4 = tirarAcentos($data_4);
	$data_5 = str_replace("'", " ", $rowData[0][6]);	//CEP
	$data_5 = tirarAcentos($data_5);
	$data_6 = str_replace(",", ".", $rowData[0][7]);	//PESO
	$data_6 = tirarAcentos($data_6);
	$data_7 = str_replace(",", ".", $rowData[0][8]);	//VOLUME
	$data_7 = tirarAcentos($data_7);
	$data_8 = str_replace(",", ".", $rowData[0][9]);	//VALOR	
	$data_8 = tirarAcentos($data_8);
	$data_9 = str_replace(",", ".", $rowData[0][10]);	//CODIGO DO PEDIDO	
	$data_9 = tirarAcentos($data_9);

	$data_10 = str_replace(",", ".", $rowData[0][13]);	//OBS DO PEDIDO
	$data_10 = tirarAcentos($data_10);
	$data_10 = str_replace("*"," ", $data_10);
	$data_10 = preg_replace('/\s/',' ',$data_10);

	$data_12 = str_replace(",", ".", $rowData[0][14]);	//MARCA
	$data_12 = tirarAcentos($data_12);

	$nota = str_replace(",", ".", $rowData[0][11]);	//nota qual??? TIPO
	$nota = tirarAcentos($nota);

	$numero_nota = str_replace("'", " ", $rowData[0][12]);	//numero nota

	////////ACERTA PONTUACAO/////////////////////////////
	$data_0 = utf8_encode($data_0);
	$data_1 = utf8_encode($data_1);
	$data_2 = utf8_encode($data_2);
	$data_3 = utf8_encode($data_3);
	$data_3a = utf8_encode($data_3a);
	$data_4 = utf8_encode($data_4);
	$data_5 = utf8_encode($data_5);

	$data_9 = utf8_encode($data_9);
	$data_10 = utf8_encode($data_10);
	
	$data_12 = utf8_encode($data_12);

	$nota = utf8_encode($nota);
	

	$nota = trim($nota);


	$numero_nota = utf8_encode($numero_nota);

	////////ACERTA PONTUACAO/////////////////////////////

	$premium = '';
	
	if ($nota !='') {
	
		if ($nota =='1') {
			$premium = 'A';
		}
		if ($nota =='R') {
			$premium = 'S';
		}	

	} else {
		
		$premium = '0';
	}
	



//SUPERBRILHO/// VERIFICA SE TEM CODIDO DO PEDIDO OU NOTA FISCAL IGUAIS NA BASE CLIENTES
	

$query_where_verifica =  mysql_query("SELECT nota from clientes where nota='$numero_nota' AND tipo_nota='$nota'");
$num_rows = mysql_num_rows($query_where_verifica);
	

//////////////////////////////////////////////////////////////////////////////////////////

	if($num_rows>0){
		
		
	} else {
		
	$controle_campo0 = "";
	
	if ($data_2=="" and $data_3=="" and $data_4=="" and $data_5==""){
	
	$controle_campo0= "yes";
	
	$import="INSERT into clientes(codigo_cliente, nome, endereco, cidade, estado, cep, peso, valor, codigo_pedido, obs_pedido, tipo_nota)values($concatena_codcli,'ERRO','ERRO','ERRO','ERRO','ERRO','ERRO','ERRO','ERRO','ERRO','ERRO')";
	} 
	
	if ($concatena_codcli==""){
	
	$controle_campo0= "yes";
	
	$import="INSERT into clientes(codigo_cliente, nome, endereco, cidade, estado, cep, peso, valor, codigo_pedido, obs_pedido, tipo_nota)values('ERRO','ERRO','ERRO','ERRO','ERRO','ERRO','ERRO','ERRO','ERRO','ERRO','ERRO')";
	} 
	

	if ($data_6==0 and $data_7==0 and $data_8==0){
	//VALORES ZERADOS NO PESO VOLUME VALOR//////
	$import="INSERT into clientes(codigo_cliente, nome, endereco, cidade, estado, cep, peso, volume, valor, codigo_pedido, obs_pedido, premium, marca, tipo_nota, nota)values('$concatena_codcli','$data_1','$data_3a','$data_3','$data_4','$data_5','0.01','0.00','0.00','$data_9','$data_10', '$premium','$data_12','$nota','$numero_nota')";
	
	} else {
	$controle_campo0= "no";
		
	//TUDO OK PARA IMPORTAR////////
		
	$import="INSERT into clientes(codigo_cliente, nome, endereco, cidade, estado, cep, peso, volume, valor, codigo_pedido, obs_pedido, premium, marca, tipo_nota, nota)values('$concatena_codcli','$data_1','$data_3a','$data_3','$data_4','$data_5','$data_6','$data_7','$data_8','$data_9','$data_10', '$premium','$data_12','$nota','$numero_nota')";
	
	}
	
	
	
mysql_query($import) or die(mysql_error());
		
		

		
	}
	
	
	
$query = "select codigo_cliente,nome,endereco_cad,latitude_cad,longitude_cad,confianca_cad,codigo from db_geral where codigo_cliente='$concatena_codcli'";														
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

	if($id_cliente == $concatena_codcli){	
			$conta_regs_existentes++;
		
			
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