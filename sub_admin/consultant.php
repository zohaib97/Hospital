<?php
include_once('../database/db.php');

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
                                    <option>Select</option>
                                    <option value="consultant">Consultant</option>
                                    <option value="Nurse">Nurse</option>
                                    <option value="Dentist">Dentist</option>
                                    <option value="GP_Refferer">GP Refferer</option>
                                    <option value="Optometrist">Optometrist</option>
                                    <option value="ServiceDefiner">Service Definer</option>
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
                    <form class="form-validate is-alter" id="aupdate" method="post">
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label class="form-label" for="first_name">First Name</label>
                                <div class="form-control-wrap">
                                  
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
                                    <input type="email" class="form-control" id="gpmemail" autocomplete="off" required name="memail">
                                </div>
                            </div>

                            <div class="form-group col-md-6">
                                <label class="form-label" for="mpass">Password</label>
                                <div class="form-control-wrap">
                                    <input type="text" class="form-control" id="gpmpass" autocomplete="off" required name="mpassword">
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
                    <span class="sub-text">GP-Refferer Update</span>
                </div>
            </div>
        </div>
    </div>
    <!-- app-root @e -->
    <script src="assets/js/example-toastr.js?ver=2.2.0"></script>
</body>
<script>
$(document).ready(function(){
   $("#Role").val("<?=$_GET["role"]?>");
   fetchadmindata();
});
    function fetchadmindata() {
var Role = $('#Role').val();
if(Role == "consultant")
{
        $.ajax({
            type: "POST",
            url: "phpcode.php",
            data: {
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
    $.ajax({    
        type: "POST",
        url: "phpcode.php", 
		data:{ServiceDefiner:"btn"},	            
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
    $.ajax({
            type: "POST",
            url: "phpcode.php",
            data: {
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
    $.ajax({
            type: "POST",
            url: "phpcode.php",
            data: {
                Optometristbtn: "btn"
            },
            success: function(response) {
                $("#adata").html(response);
                //alert(response);
            }

        });
}
    }
    $(document).ready(function() {
        fetchadmindata();
    });

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

                } else if (data == 'Success') {
                    if (name == 'capprove') {

                        toastr.clear();
                        NioApp.Toast("<h5>Consultant De-Activated</h5>", 'success', {
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
            data: {
                vid: id,
                appgeneralbtn: "btn",
                status: status
            },

            success: function(data) {
// alert(data);
                if (data == 'Error') {

                    toastr.clear();
                    NioApp.Toast("<h5>General pratictional Didn't Delete</h5>", 'error', {
                        position: 'top-right'
                    });
                } else if (data == 'Success') {

                    toastr.clear();
                    NioApp.Toast("<h5>General pratictional Active Successfully</h5>", 'success', {
                        position: 'top-right'
                    });
                    fetchadmindata();
                }
                if (data == 'Errorr') {

                    toastr.clear();
                    NioApp.Toast("<h5>General pratictional Didn't Delete</h5>", 'error', {
                        position: 'top-right'
                    });
                } else if (data == 'Successs') {

                    toastr.clear();
                    NioApp.Toast("<h5>General pratictional  Not Active Successfully</h5>", 'success', {
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
    function openmodal2(fname, sname, email, pass) {
      
     alert("hello");
        $('#gpfirst_name').val(fname);
        $('#gpsure_name').val(sname);
        $('#gpmemail').val(email);
        $('#gpmpass').val(pass);
      

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
                    NioApp.Toast("<h5>Admin didn't update Successfully</h5>", 'error', {
                        position: 'top-right'
                    });
                } else if (data == 'Success') {
                    $('#aupdate')[0].reset();
                    toastr.clear();
                    NioApp.Toast("<h5>Admin Updated Successfully</h5>", 'success', {
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