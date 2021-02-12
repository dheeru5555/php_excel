<?php
include 'spreadsheet/vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

$spreadsheet = new Spreadsheet();
$Excel_writer = new Xlsx($spreadsheet);
$spreadsheet->setActiveSheetIndex(0);
$activeSheet = $spreadsheet->getActiveSheet();

// Code for describing Cell in EXCEL

$activeSheet->setCellValue('A1', 'First Name');
$activeSheet->setCellValue('B1', 'Last Name');
$activeSheet->setCellValue('C1', 'Email');
$activeSheet->setCellValue('D1', 'Birth Date');
$activeSheet->setCellValue('E1', 'Record Date');

// Code for displying data of Database
$connect = mysqli_connect("localhost","root","","php_excel");
$query = "SELECT * FROM excel_data";
$statement = mysqli_query($connect,$query);
if(mysqli_num_rows($statement) > 0) {
    $i = 2;
    while($row = mysqli_fetch_assoc($statement)) {
        $activeSheet->setCellValue('A'.$i , $row['first_name']);
        $activeSheet->setCellValue('B'.$i , $row['last_name']);
        $activeSheet->setCellValue('C'.$i , $row['email']);
        $activeSheet->setCellValue('D'.$i , $row['birthdate']);
        $activeSheet->setCellValue('E'.$i , $row['added']);
        $i++;
    }
}
// $filename = 'ExcelData.xlsx'; 
// Code for generating random name for file
$n=5; 
function getName($n) { 
    $characters = 'abcef'; 
    $randomString = ''; 
  
    for ($i = 0; $i < $n; $i++) { 
        $index = rand(0, strlen($characters) - 1); 
        $randomString .= $characters[$index]; 
    } 
    return $randomString; 
} 
$data = getName($n); 
$filename = $data.'.xls';
// Header code of PHP
header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment;filename='. $filename);
header('Cache-Control: max-age=0');
 $Excel_writer->save('php://output');

