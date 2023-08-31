<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//BR" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>::. ROTAS ONLINE .:: CADD</title>
<link rel="stylesheet" type="text/css" href="css/menu_nv.css">
<link rel="stylesheet" type="text/css" href="css/step5.css">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link href="css/bootstrap.min.css"  rel="stylesheet" media="screen">
<link href="css/bootstrap-datetimepicker.min.css"  rel="stylesheet" media="screen">

  <link rel="shortcut icon" href="imgs/favicon.ico">
  <link rel="icon" type="image/gif" href="imgs/animated_favicon1.gif">
  
  <script type='text/javascript' src="control/timer.js"></script>
  <script type='text/javascript' src='https://code.jquery.com/jquery-1.11.0.min.js'></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.js"></script>

  <script src="js/flutuante.js"></script>
  <script src="js/logger.js"></script>

  <script src="js/bootstrap.min.js"></script>
  <script src="js/bootstrap-datetimepicker.min.js"></script>
  <script src="js/locales/bootstrap-datetimepicker.pt-BR.js"></script>
  
    
<script LANGUAGE="JavaScript">

(function($) {
      $.fn.waiting = function(options) {
        options = $.extend({
          modo: 'normal'
        }, options);
        this.fadeOut(options.modo);
        return this;
      };
    })(jQuery);;


function toggle1(source) {
  checkboxes = document.getElementsByName('check_list[]');
  for(var i=0, n=checkboxes.length;i<n;i++) {
    checkboxes[i].checked = source.checked;
  }
}


function marcardesmarcar(){
	
	
  if ($('#todos').attr('checked')){
     $('.marcar').each(
        function(){
           $(this).attr('checked', true);
        }
     );
  }else{
     $('.marcar').each(
        function(){
           $(this).attr('checked', false);
        }
     );
  }
}

$(document).ready(function(){
$(".jquery-waiting-base-container").waiting({modo:"slow"});
    todos.checked = 1;
	marcardesmarcar();
	
});

function valida(){
  var flag = "";
  //var primi;
var primi = document.getElementsByName('check_list[]');
    
 
   for (i = 0; i < primi.length; i++){
   //alert(primi[i]);
     if (primi[i].checked){
           flag="liberado";
     }
   
    // alert(flag);
 
 }
 
     if (flag == "liberado"){
           //alert('yes');
           } else {
           alert('Selecione pelo menos um veículo!');
       return false;
       
     }

 
}


function acao_imprimir1() 
		{ 
      var flag = "";
  //var primi;
var primi = document.getElementsByName('check_list[]');

   for (i = 0; i < primi.length; i++){
   //alert(primi[i]);
     if (primi[i].checked){
           flag="liberado";
     }
   
    // alert(flag);
 
 }
 
     if (flag == "liberado"){
           //alert('yes');
           } else {
           alert('Selecione pelo menos um veículo!');
       return false;
       
     }

 

var teste = "pdf_detalhe.php?";

var radios = $("#total input[name='check_list[]']:checked:visible");
var engine = "";
var array_check = [];

for (var i=0; i < radios.length; i++) {
 if (radios[i].checked) {
     engine = "check_list%5B%5D=" + radios[i].value + "&";
     array_check.push(engine);
    teste = teste + engine;
    //alert(teste);
     //break;
 }
}
 //document.getElementById("pag2").src = teste; 
 window.open(teste);

}



function acao_imprimir() 
		{ 
      var flag = "";
  //var primi;
var primi = document.getElementsByName('check_list[]');
    
 
   for (i = 0; i < primi.length; i++){
   //alert(primi[i]);
     if (primi[i].checked){
           flag="liberado";
     }
   
    // alert(flag);
 
 }
 
     if (flag == "liberado"){
           //alert('yes');
           } else {
           alert('Escolha pelo menos um veículo!');
       return false;
       
     }


var teste = "pdfs.php?";

var radios = $("#total input[name='check_list[]']:checked:visible");
var engine = "";
var array_check = [];

for (var i=0; i < radios.length; i++) {
 if (radios[i].checked) {
     engine = "check_list%5B%5D=" + radios[i].value + "&";
     array_check.push(engine);
    teste = teste + engine;
    //alert(teste);
     //break;
 }
}
 //document.getElementById("pag2").src = teste; 
 window.open(teste);

}


