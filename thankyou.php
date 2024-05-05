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


<?php
 $orderId = $_GET['order_id'];
?>

<div class="content">
<div class="textBox"><br>
  <h2>Billing Successfully!</h2>
  <div class="alert alert-success">
    <strong>Thank you!</strong> Your order ID is <?= $orderId?> . Please remember for further follow up and enquiry.
  </div>

</div>
</div>

</body>
</html>