<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <?php include "../imports.php";
session_start();
   ?>
  <title>Update Order</title>
  <link rel="stylesheet" href="dashboard.css">
  <script src="https://unpkg.com/feather-icons"></script>
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

  form.update-form {
    margin-top: 1em;
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
                <?php include "../dbconfig.php";
                $sql ="SELECT * FROM `orders` WHERE `id`=".$_GET["id"]."";

                $result = mysqli_query($con,$sql);

                if(mysqli_num_rows($result)> 0)
                {
                  $row = mysqli_fetch_assoc($result);

                 ?>
                 <form class="update-form" action="updateOrder.php?id=<?php echo $_GET["id"];?>" method="post" enctype="multipart/form-data">

           				<table class="table" width="50%" border="0" align="center">
           					<tr>
           						<td class="updateitem-td right" width=auto>Delivery Status</td>
           						<td class="updateitem-td" width=auto>
                                   <input type="radio" class="p1" name="status" id="status" value='1' <?php if($row['deliveryAddress']==1){echo "checked";}?>/>Delivered &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                   <input type="radio" class="p1" name="status" id="status" value='0' />Not Delivered
                                </td>

                               </tr>


           					<tr>
           						<td class="updateitem-td center"  colspan="2"><blockquote>

           							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
           							<input name="btnSubmit" type="submit" class="btn btn-warning" id="btnSubmit" value="Update"   />
           							<input name="btnReset" type="reset" class="btn btn-dark" id="btnReset" value="Cancel"   />

           						</blockquote></td>
           					</tr>
           				</table>
           				<?php
           			}
           			mysqli_close($con);
           			?>
           		</form>

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
