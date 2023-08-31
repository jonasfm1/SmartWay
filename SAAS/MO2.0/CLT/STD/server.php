<?php

/////////////////////////////////////////
function distance($lat1, $lon1, $lat2, $lon2, $unit) {

  $theta = $lon1 - $lon2;
  $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) +  cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
  $dist = acos($dist);
  $dist = rad2deg($dist);
  $miles = $dist * 60 * 1.1515;
  $unit = strtoupper($unit);

  if ($unit == "K") {
    return ($miles * 1.609344);
  } else if ($unit == "N") {
      return ($miles * 0.8684);
    } else {
        return $miles;
      }
}

////////////////////////////////////////



$f = fopen('REALIZADO.txt', 'a');

$host="localhost"; //replace with database hostname 
$username="root"; //replace with database username 
$password="HtMQZhAwCNzeaAfT"; //replace with database password 
$db_name="cadd_monitoramento"; //replace with database name
 

$conn=mysql_connect("$host", "$username", "$password")or die("cannot connect"); 
mysql_select_db("$db_name")or die("cannot select DB");

if ($_POST['btnchegada']!=''){
	   $log=$_POST['usuario2'];
	   list ( $vis, $cli, $cid) = split ('-',$_POST['ncliente']);
	   $oco="Chegada";
	   $dth=$_POST['btnchegada'];
	   list ( $y, $x) = split (',', $_POST['lblLocation']);
	   $sta=1;
	  
	   
       fwrite($f,$log.";".$vis.";".$cli.";".$oco.";".$dth.";".$y.";".$x.";".$sta."\r\n");
 
}


if ($_POST['checkselecionado']!=''){
	   $log=$_POST['userEt2'];
	   list ( $vis, $cli, $cid) = split ('-',$_POST['nomeempresa']);
	   $oco = preg_replace("/[ַ]/", "C",  $_POST['checkselecionado']);
	   $oco = preg_replace("/[ְֱֲֳִ]/", "A", $oco);
	   $oco = preg_replace('/\s/',' ',$oco);
	   $oco = preg_replace('/\n/',' ',$oco);
	   $oco = preg_replace("/[ח]/", "c", $oco);
	   $oco = preg_replace("/[באגדה]/", "a", $oco);
	   $dth=$_POST['dtOc'];
	   list ( $y, $x) = split (',', $_POST['lblLocation']);
	   $sta=2;
       fwrite($f,$log.";".$vis.";".$cli.";".$oco.";".$dth.";".$y.";".$x.";".$sta."\r\n");
	   
	   
	   $new_number = intval($vis);
	   
	   $new_y =  number_format($y, 7, '.', '');
	   $new_x =  number_format($x, 7, '.', '');
	   
	   
	   
	  // number_format($y, 7, '.', '');
	   
	   
	   $query5 = mysql_query("select * from rotas where id=$new_number");	   
	  // $rs5 = mysql_query($query5);
	   $dados = mysql_fetch_array($query5);
	 
	   $x_cadd = $dados["x_ocorrencia"];
	   $y_cadd = $dados["y_ocorrencia"];
		
	   $x_cadd = number_format($x_cadd, 7, '.', '');
	   $y_cadd = number_format($y_cadd, 7, '.', '');
		
	  fwrite($f, $y_cadd.";".$x_cadd.";".$new_y.";".$new_x."\r\n");
		
	
	//	$calcula_distancia = distance($y_cadd, $x_cadd, $new_y, $new_x, 'K');
		
		//fwrite($f, $calcula_distancia ."\r\n");
			/*	if($calcula_distancia<=200){	
					
						$query1 = "UPDATE rotas SET ce='1' WHERE id='$new_number'";		
						$rs1 = 	mysql_query($query1);																
				}
		 */
		 
		 
		 
}
	
	   
	
	
	
if ($_POST['btnsaida']!=''){
	   $log=$_POST['usuario2'];
	   list ( $vis, $cli, $cid) = split ('-',$_POST['nm2']);
	   $oco="Saida";
	   $dth=$_POST['btnsaida'];
	   list ( $y, $x) = split (',', $_POST['lblLocation']);
	   $sta=3;
       fwrite($f,$log.";".$vis.";".$cli.";".$oco.";".$dth.";".$y.";".$x.";".$sta."\r\n");
	}

//echo $userlogin;



	   
$sql = "INSERT realizado SET login='$log',rotas_id='$vis',cliente='$cli',ocorrencia='$oco',dth_ocorrencia='$dth',x='$x',y='$y',status='$sta'"; 
$rs = mysql_query($sql);


$sql_chegada ="UPDATE realizado JOIN rotas ON realizado.rotas_id = rotas.id SET rotas.dth_chegada = realizado.dth_ocorrencia, rotas.x_chegada = realizado.x, rotas.y_chegada = realizado.y
WHERE realizado.status='1'";
$rs = mysql_query($sql_chegada);


$sql_saida ="UPDATE realizado JOIN rotas ON realizado.rotas_id = rotas.id SET rotas.dth_saida = realizado.dth_ocorrencia, rotas.x_saida = realizado.x, rotas.y_saida = realizado.y
WHERE realizado.status='3'";
$rs = mysql_query($sql_saida);


$sql_ocorrencia_ok ="UPDATE rotas INNER JOIN realizado ON rotas.id = realizado.rotas_id SET rotas.ocorrencia = realizado.ocorrencia, rotas.dth_ocorrencia = realizado.dth_ocorrencia, rotas.x_ocorrencia = realizado.x, rotas.y_ocorrencia = realizado.y, rotas.status = 1 WHERE realizado.ocorrencia='Servico efetivado' AND realizado.status=2";
$rs = mysql_query($sql_ocorrencia_ok);

$sql_ocorrencia_nao_ok ="UPDATE rotas INNER JOIN realizado ON rotas.id = realizado.rotas_id SET rotas.ocorrencia = realizado.ocorrencia, rotas.dth_ocorrencia = realizado.dth_ocorrencia, rotas.x_ocorrencia = realizado.x, rotas.y_ocorrencia = realizado.y, rotas.status = 2 WHERE realizado.ocorrencia<>'Servico efetivado' AND realizado.status=2";
$rs = mysql_query($sql_ocorrencia_nao_ok);


echo 'Dados enviados com sucesso';
	
	//echo 'nome-SPDATA-idade-SPDATA-paםs'
?>