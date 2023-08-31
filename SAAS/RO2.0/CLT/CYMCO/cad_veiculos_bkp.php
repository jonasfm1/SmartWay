<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>::. ROTAS ONLINE .:: CADD</title>
<link rel="stylesheet" type="text/css" href="css/menu_cad_veiculos.css">
<link rel="stylesheet" type="text/css" href="css/cad_veiculos.css">
<link rel="shortcut icon" href="imgs/favicon.ico" >
 <link rel="icon" type="image/gif" href="imgs/animated_favicon1.gif" >
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>

<script language="javascript" type="text/javascript" src="js/jquery.colorPicker.js"/></script>
<script type='text/javascript' src="control/timer.js"></script>
<script src="js/logger.js"></script>

<?php
$editar = $_GET['edit'];
$id_quem= $_GET['id'];
$cor_pega = $_GET['color'];
$_seleciona = $_GET['select'];


?>
<link rel="stylesheet" href="css/colorPicker.css" type="text/css" />
<style>
   
div.controlset {display: block; width: 100%; padding: 0.25em 0;}

div.controlset label, 
div.controlset input,
div.controlset div { display: inline; float: right; }

div.controlset label { width: 200px;}
</style>
<script LANGUAGE="JavaScript">

function confirmaExclusao(aURL) {

if(confirm('Você tem certeza que deseja excluir este veículo? Todas Rotas e todos clientes agrupados a ele perderam o vínculo!')) {

location.href = aURL;

//target=ver;

}
}

function confirmaInativo(aURL) {

if(confirm('Você tem certeza que deseja inativar este veículo? Todas Rotas e todos clientes agrupados a ele perderam o vínculo!')) {

location.href = aURL;

//target=ver;

}
}





function enviardados(){

if(document.adiciona.veiculo.value=="")

{

alert("Preencha o campo 'Nome do veículo'!");

document.adiciona.veiculo.focus();

return false;

}
	
if(document.adiciona.peso.value=="" || document.adiciona.peso.value==0)

{

alert("Preencha o campo 'Peso'! Esse campo não pode ter valor zero ou valor nulo!");

document.adiciona.peso.focus();

return false;

}


if(document.adiciona.volume.value=="" || document.adiciona.volume.value==0)

{

alert("Preencha o campo 'Volume'! Esse campo não pode ter valor zero ou valor nulo!");

document.adiciona.volume.focus();

return false;

}


if(document.adiciona.valor.value=="" || document.adiciona.valor.value==0)

{

alert("Preencha o campo 'Valor'! Esse campo não pode ter valor zero ou valor nulo!");

document.adiciona.valor.focus();

return false;

}

if(document.adiciona.type[0].checked == false && document.adiciona.type[1].checked == false && document.adiciona.type[2].checked == false && document.adiciona.type[3].checked == false && document.adiciona.type[4].checked == false && document.adiciona.type[5].checked == false)

{

alert("Preencha o campo 'Tipo de Veículo'!");

document.adiciona.type[0].focus();

return false;

}

}

</SCRIPT>
<script LANGUAGE="JavaScript">

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
?>
</head>

<body>
<?php include ('base_cad.php'); ?>
<div id="apDiv11"><img src="imgs/bg_box_cad_veiculo.png" width="447" height="82" />

  <div id="apDiv12">
  <div id="total">
    <table width="100%" border="1" id="tabela" name="tabela" class="bordasimples" cellpadding="2" cellspacing="2">
<tr bgcolor="#DADADA">
<td bgcolor="#5cbc69" width="66px"> 
<div align="center"><font color="#FFFFFF"><a href="?select=ativo">ATIVO</a></font></div>
</td>
<td bgcolor="#5cbc69" height="25px" width="300px"> 
<div align="center"><font color="#FFFFFF"><a href="?select=nome">NOME</a></font></div>
</td> 
<td bgcolor="#5cbc69" height="25px" width="300px"> 
<div align="center"><font color="#FFFFFF"><a href="?select=transportadora">TRANSPORTADORA</a></font></div>
</td> 
 
