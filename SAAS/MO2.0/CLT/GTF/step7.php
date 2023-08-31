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
<link rel="stylesheet" type="text/css" href="css/step7.css">

<link rel="shortcut icon" href="imgs/favicon.ico" >
<link rel="icon" type="image/gif" href="imgs/animated_favicon1.gif" >
 
 
<script type='text/javascript' src="control/timer.js"></script>
<script src="js/logger.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>


<link rel="stylesheet" type="text/css" href="css/dragtable.css" />
<script src="js/jquery-ui.min.js"></script>

<!-- Tablesorter: theme -->
<link class="theme" rel="stylesheet" href="css/theme.blue.css">
<link rel="stylesheet" href="css/dragtable.mod.css">

<!-- Tablesorter script: required -->
<script src="js/jquery.tablesorter.js"></script>
<script src="js/jquery.tablesorter.widgets.js"></script>

<script src="js/extras/jquery.dragtable.mod.js"></script>



<script LANGUAGE="JavaScript">

(function($) {
$.fn.waiting = function(options) {
options = $.extend({modo: 'normal'}, options);
this.fadeOut(options.modo);
return this;
};
})(jQuery);;





$(document).ready(function() {
    $('.defaultTable').dragtable();
  });


  $(function () {
$('table')
// initialize dragtable FIRST!
.dragtable({
// *** new dragtable mod options ***
// this option MUST match the tablesorter selectorSort option!
sortClass: '.sorter',
// this function is called after everything has been updated
tablesorterComplete: function(table) {},

// *** original dragtable settings (non-default) ***
dragaccept: '.drag-enable',  // class name of draggable cols -> default null = all columns draggable

// *** original dragtable settings (default values) ***
revert: false,               // smooth revert
dragHandle: '.table-handle', // handle for moving cols, if not exists the whole 'th' is the handle
maxMovingRows: 40,           // 1 -> only header. 40 row should be enough, the rest is usually not in the viewport
excludeFooter: false,        // excludes the footer row(s) while moving other columns. Make sense if there is a footer with a colspan. */
onlyHeaderThreshold: 100,    // TODO:  not implemented yet, switch automatically between entire col moving / only header moving
persistState: null,          // url or function -> plug in your custom persistState function right here. function call is persistState(originalTable)
restoreState: null,          // JSON-Object or function:  some kind of experimental aka Quick-Hack TODO: do it better
exact: true,                 // removes pixels, so that the overlay table width fits exactly the original table width
clickDelay: 10,              // ms to wait before rendering sortable list and delegating click event
containment: null,           // @see http://api.jqueryui.com/sortable/#option-containment, use it if you want to move in 2 dimesnions (together with axis: null)
cursor: 'move',              // @see http://api.jqueryui.com/sortable/#option-cursor
cursorAt: false,             // @see http://api.jqueryui.com/sortable/#option-cursorAt
distance: 0,                 // @see http://api.jqueryui.com/sortable/#option-distance, for immediate feedback use "0"
tolerance: 'pointer',        // @see http://api.jqueryui.com/sortable/#option-tolerance
axis: 'x',                   // @see http://api.jqueryui.com/sortable/#option-axis, Only vertical moving is allowed. Use 'x' or null. Use this in conjunction with the 'containment' setting
beforeStart: $.noop,         // returning FALSE will stop the execution chain.
beforeMoving: $.noop,
beforeReorganize: $.noop,
beforeStop: $.noop
})
// initialize tablesorter
.tablesorter({
theme: 'blue',
// this option MUST match the dragtable sortClass option!
selectorSort: '.sorter',
widgets: ['zebra', 'filter', 'columns']
});
});


	
function confirmaExclusao(aURL) {

if(confirm('Você tem certeza que deseja excluir todas mensagens do usuário?')) {

location.href = aURL;

//target=ver;

}
}


	
$(document).ready(function(){
$(".jquery-waiting-base-container").waiting({modo:"slow"});
});



