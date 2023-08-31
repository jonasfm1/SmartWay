<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
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

<style type="text/css"></style>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>

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
    window.history.back()
}

function enviardados(){
if(document.form.filename.value=="")

{
alert( "Clique em 'PROCURAR' e escolha um arquivo .txt para inserir!" );

document.form.filename.focus();

return false;

}

}

</SCRIPT>
<?php include ('session.php'); 
?>
</head>
<body>


<?php
include ('essence/conecta.php');
include ('base1.php'); 
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
	
$query_where1 = "UPDATE passo SET ok='no' WHERE (id='2' OR id='3' OR id='4' OR id='5')";
$rs_where1 = mysql_query($query_where1);

	
} 

if($escolha=="inserir"){
	
$deleterecords = "TRUNCATE TABLE clientes"; //Esvaziar a tabela
mysql_query($deleterecords);	


$query_deleta = "UPDATE veiculos SET peso_total=null, volume_total=null, valor_total=null, equipe=null, ocupado='0'";
$rs_deleta = mysql_query($query_deleta);


$query_where1 = "UPDATE passo SET ok='no' WHERE (id='2' OR id='3' OR id='4' OR id='5')";
$rs_where1 = mysql_query($query_where1);


} 





//Importar o arquivo transferido para o banco de dados
$handle = fopen($_FILES['filename']['tmp_name'], "r") or die("O SISTEMA NÃO CONSEGUIU ABRIR O ARQUIVO $handle");


//echo $handle;
$_conta = 0;
$conta_regs_existentes =  0;



?> 

<div id="loading" style="position:absolute; width:100%; height:100%; background-color:#000000; z-index:99999; top:0;">
<div style="height:100px;background-color:#000000; width:400px; position: relative; top: 50%; margin-top:-50px; left:50%; margin-left:-200px">
  <div id="progress" style="position: relative; left: 28px; top: 28px; width: 340px; height: 40px; background-color: #6f99d6; layer-background-color: #6f99d6; border: 1px none #000000; font-family:Arial, 'Helvetica Neue', Helvetica, sans-serif; font-size:12px;">


<?php



