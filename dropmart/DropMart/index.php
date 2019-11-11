<!DOCTYPE html>
<?php header('Access-Control-Allow-Origin: *'); ?>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <?php include "imports.php"; ?>
  <title>DropMart</title>
  <script>
  $(function(){
    $('.carousel').carousel({
      interval: 1000 * 4
    });
  });
  </script>
  <style>
  .vendor-img {
      width: 100px;
  }
  </style>

</head>
<body>
  <?php session_start();
  $_SESSION["cartProducts"] = array();
  if(!isset($_SESSION["loggedInCust"]))
  {
    include "headerLoggedOut.php";
  }else {
    include "headerLoggedIn.php";
  }
  ?>


  <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img class="d-block w-100" src="./images/slide1.jpg" alt="First slide">
      </div>
      <div class="carousel-item">
        <img class="d-block w-100" src="./images/slide2.jpg" alt="Second slide">
      </div>
      <div class="carousel-item">
        <img class="d-block w-100" src="./images/slide3.jpg" alt="Third slide">
      </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>

  <div class="container-fluid py-3 bg-light">
    <p class="h2 text-center">Features</p>
    <div class="row">
      <div class="col text-center">
        <div class="bg-light py-3">
          <img src="./images/Cash-On-Delivery.png" class="rounded" alt="Cash On Delivery">
          <p class="mb-0">Cash On Delivery</p>
        </div>
      </div>
      <div class="col text-center">
        <div class="bg-light py-3">
          <img src="./images/Island-Wide-Delivery.png" class="rounded" alt="Island Wide Delivery">
          <p class="mb-0">Island Wide Delivery</p>
        </div>
      </div>
      <div class="col text-center">
        <div class="bg-light py-3">
          <img src="./images/Deals-&-Promotions.png" class="rounded" alt="Deals & Promotions">
          <p class="mb-0">Deals & Promotions</p>
        </div>
      </div>
      <div class="col text-center">
        <div class="bg-light py-3">
          <img src="./images/Track-Your-Package.png" class="rounded" alt="Track Your Package">
          <p class="mb-0">Track Your Package</p>
        </div>
      </div>
      <div class="col text-center">
        <div class="bg-light py-3">
          <img src="./images/247-Customer-Service.png" class="rounded" alt="24/7 Customer Service">
          <p class="mb-0">24/7 Customer Service</p>
        </div>
      </div>
    </div>
  </div>

  <div class="container py-3">
    <p class="h2 text-center">Weekly Deals</p>
    <div class="row">
      <div class="col">
        <div class="card-deck">
          <?php
          include 'dbconfig.php';
          $sql ="SELECT * FROM `weeklydeals` `w` INNER JOIN `products` `p` ON `w`.`product`=`p`.`id` LIMIT 5";
          $result = mysqli_query($con,$sql);
          if(mysqli_num_rows($result)> 0)
          {
            while($row = mysqli_fetch_assoc($result)){
              $pid=$row['id'];
              $title=$row['title'];
              $price=$row['price'];
              $image=$row['image'];
              ?>
              <div class="card shadow">
                <img class="card-img-top" src="<?php echo $image; ?>" alt="Card image cap">
                <div class="card-body">
                  <h5 class="card-title"><?php echo $title; ?></h5>
                  <p class="card-text mt-n3">LKR <?php echo $price;?></p>
                  <p class="card-text text-center"><a href="single.php?id=<?php echo "$pid"; ?>"><button type="button" class="btn btn-outline-success">View Details</button></a></p>
                </div>
              </div>
              <?php
            }
          }else {
            echo "NO DEALS THIS WEEK";
          }
          ?>
        </div>
      </div>
    </div>
  </div>

  <div class="container-fluid px-0">
    <div class="row">
      <div class="col">
        <img class="d-block w-100" src="./images/ad1.jpg" alt="Third slide">
      </div>
    </div>
  </div>

  <div class="container py-3">
    <p class="h2 text-center">Vendors</p>
    <div class="row w-100">
      <div class="col text-center">
        <img src="./images/vendor (1).jpg" alt="..." class="rounded-circle vendor-img">
      </div>
      <div class="col text-center">
        <img src="./images/vendor (2).jpg" alt="..." class="rounded-circle vendor-img">
      </div>
      <div class="col text-center">
        <img src="./images/vendor (3).jpg" alt="..." class="rounded-circle vendor-img">
      </div>
      <div class="col text-center">
        <img src="./images/vendor (4).jpg" alt="..." class="rounded-circle vendor-img">
      </div>
      <div class="col text-center">
        <img src="./images/vendor (5).jpg" alt="..." class="rounded-circle vendor-img">
      </div>
      <div class="col text-center">
        <img src="./images/vendor (6).jpg" alt="..." class="rounded-circle vendor-img">
      </div>
      <div class="col text-center">
        <img src="./images/vendor (7).jpg" alt="..." class="rounded-circle vendor-img">
      </div>
      <div class="col text-center">
        <img src="./images/vendor (8).jpg" alt="..." class="rounded-circle vendor-img">
      </div>
    </div>
  </div>

  <?php include "footer.php" ?>

</body>
</html>
