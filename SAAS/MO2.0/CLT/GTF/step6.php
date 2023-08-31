<?php
namespace gchart;
#ini_set('display_errors','1');
include ('session.php');
include ('conecta.php');
ini_set('max_execution_time',12000); 
?>
<!DOCTYPE html>
<title>::. MONITORAMENTO .:: CADD</title>

<html>
	<head>
    <link rel="stylesheet" type="text/css" href="css/menu.css">
	<link rel="stylesheet" type="text/css" href="css/step6.css">
    <link rel="shortcut icon" href="imgs/favicon.ico" >
 	<link rel="icon" type="image/gif" href="imgs/animated_favicon1.gif" >

		<script src="js/jquery.min.js"></script>
		<script src="js/chartphp.js"></script>
		<link rel="stylesheet" href="js/chartphp.css">
         <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
    
<script language="javascript">
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
</script>
</head>

<body>

<div class="jquery-waiting-base-container"></div>
<div id="div_titulo">
	  	<table width="100%" border="0" cellpadding="0" cellspacing="0">
    <tr>

     	   <td align="left" valign="middle"><strong><font size="2">TABELA DE RESULTADOS</font></strong></td>
     
		
    </tr>
</table>

	</div>
<?php

require_once(__DIR__ . "/gchart/gChartInit.php");

include ('base_cad.php'); 


if($_GET["id_lista"]!=''){
$pega_lista = $_GET["id_lista"];
}
else{
$pega_lista = '%%';
}


if($user==$logado){
$user = '%%';
}

//echo $pega_login;

if($_GET["id_rota"]!=''){
$pega_rota = $_GET["id_rota"];
}
else{
$pega_rota = '%%';
}
?>

<div id="apDiv11">
 <div id="help" class="help" hidden="hidden"><img src="imgs/help.png" width="45" height="45" alt=""/><div id="sidebar">
  <p>• Faça a filtragem sobre o login ou rota desejados.</p><br />
  <p>• <strong>MAPA:</strong> Visualize os locais onde foram geradas coordenadas de rastreamento!</p><br />
    
    </div>

</div>  
 


 

	
  <div id="apDiv12">
  <div id="apDiv12a">
   
<form name='theForm' id='theForm'>  
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" style="font-family:Arial, Helvetica, sans-serif; font-size:11px; color:#FFFFFF;  height:45px">
      <tbody>
      <tr>

        <td width="2%">&nbsp;</td>
        <td width="44%">
          <select name="id_lista" style="width:98%">
            <option value="">LISTA</option>
            <?php 
	$query_lista = "select rotas.lista, usuario.coordenador from rotas INNER JOIN usuario ON usuario.login=rotas.login where usuario.coordenador LIKE '$user' GROUP BY rotas.lista order by rotas.id DESC";															
	$rs_lista = mysql_query($query_lista);									
	while($row_lista = mysql_fetch_array($rs_lista)){
		$id_rota_lista = $row_lista["lista"];
?>
            <?php 
	if ($pega_lista== $id_rota_lista){
	?>
            <option selected value="<?= $id_rota_lista ?>"><?= $id_rota_lista ?></option>
            <?php } else {
		?>
            <option value="<?= $id_rota_lista ?>"><?= $id_rota_lista ?></option>
            <?php
		}
	 }
?>
            </select>
        </td>
        <td width="44%">
          
          <select name="id_rota" style="width:98%">
            <option value="">ROTA</option>
            <?php 
	$query3 = "select rotas.rota, usuario.coordenador, rotas.login from rotas INNER JOIN usuario ON usuario.login=rotas.login where usuario.coordenador LIKE '$user' AND rotas.lista LIKE '$pega_lista' GROUP BY rotas.rota order by rotas.statusrota, rotas.rota ASC";												
	$rs3 = mysql_query($query3);									
	while($row3 = mysql_fetch_array($rs3)){
	$id_rota = $row3["rota"];
	?>
            <?php 
	if ($pega_rota== $id_rota){
	?>
            <option selected value="<?= $id_rota ?>"><?= $id_rota ?></option>
            <?php } else {
		?>
            <option value="<?= $id_rota ?>"><?= $id_rota ?></option>
            <?php
		}
	}
  ?>
            </select>
          
        </td>
        <td width="8%" align="center"><input type="submit" value="FILTRAR"></td>
        <td width="2%">
      
        </td>
      </tr>
    </tbody>
