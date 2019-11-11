<!DOCTYPE html>
<html lang="en" dir="ltr">
<?php session_start();
if (!isset($_SESSION["loggedInCust"])) {
  header('Location:login.php');
}
 ?>
<head>
  <meta charset="utf-8">
  <?php include "imports.php"; ?>
  <title>Checkout</title>
</head>
<style>
.marginify{
  margin-top: 3em !important;
  margin-bottom: 3em !important;
}
</style>
<body class="bg-light">
  <?php
  if(!isset($_SESSION["loggedInCust"]))
  {
    include "headerLoggedOut.php";
  }else {
    include "headerLoggedIn.php";
  }

  include 'dbconfig.php';
  ?>
  <div class="container marginify">
    <div class="text-center">

      <h2>Checkout form</h2>

    </div>
    <div class="row">
      <div class="col-md-4 order-md-2 mb-4">
        <h4 class="d-flex justify-content-between align-items-center mb-3">
          <span class="text-muted">Your cart</span>
          <span class="badge badge-secondary badge-pill"><?php if (isset($_SESSION["cartCount"])) { echo $_SESSION["cartCount"]; }else { echo "0"; } ?></span>
        </h4>
        <ul class="list-group mb-3">
          <?php
          $_SESSION["cartTotal"] = 0;
          foreach($_SESSION["cartProducts"] as $key => $value) {
            $sql ="SELECT * FROM `products` WHERE `products`.`id`='$key'";
            $result = mysqli_query($con,$sql);
            if(mysqli_num_rows($result)> 0)
            {
              while($row = mysqli_fetch_assoc($result)){
                $title=$row['title'];
                $price=$row['price'];
                ?>
                <li class="list-group-item d-flex justify-content-between lh-condensed">
                  <div>
                    <h6 class="my-0 text-muted"><?php echo $title ?></h6>

                  </div>
                  <span class="text-muted">LKR <?php $_SESSION["cartTotal"] = $_SESSION["cartTotal"]+$price*$value;  echo $price*$value ?></span>
                </li>
                <?php
              }
            }else {
              echo "Your Cart is empty";
            }
          }
          ?>
          <li class="list-group-item d-flex justify-content-between">
            <strong>Total</strong>
            <strong>LKR <?php echo $_SESSION["cartTotal"]; ?></strong>
          </li>
        </ul>
      </div>
      <div class="col-md-8 order-md-1">
        <h4 class="mb-3">Billing Details</h4>
        <form  method="post">
          <div class="row">
            <div class="col-md-6 mb-3">
              <label for="firstName">First name</label>
              <input type="text" class="form-control" id="firstName" name="firstName" placeholder="" value="" required>
              <div class="invalid-feedback">
                Valid first name is required.
              </div>
            </div>
            <div class="col-md-6 mb-3">
              <label for="lastName">Last name</label>
              <input type="text" class="form-control" id="lastName" name="lastName" placeholder="" value="" required>
              <div class="invalid-feedback">
                Valid last name is required.
              </div>
            </div>
          </div>

          <div class="mb-3">
            <label for="contact">Contact Number</label>
            <input type="text" class="form-control" id="contact" name="contact" placeholder="" value="" required>
            <div class="invalid-feedback">
              Valid contact number is required.
            </div>
          </div>

          <div class="mb-3">
            <label for="email">Email <span class="text-muted">(Optional)</span></label>
            <input type="email" class="form-control" id="email" name="email" placeholder="you@example.com">
            <div class="invalid-feedback">
              Please enter a valid email address for shipping updates.
            </div>
          </div>


          <h4 class="mb-3">Billing Location</h4>

          <div class="tab-content">
            <!-- Pickup at Store-->
            <div class="tab-pane fade show active" id="location1">
              <div class="mb-3 mt-3">
                <label for="address1">Address</label>
                <!--<input type="text" class="form-control"  id="address1" name="address1" placeholder="13th Floor BOC Merchant Tower" value="13th Floor BOC Merchant Tower" > -->
                <select class="form-control" name="location">
                  <option value="1">Pickup at Store</option>
                  <option value="2">Deliver to my Address</option>
                  <option value="3">Laughfs, Wellawatte</option>
                  <option value="4">Arpico, Wellawatte</option>
                  <option value="5">Cargills Food City, Wellawatte</option>
                </select>

                <div class="invalid-feedback">
                  Please enter your shipping address.
                </div>
              </div>
              <?php
              if (isset($_POST["confirm1"])) {
                $fname = $_POST["firstName"];
                $_SESSION["fname"] = $fname;

                $lname = $_POST["lastName"];
                $_SESSION["lname"] = $lname;

                $cno = $_POST["contact"];
                $_SESSION["cno"] = $cno;

                if (isset($_POST["email"])) {
                  $email = $_POST["email"];
                  $_SESSION["email"] = $email;
                }else {
                  $email = "";
                  $_SESSION["email"] = $email;
                }

                $location = $_POST["location"];
                if($location=1){
                  $_SESSION["address"] = "tom street";
                  $address = $_SESSION["address"];
                }elseif ($location=2) {
                  $_SESSION["address"] = $_SESSION["loggedInCustAdd"];
                  $address = $_SESSION["address"];
                }elseif ($location=3) {
                  $_SESSION["address"] = "Laughfs, Wellawatte";
                  $address = $_SESSION["address"];
                }elseif ($location=4) {
                  $_SESSION["address"] = "Arpico, Wellawatte";
                  $address = $_SESSION["address"];
                }elseif ($location=5) {
                  $_SESSION["address"] = "Cargills Food City, Wellawatte";
                  $address = $_SESSION["address"];
                }



                $orderNo = rand();
                $_SESSION["orderNo"] = $orderNo;

                if (isset($_SESSION["loggedInCustID"])) {
                  $cust = $_SESSION["loggedInCustID"] ;
                }

                $date = date("Y-m-d H:i:s");
                include "dbconfig.php";


                $sql="INSERT INTO `orders` (`id`, `orderNo`, `customer`, `deliveryAddress`, `telephoneNo`, `email`, `partner` ,`deliveryStatus`, `created`, `modified`) VALUES (NULL, '".$orderNo."', '".$cust."', '".$address."' ,'".$cno."','".$email."', '".$location."','0', '".$date."', '".$date."');";
                foreach($_SESSION["cartProducts"] as $key => $value) {
                  $sql1="INSERT INTO `orderdetails` (`id`, `orderId`, `product`, `qty`) VALUES (NULL, '".$orderNo."', '".$key."', '".$value."');";
                  mysqli_query($con,$sql1);
                }
                if(  mysqli_query($con,$sql))
                {
                  echo "<script> location.replace('confirmation.php'); </script>";
                }
                else
                {
                  echo "Opps something is wrong, Please select the file again";
                }

              }
              ?>

              <input class="btn btn-warning float-right" name="confirm1" type="submit" class="button" id="confirm1" value="Confirm"   />
            </div>
            <!-- Pickup at Store-->

            <!-- Drop at Nearby Pickup Location-->

            <!-- Drop at Nearby Pickup Location-->

            <!-- Deliver to my Address-->

            <!-- Deliver to my Address-->


          </div>
        </form>
      </div>
    </div>
  </div>
  <?php include "footer.php"; ?>
</body>
</html>
