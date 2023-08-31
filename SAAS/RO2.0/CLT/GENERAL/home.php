<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//BR" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>::. ROTAS ONLINE .:: CADD</title>
<link rel="stylesheet" type="text/css" href="css/menu.css">
<link rel="stylesheet" type="text/css" href="css/home.css">
<link rel="shortcut icon" href="imgs/favicon.ico" >
<link rel="icon" type="image/gif" href="imgs/animated_favicon1.gif" >
<script src="js/logger.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
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


</SCRIPT>

<?php 

//cria sessão
$_Session['pagina'] = "DASHBOARD";



include ('session.php'); 
include ('essence/conecta.php');
ini_set('max_execution_time',3000);
?>
</head>
<div class="jquery-waiting-base-container"></div>
<body>
<?php include ('base3.php'); 


date_default_timezone_set('America/Sao_Paulo');

$today = date("H");


?>


<div id="apDiv11">

<table border="0">
<tr style="height: 45px; vertical-align: button">
<td>

<strong><font size="5">


 <?php 
if($today<12){
    $saudacao = "BOM DIA";
}
if($today>12){
    $saudacao = "BOA TARDE";
}
if($today>19){
    $saudacao = "BOA NOITE";
}
echo $saudacao . ", "  . $logado . "!"; 

?>

</font></strong></td>
</tr>

<tr style="height: 25px; vertical-align: top" >
<td>BEM VINDO AO CADD ROTAS ONLINE!</td>
</tr>
<tr style="height:30px;vertical-align: top">
<td><hr style="border: none; width:280px;" ></td>
</tr>
<tr style="height: 35px;vertical-align: button">
<td><strong><font size="4">VAMOS COMEÇAR!</font></strong></td>
</tr>
<tr style="height: 25px;vertical-align: top">
<td><hr style="border: none; width:165px;" ></td>
</tr>

</table>





<table>
<tr>
<td><i class="material-icons" style="color: #589bd4">touch_app</i></td>
<td><p style="font-size:12px">&nbsp;&nbsp;CLIQUE NO BOTÃO ABAIXO "IMPORTAR LISTA DE SERVIÇO" PARA COMEÇAR O TRABALHO!</p></td>
</tr>
<tr>
<td><i class="material-icons" style="color: #589bd4">notification_important</i></td>
<td><p style="font-size:12px">&nbsp;&nbsp;SÃO ACEITOS SOMENTE ARQUIVOS COM TERMINAÇÃO <strong>CSV</strong>, <strong>TXT</strong>, <strong>XLS</strong> E <strong>XLSX</strong>.</p></td>
</tr>
<tr>
<td><i class="material-icons" style="color: #589bd4">subject</i></td>
<td><p style="font-size:12px">&nbsp;&nbsp;OS BANCO DE DADOS PRECISÃO ESTAR NO FORMATO PREVIAMENTE DEFINITIDO!</p></td>
</tr>
</table>
 <br /> <br />
<div id="azulao"> <a href="step1.php">
  <input type="submit" name="submit" id="submit" value="IMPORTAR LISTA DE SERVIÇO"/>
  </a></div>
  <br /> <br />
  <table>

<tr>
<td><i class="material-icons">help</i></td>
<td><p style="font-size:12px;"><strong>DÚVIDAS?</strong> VEJA O <a href="https://www.youtube.com/watch?v=BsDQKDM5THc" target="_blank"><font size="2" color="#2867b1"><strong>TUTORIAL EM VIDEO</strong>!</a></p></td>
</tr>

</table>
</div>
<br>
</body>
</html>