</table>
</form>
</div>
<p style="padding-top:5px;"></p>

<?php

$query_coordenadores_new1 =  mysql_query("select coordenador from usuario WHERE coordenador!='' AND coordenador LIKE '$user' group by coordenador");


while($row_coordenador_new = mysql_fetch_array($query_coordenadores_new1)){
		
	$pega_coordenador = strtoupper($row_coordenador_new['coordenador']);
	//echo $pega_coordenador;
	//$pega_coordenador1 = strtoupper($row_coordenador_new['coordenador']);
	

	  $query_coordenadores_x=  mysql_query("select rotas.*, usuario.login, usuario.coordenador from rotas INNER JOIN usuario ON rotas.login=usuario.login where usuario.coordenador='$pega_coordenador' AND rotas.lista LIKE '$pega_lista' AND rotas.rota LIKE '$pega_rota' AND rotas.classificacao!='I'");  
	  $query_coordenadores_y=  mysql_query("select rotas.*, usuario.login, usuario.coordenador from rotas INNER JOIN usuario ON rotas.login=usuario.login where usuario.coordenador='$pega_coordenador' AND rotas.lista LIKE '$pega_lista' AND rotas.rota LIKE '$pega_rota' AND rotas.status=1 AND rotas.classificacao!='I'");
	  $query_coordenadores_z=  mysql_query("select rotas.*, usuario.login, usuario.coordenador from rotas INNER JOIN usuario ON rotas.login=usuario.login where usuario.coordenador='$pega_coordenador' AND rotas.lista LIKE '$pega_lista' AND rotas.rota LIKE '$pega_rota' AND rotas.status=2 AND rotas.classificacao!='I'");
	  $query_coordenadores_q=  mysql_query("select rotas.*, usuario.login, usuario.coordenador from rotas INNER JOIN usuario ON rotas.login=usuario.login where usuario.coordenador='$pega_coordenador' AND rotas.lista LIKE '$pega_lista' AND rotas.rota LIKE '$pega_rota' AND rotas.status=3 AND rotas.classificacao!='I'");
	  $query_coordenadores_w=  mysql_query("select rotas.*, usuario.login, usuario.coordenador from rotas INNER JOIN usuario ON rotas.login=usuario.login where usuario.coordenador='$pega_coordenador' AND rotas.lista LIKE '$pega_lista' AND rotas.rota LIKE '$pega_rota' AND rotas.status=0 AND rotas.classificacao!='I'");
	  
	  
	  $num_coordenador_x = mysql_num_rows($query_coordenadores_x);
	  $num_coordenador_y = mysql_num_rows($query_coordenadores_y);
	  $num_coordenador_z = mysql_num_rows($query_coordenadores_z);
	  $num_coordenador_q = mysql_num_rows($query_coordenadores_q);
	  $num_coordenador_w = mysql_num_rows($query_coordenadores_w);
	

	  $conta_eficiencia = number_format($num_coordenador_y* 100 / $num_coordenador_x, 2) . "%";
?>


  <table width="100%" border="0" cellspacing="0" cellpadding="0" class="bordasimples">
  <tbody>
  <tr height="35px" bgcolor="#FFFFFF" style="color:#FFFFFF; font:arial; font-size:12px; font-weight:bold">
  <td width="10%" bgcolor="#589bd4" style="text-align: center;font-size:11px;color:#FFFFFF;">COORDENADOR</td>
  <td bgcolor="#589bd4" style="text-align: center;font-size:11px" colspan="6">USUÁRIOS</td>
  </tr>
    <tr>
      <td bgcolor="#FFFFFF" style="color:#000000; font-weight:bold" width="10%"><?php echo $pega_coordenador; ?></td>
      <td width="85%">
   <table width="100%" border="0" cellspacing="0" cellpadding="0" >

    <tr align="center">
      <td bgcolor="#589bd4" style="color:#FFFFFF">USUÁRIOS</td>
      <td bgcolor="#589bd4" style="color:#FFFFFF">VISITAS</td>
      <td bgcolor="#5cbc69" style="color:#FFFFFF">POSITIVADOS</td>
      <td bgcolor="#C00" style="color:#FFFFFF">NEGATIVADOS</td>
      <td bgcolor="#000000" style="color:#FFFFFF">ALERTAS</td>
      <td bgcolor="#F90" style="color:#FFFFFF">PENDENTES</td>
      <td bgcolor="#589bd4" style="color:#FFFFFF">EFICIÊNCIA</td>
    </tr>
    
      <?php
    

	    ///VERIFICA LISTA VAZIO OU USUARIO EXCLUIDO DO SISTEMA
if($pega_lista=='%%'){
	$query_coordenadores_lopping =  mysql_query("select usuario.* from usuario WHERE usuario.coordenador='$pega_coordenador' order by login");		
	} else {	
		$query_coordenadores_lopping =  mysql_query("select usuario.* from usuario INNER JOIN rotas ON usuario.login=rotas.login WHERE usuario.coordenador='$pega_coordenador' AND rotas.lista='$pega_lista' group by usuario.login  order by login");
		
	}
	
	
	while($row = mysql_fetch_array($query_coordenadores_lopping)){		
		$pega_gestor_lopping = strtoupper($row['login']);	
		$pega_coordenador1 = strtoupper($row['coordenador']);	
				
		$query_new =  mysql_query("select rotas.* from rotas INNER JOIN usuario ON rotas.login=usuario.login where usuario.coordenador='$pega_coordenador1' AND rotas.login='$pega_gestor_lopping' AND rotas.lista LIKE '$pega_lista' AND rotas.rota LIKE '$pega_rota' AND rotas.classificacao!='I'");		
		
		$query_new1 =  mysql_query("select * from rotas INNER JOIN usuario ON rotas.login=usuario.login where usuario.coordenador='$pega_coordenador1' AND rotas.login='$pega_gestor_lopping' AND rotas.lista LIKE '$pega_lista' AND rotas.rota LIKE '$pega_rota' AND rotas.status=1 AND rotas.classificacao!='I'");	
		
		$query_new2 =  mysql_query("select * from rotas INNER JOIN usuario ON rotas.login=usuario.login where usuario.coordenador='$pega_coordenador1' AND rotas.login='$pega_gestor_lopping' AND rotas.lista LIKE '$pega_lista' AND rotas.rota LIKE '$pega_rota' AND rotas.status=2 AND rotas.classificacao!='I'");	
		
		$query_new3 =  mysql_query("select * from rotas INNER JOIN usuario ON rotas.login=usuario.login where usuario.coordenador='$pega_coordenador1' AND rotas.login='$pega_gestor_lopping' AND rotas.lista LIKE '$pega_lista' AND rotas.rota LIKE '$pega_rota' AND rotas.status=3 AND rotas.classificacao!='I'");
			
		$query_new4 =  mysql_query("select * from rotas INNER JOIN usuario ON rotas.login=usuario.login where usuario.coordenador='$pega_coordenador1' AND rotas.login='$pega_gestor_lopping' AND rotas.lista LIKE '$pega_lista' AND rotas.rota LIKE '$pega_rota'AND rotas.status=0 AND rotas.classificacao!='I'");	
		
	
		$pega_gestor_lopping_visitas = mysql_num_rows($query_new);
		$pega_gestor_lopping_visitas1 = mysql_num_rows($query_new1);
		$pega_gestor_lopping_visitas2 = mysql_num_rows($query_new2);
		$pega_gestor_lopping_visitas3 = mysql_num_rows($query_new3);
		$pega_gestor_lopping_visitas4 = mysql_num_rows($query_new4);
		
		$conta_eficiencia1 = number_format($pega_gestor_lopping_visitas1* 100 / $pega_gestor_lopping_visitas, 2) . "%";	
	?>
     <tr align="center" bgcolor="#FFFFFF">
    
      <td><?php echo $pega_gestor_lopping; ?></td>
      <td><?php echo $pega_gestor_lopping_visitas; ?></td>

	 <td><?php echo $pega_gestor_lopping_visitas1; ?></td>
  	 <td><?php echo $pega_gestor_lopping_visitas2; ?></td>
   	 <td><?php echo $pega_gestor_lopping_visitas3; ?></td>
     <td><?php echo $pega_gestor_lopping_visitas4; ?></td>
    
      <td><?php echo $conta_eficiencia1; ?></td>
    </tr>
 
<?php
	}
	?>
     <tr align="center"  bgcolor="#589bd4" style="color:#FFFFFF; font:arial; font-size:12px">
      <td>SUBTOTAL</td>
      <td><?php echo $num_coordenador_x; ?></td>
      <td><?php echo $num_coordenador_y; ?></td>
      <td><?php echo $num_coordenador_z; ?></td>
      <td><?php echo $num_coordenador_q; ?></td>
      <td><?php echo $num_coordenador_w; ?></td>
      <td><?php echo $conta_eficiencia; ?></td>
    </tr>
    </table>
      </td>
    </tr>
  </tbody>
  

</table>     
<p style="padding-top:8px;"></p>
  <?php
}
	?>
