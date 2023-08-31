<?php
namespace gchart;
#ini_set('display_errors','1');
include ('session.php');
include ('conecta.php');
ini_set('max_execution_time',12000); 
?>
<!DOCTYPE html><html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="refresh" content="300">

<title>::. MONITORAMENTO .:: CADD</title>
    <link rel="stylesheet" type="text/css" href="css/menu.css">
	<link rel="stylesheet" type="text/css" href="css/step5.css">
    <link rel="shortcut icon" href="imgs/favicon.ico" >
 	<link rel="icon" type="image/gif" href="imgs/animated_favicon1.gif" >
             <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		<script src="js/jquery.min.js"></script>
		<script src="js/chartphp.js"></script>
    <link rel="stylesheet" href="js/chartphp.css">
    
    
<script language="javascript">

  		
function openNav() {
  document.getElementById("mySidenav").style.width = "370px";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
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
</script>
</head>
<div class="jquery-waiting-base-container">
<body>

 
</div>
<div id="div_titulo">
	  	<table width="100%" border="0" cellpadding="0" cellspacing="0">
    <tr>

     	   <td align="left" valign="middle"><font size="3">GRÁFICOS DE RESULTADOS</font></td>
     
		
    </tr>
</table>

	</div>
<?php
require_once(__DIR__ . "/gchart/gChartInit.php");


include ('base_cad_n.php'); 


if($_GET["id_lista"]!=''){
$pega_lista = $_GET["id_lista"];
} else {
	$pega_lista = '%%';
}

if($user==$logado){
$user = '%%';
}


if($_GET["id_login"]!=''){
$pega_login = $_GET["id_login"];
} else{
$pega_login = '%%';
}
//echo $pega_login;

if($_GET["id_rota"]!=''){
$pega_rota = $_GET["id_rota"];
}
else{
$pega_rota = '%%';
}

if($_GET["id_login"]=='' AND $_GET["id_lista"]=='' AND $_GET["id_rota"]==''){
   $pega_login ="";
   $pega_lista ="";
   $pega_rota ="";

}


?>

<div id="mySidenav" class="sidenav">

<div class="div" id="div" name="div">



<br><br>
	<br><br>
  

    
    <table width="100%" border="0" cellpadding="0" cellspacing="0" align="left" style="padding-top: 25px; padding-bottom: 8px; width:100%" >
    <form name='theForm' id='theForm'>
		<tr>
			
	
            <td align="left" valign="middle" nowrap="nowrap" style="width:350px;color:#000000;">
           
            <strong><font size="4">&nbsp;FILTRAR</font></strong>
            </td>
	   </tr>
    </table>
 
   <hr size = 1 width = '86px' color="#DCDCDC">
    <br>
		<table border="0" width="350px" cellpadding="0" cellspacing="0" style="text-align: left; padding-left:20px; padding-right:30px;" class="tabela">
            <tr height="45px">

    <td nowrap="nowrap">
    
<font size="2" style="text-align: left"><strong>LOGIN</strong></font>

    </td>
    </tr>
    <tr>

    <td nowrap="nowrap">

    <select name="id_login" style="width:100%">
  <option value="">LOGIN</option>
  <?php 

//USUARIO NIVEL 4

$seleciona_remetente = mysql_query("Select remetente from usuario where login='$user'");


$dados = mysql_fetch_array($seleciona_remetente);
$remetente= $dados['remetente'];


if($nivel_acesso!=4){

  $query3 = "select login from usuario where nivel=2 or nivel=0 order by login";
} else {

  $query3 = "select login from rotas where remetente='$remetente' and login!='REMONTAR' group by login";


}
			
	
	//$query3 = "SELECT usuario.login FROM rastro INNER JOIN usuario ON rastro.login = usuario.login GROUP BY usuario.login, usuario.nivel HAVING (((usuario.nivel)=2) OR ((usuario.nivel)=3)) INNER JOIN rotas ON rastro.login=rotas.login GROUP BY rotas.login, rotas.coordenador HAVING (((usuario.coordenador)=$user))";
	
	//$query3 = "SELECT Rastro.login, Usuario.nivel, Rotas.coordenador FROM Rastro INNER JOIN (Usuario INNER JOIN Rotas ON Usuario.login = Rotas.login) ON Rastro.login = Usuario.login GROUP BY Rastro.login, Usuario.nivel, Rotas.coordenador HAVING (((Usuario.nivel)<>'1'))";
	
	
									
	$rs3 = mysql_query($query3);
	while($row3 = mysql_fetch_array($rs3)){
	$id_login = $row3["login"];
	?>
    
    <?php 
	if ($pega_login== $id_login){
	?>
    <option selected value="<?= $id_login ?>"><?= strtoupper($id_login) ?></option>
    <?php }
	
	else {
		?>
    <option value="<?= $id_login ?>"><?= strtoupper($id_login) ?></option>
    <?php
		}
    ?>
    <?php
	}
  ?>
  </select>	
</td>
    
    <tr  height="45px">

    <td nowrap="nowrap">
  
    <font size="2"><strong>LISTA</strong></font>
  
    </td>
    </tr>
    <tr>

     
<td width="100%" valign="middle">
  
  
  
<select name="id_lista" style="width:100%">
        <option value="">LISTA</option>
        <?php 

        
if($nivel_acesso!=4){

  $query_lista = "select rotas.lista from rotas INNER JOIN usuario ON usuario.login=rotas.login GROUP BY rotas.lista order by rotas.id DESC";				
} else {

  $query_lista = "select DISTINCT id_lista, lista from rotas where site=1 and remetente='$remetente' order by id DESC";


}
							
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
</tr>
<tr  height="45px">

<td nowrap="nowrap">

<font size="2"><strong>ROTA</strong></font>

</td>
</tr>
<tr>

 
<td width="100%" valign="middle">


<select name="id_rota" style="width:100%">
        <option value="">ROTA</option>
        <?php 
    $query3 = "select * from rotas where rotas.login LIKE '$pega_login' AND rotas.lista LIKE '$pega_lista' GROUP BY rotas.rota order by rotas.statusrota, rotas.rota ASC";															
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
</tr>
<tr height="95px">
        <td width="100%" valign="middle"><input type="submit" value="APLICAR FILTRO"></td>  
      
        </tr>
    </table>

  
  <br><br><hr size = 1 width = '350px' color="#d3d5d6" style="height: 2px;">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times; </a>
	




</div>

</div>


<div id="interna">

<br><br><br>
<table border="0" style="height: 70px; padding-left:0px; color:#000000;"  cellpadding="0" cellspacing="0">
<tr>
    <td  align="left" nowrap="nowrap">
    <i class="material-icons" style="font-size:28px">find_replace</i>
    </td>
    <td valign="button">
    <font size="4"><strong>&nbsp;FILTRADO POR &#8226; </strong><span style="color: #000000"><strong>LOGIN: </strong> <?php echo $pega_login; ?></span><span style="color: #000000"><strong> &#8226; LISTA: </strong><?php echo $pega_lista; ?></span><span style="color: #000000"><strong> &#8226; ROTA:</strong><?php echo $pega_rota; ?></span></font>
    
    </td>
   
</tr>
<tr style="height: 25px;vertical-align: top">
<td colspan="2"><hr style="border: none; width:100%;" color="#DCDCDC"></td>
</tr>
</table>
<br>
<div id="dashboard">

<?php

if($nivel_acesso!=4){


//////////PESQUISA PIZZA /////////////
 
$query_pizza_todos = "select rotas.* from rotas where rotas.login LIKE '$pega_login' AND rotas.lista LIKE '$pega_lista' AND rotas.rota LIKE '$pega_rota'";														
$rs_pizza_todos = mysql_query($query_pizza_todos);
$num_rows_pizza_todos = mysql_num_rows($rs_pizza_todos);


$query_pizza1 = "select rotas.* from rotas where rotas.status=1 AND rotas.login LIKE '$pega_login' AND rotas.lista LIKE '$pega_lista' AND rotas.rota LIKE '$pega_rota'";													
$rs_pizza1 = mysql_query($query_pizza1);
$num_rows_pizza1 = mysql_num_rows($rs_pizza1);
$num_rows_pizza1_conta = "Positivados - " . $num_rows_pizza1 . " visitas - (" . number_format(($num_rows_pizza1/$num_rows_pizza_todos)*100, 1) . "%)";

$query_pizza2 = "select rotas.* from rotas where  rotas.status=2 AND rotas.login LIKE '$pega_login' AND rotas.lista LIKE '$pega_lista' AND rotas.rota LIKE '$pega_rota'";															
$rs_pizza2 = mysql_query($query_pizza2);
$num_rows_pizza2 = mysql_num_rows($rs_pizza2);
$num_rows_pizza2_conta = "Negativados - " . $num_rows_pizza2 . " visitas - (" . number_format(($num_rows_pizza2/$num_rows_pizza_todos)*100, 1) . "%)";


$query_pizza3 = "select rotas.* from rotas where rotas.status=0 AND rotas.login LIKE '$pega_login' AND rotas.lista LIKE '$pega_lista' AND rotas.rota LIKE '$pega_rota'";															
$rs_pizza3 = mysql_query($query_pizza3);
$num_rows_pizza3 = mysql_num_rows($rs_pizza3);
$num_rows_pizza3_conta = "Pendentes - " . $num_rows_pizza3 . " visitas - (" . number_format(($num_rows_pizza3/$num_rows_pizza_todos)*100, 1) . "%)";

$query_pizza4 = "select rotas.* from rotas where rotas.status=3 AND rotas.login LIKE '$pega_login' AND rotas.lista LIKE '$pega_lista' AND rotas.rota LIKE '$pega_rota'";														
$rs_pizza4 = mysql_query($query_pizza4);
$num_rows_pizza4 = mysql_num_rows($rs_pizza4);
$num_rows_pizza4_conta = "Alertas - " . $num_rows_pizza4 . " visitas - (" . number_format(($num_rows_pizza4/$num_rows_pizza_todos)*100, 1) . "%)";




} else {


  
  
//////////PESQUISA PIZZA /////////////


$query_pizza_todos = "select rotas.* from rotas where rotas.login LIKE '$pega_login' AND rotas.lista LIKE '$pega_lista' AND rotas.rota LIKE '$pega_rota' AND rotas.remetente='$remetente'";														
$rs_pizza_todos = mysql_query($query_pizza_todos);
$num_rows_pizza_todos = mysql_num_rows($rs_pizza_todos);

$query_pizza1 = "select rotas.* from rotas where rotas.status=1 AND rotas.login LIKE '$pega_login' AND rotas.lista LIKE '$pega_lista' AND rotas.rota LIKE '$pega_rota' AND rotas.remetente='$remetente'";													
$rs_pizza1 = mysql_query($query_pizza1);
$num_rows_pizza1 = mysql_num_rows($rs_pizza1);
$num_rows_pizza1_conta = "Positivados - " . $num_rows_pizza1 . " visitas - (" . number_format(($num_rows_pizza1/$num_rows_pizza_todos)*100, 1) . "%)";

$query_pizza2 = "select rotas.* from rotas where  rotas.status=2 AND rotas.login LIKE '$pega_login' AND rotas.lista LIKE '$pega_lista' AND rotas.rota LIKE '$pega_rota' AND rotas.remetente='$remetente'";															
$rs_pizza2 = mysql_query($query_pizza2);
$num_rows_pizza2 = mysql_num_rows($rs_pizza2);
$num_rows_pizza2_conta = "Negativados - " . $num_rows_pizza2 . " visitas - (" . number_format(($num_rows_pizza2/$num_rows_pizza_todos)*100, 1) . "%)";


$query_pizza3 = "select rotas.* from rotas where rotas.status=0 AND rotas.login LIKE '$pega_login' AND rotas.lista LIKE '$pega_lista' AND rotas.rota LIKE '$pega_rota' AND rotas.remetente='$remetente'";															
$rs_pizza3 = mysql_query($query_pizza3);
$num_rows_pizza3 = mysql_num_rows($rs_pizza3);
$num_rows_pizza3_conta = "Pendentes - " . $num_rows_pizza3 . " visitas - (" . number_format(($num_rows_pizza3/$num_rows_pizza_todos)*100, 1) . "%)";

$query_pizza4 = "select rotas.* from rotas where rotas.status=3 AND rotas.login LIKE '$pega_login' AND rotas.lista LIKE '$pega_lista' AND rotas.rota LIKE '$pega_rota' AND rotas.remetente='$remetente'";														
$rs_pizza4 = mysql_query($query_pizza4);
$num_rows_pizza4 = mysql_num_rows($rs_pizza4);
$num_rows_pizza4_conta = "Alertas - " . $num_rows_pizza4 . " visitas - (" . number_format(($num_rows_pizza4/$num_rows_pizza_todos)*100, 1) . "%)";


}


?>



<div id="categoria1">
<div id="cat_text">Total Geral</div>

<div id="cat1"><?php echo $num_rows_pizza1+$num_rows_pizza2+$num_rows_pizza3+$num_rows_pizza4; ?></div>

</div>
<div id="categoria2">
<div id="cat_text1">Pendentes</div>
<div id="cat2"><?php echo $num_rows_pizza3; ?></div>
</div>
<div id="negativados1">
<div id="neg_text">Total</div>
<div id="neg_icon">NEGATIVADOS</div>
<div id="neg1"><?php echo $num_rows_pizza2; ?></div>
</div>
<div id="positivados1">
<div id="pos_text">Total</div>
<div id="pos_icon">POSITIVADOS</div>
<div id="pos1"><?php echo $num_rows_pizza1; ?></div>
</div>
<div id="alertas1">
<div id="ale_text">Total</div>
<div id="ale_icon">ALERTAS</div>
<div id="ale1"><?php echo $num_rows_pizza4; ?></div>
</div>


<div id="categoria">
<script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
		  
  		var data = google.visualization.arrayToDataTable([
          ['CATEGORIA', 'RESULTADO'],
          ['POSITIVADO', <?php echo $num_rows_pizza1;?>],
          ['NEGATIVADO', <?php echo $num_rows_pizza2;?>],
		  ['PENDENTES', <?php echo $num_rows_pizza3;?>],
		  ['ALERTAS', <?php echo $num_rows_pizza4;?>],
		  
        ]);


        var options = {
          //title: 'TOTAL GERAL DE EFICIÊNCIA',
		  pieHole: 0.4,
		  colors: ["#409900", "#cc0000", "#ff9900", "#000000"],
		  chartArea: { width: '30%', height: '100%', top: '10', left: '10', right: '10', bottom: '10'},
          pieSliceTextStyle: {
          color: 'white',
		  animation: {"startup": true}
          },
		 
          legend: { position: 'right', alignment: 'center', textStyle: { fontSize: 9}, maxLines: 1},
		  pointSize: 5,
		   titleTextStyle: {fontSize: 9, fontName: 'Arial', position: 'center'},
		 //  title: 'CATEGORIAS',
		    isStacked: true,
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>


<div id="piechart"  style="width: 100%; height: 100%;"></div>

</div>
<div id="negativados">

<?php

$query = "select * from ocorrencia where status=2";					
$rs = mysql_query($query);
$num_rows = mysql_num_rows($rs);



///NEGATIVOS TODOS


if($nivel_acesso!=4){

  $query_negativos_todos =  mysql_query("select rotas.* from rotas where rotas.status=2 AND rotas.login LIKE '$pega_login' AND rotas.lista LIKE '$pega_lista' AND rotas.rota LIKE '$pega_rota'");															
  $num_rows_negativos_todos = mysql_num_rows($query_negativos_todos);

} else {

  $query_negativos_todos =  mysql_query("select rotas.* from rotas where rotas.status=2 AND rotas.login LIKE '$pega_login' AND rotas.lista LIKE '$pega_lista' AND rotas.rota LIKE '$pega_rota' AND rotas.remetente='$remetente'");															
  $num_rows_negativos_todos = mysql_num_rows($query_negativos_todos);

}

//echo $num_rows_negativos_todos;
$array_ocorrencias = array();
$array_conta = array();
?>
  <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
		  
  		var data = google.visualization.arrayToDataTable([
          ['NEGATIVADOS', 'RESULTADO'],
<?php
//echo $num_rows_negativos_todos;
//if($num_rows_negativos_todos!=0){
	
while($row = mysql_fetch_array($rs)){

$titulos = $row['ocorrencia'];
$titulos_id = $row['id'];

///NEGATIVOS ESCOLHIDOS

if($nivel_acesso!=4){

  $query_negativos =  mysql_query("select rotas.* from rotas where rotas.ocorrencia='$titulos_id' AND rotas.status=2 AND rotas.login LIKE '$pega_login' AND rotas.lista LIKE '$pega_lista' AND rotas.rota LIKE '$pega_rota'");															
  $num_rows_negativos = mysql_num_rows($query_negativos);

} else {

  $query_negativos =  mysql_query("select rotas.* from rotas where rotas.ocorrencia='$titulos_id' AND rotas.status=2 AND rotas.login LIKE '$pega_login' AND rotas.lista LIKE '$pega_lista' AND rotas.rota LIKE '$pega_rota' AND rotas.remetente='$remetente'");															
  $num_rows_negativos = mysql_num_rows($query_negativos);
  
}


$xxx = number_format(($num_rows_negativos/$num_rows_negativos_todos)*100, 1);
//echo $xxx . "<br>";


array_push($array_conta, $xxx);
$titulos_ok = $titulos . ' (' . number_format(($num_rows_negativos/$num_rows_negativos_todos)*100, 1) . "%)";
array_push($array_ocorrencias, $titulos_ok);

 echo "['".$titulos."',".$num_rows_negativos. "],";
//echo $titulos . "-" . $xxx . "<br>";

}
 ?>
 ]);

        var options = {
          //title: 'TOTAL GERAL DE EFICIÊNCIA',
		  pieHole: 0.4,
		  colors: ["#ac1212", "#cc0000", "#d21515","#db3a3a","#e04c4c", "#e25e5e", "#e47070", "#e88585", "#eb9393", "#f2b1b1", "#f5c7c7", "#fadada", "#feefef"],
	
		  chartArea: { width: '30%', height: '100%', top: '10', left: '10', right: '10', bottom: '10'},
          pieSliceTextStyle: {
          color: 'white',
		 
          },
		
          legend: { position: 'right', alignment: 'center', textStyle: { fontSize: 9}, maxLines: 1},
		  pointSize: 5,
		   titleTextStyle: {fontSize: 9, fontName: 'Arial', position: 'center'},
		  // title: 'EFICIÊNCIA POR USUÁRIO',
		    isStacked: true,
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart1'));

        chart.draw(data, options);
      }
    </script>
    

<?php	
//} 
?>


<div id="piechart1" style="width: 100%; height: 100%;"></div>

</div>
<div id="positivados">
<?php

$query1 = "select * from ocorrencia where status=1";															
$rs1= mysql_query($query1);

$array_ocorrencias1 = array();
$array_conta1 = array();

///POSITIVOS TODOS

if($nivel_acesso!=4){

  $query_positivos_todos =  mysql_query("select rotas.* from rotas where rotas.status=1 AND rotas.login LIKE '$pega_login' AND rotas.lista LIKE '$pega_lista' AND rotas.rota LIKE '$pega_rota'");															
  $num_rows_positivos_todos = mysql_num_rows($query_positivos_todos);
} else {


  $query_positivos_todos =  mysql_query("select rotas.* from rotas where rotas.status=1 AND rotas.login LIKE '$pega_login' AND rotas.lista LIKE '$pega_lista' AND rotas.rota LIKE '$pega_rota' AND rotas.remetente='$remetente'");															
  $num_rows_positivos_todos = mysql_num_rows($query_positivos_todos);
}

//echo $num_rows_positivos_todos;

?>
 <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
		  
  		var data = google.visualization.arrayToDataTable([
          ['POSITIVADOS', 'RESULTADO'],
		  
<?php
//if($num_rows_positivos_todos!=0){

while($row1 = mysql_fetch_array($rs1)){

$titulos1 = $row1['ocorrencia'];
$titulos1_id = $row1['id'];

///POSITIVOS ESCOLHIDOS

if($nivel_acesso!=4){

$query_positivos =  mysql_query("select rotas.* from rotas where rotas.ocorrencia='$titulos1_id' AND rotas.status=1 AND rotas.login LIKE '$pega_login' AND rotas.lista LIKE '$pega_lista' AND rotas.rota LIKE '$pega_rota'");															
$num_rows_positivos = mysql_num_rows($query_positivos);
} else {


  $query_positivos =  mysql_query("select rotas.* from rotas where rotas.ocorrencia='$titulos1_id' AND rotas.status=1 AND rotas.login LIKE '$pega_login' AND rotas.lista LIKE '$pega_lista' AND rotas.rota LIKE '$pega_rota' AND rotas.remetente='$remetente'");															
  $num_rows_positivos = mysql_num_rows($query_positivos);

}


$zzz = number_format(($num_rows_positivos/$num_rows_positivos_todos)*100, 1);
//echo $xxx . "<br>";

array_push($array_conta1, $zzz);
$titulos1_ok = $titulos1 . ' (' . number_format(($num_rows_positivos/$num_rows_positivos_todos)*100, 1) . "%)";
array_push($array_ocorrencias1, $titulos1_ok);

 echo "['".$titulos1."',".$num_rows_positivos. "],";
 
 
}
 ?>
 ]);
 
   var options = {
          //title: 'TOTAL GERAL DE EFICIÊNCIA',
		  pieHole: 0.4,
		  colors: ["#409900", "#48a306", "#55b013", "#63be22", "#7acf3d", "#8bdb52", "#98e262", "#a9ea7a", "#b9f290", "#c8f8a5", "#d8fabf", "#e9fbdb", "#f3fcec", "#eaf0e6", "#c7d8bb"],
		  chartArea: { width: '30%', height: '100%', top: '10', left: '10', right: '10', bottom: '10'},
          pieSliceTextStyle: {
          color: 'white',
		
          },
		  
          legend: { position: 'right', alignment: 'center', textStyle: { fontSize: 9}, maxLines: 6},
		  pointSize: 5,
		 //  title: 'POSITIVADOS',
		   titleTextStyle: {fontSize: 10, fontName: 'Arial', position: 'center'},
		 
		    isStacked: true,
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart2'));

        chart.draw(data, options);
      }
    </script>

<?php
//}
?>

<div id="piechart2" style="width: 100%; height: 100%;"></div>


</div>
<div id="alertas">

<?php

$query2 = "select * from ocorrencia where status=3";															
$rs2= mysql_query($query2);
//$num_rows = mysql_num_rows($rs);
$array_ocorrencias2 = array();
$array_conta2 = array();

///ALERTAS TODOS

if($nivel_acesso!=4){

  $query_alertas_todos =  mysql_query("select rotas.* from rotas where rotas.status=3 AND rotas.login LIKE '$pega_login' AND rotas.lista LIKE '$pega_lista' AND rotas.rota LIKE '$pega_rota'");															
  $num_rows_alertas_todos = mysql_num_rows($query_alertas_todos);
  } else {
  
    $query_alertas_todos =  mysql_query("select rotas.* from rotas where rotas.status=3 AND rotas.login LIKE '$pega_login' AND rotas.lista LIKE '$pega_lista' AND rotas.rota LIKE '$pega_rota' AND rotas.remetente='$remetente'");															
    $num_rows_alertas_todos = mysql_num_rows($query_alertas_todos);
  
  }




?>
 <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
		  
  		var data = google.visualization.arrayToDataTable([
          ['ALERTAS', 'RESULTADO'],
		  
<?php

//if($num_rows_alertas_todos!=0){
	

while($row2 = mysql_fetch_array($rs2)){

$titulos2 = $row2['ocorrencia'];
$titulos2_id = $row2['id'];

///ALERTAS ESCOLHIDOS
//$query_alertas =  mysql_query("select * from rotas where ocorrencia='$titulos2' and status=3");		
if($nivel_acesso!=4){

  $query_alertas =  mysql_query("select rotas.* from rotas where rotas.ocorrencia='$titulos2_id' AND rotas.status=3 AND rotas.login LIKE '$pega_login' AND rotas.lista LIKE '$pega_lista' AND rotas.rota LIKE '$pega_rota'");														
  $num_rows_alertas = mysql_num_rows($query_alertas);
  
  } else {
  
    $query_alertas =  mysql_query("select rotas.* from rotas where rotas.ocorrencia='$titulos2_id' AND rotas.status=3 AND rotas.login LIKE '$pega_login' AND rotas.lista LIKE '$pega_lista' AND rotas.rota LIKE '$pega_rota' AND rotas.remetente='$remetente'");														
    $num_rows_alertas = mysql_num_rows($query_alertas);
    
  }


//echo $num_rows_alertas . "<br>";


$yyy = number_format(($num_rows_alertas/$num_rows_alertas_todos)*100, 1);
//echo $xxx . "<br>";

array_push($array_conta2, $yyy);
$titulos2_ok = $titulos2 . ' (' . number_format(($num_rows_alertas/$num_rows_alertas_todos)*100, 1) . "%)";
array_push($array_ocorrencias2, $titulos2_ok);

echo "['".$titulos2."',".$num_rows_alertas. "],";
}
 ?>
]);
 
   var options = {
          //title: 'TOTAL GERAL DE EFICIÊNCIA',
		  pieHole: 0.4,
		  colors: ["#000000", "#2f2f2f", "#484848", "#616161", "#767676", "#8e8e8d", "#a5a5a5", "#bcbcbc", "#d7d7d7", "#efefef", "#f8f8f8"],
		  chartArea: { width: '30%', height: '100%', top: '10', left: '10', right: '10', bottom: '10'},
          pieSliceTextStyle: {
          color: 'white',
		 
          },
		 
          legend: { position: 'right', alignment: 'center', textStyle: { fontSize: 9}, maxLines: 1},
		  pointSize: 5,
		   titleTextStyle: {fontSize: 10, fontName: 'Arial', position: 'center'},
		  // title: 'EFICIÊNCIA POR USUÁRIO',
		    isStacked: true,
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart3'));

        chart.draw(data, options);
      }
    </script>

<?php
//}

?>

<div id="piechart3" style="width: 100%; height: 100%;"></div>


</div>


<div id="realizados">


  <?php
	   if($nivel_acesso!=4){

      $query_dataformata =  mysql_query("select Max(rotas.id) AS id, DATE_FORMAT(rotas.dth_ocorrencia,'%y-%m-%d') AS data, COUNT(rotas.dth_ocorrencia) AS qto_visitas from rotas where rotas.login LIKE '$pega_login' AND rotas.lista LIKE '$pega_lista' AND rotas.rota LIKE '$pega_rota' AND rotas.dth_ocorrencia!='0000-00-00 00:00:00' group by data order by data ASC");	

     } else {


      $query_dataformata =  mysql_query("select Max(rotas.id) AS id, DATE_FORMAT(rotas.dth_ocorrencia,'%y-%m-%d') AS data, COUNT(rotas.dth_ocorrencia) AS qto_visitas from rotas where rotas.login LIKE '$pega_login' AND rotas.lista LIKE '$pega_lista' AND rotas.rota LIKE '$pega_rota' AND rotas.dth_ocorrencia!='0000-00-00 00:00:00' AND remetente='$remetente' group by data order by data ASC");	

     }
		$array_novinho = array();
		$array_novinho2 = array();
		$um_array = array();	
		
		?>
<script>
google.charts.load('current', {packages: ['corechart', 'bar']});
google.charts.setOnLoadCallback(drawBasic);

function drawBasic() {

      var data = new google.visualization.DataTable();
     // data.addColumn('timeofday', 'Time of Day');
   //  data.addColumn('number', 'Motivation Level');
 var data = google.visualization.arrayToDataTable([


        <?php
		
		$todas_qto_data=0;
		$conta_quantos =0;
		echo "['Data', 'Visitas', { role: 'annotation' } ],";
		
		while($row = mysql_fetch_array($query_dataformata)){
			
			$nome_data = $row['data'];			
			$array=date('d-m-Y', strtotime($nome_data));
	

			$qto_data = $row['qto_visitas'];
			//echo $nome_data. " /////"  . $qto_data .  "<br>";
			array_push($array_novinho, $qto_data);
			array_push($array_novinho2, $array);
			
			// echo "[{v: [" . $qto_data . ", 0, 0], f: '" . $qto_data . "'}, " . $array ."],";
			 echo "[" ."'" . $array . "'" . ", " . $qto_data . ", " . $qto_data . "],";
			
			$todas_qto_data += $qto_data;
			$conta_quantos += 1;
	
		}
		//echo count($array);
		$media_qto_data = number_format($todas_qto_data/$conta_quantos, 2, ',', ' ');
		 ?>
 ]);
      var options = {
		  colors: ["#2867b1"],
		  legend: { position: 'none'},
		  chartArea: { width: '100%', height: '70%', left: '60', right: '60'},
		  
      //  title: 'Motivation Level Throughout the Day',
	   annotations: {
  textStyle: {
  fontName: 'Arial',
  fontSize: 10,
 
  color: '#FFFFFFF',     // The color of the text.
} },
        hAxis: {
			
			textStyle: { fontSize: 10},
  //        title: 'Time of Day',
   //       format: 'h:mm a',
       //   viewWindow: {
//          min: [60, 30, 0],
 //          max: [17, 30, 0]
         //}
       },
        vAxis: {
			textPosition: 'none',
					gridlines: {
        color: 'transparent'
    },
     //    title: 'Rating (scale of 1-10)'
	 	textStyle: { fontSize: 10},
			 viewWindow: {
        min: 0,
        max: <?php echo max($array_novinho); ?>
    }
        }
      };

      var chart = new google.visualization.ColumnChart(
        document.getElementById('chart_div'));

      chart.draw(data, options);
    }
</script> 
 <?php
		$guarda_maior_numero = intval(max($array_novinho));
	
		$divide_1 = $guarda_maior_numero/4;
		$divide_2 = $divide_1 * 2;
	
		

?>
<div id="chart_div" style="height:400px; width:100%"></div>


</div>

<div id="checkin">

<?php

if($nivel_acesso!=4){


  $query_todos =  mysql_query("select rotas.* from rotas  where rotas.login LIKE '$pega_login' AND rotas.lista LIKE '$pega_lista' AND rotas.rota LIKE '$pega_rota'");															
  $num_rows_todos = mysql_num_rows($query_todos);
  
  $query_pendentes =  mysql_query("select rotas.* from rotas  where rotas.status=0 AND rotas.login LIKE '$pega_login' AND rotas.lista LIKE '$pega_lista' AND rotas.rota LIKE '$pega_rota'");															
  $num_rows_pendentes = mysql_num_rows($query_pendentes);
  $guarda_numero1 = $num_rows_pendentes;
  
  $num_rows_pendentes = $num_rows_pendentes/$num_rows_todos*100;
  
  $query_realizados =  mysql_query("select rotas.* from rotas  where rotas.status!=0 AND rotas.login LIKE '$pega_login' AND rotas.lista LIKE '$pega_lista' AND rotas.rota LIKE '$pega_rota'");															
  $num_rows_realizados = mysql_num_rows($query_realizados);
  $guarda_numero = $num_rows_realizados;
  
  $num_rows_realizados = $num_rows_realizados/$num_rows_todos*100;
  
  
  $query_todos1 =  mysql_query("select rotas.* from rotas  where rotas.login LIKE '$pega_login' AND  rotas.lista LIKE '$pega_lista' AND rotas.rota LIKE '$pega_rota'");															
  $num_rows_todos1 = mysql_num_rows($query_todos1);
  
  $query_pendentes1 =  mysql_query("select rotas.* from rotas  where rotas.status!=0 AND rotas.ce=0 AND rotas.login LIKE '$pega_login' AND rotas.lista LIKE '$pega_lista' AND rotas.rota LIKE '$pega_rota'");															
  $num_rows_pendentes1 = mysql_num_rows($query_pendentes1);
  
  
  $guardaae_1 = $num_rows_pendentes1;
  
  
  $query_realizados1 =  mysql_query("select rotas.* from rotas  where rotas.status!=0 AND rotas.ce=1 AND rotas.login LIKE '$pega_login' AND rotas.lista LIKE '$pega_lista' AND rotas.rota LIKE '$pega_rota'");														
  $num_rows_realizados1 = mysql_num_rows($query_realizados1);
  $guardaae = $num_rows_realizados1;
  
  
  } else {

    
$query_todos =  mysql_query("select rotas.* from rotas  where rotas.login LIKE '$pega_login' AND rotas.lista LIKE '$pega_lista' AND rotas.rota LIKE '$pega_rota' AND rotas.remetente='$remetente'");															
$num_rows_todos = mysql_num_rows($query_todos);

$query_pendentes =  mysql_query("select rotas.* from rotas  where rotas.status=0 AND rotas.login LIKE '$pega_login' AND rotas.lista LIKE '$pega_lista' AND rotas.rota LIKE '$pega_rota' AND rotas.remetente='$remetente'");															
$num_rows_pendentes = mysql_num_rows($query_pendentes);
$guarda_numero1 = $num_rows_pendentes;

$num_rows_pendentes = $num_rows_pendentes/$num_rows_todos*100;

$query_realizados =  mysql_query("select rotas.* from rotas  where rotas.status!=0 AND rotas.login LIKE '$pega_login' AND rotas.lista LIKE '$pega_lista' AND rotas.rota LIKE '$pega_rota' AND rotas.remetente='$remetente'");															
$num_rows_realizados = mysql_num_rows($query_realizados);
$guarda_numero = $num_rows_realizados;

$num_rows_realizados = $num_rows_realizados/$num_rows_todos*100;



$query_todos1 =  mysql_query("select rotas.* from rotas  where rotas.login LIKE '$pega_login' AND  rotas.lista LIKE '$pega_lista' AND rotas.rota LIKE '$pega_rota' AND rotas.remetente='$remetente'");															
$num_rows_todos1 = mysql_num_rows($query_todos1);

$query_pendentes1 =  mysql_query("select rotas.* from rotas  where rotas.status!=0 AND rotas.ce=0 AND rotas.login LIKE '$pega_login' AND rotas.lista LIKE '$pega_lista' AND rotas.rota LIKE '$pega_rota' AND rotas.remetente='$remetente'");															
$num_rows_pendentes1 = mysql_num_rows($query_pendentes1);


$guardaae_1 = $num_rows_pendentes1;


$query_realizados1 =  mysql_query("select rotas.* from rotas  where rotas.status!=0 AND rotas.ce=1 AND rotas.login LIKE '$pega_login' AND rotas.lista LIKE '$pega_lista' AND rotas.rota LIKE '$pega_rota' AND rotas.remetente='$remetente'");														
$num_rows_realizados1 = mysql_num_rows($query_realizados1);
$guardaae = $num_rows_realizados1;

  }

?>
 
 <script type="text/javascript">
google.charts.load('current', {packages: ['corechart', 'bar']});
google.charts.setOnLoadCallback(drawStacked);

function drawStacked() {
	      var data = new google.visualization.DataTable();
      var data = google.visualization.arrayToDataTable([
        ['visitas', 'Visitas dentro da cerca', { role: 'annotation' }, 'Visitas fora da cerca', { role: 'annotation' } ],
      
        ['', <?php echo $guardaae; ?>, <?php echo $guardaae; ?>, <?php echo $guardaae_1; ?>, <?php echo $guardaae_1; ?>],
      ]);

      var options = {
  annotations: {
  textStyle: {
  fontName: 'Arial',
  fontSize: 10,
  color: '#FFFFFFF',     // The color of the text.
  
} },
		colors:['#76716D','#3F7DC7'],
		 orientation: 'horizontal',
       // title: 'REALIZADOS X PENDENTES (POR CHECK-IN E POR CERCA ELETRÔNICA)',
         chartArea: { width: '80%', height: '70%', left: '40', right: '40'},
		legend:'none',
       isStacked: 'percent',
        hAxis: {
			textStyle: { fontSize: 10},
	
			// textPosition: 'none',
         // title: 'Total Population',
        //  minValue: 0,
        },
        vAxis: {
			textStyle: { fontSize: 10},	
			textPosition: 'none',
       //   title: 'City'
	   		gridlines: {
        color: 'transparent'
    }
        }
      };
    
	  var chart = new google.visualization.ColumnChart(
        document.getElementById('chart_divX'));

      chart.draw(data, options);
	  
    }
    </script>
   <div id="chart_divX"  style="height:100%; width:100%"></div>
    
</div>



<div id="realizados_numeros"> 
<div id="diaadia"><?php echo $todas_qto_data; ?></div>
<div id="diaadia_text1">Total de Check-in</div>
<div id="diaadia_icon">REALIZADOS POR DIA</div>
<div id="diaadia_text2">Média diária</div>
<div id="diaadia_media"><?php echo $media_qto_data; ?></div>
</div>
<div id="realizados_ck">
<div id="checkin_icon">CERTA ELETRÔNICA</div>

</div>

<div id="ce1">

<?php
	   

	
//$query_km =  mysql_query("SELECT km.login, km.rota, SUM(km.kmplanejado) AS kmpla, SUM(km.kmresultado) AS kmres FROM km INNER JOIN rotas ON km.rota=rotas.rota where rotas.lista LIKE '$pega_lista' AND km.login LIKE '$pega_login' AND km.rota LIKE '$pega_rota' group by km.rota");		


$query_km =  mysql_query("SELECT * FROM km INNER JOIN rotas ON km.rota=rotas.rota INNER JOIN usuario ON usuario.login=km.login where rotas.lista LIKE '$pega_lista' AND km.login LIKE '$pega_login' AND km.rota LIKE '$pega_rota' group by km.rota");		


$guarda_valores1 = array();
$guarda_valores2 = array();
$guarda_rota = array();
$somatudo = 0;
?>

<script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([

<?php


echo "['Rotas', 'Planejados', 'Realizados'],";


while($row_km = mysql_fetch_array($query_km)){	
$rota = $row_km["rota"];

$query_rota =  mysql_query("SELECT SUM(kmresultado) AS resultado, SUM(kmplanejado) AS planejadao from km where rota='$rota' AND login LIKE '$pega_login'");


		while($row_km1 = mysql_fetch_array($query_rota)){
			$realizado = $row_km1["resultado"];
			$soma = $row_km1["planejadao"];
			
			$somatudo += $row_km1["resultado"];
		}

echo "[" ."'" . $rota . "'" . ", " . $soma . ", " . $realizado . "],";

array_push($guarda_valores1, $soma);
array_push($guarda_valores2, $realizado);
array_push($guarda_rota, $rota);

}
//number_format($todas_qto_data/$conta_quantos, 2, ',', ' ');
$media_kms = number_format($somatudo/count($guarda_rota), 2, ',','');;
 ?>
 ]);
 
  <?php

if (max($guarda_valores1) > max($guarda_valores2)){
	$guarda_maior_numero1 = max($guarda_valores1);
} else {
	$guarda_maior_numero1 = max($guarda_valores2);
}
?>

   var options = {
	   
	     chartArea: { width: '80%', height: '100%', left: '60', right: '60', bottom:'60'},
		legend:'none',
       //   title: 'Company Performance',
         hAxis: {
			textStyle: { fontSize: 10},
	
			// textPosition: 'none',
         // title: 'Total Population',
        //  minValue: 0,
        },
        vAxis: {
			textStyle: { fontSize: 10},	
			textPosition: 'none',
       //   title: 'City'
	   		gridlines: {
        color: 'transparent',
		min: 0,
        max: <?php echo $guarda_maior_numero1; ?>
    }
        },
		  colors:['#409900','#2867b1'],
        };

        var chart = new google.visualization.AreaChart(document.getElementById('chart_div_line'));
        chart.draw(data, options);
      }

    </script>
    
     <div id="chart_div_line" style="width: 100%; height: 400px;"></div>
 

</div>
<div id="realizados_ck2">
<div id="checkin_icon">TABELA POR RN</div>
</div>

<div id="realizados_numeros2"> 


<div id="diaadia_icon">REALIZADOS POR REGIÕES DE NEGÓCIO</div>


</div>





<?php

if($nivel_acesso!=4){

  
$query_classe =  mysql_query("select * from rotas INNER JOIN usuario ON rotas.login=usuario.login where rotas.login LIKE '$pega_login' AND rotas.lista LIKE '$pega_lista' AND rotas.rota LIKE '$pega_rota' group by classificacao order by classificacao ASC");
	  
} else {

  $query_classe =  mysql_query("select * from rotas INNER JOIN usuario ON rotas.login=usuario.login where rotas.login LIKE '$pega_login' AND rotas.lista LIKE '$pega_lista' AND rotas.rota LIKE '$pega_rota' AND rotas.remetente='$remetente' group by classificacao order by classificacao ASC");
	  
}
	  
$guarda_classe1 = array();
$guarda_classe2 = array();
$guarda_classe3 = array();

$guarda_zero = array();
$guarda_um = array();
$guarda_dois = array();
$guarda_tres = array();

//$barChart = new gBarChart(1000,300,'g');

$barChart = new gStackedBarChart(1000,300);
?>
<script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawVisualization);

      function drawVisualization() {
        // Some raw data (not necessarily accurate)
        var data = google.visualization.arrayToDataTable([
          ['RN',  'PENDENTES', { role: 'annotation' }, 'POSITIVADOS', { role: 'annotation' },'NEGATIVADOS', { role: 'annotation' },'ALERTAS', { role: 'annotation' }],
<?php

while($row_classe = mysql_fetch_array($query_classe)){
	
$classe = $row_classe['classificacao'];

$query_classe1 =  mysql_query("select * from rotas INNER JOIN usuario ON rotas.login=usuario.login where rotas.classificacao='$classe' AND rotas.login LIKE '$pega_login' AND rotas.lista LIKE '$pega_lista' AND rotas.rota LIKE '$pega_rota'");
$contaae = 0;
$contazero = 0;
$contaum = 0;
$contadois = 0;
$contatres = 0;

if($classe==""){
	$classe = "Sem classificação"; 
}
while($row_classe1 = mysql_fetch_array($query_classe1)){
$contaae++;
$verifica = $row_classe1['status'];

if($verifica==0){
	$contazero++;
}
if($verifica==1){
	$contaum++;
}
if($verifica==2){
	$contadois++;
}
if($verifica==3){
	$contatres++;
}
}

array_push($guarda_classe1, $classe);
array_push($guarda_classe2, $contaae);
//$guarda_tudo = array();


//echo $classe . " - " . $contaae . "<br>";
$junta = "<font size='4px'><strong>" . $classe . "</strong></font><br> " . $contaae . " visitas";
array_push($guarda_classe3, $junta);

array_push($guarda_zero, $contazero);

array_push($guarda_um, $contaum);
array_push($guarda_dois, $contadois);
array_push($guarda_tres, $contatres);


?>

   
<?php

 echo "['" . $classe ."', " . $contazero . ", " . $contazero . ", " . $contaum . ", " . $contaum . ", " . $contadois . ", " . $contadois . ", " . $contatres . ", " . $contatres . "],";
 
 
}
?>
]);

  var options = {
  annotations: {
  textStyle: {
  fontName: 'Arial',
  fontSize: 10,
  color: '#FFFFFFF',     // The color of the text.
  
}
		 },
	  chartArea: { width: '80%', height: '100%', left: '60', right: '60', bottom: '40', top:'30'},
		legend:'none',
		colors: ["#ff9900", "#409900", "#cc0000", "#000000"],
      //title : 'Monthly Coffee Production by Country',
      vAxis: {
			textStyle: { fontSize: 10},	
			textPosition: 'none',
       //   title: 'City'
	   		gridlines: {
       		color: 'transparent',
		  },
	  },
      hAxis: {
			textStyle: { fontSize: 10},	
		
	  },
      seriesType: 'bars',
      series: {5: {type: 'line'}}
    };



       var chart = new google.visualization.ComboChart(document.getElementById('xxx'));
    chart.draw(data, options);
      }
    </script>
   