function acao_resumo() 
		{ 
		
var flag = "";
  //var primi;
var primi = document.getElementsByName('check_list[]');
    
 
   for (i = 0; i < primi.length; i++){
   //alert(primi[i]);
     if (primi[i].checked){
           flag="liberado";
     }
   
    // alert(flag);
 
 }
 
     if (flag == "liberado"){
           //alert('yes');
           } else {
           alert('Escolha pelo menos um veículo!');
       return false;
       
     }	

var teste = "pdf_resumo.php?";

var radios = $("#total input[name='check_list[]']:checked:visible");
var engine = "";
var array_check = [];

for (var i=0; i < radios.length; i++) {
 if (radios[i].checked) {
     engine = "check_list%5B%5D=" + radios[i].value + "&";
     array_check.push(engine);
    teste = teste + engine;
    //alert(teste);
     //break;
 }
}
 //document.getElementById("pag2").src = teste; 
 window.open(teste);

}



function acao_exportar() 
		{ 
		
      var flag = "";
  //var primi;
var primi = document.getElementsByName('check_list[]');
    
 
   for (i = 0; i < primi.length; i++){
   //alert(primi[i]);
     if (primi[i].checked){
           flag="liberado";
     }
   
    // alert(flag);
 
 }
 
     if (flag == "liberado"){
           //alert('yes');
           } else {
           alert('Escolha pelo menos um veículo!');
       return false;
       
     }		

var teste = "export_csv.php?acao=export_xls1&";



var radios = $("#total input[name='check_list[]']:checked:visible");
var engine = "";
var array_check = [];

for (var i=0; i < radios.length; i++) {
 if (radios[i].checked) {
     engine = "check_list%5B%5D=" + radios[i].value + "&";
     array_check.push(engine);
    teste = teste + engine;
   // alert(teste);
     //break;
 }
}
 //document.getElementById("pag2").src = teste; 
 window.open(teste);

}


function topFunction() {
  document.body.scrollTop = 0;
  document.documentElement.scrollTop = 0;
}


function acao1(rota, veiculo) {

document.getElementById("Pagina").style.display = "block";

var teste = "altera_ordem_g.php?rota="+ rota + "&veiculo=" + veiculo;

document.getElementById("pag2").src = teste; 

topFunction();

}


function protheus(acao) {

var x = document.getElementById("data").value;

var teste = "export_protheus.php?acao="+ acao + "&data=" + x;

window.open(teste);

}



function acao2(rota, veiculo, dist) {

document.getElementById("Paginax").style.display = "block";

var teste = "altera_ordem.php?rota="+ rota + "&veiculo=" + veiculo;

document.getElementById("pag2x").src = teste; 

topFunction();

}


         function startmenu()
         {
            af.style.display = "none";
          }
          
         function abrefecha()         
         {
            if(af.style.display == "none")
            {
               af.style.display = "block";
            }
            else
            {
               startmenu();
            } 
         }
         function startmenu1()
         {
            af1.style.display = "none";
          }
          
                
         function abrefecha1()         
         {
            if(af1.style.display == "none")
            {
               af1.style.display = "block";
            }
            else
            {
               startmenu1();
            } 
         }


  function openNav() {
  document.getElementById("mySidenav").style.width = "310px";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
}



      </script>

<?php 
  include ('session.php'); 
  include ('essence/conecta.php');
  ini_set('max_execution_time',12000);
  date_default_timezone_set('America/Sao_Paulo');

  
function convertToHoursMins($time, $format = '%02d:%02d') {
    if ($time < 1) {
        return;
    }
    $hours = floor($time / 60);
    $minutes = ($time % 60);
    return sprintf($format, $hours, $minutes);
}

$transp = $_GET["transp"];


$query_where = "UPDATE passo SET ok='yes' WHERE id='5'";
$rs_where = mysql_query($query_where);


////RESUMO///

