<?php 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

include_once('../database/db.php');
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
// for register
if(isset($_POST['registeruser']))
{
	
	$nfame =test_input(mysqli_real_escape_string($con, $_POST['form_fname']));
	$nsame =test_input(mysqli_real_escape_string($con, $_POST['form_sname']));
	$email = test_input(mysqli_real_escape_string($con, $_POST['form_email']));
	
	$title = test_input(mysqli_real_escape_string($con, $_POST['title']));

	$pass = test_input(mysqli_real_escape_string($con, $_POST['form_pass']));

	$orgtype = test_input(mysqli_real_escape_string($con, $_POST['orgtype']));	
	$urole = test_input(mysqli_real_escape_string($con, $_POST['role']));	
	$orgname = test_input(mysqli_real_escape_string($con, $_POST['orgname']));	
	$orgphno = test_input(mysqli_real_escape_string($con, $_POST['orgphno']));	
	$orgaddress = test_input(mysqli_real_escape_string($con, $_POST['orgaddress']));	
	$proregno = test_input(mysqli_real_escape_string($con, $_POST['proregno']));	
	$orgcode = test_input(mysqli_real_escape_string($con, $_POST['orgcode']));	
	$address = test_input(mysqli_real_escape_string($con, $_POST['address']));	
	$city = test_input(mysqli_real_escape_string($con, $_POST['city']));	
	$postcode = test_input(mysqli_real_escape_string($con, $_POST['postcode']));	
	
	// email check
	$check = "SELECT * FROM `tbl_ruser` WHERE `ur_email` = '$email'";
	$emq = mysqli_query($con,$check);
	$num = mysqli_num_rows($emq);
	
	if($num>0){
		echo"alemail";
	}else {
	
		
		
	
			
		date_default_timezone_set('Asia/Karachi');
		$time =  date('h:i:s a', time());
		$code = bin2hex(random_bytes(5));
			
			$rolenq = mysqli_query($con, "SELECT * FROM `tbl_role` WHERE `ro_id` = '$urole'");
			$dfrn = mysqli_fetch_assoc($rolenq);
			$rname = $dfrn['ro_role'];
			
//	INSERT INTO `tbl_fuser`(`fuser_name`, `fuser_email`, `fuser_pass`, `fuser_contact`, `fuser_org`, `fuser_work`, `fuser_sfacility`, `fuser_hospital`, `fuser_time`, `fuser_code`, `fuser_nhsno`, `fuser_on/off`) 
//	VALUES ('$name','$email','$pass','$phn','$org','$work','$faci','$hname','$time','$code','$nhs_num','off')
			
//			INSERT INTO `tbl_user`(`staff_fname`, `staff_sname`, `staff_email`, `staff_pass`, `staff_contact`, `staff_org`, `tbl_role`, `staff_hospitalid`, `u_NHS_no`) VALUES ('$nfame','$nsame','$email','$pass','$phn','$org','$urole','$hid','$nhs_num')
			
	$ins = "INSERT INTO `tbl_ruser`(`ur_fname`, `ur_sname`, `ur_email`, `ur_pass`, `title`, `ur_orgname`,`ur_orgcode`,`ur_orgtype`, `ur_role_id`, `ur_role_name`, `ur_orgphno`,`ur_orgaddress`, `ur_status`,`ur_proregno`,`ur_address`,`ur_city`,`ur_postcode`) 
	VALUES ('$nfame','$nsame','$email','$pass','$title','$orgname','$orgcode','$orgtype','$urole','$rname','$orgphno','$orgaddress','not_approve','$proregno','$address','$city','$postcode')";
						
	$q = mysqli_query($con,$ins);
			
	$to      = $email;
	$subject = 'For Approval ';
	$message = '<html><body>';
	$message .= '<h1>You Has Been Successfully Registered Please Wait For Admin Approval</h1>';
	$message .= '</body></html>';
	$headers = 'From: info@deevloopers.com' . "\r\n" .
		'Reply-To: info@deevloopers.com' . "\r\n" .
		"MIME-Version: 1.0\r\n".
		"Content-Type: text/html; charset=ISO-8859-1\r\n";
		'X-Mailer: PHP/' . phpversion();
	
	mail($to, $subject, $message, $headers);
		if($q >0){
			echo "success";
		}else{
			echo "Error";
		}
	
  }
}

