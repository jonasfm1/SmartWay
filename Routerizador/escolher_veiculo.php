<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//BR" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>::. ROTAS ONLINE .:: CADD</title>
<script src="https://code.jquery.com/jquery-3.1.0.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.2/jquery-ui.min.js"></script>
<script src="js/jquery.dragtable.js"></script>

<link rel="shortcut icon" href="imgs/favicon.ico" >
<link rel="icon" type="image/gif" href="imgs/animated_favicon1.gif" >


<link rel="stylesheet" type="text/css" href="css/dragtable.css" />
<script src="js/jquery-ui.min.js"></script>

<!-- Demo stuff -->



<link href="css/prettify.css" rel="stylesheet">
<script src="js/prettify.js"></script>
<script src="js/docs.js"></script>


<?php 
include ('session.php'); 
include ('essence/conecta.php');
ini_set('max_execution_time',12000);
?>
<script type="text/javascript">
(function($) {
$.fn.waiting = function(options) {
options = $.extend({modo: 'normal'}, options);
this.fadeOut(options.modo);
return this;
};
})(jQuery);;

	
$(document).ready(function(){
$(".jquery-waiting-base-container1").waiting({modo:"slow"});
});

</script>

<style type="text/css">


hr {
		
	
		height: 10px
	}

/* Reset CSS */


.highlight {
    background-color: #589bd4;
    -moz-border-radius: 5px; /* FF1+ */
    -webkit-border-radius: 5px; /* Saf3-4 */
    border-radius: 5px; /* Opera 10.5, IE 9, Saf5, Chrome */
    -moz-box-shadow: 0 1px 4px rgba(0, 0, 0, 0.7); /* FF3.5+ */
    -webkit-box-shadow: 0 1px 4px rgba(0, 0, 0, 0.7); /* Saf3.0+, Chrome */
    box-shadow: 0 1px 4px rgba(0, 0, 0, 0.7); /* Opera 10.5+, IE 9.0 */
}

.highlight {
    padding:1px 4px;
    margin:0 -4px;
}
* {
	
	font-family: -apple-system, BlinkMacSystemFont, "segoe ui", roboto, oxygen, ubuntu, cantarell, "fira sans", "droid sans", "helvetica neue", Arial, sans-serif;
	-webkit-font-smoothing: antialiased;
	-moz-osx-font-smoothing: grayscale;
	
	
}

/* override jQuery UI overriding Bootstrap */
.accordion .ui-widget-content a {
color: #337ab7;
}

caption {
/* override bootstrap adding 8px to the top & bottom of the caption */
padding: 0;
}
.ui-sortable-placeholder {
/* change placeholder (seen while dragging) background color */
background: #ddd;
}
div.table-handle-disabled {
/* optional red background color indicating a disabled drag handle */
background-color: rgba(255,128,128,0.5);
/* opacity set to zero for disabled handles in the dragtable.mod.css file */
opacity: 0.7;
}
/* fix cursor */
.tablesorter-blue .tablesorter-header {
cursor: default;
}
.sorter {
cursor: pointer;
}

::-webkit-scrollbar-track {
    background-color: #F4F4F4;
}
::-webkit-scrollbar {
    width: 6px;
    background: #000000;
}
::-webkit-scrollbar-thumb {
    background: #d3d5d6;
}


::-webkit-scrollbar-track:horizontal {
    background-color: #F4F4F4;
 }

 ::-webkit-scrollbar:horizontal {
  
    height: 6px;
    background: #000000;
}
::-webkit-scrollbar-thumb:horizontal {
    background: #d3d5d6;
}

.jquery-waiting-base-container1 {
	position: absolute;
	left: -2px;
	top: -2px;
	margin: 0px;
	width: 100%;
	height: 100%;
	display: block;
	z-index: 999999;

	background-color:#FFFFFF;
	
	background-image: url("imgs/loading.gif");
	background-repeat: no-repeat;
	background-position: 50% 35%;
	padding-top: 250px;
}


	
#div_geral {
	position: absolute;

	width:96%;
	height: 100%;
	margin-right: 2%;
	margin-left: 2%;
	margin-top: 30px;
	


}

