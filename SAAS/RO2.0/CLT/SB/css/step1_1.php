<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>::. ROTAS ONLINE .:: CADD</title>
<link rel="stylesheet" type="text/css" href="css/menu.css">
<link rel="stylesheet" type="text/css" href="css/step1_1_1.css">

<link rel="shortcut icon" href="imgs/favicon.ico" >
 <link rel="icon" type="image/gif" href="imgs/animated_favicon1.gif" >
 
<style type="text/css">

</style>
<script type='text/javascript' src="control/timer.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<script src="js/logger.js"></script>
<script LANGUAGE="JavaScript">

(function($) {
$.fn.waiting = function(options) {
options = $.extend({modo: 'normal'}, options);
this.fadeOut(options.modo);
return this;
};
})(jQuery);;

	
$(document).ready(function(){
$(".jquery-waiting-base-container").waiting({modo:"slow"});
});

function goBack() {
    window.history.back()
}


</SCRIPT>
<?php include ('session.php'); 
  require_once ("geocode.class.php");
  include ('essence/conecta.php');
  ini_set('max_execution_time',12000);
?>
</head>

<body>

<?php include ('base1.php'); ?>



<?php 
$dbname_cliente="ro_".$logado; // Indique o nome do banco de dados que será aberto
//echo $dbname_cliente;

if(!($con=mysql_select_db($dbname_cliente,$id))) {
echo "</br>Não foi possível estabelecer uma conexão com o gerenciador MySQL.</br>";
echo "Favor contactar o Administrador no telefone (11) 5505 6542.</br></br>";
echo "PRODUTO REGISTRADO CADDESIGN";
exit;
}
					
$query = "select * from clientes";																
$rs = mysql_query($query);

$conta = 0;		
?>
<div id="loading" style="position:absolute; width:100%; height:100%; background-color:#000000; z-index:99999; top:0; ">
<div id='carrega' style='height:100px;background-color:#000000; width:400px; position: absolute; top: 50%; margin-top:-50px; left:50%; margin-left:-200px;'>
<div id='progress' style='position: relative; left: 28px; top: 28px; width: 340px; height: 40px; background-color: #6f99d6; layer-background-color: #6f99d6; border: 1px none #000000; font-family:Arial, 'Helvetica Neue', Helvetica, sans-serif; font-size:12px;'>
<?php