<div id="checkin2">

<table width="100%" height="100%" border="0" align="center" cellpadding="0" cellspacing="0" class="bordasimples">
  <tbody>
    <tr style="background-color:#579bd3; color:#FFFFFF">
      <td width="20%" height="40">RN</td>
      <td width="20%" style="background-color:#ff9900">PEN</td>
      <td width="20%" style="background-color:#409900">POS</td>
      <td width="20%" style="background-color:#cc0000">NEG</td>
      <td width="20%" style="background-color:#000000">ALT<span style="text-align: center"></span></td>
    </tr> 
	<?php
	 for ($i=0;$i<count($guarda_classe3); $i++) {
	 
	 ?>
     <tr>
    
      <td style="text-align: center;" nowrap><?php echo "<font size='1px'>" . $guarda_classe3[$i] . "</font>" ?></td>
      <td style="text-align: center"><?php echo "<font size='1px'>" . $guarda_zero[$i] . "</font>"; ?></td>
      <td style="text-align: center"><?php echo "<font size='1px'>" . $guarda_um[$i] . "</font>";?></td>
      <td style="text-align: center"><?php echo "<font size='1px'>" . $guarda_dois[$i] . "</font>";?></td>
      <td style="text-align: center"><?php echo "<font size='1px'>" . $guarda_tres[$i] . "</font>"; ?></td>
     
    </tr>   
	<?php
	 }
	 ?>
 </tbody>
