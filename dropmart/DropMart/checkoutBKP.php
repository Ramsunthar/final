<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <?php include "imports.php"; ?>
  <title>Checkout</title>
</head>
<body class="bg-light">
  <?php session_start();?>
  <?php include "headerLoggedOut.php";

  include 'dbconfig.php';
  ?>
  <div class="container">
    <div class="py-5 text-center">
      <img class="d-block mx-auto mb-4" src="/docs/4.3/assets/brand/bootstrap-solid.svg" alt="" width="72" height="72">
      <h2>Checkout form</h2>
      <p class="lead">Below is an example form built entirely with Bootstrap’s form controls. Each required form group has a validation state that can be triggered by attempting to submit the form without completing it.</p>
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
            $sql ="SELECT * FROM `products` WHERE `products`.`pid`='$key'";
            $result = mysqli_query($con,$sql);
            if(mysqli_num_rows($result)> 0)
            {
              while($row = mysqli_fetch_assoc($result)){
                $title=$row['ptitle'];
                $price=$row['pprice'];
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
        <form action="checkout.php" method="post">
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
          <div class="bs-example">
            <ul class="nav nav-tabs">
              <li class="nav-item">
                <a href="#location1" class="nav-link active" data-toggle="tab">Pickup at Store</a>
              </li>
              <li class="nav-item">
                <a href="#location2" class="nav-link" data-toggle="tab">Drop at Nearby Pickup Location</a>
              </li>
              <li class="nav-item">
                <a href="#location3" class="nav-link" data-toggle="tab">Deliver to my Address</a>
              </li>
            </ul>
            <div class="tab-content">
              <!-- Pickup at Store-->
              <div class="tab-pane fade show active" id="location1">
                <div class="mb-3 mt-3">
                  <label for="address1">Address</label>
                  <input type="text" class="form-control"  id="address1" name="address1" placeholder="13th Floor BOC Merchant Tower" value="13th Floor BOC Merchant Tower" required>
                  <div class="invalid-feedback">
                    Please enter your shipping address.
                  </div>
                </div>
                <?php
                if (isset($_POST["confirm1"])) {
                  $fname = $_POST["firstName"];
                  $lname = $_POST["lastName"];
                  $cno = $_POST["contact"];
                  if (isset($_POST["email"])) {
                    $email = $_POST["email"];
                  }else {
                    $email = "";
                  }
                  $address = $_POST["address1"];
                  $orderNo = rand();
                  $cust = $_SESSION["loggedInCustID"] ;
                  $date = date("Y-m-d H:i:s");
                  include "dbconfig.php";

                /*  $sql="INSERT INTO `orders` (`id`, `orderNo`, `customer`, `deliveryAddress`, `telephoneNo`, `email`, `deliveryStatus`, `created`, `modified`) VALUES (NULL, '".$orderNo."', '".$cust."', '".$address."', '".$cno."', '0', '".$date."', '".$date."');"; */
                  $sql="INSERT INTO `orders` (`id`, `orderNo`, `customer`, `deliveryAddress`, `telephoneNo`, `email`, `deliveryStatus`, `created`, `modified`) VALUES (NULL, '546165915', '1', '123 maiin street', '045665165', '0', '17/12/2015', '17/12/2015');";

                  if(  mysqli_query($con,$sql))
                  {
                    echo "File uploaded Successfully";
                  }
                  else
                  {
                    echo "Opps something is wrong, Please select the file again";
                  }

                }
                ?>

                <input class="btn btn-primary" name="confirm1" type="submit" class="button" id="confirm1" value="Confirm"   />
              </div>
              <!-- Pickup at Store-->

              <!-- Drop at Nearby Pickup Location-->
              <div class="tab-pane fade" id="location2">
                <div class="mb-3 mt-3">
                  <label for="address2">Address</label>
                  <select class="form-control" name="address2" id="address2">
                    <option value="Laughfs, Wellawatte">Laughfs, Wellawatte</option>
                    <option value="Arpico, Wellawatte">Arpico, Wellawatte</option>
                    <option value="Cargills Food City, Wellawatte">Cargills Food City, Wellawatte</option>
                  </select>
                  <div class="invalid-feedback">
                    Please enter your shipping address.
                  </div>
                </div>
                <button class="btn btn-primary btn-lg" type="submit" name="confirm2">Confirm</button>
              </div>
              <!-- Drop at Nearby Pickup Location-->

              <!-- Deliver to my Address-->
              <div class="tab-pane fade" id="location3">
                <div class="mb-3 mt-3">
                  <label for="address3">Address</label>
                  <input type="text" class="form-control"  id="address3" name="address3" placeholder="1234 Street Town District " required>
                  <div class="invalid-feedback">
                    Please enter your shipping address.
                  </div>
                </div>
                <button class="btn btn-primary btn-lg" type="submit" name="confirm3">Confirm</button>
              </div>
              <!-- Deliver to my Address-->

            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
  <?php include "footer.php"; ?>
</body>
</html>
