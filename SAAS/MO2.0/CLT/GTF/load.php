
<style>


.round-button {
	width:15px;
	
	
	font-size:7px;
	font-weight: bold;
	line-height:14px;
	text-align:center;

  }
  .round-button-circle {
	width: 100%;
	height:0px;
	padding-bottom: 100%;
	border-radius: 50%;

	overflow:hidden;
		  
	background: #cc0000; 
	
	box-shadow: 0 0 3px gray;
	color: #FFFFFF;
	
  }
  .round-button-circle:hover {
	background:#30588e;
  }
  .round-button a {
	display:block;
	float:left;
	width:100%;
	padding-top:50%;
	padding-bottom:50%;
	line-height:7px;
	margin-top:-0.5em;
		  
	text-align:center;


	text-decoration:none;
  }

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


#tabela a:link 
{ 
text-decoration:none; 
	color: #000000;
} 
	
	/* visited link */
  #tabela a:visited {
  color: #000000;
	text-decoration:none; 
}

/* mouse over link */
#tabela a:hover {
  color: grey;
	text-decoration:none; 
}

/* selected link */
#tabela a:active {
  color: grey;
	text-decoration:none; 
}
	


	
</style>
<?php 
include ('session.php');
include ('conecta.php');
ini_set('max_execution_time',12000);
?>

<body>

  
<div id="usuarios">

<table width="auto" border="1" id="tabela" name="tabela" class="bordasimples" style="height: auto; width:518px" cellpadding="0" cellspacing="0">
<tr>
<td bgcolor="#ECECEC" height="35" style="color:#000000; position: " > 
<div align="center"><font color="#000000"><strong><span>USUÁRIO</span></strong></font></div>
</td>
<td bgcolor="#ECECEC" height="35" style="color:#000000; position:" > 
  <div align="left"><font color="#000000"><strong><span></span></strong></font></div>
</td> 
<td bgcolor="#ECECEC" height="35" style="color:#000000; position:" > 
  <div align="left"><font color="#000000"><strong><span>ÚLTIMA MENSAGEM</span></strong></font></div>
</td> 
<td bgcolor="#ECECEC" height="35" style="color:#000000; position:" nowrap> 
  <div align="left"><font color="#000000"'><strong><span>DATA</span></strong></font></div>
</td> 
<td bgcolor="#ECECEC" height="35" style="color:#000000; position:" > 
  <div align="center"><font color="#000000"><strong><span>MSG</span></strong></font></div>
</td>

</tr>

<?php
$query1 = "select * from usuario where nivel=2 ORDER BY login ASC";															
$rs1 = mysql_query($query1);
while($row1 = mysql_fetch_array($rs1)){	

$ultima_msg =$row1["login"];
$query_msg = "select * from chat where de='$ultima_msg' and lido=0 ORDER BY data DESC LIMIT 1";														
$rs_msg = mysql_query($query_msg);

$num_rows = mysql_num_rows($rs_msg);

//echo "$num_rows Rows\n";
while($row_msg = mysql_fetch_array($rs_msg)){	

    if($num_rows>0){

        ?>
        <script>
        $("#capaefectos").show("fast");
        </script>
<tr>

<td align="left"><strong><?php echo $row1["login"];?></strong></td>
<?php

// ICONE QTD DE MENSGENS ////////////

    $query_lido = "select * from chat where de='$ultima_msg' and lido=0";											
    $rs_lido = mysql_query($query_lido);
    
    $num_rows_lido = mysql_num_rows($rs_lido);

if($num_rows_lido>0){
?>
<td align="center" style="color:#FFFFFF;"><div class="round-button" ><div class="round-button-circle" ><?php echo $num_rows_lido;?></div></div></td>
<?php
} else {
?>
<td align="center" style="color:#FFFFFF;"></td>

<?php
}
////////////////////////////////////////
?>

<td align="left" title="<?php echo $row_msg["msg"]; ?>">
<?php
echo "<strong>" . $row_msg["de"] . "</strong>: " . substr($row_msg["msg"], 0, 30) . "...";
?>
</td>
<td align="left" nowrap><?php echo date('d/m/Y H:i:s', strtotime($row_msg["data"]));?></td>
<td align="center"><a href="javascript:acao_chat('<?php echo $row1["login"]?>');"><i class="material-icons" style="font-size:14px">chat_bubble</i></a></td>
</tr>
        <?php

    } else {

?>

<tr>
<td align="left"></td>
<td align="left"></td>
<td align="left"></td>
<td align="left" ></td>
<td align="center"></td>


</tr>
        <?php


  }
 

}


}
?>

</table>  
</div>

</body>

