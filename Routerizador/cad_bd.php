<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>::. ROTAS ONLINE .:: CADD</title>
<link rel="stylesheet" type="text/css" href="css/menu_nv.css">
<link rel="stylesheet" type="text/css" href="css/cad_bd.css">
<link rel="shortcut icon" href="imgs/favicon.ico" >
 <link rel="icon" type="image/gif" href="imgs/animated_favicon1.gif" >

 <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<script language="javascript" type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<script type='text/javascript' src="control/timer.js"></script>
<script src="js/logger.js"></script>
<script src="js/flutuante.js"></script>


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

         function hide(target) {
    document.getElementById(target).style.display = 'none';
}


function confirmaExclusao(aURL) {

if (confirm('Você tem certeza que deseja excluir este cliente?')) {
  location.href = aURL;
  //target=ver;
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

function editar(campo) {

document.getElementById("editar").style.display = "block";

var teste = "step2_editar_db.php?codigo=" + campo;

document.getElementById("pag2_edit").src = teste; 
topFunction();
}

	
function geo(campo) {

document.getElementById("geo").style.display = "block";

var teste = "step2_gm.php?" + campo;
//var campo = document.getElementById('pega_id_cliente');
//alert(teste);
// var form = document.getElementById("frm");



//document.getElementById("myForm").action = "scripts.php";
//alert(teste + campo);
document.getElementById("pag2_geo").src = teste; 

//document.getElementById("myForm").action = "script.php";
//alert(array_check);
topFunction();
}


 
function topFunction() {
  document.body.scrollTop = 0;
  document.documentElement.scrollTop = 0;
}

	
</SCRIPT>

<?php 
include ('session.php');
include ('essence/conecta.php');
ini_set('max_execution_time',12000);


//$_seleciona = $_GET['select'];
//echo $_seleciona;

$dbname_cliente="ro_".$logado; // Indique o nome do banco de dados que será aberto
//echo $dbname_cliente;

if(!($con=mysql_select_db($dbname_cliente,$id))) {
echo "</br>Não foi possível estabelecer uma conexão com o gerenciador MySQL.</br>";
echo "Favor contactar o Administrador no telefone (11) 5505 6542.</br></br>";
echo "PRODUTO REGISTRADO CADDESIGN";
exit;
}

// ERRO BANCO VAZIO
$query = "select * from db_geral";															
$rs = mysql_query($query) or die("Erro no query ". mysql_error());
$_conta_x= mysql_num_rows($rs);

?>

</head>
<div class="jquery-waiting-base-container"></div>
<body>

<?php include ('base3.php'); ?>

<div id="total">


  
   <table border="0" color:#000000;"  cellpadding="0" cellspacing="0">
   <tr>

       <td valign="button" align="left" style="height: 34px;">
       <font size="4"><strong>&nbsp;CONTROLE DE BANCO DE DADOS -</strong></font>
       
       </td>
       <td>
       <?php echo "<font size='3'>" .  "Total de registros: <strong>" . $_conta_x . "</strong></font>";?>
       </td>

<td>

</td>
   </tr>
   <tr style="height: 25px;vertical-align: top">
   <td colspan="4"><hr style="border: none; width:100%;" color="#ECECEC"></td>
  
   
   <tr style="height: 15px;font-size: 12px;">
   <td colspan="2">
   
   </td>
   
   </tr>
   
   </table>

<table  border="0" cellpadding="0" cellspacing="0">
  <tbody>
    <tr style="height: 40px;">
     <form action="cad_bd.php" method="get">
      <td nowrap="nowrap" style="font-family:arial; font-size:11px">
      <input type="hidden" name="what" id="what" value="codigo_cliente"/>
&nbsp;<input type="search" name="like" id="like"  placeholder="Filtrar por Código!"/></td>
      <td width="102"><input type="submit" value="PROCURAR" /></td>
      </form>
</tr>
<tr style="height: 40px;">
     <form action="cad_bd.php" method="get">
      <td nowrap="nowrap" style="font-family:arial; font-size:11px">
      <input type="hidden" name="what" id="what" value="nome"/>
&nbsp;<input type="search" name="like" id="like"  placeholder="Filtrar por Nome!"/></td>
      <td width="102"><input type="submit" value="PROCURAR" /></td>
      </form>
</tr>
<tr style="height: 40px;">
      <form action="cad_bd.php" method="get">
      <td align="right" nowrap="nowrap"  style="font-family:arial; font-size:11px">
      <input type="hidden" name="what" id="what" value="cidade"/>
 &nbsp;<input type="search" name="like" id="like" placeholder="Filtrar por Cidade!" />      </td
      ><td width="102"><input type="submit" value="PROCURAR" /></td>
      </form>
    </tr>
  </tbody>
</table>
<br /><br />

      
<?php
 
 $_palavra = $_GET['like'];
 $_qual = $_GET['what'];
 
// banco vazio
 if($_conta_x==0){
echo "Banco de dados ainda vazio!";
} else {

 $query_novo = "select * from db_geral where $_qual like '%$_palavra%' ";
 $rs_novo = mysql_query($query_novo);

if ($_palavra==""){
	echo "<font size='2'>" . "Consulta no Banco de Dados ainda vazia!<br><br> Escolha filtrar por <strong>'Código'</strong>, <strong>'Nome'</strong> ou <strong>'Cidade'</strong> e clique no botão 'PROCURAR'!<br><br>A pesquisa pode ser cruzada!" . "</font>";
} else {
if(mysql_num_rows($rs_novo)>0){
?>

<table border="3" id="demo" name="demo" class="tablesorter">
<thead>
<tr bgcolor="#589bd4" height="35px" class="active">

<th nowrap="nowrap" headers="check" bgcolor="#00000" style="color:#000000; width:10px" class="drag-enable" title="GEOLOCALIZAR">
<div align="center" >&nbsp;</div>
</th>
<th nowrap="nowrap" headers="icone" bgcolor="#00000" style="color:#000000; width:10px" class="drag-enable" title="EDITAR">
<div align="center" >&nbsp;</div>
</th>
<th nowrap="nowrap" headers="icone" bgcolor="#00000" style="color:#000000; width:10px" class="drag-enable" title="EXCLUIR">
<div align="center" >&nbsp;</div>
</th>
<th nowrap="nowrap" headers="icone" bgcolor="#00000" style="color:#000000; " class="drag-enable" title="CODIGO DO CLIENTE">
<div align="center" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;CÓD.CLIENTE</div>
</th>
<th nowrap="nowrap" headers="icone" bgcolor="#00000" style="color:#000000; " class="drag-enable" title="NOME">
<div align="center" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;NOME</div>
</th>
<th nowrap="nowrap" headers="icone" bgcolor="#00000" style="color:#000000; " class="drag-enable" title="ENDEREÇO">
<div align="center" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ENDEREÇO</div>
</th>
<th nowrap="nowrap" headers="icone" bgcolor="#00000" style="color:#000000; " class="drag-enable" title="ICONE">
<div align="center" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;BAIRRO</div>
</th>
<th nowrap="nowrap" headers="icone" bgcolor="#00000" style="color:#000000; " class="drag-enable" title="ICONE">
<div align="center" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;CIDADE</div>
</th>
<th nowrap="nowrap" headers="icone" bgcolor="#00000" style="color:#000000; " class="drag-enable" title="ICONE">
<div align="center" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;UF</div>
</th>
<th nowrap="nowrap" headers="icone" bgcolor="#00000" style="color:#000000;" class="drag-enable" title="ICONE">
<div align="center" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;CEP</div>
</th>
</thead>
<tbody>

<?php												
while($row = mysql_fetch_array($rs_novo)){
	   
  $guarda = "h=" . $row["latitude_cad"] . "&v=" . $row["longitude_cad"] . "&reg=" . $row["codigo_cliente"] . "&endereco=" . $row["endereco"] . "&codigo=" . $row["codigo"] . "&cod_cli=" . $row["codigo_cliente"] . "&nome=" . $row["nome"] . "&cidade=" . $row["cidade"] . "&uf=" . $row["estado"] . "&cep=" . $row["cep"] . "&peso=" . $row["peso"] . "&valor=" . $row["valor"] . "&volume=" . $row["volume"];

  
	$guarda_edit = "bd_edit.php?codigo=". $row["codigo"]; 
	
?>

<tr>
<td align="center" style="text-align: center;"><a href="javascript:geo('<?php echo $guarda;?>');" title="Localizar cliente" ><span class="material-icons" style="font-size: 14px;">location_on</span></a></td>

<td align="center" style="text-align: center;">

<a href="javascript:editar('<?php echo $row["codigo_cliente"];?>');" title="Editar cliente" ><span class="material-icons" style="font-size: 14px;">edit</span></a>
</td>
<td style="text-align: center;">
<a href="javascript:confirmaExclusao('scripts.php?acao=exclui_cliente&id=<?php echo $row["codigo"] .'&what=' . $_qual .'&like=' . $_palavra ?>')"  title="Excluir cliente"><span class="material-icons" style="font-size: 14px;">close</span></a>
<td nowrap align="center"><?php echo $row["codigo_cliente"] ?></td>
<td nowrap align="center"><?php echo $row["nome"] ?></td>
<td nowrap align="center"><?php echo $row["endereco"] ?></td>
<td nowrap align="center"><?php echo $row["bairro"] ?></td>
<td nowrap align="center"><?php echo $row["cidade"] ?></td>
<td nowrap align="center"><?php echo $row["estado"] ?></td>
<td nowrap align="center"><?php echo $row["cep"] ?></td>

</tr>
<?php		
}
?>
</tbody>
		
</table>     

<?php
} else {	
echo "<font size='2'>" .  "Sua consulta não encontrou registros!" . "</font>";	
}	




}

}
?>

</div> 

   
<div id="editar" style="display: none;">
	  
        <div id="botao_edit"><a href="javascript:void(0); " onclick="hide('editar');" ><i class="material-icons" style="font-size:30px;color:black;">&#xe5c9;</i></a></div>
         <iframe name="pag1_edit" frameborder="0" id="pag1_edit" scrolling="no" marginheight="0" marginwidth="0" trusted="yes"></iframe>
        <iframe name="pag2_edit" src="" frameborder=0 id="pag2_edit" scrolling="no" marginheight="0" marginwidth="0" trusted="yes"></iframe>
     </div>  

     <div id="geo" style="display: none;">
	  
        <div id="botao_geo"><a href="javascript:void(0); "  onclick="hide('geo');" ><i class="material-icons" style="font-size:30px;color:black;">&#xe5c9;</i></a></div>
         <iframe name="pag1_geo" frameborder="0" id="pag1_geo" scrolling="no" marginheight="0" marginwidth="0" trusted="yes"></iframe>
        <iframe name="pag2_geo" src="" frameborder=0 id="pag2_geo" scrolling="no" marginheight="0" marginwidth="0" trusted="yes"></iframe>
     </div>  

     
</body>
</html>