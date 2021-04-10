<?php 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
session_start();
include_once('../database/db.php');
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
// for register
if(isset($_POST['registeruser'])){
	
	$name =test_input(mysqli_real_escape_string($con, $_POST['form_name']));
	$email = test_input(mysqli_real_escape_string($con, $_POST['form_email']));
	$phn = test_input(mysqli_real_escape_string($con, $_POST['form_phone']));
	$org = test_input(mysqli_real_escape_string($con, $_POST['form_org']));
	$work = test_input(mysqli_real_escape_string($con, $_POST['form_work']));
	$pass = test_input(mysqli_real_escape_string($con, $_POST['form_pass']));
	$faci = test_input(mysqli_real_escape_string($con, $_POST['form_facility']));	
	
	// email check
	$check = "SELECT * FROM `admin` WHERE `email` = '$email'";
	$emq = mysqli_query($con,$check);
	$num = mysqli_num_rows($emq);
	
	if($num>0){
		echo"alemail";
	}else {
	
	date_default_timezone_set('Asia/Karachi');
	$time =  date('h:i:s a', time());
	$code = bin2hex(random_bytes(5));
			
	$ins = "INSERT INTO `admin`(`name`, `email`, `password`, `contact`, `organization`, `work`, `search_facility`, `time`, `super_admin`, `status`, `code`,`on/off`) VALUES ('$name','$email','$pass','$phn','$org','$work','$faci','$time','0','not_approve','$code','off')";
	
	$q = mysqli_query($con,$ins);
	
	if($q){
		
		$hospi = mysqli_real_escape_string($con, $_POST['form_hosp']);
		$last_id = mysqli_insert_id($con);
		$hq = "INSERT INTO `hospitals`(`h_name`,`u_id`) VALUES ('$hospi','$last_id')";
		$hco = mysqli_query($con,$hq);
		
//		if($hco){
//			echo"success";
//		}
				
//		echo"success";
	}
  }
}

// for login
if(isset($_POST['loginpage'])){
	
	$lemail = test_input(mysqli_real_escape_string($con, $_POST['log_email']));
	$lpass = test_input(mysqli_real_escape_string($con, $_POST['log_password']));
	
	$check = "SELECT * FROM `admin` WHERE `email` = '$lemail' and `password` = '$lpass' and `super_admin` = '0'";
	$q = mysqli_query($con, $check);
	$datacheck = mysqli_fetch_assoc($q);
	$nl = mysqli_num_rows($q);
		
	if($nl>0){
		
		if($datacheck['status'] == "approve"){
			
				$_SESSION['superadmin'] = $lemail;
				$_SESSION['a_name'] = $datacheck['name'];
				$_SESSION['a_id'] = $datacheck['id'];
				$onid = $_SESSION['a_id'];

				$onq = mysqli_query($con, "UPDATE `admin` SET `on/off`= 'on' WHERE `id` = '$onid'");

				echo"subadmin";
//				header('location: ../index.php');
			
		}else{
			
			echo"apperror";
		}
		
	}else {
		$check1 = "SELECT * FROM `service_user` WHERE `su_email` = '$lemail' and `su_password` = '$lpass' and `su_role` = 'service_definer'";
			$q1 = mysqli_query($con, $check1);
			$datacheck1 = mysqli_fetch_assoc($q1);
			$nl1 = mysqli_num_rows($q1);
		
		if($nl1>0){
			$_SESSION['superadmin'] = $lemail;
				$_SESSION['a_name'] = $datacheck1['su_name'];
				$_SESSION['a_id'] = $datacheck1['su_id'];
//				$onid = $_SESSION['a_id'];
			echo"servicead";
		}else {
			echo"apperror";
		}
	}
	
}

