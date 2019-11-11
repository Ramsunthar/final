<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <?php include "../imports.php";

  session_start();
  ?>
  <title>Admin Dashboard</title>
  <link rel="stylesheet" href="dashboard.css">
  <script src="https://unpkg.com/feather-icons"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0-rc.1/Chart.bundle.min.js"></script>

  <script>
  $(document).ready(function(){
    $("#contents").load('https://teamtreehouse.com/');
  });
</script>

<style>
.sidebar-bg{
  background-color: #242939;
}

.nav-link{
  color: #989eb3 !important;
}
</style>
<script type='text/javascript'>
$(document).keydown(function(e){
  var key = e.charCode || e.keyCode;
  if (key == 80 && key ==17) {
    // enter key do nothing
  } else {
    e.preventDefault();
  }
});
</script>
</head>
<body>
  <nav class="navbar navbar-light fixed-top bg-light flex-md-nowrap p-0 shadow">
    <a class=" col-sm-3 col-md-2 mr-0" href="#"><img class="d-block mx-auto" src="https://via.placeholder.com/50x30.png?text=Slide+1" alt="First slide"></a>
    <ul class="navbar-nav px-3">
      <li class="nav-item text-nowrap">
        <a class="nav-link" href="#">Hello, Admin!</a>
      </li>
    </ul>
  </nav>

  <div class="container-fluid">
    <div class="row">
      <nav class="col-md-2 d-none d-md-block sidebar-bg sidebar">
        <div class="sidebar-sticky">
          <ul class="nav flex-column">
            <li class="nav-item">
              <a class="nav-link" href="admin.php">
                <span class="sidebar-icon" data-feather="home"></span>
                Dashboard <span class="sr-only">(current)</span>

              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="manage-orders.php">
                <span data-feather="file"></span>
                Orders

              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="manage-products.php">
                <span data-feather="shopping-cart"></span>
                Products

              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="manage-customers.php">
                <span data-feather="users"></span>
                Customers

              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="report.php">
                <span data-feather="bar-chart-2"></span>
                Reports

              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">
                <span data-feather="layers"></span>
                Integrations

              </a>
            </li>
          </ul>


        </div>
      </nav>
      <!--HERE!-->
      <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
        <div id="contents" class="">
          <div class="container-fluid mt-3">
            <div class="row">
              <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-success shadow h-100 py-2">
                  <div class="card-body text-center">
                    <div class="row no-gutters align-items-center">
                      <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-uppercase mb-1" style="color:#9C27B0;">Orders Report</div>
                          <a href="orders-report.php"><button type="button" class="btn btn-outline-secondary mt-1">Print Report</button></a>

                      </div>
                      <div class="col-auto">
                        <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-success shadow h-100 py-2">
                  <div class="card-body text-center">
                    <div class="row no-gutters align-items-center">
                      <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-uppercase mb-1" style="color:#673AB7;">Products Report</div>
                        <a href="products-report.php"><button type="button" class="btn btn-outline-secondary mt-1">Print Report</button></a>

                      </div>
                      <div class="col-auto">
                        <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-success shadow h-100 py-2">
                  <div class="card-body text-center">
                    <div class="row no-gutters align-items-center">
                      <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-uppercase mb-1" style="color:#3F51B5;">Customers Report</div>
                          <a href="customers-report.php"><button type="button" class="btn btn-outline-secondary mt-1">Print Report</button></a>


                      </div>
                      <div class="col-auto">
                        <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>



            </div>
            <div class="row">


            </div>
          </div>
        </div>
      </main>
    </div>
  </div>


  <script>
  feather.replace()
</script>
<script src="dashboard.js"></script>
</body>
</html>
