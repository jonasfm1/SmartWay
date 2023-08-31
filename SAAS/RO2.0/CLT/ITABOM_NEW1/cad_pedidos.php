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
        
    
	#pag1{
position: absolute;
	width: 100%;
	left: 0px;
	top: 0px;
	height:2000px;

z-index:9997;
background-color: white;
opacity: 0.95;
		
}
	#pag2{
width: 400px;
height: 304px;
top: 50%;
left: 50%;
margin-top: -200px;
margin-left: -152px;
position: absolute;
border: 1px solid silver;

	
	z-index:9998;
	

}
        

#botao{
	position: absolute;
	top: 50%;
	left: 50%;
		width: 30px;
		height: 30px;
        margin-top: -220px;
margin-left: -172px;
	z-index:99999;
		
	}
  
        #checkcount{
    font-weight: bold;
    padding-left: 4px;
    
    }
    
    


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

if (confirm('Você tem certeza que deseja liberar este pedido? Esse pedido completou o processo de Baixa de Romaneio. Liberando, ficará disponivel para importação no Roteirizador.')) {
  location.href = aURL;
  //target=ver;
}

}

	
function acao(what, like) {

  pesquisa = "what=" + what;
  procura = "like=" + like;
	
  document.getElementById("Pagina").style.display = "block";
  
  var teste = "cad_pedidos_lib.php?";

  
  var radios = $("#total input[name='check_list[]']:checked:visible");
  var engine = "";
  var array_check = [];
  
  for (var i=0; i < radios.length; i++) {
   if (radios[i].checked) {
       engine = "check_list%5B%5D=" + radios[i].value + "&";
       array_check.push(engine);
      teste = teste + engine;
     
       //break;
   }
   
  }

  teste = teste + pesquisa + procura;
  
  //alert(teste);
  document.getElementById("pag2").src = teste; 
  
  
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

var teste = "step2_gm_bd.php?" + campo;

document.getElementById("pag2_geo").src = teste; 


topFunction();
}


 
function topFunction() {
  document.body.scrollTop = 0;
  document.documentElement.scrollTop = 0;
}




    </script>

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
$query = "select * from pedidos_input";															
$rs = mysql_query($query) or die("Erro no query ". mysql_error());
$_conta_x= mysql_num_rows($rs);

?>

</head>
<div class="jquery-waiting-base-container"></div>
<body>

<?php include ('base3.php'); ?>

<div id="total" name="total">

   <table border="0" color:#000000;"  cellpadding="0" cellspacing="0">
   <tr>

       <td valign="button" align="left" style="height: 34px;">
       <font size="4"><strong>&nbsp;CONTROLE DE PEDIDOS INTEGRADOS -</strong></font>
       
       </td>
       <td>
       <?php echo "<font size='3'>" .  " Total de pedidos: <strong>" . $_conta_x . "</strong></font>";?>
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

<font size='2' color="#FF0000"><strong>Atenção! Esse é o controle de todos pedidos já integrados ao ERP. Caso queira importar novamente algum pedido, libere-o aqui.</strong></font>
<br><br>
<table  border="0" cellpadding="0" cellspacing="0">
  <tbody>
    <tr style="height: 40px;">
     <form action="cad_pedidos.php" method="get">
      <td nowrap="nowrap" style="font-family:arial; font-size:11px">
      <input type="hidden" name="what" id="what" value="pedido"/>
<input type="search" name="like" id="like"  placeholder="Filtrar por Pedido!"/></td>
      <td width="102"><input type="submit" value="PROCURAR" /></td>
      </form>


     <form action="cad_pedidos.php" method="get">
      <td nowrap="nowrap" style="font-family:arial; font-size:11px">
      <input type="hidden" name="what" id="what" value="nome_rota"/>
<input type="search" name="like" id="like"  placeholder="Filtrar por Rota!"/></td>
      <td width="102"><input type="submit" value="PROCURAR" /></td>
      </form>

     <form action="cad_pedidos.php" method="get">
      <td nowrap="nowrap" style="font-family:arial; font-size:11px">
      <input type="hidden" name="what" id="what" value="nome_veiculo"/>