// for forgot pass email send
if(isset($_POST['passmailsend'])){
	
	$passemail = test_input(mysqli_real_escape_string($con, $_POST['fo_email']));
	
	$mailcheck = mysqli_query($con, "SELECT * FROM `admin` WHERE `email` = '$passemail'");
	$dataforpass = mysqli_fetch_assoc($mailcheck);
	$count = mysqli_num_rows($mailcheck);
	
	if($count>0){
		
//		$data = $checkcu->fetch_assoc();
			
			$name = $dataforpass['name'];
			$code = $dataforpass['code'];
			
	// Include PHPMailer library files
	require 'PHPMailer/src/Exception.php';
	require 'PHPMailer/src/PHPMailer.php';
	require 'PHPMailer/src/SMTP.php';
			
			$mail = new PHPMailer;

		$mail->isSMTP();
		$mail->Host     = 'smtp.gmail.com';
		$mail->SMTPAuth = true;
		$mail->Username = 'mb365992@gmail.com';
		$mail->Password = '$momina331';
		$mail->SMTPSecure = 'tls';
		$mail->Port     = 587;

		$mail->setFrom('mb365992@gmail.com', 'Admin');
		$mail->addReplyTo('mb365992@gmail.com', 'Admin');

		// Add a recipient
		$mail->addAddress($passemail);
			
		// Email subject
		$subject = "Reset Pssword Link";
		$mail->Subject = $subject;

		// Set email format to HTML
		$mail->isHTML(true);

		// Email body content
		$mailContent = "<h2>Forgot Password Link</h2> <br>
				Hi, <strong class='font-weight-bold text-dark'>$name,</strong> 
				Please click the given link to reset your password! <br>
				http://localhost/mediku/hospital/forgotpass.php?code=$code";
		$mail->Body = $mailContent;

//		Send email
		if(!$mail->send()){
			echo "mailerror";
		}
		else{
			echo"sendmail";
		}
	}else 
	{
		echo "wrongmail";
	}
}

// for update password
if(isset($_POST['resetpass'])){
	
	if(isset($_POST['rcode'])){
		
		$rcode = $_POST['rcode'];
		
		$checkcode = mysqli_query($con, "SELECT * FROM `admin` WHERE `code` = '$rcode'");
		$roc = mysqli_num_rows($checkcode);
		if($roc>0){
			$rpass = test_input(mysqli_real_escape_string($con, $_POST['r_pass']));
			$rcpass = test_input(mysqli_real_escape_string($con , $_POST['r_cpass']));

//			$qre = mysqli_query($con, "UPDATE `admin` `SET` `password`= '$rpass' WHERE `code` = '$rcode'");
			$qre = $con->query("UPDATE `admin` SET `password` = '$rpass' WHERE `code` = '$rcode'");
			
			if($qre){
				echo "updpasssuc";
			}else {
				echo "notupdpass";
			}
		}		

	}else {
		echo "notfoundcode";
	}
		
}

// for contact insert

if(isset($_POST['contactinsert'])){
	
	$cname = test_input(mysqli_real_escape_string($con, $_POST['contact_name']));
	$cemail = test_input(mysqli_real_escape_string($con, $_POST['contact_email']));
	$csub = test_input(mysqli_real_escape_string($con, $_POST['contact_subject']));
	$cphn = test_input(mysqli_real_escape_string($con, $_POST['contact_phone']));
	$cmsg = test_input(mysqli_real_escape_string($con, $_POST['contact_message']));
	
	$conq = mysqli_query($con, "INSERT INTO `tbl_contact`(`contact_name`, `contact_email`, `contact_subject`, `contact_phn`, `contact_msg`) VALUES ('$cname','$cemail','$csub','$cphn','$cmsg')");
	
	if($conq){
		
		// Include PHPMailer library files
	require 'PHPMailer/src/Exception.php';
	require 'PHPMailer/src/PHPMailer.php';
	require 'PHPMailer/src/SMTP.php';
			
			$mail = new PHPMailer;

		$mail->isSMTP();
		$mail->Host     = 'smtp.gmail.com';
		$mail->SMTPAuth = true;
		$mail->Username = 'mb365992@gmail.com';
		$mail->Password = '$momina331';
		$mail->SMTPSecure = 'tls';
		$mail->Port     = 587;

		$mail->setFrom('mb365992@gmail.com', 'Admin');
		$mail->addReplyTo('mb365992@gmail.com', 'Admin');

		// Add a recipient
		$mail->addAddress('mb365992@gmail.com');
			
		// Email subject
//		$subject = "Reset Pssword Link";
		$mail->Subject = $csub;

		// Set email format to HTML
		$mail->isHTML(true);

		// Email body content
		$mailContent = "<h2>$cname</h2>
						<h4><b>$cphn</b></h4>
						<br>$cmsg";
		$mail->Body = $mailContent;
		
//		Send email
		if($mail->send()){
			echo "conmail";
		}
	}
//		echo"cdone";
}


?>