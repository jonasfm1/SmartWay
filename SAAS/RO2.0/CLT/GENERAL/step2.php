<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//BR" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>::. ROTAS ONLINE .:: CADD</title>
  <link rel="stylesheet" type="text/css" href="css/menu_nv.css">
  <link rel="stylesheet" type="text/css" href="css/step2.css">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="shortcut icon" href="imgs/favicon.ico">
  <link rel="icon" type="image/gif" href="imgs/animated_favicon1.gif">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.js"></script>
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

    function confirmaExclusao(aURL) {

      if (confirm('Você tem certeza que deseja excluir este cliente?')) {
        location.href = aURL;
        //target=ver;
      }

    }

    function mostraDIV() {
      document.getElementById("Pagina").style.display = "block";
    }

    (function($) {

      $.fn.waiting = function(options) {

        options = $.extend({

          modo: 'normal'

        }, options);

        this.fadeOut(options.modo);

        return this;

      };

    })(jQuery);;


    $(document).ready(function() {

      $(".jquery-waiting-base-container").waiting({

        modo: "slow"

      });

    });

    function autoSubmit() {

      var formObject = document.forms['theForm'];

      formObject.submit();

    }


    var truncate = document.querySelectorAll(".truncate");
truncate = [].slice.apply(truncate);
truncate.forEach(function (elemento, indice) {
  elemento.title = elemento.innerHTML;
})

function AbreFechaDiv(qualdiv) {

var objeto = document.getElementById(qualdiv);


if(objeto.style.display == 'none') {
objeto.style.display = 'block';

} else {
objeto.style.display = 'none';
}
}

function openNav() {
  document.getElementById("mySidenav").style.width = "310px";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
}

function topFunction() {
  document.body.scrollTop = 0;
  document.documentElement.scrollTop = 0;
}

	
function lista_pedidos(campo) {

document.getElementById("lista_pedido").style.display = "block";

var teste = "step2_lista_pedidos.php?codigo=" + campo;
//var campo = document.getElementById('pega_id_cliente');
//alert(teste);
// var form = document.getElementById("frm");



//document.getElementById("myForm").action = "scripts.php";
//alert(teste + campo);
document.getElementById("pag2_lista_pedido").src = teste; 

//document.getElementById("myForm").action = "script.php";
//alert(array_check);
topFunction();
}


function acao1() {

  document.getElementById("Pagina").style.display = "block";
  
  var teste = "step2_disable.php?";

 // var form = document.getElementById("frm");
  
  var radios = $("input[name='check_list[]']:checked:visible");
  var engine = "";
  var array_check = [];
  
  for (var i=0; i < radios.length; i++) {
   if (radios[i].checked) {

       engine = "check_list%5B%5D=" + radios[i].value + "&";
       array_check.push(radios[i].value);
       teste = teste + engine;

   }
  
  }
  //document.getElementById("myForm").action = "scripts.php";
 document.getElementById("pag2").src = teste; 

 //document.getElementById("myForm").action = "script.php";
  //alert(array_check);
  topFunction();
  }



	
