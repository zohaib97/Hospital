<?php 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

 require 'phpmailer/autoload.php';
include_once "../vendor/autoload.php";
include_once('../database/db.php');
	$aid = $_SESSION['gprefferer'];
						$query = mysqli_query($con,"SELECT * FROM `tbl_ruser` WHERE `ur_email` = '$aid'");
						$fetch = mysqli_fetch_array($query);
									$id = $fetch['ur_id'];
									$orid=$fetch["ur_orgtype"];
$ks=mysqli_query($con,"SELECT * FROM `orginzation` where orid ='$orid'");
						$klo=mysqli_fetch_array($ks);
$appid = $_GET['id'];
                                $sql = mysqli_query($con,"SELECT * FROM tbl_serviceappointment,`services`,tbl_patients,ser_specialty_add,app_type,service_cliniciant,service_name where  services.service_speciality=ser_specialty_add.spec_id and services.service_a_type=app_type.app_id  and services.ser_cl_type=service_cliniciant.cl_id   and services.service_name=service_name.s_id and  tbl_patients.pt_id=tbl_serviceappointment.sp_patientid and tbl_serviceappointment.sp_serviceid = services.service_id and sp_id = '$appid'");
                                if(mysqli_num_rows($sql)>0)
                                {
                                    $fe = mysqli_fetch_array($sql);
                                }
                                $dd=$fe["filename"].".pdf";
$mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8','format'=>"A4"]);
// $mpdf2 = new \Mpdf\Mpdf();

ob_start();
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
      <center><h2 style="margin-top:3%;margin-bottom:2%;margin-left:35%">NHS CONFIDENTIAL</h2></center>
      <div style="display:flex;width:90% ;margin:auto;border:1px solid black;padding-top:1%;padding-bottom:1%;">
          <div style="width:70%;float:left"><p style="margin-top:3%;margin-left:2%;">Appointment Request</p></div>
          <div style="width:19%;"><img src="images/logo-3.png" style="width:191px;height:100px;"></div>
      </div>
      <div style="width:90%;margin-top:2%;margin-left:5%;"><p>This NHS Constitution gives you the right to start your treatment within maximum wating times and sets out what you can do if you think you have watted too long.</p></div>
       <div style="width:90%;margin-top:-2%;margin-left:5%;"><p><b>Please use this letter to choose and book your appointment.</b></p></div>
       <div style="display:flex;width:90% ;margin:auto;border:1px solid black;padding-top:1%;padding-bottom:1%;">
          <h5 style="margin-top:1.5%;margin-left:2%;font-size:14px;float:left;font-weight:600;width:50%">Booking Reference Number :</h5> <p style="margin-top:-1.7%;margin-left:0.5%;font-size:14px;"><?=$fe["sp_ubrn"]?></p>
    </div>
      <div style="width:90% ;margin:1% auto;border:1px solid black;padding-top:1%;padding-bottom:1%;">
          <h3 style="margin-left:2%;margin-top:0.5;font-size:16px">Section 1 - Your Details</h3>
          <table style="width:50%;margin-left:2%">
              <tr>
                  <th>Name :</th>
                  <td><?=$fe["pt_name"]." ".$fe["pt_surname"]?></td>
              </tr>
               <tr>
                  <th>NHS Number :</th>
                  <td><?=$fe["pt_nhsno"]?></td>
              </tr>
               <tr>
                  <th>Referring Organisation :</th>
                  <td><?=$klo["or_name"]?></td>
              </tr>
          </table>
          
        
      </div>
      <div style="width:90% ;margin:auto;border:1px solid black;padding-top:1%;padding-bottom:1%;">
          <h3 style="margin-left:2%;margin-top:0.5;font-size:16px">Section 2 - How to make your choice and book your appointment</h3>
          <p style="margin-left:2%;margin-top:0.5;">This option below can provide further to help you make your choice. To book appointment use the same options unless.</p>
          <p style="margin-left:4%;margin-top:0.5;"><i class="fa fa-laptop" aria-hidden="true"></i> <img src="images/laptop.jpg" style="width:3%;height:3%"/> <b>Go</b> to <a href="http://hospital.extremeearn.com/p-login.php" target="_blank">Hospital</a></p>
          <p style="margin-left:2%;margin-top:0.5;">If you can not access the internet you can phone NHS Appointment Line:</p>
          <p style="margin-left:2%;margin-top:0.5;"><i class="fa fa-phone" aria-hidden="true"></i> <img src="images/phon.png" style="width:3%;height:3%"/> +92 343 8061694</p>
        <p style="margin-left:2%;margin-top:0.5;">Phone lines are open from 8am to 8pm Monday to Friday and 8am to 4pm weekends and bank holidays. A full translation service is available. All calls are charged at local rates.</p>
        <p style="margin-left:2%;margin-top:0.5;"><b>If you do not have your Booking Reference Number or password</b> please contact the preson or organisation  who referred you.</p>
          
          
        
      </div>
      <center>
          <p style="margin-top:2% ;width:90%;text-align:center;margin-left:5%;"><small>Under the NHS Constitution you have to right to start non-emergency constitution-led within 18 weeks from referral - or where cancer suspected, to be seen by speciatist within two weeks of urgent referral. To find out more visit www.hospital.extremeearn.com, or ask your GP.   </small></p>
      <p style="margin-top:2% ;width:90%;text-align:center"><small><b>This information is confidential and intended patitent to use.</b></small></p>
      <h6 style="margin-top:2% ;margin-bottom:3% ;width:90%;text-align:center">NHS CONFIDENTIAL</h6>
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
$mpdf->Output("../upload/".$dd,"F");



$pdf='../upload/'.$dd;

$mail = new PHPMailer();

  $mail->isSMTP();
  $mail->Host     = 'smtp.gmail.com';
  $mail->SMTPAuth = true;
  $mail->Username = 'deevloopersibrahim@gmail.com';
  $mail->Password = 'Qureshi18';
  $mail->SMTPSecure = 'tls';
  $mail->Port     = 587;

  $mail->setFrom('deevloopersibrahim@gmail.com', 'Hospital');
  $mail->addReplyTo('deevloopersibrahim@gmail.com', 'Hospital');
    $mail->Subject = 'NHS CONFIDENTIAL';

  // Set email format to HTML
  $mail->isHTML(true);
  $mail->Body="<center><h2>NHS CONFIDENTIAL</h2></center> ";
  // Add a recipient
  $mail->addAddress($fe["pt_email"]);


$mail->AddAttachment( $pdf , $dd );
if(!$mail->Send()){
   echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
}else{
    header("location:index.php");
}
?>
<!--<script>-->
<!--window.location.href = "index.php";-->
<!--</script>-->