///ABRE //////CLIENTES /////////////////////////////////////												
while($row = mysql_fetch_array($rs)){
		$conta++;	
		//echo $conta;
$total = mysql_num_rows($rs);

//// LOADING 0 A 100% ////////////////////////////////////////////////////
	$pega_loading = intval(($conta/$total)* 100) . "%";
	
    echo "<div style='position:absolute;margin:0px 0px 0px 0px;width:$pega_loading;height:40px;background:#2867b2;color:#2867b2;color: #FFFFFF;text-align:center;line-height:40px;font-size:11px;'>$pega_loading</div>";
    flush();
    ob_flush();
	
	
	
	
//// LOADING 0 A 100% ////////////////////////////////////////////////////

		$endereco[$conta] = $row["endereco"];
		$cidade[$conta] = $row["cidade"];
		$estado[$conta] = $row["estado"];
		$cep[$conta] = $row["cep"];
		$pais[$conta] = "BRASIL";
		$cod_cli[$conta] = $row["codigo_cliente"];
		$score = 0;
		
///ABRE //////DB_GERAL PROCURA IGUAIS /////////////////////////////////////			
		$queryx = "select * from db_geral WHERE codigo_cliente='$cod_cli[$conta]'";														
			$rsx = mysql_query($queryx);
			
			//$total = mysql_num_rows($rsx);
			
				while($row1 = mysql_fetch_array($rsx)){
					$id_cliente = $row1["codigo_cliente"];
					$endereco_cliente = $row1["endereco"];
					$codigo = $row1["codigo"];
					$_igual_end_cad = $row1["endereco_cad"];
					$_igual_latitude_cad = $row1["latitude_cad"];
					$_igual_longitude_cad = $row1["longitude_cad"];
					$_igual_confianca = $row1["confianca_cad"];
					$_igual_geomanual = $row1["geo_manual"];
					
					$_igual_premium =  $row1["premium"];
					//$_igual_veiculo =  $row1["veiculo"];
				}
///FECHA //////DB_GERAL PROCURA IGUAIS /////////////////////////////////////

//echo $total;
if ($id_cliente==$cod_cli[$conta]){
		$query_igual = "UPDATE clientes SET endereco_cad='$_igual_end_cad', latitude_cad='$_igual_latitude_cad', longitude_cad='$_igual_longitude_cad', confianca_cad='$_igual_confianca', geo_manual='$_igual_geomanual', premium='$_igual_premium', codigo_db_geral='$codigo' WHERE codigo_cliente = '$cod_cli[$conta]'";
  		$rs_igual= mysql_query($query_igual);


} else {
	
	if ($test = new geocode($endereco[$conta], $cidade[$conta], $estado[$conta], $cep[$conta], $pais[$conta])){
  
	$novo_endereco_pega = $test->street();

	$novo_endereco = str_replace("'", " ", $novo_endereco_pega);	
	
//	$novo_endereco = stripslashes("'", " ", $novo_endereco_pega);	

	$novo_cidade = $test->cidade();
	$novo_cidade = str_replace("'", " ", $novo_cidade);
   
   	$concatenacao_endereco = $novo_endereco . ", " . $test->number() . ", " . $test->neighborhood() . ", " . $test->postal() . ", " . $novo_cidade . "-" . $test->estado();
?>
 
  <?php 
																	  															
	if($test->postalprefix()!= ""){

	$separa_cep_resultado = $test->postalprefix();
	$separa_cep_banco = explode("-", $row["cep"]);	
	
	if ($separa_cep_resultado==$separa_cep_banco[0]){
		$score = $score + 25;
		}
	if ($separa_cep_resultado!=$separa_cep_banco[0]){
		
		}
	//echo ($test->street() . ", " . $test->number() . ", " . $test->neighborhood() . ", " . $test->cidade() . "-" . $test->estado() . ", " . $test->postalprefix());		

	}
	
	if($test->postal()!= ""){		
	//$verifica_cep = strcasecmp($row["cep"], $test->postal());
	$separa_cep_resultado = explode("-", $test->postal());
	$separa_cep_banco = explode("-", $row["cep"]);	
	
	if ($separa_cep_resultado[0]==$separa_cep_banco[0] and $separa_cep_resultado[1]==$separa_cep_banco[1]){
		$score = $score + 30;
		}
	if ($separa_cep_resultado[0]==$separa_cep_banco[0] and $separa_cep_resultado[1]!=$separa_cep_banco[1]){
		$score = $score + 25;
		}
	if ($separa_cep_resultado[0]!=$separa_cep_banco[0] and $separa_cep_resultado[1]!=$separa_cep_banco[1]){
		}
		//echo ($test->street() . ", " . $test->number() . ", " . $test->neighborhood() . ", " . $test->cidade() . "-" . $test->estado() . ", " . $test->postal());		
		}										  
				

		if($test->status()!= 0){
			
			if($test->accuracy()== -2){
			$score = $score + 30;				
			}
			if($test->accuracy()== -1){
			$score = $score + 40;				
			}
			if($test->accuracy()== 1 or $test->accuracy()== 2){
			$score = $score + 50;				
			}
		
				} else {
					
		}
		
		
		if(strcmp(mb_strtoupper($row["cidade"]), $test->cidade())){
			$score = $score + 20;		
			}

//echo ("Precisão: " . $test->accuracy() . "</br>");
 //echo ("Status: " . $test->status() . "</br>");
// echo ("Confiança: " . $test->precission () . "</br>");
		


  $id_cliente = $row["codigo_cliente"];
  $endereco_new = $row["endereco"];
 
  $lat_ok = $test->lat();
  $lgn_ok = $test->lng();
  
//  echo $lat_ok;
//  echo $lgn_ok;

}
///FECHA //////CLIENTES /////////////////////////////////////

//echo $score;

///ABRE /////////////////////////////////////////////////////////////////
  if ($lat_ok=="" OR $lgn_ok=="" OR $id_cliente==""){
    $query2 = "UPDATE clientes SET endereco_cad='Endereço não encontrado!', latitude_cad='-15.793841', longitude_cad='-47.875806', confianca_cad=0 WHERE codigo_cliente = '$id_cliente'";
	 $rs2= mysql_query($query2);
	
  } else { 
		
// faz inserção
	$query2 = "UPDATE clientes SET endereco_cad='$concatenacao_endereco', latitude_cad='$lat_ok', longitude_cad='$lgn_ok', confianca_cad='$score' WHERE codigo_cliente = '$id_cliente'";
	
 	$rs2= mysql_query($query2);
		
  }
///FECHA ///////////////////////////////////////////////////////////////
}


}

