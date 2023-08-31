<?php

require 'PHPExcel/IOFactory.php';

//Mysql database
$servername = "localhost";
$username = "root";
$password = "HtMQZhAwCNzeaAfT";
$dbname = "ro_slt";

$conn = mysqli_connect($servername, $username, $password, $dbname);

//if (!$conn) {
//    die("Connection failed: " . mysqli_connect_error());
//}

if(isset($_POST['submit'])){
    $inputfilename = $_FILES['filename']['tmp_name'];
    $exceldata = array();



try {
    $inputfiletype = PHPExcel_IOFactory::identify($inputfilename);
    $objReader = PHPExcel_IOFactory::createReader($inputfiletype);
    $objPHPExcel = $objReader->load($inputfilename);
}


catch(Exception $e) {
    die('Error loading file"' . pathinfo($inputfilename, PATHINFO_BASENAME) . '": ' . $e->getMessage());
}


$sheet = $objPHPExcel->getSheet(0);
$highestRow = $sheet->getHighestRow();
$highestColumn = $sheet->getHighestColumn();


for ($row = 2; $row <= $highestRow; $row++)
{

    $rowData = $sheet->rangeToArray('A' . $row . ':' . $highestColumn . $row, NULL, TRUE, FALSE);


    $sql = "INSERT INTO clientes(codigo_pedido, lote, vendedor, setor, nome, endereco, bairro, cep, cidade, peso, valor, filial, desc_praca, obs_pedido, codigo_cliente) VALUES ('".$rowData[0][0]."',
     '".$rowData[0][1]."', '".$rowData[0][2]."', '".$rowData[0][3]."','".$rowData[0][4]."', '".$rowData[0][5]."', '".$rowData[0][6]."', '".$rowData[0][7]."', '".$rowData[0][8]."',
      '".$rowData[0][9]."', '".$rowData[0][10]."', '".$rowData[0][11]."', '".$rowData[0][12]."', '".$rowData[0][13]."', '".$rowData[0][14]."')";

    if (mysqli_query($conn, $sql)) {
        $exceldata[] = $rowData[0];
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}


echo "<table border='1'>";
foreach ($exceldata as $index => $excelraw)
{
    echo "<tr>";
    foreach ($excelraw as $excelcolumn)
    {
        echo "<td>".$excelcolumn."</td>";
    }
    echo "</tr>";
}
echo "</table>";

mysqli_close($conn);
}
?>
<html>
<head>

	<title>Importar Excel</title>



</head>
<body>
	
        <form action="" method="POST" enctype="multipart/form-data">

            <p></p><input type="file" name="filename"  ></p>

            <input type="submit" name='submit' value="AVANCAR" >

        </form>



</body>


</body>
</html>
