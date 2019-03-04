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
    unset($_SESSION['item_quenty']);
   unset($_SESSION['total_item']);
    redairect("checkout.php");
  }
  else{
    redairect("checkout.php");
  }

}

 if(isset($_GET['delete'])){
   $_SESSION['product_'.$_GET['delete']]='0';
   redairect("checkout.php");
   unset($_SESSION['item_quenty']);
   unset($_SESSION['total_item']);
 }


 ////hadi function dyal katjm3 liya   product dyal nass bhal sla dyal jumia 
 function cart(){
    
  $total=0;
  $items_quenty=0;
  $item_name=1;
  $item_number=1;
  $amount=1;
  $quantity=1;
  foreach ($_SESSION as $name => $value) {
      $items_quenty+= $value;
  if($value > 0){
      
  

       if(substr($name,0,8)== "product_"){


          
       $lenght = strlen($name);

       $id = substr($name ,8,$lenght);
  
  $query = query("SELECT * FROM products WHERE products_id=" . escape_string($id) . "");
  confirm($query);
        
  while($row = fetch_array($query)){
      $sub=$row['product_price']*$value;

      $product = <<<DELIMETER
               
  <tr>
  <td>{$row['product_title']}</td>
  <td>&#36;{$row['product_price']}</td>
  <td>{$value}</td>
  <td>&#36;{$sub}</td>
  <td><a class="btn btn-success" href="cart.php?add={$row['products_id']}"><span class='glyphicon glyphicon-plus'></span></a>
  <a class="btn btn-warning" href="cart.php?remove={$row['products_id']}"><span class='glyphicon glyphicon-minus'></span></a>
  <a class="btn btn-danger" href="cart.php?delete={$row['products_id']}"><span class='glyphicon glyphicon-remove'></span></a></td>
  
</tr>

  <input type="hidden" name="item_name_{$item_name}" value="{$row['product_title']}">
  <input type="hidden" name="item_number_{$item_number}" value="{$row['products_id']}">
  <input type="hidden" name="amount_{$amount}" value="{$row['product_price']}">
  <input type="hidden" name="quantity_{$value}" value="{$row['product_quantity']}">
        
DELIMETER;
        echo $product;
        $_SESSION['total_item']=$total+=$sub;
        $_SESSION['item_quenty']=$items_quenty;
        $item_name++;
        $item_number++;
        $amount++;
        $quantity++;
          }   
           
  }
    
  }
}


}
  

?>