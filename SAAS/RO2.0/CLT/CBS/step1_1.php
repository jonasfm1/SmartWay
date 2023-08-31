<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="https://www.w3.org/1999/xhtml">
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
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
//echo $chave;
  require_once ("geocode.class.php");

  
  include ('essence/conecta.php');
  ini_set('max_execution_time',12000);
?>
</head>

<body>


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
<div id="loading" style="position:absolute; width:100%; height:100%; background-color:#FFFFFF; z-index:99999; top:0; ">
<div id='carrega' style='height:100px;background-color:#FFFFFF; width:400px; position: absolute; top: 50%; margin-top:-50px; left:50%; margin-left:-200px;'>
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
		$query_igual = "UPDATE clientes SET endereco_cad='$_igual_end_cad', latitude_cad='$_igual_latitude_cad', longitude_cad='$_igual_longitude_cad', confianca_cad='$_igual_confianca', geo_manual='$_igual_geomanual', codigo_db_geral='$codigo' WHERE codigo_cliente = '$cod_cli[$conta]'";
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
<script>
	
	window.location.href="step2.php";
	</script>


</body>
</html>