</table>


</div>


<div id="ce2">
<div id="xxx" style="width: 100%; height: 100%;"></div>
</div>
<div id="realizados_numeros1"> 
<div id="diaadia"><?php echo $somatudo; ?></div>
<div id="diaadia_text1">Total realizado(km´s)</div>
<div id="diaadia_icon">KM´S POR ROTA</div>
<div id="diaadia_text2">Média diária de realizados(Km´s)</div>
<div id="diaadia_media"><?php echo $media_kms; ?></div>
</div>

<div id="realizados_ck1">
<div id="checkin_icon">PENDENTES X REALIZADOS</div>
</div>

<div id="checkin1">

  <script type="text/javascript">
      google.charts.load('current', {'packages':['gauge']});
      google.charts.setOnLoadCallback(drawChart1);

      function drawChart1() {

        var data = google.visualization.arrayToDataTable([
          ['Label', 'Value'],
         <?php 
		 $todos = $num_rows_pizza1 + $num_rows_pizza2 + $num_rows_pizza3 + $num_rows_pizza4;
		 $media_realizados = ($num_rows_pizza1 + $num_rows_pizza2 + $num_rows_pizza4)/$todos * 100;
		 $media_realizados = round( $media_realizados , 1 );
		 
	//	 $media_pendentes = ($num_rows_pizza3)/$todos * 100;
		 
		 echo "['REALIZADOS(%)', " .  $media_realizados . "],"

?>
      
        ]);

        var options = {
         
		  greenFrom:0, greenTo:100,
          minorTicks: 30,
    
	chartArea: { width: '80%', height: '100%', left: '60', right: '60'},
	
	};

        var chart = new google.visualization.Gauge(document.getElementById('chart_div_rage'));
        chart.draw(data, options);

    
      }
	  
	  
       google.charts.load('current', {'packages':['gauge']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Label', 'Value'],
         <?php 
		 $todos = $num_rows_pizza1 + $num_rows_pizza2 + $num_rows_pizza3 + $num_rows_pizza4;
		 $media_realizados = ($num_rows_pizza1 + $num_rows_pizza2 + $num_rows_pizza4)/$todos * 100;
		 $media_pendentes = ($num_rows_pizza3)/$todos * 100;
		 $media_pendentes = round( $media_pendentes , 1 );
		 echo "['PENDENTES(%)', " .  $media_pendentes . "],"

?>
      
        ]);

        var options = {
         
		  yellowFrom:0, yellowTo:100,
          minorTicks: 30,
    
	chartArea: { width: '80%', height: '100%', left: '60', right: '60'},
	
	};

        var chart = new google.visualization.Gauge(document.getElementById('chart_div_rage1'));
        chart.draw(data, options);

    
      }
    </script>
    
    
         
    
    <table width="100%" height="400px" border="0" cellspacing="0" cellpadding="0">
  <tbody>
    <tr>
      <td width="20%">&nbsp;</td>
      <td width="80%" style="text-align: center; padding-top:20px;"><span style="text-align: center; vertical-align:central"></span><div id="chart_div_rage" style="width: 100%; height: 180px;"></div></td>
    <td width="20%">&nbsp;</td>
    </tr>
    <tr>
      <td width="20%">&nbsp;</td>
      <td width="60%" style="text-align: center; padding-bottom:20px;"><span style="text-align: center; vertical-align:central"></span><div id="chart_div_rage1" style="width: 100%; height: 180px;"></div></td>
      <td  width="20%">&nbsp;</td>
    </tr>
  
  </tbody>