<td bgcolor="#5cbc69" width="30px"> 
<div align="center"><font color="#FFFFFF">ICONE</font></div>
</td>    
<td bgcolor="#5cbc69" width="200px"> 
<div align="center"><font color="#FFFFFF"><a href="?select=tipo">TIPO</a></font></div>
</td>                                                                                          
<td bgcolor="#5cbc69" width="200px"> 
<div align="center"><font color="#FFFFFF"><a href="?select=peso">PESO</a></font></div>
</td>                                                                  
<td bgcolor="#5cbc69" width="200px"> 
<div align="center"><font color="#FFFFFF"><a href="?select=volume">VOLUME</a></font></div>
</td>
<td bgcolor="#5cbc69" width="200px"> 
<div align="center"><font color="#FFFFFF"><a href="?select=valor">VALOR</a></font></div>
</td>   
<td bgcolor="#5cbc69" width="200px"> 
<div align="center"><font color="#FFFFFF"><a href="?select=setor">SETOR</a></font></div>
</td>                                                             
<td bgcolor="#5cbc69" width="200px"> 
<div align="center"><font color="#FFFFFF"><a href="?select=custo">CUSTO</a></font></div>
</td>                                    
<td bgcolor="#589bd4" width="30px"> 
<div align="center"><font color="#FFFFFF">EDITAR</font></div>
</td>
<td bgcolor="#589bd4" width="30px"> 
<div align="center"><font color="#FFFFFF">EXCLUIR</font></div>
</td>                                                                                                                           
</tr>
<?php
$dbname_cliente="ro_".$logado; // Indique o nome do banco de dados que será aberto
//echo $dbname_cliente;

if(!($con=mysql_select_db($dbname_cliente,$id))) {
echo "</br>Não foi possível estabelecer uma conexão com o gerenciador MySQL.</br>";
echo "Favor contactar o Administrador no telefone (11) 5505 6542.</br></br>";
echo "PRODUTO REGISTRADO CADDESIGN";
exit;
}

if ($_seleciona!=null){
	
	if($_seleciona=="ativo"){
	$query = "select * from veiculos order by ativo desc";		
	} else {
	$query = "select * from veiculos order by $_seleciona asc";		
	}
} else {
		
	$query = "select * from veiculos order by nome asc, ativo desc";	
	
}	

				
															
$rs = mysql_query($query);

//$row= 0;	

$conta = 0;	

?>

<?php													
while($row = mysql_fetch_array($rs)){
		$conta = $conta + 1;	
		
?>
<tr>
<td>
<?php
if($row["ativo"]=="yes"){
?>
<a href="javascript:confirmaInativo('scripts.php?acao=inativa_veiculo&id=<?php echo $row["id"];  ?>')"><img src="imgs/ativo.png" width="47" height="20" alt=""/></a>
<?php
} else {
?>
<a href="scripts.php?acao=ativa_veiculo&id=<?php echo $row["id"]; ?>"><img src="imgs/inativo.png" width="47" height="20" alt=""/></a>
<?php
}
?>
</td>

<td><?php echo $row["nome"] ?></td>
<td><?php echo $row["transportadora"] ?></td>
<td >
<?php
 $concatena_icone = "imgs/" . $row["tipo"] . "_" . $row["type_icon"] . ".png";
?>

<img src="<?php echo $concatena_icone; ?>" width="30" height="27" alt=""/>

</td>
<td><?php echo $row["tipo"] ?></td>

<td><?php echo $row["peso"] ?></td>
<td><?php echo $row["volume"] ?></td>
<td><?php echo $row["valor"] ?></td>
<td><?php echo $row["setor"] ?></td>
<td><?php echo $row["custo"] ?></td>

<td><a href="?edit=true&id=<?php echo $row["id"]; ?>&color=<?php echo $row["cor"]; ?>"><img src="imgs/editar.png" width="20" height="18" alt=""/></a></td>
<td><a href="javascript:confirmaExclusao('scripts.php?acao=exclui_veiculo&id=<?php echo $row["id"] ?>')"><img src="imgs/erro_cad.png" width="20" height="18" alt=""/></a></td>
</tr>
<?php		
}
?>
</table>

