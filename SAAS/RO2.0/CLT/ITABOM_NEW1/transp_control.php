<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>::. ROTAS ONLINE .:: CADD</title>
<link rel="stylesheet" type="text/css" href="css/menu_nv.css">
<link rel="stylesheet" type="text/css" href="css/cad_transp.css">
<link rel="shortcut icon" href="imgs/favicon.ico" >
 <link rel="icon" type="image/gif" href="imgs/animated_favicon1.gif" >
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

<script language="javascript" type="text/javascript" src="js/jquery.colorPicker.js"/></script>
<script type='text/javascript' src="control/timer.js"></script>
<script src="js/logger.js"></script>


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
<body>
<?php include ('base3.php'); ?>

<div id="total">


   
<table border="0" color:#000000;"  cellpadding="0" cellspacing="0">
   <tr>
   
       <td valign="button" align="left" style="height: 34px;">
       <font size="4"><strong>&nbsp;CONTROLE DE TRANSPORTADORAS</strong></font>
       
       </td>
 
   </tr>
   <tr style="height: 25px;vertical-align: top">
   <td colspan="5"><hr style="border: none; width:100%;" color="#ECECEC"></td>
  
   
   <tr style="height: 15px;font-size: 12px;">
   <td colspan="5">
   
   </td>
   
   </tr>
   
   </table>



   
<table border="3" id="demo" name="demo" class="tablesorter" style="width: auto;"">
<thead>
<tr bgcolor="#589bd4" height="35px" class="active">


<th nowrap="nowrap" headers="icone" bgcolor="#00000" style="color:#000000; width:10px" class="drag-enable" title="EDITAR">
<div align="center" >&nbsp;</div>
</th>
<th nowrap="nowrap" headers="icone" bgcolor="#00000" style="color:#000000;" class="drag-enable" title="NOME">
<div align="center" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;NOME</div>
</th>
<th nowrap="nowrap" headers="icone" bgcolor="#00000" style="color:#000000;" class="drag-enable" title="NOME">
<div align="center" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;SIGLA</div>
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


$nome_transp = $_GET["reg"];
$sigla = $_GET["sigla"];
$id = $_GET["id"];

	$query = "select * from transportadora order by nome";		

														
$rs = mysql_query($query);
$conta = 0;	

while($row = mysql_fetch_array($rs)){
$conta = $conta + 1;	
		
?>

<tr>

<td  align="center"><div align="center">
<a href="transp_control.php?editar=ok&reg=<?php echo $row['nome'] ?>&sigla=<?php echo $row['sigla'] ?>&id=<?php echo $row['nome'] ?>"><i class="material-icons" style="font-size:14px">edit</i></a>
</td>
<td align="center" ><?php 
echo $row["nome"];
$segura_nome =$row["nome"];

?></td>
<td align="center" ><?php 
echo $row["nome"];
$segura_nome =$row["sigla"];

?></td>
</tr>
<?php		
}
?>
</tbody>
		
</table>

<br><br><br>
   <form name="nnn" id="nnn" action="scripts.php?acao=edita_transp" method="POST">
   <table border="0" color:#000000;"  cellpadding="0" cellspacing="0" style="width: 900px;">
      <tr>
      
          <td valign="button" align="left" style="height: 34px;">
          <font size="4"><strong>&nbsp;EDITAR TRANSPORTADORA</strong></font>
          
          </td>
    
      </tr>
      <tr style="height: 25px;vertical-align: top">
      <td colspan="5"><hr style="border: none; width:270px;" color="#ECECEC"></td>
     
      
      <tr style="height: 45px;font-size: 12px;">
      <td colspan="5">
        <table border=0 style="width: 100%;">
<tr>
<td>
<b> &nbsp;NOME</b>:
</td>
<td>
<input type="text" id="id" name="id"  size="10" value="<?php echo $nome_transp;  ?>" hidden>
<input type="text" id="name1" name="name1"  size="10" value="<?php echo $nome_transp;  ?>">
</td>
<td>
<b> &nbsp;SIGLA</b>:
</td>
<td>
<input type="text" id="sigla1" name="sigla1"  size="10" value="<?php echo $sigla ?>">
</td>
<td style="width: 150px;">

</td>
<td align="right">
<input name="editar" id="editar" type="submit" value="EDITAR TRANSPORTADORA" form="nnn"/>
</td>
</tr>

        </table>
     
      </td>
      
      </tr>
      
      </table>
   </form>

<br><br><br>
   <form name="nnnz" id="nnnz" action="scripts.php?acao=adiciona_transp" method="POST">
   <table border="0" color:#000000;"  cellpadding="0" cellspacing="0" style="width: 900px;">
      <tr>
      
          <td valign="button" align="left" style="height: 34px;">
          <font size="4"><strong>&nbsp;ADICIONAR TRANSPORTADORA</strong></font>
          
          </td>
    
      </tr>
      <tr style="height: 25px;vertical-align: top">
      <td colspan="5"><hr style="border: none; width:300px;" color="#ECECEC"></td>
     
      
      <tr style="height: 45px;font-size: 12px;">
      <td colspan="5">
        <table border=0 style="width: 100%;">
<tr>
<td>
<b> &nbsp;NOME</b>:
</td>
<td>
<input type="text" id="name" name="name"  size="10">
</td>
<td>
<b> &nbsp;SIGLA</b>:
</td>
<td>
<input type="text" id="sigla" name="sigla"  size="10">
</td>
<td style="width: 150px;">

</td>
<td align="right">
<input name="adicionar" id="adicionar" type="submit" value="ADICIONAR TRANSPORTADORA" form="nnnz"/>
</td>
</tr>

        </table>
     
      </td>
      
      </tr>
      
      </table>
   </form>

   

</div>

   
</body>
</html>