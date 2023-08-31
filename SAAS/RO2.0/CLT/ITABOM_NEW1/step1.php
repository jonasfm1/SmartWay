<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//BR" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>::. ROTAS ONLINE .:: CADD</title>
<link rel="stylesheet" type="text/css" href="css/menu.css">
<link rel="stylesheet" type="text/css" href="css/step1.css">
<link rel="shortcut icon" href="imgs/favicon.ico" >
 <link rel="icon" type="image/gif" href="imgs/animated_favicon1.gif" >
 
<script type="text/javascript" src="js/min.js"></script>
<script type="text/javascript" src="js/file-upload.js"></script>
<link href="css/file-upload.css" rel="stylesheet" media="screen" type="text/css">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<style type="text/css"></style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>

<script type='text/javascript' src="control/timer.js"></script>
<script LANGUAGE="JavaScript">
this.fullScreenMode = document.fullScreen || document.mozFullScreen || document.webkitIsFullScreen; // This will return true or false depending on if it's full screen or not.

$(document).on ('mozfullscreenchange webkitfullscreenchange fullscreenchange',function(){
       this.fullScreenMode = !this.fullScreenMode;

      //-Check for full screen mode and do something..
      simulateFullScreen();
 });





var simulateFullScreen = function() {
     if(this.fullScreenMode) {
            docElm = document.documentElement
            if (docElm.requestFullscreen) 
                docElm.requestFullscreen()
            else{
                if (docElm.mozRequestFullScreen) 
                   docElm.mozRequestFullScreen()
                else{
                   if (docElm.webkitRequestFullScreen)
                     docElm.webkitRequestFullScreen(Element.ALLOW_KEYBOARD_INPUT)
                }
            }
     }else{
             if (document.exitFullscreen) 
                  document.exitFullscreen()
             else{ 
                  if (document.mozCancelFullScreen) 
                     document.mozCancelFullScreen()
                  else{
                     if (document.webkitCancelFullScreen) 
                         document.webkitCancelFullScreen();
                  }
             }
     }

     this.fullScreenMode= !this.fullScreenMode

}
	
$(document).ready(function(){
$(".jquery-waiting-base-container").waiting({modo:"slow"});
});

function goBack() {
	window.location.href="step1.php";
}

function enviardados(){
if(document.form.filename.value=="")

{
alert( "Clique em 'PROCURAR' e escolha um arquivo .XLS!" );

document.form.filename.focus();

return false;

}

}

</SCRIPT>
<?php 
	//cria sessão
//	$_Session['pagina'] = "PASSO 1";

include ('session.php'); 
?>
</head>
<body>


<?php
include ('essence/conecta.php');
include ('base3.php');
require 'PHPExcel/IOFactory.php';


function tirarAcentos($string){
    return preg_replace(array("/(á|à|ã|â|ä)/","/(Á|À|Ã|Â|Ä)/","/(é|è|ê|ë)/","/(É|È|Ê|Ë)/","/(í|ì|î|ï)/","/(Í|Ì|Î|Ï)/","/(ó|ò|õ|ô|ö)/","/(Ó|Ò|Õ|Ô|Ö)/","/(ú|ù|û|ü)/","/(Ú|Ù|Û|Ü)/","/(ñ)/","/(Ñ)/","/(ç|Ç)/" ),explode(" ","a A e E i I o O u U n N c"),$string);
}

	
	
ini_set('max_execution_time',12000);



//Transferir o arquivo


