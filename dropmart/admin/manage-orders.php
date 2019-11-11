<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <?php include "../imports.php";
session_start();
  ?>
  <title>Manage Order</title>
  <link rel="stylesheet" href="dashboard.css">
  <script src="https://unpkg.com/feather-icons"></script>
  <script>
  $(document).ready(function(){
      $("#contents").load('https://teamtreehouse.com/');
  });
  $(document).ready(function() {
    $('#table_orders').DataTable();
  } );


</script>
  <style>
  .sidebar-bg{
    background-color: #242939;
  }

  .nav-link{
    color: #989eb3 !important;
  }

div#table_orders_wrapper {
    margin-top: 1.5em;
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
              <div class="col">

                <table id="table_orders" class="table mt-3 display">
                  <?php

                  include "../dbconfig.php";
                  $sql ="SELECT * FROM `orders`";

                  $result = mysqli_query($con,$sql);

                  if(mysqli_num_rows($result)> 0)
                  {
                    echo   " <thead>
                    <tr class='manage-orders-tr'>
                    <td class='manage-orders-td'>Order ID</td>
                    <td class='manage-orders-td'>Customer ID</td>
                    <td class='manage-orders-td'>Delivery Address</td>
                    <td class='manage-orders-td'>Telephone Number</td>
                    <td class='manage-orders-td'>Partner ID</td>
                    <td class='manage-orders-td'>Delivered Status</td>
                    <td class='manage-orders-td'>update</td>
                    <td class='manage-orders-td'>View</td>
                    </tr> </thead><tbody> ";
                    while($row = mysqli_fetch_assoc($result))
                    {

                      echo   " <tr class='manage-orders-tr'>";
                      echo   " <td class='align-middle'><div class=''>".$row["id"]."</div></td>  ";
                      echo   " <td class='align-middle'><div class=''>".$row["customer"]."</div></td>  ";
                      echo   " <td class='align-middle'><div class=''>".$row["deliveryAddress"]."</div></td>  ";
                      echo   " <td class='align-middle'><div class=''>".$row["telephoneNo"]."</div></td>  ";
                      echo   " <td class='align-middle'><div class=''>".$row["partner"]."</div></td>  ";
                      echo   " <td class='align-middle'><div class=''>".$row["deliveryStatus"]."</div></td>  ";
                      echo "<td class='align-middle' width='48'><a href='update-order.php?id=".$row["id"]."'><img src='../images/edit.png' alt='' width='20' height='22' /></a></td>  ";
                      echo " <td class='align-middle' width='48'><a href='view-order.php?id=".$row["orderNo"]."'><img src='../images/view.png' alt='' width='20' height='22' /></a></td> ";
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
