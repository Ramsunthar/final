<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <?php include "imports.php"; ?>
  <title>Contact Us</title>
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
  <section class="jumbotron text-center">
    <div class="container">
      <h1 class="h2">About Us</h1>
      <p class="lead text-muted mb-0">DropMart was born out of the need for a convenient solution to shop for basics. The founders, Miluckshan, Withushan, Gugatharsan and Ramsunthar have been looking for a “set-it-and-forget-it” service to shop products, and when they couldn’t find one, they resolved to build the service they wanted.</p>
      <div class="row mt-3">
        <div class="col">
          <h1 class="h5">Convenience</h1>
          <p class="lead text-muted mb-0">We understand that your time is valuable and we don’t want you to waste any of it looking for the perfect item to buy. Shopping on our website is as easy as it gets. Our team is only a click away and are dedicated to serve you from the moment you log in and even after your order arrives at your doorstep. We make no compromises on convenience.</p>

        </div>
        <div class="col">
          <h1 class="h5">Quality</h1>
          <p class="lead text-muted mb-0">All our products are made in Sri Lanka with high-quality material. Production is carried out by experienced suppliers in the industry who are specialized in each type of supermarkets. Our promise of quality doesn’t just stop at the product, we work hard to exceed your expectations with our level or service.</p>

        </div>
      </div>

    </div>
  </section>
  <div class="container">
    <div class="row">

      <div class="col">
        <div class="card bg-light mb-3">
          <div class="card-header bg-warning"><p class="h2 text-center">Contact</p></div>
          <div class="container">
            <div class="row">
              <div class="col">
                <div class="map">
                  <div class="mapouter">
                    <div class="gmap_canvas">
                      <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3960.813742361245!2d79.84851331415122!3d6.9128605204337115!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ae25960d4668fff%3A0xf07c01bc93e0f1ac!2sSLIIT%20Academy%20Private%20Limited!5e0!3m2!1sen!2slk!4v1573391266984!5m2!1sen!2slk" width=400 height=300 frameborder="0" style="border:0;" allowfullscreen="">
                      </iframe>
                    </div>
                    <style>.mapouter
                    {
                      position:relative;
                      text-align:right;
                      height:auto;
                      width:auto;
                    }
                    .gmap_canvas
                    {
                      overflow:hidden;
                      background:none!important;
                      height:auto;
                      width:auto;
                    }
                    </style>
                  </div>
                </div>
              </div>
              <div class="col">
                <div class="card-body">
                  <p>DropMart HQ,<br>13th Floor , BOC merchant tower,<br>28 St Michaels Rd, Colombo 00300<br>Sri Lanka</p>
                  <p></p>
                  <p></p>
                  <p>info@dropmart.lk</p>
                  <p>076 852 8520</p>
                </div>
              </div>
            </div>
          </div>




        </div>
      </div>
    </div>
  </div>
<?php include "footer.php"; ?>
</body>
</html>
