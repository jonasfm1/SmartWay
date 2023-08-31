<?php 
include ('session.php');

include ('conecta.php');
ini_set('max_execution_time',12000);

$status= $_GET['status'];
$login= $_GET['login'];
$nome= $_GET['nome']; 
$rota= $_GET['rota'];
$seq= $_GET['seq'];
$oco= $_GET['oco'];
  
$id = $_GET['id'];
$end= $_GET['end'];
$cidade= $_GET['cid'];
$cliente= $_GET['cli'];

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>::. MONITORAMENTO .:: CADD</title>
<link rel="stylesheet" type="text/css" href="css/menu_step2_sm.css">
<link rel="stylesheet" type="text/css" href="css/step2_sm.css">

<link rel="shortcut icon" href="imgs/favicon.ico" >
<link rel="icon" type="image/gif" href="imgs/animated_favicon1.gif" >
 
 
<script type='text/javascript' src="control/timer.js"></script>
<script src="js/logger.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
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

<body>
<?php include ('base_cad.php'); ?>
<div id="apDiv11">
  <div id="help" class="help"><img src="imgs/help.png" width="45" height="45" alt=""/><div id="sidebar"><p>• A resolução mínima exigida pelo sistema é <strong>1280x800px</strong> e o Browser <strong>Chrome</strong>(última versão).</p></strong><br />
    <p>• <strong>IMPORTAR LISTA:</strong> Importe seu Banco de Dados.</p><br /><p>• <strong>MENU:</strong> Navege pelos painéis de Monitoramento.</p><br />• Todos recursos podem ser acessados pelo <strong> MENU SUPERIOR DIREITO.</strong></p><br />
    </div>
  
</div>
  
  <div id="total">
    <div id="apDiv12">
    <br />  <strong class="menu-list"><font size="+1">ALTERAR STATUS DO CLIENTE</font></strong><br /><br /><br />
    <form action="scripts.php?acao=altera_status_site" method="POST">
    <table width="100%" border="0" cellspacing="0" cellpadding="0" class="bordasimples" bgcolor="#FFFFFF">
  <tbody>
    <tr bgcolor="#589bd4">
      <td><div align="center"><font color="#FFFFFF"><span>STS</span></font></div></td>
      <td><div align="center"><font color="#FFFFFF"><span>LOGIN</span></font></div></td>
      <td><div align="center"><font color="#FFFFFF"><span>ROTA</span></font></div></td>
      <td><div align="center"><font color="#FFFFFF"><span>SEQ</span></font></div></td>
      <td><div align="center"><font color="#FFFFFF"><span>ID</span></font></div></td>
      <td><div align="center"><font color="#FFFFFF"><span>CLIENTE</span></font></div></td>
      <td><div align="center"><font color="#FFFFFF"><span>ENDEREÇO</span></font></div></td>
      <td><div align="center"><font color="#FFFFFF"><span>CIDADE</span></font></div></td>
     
    <td><div align="center"><font color="#FFFFFF"><span>OCORRÊNCIA</span></font></div></td>
    </tr>
       <tr>
       
       <?php
$status_icon1 = "";
	if($status == 3 ){ $status_icon1 = "imgs/status_preto.png"; }
	if($status == 2 ){ $status_icon1 = "imgs/status_vermelho.png"; }
	if($status == 0 ){ $status_icon1 = "imgs/status_amarelo.png"; }
	if($status == 1 ){ $status_icon1 = "imgs/status_verde.png"; }
?>

     <td><div align="center"><span><img src="<?php echo $status_icon1; ?>" width="21" height="17" /></span></div></td>
      <td><div align="center"><span><?php echo $login; ?></span></div></td>
      <td><div align="center"><span><?php echo $rota; ?></span></div></td>
      <td><div align="center"><span><?php echo $seq; ?></span></div></td>
      <td><div align="center"><span><?php echo $cliente; ?></span></div></td>
       <td><div align="center"><span><?php echo $nome; ?></span></div></td>
      <td><div align="center"><span><?php echo $end; ?></span></div></td>
      <td><div align="center"><span><?php echo $cidade; ?></span></div></td>
     <?php
$query_qual = "select * from ocorrencia where id=$oco";														
$query_qual = mysql_query($query_qual);	
$dados = mysql_fetch_array($query_qual);
?>
      <td><div align="center"><span><?= $dados['ocorrencia']; ?></span></div></td>
    </tr>
    
  </tbody>
</table>
    <br />
    <strong class="menu-list">ESCOLHA O STATUS ABAIXO</strong><br /><br />
      <table width="50%" border="0" id="tabela" name="tabela" class="bordasimples" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
<tr bgcolor="#DADADA">
<td bgcolor="#589bd4" width="12%"> 
<div align="center"><font color="#FFFFFF"><span>STATUS</span></font></div>
</td>
<td bgcolor="#589bd4" width="76%"> 
  <div align="center"><font color="#FFFFFF"><span>NOME</span></font></div>
</td> 
<td bgcolor="#589bd4" width="12%"> 
  <div align="center"><font color="#FFFFFF"><span></span></font></div>
</td>

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

<td align="center"><img src="<?php echo $status_icon;?>" width="21" height="17" /></td>
<td align="left"><?php echo $row1["ocorrencia"];?></td>


<input type="hidden" name="id_visita" id="id_visita" value="<?php echo $id;?>"/>
<input type="hidden" name="status_cli" id="status_cli" value="<?php echo $row1["status"];?>"/>
<td align="center">
    <input type="radio" name="RadioGroup1" value="<?php echo $row1["id"];?>" id="RadioGroup1"/>
 </td>
</tr>
<?php
}
?>
</table>  
<br />
<input type="submit" value="ALTERAR"/>
<input type='submit' name='submit' value='VOLTAR' onclick="window.history.go(-1);"/>

</form>
<div id="azulao"></div>

<div id="mostra_version2" name="mostra_version2" style="display: none">
    

  <table width="360" border="0" cellpadding="0" cellspacing="0">
      <tbody>
        <tr>
          <td width="116"><a href="cad_veiculos.php"><img src="imgs/control_veiculo_home.png" width="108" height="89" alt="" onmouseover="rollover(this, 'imgs/control_veiculo_home2.png')" onmouseout="rollover(this, 'imgs/control_veiculo_home.png')"/></a></td>
          <td width="116"><a href="cad_if.php"><img src="imgs/control_pontos_home.png" width="108" height="89" alt="" onmouseover="rollover(this, 'imgs/control_pontos_home2.png')" onmouseout="rollover(this, 'imgs/control_pontos_home.png')"/></a></td>
          <td width="128"><a href="cad_bd.php"><img src="imgs/control_db_home.png" width="108" height="89" alt="" onmouseover="rollover(this, 'imgs/control_db_home2.png')" onmouseout="rollover(this, 'imgs/control_db_home.png')"/></a></td>
        </tr>
      </tbody>
    </table>
 </div> 
 
</div> 
 
    
</div>

</body>
</html>