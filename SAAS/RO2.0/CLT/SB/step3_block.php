<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>::. ROTAS ONLINE .:: CADD</title>
<link rel="stylesheet" type="text/css" href="css/menu_nv.css">
<link rel="shortcut icon" href="imgs/favicon.ico" >
 <link rel="icon" type="image/gif" href="imgs/animated_favicon1.gif" >
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

<script language="javascript" type="text/javascript" src="js/jquery.colorPicker.js"/></script>
<script type='text/javascript' src="control/timer.js"></script>
<script src="js/logger.js"></script>


<script src="https://code.jquery.com/jquery-3.1.0.min.js"></script>

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
@charset "UTF-8";


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

.jquery-waiting-base-container {
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
	height: 424px;

	z-index: 10;
	overflow:auto;


	margin-bottom: 50px;
	
	
}

	#botao{
	position: absolute;
	right:18px;
	top:27px;
	z-index:9999;
	}
	

  input[type=submit] {  
	color: #fff;
	border: 1px solid #2867b2;
	background: #2867b2;

	
	font-size:11px;
	
	font-weight:bold;
	height: 34px;
	width:130px;
	
    }  
	
input[type=submit]:hover{
	background-color: #888888;
	transition: background-color 0.2s;
  cursor:pointer;
  color: #FFF;
  border: 1px solid #888888;
    }  

    #div_background a:link {
		color: black;
		text-decoration: none;
		font-weight: bold;
	  }

	  
	  /* visited link */
	  #div_background a:visited {
		color: black;
	  }
	  
	  /* mouse over link */
	  #div_background a:hover {
		color: red;
	  }
	  
	  /* selected link */
	  #div_background a:active {
		color: red;
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

function confirmaExclusao(aURL) {

if(confirm('Você tem certeza que deseja excluir este veículo? Todas Rotas e todos clientes agrupados a ele perderam o vínculo!')) {

location.href = aURL;

//target=ver;

}
}

function confirmaInativo(aURL) {

if(confirm('Você tem certeza que deseja retirar a Roterização desse veículo? Seus pedidos e seu veiculo voltaram a aparecer no Passo 3 como não roterizados!')) {

location.href = aURL;

//target=ver;

}
}
function confirmaativo(aURL) {

if(confirm('Você tem certeza que deseja habilitar o botão "Roterizado" desse veículo? Seus pedidos e seu veiculo não serão visualizados no Passo 3, mesmo que você ainda não tenha formado a rota dele!')) {

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

alert("Preencha o campo 'Nome do veículo'!");

document.adiciona.veiculo.focus();

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

<body>
<div class="jquery-waiting-base-container"></div>

<div id="div_geral">

<table border="0" color:#000000;"  cellpadding="0" cellspacing="0">
   <tr>

       <td valign="button" align="left" style="height: 32px;vertical-align: top;">
       <font size="4"><strong>&nbsp;CONTROLE DE ROTAS</strong></font>
       

</td>
   </tr>
   <tr style="height: 25px;vertical-align: top">
   <td><hr style="border: none; width:100%;" color="#ECECEC"></td>
  

   </tr>
   
   </table>


   <table cellpadding="0" cellspacing="0">
	  <tr>
		 <td style="padding-right: 4px;" nowrap>	
         <form action="scripts.php?acao=bloqueia_veiculos_todos" name="bloquear" id='bloquear' method="post">
<input type='submit' value='LIBERAR TODAS'/>
</form>
		  
		  </td>
		  <td>

        

</td>
<td>
<form action="scripts.php?acao=libera_veiculos_todos" name="libera" id='libera' method="post">
<input type='submit' value='BLOQUEAR TODAS'/>

</form>
		  </td>
		  </tr>
	  </table>
	<br>

  <div id="div_background">
<table border="3" id="demo" name="demo" class="tablesorter">
<thead>
<tr bgcolor="#589bd4" height="35px" class="active">

<th nowrap="nowrap" headers="check" bgcolor="#00000" style="color:#000000; width:10px" class="drag-enable" title="CHECK">
<div align="center" >&nbsp;</div>
</th>
<th nowrap="nowrap" headers="icone" bgcolor="#00000" style="color:#000000; width:10px" class="drag-enable" title="ICONE">
<div align="center" >&nbsp;</div>
</th>
<th nowrap="nowrap" headers="icone" bgcolor="#00000" style="color:#000000;" class="drag-enable" title="GEOCODIFICAR">
<div align="center" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;NOME</div>
</th>
<th nowrap="nowrap" headers="icone" bgcolor="#00000" style="color:#000000; " class="drag-enable" title="TRANSPOTADORA">
<div align="center" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;TRANSP.</div>
</th>
<th nowrap="nowrap" headers="icone" bgcolor="#00000" style="color:#000000;" class="drag-enable" title="TIPO">
<div align="center" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;TIPO</div>
</th>
<th nowrap="nowrap" headers="icone" bgcolor="#00000" style="color:#000000;" class="drag-enable" title="PESO">
<div align="center" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;PESO</div>
</th>
<th nowrap="nowrap" headers="icone" bgcolor="#00000" style="color:#000000; " class="drag-enable" title="PESO CARREGADO">
<div align="center" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;PESO C.</div>
</th>
<th nowrap="nowrap" headers="icone" bgcolor="#00000" style="color:#000000;" class="drag-enable" title="VOLUME">
<div align="center" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;VOLUME</div>
</th>
<th nowrap="nowrap" headers="icone" bgcolor="#00000" style="color:#000000; " class="drag-enable" title="VOLUME CARREGADO">
<div align="center" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;VOLUME C.</div>
</th>
<th nowrap="nowrap" headers="icone" bgcolor="#00000" style="color:#000000;" class="drag-enable" title="VALOR">
<div align="center" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;VALOR</div>
</th>
<th nowrap="nowrap" headers="icone" bgcolor="#00000" style="color:#000000;" class="drag-enable" title="VALOR CARREGADO">
<div align="center" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;VALOR C.</div>
</th>
</tr>
</thead>
<tbody>


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
	$query = "select * from veiculos WHERE ocupado=1 order by roteirizado desc";		
	} else {
	$query = "select * from veiculos WHERE ocupado=1 order by $_seleciona asc";
	}
} else {
		
	$query = "select * from veiculos WHERE ocupado=1 order by transportadora asc";	
	
}	
														
