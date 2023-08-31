<?php 
  include ('session.php');
  include ('conecta.php');
  ini_set('max_execution_time',12000);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  
<head>
  <title>::. MONITORAMENTO .:: CADD</title>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

  <link rel="shortcut icon" href="imgs/favicon.ico" >
  <link rel="icon" type="image/gif" href="imgs/animated_favicon1.gif" >

  <link rel="stylesheet" type="text/css" href="css/menu.css">
  <link rel="stylesheet" type="text/css" href="css/step8.css">

  <link class="theme" rel="stylesheet" href="css/theme.blue.css">
  <link rel="stylesheet" href="css/dragtable.mod.css">
  <link rel="stylesheet" type="text/css" href="css/dragtable.css" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
  <script type='text/javascript' src="control/timer.js"></script>
  <script src="js/logger.js"></script>
  <script src="js/jquery-ui.min.js"></script>
  <script src="js/jquery.tablesorter.js"></script>
  <script src="js/jquery.tablesorter.widgets.js"></script>
  <script src="js/extras/jquery.dragtable.mod.js"></script>

<script>
(function($) {
    $.fn.waiting = function(options) {
        options = $.extend({modo: 'normal'}, options);
        this.fadeOut(options.modo);
        return this;
      };
    })(jQuery);

    $(document).ready(function() {
      $('.defaultTable').dragtable();
    });

    $(function () {
      $('table').dragtable({
        sortClass: '.sorter',
        tablesorterComplete: function(table) {},
        dragaccept: '.drag-enable',  // class name of draggable cols -> default null = all columns draggable
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

      }).tablesorter({
        theme: 'blue',
        selectorSort: '.sorter',
        widgets: ['filter', 'columns']
      });
    });


</script>

  <!-- CALENDARIO LIB AND LANGUAGE -->
  <script src="https://npmcdn.com/flatpickr/dist/flatpickr.min.js"></script>
  <script src="https://npmcdn.com/flatpickr/dist/l10n/pt.js"></script>


  <style>
    #pag1_chat{
      position: fixed;
      width: 100%;
      left: 0px;
      top: 0px;
      height:100%;
      z-index:999999;
      background-repeat: repeat;
      background-size: cover;
      background-color: white;
      opacity: 0.7;
    }
    
    #pag2_chat{
      width: 600px;
      height: 404px;
      top: 50%;
      left: 50%;
      margin-top: -202px;
      margin-left: -300px;
      position: absolute;
      border: 1px solid silver;
      background-color: white;
      z-index:999999;
    }
    
    #botao_chat{
      width: 30px;
      height: 30px;
      top: 50%;
      left: 50%;
      margin-top: -220px;
      margin-left: 290px;
      position: absolute;
      z-index:9999999;
      color: #000;
    }
    .apDiv12{
      position: relative;
      z-index: 0;
      width: 98%;
      height: 730px;
      left: 0px;
      top: 0px;
      overflow: auto;
      margin-left: 20px;
      margin-right: 20px;
      background-color: #ffffff;
    }
    .total{
      position: relative;
      width: 100%;
      height: 100%;
      border-color: gray;
    }
    .tablesorter-blue{
      width: 100%;
      background-color: #fff;
      text-align: left;
      border-spacing: 0;
      border: #cdcdcd 1px solid;
      border-width: 1px 0 0 1px;
      font-size: 11px;
    }
    .title{
      margin: 0px 20px 0px 20px;
    }
    .from {
      height: 38px !important;
     
      padding: 0.80rem !important;
    
      font-size: unset !important;
      border: solid 1px !important;
      border-color: #bbbbbb !important;
    }
    .from-date {
      padding: 0rem 1rem 0rem 0rem;
    }
    .until-date {
      padding: 0rem 1rem 0rem 0rem;
    }
    .until {
      height: 38px !important;
     
      padding: 0.80rem !important;
   
      font-size: unset !important;
      border: solid 1px !important;
      border-color: #bbbbbb !important;
    }
    .search-button{
      color: #FFF;
      background: #589bd4;
      border: 1px solid #589bd4;
      font-size: 11px;
      height: 38px;
      width: 150px;
      font-weight: bold;
    }
    .search-button:active {
      
    }

    .search-button:hover {
    background: #2868c7;
    border: 1px solid #2868c7;
    cursor: pointer;
}


    
#pag1x{
position: absolute;
	width: 100%;
	left: 0px;
	top: 0px;
	height:2000px;

