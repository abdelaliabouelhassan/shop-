<?php require_once("../../resources/config.php"); ?>
<?php include("../../resources/templates/back/header.php"); ?>


<?php
if(!isset($_SESSION['username'])){
    header("location: ../index.php");
}

?>
        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Dashboard <small>Statistics Overview</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-dashboard"></i> Dashboard
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

                

         <?php 
         
         if($_SERVER['REQUEST_URI']=="/ecom/shop-/public/admin/" || $_SERVER['REQUEST_URI']=="/ecom/shop-/public/admin/index.php" ){
            include("../../resources/templates/back/admin_contant.php");
         }


         if(isset($_GET['orders'])){
            include("../../resources/templates/back/orders.php");
             
         }
         if(isset($_GET['Products'])){
            include("../../resources/templates/back/products.php");
             
         }

         if(isset($_GET['AProduct'])){
            include("../../resources/templates/back/add_product.php");
             
         }

         if(isset($_GET['Categories'])){
            include("../../resources/templates/back/categories.php");
             
         }
         if(isset($_GET['edit_product'])){
            include("../../resources/templates/back/edit_product.php");
         }

         if(isset($_GET['Users'])){
            include("../../public/admin/users.php");
             
         }



         

         
         
         ?>
















               
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <?php include("../../resources/templates/back/footer.php"); ?>