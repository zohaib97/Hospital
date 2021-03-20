// JavaScript Document

toastr.options = {
  "closeButton": true,
  "debug": false,
  "newestOnTop": true,
  "progressBar": true,
  "positionClass": "toast-top-right",
  "preventDuplicates": false,
  "onclick": null,
  "showDuration": "300",
  "hideDuration": "1000",
  "timeOut": "5000",
  "extendedTimeOut": "1000",
  "showEasing": "swing",
  "hideEasing": "linear",
  "showMethod": "fadeIn",
  "hideMethod": "fadeOut"
};

// ajax_insert register user
	
	$("#register_popup").on("submit", function(e)
	{
		e.preventDefault();
		
		var fname = $('#u_fname').val();
		var sname = $('#u_sname').val();
		var email = $('#u_email').val();
		var phn = $('#u_phn').val();
		var org = $('#u_org').val();
		var work = $('#u_work').val();
		var pass = $('#u_pass').val();
		var cpass = $('#u_cpass').val();
		var faci = $('#u_faci').val();
		var nhs_num = $('#nhs_num').val();
		var role = $('#role').val();
		
		if(fname != '' && sname != '' && email != '' && phn != '' && org != '' && work != '' && pass != '' && cpass != '' && faci != '' && nhs_num != '' && role != ''){
			
			if(pass == cpass){

					if($('#flexCheckDefault').prop('checked') == true){

						var reform = new FormData(this);
					reform.append("registeruser","btn");

				$.ajax({
					url: 'php/phpcode.php',
					type: 'post',
					data: reform,
					processData: false,
					contentType: false,
					success: function(data){

						if(data == "alemail"){
	//						alert("Email Already Exist!");
							toastr.error("Email Already Exist!");
							document.getElementById("u_email").style.borderColor = "red";
						}else if(data == "success")
						{
							toastr.success("Register Successfully");
							$("#regis").attr("disabled","disabled");
							$("#register_popup")[0].reset();
							document.getElementById("u_name").style.borderColor = "#28a745";
							document.getElementById("u_email").style.borderColor = "#28a745";
							document.getElementById("u_phn").style.borderColor = "#28a745";
							document.getElementById("u_org").style.borderColor = "#28a745";
							document.getElementById("u_work").style.borderColor = "#28a745";
							document.getElementById("u_pass").style.borderColor = "#28a745";
							document.getElementById("u_cpass").style.borderColor = "#28a745";
							document.getElementById("u_faci").style.borderColor = "#28a745";
							document.getElementById("nhs_num").style.borderColor = "#28a745";
							document.getElementById("role").style.borderColor = "#28a745";
	//						alert("Register Successfully");

						}else if(data == "nhserror"){
								 toastr.error("Wrong NHS Number");
						}
						else{
							toastr.error("Did not Register Successfully");
						}

	//				if(reform){
	//					$("#regis").attr("disabled","disabled");
	//					$("#register_popup")[0].reset();
	//					alert("Register Successfully");
	//					
	//				}else{
	//					alert("Sorry Not Registered!");
	//				}
					}

				
				});	

					}else {
						toastr.error("Make Sure! You Have Read Privacy Policy!");
					}

			}else{
//			alert("Both Password are not match");
			toastr.error("Both Password are not match!");
			document.getElementById("u_pass").style.borderColor = "red";
			document.getElementById("u_cpass").style.borderColor = "red";
		}
			
		}else {
			toastr.error("Please fill all fields!");
//			alert("Please fill all fields!");
		}
		
	});

// for login