if (isset($_POST['submit'])) {
$escolha = $_POST['escolha'];


$file_extension =$_FILES['filename']['tmp_name'];

//$texto = substr($_FILES['filename']['name'],11);
//echo $texto;

$max = 30;
$str = $_FILES['filename']['name'];
$abreviado =  substr_replace($str,(strlen($str) > $max ? '...txt' : ''), $max);


$extension = substr("$file_extension", 6); // remove the image/ and the gif extension remains.

/*if (is_uploaded_file($_FILES['filename']['tmp_name'])) {
//echo "Arquivo ". $_FILES['filename']['name'] ." lido com sucesso." . "<br />";
//readfile($_FILES['filename']['tmp_name']);
}
*/

if($escolha=="adicionar"){
	
	$deleterecords1 = "DELETE FROM classificacao"; //Esvaziar a tabela classificacao
	mysql_query($deleterecords1);
	
	$deleterecords2 = "DELETE FROM regiao_itabom"; //Esvaziar a tabela itabom
	mysql_query($deleterecords2);

	$deleterecords3 = "DELETE FROM transportadora_itabom"; //Esvaziar a tabela itabom
	mysql_query($deleterecords3);
	
$query_where1 = "UPDATE passo SET ok='no' WHERE (id='2' OR id='3' OR id='4' OR id='5')";
$rs_where1 = mysql_query($query_where1);

	
} 

if($escolha=="inserir"){
	
$deleterecords = "TRUNCATE TABLE clientes"; //Esvaziar a tabela
mysql_query($deleterecords);	

$deleterecords1 = "DELETE FROM classificacao"; //Esvaziar a tabela classificacao
mysql_query($deleterecords1);

$deleterecords2 = "DELETE FROM regiao_itabom"; //Esvaziar a tabela itabom
mysql_query($deleterecords2);

$deleterecords3 = "DELETE FROM transportadora_itabom"; //Esvaziar a tabela itabom
mysql_query($deleterecords3);


$query_deleta = "UPDATE veiculos SET peso_total=0, volume_total=0, valor_total=0, equipe=null, ocupado='0', roteirizado='', prioridade=Null, local_inicio='', local_final='' ";
$rs_deleta = mysql_query($query_deleta);


$query_where1 = "UPDATE passo SET ok='no' WHERE (id='2' OR id='3' OR id='4' OR id='5')";
$rs_where1 = mysql_query($query_where1);


} 

//Importar o arquivo transferido para o banco de dados
$handle = fopen($_FILES['filename']['tmp_name'], "r") or die("O SISTEMA NÃO CONSEGUIU ABRIR O ARQUIVO $handle");


$_conta = 0;
$conta_regs_existentes =  0;
$arquivo = $handle;

//$arquivo = fopen ('arq.txt', 'r');
  //  $result = array();
  //  while(!feof($arquivo)){
   //     $result = explode("|",fgets($arquivo));
  //  }
    //fclose($arquivo);
//	print_r($result);

?> 

<div id="loading" style="position:absolute; width:100%; height:100%;background-color:#FFFFFF; z-index:99999; top:0;">
<div style="height:100px; background-color:#FFFFFF;width:400px; position: relative; top: 50%; margin-top:-50px; left:50%; margin-left:-200px">
  <div id="progress" style="position: relative; left: 28px; top: 28px; width: 340px; height: 40px; background-color: #6f99d6; layer-background-color: #6f99d6; border: 1px none #000000; font-family:Arial, 'Helvetica Neue', Helvetica, sans-serif; font-size:12px;">


<?php
$data_0 = array();
$data_9 = array();
$data_6 = array();
$data_7 = array();
$data_8 = array();
$data_5 = array();
$_conta = 0;



/// INSERIR /////////////////////////////////////////////

if($escolha=="inserir"){
	
	
while(!feof($arquivo)) {
	
    $linha = fgets($arquivo);
			
	//codigo cliente
	$data_0[$_conta] = substr($linha,1,8);
	//codigo pedido
	$data_9[$_conta] = substr($linha,9,20);
	//tira espaco vaziu do final
	$data_9[$_conta] =trim($data_9[$_conta]);		
	//volume
	$data_6[$_conta] = substr($linha,30,10);
	//peso
	$data_7[$_conta] = substr($linha,40,10);
	$peso_conta = $data_7[$_conta];	
	$data_0[$_conta] = rtrim($data_0[$_conta]);
	$data_0[$_conta] =utf8_encode($data_0[$_conta]);
	$data_0[$_conta] =intval($data_0[$_conta]);
	
	
$query1 = "SELECT premium, regiao_itabom FROM db_geral WHERE codigo_cliente='$data_0[$_conta]'";
$query1 = mysql_query($query1);
// Tirando o while
$dados = mysql_fetch_array($query1);

// Exibição
$confere_rede =  $dados['premium'];
$confere_regiao = $dados['regiao_itabom'];

//SE FOR REDE
if($confere_rede=='R'){
	$premium_itabom = '000000';

} else {
//SE NAO	VERIFICA TAMANHO DA CARGA DO CLIENTE
		if ($peso_conta>=2000){
		$premium_itabom = '0000FF';		
		} 		
		if ($peso_conta>=1001 AND $peso_conta<2000){
		$premium_itabom = 'FF007F';			
		}
		if ($peso_conta<=1000 AND $peso_conta>=501){
		$premium_itabom = '32CD32';			
		}
		if ($peso_conta<=500){
		$premium_itabom = 'FFA500';			
		}		
}

if($confere_rede=='B'){
	$premium_itabom = 'FFFF00';
}

$classif_x="S/CLASSIFICACAO";

if($confere_regiao!=''){
	$regiao_itabom_fixo = $confere_regiao;

	$seg_x = '';
	$ter_x = '';
	$qua_x = '';
	$qui_x = '';
	$sex_x = '';
	$sab_x = '';
} else {

	$regiao_itabom_fixo = 'SEM REGIAO';
	$seg_x = '1';
	$ter_x = '1';
	$qua_x = '1';
	$qui_x = '1';
	$sex_x = '1';
	$sab_x = '1';
}
//echo $regiao_itabom_fixo;

$query_transp_verifica = "SELECT * from controle_regiao where regiao='$regiao_itabom_fixo'";
//echo $query_transp_verifica;
$rs_transp_verifica = mysql_query($query_transp_verifica);
while($row_transp = mysql_fetch_array($rs_transp_verifica)){

	$transportadoras = $row_transp["transportadoras"];
	$veiculos = $row_transp["veiculos"];
	//echo $nome_transp . "xyz";

}


$import="INSERT into clientes(quais_veiculos, transportadoras, codigo_cliente, codigo_pedido, volume, peso, valor, premium, classificacao, regiao_itabom, seg, ter, qua, qui, sex, sab)values('$veiculos','$transportadoras','$data_0[$_conta]','$data_9[$_conta]','$data_6[$_conta]','$data_7[$_conta]', 0, '$premium_itabom', '$classif_x', '$regiao_itabom_fixo', '$seg_x', '$ter_x', '$qua_x', '$qui_x', '$sex_x', '$sab_x')";
			
if ($linha==null) 
break;



mysql_query($import);


/// VERIFICA DB_GERAL ////////////////////

$rs = mysql_query("select codigo_cliente,endereco_cad,latitude_cad,longitude_cad,premium,nome,endereco,cidade,estado,cep,setor,bairro,classificacao, regiao_itabom from db_geral where codigo_cliente=$data_0[$_conta]");														
//$rs = mysql_query($query);
//acha arquivo com id do cliente repetido
while($row = mysql_fetch_array($rs)){
			$id_cliente = $row["codigo_cliente"];

//	if($id_cliente == $data_0[$_conta]){	
			$conta_regs_existentes = $conta_regs_existentes + 1;			
			$end_cad = $row["endereco_cad"];
			$lat_cad = $row["latitude_cad"];
			$lgn_cad = $row["longitude_cad"];
			$confianca_cad = $row["confianca_cad"];
			$premium = $row["premium"];				
			$nome_geral= $row["nome"];
			$endereco_geral= $row["endereco"];
			$cidade_geral = $row["cidade"];
			$uf_geral = $row["estado"];
			$cep_geral = $row["cep"];		
			$setor = $row["setor"];				
			$bairro = $row["bairro"];

			$regiao_itabom = $row["regiao_itabom"];

			$query_regiao = "SELECT * from controle_regiao where regiao='$regiao_itabom'";
			$rs20 = mysql_query($query_regiao);
			$cont_regiao = mysql_num_rows($rs20);

			
				$dados = mysql_fetch_array($rs20);
				$seg = $dados['seg'];
				$ter = $dados['ter'];
				$qua = $dados['qua'];
				$qui = $dados['qui'];
				$sex = $dados['sex'];
				$sab = $dados['sab'];
			
			

			$classif= $row["classificacao"];
			if ($classif==""){

				$classif="S/CLASSIFICACAO";
			}

			if($lat_cad==NULL OR $lgn_cad==NULL) 
			{
			  $query2 = "UPDATE clientes SET nome='$nome_geral', endereco='$endereco_geral', cidade='$cidade_geral', bairro='$bairro', estado='$uf_geral', cep='$cep_geral', confianca_cad='0', setor='$setor', classificacao='$classif', regiao_itabom='$regiao_itabom', seg='$seg', ter='$ter', qua='$qua', qui='$qui', sex='$sex', sab='$sab' WHERE codigo_cliente = '$id_cliente'";

	
			} else {
			  $query2 = "UPDATE clientes SET nome='$nome_geral', endereco='$endereco_geral', cidade='$cidade_geral', bairro='$bairro', estado='$uf_geral', cep='$cep_geral', endereco_cad='$end_cad', latitude_cad='$lat_cad', longitude_cad='$lgn_cad', confianca_cad='101', setor='$setor', classificacao='$classif', regiao_itabom='$regiao_itabom', seg='$seg', ter='$ter', qua='$qua', qui='$qui', sex='$sex', sab='$sab' WHERE codigo_cliente = '$id_cliente'";	
				
			}

  
  $rs2= mysql_query($query2);
	} 
	

	$_conta = $_conta +1 ;
	
//}

	//// LOADING 0 A 100% ////////////////////////////////////////////////////
	$pega_loading = intval($_conta + 1) . " Registros inseridos";
	//print_r($linha);
    echo "<div style='position:absolute;margin:0px 0px 0px 0px;width:100%;height:40px;background:#2867b2;color:#2867b2;color: #FFFFFF;text-align:center;line-height:40px;'>$pega_loading</div>";
    flush();
    ob_flush();
	
//// LOADING 0 A 100% ////////////////////////////////////////////////////
	
}
fclose($arquivo);

}


/// ADICIONAR /////////////////////////////////////////////

if($escolha=="adicionar"){


while(!feof($arquivo)) {
  $linha = fgets($arquivo);

	//codigo cliente
	$data_0[$_conta] = substr($linha,1,8);
	//codigo pedido
	$data_9[$_conta] = substr($linha,9,20);
	//tira espaco vaziu do final
	$data_9[$_conta] =trim($data_9[$_conta]);	
	//volume
	$data_6[$_conta] = substr($linha,30,10);
	//peso
	$data_7[$_conta] = substr($linha,40,10);
	$peso_conta = $data_7[$_conta];	
	$data_0[$_conta] = rtrim($data_0[$_conta]);
	$data_0[$_conta] =utf8_encode($data_0[$_conta]);
	$data_0[$_conta] =intval($data_0[$_conta]);

	
$query1 = "SELECT premium, regiao_itabom FROM db_geral WHERE codigo_cliente='$data_0[$_conta]'";
$query1 = mysql_query($query1);
// Tirando o while
$dados = mysql_fetch_array($query1);

// Exibição
$confere_rede =  $dados['premium'];
$confere_regiao = $dados['regiao_itabom'];

//SE FOR REDE
if($confere_rede=='R'){
	$premium_itabom = '000000';

} else {
//SE NAO	VERIFICA TAMANHO DA CARGA DO CLIENTE
		if ($peso_conta>=2000){
		$premium_itabom = '0000FF';		
		} 		
		if ($peso_conta>=1001 AND $peso_conta<2000){
		$premium_itabom = 'FF007F';			
		}
		if ($peso_conta<=1000 AND $peso_conta>=501){
		$premium_itabom = '32CD32';			
		}
		if ($peso_conta<=500){
		$premium_itabom = 'FFA500';			
		}		
}
	
if($confere_rede=='B'){
	$premium_itabom = 'FFFF00';
}
// Query///////////////////////////////////////////////////////////////
$query2 = "SELECT codigo_pedido FROM clientes WHERE codigo_pedido='$data_9[$_conta]'";
$rs2 = mysql_query($query2);
$NumeroLinhas2 = mysql_num_rows($rs2);

$classif_x="S/CLASSIFICACAO";

if($NumeroLinhas2==0){

if($data_0[$_conta]!=""){

	if($confere_regiao!=''){
		$regiao_itabom_fixo = $confere_regiao;
	
		$seg_x = '';
		$ter_x = '';
		$qua_x = '';
		$qui_x = '';
		$sex_x = '';
		$sab_x = '';
	} else {
	
		$regiao_itabom_fixo = 'SEM REGIAO';
		$seg_x = '1';
		$ter_x = '1';
		$qua_x = '1';
		$qui_x = '1';
		$sex_x = '1';
		$sab_x = '1';
	}

	$query_transp_verifica = "SELECT * from controle_regiao where regiao='$regiao_itabom_fixo'";
	//echo $query_transp_verifica;
	$rs_transp_verifica = mysql_query($query_transp_verifica);
	while($row_transp = mysql_fetch_array($rs_transp_verifica)){

		$transportadoras = $row_transp["transportadoras"];
		$veiculos = $row_transp["veiculos"];

	}

$import="INSERT into clientes(quais_veiculos, transportadoras, codigo_cliente, codigo_pedido, volume, peso, valor, premium, classificacao, regiao_itabom, seg, ter, qua, qui, sex, sab)values('$veiculos','$transportadoras', '$data_0[$_conta]','$data_9[$_conta]','$data_6[$_conta]','$data_7[$_conta]', 0, '$premium_itabom', '$classif_x', '$regiao_itabom_fixo', '$seg_x', '$ter_x', '$qua_x', '$qui_x', '$sex_x', '$sab_x')";
			
	mysql_query($import);

	
}


} else {
$linha++;	
}


if ($linha==null) 
break;



///////////////////////////////////////////////////////////////	


/// VERIFICA DB_GERAL ////////////////////

$rs = mysql_query("select codigo_cliente,endereco_cad,latitude_cad,longitude_cad,premium,nome,endereco,cidade,estado,cep,setor,bairro,classificacao, regiao_itabom from db_geral where codigo_cliente=$data_0[$_conta]");		

//acha arquivo com id do cliente repetido
while($row = mysql_fetch_array($rs)){
	$id_cliente = $row["codigo_cliente"];

//	if($id_cliente == $data_0[$_conta]){	
			$conta_regs_existentes = $conta_regs_existentes + 1;			
			$end_cad = $row["endereco_cad"];
			$lat_cad = $row["latitude_cad"];
			$lgn_cad = $row["longitude_cad"];
			$confianca_cad = $row["confianca_cad"];
			$premium = $row["premium"];				
			$nome_geral= $row["nome"];
			$endereco_geral= $row["endereco"];
			$cidade_geral = $row["cidade"];
			$uf_geral = $row["estado"];
			$cep_geral = $row["cep"];		
			$setor = $row["setor"];				
			$bairro = $row["bairro"];
		
			$regiao_itabom = $row["regiao_itabom"];

			$query_regiao = "SELECT * from controle_regiao where regiao='$regiao_itabom'";
			$rs20 = mysql_query($query_regiao);
			$cont_regiao = mysql_num_rows($rs20);

			if($cont_regiao>0){
				$dados = mysql_fetch_array($rs20);
				$seg = $dados['seg'];
				$ter = $dados['ter'];
				$qua = $dados['qua'];
				$qui = $dados['qui'];
				$sex = $dados['sex'];
				$sab = $dados['sab'];
			} else {
				$regiao_itabom = 'SEM REGIAO';
				$seg = '1';
				$ter = '1';
				$qua ='1';
				$qui = '1';
				$sex ='1';
				$sab = '1';
			}


			$classif = $row["classificacao"];
			if ($classif==""){

				$classif="S/CLASSIFICACAO";
			}

			
			if($lat_cad==NULL OR $lgn_cad==NULL) 
			{
			  $query2 = "UPDATE clientes SET nome='$nome_geral', endereco='$endereco_geral', cidade='$cidade_geral', bairro='$bairro', estado='$uf_geral', cep='$cep_geral', confianca_cad='0', setor='$setor', classificacao='$classif', regiao_itabom='$regiao_itabom', seg='$seg', ter='$ter', qua='$qua', qui='$qui', sex='$sex', sab='$sab' WHERE codigo_cliente = '$id_cliente'";
	
			} else {
			  $query2 = "UPDATE clientes SET nome='$nome_geral', endereco='$endereco_geral', cidade='$cidade_geral', bairro='$bairro', estado='$uf_geral', cep='$cep_geral', endereco_cad='$end_cad', latitude_cad='$lat_cad', longitude_cad='$lgn_cad', confianca_cad='101', setor='$setor', classificacao='$classif', regiao_itabom='$regiao_itabom', seg='$seg', ter='$ter', qua='$qua', qui='$qui', sex='$sex', sab='$sab' WHERE codigo_cliente = '$id_cliente'";	
				
			}

  
  $rs2= mysql_query($query2);
	} 
	

	$_conta = $_conta +1 ;
	
//}
	//// LOADING 0 A 100% ////////////////////////////////////////////////////
	$pega_loading = intval($_conta + 1) . " Registros inseridos";
	
    echo "<div style='position:absolute;margin:0px 0px 0px 0px;width:100%;height:40px;background:#2867b2;color:#2867b2;color: #FFFFFF;text-align:center;line-height:40px;'>$pega_loading</div>";
    flush();
    ob_flush();
	
//// LOADING 0 A 100% ////////////////////////////////////////////////////

}
		
fclose($arquivo);
//mysql_close($id);

}
	
  
//CLASSIFICACAO////////////////
$query_classifica = "select classificacao from clientes group by classificacao";														
$rs_classifica = mysql_query($query_classifica);

while ($row_classifica = mysql_fetch_array($rs_classifica)) {
   $cla =  $row_classifica['classificacao'];

$query_cla = "INSERT into classificacao(classificacao) values ('$cla')";


$query_cla= mysql_query($query_cla);

}

//////////////////////////////////////////

// REGIAO ITABOM /////////////
$query_setor = "select regiao_itabom from clientes group by regiao_itabom";														
$rs_setor = mysql_query($query_setor);

while ($row_setor = mysql_fetch_array($rs_setor)) {
   $ve =  $row_setor['regiao_itabom'];



$query_ve = "INSERT into regiao_itabom(regiao) values ('$ve')";
$query_ve= mysql_query($query_ve);

}

//////////////////////////////////////////

// TRANSP /////////////
$query_transp = "select nome from transportadora";                                                       
$rs_transp = mysql_query($query_transp);

while ($row_transp = mysql_fetch_array($rs_transp)) {

	$conta_transp=0;

   $transp =  $row_transp['nome'];

                $query_vai = "SELECT * from clientes where transportadoras LIKE '%$transp%'";
                $rs_vai = mysql_query($query_vai);
                 while ($row_vai = mysql_fetch_array($rs_vai)) {

                        $conta_transp++;
                 }

                 if($conta_transp>0){
                    $query_x = "INSERT into transportadora_itabom(transportadora) values ('$transp')";
                    $query_x= mysql_query($query_x);

                 }

}


// VEICULOS /////////////
$query_veiculos = "select nome from veiculos";                                                       
$rs_veiculos = mysql_query($query_veiculos);



while ($row_veiculos = mysql_fetch_array($rs_veiculos)) {

//	$conta_transp=0;

$junta_regiao = "";

   $veiculo =  $row_veiculos['nome'];

                $query_achou = "SELECT * from controle_regiao where veiculos LIKE '%$veiculo%'";
                $rs_achou = mysql_query($query_achou);
				

                 while ($row_achou = mysql_fetch_array($rs_achou)) {
					$seg1 =  $row_achou['seg'];
					$ter1 =  $row_achou['ter'];
					$qua1 =  $row_achou['qua'];
					$qui1 =  $row_achou['qui'];
					$sex1 =  $row_achou['sex'];
					$sab1 =  $row_achou['sab'];

					$junta_regiao .= $row_achou['regiao'] . ", ";
 //  $conta_transp++;
                 }

            
					$query_ok = mysql_query("UPDATE veiculos SET seg='$seg1', ter='$ter1', qua='$qua1', qui='$qui1', sex='$sex1', sab='$sab1', regiao_itabom='$junta_regiao' where nome='$veiculo'");
                     

}



?>
</div>
</div>
</div>

<?php
echo "<script>document.getElementById('loading').style.display = 'none'</script>";
$sql = mysql_query("SELECT * FROM clientes");

$total = mysql_num_rows($sql);


if($total==0 OR $controle_campo0 == "yes")
{ 

//echo $nome_veiculo;
?> 


<div id="apDiv11">


<table border="0">
<tr style="height: 45px; vertical-align: button">
<td>

<strong><font size="5">


 <?php 

echo  "IMPORTAÇÃO MAL SUCEDIDA!"; 

?>

</font></strong></td>
</tr>

<tr style="height: 25px; vertical-align: top" >
<td>VOLTE E INSIRA UM ARQUIVO VALIDO!</td>
</tr>
<tr style="height:30px;vertical-align: top">
<td><hr style="border: none; width:280px;" ></td>
</tr>
<tr style="height: 35px;vertical-align: button">
<td><strong><font size="4">CHECK-LIST!</font></strong></td>
</tr>
<tr style="height: 25px;vertical-align: top">
<td><hr style="border: none; width:110px;" ></td>
</tr>

</table>



<table>

<tr style="height: 30px;">

<td ><p style="font-size:12px"><strong>ARQUIVO "<?php echo $abreviado; ?>" LIDO!</p></td>
<td><span class="material-icons" style="color:red">
clear
</span></td>
</tr>


<tr style="height: 30px;">

<td><p style="font-size:12px">IMPORTAÇÃO COM PROBLEMA!</p></td>
<td><span class="material-icons" style="color:red">
clear
</span></td>
</tr>


<tr style="height: 30px;">

<td><p style="font-size:12px">NÚMEROS DE REGISTROS INSERIDOS:</p></td>
<td><strong style="color:red">&nbsp;<?php echo $_conta; ?></strong></td>
</tr>


<tr style="height: 30px;">

<td><p style="font-size:12px">NÚMEROS DE REGISTROS ENCONTRADOS NAS BASES ANTIGAS:</p></td>
<td><strong style="color:red">&nbsp;<?php echo $conta_regs_existentes; ?></strong></td>
</tr>

</table>
 


<br><br><br>
<input
    action="action"
    onclick="window.history.go(-1); return false;"
    type="submit"
    value="VOLTAR"
/>

<?php
} else {
	?>
<form enctype='multipart/form-data' action='step1_1.php' method='POST' name="form" id="form">

<div id="apDiv11">

<table border="0">
<tr style="height: 45px; vertical-align: button">
<td>

<strong><font size="5">


 <?php 

echo  "IMPORTAÇÃO BEM SUCEDIDA!"; 

?>

</font></strong></td>
</tr>

<tr style="height: 25px; vertical-align: top" >
<td>AVANCE PARA AJUSTAR AS GEOLOCALIZAÇÕES!</td>
</tr>
<tr style="height:30px;vertical-align: top">
<td><hr style="border: none; width:100%;" ></td>
</tr>
<tr style="height: 35px;vertical-align: button">
<td><strong><font size="4">CHECK-LIST!</font></strong></td>
</tr>
<tr style="height: 25px;vertical-align: top">
<td><hr style="border: none; width:110px;" ></td>
</tr>

</table>





<table>

<tr style="height: 30px;">

<td><p style="font-size:12px"><strong>ARQUIVO "<?php echo $abreviado; ?>" LIDO!</p></td>
<td><span class="material-icons" style="color:green">
done
</span></td>
</tr>


<tr style="height: 30px;">

<td><p style="font-size:12px">IMPORTAÇÃO FEITA COM SUCESSO!</p></td>
<td><span class="material-icons" style="color:green">
done
</span></td>
</tr>


<tr style="height: 30px;">

<td><p style="font-size:12px">NÚMEROS DE REGISTROS INSERIDOS:</p></td>
<td><strong style="color:green">&nbsp;<?php echo $_conta; ?></strong></td>
</tr>


<tr style="height: 30px;">

<td><p style="font-size:12px">NÚMEROS DE REGISTROS ENCONTRADOS NAS BASES ANTIGAS:</p></td>
<td><strong style="color:green">&nbsp;<?php echo $conta_regs_existentes; ?></strong></td>
</tr>

</table>
 
<br>

<input
    action="action"
    onclick="window.history.go(-1); return false;"
    type="submit"
    value="VOLTAR"
/>

<input type='submit' name='submit' value='AVANÇAR'/>


</form>
<?php	
}


//Visualizar formulário de transferência
} else {
?>

<form enctype='multipart/form-data' action='step1.php' method='POST' name="form" id="form">
<div id="apDiv11">


<table border="0">
<tr style="height: 45px; vertical-align: button">
<td>

<strong><font size="5">


 <?php 

echo  "VAMOS LÁ, "  . $logado . "!"; 

?>

</font></strong></td>
</tr>

<tr style="height: 25px; vertical-align: top" >
<td>VAMOS FAZER A IMPORTAÇÃO DO ARQUIVO DE TRABALHO!</td>
</tr>
<tr style="height:30px;vertical-align: top">
<td><hr style="border: none; width:100%;" ></td>
</tr>
<tr style="height: 35px;vertical-align: button">
<td><strong><font size="4">IMPORTAR!</font></strong></td>
</tr>
<tr style="height: 25px;vertical-align: top">
<td><hr style="border: none; width:105px;" ></td>
</tr>

</table>





<table>

<tr>
<td><input type="radio" value="inserir" name="escolha" checked/></td>
<td><p style="font-size:12px">&nbsp;&nbsp;INSERIR NOVA LISTA DE CLIENTES!</p></td>
</tr>


<tr>
<td ><input type="radio" value="adicionar" name="escolha"/></td>
<td ><p style="font-size:12px">&nbsp;&nbsp;ADICIONAR A LISTA EXISTENTE.</p></td>
</tr>

</table>
 <br /> <br />
 <label class="file-upload">
		  <span>PROCURAR</span>
		  <input name="filename" id="filename" type="file">

	  </label>
  <br /> <br />
  <table>


</table>
 <input type='submit' name='submit' value='AVANÇAR' onclick="return enviardados();" />


  
</div>

</form>
  <?php 
  }
  ?>

<br>


</body>
</html>