<?php
//connect to database
 include("connect.php");
 //check user login session is logged out or not
 include("logout_chk.php");
 //current user session assign to a variable
 $user=$_SESSION["AdmID"];
 	$id=$_GET["id"];
 ?>
<?php include("top.php"); ?>
 
    </head>
    <body>

        <div id="wrapper">

            <!-- Navigation -->
<?php include("nav.php"); ?>
          

            <!-- Page Content -->
            <div id="page-wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header">Blank</h1>
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
