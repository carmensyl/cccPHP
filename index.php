<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Furniture</title>
  <link rel="stylesheet" href="/css/style.css">
</head>
<body>
  <section>
    <div class="circle"></div>
    <header>
      <a href="index.php" class="logo"><img src="/images/logo.png"></a>
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
      <div class="textBox"><br>
        <h2>It's.......Chair<br>It's <span>Furniture</span></h2>
        <p>Enjoy designer furniture that captures the essence of Nordic design.<br> 
          From functional home furniture to statement pieces, explore our online 
          store for a range of modern furniture</p>
        <a href="aboutUs.php">Learn More</a>
      </div>
      <div class="imgBox">
        <img src="/images/img1.png" class="furniture">
      </div>
    </div>
  <ul class="thumb">
      <li><img src="/images/thumb1.png" onclick="imgSlider('/images/img1.png')"></li>
      <li><img src="/images/thumb2.png" onclick="imgSlider('/images/img2.png')"></li>
      <li><img src="/images/thumb3.png" onclick="imgSlider('/images/img3.png')"></li>
    </ul>
    <ul class="sci">
      <li><a href="#"><img src="/images/facebook.png"></a></li>
      <li><a href="#"><img src="/images/instagram.png"></a></li>
      <li><a href="#"><img src="/images/twitter.png"></a></li>
    </ul>
  </section>

  <script type="text/javascript">
    function imgSlider(anything){
      document.querySelector('.furniture').src = anything;
    }
  </script>
  
</body>
</html>
