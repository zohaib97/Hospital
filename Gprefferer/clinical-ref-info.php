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
                                        <h2 class="nk-block-title fw-normal">Clinical Referral Information</h2>
                                        <span class=""><h5 class="nk-block-title fw-normal icon ni ni-check-fill-c bg-light text-primary p-1"> The Shortlist has been created successfully</h5></span>
                                <?php
                                $refferalid=$fetch["ur_id"];
                                $appid = $_GET['c_id'];
                                $sql = mysqli_query($con,"SELECT * FROM tbl_serviceappointment,tbl_consultantrefferels,`services`,tbl_patients,orginzation where tbl_patients.pt_id=tbl_serviceappointment.sp_patientid and tbl_serviceappointment.sp_serviceid = services.service_id and tbl_consultantrefferels.c_gpid=tbl_serviceappointment.sp_refferalid and sp_id = '$appid' and sp_refferalid='$refferalid'");
                                if(mysqli_num_rows($sql)>0)
                                {
                                    $fe = mysqli_fetch_array($sql);
                                    $date1=date_create($fe["createdate"]);
                                    $dowb=date_format($date1,"d-m-Y ");
                                }
                                ?>
                                <input type="hidden" id="ss" value="<?=$fe["pt_name"]." ".$fe["pt_surname"]." ".date("d-m-Y")?>">
                                    </div>
                                    <div>
                                    <p><b>Referral By :</b> <?=$fetch["ur_fname"]." ".$fetch["ur_sname"]?></p>
                                    <p><b>Organisation Phone :</b> <?=$fetch1["or_phone"]?></p>
                                    <p><b>Organisation Name :</b> <?=$klo["or_name"]?></p>
                                    <p><b>Organisation Address :</b> <?=$klo["or_address"]?></p>
                                    <p><b>Referral Created Date :</b> <?=$dowb?></p>
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
                                    </div>
                                   <hr>
                                   <h5>Referral Attachments</h5>
                                   <button class="btn btn-info btn-sm" onclick="fetchrefferels()"><i class="fa fa-plus-circle" aria-hidden="true"></i> Add Attachment</button>
                                   <br><br>
                                   <table class="table border border-info">
                                       <tr class="bg-info text-white">
                                           <th>File Name</th>
                                           <th>Description</th>
                                           <th>Remove</th>
                                       </tr>
                                       <tbody id="data">
                                       <tr>
                                           <th colspan="3" class="text-center text-danger">Not Found</th>
                                       </tr>
                                
                                       </tbody>
                                   </table>
                                   <br>
                                   <button class="btn btn-info btn-sm" onclick="nexyt()">Next</button>
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
        var cid=<?=$appid?>;
        $.ajax({
            url:"phpcode.php",
            type:"POST",
            data:{insdf:"btn",id:cid,desc:$("#ssa").val(),paname:$("#ss").val()},
            success:function(res){
                if(res != "" && res !=null){
                    if(res == 1){
                        window.location.href="clinical-info-summ.php?id=<?=$appid?>";
                    }
                }
            }
        })
    }
</script>

</html>