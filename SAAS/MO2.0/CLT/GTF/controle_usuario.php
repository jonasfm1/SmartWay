<?php 
include ('session.php');

include ('conecta.php');
ini_set('max_execution_time',12000);
  
  
$lg = $_GET['lg'];
$pss= $_GET['pss'];
$coord= $_GET['coord'];

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>::. MONITORAMENTO .:: CADD</title>
<link rel="stylesheet" type="text/css" href="css/menu.css">
<link rel="stylesheet" type="text/css" href="css/controle_usuario.css">

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

function confirmaExclusao(aURL) {

if(confirm('Você tem certeza que deseja excluir este usuário?')) {

location.href = aURL;

//target=ver;
}

}
</script>

</head>

<body>
<div class="jquery-waiting-base-container">
 
</div>
<div id="div_titulo">
	  	<table width="100%" border="0" cellpadding="0" cellspacing="0">
    <tr>

     	   <td align="left" valign="middle"><font size="3">CONTROLE DE USUÁRIOS</font></td>
     
		
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
    <font size="4"><strong>&nbsp;ADICIONAR USUÁRIO</strong><span style="color: #000000"><?php echo $aviso_listatual; ?></span</font>
    
    </td>
   
</tr>
<tr style="height: 25px;vertical-align: button">
<td colspan="2"><hr style="border: none; width:226px;" ></td>

</tr>

<tr style="height: 25px;vertical-align: button">
<td colspan="2"></td>

</tr>

<tr>
<td colspan="2">
    
   
  <table width="100%" border="1" cellpadding="0" cellspacing="0" class="bordasimples1">
  <form action="scripts.php?acao=add_usr" method="post">
     <tbody>
       <tr>
         <td style="height: 30px;">&nbsp;&nbsp;&nbsp;NOME:
          <input name="logado" type="text" hidden="hidden" id="logado" value="<?php echo $logado; ?>" size="25"/>
         <td ><input name="lg1" type="text" id="lg1" value="" size="25"/><?php echo "   @" . $logado; ?></td></td>
         </tr>
       <tr>
         <td style="height: 30px;">&nbsp;&nbsp;&nbsp;SENHA:
          
         <td><input name="pss1" type="text" id="pss1" value="" size="35" /></td></td>
         </tr>
           <tr>
         <td style="height: 30px;">&nbsp;&nbsp;&nbsp;COORDENADOR:&nbsp;&nbsp;&nbsp;
          
         <td><input name="coor" type="text" id="coor" value="" size="35" />
         
         </td></td>
         </tr>
       <tr>
         <td colspan="2" align="right">
        <input type="submit" name="submit" id="submit" value="ADICIONAR" />
         </td>
       </tr>
     </tbody>
     </form>
   </table>
  
   </td>
</tr>


</table>

<br><br>
<table border="0" style="padding-left:20px; color:#000000;"  cellpadding="0" cellspacing="0">
<tr>
    <td  align="left" nowrap="nowrap" style="width: 20px;">
    <i class="material-icons" style="font-size:28px">lock</i>
    </td>
    <td valign="button">
    <font size="4"><strong>&nbsp;ALTERAR SENHA DO USUÁRIO</strong><span style="color: #000000"><?php echo $aviso_listatual; ?></span</font>
    
    </td>
   
</tr>

<tr style="height: 25px; vertical-align: button">
<td colspan="2"><hr style="border: none; width:296px;" ></td>
</tr>

<tr style="height: 25px;vertical-align: button">
<td colspan="2"></td>

</tr>

<tr>
    <td colspan="2">
    
   <table width="100%" border="1" cellpadding="0" cellspacing="0" class="bordasimples1">
   <form action="scripts.php?acao=update_senha" method="post">
      <tbody>
   
        <tr>
          <td style="height: 30px;">&nbsp;&nbsp;&nbsp;NOME:
           
          <td ><?php echo $lg . "@" . $logado;?>
          <input name="lg" type="text" id="lg" value="<?php echo $lg;?>" size="35" hidden/>
        </td></td>
          </tr>
        <tr>
          <td style="height: 30px;">&nbsp;&nbsp;&nbsp;SENHA:
           
          <td><input name="pss" type="text" id="pss" value="<?php echo $pss;?>" size="35" /></td></td>
          </tr>
          <tr>
          <td style="height: 30px;">&nbsp;&nbsp;&nbsp;COORDENADOR:&nbsp;&nbsp;&nbsp;
           
          <td><input name="coord" type="text" id="coord" value="<?php echo $coord;?>" size="35" /></td></td>
          </tr>
        <tr>
          <td colspan="2" align="right">
            <input type="submit" name="submit" id="submit" value="ALTERAR" />
          </td>
        </tr>
      </tbody>
      </form>
    </table>
   
    </td>
  
  </tr>


