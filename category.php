<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Furniture</title>
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
<?php 
  
  // Andy Cheng : PHP code : Get Record 
  
   $cat_id = "0";
   $min_price = 0;
   $max_price = 2000; 
 
   if(isset($_GET['category'])){
     $cat_id = $_GET['category'];
   }
   if(isset($_GET['min_price'])){
     $min_price = $_GET['min_price']; 
   }  
   if(isset($_GET['max_price'])){
     $max_price = $_GET['max_price'];
   }
   $list = getRecords($cat_id,$min_price,$max_price);
?>
  <section>
    <div class="circle"></div>
    <header>
      <a href="index.php" class="logo"><img src="images/logo.png"></a>
      <ul>
        <li><a href="index.php">Home</a></li>
        <li><a href="AboutUs.php">About Us</a></li>
        <li class="dropdown">
          <a href="category.php">Category</a>
          <div class="dropdown-content">
            <a href="/category.php?category=1">Table</a>
            <a href="/category.php?category=2">Bed</a>
            <a href="/category.php?category=3">Chair</a></li>
        <li><a href="cart.php">Cart</a></li>
      </ul>
    </header>
    <form action="/category.php" method = "GET">
    <div class="content category">
      <!-- Andy Cheng : HTML Code : Start Add this code--> 
      <div>
          <p> Filtering Page </p>
          <p> ------------- </p> 
          <p> Category </p>
          <p> <select id="category" name="category">
                <option value="0" <?=($cat_id==0)?"selected":""; ?> > All </option>
                <option value="1" <?=($cat_id==1)?"selected":""; ?> > Table </option>
                <option value="2" <?=($cat_id==2)?"selected":""; ?> > Bed </option>
                <option value="3" <?=($cat_id==3)?"selected":""; ?> > Chair </option>
              </select>
          </p>
          <p> Price : </p> 
          <p> <input type = "text" name="min_price" value=<?=$min_price?>  maxlength="4" size="4"> 
              to
              <input type = "text" name="max_price" value=<?=$max_price?> maxlength="4" size="4">
          <p>
          <p>
          <button type="submit" >Search</button>
          </p>
      </div>  
      </form>
     
      <div>
        
        <table>
        <?php 
          //Andy Cheng : PHP code : Start : Fetch the items records to display 
          $counter = 0; 
        
          for($i=0; $i <count($list) ; $i++) {
              if ($counter==0  || $counter %3 == 0)
              {
                echo '<tr>';
              }
              ?>
                <!--<tr>-->
                  <td><img src=<?= $list[$i]["img_src"]?> width="200" height="200">  </td>
                  <td>
                    <form action="/cart.php" method = "GET">
                    <p> item_id : <?= $list[$i]["item_id"]?> </p>
                    <p> name : <?= $list[$i]["item_name"]?> </p>
                    <p> description : <?= $list[$i]["item_desc"]?> </p>
                    <p> price : <?= $list[$i]["price"]?> </p>
                    <p> <input type="hidden" name="item_id" value=<?= $list[$i]["item_id"]?>></p>   
                    <p> <input type="hidden" name="item_name" value=<?= $list[$i]["item_name"]?>></p>
                    <p> <input type="hidden" name="item_desc" value=<?= $list[$i]["item_desc"]?>></p>
                    <p> <input type="hidden" name="price" value=<?= $list[$i]["price"]?>></p>
                    <p> <input type="text" name="qty" value="1" maxlength="4" size="4" ></p>
                    <p> <button type="submit">Add</button> </p>
                    </form>
                  </td>
                  <td>
                    <!-- /deletetodo.php?id=< $value[0]?> -->
                    <!--  <a href="/edittodo.php?id=<?= $list[$i]["item_id"]?>">Edit</a> | <a href="javascript:void(0)" onClick = confirmDelete(<?= $list["item_id"]?>)>Delete</a>-->
                  </td>
                <!--</tr>-->
          <?php 
              $counter++;
              if($counter%3 == 0)
              {
                echo '</tr>';
              }
          } 
           // Andy Cheng : PHP Code : End : Fetch the items records to display
          ?>
          </table>
        
        </div>
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
function getRecords($cat_id,$min_price,$max_price){
  include("config_shopping_cart.php");



$sql = "SELECT * FROM items where price >= $min_price and price <= $max_price  ORDER BY cat_id asc";
if ($cat_id != null && $cat_id != 0) {
  $sql = "SELECT * FROM items where cat_id = $cat_id  and price >= $min_price and price <= $max_price ORDER BY cat_id asc";
}


// * fetch all fields (id,title,msg)
$result = $conn->query($sql);
$data = array();
if ($result->num_rows > 0) {
// output data of each row
   while ($row = $result->fetch_assoc()){
      $data[] =$row;
   }

return $data;
//return $row = $result->fetch_assoc();


} 
else {
echo "No record found!";
}
$conn->close();
}
?>