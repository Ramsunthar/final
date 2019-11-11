<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <?php include "imports.php"; ?>
  <title>Cart</title>
  <style>
  html,body{
    height: 100% !important;
  }
  .checkout {
    margin-right: 1em !important;
}
.cart-container {
   min-height:100%;
   position:relative;
   height: 100%;
}

.marginify{
  margin-top: 3em !important;
  margin-bottom: 3em !important;
}


  </style>
</head>
<body>
  <?php session_start();
  if(!isset($_SESSION["loggedInCust"]))
  {
    include "headerLoggedOut.php";
  }else {
    include "headerLoggedIn.php";
  }

  include 'dbconfig.php';
  ?>

  <div class="container cart-container marginify">
    <div class="row">
      <div class="col">
        <div class="table-responsive">
          <table class="table">
            <tbody>
              <tr class="bg-light">
                <th class="align-middle text-center"></th>
                <th class="align-middle text-center">Item</th>
                <th class="align-middle text-center">Quantity</th>
                <th class="align-middle text-center">Unit Price</th>
                <th class="align-middle text-center">Sub Total</th>
                <th class="align-middle text-center">Update</th>
                <th class="align-middle text-center">Delete</th>
              </tr>
              <?php
              $_SESSION["cartCount"] = 0;
              foreach($_SESSION["cartProducts"] as $key => $value) {
                $sql ="SELECT * FROM `products` WHERE `products`.`id`='$key'";
                $result = mysqli_query($con,$sql);
                if(mysqli_num_rows($result)> 0)
                {

                  while($row = mysqli_fetch_assoc($result)){
                    $_SESSION["cartCount"] = $_SESSION["cartCount"]+1;
                    $title=$row['title'];
                    $price=$row['price'];
                    $image=$row['image'];
                    ?>
                    <tr class="bg-light mb-5">
                      <form class="" method="post">
                        <td class="align-middle text-center"><img class="img-fluid w-50" src="<?php echo $image; ?>"></td>
                        <td class="align-middle text-center"><p class="card-title"><?php echo $title; ?></p></td>
                        <td class="align-middle text-center"><input type="hidden"  value="<?php echo $key; ?>" name="i"/><input type="number" min="1" max="25" name="qty" value="<?php echo $value; ?>" class="form-control w-100" id="qty" name="qty" min="1" max="200" placeholder="<?php echo $value; ?>"/></td>
                        <td class="align-middle text-center">LKR <?php echo $price ?></td>
                        <td class="align-middle text-center">LKR <?php echo $price*$value ?></td>
                        <td class="align-middle text-center"><button type="submit" name="updateCartItem" class="btn "><img class="img-fluid w-25" src="./images/edit.png"></button></td>
                        <td class="align-middle text-center"><button type="submit" name="deleteCartItem" class="btn "><img class="img-fluid w-25" src="./images/delete.png"></button></td>
                      </form>
                      <?php
                      if (isset($_POST["updateCartItem"])) {
                        if (isset($_POST["qty"])) {
                          $val=$_POST["qty"];
                          $id=$_POST["i"];
                          $_SESSION["cartProducts"][$id] = $val;
                          echo "<script> location.replace('cart.php'); </script>";

                        }
                      }
                      if (isset($_POST["deleteCartItem"])) {
                        $id=$_POST["i"];
                        unset($_SESSION["cartProducts"][$id]);
                        echo "<script> location.replace('cart.php'); </script>";

                      }

                      ?>


                    </tr>
                    <?php
                  }
                }else {
                  echo "Your Cart is empty";
                }
              }
              ?>

            </tbody>
          </table>
        </div>
        <form class="" method="post">
          <button type="submit" name="clearCart" class="float-right btn btn-danger">Clear Cart</button>

        </form>
        <a href="checkout.php"><button name="checkout" class="float-right btn btn-warning checkout">Checkout</button></a>
        <?php
        if (isset($_POST["clearCart"])) {
          unset($_SESSION["cartProducts"]);
          $_SESSION["cartProducts"] = array();
          echo "<script> location.replace('cart.php'); </script>";

        }

        ?>
      </div>

    </div>

  </div>



    <?php include "footer.php"; ?>




</body>
</html>