$resumo1 = mysql_query("SELECT COUNT(id) AS registros, SUM(peso) AS peso, SUM(volume) AS volume, SUM(valor) AS valor from rotas");
$dados1 = mysql_fetch_array($resumo1);

$resumo2 = mysql_query("SELECT COUNT(distinct veiculo) AS veiculo from rotas");
$dados2 = mysql_fetch_array($resumo2);

$resumo3 = mysql_query("SELECT COUNT(distinct codigo_cliente) AS codigo_cliente from rotas");
$dados3 = mysql_fetch_array($resumo3);

?>

</head>

<div class="jquery-waiting-base-container"></div>
<body>
 
<?php include ('base2.php'); ?>


<div id="total"> 


   <table border="0" color:#000000;"  cellpadding="0" cellspacing="0">
   <tr>

       <td valign="button" align="left" style="height: 34px;">
       <font size="4"><strong>&nbsp;RESUMO</strong></font>
       
       </td>
 
       <td >
    
</td>

   </tr>
   <tr style="height: 25px;vertical-align: top">
   <td ><hr style="border: none; width:90px;" color="#ECECEC"></td>
  </tr>
</tr>

  </table>
  
<div id="exportar">
<table>
<tr>
<tr>

    <td nowrap="nowrap">
  
  

    </td>
    </tr>
</tr>

</table>

<table width="630px" border="1" cellspacing="2" cellpadding="2" class="bordasimples">
<tr style="height: 50px;font-size: 12px;">
<td  style="background-color:#ECECEC;color:#888888; font-size:11px;padding-left:10px; padding-right:10px">

<font style="text-align: center; font-size:11px;"><strong>&nbsp;ROTAS </strong> ᥣ <?php echo $dados2['veiculo'];?> ᥣ</font>   
    <font style="text-align: center; font-size:11px"><strong>&nbsp;VISITAS </strong> ᥣ <?php echo $dados3['codigo_cliente'];?> ᥣ</font>
    <font style="text-align: center; font-size:11px"><strong>&nbsp;PEDIDOS </strong> ᥣ <?php echo $dados1['registros'];?> ᥣ</font>
    <font style="text-align: center; font-size:11px"><strong>&nbsp;PESO </strong> ᥣ <?php echo $dados1['peso'];?> ᥣ</font>
    <font style="text-align: center; font-size:11px"><strong>&nbsp;VOLUME </strong> ᥣ <?php echo $dados1['volume'];?> ᥣ</font>
    <font style="text-align: center; font-size:11px"><strong>&nbsp;VALOR </strong> ᥣ <?php echo $dados1['valor'];?> ᥣ</font>

</td>
</tr>
</table>
<br><br>
<table border="0" color:#000000;"  cellpadding="0" cellspacing="0">
   <tr>

       <td valign="button" align="left" style="height: 34px;">
       <font size="4"><strong>&nbsp;ROMANEIOS</strong></font>
       
       </td>
 
       <td >
    
</td>

   </tr>
   <tr style="height: 25px;vertical-align: top">
   <td ><hr style="border: none; width:120px;" color="#ECECEC"></td>
  </tr>
</tr>

  </table>
<table>
<tr>
<tr>
	<td nowrap="nowrap" style="width: 20px">
	<i class="material-icons" style="font-size:22px; vertical-align:bottom">filter_alt</i>
    </td>
    <td nowrap="nowrap">
  
  
    <font style="text-align: center; font-size:11px"><strong>&nbsp;TRANSPORTADORA</strong></font>
  
    </td>
    </tr>
</tr>

</table>
<table width="630px" border="1" cellspacing="2" cellpadding="2" class="bordasimples">
<tr style="height: 50px;font-size: 12px;">

   <td align="left" style="background-color:#ECECEC;color:#888888; font-size:11px;padding-left:10px; padding-right:10px">
   <form>
