<?php
//call the autoload
require 'vendor/autoload.php';


include('essence/conecta.php');
include('session.php');
ini_set('max_execution_time', 12000);

//load phpspreadsheet class using namespaces
use PhpOffice\PhpSpreadsheet\Spreadsheet;
//call xlsx writer class to make an xlsx file
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

//make a new spreadsheet object
$spreadsheet = new Spreadsheet();
//get current active sheet (first sheet)
$sheet = $spreadsheet->getActiveSheet();
//set the value of cell a1 to "Hello World!"
$sheet->setCellValue('A1', 'CONFIANÇA');
$sheet->setCellValue('B1', 'COD.CLI.');
$sheet->setCellValue('C1', 'CLIENTE');
$sheet->setCellValue('D1', 'ENDEREÇO.CAD');
$sheet->setCellValue('E1', 'CIDADE');
$sheet->setCellValue('F1', 'BAIRRO');
$sheet->setCellValue('G1', 'UF');
$sheet->setCellValue('H1', 'CEP');
$sheet->setCellValue('I1', 'PESO');
$sheet->setCellValue('J1', 'VOLUME');
$sheet->setCellValue('K1', 'VALOR');
$sheet->setCellValue('L1', 'ENDERECO');
$sheet->setCellValue('M1', 'LATITUDE');
$sheet->setCellValue('N1', 'LONGITUDE');
$sheet->setCellValue('O1', 'CONFIANCA');
$sheet->setCellValue('P1', 'GEO MANUAL');
$sheet->setCellValue('Q1', 'VEICULO');
$sheet->setCellValue('R1', 'ROTERIZADO');
$sheet->setCellValue('S1', 'COD.PEDIDO');


$quem_e = $_GET["lista"];

if($quem_e=="red" or $pega_listagem == ""){
    $sql = "SELECT * from clientes where confianca_cad<=50 OR confianca_cad='' AND roteirizado!='sim' AND  ativo=0  ORDER BY confianca_cad ASC, codigo_cliente";
    //$sql = "SELECT * FROM clientes order by nome ASC";

}
if($quem_e=="orange"){
    $sql = "SELECT * from clientes where confianca_cad>50 AND confianca_cad<=70 AND roteirizado!='sim' AND  ativo=0    ORDER BY confianca_cad ASC, codigo_cliente";
    //$sql = "SELECT * FROM clientes order by nome ASC";

}
if($quem_e=="green"){
    $sql = "SELECT * from clientes where confianca_cad>70 AND confianca_cad<=100 AND roteirizado!='sim' AND  ativo=0   ORDER BY confianca_cad ASC, codigo_cliente";
    //$sql = "SELECT * FROM clientes order by nome ASC";

}

if($quem_e=="blue"){
    $sql = "SELECT * from clientes where confianca_cad=101 AND roteirizado!='sim'  AND  ativo=0  ORDER BY confianca_cad ASC, codigo_cliente";
    //$sql = "SELECT * FROM clientes order by nome ASC";

}


if($quem_e=="roxo"){
    $sql = "SELECT * from clientes where  ativo=1  AND roteirizado!='sim' ORDER BY confianca_cad ASC, codigo_cliente";
    //$sql = "SELECT * FROM clientes order by nome ASC";

}


$result = mysql_query($sql);

$row = 2; // 1-based index
while($row_data = mysql_fetch_assoc($result)) {
    $col = 0;
    foreach($row_data as $key=>$value) {
		
		
		if($col<=18){
			$col++;
        $spreadsheet->getActiveSheet()->setCellValueByColumnAndRow($col, $row, $value);
		}
		
       
    }
    $row++;
}

//make an xlsx writer object using above spreadsheet
$writer = new Xlsx($spreadsheet);

$data="ROTAS_" . date("d-m-Y_H_i_s");
$exte = $data . '.xlsx';
$juntae = 'uploads/' . $exte;
//write the file in current directory
$writer->save($juntae);
//redirect to the file
header('Pragma: public');
header('Expires: 0');
header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
header('Cache-Control: private', false);
header('Content-Type: application/xlsx');
header("Content-Type: application/download");
header('Content-Disposition: attachment; filename="'. basename($juntae) . '";');
header('Content-Transfer-Encoding: binary');
header('Content-Length: ' . filesize($juntae));
readfile($juntae);