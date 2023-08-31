<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>::. ROTAS ONLINE .:: CADD</title>
<link rel="stylesheet" type="text/css" href="css/menu_nv.css">
<link rel="stylesheet" type="text/css" href="css/cad_veiculos.css">
<link rel="shortcut icon" href="imgs/favicon.ico" >
 <link rel="icon" type="image/gif" href="imgs/animated_favicon1.gif" >
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<script language="javascript" type="text/javascript" src="js/jquery.colorPicker.js"/></script>
<script type='text/javascript' src="control/timer.js"></script>
<script src="js/logger.js"></script>


<?php
$editar = $_GET['edit'];
$id_quem= $_GET['id'];
$cor_pega = $_GET['color'];
$_seleciona = $_GET['select'];

 
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


select {
  padding-left: 8px;
	font-size: 12px;
	height: 20px;
  width: 302px;
  border-color: #ddd;
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

<link rel="stylesheet" href="css/colorPicker.css" type="text/css" />
<style>
   
div.controlset {display: block; width: 100%; padding: 0.25em 0;}

div.controlset label, 
div.controlset input,
div.controlset div { display: inline; float: right; }

div.controlset label { width: 200px;}
</style>
<script LANGUAGE="JavaScript">


function openNav() {
  document.getElementById("mySidenav").style.width = "380px";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
}



function confirmaExclusao(aURL) {

if(confirm('Você tem certeza que deseja excluir este veículo? Todas Rotas e todos clientes agrupados a ele perderam o vínculo!')) {

location.href = aURL;

//target=ver;

}
}

function confirmaInativo(aURL) {

if(confirm('Você tem certeza que deseja inativar este veículo? Todas Rotas e todos clientes agrupados a ele perderam o vínculo!')) {

location.href = aURL;

//target=ver;

}
}





function enviardados(){

if(document.adiciona.type[0].checked == false && document.adiciona.type[1].checked == false && document.adiciona.type[2].checked == false && document.adiciona.type[3].checked == false && document.adiciona.type[4].checked == false && document.adiciona.type[5].checked == false)

{

alert("Preencha o campo 'Tipo de Veículo'!");

document.adiciona.type[0].focus();

return false;

}

if(document.adiciona.veiculo.value=="")

{

alert("Preencha o campo 'Placa do veículo'!");

document.adiciona.veiculo.focus();

return false;

}
if(document.adiciona.motorista.value=="" || document.adiciona.motorista.value==0)

{

alert("Preencha o campo 'Motorista'!");

document.adiciona.motorista.focus();

return false;

}
if(document.adiciona.transp1.value=="" || document.adiciona.transp1.value==0)

{

alert("Preencha o campo 'Transportado'!");

document.adiciona.transp1.focus();

return false;

}
if(document.adiciona.regiao.value=="" || document.adiciona.regiao.value==0)

{

alert("Preencha o campo 'Região'!");

document.adiciona.regiao.focus();

return false;

}
if(document.adiciona.eixos.value=="" || document.adiciona.eixos.value==0)

{

alert("Preencha o campo 'Eixos'!");

document.adiciona.eixos.focus();

return false;

}
if(document.adiciona.peso.value=="" || document.adiciona.peso.value==0)

{

alert("Preencha o campo 'Peso'! Esse campo não pode ter valor zero ou valor nulo!");

document.adiciona.peso.focus();

return false;

}


if(document.adiciona.volume.value=="" || document.adiciona.volume.value==0)

{

alert("Preencha o campo 'Volume'! Esse campo não pode ter valor zero ou valor nulo!");

document.adiciona.volume.focus();

return false;

}


if(document.adiciona.valor.value=="" || document.adiciona.valor.value==0)

{

alert("Preencha o campo 'Valor'! Esse campo não pode ter valor zero ou valor nulo!");

document.adiciona.valor.focus();

return false;

}


}

</SCRIPT>
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


 
</SCRIPT>

<?php 
include ('session.php');
include ('essence/conecta.php');
ini_set('max_execution_time',12000);
?>
</head>
<div class="jquery-waiting-base-container"></div>
<body onload="openNav()">
<?php include ('base1.php'); ?>
<div id="apDiv11">
<div id="mySidenav" class="sidenav">
  <div class="div" id="div" name="div">
  <br><br>
	<br><br>
	
<?php
if ($editar=='true'){
     ?>


     <?php
$query1 = "select * from veiculos where id='$id_quem'";															
$rs1 = mysql_query($query1);

$row1 = mysql_fetch_array($rs1)

   ?>
   <br>
  <form name="adiciona" action="scripts.php?acao=alterar_veiculo_cad" method="post">

  <table border="0" style="color:#000000;"  cellpadding="0" cellspacing="0">
   <tr>
     
       <td valign="button" align="left" style="height: 30px;" nowrap="nowrap">
       <font size="4"><strong>&nbsp;EDITAR VEÍCULO - </strong> <?php  echo $row1["nome"];   ?></font>
       
       </td>

   </tr>
   <tr style="height: 15px;vertical-align: top">
   <td colspan="2"><hr style="border: none; width:100%;" color="#DCDCDC"></td>
  
</tr>
   
   </table>

<br>

<table width="80" border="0" cellspacing="0" cellpadding="0" class="bordasimples">
<input name="id_veiculo" type="hidden" id="id_veiculo" value="<?php echo $id_quem;  ?>" />
  <select name="qto" id="qto" class="select" hidden="hidden"><option value="1">1</option>

    <tr>

<td style="height: 20px;">
<?php 
 if($row1["tipo"]=='3-4') { 
 ?>
  <input name="type" type="radio" value="3-4"  checked="checked"/>
<?php 
 } else {
 ?>
   <input name="type" type="radio" value="3-4" />
<?php 
 }
 ?>
</td>
<td style="height: 20px;"><font color="#808080">&nbsp;&nbsp;3/4</font></td>
</tr>
<tr>
    <tr>

    <td style="height: 20px;">
    <?php 
	   if($row1["tipo"]=='Vuc') { 
	   ?>
    	<input name="type" type="radio" value="Vuc"  checked="checked"/>
   <?php 
	   } else {
	   ?>
       <input name="type" type="radio" value="Vuc" />
   <?php 
	   }
	   ?>
    </td>
    <td style="height: 20px;"><font color="#808080">&nbsp;&nbsp;VUC</font></td>
    </tr>
    <tr>
    <td>
           <?php 
	   if($row1["tipo"]=='Van') { 
	   ?>
       <input name="type" type="radio" value="Van" checked="checked"/>
      <?php 
	   } else {
	   ?> 
        <input name="type" type="radio" value="Van" />
         <?php 
	   }
	   ?>
    </td>
   
   
    <td style="height: 20px;"><font color="#808080">&nbsp;&nbsp;VAN</font></td>
    </tr>
    <tr>
    <td style="height: 20px;">
     <?php 
	   if($row1["tipo"]=='Toco') { 
	   ?>
     <input name="type" type="radio" value="Toco"  checked="checked"/>
      <?php 
	   } else {
	   ?>      
     <input name="type" type="radio" value="Toco" />
        <?php 
	   }
	   ?>
    </td>
    <td><font color="#808080">&nbsp;&nbsp;TOCO</font> </td>
    </tr>
    <tr>
    <td style="height: 20px;">
       <?php 
	   if($row1["tipo"]=='Truck') { 
	   ?>
      <input name="type" type="radio" value="Truck" checked="checked"/>
        <?php 
	   } else {
	   ?>   
      
       <input name="type" type="radio" value="Truck" />
         <?php 
	   }
	   ?>
    </td>
    <td style="height: 20px;"><font color="#808080">&nbsp;&nbsp;TRUCK</font>
      
    </td>
    </tr>
    <tr>
    <td style="height: 20px;">
        <?php 
	   if($row1["tipo"]=='Carreta') { 
	   ?>
      <input name="type" type="radio" value="Carreta" checked="checked"/>
         <?php 
	   } else {
	   ?>  
       <input name="type" type="radio" value="Carreta" />
       <?php 
	   }
	   ?>
    </td>
    <td><font color="#808080">&nbsp;&nbsp;CARRETA</font>
        
    </td>
  </tr>
</table>
<br><br>
  
<table width="300" border="0" cellspacing="0" cellpadding="0" >
  <tbody>
   <tr>
   <tr>
      <td height="25" bgcolor="#ff0000" style="text-align: center">
       <?php
	   //VERMELHO 
	   if($row1["cor"]=='#ff0000') { 
	   ?>
      <input type="radio" name="color1" id="color1" value="#ff0000" checked="checked">

       <?php 
	   } else {
	  ?> 
      <input type="radio" name="color1" id="color1" value="#ff0000">
     <?php 
	  }
	 ?> 
      </td>
      
      <td bgcolor="#ff7800" style="text-align: center">
       <?php 
	    //LARANJA 
	   if($row1["cor"]=='#ff7800') { 
	   ?>
      <input type="radio" name="color1" id="color1" value="#ff7800"  checked="checked">
       <?php 
	   } else {
	  ?> 
       <input type="radio" name="color1" id="color1" value="#ff7800">
      <?php 
	  }
	 ?> 
      </td>
      
      <td bgcolor="#42ff00" style="text-align: center">
          <?php 
		   //VERDE 
	   if($row1["cor"]=='#42ff00') { 
	   ?>
      <input type="radio" name="color1" id="color1" value="#42ff00" checked="checked">
             <?php 
	   } else {
	  ?> 
       <input type="radio" name="color1" id="color1" value="#42ff00">
        <?php 
	  }
	 ?> 
      </td>
      
      <td bgcolor="#7200ff" style="text-align: center">
       <?php 
	     //LILAS 
	   if($row1["cor"]=='#7200ff') { 
	   ?>
      <input type="radio" name="color1" id="color1" value="#7200ff" checked="checked">
       <?php 
	   } else {
	  ?> 
       <input type="radio" name="color1" id="color1" value="#7200ff">
        <?php 
	   }
	   ?> 
      </td>
  
      
      <td bgcolor="#003cff" style="text-align: center">
        <?php 
		  //AZUL 
	   if($row1["cor"]=='#003cff') { 
	   ?>
      <input type="radio" name="color1" id="color1" value="#003cff" checked="checked">
       <?php 
	   } else {
	  ?> 
       <input type="radio" name="color1" id="color1" value="#003cff">
        <?php 
	   }
	   ?> 
      </td>
       
    <td bgcolor="#00760b" style="text-align: center">
            <?php 
			  //VERDE
	   if($row1["cor"]=='#00760b') { 
	   ?>
      <input type="radio" name="color1" id="color1" value="#00760b" checked="checked">
       <?php 
	   } else {
	  ?> 
       <input type="radio" name="color1" id="color1" value="#00760b">
        <?php 
	   }
	   ?> 
      </td>
      <td bgcolor="#9c5100" style="text-align: center">
      
             <?php 
			 	  //MARROM
	   if($row1["cor"]=='#9c5100') { 
	   ?>
      <input type="radio" name="color1" id="color1" value="#9c5100" checked="checked">
       <?php 
	   } else {
	  ?> 
       <input type="radio" name="color1" id="color1" value="#9c5100">
        <?php 
	   }
	   ?> 
      </td>
     
      
    <td bgcolor="#ffbc00" style="text-align: center">
            <?php 
				  //AMARELO
	   if($row1["cor"]=='#ffbc00') { 
	   ?>
      <input type="radio" name="color1" id="color1" value="#ffbc00" checked="checked">
       <?php 
	   } else {
	  ?> 
       <input type="radio" name="color1" id="color1" value="#ffbc00">
        <?php 
	   }
	   ?> 

    </td>
      
      <td  bgcolor="#900000" style="text-align: center">
            <?php 
				  //VINHO
	   if($row1["cor"]=='#900000') { 
	   ?>
      <input type="radio" name="color1" id="color1" value="#ffbc00" checked="checked">
       <?php 
	   } else {
	  ?> 
       <input type="radio" name="color1" id="color1" value="#900000">
        <?php 
	   }
	   ?> 
      </td>
      
      <td bgcolor="#340058" style="text-align: center">
            <?php 
				  //ROXO
	   if($row1["cor"]=='#340058') { 
	   ?>
      <input type="radio" name="color1" id="color1" value="#340058" checked="checked">
       <?php 
	   } else {
	  ?> 
       <input type="radio" name="color1" id="color1" value="#340058">
        <?php 
	   }
	   ?> 
    </td>
      
      <td bgcolor="#03fe85" style="text-align: center">
            <?php 
				  //VERDE CLARO
	   if($row1["cor"]=='#03fe85') { 
	   ?>
      <input type="radio" name="color1" id="color1" value="#03fe85" checked="checked">
       <?php 
	   } else {
	  ?> 
       <input type="radio" name="color1" id="color1" value="#03fe85">
        <?php 
	   }
	   ?> 
    </td>
      
    </tr>
    </tr>
   
  </tbody>
</table>
<br>
<table width="300" border="0" cellspacing="0" cellpadding="0"  class="bordasimples">
<tr>
  <td > <input name="veiculo" type="text" id="veiculo" maxlength="7" placeholder="PLACA DO VEÍCULO" maxlength="7" value="<?php echo $row1["nome"];  ?>"/></td>
</tr>
<tr>
  <td> <input name="motorista" type="text" id="motorista" placeholder="MOTORISTA" value="<?php echo $row1["motorista"];  ?>"/></td>
  </tr>
  <tr>
  <td>
  
<select name="transp1" >
    <?php 
	
$query4 = "select * from transportadora order by nome ASC";	
                    
$rs4 = mysql_query($query4);

          
while($row4 = mysql_fetch_array($rs4)){

$id_lista = $row4["nome"];


?>
    <?php 

// echo $pega_data;
//  echo $id_data;
// echo "teste";


if ($row1["transportadora"] == $id_lista){
?>
    <option selected value="<?= $id_lista ?>"><?= $id_lista ?></option>
    <?php }

else {
?>
    <option value="<?= $id_lista ?>"><?= $id_lista ?></option>
    <?php
}

}
?>
    </select>	  
    
  </tr> 

  <tr>
  <td> <input name="eixos" type="text" id="eixos" placeholder="EIXOS" value="<?php echo $row1["eixos"];  ?>"/></td>
  </tr>

  <tr>
  <td><input type="text" name="peso" id="peso"  placeholder="PESO (EXEMPLO.: 20000)" value="<?php echo $row1["peso"];  ?>"/></td>
  </tr>
  <tr>
  <td><input type="text" name="volume" id="volume"   placeholder="VOLUME (EXEMPLO.: 200)" value="<?php echo $row1["volume"];  ?>"/></td>
  </tr>
  <tr>
  <td> <input type="text" name="valor" id="valor"   placeholder="VALOR (EXEMPLO.: 1000000)" value="<?php echo $row1["valor"];  ?>"/></td>
  </tr>
  <tr>
  <td> <input type="text" name="custo1" id="custo1"  placeholder="CUSTO DO VEÍCULO (EXEMPLO.: 0.234)" value="<?php echo $row1["custo"];  ?>"/></td>
  </tr>
  <tr height='40px'>
  <td><font size='1'>Ativo:&nbsp;&nbsp;
  <?php 
	if($row1["ativo"]=='yes') { 
	?> 
    <input type="checkbox" name="ativo" id="checkbox" checked="checked" disabled/>
    
    <?php 
	} else {
	?> 
     <input type="checkbox" name="ativo" id="checkbox" disabled/>
    <?php 
	}
	?> 
  
  </font></td>
  </tr>
</table>



 
  
<br>

<input type='submit' value='ALTERAR' onClick="return enviardados();"/>


</form>
 <?php 
   } else {
  ?>
    <br>
 <form name="adiciona" action="scripts.php?acao=cadastra_veiculo_cad" method="post">
 <table border="0" color:#000000;"  cellpadding="0" cellspacing="0">
   <tr>
     
       <td valign="button" align="left" style="height: 30px;" nowrap="nowrap">
       <font size="4"><strong>&nbsp;CADASTRAR VEÍCULO</strong></font>
       
       </td>

   </tr>
   <tr style="height: 15px;vertical-align: top">
   <td colspan="2"><hr style="border: none; width:100%;" color="#DCDCDC"></td>
   </tr>
   </table>
   <br>
<table width="80" border="0" cellspacing="0" cellpadding="0" class="bordasimples">

   <tr>
    
    <td style="height: 20px;"><input name="type" type="radio" value="3-4" /></td>
    <td><font color="#808080">&nbsp;&nbsp;3-4</font></td>
    </tr>
    <tr>
   
   <tr>
    
    <td style="height: 20px;"><input name="type" type="radio" value="Vuc" /></td>
    <td><font color="#808080">&nbsp;&nbsp;VUC</font></td>
    </tr>
    <tr>
   
    <td style="height: 20px;"><input name="type" type="radio" value="Van" /></td>
    <td><font color="#808080">&nbsp;&nbsp;VAN</font></td>
   </tr>
   <tr>
   
    <td style="height: 20px;"><input name="type" type="radio" value="Toco" /></td>
    <td><font color="#808080">&nbsp;&nbsp;TOCO</font></td>
   </tr>
   <tr>
  
    <td style="height: 20px;"><input name="type" type="radio" value="Truck" /></td>
    <td><font color="#808080">&nbsp;&nbsp;TRUCK</font></td>
   </tr>
   <tr>
    
    <td style="height: 20px;"><input name="type" type="radio" value="Carreta" /></td>
    <td><font color="#808080">&nbsp;&nbsp;CARRETA</font></td>
  </tr>
</table>

  <br><br>
<table width="300" border="0" cellspacing="0" cellpadding="0" >
  <tbody>
   <tr>
      <td width="22" height="25" bgcolor="#ff0000" style="text-align: center"><input type="radio" name="color1" id="color1" value="#ff0000" checked="checked"></td>
      <td width="22" bgcolor="#ff7800" style="text-align: center"><input type="radio" name="color1" id="color1" value="#ff7800"></td>
      <td width="22" bgcolor="#42ff00" style="text-align: center"><input type="radio" name="color1" id="color1" value="#42ff00"></td>
      <td width="22" bgcolor="#7200ff" style="text-align: center"><input type="radio" name="color1" id="color1" value="#7200ff"></td>
      <td width="22" bgcolor="#003cff" style="text-align: center"><input type="radio" name="color1" id="color1" value="#003cff"></td>
      <td width="22" bgcolor="#9c5100" style="text-align: center"><input type="radio" name="color1" id="color1" value="#9c5100"></td>
      <td width="22" bgcolor="#00760b" style="text-align: center"><input type="radio" name="color1" id="color1" value="#00760b"></td>
      <td width="22" bgcolor="#ffbc00" style="text-align: center"><input type="radio" name="color1" id="color1" value="#ffbc00"></td>
      <td width="22" bgcolor="#900000" style="text-align: center"><input type="radio" name="color1" id="color1" value="#900000"></td>
      <td width="22" bgcolor="#340058" style="text-align: center"><input type="radio" name="color1" id="color1" value="#340058"></td>
      <td width="22" bgcolor="#03fe85" style="text-align: center"><input type="radio" name="color1" id="color1" value="#03fe85"></td>
    </tr>
   
  </tbody>
</table>
<br>




<table width="300" border="0" cellspacing="0" cellpadding="0">
<tr>
  <td> <input name="veiculo" type="text" id="veiculo" maxlength="7" placeholder="PLACA DO VEÍCULO"/></td>
</tr>

<tr>
  <td> <input name="motorista" type="text" id="motorista" placeholder="MOTORISTA"/></td>
</tr>
<tr>
  <td>
  
<select name="transp1" >
    <?php 
	
$query4 = "select * from transportadora order by nome ASC";	
                    
$rs4 = mysql_query($query4);

          
while($row4 = mysql_fetch_array($rs4)){

$id_lista = $row4["nome"];


?>
    <?php 

// echo $pega_data;
//  echo $id_data;
// echo "teste";


if ($dados['regiao_itabom'] == $id_lista){
?>
    <option selected value="<?= $id_lista ?>"><?= $id_lista ?></option>
    <?php }

else {
?>
    <option value="<?= $id_lista ?>"><?= $id_lista ?></option>
    <?php
}

}
?>
    </select>	  

  </tr>
<tr>
  <td> <input name="eixos" type="text" id="eixos" placeholder="EIXOS"/></td>
  </tr>

  <td><input type="text" name="peso" id="peso"  placeholder="PESO (EXEMPLO: 20000)"/></td>
  </tr>
  <tr>
  <td><input type="text" name="volume" id="volume"   placeholder="VOLUME (EXEMPLO: 200)"/></td>
  </tr>
  <tr>
  <td> <input type="text" name="valor" id="valor"   placeholder="VALOR (EXEMPLO: 1000000)"/></td>
  </tr>
  <tr>
  <td> <input type="text" name="custo" id="custo"   placeholder="CUSTO DO VEÍCULO (EXEMPLO.: 0.234)"/></td>
  </tr>
  <tr height='40px'>
  <td><font size='1'>Ativo:&nbsp;&nbsp;<input type="checkbox" name="ativo" id="checkbox" checked="checked" /></font></td>
  </tr>
</table>
<br>
<input type='submit' value='CADASTRAR' onClick="return enviardados();"/>
</form>

 <?php 
   } 
  ?>

  </div>

  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times; </a>



</div>



<table border="0" color:#000000;"  cellpadding="0" cellspacing="0">
   <tr>

       <td valign="button" align="left" style="height: 34px;">
       <font size="4"><strong>&nbsp;CONTROLE DE VEÍCULOS</strong></font>
       
       </td>

<td>

</td>
   </tr>
   <tr style="height: 25px;vertical-align: top">
   <td colspan="4"><hr style="border: none; width:100%;" color="#ECECEC"></td>
  
   
   <tr style="height: 60px;font-size: 12px;">
   <td colspan="2">
   <a href="cad_veiculos.php"><input type="submit" name="submit" id="submit" value="CADASTRAR VEÍCULO"/></a>
   </td>
   
   </tr>
   
   </table>
		<br>		<br>

    
   
<table border="3" id="demo" name="demo" class="tablesorter">
<thead>
<tr bgcolor="#589bd4" height="35px" class="active">

<th nowrap="nowrap" headers="check" bgcolor="#00000" style="color:#000000; width:10px" class="drag-enable" title="ATIVO">
<div align="center" >&nbsp;</div>
</th>
<th nowrap="nowrap" headers="icone" bgcolor="#00000" style="color:#000000;width:10px" class="drag-enable" title="ICONE">
<div align="center" >&nbsp;</div>
</th>
<th nowrap="nowrap" headers="icone" bgcolor="#00000" style="color:#000000; width:10px" class="drag-enable" title="EDITAR">
<div align="center" >&nbsp;</div>
</th>
<th nowrap="nowrap" headers="icone" bgcolor="#00000" style="color:#000000; width:10px" class="drag-enable" title="EXCLUIR">
<div align="center" >&nbsp;</div>
</th>
<th nowrap="nowrap" headers="icone" bgcolor="#00000" style="color:#000000; " class="drag-enable" title="VEÍCULO">
<div align="center" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;VEÍCULO</div>
</th>
<th nowrap="nowrap" headers="icone" bgcolor="#00000" style="color:#000000; " class="drag-enable" title="TRANSPORTADORA">
<div align="center" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;MOTORISTA</div>
</th>
<th nowrap="nowrap" headers="icone" bgcolor="#00000" style="color:#000000; " class="drag-enable" title="TRANSPORTADORA">
<div align="center" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;TRANSPORTADORA</div>
</th>
<th nowrap="nowrap" headers="icone" bgcolor="#00000" style="color:#000000; width:20px" class="drag-enable" title="OCUPADO">
<div align="center" >O</div>
</th>
<th nowrap="nowrap" headers="icone" bgcolor="#00000" style="color:#000000; width:20px" class="drag-enable" title="ROTEIRIZADO">
<div align="center" >R</div>
</th>

<th nowrap="nowrap" headers="icone" bgcolor="#00000" style="color:#000000; " class="drag-enable" title="TIPO">
<div align="center" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;TIPO</div>
</th>
<th nowrap="nowrap" headers="icone" bgcolor="#00000" style="color:#000000; " class="drag-enable" title="TIPO">
<div align="center" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;EIXOS</div>
</th>
<th nowrap="nowrap" headers="icone" bgcolor="#00000" style="color:#000000; " class="drag-enable" title="PESO">
<div align="center" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;PESO</div>
</th>
<th nowrap="nowrap" headers="icone" bgcolor="#00000" style="color:#000000; " class="drag-enable" title="VOLUME">
<div align="center" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;VOLUME</div>
</th>
<th nowrap="nowrap" headers="icone" bgcolor="#00000" style="color:#000000; " class="drag-enable" title="VALOR">
<div align="center" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;VALOR</div>
</th>
<th nowrap="nowrap" headers="icone" bgcolor="#00000" style="color:#000000;" class="drag-enable" title="CUSTO">
<div align="center" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;CUSTO</div>
</th>


</tr>
</thead>
<tbody>

<tr>

<?php
$dbname_cliente="ro_".$logado; // Indique o nome do banco de dados que será aberto
//echo $dbname_cliente;

if(!($con=mysql_select_db($dbname_cliente,$id))) {
echo "</br>Não foi possível estabelecer uma conexão com o gerenciador MySQL.</br>";
echo "Favor contactar o Administrador no telefone (11) 5505 6542.</br></br>";
echo "PRODUTO REGISTRADO CADDESIGN";
exit;
}

if ($_seleciona!=null){
	
	if($_seleciona=="ativo"){
	$query = "select * from veiculos order by ativo desc";		
	} else {
	$query = "select * from veiculos order by $_seleciona asc";	
	}
} else {
		
	$query = "select * from veiculos order by ativo desc, transportadora asc, nome asc, tipo asc";	
	
}	

				
															
$rs = mysql_query($query);

//$row= 0;	

$conta = 0;	

?>

<?php													
while($row = mysql_fetch_array($rs)){
		$conta = $conta + 1;	
		
?>
<tr>
<td nowrap align="center" style="width: 20px;">
<?php
if($row["ativo"]=="yes"){
?>
<a href="javascript:confirmaInativo('scripts.php?acao=inativa_veiculo&id=<?php echo $row["id"];  ?>')"><span class="material-icons" style="font-size: 14px;">
check_box
</span></a>
<?php
} else {
?>
<a href="scripts.php?acao=ativa_veiculo&id=<?php echo $row["id"]; ?>"><span class="material-icons" style="font-size: 14px;">
check_box_outline_blank
</span></a>
<?php
}
?>
</td>
<td nowrap align="center" >
<?php
 $concatena_icone = "imgs/" . $row["tipo"] . "_" . $row["type_icon"] . ".png";
?>

<img src="<?php echo $concatena_icone; ?>"  height="14"/>

</td>
<td nowrap align="center" ><a href="?edit=true&id=<?php echo $row["id"]; ?>&color=<?php echo $row["cor"]; ?>"><span class="material-icons" style="font-size: 14px;">edit</span></a></td>
<td nowrap align="center" ><a href="javascript:confirmaExclusao('scripts.php?acao=exclui_veiculo&id=<?php echo $row["id"] ?>')"><span class="material-icons" style="font-size: 14px;">close</span></a></td>
<td nowrap align="center" ><?php echo $row["nome"] ?></td>
<td nowrap align="center" ><?php echo $row["motorista"] ?></td>
<td nowrap align="center" ><?php echo $row["transportadora"] ?></td>
<td nowrap align="center" width="30px">
<?php
if ($row["ocupado"]==1) {
?>

<span class="material-icons"  align="center" style="font-size: 12px;">thumb_up</span>

<?php
}
?>
</td>
<td nowrap align="center" width="30px">
<?php
if ($row["roteirizado"]=='sim') {
?>

<span class="material-icons"  align="center" style="font-size: 12px;">thumb_up</span>

<?php
}
?>
</td>

<td nowrap align="center"><?php echo $row["tipo"] ?></td>
<td nowrap align="center"><?php echo $row["eixos"] ?></td>
<td nowrap align="center" ><?php echo $row["peso"] ?></td>
<td nowrap align="center" ><?php echo $row["volume"] ?></td>
<td nowrap align="center" ><?php echo $row["valor"] ?></td>
<td nowrap align="center"><?php echo $row["custo"] ?></td>


</tr>
<?php		
}
?>
</tr>
</tbody>
		
</table>




</div> 


<br>
</body>
</html>