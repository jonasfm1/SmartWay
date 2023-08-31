<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>::. ROTAS ONLINE .:: CADD</title>
<link rel="stylesheet" type="text/css" href="css/menu_nv.css">
<link rel="stylesheet" type="text/css" href="css/step4.css">
<script type='text/javascript' src="control/timer.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script> 
<link rel="shortcut icon" href="imgs/favicon.ico" >
 <link rel="icon" type="image/gif" href="imgs/animated_favicon1.gif" >
 <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<?php 
include ('session.php'); 
include ('essence/conecta.php');
ini_set('max_execution_time',12000);

$query_where = "UPDATE passo SET ok='yes' WHERE (id='1' OR id='2' OR id='3' OR id='4')";
$rs_where = mysql_query($query_where);



?>

<script src="https://code.jquery.com/jquery-3.1.0.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.2/jquery-ui.min.js"></script>
<script src="js/jquery.dragtable.js"></script>



  <script src="js/logger.js"></script>


  <link rel="stylesheet" type="text/css" href="css/dragtable.css" />
<script src="js/jquery-ui.min.js"></script>

<!-- Tablesorter: theme -->
<link class="theme" rel="stylesheet" href="css/theme.blue.css">
<link rel="stylesheet" href="css/dragtable.mod.css">

<!-- Tablesorter script: required -->
<script src="js/jquery.tablesorter.js"></script>
<script src="js/jquery.tablesorter.widgets.js"></script>

<script src="js/extras/jquery.dragtable.mod.js"></script>



<style>

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
</script>
<?php
$editar = $_GET['edit'];
$id_quem= $_GET['id'];
$cor_pega = $_GET['color'];
$_seleciona = $_GET['select'];

 
?>

<script LANGUAGE="JavaScript">

function marcardesmarcar(){
	
	
   if ($('#todos').attr('checked')){
      $('.marcar').each(
         function(){
            $(this).attr('checked', true);
         }
      );
   }else{
      $('.marcar').each(
         function(){
            $(this).attr('checked', false);
         }
      );
   }
}


function valida(){
  
  var flag = "";
   //var primi;
 var primi = document.getElementsByName('check_list[]');
	
 var flag1 = "";
   //var primi;
 var primi1 = document.getElementsByName('check_list1[]');

	
    for (i = 0; i < primi.length; i++){
		//alert(primi[i]);
			if (primi[i].checked){
      		  flag="liberado";
			}
		
  		//alert(flag);
	
    }
	


	   
	
    for (i = 0; i < primi1.length; i++){
		//alert(primi[i]);
			if (primi1[i].checked){
      		  flag1="liberado";
			}
		
  		//alert(flag);
    }

	
  if (flag == "liberado" || flag1 == "liberado"){
        		//alert('yes');
   		 		} else {
        		alert('Escolha pelo menos um veículo para roteirizar!!!');
				return false;
				
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
    todos.checked = 1;
	marcardesmarcar();
	
});

function goBack() {
    window.history.back()
}




</script>
<style type="text/css">

</style>




</head>
	<div class="jquery-waiting-base-container"></div>
<body>

<?php include ('base3.php');
?>


<div id="total">
<form name="go_step4a" action="scripts.php?acao=grava_lat_lgn_veiculo" method="POST" >



