<?php
include_once('connect.php');

?>

<!DOCTYPE html>
<html lang="zxx" class="js">

<?php
include_once('header.php');
?>

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
                                    <div class="nk-block-head nk-block-head-lg wide-sm">
                                        <h2 class="nk-block-title fw-normal">Users List</h2>

                                    </div>
                                    <div class="col-md-6">
                                        <label for="Role">Select Role</label>
                                    <select class="form-control" id="Role" onchange="fetchadmindata()">
                                        <option selected>Select</option>
                                  
                           
                                    
                                    <option value="consultant">Consultant</option>
                                    <option value="ServiceDefiner">Service Definer</option>
                                 
							
                                     <option value="GP_Refferer">GP Refferer</option>
                                     <option value="Dentist">Dentists</option>
                                      <option value="Optometrist">Optometrist</option>
                                   
                                      
                                    
                                    <!--<option value="Nurse">Nurse</option>-->
                                    <!--<option value="Dentist">Dentist</option>-->
                                   
                                   
                                    
                                    </select>
                                    </div>
                                    <br>
                                    <div class="nk-block nk-block-lg" id="adata" style="overflow: auto;">

                                    </div> <!-- nk-block -->
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
    <!-- <div class="modal fade" tabindex="-1" id="modalForm1">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Consultant Info</h5>
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
                                    <input type="text" class="form-control" id="first_name" name="fname" autocomplete="off" required>
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <label class="form-label" for="sure_name">Sure Name</label>
                                <div class="form-control-wrap">
                                    <input type="text" class="form-control" id="sure_name" name="sname" autocomplete="off" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label class="form-label" for="memail">Email</label>
                                <div class="form-control-wrap">
                                    <input type="email" class="form-control" id="memail" autocomplete="off" required name="memail">
                                </div>
                            </div>

                            <div class="form-group col-md-6">
                                <label class="form-label" for="mpass">Password</label>
                                <div class="form-control-wrap">
                                    <input type="text" class="form-control" id="mpass" autocomplete="off" required name="mpassword">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label class="form-label" for="contact">Contact</label>
                                <div class="form-control-wrap">
                                    <input type="text" class="form-control" id="mcontact" autocomplete="off" required name="mcontact">
                                </div>
                            </div>
                            
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label class="form-label" for="password">Date of Birth</label>
                                <div class="form-control-wrap">
                                    <input type="text" class="form-control" id="mdob" autocomplete="off" required name="mdob">
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <button type="submit" class="btn btn-lg btn-primary" id="adminupdate">Save Informations</button>
                            </div>
                        </div>

                    </form>
                </div>
                <div class="modal-footer bg-light">
                    <span class="sub-text">Consultant Update</span>
                </div>
            </div>
        </div>
    </div> -->
    <div class="modal fade" tabindex="-1" id="modalForm2">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Gp-Refferer Info</h5>
                    <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                        <em class="icon ni ni-cross"></em>
                    </a>
                </div>
                <div class="modal-body">
                    <form class="form-validate is-alter" id="gpupdate" method="post">
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label class="form-label" for="first_name">First Name</label>
                                <div class="form-control-wrap">
                                  <input type="text" id="gpid" name="gpid" hidden>
                                    <input type="text" class="form-control" id="gpfirst_name" name="fname" autocomplete="off" required>
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <label class="form-label" for="sure_name">Sure Name</label>
                                <div class="form-control-wrap">
                                    <input type="text" class="form-control" id="gpsure_name" name="sname" autocomplete="off" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label class="form-label" for="memail">Email</label>
                                <div class="form-control-wrap">
                                    <input type="email" class="form-control" id="gpemail" autocomplete="off" required name="gpemail">
                                </div>
                            </div>

                            <div class="form-group col-md-6">
                                <label class="form-label" for="mpass">Password</label>
                                <div class="form-control-wrap">
                                    <input type="text" class="form-control" id="gppass" autocomplete="off" required name="gppassword">
                                </div>
                            </div>
                        </div>
                        
                      
                        <br>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <button type="submit" class="btn btn-lg btn-primary" id="gpsubmit">Save Informations</button>
                            </div>
                        </div>

                    </form>
                </div>
                <div class="modal-footer bg-light">
                    <span class="sub-text">GP-Refferer Update</span>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" tabindex="-1" id="modalForm3">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Service Definer Info</h5>
                    <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                        <em class="icon ni ni-cross"></em>
                    </a>
                </div>
                <div class="modal-body">
                    <form class="form-validate is-alter" id="sdrupdate" method="post">
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label class="form-label" for="first_name">Name</label>
                                <div class="form-control-wrap">
                                  <input type="text" id="sdrid" name="sdrid" hidden>
                                    <input type="text" class="form-control" id="sdrfirstname" name="sdrname" autocomplete="off" required>
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <label class="form-label" for="sure_name">Contact</label>
                                <div class="form-control-wrap">
                                    <input type="text" class="form-control" id="sdrcontact" name="sdrcontact" autocomplete="off" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label class="form-label" for="memail">Email</label>
                                <div class="form-control-wrap">
                                    <input type="email" class="form-control" id="sdremail" autocomplete="off" required name="sdremail">
                                </div>
                            </div>

                            <div class="form-group col-md-6">
                                <label class="form-label" for="mpass">Password</label>
                                <div class="form-control-wrap">
                                    <input type="text" class="form-control" id="sdrpass" autocomplete="off" required name="sdrpassword">
                                </div>
                            </div>
                        </div>
                        
                      
                        <br>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <button type="submit" class="btn btn-lg btn-primary" id="sdrsubmit">Save Informations</button>
                            </div>
                        </div>

                    </form>
                </div>
                <div class="modal-footer bg-light">
                    <span class="sub-text">Service Definer Update</span>
                </div>
            </div>
        </div>
    </div>
    <!-- app-root @e -->
    <script src="assets/js/example-toastr.js?ver=2.2.0"></script>
