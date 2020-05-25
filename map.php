<?php
//connect to database
 include("connect.php");
 //check user login session is logged out or not
 include("logout_chk.php");
 //current user session assign to a variable
 $user=$_SESSION["AdmID"];
 	$id=$_GET["id"];
	 include("user_chk.php"); 
	 
	 
 ?>
 <?php if($UTYPE=='U') { ?>
 <script>alert('You are not authorised to access this page');
 location.href='javascript:history.go(-1)'</script>
 <?php } ?>
<?php include("top.php"); ?>
 
       

        <!-- Page-Level Demo Scripts - Tables - Use for reference -->
        <script>
            $(document).ready(function() {
                $('#dataTables-example').DataTable({
                        responsive: true
                });
            });
        </script>
    </head>
    <body>

        <div id="wrapper">

            <!-- Navigation -->
            <?php include("nav.php"); ?>

            <div id="page-wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header">Location Availablities for Building <? echo GetName(building,name,id,$id) ?></h1>
                            
                            



                      </div>
                        <!-- /.col-lg-12 -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- /#page-wrapper -->

        </div>
        <!-- /#wrapper -->
 
       

    </body>
</html>