<select name="transp" id="transp" style="border: 1px solid #ECECEC; font-size:11px; height:25px; width:100%;padding-left: 5px;"  onchange='this.form.submit()'>
<option value="<?php echo $row["transportadora"] ?>">TODAS</option>
<?php
		$query= "Select * from rotas group by transportadora";
		$rs= mysql_query($query);
	
    while($row = mysql_fetch_array($rs)){

      if($transp == $row["transportadora"]){
?>

<option value="<?php echo $row["transportadora"] ?>" selected><?php echo $row["transportadora"] ?></option>
<?php
      } else {
?>

<option value="<?php echo $row["transportadora"] ?>"><?php echo $row["transportadora"] ?></option>
 <?php 
      }
?>


  <?php
    }
  ?>
</select>
<noscript><input type="submit" value="Submit"></noscript>
</form>

</td>
   </tr>
   </table>
  
</div>
<br>
<table width="15%" border="0" cellpadding="0" cellspacing="0" style="padding-top: 10px; padding-bottom: 10px; margin-top: 5px; color: #000000;" bgcolor="#FFFFFF">
		<tr>
		<td nowrap>
    &nbsp;<input type="checkbox" onClick="toggle1(this)" /><font size='1'>&nbsp;&nbsp;SELECIONAR TODOS</font><br/>
		</td>
		</tr>
		 </table>

<?php	

if ($transp==''){
  $query1 = "select * from rotas where nome_rota!='' group by nome_rota order by nome_rota ASC";		
} else {
  $query1 = "select * from rotas where nome_rota!='' and transportadora='$transp' group by nome_rota order by nome_rota ASC";		

}
														