</body>
<script>

    function fetchadmindata() {
var Role = $('#Role').val();
if(Role == "consultant")
{
    var adminname = $('#adminname').val();
    var orgname= $('#orname').val();
        $.ajax({
            type: "POST",
            url: "phpcode.php",
            data: {
                adminname:adminname,
                orgname:orgname,
                consultantbtn: "btn"
            },
            success: function(response) {
                $("#adata").html(response);
                //alert(response);
            }

        });
    }
    else if(Role == "Nurse")
    {
    $.ajax({    
        type: "POST",
        url: "phpcode.php", 
		data:{nursebtn:"btn"},	            
        success: function(response){                    
            $("#adata").html(response); 
            //alert(response);
        }

    });
}
else if(Role == "ServiceDefiner")
    {
        var adminname = $('#adminname').val();
        var orgname= $('#orname').val();
    $.ajax({    
        type: "POST",
        url: "phpcode.php", 
		data:{adminname:adminname,orgname:orgname,ServiceDefiner:"btn"},	            
        success: function(response){                    
            $("#adata").html(response); 
            //alert(response);
        }

    });
}
else if(Role == "Dentist")
{
    $.ajax({    
        type: "POST",
        url: "phpcode.php", 
		data:{dentistbtn:"btn"},	            
        success: function(response){                    
            $("#adata").html(response); 
            //alert(response);
        }

    });
}
else if(Role == "GP_Refferer")
{
    var adminname = $('#adminname').val();
   var orgname= $('#orname').val();
    $.ajax({
            type: "POST",
            url: "phpcode.php",
            data: {
                adminname:adminname,
                orgname:orgname,
                genralpbtn: "btn"
            },
            success: function(response) {
                $("#adata").html(response);
                //alert(response);
            }

        });
}
else if(Role == "Optometrist")
{
    var adminname = $('#adminname').val();
    var orgname= $('#orname').val();
    $.ajax({
            type: "POST",
            url: "phpcode.php",
            data: {
                adminname:adminname,
                orgname:orgname,
                Optometristbtn: "btn"
            },
            success: function(response) {
                $("#adata").html(response);
                //alert(response);
            }

        });
}
    }
    <?php
