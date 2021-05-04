<?php 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

 require 'phpmailer/autoload.php';
include_once "../vendor/autoload.php";
include_once('../database/db.php');
	
                                $dd=rand().".pdf";
$mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8','format'=>"A4"]);
// $mpdf2 = new \Mpdf\Mpdf();

ob_start();
	$nhsno = $_GET['nhsno'];
	$qref = mysqli_query($con, "SELECT * FROM `tbl_consultantrefferels` JOIN `tbl_patients` ON c_rfid = tbl_patients.pt_id JOIN `services` ON c_serid = services.service_id JOIN `tbl_ruser` ON tbl_ruser.ur_id = tbl_consultantrefferels.c_gpid WHERE c_nhsno = '$nhsno'");
    $dref = mysqli_fetch_assoc($qref);
    		$pid = $_GET['pid'];
    			$serspec = $dref['service_speciality'];
														$sspecq = mysqli_query($con, "SELECT * FROM `ser_specialty_add` WHERE `spec_id` = '$serspec'");
															$serspecdata = mysqli_fetch_assoc($sspecq);
															$cip=$dref["ser_cl_type"];
															$cle=mysqli_query($con,"select * from service_cliniciant WHERE cl_id = '$cip'");
															$cppl=mysqli_fetch_array($cle);
											$sql2 = mysqli_query($con,"SELECT * FROM tbl_patients WHERE pt_id = '$pid'");
											$fetch2 = mysqli_fetch_array($sql2);
											
												$nhsno = $_GET['nhsno'];
													$qref1 = mysqli_query($con, "SELECT * FROM `tbl_consultantrefferels` JOIN `tbl_patients` ON c_rfid = tbl_patients.pt_id JOIN `services` ON c_serid = services.service_id JOIN `tbl_ruser` ON tbl_ruser.ur_id = tbl_consultantrefferels.c_gpid WHERE c_nhsno = '$nhsno'");
													$dref1 = mysqli_fetch_assoc($qref1);
														$refid = $dref1['c_id'];
?><!doctype html>
<html lang="en">
  <head>
    <title>NHS CONFIDENTIAL</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" >
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
  </head>
  <body>
        <center><img src="./images/logo1.png" style="width:200px;height:100px; margin-top:20px;margin-left:32%;"></center>
       <center> <div style="margin-top:20px;margin-left:100px; margin-right:100px; width:60%; border-radius:20px;border:1px solid red;padding:12px;display:flex;">
           <div style="width:50%;text-align:left;float:left;">
               <p><span><b>Referral ID</b> : </span><span><?=$refid?></span></p>
             <p><span><b>Patient Full Name</b> : </span><span><?=ucfirst($fetch2['pt_name']." ".$fetch2["pt_surname"])?></span></p>
              <p><span><b>Patient Date of Birth</b> : </span><span><?php
												$da=date_create($fetch2['pt_dob']);
												echo date_format($da,"m-d-Y");
												
												
												?></span></p>
               <p><span><b>Patient Address</b> :</span><span><?=$fetch2['pt_streetname']?></span></p>
               </div>
           <div style="width:50%;text-align:left;">
               <p><span><b>Speciality</b> : </span><span><?=$serspecdata['spec_name']?></span></p>
                 <p><span><b>Clinic Type</b> : </span><span><?=$cppl['cl_type']?></span></p>
             <p><span><b>Referred By</b> : </span><span><?=ucfirst($dref["ur_fname"]." ".$dref['ur_sname'])?></span></p>
              <p><span><b>Reffered Telephone</b> : </span><span><?=$dref['ur_orgphno']?></span></p>
               <p><span><b>Reffered Address</b> :</span><span><?=$dref["ur_address"]?> <?=$dref["ur_orgaddress"]?></span></p>
               </div>
            
        </div>
        </center>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>

<?php
$headers ='';
$html = ob_get_contents();
ob_end_clean();
$mpdf->autoPageBreak = true;
$mpdf->AddPage();
$mpdf->WriteHTML($html);
$mpdf->Output("../upload/".$dd,"D");



// $pdf='../upload/'.$dd;

// $mail = new PHPMailer();

//   $mail->isSMTP();
//   $mail->Host     = 'smtp.gmail.com';
//   $mail->SMTPAuth = true;
//   $mail->Username = 'deevloopersibrahim@gmail.com';
//   $mail->Password = 'Qureshi18';
//   $mail->SMTPSecure = 'tls';
//   $mail->Port     = 587;

//   $mail->setFrom('deevloopersibrahim@gmail.com', 'Hospital');
//   $mail->addReplyTo('deevloopersibrahim@gmail.com', 'Hospital');
//     $mail->Subject = 'NHS CONFIDENTIAL';

//   // Set email format to HTML
//   $mail->isHTML(true);
//   $mail->Body="<center><h2>NHS CONFIDENTIAL</h2></center> ";
//   // Add a recipient
//   $mail->addAddress($fe["pt_email"]);


// $mail->AddAttachment( $pdf , $dd );
// if(!$mail->Send()){
//   echo 'Message could not be sent.';
//     echo 'Mailer Error: ' . $mail->ErrorInfo;
// }else{
//     header("location:index.php");
// }
?>