</table>
<br><br>

<table border="0" style="height: 70px; padding-left:20px; color:#000000;"  cellpadding="0" cellspacing="0">
<tr>
    <td  align="left" nowrap="nowrap">
    <i class="material-icons" style="font-size:28px">phone_android</i>
    </td>
    <td valign="button">
    <font size="4"><strong>&nbsp;LISTA DE USUÁRIOS</strong><span style="color: #000000"><?php echo $aviso_listatual; ?></span</font>
    
    </td>
   
</tr>
<tr style="height: 25px;vertical-align: top">
<td colspan="2"><hr style="border: none; width:210px;" ></td>
</tr>
</table>

<br>
<div id="tabela_fora">

<div id="tabela_dentro">
  


<table width="100%" border="1" id="tabela" name="tabela" class="bordasimples" cellpadding="0" cellspacing="0">
<tr bgcolor="#589bd4">
<td bgcolor="#ECECEC" height="35" style="color:#000000; width:30px" > 
<div align="left"><strong><span>ATIVO</span></strong></div>
</td>
<td bgcolor="#ECECEC" height="35" style="color:#000000;" > 
<div align="left"><strong><span>NOME</span></strong></div>
</td>
<td bgcolor="#ECECEC" style="color:#000000; "> 
  <div align="left"><strong><span>SENHA</span></strong></div>
</td> 
<td bgcolor="#ECECEC" style="color:#000000;  "> 
  <div align="left"><strong><span>COORDENADOR</span></strong></div>
</td> 
<td bgcolor="#ECECEC" style="color:#000000; "> 
  <div align="left"><strong><span>ÚLTIMO ACESSO</span></strong></div>
</td>
<td bgcolor="#ECECEC" style="color:#000000;  width:30px">
<div align="center"><strong><span>EDITAR</span></strong></div>
</td>
<td bgcolor="#ECECEC" style="color:#000000;  width:30px">
<div align="center"><strong><span>EXCLUIR</span></strong></div>
</td>
</tr>
<?php
$query1 = "select * from usuario where nivel !='1' AND nivel !='3' order by login";															
$rs1 = mysql_query($query1);
while($row1 = mysql_fetch_array($rs1)){	
?>	
<tr>
<td align="center" >   
<?php 
	  if ($row1["nivel"]==0){
		
		 ?>
       
         <a href="scripts.php?acao=ativa_nivel&id=<?php echo $row1["id"]; ?>">  <i class="material-icons" style="font-size:20px;color:black" block>check_box_outline_blank</i></a>
         <?php
	  
   } else {		
      ?>
    
		<a href="scripts.php?acao=inativa_nivel&id=<?php echo $row1["id"]; ?>">  <i class="material-icons" style="font-size:20px;color:black;" >check_box</i></a>
          <?php
	  } 
	
    
  ?>
</td>
<td align="left" ><?php echo $row1["login"] . "@" . $logado; ?> </td>
<td align="left"><?php echo $row1["senha"]; ?></td>
<td align="left" ><?php echo $row1["coordenador"]; ?></td>
<td align="left" ><?php echo $row1["ultimo_acesso"]; ?></td>
<td align="center" ><a href="?lg=<?php echo $row1["login"]; ?>&pss=<?php echo $row1["senha"]; ?>&coord=<?php echo $row1["coordenador"]; ?>" style="text-align: center"><i class="material-icons" style="font-size:20px">&#xe560;</i></a></td>
<td align="center"><a href="javascript:confirmaExclusao('scripts.php?acao=exclui_usr&id=<?php echo $row1["id"] ?>')" data-tooltip="Excluir cliente"><i class="material-icons" style="font-size:16px;color:red">&#xe5c9;</i></a></td>    
</tr>
<?php
}
?>
</table>  

  
</div>
</div>


</div>
</body>
</html>