$rs1 = mysql_query($query1);


	
while($row1 = mysql_fetch_array($rs1)){

$nome_rota = $row1["nome_rota"];
//$veiculo_rota = $row1["veiculo"];

$query2 = "select count(id) as total, SUM(peso) as peso, SUM(volume) as volume, SUM(valor) as valor, nome_veiculo from rotas where nome_rota='$nome_rota'";
$rs2 = mysql_query($query2);
$data=mysql_fetch_assoc($rs2);

  
$query_i = "select * from rotas where nome_rota='$nome_rota' group by codigo_cliente";														
$rs_i = mysql_query($query_i);
$conta_i = 0;
while($row_i = mysql_fetch_array($rs_i)){
$conta_i ++;
}


?>
       <script>
    function hide(target) {
    document.getElementById(target).style.display = 'none';
    location.reload();
}
       </script>

<div id="Pagina" style="display: none;">
  
     <iframe name="pag1" frameborder="0" id="pag1" scrolling="no" marginheight="0" marginwidth="0" trusted="yes"></iframe>
    <iframe name="pag2" src="" frameborder=0 id="pag2" scrolling="no" marginheight="0" marginwidth="0" trusted="yes"></iframe>
 </div>  

 <div id="Paginax" style="display: none;">
  
  <iframe name="pag1x" frameborder="0" id="pag1x" scrolling="no" marginheight="0" marginwidth="0" trusted="yes"></iframe>
 <iframe name="pag2x" src="" frameborder=0 id="pag2x" scrolling="no" marginheight="0" marginwidth="0" trusted="yes"></iframe>
</div>  


<table width="630px" border="1" cellspacing="2" cellpadding="2" class="bordasimples">
  <tbody>
    <tr>
     <td height="40px" align="left" width="100%" style="font-weight:bold;background-color: #ECECEC;" colspan="5"><font color="#000000" size="3"><input type="checkbox" value="<?=$nome_rota?>" class="marcar" name="check_list[]" id="check_list"  />&nbsp;&nbsp;<?php echo $data['nome_veiculo']; ?></font></td>
     </tr>
  <tr>  
    <td height="20px" align="left" style="font-weight:bold;"><font color="#000000" size="1">VISITAS: <?php echo $conta_i; ?></td>
     <td height="20px" align="left" style="font-weight:bold;"><font color="#000000" size="1">PEDIDOS: <?php echo $data['total']; ?></td>     
     <td height="20px" align="left" style="font-weight:bold;"><font color="#000000" size="1">PESO: <?php echo $data['peso']; ?></td>      
     <td height="20px" align="left"  style="font-weight:bold;"><font color="#000000" size="1">VOLUME: <?php echo $data['volume']; ?></td>     
     <td height="20px" align="left" style="font-weight:bold;"><font color="#000000" size="1">VALOR: <?php echo $data['valor']; ?></td>
    </tr>
  </tbody>
</table>

<div id="<?php echo $nome_rota . 'xx' ?>" role="tabpanel" aria-labelledby="novo-tab" name="xxx">

               <input type="submit" name="submit" id="submit" onClick="toggle('<?php echo $nome_rota ?>');" value="DETALHES"/>

               <?php



if($data['total']<=25){
?>
 <input type="submit" name="submit" id="submit" value="ORDENAR" onclick="javascript:acao1('<?php echo $nome_rota ?>', '<?php echo $data['nome_veiculo'] ?>');" />

<?php
} else {
?>


<input type="submit" name="submit" id="submit" value="ORDENAR" onclick="javascript:acao2('<?php echo $nome_rota ?>', '<?php echo $data['nome_veiculo'] ?>');" />  
<?php
}
               ?>
              
      

</div>
<br>
<div id="<?php echo $nome_rota ?>" style="display: block;">


<table width="100%" border="1" id="tabela" name="tabela" class="bordasimples" cellpadding="2" cellspacing="2">



<tr bgcolor="#ECECEC" height="40" font color="#000000" style="font-weight: bold;">  
<td width="49"> 
<div>ROTA</div>
</td> 
<td width="49"> 
<div>ORDEM</div>
</td> 
<td width="71" > 
<div> PEDIDO</div>
</td>   
<td width="88" > 
<div> VEÍCULO</div>
</td>
<td width="71" > 
<div> TRANSP.</div>
</td> 
                                                     
<td width="106" > 
<div> COD.CLI.</div>
</td>
<td width="268" > 
<div> CLIENTE</div>
</td>
<td width="268" > 
<div> END.</div>
</td>
<td width="62" > 
<div> BAIRRO</div>
</td>
<td width="154" > 
<div> CIDADE</div>
</td>
<td width="25" > 
<div> CEP</div>
</td>

<td width="62" > 
<div> PESO</div>
</td>
<td width="62" > 
<div> VOLUME</div>
</td>
<td width="62" > 
<div> VALOR</div>
</td>   
<td width="103"  > 
<div> OBS.</div>
</td>

<td width="62" > 
<div> T. PERC.</div>
</td>
<td width="62" > 
<div> DISTÂNCIA</div>
</td>




</tr>

<?php

				
$query = "select * from rotas where nome_rota='$nome_rota' ORDER BY nome_rota, ordem ASC";																
$rs = mysql_query($query);
$conta = 0;				
//$lista_cores_tabela = ["#FFF000", "#edfddd", "#edfdff", "#FFF000"];
										
while($row = mysql_fetch_array($rs)){
	
	$conta = $conta + 1;	

	$ordemvazia = $row["ordem"];
	$nome_carro = $row["nome_rota"];
	$veiculo_qual = $row["veiculo"];
	$id_ok =  $row["id"];
	//echo $id_ok;

$query_todos = "select * from veiculos where id='$veiculo_qual'";														
$rs_todos = mysql_query($query_todos);

while($row_todos = mysql_fetch_array($rs_todos)){
	
	$queme = $row_todos["nome"];
	$queme_transp = $row_todos["transportadora"];
	// Exibição
	$queme_kms = $row_todos["distancia_total"];
	$queme_peso = $row_todos["peso_total"];
	$queme_volume = $row_todos["volume_total"];
	$queme_valor = $row_todos["valor_total"];
	$queme_tempo = $row_todos["tempo_total"];
	// grava na base rotas nome veiculo e nome motorista
	$query_update = "UPDATE rotas SET nome_veiculo='$queme', motorista='$queme_transp' WHERE id=$id_ok";											
	$rs_update = mysql_query($query_update);


}

?>
<tr bgcolor="#FFF"> 
<td align="left" ><?php echo $row["nome_rota"];?></td>
<td align="left" ><?php echo $row["ordem"];?></td>
<td align="left" nowrap="nowrap"><?= $row["codigo_pedido"] ?></td>	
<td align="left" nowrap="nowrap"><?php echo $queme?></td>
<td align="left" nowrap="nowrap"><?php echo $queme_transp?></td>
<td align="left" nowrap="nowrap"><?php echo $row["codigo_cliente"];?></td>
	
<td align="left" nowrap="nowrap"><?= mb_strimwidth($row["nome_cliente"], 0, 30, "...");?></td> 	
<td align="left" nowrap="nowrap"><?= mb_strimwidth($row["endereco"], 0, 30, "...");?></td>
<td align="left" nowrap="nowrap"><?= $row["bairro"] ?></td>
<td align="left" nowrap="nowrap"><?= $row["cep"] ?></td>

<td align="left" nowrap="nowrap"><?= $row["cidade"] ?></td>
<td align="left" > <?= $row["peso"] ?></td>	
<td align="left" > <?= $row["volume"] ?></td>
<td align="left" > <?= $row["valor"] ?></td>  	
<td align="left" nowrap="nowrap" title="<?php echo $row["obs_pedido"];?>">
  <?= mb_strimwidth($row["obs_pedido"], 0, 20, "..."); ?>
 
</td>



<td align="left">
<?php
if($row["tempo"]== null){
    echo "Não calculado!"; 
} else {
	echo $row["tempo"];
	}
 ?>
 </td>
<td nowrap="nowrap" align="left">
<?php 
if($row["distancia"]== null){
echo "Não calculado!"; 	
} else {
echo $row["distancia"] . " Km"; 

}
?>
</td>

	
</tr>

<?php 
$pega_co_cli = $row["codigo_cliente"];
$query_segmento = "select * from clientes where codigo_cliente='$pega_co_cli'";														
$rs_segmento = mysql_query($query_segmento);
// Tirando o while
$dados = mysql_fetch_array($rs_segmento);

}

?>
<tr>
<td colspan="11" bgcolor="#FFFFFF"> </td>

<td width="62" > 
<div align="left"> <?= $queme_peso; ?></font></div>
</td>
<td width="62" > 
<div align="left"> <?= $queme_volume; ?></font></div>
</td>
<td width="62" > 
<div align="left"> <?= $queme_valor; ?></font></div>
</td>   

<td bgcolor="#FFFFFF"> </td>


<td width="62"  > 
  <div align="left"> <?= $queme_tempo; ?></font></div>
</td>
<td width="62" > 
<div align="left"> <?= $queme_kms . " km"; ?></font></div>
</td>


	  

                                                  
</tr></table>
<br />

</div>

<script>
    function toggle(conclusao, novo) {
    conclusao = document.getElementById(conclusao);
    novo = document.getElementById("novo");

    if(conclusao.style.display == "none"){
      
    conclusao.style.display = "block";
    novo.style.display = "none";
    } else {
    conclusao.style.display = "none";
    novo.style.display = "block";
    }

    event.preventDefault();

    }


</script>
<?php

}
?>