echo "<script>document.getElementById('loading').style.display = 'none'</script>";

?>
</div></div></div>
<?php

//////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////

?>
<div id="apDiv11"><img src="imgs/bg_box_step1_1_1.png" width="447" height="82" />

<div id="help" class="help"><img src="imgs/help.png" width="45" height="45" alt=""/><div id="sidebar"><p>• Nesse passo a Geocodificação será feita <strong>AUTOMATICAMENTE!</strong><br /><br />
    <p>• Muitos endereços abaixo de 20%</strong>? Caso isso tenha ocorrido com frequência, sua internet pode estar oscilando!<br /><br />• Clique em <strong>GEOCODIFICAR NOVAMENTE</strong> caso esse problema tenha ocorrido com você.</p><br /> 
    
    • Os Códigos dos clientes com <font size="+1"><font color="#FF0000">• </font></font>são clientes com <strong>coordenadas adquiridas anteriormente</strong>!
   
    </div>
  
  </div>

<div id="apDiv12">
<div id="total">
   
<table width="100%" border="1" id="tabela" name="tabela" class="bordasimples" cellpadding="2" cellspacing="2">

<tr bgcolor="#DADADA">
<td width="7%" bgcolor="#5cbc69" height="35px"> 
<div align="center"><font color="#FFFFFF"><strong>CONFIANÇA</strong></font></div>
</td> 
<td width="3%" bgcolor="#589bd4"> 
<div align="center"><font color="#FFFFFF"><strong>COD. CLIENTE</strong></font></div>
</td>
<td width="13%" bgcolor="#589bd4"> 
<div align="center"><font color="#FFFFFF"><strong>NOME</strong></font></div>
</td>
<td width="12%" bgcolor="#589bd4" > 
<div align="center"><font color="#FFFFFF"><strong>ENDEREÇO</strong></font></div>
</td>
<td width="6%" bgcolor="#589bd4"> 
<div align="center"><font color="#FFFFFF"><strong>CIDADE</strong></font></div>
</td>
<td width="10px" bgcolor="#589bd4"> 
<div align="center"><font color="#FFFFFF"><strong>UF</strong></font></div>
</td>
<td width="44px" bgcolor="#589bd4"> 
<div align="center"><font color="#FFFFFF"><strong>CEP</strong></font></div>
</td>
<td width="4%" bgcolor="#589bd4"> 
<div align="center"><font color="#FFFFFF"><strong>PESO</strong></font></div>
</td>
<td width="4%" bgcolor="#589bd4"> 
<div align="center"><font color="#FFFFFF"><strong>VOLUME</strong></font></div>
</td>
<td width="4%" bgcolor="#589bd4"> 
<div align="center"><font color="#FFFFFF"><strong>VALOR</strong></font></div>
</td>
<td width="4%" bgcolor="#589bd4"> 
<div align="center"><font color="#FFFFFF"><strong>COD. PEDIDO</strong></font></div>
</td>
<td width="4%" bgcolor="#589bd4"> 
<div align="center"><font color="#FFFFFF"><strong>OBS. PEDIDO</strong></font></div>
</td>
<td width="6%" bgcolor="#5cbc69"> 
<div align="center"><font color="#FFFFFF"><strong>LATITUDE</strong></font></div>
</td>                                                                  
<td width="7%" bgcolor="#5cbc69"> 
<div align="center"><font color="#FFFFFF"><strong>LONGITUDE</strong></font></div>
</td>
</tr>

