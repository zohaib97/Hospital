<script>
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
// for manager

	$('#staffadd').on("submit", function(e){
		e.preventDefault();
		
		var stafffname = $('#fname').val();
		var staffsname = $('#sname').val();
		var staffemail = $('#email').val();
		var staffpass = $('#pass').val();
		var staffcpas = $('#cpass').val();
		var staffphn = $('#pno').val();
		var staffdepart = $('#depart').val();
		var staffdob = $('#dob').val();
		var staffregi = $('#rno').val();
		var staffrole = $('#role').val();
		
		if(stafffname != '' && staffsname != '' && staffemail != '' && staffpass != '' && staffcpas != '' && staffphn != '' && staffdepart != '' && staffdob != '' && staffrole != ''){
			
			if(staffpass == staffcpas){
							
				var staffform = new FormData(this);
				staffform.append("satffbtn","btn");
				
				$.ajax({
					url: 'phpcode.php',
					type: 'POST',
					data: staffform,
					processData: false,
					contentType: false,
					success: function(data){
						if(data == "emailalready"){
//							alert("Email Already Exist!");
							toastr.clear();
							NioApp.Toast("<h5>Email Already Exist</h5>", 'error',{position:'top-right'});
							document.getElementById("email").style.borderColor = "red";
						}else{
//							alert("Data Inserted Successfully");
//							$("#btnstaffdis").attr("disabled","disabled");
							$("#staffadd")[0].reset();
							document.getElementById("fname").style.borderColor = "#28a745";
							document.getElementById("sname").style.borderColor = "#28a745";
							document.getElementById("email").style.borderColor = "#28a745";
							document.getElementById("pass").style.borderColor = "#28a745";
							document.getElementById("cpass").style.borderColor = "#28a745";
							document.getElementById("pno").style.borderColor = "#28a745";
							document.getElementById("depart").style.borderColor = "#28a745";
							document.getElementById("dob").style.borderColor = "#28a745";
							document.getElementById("role").style.borderColor = "#28a745";
							toastr.clear();
							NioApp.Toast("<h5>Data Inserted Successfully</h5>", 'error',{position:'top-right'});
						}
					}
				});
				
			}else {
//				alert('Both password are not match!');
				toastr.clear();
					NioApp.Toast("<h5>Both password are not match!</h5>", 'error',{position:'top-right'});
				document.getElementById("pass").style.borderColor = "red";
				document.getElementById("cpass").style.borderColor = "red";
			}
		}else{
//			toastr.error("Please fill all fields!");
//			alert('Please fill all fields!');
			toastr.clear();
               NioApp.Toast("<h5>All Fields are required</h5>", 'error',{position:'top-right'});
			document.getElementById("fname").style.borderColor = "red";
			document.getElementById("sname").style.borderColor = "red";
			document.getElementById("email").style.borderColor = "red";
			document.getElementById("pass").style.borderColor = "red";
			document.getElementById("cpass").style.borderColor = "red";
			document.getElementById("pno").style.borderColor = "red";
			document.getElementById("depart").style.borderColor = "red";
			document.getElementById("dob").style.borderColor = "red";
			document.getElementById("role").style.borderColor = "red";
		}
	});

</script>