</div>

<div id="mySidenav" class="sidenav">
  <div class="div" id="div" name="div">
  <br><br>
	<br><br>
  <table width="100%" border="0" cellpadding="0" cellspacing="0" align="left" style="padding-top: 25px; padding-bottom: 8px; width:100%" >
		<tr >
			
		
            <td align="left" valign="middle" nowrap="nowrap" style="width:100%; color:#000000;">
            <strong><font size="4">&nbsp;INTEGRAÇÃO ERP</font></strong>
            </td>
	   </tr>
        </table>
    
        <hr size = 1 width = '170px' color="#ECECEC" >
        <br> <br>
     

        <table  style="text-align: left; padding-left:10px" >

        <tr>
      <td>
      <i class="material-icons" style="font-size:22px; vertical-align:bottom">calendar_month</i>
      </td>
<td>

    <div class="input-group date data_formato" data-date-format="dd/mm/yy">
  <input type="text" class="form-control" name="data" id="data" value="<?php echo date('d/m/y') ?>" style="width: 170px;height: 25px; font-size:11px;font-weight: bold;" >
       <span class="input-group-addon" >
         <span class="glyphicon glyphicon-th" style="height: 10px;font-size:11px;"></span>
       </span>
     </div>


</td>

    </tr>

<tr>

	<td nowrap="nowrap" style="width: 20px">
	<i class="material-icons" style="font-size:22px; vertical-align:bottom">unarchive</i>
    </td>
    <td nowrap="nowrap">

    <a href=#" onclick="protheus('export_csv');">
    <font style="text-align: center">&nbsp;&nbsp;BAIXAR CARGA COMUM</font>
    </a>
    </td>
    </tr>
    <tr>
   
	<td nowrap="nowrap" style="width: 20px">
	<i class="material-icons" style="font-size:22px; vertical-align:bottom">unarchive</i>
    </td>
    <td nowrap="nowrap">
  
    <a href="#" onclick="protheus('export_csv_trans');">
    <font style="text-align: center">&nbsp;&nbsp;BAIXAR TRANSBORDO</font>
    </a>
    </td>
    </tr>
    <tr>
	<td nowrap="nowrap" style="width: 20px">
	<i class="material-icons" style="font-size:22px; vertical-align:bottom">unarchive</i>
    </td>
    <td nowrap="nowrap">
  
    <a href="#" onclick="protheus('export_csv_cd');">
    <font style="text-align: center">&nbsp;&nbsp;BAIXAR CARGA DIRETA</font>
    </a>
    <input type="text" name="acao3" value="export_csv_cd" hidden>
    </td>
    </tr>
    
        </table>

        <br><br><hr size = 1 width = '350px' color="#d3d5d6" style="height: 1px;"><br>


    
        <table width="100%" border="0" cellpadding="0" cellspacing="0" align="left" style="padding-top: 25px; padding-bottom: 8px; width:100%" >
		<tr>
			
		
            <td align="left" valign="middle" nowrap="nowrap" style="width:360px; color:#000000;">
            <strong><font size="4">&nbsp;EXPORTAR/IMPRIMIR</font></strong>
            </td>
	   </tr>
        </table>
    
        <hr size = 1 width = '194px' color="#ECECEC">
        <br> <br>
        
        <table  style="text-align: left; padding-left:10px" >

      
