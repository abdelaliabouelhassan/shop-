<?php
require_once("../resources/config.php");
?>
<?php include("../resources/templates/front/header.php");?>

    <!-- Page Content -->
    <div class="container">

        <!-- Jumbotron Header -->
        <header class="jumbotron hero-spacer">
          <h1> welcome to shop page !</h1>
        </header>

        <hr>

       
        <!-- /.row -->

        <!-- Page Features -->
        <div class="row text-center">
   <?php get_product_to_shop()?>
           
        <!-- /.row -->

       
    </div>
    <!-- /.container -->
    <?php include("../resources/templates/front/footer.php")?>