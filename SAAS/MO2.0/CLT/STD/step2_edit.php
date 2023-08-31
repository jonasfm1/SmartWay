<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>::. ROTAS ONLINE .:: CADD</title>
<link rel="stylesheet" type="text/css" href="css/menu_edit.css">
<link rel="stylesheet" type="text/css" href="css/step2_edit.css">

<link rel="shortcut icon" href="imgs/favicon.ico" >
 <link rel="icon" type="image/gif" href="imgs/animated_favicon1.gif" >
 
 
<script type="text/javascript" src="https://maps.google.com/maps/api/js?sensor=false"></script>
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
  
$query = "select * from rotas WHERE id ='$_codigo'";														
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
<div id="apDiv11"><img src="imgs/bg_box_step2.png" width="447" height="82" />
  <div id="apDiv13_todos">
  <div id="apDiv13b"><input type='submit' name='submit' value='VOLTAR' onclick="location.href='step2.php';"/></div>
  </div>
  
 <div id="apDiv12">
 <div id="total">
    <form name="editar" id="editar" action="scripts.php?acao=editar_cliente" method="POST" onsubmit="return enviardados();"> 
  <table width="100%" cellspacing="0" cellpadding="0" style="border: 1px solid #579bd3;">
    <td height="65" colspan="2" bgcolor="#589bd4" style="color: #FFFFFF; padding-left:10px; font-size:14px; font-weight:bold ">EDITOR DE DADOS DO CLIENTE</td>
  </tr>
   <tr>
 <td height="25" style="color:#2867b2; font-size:11px; padding-left:10px; font-weight:bold"></td>
  </tr>
  <tr>
 <td height="65" style="color:#2867b2; font-size:11px; padding-left:80px; font-weight:bold">CÓD. CLIENTE:&nbsp;&nbsp;
    <input type="text" id="cod_cliente" name="cod_cliente" size="15px" style="height:25px; padding-left:10px" readonly="readonly" value="<?php echo $dados['idcliente']; ?>"><input type="text" id="id" name="id" size="15px" style="height:25px; padding-left:10px" readonly="readonly" value="<?php echo $dados['id']; ?>" hidden="hidden">
    &nbsp;&nbsp;&nbsp;&nbsp;NOME DO CLIENTE:&nbsp;&nbsp;&nbsp;&nbsp;
    <input type="text" id="nome_cliente" name="nome_cliente" size="69px" style="height:25px; padding-left:10px" value="<?php echo $dados['nome']; ?>" readonly="readonly"></td>
  </tr>

 <tr>
  <td height="65" colspan="2" style="color:#2867b2; font-size:11px; padding-left:80px; font-weight:bold">ENDEREÇO:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <input type="text" id="endereco" name="endereco" size="110px" style="height:25px; padding-left:10px" value="<?php echo $dados['endereco']; ?>" readonly="readonly"></td>
  </tr>
<tr>
  <td height="65" colspan="2" style="color:#2867b2; font-size:11px; padding-left:80px; font-weight:bold">CIDADE:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <input type="text" id="cidade" name="cidade" size="40px" style="height:25px; padding-left:10px" value="<?php echo $dados['cidade']; ?>" readonly="readonly">
    &nbsp;&nbsp;&nbsp;&nbsp;UF:&nbsp;
    <input type="text" id="uf" name="uf" size="5px" style="height:25px; padding-left:10px" value="<?php echo $dados['uf']; ?>" readonly="readonly">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;CEP:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <input type="text" id="cep1" name="cep1" size="12px" style="height:25px; padding-left:10px" value="<?php echo $dados['cep']; ?>" readonly="readonly"></td>
  </tr>
<tr>
  <td height="65" colspan="2" style="color:#2867b2; font-size:11px; padding-left:80px; font-weight:bold">ROTA:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <input type="text" id="rota" name="rota" size="28px" style="height:25px; padding-left:10px" value="<?php echo $dados['rota']; ?>">
    &nbsp;&nbsp;SEQUENCIA:&nbsp;
    <input type="text" id="sequencia" name="sequencia" size="28px" style="height:25px; padding-left:10px" value="<?php echo $dados['sequencia']; ?>" re></td>
      </td>
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