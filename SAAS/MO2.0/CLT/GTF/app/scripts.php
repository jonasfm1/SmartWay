<?php

/// CLASSE HAVERSINE///////////////////////////////////////
class HaverSign {

     public static function getDistance($latitude1, $longitude1, $latitude2, $longitude2) {
        $earth_radius = 6371;
        $dLat = deg2rad($latitude2 - $latitude1);
        $dLon = deg2rad($longitude2 - $longitude1);
        $a = sin($dLat/2) * sin($dLat/2) + cos(deg2rad($latitude1)) * cos(deg2rad($latitude2)) * sin($dLon/2) * sin($dLon/2);
        $c = 2 * asin(sqrt($a));
        $d = $earth_radius * $c;
        return $d;
                }
}
/// CLASSE HAVERSINE///////////////////////////////////////















ini_set('max_execution_time',12000);

$host_x="localhost"; //replace with database hostname 
$username_x="root"; //replace with database username 
$password_x="HtMQZhAwCNzeaAfT"; //replace with database password 
//$db_name="cadd_monitoramento"; //replace with database name
  
//$con = mysqli_connect($host,$username,$password,$db_name) or die('Unable to Connect');

$acao = $_GET['acao'];

switch ($acao) {

//////////////VERIFICA LOGIN ////////////////////////////////

case 'verifica_login':


if($_SERVER['REQUEST_METHOD']=='POST'){
$username = $_POST['username'];
$password = $_POST['password'];


$split = explode("@", $username);

$username =  $split[0];
$empresa =  "mo_" . $split[1];

//$empresa = "mo_dacarto";

$sql = "select * from usuario where login='$username' and senha='$password'";
//$check = mysqli_fetch_array(mysqli_query($con,$sql));
$con1 = mysqli_connect("$host_x","$username_x","$password_x","$empresa") or die("Não conectado ao servidor! Verifique se você utilizou o @empresa no Login!");


$check = mysqli_fetch_array(mysqli_query($con1,$sql));

if(isset($check)){
echo "success";

date_default_timezone_set('America/Sao_Paulo');
$query_where1 = "UPDATE usuario SET ultimo_acesso='" . date("Y-m-d H:i:s") . "' WHERE login='$username'";
$check2 = mysqli_fetch_array(mysqli_query($con1,$query_where1));

}else{
echo "Nome de usuario ou senha invalida";
}

}else{
echo "Tente outra vez";
}


break;

//////////////VERIFICA LOGIN /////////////////////////////////








//////////////LISTAR OCORRENCIA ////////////////////////////////
case 'lista_ocorrencia':

$userlogin = $_GET['id'];
$empresa = $_GET['empresa'];

//$empresa = "mo_dacarto";


//echo $userlogin;
$con=mysql_connect("$host_x", "$username_x", "$password_x")or die("Não conectado ao servidor!"); 
mysql_select_db("$empresa") or die("COMBO!");



$sql = "SELECT ocorrencia, status FROM ocorrencia where ativo=1 ORDER BY id"; 
$result = mysql_query($sql);
$json = array();


if(mysql_num_rows($result)){
while($row=mysql_fetch_assoc($result)){
$json['rotas_ocorrencia'][]=$row;
}
}


mysql_close($con);
echo json_encode($json); 

break;
////////////// LISTAR OCORRENCIA ////////////////////////////////



//////////////LISTAR KM ////////////////////////////////
case 'lista_km':

$userlogin = $_GET['id'];
$empresa = $_GET['empresa'];
$rota = $_GET['rota'];


$con=mysql_connect("$host_x", "$username_x", "$password_x")or die("Não conectado ao servidor!"); 
mysql_select_db("$empresa") or die("ERRO AO CARREGAR O KM!");

$sql = "SELECT * FROM km WHERE login='$userlogin' AND rota='$rota' ORDER BY id DESC"; 
$result = mysql_query($sql);
$json = array();

if(mysql_num_rows($result)){
while($row=mysql_fetch_assoc($result)){
$json['rotas_km'][]=$row;
}
}


mysql_close($con);

echo json_encode($json); 

break;
////////////// LISTAR KM ////////////////////////////////


//////////////MARCAR KM ////////////////////////////////
case 'marca_km':

$empresa = $_GET['empresa'];
$usuario = $_GET['id'];
$rotaselecionada=$_POST['rotaselecionada'];
$kmi=$_POST['kmi'];
$kmf=$_POST['kmf'];
$tipooperacao = $_POST['tipooperacao'];
date_default_timezone_set('America/Sao_Paulo');
$dth = date('Y-m-d H:i');

$con=mysql_connect("$host_x", "$username_x", "$password_x")or die("Não conectado ao servidor!"); 
mysql_select_db("$empresa") or die("ERRO AO CONECTAR MARCAR KM!");

if($kmf==0 OR $kmi==0){
	$soma_kms = 0;
} else{
	
	if($kmi>$kmf){
	$soma_kms = 0;	
	} else{
	$soma_kms = $kmf-$kmi;	
	}
	
	
}


if ($tipooperacao=="alterar") {
$sql ="UPDATE km SET kminicial= '$kmi', kmfinal= '$kmf', kmresultado='$soma_kms', data ='$dth' WHERE login='$usuario' AND rota='$rotaselecionada'";
$rs = mysql_query($sql);
echo 'Anotação alterada com sucesso';
}

else{
$sql = "INSERT INTO KM(login, rota, kminicial, kmfinal, kmresultado, data) VALUES('$usuario', '$rotaselecionada', '$kmi', '$kmf','$soma_kms', '$dth')";
$rs = mysql_query($sql);
echo 'Anotação criada com sucesso';
}

break;
////////////// MARCAR KM ////////////////////////////////



//////////////HORA ALMOCO ///////////////////////////////
case 'marca_lunch':

$empresa = $_GET['empresa'];
$usuario = $_GET['id'];
$rotaselecionada=$_GET['rotaselecionada'];
$horai=$_GET['hora_inicio'];
$horaf=$_GET['hora_final'];
$tipooperacao = $_GET['tipooperacao'];
date_default_timezone_set('America/Sao_Paulo');
$dth = date('Y-m-d H:i');

//echo $host_x;

$con=mysql_connect("$host_x", "$username_x", "$password_x")or die("Não conectado ao servidor!"); 
mysql_select_db("$empresa") or die("ERRO AO CONECTAR HORA DO ALMOÇO!");

if($horai==0 OR $horaf==0){
	$soma_hora = 0;
} else{
	
	if($horai>$horaf){
	$soma_hora = 0;	
	} else{
	$soma_hora = $horaf-$horai;	
	}
	
	
}


if ($tipooperacao=="alterar") {
$sql ="UPDATE lunch SET hora_inicial= '$horai', hora_final='$horaf', hora_resultado='$soma_hora', data ='$dth' WHERE login='$usuario' AND rota='$rotaselecionada'";
$rs = mysql_query($sql);
echo 'Anota&ccedil;&atilde;o alterada com sucesso';
}

else{
$sql = "INSERT INTO lunch(login, rota, hora_inicial, hora_final, hora_resultado, data) VALUES('$usuario', '$rotaselecionada', '$horai', '$horaf','$soma_hora', '$dth')";
$rs = mysql_query($sql);
echo 'Anota&ccedil;&atilde;o criada com sucesso';
}

break;
////////////// HORA ALMOCO ////////////////////////////////






//////////////COMBOBOX VISITAS ////////////////////////////////
case 'combo_visitas':

$userlogin = $_GET['id'];
$empresa = $_GET['empresa'];

//$empresa = "mo_dacarto";


//echo $userlogin;
$con=mysql_connect("$host_x", "$username_x", "$password_x")or die("Não conectado ao servidor!"); 
mysql_select_db("$empresa") or die("COMBO!");



$sql = "SELECT rota, statusrota FROM rotas WHERE login='$userlogin' AND statusrota>0 GROUP BY rota ORDER BY id"; 
$result = mysql_query($sql);
$json = array();


if(mysql_num_rows($result)){
while($row=mysql_fetch_assoc($result)){
$json['rotas_nome'][]=$row;
}
}


mysql_close($con);
echo json_encode($json); 

break;

//////////////COMBOBOX VISITAS ////////////////////////////////


//////////////LISTVIEW VISITAS DETALHES ////////////////////////////////
case 'combo_visitas_detalhes':

$userlogin = $_GET['id'];
$rotaselecionada= $_GET['rota'];
$empresa = $_GET['empresa'];
//$empresa = "mo_gtfoods";

//echo $userlogin;
$con=mysql_connect("$host_x", "$username_x", "$password_x")or die("cannot connect"); 
mysql_select_db("$empresa") or die("DETALHES!");


$sql = "SELECT * FROM rotas WHERE rota='$rotaselecionada' AND login='$userlogin' ORDER BY rota, sequencia"; 
$result = mysql_query($sql);
$json = array();
 
if(mysql_num_rows($result)){
while($row=mysql_fetch_assoc($result)){
$json['rotas'][]=$row;
}
}
mysql_close($con);
echo json_encode($json); 

break;
//////////////LISTVIEW VISITAS DETALHES ////////////////////////////////

////////////// RASTRO ////////////////////////////////
case 'rastro':

$log=strtolower($_POST['usuario']);
$x=$_POST['locx'];
$y=$_POST['locy'];
$dth=$_POST['dtEt'];

$log1=split("@",$log);
$usuario = $log1[0];
$banco = $log1[1];

$time = strtotime($dth);
$date = date("Y-m-d",$time);
$hora = date("H:i:s",$time);

$concatena_txt = $banco . "/RASTRO.txt";
$f = fopen($concatena_txt, 'a');
	
	fwrite($f, strtolower($_POST['usuario']).';');
    fwrite($f, $_POST['locx'].";");
	fwrite($f, $_POST['locy'].";");
    fwrite($f, $_POST['dtEt']."\r\n");
    fclose($f);
	
echo 'Dados enviados com sucesso';

$con=mysql_connect("$host_x", "$username_x", "$password_x")or die("cannot connect"); 
mysql_select_db("$banco")or die("Não conectou o Banco RASTRO!");
	
$sql = "INSERT INTO rastro(login, x, y, dth, day) VALUES('$usuario', '$x', '$y', '$hora', '$date')";
$rs = mysql_query($sql);
break;

////////////// RASTRO ////////////////////////////////


/////////////REALIZADOS ENTRADA  //////////////
case 'realizado_entrada':

       list ( $log, $banco) = split ('@',$_POST['usuario']);
	   $banco = "mo_".$banco;
       $concatena_txt = $banco . "/REALIZADO.txt";
       $f = fopen($concatena_txt, 'a');  
	   list ( $vis, $cli, $cid) = split ('#',$_POST['cliente']);
	   $oco="Chegada";
	   $dth=$_POST['dataentrada'];
	   list ( $y, $x) = split (',', $_POST['local']);
	   $sta=1; 
	   fwrite($f,$log.";".$vis.";".$cli.";".$oco.";".$dth.";".$y.";".$x.";".$sta."\r\n");
	   
       $conn=mysql_connect("$host_x", "$username_x", "$password_x")or die("cannot connect"); 
       mysql_select_db("$banco")or die("Não conectou o Banco 'REALIZADOS'!");
	   
       $sql = "INSERT realizado SET login='$log',rotas_id='$vis',cliente='$cli',ocorrencia='$oco',dth_ocorrencia='$dth',x='$x',y='$y',status='$sta'"; 
       $rs = mysql_query($sql);	   
	   $sql_chegada ="UPDATE rotas SET rotas.dth_chegada = '$dth', rotas.x_chegada = '$x', rotas.y_chegada = '$y' WHERE rotas.id='$vis'";
	   $rs = mysql_query($sql_chegada);
	   
	   //Atualizar Raio//
	   $query_cli = mysql_query("select * FROM rotas WHERE id='$vis'"); 
	   $dados = mysql_fetch_array($query_cli);
	   $lat_cli = $dados["y"];
       $lon_cli = $dados["x"];
	   $cerca_cli =$dados["raio"];
	   $haversign=new HaverSign();   
       $dist = ($haversign->getDistance($y,$x,$lat_cli,$lon_cli))*1000;
	   if ($dist<=$cerca_cli ){
		   $sql_raio ="UPDATE rotas SET ce=1 WHERE id='$vis'";
	       $rs = mysql_query($sql_raio);
		   }

	   
	   
	   
	
echo 'Dados de Entrada enviado com sucesso';
break;
/////////////REALIZADOS ENTRADA //////////////




/////////////REALIZADOS SAIDA //////////////
case 'realizado_saida':

       list ( $log, $banco) = split ('@',$_POST['usuario']);
	   $banco = "mo_".$banco;
       $concatena_txt = $banco . "/REALIZADO.txt";
       $f = fopen($concatena_txt, 'a');
	   list ( $vis, $cli, $cid) = split ('#',$_POST['cliente']);
	   $oco="Saida";
	   $dth=$_POST['datasaida'];
	   list ( $y, $x) = split (',', $_POST['local']);
	   $sta=3;
       fwrite($f,$log.";".$vis.";".$cli.";".$oco.";".$dth.";".$y.";".$x.";".$sta."\r\n");

	   $conn=mysql_connect("$host_x", "$username_x", "$password_x")or die("cannot connect"); 
       mysql_select_db("$banco")or die("Não conectou o Banco 'REALIZADOS'!");
	   
       $sql = "INSERT realizado SET login='$log',rotas_id='$vis',cliente='$cli',ocorrencia='$oco',dth_ocorrencia='$dth',x='$x',y='$y',status='$sta'"; 
       $rs = mysql_query($sql);
	   $sql_saida ="UPDATE rotas SET rotas.dth_saida = '$dth', rotas.x_saida = '$x', rotas.y_saida = '$y' WHERE rotas.id='$vis'";
       $rs = mysql_query($sql_saida);
	   
	   //Atualizar Raio//
	   $query_cli = mysql_query("select * FROM rotas WHERE id='$vis'"); 
	   $dados = mysql_fetch_array($query_cli);
	   $lat_cli = $dados["y"];
       $lon_cli = $dados["x"];
	   $cerca_cli =$dados["raio"];
	   $haversign=new HaverSign();   
       $dist = ($haversign->getDistance($y,$x,$lat_cli,$lon_cli))*1000;
	   if ($dist<=$cerca_cli ){
		   $sql_raio ="UPDATE rotas SET ce=1 WHERE id='$vis'";
	       $rs = mysql_query($sql_raio);
		   }
	   

echo 'Dados de Saída enviado com sucesso';
break;
/////////////REALIZADOS SAIDA //////////////




/////////////REALIZADOS OCORRENCIA //////////////
case 'realizado_ocorrencia':

       list ( $log, $banco) = split ('@',$_POST['usuario']);
	   $banco = "mo_".$banco;
       $concatena_txt = $banco . "/REALIZADO.txt";
       $f = fopen($concatena_txt, 'a');
	   list ( $vis, $cli, $cid) = split ('#',$_POST['cliente']);
	   list ( $oco, $sta) = split ('#',$_POST['ocorrencia']);   
	   $oco = preg_replace("/[Ç]/", "C", $oco);
	   $oco = preg_replace("/[ÁÀÂÃÄ]/", "A", $oco);
	   $oco = preg_replace('/\s/',' ',$oco);
	   $oco = preg_replace('/\n/',' ',$oco);
	   $oco = preg_replace("/[ç]/", "c", $oco);
	   $oco = preg_replace("/[áàâãä]/", "a", $oco);
	   $oco = preg_replace("/[êé]/", "e", $oco);
	   $dth=$_POST['dataocorrencia'];
	   list ( $y, $x) = split (',', $_POST['local']);
       fwrite($f,$log.";".$vis.";".$cli.";".$oco.";".$dth.";".$y.";".$x.";".$sta."\r\n");

       $conn=mysql_connect("$host_x", "$username_x", "$password_x")or die("cannot connect"); 
       mysql_select_db("$banco")or die("Não conectou o Banco 'REALIZADOS'!");
	   
	   
	   $conecta = mysql_query("SELECT * FROM ocorrencia WHERE ocorrencia='$oco'");
	   // 
	   $dados = mysql_fetch_array($conecta);
	   $id_oco = $dados['id'];
	   
	   
       $sql = "INSERT realizado SET login='$log',rotas_id='$vis',cliente='$cli',ocorrencia='$oco',dth_ocorrencia='$dth',x='$x',y='$y',status=2"; 
       $rs = mysql_query($sql);

	   $sql_ocorrencia ="UPDATE rotas SET rotas.ocorrencia= '$id_oco', rotas.dth_ocorrencia= '$dth', rotas.x_ocorrencia = '$x', rotas.y_ocorrencia = '$y', rotas.status = '$sta' WHERE rotas.id='$vis'";
	   $rs = mysql_query($sql_ocorrencia);
	   
	   
	   //Atualizar Raio//
	   $query_cli = mysql_query("select * FROM rotas WHERE id='$vis'"); 
	   $dados = mysql_fetch_array($query_cli);
	   $lat_cli = $dados["y"];
       $lon_cli = $dados["x"];
	   $cerca_cli =$dados["raio"];
	   $haversign=new HaverSign();   
       $dist = ($haversign->getDistance($y,$x,$lat_cli,$lon_cli))*1000;
	   if ($dist<=$cerca_cli ){
		   $sql_raio ="UPDATE rotas SET ce=1 WHERE id='$vis'";
	       $rs = mysql_query($sql_raio);
		   }
	   

echo 'Dados de Ocorrencia enviado com sucesso';
	
break;

/////////////REALIZADOS OCORRENCIA //////////////





////////////// ENVIA IMAGEM ////////////////////////////////
case 'enviar_imagem':

	session_start();
	
	
	if(preg_match('/^(save-form){1}$/', $_POST['method'])){
		
		$imgName = 'img-'.time().'.'.$_POST['img-mime'];
		
		$f = fopen('DATA.txt', 'a');
		fwrite($f, " Name: ".$_POST['name']."\n");
		fwrite($f, " Nome: ".$_POST['img-mime']."\n");
		fwrite($f, " Image: ".$imgName."\r\n");
		fclose($f);
		
		$binary = base64_decode($_POST['img-image']);
		$file = fopen('../img/'.$imgName, 'wb');
		fwrite($file, $binary);
		fclose($file);
		
		echo '1';
	}

break;

////////////// ENVIA IMAGEM ////////////////////////////////

}
?>