while (($data = fgetcsv($handle, 1000, ';')) != FALSE) {




	$_conta = $_conta + 1;
/*	$Linha = fgets($handle);
	$data_0[$_conta] = substr($Linha,1,14);
	$data_9[$_conta] = substr($Linha,15,10);
	$data_6[$_conta] = substr($Linha,26,9);
	*/
	
	$data_0 = str_replace("'", "`", $data[0]);	
	$data_1 = str_replace("'", "`", $data[1]);
	$data_2 = str_replace("'", ",", $data[2]);
	
	
	$data_3 = substr_replace("´", " ", $data[3]);
	$data_3 = str_replace("'", " ", $data[3]);
	
	$data_4 = str_replace("'", "`", $data[4]);
	$data_5 = str_replace("'", "`", $data[5]);
	$data_6 = str_replace(",", ".", $data[6]);
	$data_7 = str_replace(",", ".", $data[7]);
	$data_8 = str_replace(",", ".", $data[8]);
	
	$data_9 = str_replace(",", ".", $data[9]);
	$data_10 = str_replace(",", ".", $data[10]);
	$data_11 = str_replace(",", ".", $data[11]);
	
	
	$data_1 = utf8_encode($data_1);
	$data_2 = utf8_encode($data_2);
	$data_3 = utf8_encode($data_3);
	$data_4 = utf8_encode($data_4);
	$data_5 = utf8_encode($data_5);
	
	
	$data_9 = utf8_encode($data_9);
	$data_10 = utf8_encode($data_10);
	$data_11 = utf8_encode($data_11);
	

///////////////////////////////////////////////////////////////////////	
	
	$query_where1 = "UPDATE passo SET ok='yes' WHERE id='1'";
	$rs_where1 = mysql_query($query_where1);
	
	$query_where = "UPDATE passo SET ok='no' WHERE (id='2' OR id='3' OR id='4' OR id='5')";
	$rs_where = mysql_query($query_where);

///////////////////////////////////////////////////////////////////////


	$controle_campo0 = "";
	if ($data_2=="" and $data_3=="" and $data_4=="" and $data_5==""){
	
	$controle_campo0= "yes";
	
	$import="INSERT into clientes(codigo_cliente, nome, endereco, cidade, estado, cep, peso, volume, valor, codigo_pedido, obs_pedido)values($data_0,'ERRO','ERRO','ERRO','ERRO','ERRO','ERRO','ERRO','ERRO','ERRO','ERRO')";
	} 
	
	if ($data_0==""){
	
	$controle_campo0= "yes";
	
	$import="INSERT into clientes(codigo_cliente, nome, endereco, cidade, estado, cep, peso, volume, valor, codigo_pedido, obs_pedido)values('ERRO','ERRO','ERRO','ERRO','ERRO','ERRO','ERRO','ERRO','ERRO','ERRO','ERRO')";
	} 
	

	if ($data_6==0 and $data_7==0 and $data_8==0){
	
	$import="INSERT into clientes(codigo_cliente, nome, endereco, cidade, estado, cep, peso, volume, valor, codigo_pedido, obs_pedido, setor)values('$data_0','$data_1','$data_2','$data_3','$data_4','$data_5','0.01','0.00','0.00','$data_9','$data_10','$data_11')";
	
	} else {
	$controle_campo0= "no";
	
	$import="INSERT into clientes(codigo_cliente, nome, endereco, cidade, estado, cep, peso, volume, valor, codigo_pedido, obs_pedido, setor)values('$data_0','$data_1','$data_2','$data_3','$data_4','$data_5','$data_6','$data_7','$data_8','$data_9','$data_10','$data_11')";
	
	}
	
	
	
mysql_query($import) or die(mysql_error());


$query = "select * from db_geral";														
$rs = mysql_query($query);

//acha arquivo com id do cliente repetido
while($row = mysql_fetch_array($rs)){
	$id_cliente = $row["codigo_cliente"];
	$end_cliente = $row["endereco"];
	$codigo = $row["codigo"];
	
	
	///COLOCAR SO ID-CLIENTE / SAYERLACK NAO CRUZA
	//if($id_cliente == $data_0 and $end_cliente == $data_2){
	if($id_cliente == $data_0){	
		$conta_regs_existentes++;
			$end_cad = $row["endereco_cad"];
			$lat_cad = $row["latitude_cad"];
			$lgn_cad = $row["longitude_cad"];
			$confianca_cad = $row["confianca_cad"];
			$geomanual_cad = $row["geo_manual"];	
			$veiculo_cad = $row["veiculo"];	
			$premium = $row["premium"];	
			//echo $premium;
			
  $query2 = "UPDATE clientes SET endereco_cad='$end_cad', latitude_cad='$lat_cad', longitude_cad='$lgn_cad', confianca_cad='$confianca_cad', geo_manual='$geomanual_cad', premium='$premium', codigo_db_gera='$codigo' WHERE codigo_cliente = '$id_cliente'";
  
  $rs2= mysql_query($query2);
	} 

}

//// LOADING 0 A 100% ////////////////////////////////////////////////////
	$pega_loading = intval($_conta + 1) . " Registros inseridos";
	
    echo "<div style='position:absolute;margin:0px 0px 0px 0px;width:100%;height:40px;background:#2867b2;color:#2867b2;color: #FFFFFF;text-align:center;line-height:40px;'>$pega_loading</div>";
    flush();
    ob_flush();
	
//// LOADING 0 A 100% ////////////////////////////////////////////////////

//echo $_conta. "\n";
}
fclose($handle);

?>
</div>
</div>
</div>

<?php
echo "<script>document.getElementById('loading').style.display = 'none'</script>";
$sql = mysql_query("SELECT * FROM clientes");

$total = mysql_num_rows($sql);