z-index:9997;
background-color: white;
opacity: 0.95;

		
}
	#pag2x{
width: 520px;
height: 586px;
top: 50%;
left: 50%;
margin-top: -298px;
margin-left: -260px;
position: absolute;
border: 1px solid silver;
background-color: white;
	z-index:9998;
	

}

#botao1{
	position: absolute;
    width: 30px;
		height: 30px;
top: 50%;
left: 50%;
margin-top: -316px;
margin-left: -280px;
position: absolute;
	z-index:99999;
		
	}
	
table.bordasimples {
	border-collapse: collapse;
	
	}

table.bordasimples tr td {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 12px;
	border:1px solid #d3d5d6;

	padding-left: 2px;
	padding-right: 2px;
	cursor: pointer;

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
	opacity: 0.90;
	-moz-opacity: 0.90;
	filter: alpha(opacity = 90);
	background-color:#ffffff;
	text-align:center;
	
	color:#FFFFFF;
	background-image: url("../imgs/loading.gif");
	background-repeat: no-repeat;
	background-position: 50% 35%;
	padding-top: 320px;
}
  </style>

</head>

<body>
<?php
    if(!empty($_POST['inicial']) OR $_POST['inicial']!='0000-00-00') {
      $initialDateToConvert = str_replace('/', '-', $_POST['inicial']);
      $postDateInicial = date('Y-m-d', strtotime($initialDateToConvert));
    }

    if(!empty($_POST['final']) OR $_POST['final']!='0000-00-00') {
      $finalDateToConvert = str_replace('/', '-', $_POST['final']);
      $postDateFinal = date('Y-m-d', strtotime($finalDateToConvert));
    }


    if(!empty($_POST['final']) OR $_POST['final']!='0000-00-00' OR !empty($_POST['inicial']) OR $_POST['inicial']!='0000-00-00') {

      $queryData1 = "SELECT id FROM rotas WHERE data_control BETWEEN '$postDateInicial' AND '$postDateFinal'";
      $result1 = mysql_query($queryData1);
      $total_todos1 = mysql_num_rows($result1);
      
    }

 

include ('base_cad.php');

  
if($total_todos1>=10000){

  ?>
  <script LANGUAGE="JavaScript" TYPE="text/javascript">

  alert("O filtragem obteve <?php echo $total_todos1 ?> registros. \n Essa pesquisa pode levar muito tempo para carregar a pagina! \n O limite de resultados é de 10.000 consultas.\n Faça uma pesquisa com menos resultados!");

$postDateFinal = '0000-00-00';
$postDateInicial  ='0000-00-00';
window.location.href ="step8.php";

  </script>


  <?php
 
} 
?>

  <br>
  
  </div>

  <div id="div_titulo">
    <table width="100%" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td align="left" valign="middle">
          <font size="3">RANKING</font>
        </td>
      </tr>
    </table>
  </div>
<br>
  <table class="title" border="0" cellpadding="0" cellspacing="0">

    <tr>

      <td  align="left" nowrap="nowrap"  style="width: 20px;">
        <i class="material-icons" style="font-size: 30px;margin-top: 3px;">list</i>
      </td>

      <td valign="button">
        <font size="4"><strong>&nbsp;RANKING DO APP</strong>

        </font>
      </td>

    </tr>

    <tr style="height: 25px;vertical-align: button">
      <td colspan="2">
        <hr style="border: none; width:200px;" >
      </td>
    </tr>

  </table>