$("#login_popup").on("submit", function(e)
					 {
	e.preventDefault();
	
	var logemail = $('#u_em').val();
	var logpass = $('#u_pass').val();
	
	if(logemail != '' && logpass != ''){
		
		var loginform = new FormData(this);
		
		loginform.append("loginpage","btn");
		
		$.ajax({
			
			url: 'php/phpcode.php',
			type: 'post',
			data: loginform,
			contentType: false,
			processData: false,
			success: function(data){
				alert(data);
				if(data == "empasserr"){
//					alert("Email Password Wrong!");
					toastr.error("Email Password Wrong!");
				}
				else if(data == "apperror"){
//					alert('You are not approved');
					toastr.error("Please fill all fields!");
				}
				else if (data == "subadmin"){
//					alert("Welcome");
					window.location.href = "sub_admin/index.php";
				}else if(data == "servicead"){
					window.location.href = "service_definer/index.php";
				}
				else if(data == "gprefferer"){
					window.location.href = "Gprefferer/index.php";
				}
				else if(data == "consultant"){
					window.location.href = "Consultant/index.php";
				}else if(data == "dentist"){
				
					window.location.href = "Dentist/index.php";
				}
				else if(data == "gpractional"){
				
					window.location.href = "General_Practitional/index.php";
				}
				else if(data == "cnurse"){
				
					window.location.href = "Community_nurse/index.php";
				}else if(data == "gptuser"){
					window.location.href = "Gprefferer/index.php";
				}
			}
				
		});
	}else{
//		alert("Please fill all fields!");
		toastr.error("Please fill all fields!");
		document.getElementById("u_em").style.borderColor = "red";
		document.getElementById("u_pass").style.borderColor = "red";
	} 
	
});



//for new register
$("#reg_form").on("submit", function(e)
	{
		e.preventDefault();
		
		var fname = $('#conname').val();
		var sname = $('#consname').val();
		var email = $('#conemail').val();
		var pass = $('#conpass').val();
		var orgtype = $('#orgtype').val();
		var title = $('#title').val();
		var orgname = $('#orgname').val();
		var orgphno = $('#orgphno').val();
		var orgaddress = $('#orgaddress').val();
		var proregno = $('#proregno').val();
		var orgcode = $('#orgcode').val();
		var address = $('#1staddress').val();
		var city = $('#city').val();
		var postcode = $('#postcode').val();
		var role = $('#conrole').val();
		
		if(fname != '' && sname != '' && email != '' && phn != '' && org != '' && work != '' && pass != '' && cpass != '' && faci != '' && nhs_num != '' && role != ''){
			
			if(pass == cpass){

					if($('#flexCheckDefault').prop('checked') == true){

						var reform = new FormData(this);
					reform.append("registeruser","btn");

				$.ajax({
					url: 'php/phpcode.php',
					type: 'post',
					data: reform,
					processData: false,
					contentType: false,
					success: function(data){

						if(data == "alemail"){
	//						alert("Email Already Exist!");
							toastr.error("Email Already Exist!");
							document.getElementById("u_email").style.borderColor = "red";
						}else if(data == "success")
						{
							toastr.success("Register Successfully");
							$("#regis").attr("disabled","disabled");
							$("#register_popup")[0].reset();
							document.getElementById("u_name").style.borderColor = "#28a745";
							document.getElementById("u_email").style.borderColor = "#28a745";
							document.getElementById("u_phn").style.borderColor = "#28a745";
							document.getElementById("u_org").style.borderColor = "#28a745";
							document.getElementById("u_work").style.borderColor = "#28a745";
							document.getElementById("u_pass").style.borderColor = "#28a745";
							document.getElementById("u_cpass").style.borderColor = "#28a745";
							document.getElementById("u_faci").style.borderColor = "#28a745";
							document.getElementById("nhs_num").style.borderColor = "#28a745";
							document.getElementById("role").style.borderColor = "#28a745";
	//						alert("Register Successfully");

						}else if(data == "nhserror"){
								 toastr.error("Wrong NHS Number");
						}
						else{
							toastr.error("Did not Register Successfully");
						}

	//				if(reform){
	//					$("#regis").attr("disabled","disabled");
	//					$("#register_popup")[0].reset();
	//					alert("Register Successfully");
	//					
	//				}else{
	//					alert("Sorry Not Registered!");
	//				}
					}

				
				});	

					}else {
						toastr.error("Make Sure! You Have Read Privacy Policy!");
					}

			}else{
//			alert("Both Password are not match");
			toastr.error("Both Password are not match!");
			document.getElementById("u_pass").style.borderColor = "red";
			document.getElementById("u_cpass").style.borderColor = "red";
		}
			
		}else {
			toastr.error("Please fill all fields!");
//			alert("Please fill all fields!");
		}
		
	});
