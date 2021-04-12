<?php
include_once('../database/db.php');

?>

<!DOCTYPE html>
<html lang="zxx" class="js">

<?php
	include_once('header.php');
	?>
<style>
@media screen and (min-width: 220px) and (max-width: 768px) {
    .res {
        width: 50%;
    }
}

.datepicker {
    min-width: 0px !important;
}
</style>

<body class="nk-body bg-lighter npc-default has-sidebar ">
    <div class="nk-app-root">
        <!-- main @s -->
        <div class="nk-main ">
            <!-- sidebar @s -->
            <?php
			include_once('sidebar.php')
			?>
            <!-- sidebar @e -->
            <!-- wrap @s -->
            <div class="nk-wrap ">
                <!-- main header @s -->
                <?php
				include_once('headernav.php');
				?>
                <!-- main header @e -->
                <!-- content @s -->
                <div class="nk-content ">
                    <div class="container-fluid">
                        <div class="nk-content-inner">
                            <div class="nk-content-body">
                                <div class="components-preview wide-md mx-auto">
                                    <!-- <a href="createpatient.php" type="button" class="btn btn-primary float-right " >Create New Patient</a> -->
                                    <div class="nk-block nk-block-lg">

                                        <div class="card card-preview">
                                            <div class="card-inner">
                                                <form method="post" id="appinsert">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <h5>Create Appointment</h5>
                                                    </div>
                                                    
                                                </div>
                                                <hr>

                                                <div class="tab-content">
                                                    <div class="row">
                                                       
                                                        <div class=" col-md-3 pb-2">
                                                            <div class="form-group">
                                                            <label for="ubrn">Enter UBRN Number</label>
                                                             <?php
                                                            if(isset($_GET['ubrn']))
                                                            {
                                                                $ubrn =$_GET['ubrn'];
                                                              ?>  
                                                                <input type="number" class="form-control" name="ubrn" id="ubrn"
                                                                oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
												   maxlength="12" value="<?=$ubrn?>" readonly>
												   <?php
                                                                 }
                                                            ?>

                                                            </div>
                                                        </div>
                                                        <div class="col-md-2 res" id="btn">

                                                        </div>
                                                        <div class="col-md-1 res" id="btn2">

                                                        </div>

                                                    </div>
                                                    <br>
                                                    

                                                </div>
                                                <div class="mb-4" id="tabItem6">
                                                

                                                </div>
                                                <div class="mb-4" id="tabItem7">
                                                

                                                </div>
                                                <div class="mb-4" id="tabItem8">
                                                <div class=" col-md-3 pb-2">
                                                            <div class="form-group">
                                                            <label for="iwt">Indicative Wait Time (Days)</label>
                                                                <input type="number" class="form-control" name="iwt" id="iwt">

                                                            </div>
                                                        </div>

                                                </div>

                                                <button type="submit" name="btnsubmit" id="btnsubmit" class="btn btn-info" style="display: none;">Submit</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>











                                    <!-- <div class="nk-block-head nk-block-head-lg wide-sm">
                                   <div class="row">
                                   <div class="col-md-6 col-sm-6 col-12">
                                   <h2 class="nk-block-title fw-normal">Patients list</h2>
                                   </div>
                                   <div class="col-md-6 col-sm-6 col-12">
                                   <a href="createpatient.php" type="button" class="btn btn-primary " >Create New Patient</a>
                                 </div>

                            
                                   </div>
                                   
                                    <div class="row">
                                    <div class=" col-md-2 pb-2">
                                   <a href="#" type="button" class="btn btn-primary float-right " id="nhs" style="font-size: 12px;">Demographics</a>
                                    </div>
                                    <div class=" col-md-3 pb-2">
                                   <div class="form-group" >
                                   <input style="border-color: #000000 ;" class="form-control" placeholder="search NHS NO" type="number" max="3" length id="nh3" value="NH-"
                                   oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
												   maxlength="10" required onChange="ssearch(this.value)" id="nhs3" >
                                   </div>
                                   </div>
                                   <div class="col-md-2 res" id="btn">

					                     </div>
                                            <div class="col-md-1 res" id="btn2">

											</div>
                                   
                                     </div>
                                    
                                     <div class="row " id="nhsno" style="display: none;">
										<div class="col-md-3 mx-auto  "> 
											<span></span>
											</div>
											<div class="col-md-2">
                                                <label for="">Name</label>
											<input style="border-color: #000000" class="form-control" type="text" max="3" placeholder="Name" length id="nm" value=""
												   required  autocomplete="off">
									</div>
											<div class="col-md-2">
                                            <label for="">Surname</label>
											<input style="border-color: #000000" class="form-control" type="text" placeholder="Surname" id="em" required  autocomplete="off">
											</div>
									<div class="col-md-2">
                                    <label for="">Date of birth</label>
											<input style="border-color: #000000;width: 117px;" class="form-control datepicker" type="text" placeholder="Date Of Birth"  id="dob"
												   required onChange="showsearch()" autocomplete="off">
											</div>
											<div class="col-md-2" id="btn2">

											</div>
											<div class="col-md-2" id="btn">

											</div>
										</div>
                                       
                                    </div>
                                    <div class="mb-4" id="tabItem6">
							
							
								</div> -->
                                    <!-- <div class="nk-block nk-block-lg" id="adata">


                                    </div> -->
                                     <!-- nk-block -->
                                </div><!-- .components-preview -->
                            </div>
                        </div>
                    </div>
                </div>
                <!-- content @e -->
                <!-- footer @s -->
                <?php
				include_once('footer.php');
				?>
                <!-- footer @e -->
            </div>
            <!-- wrap @e -->
        </div>
        <!-- main @e -->
    </div>
    <!-- Modal Form -->
    <div class="modal fade" tabindex="-1" id="modalForm2">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Manager Info</h5>
                    <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                        <em class="icon ni ni-cross"></em>
                    </a>
                </div>
                <div class="modal-body">
                    <form class="form-validate is-alter" id="aupdate" method="post">
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label class="form-label" for="first_name">First Name</label>
                                <div class="form-control-wrap">
                                    <input type="text" value="" id="mid" hidden="true" name="mid">
                                    <input type="text" value="" id="roleid" hidden="true" name="roleid">
                                    <input type="text" class="form-control" id="first_name" name="fname" required>
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <label class="form-label" for="sure_name">Sure Name</label>
                                <div class="form-control-wrap">
                                    <input type="text" class="form-control" id="sure_name" name="sname" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label class="form-label" for="memail">Email</label>
                                <div class="form-control-wrap">
                                    <input type="email" class="form-control" id="memail" required name="memail">
                                </div>
                            </div>

                            <div class="form-group col-md-6">
                                <label class="form-label" for="mpass">Password</label>
                                <div class="form-control-wrap">
                                    <input type="text" class="form-control" id="mpass" required name="mpassword">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label class="form-label" for="contact">Contact</label>
                                <div class="form-control-wrap">
                                    <input type="text" class="form-control" id="mcontact" required name="mcontact">
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <label class="form-label" for="password">Department</label>
                                <div class="form-control-wrap">
                                    <input type="text" class="form-control" id="mdepart" required name="mdepart">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label class="form-label" for="password">Date of Birth</label>
                                <div class="form-control-wrap">
                                    <input type="text" class="form-control" id="mdob" required name="mdob">
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <button type="submit" class="btn btn-lg btn-primary" id="adminupdate">Save
                                    Informations</button>
                            </div>
                        </div>

                    </form>
                </div>
                <div class="modal-footer bg-light">
                    <span class="sub-text">Manager Update</span>
                </div>
            </div>
        </div>
    </div>
    <!-- app-root @e -->
    <script src="assets/js/example-toastr.js?ver=2.2.0"></script>