<br><br>
  <table class="title" border="0" cellpadding="0" cellspacing="0">

    <tr style="height: 55px;vertical-align: button">

      <td colspan="2">

        <div style="display: flex; margin-bottom: 1rem;">

          <form action="step8.php" method="POST" name="data_search" id="data_search" style="text-transform: none;font-size:11px">

            <div style="display:flex;">
        
              <div class="from-date">
                De:&nbsp;&nbsp;&nbsp;<input type="datetime-local" class="from"  name="inicial" placeholder="Data inicial">
              </div>

              <div class="until-date">
                Até:&nbsp;&nbsp;&nbsp;<input type="datetime-local" class="until" name="final" placeholder="Data final">
              </div>

            </div>
          </form>

          <button type="submit" form="data_search" class="search-button">PESQUISAR</button>
        </div>

       
        <div style="font-size: 16px;">
        <br>
          <?php

          if($total_todos1>0){
            echo "De: <strong>".$_POST['inicial']."</strong> Até: <strong>".$_POST['final']."</strong>";
          } 
           
          ?>
        </div>
        
      </td>
      </tr>
      <tr>
<td >
  <div  style="font-size: 16px;">
  <br>

<?php
 if($total_todos1>0){
            echo " Pedidos encontrados: <strong>".$total_todos1."</strong>";
    } 
           
?>
  </div>
 
  <div style="font-size: 11px;">
        <br>
        <span style="color:red"><strong>OBS: Ideal para o bom funcionamento da pesquisa a utilização de até no máximo 1 mês! São permitidos 10.000 pedidos.</strong></span>
        </div>
</td>
    </tr>
  </table>
<br><br>
<div id="ranking">

<button type="submit"  class="search-button" style="width: 100%;">RANKING</button>

<table border="1" style="width: auto;" class="tablesorter" cellpadding="0" cellspacing="0">
<thead>
<tr height="40px" wight="20px" align="center"  >
<th class="drag-enable" title="RANKING">
R
</th>
<th class="drag-enable"  title="PLACA">
PLACA
</th>
<th class="drag-enable"  title="BAIXA APP" style="width: 100px;">
BAIXA APP
</th>
<th class="drag-enable"  title="BAIXA APP"  style="width: 100px;">
BAIXA PAINEL
</th>
<th class="drag-enable"  title="PENDENTE">
PEND. %
</th>
<th class="drag-enable">
TOTAL
</th>
<th class="drag-enable" style="background-color: green; color:white" title="POSITIVADOS">
POS.
</th>
<th class="drag-enable" style="background-color: red; color:white" title="NEGTIVADOS">
NEG.
</th>
<th class="drag-enable" style="background-color: #A9A9A9; color:white" title="ALERTAS">
ALE.
</th>
<th class="drag-enable" style="background-color: orange; color:white" title="PENDENTES">
PEND.
</th>
<th class="drag-enable" title="FOTOS">
FOTOS %
</th>
</tr>
</thead>
<?php

