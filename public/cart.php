<?php
require_once("../resources/config.php");
?>



<?php 
if(isset($_GET['add'])){

$query=query("SELECT * FROM products WHERE products_id=".escape_string($_GET['add'])."");
confirm($query);


while($row = fetch_array($query)){
  if($row['product_quantity'] != $_SESSION['product_'.$_GET['add']]){
      $_SESSION['product_'.$_GET['add']]+=1;
      redairect("checkout.php");
  }
  else {
    set_msg("We only have " .$row['product_quantity']." "."Available");
      redairect("checkout.php");
  }
}



 }



if(isset($_GET['remove'])){
 
  $_SESSION['product_'.$_GET['remove']]--;
  if($_SESSION['product_'.$_GET['remove']]<1){
    redairect("checkout.php");
  }
  else{
    redairect("checkout.php");
  }

}

 if(isset($_GET['delete'])){
   $_SESSION['product_'.$_GET['delete']]='0';
   redairect("checkout.php");
 }

?>