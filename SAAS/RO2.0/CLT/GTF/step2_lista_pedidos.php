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
	border:1px solid #ECECEC;
	}

table.bordasimples1 tr td {
	
	font-size: 10px;
	padding: 2px 2px 2px 2px;

}

#scroll{
	position: absolute;
	width: 100%;
	height: 50px;


}

 #total{
	position: absolute;
	width: 100%;
	height: 354px;

	left: 0px;
    top: 50px;

		overflow-x: hidden;
	 overflow-y: auto;
	
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
  //echo $_codigo;
  
$query = "select * from clientes WHERE codigo_cliente='$_codigo'";														
$query = mysql_query($query);

///$dados = mysql_fetch_array($query);

  ?>
<div class="jquery-waiting-base-container"></div>
<body>
<div id="total2">
<table width="100%" border="0" cellpadding="0" cellspacing="0" style="background-color:#579bd3; font-size: 11px; color: white" >
    <tr>
		<td align="left" valign="center" colspan="3" height="50px"><i class="material-icons" style="font-size:22px; vertical-align:bottom;padding-left: 15px;">assignment_returned</i><strong><font size="2px">&nbsp;PEDIDOS - CLIENTE <?php echo $_codigo; ?></font></strong>  
      </td>
    </tr>
</table>
</div>
 <div id="total">
  <div id="scroll">
<table border="1" class="bordasimples" width='100%'>
  <tr height='30px' style="font-weight: bold;text-align: left;background-color: #ECECEC;">
    <td style="text-align: left;background-color: #ECECEC;">PEDIDO</td>
    <td>PRODUTO</td>
    <td>PESO</td>
    <td>VOLUME</td>
    <td>VALOR</td>
  </tr>
  <?php
while($row = mysql_fetch_array($query)){
  ?>
<tr>
<td><?php echo $row['codigo_pedido']?></td>
<td><?php echo $row['produto']?></td>
<td><?php echo $row['peso']?></td>
<td><?php echo $row['volume']?></td>
<td><?php echo $row['valor']?></td>

<?php
}
?>
</tr>

</table>
</div>
</div>
</body>
</html>