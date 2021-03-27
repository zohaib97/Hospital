
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

                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <h5>Patients list</h5>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <a href="createpatient.php" type="button"
                                                            class="btn btn-primary float-right">Create New Patient</a>

                                                    </div>
                                                </div>
                                                <hr>

                                                <div class="tab-content">
                                                    <div class="row align-item-center">
                                                        <div class=" col-md-4  pb-2">
                                                          
                                                        </div>
                                                        <div class=" col-md-4 pb-2 d-flex">
                                                              <a href="#" type="button" class="btn btn-primary mr-2 " id="nhs"
                                                                style="font-size: 12px;">By Demographics</a>
                                                             <a href="javascript:void(0)" onclick="javascript:$('#nhsdiv').show();$('#nhsno').hide();" type="button" class="btn btn-primary  "  
                                                                style="font-size: 12px;">By NHS No</a>
                                                        </div>
                                                        <div class="col-md-2 res" id="btn">

                                                        </div>
                                                        <div class="col-md-2 res" id="btn2">

                                                        </div>

                                                    </div>
                                                    <br>
                                                    <div class="row"style="display: none;" id="nhsdiv">
                                                         <div class=" col-md-3 mx-auto">
                                                            <div class="form-group">
                                                                  <label for="">NHS No</label>
                                                                <input style="border-color: #000000 ;"
                                                                    class="form-control" placeholder="search NHS NO"
                                                                    type="number" max="3" length id="nh3" value="NH-"
                                                                    oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                                                    maxlength="10" required
                                                                    onChange="ssearch(this.value)" id="nhs3">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row " id="nhsno" style="display: none;">
                                                        <div class="col-md-2 mx-auto  ">
                                                            <span></span>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <label for="">Name</label>
                                                            <input style="border-color: #000000" class="form-control"
                                                                type="text" max="3" placeholder="Name" length id="nm"
                                                                value="" required autocomplete="off" onChange="showsearch()">
                                                        </div>
                                                        <div class="col-md-2 pb-4">
                                                            <label for="">Surname</label>
                                                            <input style="border-color: #000000" class="form-control"
                                                                type="text" placeholder="Surname"  onChange="showsearch()" id="em" required
                                                                autocomplete="off">
                                                        </div>
                                                        <div class="col-md-2 pb-4">
                                                            <label for="">Date of birth</label>
                                                            <input style="border-color: #000000;"
                                                                class="form-control datepicker" type="text"
                                                                placeholder="Date Of Birth" id="dob" required
                                                                onChange="showsearch()" autocomplete="off">
                                                        </div>
                                                        <div class="col-md-2" id="btn2">

                                                        </div>
                                                        <div class="col-md-2" id="btn">

                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="mb-4" id="tabItem6">


                                                </div>
                                                <div class="nk-block nk-block-lg" id="adata">


                                                </div>



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
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Patient Details</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
     <div class="row">
         <div class="col-md-6">
             <h6>Title</h6>
             <p id="title"></p>
         </div>
         
         <div class="col-md-6">
             <h6>Name</h6>
             <p id="name"></p>
         </div>
         
         <div class="col-md-6">
             <h6>Email</h6>
             <p id="email"></p>
         </div>
         
         <div class="col-md-6">
             <h6>NHs No</h6>
             <p id="nhsnoo"></p>
         </div>
         <div class="col-md-6">
             <h6>Date Of Birth</h6>
             <p id="dobbb"></p>
         </div>
            <div class="col-md-6">
             <h6>House No</h6>
             <p id="hnoas"></p>
         </div>
            <div class="col-md-6">
             <h6>Street Name</h6>
             <p id="street"></p>
         </div>
            <div class="col-md-6">
             <h6>Country</h6>
             <p id="country"></p>
         </div>
            <div class="col-md-6">
             <h6>City</h6>
             <p id="city"></p>
         </div>
         <div class="col-md-6">
             <h6>Postal Code</h6>
             <p id="postss"></p>
         </div>
         <div class="col-md-6">
             <h6>TelePhone Number</h6>
             <p id="tele"></p>
         </div>
         <div class="col-md-6">
             <h6>Mobile Number</h6>
             <p id="mob"></p>
         </div>
         
     </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
</body>
<script>
	function fetchpatientdetails(title,name,email,nhsno,dob,hno,street,country,city,post,tele,mob){
    $("#title").html(title); 
    $("#name").html(name);
    $("#email").html(email);
    $("#nhsnoo").html(nhsno);
    $("#dobbb").html(dob);
    $("#hnoas").html(hno);
    $("#street").html(street);
    $("#country").html(country);
    $("#city").html(city);
    $("#postss").html(post);
    $("#tele").html(tele);
    $("#mob").html(mob);
$("#exampleModalCenter").modal("show");
    }


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
        dateformat:"d-m-Y",
        clearBtn: true
    });


    // FOR DEMO PURPOSE
    $('#reservationDate').on('change', function() {
        var pickedDate = $('input').val();
        $('#pickedDate').html(pickedDate);
    });
});









function ssearch(ddd) {
    $('#nhs3').attr('readonly', true);
    var nhs3 = $('#nhs3').val();

    var btn = document.getElementById('btn').innerHTML =
        '<a href="javascript:void(0)" class="btn btn-info" id="patient" onClick="spatient(' + ddd + ')">Search</a>';
    document.getElementById('btn2').innerHTML =
        '<a href="javascript:void(0)" class="btn btn-primary" id="patient" onClick="res()">Reset</a>';


};

function spatient(ddd) {
    $.ajax({
        type: "POST",
        url: "phpcode2.php",
        data: {
            nsh: ddd,
            patientfetch: "btn"
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

function res() {
    $('#nh3').val('');
    $('#nh3').prop('readonly', false);
};



$(document).ready(function() {
    $("#nhs").click(function() {
        $("#nhsno").show();
        $("#nhsdiv").hide();
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
        // $('#dob').val('');
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
</script>