</body>
<script>
// 	function fetchadmindata()
// {
// 	 $.ajax({    
//     type: "POST",
//     url: "phpcode.php", 
// 	data:{fetchpatient:"btn"},          
//     success: function(response){                    
//         $("#adata").html(response); 
//         //alert(response);
//     }

// });
// }
// 	$(document).ready(function(){
// 		fetchadmindata();
// 	});
function confirm(id) {
    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes, delete it!'
    }).then(function(result) {
        if (result.value) {
            Swal.fire('Deleted!', 'Manager has been deleted.', 'success');
            deleteadmin(id);
        }
    });
}

function deleteadmin(id) {

    var vid = id;
    $.ajax({
        type: 'POST',
        url: 'phpcode.php',
        data: {
            vid: vid,
            deladmin: "btn"
        },

        success: function(data) {

            if (data == 'Error') {

                toastr.clear();
                NioApp.Toast("<h5>Manager Didn't Delete</h5>", 'error', {
                    position: 'top-right'
                });
            } else if (data == 'Success') {

                toastr.clear();
                NioApp.Toast("<h5>Manager Delete Successfully</h5>", 'success', {
                    position: 'top-right'
                });
                fetchadmindata();
            }


        }
    });
};

function aprovenotaprove(id, status) {


    var name = status;
    var ide = id;


    $.ajax({
        type: 'POST',
        url: 'phpcode.php',
        data: {
            method: name,
            id: ide,

        },

        success: function(data) {

            if (data == 'Error') {
                toastr.clear();
                NioApp.Toast("<h5>Manager didn't Updated</h5>", 'error', {
                    position: 'top-right'
                });

            } else if (data == 'Success') {
                if (name == 'mactive') {

                    toastr.clear();
                    NioApp.Toast("<h5>Manager De-Activated</h5>", 'error', {
                        position: 'top-right'
                    });
                    fetchadmindata();
                } else {
                    toastr.clear();
                    NioApp.Toast("<h5>Consultant Activated Successfully</h5>", 'success', {
                        position: 'top-right'
                    });
                    fetchadmindata();

                }
            }


        }
    });
};

