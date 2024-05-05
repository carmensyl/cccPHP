<!DOCTYPE html>
<html lang="en">
<head>
  <title>Furniture</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="/css/style.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
<?php
  $updateBilling = false; 
  if(isset($_GET['updateBilling'])){
   $updateBilling = $_GET['updateBilling'];
  }

  $order_id = 0.;
  $user_name = "";
  $bill_info = "";
  $ship_loc = "";

  if(isset($_GET['order_id'])){
    $order_id = $_GET['order_id'];
  }
  if(isset($_GET['user_name'])){
   $user_name = $_GET['user_name'];
  }
  if(isset($_GET['bill_info'])){
   $bill_info = $_GET['bill_info'];
  }
  if(isset($_GET['ship_loc'])){
    $ship_loc = $_GET['ship_loc'];
  }



  if ($updateBilling == true){
      UpdateRecords($order_id, $user_name, $bill_info, $ship_loc );
      header("Location: thankyou.php?order_id=$order_id");
  }

?>

<section>
    <div class="circle"></div>
    <header>
      <a href="index.php" class="logo"><img src="/images/logo.png"></a>
      <ul>
        <li style="font-size: 16px;"><a href="index.php">Home</a></li>
        <li style="font-size: 16px;"><a href="aboutUs.php">About Us</a></li>
        <li class="dropdown">
          <a href="category.php" style="font-size: 16px;">Category</a>
          <div class="dropdown-content">
            <a style="font-size: 16px;" href="/category.php?category=1">Table</a>
            <a style="font-size: 16px;" href="/category.php?category=2">Bed</a>
            <a style="font-size: 16px;" href="/category.php?category=3">Chair</a></li>
        <li><a style="font-size: 16px;" href="cart.php">Cart</a></li>
      </ul>
    </header>

<div class="container">
  <h2>Billing Information</h2>
  <form action="billing.php" method = "GET">
    <div class="form-group" style="padding: 1.5rem;">
      <label for="user_name">Name:</label>
      <input type="hidden" name="order_id" value="<?=$order_id?>">
      <input type="hidden" name="updateBilling" value="TRUE">
      <input type="text" class="form-control" id="user_name" placeholder="Your Name" name="user_name" width="100">
      <br>
      <label for="bill_info">Credit Card Number:</label>
      <input type="tel" maxlength="19" class="form-control" id="bill_info" placeholder="xxxx xxxx xxxx" name="bill_info">
      <br>
      <label for="ship_loc">Shipping Address:</label>
      <input type="text" class="form-control" id="ship_loc" placeholder="Shipping Address" name="ship_loc">
      <br>
    </div>
      <button type="submit" class="btn btn-default">Submit</button>
  </form>
</div>

<?php

function UpdateRecords($order_id, $user_name, $bill_info, $ship_loc){
  include("config_shopping_cart.php");

// Step 1 - Insert Cart_Order 
$sql = "Update  cart_order set ship_loc = '$ship_loc',  bill_info = '$bill_info' , user_name = '$user_name'  where cart_order_id = $order_id";
echo $sql; 

$result = $conn->query($sql);


if ($result === FALSE) {
  print "Failed to set schema: " . $conn->errorMsg();
}

$conn->close();

}





/*

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the billing information from the form
    $user_name = $_POST["user_name"];
    $bill_info = $_POST["bill_info"];
    $ship_loc = $_POST["ship_loc"];

    // Validate and sanitize the data (perform necessary checks)

    // Insert the billing information into the database
    $sql = "INSERT INTO cart_order (ship_loc, bill_info, user_name) VALUES ('$user_name', '$bill_info', '$ship_loc')";

    if ($conn->query($sql) === true) {
        echo "Billing information submitted successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
*/
?>

</body>
</html>