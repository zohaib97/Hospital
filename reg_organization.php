<?php
include_once('database/db.php');

?>

<!DOCTYPE html>
<html lang="zxx">
<?php
	include_once('header.php');
	?>
<style>

.appointment-form-ma .form-control {
    height: 43px !important;
}
</style>

<body>

    <!-- START PRELOADER -->
    <div id="page-preloader">
        <div class="preloader-wrench"></div>
    </div>
    <!-- END PRELOADER -->

    <!-- START HEADER SECTION -->
    <?php
	include_once('headernav.php');
	?>
    <!-- END HEADER SECTION -->
<style>
.select2-container--default .select2-selection--single{
    height:44px !important;
}
.select2-container--default .select2-selection--single .select2-selection__rendered{
    line-height: 40px !important;
}
    .select2-container--default .select2-selection--single .select2-selection__arrow{
            height: 10px !important; 
    }
</style>
    <!-- START PAGE BANNER AND BREADCRUMBS -->
    <section class="single-page-title-area" data-background="assets/img/bg/heading.png">
        <div class="auto-container">
            <div class="row">
                <div class="col-lg-8 col-md-8 col-sm-12 col-12">
                    <div class="single-page-title">
                        <h2>Register Organisation</h2>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#"><span class="lnr lnr-home"></span></a></li>
                        <li class="breadcrumb-item">Pages</li>
                        <li class="breadcrumb-item active">Register</li>
                    </ol>
                </div>
            </div>
            <!-- end row-->
        </div>
    </section>
    <!-- END PAGE BANNER AND BREADCRUMBS -->


    <!-- START APPOINTMENT SECTION -->
    <section id="appointment" class="">
        <div class="auto-container">
            <!--<div class="row">-->
            <!--    <div class="col-lg-8 text-center mx-auto">-->
            <!--        <div class="section-title">-->
            <!--            <h3> Register <span>Organisation</span></h3>-->
            <!--            <span class="line"></span>-->
            <!--        </div>-->
            <!--    </div>-->
                <!-- end section title -->
            <!--</div>-->
            <div class="row mb-3">
                <div class="col-lg-8 mx-auto mt-2">
                    <div class="appointment-form-ma">
                        <form method="post" id="oradd" enctype="multipart/form-data">
                            <div class="row" id="form1">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="col-form-label" for="oname">Organisation Name</label>

                                        <input type="text" class="form-control form-control-sm" id="oname" value=""
                                            placeholder="Enter Name" name="oname" autocomplete="off" required >
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="col-form-label" for="otype">Organisation Type</label>
                                       		<select  class="form-control form-control-sm select1" id="otype" name="otype" style=" height: 44px !important;"  required>
                                       		    <option value="">-Select Type-</option>
                                                        <?php
                                                        $sql = mysqli_query($con,"SELECT * FROM organisation_type");
                                                    if(mysqli_num_rows($sql)>0)
                                                    {

                                                    
                                                       while($fetc = mysqli_fetch_array($sql))
                                                       {
                                                        ?>
                                                        <option value="<?=$fetc['ort_name']?>"><?=$fetc['ort_name']?></option>
                                                        <?php
                                                       }
                                                    }
                                                        ?>
                                                        </select>
                                                        <!--<input type="text" class="" id="otype" name="otype"-->
                                            <!--placeholder="Enter Type" name="otype" autocomplete="off" required>-->
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="col-form-label" for="ocontact">Organisation Phone no</label>
                                        <input type="number" class="form-control form-control-sm " id="ocontact"
                                            placeholder="Enter Contact" name="ocontact" autocomplete="off" required onchange="stringlength(this.value)">
                                            <small id="valid-nhs"></small>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="col-form-label" for="oaddress">Organisation First Line Address</label>
                                        <input type="text" class="form-control form-control-sm " id="oaddress"
                                            placeholder="Enter First Line Address" name="oaddress" autocomplete="off" required  >
                                            
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="col-form-label" for="ocode">Organisation Code</label>
                                        <input type="text" class="form-control form-control-sm " id="ocode"
                                            placeholder="Enter Code" name="ocode" autocomplete="off" required onchange="stringlength1(this.value)">
                                            <small id="valid-nhs1"></small>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="col-form-label" for="ofaddress">Organisation Second Line Address</label>
                                        <input type="text" class="form-control form-control-sm " id="ofaddress"
                                            placeholder="Enter Second Line Address" name="ofaddress" autocomplete="off" required
                                            >
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="col-form-label" for="ocity">Organisation City</label>
                                        <input type="text" class="form-control form-control-sm " id="ocity"
                                            placeholder="Enter City" name="ocity" autocomplete="off" required >
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="col-form-label" for="opost">Organisation Post code</label>
                                        <input type="text" class="form-control form-control-sm " id="opost"
                                            placeholder="Enter Post Code" name="opost" autocomplete="off" required >
                                    </div>
                                </div>
                                <!--
												<div class="col-12">
													<div class="custom-control custom-switch">
														<input type="checkbox" class="custom-control-input" id="latest-sale">
														<label class="custom-control-label" for="latest-sale">Use full name to display </label>
													</div>
												</div>