<input type="search" name="like" id="like"  placeholder="Filtrar por Veículo!"/></td>
      <td width="102"><input type="submit" value="PROCURAR" /></td>
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

 $query_novo = "select * from pedidos_input where $_qual like '%$_palavra%' order by ordem, id, nome_rota DESC";
 $rs_novo = mysql_query($query_novo);

if ($_palavra==""){
	echo "<font size='2'>" . "Consulta no Pedidos ainda vazia!<br><br> Escolha <strong>Filtrar por Código, Rota ou Veículo</strong> e clique no botão 'PROCURAR'!" . "</font>";
} else {
if(mysql_num_rows($rs_novo)>0){
?>

<table border="0" style="color:#000000;width: 1200px;font-size: 10px;" cellpadding="0" cellspacing="0">
<tr>
<td >
  
 
<input type="checkbox" class="select_all" />&nbsp;SELECIONAR TODOS <br />

</td>
<td align="right">
<input type="submit" value="LIBERAR" onclick="acao('<?php echo $_palavra; ?>', '<?php echo $_qual; ?>')">
</td>
</tr>
<tr>
<td>
<div id="general">
    <i>
        <span class="counter"></span>
    </i>
</div>
</td>
<td>

</td>
</tr>

</table>

<br>
<table border="3" id="demo" name="demo" class="tablesorter" style="width: 1200px;">
<thead>
<tr bgcolor="#589bd4" height="35px" class="active">

<th nowrap="nowrap" headers="icone" bgcolor="#00000" style="color:#000000; " class="drag-enable" title="PEDIDO">
<div align="center" >-</div>
</th>

<th nowrap="nowrap" headers="icone" bgcolor="#00000" style="color:#000000; " class="drag-enable" title="PEDIDO">
<div align="center" >ORDEM</div>
</th>

<th nowrap="nowrap" headers="icone" bgcolor="#00000" style="color:#000000; " class="drag-enable" title="PEDIDO">
<div align="center" >PEDIDO</div>
</th>

<th nowrap="nowrap" headers="icone" bgcolor="#00000" style="color:#000000; " class="drag-enable" title="CODIGO PEDIDO">
<div align="center" >C.CLI.</div>
</th>

<th nowrap="nowrap" headers="icone" bgcolor="#00000" style="color:#000000; " class="drag-enable" title="NOME CLIENTE">
<div align="center" >NOME</div>
</th>

<th nowrap="nowrap" headers="icone" bgcolor="#00000" style="color:#000000; " class="drag-enable" title="VEICULO">
<div align="center" >VEICULO</div>
</th>

<th nowrap="nowrap" headers="icone" bgcolor="#00000" style="color:#000000; " class="drag-enable" title="ROTA">
<div align="center" >ROTA</div>
</th>

<th nowrap="nowrap" headers="icone" bgcolor="#00000" style="color:#000000; " class="drag-enable" title="DATA ENTREGA">
<div align="center" >DT.</div>
</th>

<th nowrap="nowrap" headers="icone" bgcolor="#00000" style="color:#000000; width:80px" class="drag-enable" title="NO SISTEMA">
<div align="center" >NO SISTEMA</div>
</th>
<th nowrap="nowrap" headers="icone" bgcolor="#00000" style="color:#000000; width:80px" class="drag-enable" title="NO SISTEMA">
<div align="center" >TEMPO</div>
</th>
<th nowrap="nowrap" headers="icone" bgcolor="#00000" style="color:#000000; width:80px" class="drag-enable" title="NO SISTEMA">
<div align="center" >DISTANCIA</div>
</th>
<th nowrap="nowrap" headers="icone" bgcolor="#00000" style="color:#000000; width:120px" class="drag-enable" title="NO SISTEMA">
<div align="center" >T. TOTAL ROTA</div>
</th>
<th nowrap="nowrap" headers="icone" bgcolor="#00000" style="color:#000000; width:120px" class="drag-enable" title="NO SISTEMA">
<div align="center" >D. TOTAL ROTA</div>
</th>
<th nowrap="nowrap" headers="icone" bgcolor="#00000" style="color:#000000; width:72px" class="drag-enable" title="LIBERAR">
<div align="center" >LIBERAR</div>
</th>



</thead>
<tbody>

<?php												
while($row = mysql_fetch_array($rs_novo)){
	
?>

<tr>
<div id="general-content">
<td align="center" nowrap="nowrap" width="10px">

  <input type="checkbox" class="marcar" name="check_list[]" id="check_list" value="<?php echo $row["pedido"]; ?>">
  
</td>
</div>
<td nowrap align="center"><?php echo $row["ordem"] ?></td>
<td nowrap align="center"><?php echo $row["pedido"] ?></td>
<td nowrap align="center"><?php echo $row["codigo_cliente"] ?></td>
<td nowrap align="center"><?php echo $row["nome_cliente"] ?></td>
<td nowrap align="center"><?php echo $row["nome_veiculo"] ?></td>
<td nowrap align="center"><?php echo $row["nome_rota"] ?></td>
<td nowrap align="center"><?php echo $row["data_entrega"] ?></td>

<td nowrap align="center">
  
<?php 

$compara_pedido = $row["pedido"];
$query_pedido = "select * from clientes where codigo_pedido='$compara_pedido'";
$rs_novo1 = mysql_query($query_pedido);

$num_rows = mysql_num_rows($rs_novo1);

if ($num_rows>0){
?>

<span class="material-icons" style="font-size: 14px;">thumb_up_off_alt</span>

<?php
}
?>
</td>
<td nowrap align="center"><?php echo $row["tempo"] ?></td>
<td nowrap align="center"><?php echo $row["distancia"] ?></td>

<td nowrap align="center"><?php echo $row["tempo_total"] ?></td>
<td nowrap align="center"><?php echo $row["distancia_total"] ?></td>


<td style="text-align: center;">
<a href="javascript:confirmaExclusao('scripts.php?acao=libera_pedido_input&id=<?php echo $row["id"] .'&what=' . $_qual .'&like=' . $_palavra .'&veiculo=' . $row["nome_veiculo"] ?>')"  title="Liberar pedido"><span class="material-icons" style="font-size: 14px;">check_circle</span></a>
</td>

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

<script type="text/javascript">//<![CDATA[


$('#general i .counter').text(' ');

var fnUpdateCount = function() {
	var generallen = $("#total input[name='check_list[]']:checked:visible").length;
    console.log(generallen,$("#general i .counter") )
	if (generallen > 0) {
        contatena = generallen + " visita(s)/entregas(s)";
		$("#general i .counter").text(contatena);
	} else {
		$("#general i .counter").text(' ');
	}
};

$("#total input:checkbox").on("change", function() {
			fnUpdateCount();
		});

$('.select_all').change(function() {
 
			var checkthis = $(this);
			var checkboxes = $("#total input:checkbox");

			if (checkthis.is(':checked')) {
				checkboxes.prop('checked', true);
			} else {
				checkboxes.prop('checked', false);
			}
            fnUpdateCount();
		});


  //]]></script>

  
</div> 

<div id="Pagina" style="display: none;">
	  
    <div id="botao"><a href="javascript:void(0); " onclick="window.location.reload();" ><i class="material-icons" style="font-size:30px;color:black;">&#xe5c9;</i></a></div>
     <iframe name="pag1" frameborder="0" id="pag1" scrolling="no" marginheight="0" marginwidth="0" trusted="yes"></iframe>
    <iframe name="pag2" src="" frameborder=0 id="pag2" scrolling="no" marginheight="0" marginwidth="0" trusted="yes"></iframe>
 </div>           
 

     
</body>
</html>