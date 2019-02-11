<?php
require_once("../resources/config.php");
?>
<?php include("../resources/templates/front/header.php");?>





    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- -->
             <?php include("../resources/templates/front/side_nav.php")?>
            <div class="col-md-9">

                <div class="row carousel-holder">

                    <div class="col-md-12">
                    <!-- carouser -->
                       <?php include("../resources/templates/front/slider.php"); ?>
                    </div>

                </div>

                <div class="row">

                   <?php get_product();?>

                   
                </div>  <!-- row end here -->

            </div>

        </div>

    </div>
    <!-- /.container -->

   <?php include("../resources/templates/front/footer.php")?>
