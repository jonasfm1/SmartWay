<?php
////////////////////////////INICIANDO PHPEXEL INCLUIDO ARQUIVO DE CONEXAO E SESSAO/////////////////////////////////////
require 'vendor/autoload.php';
include('essence/conecta.php');
include('session.php');
ini_set('max_execution_time', 12000);

////////////////////////////INICIANDO CLASES PHPSPREEDSHEET & CLASS XLSX PARA CRIAR UM ARQUIVO XLSX ///////////////////
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();

$totVeiculo = "SELECT veiculo FROM remontar GROUP BY veiculo";
$execTotVeiculo = mysql_query($totVeiculo);
$quantosExec = mysql_num_rows($execTotVeiculo);

$arrVeiculo=[];
$arrCheckVeiculo=[];

while($pegaVeiculo = mysql_fetch_array($execTotVeiculo)){
    $veiculos = $pegaVeiculo['veiculo'];
    array_push($arrVeiculo, $veiculos);
    array_push($arrCheckVeiculo, $veiculos);
}

//echo "Resposta Agrupada: ".$quantosExec."<br/>" ;

$agoravai = "REMONTAR";
$row = 2; // 1-based index
$linha = 0;

for($registro = 0; $registro < $quantosExec; $registro++){

    $cell_cab = "A1:X1";
    $spreadsheet->getActiveSheet()->getStyle($cell_cab)->getFont()->setBold( true );                //NEGRITO NA FONTE
    
    $spreadsheet->getActiveSheet()->getStyle('A1')
    ->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);  //ALINHAR NO CENTRO

    $sheet->setCellValue('A1','N.NOTA')
    ->setCellValue('B1', 'SERIE')
    ->setCellValue('C1', 'PESO')
    ->setCellValue('D1', 'VOLUME')
    ->setCellValue('E1', 'VALOR')
    ->setCellValue('F1', 'DT.FATURAMENTO')
    ->setCellValue('G1', 'CNPJ.RMT')
    ->setCellValue('H1', 'NOME.RMT')
    ->setCellValue('I1', 'CNPJ.CLI')
    ->setCellValue('J1', 'NOME.CLI')
    ->setCellValue('K1', 'CID.CLI')
    ->setCellValue('L1', 'END.CLI')
    ->setCellValue('M1', 'N.CLI')
    ->setCellValue('N1', 'BAIRRO')
    ->setCellValue('O1', 'ESTADO')
    ->setCellValue('P1', 'CEP.CLI')
    ->setCellValue('Q1', 'CNPJ.TRANSP')
    ->setCellValue('R1', 'NOME.TRANSP')
    ->setCellValue('S1', 'CID.TRANSP')
    ->setCellValue('T1', 'END.TRANSP')
    ->setCellValue('U1', 'N.TRANSP')
    ->setCellValue('V1', 'BAIRRO')
    ->setCellValue('W1', 'UF.TRANSP')
    ->setCellValue('X1', 'CEP.TRANSP')
    ->setCellValue('Y1', 'NFE');
    

    while($arrVeiculo[$linha] == $arrCheckVeiculo[$registro]){
     
        //echo $arrVeiculo[$linha]."<br/>";
        $totRotas = "SELECT * FROM remontar WHERE veiculo = $arrVeiculo[$linha] ORDER BY veiculo";
        $execTotRotas = mysql_query($totRotas);
        $contador = mysql_num_rows($execTotRotas);
        
        while($pegatd = mysql_fetch_assoc($execTotRotas)){
            
            //echo "10".$arrVeiculo[$linha] . "\n";
            $col = 0;
            foreach ($pegatd as $key => $value) {
                
                if ($col < 25) {
                    $col++;
                    $sheet->setCellValueByColumnAndRow($col, $row, $value);
                   
                }
               
            }
            
            $row++;
            
        }
        $linha++;

    }
}
$spreadsheet->getActiveSheet()->insertNewRowBefore($row, 1);

$sheet->setTitle("$agoravai");

$writer = new Xlsx($spreadsheet);
$data = "ROTAS_" . date("d-m-Y_H_i_s");
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
header('Content-Disposition: attachment; filename="' . basename($juntae) . '";');
header('Content-Transfer-Encoding: binary');
header('Content-Length: ' . filesize($juntae));
readfile($juntae);