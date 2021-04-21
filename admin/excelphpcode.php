<?php

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Reader\Csv;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
include_once "../excl/vendor/autoload.php";
include_once('connect.php');
if(isset($_POST["addorgtype"]))
{
    $file_mimes = array('text/x-comma-separated-values', 'text/comma-separated-values', 'application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'text/plain', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');


    if (in_array($_FILES["orgname"]["type"], $file_mimes)) {

        $targetPath = '../uploads/' . $_FILES['orgname']['name'];
        move_uploaded_file($_FILES['orgname']['tmp_name'], $targetPath);
        $arr_file = explode('.', $_FILES['orgname']['name']);
        $extension = end($arr_file);
        if("csv"==$extension){
            $Reader = new \PhpOffice\PhpSpreadsheet\Reader\Csv();
        }else{
            $Reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
        }
        $spreadSheet = $Reader->load($targetPath);
        $excelSheet = $spreadSheet->getActiveSheet();
        $spreadSheetAry = $excelSheet->toArray();
        $sheetCount = count($spreadSheetAry);

        for ($i = 1; $i < $sheetCount; $i ++) {
            $ortype=$spreadSheetAry[$i][0];
            $orname=$spreadSheetAry[$i][1];
            $orphone=$spreadSheetAry[$i][2];
            $oraddress=$spreadSheetAry[$i][3];
           $orcode=$spreadSheetAry[$i][4];
            $orfirstline=$spreadSheetAry[$i][5];
             $orcity=$spreadSheetAry[$i][6];
             $orpost=$spreadSheetAry[$i][7];
            
            $q=mysqli_query($con,"SELECT * FROM `organisation_type`");
            if(mysqli_num_rows($q)> 0){
            $qr=mysqli_query($con,"SELECT * FROM `organisation_type` where ort_name ='$ortype'"); 
            if(mysqli_num_rows($qr) > 0){
                mysqli_query($con,"INSERT INTO `orginzation`(`or_type`, `or_name`, `or_phone`, `or_address`, `or_code`, `or_firstaddress`, `or_city`, `or_postcode`, `status`) VALUES ('$ortype','$orname','$orphone','$oraddress','$orcode','$orfirstline','$orcity','$orpost','Approved')");
            }else{
                mysqli_query($con,"INSERT INTO `organisation_type`(`ort_name`) VALUES ('$ortype')");
                 mysqli_query($con,"INSERT INTO `orginzation`(`or_type`, `or_name`, `or_phone`, `or_address`, `or_code`, `or_firstaddress`, `or_city`, `or_postcode`, `status`) VALUES ('$ortype','$orname','$orphone','$oraddress','$orcode','$orfirstline','$orcity','$orpost','Approved')");
            }
            }else{
                mysqli_query($con,"INSERT INTO `organisation_type`(`ort_name`) VALUES ('$ortype')");
             mysqli_query($con,"INSERT INTO `orginzation`(`or_type`, `or_name`, `or_phone`, `or_address`, `or_code`, `or_firstaddress`, `or_city`, `or_postcode`, `status`) VALUES ('$ortype','$orname','$orphone','$oraddress','$orcode','$orfirstline','$orcity','$orpost','Approved')");
                          
                
            }
        }
     echo "success";
        
    } else {
        $type = "error";
        $message = "Invalid File Type. Upload Excel File.";
    }
}
?>