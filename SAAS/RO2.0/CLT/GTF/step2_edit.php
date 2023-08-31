<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>::. ROTAS ONLINE .:: CADD</title>

<link rel="stylesheet" type="text/css" href="css/step2_edit.css">

<link rel="shortcut icon" href="imgs/favicon.ico" >
 <link rel="icon" type="image/gif" href="imgs/animated_favicon1.gif" >
 
 
<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
<script src="https://maps.googleapis.com/maps/api/js?sensor=false&language=pt-BR&amp;libraries=places"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
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
  
$query = "select * from clientes WHERE codigo='$_codigo'";														
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


<div id="apDiv11">
<table width="100%" border="0" cellpadding="0" cellspacing="0">
    <tr>
      <td width="50" height="50"><strong><font size="+1"><img src="imgs/icon_config.png" width="50" height="50" /></font></strong></td>
      <td align="left" valign="middle"><strong><font size="+1">&nbsp;&nbsp;EDITAR DADOS DO CLIENTE</font></strong>
    
      </td>
      <td width="50">
      </td>
    </tr>
</table>

  <div id="apDiv13b"><input type='submit' name='submit' value='VOLTAR' onclick="window.history.go(-1); return false;"/></div>
  
 <div id="apDiv12">
 <div id="total">
    
    <form name="editar" id="editar" action="scripts.php?acao=editar_cliente" method="POST" onsubmit="return enviardados();"> 
  <table width="100%" cellspacing="0" cellpadding="0" style="border: 1px solid #579bd3;">
   <tr>
 <td height="25"   font-size:13px; padding-left:10px; font-weight:bold"></td>
  </tr>
  <tr>
 <td height="65"   font-size:10px; font-weight:bold">CÓD. CLIENTE:
    <input type="text"  id="cod_cliente" name="cod_cliente" size="15px"  style="height:25px; padding-left:10px" readonly="readonly" value="<?php echo $dados['codigo_cliente']; ?>">
    NOME DO CLIENTE:
    <input type="text" id="nome_cliente" name="nome_cliente" size="69px" style="height:25px; padding-left:10px" value="<?php echo $dados['nome']; ?>" required></td>
  </tr>

 <tr>
  <td height="65"   font-size:10px; font-weight:bold">ENDEREÇO:
    <input type="text" id="endereco" name="endereco" size="50px" style="height:25px; padding-left:10px" value="<?php echo $dados['endereco']; ?>"required>BAIRRO:
   <input type="text" id="bairro" name="bairro" size="42px" style="height:25px; padding-left:10px" value="<?php echo $dados['bairro']; ?>"required></td>
  </tr>
<tr>
  <td height="65" colspan="2"   font-size:11px; font-weight:bold">CIDADE:
    <input type="text" id="cidade" name="cidade" size="40px" style="height:25px; padding-left:10px" value="<?php echo $dados['cidade']; ?>"required>
    UF:
    <input type="text" id="uf" name="uf" size="5px" style="height:25px; padding-left:10px" value="<?php echo $dados['estado']; ?>"required>CEP:
    <input type="text" id="cep1" name="cep1" size="12px" style="height:25px; padding-left:10px" value="<?php echo $dados['cep']; ?>"required></td>
  </tr>
<tr>
  <td height="65" colspan="2"   font-size:11px; font-weight:bold">PESO:
    <input type="text" id="peso" name="peso" size="28px" readonly="readonly" style="height:25px; padding-left:10px" value="<?php echo $dados['peso']; ?>" >
    VOLUME:
    <input type="text" id="volume" name="volume" size="28px" readonly="readonly" style="height:25px; padding-left:10px" value="<?php echo $dados['volume']; ?>" >VALOR:
    <input type="text" id="valor" name="valor" size="28px" readonly="readonly" style="height:25px; padding-left:10px" value="<?php echo $dados['valor']; ?>" ></td>
      </td>
    </tr>
 
  <tr>
  <td height="65" colspan="2"   font-size:11px; font-weight:bold" align="right" valign="bottom"><input id="update1" type="submit" value="ATUALIZAR" /></td>
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