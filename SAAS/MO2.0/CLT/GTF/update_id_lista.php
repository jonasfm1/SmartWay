<?php
include ('session.php');
include ('conecta.php');
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>UPDATE ID LISTAS</title>
</head>

<body>


    <?php
    $inicio = microtime(true);

    $query_busca = "select * from listas";															
    $rs_busca = mysql_query($query_busca);
    
    while($row_busca = mysql_fetch_array($rs_busca)){

        $id= $row_busca["id"];
        $nome= $row_busca["nome"];

        $query_acessos1 = "UPDATE rotas SET id_lista=$id where lista='$nome'";
        $query_acessos1 = mysql_query($query_acessos1);
    }

    $total = microtime(true) - $inicio;
    echo "Tempo de execução do script com índice: $total <br>";

    ?>

</body>

</html>