#div_background {
	position: absolute;
	background-color:#FFFFFF;
	
	width: 100%;
	height: 444px;

	z-index: 10;
	overflow:auto;


	margin-bottom: 50px;
	
	
}
#apDiv1 {
	position: absolute;
	width: 764px;
	height: 160px;
	z-index: 1;
	left: 6px;
	top: 54px;


}
#apDiv2 {
	position: relative;
	width: 93px;
	height: 35px;
	z-index: 2;
	left: 134px;
	top: 33px;
	color:#FFF;
	font-family:Arial, Helvetica, sans-serif;
	font-size:16px;
	font-weight: bold;
	
}

#apDiv3 {
	position: relative;
	width: 93px;
	height: 35px;
	z-index: 2;
	left: 135px;
	top: 23px;
	color:#FFF;
	font-family:Arial, Helvetica, sans-serif;
	font-size:12px;
}
#apDiv3_setor {
	position: absolute;
	width: 93px;
	height: 35px;
	z-index: 2;
	left: 135px;
	top: 80px;
	color: #FFF;
	font-family: Arial, Helvetica, sans-serif;
	font-size: 12px;
}
#apDiv4 {
	position: relative;
	width: 330px;
	height: 44px;
	z-index: 2;
	left: -105px;
	top: -16px;
	text-align:center;
}
#apDiv5 {
	position: relative;
	width: 757px;
	height: 115px;
	z-index: 2;
	left: 0px;
	top: 2px;
	margin-bottom:8px;
	background:url(imgs/box_veiculo_step3_pop.png);
}
#apDiv5_orange {
	position: relative;
	width: 757px;
	height: 115px;
	z-index: 2;
	left: 0px;
	top: 2px;
	margin-bottom:8px;
	background:url(imgs/box_veiculo_step3_pop_orange.png);
}
#apDiv5_verde {
	position: relative;
	width: 757px;
	height: 115px;
	z-index: 2;
	left: 0px;
	top: 2px;
	margin-bottom:8px;
	background:url(imgs/box_veiculo_step3_pop_verde.png);
}

#apDiv6 {
	position: relative;
	width: 20px;
	height: 21px;
	z-index: 2;
	left: 4px;
	top: -104px;
}
#apDiv7 {
	position: absolute;
	width: 100px;
	height: 45px;
	z-index: 2;
	left: 300px;
	top: 60px;
	font-family:Arial, Helvetica, sans-serif;
	font-size:10px;
}
#apDiv7a {
	position: absolute;
	width: 100px;
	height: 95px;
	z-index: 2;
	left: 478px;
	top: 60px;
	font-family:Arial, Helvetica, sans-serif;
	font-size:10px;
}
#apDiv7b {
	position: absolute;
	width: 100px;
	height: 45px;
	z-index: 2;
	left: 650px;
	top: 60px;
	font-family:Arial, Helvetica, sans-serif;
	font-size:10px;
}
#apDiv8 {
	position: absolute;
	width: 70px;
	height: 56px;
	z-index: 2;
	left: 246px;
	top: 53px;
	font-family:Arial, Helvetica, sans-serif;
	font-size:10px;
}
#apDiv8a {
	position: absolute;
	width: 70px;
	height: 56px;
	z-index: 2;
	left: -360px;
	top: 19px;
	font-family:Arial, Helvetica, sans-serif;
	font-size:10px;
	letter-spacing:-1px;
	text-align:center;
}
#apDiv8b {
	position: absolute;
	width: 70px;
	height: 56px;
	z-index: 2;
	left: -185px;
	top: 19px;
	font-family: Arial, Helvetica, sans-serif;
	font-size: 10px;
	letter-spacing: -1px;
	text-align: center;
}

#apDiv8c {
	position: absolute;
	width: 70px;
	height: 56px;
	z-index: 2;
	left: -12px;
	top: 19px;
	font-family: Arial, Helvetica, sans-serif;
	font-size: 10px;
	letter-spacing: -1px;
	text-align: center;
}