<tr>
	<td nowrap="nowrap" style="width: 20px">
	<i class="material-icons" style="font-size:22px; vertical-align:bottom">view_kanban</i>
    </td>
    <td nowrap="nowrap">
  
    <a href="#" onClick="acao_resumo();">
    <font  style="text-align: center">&nbsp;&nbsp;RESUMO</font>
    </a>
    </td>
    </tr>
    <tr>
	<td nowrap="nowrap" style="width: 20px">
	<i class="material-icons" style="font-size:20px; vertical-align:bottom">directions_car</i>
    </td>
    <td nowrap="nowrap">
  
    <a href="#"  onClick="acao_imprimir1();">
    <font style="text-align: center">&nbsp;&nbsp;ROMANEIO</font>
    </a>
    </td>
    </tr>
    <tr>
	<td nowrap="nowrap" style="width: 20px">
	<i class="material-icons" style="font-size:20px; vertical-align:bottom">open_in_browser</i>
    </td>
    <td nowrap="nowrap">
  
    <a href="#" onClick="acao_exportar();">
    <font style="text-align: center">&nbsp;&nbsp;EXPORTAR .XLS</font>
    </a>
    </td>
    </tr>
        </table>
       
        <br><br><hr size = 1 width = '350px' color="#d3d5d6" style="height: 1px;"><br>
       
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times; </a>


</div>
</div>


<div class="footer">
  
  <table border="0" style="width: 100%; height:100%"   cellpadding="0" cellspacing="0">
<tr >
  <td style="font-size: 11px;text-align: left;">
  <input type='submit' name='submit' value='VOLTAR' onclick="location.href='step4.php';" />
  </td>
  
  <td style="font-size: 11px;text-align: right;">
  
    </td>
</tr>

  </table>


  
</div>

<script>
    $('.data_formato').datetimepicker({
      weekStart: 0,
      minView: 2,
      maxView: 2,
      todayBtn: 1,
      autoclose: 1,
      todayHighlight: 1,
      startView: 2,
      forceParse: 0,
      showMeridian: 1,
      language: "pt-BR",
      startDate: '+0d'
    });
  </script>

                                          

</body>
</html>