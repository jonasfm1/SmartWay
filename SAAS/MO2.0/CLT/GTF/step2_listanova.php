<?php
include ('session.php');
include ('conecta.php');
ini_set('max_execution_time',12000);
  

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>::. MONITORAMENTO .:: CADD</title>

<link rel="stylesheet" type="text/css" href="css/menu.css">
<link rel="stylesheet" type="text/css" href="css/step2.css">
<link rel="shortcut icon" href="imgs/favicon.ico" >
<link rel="icon" type="image/gif" href="imgs/animated_favicon1.gif" >

<script type='text/javascript' src="control/timer.js"></script>
<script src="js/jquery.js"></script>
<script src="js/flutuante.js"></script>
<script src="js/logger.js"></script>
<script LANGUAGE="JavaScript">

function confirmaExclusao(aURL) {

if(confirm('Você tem certeza que deseja excluir este cliente?')) {

location.href = aURL;

//target=ver;

}
}


	function mostraDIV(){
		document.getElementById("Pagina").style.display = "block";
	}
       
	  
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

function autoSubmit() {
    var formObject = document.forms['theForm'];
    formObject.submit();
}

function autoSubmit2() {
    var formObject = document.forms['xls'];
    formObject.submit();
}

function autoSubmit_lista(quem) {
	
	document.getElementById("quallista").value = quem;
    var formObject = document.forms['theForm'];
    formObject.submit();
}


</SCRIPT>