<?php
///////////////////////////////////////////////////////////////////////////


?>

<?php	
	
	///TOTAL GERAL////////
	$query_total =  mysql_query("select rotas.*, usuario.login, usuario.coordenador from rotas INNER JOIN usuario ON rotas.login=usuario.login where usuario.coordenador LIKE '$user' AND usuario.coordenador!='' AND rotas.lista LIKE '$pega_lista' AND rotas.rota LIKE '$pega_rota' AND rotas.classificacao!='I'");
	
	$query_total_p =  mysql_query("select rotas.*, usuario.login, usuario.coordenador from rotas INNER JOIN usuario ON rotas.login=usuario.login where usuario.coordenador LIKE '$user' AND usuario.coordenador!='' AND rotas.lista LIKE '$pega_lista' AND rotas.rota LIKE '$pega_rota' AND rotas.status=1 AND rotas.classificacao!='I'");
	
	$query_total_n =  mysql_query("select rotas.*, usuario.login, usuario.coordenador from rotas INNER JOIN usuario ON rotas.login=usuario.login where usuario.coordenador LIKE '$user' AND usuario.coordenador!='' AND rotas.lista LIKE '$pega_lista' AND rotas.rota LIKE '$pega_rota' AND rotas.status=2 AND rotas.classificacao!='I'");
	
	$query_total_a =  mysql_query("select rotas.*, usuario.login, usuario.coordenador from rotas INNER JOIN usuario ON rotas.login=usuario.login where usuario.coordenador LIKE '$user' AND usuario.coordenador!='' AND rotas.lista LIKE '$pega_lista' AND rotas.rota LIKE '$pega_rota' AND rotas.status=3 AND rotas.classificacao!='I'");
	
	$query_total_pe =  mysql_query("select rotas.*, usuario.login, usuario.coordenador from rotas INNER JOIN usuario ON rotas.login=usuario.login where usuario.coordenador LIKE '$user' AND usuario.coordenador!='' AND rotas.lista LIKE '$pega_lista' AND rotas.rota LIKE '$pega_rota' AND rotas.status=0 AND rotas.classificacao!='I'");
	
	
	$pega_todos = mysql_num_rows($query_total);
	$pega_todos_p = mysql_num_rows($query_total_p);
	$pega_todos_n = mysql_num_rows($query_total_n);
	$pega_todos_a = mysql_num_rows($query_total_a);
	$pega_todos_pe = mysql_num_rows($query_total_pe);
	$conta_eficiencia2 = number_format($pega_todos_p* 100 / $pega_todos, 2) . "%";
	
	?>
    <table  width="100%" border="0" cellspacing="0" cellpadding="0" class="bordasimples">
    <tr>
    <td bgcolor="#FFFFFF" style="color:#000000; font-weight:bold" width="10%">TOTAL GERAL</td>   
    <td width="85%">
    
    <table width="100%" border="0" cellspacing="0" cellpadding="0" style="padding:0px;">

    <tr align="center">
      <td bgcolor="#589bd4" style="color:#FFFFFF">USUÁRIOS</td>
      <td bgcolor="#589bd4" style="color:#FFFFFF">VISITAS</td>
      <td bgcolor="#5cbc69" style="color:#FFFFFF">POSITIVADOS</td>
      <td bgcolor="#C00" style="color:#FFFFFF">NEGATIVADOS</td>
      <td bgcolor="#000000" style="color:#FFFFFF">ALERTAS</td>
      <td bgcolor="#F90" style="color:#FFFFFF">PENDENTES</td>
      <td bgcolor="#589bd4" style="color:#FFFFFF">EFICIÊNCIA</td>
    </tr>
   <tr align="center"  bgcolor="#5cbc69" style="color:#FFFFFF; font:arial; font-size:12px">
      <td></td>
      <td><?php echo $pega_todos; ?></td>
	  <td><?php echo $pega_todos_p; ?></td>
  	  <td><?php echo $pega_todos_n; ?></td>
   	  <td><?php echo $pega_todos_a; ?></td>
      <td><?php echo $pega_todos_pe; ?></td>    
      <td><?php echo $conta_eficiencia2; ?></td>
    </tr>

      </table>

    
    </td>
    </tr>
    </table>
       <?php


	$query_grafico = mysql_query("select rotas.* from rotas INNER JOIN usuario ON rotas.login=usuario.login where usuario.coordenador!='' AND usuario.coordenador LIKE '$user' AND rotas.classificacao!='I' group by rotas.login");	
	$pega_grafico = mysql_num_rows($query_grafico);
	$array_ocorrencias = array();
	$array_valores = array();
	
	while($row_x = mysql_fetch_array($query_grafico)){
		
	$nome_dc = $row_x['login'];
	array_push($array_ocorrencias, $nome_dc);
	
	
	$query_valores =  mysql_query("select * from rotas where login='$nome_dc' AND rotas.lista LIKE '$pega_lista' AND rotas.rota LIKE '$pega_rota' AND rotas.classificacao!='I'");	
	$pega_valores = mysql_num_rows($query_valores);
	
	$query_valores2 =  mysql_query("select * from rotas where login='$nome_dc' AND rotas.lista LIKE '$pega_lista' AND rotas.rota LIKE '$pega_rota' AND rotas.status=1 AND rotas.classificacao!='I'");	
	$pega_valores2 = mysql_num_rows($query_valores2);
	
		
		
		$conta_eficiencia_grafico = number_format($pega_valores2 * 100 / $pega_valores, 2);
		//echo $conta_eficiencia_grafico . "<br>";
		array_push($array_valores, $conta_eficiencia_grafico);
	//	echo $nome_dc;
	}
	


	$query_grafico1 = mysql_query("select rotas.* from rotas INNER JOIN usuario ON rotas.login=usuario.login where usuario.coordenador!='' AND usuario.coordenador LIKE '$user' AND rotas.classificacao!='I' group by rotas.login");	
	$pega_grafico1 = mysql_num_rows($query_grafico1);
	$array_ocorrencias1 = array();
	$array_valores1 = array();
	
	
	while($row_x1 = mysql_fetch_array($query_grafico1)){
		
	$nome_dc1 = $row_x1['login'];
	array_push($array_ocorrencias1, $nome_dc1);
	
	
	$query_valores1 =  mysql_query("select * from rotas where login='$nome_dc1' AND rotas.lista LIKE '$pega_lista' AND rotas.rota LIKE '$pega_rota' AND rotas.status=1 AND rotas.classificacao!='I'");	
	$pega_valores1 = mysql_num_rows($query_valores1);
	
	$query_valores21 =  mysql_query("select * from rotas where login='$nome_dc1' AND rotas.lista LIKE '$pega_lista' AND rotas.rota LIKE '$pega_rota' AND rotas.status=1 AND ce=1 AND rotas.classificacao!='I'");	
	$pega_valores21 = mysql_num_rows($query_valores21);
	
		
		
		$conta_eficiencia_grafico1 = number_format($pega_valores21 * 100 / $pega_valores1, 2);
		//echo $conta_eficiencia_grafico . "<br>";
		array_push($array_valores1, $conta_eficiencia_grafico1);
		//echo $conta_eficiencia_grafico1;
		
	}
	
	
	
		
	///GRAFICO////////
		
