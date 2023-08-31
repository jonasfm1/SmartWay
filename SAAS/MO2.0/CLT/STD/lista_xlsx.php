<?php 
include ('session.php');

include ('conecta.php');
ini_set('max_execution_time',12000);
  
  
$lg = $_GET['lg'];
$n= $_GET['n'];
$st= $_GET['st'];
$at= $_GET['at'];

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>::. MONITORAMENTO .:: CADD</title>
<link rel="stylesheet" type="text/css" href="css/menu.css">
<link rel="stylesheet" type="text/css" href="css/lista_xlsx.css">

<link rel="shortcut icon" href="imgs/favicon.ico" >
<link rel="icon" type="image/gif" href="imgs/animated_favicon1.gif" >
 
 
<script type='text/javascript' src="control/timer.js"></script>
<script src="js/logger.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
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
</script>

</head>
<div class="jquery-waiting-base-container"></div>
<body>

<div id="apDiv11">

	<div id="total2">
  

  <div id="apDiv12">

<?php
$pasta = 'uploads/';
if(is_dir($pasta)){
$diretorio = dir($pasta);
while($arquivo = $diretorio->read()){
if($arquivo != '..' && $arquivo != '.'){
$arrayArquivos[date('Y/m/d H:i:s', filemtime($pasta.$arquivo))] = $arquivo;
}
}
$diretorio->close();
} 
krsort($arrayArquivos, SORT_STRING);


?>


   <table width="100%" border="0" id="tabela" name="tabela" class="bordasimples" cellpadding="0" cellspacing="0">
<tr bgcolor="#DADADA">
<td bgcolor="#589bd4" width="6%" style="color:#FFFFFF; font:arial; font-size:12px; height:25px; padding-left: 10px"> 
<div align="left"><font color="#FFFFFF"><span>NOME DA ROTA</span></font></div>
</td>
</tr>
<?php
foreach($arrayArquivos as $valorArquivos){	
?>
<tr>

<td align="left" height="20" style="color:#FFFFFF; font:arial; padding-left: 10px;"><?php echo "<a href='uploads/".$valorArquivos."'>".$valorArquivos."</a><br />"; ?></td>

</tr>
<?php

}
?>
</table>


  
  </div> 
	 <br>
		<input type='submit' name='submit' value='VOLTAR' onclick="window.history.go(-1);"/>
  
</div>
	</div>
</body>
</html>