#apDiv9 {
	position: absolute;
	width: 70px;
	height: 56px;
	z-index: 2;
	left: 422px;
	top: 53px;
}
#apDiv10 {
	position: absolute;
	width: 70px;
	height: 56px;
	z-index: 2;
	left: 595px;
	top: 53px;
}


#apDiv13a {
	position: relative;
	width: 90px;
	height: 32px;
	z-index: 1;
	left: 637px;
	top: 10px;
}

#setores {
	position: relative;
	width: 757px;
	height: 27px;
	z-index: 1;
	left: 0px;
	top: 2px;
	background-color:#589bd4;
	text-align:center;
	font-family: Arial, Helvetica, sans-serif;
	font-size: 14px;
	color:#FFFFFF;
	padding-top:12px;
}

#setores1 {
	position: relative;
	width: 757px;
	height: 38px;
	z-index: 1;
	left: 0px;
	top: 2px;
	background-color:#249333;
	text-align:center;
	font-family: Arial, Helvetica, sans-serif;
	font-size: 14px;
	color:#FFFFFF;
	padding-top:26px;
}


#setores2 {
	position: relative;
	width: 757px;
	height: 38px;
	z-index: 1;
	left: 0px;
	top: 2px;
	background-color:#589bd4;
	text-align:center;
	font-family: Arial, Helvetica, sans-serif;
	font-size: 14px;
	color:#FFFFFF;
	padding-top:26px;
}

#setores3 {
	position: relative;
	width: 757px;
	height: 38px;
	z-index: 1;
	left: 0px;
	top: 2px;
	background-color:#FF9300;
	text-align:center;
	font-family: Arial, Helvetica, sans-serif;
	font-size: 14px;
	color:#FFFFFF;
	padding-top:26px;
}

#apDiv13a input[type=submit] {  
	color: #fff;
	border: 1px solid #5cbb69;
	background: #5cbb69;
	/* Nice if your browser can do it */
	-moz-border-radius: 4px;
	-webkit-border-radius: 4px;
	border-radius: 4px;
	font-size:13px;	
	height: 30px;
	width:120px;

    }  
	
#apDiv13a input[type=submit]:hover{
	background: #249333;
	border: 1px solid #249333;
	cursor:pointer;
    }  


#apDiv11 {
	position: absolute;
	width: 200px;
	height: 115px;
	z-index: 2;
	left: 1px;
}

	#botao{
	position: absolute;
	right:18px;
	top:27px;
	z-index:9999;
	}
	


</style>

<script language="javascript">
 
/*
$(document).ready(function(){
setInterval(function(){

      $("#total").load(window.location.href + " #total");
    


}, 20000);
});
*/



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



function sortTable(qual) {
  var table, rows, switching, i, x, y, shouldSwitch;
  table = document.getElementById("tabela");
  switching = true;
  /*Make a loop that will continue until
  no switching has been done:*/

  while (switching) {  
      //alert(qual);
    //start by saying: no switching is done:
    switching = false;
    rows = table.rows;
    /*Loop through all table rows (except the
    first, which contains table headers):*/
    for (i = 2; i < (rows.length - 1); i++) {
      //start by saying there should be no switching:
      shouldSwitch = false;

      //alert(qual);
      /*Get the two elements you want to compare,
      one from current row and one from the next:*/
      x = rows[i].getElementsByTagName("TD")[qual];
      y = rows[i + 1].getElementsByTagName("TD")[qual];
      //check if the two rows should switch place:
      if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
        //if so, mark as a switch and break the loop:
        shouldSwitch = true;
        break;
      }
    }
    if (shouldSwitch) {
      /*If a switch has been marked, make the switch
      and mark that a switch has been done:*/
      rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
      
      switching = true;
    }
  }
}





