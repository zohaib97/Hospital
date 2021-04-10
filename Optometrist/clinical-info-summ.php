<?php
include_once('../database/db.php');

?>

<!DOCTYPE html>
<html lang="zxx" class="js">

<?php
include_once('header.php');
?>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
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
                                        <h2 class="nk-block-title fw-normal">Clinical Information</h2>
                                <?php
                                $appid = $_GET['id'];
                                $sql = mysqli_query($con,"SELECT * FROM tbl_serviceappointment,`services`,tbl_patients,ser_specialty_add,app_type,service_cliniciant,service_name where  services.service_speciality=ser_specialty_add.spec_id and services.service_a_type=app_type.app_id  and services.ser_cl_type=service_cliniciant.cl_id   and services.service_name=service_name.s_id and  tbl_patients.pt_id=tbl_serviceappointment.sp_patientid and tbl_serviceappointment.sp_serviceid = services.service_id and sp_id = '$appid'");
                                if(mysqli_num_rows($sql)>0)
                                {
                                    $fe = mysqli_fetch_array($sql);
                                }
                                ?>
                                <h5>UBRN Information</h5>
                             <div class="row">
                                 <div class="col-md-7">
                                 <p><b>Appointment Date :</b> <?=$fe["sp_createdate"]?></p>
                                 
                                 <?php
                                    if($fe['ser_priority_rout'] != null)
                                    {
                                  
                                    
                                    ?>
                                    <p><b>Priority :</b> Routine</p>
                                    <?php
                                         }
                                    ?>
                                    <?php
                                    if($fe['ser_priority_urg'] != null)
                                    {
                                  
                                    
                                    ?>
                                    <p><b>Priority :</b> Urgent</p>
                                    <?php
                                         }
                                    ?>
                                    <?php
                                    if($fe['ser_priority_2week'] != null)
                                    {
                                  
                                    
                                    ?>
                                    <p><b>Priority :</b> 2 Weeks</p>
                                    <?php
                                         }
                                    ?>
                                  
                                 <p><b>Location :</b> <?=$fe["service_location"]?></p>
                                 <p><b>Service Name :</b> <?=$fe["s_name"]?></p>
                                 </div>
                                 <div class="col-md-5">
                                 <p><b>Organisation Name :</b> <?=$klo["or_name"]?></p>
                                 <p><b>Referral By :</b> <?=$fetch["ur_fname"]." ".$fetch["ur_sname"]?></p>
                        </div>
                             </div>
                                    </div>
                                   <hr>
                                   <h5>Patient Information</h5>
                             <div class="row">
                                 <div class="col-md-3">
                                <p><b>Name :</b> <span><?=$fe["pt_name"]." ".$fe["pt_surname"]?></span></p>
                                <p><b>Date Of Birth :</b> <span><?php
                                
                                $dates=date_create($fe["pt_dob"]);
                                echo date_format($dates,"d/m/Y");
                                ?></span></p>

                                <p><b>NHS No :</b> <span><?=$fe["pt_nhsno"]?></span></p>

                                

                                

                                 </div>
                                 <div class="col-md-3">
                                 <p><b>Telephone :</b> <span><?=$fe["pt_mobno"]?></span></p>
                                 </div>
                                 <div class="col-md-3">
                                 <p><b>Home :</b> <span><?=$fe["pt_telno"]?></span></p>
                                 </div>
                                 <div class="col-md-3">
                                 <p><b>Address :</b> <span><?=$fe["pt_streetname"]." ".$fe["pt_city"].", ".$fe["pt_country"]?></span></p>
                                 </div>

                             </div>
                                    </div>
                                    <h5>Attachments</h5>
<br><br>
                                   <table class="table border border-info">
                                       <tr class="bg-info text-white">
                                           <th>File Name</th>
                                           <th>File Description</th>
                                           <th>Added By</th>
                                       </tr>
                                       <tbody id="data">
                                       <tr><th><?=$fe["filename"]?></th>
                                       <th><?=$fe["description"]?></th>
                                       <th><?=$fe["pt_name"]." ".$fe["pt_surname"]?></th>
                                       </tr>
                                
                                       </tbody>
                                   </table>
                                   <br>
                                   <br>
                                   <button class="btn btn-info btn-sm" onclick="nexyt()">Finish</button>
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

    <!-- app-root @e -->
    <script src="assets/js/example-toastr.js?ver=2.2.0"></script>
</body>
<script>
    function fetchrefferels() {
        
       $("#data").html('<tr><th>'+$("#ss").val()+'</th><th><textarea  id="ssa" cols="30" rows="1" class="form-control "></textarea> </th><th> <button class="btn btn-danger" onclick="remove()">&times;</button></th></tr>');
    }
    function remove(){
        $("#data").html(' <tr><th colspan="3" class="text-center text-danger">Not Found</th></tr>');
    }
    function nexyt(){
        toastr.clear();
   NioApp.Toast("<h5>Appointment Sent Successfully!</h5>", 'success',{position:'top-right'});
   setTimeout(function(){window.location.href="pdf.php?id=<?=$_GET["id"]?>";},2000);
                        
                    
    }
</script>

</html>