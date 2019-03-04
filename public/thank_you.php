<?php
require_once("../resources/config.php");
?>
<?php include("cart.php");?>
<?php include("../resources/templates/front/header.php");?>

<!-- /.row --> 


<?php 
if(isset($_GET['tx'])){
$amount=$_GET['amt'];
$currency = $_GET['cc'];
$transaction = $_GET['tx'];
$status = $_GET['st'];

}
else {
    redairect('checkout.php');
}

$query = query("INSERT INTO orders VALUES ('','$amount','$transaction','$status','$currency')");
?>



<div class="row">
<h1 class="text-center">thank you</h1>
session_destroy();




</div><!-- CART TOTALS-->


 </div><!--Main Content-->


           

        <!-- Footer -->
        <?php include("../resources/templates/front/footer.php")?>

