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
<?php 
include ('session.php'); 
include ('essence/conecta.php');
ini_set('max_execution_time',12000);
?>

<style type="text/css">

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

hr {
		height: 10px
	}
</style>
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

$(document).ready(function() {
    $('.defaultTable').dragtable();
  }); 
</script>
<link href="css/prettify.css" rel="stylesheet">
<script src="js/prettify.js"></script>
<script src="js/docs.js"></script>

<script language="javascript">

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


function submitForm() {
	var genderS = document.querySelector('input[name="id_veiculox"]:checked').value;
//var genderS =  findSelection("id_veiculox");

document.getElementById("id_veiculox_ok").value = genderS;

//alert(document.getElementById("id_veiculox_ok").value);

//alert(genderS);

document.getElementById("vai").submit();

}

</script>
<!-- Tablesorter: theme -->
<link class="theme" rel="stylesheet" href="css/theme.blue.css">
<link rel="stylesheet" href="css/dragtable.mod.css">
<!-- Tablesorter script: required -->
<script src="js/jquery.tablesorter.js"></script>
<script src="js/jquery.tablesorter.widgets.js"></script>
<script src="js/extras/jquery.dragtable.mod.js"></script>

<?php 
	$_zoom = $_GET["zoom2"];
	$_zoom_x = $_GET["zoom_x2"];
	$_pesox = number_format($_GET["pesox"], 2, '.', '');
	$_volumex = number_format($_GET["volumex"], 2, '.', '');
	$_valorx = number_format($_GET["valorx"], 2, '.', '');
   ?> 
<div class="jquery-waiting-base-container1"></div>
<body>
<form method="post" id="vai" name="vai" action="scripts.php?acao=cadastra_equipe_veiculo_novo">		
<input type="hidden" id="zoom" name="zoom"  value="<?php echo $_GET['zoom2'] ?>"/>
<input type="hidden" id="zoom_x" name="zoom_x" value="<?php echo $_GET['zoom_x2'] ?>"/>   
<input type="hidden" id="pesox" name="pesox" value="<?php echo $_GET['pesox'] ?>"/>
<input type="hidden" id="volumex" name="volumex" value="<?php echo $_GET['volumex'] ?>"/>
<input type="hidden" id="valorx" name="valorx" value="<?php echo $_GET['valorx'] ?>"/> 
<input name="equipe_poligonox" id="equipe_poligonox" type="hidden" value="<?php echo $_GET['equipe_poligonox'] ?>"/>
<input name="veiculo_tirax" id="veiculo_tirax" type="hidden" value="<?php echo $_GET['veiculo_tirax'] ?>">
<input name="peso_veiculo_tirax" type="hidden" id="peso_veiculo_tirax" value="<?php echo $_GET['peso_veiculo_tirax'] ?>"/>
<input name="volume_veiculo_tirax" type="hidden" id="volume_veiculo_tirax" value="<?php echo $_GET['volume_veiculo_tirax'] ?>"/>    
<input name="valor_veiculo_tirax" type="hidden" id="valor_veiculo_tirax" value="<?php echo $_GET['valor_veiculo_tirax'] ?>"/>
<input name="endereco_clientex" id="endereco_clientex" type="hidden" value="<?php echo $_GET['endereco_clientex'] ?>"/>

<input name="id_veiculox_ok" id="id_veiculox_ok" type="hidden" value="" />




</form>

<div id="div_geral">
<table border="0" color:#000000;"  cellpadding="0" cellspacing="0">
<tr>
<td valign="button" align="left" style="height: 34px;"><font size="4"><strong>&nbsp;ESCOLHA DE VEÍCULO LIVRE -</strong></font></td>
<td><?php echo "<font size='3'>" .  "PESO: <strong>" . $_pesox . " - </strong></font>";?></td>
<td><?php echo "<font size='3'>" .  "VOLUME: <strong>" . $_volumex . " - </strong></font>";?></td>
<td><?php echo "<font size='3'>" .  "VALOR: <strong>" . $_valorx . "</strong></font>";?></td>
<td>
</td>
   </tr>
   <tr style="height: 25px;vertical-align: top">
   <td colspan="4"><hr style="border: none; width:100%;" color="#ECECEC"></td>
   <tr style="height: 15px;font-size: 12px;">
   <td colspan="4"></td>
   </tr>
   </table>
