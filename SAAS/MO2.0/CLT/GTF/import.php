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
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>

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
include ('conecta.php');
include ('base3.php');
require 'PHPExcel/IOFactory.php';


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
$abreviado =  substr_replace($str,(strlen($str) > $max ? '...xlsb' : ''), $max);


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
	
$deleterecords = "DELETE FROM clientes"; //Esvaziar a tabela
mysql_query($deleterecords);


$query_deleta = "UPDATE veiculos SET peso_total=null, volume_total=null, valor_total=null, equipe=null, ocupado='0'";
$rs_deleta = mysql_query($query_deleta);


$query_where1 = "UPDATE passo SET ok='no' WHERE (id='2' OR id='3' OR id='4' OR id='5')";
$rs_where1 = mysql_query($query_where1);


} 





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

   for ($row=2; $row<= $highestRow; $row++){
      
  $rowData = $sheet->rangeToArray('A' . $row . ':' . $highestColumn . $row, NULL, TRUE, FALSE);



  $loja = str_replace("'", " ", $rowData[0][0]);	//loja
  $loja=str_replace('"', " ", $loja);	//
  $loja=str_replace('\\', '/',  $loja); 
  $loja = tirarAcentos($loja);
     ////////ACERTA PONTUACAO BR/////////////////////////////
     $loja = utf8_encode($loja);
     ////////ACERTA PONTUACAO/////////////////////////////
  
  $cod_vendedor=str_replace("'", " ", $rowData[0][1]);	//cod vendedor
  $cod_vendedor=str_replace('"', " ", $cod_vendedor);	//
  $cod_vendedor=str_replace('\\', '/',  $cod_vendedor); 
  $cod_vendedor = tirarAcentos($cod_vendedor);
     ////////ACERTA PONTUACAO BR/////////////////////////////
     $cod_vendedor = utf8_encode($cod_vendedor);
     ////////ACERTA PONTUACAO/////////////////////////////

  $vendedor = str_replace("'", " ", $rowData[0][2]);	//vendedor
  $vendedor=str_replace('"', " ", $vendedor);	//
  $vendedor=str_replace('\\', '/',  $vendedor); 
  $vendedor = tirarAcentos($vendedor);
     ////////ACERTA PONTUACAO BR/////////////////////////////
     $vendedor = utf8_encode($vendedor);
     ////////ACERTA PONTUACAO/////////////////////////////

  $pedido = str_replace("'", " ", $rowData[0][3]);	//pedido
  $pedido=str_replace('"', " ", $pedido);	//
  $pedido=str_replace('\\', '/',  $pedido); 
  $pedido = tirarAcentos($pedido);
     ////////ACERTA PONTUACAO BR/////////////////////////////
     $pedido = utf8_encode($pedido);
     ////////ACERTA PONTUACAO/////////////////////////////

  if($rowData[0][4]==''){
   $data_pedido = "";

 } else {

   $data_pedido = fromExcelToLinux($rowData[0][4]); 
   $data_pedido=  date("d/m/Y",$data_pedido);
 }

  $liberado =str_replace("'", " ", $rowData[0][5]);	//liberado
  $liberado=str_replace('"', " ", $liberado);	//
  $liberado=str_replace('\\', '/',  $liberado); 
  $liberado = tirarAcentos($liberado);
     ////////ACERTA PONTUACAO BR/////////////////////////////
     $liberado = utf8_encode($liberado);
     ////////ACERTA PONTUACAO/////////////////////////////

  $cod_cliente=str_replace("'", " ", $rowData[0][6]);	//cod cliente
  $cod_cliente=str_replace('"', " ", $cod_cliente);	//
  $cod_cliente=str_replace("/", "-", $cod_cliente);	//cod cliente
  $cod_cliente=str_replace('\\', '/',  $cod_cliente); 
  $cod_cliente = tirarAcentos($cod_cliente);
     ////////ACERTA PONTUACAO BR/////////////////////////////
     $cod_cliente = utf8_encode($cod_cliente);
     ////////ACERTA PONTUACAO/////////////////////////////
     
  $nome_cliente=str_replace("'", " ", $rowData[0][7]);	//nomecliente
  $nome_cliente=str_replace('"', " ", $nome_cliente);	//
  $nome_cliente=str_replace('\\', '/',  $nome_cliente); 
  $nome_cliente = tirarAcentos($nome_cliente);
     ////////ACERTA PONTUACAO BR/////////////////////////////
     $nome_cliente = utf8_encode($nome_cliente);
     ////////ACERTA PONTUACAO/////////////////////////////
     
  $bairro = str_replace("'", " ", $rowData[0][8]);	//bairro
  $bairro=str_replace('"', " ", $bairro);	//
  $bairro=str_replace('\\', '/',  $bairro); 
  $bairro = tirarAcentos($bairro);
     ////////ACERTA PONTUACAO BR/////////////////////////////
     $bairro = utf8_encode($bairro);
     ////////ACERTA PONTUACAO/////////////////////////////

  $cep = str_replace("'", " ", $rowData[0][9]);	//cep
  $cep=str_replace('"', " ", $cep);	//
  $cep=str_replace('\\', '/',  $cep); 
  $cep = tirarAcentos($cep);
     ////////ACERTA PONTUACAO BR/////////////////////////////
     $cep = utf8_encode($cep);
     ////////ACERTA PONTUACAO/////////////////////////////

  $cidade = str_replace("'", " ", $rowData[0][10]);	//cidade
  $cidade=str_replace('"', " ", $cidade);	//
  $cidade=str_replace('\\', '/',  $cidade); 
  $cidade = tirarAcentos($cidade);
     ////////ACERTA PONTUACAO BR/////////////////////////////
     $cidade = utf8_encode($cidade);
     ////////ACERTA PONTUACAO/////////////////////////////

  $uf = str_replace("'", " ", $rowData[0][11]);	//uf
  $uf=str_replace('"', " ", $uf);	//
  $uf=str_replace('\\', '/',  $uf); 
  $uf = tirarAcentos($uf);
     ////////ACERTA PONTUACAO BR/////////////////////////////
     $uf = utf8_encode($uf);
     ////////ACERTA PONTUACAO/////////////////////////////

  $obs_pedido = str_replace("'", " ", $rowData[0][12]);	//obs pedido
  $obs_pedido=str_replace('"', " ", $obs_pedido);	//
  $obs_pedido=str_replace('\\', '/',  $obs_pedido); 

  $obs_pedido = tirarAcentos($obs_pedido);
     ////////ACERTA PONTUACAO BR/////////////////////////////
     $obs_pedido = utf8_encode($obs_pedido);
     ////////ACERTA PONTUACAO/////////////////////////////

  if($rowData[0][13]==''){
   $data_entrega = "";

 } else {

   $data_carrega = fromExcelToLinux($rowData[0][13]); 
   $data_carrega=  date("d/m/Y",$data_carrega);
 }
  


 if($rowData[0][14]==''){
   $data_entrega = "";

 } else {

   $data_entrega = fromExcelToLinux($rowData[0][14]); 
   $data_entrega=  date("d/m/Y",$data_entrega);
 }
  


  $cod_produto = str_replace("'", " ", $rowData[0][15]);	//cod produto
  $cod_produto=str_replace('"', " ", $cod_produto);	//
  $cod_produto = tirarAcentos($cod_produto);
     ////////ACERTA PONTUACAO BR/////////////////////////////
     $cod_produto = utf8_encode($cod_produto);
     ////////ACERTA PONTUACAO/////////////////////////////

     $query_produto = "SELECT * from produtos where cod_protheus='$cod_produto'";
     $query_produto = mysql_query($query_produto);

     $dados1 = mysql_fetch_array($query_produto);
     $cod_cancao =  $dados1['cod_cancao'];
   
     //echo $cod_produto;


  $produto = str_replace("'", " ", $rowData[0][16]);	//produto
  $produto=str_replace('"', " ", $produto);	
  $produto = tirarAcentos($produto);
     ////////ACERTA PONTUACAO BR/////////////////////////////
     $produto = utf8_encode($produto);
     ////////ACERTA PONTUACAO/////////////////////////////



  $peso = str_replace("'", "", $rowData[0][17]);	//peso
  $peso=str_replace('"', " ", $peso);	
  $peso = str_replace(".", "", $peso); //peso

  $pega_volume = str_replace("'", " ", $rowData[0][18]); //volume
  $pega_volume=str_replace('"', " ", $pega_volume);	

  $volume = $peso/$pega_volume;


 // $valor = str_replace("'", " ", $rowData[0][18]);	//valor

 // $valor = str_replace(".", "", $valor);	//valor
 // $valor = str_replace(",", ".", $valor);	//valor


  if ($peso>=500){
   $premium = 'A';
   
   } 
   
   if ($peso<=500 AND $peso>100){
   $premium = 'V';
      
   }
   if ($peso<=100 AND $peso>=30){
   $premium = 'S';
      
   }
   if ($peso<30){
   $premium = 'I';
      
   }

  

//echo $highestRow;
  

$_conta++;

//$controle_campo0 = "";
//VERIFICA SE TEM O PEDIDO COM PESO IGUAL E NAO DUPLICA

if($escolha=="adicionar"){
   $query_confere = "select codigo_pedido, peso, valor, cod_produto from clientes where codigo_pedido='$pedido' and peso='$peso' and valor='$valor' and cod_produto='$cod_produto' and produto";														
   $query_confere = mysql_query($query_confere);
   
   $registros=  mysql_num_rows($query_confere);
}
   //echo $registros;
if($registros!=0){
   //echo "ja tem";
/// ELSE SE TEM PEDIDO IGUAL
} else {



if($peso=="" or $cod_cliente=="" or $pedido=="") {

	//$import="INSERT into clientes(codigo_cliente, nome, endereco, cidade, estado, cep, peso, volume, valor, codigo_pedido, obs_pedido)values('ERRO','ERRO','ERRO','ERRO','ERRO','ERRO','ERRO','ERRO','ERRO','ERRO','ERRO')";

   $import="INSERT into clientes(codigo_cliente, nome, endereco, cidade, estado, cep)values('ERRO','ERRO','ERRO','ERRO','ERRO','ERRO')";
  $controle_campo0= "yes";
  }


if($cod_cliente!="" OR $pedido!="" OR $peso!="") {

   $import="INSERT into clientes(codigo_cliente, nome, cidade, estado, cep, bairro, peso, volume, valor, premium, loja, cod_vendedor, vendedor, codigo_pedido, data_pedido, liberado, obs_pedido, data_carrega, data_entrega, cod_produto, produto, cod_cancao)values('$cod_cliente', '$nome_cliente', '$cidade', '$uf', '$cep', '$bairro', '$peso', '$volume', '0', '$premium', '$loja', '$cod_vendedor', '$vendedor', '$pedido', '$data_pedido', '$liberado', '$obs_pedido', '$data_carrega', '$data_entrega', '$cod_produto', '$produto', '$cod_cancao')";	


}


mysql_query($import) or die(mysql_error());


        
     
$query = "select * from db_geral where codigo_cliente='$cod_cliente'";														
$rs = mysql_query($query);
// Tirando o while
$dados = mysql_fetch_array($rs);


//acha arquivo com id do cliente repetido
// while($row = mysql_fetch_array($rs)){
        $id_cliente = $dados["codigo_cliente"];

     //	$nome = $dados["nome"];
        $end = $dados["endereco_cad"];
        $endereco_cliente = TRIM($dados["endereco"]);
        $lat_cad = $dados["latitude_cad"];
        $lgn_cad = $dados["longitude_cad"];
        $confianca_cad = $dados["confianca_cad"];
        $codigo = $dados["codigo"];

  if($id_cliente == $cod_cliente){	
        $conta_regs_existentes++;
        

  $query2 = "UPDATE clientes SET endereco='$endereco_cliente', latitude_cad='$lat_cad', longitude_cad='$lgn_cad', confianca_cad='$confianca_cad', codigo_db_geral='$codigo', endereco_cad='$end' WHERE codigo_cliente = '$id_cliente'";
    $rs2= mysql_query($query2);
  } 
  



}


  


//}


 
//// LOADING 0 A 100% ////////////////////////////////////////////////////
  $pega_loading = intval($_conta + 1) . " Registros inseridos";
  
   echo "<div style='position:absolute;margin:0px 0px 0px 0px;width:100%;height:40px;background:#2867b2;color:#2867b2;color: #FFFFFF;text-align:center;line-height:40px;'>$pega_loading</div>";
   flush();
   ob_flush();
  
//// LOADING 0 A 100% ////////////////////////////////////////////////////

//echo $_conta. "\n";


     
///////////////////////////////////////////////////////////////////////	
  
  ///PASSOS MENU
  
  $query_where1 = "UPDATE passo SET ok='yes' WHERE id='1'";
  $rs_where1 = mysql_query($query_where1);
  
  $query_where = "UPDATE passo SET ok='no' WHERE (id='2' OR id='3' OR id='4' OR id='5')";
  $rs_where = mysql_query($query_where);

///////////////////////////////////////////////////////////////////////


  





}



$query_rtrim = "UPDATE clientes SET nome = RTRIM($nome), endereco = RTRIM($endereco_cliente)"; 
$rs_rtrim= mysql_query($query_rtrim);


//fclose($handle);

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

<form enctype='multipart/form-data' action='import.php' method='POST' name="form" id="form">
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
<td hidden><input type="radio" value="adicionar" name="escolha"/></td>
<td hidden><p style="font-size:12px">&nbsp;&nbsp;ADICIONAR A LISTA EXISTENTE.</p></td>
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