</div>
</div>

  <?php
   if ($editar=='true'){
	   
$query1 = "select * from veiculos where id='$id_quem'";															
$rs1 = mysql_query($query1);

$row1 = mysql_fetch_array($rs1)

   ?>
  <form name="altera" action="scripts.php?acao=alterar_veiculo_cad" method="post">
  <div id="apDiv12x">
  <input name="id_veiculo" type="hidden" id="id_veiculo" maxlength="8" value="<?php echo $id_quem;  ?>" />
    <div id="nome">NOME DO VEÍCULO:&nbsp;
      <input name="veiculo" type="text" id="veiculo" maxlength="8" value="<?php echo $row1["nome"];  ?>" />
    </div>
      <div id="quantidade">
      <select name="qto" id="qto" class="select" hidden="hidden">
      <option value="1">1</option>
    </select> 
    SETOR:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
     <input name="custo" type="text" id="custo" maxlength="8" value="<?php echo $row1["setor"];  ?>" />
    </div>
       <div id="transp">
    TRANSP.:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
     <input name="transp1" type="text" id="transp1" maxlength="20" value="<?php echo $row1["transportadora"];  ?>""/>
    </div>
    <div id="cor"><table width="100%" border="0">
  <tbody>
    <tr>
      <td width="88px;" height="19px;">COR:</td>
      <td><div id="cor_volta"><table border="0" width="100%" height="100%" bgcolor="<?php echo $row1['cor']; ?>"></table></div></td>
    </tr>
  </tbody>
</table>
    </div>
    
    <div id="tipo"><img src="imgs/bg_tipo.png" width="294" height="280" alt=""/>
     <div id="tipo_1">
        <?php 
	   if($row1["tipo"]=='Moto') { 
	   ?>
      <input name="type" type="radio" value="Moto" checked="checked"/>
        <?php 
	   } else {
	   ?>
      <input name="type" type="radio" value="Moto"/>
        <?php 
	   }
	   ?>
    </div>
    
    <div id="tipo_2">
      <?php 
	   if($row1["tipo"]=='Vuc') { 
	   ?>
    
    	<input name="type" type="radio" value="Vuc"  checked="checked"/>
   <?php 
	   } else {
	   ?>
       <input name="type" type="radio" value="Vuc" />
   <?php 
	   }
	   ?>
	</div>
       <div id="tipo_3">
         <?php 
	   if($row1["tipo"]=='Van') { 
	   ?>
       <input name="type" type="radio" value="Van" checked="checked"/>
      <?php 
	   } else {
	   ?> 
        <input name="type" type="radio" value="Van" />
         <?php 
	   }
	   ?>
    </div>   
     <div id="tipo_4">
        <?php 
	   if($row1["tipo"]=='Toco') { 
	   ?>
     <input name="type" type="radio" value="Toco"  checked="checked"/>
      <?php 
	   } else {
	   ?>      
     <input name="type" type="radio" value="Toco" />
        <?php 
	   }
	   ?>
    </div>
      <div id="tipo_5">
        <?php 
	   if($row1["tipo"]=='Truck') { 
	   ?>
      <input name="type" type="radio" value="Truck" checked="checked"/>
        <?php 
	   } else {
	   ?>   
      
       <input name="type" type="radio" value="Truck" />
         <?php 
	   }
	   ?>
    </div>
      <div id="tipo_6">
          <?php 
	   if($row1["tipo"]=='Carreta') { 
	   ?>
      <input name="type" type="radio" value="Carreta" checked="checked"/>
         <?php 
	   } else {
	   ?>  
       <input name="type" type="radio" value="Carreta" />
       <?php 
	   }
	   ?>
    </div>
    
    
    </div>
    <div id="custo1">CUSTO:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <input type="text" name="custo1" id="textfield" value="<?php echo $row1["custo"];  ?>" />
      &nbsp;&nbsp;&nbsp;&nbsp;(Ex.: 0.234)
    </div>
    <div id="peso">PESO:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <input type="text" name="peso" id="textfield" value="<?php echo $row1["peso"];?>" />&nbsp;&nbsp;&nbsp;&nbsp;(Ex.: 1000)
    </div>
    
     <div id="volume">VOLUME:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <input type="text" name="volume" id="textfield" value="<?php echo $row1["volume"];?>" />&nbsp;&nbsp;&nbsp;&nbsp;(Ex.: 1000)
    </div>
      <div id="valor">VALOR:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <input type="text" name="valor" id="textfield"  value="<?php echo $row1["valor"];?>" />&nbsp;&nbsp;&nbsp;&nbsp;(Ex.: 1000)
    </div>
    
     <div id="ativo">ATIVO:&nbsp;
    <?php 
	if($row1["ativo"]=='yes') { 
	?> 
    <input type="checkbox" name="ativo" id="checkbox" checked="checked" />
    
    <?php 
	} else {
	?> 
     <input type="checkbox" name="ativo" id="checkbox"/>
    <?php 
	}
	?> 
    </div>
     <div id="apDiv13c">
<input type='submit' value='ALTERAR' onClick="return enviardados();"/>
</div>
  </div>
  
</form>
 <?php 
   } else {
  ?>
  
 <form name="adiciona" action="scripts.php?acao=cadastra_veiculo_cad" method="post">
  <div id="apDiv12x">
 
    <div id="nome">NOME DO VEÍCULO:&nbsp;
      <input name="veiculo" type="text" id="veiculo" maxlength="8" />
    </div>
    <div id="quantidade">
    <select name="qto" id="qto" class="select" hidden="hidden">
      <option value="1">1</option>
    </select> 
    SETOR:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
     <input name="custo" type="text" id="custo" maxlength="8"/>
    </div>
        <div id="transp">
    TRANSP.:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
     <input name="transp1" type="text" id="transp1" maxlength="20"/>
    </div>
    
    <div id="cor">
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tbody>
    <tr>
    <td width="78px">COR:</td>
      <td width="10px" height="30" bgcolor="#ff0000"></td>
      <td width="10px" bgcolor="#ff7800"></td>
      <td width="10px" bgcolor="#42ff00"></td>
      <td width="10px" bgcolor="#7200ff"></td>
      <td width="10px" bgcolor="#ff0000"></td>
      <td width="10px" bgcolor="#003cff"></td>
      <td width="10px" bgcolor="#9c5100"></td>
      <td width="10px" bgcolor="#00760b"></td>
      <td width="10px" bgcolor="#ffbc00"></td>
      <td width="10px" bgcolor="#900000"></td>
      <td width="10px" bgcolor="#340058"></td>
      <td width="10px" bgcolor="#03fe85"></td>
    </tr>
    <tr>
      <td height="29">&nbsp;</td>
      <td style="text-align: center"><input type="radio" name="color1" id="color1" value="#ff0000" checked="checked"></td>
      <td style="text-align: center"><input type="radio" name="color1" id="color1" value="#ff7800"></td>
      <td style="text-align: center"><input type="radio" name="color1" id="color1" value="#42ff00"></td>
      <td style="text-align: center"><input type="radio" name="color1" id="color1" value="#7200ff"></td>
      <td style="text-align: center"><input type="radio" name="color1" id="color1" value="#ff0000"></td>
      <td style="text-align: center"><input type="radio" name="color1" id="color1" value="#003cff"></td>
      <td style="text-align: center"><input type="radio" name="color1" id="color1" value="#9c5100"></td>
      <td style="text-align: center"><input type="radio" name="color1" id="color1" value="#00760b"></td>
      <td style="text-align: center"><input type="radio" name="color1" id="color1" value="#ffbc00"></td>
      <td style="text-align: center"><input type="radio" name="color1" id="color1" value="#900000"></td>
      <td style="text-align: center"><input type="radio" name="color1" id="color1" value="#340058"></td>
      <td style="text-align: center"><input type="radio" name="color1" id="color1" value="#03fe85"></td>
    </tr>
  </tbody>
</table>
    </div>
    
    <div id="tipo"><img src="imgs/bg_tipo.png" width="294" height="280" alt=""/>
    
       <div id="tipo_1"><input name="type" type="radio" value="Moto" />
    </div>
    <div id="tipo_2"><input name="type" type="radio" value="Vuc" />
    </div>
       <div id="tipo_3"><input name="type" type="radio" value="Van" />
    </div>   
     <div id="tipo_4"><input name="type" type="radio" value="Toco" />
    </div>
      <div id="tipo_5"><input name="type" type="radio" value="Truck" />
    </div>
      <div id="tipo_6"><input name="type" type="radio" value="Carreta" />
    </div>
    
    </div>
    <div id="custo1">CUSTO:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <input type="text" name="custo1" id="textfield" />
      &nbsp;&nbsp;&nbsp;&nbsp;(Ex.: 0.234)
    </div>
    <div id="peso">PESO:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <input type="text" name="peso" id="textfield" />&nbsp;&nbsp;&nbsp;&nbsp;(Ex.: 20000)
    </div>
    
     <div id="volume">VOLUME:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <input type="text" name="volume" id="textfield" />&nbsp;&nbsp;&nbsp;&nbsp;(Ex.: 1000)
    </div>
      <div id="valor">VALOR:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <input type="text" name="valor" id="textfield" />&nbsp;&nbsp;&nbsp;&nbsp;(Ex.: 1000000)
    </div>
    
     <div id="ativo">ATIVO:&nbsp;
      
       <input type="checkbox" name="ativo" id="checkbox" checked="checked" />
    </div>
   
   
    <div id="apDiv13">
	<input type='submit' value='ADICIONAR' onClick="return enviardados();"/>
	</div>

  </div>
  



</form>

 <?php 
   } 
  ?>
   <div id="apDiv12xx">
   
   <?php
   if ($editar=='true'){
   ?>
   <img src="imgs/bg_box_editor.png" width="447" height="82" />
<a href="cad_veiculos.php"><img src="imgs/bg_box_cad_mais.png" width="447" height="82" /></a>
  
  <?php 
   } else {
  ?>
  
  <img src="imgs/bg_box_cad_mais.png" width="447" height="82" />
   <?php 
   } 
  ?>
  </div>
  


</div> 

   
</body>
</html>