if(isset($_GET["role"]))
{
?>
$(document).ready(function(){
   $("#Role").val("<?=$_GET["role"]?>");
   fetchadmindata();
});
<?php
}
else
{
?>
    $(document).ready(function() {
        fetchadmindata();
    });
    <?php
}
    ?>

    function confirm(id) {
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, delete it!'
        }).then(function(result) {
            if (result.value) {
                // Swal.fire('Deleted!', 'Manager has been deleted.', 'success');
                deleteadmin(id);
            }
        });
    }
    function confirm1(id) {
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, delete it!'
        }).then(function(result) {
            if (result.value) {
                // Swal.fire('Deleted!', 'Manager has been deleted.', 'success');
                deletsdefiner(id);
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
                    NioApp.Toast("<h5>User Didn't Delete</h5>", 'error', {
                        position: 'top-right'
                    });
                } else if (data == 'Success') {

                    toastr.clear();
                    NioApp.Toast("<h5>User Deleted Successfully</h5>", 'success', {
                        position: 'top-right'
                    });
                    fetchadmindata();
                }
               


            }
        });
    };
    function deletsdefiner(id) {

        var vid1 = id;
        $.ajax({
            type: 'POST',
            url: 'phpcode.php',
            data: {
                vid: vid1,
                delsdefiner: "btn"
            },

            success: function(data) {

                if (data == 'Error') {

                    toastr.clear();
                    NioApp.Toast("<h5>Service Definer Didn't Delete</h5>", 'error', {
                        position: 'top-right'
                    });
                } else if (data == 'Success') {

                    toastr.clear();
                    NioApp.Toast("<h5>Service Definer Deleted Successfully</h5>", 'success', {
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
            dataType: 'JSON',
            data: {
                method: name,
                id: ide,

            },

            success: function(data) {

                if (data == 'Error') {
                    toastr.clear();
                    NioApp.Toast("<h5>Consultant didn't Updated</h5>", 'error', {
                        position: 'top-right'
                    });

                } else if (data['res'] == 'Success') {
                    if (name == 'capprove') {

                        toastr.clear();
                        NioApp.Toast("<h5>"+data['name']+" Account De-Activated</h5>", 'success', {
                            position: 'top-right'
                        });
                        fetchadmindata();
                    } else {
                        toastr.clear();
                        NioApp.Toast("<h5>"+data['name']+" Account Activated Successfully</h5>", 'success', {
                            position: 'top-right'
                        });
                        fetchadmindata();

                    }
                }


            }
        });
    };
     function aprovenotaprovesd(id, status) {


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
                    NioApp.Toast("<h5>Service Definer didn't Updated</h5>", 'error', {
                        position: 'top-right'
                    });

                } else if (data == 'Success') {
                    if (name == 'sdrapprove') {

                        toastr.clear();
                        NioApp.Toast("<h5>Service Definer De-Activated</h5>", 'success', {
                            position: 'top-right'
                        });
                        fetchadmindata();
                    } else {
                        toastr.clear();
                        NioApp.Toast("<h5>Service Definer Activated Successfully</h5>", 'success', {
                            position: 'top-right'
                        });
                        fetchadmindata();

                    }
                }


            }
        });
    };
    function oaprovenotaprove(id, status) {


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
                    NioApp.Toast("<h5>Optometrist didn't Updated</h5>", 'error', {
                        position: 'top-right'
                    });

                } else if (data == 'Success') {
                    if (name == 'oapprove') {

                        toastr.clear();
                        NioApp.Toast("<h5>Optometrist De-Activated</h5>", 'success', {
                            position: 'top-right'
                        });
                        fetchadmindata();
                    } else {
                        toastr.clear();
                        NioApp.Toast("<h5>Optometrist Activated Successfully</h5>", 'success', {
                            position: 'top-right'
                        });
                        fetchadmindata();

                    }
                }


            }
        });
    };

    function eaprovenotaprove(id, status) {
        $.ajax({
            type: 'POST',
            url: 'phpcode.php',
             dataType: 'JSON',
            data: {
                vid: id,
                appgeneralbtn: "btn",
                status: status
            },

            success: function(data) {
// alert(data);
                if (data['res'] == 'Error') {

                    toastr.clear();
                    NioApp.Toast("<h5>"+data['name']+" Account Didn't Delete</h5>", 'error', {
                        position: 'top-right'
                    });
                } else if (data['res'] == 'Success') {

                    toastr.clear();
                    NioApp.Toast("<h5>"+data['name']+" Account Active Successfully</h5>", 'success', {
                        position: 'top-right'
                    });
                    fetchadmindata();
                }
                if (data['res'] == 'Errorr') {

                    toastr.clear();
                    NioApp.Toast("<h5>"+data['name']+" Account Didn't Delete</h5>", 'error', {
                        position: 'top-right'
                    });
                } else if (data['res'] == 'Successs') {

                    toastr.clear();
                    NioApp.Toast("<h5>"+data['name']+" Account  Not Active Successfully</h5>", 'success', {
                        position: 'top-right'
                    });
                    fetchadmindata();
                }


            }
        });
    }
    function openmodal1(id, fname, sname, email, pass, contact, dob, roleid) {
        $('#mid').val(id);
        $('#roleid').val(roleid);
        $('#first_name').val(fname);
        $('#sure_name').val(sname);
        $('#memail').val(email);
        $('#mpass').val(pass);
        $('#mcontact').val(contact);
        $('#mdepart').val(depart);
        $('#mdob').val(dob);

        $('#modalForm1').modal('show');
    };
    function openmodal2(id,fname,sname,email,pass) {
      
   
        $('#gpfirst_name').val(fname);
        $('#gpsure_name').val(sname);
        $('#gpemail').val(email);
        $('#gppass').val(pass);
      $('#gpid').val(id);

        $('#modalForm2').modal('show');
    };
       function openmodal3(id,name,contact,email,pass) {
      
   
        $('#sdrfirstname').val(name);
        $('#sdrcontact').val(contact);
        $('#sdremail').val(email);
        $('#sdrpass').val(pass);
      $('#sdrid').val(id);

        $('#modalForm3').modal('show');
    };
    $("#gpupdate").on('submit', function(e) {
        e.preventDefault();

        var formdata = new FormData(this);
        formdata.append("updategp", "btn");
        $.ajax({
            type: 'POST',
            url: 'phpcode.php',
            data: formdata,
            contentType: false,
            processData: false,
            beforeSend: function() {
                $('#gpsubmit').attr("disabled", "disabled");
                $('#gpupdate').css("opacity", ".5");
            },
            success: function(data) {
                			
                if (data == 'Error') {
                    toastr.clear();
                    NioApp.Toast("<h5>Staff didn't update Successfully</h5>", 'error', {
                        position: 'top-right'
                    });
                } else if (data == 'Success') {
                    $('#gpupdate')[0].reset();
                    toastr.clear();
                    NioApp.Toast("<h5>Staff Updated Successfully</h5>", 'success', {
                        position: 'top-right'
                    });
                    fetchadmindata();
                    $('#modalForm2').modal('hide');

                }

                $('#gpupdate').css("opacity", "");
                $("#gpsubmit").removeAttr("disabled");
            }

        });

    });
     $("#sdrupdate").on('submit', function(e) {
        e.preventDefault();

        var formdata = new FormData(this);
        formdata.append("updatesdr", "btn");
        $.ajax({
            type: 'POST',
            url: 'phpcode.php',
            data: formdata,
            contentType: false,
            processData: false,
            beforeSend: function() {
                $('#sdrubmit').attr("disabled", "disabled");
                $('#sdrpdate').css("opacity", ".5");
            },
            success: function(data) {
                			
                if (data == 'Error') {
                    toastr.clear();
                    NioApp.Toast("<h5>Service Definer didn't update Successfully</h5>", 'error', {
                        position: 'top-right'
                    });
                } else if (data == 'Success') {
                    $('#sdrupdate')[0].reset();
                    toastr.clear();
                    NioApp.Toast("<h5>Service Definer Updated Successfully</h5>", 'success', {
                        position: 'top-right'
                    });
                    fetchadmindata();
                    $('#modalForm3').modal('hide');

                }

                $('#sdrupdate').css("opacity", "");
                $("#sdrsubmit").removeAttr("disabled");
            }

        });

    });
</script>

</html>