<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Furniture</title>
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
<?php 
  
  // Andy Cheng : PHP code : Session Array 
   session_start();



   // Andy Cheng : If checkout button click, insert record and go to checkout.php
   $checkout = false; 
   if(isset($_GET['checkout'])){
    $checkout = $_GET['checkout'];
   }
   if ($checkout == true){
     // insert record (); 
     
   $order_id =  InsertRecords($_SESSION['selected_item_id'],$_SESSION['selected_item_name'],
                   $_SESSION['selected_item_desc'],$_SESSION['selected_item_qty'],
                   $_SESSION['selected_item_price'] );
     
     
     // After Success to insert, release Session 
     unset($_SESSION['selected_item_id']);
     unset($_SESSION['selected_item_name']);
     unset($_SESSION['selected_item_desc']);
     unset($_SESSION['selected_item_qty']);
     unset($_SESSION['selected_item_price']);


    //  echo "Success, Please check data base ";
     //header('Location: http://localhost/checkout.php?order_id=1');
     // Carmen: Redirect to the billing page
    header("Location: billing.php?order_id=$order_id");
    exit;

   }
  
   // If Session is not exist, declare the Session Variable
   if(!isset($_SESSION['selected_item_id'] )){
      $_SESSION['selected_item_id']       = array(); 
      $_SESSION['selected_item_name']     = array(); 
      $_SESSION['selected_item_desc']     = array(); 
      $_SESSION['selected_item_qty']      = array(); 
      $_SESSION['selected_item_price']    = array(); 
   }

   $item_id = 0;
   $item_name = "";
   $item_desc = "";
   $qty = 0; 
   $price = 0.0;

   if(isset($_GET['item_id'])){
    $item_id = $_GET['item_id'];
   }
   if(isset($_GET['item_name'])){
    $item_name = $_GET['item_name'];
   }
   if(isset($_GET['item_desc'])){
    $item_desc = $_GET['item_desc'];
   }
   if(isset($_GET['qty'])){
     $qty = $_GET['qty'];
   }
   if(isset($_GET['price'])){
    $price = $_GET['price'];
   }

  // Check is it submited from category.php , if it is submited by cart.php - no item_id provide
   if(isset($_GET['item_id'])){
        // if array existing , update the qty and price 
        $is_exist_item = in_array($_GET['item_id'], $_SESSION['selected_item_id']);

        // if exist item, update the exist array qty and price data 
        if ($is_exist_item){
          $exist_array_index = array_search($_GET['item_id'], $_SESSION['selected_item_id']);
          $_SESSION['selected_item_qty'][$exist_array_index] =  $_SESSION['selected_item_qty'][$exist_array_index] + $qty;
          $_SESSION['selected_item_price'][ $exist_array_index] = $_SESSION['selected_item_price'][ $exist_array_index]  + $price;

        }else { // not exist item, add the new record into array
          array_push($_SESSION['selected_item_id'], $item_id);
          array_push($_SESSION['selected_item_name'], $item_name);
          array_push($_SESSION['selected_item_desc'], $item_desc);
          array_push($_SESSION['selected_item_qty'], $qty);
          array_push($_SESSION['selected_item_price'], $price);
        }
   }
  
?>
  <section>
    <!--<div class="circle"></div>-->
    <header>
      <a href="index.php" class="logo"><img src="images/logo.png"></a>
      <ul>
      <li><a href="index.php">Home</a></li>
      <li><a href="aboutUs.php">About Us</a></li>
        <li class="dropdown">
          <a href="category.php">Category</a>
          <div class="dropdown-content">
            <a href="/category.php?category=1">Table</a>
            <a href="/category.php?category=2">Bed</a>
            <a href="/category.php?category=3">Chair</a></li>
        <li><a href="cart.php">Cart</a></li>
      </ul>
    </header>
    <div class="content">
      <!-- Andy Cheng : HTML Code : Start Add this code--> 

      <!--<div>-->
        <form action="/cart.php" method="GET" style = "width:100%;text-align: left;">
        <table style = "width:100%;text-align: left;" >
          <tr>
            <th>No.</th>
            <th>Item_ID</th>
            <th>Name</th>
            <th>Description</th>       
            <th>Qty</th>
            <th>Price</th>     
          </tr>

          <?php for($i = 0 ; $i < count($_SESSION['selected_item_id']) ; $i++) {                                            
        
              echo '<tr>';     
              echo '<td>'.($i+1).'</td>';
              echo '<td>'.$_SESSION['selected_item_id'][$i].'</td>';
              echo '<td>'.$_SESSION['selected_item_name'][$i].'</td>';
              echo '<td>'.$_SESSION['selected_item_desc'][$i].'</td>';
              echo '<td>'.$_SESSION['selected_item_qty'][$i].'</td>';
              echo '<td>'.$_SESSION['selected_item_price'][$i].'</td>';
              echo '</tr>';
          }  ?>
        
          <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td><input type="hidden" name="checkout" value="true"> </td>
            <td><button type="submit" >Checkout</button></td>
         </tr>
        </table>
        
        </form>
        
       <!-- </div>-->
      <!-- Andy Cheng : End Add this code -->
    </div>
  <ul class="thumb">
      <li><img src="images/thumb1.png" onclick="imgSlider('images/img1.png')"></li>
      <li><img src="images/thumb2.png" onclick="imgSlider('images/img2.png')"></li>
      <li><img src="images/thumb3.png" onclick="imgSlider('images/img3.png')"></li>
    </ul>
    <ul class="sci">
      <li><a href="#"><img src="images/facebook.png"></a></li>
      <li><a href="#"><img src="images/instagram.png"></a></li>
      <li><a href="#"><img src="images/twitter.png"></a></li>
    </ul>
  </section>

  <script type="text/javascript">
    function imgSlider(anything){
      document.querySelector('.furniture').src = anything;
    }
  </script>
</body>
</html>

<?php
function InsertRecords($item_id_array, $item_name_array, 
                      $item_desc_array, $item_qty_array, 
                      $item_price_array){
  include("config_shopping_cart.php");

// Step 1 - Insert Cart_Order 
$sql = "INSERT INTO cart_order (order_date_time, ship_loc, bill_info, user_name, status) values (now(),'test_ship_loc', 'test_bill_info', 'guest', 'Place Order')";
//echo $sql; 

$result = $conn->query($sql);
// get inserted id 
$id = $conn->insert_id; 

// Step 2 - Insert Cart Order Detail 
if ($result === TRUE) 
{
  for ($i = 0; $i < count($item_id_array); $i++){
      $line_no = $i+1; 
      $sql= "INSERT INTO cart_order_detail (cart_order_id, cart_order_detail_id, item_id, item_name, item_desc, cat_name, cat_desc, cat_type, order_qty, order_amt) " 
             . " values ($id, $line_no, $item_id_array[$i],'$item_name_array[$i]','$item_desc_array[$i]','cat_name','cat_desc', 'cat_type', $item_qty_array[$i],$item_price_array[$i])";
      //echo $sql; 
      $conn->query($sql);     
      
  }
}


if ($result === FALSE) {
  print "Failed to set schema: " . $conn->errorMsg();
}

$conn->close();
return $id;
}
?>