if($total_todos1<10000 or $total_todos1!=0 ){

$queryData2 = "SELECT  distinct login FROM rotas WHERE data_control BETWEEN '$postDateInicial' AND '$postDateFinal'";
$rs2 = mysql_query($queryData2);
$total_loading = mysql_num_rows($rs2);


$array_ranking = [];

?>
<div id="loading" style="position:absolute; width:100%; height:100%; background-color:#FFFFFF; z-index:99999; top:0; ">
<div id='carrega' style='height:100px;background-color:#FFFFFF; width:400px; position: absolute; top: 50%; margin-top:-50px; left:50%; margin-left:-200px;'>
<div id='progress' style='position: relative; left: 28px; top: 28px; width: 340px; height: 40px; background-color: #6f99d6; layer-background-color: #6f99d6; border: 1px none #000000; font-family:Arial, 'Helvetica Neue', Helvetica, sans-serif; font-size:12px;'>

<?php

while($row2 = mysql_fetch_array($rs2)){



  $conta2++; 
  $motorista = $row2["login"];

    //// LOADING 0 A 100% ////////////////////////////////////////////////////
	$pega_loading = intval(($conta2/$total_loading)* 100) . "%";
	
  echo "<div style='position:absolute;margin:0px 0px 0px 0px;width:$pega_loading;height:40px;background:#2867b2;color:#2867b2;color: #FFFFFF;text-align:center;line-height:40px;font-size:11px;'>$pega_loading</div>";
  flush();
  ob_flush();




//// LOADING 0 A 100% ////////////////////////////////////////////////////
  //echo $conta2;


  $query_tds = mysql_query("SELECT id, login FROM rotas WHERE login='$motorista' and data_control BETWEEN '$postDateInicial' AND '$postDateFinal'");

  $query_tds_app = mysql_query("SELECT id FROM rotas WHERE login='$motorista' and x_ocorrencia!='' and data_control BETWEEN '$postDateInicial' AND '$postDateFinal'");
  $query_tds_painel = mysql_query("SELECT id FROM rotas WHERE login='$motorista' and x_ocorrencia='' and data_control BETWEEN '$postDateInicial' AND '$postDateFinal'");

  $query_amarelo = mysql_query("SELECT id, login FROM rotas WHERE login='$motorista' and status=0 and data_control BETWEEN '$postDateInicial' AND '$postDateFinal'");
  $query_verde = mysql_query("SELECT id FROM rotas WHERE login='$motorista'  and status=1 and data_control BETWEEN '$postDateInicial' AND '$postDateFinal'");
  $query_vermelho = mysql_query("SELECT id FROM rotas WHERE login='$motorista' and status=2 and data_control BETWEEN '$postDateInicial' AND '$postDateFinal'");
  $query_preto = mysql_query("SELECT id FROM rotas WHERE login='$motorista'  and status=3 and data_control BETWEEN '$postDateInicial' AND '$postDateFinal'");

  $query_amarelo_app = mysql_query("SELECT id FROM rotas WHERE login='$motorista' and x_ocorrencia!=''  and status=0 and data_control BETWEEN '$postDateInicial' AND '$postDateFinal'");
  $query_verde_app = mysql_query("SELECT id FROM rotas WHERE login='$motorista' and x_ocorrencia!=''   and status=1 and data_control BETWEEN '$postDateInicial' AND '$postDateFinal'");
  $query_vermelho_app = mysql_query("SELECT id FROM rotas WHERE login='$motorista' and x_ocorrencia!=''  and status=2 and data_control BETWEEN '$postDateInicial' AND '$postDateFinal'");
  $query_preto_app = mysql_query("SELECT id FROM rotas WHERE login='$motorista' and x_ocorrencia!=''   and status=3 and data_control BETWEEN '$postDateInicial' AND '$postDateFinal'");

  $query_amarelo_painel = mysql_query("SELECT id FROM rotas WHERE login='$motorista' and x_ocorrencia=''  and status=0 and data_control BETWEEN '$postDateInicial' AND '$postDateFinal'");
  $query_verde_painel = mysql_query("SELECT id FROM rotas WHERE login='$motorista' and x_ocorrencia=''   and status=1 and data_control BETWEEN '$postDateInicial' AND '$postDateFinal'");
  $query_vermelho_painel = mysql_query("SELECT id FROM rotas WHERE login='$motorista' and x_ocorrencia=''  and status=2 and data_control BETWEEN '$postDateInicial' AND '$postDateFinal'");
  $query_preto_painel = mysql_query("SELECT id FROM rotas WHERE login='$motorista' and x_ocorrencia=''   and status=3 and data_control BETWEEN '$postDateInicial' AND '$postDateFinal'");


  $total_tds = mysql_num_rows($query_tds);
  $total_tds_app = mysql_num_rows($query_tds_app);
  $total_tds_painel = mysql_num_rows($query_tds_painel);

  // TOTAL STATUS
  $total_amarelo = mysql_num_rows($query_amarelo);
  $total_verde = mysql_num_rows($query_verde);
  $total_vermelho = mysql_num_rows($query_vermelho);
  $total_preto = mysql_num_rows($query_preto);

  $total_amarelo_app = mysql_num_rows($query_amarelo_app);
  $total_verde_app = mysql_num_rows($query_verde_app);
  $total_vermelho_app = mysql_num_rows($query_vermelho_app);
  $total_preto_app = mysql_num_rows($query_preto_app);

  $total_amarelo_painel = mysql_num_rows($query_amarelo_painel);
  $total_verde_painel = mysql_num_rows($query_verde_painel);
  $total_vermelho_painel = mysql_num_rows($query_vermelho_painel);
  $total_preto_painel = mysql_num_rows($query_preto_painel);

  $conta_fts_ok = 0;

  // FOTO VERIFICA
  while($row3 = mysql_fetch_array($query_tds)){
    $fotos_verifica = $row3["id"];
    $query_fotos = mysql_query("SELECT id_visita FROM images WHERE id_visita='$fotos_verifica' limit 1");
    $total_fotos = mysql_num_rows($query_fotos);

    if($total_fotos==1){
      $conta_fts_ok++;
    }
  }
  $conta_fotos = ($conta_fts_ok/$total_tds) * 100;

// echo $conta_fts_ok . "<br>";
//echo $total_amarelo . "-";
//echo $total_verde . "-";
//echo $total_vermelho . "-";
//echo $total_preto . "-";
//echo $total_tds . "-";
$soma_status = $total_verde + $total_vermelho + $total_preto;
$soma_status_app = $total_verde_app + $total_vermelho_app + $total_preto_app;
$soma_status_painel = $total_verde_painel + $total_vermelho_painel + $total_preto_painel;

$resultado_pendente = ($total_amarelo / $total_tds) * 100;
$resultado_outros = ($soma_status_app / $total_tds) * 100;

$resultado_painel = ($soma_status_painel / $total_tds) * 100;

 
$resultado_outros=round($resultado_outros);

if($resultado_outros==100){
  
} else {

    $resultado_outros=sprintf("%03s",$resultado_outros);

}

$concatena_ranking = $resultado_outros . "*" . $motorista . "*" . $resultado_pendente . "*" . $total_tds . "*" . $total_verde . "*" . $total_vermelho . "*" . $total_preto . "*" . $total_amarelo . "*" . $conta_fotos. "*" . $resultado_painel;
array_push($array_ranking, $concatena_ranking );

}
rsort($array_ranking);

$conta_array= count($array_ranking);
//print_r($array_ranking);

?>

<tbody>
<?php
for ($i = 0; $i < $conta_array; $i++) {
   // print $array_ranking[$i] . "<br>";
    $pieces = explode("*", $array_ranking[$i]);
    ?>

<?php
if($pieces[0]==100){
$bg_ranking= 'style="background-color:#BDECB6"';
} 
if($pieces[0]<=99){
  $bg_ranking= 'style="background-color:#FFEBCD"';
  } 
  if($pieces[0]<=80){
    $bg_ranking= 'style="background-color:#F5C3C3"';
    } 
  
?>

<tr align="center">
<td <?=$bg_ranking?> >
<?php
echo $i+1;
?>
</td>
<td <?=$bg_ranking?>  align="left">
<?php
echo $pieces[1];
?>
</td>
<td <?=$bg_ranking?>>
<?php
echo round($pieces[0]) . "%";
?>   
</td>
<td <?=$bg_ranking?>>
<?php
echo round($pieces[9]) . "%";
?>    
</td>

<td <?=$bg_ranking?>>
<?php
echo round($pieces[2]) . "%";
?>    
</td>

<td <?=$bg_ranking?>>
<?php
echo round($pieces[3]);
?>    
</td>
<td <?=$bg_ranking?>>
<?php
echo round($pieces[4]);
?>    
</td>
<td <?=$bg_ranking?>>
<?php
echo round($pieces[5]);
?>    
</td>
<td <?=$bg_ranking?>>
<?php
echo round($pieces[6]);
?>    
</td>
<td <?=$bg_ranking?>>
<?php
echo round($pieces[7]);
?>    
</td>
<td <?=$bg_ranking?>>
<?php
echo round($pieces[8]) . "%";
?>    
</td>

</tr>


<?php
 }

}
echo "<script>document.getElementById('loading').style.display = 'none'</script>";

?>
</tbody>
</table>

</div>


  <script LANGUAGE="JavaScript">

    flatpickr("input[type=datetime-local]", {
      dateFormat: "d-m-Y",
      "locale": "pt",
    });

    
  </script>


<br><br><br>
</body>
</html>