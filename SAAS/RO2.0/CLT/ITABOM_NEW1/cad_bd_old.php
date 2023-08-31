<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>::. ROTAS ONLINE .:: CADD</title>
<link rel="stylesheet" type="text/css" href="css/menu.css">
<link rel="stylesheet" type="text/css" href="css/cad_bd.css">
<link rel="shortcut icon" href="imgs/favicon.ico" >
 <link rel="icon" type="image/gif" href="imgs/animated_favicon1.gif" >
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<script language="javascript" type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<script type='text/javascript' src="control/timer.js"></script>
<script src="js/logger.js"></script>
<script src="js/flutuante.js"></script>
<script LANGUAGE="JavaScript">

function confirmaExclusao(aURL) {

if(confirm('Você tem certeza que deseja excluir este cliente?')) {

location.href = aURL;

//target=ver;

}
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

 
</SCRIPT>

<?php 
include ('session.php');
include ('essence/conecta.php');
ini_set('max_execution_time',12000);


//$_seleciona = $_GET['select'];
//echo $_seleciona;

$dbname_cliente="ro_".$logado; // Indique o nome do banco de dados que será aberto
//echo $dbname_cliente;

if(!($con=mysql_select_db($dbname_cliente,$id))) {
echo "</br>Não foi possível estabelecer uma conexão com o gerenciador MySQL.</br>";
echo "Favor contactar o Administrador no telefone (11) 5505 6542.</br></br>";
echo "PRODUTO REGISTRADO CADDESIGN";
exit;
}

// ERRO BANCO VAZIO
$query = "select * from db_geral";															
$rs = mysql_query($query) or die("Erro no query ". mysql_error());
$_conta_x= mysql_num_rows($rs);

?>

</head>
<div class="jquery-waiting-base-container"></div>
<body>

<?php include ('base_cad.php'); ?>

<div id="apDiv11">
<table width="100%" border="0" cellpadding="0" cellspacing="0">
    <tr>
      <td width="50" height="50"><strong><font size="+1"><img src="imgs/icon_config.png" width="50" height="50" /></font></strong></td>
      <td align="left" valign="middle"><strong><font size="+1">&nbsp;&nbsp;CONTROLE DE BANCO DE DADOS</font></strong>
    
      </td>
      <td width="50">
      </td>
    </tr>
</table>
<br /><br />
<table  border="0" cellpadding="0" cellspacing="0">
  <tbody>
    <tr>
     <form action="cad_bd.php" method="get">
      <td nowrap="nowrap" style="font-family:arial; font-size:11px">
      <input type="hidden" name="what" id="what" value="codigo_cliente"/>
&nbsp;<input type="search" name="like" id="like"  placeholder="Filtrar por Código!"/></td>
      <td width="102"><input type="submit" value="PROCURAR" /></td>
      </form>
     <form action="cad_bd.php" method="get">
      <td nowrap="nowrap" style="font-family:arial; font-size:11px">
      <input type="hidden" name="what" id="what" value="nome"/>
&nbsp;<input type="search" name="like" id="like"  placeholder="Filtrar por Nome!"/></td>
      <td width="102"><input type="submit" value="PROCURAR" /></td>
      </form>
      <form action="cad_bd.php" method="get">
      <td align="right" nowrap="nowrap"  style="font-family:arial; font-size:11px">
      <input type="hidden" name="what" id="what" value="cidade"/>
 &nbsp;<input type="search" name="like" id="like" placeholder="Filtrar por Cidade!" />      </td
      ><td width="102"><input type="submit" value="PROCURAR" /></td>
      </form>
    </tr>
  </tbody>
</table>
 <div id="apDiv12">
 <div id="total">
 <?php
 
 $_palavra = $_GET['like'];
 $_qual = $_GET['what'];
 
// banco vazio
 if($_conta_x==0){
echo "Banco de dados ainda vazio!";
} else {

 $query_novo = "select * from db_geral where $_qual like '%$_palavra%' ";
 $rs_novo = mysql_query($query_novo);

if ($_palavra==""){
	echo "<font size='2'>" . "Consulta no Banco de Dados ainda vazia!<br><br> Escolha acima entre filtrar por <strong>'Código'</strong>, <strong>'Nome'</strong> ou <strong>'Cidade'</strong> e clique no botão 'PROCURAR'!" . "</font>";
} else {
if(mysql_num_rows($rs_novo)>0){
?>
 <table width="100%" border="1" id="tabela" name="tabela" class="bordasimples" cellpadding="2" cellspacing="2">
   
<tr bgcolor="#DADADA" height='25px'>
<td bgcolor="#589bd4" width="21px"><div align="center"><font color="#FFFFFF">GM</font></div></td>
<td bgcolor="#589bd4" width="21px"><div align="center"><font color="#FFFFFF">EDIT</font></div></td>
<td bgcolor="#2867b1" width="66px"><div align="center"><font color="#FFFFFF">CÓD. CLIENTE</font></div></td>                                                                
<td bgcolor="#2867b1" height="25px" width="200px"><div align="center"><font color="#FFFFFF">NOME</font></div></td>  
<td bgcolor="#2867b1" width="200px"><div align="center"><font color="#FFFFFF">ENDEREÇO</font></div></td>    
<td bgcolor="#2867b1" width="100px"><div align="center"><font color="#FFFFFF">CIDADE</font></div></td> 
<td bgcolor="#2867b1" width="30px"><div align="center"><font color="#FFFFFF">ESTADO</font></div></td>
<td bgcolor="#2867b1" width="50px"><div align="center"><font color="#FFFFFF">CEP</font></div></td>
<td bgcolor="#2867b1" width="30px"><div align="center"><font color="#FFFFFF">SEGMENTO</font></div></td>
<td bgcolor="#589bd4" width="30px"><div align="center"><font color="#FFFFFF">EXCLUIR</font></div></td>
</tr>
<?php												
while($row = mysql_fetch_array($rs_novo)){
	
	
	$guarda = "bd_gm.php?h=" . $row["latitude_cad"] . "&v=" . $row["longitude_cad"] . "&reg=". $row["codigo_cliente"]. "&endereco=". $row["endereco"] . "&codigo=". $row["codigo"] . "&cod_cli=". $row["codigo_cliente"] ."&nome=". $row["nome"] . "&cidade=". $row["cidade"] . "&uf=". $row["estado"] . "&cep=". $row["cep"]."&peso=". $row["peso"] . "&valor=". $row["valor"]."&volume=". $row["volume"]; 
	
	$guarda_edit = "bd_edit.php?codigo=". $row["codigo"]; 
	
?>
<tr align='center'>
<td align="center" bgcolor="#FFF"><a href="<?php echo $guarda; ?>" data-tooltip="Geocodificação Manual"><img src="imgs/icon_geomanual.png" width="21" alt=""/></a></td>
<td>
<a href="<?php echo $guarda_edit; ?>" data-tooltip="Editar dados do cliente"><img src="imgs/editar.png" width="21" height="16" /></a>
</td>

<td><?php echo $row["codigo_cliente"] ?></td>
<td><?php echo $row["nome"] ?></td>
<td><?php echo $row["endereco"] ?></td>
<td><?php echo $row["cidade"] ?></td>
<td><?php echo $row["estado"] ?></td>
<td><?php echo $row["cep"] ?></td>
<td><?php echo $row["premium"] ?></td>
 <td><a href="scripts.php?acao=exclui_cliente&id=<?php echo $row["codigo"] ?>"><img src="imgs/erro_cad.png" width="20" height="18" alt=""/></a></td>
</tr>
<?php		
}
?>
</table>
 <?php
} else {	
echo "<font size='2'>" .  "Sua consulta não encontrou registros!" . "</font>";	
}	




}

}
?>
   </div>
</div>
</div> 

   
</body>
</html>