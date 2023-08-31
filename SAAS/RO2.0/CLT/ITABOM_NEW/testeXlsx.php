<?php
//call the autoload
require 'vendor/autoload.php';


include ('essence/conecta.php');
include ('session.php'); 
ini_set('max_execution_time',12000);

//load phpspreadsheet class using namespaces
use PhpOffice\PhpSpreadsheet\Spreadsheet;
//call xlsx writer class to make an xlsx file
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

//make a new spreadsheet object
$spreadsheet = new Spreadsheet();
//get current active sheet (first sheet)
$sheet = $spreadsheet->getActiveSheet();
//set the value of cell a1 to "Hello World!"
$sheet->setCellValue('A1', 'COD.PEDIDO');
$sheet->setCellValue('B1', 'VEICULO');




$sql = "SELECT * FROM rotas order by nome_rota, ordem ASC";
$result = mysql_query($sql);

$row = 2; // 1-based index
while($row_data = mysql_fetch_assoc($result)) {
    $col = 0;
    foreach($row_data as $key=>$value) {
		
		
		if($col<=1){
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
