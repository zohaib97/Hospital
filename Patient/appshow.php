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
                                                        <h5>Appointment list</h5>
                                                    </div>

                                                </div>
                                             


                                                <div class="mb-4" id="tabItem6">


                                                </div>
                                                



                                            </div>
                                        </div>
                                    </div>








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
  
    <!-- app-root @e -->
    <script src="assets/js/example-toastr.js?ver=2.2.0"></script>
</body>


</html>
<script>
    $(document).ready(function(){
        spatient();
    })

    function spatient() {
        $.ajax({
            type: "POST",
            url: "phpcode2.php",
            data: {
              
                ssssa: "btn"
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

  function jjsj(id){
      var nhsno=<?=$_SESSION["patnhs"]?>;
      $.ajax({
          url:"phpcode2.php",
          type:"POST",
          data:{id:id,nhs:nhsno,insbtn:"btn"},
          success:function(res){
              console.log(res);
              if(res == "1"){
                toastr.clear();
   NioApp.Toast("<h5>Appointment Booked Successfully!</h5>", 'success',{position:'top-right'});
           
                spatient();
              }
          }
      })
  }
</script>