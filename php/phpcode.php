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
	$regbody = test_input(mysqli_real_escape_string($con, $_POST['regbody']));
	$orgsql = mysqli_query($con,"SELECT * FROM orginzation WHERE orid = '$orgname' and or_type = '$orgtype'");
	$fetchorg = mysqli_fetch_array($orgsql);
	$orgname1 = $fetchorg['or_name'];
	$orgtype1 = $fetchorg['orid'];
	// email check
	$check = "SELECT * FROM `tbl_ruser` WHERE `ur_email` = '$email'";
	$emq = mysqli_query($con,$check);
	$num = mysqli_num_rows($emq);
	
	if($num>0){
	echo json_encode(array("res"=>"alemail"));
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
			
	$ins = "INSERT INTO `tbl_ruser`(`ur_fname`, `ur_sname`, `ur_email`, `ur_pass`, `title`, `ur_orgname`,`ur_orgcode`,`ur_orgtype`, `ur_role_id`, `ur_role_name`, `ur_orgphno`,`ur_orgaddress`, `ur_status`,`ur_proregno`,`ur_address`,`ur_city`,`ur_postcode`,`ur_regbody`) 
	VALUES ('$nfame','$nsame','$email','$pass','$title','$orgname1','$orgcode','$orgtype1','$urole','$rname','$orgphno','$orgaddress','not_approve','$proregno','$address','$city','$postcode','$regbody')";
						
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
		echo json_encode(array("res"=>"success","name"=>$nfame." ".$nsame));
		}else{
		echo json_encode(array("res"=>"Error","name"=>$nfame." ".$nsame));
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

	
	$nl = mysqli_num_rows($q);
		
	if($nl>0){
		$datacheck = mysqli_fetch_assoc($q);
		$orgid = $datacheck['organization'];
		$sql0 = mysqli_query($con,"SELECT * FROM `orginzation` WHERE orid = '$orgid'");
		$orgfetch = mysqli_fetch_array($sql0);
		if($datacheck['status'] == "approve"){
			
			if($orgfetch['or_type'] == "NHS Hospital")
			{
			    
			
				$_SESSION['superadmin'] = $lemail;
				$_SESSION['a_name'] = $datacheck['name'];
				$_SESSION['a_id'] = $datacheck['id'];
				$onid = $_SESSION['a_id'];
$_SESSION['consultant'] = $lemail;
				$onq = mysqli_query($con, "UPDATE `admin` SET `on/off`= 'on' WHERE `id` = '$onid'");

				echo"subadmin";
//				header('location: ../index.php');
			}
			if($orgfetch['or_type'] != "NHS Hospital")
			{
			    
			
				$_SESSION['superadmin'] = $lemail;
				$_SESSION['a_name'] = $datacheck['name'];
				$_SESSION['a_id'] = $datacheck['id'];
				$onid = $_SESSION['a_id'];
$_SESSION['gprefferer'] = $lemail;
				$onq = mysqli_query($con, "UPDATE `admin` SET `on/off`= 'on' WHERE `id` = '$onid'");

				echo"subadmin";
//				header('location: ../index.php');
			}
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
			$fenu=mysqli_fetch_array($qu);
			if($nu>0)
			{
			    if($fenu["ur_status"] == "approve"){
				$_SESSION['gprefferer'] = $lemail;
				echo "gprefferer";
			    }else{
			        echo "not approve";
			    }
			}
			else
			{ 
				// for role user Optometrist
				$qu1 = mysqli_query($con,"SELECT * FROM `tbl_ruser` WHERE `ur_email` = '$lemail' and `ur_pass` = '$lpass' and ur_role_id = '6'");
				$nu1 = mysqli_num_rows($qu1);
					$fenu1=mysqli_fetch_array($qu1);
				if($nu1>0)
				{
				    if($fenu1["ur_status"]=="approve"){
					$_SESSION['gprefferer'] = $lemail;
					echo "Optometrist";
				    }else{
			        echo "not approve";
			    }
				}else {
				    // for role user consultant
				$qu1 = mysqli_query($con,"SELECT * FROM `tbl_ruser` WHERE `ur_email` = '$lemail' and `ur_pass` = '$lpass' and ur_role_id = '3'");
				$nu1 = mysqli_num_rows($qu1);
					$fenu1=mysqli_fetch_array($qu1);
				if($nu1>0)
				{
				    if($fenu1["ur_status"]=="approve"){
					$_SESSION['consultant'] = $lemail;
				
					echo "consultant";
					
				}else{
			        echo "not approve";
			    }
				}else {
					
					// for role user dentist
				$dq = mysqli_query($con,"SELECT * FROM `tbl_ruser` WHERE `ur_email` = '$lemail' and `ur_pass` = '$lpass' and ur_role_id = '1'");
				$dnq = mysqli_num_rows($dq);
				$fenu2=mysqli_fetch_array($dq);
				if($dnq>0)
					{
				if($fenu2["ur_status"]=="approve"){
						$_SESSION['dentistem'] = $lemail;
						echo "dentist";
					}else{
			        echo "not approve";
			    }
					}
					else
					{
						$gpra = mysqli_query($con,"SELECT * FROM `tbl_ruser` WHERE `ur_email` = '$lemail' and `ur_pass` = '$lpass' and ur_role_id = '2'");
				$dnq = mysqli_num_rows($gpra);
				$fenu3=mysqli_fetch_array($gpra);
						if($dnq>0)
					{
				if($fenu3["ur_status"]=="approve"){
						$_SESSION['gpractional'] = $lemail;
						echo "gpractional";
					}else{
			        echo "not approve";
			    }
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
							$fenu5=mysqli_fetch_array($tuserq);
							if($qnum>0){
				if($fenu5["ur_status"]=="approve"){
								$_SESSION['gprefferer'] = $lemail;
								echo "gptuser";
							}else{
			        echo "not approve";
			    }
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
	$code =rand();
	$passemail = test_input(mysqli_real_escape_string($con, $_POST['fo_email']));
	mysqli_query($con,"UPDATE `tbl_ruser` SET `code` = '$code' WHERE `ur_email` = '$passemail'");
	$mailcheck = mysqli_query($con, "SELECT * FROM `tbl_ruser` WHERE `ur_email` = '$passemail'");
	$dataforpass = mysqli_fetch_array($mailcheck);
	$count = mysqli_num_rows($mailcheck);
	
	if($count > 0 ){
		
//		$data = $checkcu->fetch_assoc();
			
			$name = $dataforpass['name'];
// 			$code = $dataforpass['code'];
			
	$to      = $passemail;
	$subject = 'Forgot Password Link';
	$message = '<html><body>';
	$message .= "<h2>Forgot Password Link</h2> <br>
				Hi, <strong class='font-weight-bold text-dark'>$name,</strong> 
				Please click the given link to reset your password! <br>
				http://hospital.extremeearn.com/forgotpass.php?code=$code&email=$passemail";
	$message .= '</body></html>';
	$headers = 'From: info@deevloopers.com' . "\r\n" .
		'Reply-To: info@deevloopers.com' . "\r\n" .
		"MIME-Version: 1.0\r\n".
		"Content-Type: text/html; charset=ISO-8859-1\r\n";
		'X-Mailer: PHP/' . phpversion();
	
$e=	mail($to, $subject, $message, $headers);
	

//		Send email
		if(!$e){
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
		$email=$_POST["email"];
		$rcode = $_POST['rcode'];
		
		$checkcode = mysqli_query($con, "SELECT * FROM `tbl_ruser` WHERE `code` = '$rcode' and ur_email ='$email'");
		$roc = mysqli_num_rows($checkcode);
		if($roc>0){
			$rpass = test_input(mysqli_real_escape_string($con, $_POST['r_pass']));
			$rcpass = test_input(mysqli_real_escape_string($con , $_POST['r_cpass']));

//			$qre = mysqli_query($con, "UPDATE `admin` `SET` `password`= '$rpass' WHERE `code` = '$rcode'");
			$qre = $con->query("UPDATE `tbl_ruser` SET `ur_pass` = '$rpass' WHERE `code` = '$rcode'");
			
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

if(isset($_POST["fetchorgname"]))
{
	$name=$_POST["name"];
	$js=mysqli_query($con,"SELECT * FROM `orginzation` where or_type='$name'");
	echo'<option value="">select</option>';
	while($row=mysqli_fetch_array($js))
	{
	    echo'
	    <option value="'.$row['orid'].'">'.$row["or_name"].'</option>';
	}



}

if(isset($_POST["fetchregbody"]))
{
	$name=$_POST["name"];
	if($name == "NHS Hospital")
	{
echo"<option>Select</option>
<option value='Admin & Management'>Admin & Management</option>
<option value='General Medical Council (GMC)'>General Medical Council (GMC)</option>
<option value='General Optical Council (GOC)'>General Optical Council (GOC)</option>
<option value='General Dental Council (GDC)'>General Dental Council (GDC)</option>
<option value='Nursing & Midwifery Council (NMC)'>Nursing & Midwifery Council (NMC)</option>";
	}
	if($name == "GP Practice")
	{
		echo"<option>Select</option>
		<option value='General Medical Council (GMC)'>General Medical Council (GMC)</option>
		<option value='Nursing & Midwifery Council (NMC)'>Nursing & Midwifery Council (NMC)</option>
		";
	}
	if($name == "Dental Practice")
	{
		echo"<option>Select</option>
		<option value='General Dental Council (GDC)'>General Dental Council (GDC)</option>
		<option value='Nursing & Midwifery Council (NMC)'>Nursing & Midwifery Council (NMC)</option>
		";
	}
	if($name == "Opticians")
	{
		echo"<option>Select</option>
		<option value='General Optical Council (GOC)'>General Optical Council (GOC)</option>
		";
	}
	if($name == "Community Hospital")
	{
		echo"<option>Select</option>
<option value='Admin & Management'>Admin & Management</option>
<option value='General Medical Council (GMC)'>General Medical Council (GMC)</option>
<option value='General Optical Council (GOC)'>General Optical Council (GOC)</option>
<option value='General Dental Council (GDC)'>General Dental Council (GDC)</option>
<option value='Nursing & Midwifery Council (NMC)'>Nursing & Midwifery Council (NMC)</option>";
	}
	



}


if(isset($_POST["fetchrole"]))
{
	$name= $_POST["org"];
	if($name == "NHS Hospital")
	{
	$js=mysqli_query($con,"SELECT * FROM `tbl_role` where ro_role='Consultant'");
	echo'<option value="">select</option>';
	while($row=mysqli_fetch_array($js))
	{
	    echo'
	    <option value="'.$row['ro_id'].'">'.$row["ro_role"].'</option>';
	}
	}
	elseif($name == "GP Practice")
	{
	    $js=mysqli_query($con,"SELECT * FROM `tbl_role` where ro_role='General practitioner'");
	echo'<option value="">select</option>';
	while($row=mysqli_fetch_array($js))
	{
	    echo'
	    <option value="'.$row['ro_id'].'">'.$row["ro_role"].'</option>';
	}
	}
	elseif($name == "Opticians")
	{
	     $js=mysqli_query($con,"SELECT * FROM `tbl_role` where ro_role='Optometrist'");
	echo'<option value="">select</option>';
	while($row=mysqli_fetch_array($js))
	{
	    echo'
	    <option value="'.$row['ro_id'].'">'.$row["ro_role"].'</option>';
	}
	}
	elseif($name == "Dental Practice")
	{
	    $js=mysqli_query($con,"SELECT * FROM `tbl_role` where ro_role='Dentist'");
	echo'<option value="">select</option>';
	while($row=mysqli_fetch_array($js))
	{
	    echo'
	    <option value="'.$row['ro_id'].'">'.$row["ro_role"].'</option>';
	}
	}
	elseif($name == "Community Hospital")
	{
	    $js=mysqli_query($con,"SELECT * FROM `tbl_role` where ro_role='General practitioner'");
	echo'<option value="">select</option>';
	while($row=mysqli_fetch_array($js))
	{
	    echo'
	    <option value="'.$row['ro_id'].'">'.$row["ro_role"].'</option>';
	}
	}



}

if(isset($_POST["addorginaztion"]))
{
	extract($_POST);
	$select = mysqli_query($con,"SELECT * FROM orginzation WHERE or_postcode = '$opost'");
	if(mysqli_num_rows($select) > 0)
	{
	    echo"already";
	}
		$select1 = mysqli_query($con,"SELECT * FROM orginzation WHERE or_code = '$ocode'");
	if(mysqli_num_rows($select1) > 0)
	{
	    echo"alreadycode";
	}
	else
	{
	$jjjs=mysqli_query($con,"INSERT INTO `orginzation`(`or_type`, `or_name`, `or_phone`, `or_address`, `or_code`, `or_firstaddress`, `or_city`, `or_postcode` , `status`) VALUES ('$otype','$oname','$ocontact','$oaddress','$ocode','$ofaddress','$ocity','$opost','Not approved')");

	if($jjjs >0){
		echo "sss";
	}else{
		echo "Error";
	}
	}
}

// for Send Message
if(isset($_POST['sendmessage']))
{
	
$aname = $_POST['aname'];
$rmessage = strip_tags($_POST['rmessage']);
$aemail = $_POST['aemail'];
	$to      = "zohaibkhan4822@gmail.com";
	$subject = 'Support Message';
	$message = '<html><body>';
	$message .= "<h2>Support Message</h2> <br>
			From :<strong class='font-weight-bold text-dark'>".$aname."</strong> 
			<br>
			<h4>Message</h4>
			<p>".$rmessage."</p>
			";
	$message .= '</body></html>';
	$headers = 'From: '.$aemail . "\r\n" .
		'Reply-To: '.$aemail . "\r\n" .
		"MIME-Version: 1.0\r\n".
		"Content-Type: text/html; charset=ISO-8859-1\r\n";
		'X-Mailer: PHP/' . phpversion();
	
$e=	mail($to, $subject, $message, $headers);
	

//		Send email
		if(!$e){
			echo "mailerror";
		}
		else{
			echo"sendmail";
		}

}

//for profession registration no check
if(isset($_POST['proregcheck']))
{
    $proregno = $_POST['proregno'];
    $sql = mysqli_query($con,"SELECT * FROM `tbl_ruser` WHERE ur_proregno = '$proregno'");
    if(mysqli_num_rows($sql) > 0)
    {
        echo"already";
        
    }
    else
    {
        echo"available";
    }
}


?>