<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>::. ROTAS ONLINE .:: CADD</title>
<link rel="stylesheet" type="text/css" href="css/menu_nv.css">
<link rel="stylesheet" type="text/css" href="css/step4_1.css">
<link rel="shortcut icon" href="imgs/favicon.ico" >
<link rel="icon" type="image/gif" href="imgs/animated_favicon1.gif" >
<script language="javascript" type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.0/jquery.min.js"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.9/jquery-ui.min.js"></script>
<script src="http://code.jquery.com/jquery-1.10.2.js"></script>
<script src="http://code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
    @charset "UTF-8";

  
    /* regra para o clear float */
    .cf:before,
    .cf:after {
        content: " ";
        display: table;
    }

    .cf:after {
        clear: both;
    }

    .cf {
        *zoom: 1;
    }

    #lateral {
        padding: 0 50px 0 0;
        -moz-transition: all 0.5s ease;
        -webkit-transition: all 0.5s ease;
        -o-transition: all 0.5s ease;
        transition: all 0.5s ease;

        background: rgb(44, 62, 80);
       
        height: 100%;
        overflow: hidden;
        width: 370px;
        position: fixed;
        top: 0;
        left: -320px;
    }

    #lateral:hover:before,
    #lateral:focus:before {
        left: -500px
    }

    #lateral:hover,
    #lateral:focus,
    #lateral:active {
        overflow-y: scroll;
        -moz-transform: translate(320px, 0);
        -webkit-transform: translate(320px, 0);
        -o-transform: translate(320px, 0);
        transform: translate(320px, 0);
        padding-right: 0;
    }



    #menu {
        font-style: italic;
        position: relative;
      
        padding: 0;
    }

    #menu {
        padding: 0;
        margin: 0;
    }

    #menu a:hover {
        color: rgb(255, 0, 0);
        background-color: rgba(255, 255, 255, 0.2);
        -moz-transition: all 0.5s ease;
        -webkit-transition: all 0.5s ease;
        -o-transition: all 0.5s ease;
        transition: all 0.5s ease;
    }

    @media (max-width: 500px) {
        body {
            margin-left: 0;
            background-size: 100% 28em !important;
        }

        #lateral {
            padding: 0;
            -moz-transition: all 0.5s ease;
            -webkit-transition: all 0.5s ease;
            -o-transition: all 0.5s ease;
            transition: all 0.5s ease;
            
            height: 100%;
            overflow: auto;
            width: 100%;
            position: static;
            top: 0;
            left: 0;
        }

        #lateral:before {
            z-index: 1000;
            width: 0;
            text-align: center;
            content: "";
            font-size: 0;
            color: white;
            position: static;
            top: 0;
            left: 0;
            display: inline-block;
        }

        #lateral:hover,
        #lateral:focus {
            overflow: scroll;
            -moz-transform: none;
            -webkit-transform: none;
            -o-transform: none;
            transform: none;
        }
    }

    .cor {
        background-color: white;
        font-weight: bolder;
       
    }

 
    .conteudo {
        transition: margin-left 0.5s ease;
    }
    .ativa {
        margin-left: 320px;
    }
</style>
</head>
<?php 
include ('session.php'); 
include ('essence/conecta.php');
ini_set('max_execution_time',12000);



$qual_rota = $_GET["imgsel"];
	if($qual_rota=="google"){
		$muda_javascript = "js/mapa_cadd.js";

		
	} else {
		
		$muda_javascript = "js/mapa_cadd.js";
	}
	

	$nome_rota = $_GET["rota"];
	
	$veiculo = $_GET["veiculo"];

	//$ordenou = $_GET["ordenou"];


?>

<script src="https://maps.googleapis.com/maps/api/js?key=<?php echo $chave; ?>&sensor=false&language=pt-BR&libraries=drawing&v=3.22"></script>
<script type='text/javascript' src="control/timer.js"></script>
<script src="js/logger.js"></script>
<script LANGUAGE="JavaScript">
						
						function show_alert() {
  alert("Clique no botão Calcular!");
}			

						
				function secondsToHms(d) {
				d = Number(d);
			 	var h = Math.floor(d / 3600);
				var m = Math.floor(d % 3600 / 60);
				var s = Math.floor(d % 3600 % 60);
				return ((h > 0 ? h + ":" + (m < 10 ? "0" : "") : "") + m + ":" + (s < 10 ? "0" : "") + s); 
				
				}
						
				
                        (function($) {
                        $.fn.waiting = function(options) {
                        options = $.extend({modo: 'normal'}, options);
                        this.fadeOut(options.modo);
                        return this;
                        };
                        })(jQuery);;

                      
			
						
