<?php 
  session_start(); 
  if(isset($_GET['logout'])){
    session_destroy();
    unset($_SESSION['username']);
    header("location: index.php");
  }

  $status="";
  if (isset($_POST['action']) && $_POST['action']=="remove"){
  if(!empty($_SESSION["shopping_cart"])) {
    foreach($_SESSION["shopping_cart"] as $key => $value) {
      if($_POST["name"] == $key){
      unset($_SESSION["shopping_cart"][$key]);
      $status = "<div class='box' style='color:red;'>
      Product is removed from your cart!</div>";
      }
      if(empty($_SESSION["shopping_cart"]))
      unset($_SESSION["shopping_cart"]);
        }   
      }
  }
  if (isset($_POST['action']) && $_POST['action']=="change"){
    foreach($_SESSION["shopping_cart"] as &$value){
      if($value['name'] === $_POST["name"]){
          $value['quantity'] = $_POST["quantity"];
          break; // Stop the loop after we've found the product
      }
    }    
  }
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>ECommerce - Home</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/cart.css">
    <?php include 'inc/navbar_head.php' ?>
</head>
<body>
  <!--
    HEADER 
  -->
    <?php include 'inc/header.php' ?>
  <!--
    HEADER  ENDS
  -->
  <br>
  <!-- CART -->

  <div class="cart">
    <?php
    if(isset($_SESSION["shopping_cart"])){
      $total_price = 0;
    ?>  
      <table class="table">
      <tbody>
        <tr>
          <td></td>
          <td>ITEM NAME</td>
          <td>QUANTITY(in Kg)</td>
          <td>UNIT PRICE</td>
          <td>ITEMS TOTAL</td>
        </tr> 
        <?php   
          foreach ($_SESSION["shopping_cart"] as $product){
        ?>
        <tr>
          <td>
            <?php 
            echo '<img id="my" height="50" width="40" src="data:image;base64,'.$product['image'].' "> '; 
            ?>
          </td>
          <td><?php echo $product["name"]; ?><br />
            <form method='post' action=''>
              <input type='hidden' name='name' value="<?php echo $product["name"]; ?>" />
              <input type='hidden' name='action' value="remove" />
              <button type='submit' class='remove'>Remove Item</button>
            </form>
          </td>
          <td>
            <form method='post' action=''>
              <input type='hidden' name='name' value="<?php echo $product["name"]; ?>" />
              <input type='hidden' name='action' value="change" />
              <select name='quantity' class='quantity' onchange="this.form.submit()">
                <option <?php if($product["quantity"]==1) echo "selected";?> value="1">1</option>
                <option <?php if($product["quantity"]==2) echo "selected";?> value="2">2</option>
                <option <?php if($product["quantity"]==3) echo "selected";?> value="3">3</option>
                <option <?php if($product["quantity"]==4) echo "selected";?> value="4">4</option>
                <option <?php if($product["quantity"]==5) echo "selected";?> value="5">5</option>
              </select>
            </form>
          </td>
          <td><?php echo "₹".$product["price"]; ?></td>
          <td><?php echo "₹".$product["price"]*$product["quantity"]; ?></td>
        </tr>
        <?php
            $total_price += ($product["price"]*$product["quantity"]);
          }
        ?>
        <tr>
          <td colspan="5" align="right">
            <strong>TOTAL: <?php echo "₹".$total_price; ?></strong>
          </td>
        </tr>
      </tbody>
      </table>    
    <?php
      }else{ 
    ?>
        <div class="message_box" style="margin:10px 0px;" align="center">
          <h1>Cart is EMPTY!! <a href="index.php">Return to Home</a></h1>
        </div>
    <?php
      }
    ?>
  </div>

  <!-- CART -->
  <!-- End promo area -->
    <!-- Footer -->
    <?php include 'inc/footer.php' ?>
    <!-- Footer -->
    <?php include 'inc/navbar.php' ?>
</body>
</html>