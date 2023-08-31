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
<script LANGUAGE="JavaScript">

function toggleFullScreen() {
    if (!document.fullscreenElement && !document.msFullscreenElement && !document.mozFullScreenElement && !document.webkitFullscreenElement) {
        if (document.body.requestFullscreen) {
            document.body.requestFullscreen();
        } else if (document.body.msRequestFullscreen) {
            document.body.msRequestFullscreen();
        }else if (document.body.mozRequestFullScreen) {
            document.body.mozRequestFullScreen();
        }else if (document.body.webkitRequestFullscreen) {
            document.body.webkitRequestFullscreen();
        }
    } else {
        if (document.exitFullscreen) {
            document.exitFullscreen();
        } else if (document.msExitFullscreen) {
            document.msExitFullscreen();
        }else if (document.mozCancelFullScreen) {
            document.mozCancelFullScreen();
        }else if (document.webkitCancelFullScreen) {
            document.webkitCancelFullScreen();
        }
    }
}

	

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
     
     }

     this.fullScreenMode= !this.fullScreenMode

}
	

function rollover(my_image, qual)
    {
     my_image.src = qual;
    }
	
function AbreFechaDiv(qualdiv) {

var objeto = document.getElementById(qualdiv);


if(objeto.style.display == 'none') {
objeto.style.display = 'block';

} else {
objeto.style.display = 'none';
}
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
	
function verificar() {
    var check = document.getElementsByName("RadioGroup1"); 
	var x=0
    for (var i=0;i<check.length;i++){ 
        if (check[i].checked == true){ 
            // CheckBox Marcado... Faça alguma coisa...
//alert("SIM");
        }  else {
			
			x++;
           // CheckBox Não Marcado... Faça alguma outra coisa...
        }
		
		
    }
	if(x==i){
	   
	alert("MENSAGEM: EQUIPE CADDESIGN\nNenhum LOGIN foi escolhido!\nComo padrão, a atualização será feita com o primeiro LOGIN da lista!");
//	break;
	
		check[0].checked = true;
	   }
}
</script>
<style>
	
	
    input[type=text]{
border: 1px solid #d3d5d6;
	
	height: 30px;
	padding-left:2px;
	width:450px;
	font-size: 11px;
	}

body{
	font-family: Open Sans; 
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
	
	font-size: 10px;
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
	top: 340px;

font-size: 11px;
	
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

</style>
</head>

<?php 
  $_codigo = $_GET["codigo"];
  echo $_codigo;
  
$query = "select * from clientes WHERE codigo_cliente='$_codigo'";														
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
 <td height="35"   font-size:11px; padding-left:10px; font-weight:bold"></td>
  </tr>
  <tr>
      <td>
      CÓDIGO DO CLIENTE:
      </td>
 <td height="30"   font-size:11px; font-weight:bold">
   <strong>&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $dados['codigo_cliente']; ?></strong>
   <input type="hidden" id="cod_cliente" name="cod_cliente" size="69px" style="height:25px; padding-left:10px" value="<?php echo $dados['codigo_cliente']; ?>" required></td>
</td>
  </tr>
  <tr>
  <td>
  NOME DO CLIENTE:
          </td>
 <td height="35"   font-size:11px; font-weight:bold">
    <input type="text" id="nome_cliente" name="nome_cliente" size="69px" style="height:25px; padding-left:10px" value="<?php echo $dados['nome']; ?>" required></td>
  </tr>
 <tr>
 <td>
 ENDEREÇO:
          </td>
  <td height="35"   font-size:11px; font-weight:bold">
    <input type="text" id="endereco" name="endereco" size="50px" style="height:25px; padding-left:10px" value="<?php echo $dados['endereco']; ?>"required></td>
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


</div>

<div id="total3">

<input id="update1" type="submit" value="ATUALIZAR" />

</table>


</form>
	  
</div>
</body>
</html>