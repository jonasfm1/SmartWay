<?php

include("../../lib/inc/chartphp_dist.php");

$p = new chartphp();

$p->data = array(array(array('Ocorencias', 30),array('Pendentes', 30), array('Confirmados', 30)));
$p->chart_type = "pie";

// Common Options
$p->title = "";

$out = $p->render('c1');
?>
<!DOCTYPE html>
<html>
	<head>
		<script src="../../lib/js/jquery.min.js"></script>
		<script src="../../lib/js/chartphp.js"></script>
		<link rel="stylesheet" href="../../lib/js/chartphp.css">

	<style>
		/* white color data labels */
		.jqplot-data-label{color:white;}
		
	#cobre {

	
	height:300px;
	width:405px;
	position:absolute;

	
		}
		#tarja {

	
	height:40px;
	width:450px;
	position:absolute;
	margin-top:286px;
background-color:#FFF;
z-index:9999;
	
		}
		.controla{
			
		background-color:#FFF;
		}
		
	
	</style>
	</head>
	
	<body>
    <div id="cobre">
<div style="width:40%; min-width:450px;" class="controla">
<div id="tarja"></div>
  <?php echo $out; ?>
  </div></div>
	</body>
</html>


