<?php

/*bd= "mo_" . $logado;

$dbname="$bd"; // Indique o nome do banco de dados que será aberto
$usuario="root"; // Indique o nome do usuário que tem acesso
$password="HtMQZhAwCNzeaAfT"; // Indique a senha do usuário

 $con = mysqli_connect('127.0.0.1','$usuario','password','$dbname');
*/
include ('session.php');
include ('conecta.php');
ini_set('max_execution_time',12000); 

$con = mysqli_connect('127.0.0.1','$usuario','$password','mo_dacarto');
?>


<!DOCTYPE HTML>
<html>
<head>
 <meta charset="utf-8">
 <title>
 Create Google Charts
 </title>
 <script type="text/javascript" src="https://www.google.com/jsapi"></script>
 <script type="text/javascript">
 google.load("visualization", "1", {packages:["corechart"]});
 google.setOnLoadCallback(drawChart);
 function drawChart() {
 var data = google.visualization.arrayToDataTable([

 ['Date', 'Visits'],
 <?php 
 
 //echo $bd;
 
 $query = "SELECT count(login) AS count, status FROM rotas GROUP BY login ORDER BY status";
 
 $rs3 = mysql_query($query);	
 
 while($row = mysql_fetch_array($rs3)){

 		echo "['".$row['status']."',".$row['count']."],";
}
 ?>
 
 ]);

 var options = {
 title: 'Date wise visits'
 };
 var chart = new google.visualization.ColumnChart(document.getElementById("columnchart"));
 chart.draw(data, options);
 }
 </script>
</head>
<body>
 <h3>Column Chart</h3>
 <div id="columnchart" style="width: 900px; height: 500px;"></div>
</body>
</html>