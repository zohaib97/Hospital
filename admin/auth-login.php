<?php
include_once('connect.php');
if(isset($_POST['signin']))
	{
		$email = test_input($_POST['email']);
		$pass = test_input($_POST['pass']);
		
		$query = mysqli_query($con,"SELECT * FROM `admin` WHERE `email` = '$email' and `password` = '$pass' and super_admin = '1'");
		$num = mysqli_num_rows($query);
		if($num>0)
		{
			$_SESSION['superadmin'] = $email;
			$_SESSION['status'] = "Login Successfully";
			header('location:index.php');
		}
	else
	{
		?>
	<script>
		Swal.fire('Error!', "Email and password doesn't match.", 'error');
		</script>
	<?php
	}
	}
	
?>
<!DOCTYPE html>
<html lang="zxx" class="js">
<head>
    <base href="">
    <meta charset="utf-8">
    <meta name="author" content="Softnio">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  
    <!-- Fav Icon  -->
    <link rel="shortcut icon" href="images/favicon.png">
    <!-- Page Title  -->
    <title>Dashboard | Deevloopers Admin</title>
    <!-- StyleSheets  -->
    <link rel="stylesheet" href="assets/css/dashlite.css?ver=2.2.0">
    <link id="skin-default" rel="stylesheet" href="assets/css/theme.css?ver=2.2.0">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />

</head>

<body class="nk-body bg-white npc-default pg-auth">
    <div class="nk-app-root">
        <!-- main @s -->
        <div class="nk-main ">
            <!-- wrap @s -->
            <div class="nk-wrap nk-wrap-nosidebar">
                <!-- content @s -->
                <div class="nk-content ">
                    <div class="nk-block nk-block-middle nk-auth-body  wide-xs">
                        <div class="brand-logo pb-4 text-center">
                            <a href="index.php" class="logo-link">
                                <img class="logo-light logo-img logo-img-lg" src="images/logo1.png"  alt="logo">
                                <img class="logo-dark logo-img logo-img-lg" src="images/logo1.png"  alt="logo-dark">
                            </a>
                        </div>
                        <div class="card">
                            <div class="card-inner card-inner-lg">
                                <div class="nk-block-head">
                                    <div class="nk-block-head-content">
                                        <h4 class="nk-block-title">Sign-In</h4>
                                        <div class="nk-block-des">
                                            <p>Access the Admin panel using your email and passcode.</p>
                                        </div>
                                    </div>
                                </div>
                                <form method="post">
                                    <div class="form-group">
                                        <div class="form-label-group">
                                            <label class="form-label" for="default-01">Email</label>
                                        </div>
                                        <input type="text" name="email" class="form-control form-control-lg" id="default-01" placeholder="Enter your email address">
                                    </div>
                                    <div class="form-group">
                                        <!--<div class="form-label-group">-->
                                        <!--    <label class="form-label" for="password">Passcode</label>-->
                                        <!--    <a class="link link-primary link-sm" href="#">Forgot Code?</a>-->
                                        <!--</div>-->
                                        <div class="form-control-wrap">
                                            <a href="#" class="form-icon form-icon-right passcode-switch" data-target="password">
                                                <em class="passcode-icon icon-show icon ni ni-eye"></em>
                                                <em class="passcode-icon icon-hide icon ni ni-eye-off"></em>
                                            </a>
                                            <input type="password" class="form-control form-control-lg" id="password" name="pass" placeholder="Enter your passcode">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" name="signin" class="btn btn-lg btn-primary btn-block">Sign in</button>
                                    </div>
                                </form>
                            
                                <!--<div class="text-center pt-4 pb-3">-->
                                <!--    <h6 class="overline-title overline-title-sap"><span>OR</span></h6>-->
                                <!--</div>-->
                                <!--<ul class="nav justify-center gx-4">-->
                                <!--    <li class="nav-item"><a class="nav-link" href="#">Facebook</a></li>-->
                                <!--    <li class="nav-item"><a class="nav-link" href="#">Google</a></li>-->
                                <!--</ul>-->
                            </div>
                        </div>
                    </div>
                    <div class="nk-footer nk-auth-footer-full">
                        <div class="container wide-lg">
                            <div class="row g-3">
                                <!--<div class="col-lg-6 order-lg-last">-->
                                <!--    <ul class="nav nav-sm justify-content-center justify-content-lg-end">-->
                                <!--        <li class="nav-item">-->
                                <!--            <a class="nav-link" href="#">Terms & Condition</a>-->
                                <!--        </li>-->
                                <!--        <li class="nav-item">-->
                                <!--            <a class="nav-link" href="#">Privacy Policy</a>-->
                                <!--        </li>-->
                                <!--        <li class="nav-item">-->
                                <!--            <a class="nav-link" href="#">Help</a>-->
                                <!--        </li>-->
                                <!--        <li class="nav-item dropup">-->
                                <!--            <a class="dropdown-toggle dropdown-indicator has-indicator nav-link" data-toggle="dropdown" data-offset="0,10"><span>English</span></a>-->
                                <!--            <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">-->
                                <!--                <ul class="language-list">-->
                                <!--                    <li>-->
                                <!--                        <a href="#" class="language-item">-->
                                <!--                            <img src="images/flags/english.png" alt="" class="language-flag">-->
                                <!--                            <span class="language-name">English</span>-->
                                <!--                        </a>-->
                                <!--                    </li>-->
                                <!--                    <li>-->
                                <!--                        <a href="#" class="language-item">-->
                                <!--                            <img src="images/flags/spanish.png" alt="" class="language-flag">-->
                                <!--                            <span class="language-name">Español</span>-->
                                <!--                        </a>-->
                                <!--                    </li>-->
                                <!--                    <li>-->
                                <!--                        <a href="#" class="language-item">-->
                                <!--                            <img src="images/flags/french.png" alt="" class="language-flag">-->
                                <!--                            <span class="language-name">Français</span>-->
                                <!--                        </a>-->
                                <!--                    </li>-->
                                <!--                    <li>-->
                                <!--                        <a href="#" class="language-item">-->
                                <!--                            <img src="images/flags/turkey.png" alt="" class="language-flag">-->
                                <!--                            <span class="language-name">Türkçe</span>-->
                                <!--                        </a>-->
                                <!--                    </li>-->
                                <!--                </ul>-->
                                <!--            </div>-->
                                <!--        </li>-->
                                <!--    </ul>-->
                                <!--</div>-->
                                <div class="col-lg-12">
                                    <div class="nk-block-content text-center text-lg-center">
                                        <p class="text-soft">&copy; 2021 Deevloopers. All Rights Reserved.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- wrap @e -->
            </div>
            <!-- content @e -->
        </div>
        <!-- main @e -->
    </div>
    <!-- app-root @e -->
    <!-- JavaScript -->
    <script src="assets/js/bundle.js?ver=2.2.0"></script>
    <script src="assets/js/scripts.js?ver=2.2.0"></script>
<?php
	if(isset($_POST['signin']))
	{
	if($num<=0)
	{?>
	<script>
	Swal.fire('Error!', "Email and password doesn't match.", 'error');
	</script>	
	<?php
	}
	}
	function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
	?>
</html>