$lineChart = new gLineChart(800,320);
$lineChart->addDataSet($array_valores);
$lineChart->addDataSet($array_valores1);
$lineChart->addDataSet(array('80', '80'));

$lineChart->setLegend(array("Check-In", "Cerca eletrônica", "Target"));
$lineChart->setColors(array("2867b1", "5cbc69", "FF0000"));
$lineChart->setVisibleAxes(array('x','y'));
$lineChart->setDataRange(0,100);
$lineChart->addAxisLabel(0,array($array_ocorrencias));
$lineChart->addLineFill('B','2867b1',0,0);
$lineChart->setLegendPosition('rv');
$lineChart->setProperty('chma', '0,0,0,0|0,0');

//$lineChart->setProperty('chem', 'y;s=bubble_texts_big;d=bbtl,FFFFFF,000000,ANGELO;dp=2;ds=0|y;s=bubble_texts_big;d=bb,FFFFFF,000000,GILMAR;dp=5;ds=0');
$lineChart->setTitle("EFICIÊNCIA POR USUÁRIO");
$lineChart->setGridLines($array_ocorrencias,10);
//$lineChart->setProperty('chm', 'V,3399CC,0,0,1.0'|'V,3399CC,0,1,1.0'|'V,3399CC,0,7,1.0');
//$lineChart->setProperty('chxl', '2:|min|average|max');
//$lineChart->setProperty('chxs', '2,0000dd,13,-1,t,FF0000');
//$lineChart->setProperty('chm', 'b,FF0000,1,2,0|b,FF0000,1,2,0|');