function sortTable_volta(qual) {
  var table, rows, switching, i, x, y, shouldSwitch;
  table = document.getElementById("tabela");
  switching = true;
  /*Make a loop that will continue until
  no switching has been done:*/

  while (switching) {  
      //alert(qual);
    //start by saying: no switching is done:
    switching = false;
    rows = table.rows;
    /*Loop through all table rows (except the
    first, which contains table headers):*/
    for (i = 2; i < (rows.length - 1); i++) {
      //start by saying there should be no switching:
      shouldSwitch = false;

      //alert(qual);
      /*Get the two elements you want to compare,
      one from current row and one from the next:*/
      x = rows[i].getElementsByTagName("TD")[qual];
      y = rows[i + 1].getElementsByTagName("TD")[qual];
      //check if the two rows should switch place:
      if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
        //if so, mark as a switch and break the loop:
        shouldSwitch = true;
        break;
      }
    }
    if (shouldSwitch) {
      /*If a switch has been marked, make the switch
      and mark that a switch has been done:*/
      rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
      
      switching = true;
    }
  }
}


</script>

<!-- Tablesorter: theme -->
<link class="theme" rel="stylesheet" href="css/theme.blue.css">
<link rel="stylesheet" href="css/dragtable.mod.css">

<!-- Tablesorter script: required -->
<script src="js/jquery.tablesorter.js"></script>
<script src="js/jquery.tablesorter.widgets.js"></script>

<script src="js/extras/jquery.dragtable.mod.js"></script>

<div class="jquery-waiting-base-container1"></div>
<body>
<?php
	//$_zoom = $_POST["zoom"];
	//echo $_zoom . "<br>";
	//$_zoom_x = $_POST["zoom_x"];
	//echo $_zoom_x;
	//
?>

<div id="div_geral">


   <table border="0" color:#000000;"  cellpadding="0" cellspacing="0">
   <tr>

       <td valign="button" align="left" style="height: 34px;">
       <font size="4"><strong>&nbsp;ESCOLHA DE VEÍCULO</strong></font>
       
       </td>


<td>

</td>
   </tr>
   <tr style="height: 25px;vertical-align: top">
   <td colspan="1"><hr style="border: none; width:100%;" color="#ECECEC"></td>
  
   
   <tr style="height: 15px;font-size: 12px;">
   <td colspan="1">
   
   </td>
   
   </tr>
   
   </table>


<br>


<div id="div_background">

  <form method="post" name="veiculo_escolha" id="veiculo_escolha" action="scripts.php?acao=escolhe_veiculo">
        <input type="hidden" id="zoom" name="zoom" size="5" value="<?php echo $_GET['zoom'] ?>"/>
        <input type="hidden" id="zoom_x" name="zoom_x" size="5" value="<?php echo $_GET['zoom_x'] ?>"/>
        
        <input type="hidden" id="tool01_x" name="tool01_x" size="5" value="<?php echo $_GET['posX_1'] ?>"/>
        <input type="hidden" id="tool01_y" name="tool01_y" size="5" value="<?php echo $_GET['posY_1'] ?>"/>
        
        <input type="hidden" id="tool02_x" name="tool02_x" size="5" value="<?php echo $_GET['posX_tools1'] ?>"/>
        <input type="hidden" id="tool02_y" name="tool02_y" size="5" value="<?php echo $_GET['posY_tools1'] ?>"/>
        
        <input type="hidden" id="tool03_x" name="tool03_x" size="5" value="<?php echo $_GET['posX_layers1'] ?>"/>
        <input type="hidden" id="tool03_y" name="tool03_y" size="5" value="<?php echo $_GET['posY_layers1'] ?>"/>
        
        

<table border="3" id="demo" name="demo" class="tablesorter" width="750px" >
<thead>
<tr bgcolor="#589bd4" height="35px" class="active">

<th nowrap="nowrap" headers="check" bgcolor="#00000" style="color:#000000;" class="drag-enable" title="ESCOLHA">
<div align="center" >CK.</div>
</th>

<th nowrap="nowrap" headers="icone" bgcolor="#00000" style="color:#000000;" class="drag-enable" title="ICONE">
<div align="center" >I.</div>
</th>


<th nowrap="nowrap" headers="nome" bgcolor="#00000" style="color:#000000;" class="drag-enable" title="VEÍCULO" >
<div align="center" >VEÍCULO</div>
</th>

