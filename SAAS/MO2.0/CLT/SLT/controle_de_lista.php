<?php 
  include ('session.php');
  include ('conecta.php');
  ini_set('max_execution_time',12000);
    
  $lg = $_GET['lg'];
  $n= $_GET['n'];
  $st= $_GET['st'];
  $at= $_GET['at'];
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  
<head>
  <title>::. MONITORAMENTO .:: CADD</title>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

  <link rel="shortcut icon" href="imgs/favicon.ico" >
  <link rel="icon" type="image/gif" href="imgs/animated_favicon1.gif" >

  <link rel="stylesheet" type="text/css" href="css/menu.css">
  <link rel="stylesheet" type="text/css" href="css/controle_de_lista.css">

  <link class="theme" rel="stylesheet" href="css/theme.blue.css">
  <link rel="stylesheet" href="css/dragtable.mod.css">
  <link rel="stylesheet" type="text/css" href="css/dragtable.css" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

  <style>
    #pag1_chat{
      position: fixed;
      width: 100%;
      left: 0px;
      top: 0px;
      height:100%;
      z-index:999999;
      background-repeat: repeat;
      background-size: cover;
      background-color: white;
      opacity: 0.7;
    }
    
    #pag2_chat{
      width: 600px;
      height: 404px;
      top: 50%;
      left: 50%;
      margin-top: -202px;
      margin-left: -300px;
      position: absolute;
      border: 1px solid silver;
      background-color: white;
      z-index:999999;
    }
    
    #botao_chat{
      width: 30px;
      height: 30px;
      top: 50%;
      left: 50%;
      margin-top: -220px;
      margin-left: 290px;
      position: absolute;
      z-index:9999999;
      color: #000;
    }
    .apDiv12{
      position: relative;
      z-index: 0;
      width: 98%;
      height: 730px;
      left: 0px;
      top: 0px;
      overflow: auto;
      margin-left: 20px;
      margin-right: 20px;
      background-color: #ffffff;
    }
    .total{
      position: relative;
      width: 100%;
      height: 100%;
      border-color: gray;
    }
    .tablesorter-blue{
      width: 100%;
      background-color: #fff;
      text-align: left;
      border-spacing: 0;
      border: #cdcdcd 1px solid;
      border-width: 1px 0 0 1px;
      font-size: 11px;
    }
    .title{
      margin: 0px 20px 0px 20px;
    }
    .from {
      height: 38px !important;
     
      padding: 0.80rem !important;
    
      font-size: unset !important;
      border: solid 1px !important;
      border-color: #bbbbbb !important;
    }
    .from-date {
      padding: 0rem 1rem 0rem 0rem;
    }
    .until-date {
      padding: 0rem 1rem 0rem 0rem;
    }
    .until {
      height: 38px !important;
     
      padding: 0.80rem !important;
   
      font-size: unset !important;
      border: solid 1px !important;
      border-color: #bbbbbb !important;
    }
    .search-button{
      color: #FFF;
      background: #589bd4;
      border: 1px solid #589bd4;
      font-size: 11px;
      height: 38px;
      width: 150px;
      font-weight: bold;
    }
    .search-button:active {
      transform: scale(0.98);
    }

    .search-button:hover {
    background: #2868c7;
    border: 1px solid #2868c7;
    cursor: pointer;
}


    
#pag1x{
position: absolute;
	width: 100%;
	left: 0px;
	top: 0px;
	height:2000px;

z-index:9997;
background-color: white;
opacity: 0.95;

		
}
	#pag2x{
width: 520px;
height: 586px;
top: 50%;
left: 50%;
margin-top: -298px;
margin-left: -260px;
position: absolute;
border: 1px solid silver;
background-color: white;
	z-index:9998;
	

}

#botao1{
	position: absolute;
    width: 30px;
		height: 30px;
