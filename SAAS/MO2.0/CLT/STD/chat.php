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
<link rel="stylesheet" type="text/css" href="css/chat.css">

<link rel="shortcut icon" href="imgs/favicon.ico" >
<link rel="icon" type="image/gif" href="imgs/animated_favicon1.gif" >
 
 
<script type='text/javascript' src="control/timer.js"></script>
<script src="js/logger.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<script LANGUAGE="JavaScript">


window.setInterval(function() {
  var elem = document.getElementById('tabela_dentro');
  elem.scrollTop = elem.scrollHeight;
}, 300);


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


//Require jQuery
function scrollSmoothToBottom (id) {
   var div = document.getElementById(id);
   $('#' + id).animate({
      scrollTop: div.scrollHeight - div.clientHeight
   }, 500);
}

</script>

</head>

<body onload="scrollSmoothToBottom('tabela_fora');">

<?php
$chat = $_GET["chat"];
?>
<div class="jquery-waiting-base-container"></div>

<?php include ('base_cad.php'); 



?>

<div id="interna">


<table border="0" style="padding-left:20px; color:#000000;"  cellpadding="0" cellspacing="0">




<tr>
    <td  align="left" nowrap="nowrap"  style="width: 20px;">
    <i class="material-icons" style="font-size:28px">account_box</i>
    </td>
    <td valign="button">
    <font size="4"><strong>&nbsp;CHAT CADD - <?php echo $chat;  ?></strong><span style="color: #000000"><?php echo $aviso_listatual; ?></span</font>
    
    </td>
   
</tr>
<tr style="height: 25px;vertical-align: button">
<td colspan="2"><hr style="border: none; width:100%;" ></td>

</tr>

<tr style="height: 25px;vertical-align: button">
<td colspan="2"></td>

</tr>
</table>


<div id="tabela_fora">

<div id="tabela_dentro">
  



<br>

<table border="0" style="width: 100%;" class="bordasimples">
<?php
$query1 = "select * from chat where chat='$chat' ORDER BY id ASC";													
$rs1 = mysql_query($query1);

// libera lido pelo site
$query2 = "UPDATE chat SET lido=1 WHERE de='$chat'";												
$rs2 = mysql_query($query2);

while($row1 = mysql_fetch_array($rs1)){	
?>
<tr>


<?php
$segura_de= $row1["de"];
if($row1["nivel"]==2){
?>
<td style="background-color:#F0F8FF ; width:50%;padding-left: 5px;  border: 12px solid #c7ced4;">

<table>
    <tr>
        <td style="width: 40px;vertical-align: top;" ><i class="material-icons" style="font-size:20px">stay_primary_portrait</i></td>

        <td>
            
<?php
echo $row1["msg"] ."<br><br>";
//echo $row1["data"];
$data = $row1["data"];
echo "<strong>" . date('d/m/Y H:i:s', strtotime($data)) . "</strong>"; 

?>

        </td>
    </tr>
</table>



</td>

<td>

</td>

<?php
} else {
?>
<td>

</td>
    <td align="right" style="padding-right: 5px; background-color: #f1f1f1; width:50%; border: 12px solid #c7ced4;">

<table>
<tr>
<td style="width: 40px;vertical-align: top;"> <i class="material-icons" style="font-size:20px">desktop_mac</i></td>
<td> 
    <?php
    echo  $row1["msg"] ."<br><br>";
    $data = $row1["data"];
    echo  "<strong>" . date('d/m/Y H:i:s', strtotime($data)) . "</strong>"; 
    ?></td>
    
</td>

</tr>

</table>

  
    
   
<?php
}
?>






</tr>

<?php

}
?>
</table>

<br>

</div>

</div>
<br><br>
<form action="scripts.php?acao=inserir_chat" method="POST">
<table border="0" class="tabela_dentro">

<tr>
<td style="padding-left:16px">
  
<input type="text" size="123px" name="texto" style="height: 30px;">

<input type="text" name="usuario" value="<?php echo $chat; ?>" hidden>
<input type="text"name="site" value="<?php echo $user; ?>" hidden>
  
</td>
<td>
<input type="submit">

</td>
</tr>
</table>

</form>  
<br><br>
<form action="step7.php" method="POST">
<input type="submit" value="VOLTAR CHAT"style="margin-left:20px">
</form><br>
<form action="step2.php" method="POST">
<input type="submit" value="VOLTAR PAINEL" onclick="goBack()" style="margin-left:20px">
</form>
</div>
</body>
</html>