<br>
<div id="div_background">
<table border="3" id="demo" name="demo" class="tablesorter" width="750px" >
<thead>
<tr bgcolor="#589bd4" height="35px" class="active">
<th nowrap="nowrap" headers="check" bgcolor="#00000" style="color:#000000;" class="drag-enable" title="ESCOLHA"><div align="center" >CK.</div></th>
<th nowrap="nowrap" headers="icone" bgcolor="#00000" style="color:#000000;" class="drag-enable" title="ICONE"><div align="center" >I.</div></th>
<th nowrap="nowrap" headers="nome" bgcolor="#00000" style="color:#000000;" class="drag-enable" title="VEÍCULO" ><div align="center" >VEÍCULO</div></th>
<th nowrap="nowrap" headers="cod" bgcolor="#00000" style="color:#000000;" class="drag-enable" title="TIPO" ><div align="center" >TIPO</div></th>
<th nowrap="nowrap" headers="cod" bgcolor="#00000" style="color:#000000;" class="drag-enable" title="TRANSPORTADORA" ><div align="center" >TRP.</div></th>
<th nowrap="nowrap" headers="ocupado" bgcolor="#00000" style="color:#000000;" class="drag-enable" title="STATUS" ><div align="center" >STS.</div></th>
<th nowrap="nowrap" headers="peso" bgcolor="#00000" style="color:#000000;" class="drag-enable" title="PESO"><div align="center" >PESO</div></th>
<th nowrap="nowrap" headers="utilizado" bgcolor="#00000" style="color:#000000;" class="drag-enable" title="PESO UTILIZADO" ><div align="center" >P.U.</div></th>
<th nowrap="nowrap" headers="ociosa" bgcolor="#00000" style="color:#000000;" class="drag-enable" title="PESO OCIOSO" ><div align="center" >P.O.</div></th>
<th nowrap="nowrap" headers="peso" bgcolor="#00000" style="color:#000000;" class="drag-enable" title="VOLUME TOTAL"><div align="center" >VOL.T.</div></th>
<th nowrap="nowrap" headers="utilizado" bgcolor="#00000" style="color:#000000;" class="drag-enable" title="VOLUME UTILIZADO"><div align="center" >VOL.U.</div></th>
<th nowrap="nowrap" headers="ociosa" bgcolor="#00000" style="color:#000000;" class="drag-enable" title="VOLUME OCIOSO"><div align="center" >VOL.O.</div></th>
<th nowrap="nowrap" headers="peso" bgcolor="#00000" style="color:#000000;" class="drag-enable" title="VALOR TOTAL"><div align="center" >VAL.T.</div></th>
<th nowrap="nowrap" headers="utilizado" bgcolor="#00000" style="color:#000000;" class="drag-enable" title="VALOR UTILIZADO"><div align="center" >VAL.U.</div></th>
<th nowrap="nowrap" headers="ociosa" bgcolor="#00000" style="color:#000000;" class="drag-enable" title="VALOR OCIOSO"><div align="center" >VAL.O.</div></th>
</tr>	
</thead>
<tbody>
<?php 
		$query_veiuclos = "select peso_total,volume_total,valor_total,peso,volume,valor,cor,tipo,nome,transportadora,id, ocupado from veiculos where ativo='yes' AND roteirizado!='sim' order by transportadora asc, nome asc";															
		$rs_veiculo = mysql_query($query_veiuclos);
		while($row_veiculo = mysql_fetch_array($rs_veiculo)){

		if($row_veiculo["ocupado"]==1){
			$calcula_peso = $row_veiculo["peso"] - $row_veiculo["peso_total"];
			$calcula_volume = $row_veiculo["volume"] - $row_veiculo["volume_total"];
			$calcula_valor = $row_veiculo["valor"] - $row_veiculo["valor_total"];
			$porcentagem_peso = ($row_veiculo["peso_total"]/$row_veiculo["peso"]) * 100;
			$porcentagem_volume = ($row_veiculo["volume_total"]/$row_veiculo["volume"]) * 100;
			$porcentagem_valor = ($row_veiculo["valor_total"]/$row_veiculo["valor"]) * 100;
		} else {
			$calcula_peso = 0;
			$calcula_volume = 0;
			$calcula_valor = 0;
			$porcentagem_peso = 0;
			$porcentagem_volume = 0;
			$porcentagem_valor = 0;

		}

	?>
<tr height="auto">

<td align='center' nowrap="nowrap"><input name="id_veiculox" onChange="javascript: submitForm()" type="radio" value="<?php echo $row_veiculo["id"]?>" <?php if($id1==$row_veiculo["id"]) echo "checked";?> />
</td>
<td align='center' nowrap="nowrap">
<?php 
	$corescolhida = $row_veiculo["cor"];
	if ($corescolhida=="#ff0000"){$cor_veiculo = "_red1.png";}
	if ($corescolhida=="#ff7800"){$cor_veiculo = "_orange.png";}
	if ($corescolhida=="#42ff00"){$cor_veiculo = "_green1.png";}
	if ($corescolhida=="#7200ff"){$cor_veiculo = "_purple1.png";}
	if ($corescolhida=="#00f0ff"){$cor_veiculo = "_blue1.png";}	
	if ($corescolhida=="#003cff"){$cor_veiculo = "_blue2.png";}
	if ($corescolhida=="#9c5100"){$cor_veiculo = "_brown.png";}
	if ($corescolhida=="#00760b"){$cor_veiculo = "_green2.png";}	
	if ($corescolhida=="#ffbc00"){$cor_veiculo = "_yellow.png";}	
	if ($corescolhida=="#900000"){$cor_veiculo = "_red2.png";}
	if ($corescolhida=="#340058"){$cor_veiculo = "_purple2.png";}
	if ($corescolhida=="#03fe85"){$cor_veiculo = "_green3.png";}		
    if ($row_veiculo["tipo"]=="Moto"){ ?><img src="imgs/<?php echo "v06" . $cor_veiculo;  ?>" height="10px"/><?php }	
	if ($row_veiculo["tipo"]=="Vuc"){ ?><img src="imgs/<?php echo "v01" . $cor_veiculo;  ?>"height="10px" /><?php }	 
	if ($row_veiculo["tipo"]=="Van"){ ?><img src="imgs/<?php echo "v02" . $cor_veiculo;  ?>"height="10px"/><?php }
    if ($row_veiculo["tipo"]=="Toco"){ ?><img src="imgs/<?php echo "v03" . $cor_veiculo;  ?>"height="10px"/><?php }
    if ($row_veiculo["tipo"]=="Truck"){ ?><img src="imgs/<?php echo "v04" . $cor_veiculo;  ?>"height="10px"/><?php }
    if ($row_veiculo["tipo"]=="Carreta"){ ?><img src="imgs/<?php echo "v05" . $cor_veiculo;  ?>"height="10px"/><?php }
	if ($row_veiculo["tipo"]=="3-4"){ ?><img src="imgs/<?php echo "v05" . $cor_veiculo;  ?>"height="10px"/><?php }
	?>	 
</td>
<td  style="padding-left: 5px;" nowrap="nowrap"><?php echo $row_veiculo["nome"] ?></td>
<td  style="padding-left: 5px;" nowrap="nowrap"><?php echo $row_veiculo["tipo"] ?></td>
<td  style="padding-left: 5px;" nowrap="nowrap"><?php echo $row_veiculo["transportadora"] ?></td>
<td  style="padding-left: 5px;" nowrap="nowrap"><?php 
		if($row_veiculo["ocupado"]==1) {
			echo "<strong><span style='color: #FF0000'>OCUPADO</span></strong>";
		} else {
			echo "<strong><span style='color: #02FF00'>LIVRE</span></strong>";
		}
		?></td>
<td  style="padding-left: 5px;" nowrap="nowrap"><?php echo $row_veiculo["peso"] . " / <strong>" . round($porcentagem_peso) . "%</strong>" ?></td>
<td  style="padding-left: 5px;" nowrap="nowrap"><?php echo $row_veiculo["peso_total"] ?></td>
<td  style="padding-left: 5px;" nowrap="nowrap"><?php echo $calcula_peso ?></td>
<td  style="padding-left: 5px;" nowrap="nowrap"><?php echo $row_veiculo["volume"] . " / <strong>" . round($porcentagem_volume) . "%</strong>"  ?></td>
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
</div>
<br><br>
</div>
</body>