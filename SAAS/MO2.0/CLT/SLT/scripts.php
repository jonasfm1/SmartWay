<?php
include('conecta.php');
include('session.php');
ini_set('max_execution_time', 12000);
?>
<link rel="stylesheet" type="text/css" href="../RO_1.3/css/style.css">
<script type="text/javascript" src="../RO_1.3/js/jquery-1.js"></script>
<script type="text/javascript" src="../RO_1.3/js/functions.js"></script>


<?php
$acao = $_GET['acao'];
$id_yes = $_GET['id'];

switch ($acao) {



//////////////ADICIONAR CHAT APP ////////////////////////////////

case 'inserir_chat':

    $usuario = $_POST['usuario'];
    $texto = $_POST['texto'];
    $site = $_POST['site'];

    date_default_timezone_set('America/Sao_Paulo');

    $data = date('Y-m-d H:i:s');


//echo $usuario;
//echo $texto;
//echo $site;

    $query2 = "INSERT INTO chat(chat, de, para, data, msg, nivel, lido) VALUES('$usuario','$site','$usuario', '$data', '$texto', 1, 0);";
    $rs2 = mysql_query($query2);

    ?>
<SCRIPT LANGUAGE="JavaScript" TYPE="text/javascript">

//window.history.go(-1);

window.location.href = "chat_layer.php?chat=<?php echo $usuario; ?>"

    </SCRIPT>

    <?php

    break;
    //////////////ADICIONAR CHAT APP ////////////////////////////////


/////////////SALVAR ORDEM TABELA STEP2 ////////////////////////////////

case 'salva_ordem_table':

    $ordem = $_POST['table_ordem'];
   //echo $ordem;
   $_SESSION["ordem_table"] = $ordem;

   $query2 = "UPDATE usuario SET ordem_table='$ordem' where login='$user'";
   $rs2 = mysql_query($query2);

       ?>

<table width="100%" height="100%" style="background-color:#FFF; vertical-align: middle; text-align: center">
	<tr height="80px"  style="font-family:Arial; font-size: 11px;">
	<td><img src="imgs/ok.PNG"/>
		<br>
	<strong>POSIÇÃO DA TABELA ALTERADO COM SUCESSO!</strong>	
		</td>
	</tr>

</table>
<SCRIPT LANGUAGE="JavaScript" TYPE="text/javascript">
	//  window.location.href = "step2_sm_l.php";
//alert("MENSAGEM: EQUIPE CADDESIGN\nLogin alterado com sucesso!");
	
	setTimeout(parent.location.reload(), 100000);
	
    </SCRIPT>

    <?php

    break;


/////////////SALVAR ORDEM TABELA STEP2 ////////////////////////////////

//////////////EXCLUI IMAGENS VISITAS ////////////////////////////////

case 'deleta_img':

    $id = $_GET['id'];
    $logado = $_GET['logado'];
    $nome_img = $_GET['nome_img'];


    $query2 = "DELETE FROM images WHERE id = $id";
    $rs2 = mysql_query($query2);
    $link_linha = "../mo_app/app/imgs_app/mo_" . $logado . "/" . $nome_img;

    unlink($link_linha);

    ?>
    <SCRIPT LANGUAGE="JavaScript" TYPE="text/javascript">
 window.history.go(-1);
       // window.location.href = window.history.go(-2);
      // closeNav();
    </SCRIPT>

    <?php

    break;
///////////// EXCLUI IMAGENS VISITAS ////////////////////////////////

////////////// ALTERAR login APP ////////////////////////////////

case 'altera_login_site':

//$id= $_POST['quais'];
    $numero_oco = $_POST['RadioGroup1'];
    $campo = $_POST['check_list'];
    $conta_lista = count($campo);


    for ($i = 0; $i <= $conta_lista; $i++) {
        $query2 = "UPDATE rotas SET login='$numero_oco', quem='$user' where id='$campo[$i]'";
        $rs2 = mysql_query($query2);

    }


    ?>
<table width="100%" height="100%" style="background-color:#FFF; vertical-align: middle; text-align: center">
	<tr height="80px"  style="font-family:Arial; font-size: 11px;">
	<td><img src="imgs/ok.PNG"/>
		<br>
	<strong>LOGIN ALTERADO COM SUCESSO!</strong>	
		</td>
	</tr>

</table>
<SCRIPT LANGUAGE="JavaScript" TYPE="text/javascript">
	//  window.location.href = "step2_sm_l.php";
//alert("MENSAGEM: EQUIPE CADDESIGN\nLogin alterado com sucesso!");
	
	setTimeout(parent.location.reload(), 100000);
	
    </SCRIPT>

    <?php

    break;

////////////// ALTERAR login APP ////////////////////////////////


////////////// ALTERAR OCORRENCIA APP ////////////////////////////////

case 'altera_status_site':

//$id= $_POST['quais'];
    $numero_oco = $_POST['RadioGroup1'];
    $campo = $_POST['check_list'];
    $conta_lista = count($campo);

//echo $id . "<br>";
//echo $numero_oco . "<br>";


    $query_qual = "select * from ocorrencia where id=$numero_oco";
    $query_qual = mysql_query($query_qual);
    $dados = mysql_fetch_array($query_qual);

    $status_cli = $dados['status'];

//echo $status_cli;


		
		date_default_timezone_set('Etc/GMT+3');
		$dth_ocorrencia = date('Y-m-d H:i:s');
    //echo $conta_lista;

    for ($i = 0; $i <= $conta_lista; $i++) {
        //SE FOR PENDENDTE
        if($numero_oco==0){
            $query2 = "UPDATE rotas SET ocorrencia='', status='', dth_ocorrencia='', x_ocorrencia='', y_ocorrencia='', dth_chegada='', x_chegada='', y_chegada='', dth_saida='', x_saida='', y_saida='', quem='$user', canhoto='0' where id='$campo[$i]'";
            $rs2 = mysql_query($query2);

        } else{

            $query2 = "UPDATE rotas SET ocorrencia='$numero_oco', status='$status_cli', dth_ocorrencia='$dth_ocorrencia', quem='$user' where id='$campo[$i]'";
            $rs2 = mysql_query($query2);
        }
      

    }


    ?>
<table width="100%" height="100%" style="background-color:#FFF; vertical-align: middle; text-align: center">
	<tr height="80px"  style="font-family:Arial; font-size: 11px;">
	<td><img src="imgs/ok.PNG"/>
		<br>
	<strong>STATUS ALTERADO COM SUCESSO!</strong>	
		</td>
	</tr>

</table>
<SCRIPT LANGUAGE="JavaScript" TYPE="text/javascript">
	//  window.location.href = "step2_sm_l.php";
//alert("MENSAGEM: EQUIPE CADDESIGN\nLogin alterado com sucesso!");
	
	setTimeout(parent.location.reload(), 100000);
	
    </SCRIPT>

    <?php

    break;

////////////// ALTERAR OCORRENCIA APP ////////////////////////////////

		
////////////// ALTERAR LISTA APP ////////////////////////////////

case 'altera_lista_site':

//$id= $_POST['quais'];
$numero_oco = $_POST['RadioGroup1'];
$campo = $_POST['check_list'];
$conta_lista = count($campo);

//echo $numero_oco;
// echo $campo[0];

$query = "SELECT * from listas where id='$numero_oco'";
$rs = mysql_query($query);

$dados = mysql_fetch_array($rs);
// Exibição
$nome_lista= $dados['nome'];

//echo $nome_lista;


for ($i = 0; $i <= $conta_lista; $i++) {
    $query2 = "UPDATE rotas SET id_lista='$numero_oco', quem='$user', lista='$nome_lista' where id='$campo[$i]'";
    $rs2 = mysql_query($query2);

}




    ?>
<table width="100%" height="100%" style="background-color:#FFF; vertical-align: middle; text-align: center">
	<tr height="80px"  style="font-family:Arial; font-size: 11px;">
	<td><img src="imgs/ok.PNG"/>
		<br>
	<strong>LISTA ALTERADO COM SUCESSO!</strong>
		</td>
	</tr>

</table>
<SCRIPT LANGUAGE="JavaScript" TYPE="text/javascript">
	//  window.location.href = "step2_sm_l.php";
//alert("MENSAGEM: EQUIPE CADDESIGN\nLogin alterado com sucesso!");
	
	setTimeout(parent.location.reload(), 100000);
	
    </SCRIPT>

    <?php

    break;

////////////// ALTERAR LISTA APP ////////////////////////////////		
		
		
		
		
////////////// ALTERAR ROTA APP ////////////////////////////////

case 'altera_rota_site':

//$id= $_POST['quais'];
    $numero_oco = $_POST['RadioGroup1'];
    $campo = $_POST['check_list'];
    $conta_lista = count($campo);


    for ($i = 0; $i <= $conta_lista; $i++) {
        $query2 = "UPDATE rotas SET rota='$numero_oco', quem='$user' where id='$campo[$i]'";
        $rs2 = mysql_query($query2);

    }


    ?>
<table width="100%" height="100%" style="background-color:#FFF; vertical-align: middle; text-align: center">
	<tr height="80px"  style="font-family:Arial; font-size: 11px;">
	<td><img src="imgs/ok.PNG"/>
		<br>
	<strong>ROTA ALTERADO COM SUCESSO!</strong>
		</td>
	</tr>

</table>
<SCRIPT LANGUAGE="JavaScript" TYPE="text/javascript">
	//  window.location.href = "step2_sm_l.php";
//alert("MENSAGEM: EQUIPE CADDESIGN\nLogin alterado com sucesso!");
	
	setTimeout(parent.location.reload(), 100000);
	
    </SCRIPT>

    <?php

    break;

////////////// ALTERAR ROTA APP ////////////////////////////////		
	
        

		
////////////// EXCLUIR REGISTRO TABELA ////////////////////////////////

case 'excluir_registro':

    //$id= $_POST['quais'];
        $numero_oco = $_POST['RadioGroup1'];
        $campo = $_POST['check_list1'];
        $conta_lista = count($campo);
    
   // echo $campo;
        for ($i = 0; $i <= $conta_lista; $i++) {
            //echo $campo;
            $query2 = "DELETE FROM rotas where id='$campo[$i]'";
            $rs2 = mysql_query($query2);
    
        }
    
    
        ?>
    <table width="100%" height="100%" style="background-color:#FFF; vertical-align: middle; text-align: center">
        <tr height="80px"  style="font-family:Arial; font-size: 11px;">
        <td><img src="imgs/ok.PNG"/>
            <br>
        <strong>REGISTROS EXCLUIDOS COM SUCESSO!</strong>
            </td>
        </tr>
    
    </table>
    <SCRIPT LANGUAGE="JavaScript" TYPE="text/javascript">
        //  window.location.href = "step2_sm_l.php";
    //alert("MENSAGEM: EQUIPE CADDESIGN\nLogin alterado com sucesso!");
        
        setTimeout(parent.location.reload(), 100000);
        
        </SCRIPT>
    
        <?php
    
        break;
    
    ////////////// EXCLUIR REGISTRO TABELA ////////////////////////////////			
		
		
		
        
    


////////////// ALTERAR CANHOTO APP ////////////////////////////////

case 'altera_canhoto_site':

    //$id= $_POST['quais'];
        $numero_oco = $_POST['RadioGroup1'];
        $campo = $_POST['check_list'];
        $conta_lista = count($campo);
        date_default_timezone_set('America/Sao_Paulo');
    $data_dia = date('Y-m-d H:i:s');
    
        for ($i = 0; $i <= $conta_lista; $i++) {
            $query2 = "UPDATE rotas SET canhoto='$numero_oco', quem='$user', data_canhoto='$data_dia' where id='$campo[$i]'";
            $rs2 = mysql_query($query2);
    
        }
    
    
        ?>
    <table width="100%" height="100%" style="background-color:#FFF; vertical-align: middle; text-align: center">
        <tr height="80px"  style="font-family:Arial; font-size: 11px;">
        <td><img src="imgs/ok.PNG"/>
            <br>
        <strong>CANHOTO ALTERADO COM SUCESSO!</strong>
            </td>
        </tr>
    
    </table>
    <SCRIPT LANGUAGE="JavaScript" TYPE="text/javascript">
        //  window.location.href = "step2_sm_l.php";
    //alert("MENSAGEM: EQUIPE CADDESIGN\nLogin alterado com sucesso!");
        
        setTimeout(parent.location.reload(), 100000);
        
        </SCRIPT>
    
        <?php
    
        break;
    
    ////////////// ALTERAR CANHOTO APP ////////////////////////////////			
		
		
		
		
		
case 'update_ocorrencia':

    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $status = $_POST['status'];
    $ativo = $_POST['ativo'];

    /* echo $id . "<br>";
    echo $nome . "<br>";
    echo $status . "<br>";
    echo $ativo . "<br>";
    */

    //$query2 = "INSERT INTO ocorrencia(ocorrencia,status,ativo) VALUES('$nome','$status','$ativo');";

    $query2 = "UPDATE ocorrencia SET ocorrencia='$nome', status='$status', ativo='$ativo' where id='$id'";
    $rs2 = mysql_query($query2);


    $query21 = "UPDATE rotas SET status='$status' where ocorrencia='$id'";
    $rs21 = mysql_query($query21);
    ?>
<SCRIPT LANGUAGE="JavaScript" TYPE="text/javascript">

        window.location.href = "controle_ocorrencia.php";

    </SCRIPT>

    <?php

    break;
////////////// ALTERAR OCORRENCIA APP////////////////////////////////


//////////////ADICIONAR OCORRENCIA APP ////////////////////////////////

case 'add_ocorrencia':

    $nome = $_POST['lg2'];
    $status = $_POST['status'];
    $ativo = $_POST['ativo'];

//echo $nome;
//echo $status;
//echo $ativo;

    $query2 = "INSERT INTO ocorrencia(ocorrencia,status,ativo) VALUES('$nome','$status','$ativo');";
    $rs2 = mysql_query($query2);

    ?>
<SCRIPT LANGUAGE="JavaScript" TYPE="text/javascript">

        window.location.href = "controle_ocorrencia.php";

    </SCRIPT>

    <?php

    break;
//////////////ADICIONAR OCORRENCIA APP////////////////////////////////


//////////////ATIVAR OCORRENCIA APP ////////////////////////////////

case 'ativa_ocorrencia':

    $id = $_GET['id'];

    $query2 = "UPDATE ocorrencia SET ativo=1 WHERE id='$id'";
    $rs2 = mysql_query($query2);

    ?>
<SCRIPT LANGUAGE="JavaScript" TYPE="text/javascript">

        window.location.href = "controle_ocorrencia.php";

    </SCRIPT>

    <?php

    break;
//////////////ATIVAR OCORRENCIA APP////////////////////////////////

//////////////DESATIVA OCORRENCIA APP ////////////////////////////////

case 'inativa_ocorrencia':

    $id = $_GET['id'];

    $query2 = "UPDATE ocorrencia SET ativo=0 WHERE id='$id'";
    $rs2 = mysql_query($query2);

    ?>
<SCRIPT LANGUAGE="JavaScript" TYPE="text/javascript">

        window.location.href = "controle_ocorrencia.php";

    </SCRIPT>

    <?php

    break;
//////////////DESATIVA OCORRENCIA APP////////////////////////////////



//////////////ATIVAR NIVEL  ////////////////////////////////

case 'ativa_nivel':

    $id = $_GET['id'];

    $query2 = "UPDATE usuario SET nivel=2 WHERE id='$id'";
    $rs2 = mysql_query($query2);

    ?>
<SCRIPT LANGUAGE="JavaScript" TYPE="text/javascript">

        window.location.href = "controle_usuario.php";

    </SCRIPT>

    <?php

    break;
//////////////ATIVAR NIVEL ////////////////////////////////

//////////////INATIVAR NIVEL ////////////////////////////////

case 'inativa_nivel':

    $id = $_GET['id'];

    $query2 = "UPDATE usuario SET nivel=0 WHERE id='$id'";
    $rs2 = mysql_query($query2);

    ?>
<SCRIPT LANGUAGE="JavaScript" TYPE="text/javascript">

        window.location.href = "controle_usuario.php";

    </SCRIPT>

    <?php

    break;
//////////////INATIVAR NIVEL ////////////////////////////////



//////////////ATIVAR SITE LISTA ////////////////////////////////

case 'ativa_site':

    $id = $_GET['id'];

    $query2 = "UPDATE rotas SET site=1 WHERE lista='$id'";
    $rs2 = mysql_query($query2);

    ?>
<SCRIPT LANGUAGE="JavaScript" TYPE="text/javascript">

        window.location.href = "home.php";

    </SCRIPT>

    <?php

    break;
//////////////ATIVAR SITE LISTA ////////////////////////////////

//////////////INATIVAR SITE LISTA ////////////////////////////////

case 'inativa_site':

    $id = $_GET['id'];

    $query2 = "UPDATE rotas SET site=0 WHERE lista='$id'";
    $rs2 = mysql_query($query2);

    ?>
<SCRIPT LANGUAGE="JavaScript" TYPE="text/javascript">

        window.location.href = "home.php";

    </SCRIPT>

    <?php

    break;
//////////////INATIVAR SITE LISTA ////////////////////////////////
















//////////////ATIVAR LISTA APP ////////////////////////////////

case 'ativa_lista':

    $id = $_GET['id'];

    $query2 = "UPDATE rotas SET statusrota=1 WHERE lista='$id'";
    $rs2 = mysql_query($query2);

    ?>
<SCRIPT LANGUAGE="JavaScript" TYPE="text/javascript">

        window.location.href = "home.php";

    </SCRIPT>

    <?php

    break;
//////////////ATIVAR LISTA APP ////////////////////////////////

//////////////INATIVAR LISTA APP ////////////////////////////////

case 'inativa_lista':

    $id = $_GET['id'];

    $query2 = "UPDATE rotas SET statusrota=0 WHERE lista='$id'";
    $rs2 = mysql_query($query2);

    ?>
<SCRIPT LANGUAGE="JavaScript" TYPE="text/javascript">

        window.location.href = "home.php";

    </SCRIPT>

    <?php

    break;
//////////////INATIVAR LISTA APP ////////////////////////////////


//////////////EDITAR NOME LISTA ////////////////////////////////

case 'edita_lista_nome':

    $id = $_POST['id'];
    $id_old = $_POST['id_old'];

    $query1 = "UPDATE listas SET nome='$id' WHERE nome='$id_old'";
    $rs1 = mysql_query($query1);


    $query2 = "UPDATE rotas SET lista='$id' WHERE lista='$id_old'";
    $rs2 = mysql_query($query2);

//echo $id . "<br>";

//echo $id_old;
    ?>
<SCRIPT LANGUAGE="JavaScript" TYPE="text/javascript">

setTimeout(parent.location.reload(), 100000);

    </SCRIPT>

    <?php

    break;
//////////////EDITAR NOME LISTA ////////////////////////////////




//////////////EXCLUI MSG CHAT ////////////////////////////////

case 'exclui_msg_app':

    $id = $_GET['id'];
//echo $id;

    $query2 = "DELETE FROM chat WHERE chat = '$id'";
    $rs2 = mysql_query($query2);


    ?>
<SCRIPT LANGUAGE="JavaScript" TYPE="text/javascript">

       window.location.href = "step7.php";

    </SCRIPT>

    <?php

    break;

//////////////EXCLUI MSG CHAT ////////////////////////////////



//////////////EXCLUI LISTA ////////////////////////////////

case 'exclui_lista':

    $id = $_GET['id'];

    $query1 = "DELETE FROM listas WHERE id = '$id'";
    $rs1 = mysql_query($query1);


    $query2 = "DELETE FROM rotas WHERE id_lista = '$id'";
    $rs2 = mysql_query($query2);


    ?>
<SCRIPT LANGUAGE="JavaScript" TYPE="text/javascript">

        window.location.href = "home.php";

    </SCRIPT>

    <?php

    break;
//////////////EXCLUI LISTA ////////////////////////////////


/////////////IMPORTAR ROTAS ONLINE ////////////////////////////////

case 'importar_rotaonline':

    $bd = "mo_" . $logado;
    $pega_slt = $_GET["usuario"];

    $conx = mysql_connect("127.0.0.1", "root", "HtMQZhAwCNzeaAfT") or die ("Sem conexão com o servidor");
    $selectx = mysql_select_db($bd) or die("Sem acesso ao DB, Entre em contato com o Administrador!");

//$deleterecords = "TRUNCATE TABLE rotas"; //Esvaziar a tabela
//mysql_query($deleterecords);

/// valor 0 nos registros antigos
/////SLT NAO ESVAZIA AS ROTAS ANTERIORES////////
    if ($logado == 'slt' or $logado == 'SLT') {

    } else {

        $query21 = "UPDATE rotas SET statusrota=0";
        $rs21 = mysql_query($query21);

    }
date_default_timezone_set('Etc/GMT+3');

    $today = date("d-m-y");
    $today1 = time("d-m-y H:i:s");
	$today_troca_dia = date("H:i:s");

    $today_usa = date("Y-m-d");

//$result = mysql_query("SELECT * FROM rotas where lista LIKE '%$today%'");
//$num_rows = mysql_num_rows($result);
//$conta_verifica = 1;
    /* if($num_rows!=0){
        $conta_verifica++;
        //$input = array("a", "b", "c", "d", "e", "f", "g", "h", "i", "j", "l", "m", "n", "o", "p", "q", "r", "s", "t", "u", "v", "x", "z");
        //$rand_keys = array_rand($input, 2);

        $somadata_rota = substr($somadata_rota,0,-2). str_pad($i_rota[$y], 2, '0', STR_PAD_LEFT);
        $lista = $today . " (LISTA " . $input[$rand_keys[0]] . ")";

        } else {
        $lista = $today;
        }

    echo $lista;
    echo $num_rows;
    */

$dia_seguinte =  date("d-m-y",strtotime("+1 day"));
    //////////////////////////////// SLT ///////////////////////////////////////////////////////////
    if ($pega_slt == 'slt_gsp1' or $pega_slt == 'slt_gsp2' or $pega_slt == 'slt_i1' or $pega_slt == 'slt_i2') {
        $new = "ro_" . $pega_slt;


        if ($pega_slt == 'slt_gsp1') {
            $quem = " - CAPITAL - ";

        }
        if ($pega_slt == 'slt_gsp2') {
            $quem = " - VAREJO - ";

        }
        if ($pega_slt == 'slt_i1') {
            $quem = " - INTERIOR 1 - ";

        }
        if ($pega_slt == 'slt_i2') {
            $quem = " - INTERIOR 2 - ";

        }
		if($today_troca_dia<="18:59:59"){
			 $lista = $today . $quem . " (" . $today1 . ")";	
			
		} else {
			$lista = $dia_seguinte . $quem . " (" . $today1 . ")";	
			
		}

       

        //////////////////////////////// SLT ///////////////////////////////////////////////////////////

    } else {
        $new = "ro_" . $logado;
        $lista = $dia_seguinte . " (" . $today1 . ")";
    }


    $con1 = mysql_connect("127.0.0.1", "root", "HtMQZhAwCNzeaAfT") or die ("Sem conexão com o servidor");
    $select1 = mysql_select_db($new) or die("Sem acesso ao DB, Entre em contato com o Administrador!");

    $query20 = "SELECT rotas.*, veiculos.nome FROM rotas INNER JOIN veiculos ON rotas.veiculo = veiculos.id;";
    $rs20 = mysql_query($query20);

    while ($row20 = mysql_fetch_array($rs20)) {

        $login = $row20['nome'];
        $rota = $row20['nome_rota'];
        $ordem = $row20['ordem'];
        $x = $row20['lgn'];
        $y = $row20['lat'];
        $codigo_cliente = $row20['codigo_cliente'];
        $nome_cliente = $row20['nome_cliente'];
        $nome_cliente = str_replace("-", "•", $nome_cliente);
        $endereco = $row20['endereco'];
        $endereco = str_replace("-", "•", $endereco);
        $cidade = $row20['cidade'];
        $codigo_pedido = $row20['codigo_pedido'];
        $tempo_servico = $row20['tempo_servico'];
        $obs_pedido = $row20['obs_pedido'];
        $raio = 300;
        $status = 0;

        $con2 = mysql_connect("127.0.0.1", "root", "HtMQZhAwCNzeaAfT") or die ("Sem conexão com o servidor");
        $select2 = mysql_select_db($bd) or die("Sem acesso ao DB, Entre em contato com o Administrador!");

        //////////////////////////////// SLT ///////////////////////////////////////////////////////////

            $nome_cliente = $codigo_pedido . " - " . $nome_cliente;
            $query2 = "INSERT INTO rotas(login, rota, sequencia, x, y, idcliente, nome, endereco, cidade, classificacao, tempo, raio, status, statusrota, lista, codigo_pedido, site, data_teste) VALUES('$login', '$rota', '$ordem', '$x', '$y', '$codigo_cliente', '$nome_cliente', '$endereco', '$cidade', '$codigo_pedido', '$tempo_servico', '$raio', '$status', 1, '$lista', '$codigo_pedido', 1, '$today_usa')";
            $rs2 = mysql_query($query2);



    }

    $querylista = "INSERT INTO listas(nome) VALUE('$lista')";
	$rs_lista = mysql_query($querylista);

	$seleciona = mysql_query("SELECT id FROM listas where nome='$lista'");	

	$dados = mysql_fetch_array($seleciona);
	$id_grava= $dados['id'];


	$grava_lista_nova = mysql_query("UPDATE rotas SET id_lista='$id_grava' where lista='$lista'");


    ?>
<SCRIPT LANGUAGE="JavaScript" TYPE="text/javascript">
        alert("LISTA IMPORTADA COM SUCESSO!");
        window.location.href = "home.php";

    </SCRIPT>

    <?php

    break;

//////////////IMPORTAR ROTAS ONLINE ////////////////////////////////

//////////////EXCLUI USUARIOS ////////////////////////////////

case 'exclui_usr':

    $id = $_GET["id"];
    $query_deleta = "DELETE FROM usuario WHERE id = '$id'";
    $rs_deleta = mysql_query($query_deleta);
    ?>
    <SCRIPT language="JavaScript">
    window.history.go(-1);
    </SCRIPT>
                                    
    <?php
                                    
    break;
    //////////////EXCLUI USUARIOS ////////////////////////////////
    
//////////////ADICIONAR  USUARIO ////////////////////////////////

case 'add_usr':

    $lg = $_POST['lg1'];
    $pss = $_POST['pss1'];
    $coord = $_POST['coor'];
    $logado = $_POST['logado'];

//echo $logado;


    $query2 = "SELECT * from usuario where login='$logado'";
    $query2 = mysql_query($query2);


    $dados = mysql_fetch_array($query2);

    $lat = $dados['lat'];
    $lgn = $dados['lgn'];

//echo $lat;


    $query = "SELECT * from usuario where login='$lg'";
    $rs = mysql_query($query);

    $total = mysql_num_rows($rs);

    if ($total > 0) {
        ?>
<SCRIPT LANGUAGE="JavaScript" TYPE="text/javascript">
            alert("Usuário já registro com esse nome no sistema! Por favor, tente outro nome de usuário!");
        </SCRIPT>

        <?php
    } else {
        $query2 = "INSERT INTO usuario (login, senha, coordenador, nivel, lat, lgn, time_trail) VALUES ('$lg', '$pss', '$coord',  2, '$lat', '$lgn', 180)";
        $rs2 = mysql_query($query2);

        date_default_timezone_set('America/Sao_Paulo');
        $today = date("Y-m-d H:i:s");
        
       // echo $today;

        $query_chat = "INSERT INTO chat (chat, de, para, data, msg, nivel, lido) values ('$lg', '$logado', '$lg', '$today', 'BEM VINDO AO CHAT CADD!', 1, 0)";
        $rs_chat = mysql_query($query_chat);

    }


    ?>
<SCRIPT LANGUAGE="JavaScript" TYPE="text/javascript">
        window.location.href = "controle_usuario.php";
    </SCRIPT>

    <?php

    break;
//////////////ADICIONAR  USUARIO ////////////////////////////////


//////////////MUDAR SENHA DO USUARIO ////////////////////////////////

case 'update_senha':

    $lg = $_POST['lg'];
    $pss = $_POST['pss'];


//echo $lg;
    //$iparr = split("\@", $lg);
//echo $iparr[1];
//echo $pss;

    $query2 = "UPDATE usuario SET senha='$pss' WHERE login='$lg'";
    $rs2 = mysql_query($query2);

    ?>
<SCRIPT LANGUAGE="JavaScript" TYPE="text/javascript">

        window.location.href = "controle_usuario.php";

    </SCRIPT>

    <?php

    break;
//////////////MUDAR SENHA DO USUARIO////////////////////////////////


//////////////CADASTRA PONTO INICIAL FINAL ////////////////////////////////

case 'adiciona_ponto':

    $nome = $_POST['nome'];
    $lat = $_POST['new_lat_2'];
    $lgn = $_POST['new_lgn_2'];
    $end = $_POST['new_end_2'];


    $query = mysql_query("INSERT INTO pontos(nome, endereco, latitude, longitude) VALUES('$nome', '$end','$lat', '$lgn')");

    $rs = mysql_query($query);

    ?>
<SCRIPT LANGUAGE="JavaScript" TYPE="text/javascript">

        window.location.href = "cad_if.php";

    </SCRIPT>

    <?php

    break;
//////////////CADASTRA PONTO INICAL FINAL ////////////////////////////////

//////////////EXCLUI PONTO INICAL FINAL////////////////////////////////

case 'exclui_ponto':

    $id = $_GET["id"];
//echo $id_veiculo;
    $query_deleta = "DELETE FROM pontos WHERE id = '$id'";
    $rs_deleta = mysql_query($query_deleta);

    ?>
<SCRIPT language="JavaScript">

        window.location.href = "cad_if.php";

    </SCRIPT>

    <?php

    break;

//////////////EXCLUI PONTO INICAL FINAL////////////////////////////////


case 'esvazia_visita_veiculo':


//echo $id_yes;

$query = "select * from veiculos WHERE id='$id_yes'";
$rs = mysql_query($query);
while ($row = mysql_fetch_array($rs)) {
    $query2 = "UPDATE veiculos SET equipe=NULL, peso_total=NULL, volume_total=NULL, valor_total=NULL, ocupado='0' WHERE id='$id_yes'";
    $rs2 = mysql_query($query2);
}


?>

<body bgcolor="#000000">
<img src="imgs/ok.PNG" width="191" height="189" alt=""/><img src="imgs/ok.PNG" width="191" height="189" alt=""/>
exclui_cliente


<div style="height:100px; background-color:#000000; width:400px; position: relative; left: 50%; top: 50%; margin-left:-200px; margin-top:-50px">
    <div id="progress"
         style="position: absolute; left: 28px; top: 28px; width: 342px; height: 40px; background-color: #6f99d6; layer-background-color: #6f99d6; border: 1px none #000000; font-family:Arial, 'Helvetica Neue', Helvetica, sans-serif; font-size:12px">


        <?php

        $query3 = "select * from clientes WHERE veiculo='$id_yes'";
        $rs3 = mysql_query($query3);
        $total = mysql_num_rows($rs3);

        $conta = 0;
        while ($row3 = mysql_fetch_array($rs3)) {
            $conta++;

            $query4 = "UPDATE clientes SET veiculo=NULL WHERE veiculo='$id_yes'";
            $rs4 = mysql_query($query4);

//// LOADING 0 A 100% ////////////////////////////////////////////////////
            $pega_loading = intval(($conta / $total) * 100) . "%";

            echo "<div style='position:absolute;margin:0px 0px 0px 0px;width:$pega_loading;height:40px;background:#2867b2;color:#2867b2;color: #FFFFFF;text-align:center;line-height:40px;'>$pega_loading</div>";
            flush();
            ob_flush();

//// LOADING 0 A 100% ////////////////////////////////////////////////////

        }


        ?>
        <SCRIPT LANGUAGE="JavaScript" TYPE="text/javascript">

            window.location.href = "step3.php";

        </SCRIPT>

        <?php

        break;
        ///////////////////

        case 'esvazia_veiculos_step':


        $query_where = "UPDATE passo SET ok='yes' WHERE id='3'";
        $rs_where = mysql_query($query_where);

        $query_where1 = "UPDATE passo SET ok='no' WHERE (id='4' OR id='5')";
        $rs_where1 = mysql_query($query_where1);


        $query = mysql_query("select * from veiculos");

        while ($row = mysql_fetch_array($query)) {
            $query2 = "UPDATE veiculos SET equipe=NULL, peso_total=NULL, volume_total=NULL, valor_total=NULL, ocupado='0'";
            $rs2 = mysql_query($query2);
        }

        ?>

        <body bgcolor="#000000">


        <div style="height:100px; background-color:#000000; width:400px; position: relative; left: 50%; top: 50%; margin-left:-200px; margin-top:-50px">
            <div id="progress"
                 style="position: absolute; left: 28px; top: 28px; width: 342px; height: 40px; background-color: #6f99d6; layer-background-color: #6f99d6; border: 1px none #000000; font-family:Arial, 'Helvetica Neue', Helvetica, sans-serif; font-size:12px">


                <?php


                $query3 = mysql_query("select * from clientes");

                $conta = 0;
                $total = mysql_num_rows($query3);
                while ($row3 = mysql_fetch_array($query3)) {

                    $conta++;

                    $query4 = "UPDATE clientes SET veiculo=NULL";
                    $rs4 = mysql_query($query4);

//// LOADING 0 A 100% ////////////////////////////////////////////////////
                    $pega_loading = intval(($conta / $total) * 100) . "%";

                    echo "<div style='position:absolute;margin:0px 0px 0px 0px;width:$pega_loading;height:40px;background:#2867b2;color:#2867b2;color: #FFFFFF;text-align:center;line-height:40px;'>$pega_loading</div>";
                    flush();
                    ob_flush();

//// LOADING 0 A 100% ////////////////////////////////////////////////////


                }

                ?>
            </div>
        </div>
        <SCRIPT LANGUAGE="JavaScript" TYPE="text/javascript">

            window.location.href = "step3.php";
            //window.history.go(-1);
        </SCRIPT>

        <?php

        break;

        case 'esvazia_veiculos':


        $query3 = "select * from clientes";
        $rs3 = mysql_query($query3);

        $conta_vazios = 0;
        $conta_x = 0;
        ?>

        <body bgcolor="#000000">


        <div style="height:100px; background-color:#000000; width:400px; position: relative; left: 50%; top: 50%; margin-left:-200px; margin-top:-50px">
            <div id="progress"
                 style="position: absolute; left: 28px; top: 28px; width: 342px; height: 40px; background-color: #6f99d6; layer-background-color: #6f99d6; border: 1px none #000000; font-family:Arial, 'Helvetica Neue', Helvetica, sans-serif; font-size:12px">


                <?php


                /// MANIPULA A LONGITUDE DOS CLIENTES IGUAIS///
                $query_agrupar = "select * from clientes group by codigo_cliente";
                $query_agrupar = mysql_query($query_agrupar);

                while ($row_agrupar = mysql_fetch_array($query_agrupar)) {

                    $conta_conta = 0;

                    $pega_codigo = $row_agrupar['codigo_cliente'];
                    $pega_lgn = $row_agrupar['longitude_cad'];

                    $query_agrupar1 = "select * from clientes where codigo_cliente='$pega_codigo'";
                    $query_agrupar1 = mysql_query($query_agrupar1);

                    while ($row_agrupar1 = mysql_fetch_array($query_agrupar1)) {

                        $lgn_muda = number_format($row_agrupar1['longitude_cad'], 3, '.', '');
                        $conta_conta++;
                        if ($conta_conta >= 1 AND $conta_conta <= 9) {
                            $conta_conta_novo = str_pad($conta_conta, 2, '0', STR_PAD_LEFT);
                            $pega_lgn_altera = $lgn_muda . $conta_conta_novo;
                        } else {
                            $pega_lgn_altera = $lgn_muda . $conta_conta;
                        }
                        $pega_codigo_geral = $row_agrupar1['codigo'];
                        //echo $row_agrupar1['codigo_cliente']. '<br>' . $conta_conta. '<br>';
                        $query_adiciona_lgn = "UPDATE clientes SET longitude_cad='$pega_lgn_altera' WHERE codigo='$pega_codigo_geral'";
                        $rs_adiciona_lgn = mysql_query($query_adiciona_lgn);

                    }


                }
                /// MANIPULA A LONGITUDE DOS CLIENTES IGUAIS///


                $total = mysql_num_rows($rs3);
                while ($row3 = mysql_fetch_array($rs3)) {


                    $conta_x++;

                    $codigo_cliente = $row3["codigo_cliente"];
                    $nome = $row3["nome"];
                    $endereco = $row3["endereco"];
                    $cidade = $row3["cidade"];
                    $estado = $row3["estado"];
                    $cep = $row3["cep"];
                    $endereco_cad = $row3["endereco_cad"];
                    $latitude_cad = $row3["latitude_cad"];
                    $longitude_cad = $row3["longitude_cad"];
                    $confianca_cad = $row3["confianca_cad"];
                    $setor_cad = $row3["setor"];
                    $peso = $row3["peso"];
                    $volume = $row3["volume"];
                    $valor = $row3["valor"];
                    // echo $ativo_cad;

                    // VERIFICA SE LAT OU LONG ESTAO VAZIAS /////
                    if ($latitude_cad == "" OR $longitude_cad == "" OR $latitude_cad == NULL OR $longitude_cad == NULL) {
                        $conta_vazios++;
                    }

/////////////////////////////////////////////////////////////////


                    $search = mysql_query("SELECT * FROM db_geral WHERE codigo_cliente = '$codigo_cliente'");


                    if (@mysql_num_rows($search) > 0) {

                        $sql = mysql_query("UPDATE db_geral SET codigo_cliente='$codigo_cliente', nome='$nome', endereco='$endereco', cidade='$cidade', estado='$estado', endereco_cad='$endereco_cad', latitude_cad='$latitude_cad', longitude_cad='$longitude_cad', confianca_cad='101' WHERE codigo_cliente = '$codigo_cliente'");

                    } else {

// faz inserção
                        $sql = mysql_query("INSERT INTO db_geral(codigo_cliente, nome, endereco, cidade, estado, cep, endereco_cad, latitude_cad, longitude_cad, confianca_cad) VALUES('$codigo_cliente', '$nome', '$endereco', '$cidade', '$estado', '$cep', '$endereco_cad', '$latitude_cad', '$longitude_cad', '101')");
                    }


//// LOADING 0 A 100% ////////////////////////////////////////////////////
                    $pega_loading = intval(($conta_x / $total) * 100) . "%";

                    echo "<div style='position:absolute;margin:0px 0px 0px 0px;width:$pega_loading;height:40px;background:#2867b2;color:#2867b2;color: #FFFFFF;text-align:center;line-height:40px;'>$pega_loading</div>";
                    flush();
                    ob_flush();

//// LOADING 0 A 100% ////////////////////////////////////////////////////


                }


                ///////////////////////////////////////
                if ($conta_vazios > 0) {
                    ?>
                    <SCRIPT LANGUAGE="JavaScript" TYPE="text/javascript">
                        alert("Existem Geocodificações sem Latitude ou Longitude. Por favor, Geocodificar Manualmente esses pontos.");
                        window.history.go(-1);

                    </SCRIPT>
                <?php
                } else {

                ?>
                    <SCRIPT LANGUAGE="JavaScript" TYPE="text/javascript">

                        window.location.href = "step3.php";

                    </SCRIPT>

                    <?php
                }


                break;
                ///////////////////


                //////////SETOR AUTOMATICO /////////////////////////////////////////////
                case 'setor_auto':


                ?>

                <body bgcolor="#000000">


                <div style="height:100px; background-color:#000000; width:400px; position: relative; left: 50%; top: 50%; margin-left:-200px; margin-top:-50px">
                    <div id="progress"
                         style="position: absolute; left: 28px; top: 28px; width: 342px; height: 40px; background-color: #6f99d6; layer-background-color: #6f99d6; border: 1px none #000000; font-family:Arial, 'Helvetica Neue', Helvetica, sans-serif; font-size:12px">


                        <?php

                        $query = mysql_query("select * from veiculos");

                        while ($row = mysql_fetch_array($query)) {
                            $query2 = "UPDATE veiculos SET equipe=NULL, peso_total=NULL, volume_total=NULL, valor_total=NULL, ocupado='0'";
                            $rs2 = mysql_query($query2);
                        }

                        $query3 = mysql_query("select * from clientes");

                        $conta = 0;
                        $total = mysql_num_rows($query3);
                        while ($row3 = mysql_fetch_array($query3)) {

                            $conta++;

                            $query4 = "UPDATE clientes SET veiculo=NULL";
                            $rs4 = mysql_query($query4);

                        }


                        $query3 = "select * from clientes";
                        $rs3 = mysql_query($query3);
                        $total = mysql_num_rows($rs3);
                        $conta_ae = 0;
                        $conta_vazios = 0;

                        ///ABRE ////
                        while ($row3 = mysql_fetch_array($rs3)) {

                            $conta_ae++;

                            $codigo_cliente = $row3["codigo_cliente"];
                            $nome = $row3["nome"];
                            $endereco = $row3["endereco"];
                            $cidade = $row3["cidade"];
                            $estado = $row3["estado"];
                            $cep = $row3["cep"];
                            $endereco_cad = $row3["endereco_cad"];
                            $latitude_cad = $row3["latitude_cad"];
                            $longitude_cad = $row3["longitude_cad"];
                            $confianca_cad = $row3["confianca_cad"];
                            $setor_cad = $row3["setor"];

                            $peso = $row3["peso"];
                            $volume = $row3["volume"];
                            $valor = $row3["valor"];
                            // echo $ativo_cad;


                            if ($latitude_cad == "" or $longitude_cad == "") {
                                $conta_vazios++;
                            }

                            if ($setor_cad == "") {

                                //echo "vazio";

                            } else {

                                $search_veiculo1 = "SELECT * FROM veiculos WHERE setor = '$setor_cad'";
                                $dados1 = mysql_query($search_veiculo1);
                                $quantos1 = mysql_num_rows($dados1);
//echo $quantos1;

                                if ($quantos1 > 1) {

                                    $search_veiculo = "SELECT * FROM veiculos WHERE setor = '$setor_cad' AND ativo='yes' order by peso ASC LIMIT 1";
                                    $dados = mysql_query($search_veiculo);

////
                                    while ($row_dados = mysql_fetch_array($dados)) {

                                        $setor_do = $row_dados['setor'];
                                        $id_do_veiculo = $row_dados['id'];
                                        $ativo_cad = $row_dados["ativo"];
                                        $conta_peso_veiculo = $row_dados["peso_total"];
                                        $conta_volume_veiculo = $row_dados["volume_total"];
                                        $conta_valor_veiculo = $row_dados["valor_total"];

                                        if ($ativo_cad == "yes") {

                                            $conta_peso_veiculo = $conta_peso_veiculo + $peso;
                                            $conta_volume_veiculo = $conta_volume_veiculo + $volume;
                                            $conta_valor_veiculo = $conta_valor_veiculo + $valor;

                                            $update_cliente = mysql_query("UPDATE clientes SET veiculo='$id_do_veiculo' WHERE setor='$setor_do'");

                                            $update_veiculo = mysql_query("UPDATE veiculos SET peso_total='$conta_peso_veiculo', volume_total='$conta_volume_veiculo', valor_total='$conta_valor_veiculo', equipe='yes', ocupado='1', setor='$setor_do' WHERE id='$id_do_veiculo'");

                                        }


                                    }


                                } else {

                                    $search_veiculo = "SELECT * FROM veiculos WHERE setor = '$setor_cad'";
                                    $dados = mysql_query($search_veiculo);
                                    //$quantos = mysql_num_rows($dados);

                                    $conta_peso_veiculo = 0;
                                    $conta_volume_veiculo = 0;
                                    $conta_valor_veiculo = 0;

////
                                    while ($row_dados = mysql_fetch_array($dados)) {

                                        $setor_do = $row_dados['setor'];
                                        $id_do_veiculo = $row_dados['id'];
                                        $ativo_cad = $row_dados["ativo"];
                                        $conta_peso_veiculo = $row_dados["peso_total"];
                                        $conta_volume_veiculo = $row_dados["volume_total"];
                                        $conta_valor_veiculo = $row_dados["valor_total"];
                                        ////
                                        if ($ativo_cad == "yes") {

                                            $conta_peso_veiculo = $conta_peso_veiculo + $peso;
                                            $conta_volume_veiculo = $conta_volume_veiculo + $volume;
                                            $conta_valor_veiculo = $conta_valor_veiculo + $valor;

                                            //echo $conta_peso_veiculo . "<br>";
                                            $update_cliente = mysql_query("UPDATE clientes SET veiculo='$id_do_veiculo' WHERE setor='$setor_do'");

                                            $update_veiculo = mysql_query("UPDATE veiculos SET peso_total='$conta_peso_veiculo', volume_total='$conta_volume_veiculo', valor_total='$conta_valor_veiculo', equipe='yes', ocupado='1', setor='$setor_do' WHERE id='$id_do_veiculo'");


                                        }
                                        /////
                                    }
/////
                                }
//////

                            }


//// LOADING 0 A 100% ////////////////////////////////////////////////////
                            $pega_loading = intval(($conta_ae / $total) * 100) . "%";

                            echo "<div style='position:absolute;margin:0px 0px 0px 0px;width:$pega_loading;height:40px;background:#2867b2;color:#2867b2;color: #FFFFFF;text-align:center;line-height:40px;'>$pega_loading</div>";
                            flush();
                            ob_flush();

//// LOADING 0 A 100% ////////////////////////////////////////////////////


                        }
                        ?>
                        <SCRIPT LANGUAGE="JavaScript" TYPE="text/javascript">

                            window.location.href = "step3.php";

                        </SCRIPT>

                        <?php
                        break;
                        //////////SETOR AUTOMATICO /////////////////////////////////////////////


                        //////////CARGA AUTOMATICO /////////////////////////////////////////////
                        case 'carga_auto_veiculos':


//$server = mysql_connect($host, $usr, $pwd) or die ();
//$log = mysql_select_db($ddbb,$server) or die ();

//echo "<div id='progress' style='position:relative;padding:0px;width:450px;height:60px;left:25px;'>";
//for ($i = 1; $i <= 100; $i++) {
                            /*    sleep(1); //no bbdd... ;)
                                //$ins = "INSERT ...";
                                //$doins = mysql_query($ins) or die(mysql_error());
                                echo "<div style='float:left;margin:5px 0px 0px 1px;width:2px;height:12px;background:red;color:red;'> </div>";
                                flush();
                                ob_flush();*/
//}
//echo "</div>";


/// MANIPULA A LONGITUDE DOS CLIENTES IGUAIS///
                            $query_agrupar = "select * from clientes group by codigo_cliente";
                            $query_agrupar = mysql_query($query_agrupar);


                            while ($row_agrupar = mysql_fetch_array($query_agrupar)) {

                                $conta_conta = 0;

                                $pega_codigo = $row_agrupar['codigo_cliente'];
                                $pega_lgn = $row_agrupar['longitude_cad'];

                                $query_agrupar1 = "select * from clientes where codigo_cliente='$pega_codigo'";
                                $query_agrupar1 = mysql_query($query_agrupar1);

                                while ($row_agrupar1 = mysql_fetch_array($query_agrupar1)) {

                                    $lgn_muda = number_format($row_agrupar1['longitude_cad'], 3, '.', '');
                                    $conta_conta++;
                                    if ($conta_conta >= 1 AND $conta_conta <= 9) {
                                        //$conta_conta_novo = strval($conta_conta);
                                        $conta_conta_novo = str_pad($conta_conta, 2, '0', STR_PAD_LEFT);
                                        $pega_lgn_altera = $lgn_muda . $conta_conta_novo;
                                        //echo $conta_conta_novo . "<br>";
                                    } else {
                                        $pega_lgn_altera = $lgn_muda . $conta_conta;
                                    }
                                    $pega_codigo_geral = $row_agrupar1['codigo'];
                                    //echo $row_agrupar1['codigo_cliente']. '<br>' . $conta_conta. '<br>';
                                    $query_adiciona_lgn = "UPDATE clientes SET longitude_cad='$pega_lgn_altera' WHERE codigo='$pega_codigo_geral'";
                                    $rs_adiciona_lgn = mysql_query($query_adiciona_lgn);

                                }


                            }
/// MANIPULA A LONGITUDE DOS CLIENTES IGUAIS///


//  CONTROLE PASSO  //////////////////////////////////////////////////////////
                            $query_where = "UPDATE passo SET ok='yes' WHERE id='3' OR id='2'";
                            $rs_where = mysql_query($query_where);

                            $query_where1 = "UPDATE passo SET ok='no' WHERE (id='4' OR id='5')";
                            $rs_where1 = mysql_query($query_where1);
//  CONTROLE PASSO  //////////////////////////////////////////////////////////


//// ESVAZIA TUDO///////////////////////////////////////////////////////////
                            $query = "select * from veiculos";
                            $rs = mysql_query($query);

                            while ($row = mysql_fetch_array($rs)) {
                                $query2 = "UPDATE veiculos SET equipe=NULL, peso_total=NULL, volume_total=NULL, valor_total=NULL, ocupado=0, setor=NULL, prioridade=NULL";
                                $rs2 = mysql_query($query2);
                            }

                            $query_apaga = "select * from clientes where setor!='' order by setor";
                            $rs_apaga = mysql_query($query_apaga);

                            $pega_setor = [];
                            $result = [];
                            $contando = 0;

                            while ($row_apaga = mysql_fetch_array($rs_apaga)) {
                                $query4 = "UPDATE clientes SET veiculo=NULL, ocupado=0";
                                $rs4 = mysql_query($query4);
                                $pega_setor[$contando] = $row_apaga["setor"];
                                $result = array_keys(array_count_values($pega_setor));
                                $contando++;
                            }
//// ESVAZIA TUDO///////////////////////////////////////////////////////////

                            $conta_qtos_setores = 0;
                            ?>

                            <body bgcolor="#000000">


                            <div style="height:100px; background-color:#000000; width:400px; position: relative; left: 50%; top: 50%; margin-left:-200px; margin-top:-50px">
                                <div id="progress"
                                     style="position: absolute; left: 28px; top: 28px; width: 342px; height: 40px; background-color: #6f99d6; layer-background-color: #6f99d6; border: 1px none #000000; font-family:Arial, 'Helvetica Neue', Helvetica, sans-serif; font-size:12px">


                                    <?php
                                    ///CADA SETOR WHILE ///////////////////////////////////////////////////////
                                    while ($conta_qtos_setores < count($result)) {

//// LOADING 0 A 100% ////////////////////////////////////////////////////
                                        $pega_loading = intval(($conta_qtos_setores / count($result)) * 100) . "%";

                                        echo "<div style='position:absolute;margin:0px 0px 0px 0px;width:$pega_loading;height:40px;background:#2867b2;color:#2867b2;color: #FFFFFF;text-align:center;line-height:40px;'>$pega_loading</div>";
                                        flush();
                                        ob_flush();

//// LOADING 0 A 100% ////////////////////////////////////////////////////

//soma valores por setor/////////
                                        $peso_por_setor = 0;
                                        $volume_por_setor = 0;
                                        $valor_por_setor = 0;

                                        $conta_por_setor = 0;
                                        $conta_por_setor1 = 0;

                                        $pesocli_por_setor = [];
                                        $idcli_por_setor = [];

                                        $pesocli_por_setor1 = [];
                                        $idcli_por_setor1 = [];

                                        $peso_geral_por_setor = 0;
                                        $peso_geral_por_setor1 = 0;

//$peso_veiculo_atual=0;
//echo "<strong>SETOR:</strong>" . $result[$conta_qtos_setores] . "<br>";

                                        $soma_array_todos = 0;

                                        $query_pega_valores_setor = "select * from clientes where setor='$result[$conta_qtos_setores]'";
                                        $rs_pega_valores_setor = mysql_query($query_pega_valores_setor);

                                        while ($row_setor = mysql_fetch_array($rs_pega_valores_setor)) {
                                            $peso_por_setor += $row_setor["peso"];
                                            $volume_por_setor += $row_setor["volume"];
                                            $valor_por_setor += $row_setor["valor"];
                                            $conta_por_setor++;
                                        }


///APAGA PRIORIDADE VEICULOS JA OCUPADOS
//$query2 = mysql_query("UPDATE veiculos SET prioridade=null where ocupado='1' AND ativo='yes'");
/////////////////////////////////////////

                                        $query_veiculoz = "select * from veiculos where ocupado!='1' AND ativo='yes'";
                                        $rs_veiculoz = mysql_query($query_veiculoz);

//$total = mysql_num_rows($rs_veiculoz);
///ABRE ////

//////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////
//// PRIORIDADE DOS VEICULOS /////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////
                                        $controle_porcentagem_array = array();
                                        $controle_porcentagem_array_menor = array();
                                        $conta_array = 0;

///echo $peso_sobrando_setor . " EITA " . "<br>";


                                        while ($row_veiculoz = mysql_fetch_array($rs_veiculoz)) {
                                            $id_veiculoz = $row_veiculoz["id"];
                                            $peso_veiculoz = $row_veiculoz["peso"];
                                            $nome_veiculoz = $row_veiculoz["nome"];

                                            $ocupado_veiculoz = $row_veiculoz["ocupado"];

                                            $controle_do_pesoz = ($peso_por_setor / $peso_veiculoz) * 100;

                                            if ($controle_do_pesoz < 90) {

                                                $controle_porcentagem_array_menor[$conta_array]['peso'] = $peso_veiculoz;

                                                $controle_porcentagem_array_menor[$conta_array]['valor'] = $controle_do_pesoz;
                                                $controle_porcentagem_array_menor[$conta_array]['id'] = $id_veiculoz;
                                                $controle_porcentagem_array_menor[$conta_array]['nome'] = $nome_veiculoz;
                                                $controle_porcentagem_array_menor[$conta_array]['ocupado'] = $ocupado_veiculoz;
                                            } else {
                                                $controle_porcentagem_array[$conta_array]['peso'] = $peso_veiculoz;

                                                $controle_porcentagem_array[$conta_array]['valor'] = $controle_do_pesoz;
                                                $controle_porcentagem_array[$conta_array]['id'] = $id_veiculoz;
                                                $controle_porcentagem_array[$conta_array]['nome'] = $nome_veiculoz;
                                                $controle_porcentagem_array[$conta_array]['ocupado'] = $ocupado_veiculoz;

                                            }
                                            $conta_array++;
                                        }


// > 90
                                        usort($controle_porcentagem_array, function ($a, $b) {
                                            return $a['valor'] > $b['valor'];
                                        });

// < 90
                                        usort($controle_porcentagem_array_menor, function ($c, $d) {
                                            return $c['valor'] < $d['valor'];
                                        });


                                        $junta_arrays = array_merge($controle_porcentagem_array, $controle_porcentagem_array_menor);

////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////
//// PRIORIDADE DOS VEICULOS /////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////
///FECHA ////


//echo "<strong>PESO TOTAL DO SETOR:</strong>" . $peso_por_setor . "<br>";


//$total = mysql_num_rows($rs_veiculo);
//echo $total;


///LOOPING VEICULOS
                                        for ($i = 0; $i < count($junta_arrays); $i++) {

                                            ///////////////////////////////////////////////////////////////////////////////////////////////
                                            ///////////////////////////////////////////////////////////////////////////////////////////////
                                            ///////////////////////////////////////////////////////////////////////////////////////////////
                                            if ($peso_sobrando_setor != 0) {

                                                for ($y = 0; $y < count($junta_arrays); $y++) {

                                                    $peso_veiculoz = $junta_arrays[$y]['peso'];
                                                    $id_veiculoz = $junta_arrays[$y]['id'];
                                                    $nome_veiculoz = $junta_arrays[$y]['nome'];
                                                    $valor_veiculoz = $junta_arrays[$y]['valor'];

                                                    $ocupado_veiculoz = $junta_arrays[$y]["ocupado"];

                                                    $controle_do_pesoz = ($peso_sobrando_setor / $peso_veiculoz) * 100;


                                                    if ($ocupado_veiculoz == 0) {

                                                        if ($controle_do_pesoz < 90) {

                                                            $controle_porcentagem_array_menor[$y]['peso'] = $peso_veiculoz;

                                                            $controle_porcentagem_array_menor[$y]['valor'] = $controle_do_pesoz;
                                                            $controle_porcentagem_array_menor[$y]['id'] = $id_veiculoz;
                                                            $controle_porcentagem_array_menor[$y]['nome'] = $nome_veiculoz;
                                                            $controle_porcentagem_array_menor[$y]['ocupado'] = $ocupado_veiculoz;
                                                        } else {
                                                            $controle_porcentagem_array[$y]['peso'] = $peso_veiculoz;

                                                            $controle_porcentagem_array[$y]['valor'] = $controle_do_pesoz;
                                                            $controle_porcentagem_array[$y]['id'] = $id_veiculoz;
                                                            $controle_porcentagem_array[$y]['nome'] = $nome_veiculoz;
                                                            $controle_porcentagem_array[$y]['ocupado'] = $ocupado_veiculoz;

                                                        }


                                                    }


                                                }


                                                // > 90
                                                usort($controle_porcentagem_array, function ($a, $b) {
                                                    return $a['valor'] > $b['valor'];
                                                });

                                                // < 90
                                                usort($controle_porcentagem_array_menor, function ($c, $d) {
                                                    return $c['valor'] < $d['valor'];
                                                });

                                                $junta_arrays = array_merge($controle_porcentagem_array, $controle_porcentagem_array_menor);
                                                if ($i == 1) {
                                                    $i = 0;
                                                }
                                                //	print_r($junta_arrays);
                                            }
                                            ///////////////////////////////////////////////////////////////////////////////////////////////
                                            ///////////////////////////////////////////////////////////////////////////////////////////////
                                            ///////////////////////////////////////////////////////////////////////////////////////////////
                                            ///////////////////////////////////////////////////////////////////////////////////////////////
                                            $id_veiculo1 = $junta_arrays[$i]['id'];
                                            $nome_veiculo1 = $junta_arrays[$i]['nome'];
                                            $valor_veiculo1 = $junta_arrays[$i]['valor'];

                                            $peso_veiculo1 = $junta_arrays[$i]['peso'];

                                            $ocupado_veiculo1 = $junta_arrays[$i]["ocupado"];
                                            //echo $peso_veiculo1 . "<br>";


                                            $controle_do_peso1 = ($peso_por_setor / $peso_veiculo1) * 100;

                                            //echo "<strong><font color='#F1080C'>" . $nome_veiculo1 . "</font></strong>- Peso:" . $peso_veiculo1;
//	echo "<br>";
                                            //echo $controle_do_peso1 . "%";
//	echo "<br>";

/// ABRE ////
//////////////////////////////////////////////////////////////
// UM VEICULO SÓ NO SETOR  ENTRE 90 E 100 PORCENTO////////////
//////////////////////////////////////////////////////////////

                                            if ($controle_do_peso1 >= 90 AND $controle_do_peso1 <= 100) {
                                                //	echo "<strong>MELHOR VEICULO - ACABOU A CARGA DO SETOR COM 1 VEÍCULO</strong>";
//	echo "<br>";
                                                $junta_arrays[$i]['ocupado'] = '1';
                                                $update_veiculo = mysql_query("UPDATE veiculos SET equipe='yes', peso_total='$peso_por_setor', ocupado='1', setor='$result[$conta_qtos_setores]' WHERE id='$id_veiculo1'");
                                                $update_cliente = mysql_query("UPDATE clientes SET veiculo='$id_veiculo1', ocupado='1' WHERE setor='$result[$conta_qtos_setores]'");
                                                //echo "<br>";
                                                break;

                                            }

//////////////////////////////////////////////////////////////
// UM VEICULO SÓ NO SETOR  ENTRE 90 E 100 PORCENTO////////////
//////////////////////////////////////////////////////////////
///FECHA ////


                                            $soma_array = 0;
                                            $soma_array_veiculo = 0;


///////////////////////////////////////////////////////////////
//////   MENOR QUE 90 PORCENTO  ///////////////////////////////
///////////////////////////////////////////////////////////////
///ABRE ////
                                            if ($controle_do_peso1 < 90) {

                                                //$query_pega_valores_setor = "select * from clientes where setor='$result[$conta_qtos_setores]' AND ocupado!='1' order by peso DESC;";

                                                $query_pega_valores_setor = "SELECT codigo_cliente as codigo ,Sum(peso) AS peso FROM clientes where setor='$result[$conta_qtos_setores]' AND ocupado!='1' GROUP BY codigo_cliente ORDER BY Sum(peso) DESC";
                                                $rs_pega_valores_setor = mysql_query($query_pega_valores_setor);

                                                $peso_veiculo_atual = 0;
                                                ///ABRE ////
                                                while ($row_setor = mysql_fetch_array($rs_pega_valores_setor)) {


                                                    $idcli_por_setor[$conta_por_setor] = $row_setor["codigo"];
                                                    //$peso_geral_por_setor = $row_setor["peso_total"];

                                                    $soma_array_veiculo += $pesocli_por_setor[$conta_por_setor];

                                                    $peso_veiculo_atual = $peso_veiculo1 - $soma_array;
                                                    //	echo "PESO ATUAL DO VEICULO: " . $peso_veiculo_atual. "<br>";

                                                    $pesocli_por_setor[$conta_por_setor] = $row_setor["peso"];
                                                    //echo "PESO DO CLIENTE: " . $pesocli_por_setor[$conta_por_setor] . "<br>";


                                                    ///////////////////////////////////////////////////////////////
                                                    /// NAO CABE NO VEICULO ///////////////////////////////////
                                                    ///////////////////////////////////////////////////////////////
                                                    ///ABRE ////
                                                    if ($peso_veiculo_atual < $pesocli_por_setor[$conta_por_setor]) {
                                                        //echo "<strong>NAO CABE NO VEICULO</strong>" . "<br>";
                                                        ///////////////////////////////////////////////////////////////
                                                        //PROXIMO CLIENTE///////////////////////////////////////////
                                                        ///////////////////////////////////////////////////////////////
                                                    } else {
                                                        /// CABE NO VEICULO //////////////////////////////////////////
                                                        ///////////////////////////////////////////////////////////////
                                                        $soma_array += $pesocli_por_setor[$conta_por_setor];
                                                        $soma_array_todos += $pesocli_por_setor[$conta_por_setor];


                                                        //	echo "SOMA DOS CLIENTES: " . $soma_array;
                                                        $peso_sobrando = $peso_veiculo1 - $soma_array;
                                                        ///////////////////////////////////////////////////////////////
                                                        /// RECUPERA VALOR SETOR ///////////////////////////////////
                                                        ///////////////////////////////////////////////////////////////
                                                        ///ABRE ////
                                                        if ($guarda_carga_setor != 0) {
                                                            //			echo "<br>";
                                                            //			echo "RECUPERA: " . $guarda_carga_setor;

                                                            $peso_sobrando_setor = $guarda_carga_setor - $soma_array_todos;
                                                        } else {
                                                            $peso_sobrando_setor = $peso_por_setor - $soma_array_todos;
                                                        }
                                                        ///FECHA ////
                                                        //////////////////////////////////////////////////////////////
                                                        ///////////////////////////////////////////////////////////////
                                                        ///////////////////////////////////////////////////////////////
                                                        /*echo "<br>";
                                                        echo "Sobra no veiculo:" . $peso_sobrando;
                                                        echo "<br>";


                                                        echo "Sobra no setor:" . $peso_sobrando_setor;
                                                        echo "<br>";*/
                                                        ///////////////////////////////////////////////////////////////
                                                        /////////VEICULO CHEIO ////////////////////////////////////////
                                                        ///////////////////////////////////////////////////////////////
                                                        ///ABRE ////
                                                        if ($peso_sobrando == 0) {
                                                            /*	echo "<strong>ACABOU A CARGA DO VEICULO!</strong>";
                                                                echo "<br>";
                                                                echo "<br>";*/

                                                            $junta_arrays[$i]['ocupado'] = '1';
                                                            $update_veiculo = mysql_query("UPDATE veiculos SET equipe='yes', peso_total='$soma_array', ocupado='1', setor='$result[$conta_qtos_setores]' WHERE id='$id_veiculo1'");
                                                            $update_cliente = mysql_query("UPDATE clientes SET veiculo='$id_veiculo1', ocupado='1' WHERE codigo_cliente='$idcli_por_setor[$conta_por_setor]'");
                                                            $peso_veiculo_atual = 0;
                                                            /////////////////////////////////// ////////////////////////////
                                                            //////////////PROXIMO VEICULO, ESSE TA CHEIO ////////////////////
                                                            /////////////////////////////////////////////////////////////////
                                                            break;

                                                        } else {
                                                            //$guarda_carga_setor = $peso_sobrando_setor;

                                                            $junta_arrays[$i]['ocupado'] = '1';
                                                            $update_veiculo = mysql_query("UPDATE veiculos SET equipe='yes', peso_total='$soma_array', ocupado='1', setor='$result[$conta_qtos_setores]' WHERE id='$id_veiculo1'");
                                                            $update_cliente = mysql_query("UPDATE clientes SET veiculo='$id_veiculo1', ocupado='1' WHERE codigo_cliente='$idcli_por_setor[$conta_por_setor]'");
                                                        }
                                                        ///FECHA ////
                                                        ///////////////////////////////////////////////////////////////
                                                        ///////////////////////////////////////////////////////////////
                                                        ///////////////////////////////////////////////////////////////

                                                    }


                                                }


                                                ///ABRE ////
                                                if ($peso_sobrando_setor != 0) {

                                                    //echo $guarda_sobra_setor;
                                                    /*	echo "<strong>NAO ACABOU A CARGA DO SETOR</strong>";

                                                        echo "<br>";*/
                                                    //echo "<br>";
                                                } else {
                                                    $guarda_carga_setor = 0;
                                                    /*	echo "<strong>ACABOU A CARGA DO SETOR (MENOR QUE 90%)</strong>";
                                                        echo "<br>";
                                                    //	echo "<br>";
                                                        echo "<strong>ULTIMO VEICULO DO SETOR - ACABOU A CARGA DO SETOR COM ESSE VEÍCULO</strong>";
                                                        echo "<br>";*/
                                                    break;
                                                }
                                                ///FECHA ////


                                            }


///////////////////////////////////////////////////////////////
//////   FINAL MENOR QUE 90 PORCENTO  /////////////////////////
///////////////////////////////////////////////////////////////


///ABRE ////
///////////////////////////////////////////////////////////////
//////   MAIOR QUE 100 PORCENTO  //////////////////////////////
///////////////////////////////////////////////////////////////

                                            if ($controle_do_peso1 > 100) {
                                                //$query_pega_valores_setor = "select * from clientes where setor='$result[$conta_qtos_setores]' AND ocupado!='1' order by peso DESC";
                                                $query_pega_valores_setor = "SELECT codigo_cliente as codigo, Sum(peso) AS peso FROM clientes where setor='$result[$conta_qtos_setores]' AND ocupado!='1' GROUP BY codigo_cliente ORDER BY Sum(peso) DESC";

                                                $rs_pega_valores_setor = mysql_query($query_pega_valores_setor);

                                                $peso_veiculo_atual = 0;


                                                ///ABRE ////
                                                while ($row_setor = mysql_fetch_array($rs_pega_valores_setor)) {

                                                    $idcli_por_setor[$conta_por_setor] = $row_setor["codigo"];
                                                    //$peso_geral_por_setor = $row_setor["peso_total"];

                                                    $soma_array_veiculo += $pesocli_por_setor[$conta_por_setor];

                                                    $peso_veiculo_atual = $peso_veiculo1 - $soma_array;
                                                    //		echo "PESO ATUAL DO VEICULO: " . $peso_veiculo_atual. "<br>";

                                                    $pesocli_por_setor[$conta_por_setor] = $row_setor["peso"];
                                                    //	echo "PESO DO CLIENTE: " . $pesocli_por_setor[$conta_por_setor] . "<br>";


                                                    /// NAO CABE NO VEICULO ///////////////////////////////////
                                                    ///////////////////////////////////////////////////////////////
                                                    ///ABRE ////
                                                    if ($peso_veiculo_atual < $pesocli_por_setor[$conta_por_setor]) {
                                                        /*echo "<strong>NAO CABE NO VEICULO</strong>" . "<br>";*/

                                                        //PROXIMO CLIENTE///////////////////////////////////////////
                                                        ///////////////////////////////////////////////////////////////
                                                    } else {
                                                        /// CABE NO VEICULO //////////////////////////////////////////
                                                        ///////////////////////////////////////////////////////////////
                                                        $soma_array += $pesocli_por_setor[$conta_por_setor];
                                                        $soma_array_todos += $pesocli_por_setor[$conta_por_setor];


                                                        ///	echo "SOMA DOS CLIENTES: " . $soma_array;
                                                        $peso_sobrando = $peso_veiculo1 - $soma_array;

                                                        /// RECUPERA VALOR SETOR ///////////////////////////////////
                                                        ///////////////////////////////////////////////////////////////
                                                        ///ABRE ////
                                                        if ($guarda_carga_setor != 0) {
                                                            //		echo "<br>";
                                                            //		echo "RECUPERA: " . $guarda_carga_setor;

                                                            $peso_sobrando_setor = $guarda_carga_setor - $soma_array_todos;
                                                        } else {
                                                            $peso_sobrando_setor = $peso_por_setor - $soma_array_todos;
                                                        }
                                                        ///FECHA ////
                                                        //////////////////////////////////////////////////////////////
                                                        ///////////////////////////////////////////////////////////////

                                                        //	echo "<br>";
                                                        /*echo "Sobra no veiculo:" . $peso_sobrando;
                                                        echo "<br>";


                                                        echo "Sobra no setor:" . $peso_sobrando_setor;
                                                        echo "<br>";*/
                                                        ///////////////////////////////////////////////////////////////
                                                        /////////VEICULO CHEIO ////////////////////////////////////////
                                                        ///////////////////////////////////////////////////////////////
                                                        ///ABRE ////
                                                        if ($peso_sobrando == 0) {
                                                            /*	echo "<strong>ACABOU A CARGA DO VEICULO!</strong>";
                                                                echo "<br>";*/
                                                            //	echo "<br>";

                                                            $junta_arrays[$i]['ocupado'] = '1';
                                                            $update_veiculo = mysql_query("UPDATE veiculos SET equipe='yes', peso_total='$soma_array', ocupado='1', setor='$result[$conta_qtos_setores]' WHERE id='$id_veiculo1'");
                                                            $update_cliente = mysql_query("UPDATE clientes SET veiculo='$id_veiculo1', ocupado='1' WHERE codigo_cliente='$idcli_por_setor[$conta_por_setor]'");

                                                            $peso_veiculo_atual = 0;


                                                            ///////////////////////////////////////////////////////////////
                                                            //////////////PROXIMO VEICULO, ESSE TA CHEIO ////////////////////
                                                            /////////////////////////////////////////////////////////////////
                                                            break;

                                                        } else {
                                                            //$guarda_carga_setor = $peso_sobrando_setor;
                                                            /*	echo "<strong>NÃO ACABOU A CARGA DO VEICULO!</strong>";
                                                              echo "<br>";*/
                                                            $junta_arrays[$i]['ocupado'] = '1';
                                                            $update_veiculo = mysql_query("UPDATE veiculos SET equipe='yes', peso_total='$soma_array', ocupado='1', setor='$result[$conta_qtos_setores]' WHERE id='$id_veiculo1'");
                                                            $update_cliente = mysql_query("UPDATE clientes SET veiculo='$id_veiculo1', ocupado='1' WHERE codigo_cliente='$idcli_por_setor[$conta_por_setor]'");
                                                        }


                                                        ///FECHA ////
                                                        ///////////////////////////////////////////////////////////////
                                                        ///////////////////////////////////////////////////////////////
                                                        ///////////////////////////////////////////////////////////////


                                                    }
                                                    ///FECHA ////

                                                    ///ABRE ////
                                                    if ($peso_sobrando_setor != 0) {

                                                        //echo $guarda_sobra_setor;
                                                        /*			echo "<strong>NAO ACABOU A CARGA DO SETOR</strong>";
                                                                    echo "<br>";
                                                                    */


                                                    } else {
                                                        //$guarda_carga_setor = 0;
                                                        /*	echo "<strong>ACABOU A CARGA DO SETOR (MAIOR QUE 100%)</strong>";
                                                            echo "<br>";
                                                            echo "<br>";
                                                */

                                                        break;

                                                    }
                                                    ///FECHA ////


                                                }
///FECHA ////


                                                if ($peso_sobrando_setor == 0) {
                                                    //break;
                                                }


///////////////////////////////////////////////////////////////
//////  FINAL MAIOR QUE 100 PORCENTO  /////////////////////////
///////////////////////////////////////////////////////////////
///FECHA ////
                                            }


///////////////////////////////////////////

                                            $conta_array = 0;
                                            $controle_porcentagem_array = array();
                                            $controle_porcentagem_array_menor = array();


//////FINAL LOOPING ARRAY VEICULOS
                                        }


                                        $conta_qtos_setores++;
                                    }
                                    ///FECHA FINAL LOOPING SETOR////


                                    ?>
                                </div>
                            </div>
                            </body>
                        <?php
                        /*

                        $query_veiculo = "SELECT * from veiculos where ocupado!='1' AND ativo='yes' order by prioridade ASC";
                        $rs_veiculo = mysql_query($query_veiculo);

                        ///ABRE ////
                        while($row_veiculo = mysql_fetch_array($rs_veiculo)){

                        $id_veiculo = $row_veiculo["id"];
                        $nome_veiculo = $row_veiculo["nome"];
                        $peso_veiculo = $row_veiculo["peso"];



                        echo "<strong>PESO TOTAL DO SETOR:</strong>" . $peso_por_setor;
                        $controle_do_peso = intval(($peso_por_setor/$peso_veiculo)* 100);

                        echo "<br>";

                        echo "<strong><font color='#F1080C'>" . $nome_veiculo . "</font></strong>- Peso:" . $peso_veiculo;
                        echo "<br>";
                        echo $controle_do_peso . "%";
                        echo "<br>";


                        //////////////////////////////////////////////////////////////
                        // UM VEICULO SÓ NO SETOR  ENTRE 90 E 100 PORCENTO////////////
                        //////////////////////////////////////////////////////////////
                        ///ABRE ////
                        if($controle_do_peso>= 90 AND $controle_do_peso<= 100){
                                echo "<strong>MELHOR VEICULO - ACABOU A CARGA DO SETOR COM 1 VEÍCULO</strong>";
                                echo "<br>";

                        //		$update_veiculo = mysql_query("UPDATE veiculos SET equipe='yes', peso_total='$peso_por_setor', ocupado='1', setor='$result[$conta_qtos_setores]' WHERE id='$id_veiculo'");
                        //		$update_cliente = mysql_query("UPDATE clientes SET veiculo='$id_veiculo', ocupado='1' WHERE setor='$result[$conta_qtos_setores]'");
                                //echo "<br>";
                                break;

                        }
                        ///FECHA ////

                        $soma_array = 0;
                        $soma_array_veiculo = 0;

                        ///////////////////////////////////////////////////////////////
                        //////   MENOR QUE 90 PORCENTO  ///////////////////////////////
                        ///////////////////////////////////////////////////////////////
                        ///ABRE ////
                        if ($controle_do_peso < 90){

                                //$query_pega_valores_setor = "select * from clientes where setor='$result[$conta_qtos_setores]' AND ocupado!='1' order by peso DESC;";

                                $query_pega_valores_setor = "SELECT codigo_cliente as codigo ,Sum(peso) AS peso FROM clientes where setor='$result[$conta_qtos_setores]' AND ocupado!='1' GROUP BY codigo_cliente ORDER BY Sum(peso) DESC";
                                $rs_pega_valores_setor = mysql_query($query_pega_valores_setor);

                                $peso_veiculo_atual = 0;
                                ///ABRE ////
                                while($row_setor = mysql_fetch_array($rs_pega_valores_setor)){


                                $idcli_por_setor[$conta_por_setor] = $row_setor["codigo"];
                                //$peso_geral_por_setor = $row_setor["peso_total"];

                                $soma_array_veiculo += $pesocli_por_setor[$conta_por_setor];

                                $peso_veiculo_atual = $peso_veiculo - $soma_array;
                                echo "PESO ATUAL DO VEICULO: " . $peso_veiculo_atual. "<br>";

                                $pesocli_por_setor[$conta_por_setor] = $row_setor["peso"];
                                echo "PESO DO CLIENTE: " . $pesocli_por_setor[$conta_por_setor] . "<br>";


                                //$update_veiculo_listado1 = mysql_query("UPDATE veiculos SET prioridade='$controle_do_pesox' WHERE id='$id_veiculoz'");
                                        ///////////////////////////////////////////////////////////////
                                        /// NAO CABE NO VEICULO ///////////////////////////////////
                                        ///////////////////////////////////////////////////////////////
                                        ///ABRE ////
                                        if($peso_veiculo_atual<$pesocli_por_setor[$conta_por_setor]){
                                            echo "<strong>NAO CABE NO VEICULO</strong>" . "<br>";
                                        ///////////////////////////////////////////////////////////////
                                        //PROXIMO CLIENTE///////////////////////////////////////////
                                        ///////////////////////////////////////////////////////////////
                                        } else {
                                        /// CABE NO VEICULO //////////////////////////////////////////
                                        ///////////////////////////////////////////////////////////////
                                            $soma_array += $pesocli_por_setor[$conta_por_setor];
                                            $soma_array_todos += $pesocli_por_setor[$conta_por_setor];


                                        //	echo "SOMA DOS CLIENTES: " . $soma_array;
                                            $peso_sobrando = $peso_veiculo - $soma_array;
                                        ///////////////////////////////////////////////////////////////
                                        /// RECUPERA VALOR SETOR ///////////////////////////////////
                                        ///////////////////////////////////////////////////////////////
                                                ///ABRE ////
                                                if($guarda_carga_setor!= 0){
                                        //			echo "<br>";
                                        //			echo "RECUPERA: " . $guarda_carga_setor;

                                                    $peso_sobrando_setor = $guarda_carga_setor - $soma_array_todos;
                                                } else {
                                                    $peso_sobrando_setor = $peso_por_setor - $soma_array_todos;
                                                }
                                                ///FECHA ////
                                        //////////////////////////////////////////////////////////////
                                        ///////////////////////////////////////////////////////////////
                                        ///////////////////////////////////////////////////////////////
                                            echo "<br>";
                                            echo "Sobra no veiculo:" . $peso_sobrando;
                                            echo "<br>";


                                            echo "Sobra no setor:" . $peso_sobrando_setor;
                                            echo "<br>";
                                                ///////////////////////////////////////////////////////////////
                                                /////////VEICULO CHEIO ////////////////////////////////////////
                                                ///////////////////////////////////////////////////////////////
                                                ///ABRE ////
                                                if($peso_sobrando==0){
                                                    echo "<strong>ACABOU A CARGA DO VEICULO!</strong>";
                                                    echo "<br>";
                                                    echo "<br>";


                                            //		$update_veiculo = mysql_query("UPDATE veiculos SET equipe='yes', peso_total='$soma_array', ocupado='1', setor='$result[$conta_qtos_setores]' WHERE id='$id_veiculo'");
                                            //		$update_cliente = mysql_query("UPDATE clientes SET veiculo='$id_veiculo', ocupado='1' WHERE codigo_cliente='$idcli_por_setor[$conta_por_setor]'");
                                                    $peso_veiculo_atual = 0;
                                                ///////////////////////////////////////////////////////////////
                                                //////////////PROXIMO VEICULO, ESSE TA CHEIO ////////////////////
                                                /////////////////////////////////////////////////////////////////
                                                    break;

                                                } else {
                                                //$guarda_carga_setor = $peso_sobrando_setor;


                                        //		$update_veiculo = mysql_query("UPDATE veiculos SET equipe='yes', peso_total='$soma_array', ocupado='1', setor='$result[$conta_qtos_setores]' WHERE id='$id_veiculo'");
                                        //		$update_cliente = mysql_query("UPDATE clientes SET veiculo='$id_veiculo', ocupado='1' WHERE codigo_cliente='$idcli_por_setor[$conta_por_setor]'");
                                                }
                                                ///FECHA ////
                                                ///////////////////////////////////////////////////////////////
                                                ///////////////////////////////////////////////////////////////
                                                ///////////////////////////////////////////////////////////////

                                  }






                              }


                                                        ///ABRE ////
                                                         if($peso_sobrando_setor!= 0){

                                                                //echo $guarda_sobra_setor;
                                                                echo "<strong>NAO ACABOU A CARGA DO SETOR</strong>";

                                                                echo "<br>";
                                                                //echo "<br>";
                                                        } else {
                                                                $guarda_carga_setor = 0;
                                                                echo "<strong>ACABOU A CARGA DO SETOR (MENOR QUE 90%)</strong>";
                                                                echo "<br>";
                                                            //	echo "<br>";
                                                                echo "<strong>ULTIMO VEICULO DO SETOR - ACABOU A CARGA DO SETOR COM ESSE VEÍCULO</strong>";
                                                                echo "<br>";
                                                                break;
                                                        }
                                                        ///FECHA ////




                        }



                        ///////////////////////////////////////////////////////////////
                        //////   FINAL MENOR QUE 90 PORCENTO  /////////////////////////
                        ///////////////////////////////////////////////////////////////



                        ///////////////////////////////////////////////////////////////
                        //////   MAIOR QUE 100 PORCENTO  //////////////////////////////
                        ///////////////////////////////////////////////////////////////
                        ///ABRE ////
                        if($controle_do_peso > 100){
                                //$query_pega_valores_setor = "select * from clientes where setor='$result[$conta_qtos_setores]' AND ocupado!='1' order by peso DESC";
                                $query_pega_valores_setor = "SELECT codigo_cliente as codigo, Sum(peso) AS peso FROM clientes where setor='$result[$conta_qtos_setores]' AND ocupado!='1' GROUP BY codigo_cliente ORDER BY Sum(peso) DESC";

                                $rs_pega_valores_setor = mysql_query($query_pega_valores_setor);

                                $peso_veiculo_atual = 0;


                                ///ABRE ////
                                while($row_setor = mysql_fetch_array($rs_pega_valores_setor)){

                                    $idcli_por_setor[$conta_por_setor] = $row_setor["codigo"];
                                    //$peso_geral_por_setor = $row_setor["peso_total"];

                                    $soma_array_veiculo += $pesocli_por_setor[$conta_por_setor];

                                    $peso_veiculo_atual = $peso_veiculo - $soma_array;
                                    echo "PESO ATUAL DO VEICULO: " . $peso_veiculo_atual. "<br>";

                                    $pesocli_por_setor[$conta_por_setor] = $row_setor["peso"];
                                    echo "PESO DO CLIENTE: " . $pesocli_por_setor[$conta_por_setor] . "<br>";



                                        /// NAO CABE NO VEICULO ///////////////////////////////////
                                        ///////////////////////////////////////////////////////////////
                                        ///ABRE ////
                                        if($peso_veiculo_atual<$pesocli_por_setor[$conta_por_setor]){
                                            echo "<strong>NAO CABE NO VEICULO</strong>" . "<br>";

                                        //PROXIMO CLIENTE///////////////////////////////////////////
                                        ///////////////////////////////////////////////////////////////
                                        } else {
                                        /// CABE NO VEICULO //////////////////////////////////////////
                                        ///////////////////////////////////////////////////////////////
                                            $soma_array += $pesocli_por_setor[$conta_por_setor];
                                            $soma_array_todos += $pesocli_por_setor[$conta_por_setor];


                                        ///	echo "SOMA DOS CLIENTES: " . $soma_array;
                                            $peso_sobrando = $peso_veiculo - $soma_array;

                                        /// RECUPERA VALOR SETOR ///////////////////////////////////
                                        ///////////////////////////////////////////////////////////////
                                                ///ABRE ////
                                                if($guarda_carga_setor!= 0){
                                            //		echo "<br>";
                                            //		echo "RECUPERA: " . $guarda_carga_setor;

                                                    $peso_sobrando_setor = $guarda_carga_setor - $soma_array_todos;
                                                } else {
                                                    $peso_sobrando_setor = $peso_por_setor - $soma_array_todos;
                                                }
                                                ///FECHA ////
                                        //////////////////////////////////////////////////////////////
                                        ///////////////////////////////////////////////////////////////

                                        //	echo "<br>";
                                            echo "Sobra no veiculo:" . $peso_sobrando;
                                            echo "<br>";


                                            echo "Sobra no setor:" . $peso_sobrando_setor;
                                            echo "<br>";
                                                ///////////////////////////////////////////////////////////////
                                                /////////VEICULO CHEIO ////////////////////////////////////////
                                                ///////////////////////////////////////////////////////////////
                                                ///ABRE ////
                                                if($peso_sobrando==0){
                                                    echo "<strong>ACABOU A CARGA DO VEICULO!</strong>";
                                                    echo "<br>";
                                                //	echo "<br>";


                                                //	$update_veiculo = mysql_query("UPDATE veiculos SET equipe='yes', peso_total='$soma_array', ocupado='1', setor='$result[$conta_qtos_setores]' WHERE id='$id_veiculo'");
                                            //		$update_cliente = mysql_query("UPDATE clientes SET veiculo='$id_veiculo', ocupado='1' WHERE codigo_cliente='$idcli_por_setor[$conta_por_setor]'");

                                                    $peso_veiculo_atual = 0;



                                                ///////////////////////////////////////////////////////////////
                                                //////////////PROXIMO VEICULO, ESSE TA CHEIO ////////////////////
                                                /////////////////////////////////////////////////////////////////
                                                    break;

                                                } else {
                                                    //$guarda_carga_setor = $peso_sobrando_setor;


                                                //	$update_veiculo = mysql_query("UPDATE veiculos SET equipe='yes', peso_total='$soma_array', ocupado='1', setor='$result[$conta_qtos_setores]' WHERE id='$id_veiculo'");
                                            //		$update_cliente = mysql_query("UPDATE clientes SET veiculo='$id_veiculo', ocupado='1' WHERE codigo_cliente='$idcli_por_setor[$conta_por_setor]'");
                                                }
                                                ///FECHA ////
                                                ///////////////////////////////////////////////////////////////
                                                ///////////////////////////////////////////////////////////////
                                                ///////////////////////////////////////////////////////////////


                                  }
                                  ///FECHA ////

                                                                ///ABRE ////
                                                          if($peso_sobrando_setor!= 0){

                                                                //echo $guarda_sobra_setor;
                                                                echo "<strong>NAO ACABOU A CARGA DO SETOR</strong>";
                                                                echo "<br>";



                                                        } else {
                                                                //$guarda_carga_setor = 0;
                                                                echo "<strong>ACABOU A CARGA DO SETOR (MAIOR QUE 100%)</strong>";
                                                                echo "<br>";

                                                                break;

                                                        }
                                                        ///FECHA ////


                             }
                            ///FECHA ////








                        ///////////////////////////////////////////////////////////////
                        //////  FINAL MAIOR QUE 100 PORCENTO  /////////////////////////
                        ///////////////////////////////////////////////////////////////

                        }



                        ///FECHA ////


                        }



                        echo "<font color='#F1080C'>OS VEICULOS ACABARAM</font>";
                        echo "<br>";
                        ///////////////////////////////////////////
                        $conta_qtos_setores++;

                        */


                        $query3 = "select * from clientes";
                        $rs3 = mysql_query($query3);

                        $conta_vazios = 0;

                        ///ABRE ////
                        while ($row3 = mysql_fetch_array($rs3)) {
                            $codigo_cliente = $row3["codigo_cliente"];
                            $nome = $row3["nome"];
                            $endereco = $row3["endereco"];
                            $cidade = $row3["cidade"];
                            $estado = $row3["estado"];
                            $cep = $row3["cep"];
                            $endereco_cad = $row3["endereco_cad"];
                            $latitude_cad = $row3["latitude_cad"];
                            $longitude_cad = $row3["longitude_cad"];
                            $confianca_cad = $row3["confianca_cad"];
                            $setor_cad = $row3["setor"];

                            $peso = $row3["peso"];
                            $volume = $row3["volume"];
                            $valor = $row3["valor"];
                            // echo $ativo_cad;


                            if ($latitude_cad == "" or $longitude_cad == "") {
                                $conta_vazios++;
                            }

                            if ($setor_cad == "") {

                                //echo "vazio";

                            } else {

                                $search_veiculo1 = "SELECT * FROM veiculos WHERE setor = '$setor_cad'";
                                $dados1 = mysql_query($search_veiculo1);
                                $quantos1 = mysql_num_rows($dados1);
//echo $quantos1;

                                if ($quantos1 > 1) {

                                    $search_veiculo = "SELECT * FROM veiculos WHERE setor = '$setor_cad' AND ativo='yes' LIMIT 1";
                                    $dados = mysql_query($search_veiculo);


                                    while ($row_dados = mysql_fetch_array($dados)) {

                                        $setor_do = $row_dados['setor'];
                                        $id_do_veiculo = $row_dados['id'];
                                        $ativo_cad = $row_dados["ativo"];
                                        $conta_peso_veiculo = $row_dados["peso_total"];
                                        $conta_volume_veiculo = $row_dados["volume_total"];
                                        $conta_valor_veiculo = $row_dados["valor_total"];

                                        if ($ativo_cad == "yes") {

                                            $conta_peso_veiculo = $conta_peso_veiculo + $peso;
                                            $conta_volume_veiculo = $conta_volume_veiculo + $volume;
                                            $conta_valor_veiculo = $conta_valor_veiculo + $valor;

                                            $update_cliente = mysql_query("UPDATE clientes SET veiculo='$id_do_veiculo' WHERE setor='$setor_do'");

                                            $update_veiculo = mysql_query("UPDATE veiculos SET peso_total='$conta_peso_veiculo', volume_total='$conta_volume_veiculo', valor_total='$conta_valor_veiculo', equipe='yes' WHERE id='$id_do_veiculo'");

                                        }


                                    }


                                } else {

                                    $search_veiculo = "SELECT * FROM veiculos WHERE setor = '$setor_cad'";
                                    $dados = mysql_query($search_veiculo);
                                    //$quantos = mysql_num_rows($dados);

                                    $conta_peso_veiculo = 0;
                                    $conta_volume_veiculo = 0;
                                    $conta_valor_veiculo = 0;


                                    while ($row_dados = mysql_fetch_array($dados)) {

                                        $setor_do = $row_dados['setor'];
                                        $id_do_veiculo = $row_dados['id'];
                                        $ativo_cad = $row_dados["ativo"];
                                        $conta_peso_veiculo = $row_dados["peso_total"];
                                        $conta_volume_veiculo = $row_dados["volume_total"];
                                        $conta_valor_veiculo = $row_dados["valor_total"];

                                        if ($ativo_cad == "yes") {

                                            $conta_peso_veiculo = $conta_peso_veiculo + $peso;
                                            $conta_volume_veiculo = $conta_volume_veiculo + $volume;
                                            $conta_valor_veiculo = $conta_valor_veiculo + $valor;

                                            //echo $conta_peso_veiculo . "<br>";
                                            $update_cliente = mysql_query("UPDATE clientes SET veiculo='$id_do_veiculo' WHERE setor='$setor_do'");

                                            $update_veiculo = mysql_query("UPDATE veiculos SET peso_total='$conta_peso_veiculo', volume_total='$conta_volume_veiculo', valor_total='$conta_valor_veiculo', equipe='yes' WHERE id='$id_do_veiculo'");


                                        }

                                    }

                                }


                            }

/////////////////////////////////////////////////////////////////


                            /*$search = mysql_query("SELECT * FROM db_geral WHERE codigo_cliente = '$codigo_cliente'");


                            if(@mysql_num_rows($search) > 0){

                            $sql = mysql_query("UPDATE db_geral SET codigo_cliente='$codigo_cliente', nome='$nome', endereco='$endereco', cidade='$cidade', estado='$estado', endereco_cad='$endereco_cad', latitude_cad='$latitude_cad', longitude_cad='$longitude_cad', confianca_cad='101'  WHERE codigo_cliente = '$codigo_cliente' AND endereco='$endereco'");

                            } else {

                            // faz inserção
                            $sql = mysql_query("INSERT INTO db_geral(codigo_cliente, nome, endereco, cidade, estado, cep, endereco_cad, latitude_cad, longitude_cad, confianca_cad) VALUES('$codigo_cliente', '$nome', '$endereco', '$cidade', '$estado', '$cep', '$endereco_cad', '$latitude_cad', '$longitude_cad', '101')");
                            }
                            */


                        }
                        ///FECHA ////
                        if ($conta_vazios > 0){
                        ?>
                            <SCRIPT LANGUAGE="JavaScript" TYPE="text/javascript">
                                alert("Existem Geocodificações sem Latitude ou Longitude. Por favor, Geocodificar Manualmente esses pontos.");
                                window.history.go(-1);

                            </SCRIPT>
                        <?php
                        } else {

                        ?>
                            <SCRIPT LANGUAGE="JavaScript" TYPE="text/javascript">

                                window.location.href = "step3.php";

                            </SCRIPT>

                            <?php
                        }


                            break;
                        ///////////////////

                        case 'rastro_auto':

                        $id_login = $_POST["id_login"];
                        $id_data = $_POST["id_data"];

                        $dentro = $_POST["dentro"];
                        $iparr = split("\,", $dentro);
                        $tamanha_array = count($iparr);

                        ?>

                        <body bgcolor="#000000">


                        <div style="height:100px; background-color:#000000; width:400px; position: relative; left: 50%; top: 50%; margin-left:-200px; margin-top:-50px">
                            <div id="progress"
                                 style="position: absolute; left: 28px; top: 28px; width: 342px; height: 40px; background-color: #6f99d6; layer-background-color: #6f99d6; border: 1px none #000000; font-family:Arial, 'Helvetica Neue', Helvetica, sans-serif; font-size:12px">


                                <?php


                                for ($y = 0; $y < $tamanha_array; $y++) {
                                    //echo $iparr[$y];

                                    $query = "UPDATE rotas SET ce=1 WHERE id='$iparr[$y]'";
                                    $rs = mysql_query($query);

                                }


                                //// LOADING 0 A 100% ////////////////////////////////////////////////////
                                $pega_loading = intval(($num_rows1 / $num_rows) * 100) . "%";

                                echo "<div style='position:absolute;margin:0px 0px 0px 0px;width:$pega_loading;height:40px;background:#2867b2;color:#2867b2;color: #FFFFFF;text-align:center;line-height:40px;'>$pega_loading</div>";
                                flush();
                                ob_flush();

                                //// LOADING 0 A 100% ////////////////////////////////////////////////////


                                ?>
                                <SCRIPT LANGUAGE="JavaScript" TYPE="text/javascript">
                                    window.location.href = "step4.php?id_login=<?php echo $id_login?>&id_data=<?php echo $id_data?>"


                                </SCRIPT>

                                <?php

                                break;
                                ///////////////////
                                case 'editar_cliente':

                                    $id = $_POST["id"];
                                    $cod_cliente = $_POST["cod_cliente"];

                                    $rota = $_POST["rota"];
                                    $sequencia = $_POST["sequencia"];

                                    echo $id . "<br>";

                                    echo $cod_cliente . "<br>";
                                    echo $rota . "<br>";
                                    echo $sequencia . "<br>";


                                    $query = "select * from rotas WHERE id='$id'";
                                    $rs = mysql_query($query);


///ABRE
                                    while ($row = mysql_fetch_row($rs)) {


                                        $query2 = "UPDATE rotas SET rota='$rota', sequencia='$sequencia' WHERE id='$id'";
                                        $rs2 = mysql_query($query2);

                                    }

                                    ?>
                                    <SCRIPT LANGUAGE="JavaScript" TYPE="text/javascript">
                                        window.location.href = "step2.php"
                                    </SCRIPT>

                                    <?php

                                    break;


                                ///////////////////////////////////////////////////////////
                                case 'atualiza_endereco':
                                    $reg = $_POST["reg"];
                                    $new_lat = $_POST["new_lat_2"];
                                    $new_lgn = $_POST["new_lgn_2"];
                                    $new_end = addslashes($_POST["new_end_2"]);
                                    $endereco = addslashes($_POST["endereco_x"]);
                                    $codigo = $_POST["codigo_2"];

//echo $reg;
//echo $new_end;

                                    $query = "select * from clientes WHERE codigo_cliente='$reg'";
                                    $rs = mysql_query($query);
                                    $new_lgn_mais = "";

                                    while ($row = mysql_fetch_array($rs)) {
                                        //$nome = $row["nome"];
                                        //echo $nome;
                                        $new_lgn_mais = $new_lgn . $codigo;
                                        $confianca = $row["confianca_cad"];
                                        $query2 = "UPDATE clientes SET endereco_cad='$new_end', latitude_cad='$new_lat', longitude_cad='$new_lgn_mais', confianca_cad='101', geo_manual='yes' WHERE codigo_cliente = '$reg'";
                                        $rs2 = mysql_query($query2);

                                        $query3 = "UPDATE db_geral SET endereco_cad='$new_end', latitude_cad='$new_lat', longitude_cad='$new_lgn_mais', confianca_cad='101' WHERE codigo_cliente = '$reg'";
                                        $rs3 = mysql_query($query3);

                                    }

                                    if ($confianca <= 50) {
                                        $faixa = "red";
                                    }
                                    if ($confianca > 50 AND $confianca < 90) {
                                        $faixa = "orange";
                                    }
                                    if ($confianca >= 90 AND $confianca < 101) {
                                        $faixa = "green";
                                    }
                                    if ($confianca == 101) {
                                        $faixa = "blue";

                                    }

                                    ?>
                                    <SCRIPT LANGUAGE="JavaScript" TYPE="text/javascript">
                                        window.location.href = "step2.php?lista=<?php echo $faixa; ?>"
                                    </SCRIPT>

                                    <?php

                                    break;

                                case 'cadastra_veiculo':
                                    $veiculo = $_POST["veiculo"];
                                    $qto = $_POST["qto"];
                                    $peso = $_POST["peso"];
                                    $volume = $_POST["volume"];
                                    $valor = $_POST["valor"];
                                    $cor = $_POST["color1"];
                                    $tipo = $_POST["type"];

                                    if ($cor == "#ff0000") {
                                        $type_icon = "red1";
                                    }
                                    if ($cor == "#ff7800") {
                                        $type_icon = "orange";
                                    }
                                    if ($cor == "#42ff00") {
                                        $type_icon = "green1";
                                    }
                                    if ($cor == "#7200ff") {
                                        $type_icon = "purple1";
                                    }
                                    if ($cor == "#00f0ff") {
                                        $type_icon = "blue1";
                                    }
                                    if ($cor == "#003cff") {
                                        $type_icon = "blue2";
                                    }
                                    if ($cor == "#9c5100") {
                                        $type_icon = "brown";
                                    }
                                    if ($cor == "#00760b") {
                                        $type_icon = "green2";
                                    }
                                    if ($cor == "#ffbc00") {
                                        $type_icon = "yellow";
                                    }
                                    if ($cor == "#900000") {
                                        $type_icon = "red2";
                                    }
                                    if ($cor == "#340058") {
                                        $type_icon = "purple2";
                                    }
                                    if ($cor == "#03fe85") {
                                        $type_icon = "green3";
                                    }

//echo $veiculo;
//echo $type_icon;
                                    $conta = 0;

                                    while ($conta < $qto) {
                                        $conta = $conta + 1;
//echo $cor;
                                        $query2 = "INSERT INTO veiculos(nome, peso, volume, valor, cor, tipo, type_icon) VALUES('$veiculo', '$peso', '$volume', '$valor', '$cor', '$tipo', '$type_icon')";
//$query2 = "UPDATE veiculos SET nome ='$veiculo', peso='$peso', valor='$valor', cor='$cor' , tipo='$tipo'";

                                        $rs = mysql_query($query2);

                                    }
                                    ?>
                                    <SCRIPT language="JavaScript">
                                        window.parent.location.href = "step3.php";
                                        parent.document.getElementById('Paginaa').style.display = 'none';

                                    </SCRIPT>


                                    <?php

                                    break;


                                ///////////////ESCOLHER VEICULO//////////////////////////
                                case 'escolhe_veiculo':
                                    $veiculo = $_POST["veiculo"];
                                    $resultado_peso = $_POST["resultado_peso"];

                                    $zoom = $_POST["zoom"];
                                    $z = $_POST["zoom_x"];

//echo $resultado_peso;

                                    $query = "select * from veiculos where id='$veiculo'";
                                    $rs = mysql_query($query);

                                    while ($row = mysql_fetch_array($rs)) {
                                        $nome = $row["nome"];
                                        $tipo = $row["tipo"];
                                        $peso = $row["peso"];
                                        $volume = $row["volume"];
                                        $valor = $row["valor"];
                                        $poligono = $row["poligono"];
                                        //echo $poligono;
                                        $peso_total = $row["peso_total"];
                                        $volume_total = $row["volume_total"];
                                        $valor_total = $row["valor_total"];
                                        $result_peso = $peso - $peso_total;
                                        $result_volume = $volume - $volume_total;
                                        $result_valor = $valor - $valor_total;
                                        $cor_veiculo = $row["type_icon"];

                                        $porcentagem_peso = ($peso_total / $peso) * 100;
                                        $porcentagem_volume = ($volume_total / $volume) * 100;
                                        $porcentagem_valor = ($valor_total / $valor) * 100;


                                    }

                                    $query_qtd = "select * from clientes where veiculo='$veiculo'";
                                    $rs_qtd = mysql_query($query_qtd);
                                    $num_rows = mysql_num_rows($rs_qtd);

                                    $query_qtd1 = "select * from clientes where veiculo='$veiculo' group by codigo_cliente";
                                    $rs_qtd1 = mysql_query($query_qtd1);
                                    $num_rows1 = mysql_num_rows($rs_qtd1);

                                    ?>

                                    <SCRIPT language="JavaScript">window.parent.location.href = "step3.php?nome=<?=$nome ?>&peso=<?=$peso ?>&tipo=<?=$tipo ?>&volume=<?=$volume ?>&valor=<?=$valor ?>&id=<?=$veiculo ?>&result_peso=<?=$result_peso ?>&result_volume=<?=$result_volume ?>&result_valor=<?=$result_valor ?>&porc_peso=<?=$porcentagem_peso ?>&porc_volume=<?=$porcentagem_volume ?>&porc_valor=<?=$porcentagem_valor ?>&corveiculo=<?=$cor_veiculo?>&numero=<?=$num_rows?>&numero_visitas=<?=$num_rows1?>&zoom=<?=$zoom ?>&z=<?=$z ?>";
                                        parent.document.getElementById('Pagina').style.display = 'none';
                                        //document.getElementById('Pag1').style.display = 'none';
                                        //window.parent.location.reload();
                                    </SCRIPT>
                                    <?php
                                    break;

                                /////FIM//////ESCOLHER VEICULO////////////////////////////////////////////


                                //////////////INATIVA ICONE CLIENTE BD GERAL////////////////////////////////

                                case 'inativa_cliente_especial':

                                    $id = $_GET["id"];
                                    $codigo_cli = $_GET["codigo_cli"];
                                    $end = $_GET["end"];


                                    $query_especial = "UPDATE db_geral SET premium='0' WHERE codigo = '$id'";
                                    $rs_especial = mysql_query($query_especial);


                                    $query1 = "UPDATE clientes SET premium='0' where codigo_cliente='$codigo_cli' AND endereco='$end'";
                                    $rs1 = mysql_query($query1);


                                    ?>
                                    <SCRIPT language="JavaScript">

                                        //window.location.href="cad_bd.php";
                                        window.history.go(-1);
                                    </SCRIPT>

                                    <?php
                                    break;
                                //////////////INATIVA ICONE CLIENTE BD GERAL////////////////////////////////

                                //////////////ATIVA ICONE CLIENTE BD GERAL////////////////////////////////

                                case 'ativa_cliente_especial':

                                    $id = $_GET["id"];
                                    $codigo_cli = $_GET["codigo_cli"];
                                    $end = $_GET["end"];


                                    $query_especial = "UPDATE db_geral SET premium='1' WHERE codigo = '$id'";
                                    $rs_especial = mysql_query($query_especial);


                                    $query1 = "UPDATE clientes SET premium='1' where codigo_cliente='$codigo_cli' AND endereco='$end'";
                                    $rs1 = mysql_query($query1);


                                    ?>
                                    <SCRIPT language="JavaScript">

                                        //window.location.href="cad_bd.php";
                                        window.history.go(-1);
                                    </SCRIPT>

                                    <?php

                                    break;

                                //////////////ATIVA ICONE CLIENTE BD GERAL////////////////////////////////

                                //////////////EXCLUI CLIENTE DA BASE CLIENTES////////////////////////////////

                                case 'exclui_cliente_base_cliente':

                                    $id = $_GET["id"];
//echo $id_veiculo;


// Query
                                    $query = "SELECT * FROM rotas WHERE id = '$id'";
                                    $query = mysql_query($query);

// Tirando o while
                                    $dados = mysql_fetch_array($query);


                                    $query_deleta = "DELETE FROM rotas WHERE id = '$id'";
                                    $rs_deleta = mysql_query($query_deleta);


                                    ?>
                                    <SCRIPT language="JavaScript">

                                        //window.location.href="cad_bd.php";
                                        window.history.go(-1);
                                    </SCRIPT>

                                    <?php

                                    break;
                                //////////////EXCLUI CLIENTE DA BASE CLIENTES////////////////////////////////

                                //////////////EXCLUI CLIENTE BD GERAL////////////////////////////////

                                case 'exclui_cliente':

                                    $id = $_GET["id"];
//echo $id_veiculo;
                                    $query_deleta = "DELETE FROM db_geral WHERE codigo = '$id'";
                                    $rs_deleta = mysql_query($query_deleta);

                                    ?>
                                    <SCRIPT language="JavaScript">

                                        //window.location.href="cad_bd.php";
                                        window.history.go(-1);
                                    </SCRIPT>

                                    <?php

                                    break;
                                //////////////EXCLUI CLIENTE BD GERAL////////////////////////////////

                                //////////////EXCLUI CLIENTE BD ATUAL////////////////////////////////

                                case 'exclui_cliente_veiculo':

                                $id = $_GET["id"];
                                $veiculo = $_GET["veiculo"];
                                $p = $_GET["p"];
                                $v = $_GET["v"];
                                $va = $_GET["va"];


                                ?>

                                <body bgcolor="#000000">


                                <div style="height:100px; background-color:#000000; width:400px; position: relative; left: 50%; top: 50%; margin-left:-200px; margin-top:-50px">
                                    <div id="progress"
                                         style="position: absolute; left: 28px; top: 28px; width: 342px; height: 40px; background-color: #6f99d6; layer-background-color: #6f99d6; border: 1px none #000000; font-family:Arial, 'Helvetica Neue', Helvetica, sans-serif; font-size:12px">


                                        <?php

                                        //echo $id_veiculo;
                                        $query_deleta = "UPDATE clientes SET veiculo=null WHERE codigo = '$id'";
                                        $rs_deleta = mysql_query($query_deleta);


                                        $query = "select * from veiculos where id='$veiculo'";
                                        $query = mysql_query($query);
                                        $dados = mysql_fetch_array($query);


                                        $peso = $dados['peso_total'];
                                        $volume = $dados['volume_total'];
                                        $valor = $dados['valor_total'];

                                        $peso_padrao = $dados['peso'];
                                        $volume_padrao = $dados['volume'];
                                        $valor_padrao = $dados['valor'];


                                        $cor_veiculo = $dados["type_icon"];

                                        $nome = $dados["nome"];
                                        $tipo = $dados["tipo"];

                                        $peso_conta = $peso - $p;
                                        $volume_conta = $volume - $v;
                                        $valor_conta = $valor - $va;

                                        if ($peso_conta == 0.00 AND $volume_conta == 0.00 AND $valor_conta == 0.00) {

                                            $query_conta = "UPDATE veiculos SET peso_total='$peso_conta', volume_total='$volume_conta', valor_total='$valor_conta', equipe=null, setor=null, ocupado='0' WHERE id = '$veiculo'";
                                            $rs_conta = mysql_query($query_conta);
                                        } else {
                                            $query_conta = "UPDATE veiculos SET peso_total='$peso_conta', volume_total='$volume_conta', valor_total='$valor_conta' WHERE id = '$veiculo'";
                                            $rs_conta = mysql_query($query_conta);

                                        }


                                        $query1 = "select * from veiculos where id='$veiculo'";
                                        $query1 = mysql_query($query1);
                                        $dados1 = mysql_fetch_array($query1);


                                        $peso1 = $dados1['peso'];
                                        $volume1 = $dados1['volume'];
                                        $valor1 = $dados1['valor'];

                                        $peso2 = $dados1['peso_total'];
                                        $volume2 = $dados1['volume_total'];
                                        $valor2 = $dados1['valor_total'];

                                        $result_peso1 = $peso1 - $peso2;
                                        $result_volume1 = $volume1 - $volume2;
                                        $result_valor1 = $valor1 - $valor2;


                                        $porcentagem_peso = ($peso2 / $peso1) * 100;
                                        $porcentagem_volume = ($volume2 / $volume1) * 100;
                                        $porcentagem_valor = ($valor2 / $valor1) * 100;


                                        $query_qtd = "select * from clientes where veiculo='$veiculo'";
                                        $rs_qtd = mysql_query($query_qtd);
                                        $num_rows = mysql_num_rows($rs_qtd);

                                        $query_qtd1 = "select * from clientes where veiculo='$veiculo' group by codigo_cliente";
                                        $rs_qtd1 = mysql_query($query_qtd1);
                                        $num_rows1 = mysql_num_rows($rs_qtd1);


                                        //// LOADING 0 A 100% ////////////////////////////////////////////////////
                                        $pega_loading = intval(($num_rows1 / $num_rows) * 100) . "%";

                                        echo "<div style='position:absolute;margin:0px 0px 0px 0px;width:$pega_loading;height:40px;background:#2867b2;color:#2867b2;color: #FFFFFF;text-align:center;line-height:40px;'>$pega_loading</div>";
                                        flush();
                                        ob_flush();

                                        //// LOADING 0 A 100% ////////////////////////////////////////////////////

                                        ?>
                                        <SCRIPT language="JavaScript">

                                            //window.location.href="step3.php";

                                            window.location.href = "step3.php?nome=<?=$nome ?>&peso=<?=$peso_padrao ?>&tipo=<?=$tipo ?>&volume=<?=$volume_padrao ?>&valor=<?=$valor_padrao ?>&id=<?=$veiculo ?>&result_peso=<?=$result_peso1 ?>&result_volume=<?=$result_volume1 ?>&result_valor=<?=$result_valor1 ?>&porc_peso=<?=$porcentagem_peso ?>&porc_volume=<?=$porcentagem_volume ?>&porc_valor=<?=$porcentagem_valor ?>&corveiculo=<?=$cor_veiculo?>&numero=<?=$num_rows?>&numero_visitas=<?=$num_rows1?>";


                                        </SCRIPT>

                                        <?php

                                        break;


                                        /////FIM///////EXCLUI CLIENTE DP VEICULO ATUAL////////////////////////////////

                                        //////////////ALTERA CLIENTE D0 VEICULO ATUAL////////////////////////////////

                                        case 'alterar_cliente_veiculo':

                                        $query_where = "UPDATE passo SET ok='yes' WHERE id='3'";
                                        $rs_where = mysql_query($query_where);

                                        $query_where1 = "UPDATE passo SET ok='no' WHERE (id='4' OR id='5')";
                                        $rs_where1 = mysql_query($query_where1);


                                        ?>

                                        <body bgcolor="#000000">


                                        <div style="height:100px; background-color:#000000; width:400px; position: relative; left: 50%; top: 50%; margin-left:-200px; margin-top:-50px">
                                            <div id="progress"
                                                 style="position: absolute; left: 28px; top: 28px; width: 342px; height: 40px; background-color: #6f99d6; layer-background-color: #6f99d6; border: 1px none #000000; font-family:Arial, 'Helvetica Neue', Helvetica, sans-serif; font-size:12px">


                                                <?php

                                                $id_veiculo_novo = $_POST["id_veiculo_novo"];
                                                $id_veiculo_velho = $_POST["id_veiculo_velho"];
                                                $id_cliente_velho = $_POST["id_cliente_velho"];

                                                $p = $_POST["peso_velho"];
                                                $v = $_POST["volume_velho"];
                                                $va = $_POST["valor_velho"];


                                                $query_yes = "UPDATE clientes SET veiculo='$id_veiculo_novo' WHERE codigo = '$id_cliente_velho'";
                                                $rs_yes = mysql_query($query_yes);


                                                /////////////////NO VEICULO VELHO/////////////////////////////


                                                $query = "select * from veiculos where id='$id_veiculo_velho'";
                                                $query = mysql_query($query);
                                                $dados = mysql_fetch_array($query);


                                                $nome_consulta_velho = $dados['nome'];
                                                $tipo = $dados['tipo'];
                                                $cor_veiculo = $dados["type_icon"];


                                                $peso_consulta_velho = $dados['peso_total'];
                                                $volume_consulta_velho = $dados['volume_total'];
                                                $valor_consulta_velho = $dados['valor_total'];

                                                $pesototal_consulta_velho = $dados['peso'];
                                                $volumetotal_consulta_velho = $dados['volume'];
                                                $valortotal_consulta_velho = $dados['valor'];


                                                $peso_calcula_velho = $peso_consulta_velho - $p;
                                                $volume_calcula_velho = $volume_consulta_velho - $v;
                                                $valor_calcula_velho = $valor_consulta_velho - $va;

                                                if ($peso_calcula_velho == 0.00 AND $volume_calcula_velho == 0.00 AND $valor_calcula_velho == 0.00) {


                                                    $query_veiculos = "UPDATE veiculos SET equipe=null, peso_total='$peso_calcula_velho', volume_total='$volume_calcula_velho', valor_total='$valor_calcula_velho', ocupado='0', setor=null WHERE id = '$id_veiculo_velho'";

                                                } else {

                                                    $query_veiculos = "UPDATE veiculos SET equipe='yes', peso_total='$peso_calcula_velho', volume_total='$volume_calcula_velho', valor_total='$valor_calcula_velho' WHERE id = '$id_veiculo_velho'";


                                                }

                                                $rs_veiculos = mysql_query($query_veiculos);

                                                /////////////////NO VEICULO NOVO/////////////////////////////


                                                $query1 = "select * from veiculos where id='$id_veiculo_novo'";
                                                $query1 = mysql_query($query1);
                                                $dados1 = mysql_fetch_array($query1);


                                                $peso_consulta_novo = $dados1['peso_total'];
                                                $volume_consulta_novo = $dados1['volume_total'];
                                                $valor_consulta_novo = $dados1['valor_total'];

                                                $peso_calcula_novo = $peso_consulta_novo + $p;
                                                $volume_calcula_novo = $volume_consulta_novo + $v;
                                                $valor_calcula_novo = $valor_consulta_novo + $va;

                                                $query_veiculos1 = "UPDATE veiculos SET equipe='yes', peso_total='$peso_calcula_novo', volume_total='$volume_calcula_novo', valor_total='$valor_calcula_novo', ocupado='1' WHERE id = '$id_veiculo_novo'";
                                                $rs_veiculos1 = mysql_query($query_veiculos1);

                                                //////////////////////////////////////////////////////////////

                                                $peso_result_velho = $pesototal_consulta_velho - $peso_calcula_velho;
                                                $volume_result_velho = $volumetotal_consulta_velho - $volume_calcula_velho;
                                                $valor_result_velho = $valortotal_consulta_velho - $valor_calcula_velho;

                                                $porcentagem_peso = ($peso_calcula_velho / $pesototal_consulta_velho) * 100;
                                                $porcentagem_volume = ($volume_calcula_velho / $volumetotal_consulta_velho) * 100;
                                                $porcentagem_valor = ($valor_calcula_velho / $valortotal_consulta_velho) * 100;


                                                ///////////////////////NUMERO DE CLIENTES/////////////////////////////////////

                                                $query_qtd = "select * from clientes where veiculo='$id_veiculo_velho'";
                                                $rs_qtd = mysql_query($query_qtd);
                                                $num_rows = mysql_num_rows($rs_qtd);

                                                $query_qtd1 = "select * from clientes where veiculo='$id_veiculo_velho' group by codigo_cliente";
                                                $rs_qtd1 = mysql_query($query_qtd1);
                                                $num_rows1 = mysql_num_rows($rs_qtd1);

                                                //// LOADING 0 A 100% ////////////////////////////////////////////////////
                                                $pega_loading = intval(($num_rows1 / $num_rows) * 100) . "%";

                                                echo "<div style='position:absolute;margin:0px 0px 0px 0px;width:$pega_loading;height:40px;background:#2867b2;color:#2867b2;color: #FFFFFF;text-align:center;line-height:40px;'>$pega_loading</div>";
                                                flush();
                                                ob_flush();

                                                //// LOADING 0 A 100% ////////////////////////////////////////////////////


                                                ?>
                                                <SCRIPT language="JavaScript">


                                                    window.location.href = "step3.php?nome=<?=$nome_consulta_velho ?>&peso=<?=$pesototal_consulta_velho ?>&tipo=<?=$tipo ?>&volume=<?=$volumetotal_consulta_velho ?>&valor=<?=$valortotal_consulta_velho ?>&id=<?=$id_veiculo_velho ?>&result_peso=<?=$peso_result_velho ?>&result_volume=<?=$volume_result_velho ?>&result_valor=<?=$valor_result_velho ?>&porc_peso=<?=$porcentagem_peso ?>&porc_volume=<?=$porcentagem_volume ?>&porc_valor=<?=$porcentagem_valor ?>&corveiculo=<?=$cor_veiculo?>&numero=<?=$num_rows?>&numero_visitas=<?=$num_rows1?>";


                                                </SCRIPT>

                                                <?php

                                                break;


                                                /////FIM///////ALTERA CLIENTE D0 VEICULO ATUAL////////////////////////////////

                                                //////////////EXCLUI VEICULO////////////////////////////////

                                                case 'exclui_veiculo':

                                                    $id_veiculo = $_GET["id"];
//echo $id_veiculo;

                                                    $query_deleta_rota = "DELETE FROM rotas WHERE veiculo = '$id_veiculo'";
                                                    $rs_deleta_rota = mysql_query($query_deleta_rota);


                                                    $query6 = "UPDATE clientes SET veiculo=null WHERE veiculo = '$id_veiculo'";
                                                    $rs6 = mysql_query($query6);


                                                    $query_deleta = "DELETE FROM veiculos WHERE id = '$id_veiculo'";
                                                    $rs_deleta = mysql_query($query_deleta);

                                                    ?>
                                                    <SCRIPT language="JavaScript">

                                                        window.location.href = "cad_veiculos.php";

                                                    </SCRIPT>

                                                    <?php

                                                    break;

                                                /////FIM///////EXCLUI VEICULO////////////////////////////////


                                                //////////////ATIVA VEICULO////////////////////////////////

                                                case 'ativa_veiculo':

                                                    $id_veiculo = $_GET["id"];
//echo $id_veiculo ;
                                                    $query_ativa = "UPDATE veiculos SET ativo='yes' WHERE id = '$id_veiculo'";
                                                    $rs_ativa = mysql_query($query_ativa);

                                                    ?>
                                                    <SCRIPT language="JavaScript">

                                                        window.location.href = "cad_veiculos.php";

                                                    </SCRIPT>


                                                    <?php

                                                    break;

                                                /////FIM///////ATIVA VEICULO////////////////////////////////

                                                //////////////INATIVO VEICULO////////////////////////////////

                                                case 'inativa_veiculo':

                                                    $id_veiculo = $_GET["id"];
//echo $id_veiculo ;


                                                    $query_deleta_rota = "DELETE FROM rotas WHERE veiculo = '$id_veiculo'";
                                                    $rs_deleta_rota = mysql_query($query_deleta_rota);


                                                    $query6 = "UPDATE clientes SET veiculo=null WHERE veiculo = '$id_veiculo'";
                                                    $rs6 = mysql_query($query6);


                                                    $query_ativa = "UPDATE veiculos SET equipe=null, peso_total=null, volume_total=null, valor_total=null, ativo=null, distancia_total=0, tempo_total=null, ocupado=0 WHERE id = '$id_veiculo'";
                                                    $rs_ativa = mysql_query($query_ativa);

                                                    ?>
                                                    <SCRIPT language="JavaScript">

                                                        window.location.href = "cad_veiculos.php";

                                                    </SCRIPT>


                                                    <?php

                                                    break;

                                                /////FIM///////INATIVO VEICULO////////////////////////////////


                                                //////////////CADASTRA VEICULO PAGINA CADASTRO////////////////////////////////

                                                case 'cadastra_veiculo_cad':
                                                    $veiculo = $_POST["veiculo"];
                                                    $qto = $_POST["qto"];
                                                    $peso = $_POST["peso"];
                                                    $volume = $_POST["volume"];
                                                    $valor = $_POST["valor"];
                                                    $cor = $_POST["color1"];
                                                    $tipo = $_POST["type"];
                                                    $ativo = $_POST["ativo"];
                                                    $setor = $_POST["custo"];
//echo $ativo;

                                                    if ($cor == "#ff0000") {
                                                        $type_icon = "red1";
                                                    }
                                                    if ($cor == "#ff7800") {
                                                        $type_icon = "orange";
                                                    }
                                                    if ($cor == "#42ff00") {
                                                        $type_icon = "green1";
                                                    }
                                                    if ($cor == "#7200ff") {
                                                        $type_icon = "purple1";
                                                    }
                                                    if ($cor == "#00f0ff") {
                                                        $type_icon = "blue1";
                                                    }
                                                    if ($cor == "#003cff") {
                                                        $type_icon = "blue2";
                                                    }
                                                    if ($cor == "#9c5100") {
                                                        $type_icon = "brown";
                                                    }
                                                    if ($cor == "#00760b") {
                                                        $type_icon = "green2";
                                                    }
                                                    if ($cor == "#ffbc00") {
                                                        $type_icon = "yellow";
                                                    }
                                                    if ($cor == "#900000") {
                                                        $type_icon = "red2";
                                                    }
                                                    if ($cor == "#340058") {
                                                        $type_icon = "purple2";
                                                    }
                                                    if ($cor == "#03fe85") {
                                                        $type_icon = "green3";
                                                    }

//echo $veiculo;
//echo $type_icon;
                                                    $conta = 0;


                                                    while ($conta < $qto) {
                                                        $conta = $conta + 1;

                                                        if ($ativo == on) {
                                                            $query2 = "INSERT INTO veiculos(nome, peso, volume, valor, cor, tipo, type_icon, ativo, setor) VALUES('$veiculo', '$peso', '$volume', '$valor', '$cor', '$tipo', '$type_icon', 'yes', '$setor')";

                                                        } else {
                                                            $query2 = "INSERT INTO veiculos(nome, peso, volume, valor, cor, tipo, type_icon, setor) VALUES('$veiculo', '$peso', '$volume', '$valor', '$cor', '$tipo', '$type_icon', '$setor')";
                                                        }


                                                        $rs = mysql_query($query2);

                                                    }
                                                    ?>

                                                    <SCRIPT language="JavaScript">

                                                        window.location.href = "cad_veiculos.php";

                                                    </SCRIPT>

                                                    <?php

                                                    break;
                                                /////FIM///////CADASTRA VEICULO PAGINA CADASTRO////////////////////////////////

                                                //////////////ALTERAR VEICULO PAGINA CADASTRO////////////////////////////////

                                                case 'alterar_veiculo_cad':
                                                    $veiculo = $_POST["veiculo"];
                                                    $qto = $_POST["qto"];
                                                    $peso = $_POST["peso"];
                                                    $volume = $_POST["volume"];
                                                    $valor = $_POST["valor"];
                                                    $cor = $_POST["color1"];
                                                    $tipo = $_POST["type"];
                                                    $ativo = $_POST["ativo"];

                                                    $id_quem = $_POST["id_veiculo"];

                                                    $custo = $_POST["custo"];
//echo $veiculo;
//echo $type_icon;
//$conta = 0;

                                                    if ($ativo == on) {
                                                        $query2 = "UPDATE veiculos SET nome='$veiculo', peso='$peso', volume='$volume', valor='$valor', tipo='$tipo', ativo='yes', setor='$custo' where id='$id_quem'";
                                                    } else {

                                                        $query2 = "UPDATE veiculos SET nome='$veiculo', peso='$peso', volume='$volume', valor='$valor', tipo='$tipo', ativo=null, setor='$custo' where id='$id_quem'";
                                                    }


                                                    $rs = mysql_query($query2);

                                                    ?>
                                                    <SCRIPT language="JavaScript">

                                                        window.location.href = "cad_veiculos.php";

                                                    </SCRIPT>
                                                    <?php

                                                    break;
                                                /////FIM///////ALTERAR VEICULO PAGINA CADASTRO////////////////////////////////


                                                //////////////CADASTRA EQUIPE DO VEICULO////////////////////////////////

                                                case 'cadastra_equipe_veiculo':


                                                //CONTROLE PASSO

                                                $query_where = "UPDATE passo SET ok='yes' WHERE id='3'";
                                                $rs_where = mysql_query($query_where);

                                                $query_where1 = "UPDATE passo SET ok='no' WHERE (id='4' OR id='5')";
                                                $rs_where1 = mysql_query($query_where1);

                                                $zoom = $_POST["zoom1"];
                                                $z = $_POST["zoom_x1"];


                                                $cor_veiculo = $_POST["type_icon"];
                                                $tipo = $_POST["tipo"];

                                                $id = $_POST["id_veiculo"];
                                                $peso = $_POST["peso"];
                                                $volume = $_POST["volume"];
                                                $valor = $_POST["valor"];

                                                $peso2 = $_POST["peso2"];
                                                $volume2 = $_POST["volume2"];
                                                $valor2 = $_POST["valor2"];


                                                $equipe_poligono = $_POST["equipe_poligono"];
                                                $veiculo_tira = $_POST["veiculo_tira"];
                                                $veiculo_tira_peso = $_POST["peso_veiculo_tira"];
                                                $veiculo_tira_volume = $_POST["volume_veiculo_tira"];
                                                $veiculo_tira_valor = $_POST["valor_veiculo_tira"];

                                                $endereco_cliente = $_POST["endereco_cliente"];
                                                //echo $endereco_cliente;

                                                $iparr = split("\,", $equipe_poligono);
                                                $tamanha_array = count($iparr);
                                                $iparr1 = split("\,", $veiculo_tira);
                                                $tamanha_array1 = count($iparr1);
                                                $iparr2 = split("\,", $veiculo_tira_peso);
                                                $iparr3 = split("\,", $veiculo_tira_volume);
                                                $iparr4 = split("\,", $veiculo_tira_valor);
                                                $iparr5 = split("\,", $endereco_cliente);

                                                $conta_peso_paratirar = 0;
                                                $conta_volume_paratirar = 0;
                                                $conta_valor_paratirar = 0;


                                                ?>

                                                <body bgcolor="#000000">


                                                <div style="height:100px; background-color:#000000; width:400px; position: relative; left: 50%; top: 50%; margin-left:-200px; margin-top:-50px">
                                                    <div id="progress"
                                                         style="position: absolute; left: 28px; top: 28px; width: 342px; height: 40px; background-color: #6f99d6; layer-background-color: #6f99d6; border: 1px none #000000; font-family:Arial, 'Helvetica Neue', Helvetica, sans-serif; font-size:12px">


                                                        <?php


                                                        for ($y = 0; $y < $tamanha_array1; $y++) {

//// LOADING 0 A 100% ////////////////////////////////////////////////////
                                                            $pega_loading = intval(($y / $tamanha_array1) * 100) . "%";

                                                            echo "<div style='position:absolute;margin:0px 0px 0px 0px;width:$pega_loading;height:40px;background:#2867b2;color:#2867b2;color: #FFFFFF;text-align:center;line-height:40px;'>$pega_loading</div>";
                                                            flush();
                                                            ob_flush();

//// LOADING 0 A 100% ////////////////////////////////////////////////////


                                                            $query_busca = "select * from veiculos where id='$iparr1[$y]'";
                                                            $rs_busca = mysql_query($query_busca);

                                                            while ($row_busca = mysql_fetch_array($rs_busca)) {
                                                                $peso_total_busca = $row_busca["peso_total"];
                                                                $volume_total_busca = $row_busca["volume_total"];
                                                                $valor_total_busca = $row_busca["valor_total"];
                                                            }

                                                            $conta_peso_paratirar = $peso_total_busca - $iparr2[$y];
                                                            $conta_volume_paratirar = $volume_total_busca - $iparr3[$y];
                                                            $conta_valor_paratirar = $valor_total_busca - $iparr4[$y];

                                                            if ($conta_peso_paratirar == 0.00 and $conta_volume_paratirar == 0.00 and $conta_valor_paratirar == 0.00) {
                                                                $query6 = "UPDATE veiculos SET peso_total='$conta_peso_paratirar', volume_total='$conta_volume_paratirar', valor_total='$conta_valor_paratirar', equipe=null, ocupado='0' WHERE id = '$iparr1[$y]'";

                                                                $rs6 = mysql_query($query6);
                                                            }
                                                            $query6 = "UPDATE veiculos SET peso_total='$conta_peso_paratirar', volume_total='$conta_volume_paratirar', valor_total='$conta_valor_paratirar' WHERE id = '$iparr1[$y]'";

                                                            $rs6 = mysql_query($query6);
                                                        }


                                                        /* update cliente */
                                                        for ($a = 0; $a < $tamanha_array; $a++) {

                                                            $query3 = "UPDATE clientes SET veiculo='$id', ocupado='1' WHERE codigo_cliente = '$iparr[$a]' AND codigo='$iparr5[$a]'";
                                                            $rs3 = mysql_query($query3);

                                                        }


                                                        $query = "select * from veiculos where id='$id'";
                                                        $rs = mysql_query($query);
                                                        while ($row = mysql_fetch_array($rs)) {
                                                            $nome = $row["nome"];
                                                            $query2 = "UPDATE veiculos SET equipe='yes', poligono='$valor_poligono', peso_total='$peso', volume_total='$volume', valor_total='$valor', ocupado='1' WHERE id = '$id'";
                                                            $rs2 = mysql_query($query2);
                                                        }
                                                        //numero de pedidos
                                                        $query_qtd = "select * from clientes where veiculo='$id'";
                                                        $rs_qtd = mysql_query($query_qtd);
                                                        $num_rows = mysql_num_rows($rs_qtd);
                                                        // numero de visitas

                                                        $query_qtd1 = "select * from clientes where veiculo='$id' group by codigo_cliente";
                                                        $rs_qtd1 = mysql_query($query_qtd1);
                                                        $num_rows1 = mysql_num_rows($rs_qtd1);

                                                        $result_peso = $peso2 - $peso;
                                                        $result_volume = $volume2 - $volume;
                                                        $result_valor = $valor2 - $valor;
                                                        //$cor_veiculo = $row["type_icon"];

                                                        $porcentagem_peso = ($peso / $peso2) * 100;
                                                        $porcentagem_volume = ($volume / $volume2) * 100;
                                                        $porcentagem_valor = ($valor / $valor2) * 100;


                                                        ?>
                                                    </div>
                                                </div>
                                                <SCRIPT language="JavaScript">
                                                    //alert("Visitas cadastrada com sucesso!");

                                                    window.location.href = "step3.php?nome=<?=$nome ?>&peso=<?=$peso2 ?>&tipo=<?=$tipo ?>&volume=<?=$volume2 ?>&valor=<?=$valor2 ?>&id=<?=$id ?>&result_peso=<?=$result_peso ?>&result_volume=<?=$result_volume ?>&result_valor=<?=$result_valor ?>&porc_peso=<?=$porcentagem_peso ?>&porc_volume=<?=$porcentagem_volume ?>&porc_valor=<?=$porcentagem_valor ?>&corveiculo=<?=$cor_veiculo?>&numero=<?=$num_rows?>&numero_visitas=<?=$num_rows1?>&zoom=<?=$zoom ?>&z=<?=$z ?>";

                                                </SCRIPT>
                                                <?php

                                                break;
                                                ////////////// CADASTRA EQUIPE DO VEICULO////////////////////////////////


                                                //////////////CADASTRA EQUIPE DO VEICULO LIVRE ????? ////////////////////////////////

                                                case 'cadastra_equipe_veiculo_novo':


                                                //CONTROLE PASSO /////////////////

                                                $query_where = "UPDATE passo SET ok='yes' WHERE id='3'";
                                                $rs_where = mysql_query($query_where);

                                                $query_where1 = "UPDATE passo SET ok='no' WHERE (id='4' OR id='5')";
                                                $rs_where1 = mysql_query($query_where1);

                                                //////////////////////////////////
                                                $zoom = $_POST["zoom"];
                                                $z = $_POST["zoom_x"];

                                                $cor_veiculo = $_POST["type_iconx"];
                                                $tipo = $_POST["tipox"];

                                                $id = $_POST["id_veiculox"];
                                                $peso = $_POST["pesox"];
                                                $volume = $_POST["volumex"];
                                                $valor = $_POST["valorx"];

                                                $peso2 = $_POST["peso2x"];
                                                $volume2 = $_POST["volume2x"];
                                                $valor2 = $_POST["valor2x"];

                                                $peso_existente = $_POST["peso_existente"];
                                                $volume_existente = $_POST["volume_existente"];
                                                $valor_existente = $_POST["valor_existente"];


                                                $equipe_poligono = $_POST["equipe_poligonox"];
                                                $veiculo_tira = $_POST["veiculo_tirax"];
                                                $veiculo_tira_peso = $_POST["peso_veiculo_tirax"];
                                                $veiculo_tira_volume = $_POST["volume_veiculo_tirax"];
                                                $veiculo_tira_valor = $_POST["valor_veiculo_tirax"];

                                                $endereco_cliente = $_POST["endereco_clientex"];

                                                $iparr = split("\,", $equipe_poligono);
                                                $tamanha_array = count($iparr);
                                                $iparr1 = split("\,", $veiculo_tira);
                                                $tamanha_array1 = count($iparr1);
                                                $iparr2 = split("\,", $veiculo_tira_peso);
                                                $iparr3 = split("\,", $veiculo_tira_volume);
                                                $iparr4 = split("\,", $veiculo_tira_valor);
                                                $iparr5 = split("\,", $endereco_cliente);

                                                $conta_peso_paratirar = 0;
                                                $conta_volume_paratirar = 0;
                                                $conta_valor_paratirar = 0;

                                                ?>

                                                <body bgcolor="#000000">


                                                <div style="height:100px; background-color:#000000; width:400px; position: relative; left: 50%; top: 50%; margin-left:-200px; margin-top:-50px">
                                                    <div id="progress"
                                                         style="position: absolute; left: 28px; top: 28px; width: 342px; height: 40px; background-color: #6f99d6; layer-background-color: #6f99d6; border: 1px none #000000; font-family:Arial, 'Helvetica Neue', Helvetica, sans-serif; font-size:12px">


                                                        <?php


                                                        for ($y = 0; $y < $tamanha_array1; $y++) {

//// LOADING 0 A 100% ////////////////////////////////////////////////////
                                                            $pega_loading = intval(($y / $tamanha_array1) * 100) . "%";

                                                            echo "<div style='position:absolute;margin:0px 0px 0px 0px;width:$pega_loading;height:40px;background:#2867b2;color:#2867b2;color: #FFFFFF;text-align:center;line-height:40px;'>$pega_loading</div>";
                                                            flush();
                                                            ob_flush();

//// LOADING 0 A 100% ////////////////////////////////////////////////////


                                                            $query_busca = "select * from veiculos where id='$iparr1[$y]'";
                                                            $rs_busca = mysql_query($query_busca);

                                                            while ($row_busca = mysql_fetch_array($rs_busca)) {
                                                                $peso_total_busca = $row_busca["peso_total"];
                                                                $volume_total_busca = $row_busca["volume_total"];
                                                                $valor_total_busca = $row_busca["valor_total"];
                                                            }


                                                            $conta_peso_paratirar = $peso_total_busca - $iparr2[$y];
                                                            $conta_volume_paratirar = $volume_total_busca - $iparr3[$y];
                                                            $conta_valor_paratirar = $valor_total_busca - $iparr4[$y];

//echo $conta_peso_paratirar . "<br>";
//echo $conta_volume_paratirar . "<br>";
//echo $conta_valor_paratirar . "<br>";

                                                            if ($id == $iparr1[$y]) {
                                                                $peso_existente = $peso_existente - $iparr2[$y];
                                                                $volume_existente = $volume_existente - $iparr3[$y];
                                                                $valor_existente = $valor_existente - $iparr4[$y];
                                                            }


                                                            if ($conta_peso_paratirar == 0.00 and $conta_volume_paratirar == 0.00 and $conta_valor_paratirar == 0.00) {
                                                                $query6 = "UPDATE veiculos SET peso_total='$conta_peso_paratirar', volume_total='$conta_volume_paratirar', valor_total='$conta_valor_paratirar', equipe=null, ocupado='0' WHERE id = '$iparr1[$y]'";

                                                                $rs6 = mysql_query($query6);
                                                            }


                                                            $query6 = "UPDATE veiculos SET peso_total='$conta_peso_paratirar', volume_total='$conta_volume_paratirar', valor_total='$conta_valor_paratirar' WHERE id = '$iparr1[$y]'";

                                                            $rs6 = mysql_query($query6);

                                                        }
                                                        //echo $id . "<br>";
                                                        //echo $peso . "<br>";
                                                        //echo $volume . "<br>";
                                                        //echo $valor . "<br>";

                                                        //echo $peso_existente . "<br>";
                                                        //echo $volume_existente . "<br>";
                                                        //echo $valor_existente . "<br>";


                                                        //echo $equipe_poligono . "<br>";
                                                        //echo $veiculo_tira . "<br>";
                                                        //echo $veiculo_tira_peso . "<br>";
                                                        //echo $veiculo_tira_volume . "<br>";
                                                        //echo $veiculo_tira_valor . "<br>";

                                                        //echo $endereco_cliente . "<br>";

                                                        /* update cliente */


                                                        for ($a = 0; $a < $tamanha_array; $a++) {

                                                            $query3 = "UPDATE clientes SET veiculo='$id', ocupado='1' WHERE codigo_cliente = '$iparr[$a]' AND codigo='$iparr5[$a]'";
                                                            $rs3 = mysql_query($query3);

                                                        }

                                                        //$peso1 = 0;
                                                        //$volume1 = 0;
                                                        //$valor1 = 0;


                                                        $peso1 = $peso + $peso_existente;
                                                        $volume1 = $volume + $volume_existente;
                                                        $valor1 = $valor + $valor_existente;

                                                        //echo "<br><br><br><br><br>";
                                                        //echo $peso_existente . "<br>";
                                                        //echo $volume_existente . "<br>";
                                                        //echo $valor_existente . "<br>";

                                                        $query = "select * from veiculos where id='$id'";
                                                        $rs = mysql_query($query);

                                                        while ($row = mysql_fetch_array($rs)) {
                                                            $nome = $row["nome"];
                                                            $query2 = "UPDATE veiculos SET equipe='yes', poligono='$valor_poligono', peso_total='$peso1', volume_total='$volume1', valor_total='$valor1', ocupado='1' WHERE id = '$id'";
                                                            $rs2 = mysql_query($query2);
                                                        }

                                                        $query_qtd = "select * from clientes where veiculo='$id'";
                                                        $rs_qtd = mysql_query($query_qtd);

                                                        $num_rows = mysql_num_rows($rs_qtd);

                                                        $result_peso = $peso2 - $peso;
                                                        $result_volume = $volume2 - $volume;
                                                        $result_valor = $valor2 - $valor;
                                                        //$cor_veiculo = $row["type_icon"];

                                                        $porcentagem_peso = ($peso / $peso2) * 100;
                                                        $porcentagem_volume = ($volume / $volume2) * 100;
                                                        $porcentagem_valor = ($valor / $valor2) * 100;

                                                        //echo $zoom;

                                                        ?>
                                                    </div>
                                                </div>
                                                <SCRIPT language="JavaScript">
                                                    //alert("Visitas cadastrada com sucesso!");

                                                    window.location.href = "step3.php?zoom=<?=$zoom ?>&z=<?=$z ?>";

                                                </SCRIPT>
                                                <?php

                                                break;
                                                //////////////CADASTRA EQUIPE DO VEICULO ????? ////////////////////////////////


                                                //////////////CADASTRA ROTA ////////////////////////////////
                                                case 'cadastra_rotas':

                                                $query_where = "UPDATE passo SET ok='yes' WHERE id='5'";
                                                $rs_where = mysql_query($query_where);


                                                $id_cliente = $_POST["xxx"];
                                                $ordem = $_POST["yyy"];
                                                $id_veiculo = $_POST["zzz"];
                                                $distancia = $_POST["qqq"];
                                                $tempo = $_POST["kkk"];
                                                $qual_rota = $_POST["www"];
                                                $qual_pedido = $_POST["eee"];

                                                ///////////////////////////////////
                                                $distancia_total = $_POST["ultimao"];
                                                $veiculo_total = $_POST["ultimao_2"];
                                                $tempo_total = $_POST["ultimao_3"];
                                                ///////////////////////////////////

                                                $i_distancia_total = split("\,", $distancia_total);
                                                $i_veiculo_total = split("\,", $veiculo_total);
                                                $i_tempo_total = split("\,", $tempo_total);

                                                $tamanha_xxx = count($i_veiculo_total);

                                                for ($w = 0; $w < $tamanha_xxx; $w++) {

                                                    $query_veiculos = "UPDATE veiculos SET distancia_total='$i_distancia_total[$w]', tempo_total='$i_tempo_total[$w]' WHERE id = '$i_veiculo_total[$w]'";
                                                    $rs_veiculos = mysql_query($query_veiculos);


                                                }


                                                $i_id_cliente = split("\,", $id_cliente);
                                                $i_ordem = split("\,", $ordem);
                                                $i_id_veiculo = split("\,", $id_veiculo);
                                                $i_distancia = split("\,", $distancia);
                                                //echo $i_distancia;
                                                $i_tempo = split("\,", $tempo);

                                                $i_rota = split("\,", $qual_rota);

                                                $i_codpedido = split("\,", $qual_pedido);


                                                $tamanha_array = count($i_id_cliente);

                                                //echo $tamanha_array;


                                                ?>

                                                <body bgcolor="#000000">


                                                <div style="height:100px; background-color:#000000; width:400px; position: relative; left: 50%; top: 50%; margin-left:-200px; margin-top:-50px">
                                                    <div id="progress"
                                                         style="position: absolute; left: 28px; top: 28px; width: 342px; height: 40px; background-color: #6f99d6; layer-background-color: #6f99d6; border: 1px none #000000; font-family:Arial, 'Helvetica Neue', Helvetica, sans-serif; font-size:12px">


                                                        <?php


                                                        for ($y = 0; $y < $tamanha_array; $y++) {

//// LOADING 0 A 100% ////////////////////////////////////////////////////
                                                            $pega_loading = intval(($y / $tamanha_array) * 100) . "%";

                                                            echo "<div style='position:absolute;margin:0px 0px 0px 0px;width:$pega_loading;height:40px;background:#2867b2;color:#2867b2;color: #FFFFFF;text-align:center;line-height:40px;'>$pega_loading</div>";
                                                            flush();
                                                            ob_flush();

//// LOADING 0 A 100% ////////////////////////////////////////////////////


                                                            //$kms = $i_distancia;

                                                            $somadata_rota = time("d-m-Y H");
                                                            $somadata_rota = 'R' . str_pad($i_rota[$y], 2, '0', STR_PAD_LEFT) . substr($somadata_rota, 0, -5);

                                                            $query3 = "UPDATE rotas SET veiculo='$i_id_veiculo[$y]', nome_rota='$somadata_rota', ordem='$i_ordem[$y]', distancia='$i_distancia[$y]', tempo='$i_tempo[$y]' WHERE codigo_pedido='$i_codpedido[$y]' AND codigo_cliente = '$i_id_cliente[$y]'";
                                                            $rs3 = mysql_query($query3);
                                                        }

                                                        ?>
                                                    </div>
                                                </div>
                                                <SCRIPT language="JavaScript">
                                                    //alert("Visitas cadastrada com sucesso!");

                                                    window.location.href = "step5.php";

                                                </SCRIPT>
                                                <?php


                                                break;
                                                ////////////// CADASTRA ROTA ////////////////////////////////


                                                }
                                                ?>
