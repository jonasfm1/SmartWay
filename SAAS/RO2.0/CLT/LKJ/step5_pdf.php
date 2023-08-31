<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>::. ROTAS ONLINE .:: CADD</title>
<link rel="stylesheet" type="text/css" href="css/menu_nv.css">
<link rel="stylesheet" type="text/css" href="css/step5_pdf.css">
<link rel="shortcut icon" href="imgs/favicon.ico" >
 <link rel="icon" type="image/gif" href="imgs/animated_favicon1.gif" >
 <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<script type='text/javascript' src="control/timer.js"></script>
<script type='text/javascript' src='https://code.jquery.com/jquery-1.11.0.min.js'></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.js"></script>
<script src="js/flutuante.js"></script>
<script src="js/logger.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>  
<script src="jquery-1.4.1.js" type="text/javascript"></script>

    



<script LANGUAGE="JavaScript">

		
		
  function seleciona_todos(obj, true_false)
            {
                arquivo = document.getElementById(obj);
                tamanho=arquivo.length;

                for (var cont=0; cont<tamanho; cont++ )
                {
                         arquivo.options[cont].selected = true_false;
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


 function valida_detalhado()
            {
           indice = document.getElementById("detalhado").selectedIndex; 
		
            if( indice == null || indice == -1 ) {
             alert("Por favor, escolha pelo menos uma Rota para imprimir!!!");
			return false;
                        }
                        else{		
			return true;
		        }
		  
		  
   }
   function valida_resumo()
            {
           indice = document.getElementById("resumo").selectedIndex; 
		
            if( indice == null || indice == -1 ) {
             alert("Por favor, escolha pelo menos uma Rota para imprimir!!!");
			return false;
                        }
                        else{		
			return true;
		        }
		  
		  
   }


</SCRIPT>
<?php include ('session.php'); 
  require_once ("geocode.class.php");
  include ('essence/conecta.php');
  ini_set('max_execution_time',3000);
?>
</head>

<body>
<?php include ('base1.php'); ?>
<div class="jquery-waiting-base-container"></div>


<div id="apDiv11"> 
<form name="detalhado_formulario" id="detalhado_formulario" action="pdf_detalhe.php" method="GET" target="_blank" >

<table border="0" style="height: 100px; color:#000000;"  cellpadding="0" cellspacing="0">
   <tr>
       <td  align="left" nowrap="nowrap">
       <i class="material-icons" style="font-size:32px">business</i>
       </td>
       <td valign="button" align="left" style="height: 50px;">
       <font size="4"><strong>&nbsp;ROMANEIOS</strong></font>
       
       </td>
       <td style="width: 88px;">

       </td>
      <td>
     <input type='submit' name='submit' value='IMPRIMIR TODAS AS ROTAS' onclick="seleciona_todos('detalhado', true)"/>
      </td>
   </tr>
   <tr style="height: 25px;vertical-align: top">
   <td colspan="4"><hr style="border: none; width:100%;" color="#DCDCDC"></td>
  
   
   <tr style="height: 25px;font-size: 12px;">
   <td colspan="4">
   
   </td>
   
   </tr>
   
   
   
   
   </table>

   <table>

   <tr>
<td>




<div id="combobox1">




 <label>
 <?php
 $query3 = "select * from rotas group by nome_rota";															
 $rs3 = mysql_query($query3);
 								
$query_todos = "select ordem from rotas";															
$rs_todos = mysql_query($query_todos);
 
 ?>
<select name="detalhado[]" id="detalhado" multiple="multiple">
<?php
while($row3 = mysql_fetch_array($rs3)){
	$nome_rota = $row3["nome_rota"];
	$ordem_rota = $row3["ordem"];
	// $ordem_rota;
	$nome_concatena_rota = $row3["nome_rota"];
	$nome_veiculo = $row3["nome_veiculo"];

	if($ordem_rota==0){		
	?>
    <option value="<?php echo $nome_rota; ?>"><?php echo $nome_veiculo; ?></option>
    <?php
	} else {	
	?>
    <option value="<?php echo $nome_rota; ?>"><?php echo $nome_veiculo; ?></option>        
	<?php
	}
}
	?>
</select>
</label>

<br>
<div id="submit_romaneio"><input type='submit' name='submit' value='IMPRIMIR SELECIONADAS' onclick="return valida_detalhado();"/></div>
</form>
</td>

   </tr>
   </table>
<br><br><br><br> <br> 

<form name="resumo_formulario" action="pdf_resumo.php" method="GET" target="_blank">
   <table border="0" style="height: 100px; color:#000000;"  cellpadding="0" cellspacing="0">
   <tr>
       <td  align="left" nowrap="nowrap">
       <i class="material-icons" style="font-size:32px">workspaces</i>
       </td>
       <td valign="button" align="left" style="height: 50px;">
       <font size="4"><strong>&nbsp;RESUMO DA ROTA</strong></font>
       
       </td>
      <td style="width: 40px;">

      </td>
      <td>
      <input type='submit' name='submit' value='IMPRIMIR TODAS AS ROTAS' onclick="seleciona_todos('resumo', true)"/>
      </td>
   </tr>
   <tr style="height: 25px;vertical-align: top">
   <td colspan="4"><hr style="border: none; width:100%;" color="#DCDCDC"></td>
  
   
   <tr style="height: 25px;font-size: 12px;">
   <td colspan="4">
   
   </td>
   
   </tr>
   
   
   
   
   </table>


   <table>

<tr>
<td>




<div id="combobox2">
<label>
<select name="resumo[]" id="resumo" multiple="multiple">
<?php
 $query4 = "select * from rotas group by nome_rota";	
$rs4 = mysql_query($query4);

while($row4 = mysql_fetch_array($rs4)){
	$nome_rota = $row4["nome_rota"];
	$nome_veiculo = $row4["nome_veiculo"];
	$ordem_rota = $row4["ordem"];
//	$nome_concatena_rota = $row4["nome_rota"];
	
	if($ordem_rota==0){		
	?>
    <option value="<?php echo $nome_rota; ?>"><?php echo $nome_veiculo; ?></option>
    <?php
	} else {	
	?>
    <option value="<?php echo $nome_rota; ?>"><?php echo $nome_veiculo; ?></option>        
	<?php
	}
   
    
}
?>
</select>
</label>

<br>
<div id="submit_resumo"><input type='submit' name='submit' value='IMPRIMIR SELECIONADAS'onclick="return valida_resumo();"/></div>


</div>


</form>

</td>

</tr>
</table>




</div> 

<br><br><br>






<div class="footer">
  
  <table border="0" style="width: 100%; height:100%"   cellpadding="0" cellspacing="0">
<tr >
  <td style="font-size: 11px;text-align: left;">
 
  <input type='submit' name='submit' value='VOLTAR' onclick="location.href='step5.php';" />

  </td>
  <td style="color: #FFFFFF;text-align: left;font-size: 11px;" style="text-transform: bold;">
  
 
  </td>

  <td style="color: #FFFFFF;text-align: left;font-size: 11px;" style="text-transform: bold;">
	 
  
  </td>
  <td style="font-size: 11px;text-align: right;">
 

</form>

    </td>
</tr>

  </table>

</div>


</body>
</html>