</head>
<style>
.modalDialog {
  position: fixed;
  font-family: Arial, Helvetica, sans-serif;
  top: 0;
  right: 0;
  bottom: 0;
  left: 0;
  background: rgba(0, 0, 0, 0.8);
  z-index: 99999;
  opacity: 0;
  -webkit-transition: opacity 400ms ease-in;
  -moz-transition: opacity 400ms ease-in;
  transition: opacity 400ms ease-in;
  pointer-events: none;
}
.modalDialog:target {
  opacity: 1;
  pointer-events: auto;
}
.modalDialog > div {
  width: 400px;
  position: relative;
  margin: 10% auto;
  padding: 5px 20px 13px 20px;
  border-radius: 10px;
  background: #fff;
  background: -moz-linear-gradient(#fff, #999);
  background: -webkit-linear-gradient(#fff, #999);
  background: -o-linear-gradient(#fff, #999);
}
.close {
  background: #606061;
  color: #FFFFFF;
  line-height: 25px;
  position: absolute;
  right: -12px;
  text-align: center;
  top: -10px;
  width: 24px;
  text-decoration: none;
  font-weight: bold;
  -webkit-border-radius: 12px;
  -moz-border-radius: 12px;
  border-radius: 12px;
  -moz-box-shadow: 1px 1px 3px #000;
  -webkit-box-shadow: 1px 1px 3px #000;
  box-shadow: 1px 1px 3px #000;
}
.close:hover {
  background: #00d9ff;
}
</style>
<div class="jquery-waiting-base-container"></div>
<body>

<?php include ('base2.php'); ?>

<div id="apDiv11">
  <div id="excel">
<form action="export.php?acao=export_xls" method="post">
  <input type="text"  value="<?php echo $pega_login; ?>" name="login" id="login" hidden="hidden" />
  <input type="text"  value="<?php echo $pega_rota; ?>" name="rota" id="rota" hidden="hidden"/>
<input type="text"  value="<?php echo $pega_lista; ?>" name="lista" id="lista" hidden="hidden"/>
<input type='submit' value='.XLS' name="submit"/>
<input type="text"  value="<?php echo $pega_listagem; ?>" name="listagem" id="listagem" hidden="hidden"/>
</form>
</div>

  <div id="help" class="help"><img src="imgs/help.png" width="45" height="45" alt=""/><div id="sidebar">
  <p>• Escolha entre filtrar por 'LOGIN' ou por 'ROTAS'!</p><br />
  <p>• <strong>FILTRAR POR:</strong> Filtre a lista para uma visualiza&ccedil;&atilde;o desejada.</p><br />
  <p>• <strong>LOCAL:</strong> Visualize no mapa a localiza&ccedil;&atilde;o do servi&ccedil;o programado!</p><br />
  <p>• <strong>EDITAR:</strong> O Administrador poder&aacute; editar o Status do Servi&ccedil;o.</p><br />
  <p>• <strong>EXCLUIR:</strong> Exclua um servi&ccedil;o programado!</p><br />
    
    </div>

  </div>
  <?php
$pega_listagem = "";
$pega_listagem = $_GET["lista"];
//$pega_login = "";

if($user==$logado){
$user = '%%';
}


if($_GET["id_lista"]!=''){
$pega_lista = $_GET["id_lista"];
}
else{
$pega_lista = '%%';

}

	$p=$_GET["id_login"];
	$_array_login=array();

	foreach($p as $i){	
	array_push($_array_login, "'" . $i. "'");
	}
 	$strig = implode(',', $_array_login);
    
	echo $strig;
	
	$r=$_GET["id_lista"];
	$_array_lista=array();

	foreach($r as $li){	
	array_push($_array_lista, "'" . $li. "'");
	}
 	$strigw = implode(',', $_array_lista);
    
	echo $strigw;
	
	
	$t=$_GET["id_rota"];
	$_array_rota=array();

	foreach($t as $ti){	
	array_push($_array_rota, "'" . $ti. "'");
	}
 	$strigr = implode(',', $_array_rota);
    
	echo $strigr;
	
	


if($_GET["id_rota"]!=''){
$pega_rota = $_GET["id_rota"];
}
else{
$pega_rota = '%%';
}


if($_GET["quallista"]!=''){
$pega_quallista = $_GET["quallista"];
}
else{
$pega_quallista = '%%';
}

//echo $pega_quallista;

$query_oia1 = mysql_query("select rotas.*, usuario.coordenador,usuario.login from rotas INNER JOIN usuario ON usuario.login=rotas.login where usuario.coordenador LIKE '$user' AND rotas.status=2 AND rotas.login in ($strig) AND rotas.rota LIKE '$pega_rota' AND rotas.lista LIKE '$pega_lista' ORDER BY rotas.rota ASC, rotas.sequencia");


$query_oia2 = mysql_query("select rotas.*, usuario.coordenador,usuario.login from rotas INNER JOIN usuario ON usuario.login=rotas.login where usuario.coordenador LIKE '$user' AND rotas.status=0 AND rotas.login in ($strig) AND rotas.rota LIKE '$pega_rota' AND rotas.lista LIKE '$pega_lista' ORDER BY rotas.rota ASC, rotas.sequencia");

$query_oia3 = mysql_query("select rotas.*, usuario.coordenador,usuario.login from rotas INNER JOIN usuario ON usuario.login=rotas.login where usuario.coordenador LIKE '$user' AND rotas.status=1 AND rotas.login in ($strig) AND rotas.rota LIKE '$pega_rota' AND rotas.lista LIKE '$pega_lista' ORDER BY rotas.rota ASC, rotas.sequencia");

$query_oia4 = mysql_query("select rotas.*, usuario.coordenador,usuario.login from rotas INNER JOIN usuario ON usuario.login=rotas.login where usuario.coordenador LIKE '$user' AND rotas.login LIKE '$pega_login' AND rotas.rota in ($strig) AND rotas.lista LIKE '$pega_lista' ORDER BY rotas.rota ASC, rotas.sequencia");

$query_oia5 = mysql_query("select rotas.*, usuario.coordenador,usuario.login from rotas INNER JOIN usuario ON usuario.login=rotas.login where usuario.coordenador LIKE '$user' AND rotas.status=3 AND rotas.login in ($strig) AND rotas.rota LIKE '$pega_rota' AND rotas.lista LIKE '$pega_lista' ORDER BY rotas.rota ASC, rotas.sequencia");

	
$total_0k1 = mysql_num_rows($query_oia1);
$total_0k2 = mysql_num_rows($query_oia2);
$total_0k3 = mysql_num_rows($query_oia3);
$total_0k4 = mysql_num_rows($query_oia4);
$total_0k5 = mysql_num_rows($query_oia5);


if($pega_listagem == ""){
//echo "Filtragem vazia";
	
}

	
//echo "lista:".$pega_listagem." Login:".$pega_login."  (".$total.") registros";
if($pega_listagem == "red"){
	
	
	/// FILTRO POR COLUNAS
	if($pega_quallista!='%%'){
		
		$query = "select rotas.*, usuario.coordenador,usuario.login from rotas INNER JOIN usuario ON usuario.login=rotas.login where usuario.coordenador LIKE '$user' AND rotas.status=2 AND rotas.login LIKE '$pega_login' AND rotas.rota LIKE '$pega_rota' AND rotas.lista LIKE '$pega_lista' ORDER BY rotas.$pega_quallista ASC";
	} else {
		$query = "select rotas.*, usuario.coordenador,usuario.login from rotas INNER JOIN usuario ON usuario.login=rotas.login where usuario.coordenador LIKE '$user' AND rotas.status=2 AND rotas.login LIKE '$pega_login' AND rotas.rota LIKE '$pega_rota' AND rotas.lista LIKE '$pega_lista' ORDER BY rotas.login, rotas.rota ASC, rotas.sequencia";
		
	}
	////////////////////////
	
	$rs = mysql_query($query);
	$total = mysql_num_rows($rs);
	$guarda_nome = "NEGATIVADOS";
	
	}
	
if($pega_listagem == "orange"){
	
	/// FILTRO POR COLUNAS
	if($pega_quallista!='%%'){
		
		$query = "select rotas.*, usuario.coordenador,usuario.login from rotas INNER JOIN usuario ON usuario.login=rotas.login where usuario.coordenador LIKE '$user' AND rotas.status=0 AND rotas.login LIKE '$pega_login' AND rotas.rota LIKE '$pega_rota' AND rotas.lista LIKE '$pega_lista' ORDER BY rotas.$pega_quallista ASC";
		
	} else {
		$query = "select rotas.*, usuario.coordenador,usuario.login from rotas INNER JOIN usuario ON usuario.login=rotas.login where usuario.coordenador LIKE '$user' AND rotas.status=0 AND rotas.login LIKE '$pega_login' AND rotas.rota LIKE '$pega_rota' AND rotas.lista LIKE '$pega_lista' ORDER BY rotas.login, rotas.rota ASC, rotas.sequencia";
		
	}
	////////////////////////
	
	$rs = mysql_query($query);
	$total = mysql_num_rows($rs);
	$guarda_nome = "PENDENTES";
	}
	
if($pega_listagem == "green"){
	
	/// FILTRO POR COLUNAS
	if($pega_quallista!='%%'){

			$query = "select rotas.*, usuario.coordenador,usuario.login from rotas INNER JOIN usuario ON usuario.login=rotas.login where usuario.coordenador LIKE '$user' AND rotas.status=1 AND rotas.login LIKE '$pega_login' AND rotas.rota LIKE '$pega_rota' AND rotas.lista LIKE '$pega_lista' ORDER BY rotas.$pega_quallista ASC";
			
		
	} else {
			$query = "select rotas.*, usuario.coordenador,usuario.login from rotas INNER JOIN usuario ON usuario.login=rotas.login where usuario.coordenador LIKE '$user' AND rotas.status=1 AND rotas.login LIKE '$pega_login' AND rotas.rota LIKE '$pega_rota' AND rotas.lista LIKE '$pega_lista' ORDER BY rotas.login, rotas.rota ASC, rotas.sequencia";
		
	}
	////////////////////////
	

	$rs = mysql_query($query);
	$total = mysql_num_rows($rs);
	$guarda_nome = "POSITIVADOS";
	}		

if($pega_listagem == "blue"){
	
		/// FILTRO POR COLUNAS
	if($pega_quallista!='%%'){

	$query = "select rotas.*, usuario.coordenador,usuario.login from rotas INNER JOIN usuario ON usuario.login=rotas.login where usuario.coordenador LIKE '$user' AND rotas.login LIKE '$pega_login' AND rotas.rota LIKE '$pega_rota' AND rotas.lista LIKE '$pega_lista' ORDER BY rotas.$pega_quallista ASC";
	} else {
	$query = "select rotas.*, usuario.coordenador,usuario.login from rotas INNER JOIN usuario ON usuario.login=rotas.login where usuario.coordenador LIKE '$user' AND rotas.login LIKE '$pega_login' AND rotas.rota LIKE '$pega_rota' AND rotas.lista LIKE '$pega_lista' ORDER BY rotas.login, rotas.rota ASC, rotas.sequencia";
		
	}
	////////////////////////
	
	
	$rs = mysql_query($query);
	$total = mysql_num_rows($rs);
	$guarda_nome = "TODOS";
	}
	
if($pega_listagem == "black"){
	
	if($pega_quallista!='%%'){

		$query = "select rotas.*, usuario.coordenador,usuario.login from rotas INNER JOIN usuario ON usuario.login=rotas.login where usuario.coordenador LIKE '$user' AND rotas.status=3 AND rotas.login LIKE '$pega_login' AND rotas.rota LIKE '$pega_rota' AND rotas.lista LIKE '$pega_lista' ORDER BY rotas.$pega_quallista ASC";
		
	} else {
	$query = "select rotas.*, usuario.coordenador,usuario.login from rotas INNER JOIN usuario ON usuario.login=rotas.login where usuario.coordenador LIKE '$user' AND rotas.status=3 AND rotas.login LIKE '$pega_login' AND rotas.rota LIKE '$pega_rota' AND rotas.lista LIKE '$pega_lista' ORDER BY rotas.login, rotas.rota ASC, rotas.sequencia";
		
	}
	

	$rs = mysql_query($query);
	$total = mysql_num_rows($rs);
	$guarda_nome = "ALERTAS";
	}		


?> 
 
  <div id="apDiv12a">
  
 <form name='theForm' id='theForm'>  
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tbody>
    <tr height="35px" style="font-family:Arial, Helvetica, sans-serif; font-size:11px; color:#FFFFFF; width:450px;">
 

 
      
<td height="45" colspan="6" bgcolor="#579bd3" >

    <table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tbody>
      <tr height="35px">
        <td width="2%">&nbsp;&nbsp;</td>
        <td width="30%">
        
       <input type="text" name="quallista" hidden="hidden" id="quallista" value="<?php echo $pega_quallista; ?>"/>
    <select name="id_login[]" style="width:98%" Size="5" multiple="multiple">
      <option value="">LOGIN</option>
      <?php 
	$query3 = "select login from usuario where coordenador LIKE '$user' AND nivel!=1 order by login";														
	$rs3 = mysql_query($query3);		
	
	//$array_login = array();
								
	while($row3 = mysql_fetch_array($rs3)){
	$id_login = strtoupper($row3["login"]);
		
	//array_push($array_login, $id_login);
		//		print_r($array_login);
	?>
      
      <?php 
//	if ($pega_login == $id_login){ 
		
	?>
     
      <?php
	//} else {
		?>
      <option value="<?= $id_login ?>"><?= $id_login ?></option>
      <?php
//		}
    ?>
      <?php
	}
  ?>
   </select> 

        </td>
       
        <td width="30%">

		
    <select name="id_lista[]" style="width:98%" Size="5" multiple="multiple">
            <option value="">LISTA</option>
            <?php 
$query_lista = "select rotas.lista, usuario.coordenador from rotas INNER JOIN usuario ON usuario.login=rotas.login where usuario.coordenador LIKE '$user' GROUP BY rotas.lista order by rotas.id DESC";														
	$rs_lista = mysql_query($query_lista);									
	while($row_lista = mysql_fetch_array($rs_lista)){
		$id_rota_lista = $row_lista["lista"];
?>
            <?php 
	if ($pega_lista== $id_rota_lista){
	?>
            <option selected value="<?= $id_rota_lista ?>"><?= $id_rota_lista ?></option>
            <?php } else {
		?>
            <option value="<?= $id_rota_lista ?>"><?= $id_rota_lista ?></option>
            <?php
		}
	 }
?>
            </select>
        </td>
        <td width="30%">
          
          <select name="id_rota" style="width:98%">
            <option value="">ROTA</option>
            <?php 
	$query3 = "select rotas.rota, usuario.coordenador, rotas.login from rotas INNER JOIN usuario ON usuario.login=rotas.login where usuario.coordenador LIKE '$user' AND rotas.login LIKE '$pega_login' AND rotas.lista LIKE '$pega_lista' GROUP BY rotas.rota order by rotas.statusrota, rotas.rota ASC";															
	$rs3 = mysql_query($query3);									
	while($row3 = mysql_fetch_array($rs3)){
	$id_rota = $row3["rota"];
	?>
            <?php 
	if ($pega_rota== $id_rota){
	?>
            <option selected value="<?= $id_rota ?>"><?= $id_rota ?></option>
            <?php } else {
		?>
            <option value="<?= $id_rota ?>"><?= $id_rota ?></option>
            <?php
		}
	}
  ?>
            </select>
          
        </td>
        <td width="6%"><input type="submit" value="FILTRAR"></td>
      <td width="2%">&nbsp;&nbsp;</td>
      </tr>
    </tbody>
</table>
</td>
      

    </tr>
  
    </tr>
         <tr height="3px" style="font-family:Arial, Helvetica, sans-serif; font-size:11px; color:#FFFFFF; width:450px;">
     
     </tr>
      <tr style="font-family:Arial, Helvetica, sans-serif; font-size:11px; color:#FFFFFF; width:450px;">

      
      <td width="20%" height="30px" align="center" bgcolor="#C00">
          <input type="radio" value="red" name="lista" onchange="autoSubmit();" <?php if ($pega_listagem == 'red') { ?>checked='checked' <?php } ?> />
NEGATIVADOS
<?php 
echo "(" . $total_0k1 . ")";?>
      </td>
      <td width="20%" height="30px" align="center" bgcolor="#F90">
          <input type="radio" value="orange" name="lista" onchange="autoSubmit();" <?php if ($pega_listagem == 'orange') { ?>checked='checked' <?php } ?>/>
PENDENTES
<?php 
echo "(" . $total_0k2 . ")";?>
      </td>
      <td width="20%" height="30px" align="center" bgcolor="#5cbc69">
          <input type="radio" value="green" name="lista" onchange="autoSubmit();" <?php if ($pega_listagem == 'green') { ?>checked='checked' <?php } ?>/>
POSITIVADOS
<?php 
echo "(" . $total_0k3 . ")";?>
      </td>
        <td width="20%" height="30px" align="center" bgcolor="#000000">
          <input type="radio" value="black" name="lista" onchange="autoSubmit();" <?php if ($pega_listagem == 'black') { ?>checked='checked' <?php } ?>/>
ALERTA
<?php 
echo "(" . $total_0k5 . ")";?>
      </td>
      <td width="20%" height="30" align="center" bgcolor="#589bd4">
          <input type="radio" value="blue" name="lista" onchange="autoSubmit();" <?php if ($pega_listagem == 'blue') { ?>checked='checked' <?php } ?>/>
TODOS
<?php 
echo "(" . $total_0k4 . ")";?>
      </td>
    </tr>
  
  
  
  </tbody>
</table>
</form>
</div> 

<div id="excel">
<form action="export.php?acao=export_xls" method="post">
  <input type="text"  value="<?php echo $pega_login; ?>" name="login" id="login" hidden="hidden" />
  <input type="text"  value="<?php echo $pega_rota; ?>" name="rota" id="rota" hidden="hidden"/>
<input type="text"  value="<?php echo $pega_lista; ?>" name="lista" id="lista" hidden="hidden"/>
<input type='submit' value='EXPORTAR .XLS' name="submit"/>
<input type="text"  value="<?php echo $pega_listagem; ?>" name="listagem" id="listagem" hidden="hidden"/>
</form>
</div>

<div id="apDiv12">
<?php

if ($total==0){
echo "<font size='2' style='line-height:70px;'><strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;FILTRAGEM VAZIA! </strong>" . $guarda_nome . "</font>";
	
} else {

?>
<div id="total">
<table border="1" id="tabela" name="tabela" class="bordasimples" width="100%" >
<tr bgcolor="#589bd4" height="35px">
<td nowrap="nowrap" bgcolor="#589bd4"> 
<div align="center" style="font-family:Arial, Helvetica, sans-serif; font-size:10px;"><font color="#FFFFFF">STS</font></div>
</td>
<td height="10px" nowrap="nowrap" bgcolor="#589bd4"> 
<div align="center" style="font-family:Arial, Helvetica, sans-serif; font-size:10px;"><font color="#FFFFFF">GEO</font></div>
</td> 
<td height="10px" nowrap="nowrap" bgcolor="#589bd4"> 
<div align="center" style="font-family:Arial, Helvetica, sans-serif; font-size:10px;"><font color="#FFFFFF">IMGS</font></div>
</td> 
<td height="10px" nowrap="nowrap" bgcolor="#589bd4"> 
<div align="center"  style="font-family:Arial, Helvetica, sans-serif; font-size:10px;"><font color="#FFFFFF">EDIT</font></div>
</td> 
<td height="10px" nowrap="nowrap" bgcolor="#589bd4"> 
<div align="center" style="font-family:Arial, Helvetica, sans-serif; font-size:10px;"><font color="#FFFFFF">EXC.</font></div>
</td> 

<td  nowrap="nowrap" bgcolor="#589bd4"> 
<div align="center" style="font-family:Arial, Helvetica, sans-serif; font-size:10px;"><font color="#FFFFFF"><a href="#" onclick="autoSubmit_lista('login');">LOGIN</a></font></div>
</td>                                                                  
<td  nowrap="nowrap" bgcolor="#589bd4"> 
<div align="center" style="font-family:Arial, Helvetica, sans-serif; font-size:10px;"><font color="#FFFFFF"><a href="#" onclick="autoSubmit_lista('rota');">ROTA</a></font></div>
</td>                                                                  
<td  nowrap="nowrap" bgcolor="#589bd4"> 
<div align="center" style="font-family:Arial, Helvetica, sans-serif; font-size:10px;"><font color="#FFFFFF"><a href="#" onclick="autoSubmit_lista('sequencia');">SQ</a></font></div>
</td>

<td nowrap="nowrap" bgcolor="#589bd4"> 
<div align="center" style="font-family:Arial, Helvetica, sans-serif; font-size:10px;"><font color="#FFFFFF"><a href="#" onclick="autoSubmit_lista('idcliente');">ID</a></font></div>
</td> 
<td  nowrap="nowrap" bgcolor="#589bd4"> 
<div align="center" style="font-family:Arial, Helvetica, sans-serif; font-size:10px;"><font color="#FFFFFF"><a href="#" onclick="autoSubmit_lista('nome');">CLIENTE</a></font></div>
</td>
<td  nowrap="nowrap" bgcolor="#589bd4"> 
<div align="center" style="font-family:Arial, Helvetica, sans-serif; font-size:10px;"><font color="#FFFFFF"><a href="#" onclick="autoSubmit_lista('endereco');">ENDEREÇO</a></font></div>
</td>  
<td  nowrap="nowrap" bgcolor="#589bd4"> 
<div align="center" style="font-family:Arial, Helvetica, sans-serif; font-size:10px;"><font color="#FFFFFF"><a href="#" onclick="autoSubmit_lista('cidade');">CIDADE</a></font></div>
</td>

<td nowrap="nowrap" bgcolor="#589bd4"> 
<div align="center" style="font-family:Arial, Helvetica, sans-serif; font-size:10px;"><font color="#FFFFFF"><a href="#" onclick="autoSubmit_lista('dth_ocorrencia');">DATA VISITA</a></font></div>
</td>

<td  nowrap="nowrap" bgcolor="#589bd4"> 
<div align="center" style="font-family:Arial, Helvetica, sans-serif; font-size:10px;"><font color="#FFFFFF"><a href="#" onclick="autoSubmit_lista('ocorrencia');">OCORRÊNCIA</a></font></div>

<td  nowrap="nowrap" bgcolor="#589bd4"> 
<div align="center" style="font-family:Arial, Helvetica, sans-serif; font-size:10px;"><font color="#FFFFFF"><a href="#" onclick="autoSubmit_lista('tempo');">T. EST.</a></font></div>
</td>
<td  nowrap="nowrap" bgcolor="#589bd4"> 
<div align="center" style="font-family:Arial, Helvetica, sans-serif; font-size:10px;"><font color="#FFFFFF">T. REAL</font></div>
</td>

<td  nowrap="nowrap" bgcolor="#589bd4"> 
<div align="center" style="font-family:Arial, Helvetica, sans-serif; font-size:10px;"><font color="#FFFFFF"><a href="#" onclick="autoSubmit_lista('ce');">RAIO</a></font></div>
</td>
<td  nowrap="nowrap" bgcolor="#589bd4"> 
<div align="center" style="font-family:Arial, Helvetica, sans-serif; font-size:10px;"><font color="#FFFFFF"><a href="#" onclick="autoSubmit_lista('classificacao');">RN</a></font></div>
</td>
</td>
</tr>

<?php

$conta = 0;														
while($row = mysql_fetch_array($rs)){
		$conta++;	
		$r_id[$conta] = $row["id"];
		$r_cliente_id[$conta] = $row["idcliente"];
		$r_nome[$conta] = $row["rota"];
		$r_sequencia[$conta] = $row["sequencia"];
		$r_status[$conta] = $row["status"];
		$r_cliente_nome[$conta] =  $row["nome"];
		$r_cliente_endereco[$conta] = $row["endereco"];
		$r_cliente_cidade[$conta] = $row["cidade"];
		$r_cliente_x[$conta] = $row["x"];
		$r_cliente_y[$conta] = $row["y"];
		$r_cliente_ocorrencia[$conta] = $row["ocorrencia"];
		
		
	$status_icon = "";
	if($row["status"] == 3 ){ $status_icon = "imgs/status_preto.png"; }
	if($row["status"] == 2 ){ $status_icon = "imgs/status_vermelho.png"; }
	if($row["status"] == 0 ){ $status_icon = "imgs/status_amarelo.png"; }
	if($row["status"] == 1 ){ $status_icon = "imgs/status_verde.png"; }
	
	//echo $status_icon;

?>
<tr bgcolor="#F5F5F5">
<td align="center" bgcolor="#FFF" >
<?php 
$guarda1 = "step2_sm.php?id=" . $row["id"] ."&login=" . $row["login"] . "&rota=" . $row["rota"] . "&cli=". $row["idcliente"]. "&end=". $row["endereco"] . "&cid=". $row["cidade"] ."&seq=" . $row["sequencia"] ."&nome=" . $row["nome"] ."&status=" . $row["status"] ."&oco=" . $row["ocorrencia"]; 
?>
<a href="<?php echo $guarda1; ?>" data-tooltip="Editar status da visita"><img src="<?php echo $status_icon;?>" width="21" height="17" /></a></td>
<?php 
$guarda = "step2_gm.php?id=" . $row["id"] ."&x=" . $row["x"] . "&y=" . $row["y"] . "&cli=". $row["idcliente"]. "&end=". $row["endereco"] . "&cid=". $row["cidade"]; 
?>
  <td align="center" bgcolor="#FFF"><a href="<?php echo $guarda; ?>" data-tooltip="Localização do Cliente"><img src="imgs/icon_geomanual.png" width="21" height="16" alt=""/></a></td>
 <?php 
$guarda2 = "step2_gallery.php?id=" . $row["id"] ."&login=" . $row["login"] . "&rota=" . $row["rota"] . "&cli=". $row["idcliente"]. "&end=". $row["endereco"] . "&cid=". $row["cidade"] ."&seq=" . $row["sequencia"] ."&nome=" . $row["nome"] ."&status=" . $row["status"] ."&oco=" . $row["ocorrencia"]; 
	
	$id_visita = $row['id'];
	$query_img = "select * from images where id_visita='$id_visita'";
	$query_img = mysql_query($query_img);	
	
	$total = mysql_num_rows($query_img);
	//echo $total;
	
								

if($total!=0){
?>
	<td align="center" bgcolor="#FFF"><a href="<?php echo $guarda2; ?>" data-tooltip="Fotos da visita"><img src="imgs/icon_photo.png" width="21" height="16" alt=""/></a></td>
 <?php   
	} else {
?>
<td align="center" bgcolor="#FFF"></td>
<?php		
	}
?>


  
    <?php
	$guarda_edit = "step2_edit.php?codigo=". $row["id"]; 
	$guarda_status = "step2_mudastatus.php?rotas_id=". $row["id"]; 
	?>
   <td align="center" bgcolor="#FFF"><a href="<?php echo $guarda_edit; ?>" data-tooltip="Editar dados do cliente"><img src="imgs/editar.png" width="21" height="16" /></a></td>
   
  <td align="center" bgcolor="#FFF"><a href="javascript:confirmaExclusao('scripts.php?acao=exclui_cliente_base_cliente&id=<?php echo $row["id"] ?>')" data-tooltip="Excluir cliente"><img src="imgs/erro_cad.png" width="21" height="16"  /></a></td>         
  </font></strong>
</td>

<td align="center" bgcolor="#FFF" nowrap="nowrap" width="60px"> <?= $row["login"] ?></td>
<td bgcolor="#FFF" align="center" nowrap="nowrap" width="120px"> <?= $row["rota"] ?> </td>
<td bgcolor="#FFF" align="center" id="endereco"> <?= $row["sequencia"] ?> </td>

<td align="center" bgcolor="#FFF" nowrap="nowrap" width="60px" ><?= $row["idcliente"] ?></td> 
<td align="center" bgcolor="#FFF" nowrap="nowrap"> <?= $row["nome"] ?></td>
<td align="center" bgcolor="#FFF" nowrap="nowrap" ><?= $row["endereco"] ?></td>
<td align="center" bgcolor="#FFF" nowrap="nowrap" > <?= $row["cidade"] ?></td>
<?php 
//if($row["dth_ocorrencia"]=='' OR $row["dth_ocorrencia"]==date_format('30-11--0001 00:00:00', "d-m-Y H:i:s")){

//} else {
	
$date = new DateTime($row["dth_ocorrencia"]);
$dth_ocorrencia= date_format($date, "d-m-Y H:i:s");	

//}


if ($dth_ocorrencia=='30-11--0001 00:00:00' OR $dth_ocorrencia=='') {
	
	
$dth_ocorrencia = "Não visitado!";
}
?>
<td align="center" bgcolor="#FFF" nowrap="nowrap" width="100px"> <?php echo $dth_ocorrencia ?></td>
<?php
$oco = $row["ocorrencia"];
$query_qual = "select * from ocorrencia where id=$oco";														
$query_qual = mysql_query($query_qual);	
$dados = mysql_fetch_array($query_qual);
?>

<td align="center" bgcolor="#FFF"  nowrap="nowrap"> <?= $dados['ocorrencia']; ?></td>
    <?php 
if ($row["ce"]==true){
	$cerca = "Sim";
} else {	
	$cerca = "Não";
}
?>
<td align="center" bgcolor="#FFF" nowrap="nowrap" width="50px"> <?= $row["tempo"] . " min";  ?></td>
<?php 

$entra = $row["dth_chegada"];
$sai = $row["dth_saida"];

$data_login = strtotime($entra);
$data_logout = strtotime($sai);

$tempo_con = mktime(date('H', $data_logout) - date('H', $data_login), date('i', $data_logout) - date('i', $data_login), date('s', $data_logout) - date('s', $data_login));


//$tempo_visita = $sai - $entra;
?>
<td align="center" bgcolor="#FFF" nowrap="nowrap" width="50px"> <?= date('H:i:s', $tempo_con); ?></td>

<td align="center" nowrap="nowrap" bgcolor="#FFF" > <?= $cerca ?></td>                                                                                  
<td align="center" nowrap="nowrap" bgcolor="#FFF" > <?= $row["classificacao"] ?></td>

</tr>   
    <?php	
}

	
}
		
	

?>              
</table>

</div>
</div>


    
</div>
 <div id="Pagina" style="display: none;">
   <div id="botao"><a href="javascript:void(0);" onclick="document.getElementById('Pagina').style.display = 'none';" ><img src="imgs/botao_fechar.png" width="46" height="45" border="0" alt="FECHAR" /></a></div>
   
   <iframe src="form.php" name="pag1" frameborder=0 id="pag1" scrolling="no" marginheight="0" marginwidth="0"></iframe>
</div>                                                      

</body>
</html>