// for forgot password link send

$("#forgot_popup").on("submit", function(e){
	e.preventDefault();
	
	var p_email = $('#f_email').val();
	
	if(p_email != ''){
		
		var forgot_pass = new FormData(this);
		forgot_pass.append("passmailsend","btn");
		
		$.ajax({
			url: 'php/phpcode.php',
			type: 'post',
			data: forgot_pass,
			contentType: false,
			processData: false,
//			beforeSend: function(){
//				$('#app').show();
//			},
			success: function(data){
				if(data == "wrongmail"){
//					alert("Wrong E-Mail");
					toastr.error("Wrong E-Mail");
				}else{
					$("#mailsendbtn").attr("disabled","disabled");
					$("#forgot_popup")[0].reset();
//					alert("Mail has been send!");
					toastr.success("Mail has been send! to" + p_email);
//					$('#app').hide();
				}
			}
			
		});
		
	}else{
//		alert("Please fill all fields!");
		toastr.error("Please fill all fields!");
		document.getElementById("f_email").style.borderColor = "red";
	}
	
});

// for update pass
$("#reset_pass").on("submit", function(e){
	e.preventDefault();
	
	var r_pass = $("#r_pass").val();
	var r_cpass = $("#r_cpass").val();
	
	if(r_pass != '' && r_cpass != ''){
		
		if(r_pass == r_cpass){
			
			var reset_pass = new FormData(this);
			reset_pass.append("resetpass","btn");
			
			$.ajax({
				url: 'php/phpcode.php',
				type: 'post',
				data: reset_pass,
				processData: false,
				contentType: false,
				success: function(data){
					if(data == "notfoundcode"){
//						alert("Wrong Code! Please Click on the link again");
						toastr.error("Wrong Code! Please Check your link again");
					}
					else if(data == "notupdpass"){
//						alert("Not Updated");
						toastr.error("Something went wrong");
					}else {
						$("#btnsave").attr("disabled","disabled");
						$("#reset_pass")[0].reset();
//						alert("Updated Successfully");
						toastr.success("Your Password has been updated!");
					}
				}
				
			});
			
		}else{
//			alert("Both Password are not match!");
			toastr.error("Both Password are not match!");
			document.getElementById("r_pass").style.borderColor = "red";
			document.getElementById("r_cpass").style.borderColor = "red";
		}
		
	}else{
//		alert("Please fill all fields!");
		toastr.error("Please fill all fields!");
		document.getElementById("r_pass").style.borderColor = "red";
		document.getElementById("r_cpass").style.borderColor = "red";
	}
	
});

// for contact msg

$('#contact_form').on("submit", function(e){
	e.preventDefault();
	
	var cname = $('#conname').val();
	var cemail = $('#conemail').val();
	var csubject = $('#consubject').val();
	var cphn = $('#conphn').val();
	var cmsg = $('#conmsg').val();
	
	if(cname != '' && cemail != '' && csubject != '' && cphn != '' && cmsg != ''){
		
//		var form_btn = $(form).find('button[type="submit"]');
		var conform = new FormData(this);
		conform.append("contactinsert", "btn");
		
		$.ajax({
			url: 'php/phpcode.php',
			type: 'POST',
			data: conform,
			contentType: false,
			processData: false,
			success: function(conform){
				if(conform == 'conmail'){
					
//					$("#btncon").attr("disabled","disabled");
//						form_btn.html(form_btn.prop('disabled', false).removeAttr("loading-text"));
						$("#contact_form")[0].reset();
						document.getElementById("conname").style.borderColor = "#28a745";
						document.getElementById("conemail").style.borderColor = "#28a745";
						document.getElementById("consubject").style.borderColor = "#28a745";
						document.getElementById("conphn").style.borderColor = "#28a745";
						document.getElementById("conmsg").style.borderColor = "#28a745";
//						alert("Register Successfully");
						toastr.success("Mail Send Successfully");
					
				}else {
					toastr.error("Something Went Wrong!");
				}
			}
			
		});
		
	}else {
		toastr.error("Please fill all fields!");
	}
	
});