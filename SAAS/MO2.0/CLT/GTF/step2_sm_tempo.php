<?php 
include ('session.php');
include ('conecta.php');
ini_set('max_execution_time',12000);

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//BR" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>::. MONITORAMENTO .:: CADD</title>

<link href="https://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
    <link href="css/jquery.timesetter.css" rel="stylesheet">

    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
    <script type="text/javascript" src="js/jquery.timesetter.js"></script>


<link rel="shortcut icon" href="imgs/favicon.ico" >
<link rel="icon" type="image/gif" href="imgs/animated_favicon1.gif" >
<script type='text/javascript' src="control/timer.js"></script>
<script src="js/logger.js"></script>

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
  

    document.getElementById("hora").value = document.getElementById("txtHours").value;
    document.getElementById("minuto").value = document.getElementById("txtMinutes").value;
}
</script>
<style>
	
	


body{
	font-family: Open Sans; 
	
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
	font-size: 12px;

	padding: 2px 2px 2px 2px;
  font-weight:bold;

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
	height: 204px;

	left: 0px;
	top: 50px;
	overflow-x: hidden;
	 overflow-y: hidden;

   padding-top: 50px;
     padding-left: 30px;

	
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
	top: 254px;

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
	   padding: 5px;
	   font-family: Open Sans; 
	   
    }  
	
	input[type=submit]:hover{
		
	border: 1px solid #CCCCCC;
	background: #CCCCCC;
	
	color: #000;
	cursor:pointer;
		font-weight:bold;
    }  
	


</style>

<script>
$(document).ready(function ()
{
    var options1 = {
        hour: {
            value: 0,
            min: 0,
            max: 60,
            step: 1,
            symbol: ""
        },
        minute: {
            value: 0,
            min: 0,
            max: 60,
            step: 15,
            symbol: ""
        },
        direction: "increment", // increment or decrement
        inputHourTextbox: null, // hour textbox
        inputMinuteTextbox: null, // minutes textbox
        postfixText: "", // text to display after the input fields
        numberPaddingChar: '0' // number left padding character ex: 00052
    };

    $(".div1").timesetter(options1).setHour(1);



 //   alert(document.getElementById("txtHours").value );
 //   alert(document.getElementById("txtMinutes").value );
 
});
</script>
</head>
<div class="jquery-waiting-base-container"></div>
<body>



<div id="total2">
<table width="100%" border="0" cellpadding="0" cellspacing="0" style="background-color:#579bd3; font-size: 11px; color: white" >
    <tr>
		<td align="left" valign="center" colspan="3" height="50px"><i class="material-icons" style="font-size:22px; vertical-align:bottom;padding-left: 15px;">add_box</i><strong><font size="2px">&nbsp;ADICIONAR TEMPO DE VISITA</strong>  
      </td>
    </tr>
</table>
</div>
 <div id="total">
  

      <form action="scripts.php?acao=adiciona_tempo_visita_app" method="POST" name="envia" id="envia" onsubmit="return verificar();">
		 
       <?php
		   
		     
	    $campo = $_GET['check_list'];
        $conta_lista = count($campo);
        
        for ($i = 0; $i <= $conta_lista; $i++) {
        	$pega = "SELECT * FROM rotas WHERE id ='$campo[$i]'";
        	$lista = mysql_query($pega);
			
 }			
	?>



		  
<table width="100%" border="0" id="tabela" name="tabela" class="bordasimples" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">

<tr>
<td style="height: 40px;">
    Escolha abaixo o Tempo de Visita e clique em Aplicar.
</td>
</tr>
<tr >

<td align="left" width="100%">
<div class="div1"></div>
<input type="text" value="" id="hora" name="hora" hidden>
<input type="text" value="" id="minuto" name="minuto" hidden>
 </td>
</tr>

<?php

		  
		 for ($i = 0; $i < $conta_lista; $i++) {
			?>
		
		  <input type="checkbox" hidden="hidden" class="marcar" name="check_list[]" id="check_list" checked='checked' value="<?php echo $campo[$i]; ?>">
		<?php		
			}
?>

</table>
</div>

<div id="total3">

<input type="submit" value="APLICAR" id="calculo" />

</form>
	  
</div>
</body>
</html>