function Submit() {
	//div_recal.style.visibility='hidden';
	document.getElementById("submit").submit();



}
setTimeout("Submit()",1000) //Tempo em milisegundos ou seja 1000 é 1 segundo

function alerta(){
	//$(mySidenav).scrollTop(0);
		sessionStorage.clear();
	//	document.reordenar.action = "scripts.php?acao=reordenar_rotas";
		document.getElementById("reordenar").submit(); 
		
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

function goBack() {
    window.history.back()
}

function openNav() {
  document.getElementById("mySidenav").style.width = "740px";

}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
}



</SCRIPT>
<?php


	///controle painel
	$query_where1 = "UPDATE passo SET ok='no' WHERE id='5'";
	$rs_where1 = mysql_query($query_where1);	
	$conta1= 0;
	/////////////////////////////////////////////////////////////	
	$query_veiculos = "select * from veiculos";
   	$rs1_veiculos = mysql_query($query_veiculos);	
		while($row_veiculos = mysql_fetch_array($rs1_veiculos)){
			$id_veiculo[$conta1] = $row_veiculos["id"];			
			$nome_veiculo[$conta1] = $row_veiculos["nome"];
			$tipo[$conta1] = $row_veiculos["tipo"];		
			$icone[$conta1] = $row_veiculos["type_icon"];			
			if($icone[$conta1] == "red1"){
			$cor[$conta1] = "#900000";				
			}
			if($icone[$conta1] == "red2"){
			$cor[$conta1] = "#e20016";				
			}
			if($icone[$conta1] == "blue1"){
			$cor[$conta1] = "#00f0ff";				
			}							
			if($icone[$conta1] == "blue2"){
			$cor[$conta1] = "#003cff";				
			}	
			if($icone[$conta1] == "green1"){
			$cor[$conta1] = "#42ff00";				
			}	
			if($icone[$conta1] == "green2"){
			$cor[$conta1] = "#00760b";				
			}
			if($icone[$conta1] == "green3"){
			$cor[$conta1] = "#03f385";				
			}
			if($icone[$conta1] == "purple1"){
			$cor[$conta1] = "#7200ff";				
			}
			if($icone[$conta1] == "purple2"){
			$cor[$conta1] = "#340058";				
			}
			if($icone[$conta1] == "orange"){
			$cor[$conta1] = "#ff7800";				
			}
			if($icone[$conta1] == "brown"){
			$cor[$conta1] = "#9c5100";				
			} 
			if($icone[$conta1] == "yellow"){
			$cor[$conta1] = "#ffbc00";				
			} 
    
			$concatena_carro[$conta1] = "imgs/" . $tipo[$conta1] . "_" . $icone[$conta1] . ".png";

		//	$reordenar[$conta1] =  $row_veiculos["reordenado"];

			
			//echo ($concatena_carro[$conta1]);
			$conta1++; 
		
		}
		?>
        
<script type="text/javascript">
		id_veiculo = <?php echo json_encode($id_veiculo) ?>;	
		nome_veiculo = <?php echo json_encode($nome_veiculo) ?>;
		concatena_carro = <?php echo json_encode($concatena_carro) ?>;		
		color_carro = <?php echo json_encode($cor) ?>;	
		//reordenar = <?php echo json_encode($reordenar) ?>;	

</script>

	<?php


	/////////////////////////////////////////////////////////////
	$inicio = $_GET["inicio"];
	$final = $_GET["final"];
	
	$conta_fora_new = 0;
	$conta_fora1_new = 0;

	$conta = 0;
	$conta1_new = 0;
	
	
	