function openmodal1(id, fname, sname, email, pass, contact, depart, dob, roleid) {
    $('#mid').val(id);
    $('#roleid').val(roleid);
    $('#first_name').val(fname);
    $('#sure_name').val(sname);
    $('#memail').val(email);
    $('#mpass').val(pass);
    $('#mcontact').val(contact);
    $('#mdepart').val(depart);
    $('#mdob').val(dob);

    $('#modalForm2').modal('show');
};
$("#aupdate").on('submit', function(e) {
    e.preventDefault();

    var formdata = new FormData(this);
    formdata.append("updatehadmin", "btn");
    $.ajax({
        type: 'POST',
        url: 'phpcode.php',
        data: formdata,
        contentType: false,
        processData: false,
        beforeSend: function() {
            $('#adminupdate').attr("disabled", "disabled");
            $('#aupdate').css("opacity", ".5");
        },
        success: function(data) {
            //				alert(data);
            if (data == 'Error') {
                toastr.clear();
                NioApp.Toast("<h5>Manager didn't update Successfully</h5>", 'error', {
                    position: 'top-right'
                });
            } else if (data == 'Success') {
                $('#aupdate')[0].reset();
                toastr.clear();
                NioApp.Toast("<h5>Manager Updated Successfully</h5>", 'success', {
                    position: 'top-right'
                });
                fetchadmindata();
                $('#modalForm2').modal('hide');

            }

            $('#aupdate').css("opacity", "");
            $("#adminupdate").removeAttr("disabled");
        }

    });

});
</script>

</html>
<script>
$(function() {

    // INITIALIZE DATEPICKER PLUGIN
    $('.datepicker').datepicker({
        clearBtn: true,
        format: "dd/mm/yyyy"
    });


    // FOR DEMO PURPOSE
    $('#reservationDate').on('change', function() {
        var pickedDate = $('input').val();
        $('#pickedDate').html(pickedDate);
    });
});









function ssearch(ddd) {
    $('#nhs3').prop('readonly', true);
    var nhs3 = $('#nhs3').val();

    var btn = document.getElementById('btn').innerHTML =
        '<a href="javascript:void(0)" class="btn btn-info" id="patient" onClick="spatient(' + ddd + ')">Search</a>';
    document.getElementById('btn2').innerHTML =
        '<a href="javascript:void(0)" class="btn btn-primary" id="patient" onClick="res()">Reset</a>';


};

function spatient() {
    $.ajax({
        type: "POST",
        url: "phpcode.php",
        data: {
            ubrn:<?=$ubrn?>,
            apppatientfetch: "btn"
        },
        success: function(response) {

            if (response == 'No Data Found') {
                toastr.clear();
                NioApp.Toast("<h5>No Data found</h5>", 'error', {
                    position: 'top-right'
                });
            }
            console.log(response);
            document.getElementById('tabItem6').innerHTML = response;

            //            $("#tabItem6").html(response); 
            //alert(response);
        }


    });
};