</table>

</div>



<div id="realizados_lunch"> 


<div id="diaadia_icon">HORÁRIO DE ALMOÇO</div>


</div>

<div id="ce_lunch">


  <?php
	//echo $pega_login;   
//$query_dataformata =  mysql_query("select Max(rotas.id) AS id, DATE_FORMAT(rotas.dth_ocorrencia,'%y-%m-%d') AS data, COUNT(rotas.dth_ocorrencia) AS qto_visitas from rotas INNER JOIN usuario ON rotas.login=usuario.login where usuario.coordenador!='' AND usuario.coordenador LIKE '$user' AND rotas.login LIKE '$pega_login' AND rotas.lista LIKE '$pega_lista' AND rotas.rota LIKE '$pega_rota' AND rotas.dth_ocorrencia!='0000-00-00 00:00:00' group by data order by data ASC");

	$query_dataformata =  mysql_query("select * from lunch where login LIKE '$pega_login' AND rota LIKE '$pega_rota' order by login ASC, data DESC");


?>
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" class="bordasimples">
  <tbody>
    <tr style="background-color:#579bd3; color:#FFFFFF" height="20">
      <td width="16%" height="40">USUÁRIO</td>
      <td width="16%" >ROTA</td>
       <td width="16%" >DATA DA INSERÇÃO</td>
      <td width="16%">HORÁRIO INICIAL</td>
      <td width="16%" >HORÁRIO FINAL</td>
      <td width="20%" style="background-color:#cc0000">TEMPO GASTO</td>
   
    </tr> 
	<?php
		while($row = mysql_fetch_array($query_dataformata)){
			
		//	$nome_data = $row['data'];		
		//	$array= $row['rota'] . " - " .  $row['login'];		
			//$qto_data = $row['hora_resultado'];	 
	//$data1= strtotime($row['rota']);
		//$data1=$row['data'] ;
		//$data = date('d-m-Y h:i:s', $row["data"]);
		
	 ?>
     <tr height="15">
    
      <td style="text-align: center;" nowrap><?php echo "<font size='1px'>" . mb_strtoupper($row['login']) . "</font>" ?></td>
      <td style="text-align: center;" nowrap><?php echo "<font size='1px'>" . $row['rota'] . "</font>" ?></td>
       <td style="text-align: center;" nowrap><?php echo "<font size='1px'>" . $row["data"] . "</font>" ?></td>
      <td style="text-align: center"><?php echo "<font size='1px'>" . $row['hora_inicial'] . "</font>"; ?></td>
      <td style="text-align: center"><?php echo "<font size='1px'>" . $row['hora_final'] . "</font>";?></td>
      <td style="text-align: center"><?php echo "<font size='1px'>" . $row['hora_resultado'] . " min." . "</font>";?></td>

    
    </tr>   
	<?php
	 }
   ?>
  
     </table>
     

 </tbody>


