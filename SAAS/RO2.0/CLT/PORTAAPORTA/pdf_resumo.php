<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>::: Imprimir Resumo :::</title>
<link rel="shortcut icon" href="imgs/favicon.ico" >
<link rel="icon" type="image/gif" href="imgs/animated_favicon1.gif" >
</head>
<style>
table.bordasimples {
	border-collapse: collapse;
	}

table.bordasimples tr td {
	font-family: Arial, Helvetica, sans-serif;
	font-size:9px;
	border:1px solid #cccccc;


}


::-webkit-scrollbar-track {
    background-color: #F4F4F4;
}
::-webkit-scrollbar {
    width: 6px;
    background: #000000;
}
::-webkit-scrollbar-thumb {
    background: #d3d5d6;
}


::-webkit-scrollbar-track:horizontal {
    background-color: #F4F4F4;
 }

 ::-webkit-scrollbar:horizontal {
  
    height: 6px;
    background: #000000;
}
::-webkit-scrollbar-thumb:horizontal {
    background: #d3d5d6;
}

body {
  background-color: #fffffff6;
  
}

table.bordasimples1 {
	border-collapse: collapse;
	}

table.bordasimples1 tr td {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 11px;
border:1px solid #d3d5d6;

}
</style>


<body>
<table width="100%" border="0" class="bordasimples1" cellpadding="0" cellspacing="0">
<tr  bgcolor="#cccccc">
<td height="20" align="center" valign="middle" style="text-align: center; color: #000000; font-size:14px; padding:10px;font-weight: bold;">RESUMO DAS ROTAS</td>
  </tr>
</table>
 <table width="100%" border="1" class="bordasimples" cellpadding="2" cellspacing="2">
  <tbody>
        <tr bgcolor="#888888">
          <td width="11%" height="20" style="text-align: center; color: #ffffff;">Rota</td>
          <td width="11%" height="20" style="text-align: center; color: #ffffff;">Veículo</td>
          <td width="11%" style="text-align: center; color: #ffffff;">Visitas</td>
          <td width="11%" style="text-align: center; color: #ffffff;">Entregas</td>
          <td width="11%" style="text-align: center; color: #ffffff;">Distância Total</td>
          <td width="11%" style="text-align: center; color: #ffffff;">Tempo Percurso</td>
          <td width="11%" style="text-align: center; color: #ffffff;">Volume Total</td>

    </tr>
<?php 
  include ('session.php'); 
  require_once ("geocode.class.php");
  include ('essence/conecta.php');
  ini_set('max_execution_time',3000);

function sum_the_time($time1, $time2) {
  $times = array($time1, $time2);
  $seconds = 0;
  
  foreach ($times as $time)
  {
    list($hour,$minute,$second) = explode(':', $time);
    $seconds += $hour*3600;
    $seconds += $minute*60;
    $seconds += $second;
  }
  $hours = floor($seconds/3600);
  $seconds -= $hours*3600;
  $minutes  = floor($seconds/60);
  $seconds -= $minutes*60;
  // return "{$hours}:{$minutes}:{$seconds}";
  return sprintf('%02d:%02d:%02d', $hours, $minutes, $seconds); // Thanks to Patrick
}


function convertToHoursMins($time, $format = '%02d:%02d') {
    if ($time < 1) {
        return;
    }
    $hours = floor($time / 60);
    $minutes = ($time % 60);
    return sprintf($format, $hours, $minutes);
}




$quem= $_GET["check_list"];

for ($i=0;$i<count($quem);$i++)
{
   

	
    $query = "select * from rotas where nome_rota='$quem[$i]'";																
    $rs = mysql_query($query);
	$conta = 0;
	$veiculo=array();
	$distancia=array();
	
	$tempo=array();
	

	
	while($row = mysql_fetch_array($rs)){
		
		$veiculo = $row["veiculo"];	
		$distancia[$conta] = $row["distancia"];		
		$tempo[$conta] = $row["tempo"];		
		$conta ++;
		
		
	}
	
	  
  $query_i = "select * from rotas where nome_rota='$quem[$i]' group by codigo_cliente";																
  $rs_i = mysql_query($query_i);
  $conta_i = 0;
  while($row_i = mysql_fetch_array($rs_i)){
  $conta_i ++;
  }

	?> 
<tr>
	 
      <?php
	  $query_todos = "select * from veiculos where id='$veiculo'";															
	  $rs_todos = mysql_query($query_todos);  
	  $dados = mysql_fetch_array($rs_todos);
	  
	  
	  $query_soma = "SELECT SUM(tempo_servico) AS total_servico FROM rotas where veiculo='$veiculo'";
	  $rs_soma = mysql_query($query_soma);  
	  $dados_soma = mysql_fetch_array($rs_soma);
	  //echo $dados_soma['total_servico'];
	  
	 
	  $tempo_servico = convertToHoursMins($dados_soma['total_servico'], '%02d:%02d:00');
	  $tempo_percurso = $dados['tempo_total'];
	  
	  $resultado = sum_the_time($tempo_percurso, $tempo_servico);
		
	  ?>
      <td style="text-align: center"><?php echo $quem[$i]; ?></td>
      <td style="text-align: center"><?php echo $dados['nome']; ?></td>
      <td style="text-align: center"><?php echo $conta_i . " VISITAS"; ?></td>   
      <td style="text-align: center"><?php echo $conta . " ENTREGAS"; ?></td>
      <td style="text-align: center"><?php echo $dados['distancia_total'] . " Km"; ?></td>
      <td style="text-align: center"><?php echo $dados['tempo_total']; ?></td>

      <td style="text-align: center"><?php echo $dados['volume_total']; ?></td>

  </tr>
      <?php
	  
	  }
	  ?>
      
       <tr bgcolor="#cccccc">
      <td height="5" colspan="9" align="right"></td>
    </tr>
    
      <script language="javascript">


		window.print();
		
	
  </script>
   
  </tbody>
</table>
</body>
</html>