<?php 
include ('session.php');
include ('essence/conecta.php');
ini_set('max_execution_time',12000);

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//BR" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="https://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>::. MONITORAMENTO .:: CADD</title>


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
	height: 204px;

	left: 0px;
	top: 50px;
	overflow-x: hidden;
	 overflow-y: scroll;
	
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
	  
	   font-family: Open Sans; 
	   
    }  
	
	input[type=submit]:hover{
		
	border: 1px solid #CCCCCC;
	background: #CCCCCC;
	
	color: #000;
	cursor:pointer;
		font-weight:bold;
    }  
	

.linque {
   color:#000;
	cursor:pointer;
	background: #FFF;

 }
	
.linque:hover {
   color:#000;
	cursor:pointer;
	background: #ECECEC;

 }
	
	
/* Customize the label (the container) */
.container {
	text-align: left;
  display: block;
  position: relative;
  cursor: pointer;
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
	
	font-family: Open Sans; 
	font-size: 10px;
}

/* Hide the browser's default radio button */
.container input {
  position: absolute;
  opacity: 0;
  cursor: pointer;
  height: 0;
  width: 0;
}

/* Create a custom radio button */
.checkmark {
  position: absolute;
	top: 6px;
  right: 10px;
  height: 15px;
  width: 15px;
  background-color: #eee;
  border-radius: 50%;
}

/* On mouse-over, add a grey background color */
.container:hover input ~ .checkmark {
  background-color: #ccc;
}

/* When the radio button is checked, add a blue background */
.container input:checked ~ .checkmark {
  background-color: #2196F3;
}

/* Create the indicator (the dot/circle - hidden when not checked) */
.checkmark:after {
  content: "";
  position: absolute;
  display: none;
}

/* Show the indicator (dot/circle) when checked */
.container input:checked ~ .checkmark:after {
  display: block;
}

/* Style the indicator (dot/circle) */
.container .checkmark:after {
  top: 5px;
  left: 5px;
  width: 5px;
  height: 5px;
  border-radius: 50%;
  background: white;
}
	
</style>
</head>
<div class="jquery-waiting-base-container"></div>
<body>
<div id="total2">
<table width="100%" border="0" cellpadding="0" cellspacing="0" style="background-color:#579bd3; font-size: 11px; color: white" >
    <tr>
		<td align="left" valign="center" colspan="3" height="50px"><i class="material-icons" style="font-size:22px; vertical-align:bottom;padding-left: 15px;">people_outline</i><strong><font size="2px">&nbsp;ATIVAR</font></strong>  
      </td>
    </tr>
</table>
</div>
 <div id="total">
  

      <form action="scripts.php?acao=altera_enable" method="POST" name="envia" id="envia">
		 
    


		  
<table width="100%" border="0" id="tabela" name="tabela" class="bordasimples" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">

<?php
		   
		     
           $campo = $_GET['check_list'];
           //print_r($campo) ;
           $conta_lista = count($campo);
           
           for ($i = 0; $i < $conta_lista; $i++) {
               $pega = "SELECT * FROM clientes WHERE codigo_cliente ='$campo[$i]'";
               $lista = mysql_query($pega);
              // echo $campo[$i];

              // Tirando o while
$dados = mysql_fetch_array($lista);

// Exibição


//echo "teste";               
                
       ?>
<tr class="linque">

<td align="center" width="100%">

<label class="container"><i class="material-icons" style="font-size:24px; vertical-align:middle; color: gray; align-content: center; padding-right: 3px; padding-left: 10px">account_circle</i><span style="vertical-align:inherit"><?php echo $dados['codigo_cliente'];?></span>
  <input type="radio" value="<?php echo $campo[$i];?>" name="RadioGroup1"  id="RadioGroup1">
  
</label>
	
 </td>
</tr>

<?php
}
		  
		 for ($i = 0; $i < $conta_lista; $i++) {
			?>
		
		  <input type="checkbox" hidden="hidden" class="marcar" name="check_list[]" id="check_list" checked='checked' value="<?php echo $campo[$i]; ?>">
		<?php		
			}
?>

</table>
</div>

<div id="total3">

<input type="submit" value="ATIVAR" name="enviar" />

</table>


</form>
	  
</div>
</body>
</html>