$rs = mysql_query($query);
$conta = 0;	

while($row = mysql_fetch_array($rs)){
$conta = $conta + 1;	
		
?>

<tr>
<td align="center" style="width:10px"><div align="center">
<?php
if($row["roteirizado"]=="sim"){ 
?>
<a href="javascript:confirmaInativo('scripts.php?acao=libera_veiculo&id=<?php echo $row["id"];  ?>')"><span class="material-icons" style="font-size: 18px;">
check_box
</span></a>
<?php
} else {
?>
<a href="javascript:confirmaativo('scripts.php?acao=bloqueia_veiculo&id=<?php echo $row["id"];  ?>')"><span class="material-icons" style="font-size: 18px;">
check_box_outline_blank
</span>
</a>
<?php
}
?>
</div>
</td>
<td  align="center"><div align="center">
<?php
 $concatena_icone = "imgs/" . $row["tipo"] . "_" . $row["type_icon"] . ".png";
?>

<img src="<?php echo $concatena_icone; ?>" height="14" />
</div>
</td>
<td align="left" style="padding-left: 5px;"><?php echo $row["nome"] ?></td>
<td nowrap="nowrap" align="left" style="padding-left: 5px;"><?php echo $row["transportadora"] ?></td>

<td nowrap align="left;" style="padding-left: 5px;"><?php echo $row["tipo"] ?></td>
<td nowrap align="left" style="padding-left: 5px;"><?php echo $row["peso"] ?></td>
<td nowrap align="left" style="padding-left: 5px;"><?php echo $row["peso_total"] ?></td>
<td nowrap align="left" style="padding-left: 5px;"><?php echo $row["volume"] ?></td>
<td nowrap align="left" style="padding-left: 5px;"><?php echo $row["volume_total"] ?></td>
<td nowrap align="left" style="padding-left: 5px;"><?php echo $row["valor"] ?></td>
<td nowrap align="left" style="padding-left: 5px;"><?php echo $row["valor_total"] ?></td>
</tr>
<?php		
}
?>
</tbody>
		
</table>

</div>

</div>

   
</body>
</html>