<script language="JavaScript">

	
	function toggle(source) {
  checkboxes = document.getElementsByName('check_list[]');
  for(var i=0, n=checkboxes.length;i<n;i++) {
    checkboxes[i].checked = source.checked;
  }

  checkboxes1 = document.getElementsByName('check_list1[]');
  for(var i=0, n=checkboxes1.length;i<n;i++) {
    checkboxes1[i].checked = source.checked;
  }

}
</script>

    <?php   
	
	
	function resume($var, $limite){
        // Se o texto for maior que o limite, ele corta o texto e adiciona 3 pontinhos.
        if (strlen($var) > $limite){
                $var = substr($var, 0, $limite);
                $var = trim($var) . "...";
        }
		return $var;
}

		?>
	
	<div id="apDiv11">

   <table border="0" color:#000000;"  cellpadding="0" cellspacing="0">
   <tr>

       <td valign="button" align="left" style="height: 34px;">
       <font size="4"><strong>&nbsp;LISTA DE ROTAS</strong></font>
       
       </td>

   </tr>
   <tr style="height: 25px;vertical-align: top">
   <td><hr style="border: none; width:164px" color="#ECECEC"></td>
  
   
   <tr style="height: 15px;font-size: 12px;">
   <td colspan="4">
   
   </td>
   
   </tr>
   
   </table>
   <br>	
   <table width="15%" border="0" cellpadding="0" cellspacing="0" style="padding-top: 0px; padding-bottom: 10px; margin-top: 5px; color: #000000;" bgcolor="#FFFFFF">
		<tr>
		<td nowrap>
			<input type="checkbox" onClick="toggle(this)" /><font size='1'>&nbsp;&nbsp;SELECIONAR TODOS</font><br/>
		</td>
		</tr>
		 </table><br><br>
   
<table border="3" id="demo" name="demo" class="tablesorter" width='auto'>
<thead>
<tr  height="35px" class="active">

<th nowrap="nowrap" headers="check" bgcolor="#00000" style="color:#000000; width:10px" class="drag-enable" title="CHECK">
<div align="left" >&nbsp;</div>
</th>
<th nowrap="nowrap" headers="icone" bgcolor="#00000" style="color:#000000; width:10px" class="drag-enable" title="ICONE">
<div align="left" ></div>
</th>
<th nowrap="nowrap" headers="icone" bgcolor="#00000" style="color:#000000; " class="drag-enable" title="PLACA">
<div align="left" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;PLACA</div>
</th>
<th nowrap="nowrap" headers="icone" bgcolor="#00000" style="color:#000000; " class="drag-enable" title="TRANSPORTADORA">
<div align="left" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;MOTORISTA</div>
</th>
<th nowrap="nowrap" headers="icone" bgcolor="#00000" style="color:#000000;" class="drag-enable" title="TIPO">
<div align="left" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;TIPO</div>
</th>
<th nowrap="nowrap" headers="icone" bgcolor="#00000" style="color:#000000; " class="drag-enable" title="PESO">
<div align="left" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;PESO</div>
</th>
<th nowrap="nowrap" headers="icone" bgcolor="#00000" style="color:#000000;" class="drag-enable" title="% PESO">
<div align="left" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;P. %</div>
</th>
<th nowrap="nowrap" headers="icone" bgcolor="#00000" style="color:#000000; " class="drag-enable" title="VOLUME">
<div align="left" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;VOLUME</div>
</th>
<th nowrap="nowrap" headers="icone" bgcolor="#00000" style="color:#000000;" class="drag-enable" title="% VOLUME">
<div align="left" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;V. %</div>
</th>

<th nowrap="nowrap" headers="icone" bgcolor="#00000" style="color:#000000; " class="drag-enable" title="VALOR">
<div align="left" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;VALOR</div>
</th>
<th nowrap="nowrap" headers="icone" bgcolor="#00000" style="color:#000000;" class="drag-enable" title="% VALOR">
<div align="left" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;V. %</div>
</th>
<th nowrap="nowrap" headers="icone" bgcolor="#00000" style="color:#000000; " class="drag-enable" title="PEDIDOS/VISITAS">
<div align="left" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;PED./VIS.</div>
</th>
<th nowrap="nowrap" headers="icone" bgcolor="#00000" style="color:#000000; width:10px" class="drag-enable" title="CLIENTES">
<div align="left" >CLI.</div>
</th>
<th nowrap="nowrap" headers="icone" bgcolor="#00000" style="color:#000000; width:100px" class="drag-enable" title="PONTO INICIAL">
<div align="center" >PONTO INICIAL</div>
</th>
<th nowrap="nowrap" headers="icone" bgcolor="#00000" style="color:#000000; width:100px" class="drag-enable" title="PONTO FINAL">
<div align="center" >PONTO FINAL</div>
</th>
</tr>
</thead>
<tbody>


