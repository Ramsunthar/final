<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <?php include "../imports.php";
session_start();
  ?>
  <title>Add Product</title>
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

  form.add-form {
    margin-top: 1em;
}
  </style>

</head>
<body>
  <nav class="navbar navbar-light fixed-top bg-light flex-md-nowrap p-0 shadow">
    <a class=" col-sm-3 col-md-2 mr-0" href="#"><img class="d-block mx-auto" src="https://via.placeholder.com/50x30.png?text=Slide+1" alt="First slide"></a>
    <ul class="navbar-nav px-3">
      <li class="nav-item text-nowrap">
        <a class="nav-link" href="#">Hello, <?php if (isset($_SESSION["loggedInAdmin"])) {echo $_SESSION["loggedInAdmin"];}else {echo "Admin!";} ?></a>
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
                <form class="add-form" action="add-product.php" method="post" enctype="multipart/form-data">

                  <table class="table" width="80%" border="0" align="center">
                    <tr>
                      <td class="updateitem-td right" width="50%">Title</td>
                      <td class="updateitem-td" width="50%"><input class="p1 form-control" type="text" name="ptitle" id="ptitle" /></td>
                    </tr>
                    <tr>
                      <td class="updateitem-td right" width="50%">Price</td>
                      <td class="updateitem-td" width="50%"><input class="p1 form-control" type="text" name="pprice" id="pprice" /></td>
                    </tr>
                    <tr>
                      <td class="updateitem-td right"  width="50%">Image</td>
                      <td class="updateitem-td "  width="50%"><input class="p1 form-control-file" type="file" name="fileImage" id="fileImage" /></td>
                    </tr>
                    <tr>
                      <td class="updateitem-td right"  width="50%" height="43">Category</td>
                      <td class="updateitem-td">
                        <input type="checkbox"  name="chkGrocery" id="chkGrocery" /> Grocery <br>
                        <input type="checkbox" name="chkFruits" id="chkFruits" /> Fruits <br>
                        <input type="checkbox" name="chkVegetables" id="chkVegetables" /> Vegetables<br>
                        <input type="checkbox" name="chkFish" id="chkFish" /> Fish<br>
                        <input type="checkbox" name="chkMeat" id="chkMeat" /> Meat
                      </td>
                    </tr>
                    <tr>
                      <td colspan="2"><br />
                        <?php
                        if(isset($_POST["btnSubmit"]))
                        {
                          $title=$_POST["ptitle"];
                          $image = "../images/products/".basename($_FILES["fileImage"]["name"]);
                          $price=$_POST["pprice"];

                          if(isset($_POST["chkGrocery"]))
                          {			 $category = "grocery";		 }
                          if(isset($_POST["chkFruits"]))
                          {			 $category = "fruits";		 }
                          if(isset($_POST["chkVegetables"]))
                          {			 $category = "vegetables";	}
                          if(isset($_POST["chkFish"]))
                          {			 $category = "fish";	}
                          if(isset($_POST["chkMeat"]))
                          {			 $category = "meat";	}

                          include "../dbconfig.php";

                          $sql="INSERT INTO `products` (`pid`, `ptitle`, `pcat`, `pimg`, `pprice`) VALUES (NULL, '".$title."', '".$category."', '".$image."', '".$price."');";

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

                      </td>
                    </tr>
                    <tr>
                      <td class="updateitem-td center" colspan="2"><blockquote>

                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <input class="btn btn-warning" name="btnSubmit" type="submit" class="button" id="btnSubmit" value="Add Now"   />
                        <input class="btn btn-dark" name="btnReset" type="reset" class="button" id="btnReset" value="Cancel"   />

                      </blockquote></td>
                    </tr>
                  </table>
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