if(!empty($_GET['rotas'])){
     foreach($_GET['rotas'] as $report_id){
		$arr[$conta] = $report_id;			
		//seleciona todos valores
		$query1 = "select * from clientes where veiculo=$arr[$conta] and ativo=0 order by veiculo";
   	    $rs1 = mysql_query($query1);
		
		while($row = mysql_fetch_array($rs1)){
			
			$codigo_cliente[$conta1_new] = $row["codigo_cliente"];
			$nome_cliente[$conta1_new] = $row["nome"];		
			$veiculo_cliente[$conta1_new] = $row["veiculo"];		
			$query_tipo = "select * from veiculos where id=$veiculo_cliente[$conta1_new]";
			$query_tipo = mysql_query($query_tipo);	
			// Tirando o while
			$dados = mysql_fetch_array($query_tipo);
			// Exibição
			$tipo= $dados['tipo'];
			$nome_veiculo = $dados['nome'];
			//echo $tipo;
			$lat_cliente[$conta1_new] = $row["latitude_cad"];
			$lgn_cliente[$conta1_new] = $row["longitude_cad"];
			$endereco_cliente[$conta1_new] = $row["endereco"];
			$bairro_cliente[$conta1_new] = $row["bairro"];		
			$cep_cliente[$conta1_new] = $row["cep"];			
			$cidade_cliente_fora[$conta1_new] = $row["cidade"];			
			$codigo_pedido[$conta1_new] = $row["codigo_pedido"];
			$obs_pedido[$conta1_new] = $row["obs_pedido"];			
			$temposervico_cliente[$conta1_new] = $row["tempo_servico"];			
			$peso_cliente[$conta1_new] = $row["peso"];
			$volume_cliente[$conta1_new] = $row["volume"];
			$valor_cliente[$conta1_new] = $row["valor"];		
			$setor_cliente[$conta1_new] = $row["setor"];
			$loja[$conta1_new] = $row["loja"];
			$data_entrega[$conta1_new] = $row["data_entrega"];
			$cod_vendedor[$conta1_new] = $row["cod_vendedor"];
			$vendedor[$conta1_new] = $row["vendedor"];
			$cod_produto[$conta1_new] = $row["cod_produto"];
			$produto[$conta1_new] = $row["produto"];
			$uf[$conta1_new] = $row["estado"];
			$cod_cancao[$conta1_new] = $row["cod_cancao"];
			$conta1_new++; 
			
		}
		$conta++;	
     }	 
   }

?>

 
<body>

<?php include ('base2.php'); ?>


