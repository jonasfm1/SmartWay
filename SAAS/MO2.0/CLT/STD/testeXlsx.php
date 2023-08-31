<?php
//call the autoload
require 'vendor/autoload.php';
include ('conecta.php');
include ('session.php');

ini_set('max_execution_time',12000);
date_default_timezone_set('Etc/GMT+3');


$string0 = $_GET['login_exp'];
$string1 = $_GET['lista_exp'];
$string3 = $_GET['ocorrencia_exp'];

// so placa
if($string0 != "''" AND $string1 =="''" AND $string3 =="''"){
    
    $query = "select * from rotas where login in($string0) order by login, lista, rota, sequencia, ocorrencia";
    echo "entrou so placa";

}
//so lista
if($string0 =="''" AND $string1 != "''" AND $string3 =="''"){
    
    $query = "select * from rotas where id_lista in($string1) order by login, lista, rota, sequencia, ocorrencia";
   // echo "entrou so lista";
}

// so ocorrencia
if($string0 =="''" AND $string1 =="''" AND $string3 != "''"){
    
    $query = "select * from rotas where status in($string3) order by login, lista, rota, sequencia, ocorrencia";
 //   echo "entrou so ocorrecia";
}

// placa, lista
if($string0 != "''" AND $string1 != "''" AND $string3 =="''"){
    
    $query = "select * from rotas where login in($string0) AND id_lista in($string1) order by login, lista, rota, sequencia, ocorrencia";
  //  echo "entrou placa, lista";
}

// lista, ocorrencia
if($string0 == "''" AND $string1 != "''" AND $string3 !="''"){
    
    $query = "select * from rotas where id_lista in($string1) AND status in($string3) order by login, lista, rota, sequencia, ocorrencia";
 //   echo "entrou lista, ocorrencia";
}


// placa, ocorrencia
if($string0 != "''" AND $string1 == "''" AND $string3 !="''"){
    
    $query = "select * from rotas where login in($string0) AND status in($string3) order by login, lista, rota, sequencia, ocorrencia";
 //   echo "entrou lista, ocorrencia";
}



// placa, lista,ocorrencia
if($string0 != "''" AND $string1 != "''" AND $string3 !="''"){
    
    $query = "select * from rotas where login in($string0) AND id_lista in($string1) AND status in($string3) order by login, lista, rota, sequencia, ocorrencia";
 //   echo "entrou placa, lista, ocorrencia";
}



//so todos vazios

if($string0 =="''" AND $string1 =="''" AND $string3 =="''" ){
    
    $query = "select * from rotas where statusrota=1 order by login, lista, rota, sequencia, ocorrencia";
   // echo "entrou todos vazios";
}


//$query = "select * from rotas where login in($string0)";

$sql = mysql_query($query);


//load phpspreadsheet class using namespaces
use PhpOffice\PhpSpreadsheet\Spreadsheet;
//call xlsx writer class to make an xlsx file
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

//make a new spreadsheet object
$spreadsheet = new Spreadsheet();
//get current active sheet (first sheet)
$sheet = $spreadsheet->getActiveSheet();
//set the value of cell a1 to "Hello World!"
$sheet->setCellValue('A1', 'COD. PEDIDO');
$sheet->setCellValue('B1', 'NOTA FISCAL');
$sheet->setCellValue('C1', 'COD. CLIENTE');
$sheet->setCellValue('D1', 'NOME');
$sheet->setCellValue('E1', 'DATA DA OCORRENCIA');
$sheet->setCellValue('F1', 'OCORRENCIA(E/D)');
$sheet->setCellValue('G1', 'MOTIVO DA DEVOLUCAO');



$result = mysql_query($query);

$row = 2; // 1-based index
while($row_data = mysql_fetch_assoc($result)) {
    $col = 0;
	
		$oco = $row_data["ocorrencia"];
		$obs_oco = $row_data["obs_ocorrencia"];
		$query_qual = "select * from ocorrencia where id=$oco";														
		$query_qual = mysql_query($query_qual);	
		$dados = mysql_fetch_array($query_qual);
		$guarda_oco = $dados['ocorrencia'];

	
	
    foreach($row_data as $key=>$value) {
		
		if($col<=6){
			
		$col++;
			
		if($col!=6 and $col!=7){
			 $spreadsheet->getActiveSheet()->setCellValueByColumnAndRow($col, $row, $value);
		}
       	
		if($col==6){
			
			if($oco==1 or $oco==20){
					$spreadsheet->getActiveSheet()->setCellValueByColumnAndRow($col, $row, "E");			
			} 
			if($oco!=1 and $oco!="" and $oco!=20){
					$spreadsheet->getActiveSheet()->setCellValueByColumnAndRow($col, $row, "D");
			}
		}
			
		if($col==7){
			
			if($oco==1 or $oco==20){
			    $spreadsheet->getActiveSheet()->setCellValueByColumnAndRow($col, $row, "");			
			} else {			
				
				$spreadsheet->getActiveSheet()->setCellValueByColumnAndRow($col, $row, $obs_oco);
			} 
			
		}	
	
		}
		
    }
	
    $row++;
}

//make an xlsx writer object using above spreadsheet
$writer = new Xlsx($spreadsheet);
$data="ROTAS_DIA_" . date("d_m_Y") . "_HORARIO_" . date("H_i_s"). "_" . $nome_status;
$exte = $data . '.xlsx';
$juntae = 'uploads/' . $logado . "/". $exte;
//write the file in current directory
$writer->save($juntae);


header("Location: step2_lista_wo.php");
die();
//exit;
/* Redirect browser */
//redirect to the file
//header('Pragma: public');
//header('Expires: 0');
//header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
//header('Cache-Control: private', false);
//header('Content-Type: application/xlsx');
//header("Content-Type: application/download");
//header('Content-Disposition: attachment; filename="'. basename($juntae) . '";');
//header('Content-Transfer-Encoding: binary');
//header('Content-Length: ' . filesize($juntae));
//readfile($juntae);

?>