<tr>
	 
<?php		
	$query = "select * from veiculos where equipe='yes' and roteirizado!='sim' order by id ASC";																
	$rs = mysql_query($query);
	$conta = 0;	
											
	while($row = mysql_fetch_array($rs)){
		
	$id = $row["id"];
	$nome = $row["nome"];	
	$cor = $row["cor"];
	$tipo = $row["tipo"];
	$equipe = $row["equipe"];
	$peso = $row["peso"];
	$volume = $row["volume"];
	$valor = $row["valor"];	
	$peso_total = $row["peso_total"];
	$volume_total = $row["volume_total"];	
	$valor_total = $row["valor_total"];
	$type_icon= $row["type_icon"];
	
	$confere_roteirizado= $row["roteirizado"];
		
	$setor = $row["setor"];
	$transportadora = $row["transportadora"];
		
		
	$porc_peso = ($peso_total/$peso) * 100;
	$porc_volume = ($volume_total/$volume) * 100;
	$porc_valor = ($valor_total/$valor) * 100;


	?>

<tr style="height: auto;">
	<td nowrap align="center" width='20px'>
	<?php 

$query1 = "select * from clientes where veiculo=$id and ativo=0";														
$rs1 = mysql_query($query1);
$num_rows = mysql_num_rows($rs1);

if($num_rows>25){

  $up_tipo_rota = "UPDATE clientes SET tipo_rota='c' where veiculo=$id and ativo=0";														
  $up_tipo_rota = mysql_query($up_tipo_rota);

     ?>
   <input type="checkbox" value="<?=$id?>" class="marcar" name="check_list1[]" id="check_list1" />
   
   <?php
    

} else {
  $up_tipo_rota = "UPDATE clientes SET tipo_rota='g' where veiculo=$id and ativo=0";														
  $up_tipo_rota = mysql_query($up_tipo_rota);
    ?>
      <input type="checkbox" value="<?=$id?>" class="marcar" name="check_list[]" id="check_list"  />
    <?php
 }	



	?>
	</td>
<td nowrap align="center" style="width: 10px;">
<?php if ($tipo=="Moto"){ ?><img src="imgs/<?php echo "v06_" . $type_icon . ".png";  ?>" height="8px"/><?php } ?>
  <?php if ($tipo=="Carreta"){ ?><img src="imgs/<?php echo "v05_" . $type_icon . ".png";  ?>" height="8px"/><?php } ?>
  <?php if ($tipo=="Truck"){ ?><img src="imgs/<?php echo "v04_" . $type_icon . ".png";  ?>" height="8px"/><?php } ?>
  <?php if ($tipo=="Toco"){ ?><img src="imgs/<?php echo "v03_" . $type_icon . ".png";  ?>" height="8px"/><?php } ?>
  <?php if ($tipo=="Van"){ ?><img src="imgs/<?php echo "v02_" . $type_icon . ".png";  ?>" height="8px"/><?php } ?>
  <?php if ($tipo=="Vuc"){ ?><img src="imgs/<?php echo "v01_" . $type_icon . ".png";  ?>" height="8px"/><?php } ?>
  <?php if ($tipo==""){ ?><img src="imgs/vx.png"/><?php } ?>
</td>
<td title="<?= $nome?>" nowrap align="left" style="padding-left: 10px;">
<?php 	


$query1_1 = "select * from clientes where veiculo=$id and ativo=0";														
$query1_1 = mysql_query($query1_1);	
//$dados = mysql_fetch_array($query);
$num_rows1 = mysql_num_rows($query1_1);

	//echo "<strong>" . $nome . "</strong>";
	echo mb_strimwidth( $nome, 0, 10, "..."); ;
	?>
</td>
<td  title="<?= $transportadora?>" nowrap align="left"  style="padding-left: 10px;" >
<?php 	
	//echo "<strong>" .  $transportadora . "</strong>"; 
	echo $transportadora;
	?>
</td>
<td nowrap align="left" style="padding-left: 10px;">
<?php 	
	echo $tipo;
	?>
</td>
<td nowrap align="left" style="padding-left: 10px;">
<?php 	
	echo $peso . " / <strong>" . $peso_total . "</strong>";
	?>
</td>
<td nowrap align="left" style="padding-left: 10px;">
<?php 	
	echo "<strong>" . number_format($porc_peso, 0, ',', '.') . "%" . "</strong>";
	?>
</td>
<td nowrap align="left" style="padding-left: 10px;">
<?php 	
	echo $volume . " / <strong>" . $volume_total . "</strong>";
	?>
</td>
<td nowrap align="left" style="padding-left: 10px;">
<?php 	
	echo "<strong>" . number_format($porc_volume, 0, ',', '.') . "%" . "</strong>";
	?>
</td>

<td nowrap align="left" style="padding-left: 10px;">
<?php 	
	echo $valor . " / <strong>" . $valor_total . "</strong>";
	?>
</td>
<td nowrap align="left" style="padding-left: 10px;">
<?php 	
	echo "<strong>" . number_format($porc_valor, 0, ',', '.') . "%" . "</strong>";
	?>
</td>

<td  nowrap align="left" style="padding-left: 10px;" >
<?php
	

		echo "<font color='#000000'><strong>" . $num_rows1 . "/" . $num_rows . "</strong></font>";

	
	?> 
</td>
<td  nowrap align="left" style="padding-left: 10px;">

<a href="#" data-tooltip="Lista de clientes" onclick="javascript:alert('Icone temporariamente desabilitado!');return false;"><i class="material-icons" style="font-size:14px">assignment_ind</i>

</td>
<td nowrap align="center" >
<label>
<select name="inicio_todos[]">
<?php 



	$query3 = "select * from pontos order by id";																
	$rs3 = mysql_query($query3);											
	while($row3 = mysql_fetch_array($rs3)){
	$posicao = $row3["latitude"] . ", " . $row3["longitude"];
	$nome_ponto = $row3["nome"];
  

?>
  	<option value="<?=$posicao ?>"><?=$nome_ponto ?></option>
  <?php
	}
  ?>
</select>
</label>

<input type="text" name="qual_veiculo[]" value="<?php echo $id ?>" id="qual_veiculo" hidden>
</td>


<td nowrap align="center" >
<label>
<select name="final_todos[]">
<?php 
	$query3 = "select * from pontos";																
	$rs3 = mysql_query($query3);											
	while($row3 = mysql_fetch_array($rs3)){
	$posicao = $row3["latitude"] . ", " . $row3["longitude"];
	$nome_ponto = $row3["nome"];

  $query_confere =  "select * from veiculos where transportadora='$nome_ponto'";
  $rs_confere = mysql_query($query_confere);

  $dados = mysql_fetch_array($rs_confere);

  $confere_nome = $dados["transportadora"];
 

   if($confere_nome==$transportadora){

    $selecionado = "selected";

    //echo $transportadora;

    ?>
  	<option value="<?=$posicao ?>" <?php echo  $selecionado; ?>><?=$nome_ponto ?></option>
  <?php


   } else {


    ?>
  	<option value="<?=$posicao ?>"><?=$nome_ponto ?></option>
  <?php

   }

	}
  ?>
</select>
</label>


</td>

    <?php 
		}
		
//	}
	?>
 
</tr>

</tbody>
		
</table>


	</div>	
	<br><br><br><br><br><br><br><br>

	</div>

<div class="footer">
  
  <table border="0" style="width: 100%; height:100%"   cellpadding="0" cellspacing="0">
<tr >
  <td style="font-size: 11px;text-align: left;">
 

  </td>
  <td style="color: #FFFFFF;text-align: left;font-size: 11px;" style="text-transform: bold;">
  
 
  </td>

  <td style="color: #FFFFFF;text-align: left;font-size: 11px;" style="text-transform: bold;">
	 
  
  </td>
  <td style="font-size: 11px;text-align: right;">
 
<input type='submit' value='AVANÇAR'  onclick="return valida();"/>
</form>
    </td>
</tr>

  </table>


</div>

</body>
</html>