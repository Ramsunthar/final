<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <?php include "../imports.php";
session_start();
  ?>
  <title>Manage Customer</title>
  <link rel="stylesheet" href="dashboard.css">
  <script src="https://unpkg.com/feather-icons"></script>
  <script>
  $(document).ready(function(){
      $("#contents").load('https://teamtreehouse.com/');
  });
  $(document).ready(function() {
    $('#table_customer').DataTable();
} );
</script>
  <style>
  .sidebar-bg{
    background-color: #242939;
  }

  .nav-link{
    color: #989eb3 !important;
  }
  div#table_customer_wrapper {
      margin-top: 1.5em;
  }
  </style>

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
              <div class="col">
        <!--a class="btn btn-warning" href="add-product.php">Add Product</a-->
                <table id="table_customer" class="table mt-3 display">
                  <?php

                  include "../dbconfig.php";
                  $sql ="SELECT * FROM `customers`";

                  $result = mysqli_query($con,$sql);

                  if(mysqli_num_rows($result)> 0)
                  {
                    echo   " <thead><tr class='manage-customers-tr'><td class='manage-customers-td'>ID</td><td class='manage-customers-td'>Name</td>
                    <td class='manage-customers-td'>E-mail</td><td class='manage-customers-td'>Address</td></tr> </thead><tbody> ";
                    while($row = mysqli_fetch_assoc($result))
                    {

                      echo   " <tr class='manage-customers-tr'>  ";
                      echo   " <td class='align-middle'><div class=''>".$row["id"]."</div></td>  ";
                      echo   " <td class='align-middle'><div class=''>".$row["name"]."</div></td>  ";
                      echo   " <td class='align-middle'><div class=''>".$row["email"]."</div></td>  ";
                      echo   " <td class='align-middle'><div class=''>".$row["address"]."</div></td>  ";
                      echo "</tr>";

                    }
                    echo "</tbody>";
                  }
                  ?>
                </table>

              </div>
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
