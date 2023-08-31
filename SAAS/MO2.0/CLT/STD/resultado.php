<?php
include ('session.php');
include ('conecta.php');

if(isset($_POST['acao']) && $_POST['acao'] == "filtrar"){

    if(!empty($_POST['lang0pt'])) {
        $campo = $_POST['lang0pt'];
        $string = '"' . implode('","', $campo) . '"';

        $pega = "SELECT * FROM usuario WHERE login IN ($string) ";


        $lista = mysql_query($pega);
        $conta_lista = count($campo);

        $cont = 0;
        while ($row = mysql_fetch_array($lista)) {
            $nome = $row["login"];
         //   $idade = $row["coordenador"];
         //   $prof = $row["ultimo_acesso"];

            echo ($nome). "<br>";

            $cont ++;
        };

        echo"<a href='filtro.php'>voltar<a/>";
    }   else {
		
        echo "<center>Por Favor Selecione Um Colaboradores.</center>";
        echo"<a href='filtro.php'>voltar<a/>";
    }
	
	
	
	
	   if(!empty($_POST['lang0pt1'])) {
        $campo1 = $_POST['lang0pt1'];
        $string1 = '"' . implode('","', $campo1) . '"';

        $pega1 = "SELECT * FROM rotas WHERE lista IN ($string1)";

//echo $pega1;
        $lista1 = mysql_query($pega1);
        $conta_lista1 = count($campo1);

        $cont1 = 0;
        while ($row1 = mysql_fetch_array($lista1)) {
            $nome1 = $row1["idcliente"];
           
//echo "teste";
            echo ($nome1). "<br>";

            $cont1 ++;
        };

        echo"<a href='filtro.php'>voltar<a/>";
    } else {
        echo "<center>Por Favor Selecione uma lista.</center>";
        echo"<a href='filtro.php'>voltar<a/>";
    }
	
	
	
	   if(!empty($_POST['lang0pt2'])) {
        $campo2 = $_POST['lang0pt2'];
        $string2 = '"' . implode('","', $campo2) . '"';

        $pega2 = "SELECT * FROM rotas WHERE rota IN ($string2)";

//echo $pega1;
        $lista2 = mysql_query($pega2);
        $conta_lista2 = count($campo2);

        $cont2 = 0;
        while ($row2 = mysql_fetch_array($lista2)) {
            $nome2 = $row2["idcliente"];
           
//echo "teste";
            echo ($nome2). "<br>";

            $cont2 ++;
        };

        echo"<a href='filtro.php'>voltar<a/>";
    } else {
        echo "<center>Por Favor Selecione uma rota.</center>";
        echo"<a href='filtro.php'>voltar<a/>";
    }
	
	
	
	
}


/*<?php
include'conect.php';

if(isset($_POST['acao']) && $_POST['acao'] == "filtrar"){

    if(!empty($_POST['lang0pt'])) {
        $campo = $_POST['lang0pt'];
        $conta_lista = count($campo);

        for ($i = 0; $i <= $conta_lista; $i++) {
            $pega = "SELECT * FROM usuario WHERE nome ='$campo[$i]' ";

        $lista = mysql_query($pega);
        while ($row = mysql_fetch_array($lista)) {
            $nome = $row["nome"];
            $idade = $row["idade"];
            $prof = $row["profissao"];
            echo ($nome) . " " . ($idade) . " " . $prof . "<br>";
        };

        }
        echo"<a href='filtro.php'>voltar<a/>";
    }
    else{
        echo "<center>Por Favor Selecione Um Colaboradores.</center>";
        echo"<a href='filtro.php'>voltar<a/>";
    }
}*/