function acao_chat(campo) {
	
  document.getElementById("chat").style.display = "block";
  
  var teste = "chat_layer.php?chat=" + campo;
  
  document.getElementById("pag2_chat").src = teste; 
  
  
  }


</script>
<style>
  
  #pag1_chat{
	position: fixed;
	width: 100%;
	left: 0px;
	top: 0px;
	height:100%;

z-index:999999;


background-repeat: repeat;
background-size: cover;
background-color: white;
opacity: 0.7;
	}


  #pag2_chat{
	width: 600px;
	height: 404px;
  top: 50%;
  left: 50%;
  margin-top: -202px;
  margin-left: -300px;

	position: absolute;
	border: 1px solid silver;
	background-color: white;

		z-index:999999;
		
	
	}

	#botao_chat{
		width: 30px;
		height: 30px;
		top: 50%;
	  left: 50%;

    margin-top: -220px;
    margin-left: 290px;
	
		position: absolute;
	
		z-index:9999999;
		color: #000;
			
			
		}
</style>
</head>

<body>

<div class="jquery-waiting-base-container"></div>
<div id="div_titulo">
	  	<table width="100%" border="0" cellpadding="0" cellspacing="0">
    <tr>

     	   <td align="left" valign="middle"><font size="3">CHAT CADD</font></td>
     
		
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
    <font size="4"><strong>&nbsp;LISTA DE USUÁRIOS DO CHAT</strong><span style="color: #000000"><?php echo $aviso_listatual; ?></span</font>
    
    </td>
   
</tr>
<tr style="height: 25px;vertical-align: button">
<td colspan="2"><hr style="border: none; width:290px;" ></td>

</tr>

<tr style="height: 25px;vertical-align: button">
<td colspan="2"></td>

</tr>
</table>


<div id="tabela_fora">

<div id="tabela_dentro">

<table border="3" id="demo" name="demo" class="tablesorter" width="100%" >
<thead>
<tr bgcolor="#589bd4" height="35px" class="active">

<th nowrap="nowrap" headers="icone" bgcolor="#00000" style="color:#000000;" class="drag-enable" title="STATUS">
<div align="center" >-</div>
</th>

<th nowrap="nowrap" headers="icone" bgcolor="#00000" style="color:#000000;" class="drag-enable" title="USUÁRIO">
<div align="center" >USUÁRIO</div>
</th>

<th nowrap="nowrap" headers="icone" bgcolor="#00000" style="color:#000000;" class="drag-enable" title="MSGS PENDENTES">
<div align="center" >-</div>
</th>

<th nowrap="nowrap" headers="icone" bgcolor="#00000" style="color:#000000;" class="drag-enable" title="ÚLTIMA MENSAGEM">
<div align="center" >ÚLTIMA MENSAGEM</div>
</th>

<th nowrap="nowrap" headers="icone" bgcolor="#00000" style="color:#000000;" class="drag-enable" title="DATA">
<div align="center" >DATA</div>
</th>

<th nowrap="nowrap" headers="icone" bgcolor="#00000" style="color:#000000;" class="drag-enable" title="ENVIAR MSG">
<div align="center" >ENVIAR</div>
</th>

<th nowrap="nowrap" headers="icone" bgcolor="#00000" style="color:#000000;" class="drag-enable" title="APAGAR MSGS">
<div align="center" >APAGAR</div>
</th>

</thead>
<tbody>