<th nowrap="nowrap" headers="cod" bgcolor="#00000" style="color:#000000;" class="drag-enable" title="TIPO" >
<div align="center" >TIPO</div>
</th>


<th nowrap="nowrap" headers="cod" bgcolor="#00000" style="color:#000000;" class="drag-enable" title="TRANSPORTADORA" >
<div align="center" >TRP.</div>
</th>

<th nowrap="nowrap" headers="ocupado" bgcolor="#00000" style="color:#000000;" class="drag-enable" title="STATUS" >
<div align="center" >STS.</div>
</th>

<th nowrap="nowrap" headers="peso" bgcolor="#00000" style="color:#000000;" class="drag-enable" title="PESO">
<div align="center" >PESO</div>
</th>

<th nowrap="nowrap" headers="utilizado" bgcolor="#00000" style="color:#000000;" class="drag-enable" title="PESO UTILIZADO" >
<div align="center" >P.U.</div>
</th>

<th nowrap="nowrap" headers="ociosa" bgcolor="#00000" style="color:#000000;" class="drag-enable" title="PESO OCIOSO" >
<div align="center" >P.O.</div>
</th>

<th nowrap="nowrap" headers="peso" bgcolor="#00000" style="color:#000000;" class="drag-enable" title="VOLUME TOTAL">
<div align="center" >VOL.T.</div>
</th>

<th nowrap="nowrap" headers="utilizado" bgcolor="#00000" style="color:#000000;" class="drag-enable" title="VOLUME UTILIZADO">
<div align="center" >VOL.U.</div>
</th>

<th nowrap="nowrap" headers="ociosa" bgcolor="#00000" style="color:#000000;" class="drag-enable" title="VOLUME OCIOSO">
<div align="center" >VOL.O.</div>
</th>


<th nowrap="nowrap" headers="peso" bgcolor="#00000" style="color:#000000;" class="drag-enable" title="VALOR TOTAL">
<div align="center" >VAL.T.</div>
</th>

<th nowrap="nowrap" headers="utilizado" bgcolor="#00000" style="color:#000000;" class="drag-enable" title="VALOR UTILIZADO">
<div align="center" >VAL.U.</div>
</th>

<th nowrap="nowrap" headers="ociosa" bgcolor="#00000" style="color:#000000;" class="drag-enable" title="VALOR OCIOSO">
<div align="center" >VAL.O.</div>
</th>
</tr>	
</thead>
<tbody>

<?php

$query_veiuclos = "select peso_total,volume_total,valor_total,peso,volume,valor,cor,tipo,nome,transportadora,id, ocupado from veiculos where ativo='yes' AND roteirizado!='sim' order by transportadora asc, nome asc";															
$rs = mysql_query($query_veiuclos);