<?php
$query = "select * from clientes";																
$rs = mysql_query($query);

?>


<?php

///ABRE //////CLIENTES /////////////////////////////////////												
while($row = mysql_fetch_array($rs)){

		$endereco[$conta] = $row["endereco"];
		$cidade[$conta] = $row["cidade"];
		$estado[$conta] = $row["estado"];
		$cep[$conta] = $row["cep"];
		$pais[$conta] = "BRASIL";
		$cod_cli[$conta] = $row["codigo_cliente"];
		$score = $row["confianca_cad"];;

if($score == 101){
?>
<td width="7%" align="center" bgcolor="#589bd4"><strong><font color="#FFFFFF">
<?php
}
if($score >= 80 and $score < 101){
?>
<td width="7%" align="center" bgcolor="#5cbc69"><strong><font color="#FFFFFF">
<?php
}
?>
<?php
if($score < 80 and $score > 50){
?>
<td width="6%" align="center" bgcolor="#F90"><strong><font color="#FFFFFF">
<?php
}
?>
<?php
if($score <= 50){
?>
<td width="8%" align="center" bgcolor="#C00"><strong><font color="#FFFFFF">
<?php
}	

if($score ==101){
	echo ("MANUAL");
} else {
	echo $score . "%";
}		
?>
</font></strong>
</td>
<td width="3%" bgcolor="#FFF" align="center" id="id" nowrap="nowrap"> 

<?php
if($score==101){
	
echo "<span><font color='#FF0000'><font size='+2'>•</font></font></span>" . $row["codigo_cliente"]; 	
} else {
	
echo $row["codigo_cliente"]; 	
}


?> 



</td>  
<td width="13%" bgcolor="#FFF" align="center"> 
<?= $row["nome"] ?> </td>
<td width="12%" bgcolor="#FFF" align="center" id="endereco"> 
<?= $row["endereco"] ?> </td>
<td width="6%" align="center" bgcolor="#FFF" > 
<?= $row["cidade"] ?>
</td>
<td width="3%" align="center" bgcolor="#FFF" > 
<?= $row["estado"] ?>
</td>
<td width="4%" align="center" bgcolor="#FFF" > 
<?= $row["cep"] ?>
</td>
<td width="4%" align="center" bgcolor="#FFF" > 
<?= $row["peso"] ?>
</td>
<td width="4%" align="center" bgcolor="#FFF" > 
<?= $row["volume"] ?>
</td>
<td width="4%" align="center" bgcolor="#FFF" > 
<?= $row["valor"] ?>
</td>
<td width="4%" align="center" bgcolor="#FFF" > 
<?= $row["codigo_pedido"] ?>
</td>
<td width="4%" align="center" bgcolor="#FFF" > 
<?= $row["obs_pedido"] ?>
</td>  
<td width="6%" align="center" bgcolor="#FFF" >
<?php
echo $row["latitude_cad"];;
?>
</td>                                                                    
<td width="7%" align="center" bgcolor="#FFF" >
<?php 													  
echo $row["longitude_cad"];
?>
</td>
</tr>               
<?php
}
?>                            
</table></div>

</div>
<div id="apDiv13_todos">

<div id="apDiv13c">   <form action="step1_1.php" method="post"  >
      <input type="submit" name="submit" id="submit" value="GEOCODIFICAR NOVAMENTE"/>
      </form></div>
    <div id="apDiv13b"><input type='submit' name='submit' value='VOLTAR' onclick="location.href='step1.php';"/></div>  
       <div id="apDiv13"><form name="go_step1" action="step2.php">
<input type='submit' value='AVANÇAR'/>
</form></div> 
      
</div>
</div>


</body>
</html>