// for login
if(isset($_POST['loginpage']))
{
	
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
			$check1 = "SELECT * FROM `tbl_service_definer` WHERE `u_seremail` = '$lemail' and `u_serpass` = '$lpass' and `u_serrole` = 'service_definer'";
			$q1 = mysqli_query($con, $check1);
			$datacheck1 = mysqli_fetch_assoc($q1);
			$nl1 = mysqli_num_rows($q1);
		
		if($nl1>0){
			$_SESSION['serviceemail'] = $lemail;
				$_SESSION['ser_name'] = $datacheck1['u_sername'];
				$_SESSION['ser_id'] = $datacheck1['u_serid'];
//				$onid = $_SESSION['a_id'];
				echo"servicead";
		}else {
		$qu = mysqli_query($con,"SELECT * FROM `tbl_ruser` WHERE `ur_email` = '$lemail' and `ur_pass` = '$lpass' and ur_role_id = '5'");
			$nu = mysqli_num_rows($qu);
			if($nu>0)
			{
				$_SESSION['gprefferer'] = $lemail;
				echo "gprefferer";
			}
			else
			{ 
				// for role user Optometrist
				$qu1 = mysqli_query($con,"SELECT * FROM `tbl_ruser` WHERE `ur_email` = '$lemail' and `ur_pass` = '$lpass' and ur_role_id = '6'");
				$nu1 = mysqli_num_rows($qu1);
				if($nu1>0)
				{
					$_SESSION['consultant'] = $lemail;
					echo "Optometrist";
				}else {
				    // for role user consultant
				$qu1 = mysqli_query($con,"SELECT * FROM `tbl_ruser` WHERE `ur_email` = '$lemail' and `ur_pass` = '$lpass' and ur_role_id = '3'");
				$nu1 = mysqli_num_rows($qu1);
				if($nu1>0)
				{
					$_SESSION['consultant'] = $lemail;
					echo "consultant";
				}else {
					
					// for role user dentist
				$dq = mysqli_query($con,"SELECT * FROM `tbl_ruser` WHERE `ur_email` = '$lemail' and `ur_pass` = '$lpass' and ur_role_id = '1'");
				$dnq = mysqli_num_rows($dq);
				if($dnq>0)
					{
						$_SESSION['dentistem'] = $lemail;
						echo "dentist";
					}
					else
					{
						$gpra = mysqli_query($con,"SELECT * FROM `tbl_ruser` WHERE `ur_email` = '$lemail' and `ur_pass` = '$lpass' and ur_role_id = '2'");
				$dnq = mysqli_num_rows($gpra);
						if($dnq>0)
					{
						$_SESSION['gpractional'] = $lemail;
						echo "gpractional";
					}
						else
						{
							$gpra = mysqli_query($con,"SELECT * FROM `tbl_ruser` WHERE `ur_email` = '$lemail' and `ur_pass` = '$lpass' and ur_role_id = '4'");
				$dnq = mysqli_num_rows($gpra);
						if($dnq>0)
					{
						$_SESSION['cnurse'] = $lemail;
						echo "cnurse";
					}if($dnq>0){
							$tuserq = mysqli_query($con, "SELECT * FROM `tbl_user` WHERE `staff_email` = '$lemail' and `staff_pass` = '$lpass' and `tbl_role` = '5'");
							$qnum = mysqli_num_rows($tuserq);
							if($qnum>0){
								$_SESSION['gprefferer'] = $lemail;
								echo "gptuser";
							}
						  }
						  else{
							echo "notsubmit";
						}
						}
					}
				}
				}
			}
		}
	}
	
}

if(isset($_POST['loginpage1']))
{
	
	$lemail = mysqli_real_escape_string($con, $_POST['nhsno']);
	$lpass = mysqli_real_escape_string($con, $_POST['dob']);
	$ubrn = mysqli_real_escape_string($con, $_POST['ubrn']);
	$check = "SELECT * FROM `tbl_patients` where pt_nhsno ='$lemail' and pt_dob= '$lpass'";
	$q = mysqli_query($con, $check);
	$datacheck = mysqli_fetch_assoc($q);
	$nl = mysqli_num_rows($q);
		if($nl >0){
		    $check1 = "SELECT * FROM `tbl_serviceappointment` where sp_ubrn ='$ubrn'";
	$q1 = mysqli_query($con, $check1);
	$row = mysqli_num_rows($q1);
	if($row>0)
	{
	    $_SESSION['patnhs'] = $lemail;
	    $_SESSION['patubrn'] = $ubrn;
			echo "pati";
	}
	else{
	    echo "error1";
	}
			
		}else{
			echo "error";
		}
	
	
}

// for forgot pass email send
if(isset($_POST['passmailsend']))
{
	
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
		$mail->Password = '$(momina)';
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
if(isset($_POST['resetpass']))
{
	
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

if(isset($_POST['contactinsert']))
{
	
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
		$mail->Password = '$(momina)';
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
		if($mail->send()){
			echo "conmail";
		}
	}
}

if(isset($_POST["fetchorgdata"]))
{
	$id=$_POST["id"];
	$js=mysqli_query($con,"SELECT * FROM `orginzation` where orid='$id'");
	$row=mysqli_fetch_array($js);

	echo json_encode($row);

}
if(isset($_POST["addorginaztion"]))
{
	extract($_POST);
	
	$jjjs=mysqli_query($con,"INSERT INTO `orginzation`(`or_type`, `or_name`, `or_phone`, `or_address`, `or_code`, `or_firstaddress`, `or_city`, `or_postcode` , `status`) VALUES ('$otype','$oname','$ocontact','$oaddress','$ocode','$ofaddress','$ocity','$opost','Not approved')");

	if($jjjs >0){
		echo "sss";
	}else{
		echo "Error";
	}
}

?>