while($row_veiculo = mysql_fetch_array($rs)){
	

	
	$calcula_peso = $row_veiculo["peso"] - $row_veiculo["peso_total"];
	$calcula_volume = $row_veiculo["volume"] - $row_veiculo["volume_total"];
	$calcula_valor = $row_veiculo["valor"] - $row_veiculo["valor_total"];

	$porcentagem_peso = ($row_veiculo["peso_total"]/$row_veiculo["peso"]) * 100;
	$porcentagem_volume = ($row_veiculo["volume_total"]/$row_veiculo["volume"]) * 100;
	$porcentagem_valor = ($row_veiculo["valor_total"]/$row_veiculo["valor"]) * 100;

?>

<tr height="auto">

<td align='center' nowrap="nowrap">

<input name="id_veiculox" onChange="this.form.submit();" type="radio" value="<?php echo $row_veiculo["id"]?>"/>


</td>
<td align='center' nowrap="nowrap">
	
<?php 
	
	$corescolhida = $row_veiculo["cor"];
	if ($corescolhida=="#ff0000"){
		$cor_veiculo = "_red1.png";
	}
	
	if ($corescolhida=="#ff7800"){
		$cor_veiculo = "_orange.png";
	}
	if ($corescolhida=="#42ff00"){
		$cor_veiculo = "_green1.png";
	}
	if ($corescolhida=="#7200ff"){
		$cor_veiculo = "_purple1.png";
	}
	if ($corescolhida=="#00f0ff"){
		$cor_veiculo = "_blue1.png";
	}	
	if ($corescolhida=="#003cff"){
		$cor_veiculo = "_blue2.png";
	}
	if ($corescolhida=="#9c5100"){
		$cor_veiculo = "_brown.png";
	}
	if ($corescolhida=="#00760b"){
		$cor_veiculo = "_green2.png";
	}	
	if ($corescolhida=="#ffbc00"){
		$cor_veiculo = "_yellow.png";
	}	
	if ($corescolhida=="#900000"){
		$cor_veiculo = "_red2.png";
	}
	if ($corescolhida=="#340058"){
		$cor_veiculo = "_purple2.png";
	}
	if ($corescolhida=="#03fe85"){
		$cor_veiculo = "_green3.png";
	}		
    if ($row_veiculo["tipo"]=="Moto"){ ?><img src="imgs/<?php echo "v06" . $cor_veiculo;  ?>" height="10px"/><?php }	
	
	if ($row_veiculo["tipo"]=="Vuc"){ ?><img src="imgs/<?php echo "v01" . $cor_veiculo;  ?>"height="10px" /><?php }
	 
	if ($row_veiculo["tipo"]=="Van"){ ?><img src="imgs/<?php echo "v02" . $cor_veiculo;  ?>"height="10px"/><?php }

    if ($row_veiculo["tipo"]=="Toco"){ ?><img src="imgs/<?php echo "v03" . $cor_veiculo;  ?>"height="10px"/><?php }

    if ($row_veiculo["tipo"]=="Truck"){ ?><img src="imgs/<?php echo "v04" . $cor_veiculo;  ?>"height="10px"/><?php }

    if ($row_veiculo["tipo"]=="Carreta"){ ?><img src="imgs/<?php echo "v05" . $cor_veiculo;  ?>"height="10px"/><?php }

	?>
	
	
</td>


<td  style="padding-left: 5px;" nowrap="nowrap"><?php echo $row_veiculo["nome"] ?></td>
<td  style="padding-left: 5px;" nowrap="nowrap"><?php echo $row_veiculo["tipo"] ?></td>
<td  style="padding-left: 5px;" nowrap="nowrap"><?php echo $row_veiculo["transportadora"] ?></td>
<td  style="padding-left: 5px;" nowrap="nowrap">		<?php 
		if($row_veiculo["ocupado"]==1) {
			echo "<strong><span style='color: #FF0000'>OCUPADO</span></strong>";
		} else {
			echo "<strong><span style='color: #02FF00'>LIVRE</span></strong>";
			
		}
		
		
		?></td>
<td  style="padding-left: 5px;" nowrap="nowrap"><?php echo $row_veiculo["peso"] . " / <strong>" . round($porcentagem_peso) . "%</strong>" ?></td>
<td  style="padding-left: 5px;" nowrap="nowrap"><?php echo $row_veiculo["peso_total"] ?></td>
<td  style="padding-left: 5px;" nowrap="nowrap"><?php echo $calcula_peso ?></td>
<td  style="padding-left: 5px;" nowrap="nowrap"><?php echo $row_veiculo["volume"] . " / <strong>" . round($porcentagem_volume) . "%</strong>" ?></td>
<td  style="padding-left: 5px;" nowrap="nowrap"><?php echo $row_veiculo["volume_total"] ?></td>
<td  style="padding-left: 5px;" nowrap="nowrap"><?php echo $calcula_volume ?></td>
<td  style="padding-left: 5px;" nowrap="nowrap"><?php echo $row_veiculo["valor"]  . " / <strong>" . round($porcentagem_valor) . "%</strong>" ?></td>
<td  style="padding-left: 5px;" nowrap="nowrap"><?php echo $row_veiculo["valor_total"] ?></td>
<td  style="padding-left: 5px;" nowrap="nowrap"><?php echo $calcula_valor ?></td>
</tr>
<?php
		}
?>


</tbody>
		
</table>


</form>

</div>


</div>
</body>