<form name="roteiriza" action="step4_1r.php" method="post">
  <div id="apDiv13b">
   <?php
 


  	$contala = count($arr);
	
	//$veiculo_cliente = array_unique($veiculo_cliente);
	//var_dump($veiculo_cliente);
	//print implode(',', array_unique(array_filter(explode(',', $result))));
	
 for($i=0;$i<count($arr);$i++){
	
	$query_new = "select * from rotas where veiculo=$arr[$i] order by ordem";
	$rs_new = mysql_query($query_new);
	$rs_new1 = mysql_query($query_new);
	$rs_new2 = mysql_query($query_new);
	$rs_new3 = mysql_query($query_new);	
	$rs_new6 = mysql_query($query_new);	
	$rs_new7 = mysql_query($query_new);
	$rs_new8 = mysql_query($query_new);		
	$rs_new9 = mysql_query($query_new);		
	//$num_rows = mysql_num_rows($rs_new1);
//echo $num_rows;
	$codigo_cliente1 ="";
	$nome_cliente1 ="";
	$lat_cliente1 ="";
	$lgn_cliente1 ="";
	$contatena_valores ="";
	$veiculo_cliente1="";
	$codigo_pedido1="";
	$obs_pedido1="";
	$id_visita1="";

	$conta2 = 0;
	$conta3 = 0;	
	$conta4 = 0;
	$conta6 = 0;	
	$conta7 = 0;	
	$conta8 = 0;
	$conta9 = 0;
 ?>
 
<div id="waypoints<?php echo $i; ?>" class="div_transparente">
   <?php
	while($row2 = mysql_fetch_array($rs_new)){
		    
			$lat_cliente1[$conta2] = $row2["lat"];
			$lgn_cliente1[$conta2] = $row2["lgn"];
			$contatena_valores[$conta2] =  '"' . $row2["lat"] . ", " . $row2["lgn"] . '"';	 
			$contatena_valores[$conta2] = $contatena_valores[$conta2] . ", ";
			//echo '"' . $inicio . '", ';
			echo ($contatena_valores[$conta2]);
			$conta2++;	 	
	}
			
	?>
</div>  
<div id="veiculo<?php echo $i; ?>" class="div_result">
<?php
while($row3 = mysql_fetch_array($rs_new1)){ 	
			$codigo_cliente1[$conta3] = $row3["id"];
		//	$nome_cliente1[$conta3] = $row3["nome_cliente"];	
		//	$veiculo_cliente1[$conta3] = $row3["veiculo"];
			echo '"' . $codigo_cliente1[$conta3] . '", ';  		
			$conta3++;
	
}
?>
 </div>
 
 <div id="carro<?php echo $i; ?>" class="div_result">
<?php
while($row4 = mysql_fetch_array($rs_new2)){ 		
			$veiculo_cliente1[$conta4] = $row4["veiculo"];
			echo '"' . $veiculo_cliente1[$conta4] . '", ';  		
			$conta4++;
	
}
//$novo = var_dump($veiculo_cliente1[$conta4]);
//echo $novo;  	
?>
 </div>
<div id="nome_cliente<?php echo $i; ?>" class="div_result">
<?php
while($row5 = mysql_fetch_array($rs_new3)){ 	
			$nome_cliente1[$conta5] = $row5["nome_cliente"];
			echo '"' . $nome_cliente1[$conta5] . '", ';  		
			$conta5++;
	
}
?>
 </div>
 <div id="endereco_cliente<?php echo $i; ?>" class="div_result">
<?php
while($row6 = mysql_fetch_array($rs_new6)){ 	
			$endereco_cliente[$conta6] = $row6["endereco"];
			echo '"' . $endereco_cliente[$conta6] . '", ';  		
			$conta6++;
	
}
?>
 </div>
 <div id="codigo_pedido<?php echo $i; ?>" class="div_result">
<?php
while($row7 = mysql_fetch_array($rs_new7)){ 	
			$codigo_pedido1[$conta7] = $row7["codigo_pedido"];
			echo '"' . $codigo_pedido1[$conta7] . '", ';  		
			$conta7++;
}
?>
 </div>
 <div id="obs_pedido<?php echo $i; ?>" class="div_result">
<?php
while($row8 = mysql_fetch_array($rs_new8)){ 	
			$obs_pedido1[$conta8] = $row8["obs_pedido"];
			echo '"' . $obs_pedido1[$conta8] . '", ';  		
			$conta8++;
}
?>
 </div>
 <div id="id_visita<?php echo $i; ?>" class="div_result">
<?php
while($row9 = mysql_fetch_array($rs_new9)){ 	
			$id_visita1[$conta8] = $row9["id"];
			echo '"' . $id_visita1[$conta8] . '", ';  		
			$conta9++;
}
?>
 </div>
<?php
}


?>

<script type="text/javascript">
	veiculo_numero_js = <?php echo json_encode($contala) ?>;
	
</script>

<input type="hidden" id="txtEnderecoPartida" name="txtEnderecoPartida" value="<?php echo $inicio ?>" />                   
<input type="hidden" id="txtEnderecoChegada" name="txtEnderecoChegada" value="<?php echo $final ?>"  /> 
</div>
</form>

    <div id="lateral">
        <div id="menu">


        </div> <!-- /#menu -->

    </div> <!-- /#lateral -->

    <div class="conteudo">
      
    okokok
    </div>


    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var elems = document.querySelectorAll('.collapsible');
            var instances = M.Collapsible.init(elems, options);
        });

        // Or with jQuery

        $(document).ready(function() {
            $('.collapsible').collapsible();
        });

        $("#lateral").mouseenter(function(event){
            $('.conteudo').addClass("ativa");
        });
        $("#lateral").mouseleave(function(event){
            $('.conteudo').removeClass("ativa");
        });
    </script>

</body>

</html>