if($total==0 OR $controle_campo0 == "yes" OR strstr($procurarem,",") )
{ 

echo $nome_veiculo;
?> 


<div id="apDiv11"><img src="imgs/bg_box_step1_1.png" width="638" height="384" />
<div id="apDiv13a"><input type='submit' name='submit' value='VOLTAR' onclick="goBack()"/></div>
  <div id="apDiv12a"><strong><?php echo $_conta; ?></strong></div>
  <div id="apDiv12b"><strong><?php echo $conta_regs_existentes; ?></strong></div>
  <div id="apDiv12c">
  <img src="imgs/erro.png" width="41" height="44" />
  </div>
  <div id="apDiv12d">
  <img src="imgs/erro.png" width="41" height="44" />
  </div>
  
  <div id="apDiv14a">

<strong>ARQUIVO "<?php echo $abreviado; ?>" LIDO COM SUCESSO!<br/><br/>

IMPORTAÇÃO FEITA COM SUCESSO!<br/><br/>

NÚMEROS DE REGISTROS INSERIDOS:<br/><br/>

NÚMEROS DE REGISTROS ENCONTRADOS NAS BASES ANTIGAS:</strong><br/><br/>
</div>

<div id="help2" class="help2"><img src="imgs/help.png" width="45" height="45" alt=""/><div id="sidebar2">• Foram diagnosticados <strong>ERROS</strong> na importação!<br /><br />
    • Clique em <strong>VOLTAR</strong> e siga os passos corretos para importação do arquivo!<br /><br />
     • Caso esteja com dúvida na importação entre em contato conosco no <strong>(11)5505 6542</strong>.
    </div>
    
</div>
<div id="apDiv16"></div>
<div id="apDiv18"></div>

<?php
} else {
	?>
<form enctype='multipart/form-data' action='step1_1.php' method='POST' name="form" id="form">

<div id="apDiv11"><img src="imgs/bg_box_step1_1.png" width="638" height="384" />

  <div id="apDiv12a"><strong><?php echo $_conta; ?></strong></div>
  <div id="apDiv12b"><strong><?php echo $conta_regs_existentes; ?></strong></div>
  <div id="apDiv12c">
  <img src="imgs/certo.png" width="41" height="44" />
  </div>
  <div id="apDiv12d">
  <img src="imgs/certo.png" width="41" height="44" />
  </div>
  <div id="apDiv13_todos">
  <div id="apDiv13"><input type='submit' name='submit' value='AVANÇAR'/></div>
  <div id="apDiv13b"><input type='submit' name='submit' value='VOLTAR' onclick="goBack()"/></div>
  </div>


<div id="apDiv14a">

<strong>ARQUIVO "<?php echo $abreviado; ?>" LIDO COM SUCESSO!<br/><br/>

IMPORTAÇÃO FEITA COM SUCESSO!<br/><br/>

NÚMEROS DE REGISTROS INSERIDOS:<br/><br/>

NÚMEROS DE REGISTROS ENCONTRADOS NAS BASES ANTIGAS:</strong><br/><br/>
</div>

<div id="help1" class="help1"><img src="imgs/help.png" width="45" height="45" alt=""/><div id="sidebar1"><p>• A importação foi feita com <strong>SUCESSO!</strong><br /><br />
    <p>• Clique em <strong>AVANÇAR</strong> para a Geocodificação Automática começar.</p>
    
    </div>


</div>






</form>
<?php	
}


//Visualizar formulário de transferência
} else {
?>

<form enctype='multipart/form-data' action='step1.php' method='POST' name="form" id="form">
<div id="apDiv11"><img src="imgs/bg_box_step1.png" width="447" height="82" />
  <div id="apDiv20"><input type='submit' name='submit' value='AVANÇAR' onclick="return enviardados();" /></div>
<div id="apDiv14_titulo"><font color="#FFFFFF"><strong>ESCOLHA UMA DAS OPÇÕES ABAIXO!</strong></font></div>

  <div id="apDiv14_imagem">
IMPORTANTE: O ARQUIVO PRECISA ESTAR NO FORMATO ".CSV"!

</div>


<div id="apDiv16_a">

  <div id="apDiv19">
<div id="escolha"><input type="radio" value="inserir" name="escolha" checked="checked"/>
  &nbsp;&nbsp;INSERIR LISTA DE CLIENTES</div>
<div id="escolha1">
<input type="radio" value="adicionar" name="escolha"/>
&nbsp;&nbsp;ADICIONAR A LISTA DE CLIENTES EXISTENTE</div>
<div class="field">
		<label class="file-upload">
		  <span>PROCURAR</span>
		  <input name="filename" id="filename" type="file" accept=".txt">
	  </label>
	</div>

</div>
</div>
  
</div>


<div id="help" class="help"><img src="imgs/help.png" width="45" height="45" alt=""/><div id="sidebar"><p>• Escolha entre <strong>"INSERIR LISTA DE CLIENTES"</strong> ou <strong>"ADICIONAR A LISTA DE CLIENTES EXISTENTE".</strong><br /><br />
 <p>• Segue abaixo o exemplo do formato da <strong>LISTA</strong>! Precisa estar <strong>NESSA ORDEM!</strong></p>
    <br />
    <p>• Os campos em <strong>VERDE</strong> são obrigatórios!<strong> NÂO INSIRA A PRIMEIRA LINHA COM OS NOMES DOS CAMPOS!</strong></p>
    <br /><br />
    <p><img src="imgs/exemplo_tabela.png" width="750" height="91" alt=""/></p>
    <br /><br />
    <p>• Escolha o arquivo que deseja importar para o sistema clicando no botão  <strong>PROCURAR. SEMPRE ARQUIVOS .CSV!</strong><br /><br />• Clique em <strong>AVANÇAR</strong> para começar a importação.</p>
    </div>
  
</div>
  
<div id="apDiv18"></div>


  <?php 
  }
  ?>



</body>
</html>