-->
                                <div class="col-md-6" id="regishide">
                                    <div class="form-group">
                                    <button  class="btn btn-apfm" type="submit" value="Save"
                                            id="btnhospital" onclick="clic()" >save <i
                                        class="icofont icofont-thin-right"></i></button>
                                      
                                    </div>
                                </div>
                            </div>


                            


                            


                        </form>
                    </div>
                </div>
                <!-- end col -->
            </div>
        </div>
        <!--- END CONTAINER -->
    </section>
    <!-- END APPOINTMENT SECTION -->
    <?php
			$query = mysqli_query($con,"SELECT * FROM privacy_policy");
			$fetch = mysqli_fetch_array($query);
			?>
    <!-- Modal -->
    <div class="modal fade" id="exampleModalScrollable" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="exampleModalScrollableTitle">Privacy Policy</h3>
                    <button type="button" class="close" onClick="showmodal()" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body pre-scrollable">
                    <h4><?=$fetch['ptitle']?></h4>
                    <p><?=$fetch['pdescription']?></p>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger btn-round btn-sm" data-dismiss="modal"
                        onClick="showmodal()">Close</button>
                    <button type="button" class="btn btn-primary btn-round btn-sm" onClick="showmodal()">I have
                        Read</button>
                </div>
            </div>
        </div>
    </div>


    <!-- START FOOTER -->
    <?php
	include_once('footer.php');
	?>
    <!-- END FOOTER -->




</body>
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
function stringlength(num)
{ 
 
var no = num;
var mnlen = 5;
var mxlen = 15;
if(no.length<mnlen || no.length> mxlen)
{ 
    
$("#valid-nhs").html("Please enter number between 5 to 15 digits").removeClass("text-success").addClass("text-danger");
$("#valid-nhs").show();

}
else
{
    $("#valid-nhs").hide();
}
}

function stringlength1(num)
{ 
 
var no = num;
var mnlen = 3;
var mxlen = 10;
if(no.length<mnlen || no.length> mxlen)
{ 
    
$("#valid-nhs1").html("Please enter number between 3 to 10 digits").removeClass("text-success").addClass("text-danger");
$("#valid-nhs1").show();

}
else
{
    $("#valid-nhs1").hide();
}
}
	$("#oradd").on('submit', function(e){
		
        	e.preventDefault();
		var formdata = new FormData(this);
		formdata.append("addorginaztion","btn");
        $.ajax({ 
            type: 'POST',
            url: 'php/phpcode.php',
            data: formdata,
            contentType: false,
            processData:false,
           
            success: function(data)
           
            {
               
                if(data == 'Error'){
                 
         toastr.error("Organisation Didn't Add Successfully");
                }else if (data == "already"){
				
               toastr.warning("Organisation Postcode Already Created");
				}
				else if (data == "alreadycode"){
				
               toastr.warning("Organisation Code Already Created");
				}
				else if(data == "sss")
					{
					$('#oradd')[0].reset();
				
                toastr.success("Organisation Added Successfully");
					    swal("Success!", "Organisation has been registered please wait for admin approvel.", "success"); 
					     setTimeout(() => {
                              window.location.href="index.php";
}, 1500);
                }
			
                $('#oradd').css("opacity","");
                $("#btnhospital").removeAttr("disabled");
            }
			
        });

    });
    function clic(){

}
	</script>

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</html>