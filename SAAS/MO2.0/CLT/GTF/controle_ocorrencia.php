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
<link rel="stylesheet" type="text/css" href="css/controle_ocorrencia.css">

<link rel="shortcut icon" href="imgs/favicon.ico" >
<link rel="icon" type="image/gif" href="imgs/animated_favicon1.gif" >
 
 
<script type='text/javascript' src="control/timer.js"></script>
<script src="js/logger.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
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

</head>

<body>

<div class="jquery-waiting-base-container"></div>
<div id="div_titulo">
	  	<table width="100%" border="0" cellpadding="0" cellspacing="0">
    <tr>

     	   <td align="left" valign="middle"><font size="3">CONTROLE DE OCORRÊNCIA</font></td>
     
		
    </tr>
</table>

	</div>
<?php include ('base_cad.php'); ?>

<div id="interna">


<table border="0" style="padding-left:20px; color:#000000;"  cellpadding="0" cellspacing="0">
<tr>
    <td  align="left" nowrap="nowrap"  style="width: 20px;">
    <i class="material-icons" style="font-size:28px">account_box</i>
    </td>
    <td valign="button">
    <font size="4"><strong>&nbsp;EDITAR OCORRÊNCIA</strong><span style="color: #000000"><?php echo $aviso_listatual; ?></span</font>
    
    </td>
   
</tr>
<tr style="height: 25px;vertical-align: button">
<td colspan="2"><hr style="border: none; width:226px;" ></td>

</tr>

<tr style="height: 25px;vertical-align: button">
<td colspan="2"></td>
</tr>

<tr style="height: 25px;vertical-align: button">
<td colspan="2">


<table width="391" border="1" cellpadding="0" cellspacing="0" class="bordasimples1" background="#FFFFFF">
   <form action="scripts.php?acao=update_ocorrencia" method="post">
      <tbody>

        <tr>
          <td width="60">&nbsp;&nbsp;&nbsp;NOME:</td>
           
          <td colspan="6" align="left" valign="middle" ><input name="nome" type="text" id="nome" value="<?php echo $n;?>" size="40"/>
          <input name="id" type="text" id="id" value="<?php echo $lg;?>" hidden="hidden"/>
          </td>
       
          </tr>
          <tr>
          <td width="60">&nbsp;&nbsp;&nbsp;STATUS:</td>
           
          <td colspan="6" align="left" valign="middle" >
          <input type="radio" id="status" name="status" value="1" <?php if($st == 1 ){ echo "checked";}?>/>
          &nbsp;&nbsp;&nbsp;POSITIVADOS&nbsp;&nbsp;&nbsp;
          <br>
          <input type="radio" id="status" name="status" value="2" <?php if($st == 2 ){ echo "checked";}?>/>
          &nbsp;&nbsp;&nbsp;NEGATIVADOS&nbsp;&nbsp;&nbsp;
          <br>
          <input type="radio" id="status" name="status" value="3" <?php if($st == 3 ){ echo "checked";}?>/>
          &nbsp;&nbsp;&nbsp;ALERTAS&nbsp;&nbsp;&nbsp;
          </td>
       
          </tr>



     
          <td colspan="7" align="right"><input type="submit" name="submit" id="submit" value="ALTERAR" /></td>
        </tr>
      </tbody>
      </form>
    </table>
   
</td>

</tr>

<tr style="height: 45px;vertical-align: button">
<td colspan="2"></td>
</tr>

<tr>
    <td  align="left" nowrap="nowrap"  style="width: 20px;">
    <i class="material-icons" style="font-size:28px">account_box</i>
    </td>
    <td valign="button">
    <font size="4"><strong>&nbsp;LISTA DE OCORRÊNCIAS</strong><span style="color: #000000"><?php echo $aviso_listatual; ?></span</font>
    
    </td>
   
</tr>
<tr style="height: 25px;vertical-align: button">
<td colspan="2"><hr style="border: none; width:238px;" ></td>

</tr>

<tr style="height: 25px;vertical-align: button">
<td colspan="2"></td>

</tr>
</table>


<div id="tabela_fora">

<div id="tabela_dentro">
  



<table width="100%" border="1" id="tabela" name="tabela" class="bordasimples" cellpadding="0" cellspacing="0">
<tr>

	  
<table width="100%" border="1" id="tabela" name="tabela" class="bordasimples" cellpadding="0" cellspacing="0">
<tr>
<td bgcolor="#ECECEC" height="35" width="40px" style="color:#000000; position: " > 
<div align="center"><font color="#000000"><strong><span>STATUS</span></strong></font></div>
</td>
<td bgcolor="#ECECEC" height="35" style="color:#000000; position:" > 
  <div align="left"><font color="#000000"><strong><span>NOME</span></strong></font></div>
</td> 
<td bgcolor="#ECECEC" height="35" width="40px" style="color:#000000; position:" > 
  <div align="center"><font color="#000000"><strong><span>ATIVO</span></strong></font></div>
</td>
<td bgcolor="#ECECEC" height="35" width="40px" style="color:#000000; position:" > 
<div align="center"><font color="#000000"><strong><span>EDITAR</span></strong></font></td></div>
</tr>
<?php
$query1 = "select * from ocorrencia ORDER BY status ASC";															
$rs1 = mysql_query($query1);
while($row1 = mysql_fetch_array($rs1)){	
?>	
<tr>
<?php
$status_icon = "";
	if($row1["status"] == 3 ){ $status_icon = "imgs/status_preto.png"; }
	if($row1["status"] == 2 ){ $status_icon = "imgs/status_vermelho.png"; }
	if($row1["status"] == 0 ){ $status_icon = "imgs/status_amarelo.png"; }
	if($row1["status"] == 1 ){ $status_icon = "imgs/status_verde.png"; }
?>

<td align="center"><img src="<?php echo $status_icon;?>" width="21" /></td>
<td align="left" style="padding-left: 10px;"><?php echo $row1["ocorrencia"];?></td>

<td align="center"><?php
if ($row1["ativo"]==0){
	?>
	<a href="scripts.php?acao=ativa_ocorrencia&id=<?php echo $row1["id"]; ?>"> <i class="material-icons" style="font-size:20px;color:black">check_box_outline_blank</i></a>
    <?php
} else {
	?>
	<a href="scripts.php?acao=inativa_ocorrencia&id=<?php echo $row1["id"]; ?>"> <i class="material-icons" style="font-size:20px;color:black" >check_box</i></a>
    <?php
}

?>
<td align="center"><a href="?lg=<?php echo $row1["id"]?>&n=<?php echo $row1["ocorrencia"]; ?>&st=<?php echo $row1["status"]; ?>&at=<?php echo $row1["ativo"]; ?>" style="text-align: center"><i class="material-icons" style="font-size:20px">&#xe560;</i></a></td>
</tr>
<?php
}
?>
</table>  


</tr>


</table>

</div>
</div>


		<br/>
	



 
  

  </div>
</body>
</html>