?>


<?php
$conta_eficiencia_soma = number_format($pega_todos_p* 100 / $pega_todos, 2);
$conta_soma = 100 - $conta_eficiencia_soma;

$txt_efetivado = "Efetivado(" . $conta_eficiencia_soma . "%)";
$txt_nao_efetivado = "Não efetivado(" . $conta_soma . "%)";

$pie3dChart = new gPie3DChart(300, 300);
$pie3dChart->addDataSet(array($conta_soma,$conta_eficiencia_soma));
$pie3dChart->setLegend(array($txt_nao_efetivado, $txt_efetivado));
//$pie3dChart->setLabels(array("Total de visitas", "Eficiência"));
$pie3dChart->setColors(array("2867b1", "5cbc69"));
$pie3dChart->setTitle("TOTAL GERAL DE EFICIÊNCIA"); 
$pie3dChart->setLegendPosition('bv');

?>

    <script type="text/javascript"
    src="https://www.gstatic.com/charts/loader.js"></script>
  <script type="text/javascript">
    google.charts.load('current', {packages: ['charteditor']});
  </script>
  <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['NÃO EFETIVADO', 'EFETIVADO'],
          ['EFETIVADO', <?php echo $conta_eficiencia_soma;?>],
          ['NÃO EFETIVADO', <?php echo $conta_soma;?>],
        ]);

        var options = {
          //title: 'TOTAL GERAL DE EFICIÊNCIA',
		  colors: ['#2867b1','#5cbc69'],
		 
          pieSliceTextStyle: {
          color: 'white',
		  animation: {"startup": true}
          },
		 
          legend: { position: 'top', maxLines: 3, alignment: 'start', textStyle: { fontSize: 10}, maxLines: 3},
		   titleTextStyle: {fontSize: 10, fontName: 'Arial', position: 'center'},
		  // title: 'EFICIÊNCIA POR USUÁRIO',
		    isStacked: true,
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>



  
  
   <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
      
		 var data = google.visualization.arrayToDataTable([

 		['USUÁRIOS','CHECK-IN','CERCA ELETRÔNICA'],
 		<?php
		 $query_x = "SELECT login, count(status) AS count FROM rotas where status=1 GROUP BY login";
 		 $rs_x = mysql_query($query_x);
		 //$num_rows = 0;
		 
 		 while($row_x = mysql_fetch_array($rs_x)){
			 $log = $row_x['login'];
			//echo $log;
		 $query_y = mysql_query("SELECT * FROM rotas where login='$log' AND ce=1");
		// $query_y = mysql_query($query_y);
		// $dados = mysql_fetch_array($query_y);
		 $num_rows = mysql_num_rows($query_y);
		// echo $num_rows;
		 
		 
 		 echo "['".$row_x['login']."',".$row_x['count'].",". $num_rows."],";
	   	 }
 ?>
 ]);
 

        var options = {
		  hAxis: {title: '',textStyle: { fontSize: 10 }},
          vAxis: {minValue: 0,textStyle: { fontSize: 10 }},
		  colors: ['#2867b1','#5cbc69'],
          pointSize: 10,
		 legend: { position: 'top', maxLines: 3, alignment: 'top', textStyle: { fontSize: 10 }},
	      pointShape: { type: 'square'},
		 
		  // This line makes the entire category's tooltip active.
   		  tooltip: {isHtml: true, textStyle: { fontName: 'Arial', fontSize: 10}}
        };

        var chart = new google.visualization.AreaChart(document.getElementById('chart_div'));
        chart.draw(data, options);
      }
    </script>



</body>
</html>


