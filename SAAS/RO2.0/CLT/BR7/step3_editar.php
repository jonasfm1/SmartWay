<?php 
include ('session.php');
include ('essence/conecta.php');
ini_set('max_execution_time',12000);

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//BR" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>::. CADD .::</title>


<link rel="shortcut icon" href="imgs/favicon.ico" >
<link rel="icon" type="image/gif" href="imgs/animated_favicon1.gif" >
<script type='text/javascript' src="control/timer.js"></script>
<script src="js/logger.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Open+Sans" />
  <link href="css/bootstrap.min.css"  rel="stylesheet" media="screen">
<link href="css/bootstrap-datetimepicker.min.css"  rel="stylesheet" media="screen">


  <script src="js/bootstrap-datetimepicker.min.js"></script>
  <script src="js/locales/bootstrap-datetimepicker.pt-BR.js"></script>
  
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
	

  </script>


<style>
	
	
    input[type=text]{
border: 1px solid #d3d5d6;
	
	height: 30px;
	padding-left:2px;
	width:360px;
	font-size: 11px;
	}

body{
	font-family: Arial, Helvetica, sans-serif;
	font-size: 11px;
}
	
.jquery-waiting-base-container {
	position: absolute;
	left: 0px;
	top: 0px;
	margin: 0px;
	width: 100%;
	height: 100%;
	display: block;
	z-index: 99997;
	opacity: 1;
	filter: alpha(opacity = 100);
	background-color:#FFF;
	
	background-image: url("./imgs/loading.gif");
	background-repeat: no-repeat;
	background-position: 50% 35%;
	padding-top: 70px;
}


table.bordasimples {
	border-collapse: collapse;
	}

table.bordasimples tr td {
	font-family: Open Sans; 
	font-size: 10px;
	border:1px solid #ECECEC;
	padding: 2px 2px 2px 2px;

}

table.bordasimples1 {
	border-collapse: collapse;
	border:1px solid #589bd4;
	}

table.bordasimples1 tr td {
	
	font-size: 9px;
	padding: 2px 2px 2px 2px;

}



 #total{
	position: absolute;
	width: 100%;
	height: 320px;

	left: 0px;
    top: 45px;
    padding-left: 40px;
	
	
  }

 #total2{
	position: absolute;
	width: 100%;
	height: 50px;
	background-color: #ECECEC;
	left: 0px;
	top: 0px;
	
	
  }
  

 #total3{
	position: relative;
	width: 100%;
	 height: 50px;
	
	
	background-color: #579bd3;
	left: 0px;
	top: 440px;

font-size: 9px;
	
  }


input[type=submit] {  
	color: #000;

		background: #ECECEC;
	border: 1px solid #ECECEC;
	font-size:11px;	
	height: 40px;
	width:100%;
	font-weight:bold;
	text-transform: uppercase;
	  
	   font-family: Open Sans; 
	   
    }  
	
	input[type=submit]:hover{
		
	border: 1px solid #CCCCCC;
	background: #CCCCCC;
	
	color: #000;
	cursor:pointer;
		font-weight:bold;
    }  
	


::-webkit-scrollbar-track {
    background-color: #F4F4F4;
}
::-webkit-scrollbar {
    width: 6px;
    background: #000000;
}
::-webkit-scrollbar-thumb {
    background: #d3d5d6;
}


::-webkit-scrollbar-track:horizontal {
    background-color: #F4F4F4;
 }

 ::-webkit-scrollbar:horizontal {
  
    height: 6px;
    background: #000000;
}
::-webkit-scrollbar-thumb:horizontal {
    background: #d3d5d6;
}


/* Add this attribute to the element that needs a tooltip */
[data-tooltip] {
  position: relative;
  z-index: 2;
  cursor: pointer;
    font-size:10px;

}

/* Hide the tooltip content by default */
[data-tooltip]:before,
[data-tooltip]:after {
  visibility: hidden;
  -ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=0)";
  filter: progid: DXImageTransform.Microsoft.Alpha(Opacity=0);
  opacity: 0;
  pointer-events: none;
}

/* Position tooltip above the element */
[data-tooltip]:before {
  position: absolute;
  bottom: 24px;
  left:92px;
  margin-bottom: 5px;
  margin-left: -80px;
  padding: 7px;
  width: 120px;

  background-color: #000;
  background-color: hsla(0, 0%, 20%, 0.9);
  color: #fff;
  content: attr(data-tooltip);
  text-align: center;
  font-size: 11px;
  line-height: 1.2;
}

/* Triangle hack to make tooltip look like a speech bubble */
[data-tooltip]:after {
  position: absolute;
  bottom: 24px;
  left: 96px;
  margin-left: -78px;
  width: 0;
  border-top: 5px solid #000;
  border-top: 5px solid hsla(0, 0%, 20%, 0.9);
  border-right: 5px solid transparent;
  border-left: 5px solid transparent;
  content: " ";

  line-height: 0;
}

/* Show tooltip content on hover */
[data-tooltip]:hover:before,
[data-tooltip]:hover:after {
  visibility: visible;
  -ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=100)";
  filter: progid: DXImageTransform.Microsoft.Alpha(Opacity=100);
  opacity: 1;
}


</style>
</head>

<?php 
  $_codigo = $_GET["codigo"];
  echo $_codigo;
  
$query = "select * from clientes WHERE codigo_pedido='$_codigo'";														
$query = mysql_query($query);

$dados = mysql_fetch_array($query);

  ?>