top: 50%;
left: 50%;
margin-top: -316px;
margin-left: -280px;
position: absolute;
	z-index:99999;
		
	}
	
  .jquery-waiting-base-container {
		position: absolute;
	left: -2px;
	top: -2px;
	margin: 0px;
	width: 102%;
	height: 100%;
	display: block;
	z-index: 999999;
	opacity: 1;
	-moz-opacity: 1;
	filter: alpha(opacity = 100);
	background-color:#FFF;
	
	background-image: url("../imgs/loading.gif");
	background-repeat: no-repeat;
	background-position: 100% 100%;
	padding-top: 250px;
}
  </style>

</head>

<body>
 
  <?php include ('base_cad.php');

    if(!empty($_POST['inicial']) OR $_POST['inicial']!='0000-00-00') {
      $initialDateToConvert = str_replace('/', '-', $_POST['inicial']);
      $postDateInicial = date('Y-m-d', strtotime($initialDateToConvert));
    }

    if(!empty($_POST['final']) OR $_POST['final']!='0000-00-00') {
      $finalDateToConvert = str_replace('/', '-', $_POST['final']);
      $postDateFinal = date('Y-m-d', strtotime($finalDateToConvert));
    }

    $queryData1 = "SELECT id FROM rotas WHERE data_teste BETWEEN '$postDateInicial' AND '$postDateFinal' ";
    $result1 = mysql_query($queryData1);
    $total_todos1 = mysql_num_rows($result1);
 

    //echo $queryData;
  
if($total_todos1>=7000){

  ?>
  <script LANGUAGE="JavaScript" TYPE="text/javascript">

  alert("O filtragem obteve <?php echo $total_todos1 ?> registros. \n Essa pesquisa pode levar muito tempo para carregar a pagina! \n O limite de resultados é de 7000 consultas.\n Faça uma pesquisa com menos resultados!");
 // break;
  window.location.href ="controle_de_lista.php";

  </script>


  <?php
 
} else {

  $queryData = "SELECT * FROM rotas WHERE data_teste BETWEEN '$postDateInicial' AND '$postDateFinal' ";
  $result = mysql_query($queryData);
  $total_todos = mysql_num_rows($result);

}
?>

  <br>
  
  <div id="div_titulo">
    <table width="100%" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td align="left" valign="middle">
          <font size="3">LISTAS POR DATA</font>
        </td>
      </tr>
    </table>
  </div>
<br>
  <table class="title" border="0" cellpadding="0" cellspacing="0">

    <tr>

      <td  align="left" nowrap="nowrap"  style="width: 20px;">
        <i class="material-icons" style="font-size: 30px;margin-top: 3px;">list</i>
      </td>

      <td valign="button">
        <font size="4"><strong>&nbsp;PESQUISAR POR DATA - NOTA FISCAL/PEDIDO</strong>
        

      
        </font>
      </td>

    </tr>

    <tr style="height: 25px;vertical-align: button">
      <td colspan="2">
        <hr style="border: none; width:450px;" >
      </td>
    </tr>

  </table>
<br><br>
  <table class="title" border="0" cellpadding="0" cellspacing="0">

    <tr style="height: 55px;vertical-align: button">

      <td colspan="2">

        <div style="display: flex; margin-bottom: 1rem;">

          <form action="controle_de_lista.php" method="POST" name="data_search" id="data_search" style="text-transform: none;font-size:11px">

            <div style="display:flex;">
        
              <div class="from-date">
                De:&nbsp;&nbsp;&nbsp;<input type="datetime-local" class="from"  name="inicial" placeholder="Data inicial">
              </div>

              <div class="until-date">
                Até:&nbsp;&nbsp;&nbsp;<input type="datetime-local" class="until" name="final" placeholder="Data final">
              </div>

            </div>
          </form>

          <button type="submit" form="data_search" class="search-button">PESQUISAR</button>
        </div>

       
        <div style="font-size: 11px;">
        <br>
          <?php
          if($total_todos>0){
            echo "De: <strong>".$_POST['inicial']."</strong> Até: <strong>".$_POST['final']."</strong>";
          } 
           
          ?>
        </div>
        
      </td>
      </tr>
      <tr>
