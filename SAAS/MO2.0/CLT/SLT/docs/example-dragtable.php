<?php
  session_start();
  include ('session.php');
  include ('conecta.php');
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>jQuery tablesorter 2.0 - Dragtable Mod (beta)</title>

<!-- jQuery -->
<script src="js/jquery-latest.min.js"></script>
<script src="js/jquery-ui.min.js"></script>


<style>
/* override jQuery UI overriding Bootstrap */
.accordion .ui-widget-content a {
color: #337ab7;
}
</style>

<!-- Tablesorter: theme -->
<link class="theme" rel="stylesheet" href="../css/theme.blue.css">
<link rel="stylesheet" href="../css/dragtable.mod.css">

<!-- Tablesorter script: required -->
<script src="../js/jquery.tablesorter.js"></script>
<script src="../js/jquery.tablesorter.widgets.js"></script>

<script src="../js/extras/jquery.dragtable.mod.js"></script>

<style id="css">/* optional styling */
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

<script id="js">$(function () {
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

</head>
<body>
   
<table border="0" style="height: 100px; padding-left:20px; color:#000000;"  cellpadding="0" cellspacing="0">
<tr>
    <td  align="left" nowrap="nowrap">
    <i class="material-icons" style="font-size:28px">phonelink_ring</i>
    </td>
    <td valign="button" align="left" style="height: 50px;">
    <font size="4"><strong>&nbsp;LISTA DE VISITAS/ENTREGAS</strong><span style="color: #000000"><?php echo $aviso_listatual; ?></span</font>
    
    </td>
   
</tr>
<tr style="height: 25px;vertical-align: top">
<td colspan="2"><hr style="border: none; width:100%;" color="#DCDCDC"></td>
</tr>


<tr style="height: 25px;font-size: 12px;">
<td colspan="2">

<div align="left" >&nbsp;<input type="checkbox" onClick="toggle(this)" name="todos_check" id="todos_check" />&nbsp;SELECIONAR TODAS VISITAS</div>

</td>
</tr>
<tr style="height: 25px;font-size: 12px;">
<td colspan="2">

<div id="checkcount"></div>

</td>

</tr>




</table>

		<div id="demo">
				<table class="tablesorter">
					<thead>
            <tr class="active">&nbsp; 
                <th id="login">Login
                </th>
                
                <th class="drag-enable" id="lista">
                  Lista
                </th>

                <th class="drag-enable" id="rota">
                  Rota
                </th>

                <th class="drag-enable" id="sequencia">
                  SQ
                </th>

                <th class="drag-enable" id="cod_pedido">
                  PEDIDO
                </th>

                <th class="drag-enable" id="idcliente">
                  ID
                </th>

                <th class="drag-enable" id="nomecliente">
                  CLIENTE
                </th>

                <th class="drag-enable" id="endereco">
                  ENDEREÇO
                </th>

                <th class="drag-enable" id="cidade">
                  CIDADE
                </th>

                <th class="drag-enable" id="datavisita">
                  DATA VISITA
                </th>

                <th class="drag-enable" id="ocorrencia">
                  OCORRENCIA
                </th>

                <th class="drag-enable" id="treal">
                  T.REAL
                </th>

                <th class="drag-enable" id="po">
                  P.O
                </th>

                <th class="drag-enable" id="ce">
                  CE
                </th>

                <th class="drag-enable" id="classificasao">
                  CLS
                </th>

                <th class="drag-enable" id="obs">
                  NF
                </th>

              </tr>
            </thead>
            <tbody>
              <?php

                $lista_resu = "SELECT login, lista, rota, sequencia, codigo_pedido, idcliente, nome, endereco, cidade,
                dth_ocorrencia,ocorrencia, tempo, ce, classificacao, obs FROM rotas LIMIT 50";

                $exec_lisresu = mysql_query($lista_resu);
                while($row_dados = mysql_fetch_array($exec_lisresu)){ ?>
                  <tr>


                    <td nowrap> <?php echo $row_dados['login'];?> </td>
                    <td nowrap> <?php echo $row_dados['lista'];?> </td>
                    <td nowrap> <?php echo $row_dados['rota'];?> </td>
                    <td nowrap> <?php echo $row_dados['sequencia'];?> </td>
                    <td nowrap> <?php echo $row_dados['codigo_pedido'];?> </td>
                    <td nowrap> <?php echo $row_dados['idcliente'];?> </td>
                    <td nowrap> <?php echo $row_dados['nome'];?> </td>
                    <td nowrap> <?php echo $row_dados['endereco'];?> </td>
                    <td nowrap> <?php echo $row_dados['cidade'];?> </td>
                    <td nowrap> <?php echo $row_dados['dth_ocorrencia'];?> </td>
                    <td nowrap> <?php echo $row_dados['ocorrencia'];?> </td>
                    <td nowrap> <?php echo $row_dados['tempo'];?> </td>
                    <td nowrap> <?php echo $row_dados['tempo'];?> </td>
                    <td nowrap> <?php echo $row_dados['ce'];?> </td>
                    <td nowrap> <?php echo $row_dados['classificacao'];?> </td>
                    <td nowrap> <?php echo $row_dados['obs'];?> </td>


                  </tr> 
                  
                  
                  <?php
                };
              ?>
            </tbody>
            <tfoot>
              <tr><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th></tr>
            </tfoot>
				</table>
		</div>

</body>
</html>