<div class="jquery-waiting-base-container"></div>
<body>
<div id="total2">
<table width="100%" border="0" cellpadding="0" cellspacing="0" style="background-color:#579bd3; font-size: 11px; color: white" >
    <tr>
		<td align="left" valign="center" colspan="3" height="50px"><i class="material-icons" style="font-size:22px; vertical-align:bottom;padding-left: 15px;">people_outline</i><strong><font size="2px">&nbsp;EDITAR CLIENTE  - <?php echo $_codigo; ?></font></strong>  
      </td>
    </tr>
</table>
</div>
 <div id="total">
  

  
		  
      <form name="editar" id="editar" action="scripts.php?acao=editar_cliente" method="POST"> 
  <table width="100%" cellspacing="0" cellpadding="0">
   <tr>
 <td height="30"   style:"font-size:11px; padding-left:10px; font-weight:bold"></td>
  </tr>
  
<tr>
  <td height="25" >
  AGENDADO:
          </td>
<td height="25" colspan="2"   font-size:11px; font-weight:bold">
<?php
if($dados['filtroesp1']=='A'){
?>
<input type ="checkbox" name="agendado" checked></input>
<?php
} else {
?>
<input type ="checkbox" name="agendado"></input>
<?php
}


$data_mysql = explode('-', $dados['data_agendado']);


$day   = $data_mysql[2];
$month = $data_mysql[0];
$year  = $data_mysql[1];

$data_formatada = $data_mysql[2] . '-' . $data_mysql[1] . '-' . $data_mysql[0];



?>

</tr>
<tr >
  <td>DATA AGENDADO:</td>
  <td height="45">

  <div class="input-group date data_formato" data-date-format="dd-mm-yyyy">
  <input type="text" class="form-control" name="data" value="<?php echo $data_formatada ?>" style="width: 80px;height: 25px; font-size:11px;font-weight: bold;padding-left:10px" >
       <span class="input-group-addon" >
         <span class="glyphicon glyphicon-th" style="height: 10px;font-size:11px;"></span>
       </span>
     </div>



  </td>
</tr>
<tr>
  <td>OBS. AGENDADO:</td>
  <td>
  <input type="text" id="obs_agendada" name="obs_agendada" size="12px" style="height:25px; padding-left:10px" value="<?php echo $dados['obs_agendado'] ?>"></td>


  </td>
</tr>
  <tr>
      <td>
      CÓDIGO DO CLIENTE:
      </td>
 <td height="35"   font-size:11px; font-weight:bold">
   <strong>&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $dados['codigo_cliente']; ?></strong>
   <input type="hidden" id="cod_cliente" name="cod_cliente" size="49px" style="height:25px; padding-left:10px" value="<?php echo $dados['codigo_cliente']; ?>" required></td>
</td>
  </tr>
  <tr>
  <td>
  NOME DO CLIENTE:
          </td>
 <td height="35"   font-size:11px; font-weight:bold">
    <input type="text" id="nome_cliente" name="nome_cliente" size="20px" style="height:25px; padding-left:10px" value="<?php echo $dados['nome']; ?>" required></td>
  </tr>
 <tr>
 <td>
 ENDEREÇO:
          </td>
  <td height="35"   font-size:11px; font-weight:bold">
    <input type="text" id="endereco" name="endereco" size="20px" style="height:25px; padding-left:10px" value="<?php echo $dados['endereco']; ?>"required></td>
  </tr>
<tr>
<tr>
<td>
BAIRRO:
          </td>
  <td height="35"   font-size:11px; font-weight:bold">
   <input type="text" id="bairro" name="bairro" size="42px" style="height:25px; padding-left:10px" value="<?php echo $dados['bairro']; ?>"required></td>
  </tr>
<tr>
<td>
CIDADE:  
          </td>
  <td height="35" colspan="2"   font-size:11px; font-weight:bold">
    <input type="text" id="cidade" name="cidade" size="40px" style="height:25px; padding-left:10px" value="<?php echo $dados['cidade']; ?>"required></td>
  </tr>
  <tr>
  <td>
  UF:
          </td>
  <td height="35" colspan="2"   font-size:11px; font-weight:bold">
    <input type="text" id="uf" name="uf" size="5px" style="height:25px; padding-left:10px" value="<?php echo $dados['estado']; ?>"required></td>
  </tr>
  <tr>
  <td>
  CEP:
          </td>
<td height="35" colspan="2"   font-size:11px; font-weight:bold">
  <input type="text" id="cep1" name="cep1" size="12px" style="height:25px; padding-left:10px" value="<?php echo $dados['cep']; ?>"required></td>
</tr>
  </tbody>
</table>
<input type="hidden" id="codigo" name="codigo" value="<?php echo $dados['codigo']; ?>">
<input type="hidden" id="confianca" name="confianca" value="<?php echo $dados['confianca_cad']; ?>">
<input type="hidden" id="codigo_db_geral" name="codigo_db_geral" value="<?php echo $dados['codigo_db_geral']; ?>">
<input type="hidden" id="premium" name="premium" value="<?php echo $dados['premium']; ?>">

<input type="hidden" id="codigo_pedido" name="codigo_pedido" value="<?php echo $dados['codigo_pedido']; ?>">
</div>

<div id="total3">

<input id="update1" type="submit" value="ATUALIZAR" />

</table>


</form>
	  
</div>


<script>
    $('.data_formato').datetimepicker({
      weekStart: 0,
      minView: 2,
      maxView: 2,
      todayBtn: 1,
      autoclose: 1,
      todayHighlight: 1,
      startView: 2,
      forceParse: 0,
      showMeridian: 1,
      language: "pt-BR",
      startDate: '+0d'
    });
  </script>


</body>
</html>