function sservice() {
    $.ajax({
        type: "POST",
        url: "phpcode.php",
        data: {
            ubrn:<?=$ubrn?>,
            appservicefetch: "btn"
        },
        success: function(response) {

            if (response == 'No Data Found') {
                toastr.clear();
                NioApp.Toast("<h5>No Data found</h5>", 'error', {
                    position: 'top-right'
                });
            }
            console.log(response);
            document.getElementById('tabItem7').innerHTML = response;

            //            $("#tabItem6").html(response); 
            //alert(response);
        }


    });
};
$(document).ready(function(){
    spatient();
    sservice();
})
function res() {
    $('#nhs3').val('');
    $('#nhs3').prop('readonly', false);
};



$(document).ready(function() {
    $("#nhs").click(function() {
        $("#nhsno").show();
    });
});

function showsearch() {
    var nm = $('#nm').val();
    var em = $('#em').val();
    if (nm == '' || em == '') {
        toastr.clear();
        NioApp.Toast("<h5>All fields Required</h5>", 'error', {
            position: 'top-right'
        });
        $('#dob').val('');
    } else {
        $('#nm').prop('readonly', true);
        $('#em').prop('readonly', true);
        $('#dob').prop('readonly', true);



        var dob = $('#dob').val();
        // var total = nm+em+dob;

        var btn = document.getElementById('btn').innerHTML =
            '<a href="javascript:void(0)" class="btn btn-info float-right" id="searchpatient" onClick="showpatient()">Search</a>';
        document.getElementById('btn2').innerHTML =
            '<a href="javascript:void(0)" class="btn btn-primary" id="searchpatient" onClick="reset()">Reset</a>';
    }

};

function reset() {
    $('#nm').val('');
    $('#em').val('');
    $('#dob').val('');
    $('#nm').prop('readonly', false);
    $('#em').prop('readonly', false);
    $('#dob').prop('readonly', false);
};



function showpatient() {
    var nm = $('#nm').val();
    var em = $('#em').val();
    var dob = $('#dob').val();

    $.ajax({
        type: "POST",
        url: "phpcode.php",
        data: {
            dob: dob,
            em: em,
            nm: nm,
            searchpatient: "btn"
        },
        success: function(response) {

            if (response == 'No Data Found') {
                toastr.clear();
                NioApp.Toast("<h5>No Data found</h5>", 'error', {
                    position: 'top-right'
                });
            }
            console.log(response);
            document.getElementById('tabItem6').innerHTML = response;

            //            $("#tabItem6").html(response); 
            //alert(response);
        }


    });
};
function showss(checkbox){

    if($(checkbox).prop("checked") == true && $('.gg').prop("checked") == true)
    {
        $('#btnsubmit').show();
    }
    else if($(checkbox).prop("checked") == true && $('.gg').prop("checked") == false)
    {
        $('#btnsubmit').hide();
    }
    else if($(checkbox).prop("checked") == false && $('.gg').prop("checked") == true)
    {
        $('#btnsubmit').hide();
    }
    else if($(checkbox).prop("checked") == false && $('.gg').prop("checked") == false)
    {
        $('#btnsubmit').hide();
    }
}
$("#appinsert").on('submit', function(e){
		e.preventDefault();
	
		var pid = $("input:checkbox[name='check[]']:checked").val();
			var refform = new FormData(this);
			refform.append("check",$("input:checkbox[name='check[]']:checked").val());
			refform.append("checkw",$("input:radio[name='checkw']:checked").val());
			refform.append("refferalid",<?=$fetch["ur_id"]?>);
			refform.append("addapointment","btn");
			
			$.ajax({
				url: 'phpcode.php',
				type: 'post',
				data: refform,
				contentType: false,
				processData: false,
				dataType:"JSON",
				success: function(data){
				
    //	document.getElementById('tabItem7').innerHTML=data;
    //						
				if(data["res"] == "success")
					{
						
             
               $('#appinsert')[0].reset();
						 window.location.href = "appointmentRsummary.php?c_id="+data["c_id"]+"";
					}
					else if(data["res"] == "Error")
						{
							toastr.clear();
               NioApp.Toast("<h5>Something Went Wrong</h5>", 'error',{position:'top-right'});
						}
    //			
					}
				});
				
			});
</script>