<?php
$query1 = "select * from usuario where nivel=2 ORDER BY login ASC";															
$rs1 = mysql_query($query1);
while($row1 = mysql_fetch_array($rs1)){	


$ultima_msg =$row1["login"];

$query_msg = "select * from chat where de='$ultima_msg' or para='$ultima_msg' ORDER BY data DESC LIMIT 1";														
$rs_msg = mysql_query($query_msg);

$num_rows = mysql_num_rows($rs_msg);

$compara_hora ="";
$online="";
date_default_timezone_set('Etc/GMT+3');
//echo "$num_rows Rows\n";
while($row_msg = mysql_fetch_array($rs_msg)){	


    if($num_rows>0){

      $query_online = "SELECT login, Max(CONCAT(day,' ', dth)) AS Ultimo_Rastro FROM rastro WHERE login='$ultima_msg' ORDER BY Ultimo_Rastro DESC limit 1"; 
      $rs_online = mysql_query($query_online);

      $dados = mysql_fetch_array($rs_online);
      $online= $dados['Ultimo_Rastro'];

 

      $hoje = date('Y-m-d H:i:s', time());
      $compara_hora = date_diff(date_create($hoje), date_create($online))->format('%Y ano(s) %M mês(es) %D dia(s) - %H:%I:%S');

      // NUNCA ENTROU NO APP
      if($online!=""){

       
//VERMELHO
if($compara_hora >= '00 ano(s) 00 mês(es) 01 dia(s) - 00:00:00'){
 
  $status_icon = "#C00";

} 
//LARANJA
else if($compara_hora >= '00 ano(s) 00 mês(es) 00 dia(s) - 00:15:51'){
 
  $status_icon = "#F90";
 

} 
//VERDE
else if($compara_hora < '00 ano(s) 00 mês(es) 00 dia(s) - 00:15:50'){

  $status_icon = "#5cbc69";

  }


      } else {

        $status_icon = "#FFFFFF";
        


 }
    

        ?>
        <tr style="height: 18px;">

        <td align="left" style="width: 5px;background-color: <?php echo $status_icon; ?>">
        <?php
//echo $hoje ."<BR>";
//echo $online; 
?>
<td align="left" style="padding-left: 10px;"><?php echo $row1["login"];?></td>


<?php

    $query_lido = "select * from chat where de='$ultima_msg' and lido=0";											
    $rs_lido = mysql_query($query_lido);
    
    $num_rows_lido = mysql_num_rows($rs_lido);

    if($num_rows_lido>0){
?>
<td align="center" style="color:#FFFFFF;width: 20px;"><div class="round-button"><div class="round-button-circle"><?php echo $num_rows_lido;?></div></div></td>
<?php
} else {
?>
<td align="center" style="color:#FFFFFF;"></td>

<?php
}

?>



<td align="left" title="<?php echo $row_msg["msg"]; ?>"style="width: 300px;">
    <?php
echo "<strong>" . $row_msg["de"] . "</strong>: " . substr($row_msg["msg"], 0, 30) . "...";
?>
</td>
<td align="center"  nowrap><?php echo date('d/m/Y H:i:s', strtotime($row_msg["data"]));?></td>
<td align="center">
<a href="javascript:acao_chat('<?php echo $row1["login"]?>');"><i class="material-icons" style="font-size:14px">chat_bubble</i></a>
</td>
<td align="center"><a href="javascript:confirmaExclusao('scripts.php?acao=exclui_msg_app&id=<?php echo $row1["login"]?>')" style="text-align: center"><i class="material-icons" style="font-size:14px; color:red">remove_circle</i></a></td>
</tr>
        <?php

    } else {

        ?>
        <tr>

<td align="center" style=""><?php echo $row1["login"];?></td>


<td align="center" style="color:#FFFFFF;"><div class="round-button"><div class="round-button-circle"></div></div></td>


<td align="center"></td>
<td align="center"></td>
<td align="center"></td>
<td align="center"></td>

</tr>
<?php


    }
    ?>









<?php
}
?>

<?php
}
?>

</table>  




</tr>
</table>

</div>
</div>



</div>

<div id="chat" style="display: none;">
	  
    <div id="botao_chat"><a href="javascript:void(0);" onclick="window.location.reload();" ><i class="material-icons" style="font-size:30px;color:black;">&#xe5c9;</i></a></div>
     <iframe name="pag1_chat" frameborder="0" id="pag1_chat" scrolling="no" marginheight="0" marginwidth="0" trusted="yes"></iframe>
    <iframe name="pag2_chat" src="" frameborder=0 id="pag2_chat" scrolling="no" marginheight="0" marginwidth="0" trusted="yes"></iframe>
 </div>  

</body>
</html>