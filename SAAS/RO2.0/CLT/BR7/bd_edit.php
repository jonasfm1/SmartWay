<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>::. ROTAS ONLINE .:: CADD</title>
<link rel="stylesheet" type="text/css" href="css/menu_edit.css">
<link rel="stylesheet" type="text/css" href="css/step2_edit.css">

<link rel="shortcut icon" href="imgs/favicon.ico" >
 <link rel="icon" type="image/gif" href="imgs/animated_favicon1.gif" >
 
 
<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
<script src="http://maps.googleapis.com/maps/api/js?sensor=false&language=pt-BR&amp;libraries=places"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<script src="js/jquery.geocomplete.js"></script>
<script src="js/logger.js"></script>
<?php include ('session.php'); 
  require_once ("geocode.class.php");
  include ('essence/conecta.php');
  ini_set('max_execution_time',12000);
?>
<?php 
  $_codigo = $_GET["codigo"];
  //echo $_reg;
  
$query = "select * from db_geral WHERE codigo='$_codigo'";														
$query = mysql_query($query);

$dados = mysql_fetch_array($query);

  ?>
<script type="text/javascript">



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
</SCRIPT>

</head>

<body>

<?php include ('base2.php'); ?>
<div id="apDiv11">
<table width="100%" border="0" cellpadding="0" cellspacing="0">
    <tr>
      <td width="50" height="50"><strong><font size="+1"><img src="imgs/icon_config.png" width="50" height="50" /></font></strong></td>
      <td align="left" valign="middle"><strong><font size="+1">&nbsp;&nbsp;BANCO DE DADOS GERAL - EDITAR DADOS DO CLIENTE</font></strong>
    
      </td>
      <td width="50">
      </td>
    </tr>
</table>

  <div id="apDiv13b"><input type='submit' name='submit' value='VOLTAR' onclick="window.history.go(-1); return false;"/></div>
  
 <div id="apDiv12">
 <div id="total">
    <form name="editar" id="editar" action="scripts.php?acao=editar_cliente_bd" method="POST" onsubmit="return enviardados();"> 
  <table width="100%" cellspacing="0" cellpadding="0" style="border: 1px solid #579bd3;">
   <tr>
 <td height="25" style="color:#2867b2; font-size:11px; padding-left:10px; font-weight:bold"></td>
  </tr>
  <tr>
 <td height="65" style="color:#2867b2; font-size:11px; padding-left:80px; font-weight:bold">CÓD. CLIENTE:&nbsp;&nbsp;
    <input type="text" id="cod_cliente" name="cod_cliente" size="15px" style="height:25px; padding-left:10px" readonly="readonly" value="<?php echo $dados['codigo_cliente']; ?>">
    &nbsp;&nbsp;&nbsp;&nbsp;NOME DO CLIENTE:&nbsp;&nbsp;&nbsp;&nbsp;
    <input type="text" id="nome_cliente" name="nome_cliente" size="69px" style="height:25px; padding-left:10px" value="<?php echo $dados['nome']; ?>"></td>
  </tr>

 <tr>
  <td height="65" colspan="2" style="color:#2867b2; font-size:11px; padding-left:80px; font-weight:bold">ENDEREÇO:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <input type="text" id="endereco" name="endereco" size="110px" style="height:25px; padding-left:10px" value="<?php echo $dados['endereco']; ?>"></td>
  </tr>
<tr>
  <td height="65" colspan="2" style="color:#2867b2; font-size:11px; padding-left:80px; font-weight:bold">CIDADE:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <input type="text" id="cidade" name="cidade" size="40px" style="height:25px; padding-left:10px" value="<?php echo $dados['cidade']; ?>">
    &nbsp;&nbsp;&nbsp;&nbsp;UF:&nbsp;
    <input type="text" id="uf" name="uf" size="5px" style="height:25px; padding-left:10px" value="<?php echo $dados['estado']; ?>">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;CEP:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <input type="text" id="cep1" name="cep1" size="12px" style="height:25px; padding-left:10px" value="<?php echo $dados['cep']; ?>">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;SETOR:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <input type="text" id="setor" name="setor" size="12px" style="height:25px; padding-left:10px" value="<?php echo $dados['setor']; ?>"></td>
  </tr>
  <tr>

  <td height="65" colspan="2" style="color:#2867b2; font-size:11px; padding-left:80px; font-weight:bold">REDE:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<?php 
if ($dados['premium']=='R'){
?>

  <input name="rede" id="rede" type="checkbox" value="1" checked="checked"/>  
<?php }else{ ?>
  <input name="rede" id="rede" type="checkbox" value="1" />
  <?php  
}
  ?>
 
  </tr>
  
  
  
  <tr>
  <td height="65" colspan="2" style="color:#2867b2; font-size:11px; padding-left:80px; font-weight:bold" align="right" valign="bottom"><input id="update1" type="submit" value="ATUALIZAR" /></td>
    </tr>
  </tbody>
</table>
<input type="hidden" id="codigo" name="codigo" value="<?php echo $dados['codigo']; ?>">

<input type="hidden" id="confianca" name="confianca" value="<?php echo $dados['confianca_cad']; ?>">

<input type="hidden" id="codigo_db_geral" name="codigo_db_geral" value="<?php echo $dados['codigo_db_geral']; ?>">

</form>
  </div>                                       
                                        
  </div>
</div>



                                                         

</body>
</html>