</div>


<div id="titulo_tabela_total"> 


<div id="diaadia_icon">TABELA DE EFICIÊNCIA</div>


</div>

<div id="tabela_total">



  <table width="100%" border="0" cellspacing="0" cellpadding="0" class="bordasimples">
  <tbody>
 
    <tr align="center" style="height: 35px;">
      
      <td bgcolor="#589bd4" style="color:#FFFFFF; width:15%">VISITAS</td>
      <td bgcolor="#5cbc69" style="color:#FFFFFF; width:15%">POSITIVADOS</td>
      <td bgcolor="#C00" style="color:#FFFFFF; width:15%">NEGATIVADOS</td>
      <td bgcolor="#000000" style="color:#FFFFFF; width:15%">ALERTAS</td>
      <td bgcolor="#F90" style="color:#FFFFFF; width:15%">PENDENTES</td>
      <td bgcolor="#589bd4" style="color:#FFFFFF">EFICIÊNCIA</td>
    </tr>
   
     <tr align="center" bgcolor="#FFFFFF">
    <?php
    $total_visita = number_format($num_rows_pizza1 + $num_rows_pizza2 + $num_rows_pizza4);

   // echo $total_visita;
	$conta_eficiencia = number_format($total_visita * 100 / $num_rows_pizza_todos, 2) . "%";
    ?>
   
   <td style="font-size: 16px;"><?php echo $num_rows_pizza_todos; ?></td>

      <td style="font-size: 14px;"><?php echo number_format($num_rows_pizza1*100  /$num_rows_pizza_todos, 2) . "%" ?></td>
   <td style="font-size: 14px;"><?php echo number_format($num_rows_pizza2 *100  /$num_rows_pizza_todos, 2) . "%"?></td>
     <td style="font-size: 14px;"><?php echo number_format($num_rows_pizza4*100  /$num_rows_pizza_todos, 2) . "%" ?></td>
      <td style="font-size: 14px;"><?php echo number_format($num_rows_pizza3*100  /$num_rows_pizza_todos, 2) . "%" ?></td>
    
      <td style="font-size: 20px;"><strong><?php echo $conta_eficiencia; ?></strong></td>
    </tr>

</table>     

  

</div>




</div>

</div>



  </div>

</body>
</html>


