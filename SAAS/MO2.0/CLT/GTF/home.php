<?php 
include ('session.php');
include ('control/conecta.php');
ini_set('max_execution_time',12000);
  
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>::. MONITORAMENTO .:: CADD</title>
<link rel="stylesheet" type="text/css" href="css/menu.css">
<link rel="stylesheet" type="text/css" href="css/home.css">

<link rel="shortcut icon" href="imgs/favicon.ico" >
<link rel="icon" type="image/gif" href="imgs/animated_favicon1.gif" >
 
<script type='text/javascript' src="control/timer.js"></script>
<script src="js/logger.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<script LANGUAGE="JavaScript">


function mostraDIV(){
		document.getElementById("Pagina").style.display = "block";
		
}


function confirmaExclusao(aURL) {

if(confirm('Você tem certeza que deseja excluir essa Lista? Você perderá todas as analises relacionadas a ela no site!')) {

location.href = aURL;

//target=ver;

}
}


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



function acao6(quem) { 
		
		
        document.getElementById("Pagina").style.display = "block";
        
        
        
        var teste = "home_sm_edit.php?lista=";
        
        //alert(quem);
           
        teste = teste + quem;
        
        
        
         document.getElementById("pag2").src = teste; 
        
        
        }
        


</script>
<style>

    
#pag1{
position: absolute;
	width: 100%;
	left: 0px;
	top: 0px;
	height:100%;

z-index:9997;
background-color: white;
opacity: 0.95;
		
}
	#pag2{
width: 400px;
height: 200px;
top: 50%;
left: 50%;
margin-top: -100px;
margin-left: -200px;
position: absolute;
border: 1px solid silver;

	
	z-index:9998;
	

}

#botao{
	position: absolute;
	top: 50%;
	left: 50%;
		width: 30px;
		height: 30px;
        margin-top: -120px;
        margin-left: -220px;
	z-index:99999;
		
	}
	

</style>


</head>

<body>
<?php 

include ('base_cad.php'); 


if(isset($_GET['lista'])){
    $lista1 = $_GET["lista"];
}
?>

<div class="jquery-waiting-base-container">
 
</div>

<?php


date_default_timezone_set('America/Sao_Paulo');

$today = date("H");


?>


<div id="apDiv11">

<table border="0">
<tr style="height: 25px; vertical-align: button">
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
echo $saudacao . ", "  . $user . "!"; 


//echo $import;
?>

</font></strong></td>
</tr>

<tr style="height: 25px; vertical-align: top" >
<td>BEM VINDO AO DASHBOARD CADD MONITORAMENTO!</td>
</tr>
<tr style="height:50px;vertical-align: top">
<td><hr style="border: none; width:400px;" ></td>
</tr>

<?php


// SE FOR NIVEL 3 OU 1

if($nivel_acesso==3){

} else {
?>


<tr style="height: 35px;vertical-align: button">
<td><strong><font size="4">IMPORTAR/ATUALIZAR LISTA!</font></strong></td>
</tr>

<tr style="height: 25px;vertical-align: top">
<td><hr style="border: none; width:260px;" ></td>
</tr>

<tr>
<td>
		<a href="step1.php"><input type="submit" name="submit" id="submit" value="IMPORTAR/ATUALIZAR"/></a>
</td>
</tr>

 
<tr style="height: 25px;vertical-align: top">
<td></td>
</tr>
<tr style="height: 35px;vertical-align: button">
<td><strong><font size="4">LISTA DE VISITAS/ENTREGAS!</font></strong></td>
</tr>

<tr style="height: 25px;vertical-align: top">
<td><hr style="border: none; width:252px;" ></td>
</tr>

</table>









<?php
		$query1 = "select * from rotas group by lista order by max(id) DESC, statusrota DESC";
		$rs1 = mysql_query($query1);
		
	
	?>
   <div id="tabela">

  
<table width="100%" border="1" cellspacing="0" cellpadding="0" class="bordasimples">
<tr height="35px" align="center">
<td  bgcolor="#ECECEC" style="font-weight: bold; width:10%" >APP</td>
<td  bgcolor="#ECECEC" style="font-weight: bold; width:50%">NOME DA LISTA</td>
<td  bgcolor="#ECECEC" style="font-weight: bold; width:10%" >EDITAR</td>
<td  bgcolor="#ECECEC" style="font-weight: bold; width:10%"  >EXCLUIR</td>
<td  bgcolor="#ECECEC" style="font-weight: bold; width:10%"  >SITE</td>  
</tr>
    <?php
	 while($row1 = mysql_fetch_array($rs1)){
		$lista = $row1["lista"]; 
	  ?>
<tr bgcolor="#FFFFFF">
<td style="color:#000000;text-align: center" >
<?php 
	  if ($row1["statusrota"]==0){
		 ?>
         <a href="scripts.php?acao=ativa_lista&id=<?php echo $row1["lista"]; ?>">  <i class="material-icons" style="font-size:20px;color:black">check_box_outline_blank</i></a>
         <?php
	  } 
	  if ($row1["statusrota"]==1 OR $row1["statusrota"]==2 ){
      ?>
		<a href="scripts.php?acao=inativa_lista&id=<?php echo $row1["lista"]; ?>">  <i class="material-icons" style="font-size:20px;color:black;" >check_box</i></a>
          <?php
	  } 
  ?>
  </td>
      <td  style="color:#000000;"><?php echo $row1["lista"];	?></td>   
 <td style="text-align: center" ><a href="javascript:acao6('<?php echo $row1["lista"]; ?>');"><i class="material-icons" style="font-size:20px;color:black" >&#xe560;</i></a></td> 
 <td style="text-align: center"><a href="javascript:confirmaExclusao('scripts.php?acao=exclui_lista&id=<?php echo $row1["id_lista"] ?>')" data-tooltip="Excluir cliente"><i class="material-icons" style="font-size:20px;color:red">&#xe5c9;</i></a></td>    
<td style="text-align: center"> 
<?php
    if ($row1["site"]==0){
		
        ?>
        <a href="scripts.php?acao=ativa_site&id=<?php echo $row1["lista"]; ?>">  <i class="material-icons" style="font-size:20px;color:black">check_box_outline_blank</i></a>
        <?php
         } 
     if ($row1["site"]==1 OR $row1["site"]==2 ){ ?>
   <a href="scripts.php?acao=inativa_site&id=<?php echo $row1["lista"]; ?>">  <i class="material-icons" style="font-size:20px;color:black;" >check_box</i></a>
    <?php
     } 
   
?>
    </td>    
    
</tr>
    <?php
}
      
?>
<?php
}
 ?>

</table>


    

</div> 
 
</div>


<div id="Pagina" style="display: none;">
	  
   <div id="botao"><a href="javascript:void(0); " onclick="window.location.reload();" ><i class="material-icons" style="font-size:30px;color:black;">&#xe5c9;</i></a></div>
    <iframe name="pag1" frameborder="0" id="pag1" scrolling="no" marginheight="0" marginwidth="0" trusted="yes"></iframe>
   <iframe name="pag2" src="" frameborder=0 id="pag2" scrolling="no" marginheight="0" marginwidth="0" trusted="yes"></iframe>
</div>           


</body>
</html>