<td >
  <div  style="font-size: 11px;">
  <br>

<?php
 if($total_todos>0){
            echo " Pedidos encontrados - <strong>".$total_todos."</strong>";
    } 
           
?>
  </div>
  <div style="font-size: 11px;">
        <br>
        <span style="color:red"><strong>OBS: Ideal para o bom funcionamento da pesquisa a utilização de até no máximo duas semanas!</strong></span>
        </div>

</td>
    </tr>
  </table>
<br><br>
  <div class="apDiv12">
    <div class="total">
      <table border="3" id="demo" name="demo" class="tablesorter" >
        <thead>
          <tr bgcolor="#589bd4" height="35px" class="active">

            <?php
              $pieces = explode(",", $ordem_table);
              $result1 = count($pieces);

              $i = 0;
                  
              $nome_cli=array();
              $login_cli=array();
              $lat_cad=array();
              $lng_cad=array();
              $status=array();
              $lista=array();
              $ocorrencia=array();
              $rota=array();
              $sequencia=array();
              $endereco=array();
              $cidade=array();
              $tempo=array();
              $dth_ocorrenciax=array();
              $classe=array();
              $obs=array();
              $posicao_ocorrencia_lat = array();
              $posicao_ocorrencia_lgn = array();
              
              for ($i2 = 0; $i2 < $result1; $i2++) { ?>

                <th nowrap="nowrap" headers="<?php echo $pieces[$i2]; ?>" bgcolor="#00000" style="width: 20px; color:#000000;" class="drag-enable"> <?php

                  if($pieces[$i2]=="localiza"){ ?>
                    <div align="center" >LL</div> <?php
                  }

                  if($pieces[$i2]=="exclui"){ ?>
                    <div align="center" >EX</div> <?php
                  }
                  if($pieces[$i2]=="edit"){ ?>
                    <div align="center" >ED</div> <?php
                  }

                  if($pieces[$i2]=="geo"){ ?>
                    <div align="center" >G</div> <?php
                  }

                  if($pieces[$i2]=="check"){ ?>
                    <div align="center" >CK</div> <?php
                  } 

                  if($pieces[$i2]=="status"){ ?>
                    <div align="center" >STS</div> <?php
                  } 
                  if($pieces[$i2]=="foto"){ ?>
                    <div align="center" >FT</div> <?php
                  } 
                  if($pieces[$i2]=="sequencia"){ ?>
                    <div align="center" >SQ</div> <?php
                  } 
                  if($pieces[$i2]=="codigo_pedido"){ ?>
                    <div align="center" >PEDIDO</div> <?php
                  } 

                  if($pieces[$i2]=="quem"){ ?>
                    <div align="center" >OP.</div> <?php
                  } 

                  if($pieces[$i2]=="canhoto"){ ?>
                    <div align="center" >C.C</div> <?php
                  } 
                  if($pieces[$i2]=="classificacao"){ ?>
                    <div align="center" >CLS</div> <?php
                  } 

                  if($pieces[$i2]!="check" AND $pieces[$i2]!="status" AND $pieces[$i2]!="foto" AND $pieces[$i2]!="geo" AND $pieces[$i2]!="foto" AND $pieces[$i2]!="edit" AND $pieces[$i2]!="exclui" AND $pieces[$i2]!="localiza" AND $pieces[$i2]!="sequencia" AND $pieces[$i2]!="codigo_pedido" AND $pieces[$i2]!="quem" AND $pieces[$i2]!="canhoto" AND $pieces[$i2]!="classificacao"){ ?>
                    <div align="center" >
                      <?php echo strtoupper($pieces[$i2]); ?>
                    </div> <?php
                  } ?>
                </th> <?php
              
              }
            ?>
          </tr>

        </thead>
        
        <tbody>

          <?php
            $conta = 0;

            while($row = mysql_fetch_assoc($result)){
              $conta++; ?>
          
              <tr height="auto">

                <?php
                  $pega_ocorrencia = $row["ocorrencia"];

                  // ADD ARRAY MAPA
                  array_push($nome_cli, $row["nome"]);
                  array_push($login_cli, $row["login"]);
                  array_push($lat_cad, $row["y"]);
                  array_push($lng_cad, $row["x"]);
                  array_push($lista, $row["lista"]);  
                  $oco1 = $row["ocorrencia"];
                  $query_qual1 = "select ocorrencia from ocorrencia where id=$oco1";
                  $query_qual1 = mysql_query($query_qual1);	
                  $dados1 = mysql_fetch_array($query_qual1);
                  $ocorrencia_ok =  $dados1['ocorrencia'];
                  array_push($ocorrencia, $dados1['ocorrencia']);
                  array_push($rota, $row["rota"]); 
                  array_push($sequencia, $row["sequencia"]);
                  array_push($endereco, $row["endereco"]);
                  array_push($cidade, $row["cidade"]);
                  array_push($tempo, $row["tempo"]);  
                  array_push($posicao_ocorrencia_lat, $row["x_ocorrencia"]);
                  array_push($posicao_ocorrencia_lgn, $row["y_ocorrencia"]);

                  if($row["dth_ocorrencia"] =='0000-00-00 00:00:00'){
                    $portuga= "";

                  } else {
                    $portuga = strtotime($row["dth_ocorrencia"]);
                    $portuga= date('d/m/Y H:i:s', $portuga);
                  }

                  array_push($dth_ocorrenciax,  $portuga);     
                  array_push($classe, $row["classificacao"]);
                  array_push($obs, $row["obs"]);

                  $status_icon = "";
                  $status_number = $row["status"];

                  if($row["status"] == 3 ){ 
                    $status_icon = "#000000"; 
                    $status_icon_mapa = "black";
                  }

                  if($row["status"] == 2 ){ 
                    $status_icon = "#C00"; 
                    $status_icon_mapa = "red";
                  }

                  if($row["status"] == 0 ){ 
                    $status_icon = "#F90"; 
                    $status_icon_mapa = "orange";
                  }

                  if($row["status"] == 1 ){ 
                    $status_icon = "#5cbc69";
                    $status_icon_mapa = "green";
                  }

                  // ICONE ARRAY MAPA   
                  array_push($status, $status_icon_mapa);
                  $guarda1 = "step2_sm.php?id=" . $row["id"] ."&login=" . $row["login"] . "&rota=" . $row["rota"] . "&cli=". $row["idcliente"]. "&end=". $row["endereco"] . "&cid=". $row["cidade"] ."&seq=" . $row["sequencia"] ."&nome=" . $row["nome"] ."&status=" . $row["status"] ."&oco=" . $row["ocorrencia"];
                  $guarda = "step2_gm.php?id=" . $row["id"] ."&x=" . $row["x"] . "&y=" . $row["y"] . "&cli=". $row["idcliente"]. "&end=". $row["endereco"] . "&cid=". $row["cidade"];
                  $guarda2 = "step2_gallery.php?id=" . $row["id"] ."&login=" . $row["login"] . "&rota=" . $row["rota"] . "&cli=". $row["idcliente"]. "&end=". $row["endereco"] . "&cid=". $row["cidade"] ."&seq=" . $row["sequencia"] ."&nome=" . $row["nome"] ."&status=" . $row["status"] ."&oco=" . $row["ocorrencia"];
        
                  $id_visita = $row['id'];
                  $query_img = "select id from images where id_visita='$id_visita'";
                  $query_img = mysql_query($query_img);
                  
                  $total = mysql_num_rows($query_img);
                  //echo $total;
                  
                  $guarda_edit = "step2_edit.php?codigo=". $row["id"];
                  $guarda_status = "step2_mudastatus.php?rotas_id=". $row["id"];
                  
                  for ($i1 = 0; $i1 < $result1; $i1++) {

                    if($pieces[$i1]=="check"){ ?>

                      <div id="general-content">
                        <td align="center" nowrap="nowrap" width="auto">
                          <input type="checkbox" class="marcar" name="check_list[]" id="check_list" value="<?php echo $row["id"]; ?>"></td>
                      </div> <?php

                    }

                    if($pieces[$i1]=="status"){ ?>
                      <td align="center" style="width: 20px">
                        <i class="material-icons" style="font-size:16px; color: <?php echo $status_icon;?>">circle</i>
                        <p hidden>
                          <?php echo $status_number;?>
                        </p>
                      </td> <?php
                    }

                    if($pieces[$i1]=="geo"){ ?>
                      <td align="center" nowrap="nowrap" width="auto">
                        <a href="#" data-tooltip="Localização do Cliente" onclick="javascript:alert('Icone temporariamente desabilitado!');return false;">
                          <i class="material-icons" style="font-size:16px">location_on</i>
                        </a>
                      </td> <?php
                    }

                    if($pieces[$i1]=="foto"){ ?>
                      <td align="center" style="width: 20px"> <?php
                        if($total!=0){ ?>
                          <a href="javascript:acao_volta(<?php echo "'" . "?id=" . $row["id"] . "'"; ?>);">
                            <i class="material-icons" style="font-size:16px">&#xe3b0;</i>
                          </a> <?php   
                        }?>
                      </td><?php
                    }

                    if($pieces[$i1]=="edit"){ ?>
                      <td align="center" style="width: 20px">
                        <a href="#" data-tooltip="Editar dados do cliente" onclick="javascript:alert('Icone temporariamente desabilitado!');return false;">
                          <i class="material-icons" style="font-size:16px">&#xe560;</i>
                        </a>
                      </td><?php
                    }

                    if($pieces[$i1]=="exclui"){ ?>
                      <td align="center" style="width: 20px">
                        <a href="javascript:confirmaExclusao('scripts.php?acao=exclui_cliente_base_cliente&id=<?php echo $row["id"] ?>')" data-tooltip="Excluir cliente">
                          <i class="material-icons" style="font-size:16px;color:red">&#xe5c9;</i>
                        </a>
                      </td><?php
                    }

                    if($pieces[$i1]=="localiza"){ ?>
                      <td align="center" style="width: 20px">
                        <a href="javascript:map.setCenter(new google.maps.LatLng(<?php echo $row["y"]; ?>,<?php echo $row["x"]; ?>));map.setZoom(12);infobox(<?php echo $row["y"]; ?>, <?php echo $row["x"]; ?>, '<?php echo mb_strimwidth($row["nome"], 0, 60, "..."); ?>');">
                          <i class="material-icons" style="font-size:16px;color:black">my_location</i>
                        </a>
                      </td><?php
                    }

                    if($pieces[$i1]=="codigo_pedido"){ ?>
                      <td align="center" nowrap="nowrap" width="auto">
                        <strong><?= $row["codigo_pedido"] ?></strong>
                      </td><?php
                    }

                    if($pieces[$i1]=="ocorrencia"){ ?>
                      <td align="center" nowrap="nowrap" width="auto">
                        <?php echo $ocorrencia_ok; ?>
                      </td><?php
                    }

                    if($pieces[$i1]=="tempo"){
                      $entra = $row["dth_chegada"];
                      $sai = $row["dth_saida"];

                      $data_login = strtotime($entra);
                      $data_logout = strtotime($sai);

                      $tempo_con = mktime(date('H', $data_logout) - date('H', $data_login), date('i', $data_logout) - date('i', $data_login), date('s', $data_logout) - date('s', $data_login));?>

                      <td align="center" nowrap="nowrap" width="auto"> <?= date('H:i:s', $tempo_con); ?></td> <?php
                    } 

                    if($pieces[$i1]=="ce"){
                      if ($row["ce"]==true){
                        $cerca = "<i class='material-icons' style='font-size:14px'>notifications_active</i>";
                      } else {	
                        $cerca = "";
                      }?>

                      <td align="center" nowrap="nowrap" width="auto">
                        <strong><?= $cerca ?></strong>
                      </td><?php
                    }

                    if($pieces[$i1]=="p.o"){ ?>
                      <td align="center" nowrap="nowrap" width="auto" > <?php

                        if ($row["x_ocorrencia"]!=""){ ?>
                          <a href="javascript:map.setCenter(new google.maps.LatLng(<?php echo $row["x_ocorrencia"]; ?>,<?php echo $row["y_ocorrencia"]; ?>));map.setZoom(12);infobox(<?php echo $row["x_ocorrencia"]; ?>, <?php echo $row["y_ocorrencia"]; ?>, '<?php echo "LOCAL DO CHECK-IN: " . mb_strimwidth($row["nome"], 0, 60, "..."); ?>');">
                            <i class='material-icons' style='font-size:14px'>mobile_friendly</i>
                          </a><?php
                        }?>

                      </td><?php
                    }

                    if($pieces[$i1]=="canhoto"){ ?>
                      <td align="center" nowrap="nowrap"  width="200px"> <?php

                        if($row["canhoto"]=="1"){ ?>
                          <i class='material-icons' style='font-size:16px;color: green;' >thumb_up</i>
                            <font  style="font-size: 1px;" color="#FFF">1</font> <?php
                        } else { ?>
                          <font style="font-size: 1px;" color="#FFF">0</font> <?php
                        
                        } ?>

                      </td><?php
                    }

                    if($pieces[$i1]!="check" AND $pieces[$i1]!="status" AND $pieces[$i1]!="geo" AND $pieces[$i1]!="foto" AND $pieces[$i1]!="edit" AND $pieces[$i1]!="exclui" AND $pieces[$i1]!="localiza" AND $pieces[$i1]!="codigo_pedido" AND $pieces[$i1]!="ocorrencia" AND $pieces[$i1]!="tempo" AND $pieces[$i1]!="ce" AND $pieces[$i1]!="p.o" AND $pieces[$i1]!="canhoto"){ ?>
                      <td align="center" nowrap="nowrap" width="auto">
                        <?= $row["$pieces[$i1]"]; ?>
                      </td> <?php
                    }
                  }
                ?>
              </tr> <?php
              //// LOADING 0 A 100% ////////////////////////////////////////////////////
              $pega_loading = intval(($conta/$total_todos)* 100) . "%"; ?>
              <div class="jquery-waiting-base-container">
                <?php
                  echo "<div id='fdp' style='position:absolute;margin:0px 0px 0px 0px;width:$pega_loading;height:100%;background:#FFF;color:#00000;text-align:center;'>
                    <strong>$pega_loading</strong>
                  </div>";
                  flush();
                  ob_flush();
                ?>
              </div> <?php
            }
          ?>
        </tbody>
      </table>
     
    </div>

    

  </div>
  <br><br><br><br>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
  <script type='text/javascript' src="control/timer.js"></script>
  <script src="js/logger.js"></script>
  <script src="js/jquery-ui.min.js"></script>
  <script src="js/jquery.tablesorter.js"></script>
  <script src="js/jquery.tablesorter.widgets.js"></script>
  <script src="js/extras/jquery.dragtable.mod.js"></script>

  <!-- CALENDARIO LIB AND LANGUAGE -->
  <script src="https://npmcdn.com/flatpickr/dist/flatpickr.min.js"></script>
  <script src="https://npmcdn.com/flatpickr/dist/l10n/pt.js"></script>
  <script LANGUAGE="JavaScript">
    (function($) {
    $.fn.waiting = function(options) {
        options = $.extend({modo: 'normal'}, options);
        this.fadeOut(options.modo);
        return this;
      };
    })(jQuery);

    $(document).ready(function() {
      $('.defaultTable').dragtable();
    });

    $(function () {
      $('table').dragtable({
        sortClass: '.sorter',
        tablesorterComplete: function(table) {},
        dragaccept: '.drag-enable',  // class name of draggable cols -> default null = all columns draggable
        revert: false,               // smooth revert
        dragHandle: '.table-handle', // handle for moving cols, if not exists the whole 'th' is the handle
        maxMovingRows: 40,           // 1 -> only header. 40 row should be enough, the rest is usually not in the viewport
        excludeFooter: false,        // excludes the footer row(s) while moving other columns. Make sense if there is a footer with a colspan. */
        onlyHeaderThreshold: 100,    // TODO:  not implemented yet, switch automatically between entire col moving / only header moving
        persistState: null,          // url or function -> plug in your custom persistState function right here. function call is persistState(originalTable)
        restoreState: null,          // JSON-Object or function:  some kind of experimental aka Quick-Hack TODO: do it better
        exact: true,                 // removes pixels, so that the overlay table width fits exactly the original table width
        clickDelay: 10,              // ms to wait before rendering sortable list and delegating click event
        containment: null,           // @see http://api.jqueryui.com/sortable/#option-containment, use it if you want to move in 2 dimesnions (together with axis: null)
        cursor: 'move',              // @see http://api.jqueryui.com/sortable/#option-cursor
        cursorAt: false,             // @see http://api.jqueryui.com/sortable/#option-cursorAt
        distance: 0,                 // @see http://api.jqueryui.com/sortable/#option-distance, for immediate feedback use "0"
        tolerance: 'pointer',        // @see http://api.jqueryui.com/sortable/#option-tolerance
        axis: 'x',                   // @see http://api.jqueryui.com/sortable/#option-axis, Only vertical moving is allowed. Use 'x' or null. Use this in conjunction with the 'containment' setting
        beforeStart: $.noop,         // returning FALSE will stop the execution chain.
        beforeMoving: $.noop,
        beforeReorganize: $.noop,
        beforeStop: $.noop

      }).tablesorter({
        theme: 'blue',
        selectorSort: '.sorter',
        widgets: ['zebra', 'filter', 'columns']
      });
    });

    function confirmaExclusao(aURL) {
      if(confirm('Você tem certeza que deseja excluir todas mensagens do usuário?')) {
        location.href = aURL;
      }
    }

    $(document).ready(function(){
      $(".jquery-waiting-base-container").waiting({modo:"slow"});
    });

    function acao_chat(campo) {
      document.getElementById("chat").style.display = "block";
      var teste = "chat_layer.php?chat=" + campo;
      document.getElementById("pag2_chat").src = teste; 
    }

    flatpickr("input[type=datetime-local]", {
      dateFormat: "d-m-Y",
      "locale": "pt",
    });

    
    function acao_volta(valor) {
	
  document.getElementById("Pagina1").style.display = "block";
  
  var teste = "step2_gallery.php" + valor;
 // alert(valor);
  
  
  document.getElementById("pag2x").src = teste; 
  }
  

  function fecha_foto() {
        
        document.getElementById("Pagina1").style.display = "none";

            };


  </script>

<div id="Pagina1" style="display: none;">
	  
    <div id="botao1"><a href="#" onclick="fecha_foto();" ><i class="material-icons" style="font-size:30px;color:black;">&#xe5c9;</i></a></div>
     <iframe name="pag1x" frameborder="0" id="pag1x" scrolling="no" marginheight="0" marginwidth="0" trusted="yes"></iframe>
    <iframe name="pag2x" src="" frameborder=0 id="pag2x" scrolling="no" marginheight="0" marginwidth="0" trusted="yes"></iframe>
 </div>      


</body>
</html>