function acao2() {

document.getElementById("Pagina").style.display = "block";

var teste = "step2_enable.php?";

// var form = document.getElementById("frm");

var radios = $("input[name='check_list[]']:checked:visible");
var engine = "";
var array_check = [];

for (var i=0; i < radios.length; i++) {
 if (radios[i].checked) {

     engine = "check_list%5B%5D=" + radios[i].value + "&";
     array_check.push(radios[i].value);
     teste = teste + engine;

 }

}
//document.getElementById("myForm").action = "scripts.php";
document.getElementById("pag2").src = teste; 

//document.getElementById("myForm").action = "script.php";
//alert(array_check);
topFunction();
}

	
function editar(campo) {

document.getElementById("editar").style.display = "block";

var teste = "step2_editar.php?codigo=" + campo;
//var campo = document.getElementById('pega_id_cliente');
//alert(teste);
// var form = document.getElementById("frm");



//document.getElementById("myForm").action = "scripts.php";
//alert(teste + campo);
document.getElementById("pag2_edit").src = teste; 

//document.getElementById("myForm").action = "script.php";
//alert(array_check);
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



  

  </SCRIPT>

  <?php include('session.php');

  require_once("geocode.class.php");

  include('essence/conecta.php');

  ini_set('max_execution_time', 12000);





  //  CONTROLE PASSO//////////////////////////////////////////////////////////



  $query_where = "UPDATE passo SET ok='yes' WHERE id='2'";

  $rs_where = mysql_query($query_where);



  //  CONTROLE PASSO//////////////////////////////////////////////////////////





  $query_oia1 = mysql_query("select codigo_cliente from clientes where confianca_cad<=50 AND roteirizado!='sim' AND ativo=0 group by codigo_cliente ORDER BY confianca_cad ASC, codigo_cliente");
  $query_oia1_x = mysql_query("select codigo_cliente from clientes where confianca_cad<=50 AND roteirizado!='sim' AND ativo=0");

  $query_oia2  = mysql_query("select codigo_cliente from clientes where confianca_cad>50 AND confianca_cad<=70 AND roteirizado!='sim' AND ativo=0 group by codigo_cliente ORDER BY confianca_cad ASC, codigo_cliente");
  $query_oia2_x  = mysql_query("select codigo_cliente from clientes where confianca_cad>50 AND confianca_cad<=70 AND roteirizado!='sim' AND ativo=0");

  $query_oia3  = mysql_query("select codigo_cliente from clientes where confianca_cad>70 AND confianca_cad<=100 AND roteirizado!='sim' AND ativo=0 group by codigo_cliente ORDER BY confianca_cad ASC, codigo_cliente");
  $query_oia3_x  = mysql_query("select codigo_cliente from clientes where confianca_cad>70 AND confianca_cad<=100 AND roteirizado!='sim' AND ativo=0");

  $query_oia4  = mysql_query("select codigo_cliente from clientes where confianca_cad=101 AND roteirizado!='sim' AND ativo=0 group by codigo_cliente ORDER BY confianca_cad ASC, codigo_cliente");
  $query_oia4_x  = mysql_query("select codigo_cliente from clientes where confianca_cad=101 AND roteirizado!='sim' AND ativo=0");

  $query_oia5  = mysql_query("select codigo_cliente from clientes where ativo=1 AND roteirizado!='sim' group by codigo_cliente ORDER BY confianca_cad ASC, codigo_cliente");
  $query_oia5_x  = mysql_query("select codigo_cliente from clientes where ativo=1 AND roteirizado!='sim'");


  $total_0k1 = mysql_num_rows($query_oia1);
  $total_0k1_x = mysql_num_rows($query_oia1_x);

  $total_0k2 = mysql_num_rows($query_oia2);
  $total_0k2_x = mysql_num_rows($query_oia2_x);

  $total_0k3 = mysql_num_rows($query_oia3);
  $total_0k3_x = mysql_num_rows($query_oia3_x);

  $total_0k4 = mysql_num_rows($query_oia4);
  $total_0k4_x = mysql_num_rows($query_oia4_x);


  $total_0k5 = mysql_num_rows($query_oia5);
  $total_0k5_x = mysql_num_rows($query_oia5_x);

  $soma_total = $total_0k1 + $total_0k2 + $total_0k3 + $total_0k4 + $total_0k5;

  if ($soma_total == 0) {

  ?>

    <script>

      alert('Rotas finalizadas! Insira mais pedidos no Passo 1!');

    //  window.location.href = 'step1.php';

    </script>

  <?php



  }



  ?>



</head>

<div class="jquery-waiting-base-container"></div>



<body >

  <?php include('base2.php'); ?>


  <?php

$pega_listagem = "";  

$pega_listagem = $_GET["lista"];


$pega_ordem = "";

$pega_ordem = $_GET["order"];


$pega_escolha = "";
$pega_escolha = $_GET["esc"];


//echo $pega_ordem;

$pagina = (isset($_GET['pagina'])) ? $_GET['pagina'] : 1;





if ($pega_listagem == "red" or $pega_listagem == "") {

  if($pega_escolha==""){   
    $query = "select codigo, confianca_cad, endereco_cad, codigo_cliente, nome, endereco, bairro, cidade, estado, cep, SUM(peso) AS peso,  SUM(volume) AS volume,  SUM(valor) AS valor, obs_pedido, setor, premium from clientes where confianca_cad<=50 AND roteirizado!='sim' AND ativo=0 group by codigo_cliente";

    } else {
      $query = "select * from clientes where confianca_cad<=50 AND roteirizado!='sim' AND ativo=0 group by codigo_cliente ORDER BY $pega_escolha $pega_ordem";
    }

 

  $rs = mysql_query($query);

  $total = mysql_num_rows($rs);


  $guarda_nome = "BAIXA CONFIANÇA - " . $total . " visita(s) / " .  $total_0k1_x . " pedidos(s)";

}

if ($pega_listagem == "orange") {

  if($pega_escolha==""){   
    $query = "select codigo, confianca_cad, endereco_cad, codigo_cliente, nome, endereco, bairro, cidade, estado, cep, SUM(peso) AS peso,  SUM(volume) AS volume,  SUM(valor) AS valor, obs_pedido, setor, premium from clientes where confianca_cad>50 AND confianca_cad<=70 AND roteirizado!='sim' and ativo=0 group by codigo_cliente";

    } else {
      $query = "select * from clientes where confianca_cad>50 AND confianca_cad<=70 AND roteirizado!='sim' and ativo=0 group by codigo_cliente ORDER BY $pega_escolha $pega_ordem";
    }

 


 

  $rs = mysql_query($query);

  $total = mysql_num_rows($rs);

  $guarda_nome = "CONFIANÇA MÉDIA - " . $total . " visita(s) / " .  $total_0k2_x . " pedidos(s)";

}

if ($pega_listagem == "green") {

  if($pega_escolha==""){   
    $query = "select codigo, confianca_cad, endereco_cad, codigo_cliente, nome, endereco, bairro, cidade, estado, cep, SUM(peso) AS peso,  SUM(volume) AS volume,  SUM(valor) AS valor, obs_pedido, setor, premium from clientes where confianca_cad>70 AND confianca_cad<=100 AND roteirizado!='sim' and ativo=0 group by codigo_cliente";

    } else {
      $query = "select * from clientes where confianca_cad>70 AND confianca_cad<=100 AND roteirizado!='sim' and ativo=0 group by codigo_cliente ORDER BY $pega_escolha $pega_ordem";

    }
  
  $rs = mysql_query($query);

  $total = mysql_num_rows($rs);

  $guarda_nome = "ALTA CONFIANÇA - " . $total . " visita(s) / " .  $total_0k3_x . " pedidos(s)";

}



if ($pega_listagem == "blue") {

  if($pega_escolha==""){   
    $query = "select codigo, confianca_cad, endereco_cad, codigo_cliente, nome, endereco, bairro, cidade, estado, cep, SUM(peso) AS peso,  SUM(volume) AS volume,  SUM(valor) AS valor, obs_pedido, setor, premium from clientes where confianca_cad=101 AND roteirizado!='sim' and ativo=0 group by codigo_cliente";
    } else {
      $query = "select * from clientes where confianca_cad=101 AND roteirizado!='sim' and ativo=0 group by codigo_cliente ORDER BY $pega_escolha $pega_ordem";
    }
  
 

  $rs = mysql_query($query);

  $total = mysql_num_rows($rs);

  $guarda_nome = "CONFIANÇA MANUAL - " . $total . " visita(s) / " .  $total_0k4_x . " pedidos(s)";

}

if ($pega_listagem == "roxo") {


  if($pega_escolha==""){   
  $query = "select codigo, confianca_cad, endereco_cad, codigo_cliente, nome, endereco, bairro, cidade, estado, cep, SUM(peso) AS peso,  SUM(volume) AS volume,  SUM(valor) AS valor, obs_pedido, setor, premium from clientes where roteirizado!='sim' and ativo=1 group by codigo_cliente";
  } else {
    $query = "select * from clientes where roteirizado!='sim' and ativo=1 group by codigo_cliente ORDER BY $pega_escolha $pega_ordem";
  }

  
  $rs = mysql_query($query);

  $total = mysql_num_rows($rs);


  $guarda_nome = "DESATIVADO - " . $total . " visita(s) / " .  $total_0k5_x . " pedidos(s)";

}



?>




  <div id="mySidenav" class="sidenav">
  <div class="div" id="div" name="div">
	<br><br>
	<br><br>
  <table width="100%" border="0" cellpadding="0" cellspacing="0" align="left" style="padding-top: 25px; padding-bottom: 8px; width:360px" >
		<tr>
			
		
            <td align="left" valign="middle" nowrap="nowrap" style="width:360px; color:#000000;">
            <strong><font size="4">&nbsp;LISTA DE CONFIANÇA</font></strong>
            </td>
	   </tr>
        </table>
    
        <hr size = 1 width = '204px' color="#ECECEC">
        <br> <br>

        <form name='theForm' id='theForm'>
		<table border="0" width="360px" cellpadding="0" cellspacing="0" style="text-align: left; padding-left:10px" class="tabela">
            <tr style="height: 24px;">
	<td nowrap="nowrap" style="width: 20px">

		
		
  <input type="radio" value="red" name="lista" onChange="autoSubmit();" <?php if ($pega_listagem == 'red' or $pega_listagem == '') { ?>checked='checked' <?php } ?> />
	
    </td>
    <td nowrap="nowrap">
    
&nbsp;BAIXA CONFIANÇA<font style="color: red;font-weight: bold;"><?php echo " (" . $total_0k1 . "/" . $total_0k1_x . ")"; ?></font>

    </td>
    </tr>
    <tr style="height: 20px;">
	<td nowrap="nowrap" style="width: 20px">
	
  <input type="radio" value="orange" name="lista" onChange="autoSubmit();" <?php if ($pega_listagem == 'orange') { ?>checked='checked' <?php } ?> />
	
    </td>
    <td nowrap="nowrap">
   
  &nbsp;MÉDIO CONFIANÇA<font style="color: orange;font-weight: bold;"><?php echo " (" . $total_0k2  . "/" . $total_0k2_x . ")"; ?></font>
    </td>
    </tr>
    <tr style="height: 20px;">
	<td nowrap="nowrap" style="width: 20px">
	
  <input type="radio" value="green" name="lista" onChange="autoSubmit();" <?php if ($pega_listagem == 'green') { ?>checked='checked' <?php } ?> />
	
    </td>
    <td nowrap="nowrap">
   
   &nbsp;ALTO CONFIANÇA<font style="color: green;font-weight: bold;"><?php echo "(" . $total_0k3 . "/" . $total_0k3_x . ")"; ?></font>
    </td>
    </tr>
    <tr style="height: 20px;">
	<td  nowrap="nowrap" style="width: 15px">
		
  <input type="radio" value="blue" name="lista" onChange="autoSubmit();" <?php if ($pega_listagem == 'blue') { ?>checked='checked' <?php } ?> />
		
    </td>
    <td nowrap="nowrap">
  
   &nbsp;CONFIANÇA MANUAL<font style="color: blue;font-weight: bold;"><?php echo " (" . $total_0k4 . "/" . $total_0k4_x . ")"; ?></font>
    </td>
    </tr>
    <tr style="height: 20px;">
	<td  nowrap="nowrap" style="width: 15px">
		
  <input type="radio" value="roxo" name="lista" onChange="autoSubmit();" <?php if ($pega_listagem == 'roxo') { ?>checked='checked' <?php } ?> />
		
    </td>
    <td nowrap="nowrap">
   
   &nbsp;DESATIVADO<font style="color: purple;font-weight: bold;"><?php echo " (" . $total_0k5 . "/" . $total_0k5_x . ")"; ?></font>
   
    </td>
    </tr>

    
    </table>
    </form>
    <br><br><hr size = 1 width = '350px' color="#d3d5d6" style="height: 1px;"><br>

<table width="100%" border="0" cellpadding="0" cellspacing="0" align="left" style="padding-top: 25px; padding-bottom: 8px; width:100%" >
<tr>


    <td align="left" valign="middle" nowrap="nowrap" style="width:360px; color:#000000;">
    <strong><font size="4">&nbsp;ATIVAR/DESATIVAR</font></strong>
    </td>
</tr>
</table>


      
<hr size = 1 width = '180px' color="#ECECEC"><br><br>


<table  style="text-align: left; padding-left:10px" >

<tr>
	<td nowrap="nowrap" style="width: 20px">
	<i class="material-icons" style="font-size:22px; vertical-align:bottom">check_circle</i>
    </td>
    <td nowrap="nowrap">
  
    <a href="javascript:acao2();" >
    <font style="text-align: center">&nbsp;&nbsp;ATIVAR</font>
    </a>
    </td>
    </tr>
    <tr>
<tr>
	<td nowrap="nowrap" style="width: 20px">
	<i class="material-icons" style="font-size:22px; vertical-align:bottom">disabled_by_default</i>
    </td>
    <td nowrap="nowrap">
  <form action="#" method="get" name="myForm" id="myform">
    <a href="javascript:acao1();" >
    <font style="text-align: center">&nbsp;&nbsp;DESATIVAR</font>
    </a>
    </form>
    </td>
    </tr>
 

        </table>

<br><br><hr size = 1 width = '350px' color="#d3d5d6" style="height: 1px;"><br>

    
    <table width="100%" border="0" cellpadding="0" cellspacing="0" align="left" style="padding-top: 25px; padding-bottom: 8px; width:100%" >
		<tr>
			
		
            <td align="left" valign="middle" nowrap="nowrap" style="width:360px; color:#000000;">
            <strong><font size="4">&nbsp;EXPORTAR/IMPRIMIR</font></strong>
            </td>
	   </tr>
        </table>
    
        <hr size = 1 width = '194px' color="#ECECEC">
        <br> <br>

        <table  style="text-align: left; padding-left:10px" >

      
<tr>
	<td nowrap="nowrap" style="width: 20px">
	<i class="material-icons" style="font-size:22px; vertical-align:bottom">local_printshop</i>
    </td>
    <td nowrap="nowrap">
  
    <a href="javascript:window.print(); closeNav();" >
    <font  style="text-align: center">&nbsp;&nbsp;IMPRIMIR</font>
    </a>
    </td>
    </tr>
    <tr>
	<td nowrap="nowrap" style="width: 20px">
	<i class="material-icons" style="font-size:20px; vertical-align:bottom">cloud_upload</i>
    </td>
    <td nowrap="nowrap">
  
    <a href="#" onclick="location.href='downloadxlsx.php'">
    <font style="text-align: center">&nbsp;&nbsp;EXPORTAR TODOS</font>
    </a>
    </td>
    </tr>
    <tr>
	<td nowrap="nowrap" style="width: 20px">
	<i class="material-icons" style="font-size:20px; vertical-align:bottom">cloud_done</i>
    </td>
    <td nowrap="nowrap">
  
    <a href="#" onclick="location.href='destacado.php?lista=<?php echo $pega_listagem ;?>'">
    <font style="text-align: center">&nbsp;&nbsp;EXPORTAR FILTRADO</font>
    </a>
    </td>
    </tr>
        </table>
      
        <br><br><hr size = 1 width = '350px' color="#d3d5d6" style="height: 1px;"><br>

</div>
<a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times; </a>


</div>
    

</table>
      <?php



      if ($total == 0) {

      ?>

        <div id="total">

          <?php

          echo "<font size='2' style='line-height:70px;'><strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;FILTRAGEM VAZIA: </strong>" . $guarda_nome . "</font>";

          ?>

        </div>

      <?php

      } else {



      ?>

        <div id="total">
       <script>
         function hide(target) {
    document.getElementById(target).style.display = 'none';
}
       </script>

        <div id="Pagina" style="display: none;">
	  
    <div id="botao"><a href="javascript:void(0); " onclick="hide('Pagina');" ><i class="material-icons" style="font-size:30px;color:black;">&#xe5c9;</i></a></div>
     <iframe name="pag1" frameborder="0" id="pag1" scrolling="no" marginheight="0" marginwidth="0" trusted="yes"></iframe>
    <iframe name="pag2" src="" frameborder=0 id="pag2" scrolling="no" marginheight="0" marginwidth="0" trusted="yes"></iframe>
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

 <div id="lista_pedido" style="display: none;">
	  
    <div id="botao_lista_pedido"><a href="javascript:void(0); "  onclick="hide('lista_pedido');" ><i class="material-icons" style="font-size:30px;color:black;">&#xe5c9;</i></a></div>
     <iframe name="pag1_lista_pedido" frameborder="0" id="pag1_lista_pedido" scrolling="no" marginheight="0" marginwidth="0" trusted="yes"></iframe>
    <iframe name="pag2_lista_pedido" src="" frameborder=0 id="pag2_lista_pedido" scrolling="no" marginheight="0" marginwidth="0" trusted="yes"></iframe>
 </div>  

        
<table border="0" color:#000000;"  cellpadding="0" cellspacing="0">
   <tr>

       <td valign="button" align="left" style="height: 34px;">
       <font size="4"><strong>&nbsp;<?php echo $guarda_nome;   ?></strong><span style="color: #000000"><?php echo $aviso_listatual; ?></span></font>
       
       </td>
       <td >

</td>
<td width='20'>

</td>
   </tr>
   <tr style="height: 25px;vertical-align: top">
   <td colspan="4"><hr style="border: none; width:100%;" color="#ECECEC"></td>
  
   
   <tr style="height: 15px;font-size: 12px;">
   <td colspan="4">
   
   </td>
   
   </tr>
   
   </table>
   <script language="JavaScript">

	
	function toggle(source) {
  checkboxes = document.getElementsByName('check_list[]');
  for(var i=0, n=checkboxes.length;i<n;i++) {
    checkboxes[i].checked = source.checked;
  }
}
</script>
   <br>
   <table width="15%" border="0" cellpadding="0" cellspacing="0" style="padding-top: 0px; padding-bottom: 0px; margin-top: 0px; color: #000000;" bgcolor="#FFFFFF">
		<tr>
		<td nowrap>
			<input type="checkbox" onClick="toggle(this)" /><font size='1'>&nbsp;&nbsp;SELECIONAR TODOS</font><br/>
		</td>
		</tr>
		 </table><br>  <br>
   

   
<table border="3" id="demo" name="demo" class="tablesorter" width="750px" >
<thead>
<tr bgcolor="#589bd4" height="35px" class="active">

<th nowrap="nowrap" headers="check" bgcolor="#00000" style="color:#000000; width:10px" class="drag-enable" title="CHECK">
<div align="center" >&nbsp;</div>
</th>

<th nowrap="nowrap" headers="icone" bgcolor="#00000" style="color:#000000; width:10px" class="drag-enable" title="GEOCODIFICAR">
<div align="center" >&nbsp;</div>
</th>

<th nowrap="nowrap" headers="icone" bgcolor="#00000" style="color:#000000; width:10px" class="drag-enable" title="EDITAR">
<div align="center" >&nbsp;</div>
</th>

<th nowrap="nowrap" headers="icone" bgcolor="#00000" style="color:#000000; width:10px" class="drag-enable" title="EXCLUIR">
<div align="center" >&nbsp;</div>
</th>

<th nowrap="nowrap" headers="icone" bgcolor="#00000" style="color:#000000;" class="drag-enable" title="CONFIANÇA">
<div align="center" >CONF.</div>
</th>

<th nowrap="nowrap" headers="icone" bgcolor="#00000" style="color:#000000; padding-left:10px" class="drag-enable" title="ENDEREÇO CADD">
<div align="left" >END. CADD</div>
</th>

<th nowrap="nowrap" headers="icone" bgcolor="#00000" style="color:#000000;" class="drag-enable" title="CLIENTES">
<div align="center" >CLIENTE</div>
</th>

<th nowrap="nowrap" headers="icone" bgcolor="#00000" style="color:#000000; width:10px" class="drag-enable" title="PEDIDOS">
<div align="center" >PDS</div>
</th>


<th nowrap="nowrap" headers="icone" bgcolor="#00000" style="color:#000000; width:20px" class="drag-enable" title="LISTA DE PEDIDOS">
<div align="center" >&nbsp;</div>
</th>

<th nowrap="nowrap" headers="icone" bgcolor="#00000" style="color:#000000;" class="drag-enable" title="NOME">
<div align="center" >NOME</div>
</th>

<th nowrap="nowrap" headers="icone" bgcolor="#00000" style="color:#000000;" class="drag-enable" title="ENDEREÇO">
<div align="center" >ENDEREÇO</div>
</th>


<th nowrap="nowrap" headers="icone" bgcolor="#00000" style="color:#000000;" class="drag-enable" title="CIDADE">
<div align="center" >CIDADE</div>
</th>

<th nowrap="nowrap" headers="icone" bgcolor="#00000" style="color:#000000;" class="drag-enable" title="UF">
<div align="center" >UF</div>
</th>

<th nowrap="nowrap" headers="icone" bgcolor="#00000" style="color:#000000;" class="drag-enable" title="CEP">
<div align="center" >CEP</div>
</th>

<th nowrap="nowrap" headers="icone" bgcolor="#00000" style="color:#000000;" class="drag-enable" title="PESO">
<div align="center" >PESO</div>
</th>

<th nowrap="nowrap" headers="icone" bgcolor="#00000" style="color:#000000;" class="drag-enable" title="VOLUME">
<div align="center" >VOL.</div>
</th>

<th nowrap="nowrap" headers="icone" bgcolor="#00000" style="color:#000000;" class="drag-enable" title="VAOR">
<div align="center" >VAL.</div>
</th>

<th nowrap="nowrap" headers="icone" bgcolor="#00000" style="color:#000000;" class="drag-enable" title="OBSERVAÇÃO">
<div align="center" >OBS.</div>
</th>


<th nowrap="nowrap" headers="icone" bgcolor="#00000" style="color:#000000;" class="drag-enable" title="SEGMENTO">
<div align="center" >SEG.</div>
</th>


</thead>
<tbody>

<?php



$conta = 0;

while ($row = mysql_fetch_array($rs)) {

  $conta++;


  //$segura_qta = $row["codigo_cliente"];


  $endereco[$conta] = $row["endereco"];
  $cidade[$conta] = $row["cidade"];
  $estado[$conta] = $row["estado"];
  $bairro[$conta] = $row["bairro"];
  $cep[$conta] = $row["cep"];
  $cod_cli[$conta] =  $row["codigo_cliente"];
  $confianca[$conta] = $row["confianca_cad"];
  $lat[$conta] = $row["latitude_cad"];
  $lgn[$conta] = $row["longitude_cad"];
  $end[$conta] = $row["endereco_cad"];


  $guarda_edit = "step2_edit.php?codigo=" . $row["codigo"];     
  $guarda = "h=" . $row["latitude_cad"] . "&v=" . $row["longitude_cad"] . "&reg=" . $row["codigo_cliente"] . "&endereco=" . $row["endereco"] . "&codigo=" . $row["codigo"] . "&cod_cli=" . $row["codigo_cliente"] . "&nome=" . $row["nome"] . "&cidade=" . $row["cidade"] . "&uf=" . $row["estado"] . "&cep=" . $row["cep"] . "&peso=" . $row["peso"] . "&valor=" . $row["valor"] . "&volume=" . $row["volume"];



?>

    <tr>
    <td align="center" nowrap="nowrap" width="auto" style="width: 20px;text-align: center;"><input type="checkbox" class="marcar" name="check_list[]" id="check_list" value="<?php echo $row["codigo_cliente"]; ?>"></td>
      <td align="center" style="width: 20px;text-align: center;"><a href="javascript:geo('<?php echo $guarda;?>');" title="Localizar cliente" ><span class="material-icons" style="font-size: 14px;">location_on</span></a></td>
      <td align="center" style="width: 20px;text-align: center;"><a href="javascript:editar('<?php echo $row["codigo_cliente"];?>');" title="Editar cliente" ><span class="material-icons" style="font-size: 14px;">edit</span></a></td>

      <td align="center" style="width: 20px;text-align: center;"><a href="javascript:confirmaExclusao('scripts.php?acao=exclui_cliente_base_cliente&id=<?php echo $row["codigo_cliente"] ?>')"  title="Excluir cliente"><span class="material-icons" style="font-size: 14px;">close</span></a></td>
      <?php

      if ($confianca[$conta] == 110) {
        ?>
       <td align="center" bgcolor="#FFF" style="color: red;text-align: center;"><strong><?php echo ("DESATIVADO");?></strong></td>

       <?php
        }

      if ($confianca[$conta] == 101) {
      ?>
        <td align="center" bgcolor="#FFF" style="color: #589bd4;text-align: center;"><strong><?php echo ("MANUAL");?></strong></td>

         <?php
      }
              if ($confianca[$conta] > 70 and $confianca[$conta] < 101) {

              ?>

        <td align="center" bgcolor="#FFF" style="color: #5cbc69;text-align: center;"><strong><?php echo $confianca[$conta] . "%";?></strong></td>

            <?php

      }
              if ($confianca[$conta] <= 70 and $confianca[$conta] > 50) {

            ?>

        <td align="center" bgcolor="#FFF" style="color: #F90;text-align: center;"><?php echo $confianca[$conta] . "%";?></td>

            <?php
       }

              if ($confianca[$conta] <= 50) {

            ?>

        <td align="center" bgcolor="#FFF" style="color: #C00;text-align: center;"><?php echo $confianca[$conta] . "%";?></td>

          <?php

        }
            ?>
        <td align="left"  nowrap="nowrap" title="<?php echo $end[$conta];?>"><?php 
        //echo $end[$conta];
        echo mb_strimwidth($end[$conta], 0, 20, "...");
        ?></td>
        <td align="center" id="id"><strong><?php 
        echo $row["codigo_cliente"];
        ?></strong></td>
       
        <td align="center"><div align="center"><?php 
            $query_zz = "select * from clientes where codigo_cliente='$cod_cli[$conta]'";		
            $query_zz = mysql_query($query_zz);
            $total_pedidos = mysql_num_rows($query_zz);
              echo "<strong>" . $total_pedidos .  "</strong>";
        ?></div>
        </td>
         <td align="center"><div align="center"><a href="javascript:lista_pedidos('<?php echo $row["codigo_cliente"];?>');"<i class="material-icons" style="font-size:14px">assignment_ind</i></a></div></td>
        <td align="left" title="<?php echo $row['nome'];?>" nowrap="nowrap"  ><?php 
        echo $row["nome"];
       // echo mb_strimwidth($row["nome"], 0, 20, "...");
        ?></td>
        <td align="left"  nowrap="nowrap" title="<?php echo $row['endereco'];?>" ><?php 
       // echo $row["endereco"];
        echo mb_strimwidth($row["endereco"], 0, 20, "..."); 
        ?></td>
    
        <td align="left" nowrap="nowrap" title='<?php echo $row['cidade']; ?>'><?php
        //echo $row["cidade"] 
        echo mb_strimwidth($row["cidade"], 0, 20, "..."); 
        ?> </td>
        <td align="center" nowrap="nowrap" title='<?php echo $row['estado']; ?>'  > <?php 
        //echo $row["estado"] 
        echo mb_strimwidth($row["estado"], 0, 2, "..."); 
        ?></td>
        <td align="center" nowrap="nowrap" title='<?php echo $row['cep']; ?>'><?php 
       // echo $row["cep"] 
        echo mb_strimwidth($row["cep"], 0, 9, "...");
        ?></td>
        <td align="center" nowrap="nowrap" title='<?php echo $row['peso']; ?>'><?php 
        //echo $row["peso"] 
        echo mb_strimwidth($row["peso"], 0, 9, "...");
        ?></td> 
        <td align="center" nowrap="nowrap" title='<?php echo $row['volume']; ?>'><?php 
        ///echo $row["volume"] 
        echo mb_strimwidth($row["volume"], 0, 9, "...");
        ?></td>
        <td align="center" nowrap="nowrap" title='<?php echo $row['valor']; ?>'><?php 
        //echo $row["valor"] 
        echo mb_strimwidth($row["valor"], 0, 9, "...");
        ?></td> 
        <td align="left" nowrap="nowrap" title='<?php echo $row['obs_pedido']; ?>'><?php 
        //echo $row["obs_pedido"] 
        echo mb_strimwidth($row["obs_pedido"], 0, 30, "...");
        ?></td>


        <td align="center" title='<?php echo $row['premium']; ?>'><?php 
        //echo $row["premium"] 
        echo mb_strimwidth($row["premium"], 0, 9, "...");
        ?></td>

    </tr>

<?php

  

}

}


?>
</tbody>
		
</table>

<br><br><br><br>
        </div>


  <div class="footer">
  
  <table border="0" style="width: 100%; height:100%"   cellpadding="0" cellspacing="0">
<tr >
  <td style="font-size: 11px;text-align: left;">
  <input type='submit' name='submit' value='VOLTAR' onclick="location.href='step1.php';" />
  </td>
  
  <td style="font-size: 11px;text-align: right;">
  <form name="go_step3" action="scripts.php?acao=esvazia_veiculos" method="post">

<input type='submit' value='AVANÇAR' />

</form>
    </td>
</tr>

  </table>


  
</div>
      
</body>



</html>