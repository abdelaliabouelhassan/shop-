<?php 


 /****************************************helper functions*********************************/

 function set_msg($msg){

    if(!empty($msg)){
        $_SESSION['message']=$msg;
    }
    else{
        $msg="";
    }

}//end srt_mes() here

 function display_msg(){
    if(isset($_SESSION['message'])){
        echo $_SESSION['message'];
        unset($_SESSION['message']);
    }
}


 function redairect($localtion){
     return header("Location: $localtion");
 }
  function query($sql){
      global $connection;
      return mysqli_query($connection,$sql);
  }

  function confirm($result){
      global $connection;
      if(!$result){
          die("QUERY FAILED").mysqli_error($connection); 
      }
  }
 function escape_string($string){
     global $connection;
     return mysqli_real_escape_string($connection,$string);
 }

 function fetch_array($result){
 return mysqli_fetch_assoc($result);
 }
  






/************************************FRONT END FUNCTION ********************************/










 //get products (jib liya lmantojat)

 function get_product(){
     $query=query("SELECT * FROM products");
     confirm($query);
     while($row=fetch_array($query)){
        
        $product = <<<DELIMETER

        <div class="col-sm-4 col-lg-4 col-md-4">
        <div class="thumbnail">
           <a href="item.php?id={$row['products_id']}"><img src="{$row['product_image']}350x150" alt=""></a>
            <div class="caption">
                <h4 class="pull-right">&#36;{$row['product_price']}</h4>
                <h4><a href="item.php?id={$row['products_id']}">{$row['product_title']}</a>
                </h4>
               
                <p>{$row['product_discription']}</p>
                
                <a class="btn btn-primary" target="_blank" href="cart.php?add={$row['products_id']}">Add to cart</a>
            </div>
            
        </div>
    </div>

DELIMETER;

echo $product;
     }
 }//end function get_product() here
  


 function get_categorys(){


    $query =query("SELECT * FROM  categories");
     confirm($query);

     while($row=fetch_array($query)){
$get_cat = <<<DELIMETER
<a href="category.php?id={$row['cat_id']}" class="list-group-item"> {$row['cat_title']}</a>
DELIMETER;
echo $get_cat;
     }//end while
 }//end function get_categorys() here


 function show_category_products(){
    $query= query("SELECT * FROM products WHERE products_id=".escape_string($_GET['id'])."");
    confirm($query);

  while($row=fetch_array($query)):  
$product = <<<DELIMETER
<div class="col-md-3 col-sm-6 hero-feature">
<div class="thumbnail">
    <img src="{$row['product_image']}800x500" alt="">
    <div class="caption">
        <h3>{$row['product_title']}</h3>
        <p>{$row['short_desc']}</p>
        <p>
            <a href="#" class="btn btn-primary">Buy Now!</a> <a href="item.php?id={$row['products_id']}" class="btn btn-default">More Info</a>
        </p>
    </div>
</div>
</div>

</div>
DELIMETER;
echo $product;
  endwhile;
 }///end show_category_products() function here




 function get_product_to_shop(){
    $query=query("SELECT * FROM products");
    confirm($query);
    while($row=fetch_array($query)){
       
       $product = <<<DELIMETER

       <div class="col-md-3 col-sm-6 hero-feature">
       <div class="thumbnail">
       <a href="item.php?id={$row['products_id']}">  <img src="{$row['product_image']}800x500" alt=""></a>
           <div class="caption">
               <h3>{$row['product_title']}</h3>
               <p>{$row['short_desc']}</p>
               <p>
                   <a href="#" class="btn btn-primary">Buy Now!</a> <a href="item.php?id={$row['products_id']}" class="btn btn-default">More Info</a>
               </p>
           </div>
       </div>
       </div>
       
       

DELIMETER;

echo $product;
         }//end while
}///end get_product_to_shop() function here


function log_users(){

 if(isset($_POST['submit'])):
    $query = query("SELECT * FROM users");
    confirm($query);
    while($row=fetch_array($query)):
    $username=escape_string($_POST['username']);
    $password=escape_string($_POST['password']);
if($username== $row['user_name'] && $password == $row['password']){
    redairect(admin);
   
}


endwhile;
endif;
}


function send_msg(){
    if(isset($_POST['submit'])){
       $to="abdelali54abouelhassan@gmail.com";
       $from_name= $_POST['name'];
       $subject= $_POST['subject'];
       $email= $_POST['email'];
       $messag= $_POST['messag'];
       $headers ="From : {$from_name} {$email}";
       $result= mail($to, $subject , $messag,$headers);
   if(!$result){
      echo "not sent";
   }
   else{
       echo " sent";
   }
    }
}///end function


////hadi function dyal katjm3 liya   product dyal nass bhal sla dyal jumia 
function cart(){
   

    foreach ($_SESSION as $name => $value) {

    if($value > 0){
        
    

         if(substr($name,0,8)== "product_"){

         $lenght = strlen($name);

         $id = substr($name ,8,$lenght);
            
            $query = query("SELECT * FROM products WHERE products_id=" . escape_string($id) . "");
            confirm($query);
          
            while($row = fetch_array($query)){
              $product = <<<DELIMETER
                 
                <tr>
                <td>{$row['product_title']}</td>
                <td>&#36;{$row['product_price']}</td>
                <td>{$row['product_quantity']}</td>
                <td>2</td>
                <td><a class="btn btn-success" href="cart.php?add={$row['products_id']}"><span class='glyphicon glyphicon-plus'></span></a>
                <a class="btn btn-warning" href="cart.php?remove={$row['products_id']}"><span class='glyphicon glyphicon-minus'></span></a>
                <a class="btn btn-danger" href="cart.php?delete={$row['products_id']}"><span class='glyphicon glyphicon-remove'></span></a></td>
              
            </tr>
          
DELIMETER;
          echo $product;
            }
          

         }
    }

}
  

  


}









 /************************************BACK END FUNCTION ********************************/











 
?>