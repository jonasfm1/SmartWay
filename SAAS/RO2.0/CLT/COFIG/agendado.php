
<style>

  table.bordasimples {
	border-collapse: collapse;
	border-color: #ECECEC;

	font-size: 11px;
  
	
	}

  table.bordasimples tr {
	  border-color: #CCC;
	  
	}

table.bordasimples td {

font-size: 11px;
padding-left: 5px;
padding-right: 5px;

}

#usuarios {

}



	
</style>
<?php 
include ('session.php');
include ('essence/conecta.php');
ini_set('max_execution_time',12000);
?>

<body>

   <br>
<table border="0" color:#000000;"  cellpadding="0" cellspacing="0">
   <tr>

       <td valign="button" align="left" style="height: 34px;">
       <font size="2"><strong>&nbsp;PEDIDOS AGENDADOS PARA HOJE</strong></font>
       
       </td>
       <td >

</td>

   </tr>
   <tr style="height: 25px;vertical-align: top">
   <td colspan="4"><hr style="border: none; width:100%;" color="#ECECEC"></td>
  
   
   <tr style="height: 15px;font-size: 12px;">
   <td colspan="4">
   
   </td>
   
   </tr>
   
   </table>

<table width="auto" border="1" id="tabela" name="tabela" class="bordasimples" style="height: auto; width:518px" cellpadding="0" cellspacing="0">
<tr>
<td bgcolor="#ECECEC" height="35" style="color:#000000; position: " > 
<div align="center"><font color="#000000"><strong><span>PEDIDO</span></strong></font></div>
</td>
<td bgcolor="#ECECEC" height="35" style="color:#000000; position: " > 
<div align="center"><font color="#000000"><strong><span>POSIÇÃO</span></strong></font></div>
</td>
</tr>

<?php
$query1 = "select * from clientes where data_agendado!='0000-00-00' AND roteirizado!='sim' AND ativo=0 . $completa0 . $completa1 . $completa2";															
$rs1 = mysql_query($query1);

$hoje = date('Y-m-d');

while($row1 = mysql_fetch_array($rs1)){	
    $cod_pedido = $row1["codigo_pedido"];
    $data_agenda = $row1["data_agendado"];
    $lat = $row1["latitude_cad"];
    $lgn = $row1["longitude_cad"];
?>


<?php
if($data_agenda==$hoje){
    ?>
<tr>
<td bgcolor="#ECECEC" height="35" style="color:#000000; " > 

    <?php
    echo $cod_pedido;
    ?>

</td>
<td bgcolor="#ECECEC" height="35" style="color:#000000; " > 

<a href="javascript:map.setCenter(new google.maps.LatLng(<?php echo $lat; ?>,<?php echo $lgn; ?>));map.setZoom(15);infobox(<?php echo $lat; ?>, <?php echo $lgn; ?>, '<?php echo $nome_cliente_ei; ?>');tempofora();"><i class="material-icons" style="font-size:14px">search</i></a>

</td>
</tr>

    <?php
} 

?>



<?php
}
?>

</table>  

</body>

